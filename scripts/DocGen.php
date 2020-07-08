<?php
$loadL10N = function (string $Language) {
    $YAML = new \Maikuolan\Common\YAML();
    $Arr = [];
    $DataDocGen = file_get_contents(__DIR__ . '\DocGen' . DIRECTORY_SEPARATOR . $Language . '.yml');
    $YAML->process($DataDocGen, $Arr);
    foreach (['frontend', 'web', 'phpmailer'] as $Dir) {
        $DataThisDir = file_get_contents(__DIR__ . '\vendor\phpmussel' . DIRECTORY_SEPARATOR . $Dir . '\l10n' . DIRECTORY_SEPARATOR . $Language . '.yml');
        $YAML->process($DataThisDir, $Arr);
    }
    return new \Maikuolan\Common\L10N($Arr, []);
};

// Path to vendor directory.
$Vendor = __DIR__ . DIRECTORY_SEPARATOR . 'vendor';

// Composer's autoloader.
require $Vendor . DIRECTORY_SEPARATOR . 'autoload.php';

$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
$FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
$Web = new \phpMussel\Web\Web($Loader, $Scanner);
$Loader->Events->addHandler('sendMail', new \phpMussel\PHPMailer\Linker($Loader));

header('Content-Type: text/plain');

if (!isset($_GET['language'])) {
    echo 'No language specified.';
} else {
    $Final = '';
    $Data = $loadL10N($_GET['language']);
    echo "```\n" . $Data->getString('link_config') . " (v3)\n│\n";
    $Cats = count($Loader->ConfigurationDefaults);
    $Current = 1;
    foreach ($Loader->ConfigurationDefaults as $Category => $Directives) {
        if (!isset($Data->Data['config_' . $Category])) {
            continue;
        }
        echo ($Current === $Cats ? '└───' : '├───') . $Category . "\n";
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
            echo ($Current === $Cats ? '        ' : '│       ') . $Directive . ' [' . $Type . "]\n";
            $Final .= sprintf($Data->getString('directive'), $Directive, $Type, $Out) . "\n\n";
            if (!empty($Choices)) {
                $Final .= "```\n" . $Directive . "\n";
                $Number = count($Choices);
                if (!empty($Info['allow_other'])) {
                    $Number++;
                }
                $Iterant = 1;
                foreach ($Choices as $Choice => $Value) {
                    if ($Type === 'string') {
                        $Value = '"' . $Value . '"';
                    } elseif ($Type === 'bool') {
                        $Value = $Value ? 'true' : 'false';
                    }
                    $Final .= ($Iterant === $Number ? '└─' : '├─') . $Choice . ' (' . $Value . ")\n";
                    $Iterant++;
                }
                if (!empty($Info['allow_other'])) {
                    $Final .= '└─…' . $Data->getString('label_other') . "\n";
                }
                $Final .= "```\n\n";
            }
            if (!empty($Info['See also'])) {
                $Final .= sprintf($Data->getString('menu_open'), $Data->getString('label_see_also')) . "\n";
                foreach ($Info['See also'] as $RefKey => $RefLink) {
                    $Final .= sprintf($Data->getString('menu_item'), $RefKey, $RefLink) . "\n";
                }
                $Final .= $Data->getString('menu_close') . "\n";
            }
        }
        if ($Current !== $Cats) {
            $Current++;
        }
    }
    echo "```\n\n" . $Final;
}

unset($Web, $FrontEnd, $Scanner, $Loader);
