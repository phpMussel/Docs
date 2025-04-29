<?php
// Path to vendor directory.
$Vendor = __DIR__ . DIRECTORY_SEPARATOR . 'vendor';

$loadL10N = function (string $Language) use (&$Vendor) {
    $Preferred = $Language;
    if (!file_exists(__DIR__ . DIRECTORY_SEPARATOR . 'DocGen' . DIRECTORY_SEPARATOR . $Language . '.yml')) {
        $Language = preg_replace('~-.*$~', '', $Language);
        if (!file_exists(__DIR__ . DIRECTORY_SEPARATOR . 'DocGen' . DIRECTORY_SEPARATOR . $Language . '.yml')) {
            echo 'Unable to read the "' . $Language . '" language files!';
            die;
        }
    }
    $DataDocGen = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'DocGen' . DIRECTORY_SEPARATOR . $Language . '.yml');
    $Language = preg_replace('~-.*$~', '', $Language);
    if (
        !file_exists($Vendor . DIRECTORY_SEPARATOR . 'phpmussel' . DIRECTORY_SEPARATOR . 'frontend' . DIRECTORY_SEPARATOR . 'l10n' . DIRECTORY_SEPARATOR . $Language . '.yml') ||
        !file_exists($Vendor . DIRECTORY_SEPARATOR . 'phpmussel' . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'l10n' . DIRECTORY_SEPARATOR . $Language . '.yml') ||
        !file_exists($Vendor . DIRECTORY_SEPARATOR . 'phpmussel' . DIRECTORY_SEPARATOR . 'phpmailer' . DIRECTORY_SEPARATOR . 'l10n' . DIRECTORY_SEPARATOR . $Language . '.yml')
    ) {
        echo 'Unable to read the "' . $Language . '" language files!';
        die;
    }
    $YAML = new \Maikuolan\Common\YAML();
    if (file_exists($Vendor . DIRECTORY_SEPARATOR . 'phpmussel' . DIRECTORY_SEPARATOR . 'frontend' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'references.yml')) {
        $Data = file_get_contents($Vendor . DIRECTORY_SEPARATOR . 'phpmussel' . DIRECTORY_SEPARATOR . 'frontend' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'references.yml');
        $YAML->process($Data, $YAML->Refs);
    }
    $Arr = [];
    $YAML->process($DataDocGen, $Arr);
    foreach (['frontend', 'web', 'phpmailer'] as $Dir) {
        $DataThisDir = file_get_contents($Vendor . DIRECTORY_SEPARATOR . 'phpmussel' . DIRECTORY_SEPARATOR . $Dir . DIRECTORY_SEPARATOR . 'l10n' . DIRECTORY_SEPARATOR . $Language . '.yml');
        $YAML->process($DataThisDir, $Arr);
    }
    $L10N = new \Maikuolan\Common\L10N($Arr, []);
    $L10N->autoAssignRules($Preferred);
    $L10N->PreferredVariant = $Preferred;
    return $L10N;
};

if (!isset($_GET['language'])) {
    echo 'No language specified.';
} else {
    // Composer's autoloader.
    require $Vendor . DIRECTORY_SEPARATOR . 'autoload.php';

    $Loader = new \phpMussel\Core\Loader();
    $Scanner = new \phpMussel\Core\Scanner($Loader);
    $FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
    $Web = new \phpMussel\Web\Web($Loader, $Scanner);
    $Loader->Events->addHandler('sendMail', new \phpMussel\PHPMailer\Linker($Loader));

    header('Content-Type: text/plain');

    $Final = '';
    $Data = $loadL10N($_GET['language']);
    $First = "```\n" . $Data->getString('link.Configuration') . " (v3)\n│\n";
    $Cats = count($Loader->ConfigurationDefaults);
    $Current = 1;
    foreach ($Loader->ConfigurationDefaults as $Category => $Directives) {
        $First .= ($Current === $Cats ? '└───' : '├───') . $Category . "\n";
        $Out = $Data->getString('config.' . $Category);
        if ($Data->Directionality !== 'rtl') {
            $Out = str_replace(
                ['<code>', '<code class="s">', '<code dir="ltr">', '<code dir="rtl">', '</code>', '<strong>', '</strong>', '<em>', '</em>'],
                ['`', '`', '`', '`', '`', '__', '__', '*', '*'],
                html_entity_decode($Out)
            );
        }
        $Final .= sprintf($Data->getString('category'), $Category, $Out) . "\n\n";
        foreach ($Directives as $Directive => $Info) {
            $Out = $Data->getString('config.' . $Category . '_' . $Directive);
            if ($Data->Directionality !== 'rtl') {
                $Out = str_replace(
                    ['<code>', '<code class="s">', '<code dir="ltr">', '<code dir="rtl">', '</code>', '<strong>', '</strong>', '<em>', '</em>'],
                    ['`', '`', '`', '`', '`', '__', '__', '*', '*'],
                    html_entity_decode($Out)
                );
            }
            $Default = $Info['default'] ?? '';
            if (in_array($Info['type'], ['string', 'timezone', 'checkbox', 'url', 'email', 'kb'], true)) {
                $Type = 'string';
                $Default = '"' . $Default . '"';
            } elseif ($Info['type'] === 'float') {
                $Type = 'float';
            } elseif ($Info['type'] === 'bool') {
                $Type = 'bool';
                $Default = $Default ? 'true' : 'false';
            } else {
                $Type = 'int';
            }
            $Choices = [];
            if ($Info['type'] === 'timezone') {
                $Choices = ['SYSTEM' => $Data->getString('field.Use system default timezone'), 'UTC' => 'UTC'];
                $Info['allow_other'] = true;
            } elseif (isset($Info['choices'])) {
                $Choices = $Info['choices'];
            }
            $First .= ($Current === $Cats ? '        ' : '│       ') . $Directive . ' [' . $Type . "]\n";
            $Final .= sprintf($Data->getString('directive'), $Directive, $Type, $Out) . "\n\n";
            if (!empty($Choices)) {
                $Final .= "```\n" . $Directive . "\n";
                $Number = count($Choices);
                if (!empty($Info['allow_other'])) {
                    $Number++;
                }
                $Iterant = 1;
                foreach ($Choices as $Choice => $Value) {
                    $Value = $Data->getString($Value) ?: $Value;
                    if ($Type === 'string') {
                        $Value = '"' . $Value . '"';
                    } elseif ($Type === 'bool') {
                        $Value = $Value ? 'true' : 'false';
                    }
                    if (strpos($Value, "\n")) {
                        $Value = explode("\n", $Value);
                        $Value[1] = wordwrap($Value[1], 76, ($Iterant === $Number ? "\n  " : "\n│ "));
                        $Final .= ($Iterant === $Number ? '└─' : '├─') . $Choice . ' (' . $Value[0] . '): ' . $Value[1] . "\n";
                    } else {
                        $Final .= ($Iterant === $Number ? '└─' : '├─') . $Choice . ' (' . $Value . ")\n";
                    }
                    $Iterant++;
                }
                if (!empty($Info['allow_other'])) {
                    $Final .= '└─…' . $Data->getString('label.Other') . "\n";
                }
                $Final .= "```\n\n";
            }
            if (!empty($Info['hints'])) {
                foreach ($Data->arrayFromL10nToArray($Info['hints']) as $HintKey => $HintValue) {
                    if ($Data->Directionality !== 'rtl') {
                        $HintValue = str_replace(
                            ['<code>', '<code class="s">', '<code dir="ltr">', '<code dir="rtl">', '</code>', '<strong>', '</strong>', '<em>', '</em>'],
                            ['`', '`', '`', '`', '`', '__', '__', '*', '*'],
                            html_entity_decode($HintValue)
                        );
                    }
                    if (!is_string($HintKey)) {
                        $Final .= $HintValue . "\n\n";
                        continue;
                    }
                    $Final .= sprintf("__%s__ %s\n\n", $HintKey, $HintValue);
                }
            }
            if (!empty($Info['See also'])) {
                $Final .= sprintf($Data->getString('menu_open'), $Data->getString('label.See also')) . "\n";
                foreach ($Info['See also'] as $RefKey => $RefLink) {
                    $RefKey = addcslashes($RefKey, '|');
                    $Final .= sprintf($Data->getString('menu_item'), $RefKey, $RefLink) . "\n";
                }
                $Final .= $Data->getString('menu_close') . "\n";
            }
        }
        if ($Current !== $Cats) {
            $Current++;
        }
    }
    $Matches = [];
    if (preg_match_all('~\{([.,%_ ?!\dA-Za-z()-]+)\}~', $Final, $Matches)) {
        $Matches = array_unique($Matches[1]);
        foreach ($Matches as $Match) {
            if ($Try = $Data->getString($Match)) {
                $Final = str_replace('{' . $Match . '}', $Try, $Final);
            }
        }
    }
    if (!isset($_GET['autoupdate'])) {
        echo $First . "```\n\n" . $Final;
    } else {
        $Try = $_GET['autoupdate'] . 'readme.' . $_GET['language'] . '.md';
        if (is_file($Try) && is_writable($Try)) {
            $README = file_get_contents($Try);
            if (($Start = strpos($README, '<a name="SECTION5">')) !== false) {
                $Start = strpos($README, '```', $Start);
            }
            if (($Finish = strpos($README, '<a name="SECTION6">')) !== false) {
                $Finish = strrpos(substr($README, 0, $Finish), '---');
            }
            if ($Start === false || $Finish === false) {
                echo 'Unable to find configuration section markers in ' . $Try . '!';
            } else {
                $New = substr($README, 0, $Start) . $First . "```\n\n" . $Final . substr($README, $Finish);
                $Handle = fopen($Try, 'wb');
                fwrite($Handle, $New);
                fclose($Handle);
                echo 'Successfully updated ' . $Try . '. :-)';
            }
        } else {
            echo $Try . ' doesn\'t exist or isn\'t writable!';
        }
    }
}

unset($Web, $FrontEnd, $Scanner, $Loader);
