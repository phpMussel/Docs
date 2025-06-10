## Documentation for phpMussel v3 (English).

### Contents
- 1. [PREAMBLE](#user-content-SECTION1)
- 2. [HOW TO INSTALL](#user-content-SECTION2)
- 3. [HOW TO USE](#user-content-SECTION3)
- 4. [EXTENDING PHPMUSSEL](#user-content-SECTION4)
- 5. [CONFIGURATION OPTIONS](#user-content-SECTION5)
- 6. [SIGNATURE FORMAT](#user-content-SECTION6)
- 7. [KNOWN COMPATIBILITY PROBLEMS](#user-content-SECTION7)
- 8. [FREQUENTLY ASKED QUESTIONS (FAQ)](#user-content-SECTION8)
- 9. [LEGAL INFORMATION](#user-content-SECTION9)

*Regarding translations: My native language is English. Because this is a free and open-source hobby project which generates zero income, and translatable content is likely to change as the features and functionality supported by the project changes, it doesn't make sense for me to spend money for translations. Because I'm the sole author/developer/maintainer for the project and I'm not a ployglot, any translations I produce are very likely to contain errors. Sorry, but realistically, that won't ever change. If you find any such errors/typos/mistakes/etc, your assistance to correct them would be very much appreciated. Pull requests are invited and encouraged. Otherwise, if you find these errors too much to handle, just stick with the original English source. If a translation is irredeemably incomprehensible, let me know which, and I can delete it. If you're not sure how to perform pull requests, ask. I can help.*

---


### 1. <a name="SECTION1"></a>PREAMBLE

Thank you for using phpMussel, a PHP script designed to detect trojans, viruses, malware, and other threats within files uploaded to your system wherever the script is hooked, based on the signatures of ClamAV and others.

[PHPMUSSEL](https://phpmussel.github.io/) COPYRIGHT 2013 and beyond GNU/GPLv2 by [Caleb M (Maikuolan)](https://github.com/Maikuolan).

This script is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version. This script is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details, located in the `LICENSE.txt` file and available also from:
- <https://www.gnu.org/licenses/>.
- <https://opensource.org/licenses/>.

Special thanks to [ClamAV](https://www.clamav.net/) both for project inspiration and for the signatures that this script utilises, without which, the script would likely not exist, or at best, would have very limited value.

Special thanks to GitHub and Bitbucket for hosting the project files, and to the additional sources of a number of the signatures utilised by phpMussel: [PhishTank](https://www.phishtank.com/), [NLNetLabs](https://nlnetlabs.nl/), [Malware.Expert](https://malware.expert/) and others, and special thanks to all those supporting the project, to anyone else that I may have otherwise forgotten to mention, and to you, for using the script.

---


### 2. <a name="SECTION2"></a>HOW TO INSTALL

#### 2.0 INSTALLING WITH COMPOSER

The recommended way to install phpMussel v3 is through Composer.

For convenience, you can install the most commonly needed phpMussel dependencies via the old main phpMussel repository:

`composer require phpmussel/phpmussel`

Alternatively, you're able to choose individually which dependencies you'll need at your implementation. It's quite possible you'll only want specific dependencies and won't need everything.

In order to do anything with phpMussel, you'll need the phpMussel core codebase:

`composer require phpmussel/core`

Provides a front-end administrative facility for phpMussel:

`composer require phpmussel/frontend`

Provides automatic file upload scanning for your website:

`composer require phpmussel/web`

Provides the ability to utilise phpMussel as an interactive CLI-mode application:

`composer require phpmussel/cli`

Provides a bridge between phpMussel and PHPMailer, enabling phpMussel to utilise PHPMailer for two-factor authentication, email notification about blocked file uploads, etc:

`composer require phpmussel/phpmailer`

In order for phpMussel to be able to detect anything, you'll need to install signatures. There isn't a specific package for that. To install signatures, refer to the next section of this document.

Alternatively, if you don't want to use Composer, you can download prepackaged ZIPs from here:

https://github.com/phpMussel/Examples

The prepackaged ZIPs include all the aforementioned dependencies, as well as all standard phpMussel signature files, along with some examples provided for how to use phpMussel at your implementation.

#### <a name="INSTALLING_SIGNATURES"></a>2.1 INSTALLING SIGNATURES

Signatures are required by phpMussel for detecting specific threats. There are 2 main methods to install signatures:

1. Generate signatures using "SigTool" and install manually.
2. Download signatures from "phpMussel/Signatures" or "phpMussel/Examples" and install manually.

##### 2.1.0 Generate signatures using "SigTool" and install manually.

*See: [SigTool documentation](https://github.com/phpMussel/SigTool#documentation).*

*Also note: SigTool only processes the signatures from ClamAV. In order to obtain signatures from other sources, such as those written specifically for phpMussel, which includes the signatures necessary for detecting phpMussel's test samples, this method will need to be supplemented by one of the other methods mentioned here.*

##### 2.1.1 Download signatures from "phpMussel/Signatures" or "phpMussel/Examples" and install manually.

Firstly, go to [phpMussel/Signatures](https://github.com/phpMussel/Signatures). The repository contains various GZ-compressed signature files. Download the files that you need, decompress them, and copy them to the signatures directory of your installation.

Alternatively, download the most recent ZIP from [phpMussel/Examples](https://github.com/phpMussel/Examples). You can then copy/paste the signatures from that archive to your installation.

---


### 3. <a name="SECTION3"></a>HOW TO USE

#### 3.0 CONFIGURING PHPMUSSEL

After installing phpMussel, you'll need a configuration file so that you can configure it. phpMussel configuration files can be formatted as either INI or YML files. If you're working from one of the example ZIPs, you'll already have two example configuration files available, `phpmussel.ini` and `phpmussel.yml`; you can choose one of those to work from, if you'd like. If you're not working from one of the example ZIPs, you'll need to create a new file.

If you're satisfied with the default configuration for phpMussel and don't want to change anything, you can use an empty file as your configuration file. Anything not configured by your configuration file will utilise its default, so you only need to explicitly configure something if you want it to be different from its default (meaning, an empty configuration file will cause phpMussel to utilise all its default configuration).

If you want to use the phpMussel front-end, you can configure everything from the front-end configuration page. But, since v3 onward, front-end login information is stored in your configuration file, so to log into the front-end, you'll need to at least configure an account to use to log in, and then, from there, you'll be able to log in and use the front-end configuration page to configure everything else.

The below excerpts will add a new account to the front-end with the username "admin", and the password "password".

For INI files:

```INI
[user.admin]
password='$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK'
permissions='1'
```

For YML files:

```YAML
user.admin:
 password: "$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK"
 permissions: 1
```

You can name your configuration whatever you want (as long as you retain its extension, so that phpMussel knows which format it uses), and you can store it wherever you want. You can tell phpMussel where to find your configuration file by supplying its path when instantiating the loader. If no path is supplied, phpMussel will try to locate it within the parent of the vendor directory.

In some environments, such as Apache, it's even possible to place a dot at the front of your configuration to hide it and prevent public access.

Refer to the configuration section of this document for more information about the various configuration directives available to phpMussel.

#### 3.1 PHPMUSSEL CORE

No matter how you want to use phpMussel, almost every implementation will contain something like this, at a minimum:

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
```

As the names of these classes imply, the loader is responsible for preparing the basic necessities of using phpMussel, and the scanner is responsible for all the core scanning functionality.

The constructor for the loader accepts five parameters, all optional.

```PHP
public function __construct(
    string $ConfigurationPath = '',
    string $CachePath = '',
    string $QuarantinePath = '',
    string $SignaturesPath = '',
    string $VendorPath = ''
)
```

The first parameter is the complete path to your configuration file. When omitted, phpMussel will look for a configuration file named as either `phpmussel.ini` or `phpmussel.yml`, in the parent of the vendor directory.

The second parameter is the path to a directory which you permit phpMussel to use for caching and temporary file storage. When omitted, phpMussel will attempt to create a new directory to use, named as `phpmussel-cache`, in the parent of the vendor directory. If you want to specify this path yourself, it would be best to choose an empty directory, as to avoid the unwanted loss of other data in the specified directory.

The third parameter is the path to a directory which you permit phpMussel to use for its quarantine. When omitted, phpMussel will attempt to create a new directory to use, named as `phpmussel-quarantine`, in the parent of the vendor directory. If you want to specify this path yourself, it would be best to choose an empty directory, as to avoid the unwanted loss of other data in the specified directory. It is strongly recommended that you prevent public access to the directory used for quarantine.

The fourth parameter is the path to the directory containing the signature files for phpMussel. When omitted, phpMussel will try looking for the signature files in a directory named as `phpmussel-signatures`, in the parent of the vendor directory.

The fifth parameter is the path to your vendor directory. It should never point to anything else. When omitted, phpMussel will try to locate this directory for itself. This parameter is provided in order to facilitate easier integration with implementations that mightn't necessarily have the same structure as a typical Composer project.

The constructor for the scanner accepts only one parameter, and it is mandatory: The instantiated loader object. As it is passed by reference, the loader must be instantiated to a variable (instantiating the loader directly into the scanner in order to pass by value is not the correct way to use phpMussel).

```PHP
public function __construct(\phpMussel\Core\Loader &$Loader)
```

#### 3.2 AUTOMATIC FILE UPLOAD SCANNING

To instantiate the upload handler:

```PHP
$Web = new \phpMussel\Web\Web($Loader, $Scanner);
```

To scan file uploads:

```PHP
$Web->scan();
```

Optionally, phpMussel can attempt to repair the names of uploads in case there's something wrong, if you'd like:

```PHP
$Web->demojibakefier();
```

As a complete example:

```PHP
<?php
// Path to vendor directory.
$Vendor = __DIR__ . DIRECTORY_SEPARATOR . 'vendor';

// Composer's autoloader.
require $Vendor . DIRECTORY_SEPARATOR . 'autoload.php';

$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
$Web = new \phpMussel\Web\Web($Loader, $Scanner);
$Loader->Events->addHandler('sendMail', new \phpMussel\PHPMailer\Linker($Loader));

// Scans file uploads (execution terminates here if the scan finds anything).
$Web->scan();

// Fixes possible corrupted file upload names (Warning: modifies the content of $_FILES).
$Web->demojibakefier();

// Cleanup.
unset($Web, $Scanner, $Loader);

?><html>
    <form enctype="multipart/form-data" name="upload" action="" method="post">
      <div class="spanner">
        <input type="file" name="upload_test[]" value="" />
        <input type="submit" value="OK" />
      </div>
    </form>
</html>
```

*Attempting to upload the file `ascii_standard_testfile.txt`, a benign sample provided for the sole purpose of testing phpMussel:*

![Screenshot](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/web-v3.0.0-alpha2.png)

#### 3.3 CLI-MODE

To instantiate the CLI handler:

```PHP
$CLI = new \phpMussel\CLI\CLI($Loader, $Scanner);
```

As a complete example:

```PHP
<?php
// Path to vendor directory.
$Vendor = __DIR__ . DIRECTORY_SEPARATOR . 'vendor';

// Composer's autoloader.
require $Vendor . DIRECTORY_SEPARATOR . 'autoload.php';

$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
$CLI = new \phpMussel\CLI\CLI($Loader, $Scanner);

unset($CLI, $Scanner, $Loader);
```

*Screenshot:*

![Screenshot](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/cli-v3.5.0.png)

#### 3.4 FRONT-END

To instantiate the front-end:

```PHP
$FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
```

As a complete example:

```PHP
<?php
// Path to vendor directory.
$Vendor = __DIR__ . DIRECTORY_SEPARATOR . 'vendor';

// Composer's autoloader.
require $Vendor . DIRECTORY_SEPARATOR . 'autoload.php';

$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
$FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
$Web = new \phpMussel\Web\Web($Loader, $Scanner);
$Loader->Events->addHandler('sendMail', new \phpMussel\PHPMailer\Linker($Loader));

// Scans file uploads (execution terminates here if the scan finds anything).
$Web->scan();

// Fixes possible corrupted file upload names (Warning: modifies the content of $_FILES).
$Web->demojibakefier();

// Load the front-end.
$FrontEnd->view();

// Cleanup.
unset($Web, $FrontEnd, $Scanner, $Loader);
```

*Screenshot:*

![Screenshot](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/frontend-v3.4.0.png)

#### 3.5 SCANNER API

You can also implement the phpMussel scanner API within other programs and scripts, if you'd like.

As a complete example:

```PHP
// Path to vendor directory.
$Vendor = __DIR__ . DIRECTORY_SEPARATOR . 'vendor';

// Composer's autoloader.
require $Vendor . DIRECTORY_SEPARATOR . 'autoload.php';

// Location of the test files.
$Samples = sprintf($Vendor . '%1$sphpmussel%1$score%1$stests%1$s_support%1$ssamples', DIRECTORY_SEPARATOR);

$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
$Loader->Events->addHandler('sendMail', new \phpMussel\PHPMailer\Linker($Loader));

// Execute the scan.
$Results = $Scanner->scan($Samples);

// Cleanup.
unset($Scanner, $Loader);

var_dump($Results);
```

The important part to note from that example is the `scan()` method. The `scan()` method accepts two parameters:

```PHP
public function scan(mixed $Files, int $Format = 0): mixed
```

The first parameter can be a string or an array, and tells the scanner what it should scan. It can be string indicating a specific file or directory, or an array of such strings to specify multiple files/directories.

When as a string, it should point to where the data can be found. When as an array, the array keys should indicate the original names of the items to be scanned, and the values should point to where the data can be found.

The second parameter is an integer, and tells the scanner how it should return its scan results.

Specify 1 to return the scan results as an array for each item scanned as integers.

These integers have the following meanings:

Results | Description
--:|:--
-5 | Indicates that the scan failed to complete for other reasons.
-4 | Indicates that data couldn't be scanned due to encryption.
-3 | Indicates that problems were encountered with the phpMussel signatures files.
-2 | Indicates that corrupt data was detected during the scan and thus the scan failed to complete.
-1 | Indicates that extensions or addons required by PHP to execute the scan were missing and thus the scan failed to complete.
0 | Indicates that the scan target doesn't exist and thus there was nothing to scan.
1 | Indicates that the target was successfully scanned and no problems were detected.
2 | Indicates that the target was successfully scanned and problems were detected.

Specify 2 to return the scan results as a boolean.

Results | Description
:-:|:--
`true` | Problems were detected (scan target is bad/dangerous).
`false` | Problems were not detected (scan target is probably okay).

Specify 3 to return the scan results as an array for each item scanned as human-readable text.

*Example output:*

```
array(3) {
  ["dcacac499064454218823fbabff7e09b5b011c0c877ee6f215f35bffb195b6e9:654:ascii_standard_testfile.txt"]=>
  string(73) "Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!"
  ["c845b950f38399ae7fe4b3107cab5b46ac7c3e184dddfec97d4d164c00cb584a:491:coex_testfile.rtf"]=>
  string(53) "Detected phpMussel-Testfile.CoEx (coex_testfile.rtf)!"
  ["d45d5d9df433aefeacaece6162b835e6474d6fcb707d24971322ec429707c58f:185:encrypted.zip"]=>
  string(77) "Detected encrypted archive; Encrypted archives not permitted (encrypted.zip)!"
}
```

Specify 4 to return the scan results as a string of human-readable text (like 3, but imploded).

*Example output:*

```
Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)! Detected phpMussel-Testfile.CoEx (coex_testfile.rtf)! Detected encrypted archive; Encrypted archives not permitted (encrypted.zip)!
```

Specify *any other value* to return formatted text (i.e., the scan results seen when using CLI).

*Example output:*

```
string(1826) "Fri, 17 Jul 2020 18:50:47 +0800 Started.
─→ Checking "ascii_standard_testfile.txt".
──→ Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
─→ Checking "coex_testfile.rtf".
──→ Detected phpMussel-Testfile.CoEx (coex_testfile.rtf)!
─→ Checking "encrypted.zip".
──→ Detected encrypted archive; Encrypted archives not permitted (encrypted.zip)!
─→ Checking "exe_standard_testfile.exe".
──→ Filetype blacklisted (exe_standard_testfile.exe)!
─→ Checking "general_standard_testfile.txt".
──→ Detected phpMussel-Testfile.General.Standard (general_standard_testfile.txt)!
─→ Checking "graphics_standard_testfile.gif".
──→ Detected phpMussel-Testfile.Graphics.Standard (graphics_standard_testfile.gif)!
─→ Checking "hash_testfile_md5.txt".
──→ Detected phpMussel-Testfile.HASH.MD5 (hash_testfile_md5.txt)!
─→ Checking "hash_testfile_sha1.txt".
──→ Detected phpMussel-Testfile.HASH.SHA1 (hash_testfile_sha1.txt)!
─→ Checking "hash_testfile_sha256.txt".
──→ Detected phpMussel-Testfile.HASH.SHA256 (hash_testfile_sha256.txt)!
─→ Checking "hello.txt".
──→ No problems found.
─→ Checking "html_standard_testfile.html".
──→ Detected phpMussel-Testfile.HTML.Standard (html_standard_testfile.html)!
─→ Checking "ole_testfile.ole".
────→ Detected phpMussel-Testfile.OLE.Standard (ole_testfile.bin)!
─→ Checking "pdf_standard_testfile.pdf".
──→ Detected phpMussel-Testfile.PDF.Standard (pdf_standard_testfile.pdf)!
─→ Checking "pe_sectional_testfile.exe".
──→ Filetype blacklisted (pe_sectional_testfile.exe)!
─→ Checking "swf_standard_testfile.swf".
──→ Detected phpMussel-Testfile.SWF.Standard (swf_standard_testfile.swf)!
Fri, 17 Jul 2020 18:50:50 +0800 Finished.
"
```

*See also: [How to access specific details about files when they are scanned?](#user-content-SCAN_DEBUGGING)*

#### 3.6 TWO-FACTOR AUTHENTICATION

It's possible to make the front-end more secure by enabling two-factor authentication ("2FA"). When logging into a 2FA-enabled account, an email is sent to the email address associated with that account. This email contains a "2FA code", which the user must then enter, in addition to the username and password, in order to be able to log in using that account. This means that obtaining an account password would not be enough for any hacker or potential attacker to be able to log into that account, as they would also need to already have access to the email address associated with that account in order to be able to receive and utilise the 2FA code associated with the session, thus making the front-end more secure.

After you've installed PHPMailer, you'll need to populate the configuration directives for PHPMailer via the phpMussel configuration page or configuration file. More information about these configuration directives is included in the configuration section of this document. After you've populated the PHPMailer configuration directives, set `enable_two_factor` to `true`. Two-factor authentication should now be enabled.

Next, you'll need to associate an email address with an account, so that phpMussel knows where to send 2FA codes when logging in with that account. To do this, use the email address as the username for the account (like `foo@bar.tld`), or include the email address as part of the username in the same way that you would when sending an email normally (like `Foo Bar <foo@bar.tld>`).

---


### 4. <a name="SECTION4"></a>EXTENDING PHPMUSSEL

phpMussel is designed with extensibility in mind. Pull requests to any of the repositories at the phpMussel organisation, and [contributions](https://github.com/phpMussel/.github/blob/master/CONTRIBUTING.md) in general, are always welcome. However, if you need to modify or extend phpMussel in ways which aren't suitable for contributing back those particular repositories, that is definitely possible to do (e.g., for modifications or extensions which are specific to your particular implementation, which can't be publicised due to confidentiality or privacy needs at your organisation, or which might be preferably publicised at their own repository, such as for plugins and new Composer packages which require phpMussel).

Since v3, all phpMussel functionality exists as classes, which means that in some cases, the [object inheritance](https://www.php.net/manual/en/language.oop5.inheritance.php) mechanisms provided by PHP could be an easy and appropriate way to extend phpMussel.

phpMussel also provides its own mechanisms for extensibility. Prior to v3, the preferred mechanism was the integrated plugin system for phpMussel. Since v3, the preferred mechanism is the events orchestrator.

Boilerplate code for extending phpMussel and for writing new plugins is publicly available at the [boilerplates repository](https://github.com/phpMussel/plugin-boilerplates). Included also is a list of all [currently supported events](https://github.com/phpMussel/plugin-boilerplates/tree/master/boilerplate-v3#currently-supported-events) and more detailed instructions regarding how to use the boilerplate code.

You'll notice that the structure of the v3 boilerplate code is identical to the structure of the various phpMussel v3 repositories at the phpMussel organisation. That is not a coincidence. Whenever possible, I would recommend utilising the v3 boilerplate code for extensibility purposes, and utilising similar design principles to that of phpMussel v3 itself. If you choose to publicise your new extension or plugin, you can integrate Composer support for it, and it should then be theoretically possible for others to utilise your extension or plugin in the exact same way as phpMussel v3 itself, simply requiring it in along with their other Composer dependencies, and applying any necessary event handlers at their implementation. (Of course, don't forget to include instructions with your publications, so that others will know about any necessary event handlers that may exist, and any other information which may be necessary for correct installation and utilisation of your publication).

---


### 5. <a name="SECTION5"></a>CONFIGURATION OPTIONS

The following is a list of the configuration directives accepted by phpMussel, along with a description of their purpose and function.

```
Configuration (v3)
│
├───core
│       scan_log [string]
│       scan_log_serialized [string]
│       error_log [string]
│       outbound_request_log [string]
│       truncate [string]
│       log_rotation_limit [int]
│       log_rotation_action [string]
│       timezone [string]
│       time_offset [int]
│       time_format [string]
│       ipaddr [string]
│       delete_on_sight [bool]
│       lang [string]
│       lang_override [bool]
│       scan_cache_expiry [int]
│       maintenance_mode [bool]
│       statistics [bool]
│       hide_version [bool]
│       disabled_channels [string]
│       default_timeout [int]
├───signatures
│       active [string]
│       fail_silently [bool]
│       fail_extensions_silently [bool]
│       detect_adware [bool]
│       detect_joke_hoax [bool]
│       detect_pua_pup [bool]
│       detect_packer_packed [bool]
│       detect_shell [bool]
│       detect_deface [bool]
│       detect_encryption [bool]
│       heuristic_threshold [int]
├───files
│       filesize_limit [string]
│       filesize_response [bool]
│       filetype_whitelist [string]
│       filetype_blacklist [string]
│       filetype_greylist [string]
│       check_archives [bool]
│       filesize_archives [bool]
│       filetype_archives [bool]
│       max_recursion [int]
│       block_encrypted_archives [bool]
│       max_files_in_archives [int]
│       chameleon_from_php [bool]
│       can_contain_php_file_extensions [string]
│       chameleon_from_exe [bool]
│       chameleon_to_archive [bool]
│       chameleon_to_doc [bool]
│       chameleon_to_img [bool]
│       chameleon_to_pdf [bool]
│       archive_file_extensions [string]
│       block_control_characters [bool]
│       corrupted_exe [bool]
│       decode_threshold [string]
│       scannable_threshold [string]
│       allow_leading_trailing_dots [bool]
│       block_macros [bool]
│       only_allow_images [bool]
│       entropy_limit [float]
│       entropy_filesize_limit [string]
├───quarantine
│       quarantine_key [string]
│       quarantine_max_filesize [string]
│       quarantine_max_usage [string]
│       quarantine_max_files [int]
├───virustotal
│       vt_public_api_key [string]
│       vt_suspicion_level [int]
│       vt_weighting [int]
│       vt_quota_rate [int]
│       vt_quota_time [int]
├───urlscanner
│       google_api_key [string]
│       maximum_api_lookups [int]
│       maximum_api_lookups_response [bool]
│       cache_time [int]
├───legal
│       pseudonymise_ip_addresses [bool]
│       privacy_policy [string]
├───supplementary_cache_options
│       prefix [string]
│       enable_apcu [bool]
│       enable_memcached [bool]
│       enable_redis [bool]
│       enable_pdo [bool]
│       memcached_host [string]
│       memcached_port [int]
│       redis_host [string]
│       redis_port [int]
│       redis_timeout [float]
│       redis_database_number [int]
│       pdo_dsn [string]
│       pdo_username [string]
│       pdo_password [string]
├───frontend
│       frontend_log [string]
│       max_login_attempts [int]
│       numbers [string]
│       default_algo [string]
│       theme [string]
│       magnification [float]
│       custom_header [string]
│       custom_footer [string]
├───web
│       uploads_log [string]
│       forbid_on_block [bool]
│       unsupported_media_type_header [bool]
│       max_uploads [int]
│       ignore_upload_errors [bool]
│       theme [string]
│       magnification [float]
│       custom_header [string]
│       custom_footer [string]
└───phpmailer
        event_log [string]
        enable_two_factor [bool]
        enable_notifications [string]
        skip_auth_process [bool]
        host [string]
        port [int]
        smtp_secure [string]
        smtp_auth [bool]
        username [string]
        password [string]
        set_from_address [string]
        set_from_name [string]
        add_reply_to_address [string]
        add_reply_to_name [string]
```

#### "core" (Category)
General configuration (any core configuration not belonging to other categories).

##### "scan_log" `[string]`
- The name of the file to log all scanning results to. Specify a filename, or leave blank to disable.

Useful tip: You can attach date/time information to the names of log files by using time format placeholders. Available time format placeholders are displayed at <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "scan_log_serialized" `[string]`
- The name of the file to log all scanning results to (using a serialised format). Specify a filename, or leave blank to disable.

Useful tip: You can attach date/time information to the names of log files by using time format placeholders. Available time format placeholders are displayed at <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "error_log" `[string]`
- A file for logging any non-fatal errors detected. Specify a filename, or leave blank to disable.

Useful tip: You can attach date/time information to the names of log files by using time format placeholders. Available time format placeholders are displayed at <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "outbound_request_log" `[string]`
- A file for logging the results of any outbound requests. Specify a filename, or leave blank to disable.

Useful tip: You can attach date/time information to the names of log files by using time format placeholders. Available time format placeholders are displayed at <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "truncate" `[string]`
- Truncate log files when they reach a certain size? Value is the maximum size in B/KB/MB/GB/TB that a log file may grow to before being truncated. The default value of 0KB disables truncation (log files can grow indefinitely). Note: Applies to individual log files! The size of log files is not considered collectively.

##### "log_rotation_limit" `[int]`
- Log rotation limits the number of log files that should exist at any one time. When new log files are created, if the total number of log files exceeds the specified limit, the specified action will be performed. You can specify the desired limit here. A value of 0 will disable log rotation.

##### "log_rotation_action" `[string]`
- Log rotation limits the number of log files that should exist at any one time. When new log files are created, if the total number of log files exceeds the specified limit, the specified action will be performed. You can specify the desired action here.

```
log_rotation_action
├─Delete ("Delete the oldest log files, until the limit is no longer exceeded.")
└─Archive ("Firstly archive, and then delete the oldest log files, until the limit is no longer exceeded.")
```

##### "timezone" `[string]`
- This is used to specify the timezone to use (e.g., Africa/Cairo, America/New_York, Asia/Tokyo, Australia/Perth, Europe/Berlin, Pacific/Guam, etc). Specify "SYSTEM" to let PHP handle this for you automatically.

```
timezone
├─SYSTEM ("Use system default timezone.")
├─UTC ("UTC")
└─…Other
```

##### "time_offset" `[int]`
- Timezone offset in minutes.

##### "time_format" `[string]`
- The date/time notation format used by phpMussel. Additional options may be added upon request.

```
time_format
├─{Day}, {dd} {Mon} {yyyy} {hh}:{ii}:{ss} {tz} ("{Day}, {dd} {Mon} {yyyy} {hh}:{ii}:{ss} {tz}")
├─{Day}, {dd} {Mon} {yyyy} {hh}:{ii}:{ss} ("{Day}, {dd} {Mon} {yyyy} {hh}:{ii}:{ss}")
├─{Day}, {dd} {Mon} {yyyy} ("{Day}, {dd} {Mon} {yyyy}")
├─{yyyy}.{mm}.{dd} {hh}:{ii}:{ss} {tz} ("{yyyy}.{mm}.{dd} {hh}:{ii}:{ss} {tz}")
├─{yyyy}.{mm}.{dd} {hh}:{ii}:{ss} ("{yyyy}.{mm}.{dd} {hh}:{ii}:{ss}")
├─{yyyy}.{mm}.{dd} ("{yyyy}.{mm}.{dd}")
├─{yyyy}-{mm}-{dd} {hh}:{ii}:{ss} {tz} ("{yyyy}-{mm}-{dd} {hh}:{ii}:{ss} {tz}")
├─{yyyy}-{mm}-{dd} {hh}:{ii}:{ss} ("{yyyy}-{mm}-{dd} {hh}:{ii}:{ss}")
├─{yyyy}-{mm}-{dd} ("{yyyy}-{mm}-{dd}")
├─{yyyy}/{mm}/{dd} {hh}:{ii}:{ss} {tz} ("{yyyy}/{mm}/{dd} {hh}:{ii}:{ss} {tz}")
├─{yyyy}/{mm}/{dd} {hh}:{ii}:{ss} ("{yyyy}/{mm}/{dd} {hh}:{ii}:{ss}")
├─{yyyy}/{mm}/{dd} ("{yyyy}/{mm}/{dd}")
├─{dd}.{mm}.{yyyy} {hh}:{ii}:{ss} {tz} ("{dd}.{mm}.{yyyy} {hh}:{ii}:{ss} {tz}")
├─{dd}.{mm}.{yyyy} {hh}:{ii}:{ss} ("{dd}.{mm}.{yyyy} {hh}:{ii}:{ss}")
├─{dd}.{mm}.{yyyy} ("{dd}.{mm}.{yyyy}")
├─{dd}-{mm}-{yyyy} {hh}:{ii}:{ss} {tz} ("{dd}-{mm}-{yyyy} {hh}:{ii}:{ss} {tz}")
├─{dd}-{mm}-{yyyy} {hh}:{ii}:{ss} ("{dd}-{mm}-{yyyy} {hh}:{ii}:{ss}")
├─{dd}-{mm}-{yyyy} ("{dd}-{mm}-{yyyy}")
├─{dd}/{mm}/{yyyy} {hh}:{ii}:{ss} {tz} ("{dd}/{mm}/{yyyy} {hh}:{ii}:{ss} {tz}")
├─{dd}/{mm}/{yyyy} {hh}:{ii}:{ss} ("{dd}/{mm}/{yyyy} {hh}:{ii}:{ss}")
├─{dd}/{mm}/{yyyy} ("{dd}/{mm}/{yyyy}")
├─{mm}.{dd}.{yyyy} {hh}:{ii}:{ss} {tz} ("{mm}.{dd}.{yyyy} {hh}:{ii}:{ss} {tz}")
├─{mm}.{dd}.{yyyy} {hh}:{ii}:{ss} ("{mm}.{dd}.{yyyy} {hh}:{ii}:{ss}")
├─{mm}.{dd}.{yyyy} ("{mm}.{dd}.{yyyy}")
├─{mm}-{dd}-{yyyy} {hh}:{ii}:{ss} {tz} ("{mm}-{dd}-{yyyy} {hh}:{ii}:{ss} {tz}")
├─{mm}-{dd}-{yyyy} {hh}:{ii}:{ss} ("{mm}-{dd}-{yyyy} {hh}:{ii}:{ss}")
├─{mm}-{dd}-{yyyy} ("{mm}-{dd}-{yyyy}")
├─{mm}/{dd}/{yyyy} {hh}:{ii}:{ss} {tz} ("{mm}/{dd}/{yyyy} {hh}:{ii}:{ss} {tz}")
├─{mm}/{dd}/{yyyy} {hh}:{ii}:{ss} ("{mm}/{dd}/{yyyy} {hh}:{ii}:{ss}")
├─{mm}/{dd}/{yyyy} ("{mm}/{dd}/{yyyy}")
├─{yy}.{mm}.{dd} {hh}:{ii}:{ss} {tz} ("{yy}.{mm}.{dd} {hh}:{ii}:{ss} {tz}")
├─{yy}.{mm}.{dd} {hh}:{ii}:{ss} ("{yy}.{mm}.{dd} {hh}:{ii}:{ss}")
├─{yy}.{mm}.{dd} ("{yy}.{mm}.{dd}")
├─{yy}-{mm}-{dd} {hh}:{ii}:{ss} {tz} ("{yy}-{mm}-{dd} {hh}:{ii}:{ss} {tz}")
├─{yy}-{mm}-{dd} {hh}:{ii}:{ss} ("{yy}-{mm}-{dd} {hh}:{ii}:{ss}")
├─{yy}-{mm}-{dd} ("{yy}-{mm}-{dd}")
├─{yy}/{mm}/{dd} {hh}:{ii}:{ss} {tz} ("{yy}/{mm}/{dd} {hh}:{ii}:{ss} {tz}")
├─{yy}/{mm}/{dd} {hh}:{ii}:{ss} ("{yy}/{mm}/{dd} {hh}:{ii}:{ss}")
├─{yy}/{mm}/{dd} ("{yy}/{mm}/{dd}")
├─{dd}.{mm}.{yy} {hh}:{ii}:{ss} {tz} ("{dd}.{mm}.{yy} {hh}:{ii}:{ss} {tz}")
├─{dd}.{mm}.{yy} {hh}:{ii}:{ss} ("{dd}.{mm}.{yy} {hh}:{ii}:{ss}")
├─{dd}.{mm}.{yy} ("{dd}.{mm}.{yy}")
├─{dd}-{mm}-{yy} {hh}:{ii}:{ss} {tz} ("{dd}-{mm}-{yy} {hh}:{ii}:{ss} {tz}")
├─{dd}-{mm}-{yy} {hh}:{ii}:{ss} ("{dd}-{mm}-{yy} {hh}:{ii}:{ss}")
├─{dd}-{mm}-{yy} ("{dd}-{mm}-{yy}")
├─{dd}/{mm}/{yy} {hh}:{ii}:{ss} {tz} ("{dd}/{mm}/{yy} {hh}:{ii}:{ss} {tz}")
├─{dd}/{mm}/{yy} {hh}:{ii}:{ss} ("{dd}/{mm}/{yy} {hh}:{ii}:{ss}")
├─{dd}/{mm}/{yy} ("{dd}/{mm}/{yy}")
├─{mm}.{dd}.{yy} {hh}:{ii}:{ss} {tz} ("{mm}.{dd}.{yy} {hh}:{ii}:{ss} {tz}")
├─{mm}.{dd}.{yy} {hh}:{ii}:{ss} ("{mm}.{dd}.{yy} {hh}:{ii}:{ss}")
├─{mm}.{dd}.{yy} ("{mm}.{dd}.{yy}")
├─{mm}-{dd}-{yy} {hh}:{ii}:{ss} {tz} ("{mm}-{dd}-{yy} {hh}:{ii}:{ss} {tz}")
├─{mm}-{dd}-{yy} {hh}:{ii}:{ss} ("{mm}-{dd}-{yy} {hh}:{ii}:{ss}")
├─{mm}-{dd}-{yy} ("{mm}-{dd}-{yy}")
├─{mm}/{dd}/{yy} {hh}:{ii}:{ss} {tz} ("{mm}/{dd}/{yy} {hh}:{ii}:{ss} {tz}")
├─{mm}/{dd}/{yy} {hh}:{ii}:{ss} ("{mm}/{dd}/{yy} {hh}:{ii}:{ss}")
├─{mm}/{dd}/{yy} ("{mm}/{dd}/{yy}")
├─{yyyy}年{m}月{d}日 {hh}時{ii}分{ss}秒 ("{yyyy}年{m}月{d}日 {hh}時{ii}分{ss}秒")
├─{yyyy}年{m}月{d}日 {hh}:{ii}:{ss} {tz} ("{yyyy}年{m}月{d}日 {hh}:{ii}:{ss} {tz}")
├─{yyyy}年{m}月{d}日 ("{yyyy}年{m}月{d}日")
├─{yy}年{m}月{d}日 {hh}時{ii}分{ss}秒 ("{yy}年{m}月{d}日 {hh}時{ii}分{ss}秒")
├─{yy}年{m}月{d}日 {hh}:{ii}:{ss} {tz} ("{yy}年{m}月{d}日 {hh}:{ii}:{ss} {tz}")
├─{yy}年{m}月{d}日 ("{yy}年{m}月{d}日")
├─{yyyy}년 {m}월 {d}일 {hh}시 {ii}분 {ss}초 ("{yyyy}년 {m}월 {d}일 {hh}시 {ii}분 {ss}초")
├─{yyyy}년 {m}월 {d}일 {hh}:{ii}:{ss} {tz} ("{yyyy}년 {m}월 {d}일 {hh}:{ii}:{ss} {tz}")
├─{yyyy}년 {m}월 {d}일 ("{yyyy}년 {m}월 {d}일")
├─{yy}년 {m}월 {d}일 {hh}시 {ii}분 {ss}초 ("{yy}년 {m}월 {d}일 {hh}시 {ii}분 {ss}초")
├─{yy}년 {m}월 {d}일 {hh}:{ii}:{ss} {tz} ("{yy}년 {m}월 {d}일 {hh}:{ii}:{ss} {tz}")
├─{yy}년 {m}월 {d}일 ("{yy}년 {m}월 {d}일")
├─{yyyy}-{mm}-{dd}T{hh}:{ii}:{ss}{t:z} ("{yyyy}-{mm}-{dd}T{hh}:{ii}:{ss}{t:z}")
├─{d}. {m}. {yyyy} ("{d}. {m}. {yyyy}")
└─…Other
```

__*Placeholder – Explanation – Example based on 2024-04-30T18:27:49+08:00.*__<br />
`{yyyy}` – The year – E.g., 2024.<br />
`{yy}` – The abbreviated year – E.g., 24.<br />
`{Mon}` – The abbreviated name of the month (in English) – E.g., Apr.<br />
`{mm}` – The month with leading zeros – E.g., 04.<br />
`{m}` – The month – E.g., 4.<br />
`{Day}` – The abbreviated name of the day (in English) – E.g., Tue.<br />
`{dd}` – The day with leading zeros – E.g., 30.<br />
`{d}` – The day – E.g., 30.<br />
`{hh}` – The hour with leading zeros (uses 24-hour time) – E.g., 18.<br />
`{h}` – The hour (uses 24-hour time) – E.g., 18.<br />
`{ii}` – The minute with leading zeros – E.g., 27.<br />
`{i}` – The minute – E.g., 27.<br />
`{ss}` – The second with leading zeros – E.g., 49.<br />
`{s}` – The second – E.g., 49.<br />
`{tz}` – The timezone (without colon) – E.g., +0800.<br />
`{t:z}` – The timezone (with colon) – E.g., +08:00.

##### "ipaddr" `[string]`
- Where to find the IP address of connecting requests? (Useful for services such as Cloudflare). Default = REMOTE_ADDR. WARNING: Don't change this unless you know what you're doing!

```
ipaddr
├─HTTP_INCAP_CLIENT_IP ("HTTP_INCAP_CLIENT_IP (Incapsula)")
├─HTTP_CF_CONNECTING_IP ("HTTP_CF_CONNECTING_IP (Cloudflare)")
├─CF-Connecting-IP ("CF-Connecting-IP (Cloudflare)")
├─HTTP_X_FORWARDED_FOR ("HTTP_X_FORWARDED_FOR (Cloudbric)")
├─X-Forwarded-For ("X-Forwarded-For (Squid)")
├─Forwarded ("Forwarded")
├─REMOTE_ADDR ("REMOTE_ADDR (Default)")
└─…Other
```

See also:
- [NGINX Reverse Proxy](https://docs.nginx.com/nginx/admin-guide/web-server/reverse-proxy/)
- [Squid configuration directive forwarded_for](http://www.squid-cache.org/Doc/config/forwarded_for/)
- [Forwarded - HTTP \| MDN](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Forwarded)

##### "delete_on_sight" `[bool]`
- Enabling this directive will instruct the script to attempt to immediately delete any scanned attempted file upload matching any detection criteria, whether via signatures or otherwise. Files determined to be "clean" won't be touched. In the case of archives, the entire archive will be deleted, regardless of whether or not the offending file is only one of several files contained within the archive. For the case of file upload scanning, usually, it isn't necessary to enable this directive, because usually, PHP will automatically purge the contents of its cache when execution has finished, meaning it'll usually delete any files uploaded through it to the server unless they've been moved, copied or deleted already. This directive is added here as an extra measure of security for those whose copies of PHP mightn't always behave in the manner expected. False = After scanning, leave the file alone [Default]; True = After scanning, if not clean, delete immediately.

##### "lang" `[string]`
- Specify the default language for phpMussel.

```
lang
├─af ("Afrikaans")
├─ar ("العربية")
├─bg ("Български")
├─bn ("বাংলা")
├─bs ("Bosanski")
├─ca ("Català")
├─cs ("Čeština")
├─de ("Deutsch")
├─en ("English (AU/GB/NZ)")
├─en-CA ("English (CA)")
├─en-US ("English (US)")
├─es ("Español")
├─fa ("فارسی")
├─fr ("Français (FR)")
├─fr-CA ("Français (CA)")
├─gl ("Galego")
├─gu ("ગુજરાતી")
├─he ("עברית")
├─hi ("हिंदी")
├─hr ("Hrvatski")
├─id ("Bahasa Indonesia")
├─it ("Italiano")
├─ja ("日本語")
├─ko ("한국어")
├─lv ("Latviešu")
├─ml ("മലയാളം")
├─mr ("मराठी")
├─ms ("Bahasa Melayu")
├─nl ("Nederlandse")
├─no ("Norsk")
├─pa ("ਪੰਜਾਬੀ")
├─pl ("Polski")
├─pt-BR ("Português (Brasil)")
├─pt-PT ("Português (Europeu)")
├─ro ("Română")
├─ru ("Русский")
├─sv ("Svenska")
├─sr ("Српски")
├─ta ("தமிழ்")
├─th ("ภาษาไทย")
├─tr ("Türkçe")
├─uk ("Українська")
├─ur ("اردو")
├─vi ("Tiếng Việt")
├─zh-Hans ("中文（简体）")
└─zh-Hant ("中文（傳統）")
```

##### "lang_override" `[bool]`
- Localise according to HTTP_ACCEPT_LANGUAGE whenever possible? True = Yes [Default]; False = No.

##### "scan_cache_expiry" `[int]`
- For how long should phpMussel cache the results of scanning? Value is the number of seconds to cache the results of scanning for. Default is 21600 seconds (6 hours); A value of 0 will disable caching the results of scanning.

##### "maintenance_mode" `[bool]`
- Enable maintenance mode? True = Yes; False = No [Default]. Disables everything other than the front-end. Sometimes useful for when updating your CMS, frameworks, etc.

##### "statistics" `[bool]`
- Track phpMussel usage statistics? True = Yes; False = No [Default].

##### "hide_version" `[bool]`
- Hide version information from logs and page output? True = Yes; False = No [Default].

##### "disabled_channels" `[string]`
- This can be used to prevent phpMussel from using particular channels when sending requests.

```
disabled_channels
├─GitHub ("GitHub")
├─BitBucket ("BitBucket")
├─VirusTotal_HTTPS ("VirusTotal (HTTPS)")
└─VirusTotal_HTTP ("VirusTotal (HTTP)")
```

##### "default_timeout" `[int]`
- Default timeout to use for external requests? Default = 12 seconds.

#### "signatures" (Category)
Configuration for signatures, signature files, etc.

##### "active" `[string]`
- A list of the active signature files, delimited by commas. Note: Signature files must firstly be installed, before you can activate them. For the test files to work correctly, the signature files must be installed and activated.

##### "fail_silently" `[bool]`
- Should phpMussel report when signatures files are missing or corrupted? If `fail_silently` is disabled, missing and corrupted files will be reported on scanning, and if `fail_silently` is enabled, missing and corrupted files will be ignored, with scanning reporting for those files that there aren't any problems. This should generally be left alone unless you're experiencing crashes or similar problems. False = Disabled; True = Enabled [Default].

##### "fail_extensions_silently" `[bool]`
- Should phpMussel report when extensions are missing? If `fail_extensions_silently` is disabled, missing extensions will be reported on scanning, and if `fail_extensions_silently` is enabled, missing extensions will be ignored, with scanning reporting for those files that there aren't any problems. Disabling this directive may potentially increase your security, but may also lead to an increase of false positives. False = Disabled; True = Enabled [Default].

##### "detect_adware" `[bool]`
- Should phpMussel parse signatures for detecting adware? False = No; True = Yes [Default].

##### "detect_joke_hoax" `[bool]`
- Should phpMussel parse signatures for detecting joke/hoax malware/viruses? False = No; True = Yes [Default].

##### "detect_pua_pup" `[bool]`
- Should phpMussel parse signatures for detecting PUAs/PUPs? False = No; True = Yes [Default].

##### "detect_packer_packed" `[bool]`
- Should phpMussel parse signatures for detecting packers and packed data? False = No; True = Yes [Default].

##### "detect_shell" `[bool]`
- Should phpMussel parse signatures for detecting shell scripts? False = No; True = Yes [Default].

##### "detect_deface" `[bool]`
- Should phpMussel parse signatures for detecting defacements and defacers? False = No; True = Yes [Default].

##### "detect_encryption" `[bool]`
- Should phpMussel detect and block encrypted files? False = No; True = Yes [Default].

##### "heuristic_threshold" `[int]`
- Some phpMussel signatures are intended to identify suspicious and potentially malicious indicators in files, without in themselves identifying those files as being malicious directly. This "threshold" value tells phpMussel the maximum weight allowed before flagging those files as malicious. The definition of weight in this context is the total number of suspicious and potentially malicious indicators identified. By default, this value will be set to 3. A lower value generally will result in a higher occurrence of false positives but a higher number of malicious files being flagged, whereas a higher value generally will result in a lower occurrence of false positives but a lower number of malicious files being flagged. It's generally best to leave this value at its default unless you're experiencing problems related to it.

#### "files" (Category)
The specifics of how to handle files when scanning.

##### "filesize_limit" `[string]`
- Filesize limit in KB. 65536 = 64MB [Default]; 0 = No limit (always greylisted). Any (positive) numeric value accepted. This can be useful when your PHP configuration limits the amount of memory a process can hold or if your PHP configuration limits filesize of uploads.

##### "filesize_response" `[bool]`
- What to do with files that exceed the filesize limit (if one exists). False = Whitelist; True = Blacklist [Default].

##### "filetype_whitelist" `[string]`
- Whitelist:

__How this works.__ If your system allows only specific types of files to be uploaded, or if your system explicitly denies certain types of files, specifying those filetypes in whitelists, blacklists, and greylists can increase the speed at which scanning is performed by allowing the script to skip over certain filetypes. Format is CSV (comma separated values).

__Logical order of processing.__ If the filetype is whitelisted, don't scan and don't block the file, and don't check the file against the blacklist or the greylist. If the filetype is blacklisted, don't scan the file but block it anyway, and don't check the file against the greylist. If the greylist is empty or if the greylist is not empty and the filetype is greylisted, scan the file as per normal and determine whether to block it based on the results of the scan, but if the greylist is not empty and the filetype is not greylisted, treat the file as blacklisted, therefore not scanning it but blocking it anyway.

##### "filetype_blacklist" `[string]`
- Blacklist:

__How this works.__ If your system allows only specific types of files to be uploaded, or if your system explicitly denies certain types of files, specifying those filetypes in whitelists, blacklists, and greylists can increase the speed at which scanning is performed by allowing the script to skip over certain filetypes. Format is CSV (comma separated values).

__Logical order of processing.__ If the filetype is whitelisted, don't scan and don't block the file, and don't check the file against the blacklist or the greylist. If the filetype is blacklisted, don't scan the file but block it anyway, and don't check the file against the greylist. If the greylist is empty or if the greylist is not empty and the filetype is greylisted, scan the file as per normal and determine whether to block it based on the results of the scan, but if the greylist is not empty and the filetype is not greylisted, treat the file as blacklisted, therefore not scanning it but blocking it anyway.

##### "filetype_greylist" `[string]`
- Greylist:

__How this works.__ If your system allows only specific types of files to be uploaded, or if your system explicitly denies certain types of files, specifying those filetypes in whitelists, blacklists, and greylists can increase the speed at which scanning is performed by allowing the script to skip over certain filetypes. Format is CSV (comma separated values).

__Logical order of processing.__ If the filetype is whitelisted, don't scan and don't block the file, and don't check the file against the blacklist or the greylist. If the filetype is blacklisted, don't scan the file but block it anyway, and don't check the file against the greylist. If the greylist is empty or if the greylist is not empty and the filetype is greylisted, scan the file as per normal and determine whether to block it based on the results of the scan, but if the greylist is not empty and the filetype is not greylisted, treat the file as blacklisted, therefore not scanning it but blocking it anyway.

##### "check_archives" `[bool]`
- Attempt to check the contents of archives? False = Don't check; True = Check [Default]. Supported: Zip (requires libzip), Tar, Rar (requires the rar extension).

##### "filesize_archives" `[bool]`
- Carry over filesize blacklisting/whitelisting to the contents of archives? False = No (just greylist everything); True = Yes [Default].

##### "filetype_archives" `[bool]`
- Carry over filetype blacklisting/whitelisting to the contents of archives? False = No (just greylist everything) [Default]; True = Yes.

##### "max_recursion" `[int]`
- Maximum recursion depth limit for archives. Default = 3.

##### "block_encrypted_archives" `[bool]`
- Detect and block encrypted archives? Because phpMussel isn't able to scan the contents of encrypted archives, it's possible that archive encryption may be employed by an attacker as a means of attempting to bypass phpMussel, anti-virus scanners and other such protections. Instructing phpMussel to block any archives that it discovers to be encrypted could potentially help reduce any risk associated with these such possibilities. False = No; True = Yes [Default].

##### "max_files_in_archives" `[int]`
- Maximum number of files to scan from within archives before aborting the scan. Default = 0 (no maximum).

##### "chameleon_from_php" `[bool]`
- Search for PHP headers in files that are neither PHP files nor recognised archives. False = Off; True = On.

##### "can_contain_php_file_extensions" `[string]`
- A list of file extensions allowed to contain PHP code, separated by commas. If PHP chameleon attack detection is enabled, files that contain PHP code, which have extensions that aren't on this list, will be detected as PHP chameleon attacks.

##### "chameleon_from_exe" `[bool]`
- Search for executable headers in files that are neither executables nor recognised archives and for executables whose headers are incorrect. False = Off; True = On.

##### "chameleon_to_archive" `[bool]`
- Detect incorrect headers in archives and compressed files. Supported: BZ/BZIP2, GZ/GZIP, LZF, RAR, ZIP. False = Off; True = On.

##### "chameleon_to_doc" `[bool]`
- Search for office documents whose headers are incorrect (Supported: DOC, DOT, PPS, PPT, XLA, XLS, WIZ). False = Off; True = On.

##### "chameleon_to_img" `[bool]`
- Search for images whose headers are incorrect (Supported: BMP, DIB, PNG, GIF, JPEG, JPG, XCF, PSD, PDD, WEBP). False = Off; True = On.

##### "chameleon_to_pdf" `[bool]`
- Search for PDF files whose headers are incorrect. False = Off; True = On.

##### "archive_file_extensions" `[string]`
- Recognised archive file extensions (format is CSV; should only add or remove when problems occur; unnecessarily removing may cause false positives to appear for archive files, whereas unnecessarily adding will essentially whitelist what you're adding from attack specific detection; modify with caution; also note that this has no effect on what archives can and can't be analysed at content-level). The list, as is at default, lists those formats used most commonly across the majority of systems and CMS, but intentionally isn't necessarily comprehensive.

##### "block_control_characters" `[bool]`
- Block any files containing any control characters (other than newlines)? If you're __*ONLY*__ uploading plain-text, then you can turn this option on to provide some additional protection to your system. However, if you upload anything other than plain-text, turning this on may result in false positives. False = Don't block [Default]; True = Block.

##### "corrupted_exe" `[bool]`
- Corrupted files and parse errors. False = Ignore; True = Block [Default]. Detect and block potentially corrupted PE (Portable Executable) files? Often (but not always), when certain aspects of a PE file are corrupted or can't be parsed correctly, it can be indicative of a viral infection. The processes used by most anti-virus programs to detect viruses in PE files require parsing those files in certain ways, which, if the programmer of a virus is aware of, will specifically try to prevent, in order to allow their virus to remain undetected.

##### "decode_threshold" `[string]`
- Threshold for the length of raw data within which decode commands should be detected (in case there are any noticeable performance issues while scanning). Default = 512KB. Zero or null disables the threshold (removing any such limitation based on filesize).

##### "scannable_threshold" `[string]`
- Threshold to the length of raw data that phpMussel is permitted to read and scan (in case there are any noticeable performance issues while scanning). Default = 32MB. Zero or null value disables the threshold. Generally, this value shouldn't be less than the average filesize of file uploads that you want and expect to receive to your server or website, shouldn't be more than the filesize_limit directive, and shouldn't be more than roughly one fifth of the total allowable memory allocation granted to PHP via the "php.ini" configuration file. This directive exists to try to prevent phpMussel from using up too much memory (that'd prevent it from being able to successfully scan files above a certain filesize).

##### "allow_leading_trailing_dots" `[bool]`
- Allow leading and trailing dots in filenames? This can sometimes be used to hide files, or to trick some systems into allowing directory traversal. False = Don't allow [Default]. True = Allow.

##### "block_macros" `[bool]`
- Try to block any files containing macros? Some types of documents and spreadsheets may contain executable macros, thus providing a dangerous potential malware vector. False = Don't block [Default]; True = Block.

##### "only_allow_images" `[bool]`
- When set to true, any files encountered by the scanner which aren't images will be flagged immediately, without being scanned. This may help reduce the time needed to complete a scan in some cases. Set to false by default.

##### "entropy_limit" `[float]`
- The entropy limit for signatures that use normalised data (default is 7.7). In this context, entropy is defined as the shannon entropy of the content of the file being scanned. When both the entropy limit and the entropy filesize limit are exceeded, in order to reduce the risk of false positives, some signatures which use normalised data will be ignored.

##### "entropy_filesize_limit" `[string]`
- The entropy filesize limit for signatures that use normalised data (default is 256KB). When both the entropy limit and the entropy filesize limit are exceeded, in order to reduce the risk of false positives, some signatures which use normalised data will be ignored.

#### "quarantine" (Category)
Configuration for the quarantine.

##### "quarantine_key" `[string]`
- phpMussel is able to quarantine blocked file uploads, if this is something you want it to do. Casual users of phpMussel that simply wish to protect their websites or hosting environment without having any interest in deeply analysing any flagged attempted file uploads should leave this functionality disabled, but any users interested in further analysis of flagged attempted file uploads for malware research or for similar such things should enable this functionality. Quarantining of flagged attempted file uploads can sometimes also assist in debugging false positives, if this is something that frequently occurs for you. To disable quarantine functionality, simply leave the `quarantine_key` directive empty, or erase the contents of that directive if it isn't already empty. To enable quarantine functionality, enter some value into the directive. The `quarantine_key` is an important security feature of the quarantine functionality required as a means of preventing the quarantine functionality from being exploited by potential attackers and as a means of preventing any potential execution of data stored within the quarantine. The `quarantine_key` should be treated in the same manner as your passwords: The longer the better, and guard it tightly. For best effect, use in conjunction with `delete_on_sight`.

##### "quarantine_max_filesize" `[string]`
- The maximum filesize allowed for files to be quarantined. Files larger than the value specified will NOT be quarantined. This directive is important as a means of making it more difficult for any potential attackers to flood your quarantine with unwanted data potentially causing run-away data usage on your hosting service. Default = 2MB.

##### "quarantine_max_usage" `[string]`
- The maximum memory usage allowed for the quarantine. If the total memory used by the quarantine reaches this value, the oldest quarantined files will be deleted until the total memory used no longer reaches this value. This directive is important as a means of making it more difficult for any potential attackers to flood your quarantine with unwanted data potentially causing run-away data usage on your hosting service. Default = 64MB.

##### "quarantine_max_files" `[int]`
- The maximum number of files that can exist in the quarantine. When new files are added to the quarantine, if this number is exceeded, old files will be deleted until the remainder no longer exceeds this number. Default = 100.

#### "virustotal" (Category)
Configuration for Virus Total integration.

##### "vt_public_api_key" `[string]`
- Optionally, phpMussel is able to scan files using the Virus Total API as a way to provide a greatly enhanced level of protection against viruses, trojans, malware and other threats. By default, scanning files using the Virus Total API is disabled. To enable it, an API key from Virus Total is required. Due to the significant benefit that this could provide to you, it's something that I highly recommend enabling. Please be aware, however, that to use the Virus Total API, you __*MUST*__ agree to their Terms of Service and you __*MUST*__ adhere to all guidelines as per described by the Virus Total documentation! You are NOT permitted to use this integration feature UNLESS: You have read and agree to the Terms of Service of Virus Total and its API. You have read and you understand, at a minimum, the preamble of the Virus Total Public API documentation (everything after "VirusTotal Public API v2.0" but before "Contents").

See also:
- [Terms of Service](https://www.virustotal.com/en/about/terms-of-service/)
- [Getting started](https://developers.virustotal.com/reference)

##### "vt_suspicion_level" `[int]`
- By default, phpMussel will restrict which files it scans using the Virus Total API to those files that it considers "suspicious". You can optionally adjust this restriction by changing the value of the `vt_suspicion_level` directive.

```
vt_suspicion_level
├─0 (Scan only files with heuristic weight.): Files will be scanned only if they incur some heuristic weight. Heuristic
│ weight can be incurred from signatures intended to catch common fingerprints
│ associated with potential infection which don't necessarily guarantee
│ infection. The lookup, in such cases, can serve to provide a second opinion
│ for results which justify suspicion but don't otherwise provide any
│ certainty.
├─1 (Scan files with heuristic weight, executable files, and files potentially containing executable data.): Examples of executable files, and files potentially containing executable
│ data, includes Windows PE files, Linux ELF files, Mach-O files, DOCX files,
│ ZIP files, etc.
└─2 (Scan all files.)
```

##### "vt_weighting" `[int]`
- Should phpMussel apply the results of scanning using the Virus Total API as detections or as detection weighting? This directive exists, because, although scanning a file using multiple engines (as Virus Total does) should result in an increased detection rate (and therefore in a higher number of malicious files being caught), it can also result in a higher number of false positives, and therefore, in some circumstances, it may be better to use the results of the scan as a confidence score rather than as a definitive conclusion. If a value of 0 is used, the results of scanning using the Virus Total API will be applied as detections, and therefore, if any engine used by Virus Total flags the file being scanned as being malicious, phpMussel will consider the file to be malicious. If any other value is used, the results of scanning using the Virus Total API will be applied as detection weighting, and therefore, the number of engines used by Virus Total that flag the file being scanned as being malicious will serve as a confidence score (or detection weighting) for whether or not the file being scanned should be considered malicious by phpMussel (the value used will represent the minimum confidence score or weight required in order to be considered malicious). A value of 0 is used by default.

##### "vt_quota_rate" `[int]`
- According to the Virus Total API documentation, "it is limited to at most 4 requests of any nature in any given 1 minute time frame. If you run a honeyclient, honeypot or any other automation that is going to provide resources to VirusTotal and not only retrieve reports you are entitled to a higher request rate quota". By default, phpMussel will strictly adhere to these limitations, but due to the possibility of these rate quotas being increased, these two directives are provided as a means for you to instruct phpMussel as to what limit it should adhere to. Unless you've been instructed to do so, it's not recommended for you to increase these values, but, if you've encountered problems relating to reaching your rate quota, decreasing these values __*MAY*__ sometimes help you in dealing with these problems. Your rate limit is determined as `vt_quota_rate` requests of any nature in any given `vt_quota_time` minute time frame.

##### "vt_quota_time" `[int]`
- (See description above).

#### "urlscanner" (Category)
Configuration for the URL scanner.

##### "google_api_key" `[string]`
- Enables API lookups to the Google Safe Browsing API when the necessary API key is defined.

See also:
- [Google API Console](https://console.developers.google.com/)

##### "maximum_api_lookups" `[int]`
- Maximum allowable number of API lookups to perform per individual scan iteration. Because each additional API lookup will add to the total time required to complete each scan iteration, you may wish to stipulate a limitation in order to expedite the overall scan process. When set to 0, no such maximum allowable number will be applied. Set to 10 by default.

##### "maximum_api_lookups_response" `[bool]`
- What to do if the maximum allowable number of API lookups is exceeded? False = Do nothing (continue processing) [Default]; True = Flag/block the file.

##### "cache_time" `[int]`
- How long (in seconds) should the results of API lookups be cached for? Default is 3600 seconds (1 hour).

#### "legal" (Category)
Configuration for legal requirements.

##### "pseudonymise_ip_addresses" `[bool]`
- Pseudonymise IP addresses when logging? True = Yes [Default]; False = No.

##### "privacy_policy" `[string]`
- The address of a relevant privacy policy to be displayed in the footer of any generated pages. Specify a URL, or leave blank to disable.

#### "supplementary_cache_options" (Category)
Supplementary cache options. Note: Changing these values may potentially log you out.

##### "prefix" `[string]`
- The value specified here will be prepended to all cache entry keys. Default = "phpMussel_". When multiple installations exist at the same server, this can be useful for keeping their caches separate from each other.

##### "enable_apcu" `[bool]`
- Specifies whether to try using APCu for caching. Default = True.

##### "enable_memcached" `[bool]`
- Specifies whether to try using Memcached for caching. Default = False.

##### "enable_redis" `[bool]`
- Specifies whether to try using Redis for caching. Default = False.

##### "enable_pdo" `[bool]`
- Specifies whether to try using PDO for caching. Default = False.

##### "memcached_host" `[string]`
- Memcached host value. Default = localhost.

##### "memcached_port" `[int]`
- Memcached port value. Default = "11211".

##### "redis_host" `[string]`
- Redis host value. Default = localhost.

##### "redis_port" `[int]`
- Redis port value. Default = "6379".

##### "redis_timeout" `[float]`
- Redis timeout value. Default = "2.5".

##### "redis_database_number" `[int]`
- Redis database number. Default = 0. Note: Can't use values other than 0 with Redis Cluster.

##### "pdo_dsn" `[string]`
- PDO DSN value. Default = "mysql:dbname=phpmussel;host=localhost;port=3306".

__FAQ.__ *<a href="https://github.com/phpMussel/Docs/blob/master/readme.en.md#user-content-HOW_TO_USE_PDO" hreflang="en-AU">What is a "PDO DSN"? How can I use PDO with phpMussel?</a>*

##### "pdo_username" `[string]`
- PDO username.

##### "pdo_password" `[string]`
- PDO password.

#### "frontend" (Category)
Configuration for the front-end.

##### "frontend_log" `[string]`
- File for logging front-end login attempts. Specify a filename, or leave blank to disable.

Useful tip: You can attach date/time information to the names of log files by using time format placeholders. Available time format placeholders are displayed at <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "max_login_attempts" `[int]`
- Maximum number of front-end login attempts. Default = 5.

##### "numbers" `[string]`
- How do you prefer numbers to be displayed? Select the example that looks the most correct to you.

```
numbers
├─Arabic-1 ("١٢٣٤٥٦٧٫٨٩")
├─Arabic-2 ("١٬٢٣٤٬٥٦٧٫٨٩")
├─Arabic-3 ("۱٬۲۳۴٬۵۶۷٫۸۹")
├─Arabic-4 ("۱۲٬۳۴٬۵۶۷٫۸۹")
├─Armenian ("Ճ̅Ի̅Գ̅ՏՇԿԷ")
├─Base-12 ("4b6547.a8")
├─Base-16 ("12d687.e3")
├─Bengali-1 ("১২,৩৪,৫৬৭.৮৯")
├─Burmese-1 ("၁၂၃၄၅၆၇.၈၉")
├─China-1 ("123,4567.89")
├─Chinese-Simplified ("一百二十三万四千五百六十七点八九")
├─Chinese-Simplified-Financial ("壹佰贰拾叁萬肆仟伍佰陆拾柒点捌玖")
├─Chinese-Traditional ("一百二十三萬四千五百六十七點八九")
├─Chinese-Traditional-Financial ("壹佰貳拾叄萬肆仟伍佰陸拾柒點捌玖")
├─Fullwidth ("１２３４５６７.８９")
├─Geez ("፻፳፫፼፵፭፻፷፯")
├─Hebrew ("א׳׳ב׳קג׳יד׳ךסז")
├─India-1 ("12,34,567.89")
├─India-2 ("१२,३४,५६७.८९")
├─India-3 ("૧૨,૩૪,૫૬૭.૮૯")
├─India-4 ("੧੨,੩੪,੫੬੭.੮੯")
├─India-5 ("೧೨,೩೪,೫೬೭.೮೯")
├─India-6 ("౧౨,౩౪,౫౬౭.౮౯")
├─Japanese ("百万二十万三万四千五百六十七・八九分")
├─Javanese ("꧑꧒꧓꧔꧕꧖꧗.꧘꧙")
├─Khmer-1 ("១.២៣៤.៥៦៧,៨៩")
├─Lao-1 ("໑໒໓໔໕໖໗.໘໙")
├─Latin-1 ("1,234,567.89")
├─Latin-2 ("1 234 567.89")
├─Latin-3 ("1.234.567,89")
├─Latin-4 ("1 234 567,89")
├─Latin-5 ("1,234,567·89")
├─Mayan ("𝋧𝋮𝋦𝋨𝋧.𝋱𝋰")
├─Mongolian ("᠑᠒᠓᠔᠕᠖᠗.᠘᠙")
├─NoSep-1 ("1234567.89")
├─NoSep-2 ("1234567,89")
├─Odia ("୧୨୩୪୫୬୭.୮୯")
├─Roman ("M̅C̅C̅X̅X̅X̅I̅V̅DLXVII")
├─SDN-Dwiggins ("4E6,547;X8")
├─SDN-Pitman ("4↋6,547;↊8")
├─Tamil ("௲௲௨௱௲௩௰௲௪௲௫௱௬௰௭")
├─Thai-1 ("๑,๒๓๔,๕๖๗.๘๙")
├─Thai-2 ("๑๒๓๔๕๖๗.๘๙")
└─Tibetan ("༡༢༣༤༥༦༧.༨༩")
```

##### "default_algo" `[string]`
- Defines which algorithm to use for all future passwords and sessions.

```
default_algo
├─PASSWORD_DEFAULT ("PASSWORD_DEFAULT")
├─PASSWORD_BCRYPT ("PASSWORD_BCRYPT")
├─PASSWORD_ARGON2I ("PASSWORD_ARGON2I")
└─PASSWORD_ARGON2ID ("PASSWORD_ARGON2ID (PHP >= 7.3.0)")
```

##### "theme" `[string]`
- The aesthetic to use for the phpMussel front-end.

```
theme
├─default ("Default")
├─bluemetal ("Blue Metal")
├─fullmoon ("Full Moon")
├─moss ("Moss")
├─primer ("Primer")
├─primerdark ("Primer Dark")
├─rbi ("Red-Blue Inverted")
├─slate ("Slate")
└─…Other
```

##### "magnification" `[float]`
- Font magnification. Default = 1.

##### "custom_header" `[string]`
- Inserted as HTML at the very beginning of all front-end pages. This could be useful in case you want to include a website logo, personalised header, scripts, or similar at all such pages.

##### "custom_footer" `[string]`
- Inserted as HTML at the very bottom of all front-end pages. This could be useful in case you want to include a legal notice, contact link, business information, or similar at all such pages.

#### "web" (Category)
Configuration for the upload handler.

##### "uploads_log" `[string]`
- Where all blocked uploads should be logged. Specify a filename, or leave blank to disable.

Useful tip: You can attach date/time information to the names of log files by using time format placeholders. Available time format placeholders are displayed at <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "forbid_on_block" `[bool]`
- Should phpMussel send 403 headers with the file upload blocked message, or stick with the usual 200 OK? False = No (200); True = Yes (403) [Default].

##### "unsupported_media_type_header" `[bool]`
- Should phpMussel send 415 headers when uploads are blocked due to blacklisted filetypes? When true, this setting supersedes `forbid_on_block`. False = No [Default]; True = Yes.

##### "max_uploads" `[int]`
- Maximum number of files that phpMussel is allowed to scan when scanning uploads before aborting the scan and informing the user they are uploading too much at once! Provides protection against a theoretical attack whereby an attacker attempts to DDoS your system or CMS by overloading phpMussel to slow down the PHP process to a grinding halt. Recommended: 10. You may wish to raise or lower this number depending on the speed of your hardware. Note that this number doesn't account for or include the contents of archives.

##### "ignore_upload_errors" `[bool]`
- This directive should generally be disabled unless it's required for correct functionality of phpMussel on your specific system. Normally, when disabled, when phpMussel detects the presence of elements in the `$_FILES` array(), it'll attempt to initiate a scan of the files that those elements represent, and, if those elements are blank or empty, phpMussel will return an error message. This is proper behaviour for phpMussel. However, for some CMS, empty elements in `$_FILES` can occur as a result of the natural behaviour of those CMS, or errors may be reported when there aren't any, in which case, the normal behaviour for phpMussel will be interfering with the normal behaviour of those CMS. If such a situation occurs for you, enabling this option will instruct phpMussel to not attempt to initiate scans for such empty elements, ignore them when found and to not return any related error messages, thus allowing continuation of the page request. False = OFF; True = ON.

##### "theme" `[string]`
- The aesthetic to use for the "upload denied" page.

```
theme
├─default ("Default")
├─bluemetal ("Blue Metal")
├─fullmoon ("Full Moon")
├─moss ("Moss")
├─primer ("Primer")
├─primerdark ("Primer Dark")
├─rbi ("Red-Blue Inverted")
├─slate ("Slate")
└─…Other
```

##### "magnification" `[float]`
- Font magnification. Default = 1.

##### "custom_header" `[string]`
- Inserted as HTML at the very beginning of all "upload denied" pages. This could be useful in case you want to include a website logo, personalised header, scripts, or similar at all such pages.

##### "custom_footer" `[string]`
- Inserted as HTML at the very bottom of all "upload denied" pages. This could be useful in case you want to include a legal notice, contact link, business information, or similar at all such pages.

#### "phpmailer" (Category)
Configuration for PHPMailer (used for two-factor authentication and for email notifications).

##### "event_log" `[string]`
- A file for logging all events in relation to PHPMailer. Specify a filename, or leave blank to disable.

Useful tip: You can attach date/time information to the names of log files by using time format placeholders. Available time format placeholders are displayed at <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "enable_two_factor" `[bool]`
- This directive determines whether to use 2FA for front-end accounts.

##### "enable_notifications" `[string]`
- If you want to be notified by email when an upload is blocked, specify the recipient email address here.

##### "skip_auth_process" `[bool]`
- Setting this directive to `true` instructs PHPMailer to skip the normal authentication process that normally occurs when sending email via SMTP. This should be avoided, because skipping this process may expose outbound email to MITM attacks, but may be necessary in cases where this process prevents PHPMailer from connecting to an SMTP server.

##### "host" `[string]`
- The SMTP host to use for outbound email.

##### "port" `[int]`
- The port number to use for outbound email. Default = 587.

##### "smtp_secure" `[string]`
- The protocol to use when sending email via SMTP (TLS or SSL).

```
smtp_secure
├─default ("-")
├─tls ("TLS")
└─ssl ("SSL")
```

##### "smtp_auth" `[bool]`
- This directive determines whether to authenticate SMTP sessions (should usually be left alone).

##### "username" `[string]`
- The username to use when sending email via SMTP.

##### "password" `[string]`
- The password to use when sending email via SMTP.

##### "set_from_address" `[string]`
- The sender address to cite when sending email via SMTP.

##### "set_from_name" `[string]`
- The sender name to cite when sending email via SMTP.

##### "add_reply_to_address" `[string]`
- The reply address to cite when sending email via SMTP.

##### "add_reply_to_name" `[string]`
- The reply name to cite when sending email via SMTP.

---


### 6. <a name="SECTION6"></a>SIGNATURE FORMAT

*See also:*
- *[What is a "signature"?](#user-content-WHAT_IS_A_SIGNATURE)*

The first 9 bytes `[x0-x8]` of a phpMussel signature file are `phpMussel`, and act as a "magic number", to identify them as signature files (this helps to prevent phpMussel from accidentally attempting to use files that aren't signature files). The next byte `[x9]` identifies the type of signature file, which phpMussel must know in order to be able to correctly interpret the signature file. The following types of signature files are recognised:

Type | Byte | Description
---|---|---
`General_Command_Detections` | `0?` | For CSV (comma separated values) signature files. Values (signatures) are hexadecimal-encoded strings to look for within files. Signatures here don't have any names or other details (only the string to detect).
`Filename` | `1?` | For filename signatures.
`Hash` | `2?` | For hash signatures.
`Standard` | `3?` | For signature files that work directly with file content.
`Standard_RegEx` | `4?` | For signature files that work directly with file content. Signatures can contain regular expressions.
`Normalised` | `5?` | For signature files that work with ANSI-normalised file content.
`Normalised_RegEx` | `6?` | For signature files that work with ANSI-normalised file content. Signatures can contain regular expressions.
`HTML` | `7?` | For signature files that work with HTML-normalised file content.
`HTML_RegEx` | `8?` | For signature files that work with HTML-normalised file content. Signatures can contain regular expressions.
`PE_Extended` | `9?` | For signature files that work with PE metadata (other than PE sectional metadata).
`PE_Sectional` | `A?` | For signature files that work with PE sectional metadata.
`Complex_Extended` | `B?` | For signature files that work with various rules based on extended metadata generated by phpMussel.
`URL_Scanner` | `C?` | For signature files that work with URLs.

The next byte `[x10]` is a newline `[0A]`, and concludes the phpMussel signature file header.

Each non-empty line thereafter is a signature or rule. Each signature or rule occupies one line. The signature formats supported are described below.

#### *FILENAME SIGNATURES*
All filename signatures follow the format:

`NAME:FNRX`

Where NAME is the name to cite for that signature and FNRX is the regex pattern to match filenames (unencoded) against.

#### *HASH SIGNATURES*
All hash signatures follow the format:

`HASH:FILESIZE:NAME`

Where HASH is the hash (usually MD5) of an entire file, FILESIZE is the total size of that file and NAME is the name to cite for that signature.

#### *PE SECTIONAL SIGNATURES*
All PE Sectional signatures follow the format:

`SIZE:HASH:NAME`

Where HASH is the MD5 hash of a section of a PE file, SIZE is the total size of that section and NAME is the name to cite for that signature.

#### *PE EXTENDED SIGNATURES*
All PE extended signatures follow the format:

`$VAR:HASH:SIZE:NAME`

Where $VAR is the name of the PE variable to match against, HASH is the MD5 hash of that variable, SIZE is the total size of that variable and NAME is the name to cite for that signature.

#### *COMPLEX EXTENDED SIGNATURES*
Complex Extended signatures are rather different to the other types of signatures possible with phpMussel, in that what they are matching against is specified by the signatures themselves and they can match against multiple criteria. The match criteria are delimited by ";" and the match type and match data of each match criteria is delimited by ":" as so that format for these signatures tends to look a bit like:

`$variable1:SOMEDATA;$variable2:SOMEDATA;SignatureName`

#### *EVERYTHING ELSE*
All other signatures follow the format:

`NAME:HEX:FROM:TO`

Where NAME is the name to cite for that signature and HEX is a hexadecimal-encoded segment of the file intended to be matched by the given signature. FROM and TO are optional parameters, indicating from which and to which positions in the source data to check against.

#### *REGEX (REGULAR EXPRESSIONS)*
Any form of regex understood and correctly processed by PHP should also be correctly understood and processed by phpMussel and its signatures. However, I'd suggest taking extreme caution when writing new regex based signatures, because, if you're not entirely sure what you're doing, there can be highly irregular and/or unexpected results. Take a look at the phpMussel source-code if you're not entirely sure about the context in which regex statements are parsed. Also, remember that all patterns (with exception to filename, archive metadata and MD5 patterns) must be hexadecimally encoded (foregoing pattern syntax, of course)!

---


### 7. <a name="SECTION7"></a>KNOWN COMPATIBILITY PROBLEMS

#### ANTI-VIRUS SOFTWARE COMPATIBILITY

Compatibility problems between phpMussel and some anti-virus vendors have been known to occur sometimes in the past, so every few months or thereabouts, I check the latest available versions of the phpMussel codebase against Virus Total, to see whether any problems are reported there. When problems are reported there, I list the reported problems here, in the documentation.

When I most recently checked (2022.05.12), no problems were reported.

I don't check the signature files, documentation, or other peripheral content. The signature files always cause some false positives when other anti-virus solutions detect them. I would therefore strongly recommend, that if you plan to install phpMussel at a machine where another anti-virus solution already exists, to whitelist the phpMussel signature files.

*See also: [Compatibility Charts](https://maikuolan.github.io/Compatibility-Charts/).*

---


### 8. <a name="SECTION8"></a>FREQUENTLY ASKED QUESTIONS (FAQ)

- [What is a "signature"?](#user-content-WHAT_IS_A_SIGNATURE)
- [What is a "false positive"?](#user-content-WHAT_IS_A_FALSE_POSITIVE)
- [How frequently are signatures updated?](#user-content-SIGNATURE_UPDATE_FREQUENCY)
- [I've encountered a problem while using phpMussel and I don't know what to do about it! Please help!](#user-content-ENCOUNTERED_PROBLEM_WHAT_TO_DO)
- [I want to use phpMussel v3 with a PHP version older than 7.2.0; Can you help?](#user-content-MINIMUM_PHP_VERSION_V3)
- [Can I use a single phpMussel installation to protect multiple domains?](#user-content-PROTECT_MULTIPLE_DOMAINS)
- [I don't want to mess around with installing this and getting it to work with my website; Can I just pay you to do it all for me?](#user-content-PAY_YOU_TO_DO_IT)
- [Can I hire you or any of the developers of this project for private work?](#user-content-HIRE_FOR_PRIVATE_WORK)
- [I need specialist modifications, customisations, etc; Can you help?](#user-content-SPECIALIST_MODIFICATIONS)
- [I'm a developer, website designer, or programmer. Can I accept or offer work relating to this project?](#user-content-ACCEPT_OR_OFFER_WORK)
- [I want to contribute to the project; Can I do this?](#user-content-WANT_TO_CONTRIBUTE)
- [How to access specific details about files when they are scanned?](#user-content-SCAN_DEBUGGING)
- [Blacklists – Whitelists – Greylists – What are they, and how do I use them?](#user-content-BLACK_WHITE_GREY)
- [What is a "PDO DSN"? How can I use PDO with phpMussel?](#user-content-HOW_TO_USE_PDO)
- [My upload facility is asynchronous (e.g., uses ajax, ajaj, json, etc). I don't see any special message or warning when an upload is blocked. What's going on?](#user-content-AJAX_AJAJ_JSON)
- [Can phpMussel detect EICAR?](#user-content-DETECT_EICAR)

#### <a name="WHAT_IS_A_SIGNATURE"></a>What is a "signature"?

In the context of phpMussel, a "signature" refers to data that acts as an indicator/identifier for something specific that we're looking for, usually in the form of some very small, distinct, innocuous segment of something larger and otherwise harmful, like a virus or trojan, or in the form of a file checksum, hash, or other similarly identifying indicator, and usually includes a label, and some other data to help provide additional context that can be used by phpMussel to determine the best way to proceed when it encounters what we're looking for.

#### <a name="WHAT_IS_A_FALSE_POSITIVE"></a>What is a "false positive"?

The term "false positive" (*alternatively: "false positive error"; "false alarm"*), described very simply, and in a generalised context, is used when testing for a condition, to refer to the results of that test, when the results are positive (i.e., the condition is determined to be "positive", or "true"), but are expected to be (or should have been) negative (i.e., the condition, in reality, is "negative", or "false"). A "false positive" could be considered analogous to "crying wolf" (wherein the condition being tested is whether there's a wolf near the herd, the condition is "false" in that there's no wolf near the herd, and the condition is reported as "positive" by the shepherd by way of calling "wolf, wolf"), or analogous to situations in medical testing wherein a patient is diagnosed as having some illness or disease, when in reality, they have no such illness or disease.

Related outcomes when testing for a condition can be described using the terms "true positive", "true negative" and "false negative". A "true positive" refers to when the results of the test and the actual state of the condition are both true (or "positive"), and a "true negative" refers to when the results of the test and the actual state of the condition are both false (or "negative"); A "true positive" or a "true negative" is considered to be a "correct inference". The antithesis of a "false positive" is a "false negative"; A "false negative" refers to when the results of the test are negative (i.e., the condition is determined to be "negative", or "false"), but are expected to be (or should have been) positive (i.e., the condition, in reality, is "positive", or "true").

In the context of phpMussel, these terms refer to the signatures of phpMussel and the files that they block. When phpMussel blocks a file due to bad, outdated or incorrect signatures, but shouldn't have done so, or when it does so for the wrong reasons, we refer to this event as a "false positive". When phpMussel fails to block a file that should have been blocked, due to unforeseen threats, missing signatures or shortfalls in its signatures, we refer to this event as a "missed detection" (which is analogous to a "false negative").

This can be summarised by the table below:

&nbsp; | phpMussel should *NOT* block a file | phpMussel *SHOULD* block a file
---|---|---
phpMussel does *NOT* block a file | True negative (correct inference) | Missed detection (analogous to false negative)
phpMussel *DOES* block a file | __False positive__ | True positive (correct inference)

#### <a name="SIGNATURE_UPDATE_FREQUENCY"></a>How frequently are signatures updated?

Update frequency varies depending on the signature files in question. All maintainers for phpMussel signature files generally try to keep their signatures as up-to-date as is possible, but as all of us have various other commitments, our lives outside the project, and as none of us are financially compensated (i.e., paid) for our efforts on the project, a precise update schedule can't be guaranteed. Generally, signatures are updated whenever there's enough time to update them. Assistance is always appreciated if you're willing to offer any.

#### <a name="ENCOUNTERED_PROBLEM_WHAT_TO_DO"></a>I've encountered a problem while using phpMussel and I don't know what to do about it! Please help!

- Are you using the latest version of the software? Are you using the latest versions of your signature files? If the answer to either of these two questions is no, try to update everything first, and check whether the problem persists. If it persists, continue reading.
- Have you checked through all the documentation? If not, please do so. If the problem can't be solved using the documentation, continue reading.
- Have you checked the **[issues page](https://github.com/phpMussel/phpMussel/issues)**, to see whether the problem has been mentioned before? If it's been mentioned before, check whether any suggestions, ideas, and/or solutions were provided, and follow as per necessary to try to resolve the problem.
- If the problem still persists, please seek help about it by creating a new issue on the issues page.

#### <a name="MINIMUM_PHP_VERSION_V3"></a>I want to use phpMussel v3 with a PHP version older than 7.2.0; Can you help?

No. PHP >= 7.2.0 is a minimum requirement for phpMussel v3.

*See also: [Compatibility Charts](https://maikuolan.github.io/Compatibility-Charts/).*

#### <a name="PROTECT_MULTIPLE_DOMAINS"></a>Can I use a single phpMussel installation to protect multiple domains?

Yes.

#### <a name="PAY_YOU_TO_DO_IT"></a>I don't want to mess around with installing this and getting it to work with my website; Can I just pay you to do it all for me?

Maybe. This is considered on a case-by-case basis. Let us know what you need, what you're offering, and we'll let you know whether we can help.

#### <a name="HIRE_FOR_PRIVATE_WORK"></a>Can I hire you or any of the developers of this project for private work?

*See above.*

#### <a name="SPECIALIST_MODIFICATIONS"></a>I need specialist modifications, customisations, etc; Can you help?

*See above.*

#### <a name="ACCEPT_OR_OFFER_WORK"></a>I'm a developer, website designer, or programmer. Can I accept or offer work relating to this project?

Yes. Our license does not prohibit this.

#### <a name="WANT_TO_CONTRIBUTE"></a>I want to contribute to the project; Can I do this?

Yes. Contributions to the project are very welcome. Please see "CONTRIBUTING.md" for more information.

#### <a name="SCAN_DEBUGGING"></a>How to access specific details about files when they are scanned?

You can access specific details about files when they are scanned by assigning an array to use for this purpose prior to instructing phpMussel to scan them.

In the example below, `$Foo` is assigned for this purpose. After scanning `/file/path/...`, detailed information about the files contained by `/file/path/...` will be contained by `$Foo`.

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);

$Scanner->setScanDebugArray($Foo);

$Results = $Scanner->scan('/file/path/...');

var_dump($Foo);
```

The array is a multidimensional array consisting of elements representing each file being scanned and sub-elements representing the details about these files. These sub-elements are as follows:

- Filename (`string`)
- FromCache (`bool`)
- Depth (`int`)
- Size (`int`)
- MD5 (`string`)
- SHA1 (`string`)
- SHA256 (`string`)
- CRC32B (`string`)
- 2CC (`string`)
- 4CC (`string`)
- ScanPhase (`string`)
- Container (`string`)
- † FileSwitch (`string`)
- † Is_ELF (`bool`)
- † Is_Graphics (`bool`)
- † Is_HTML (`bool`)
- † Is_Email (`bool`)
- † Is_MachO (`bool`)
- † Is_PDF (`bool`)
- † Is_SWF (`bool`)
- † Is_PE (`bool`)
- † Is_Not_HTML (`bool`)
- † Is_Not_PHP (`bool`)
- ‡ NumOfSections (`int`)
- ‡ PEFileDescription (`string`)
- ‡ PEFileVersion (`string`)
- ‡ PEProductName (`string`)
- ‡ PEProductVersion (`string`)
- ‡ PECopyright (`string`)
- ‡ PEOriginalFilename (`string`)
- ‡ PECompanyName (`string`)
- Results (`int`)
- Output (`string`)

*† - Not provided with cached results (only provided for new scan results).*

*‡ - Only provided when scanning PE files.*

Optionally, this array can be destroyed by using the following:

```PHP
$Scanner->destroyScanDebugArray($Foo);
```

#### <a name="BLACK_WHITE_GREY"></a>Blacklists – Whitelists – Greylists – What are they, and how do I use them?

The terms convey different meanings in different contexts. In phpMussel, there are three contexts where these terms are used: Filesize response, filetype response, and the signature greylist.

In order to achieve a desired outcome at minimal cost to processing, there are some simple things that phpMussel can check prior to actually scanning files, such as a file's size, name, and extension. For example; If a file is too large, or if its extension indicates a type of file that we don't want to allow onto our websites anyway, we can flag the file immediately, and don't need to scan it.

Filesize response is the way that phpMussel responds when a file exceeds a specified limit. Though no actual lists are involved, a file may be considered effectively blacklisted, whitelisted, or greylisted, based on its size. Two separate, optional configuration directives exist to specify a limit and desired response respectively.

Filetype response is the way that phpMussel responds to file's extension. Three separate, optional configuration directives exist to explicitly specify which extensions should be blacklisted, whitelisted, or greylisted. A file may be considered effectively blacklisted, whitelisted, or greylisted if its extension matches any of the specified extensions respectively.

In these two contexts, being whitelisted means that it shouldn't be scanned or flagged; being blacklisted means that it should be flagged (and therefore don't need to scan it); and being greylisted means further analysis is required to determine whether we should flag it (i.e., it should be scanned).

The signature greylist is a list of signatures that should essentially be ignored (this is briefly mentioned earlier in the documentation). When a signature on the signature greylist is triggered, phpMussel continues working through its signatures and takes no particular action in regards to the greylisted signature. There's no signature blacklist, because the implied behaviour is normal behaviour for triggered signatures anyway, and there's no signature whitelist, because the implied behaviour wouldn't really make sense in consideration of how phpMussel normal works and the capabilities it already has.

The signature greylist is useful if you need to resolve problems caused by a particular signature without disabling or uninstalling the entire signature file.

#### <a name="HOW_TO_USE_PDO"></a>What is a "PDO DSN"? How can I use PDO with phpMussel?

"PDO" is an acronym for "[PHP Data Objects](https://www.php.net/manual/en/intro.pdo.php)". It provides an interface for PHP to be able to connect to some database systems commonly utilised by various PHP applications.

"DSN" is an acronym for "[data source name](https://en.wikipedia.org/wiki/Data_source_name)". The "PDO DSN" describes to PDO how it should connect to a database.

phpMussel provides the option to utilise PDO for caching purposes. In order for this to work properly, you'll need to configure phpMussel accordingly, enabling PDO, create a new database for phpMussel to use (if you don't already have in mind a database for phpMussel to use), and create a new table in your database in accordance with the structure described below.

When a database connection is successfully, but the necessary table doesn't exist, it will attempt to create it automatically. However, this behaviour hasn't been extensively tested and success can't be guaranteed.

This, of course, only applies if you actually want phpMussel to use PDO. If you're happy enough for phpMussel to use flatfile caching (per its default configuration), or any of the various other caching options provided, you won't need to bother troubling yourself with setting up databases, tables and so on.

The structure described below uses "phpmussel" as its database name, but you can use whichever name you want for your database, so long as that same name is replicated at your DSN configuration.

```
╔══════════════════════════════════════════════╗
║ DATABASE "phpmussel"                         ║
║ │╔═══════════════════════════════════════════╩═════╗
║ └╫─TABLE "Cache" (UTF-8)                           ║
║  ╠═╪═FIELD══CHARSET═DATATYPE═════KEY══NULL═DEFAULT═╣
║  ║ ├─"Key"──UTF-8───VARCHAR(128)─PRI──×────×       ║
║  ║ ├─"Data"─UTF-8───TEXT─────────×────×────×       ║
╚══╣ └─"Time"─×───────INT(>=10)────×────×────×       ║
   ╚═════════════════════════════════════════════════╝
```

phpMussel's `pdo_dsn` configuration directive should be configured as described below.

```
Depending on which database driver is used...
├─4d (Warning: Experimental, untested, not recommended!)
│ │
│ │         ╔═══════╗
│ └─4D:host=localhost;charset=UTF-8
│           ╚╤══════╝
│            └The host to connect with to find the database.
├─cubrid
│ │
│ │             ╔═══════╗      ╔═══╗        ╔═════╗
│ └─cubrid:host=localhost;port=33000;dbname=example
│               ╚╤══════╝      ╚╤══╝        ╚╤════╝
│                │              │            └The name of the database to use.
│                │              │
│                │              └The port number to connect to the host.
│                │
│                └The host to connect with to find the database.
├─dblib
│ │
│ │ ╔═══╗      ╔═══════╗        ╔═════╗
│ └─dblib:host=localhost;dbname=example
│   ╚╤══╝      ╚╤══════╝        ╚╤════╝
│    │          │                └The name of the database to use.
│    │          │
│    │          └The host to connect with to find the database.
│    │
│    └Possible values: "mssql", "sybase", "dblib".
├─firebird
│ │
│ │                 ╔═══════════════════╗
│ └─firebird:dbname=/path/to/database.fdb
│                   ╚╤══════════════════╝
│                    ├Can be a path to a local database file.
│                    │
│                    ├Can connect with a host and port number.
│                    │
│                    └You should refer to the Firebird documentation if you
│                     want to use this.
├─ibm
│ │
│ │         ╔═════╗
│ └─ibm:DSN=example
│           ╚╤════╝
│            └Which catalogued database to connect with.
├─informix
│ │
│ │              ╔═════╗
│ └─informix:DSN=example
│                ╚╤════╝
│                 └Which catalogued database to connect with.
├─mysql (Most recommended!)
│ │
│ │              ╔═════╗      ╔═══════╗      ╔══╗
│ └─mysql:dbname=example;host=localhost;port=3306
│                ╚╤════╝      ╚╤══════╝      ╚╤═╝
│                 │            │              └The port number to connect to
│                 │            │               the host.
│                 │            │
│                 │            └The host to connect with to find the
│                 │             database.
│                 │
│                 └The name of the database to use.
├─oci
│ │
│ │            ╔═════╗
│ └─oci:dbname=example
│              ╚╤════╝
│               ├Can refer to the specific catalogued database.
│               │
│               ├Can connect with a host and port number.
│               │
│               └You should refer to the Oracle documentation if you want to
│                use this.
├─odbc
│ │
│ │      ╔═════╗
│ └─odbc:example
│        ╚╤════╝
│         ├Can refer to the specific catalogued database.
│         │
│         ├Can connect with a host and port number.
│         │
│         └You should refer to the ODBC/DB2 documentation if you want to use
│          this.
├─pgsql
│ │
│ │            ╔═══════╗      ╔══╗        ╔═════╗
│ └─pgsql:host=localhost;port=5432;dbname=example
│              ╚╤══════╝      ╚╤═╝        ╚╤════╝
│               │              │           └The name of the database to use.
│               │              │
│               │              └The port number to connect to the host.
│               │
│               └The host to connect with to find the database.
├─sqlite
│ │
│ │        ╔════════╗
│ └─sqlite:example.db
│          ╚╤═══════╝
│           └The path to the local database file to use.
└─sqlsrv
  │
  │               ╔═══════╗ ╔══╗          ╔═════╗
  └─sqlsrv:Server=localhost,1521;Database=example
                  ╚╤══════╝ ╚╤═╝          ╚╤════╝
                   │         │             └The name of the database to use.
                   │         │
                   │         └The port number to connect to the host.
                   │
                   └The host to connect with to find the database.
```

If you're not sure about what to use for some particular part of your DSN, try seeing firstly whether it works as is, without changing anything.

Note that `pdo_username` and `pdo_password` should be the same as the username and password you've chosen for your database.

#### <a name="AJAX_AJAJ_JSON"></a>My upload facility is asynchronous (e.g., uses ajax, ajaj, json, etc). I don't see any special message or warning when an upload is blocked. What's going on?

This is normal. phpMussel's standard "Upload Denied" page is served as HTML, which should be sufficient for typical synchronous requests, but which probably won't be sufficient if your upload facility is expecting something else. If your upload facility is asynchronous, or expects an upload status to be served asynchronously, there are some things you could try doing in order for phpMussel to serve the needs of your upload facility.

1. Creating a custom output template to serve something other than HTML.
2. Creating a custom plugin to bypass the standard "Upload Denied" page entirely and have the upload handler do something else when an upload is blocked (there are some plugin hooks provided by the uploader handler which could be helpful for this).
3. Disabling the upload handler entirely and instead just calling the phpMussel API from within your upload facility.

#### <a name="DETECT_EICAR"></a>Can phpMussel detect EICAR?

Yes. A signature for detecting EICAR is included in the "phpMussel standard regular expressions signature file" (`phpmussel_regex.db`). As long as that signature file is installed and activated, phpMussel should be able to detect EICAR. Since the ClamAV database also includes numerous signatures specifically for detecting EICAR, ClamAV can easily detect EICAR, but since phpMussel utilises only a reduced subset of the total signatures provided by ClamAV, they mightn't by themselves be sufficient for phpMussel to detect EICAR. The ability to detect it may also depend on your exact configuration.

---


### 9. <a name="SECTION9"></a>LEGAL INFORMATION

#### 9.0 SECTION PREAMBLE

This section of the documentation is intended to describe possible legal considerations regarding the use and implementation of the package, and to provide some basic related information. This may be important for some users as a means to ensure compliancy with any legal requirements that may exist in the countries that they operate in, and some users may need to adjust their website policies in accordance with this information.

First and foremost, please realise that I (the package author) am not a lawyer, nor a qualified legal professional of any kind. Therefore, I am not legally qualified to provide legal advice. Also, in some cases, exact legal requirements may vary between different countries and jurisdictions, and these varying legal requirements may sometimes conflict (such as, for example, in the case of countries that favour [privacy rights](https://en.wikipedia.org/wiki/Right_to_privacy) and the [right to be forgotten](https://en.wikipedia.org/wiki/Right_to_be_forgotten), versus countries that favour extended [data retention](https://en.wikipedia.org/wiki/Data_retention)). Consider also that access to the package is not restricted to specific countries or jurisdictions, and therefore, the package userbase is likely to the geographically diverse. These points considered, I'm not in a position to state what it means to be "legally compliant" for all users, in all regards. However, I hope that the information herein will help you to come to a decision yourself regarding what you must do in order to remain legally compliant in the context of the package. If you have any doubts or concerns regarding the information herein, or if you need additional help and advice from a legal perspective, I would recommend consulting a qualified legal professional.

#### 9.1 LIABILITY AND RESPONSIBILITY

As per already stated by the package license, the package is provided without any warranty. This includes (but is not limited to) all scope of liability. The package is provided to you for your convenience, in the hope that it will be useful, and that it will provide some benefit for you. However, whether you use or implement the package, is your own choice. You are not forced to use or implement the package, but when you do so, you are responsible for that decision. Neither I, nor any other contributors to the package, are legally responsible for the consequences of the decisions that you make, regardless of whether direct, indirect, implied, or otherwise.

#### 9.2 THIRD PARTIES

Depending on its exact configuration and implementation, the package may communicate and share information with third parties in some cases. This information may be defined as "[personally identifiable information](https://en.wikipedia.org/wiki/Personal_data)" (PII) in some contexts, by some jurisdictions.

How this information may be used by these third parties, is subject to the various policies set forth by these third parties, and is outside the scope of this documentation. However, in all such cases, sharing of information with these third parties can be disabled. In all such cases, if you choose to enable it, it is your responsibility to research any concerns that you may have regarding the privacy, security, and usage of PII by these third parties. If any doubts exist, or if you're unsatisfied with the conduct of these third parties in regards to PII, it may be best to disable all sharing of information with these third parties.

For the purpose of transparency, the type of information shared, and with whom, is described below.

##### 9.2.1 URL SCANNER

URLs found within file uploads may be shared with the Google Safe Browsing API, depending on how the package is configured. The Google Safe Browsing API requires API keys in order to work correctly, and is therefore disabled by default.

*Relevant configuration directives:*
- `urlscanner` -> `google_api_key`

##### 9.2.2 VIRUS TOTAL

When phpMussel scans a file upload, the hashes of those files may be shared with the Virus Total API, depending on how the package is configured. There are plans to be able to share entire files at some point in the future too, but this feature isn't supported by the package at this time. The Virus Total API requires an API key in order to work correctly, and is therefore disabled by default.

Information (including files and related file metadata) shared with Virus Total, may also be shared with their partners, affiliates, and various others for research purposes. This is described in more detail by their privacy policy.

*See: [Privacy Policy &ndash; VirusTotal](https://support.virustotal.com/hc/en-us/articles/115002168385-Privacy-Policy).*

*Relevant configuration directives:*
- `virustotal` -> `vt_public_api_key`

#### 9.3 LOGGING

Logging is an important part of phpMussel for a number of reasons. Without logging, it may be difficult to diagnose false positives, to ascertain exactly how performant phpMussel is in any particular context, and to determine where its shortfalls may be, and what changes may be required to its configuration or signatures accordingly, in order for it to continue functioning as intended. Regardless, logging mightn't be desirable for all users, and remains entirely optional. In phpMussel, logging is disabled by default. To enable it, phpMussel must be configured accordingly.

Additionally, whether logging is legally permissible, and to the extent that it is legally permissible (e.g., the types of information that may be logged, for how long, and under what circumstances), may vary, depending on jurisdiction and on the context where phpMussel is implemented (e.g., whether you're operating as an individual, as a corporate entity, and whether on a commercial or non-commercial basis). It may therefore be useful for you to read through this section carefully.

There are multiple types of logging that phpMussel can perform. Different types of logging involves different types of information, for different reasons.

##### 9.3.0 SCAN LOGS

When enabled in the package configuration, phpMussel keeps logs of the files it scans. This type of logging is available in two different formats:
- Human readable logfiles.
- Serialised logfiles.

Entries to a human readable logfile typically look something like this (as an example):

```
Sun, 19 Jul 2020 13:33:31 +0800 Started.
→ Checking "ascii_standard_testfile.txt".
─→ Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
Sun, 19 Jul 2020 13:33:31 +0800 Finished.
```

A scan log entry typically includes the following information:
- The date and time that the file was scanned.
- The name of the file scanned.
- What was detected in the file (if anything was detected).

*Relevant configuration directives:*
- `general` -> `scan_log`
- `general` -> `scan_log_serialized`

When these directives are left empty, this type of logging will remain disabled.

##### 9.3.1 UPLOADS LOG

When enabled in the package configuration, phpMussel keeps logs of the uploads that have been blocked.

*An example log entry:*

```
Date: Sun, 19 Jul 2020 13:33:31 +0800
IP address: 127.0.0.x
== Scan results (why flagged) ==
Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
== Hash signatures reconstruction ==
dcacac499064454218823fbabff7e09b5b011c0c877ee6f215f35bffb195b6e9:654:ascii_standard_testfile.txt
Quarantined as "1595142388-2e017ea9ac1478e45dc15794a1fc18c0.qfu".
```

These log entries typically includes the following information:
- The date and time that the upload was blocked.
- The IP address where the upload originated from.
- The reason why the file was blocked (what was detected).
- The name of the file blocked.
- The checksum and the size of the file blocked.
- Whether the file was quarantined, and under what internal name.

*Relevant configuration directives:*
- `web` -> `uploads_log`

##### 9.3.2 FRONT-END LOGGING

This type of logging relates front-end login attempts, and occurs only when a user attempts to log into the front-end (assuming front-end access is enabled).

A front-end log entry contains the IP address of the user attempting to log in, the date and time that the attempt occurred, and the results of the attempt (successfully logged in, or failed to log in). A front-end log entry typically looks something like this (as an example):

```
x.x.x.x - Day, dd Mon 20xx hh:ii:ss +0000 - "admin" - Logged in.
```

*Relevant configuration directives:*
- `general` -> `frontend_log`

##### 9.3.3 LOG ROTATION

You may want to purge logs after a period of time, or may be required to do so by law (i.e., the amount of time that it's legally permissible for you to retain logs may be limited by law). You can achieve this by including date/time markers in the names of your logfiles as per specified by your package configuration (e.g., `{yyyy}-{mm}-{dd}.log`), and then enabling log rotation (log rotation allows you to perform some action on logfiles when specified limits are exceeded).

For example: If I was legally required to delete logs after 30 days, I could specify `{dd}.log` in the names of my logfiles (`{dd}` represents days), set the value of `log_rotation_limit` to 30, and set the value of `log_rotation_action` to `Delete`.

Conversely, if you're required to retain logs for an extended period of time, you could either not use log rotation at all, or you could set the value of `log_rotation_action` to `Archive`, to compress logfiles, thereby reducing the total amount of disk space that they occupy.

*Relevant configuration directives:*
- `general` -> `log_rotation_limit`
- `general` -> `log_rotation_action`

##### 9.3.4 LOG TRUNCATION

It's also possible to truncate individual logfiles when they exceed a certain size, if this is something you might need or want to do.

*Relevant configuration directives:*
- `general` -> `truncate`

##### 9.3.5 IP ADDRESS PSEUDONYMISATION

Firstly, if you're not familiar with the term, "pseudonymisation" refers to the processing of personal data as such that it can't be identified to any specific data subject anymore without supplementary information, and provided that such supplementary information is maintained separately and subject to technical and organisational measures to ensure that personal data can't be identified to any natural person.

The following resources can help to explain it in more detail:
- [[trust-hub.com] What is pseudonymisation?](https://www.trust-hub.com/news/what-is-pseudonymisation/)
- [[dataprotection.ie] Anonymisation and pseudonymisation](https://www.dataprotection.ie/docs/Anonymisation-and-pseudonymisation/1594.htm)
- [[Wikipedia] Pseudonymization](https://en.wikipedia.org/wiki/Pseudonymization)

In some circumstances, you may be legally required to anonymise or pseudonymise any PII collected, processed, or stored. Although this concept has existed for quite some time now, GDPR/DSGVO notably mentions, and specifically encourages "pseudonymisation".

phpMussel is able to pseudonymise IP addresses when logging them, if this is something you might need or want to do. When phpMussel pseudonymises IP addresses, when logged, the final octet of IPv4 addresses, and everything after the second part of IPv6 addresses is represented by an "x" (effectively rounding IPv4 addresses to the initial address of the 24th subnet they factor into, and IPv6 addresses to the initial address of the 32nd subnet they factor into).

*Relevant configuration directives:*
- `legal` -> `pseudonymise_ip_addresses`

##### 9.3.6 STATISTICS

phpMussel is optionally able to track statistics such as the total number of files scanned and blocked since some particular point in time. This feature is disabled by default, but can be enabled via the package configuration. The type of information tracked shouldn't be regarded as PII.

*Relevant configuration directives:*
- `general` -> `statistics`

##### 9.3.7 ENCRYPTION

phpMussel doesn't encrypt its cache or any log information. Cache and log [encryption](https://en.wikipedia.org/wiki/Encryption) may be introduced in the future, but there aren't any specific plans for it currently. If you're concerned about unauthorised third parties gaining access to parts of phpMussel that may contain PII or sensitive information such as its cache or logs, I would recommend that phpMussel not be installed at a publicly accessible location (e.g., install phpMussel outside the standard `public_html` directory or equivalent thereof available to most standard webservers) and that appropriately restrictive permissions be enforced for the directory where it resides. If that isn't sufficient to address your concerns, then configure phpMussel as such that the types of information causing your concerns won't be collected or logged in the first place (such as, by disabling logging).

#### 9.4 COOKIES

When a user successfully logs into the front-end, phpMussel sets a [cookie](https://en.wikipedia.org/wiki/HTTP_cookie) in order to be able to remember the user for subsequent requests (i.e., cookies are used to authenticate the user to a login session). On the login page, a cookie warning is displayed prominently, warning the user that a cookie will be set if they engage in the relevant action. Cookies aren't set at any other points in the codebase.

#### 9.5 MARKETING AND ADVERTISING

phpMussel doesn't collect or process any information for marketing or advertising purposes, and neither sells nor profits from any collected or logged information. phpMussel is not a commercial enterprise, nor is related to any commercial interests, so doing these things wouldn't make any sense. This has been the case since the beginning of the project, and continues to be the case today. Additionally, doing these things would be counter-productive to the spirit and intended purpose of the project as a whole, and for as long as I continue to maintain the project, will never happen.

#### 9.6 PRIVACY POLICY

In some circumstances, you may be legally required to clearly display a link to your privacy policy on all pages and sections of your website. This may be important as a means to ensure that users are well-informed of your exact privacy practices, the types of PII you collect, and how you intend to use it. In order to be able to include such a link on phpMussel's "Upload Denied" page, a configuration directive is provided to specify the URL to your privacy policy.

*Relevant configuration directives:*
- `legal` -> `privacy_policy`

#### 9.7 GDPR/DSGVO

The General Data Protection Regulation (GDPR) is a regulation of the European Union, which comes into effect as of May 25, 2018. The primary goal of the regulation is to give control to EU citizens and residents regarding their own personal data, and to unify regulation within the EU concerning privacy and personal data.

The regulation contains specific provisions pertaining to the processing of "[personally identifiable information](https://en.wikipedia.org/wiki/Personal_data)" (PII) of any "data subjects" (any identified or identifiable natural person) either from or within the EU. To be compliant with the regulation, "enterprises" (as per defined by the regulation), and any relevant systems and processes must implement "[privacy by design](https://en.wikipedia.org/wiki/Privacy_by_design)" by default, must use the highest possible privacy settings, must implement necessary safeguards for any stored or processed information (including, but not limited to, the implementation of pseudonymisation or full anonymisation of data), must clearly and unambiguously declare the types of data they collect, how they process it, for what reasons, for how long they retain it, and whether they share this data with any third parties, the types of data shared with third parties, how, why, and so on.

Data may not be processed unless there's a lawful basis for doing so, as per defined by the regulation. Generally, this means that in order to process a data subject's data on a lawful basis, it must be done in compliance with legal obligations, or done only after explicit, well-informed, unambiguous consent has been obtained from the data subject.

Because aspects of the regulation may evolve in time, in order to avoid the propagation of outdated information, it may be better to learn about the regulation from an authoritative source, as opposed to simply including the relevant information here in the package documentation (which may eventually become outdated as the regulation evolves).

[EUR-Lex](https://eur-lex.europa.eu/) (a part of the official website of the European Union that provides information about EU law) provides extensive information about GDPR/DSGVO, available in 24 different languages (at the time of writing this), and available for download in PDF format. I would definitely recommend reading the information that they provide, in order to learn more about GDPR/DSGVO:
- [REGULATION (EU) 2016/679 OF THE EUROPEAN PARLIAMENT AND OF THE COUNCIL](https://eur-lex.europa.eu/legal-content/EN/TXT/?uri=celex:32016R0679)

[Intersoft Consulting](https://www.intersoft-consulting.de/) also provides extensive information about GDPR/DSGVO, available in German and English, which could be useful to learn more about GDPR/DSGVO:
- [General Data Protection Regulation (GDPR) – Final text neatly arranged](https://gdpr-info.eu/)

Alternatively, there's a brief (non-authoritative) overview of GDPR/DSGVO available at Wikipedia:
- [General Data Protection Regulation](https://en.wikipedia.org/wiki/General_Data_Protection_Regulation)

---


Last Updated: 10 June 2025 (2025.06.10).
