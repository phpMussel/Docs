<?php
// Path to vendor directory.
$Vendor = __DIR__ . DIRECTORY_SEPARATOR . 'vendor';

$loadL10N = function (string $Language) use (&$Vendor) {
    $YAML = new \Maikuolan\Common\YAML();
    $Arr = [];
    $DataDocGen = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'DocGen' . DIRECTORY_SEPARATOR . $Language . '.yml');
    $YAML->process($DataDocGen, $Arr);
    foreach (['frontend', 'web', 'phpmailer'] as $Dir) {
        $DataThisDir = file_get_contents($Vendor . DIRECTORY_SEPARATOR . 'phpmussel' . DIRECTORY_SEPARATOR . $Dir . DIRECTORY_SEPARATOR . 'l10n' . DIRECTORY_SEPARATOR . $Language . '.yml');
        $YAML->process($DataThisDir, $Arr);
    }
    return new \Maikuolan\Common\L10N($Arr, []);
};

$ArrayFromL10NDataToArray = function ($References, &$L10N): array {
    if (!is_array($References)) {
        $References = [$References];
    }
    $Out = [];
    foreach ($References as $Reference) {
        if (isset($L10N->Data[$Reference])) {
            $Reference = $L10N->Data[$Reference];
        }
        if (!is_array($Reference)) {
            $Reference = [$Reference];
        }
        foreach ($Reference as $Key => $Value) {
            if (is_int($Key)) {
                $Out[] = $Value;
                continue;
            }
            $Out[$Key] = $Value;
        }
    }
    return $Out;
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
    $First = "```\n" . $Data->getString('link_config') . " (v3)\n│\n";
    $Cats = count($Loader->ConfigurationDefaults);
    $Current = 1;
    foreach ($Loader->ConfigurationDefaults as $Category => $Directives) {
        if (!isset($Data->Data['config_' . $Category])) {
            continue;
        }
        $First .= ($Current === $Cats ? '└───' : '├───') . $Category . "\n";
        if (strpos($Data->Data['category'], '<div') === false) {
            $Out = str_replace(
                ['<code>', '<code dir="ltr">', '<code dir="rtl">', '</code>', '<strong>', '</strong>', '<em>', '</em>'],
                ['`', '`', '`', '`', '__', '__', '*', '*'],
                html_entity_decode($Data->getString('config_' . $Category))
            );
        } else {
            $Out = $Data->getString('config_' . $Category);
        }
        $Final .= sprintf($Data->getString('category'), $Category, $Out) . "\n\n";
        foreach ($Directives as $Directive => $Info) {
            if (!isset($Data->Data['config_' . $Category . '_' . $Directive], $Info['type'])) {
                continue;
            }
            if (strpos($Data->Data['directive'], '<div') === false) {
                $Out = str_replace(
                    ['<code>', '<code dir="ltr">', '<code dir="rtl">', '</code>', '<strong>', '</strong>', '<em>', '</em>'],
                    ['`', '`', '`', '`', '__', '__', '*', '*'],
                    html_entity_decode($Data->getString('config_' . $Category . '_' . $Directive))
                );
            } else {
                $Out = $Data->getString('config_' . $Category . '_' . $Directive);
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
                $Choices = ['SYSTEM' => $Data->getString('field_system_timezone'), 'UTC' => 'UTC'];
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
                    $Final .= '└─…' . $Data->getString('label_other') . "\n";
                }
                $Final .= "```\n\n";
            }
            if (!empty($Info['hints'])) {
                $Hints = $ArrayFromL10NDataToArray($Info['hints'], $Data);
                foreach ($Hints as $HintKey => $HintValue) {
                    if (is_int($HintKey)) {
                        $Final .= $HintValue . "\n\n";
                        continue;
                    }
                    $Final .= sprintf("__%s__ %s\n\n", $HintKey, $HintValue);
                }
            }
            if (!empty($Info['See also'])) {
                $Final .= sprintf($Data->getString('menu_open'), $Data->getString('label_see_also')) . "\n";
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
    if (preg_match_all('~\{([a-z_]+)\}~i', $Final, $Matches)) {
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
        $Try = $_GET['autoupdate'] . $_GET['language'] . '.md';
        if (is_file($Try) && is_writable($Try)) {
            $README = file_get_contents($Try);
            if (($Start = strpos($README, '<a name="SECTION7">')) !== false) {
                $Start = strpos($README, '```', $Start);
            }
            if (($Finish = strpos($README, '<a name="SECTION8">')) !== false) {
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
