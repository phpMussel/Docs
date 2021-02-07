## phpMussel v3 中文（傳統）文檔。

### 內容
- 1. [前言](#SECTION1)
- 2. [如何安裝](#SECTION2)
- 3. [如何使用](#SECTION3)
- 4. [擴展PHPMUSSEL](#SECTION4)
- 7. [配置選項](#SECTION7)
- 8. [簽名格式](#SECTION8)
- 9. [已知的兼容問題](#SECTION9)
- 10. [常見問題（FAQ）](#SECTION10)
- 11. [法律信息](#SECTION11)

*翻譯註釋：如果錯誤（例如，​翻譯差異，​錯別字，​等等），​英文版這個文件是考慮了原版和權威版。​如果您發現任何錯誤，​您的協助糾正他們將受到歡迎。​*

---


### 1. <a name="SECTION1"></a>前言

感謝使用phpMussel，​這是一個根據ClamAV的簽名和其他簽名在上傳完成後來自動檢測木馬/病毒/惡意軟件和其他可能威脅到您系統安全的文件的PHP腳本。

[PHPMUSSEL](https://phpmussel.github.io/) COPYRIGHT 2013 和走向未來 GNU/GPLv2 由 [Caleb M (Maikuolan)](https://github.com/Maikuolan)。

本腳本是基於GNU通用許可V2.0版許可協議發布的，​您可以在許可協議的允許範圍內自行修改和發布，​但請遵守GNU通用許可協議。​使用腳本的過程中，​作者不提供任何擔保和任何隱含擔保。​更多的細節請參見GNU通用公共許可證，​下的`LICENSE.txt`文件也可從訪問：
- <https://www.gnu.org/licenses/>。
- <https://opensource.org/licenses/>。

謝謝[ClamAV](https://www.clamav.net/)為本腳本提供文件簽名庫訪問許可。​沒有它，​這個腳本很可能不會存在，​或者其價值有限。

謝謝SourceForge和Bitbucket和GitHub為項目託管，​還有謝謝這些組織為提供一些簽名：​[PhishTank](https://www.phishtank.com/)，​[NLNetLabs](https://nlnetlabs.nl/)，[Malware.Expert](https://malware.expert/)，​等人。

---


### 2. <a name="SECTION2"></a>如何安裝

#### 2.0 與COMPOSER安裝

推薦的安裝phpMussel v3的方法是通過Composer。

為了方便起見，您可以通過舊的主要phpMussel存儲庫安裝最常用的phpMussel依賴項：

`composer require phpmussel/phpmussel`

作為備選，您可以單獨選擇所需的依賴項。您很可能只需要特定的依賴項，而不需要所有。

為了使用phpMussel做任何事情，您需要phpMussel核心代碼庫：

`composer require phpmussel/core`

提供phpMussel的前端管理工具：

`composer require phpmussel/frontend`

為您的網站提供自動文件上傳掃描：

`composer require phpmussel/web`

提供了將phpMussel用作交互式CLI模式應用：

`composer require phpmussel/cli`

在phpMussel和PHPMailer之間建立橋樑，使phpMussel可以利用PHPMailer進行雙因素身份驗證，有關阻止的文件上傳的電子郵件通知，等等：

`composer require phpmussel/phpmailer`

為了使phpMussel能夠檢測到任何東西，您需要安裝簽名。沒有特定的程序包。要安裝簽名，請參閱本文檔的下一部分。

作為備選，如果您不想使用Composer，則可以從此處下載預打包的ZIP：

https://github.com/phpMussel/Examples

預先打包的ZIP包含所有上述依賴關係，以及所有標準phpMussel簽名文件，以及一些示例，這些示例說明瞭如何在實現中使用phpMussel。

#### <a name="INSTALLING_SIGNATURES"></a>2.1 安裝簽名

phpMussel需要簽名來檢測特定的威脅。​安裝簽名有二種主要方法：

1. 使用『SigTool』生成簽名並手動安裝。
2. 從『phpMussel/Signatures』或『phpMussel/Examples』下載簽名並手動安裝。

##### 2.1.0 使用『SigTool』生成簽名並手動安裝。

*看到：[SigTool文檔](https://github.com/phpMussel/SigTool#documentation).*

*另請注意：SigTool僅處理來自ClamAV的簽名。為了獲得其他來源的簽名（例如，專門為phpMussel編寫的簽名，其中包括檢測phpMussel的測試樣本所必需的簽名），此方法將需要通過此處提到的其他方法之一進行補充。*

##### 2.1.1 從『phpMussel/Signatures』或『phpMussel/Examples』下載簽名並手動安裝。

首先，去[phpMussel/Signatures](https://github.com/phpMussel/Signatures)。​存儲庫包含各種GZ壓縮的簽名文件。​下載所需的文件，解壓縮文件，並將它們複製到安裝的簽名目錄。

作為備選，從[phpMussel/Examples](https://github.com/phpMussel/Examples)下載最新的ZIP。然後，您可以將簽名從該存檔複製/粘貼到您的安裝中。

---


### 3. <a name="SECTION3"></a>如何使用

#### 3.0 配置PHPMUSSEL

安裝phpMussel之後，您將需要一個配置文件，以便對其進行配置。​phpMussel配置文件可以格式化為INI或YML文件。​如果您使用示例ZIP之一，則已經有兩個示例配置文件可用，`phpmussel.ini`和`phpmussel.yml`。​您可以根據需要選擇其中一種，如果您想。​如果您不是使用示例ZIP之一，則需要創建一個新文件。

如果您對phpMussel的默認配置感到滿意，並且不想更改任何內容，則可以使用一個空文件作為您的配置文件。​只需設置要更改的值即可。​其他所有內容都將使用默認值。

您可以從前端配置頁面配置所有內容，如果您想。​但是，從v3開始，前端登錄信息將存儲在您的配置文件中。​因此，要登錄到前端，您需要設置一個帳戶。​然後，您可以使用它登錄並配置其他所有內容。

以下摘錄將使用用戶名『admin』和密碼『password』向前端添加一個新帳戶。

對於INI文件：

```INI
[user.admin]
password='$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK'
permissions='1'
```

對於YML文件：

```YAML
user.admin:
 password: "$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK"
 permissions: 1
```

您可以根據需要命名配置即可（只要保留其擴展名，以便phpMussel知道其使用的格式）。​您可以將其存儲在任何位置中。​您可以在實例化加載程序時通過提供其路徑來告訴phpMussel在哪裡找到您的配置文件。​如果沒有提供路徑，phpMussel將嘗試在vendor目錄的父目錄中找到它。

在某些環境（例如Apache）中，甚至可以在配置的前面放置一個點以隱藏它並阻止公共訪問。

有關可用於phpMussel的各種配置指令的更多信息，請參閱本文檔的配置部分。

#### 3.1 PHPMUSSEL CORE

無論您如何使用phpMussel，幾乎每個實施都至少包含以下內容：

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
```

正如這些類的名稱所暗示的，加載程序【Loader】負責準備使用phpMussel的基本必需品，掃描程序【Scanner】負責所有核心掃描功能。

加載程序的構造函數接受五個參數，均為可選參數。

```PHP
public function __construct(
    string $ConfigurationPath = '',
    string $CachePath = '',
    string $QuarantinePath = '',
    string $SignaturesPath = '',
    string $VendorPath = ''
)
```

第一個參數是配置文件的完整路徑。​當省略時，phpMussel將在vendor目錄的父目錄中查找名為`phpmussel.ini`或`phpmussel.yml`的配置文件。

第二個參數是您允許phpMussel用於緩存和臨時文件存儲的目錄的路徑。​當省略時，phpMussel將在vendor目錄的父目錄中嘗試創建一個要使用的新目錄，名為`phpmussel-cache`。​如果要自己指定此路徑，則最好選擇一個空目錄，以避免不必要地丟失指定目錄中的其他數據。

第三個參數是phpMussel可以用來隔離的目錄的路徑。​當省略時，phpMussel將在vendor目錄的父目錄中嘗試創建一個要使用的新目錄，名為`phpmussel-quarantine`。​如果要自己指定此路徑，則最好選擇一個空目錄，以避免不必要地丟失指定目錄中的其他數據。​強烈建議您禁止公共訪問用於隔離的目錄。

第四個參數是包含phpMussel簽名文件的目錄的路徑。​當省略時，phpMussel將在vendor目錄的父目錄中嘗試在名為`phpmussel-signatures`的目錄中查找簽名文件。

第五個參數是vendor目錄的路徑。​它永遠不要指向其他任何東西。​當省略時，phpMussel將嘗試自行找到此目錄。​提供此參數是為了便於與不一定具有與典型Composer項目相同結構的實施進行集成。

掃描程序的構造函數僅接受一個參數，這是必需的：實例化的加載程序對象。​由於它是通過引用傳遞的，因此加載程序必須實例化為變量（加載程序實例化實例化到掃描程序的參數中不是使用phpMussel的正確方法）。

```PHP
public function __construct(\phpMussel\Core\Loader &$Loader)
```

#### 3.2 自動文件上傳掃描

實例化上傳處理程序：

```PHP
$Web = new \phpMussel\Web\Web($Loader, $Scanner);
```

要掃描文件上傳：

```PHP
$Web->scan();
```

可選地，phpMussel可以嘗試修復上傳的名稱，以防萬一出了問題，如果您想：

```PHP
$Web->demojibakefier();
```

一個更完整的示例：

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

*嘗試上傳文件`ascii_standard_testfile.txt`，僅出於測試phpMussel的目的而提供的良性樣本：*

![屏幕截圖](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/web-v3.0.0-alpha2.png)

#### 3.3 CLI模式

要實例化CLI處理程序：

```PHP
$CLI = new \phpMussel\CLI\CLI($Loader, $Scanner);
```

一個更完整的示例：

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

*屏幕截圖：*

![屏幕截圖](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/cli-v3.0.0-alpha2.png)

#### 3.4 前端

實例化前端：

```PHP
$FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
```

一個更完整的示例：

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

*屏幕截圖：*

![屏幕截圖](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/frontend-v3.0.0-alpha2.png)

#### 3.5 掃描程序API

如果您想，還可以在其他程序和腳本中利用phpMussel掃描程序API。

一個更完整的示例：

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

該示例要注意的重要部分是`scan()`方法。​`scan()`方法接受兩個參數：

```PHP
public function scan(mixed $Files, int $Format = 0): mixed
```

第一個參數可以是字符串或數組，並告訴掃描程序應掃描的內容。​它可以是指示特定文件或目錄的字符串，也可以是此類字符串的數組以指定多個文件/目錄。

當為字符串時，它應指向可以在何處找到數據。​當作為陣列時，陣列鍵應指示要掃描的項目的原始名稱，並且值應指向可以找到數據的位置。

第二個參數是整數，它告訴掃描程序應如何返回其掃描結果。

指定『1』以將掃描結果作為數組返回，每個元素將掃描項表示為整數。

這些整數具有以下含義：

結果 | 說明
--:|:--
-5 | 表明由於其他原因，掃描無法完成。
-4 | 表明由於加密而無法掃描數據。
-3 | 表明問題是遇到關於phpMussel簽名文件。
-2 | 表明損壞數據是檢測中掃描和因此掃描失敗完成。
-1 | 表明擴展或插件需要通過PHP以經營掃描是失踪和因此掃描失敗完成。
0 | 表明掃描目標不存在和因此沒有任何事為掃描。
1 | 表明掃描目標是成功掃描和沒有任何問題檢測。
2 | 表明掃描目標是成功掃描和至少一些問題是檢測。

指定2以將掃描結果作為布爾值返回。

結果 | 說明
:-:|:--
`true` | 檢測到問題（掃描目標很危險）。
`false` | 未檢測到問題（掃描目標可能是安全的）。

指定3以數組形式返回掃描結果，每個掃描項目的每個元素均包含人類可讀的文本。

*示例輸出：*

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

指定4以將掃描結果作為人類可讀文本字符串返回（像3，但內爆了）。

*示例輸出：*

```
Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)! Detected phpMussel-Testfile.CoEx (coex_testfile.rtf)! Detected encrypted archive; Encrypted archives not permitted (encrypted.zip)!
```

指定其他任何值以返回格式化的文本（即，使用CLI時看到的掃描結果）。

*示例輸出：*

*也可以看看： [掃描時如何訪問文件的具體細節？](#SCAN_DEBUGGING)*

#### 3.6 2FA（雙因素身份驗證）

通過啟用雙因素身份驗證，可以使前端更安全。​當登錄使用2FA的帳戶時，會向與該帳戶關聯的電子郵件地址發送電子郵件。​此電子郵件包含『2FA代碼』，用戶必須輸入它（以及他們的用戶名和密碼），為了能夠使用該帳戶登錄。​這意味著獲取帳戶密碼不足以讓任何黑客或潛在攻擊者能夠帳戶登錄，因為他們還需要訪問帳戶的電子郵件地址才能接收和使用會話的2FA代碼（從而使前端更安全）。

在安裝PHPMailer後，您需要通過phpMussel配置頁面或配置文件填充PHPMailer的配置指令。​有關這些配置指令的更多信息包含在本文檔的配置部分中。​在填充PHPMailer配置指令後，將`enable_two_factor`設置為`true`。​現在應啟用雙因素身份驗證。

接下來，您需要讓phpMussel知道在使用該帳戶登錄時將2FA代碼發送到何處。​為此，請使用電子郵件地址作為帳戶的用戶名（例如，`foo@bar.tld`），或者將電子郵件地址作為用戶名的一部分包括在內，就像通常發送電子郵件一樣（例如，`Foo Bar <foo@bar.tld>`）。

---


### 4. <a name="SECTION4"></a>擴展PHPMUSSEL

phpMussel在設計時考慮了可擴展性。​向phpMussel組織中的任何存儲庫拉請求和[貢獻](https://github.com/phpMussel/.github/blob/master/CONTRIBUTING.md)總是歡迎的。​如果需要，您也可以修改或擴展phpMussel以適合自己的需求（例如，用於特定於您的特定實現的修改或擴展，用於需要phpMussel的新插件和新Composer軟件包，等等）。

從v3開始，所有phpMussel功能都作為類存在。​這意味著在某些情況下，PHP提供的[對象繼承](https://www.php.net/manual/zh/language.oop5.inheritance.php)機制可能是擴展phpMussel的簡便且適當的方法。

phpMussel還提供了自己的擴展機制。​在v3之前，首選的機制是phpMussel的集成插件系統。​從v3開始，首選的機制是事件編排程序。

用於擴展phpMussel和編寫新插件的樣板代碼可在[樣板庫](https://github.com/phpMussel/plugin-boilerplates)中公開獲得。​還包括[所有當前支持的事件](https://github.com/phpMussel/plugin-boilerplates/tree/master/boilerplate-v3#currently-supported-events)的列表，以及有關如何使用樣板代碼的更詳細的說明。

v3樣板代碼的結構與phpMussel組織中各種phpMussel v3存儲庫的結構相同。​這不是巧合。​只要有可能，我建議您將v3樣板代碼用於可擴展性，並使用與phpMussel v3本身相似的設計原理。​如果您選擇公開您的新擴展程序或插件，您可以集成Composer支持，理論上其他人應該有可能以與phpMussel v3完全相同的方式來利用您的擴展程序或插件，只需將其與其他Composer依賴項一起使用，並在實現時應用任何必要的事件處理程序即可​（當然，不要忘了在出版物中包含說明，以便其他人知道可能存在的任何必要事件處理程序，以及正確安裝和使用出版物所必需的任何其他信息）。

---


### 7. <a name="SECTION7"></a>配置選項

以下是phpMussel接受的配置指令的列表，​以及一個說明的他們的目的和功能。

```
配置 (v3)
│
├───core
│       scan_log [string]
│       scan_log_serialized [string]
│       error_log [string]
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
│       enable_apcu [bool]
│       enable_memcached [bool]
│       enable_redis [bool]
│       enable_pdo [bool]
│       memcached_host [string]
│       memcached_port [int]
│       redis_host [string]
│       redis_port [int]
│       redis_timeout [float]
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
├───web
│       uploads_log [string]
│       forbid_on_block [bool]
│       max_uploads [int]
│       ignore_upload_errors [bool]
│       theme [string]
│       magnification [float]
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

#### 『core』 （類別）
基本配置（任何不屬於其他類別的核心配置）。

##### 『scan_log』 `[string]`
- 文件為記錄在所有掃描結果。​指定一個文件名，​或留空以關閉。

##### 『scan_log_serialized』 `[string]`
- 文件為記錄在所有掃描結果（它採用序列化格式）。​指定一個文件名，​或留空以關閉。

##### 『error_log』 `[string]`
- 用於記錄檢測到的任何非致命錯誤的文件。​指定一個文件名，​或留空以禁用。

##### 『truncate』 `[string]`
- 截斷日誌文件當他們達到一定的大小嗎？​值是在B/KB/MB/GB/TB，​是日誌文件允許的最大大小直到它被截斷。​默認值為『0KB』將禁用截斷（日誌文件可以無限成長）。​注意：適用於單個日誌文件！​日誌文件大小不被算集體的。

##### 『log_rotation_limit』 `[int]`
- 日誌輪轉限制了任何時候應該存在的日誌文件的數量。​當新的日誌文件被創建時，如果日誌文件的指定的最大數量已經超過，將執行指定的操作。​您可以在此指定所需的限制。​值為『0』將禁用日誌輪轉。

##### 『log_rotation_action』 `[string]`
- 日誌輪轉限制了任何時候應該存在的日誌文件的數量。​當新的日誌文件被創建時，如果日誌文件的指定的最大數量已經超過，將執行指定的操作。​您可以在此處指定所需的操作。​『Delete』=刪除最舊的日誌文件，直到不再超出限制。​『Archive』=首先歸檔，然後刪除最舊的日誌文件，直到不再超出限制。

```
log_rotation_action
├─Delete ("Delete")
└─Archive ("Archive")
```

##### 『timezone』 `[string]`
- 這用於指定要使用的時區​（例如，Africa/Cairo，America/New_York，Asia/Tokyo，Australia/Perth，Europe/Berlin，Pacific/Guam，等等）。​指定『SYSTEM』使PHP自動為您處理。

```
timezone
├─SYSTEM ("使用系統默認時區。")
├─UTC ("UTC")
└─…其他
```

##### 『time_offset』 `[int]`
- 時區偏移量（分鐘）。

##### 『time_format』 `[string]`
- phpMussel使用的日期符號格式。​可根據要求增加附加選項。

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
└─…其他
```

##### 『ipaddr』 `[string]`
- 在哪裡可以找到連接請求IP地址？​（可以使用為服務例如Cloudflare和類似）。​標準 = REMOTE_ADDR。​警告：不要修改此除非您知道什麼您做著！

```
ipaddr
├─HTTP_INCAP_CLIENT_IP ("HTTP_INCAP_CLIENT_IP (Incapsula)")
├─HTTP_CF_CONNECTING_IP ("HTTP_CF_CONNECTING_IP (Cloudflare)")
├─CF-Connecting-IP ("CF-Connecting-IP (Cloudflare)")
├─HTTP_X_FORWARDED_FOR ("HTTP_X_FORWARDED_FOR (Cloudbric)")
├─X-Forwarded-For ("X-Forwarded-For (Squid)")
├─REMOTE_ADDR ("REMOTE_ADDR (Default)")
└─…其他
```

也可以看看：
- [NGINX Reverse Proxy](https://docs.nginx.com/nginx/admin-guide/web-server/reverse-proxy/)
- [Squid configuration directive forwarded_for](http://www.squid-cache.org/Doc/config/forwarded_for/)

##### 『delete_on_sight』 `[bool]`
- 激活的這個指令將指示腳本馬上刪除任何掃描文件上傳匹配任何檢測標準，​是否通過簽名或任何事其他。​文件已確定是清潔將會忽略。​如果是存檔，​全存檔將會刪除，​不管如果違規文件是只有一個的幾個文件包含在存檔。​為文件上傳掃描，​按說，​它不必要為您激活這個指令，​因為按說，​PHP將自動清洗內容的它的緩存當執行是完，​意思它將按說刪除任何文件上傳從它向服務器如果不已移動，​複製或刪除。​這個指令是添加這里為額外安全為任何人誰的PHP副本可能不始終表現在預期方式。​False【假/負】：之後掃描，​忽略文件【標準】，​True【真/正】：之後掃描，​如果不清潔，​馬上刪除。

##### 『lang』 `[string]`
- 指定標準phpMussel語言。

```
lang
├─en ("English")
├─ar ("العربية")
├─bn ("বাংলা")
├─de ("Deutsch")
├─es ("Español")
├─fr ("Français")
├─hi ("हिंदी")
├─id ("Bahasa Indonesia")
├─it ("Italiano")
├─ja ("日本語")
├─ko ("한국어")
├─lv ("Latviešu")
├─nl ("Nederlandse")
├─no ("Norsk")
├─pl ("Polski")
├─pt ("Português")
├─ru ("Русский")
├─sv ("Svenska")
├─ta ("தமிழ்")
├─th ("ภาษาไทย")
├─tr ("Türkçe")
├─ur ("اردو")
├─vi ("Tiếng Việt")
├─zh ("中文（简体）")
└─zh-TW ("中文（傳統）")
```

##### 『lang_override』 `[bool]`
- 盡可能根據HTTP_ACCEPT_LANGUAGE進行本地化？True（真）=進行本地化【標準】；False（假）=不要本地化。

##### 『scan_cache_expiry』 `[int]`
- 多長時間應該phpMussel維持掃描結果？​數值是秒數為維持掃描結果。​標準是21600秒（6小時）； 一個`0`數值將停止維持掃描結果。

##### 『maintenance_mode』 `[bool]`
- 啟用維護模式？​True（真）=關閉；​False（假）=不關閉【標準】。​它停用一切以外前端。​有時候在更新CMS，框架，等時有用。

##### 『statistics』 `[bool]`
- 跟踪phpMussel使用情況統計？​True（真）=跟踪；False（假）=不跟踪【標準】。

##### 『disabled_channels』 `[string]`
- 這可用於防止phpMussel在發送請求時使用特定通道（例如，在更新時，在獲取組件元數據時，等等）。

```
disabled_channels
├─GitHub ("GitHub")
├─BitBucket ("BitBucket")
├─VirusTotal_HTTPS ("VirusTotal (HTTPS)")
└─VirusTotal_HTTP ("VirusTotal (HTTP)")
```

##### 『default_timeout』 `[int]`
- 用於外部請求的默認超時？ 標準 = 12秒。

#### 『signatures』 （類別）
簽名，簽名文件，等的配置。

##### 『active』 `[string]`
- 活性簽名文件的列表，​以逗號分隔。​注意：首先必須安裝簽名文件，然後才能激活它們。​為了使測試文件正常工作，必須安裝並激活簽名文件。

##### 『fail_silently』 `[bool]`
- phpMussel應該報告當簽名文件是失踪或損壞嗎？​如果`fail_silently`是關閉，​失踪和損壞文件將會報告當掃描，​和如果`fail_silently`是激活，​失踪和損壞文件將會忽略，​有掃描報告為那些文件哪裡沒有問題。​這個應該按說被留下除非您遇到失敗或有其他類似問題。​False（假）=是關閉；True（真）=是激活【默認】。

##### 『fail_extensions_silently』 `[bool]`
- phpMussel應該報告當擴展是失踪嗎？​如果`fail_extensions_silently`是關閉，​失踪擴展將會報告當掃描，​和如果`fail_extensions_silently`是激活，​失踪擴展將會忽略，​有掃描報告為那些文件哪裡沒有任何問題。​關閉的這個指令可能的可以增加您的安全，​但可能還導致一個增加的假陽性。​False（假）=是關閉；True（真）=是激活【默認】。

##### 『detect_adware』 `[bool]`
- phpMussel應該使用簽名為廣告軟件檢測嗎？​False（假）=不檢查，​True（真）=檢查【默認】。

##### 『detect_joke_hoax』 `[bool]`
- phpMussel應該使用簽名為病毒/惡意軟件笑話/惡作劇檢測嗎？​False（假）=不檢查，​True（真）=檢查【默認】。

##### 『detect_pua_pup』 `[bool]`
- phpMussel應該使用簽名為PUP/PUA（可能無用/非通緝程序/軟件）檢測嗎？​False（假）=不檢查，​True（真）=檢查【默認】。

##### 『detect_packer_packed』 `[bool]`
- phpMussel應該使用簽名為打包機和打包數據檢測嗎？​False（假）=不檢查，​True（真）=檢查【默認】。

##### 『detect_shell』 `[bool]`
- phpMussel應該使用簽名為webshell腳本檢測嗎？​False（假）=不檢查，​True（真）=檢查【默認】。

##### 『detect_deface』 `[bool]`
- phpMussel應該使用簽名為污損的污損軟件檢測嗎？​False（假）=不檢查，​True（真）=檢查【默認】。

##### 『detect_encryption』 `[bool]`
- phpMussel應該檢測並阻止加密的文件嗎？​False（假）=不檢查，​True（真）=檢查【默認】。

##### 『heuristic_threshold』 `[int]`
- 有某些簽名的phpMussel意味為確定可疑和可能惡意文件零件被上傳有不在他們自己確定那些文件被上傳特別是作為惡意。​這個『threshold』數值告訴phpMussel什麼是最大總重量的可疑和潛在惡意文件零件被上傳允許之前那些文件是被識別作為惡意。​定義的重量在這個上下文是總數值的可疑和可能惡意文件零件確定。​作為默認，​這個數值將會設置作為3。​一個較低的值通常將結果在一個更高的發生的假陽性但一個更高的發生的惡意文件被確定，​而一個更高的數值將通常結果在一個較低的發生的假陽性但一個較低的數值的惡意文件被確定。​它是通常最好忽略這個數值除非您遇到關聯問題。

#### 『files』 （類別）
在掃描過程中如何處理文件。

##### 『filesize_limit』 `[string]`
- 文件大小限在KB。​65536 = 64MB【默認】，​0 = 沒有限（始終灰名單），​任何正數值接受。​這個可以有用當您的PHP配置限內存量一個進程可以佔據或如果您的PHP配置限文件大小的上傳。

##### 『filesize_response』 `[bool]`
- 如何處理文件超過文件大小限（如果存在）。​False（假）=白名單；True（真）=黑名單【默認】。

##### 『filetype_whitelist』 `[string]`
- 如果您的系統只允許具體文件類型被上傳，​或如果您的系統明確地否認某些文件類型，​指定那些文件類型在白名單，​黑名單和灰名單可以增加掃描執行速度通過允許腳本跳過某些文件類型。​格式是CSV（逗號分隔變量）。​如果您想掃描一切，​而不是白名單，​黑名單或灰名單，​留變量空；這樣做將關閉白名單/黑名單/灰名單。​進程邏輯順序是：如果文件類型已白名單，​不掃描和不受阻文件，​和不匹配文件對照黑名單或灰名單。​如果文件類型已黑名單，​不掃描文件但阻止它無論如何，​和不匹配文件對照灰名單。​如果灰名單是空，​或如果灰名單不空和文件類型已灰名單，​掃描文件像正常和確定如果阻止它基於掃描結果，​但如果灰名單不空和文件類型不灰名單，​過程文件彷彿已黑名單，​因此不掃描它但阻止它無論如何。​白名單：

##### 『filetype_blacklist』 `[string]`
- 黑名單：

##### 『filetype_greylist』 `[string]`
- 灰名單：

##### 『check_archives』 `[bool]`
- 嘗試匹配存檔內容嗎？​False（假）=不匹配；True（真）=匹配【默認】。 已支持：Zip（需要libzip），Tar，Rar（需要rar擴展名）。

##### 『filesize_archives』 `[bool]`
- 繼承文件大小黑名單/白名單在存檔內容嗎？​False（假）=不繼承（剛灰名單一切）；True（真）=繼承【默認】。

##### 『filetype_archives』 `[bool]`
- 繼承文件類型黑名單/白名單在存檔內容嗎？​False（假）=不繼承（剛灰名單一切）【默認】；​True（真）=繼承。

##### 『max_recursion』 `[int]`
- 最大存檔遞歸深度限。​默認=3。

##### 『block_encrypted_archives』 `[bool]`
- 檢測和受阻加密的存檔嗎？​因為phpMussel是不能夠掃描加密的存檔內容，​它是可能存檔加密可能的可以使用通過一個攻擊者作為一種手段嘗試繞過phpMussel，​殺毒掃描程序和其他這樣的保護。​指示phpMussel受阻任何存檔它發現被加密可能的可以幫助減少任何風險有關聯這些可能性。​False（假）=不受阻；True（真）=受阻【默認】。

##### 『max_files_in_archives』 `[int]`
- 在中止掃描之前從檔案中掃描的最大文件數。​默認=0（沒有最大文件數）。

##### 『chameleon_from_php』 `[bool]`
- 尋找PHP頭在文件是不PHP文件也不認可存檔文件。​False（假）=是關閉；True（真）=是激活。

##### 『can_contain_php_file_extensions』 `[string]`
- 允許包含PHP代碼的文件擴展名列表，以逗號分隔。​如果啟用了PHP變色龍攻擊檢測，包含PHP代碼的文件，其擴展名不在此列表中，將被檢測為PHP變色龍攻擊。

##### 『chameleon_from_exe』 `[bool]`
- 尋找可執行頭在文件是不可執行文件也不認可存檔文件和尋找可執行文件誰的頭是不正確。​False（假）=是關閉；True（真）=是激活。

##### 『chameleon_to_archive』 `[bool]`
- 檢測在存檔和壓縮文件中的錯誤標頭。已支持：BZ/BZIP2，GZ/GZIP，LZF，RAR，ZIP。​False（假）=是關閉；True（真）=是激活。

##### 『chameleon_to_doc』 `[bool]`
- 尋找辦公文檔誰的頭是不正確（已支持：DOC，​DOT，​PPS，​PPT，​XLA，​XLS，​WIZ）。​False（假）=是關閉；True（真）=是激活。

##### 『chameleon_to_img』 `[bool]`
- 尋找圖像誰的頭是不正確（已支持：BMP，​DIB，​PNG，​GIF，​JPEG，​JPG，​XCF，​PSD，​PDD，​WEBP）。​False（假）=是關閉；True（真）=是激活。

##### 『chameleon_to_pdf』 `[bool]`
- 尋找PDF文件誰的頭是不正確。​False（假）=是關閉；True（真）=是激活。

##### 『archive_file_extensions』 `[string]`
- 認可存檔文件擴展（格式是CSV；應該只添加或去掉當問題發生；不必要的去掉可能的可以導致假陽性出現為存檔文件，​而不必要的增加將實質上白名單任何事您增加從專用攻擊檢測；修改有慎重；還請注這個無影響在什麼存檔可以和不能被分析在內容級）。​這個名單，​作為是作為標準，​名單那些格式使用最常見的橫過多數的系統和CMS，​但有意是不全面。

##### 『block_control_characters』 `[bool]`
- 受阻任何文件包含任何控製字符嗎（以外換行符）？​(`[\x00-\x08\x0b\x0c\x0e\x1f\x7f]`) 如果您只上傳純文本，​您可以激活這個指令以提供某些另外保護在您的系統。​然而，​如果您上傳任何事以外純文本，​激活這個可能結果在假陽性。​False（假）=不受阻【默認】；True（真）=受阻。

##### 『corrupted_exe』 `[bool]`
- 損壞文件和處理錯誤。​False（假）=忽略；True（真）=受阻【默認】。​檢測和受阻潛在的損壞移植可執行【PE】文件嗎？​時常（但不始終），​當某些零件的一個移植可執行【PE】文件是損壞或不能被正確處理，​它可以建議建議的一個病毒感染。​過程使用通過最殺毒程序以檢測病毒在PE文件需要處理那些文件在某些方式，​哪裡，​如果程序員的一個病毒是意識的，​將特別嘗試防止，​以允許他們的病毒留不檢測。

##### 『decode_threshold』 `[string]`
- 在原始數據中解碼命令的長度限制（如果有任何引人注目性能問題當掃描）。​默認 = 512KB。​零或空值將關閉門檻（去除任何這樣的限基於文件大小）。

##### 『scannable_threshold』 `[string]`
- 原始數據讀取和掃描的最大長度（如果有任何引人注目性能問題當掃描）。​默認 = 32MB。​零或空值將關閉門檻。​按說，​這個數值應不會少於平均文件大小的文件上傳您想和期待收到您的服務器或網站，​應不會多於`filesize_limit`指令，​和應不會多於大致五分之一的總允許內存分配獲授PHP通過"php.ini"配置文件。​這個指令存在為嘗試防止phpMussel從用的太多內存（這個將防止它從能夠順利掃描文件以上的一個特別文件大小）。

##### 『allow_leading_trailing_dots』 `[bool]`
- 允許文件名中的前導和尾隨點嗎？​這有時可用於隱藏文件，或欺騙某些系統允許目錄遍歷。​False（假）=不允許【默認】；True（真）=允許。

##### 『block_macros』 `[bool]`
- 嘗試阻止任何包含宏的文件嗎？​某些文檔和電子表格類型可能包含可執行的宏，因此提供了危險的潛在惡意軟件向量。​False（假）=不阻止【默認】；​True（真）=阻止。

##### 『only_allow_images』 `[bool]`
- 設置為true時，掃描程序遇到的任何非圖像文件將被立即標記，而不會被掃描。​在某些情況下，這可能有助於減少完成掃描所需的時間。​默認情況下設置為false。

#### 『quarantine』 （類別）
検疫配置。

##### 『quarantine_key』 `[string]`
- phpMussel能夠検疫被阻止的文件上傳，​如果這個是某物您想。​普通用戶的phpMussel簡單地想保護他們的網站或宿主環境無任何興趣在深深分析任何嘗試文件上傳應該離開這個功能關閉，​但任何用戶有興趣在更深分析的嘗試文件上傳為目的惡意軟件研究或為類似這樣事情應該激活這個功能。​檢疫的嘗試文件上傳可以有時還助攻在調試假陽性，​如果這個是某物經常發生為您。​以關閉檢疫功能，​簡單地離開`quarantine_key`指令空白，​或抹去內容的這個指令如果它不已空白。​以激活検疫功能，​輸入一些值在這個指令。​`quarantine_key`是一個重要安全功能的検疫功能需要以預防檢疫功能從成為利用通過潛在攻擊者和以預防任何潛在執行的數據存儲在檢疫。​`quarantine_key`應該被處理在同樣方法作為您的密碼：更長是更好，​和緊緊保護它。​為獲得最佳效果，​在結合使用`delete_on_sight`。

##### 『quarantine_max_filesize』 `[string]`
- 最大允許文件大小為文件在檢疫。​文件大於這個指定數值將不成為檢疫。​這個指令是重要為使它更難為任何潛在攻擊者洪水您的檢疫用非通緝數據潛在的造成過度數據用法在您的虛擬主機服務。​標準 = 2MB。

##### 『quarantine_max_usage』 `[string]`
- 最大內存使用允許為檢疫。​如果總內存已用通過検疫到達這個數值，​最老檢疫文件將會刪除直到總內存已用不再到達這個數值。​這個指令是重要為使它更難為任何潛在攻擊者洪水您的檢疫用非通緝數據潛在的造成過度數據用法在您的虛擬主機服務。​數值是在KB。​標準 = 64MB。

##### 『quarantine_max_files』 `[int]`
- 検疫中可以存在的最大文件數量。​新文件添加到検疫時，如果超過此數量，則舊文件將被刪除，直到剩餘的文件不再超過此數量。​標準=100。

#### 『virustotal』 （類別）
Virus Total整合的配置。

##### 『vt_public_api_key』 `[string]`
- 可選的，​phpMussel可以掃描文件使用【Virus Total API】作為一個方法提供一個顯著的改善保護級別針對病毒，​木馬，​惡意軟件和其他威脅。​作為默認，​掃描文件使用【Virus Total API】是關閉。​以激活它，​一個API密鑰從VirusTotal是需要。​因為的顯著好處這個可以提供為您，​它是某物我很推薦激活。​請注意，​然而，​以使用的【Virus Total API】，​您必須同意他們的服務條款和您必須堅持所有方針按照說明通過VirusTotal閱讀材料！​您是不允許使用這個積分功能除非：您已閱讀和您同意服務條款的VirusTotal和它的API。​您已閱讀和您了解至少序言的VirusTotal公共API閱讀材料(一切之後『VirusTotal Public API v2.0』但之前『Contents』）。

也可以看看：
- [Terms of Service](https://www.virustotal.com/en/about/terms-of-service/)
- [Getting started](https://developers.virustotal.com/reference)

##### 『vt_suspicion_level』 `[int]`
- 作為標準，​phpMussel將限制什麼文件它掃描通過使用【Virus Total API】為那些文件它考慮作為『可疑』。​您可以可選調整這個局限性通過修改的`vt_suspicion_level`指令數值。

##### 『vt_weighting』 `[int]`
- phpMussel應使用掃描結果使用【Virus Total API】作為檢測或作為檢測重量嗎？​這個指令存在，​因為，​雖說掃描一個文件使用多AV引擎（例如怎麼樣VirusTotal做） 應結果有一個增加檢測率（和因此在一個更惡意文件被抓），​它可以還結果有更假陽性，​和因此，​為某些情況，​掃描結果可能被更好使用作為一個置信得分而不是作為一個明確結論。​如果一個數值的`0`是使用，​掃描結果使用【Virus Total API】將會適用作為檢測，​和因此，​如果任何AV引擎使用通過VirusTotal標致文件被掃描作為惡意，​phpMussel將考慮文件作為惡意。​如果任何其他數值是使用，​掃描結果使用【Virus Total API】將會適用作為檢測重量，​和因此，​數的AV引擎使用通過VirusTotal標致文件被掃描作為惡意將服務作為一個置信得分（或檢測重量） 為如果文件被掃描應會考慮惡意通過phpMussel（數值使用將代表最低限度的置信得分或重量需要以被考慮惡意）。​一個數值的`0`是使用作為標準。

##### 『vt_quota_rate』 `[int]`
- 根據【Virus Total API】閱讀材料，​它是限於最大的`4`請求的任何類型在任何`1`分鐘大致時間。​如果您經營一個『honeyclient』，​蜜罐或任何其他自動化將會提供資源為VirusTotal和不只取回報告您是有權一個更高請求率配額。​作為標準，​phpMussel將嚴格的堅持這些限制，​但因為可能性的這些率配額被增加，​這些二指令是提供為您指示phpMussel為什麼限它應堅持。​除非您是指示這樣做，​它是不推薦為您增加這些數值，​但，​如果您遇到問題相關的到達您的率配額，​減少這些數值可能有時幫助您解析這些問題。​您的率限是決定作為`vt_quota_rate`請求的任何類型在任何`vt_quota_time`分鐘大致時間。

##### 『vt_quota_time』 `[int]`
- （見上面的說明）。

#### 『urlscanner』 （類別）
URL掃描程序的配置。

##### 『google_api_key』 `[string]`
- 激活Google Safe Browsing API當API密鑰是設置。

也可以看看：
- [Google API Console](https://console.developers.google.com/)

##### 『maximum_api_lookups』 `[int]`
- 最大數值API請求來執行每個掃描迭代。​額外API請求將增加的總要求完成時間每掃描迭代，​所以，​您可能想來規定一個限以加快全掃描過程。​當設置`0`，​沒有最大數值將會應用的。​設置`10`作為默認。

##### 『maximum_api_lookups_response』 `[bool]`
- 該什麼辦如果最大數值API請求已超過？​False（假）=沒做任何事（繼續處理）【默認】；True（真）=標誌/受阻文件。

##### 『cache_time』 `[int]`
- 多長時間（以秒為單位）應API結果被緩存？​默認是3600秒（1小時）。

#### 『legal』 （類別）
法律要求的配置。

##### 『pseudonymise_ip_addresses』 `[bool]`
- 編寫日誌文件時使用假名的IP地址嗎？​True（真）=使用假名【標準】；False（假）=不使用假名。

##### 『privacy_policy』 `[string]`
- 要顯示在任何生成的頁面的頁腳中的相關隱私政策的地址。​指定一個URL，或留空以禁用。

#### 『supplementary_cache_options』 （類別）
補充緩存選項。

##### 『enable_apcu』 `[bool]`
- 指定是否嘗試使用APCu進行緩存。​默認 = False。

##### 『enable_memcached』 `[bool]`
- 指定是否嘗試使用Memcached進行緩存。​默認 = False。

##### 『enable_redis』 `[bool]`
- 指定是否嘗試使用Redis進行緩存。​默認 = False。

##### 『enable_pdo』 `[bool]`
- 指定是否嘗試使用PDO進行緩存。​默認 = False。

##### 『memcached_host』 `[string]`
- Memcached主機值。​默認 = 『localhost』。

##### 『memcached_port』 `[int]`
- Memcached端口值。​默認 = 『11211』。

##### 『redis_host』 `[string]`
- Redis主機值。​默認 = 『localhost』。

##### 『redis_port』 `[int]`
- Redis端口值。​默認 = 『6379』。

##### 『redis_timeout』 `[float]`
- Redis超時值。​默認 = 『2.5』。

##### 『pdo_dsn』 `[string]`
- PDO DSN值。​默認 = 『mysql:dbname=phpmussel;host=localhost;port=3306』。

##### 『pdo_username』 `[string]`
- PDO用戶名。

##### 『pdo_password』 `[string]`
- PDO密碼。

#### 『frontend』 （類別）
前端的配置。

##### 『frontend_log』 `[string]`
- 前端登錄嘗試的錄音文件。​指定一個文件名，​或留空以禁用。

##### 『max_login_attempts』 `[int]`
- 最大前端登錄嘗試次數。​標準=5。

##### 『numbers』 `[string]`
- 您如何喜歡顯示數字？​選擇最適合示例。

```
numbers
├─NoSep-1 ("1234567.89")
├─NoSep-2 ("1234567,89")
├─Latin-1 ("1,234,567.89")
├─Latin-2 ("1 234 567.89")
├─Latin-3 ("1.234.567,89")
├─Latin-4 ("1 234 567,89")
├─Latin-5 ("1,234,567·89")
├─China-1 ("123,4567.89")
├─India-1 ("12,34,567.89")
├─India-2 ("१२,३४,५६७.८९ (देवनागरी)")
├─India-3 ("૧૨,૩૪,૫૬૭.૮૯ (ગુજરાતી)")
├─India-4 ("੧੨,੩੪,੫੬੭.੮੯ (ਗੁਰਮੁਖੀ)")
├─India-5 ("೧೨,೩೪,೫೬೭.೮೯ (ಕನ್ನಡ)")
├─India-6 ("౧౨,౩౪,౫౬౭.౮౯ (తెలుగు)")
├─Arabic-1 ("١٢٣٤٥٦٧٫٨٩")
├─Arabic-2 ("١٬٢٣٤٬٥٦٧٫٨٩")
├─Arabic-3 ("۱٬۲۳۴٬۵۶۷٫۸۹")
├─Arabic-4 ("۱۲٬۳۴٬۵۶۷٫۸۹")
├─Bengali-1 ("১২,৩৪,৫৬৭.৮৯ (বাংলা সংখ্যাসমূহ)")
├─Burmese-1 ("၁၂၃၄၅၆၇.၈၉")
├─Khmer-1 ("១.២៣៤.៥៦៧,៨៩")
├─Lao-1 ("໑໒໓໔໕໖໗.໘໙")
├─Thai-1 ("๑,๒๓๔,๕๖๗.๘๙")
├─Thai-2 ("๑๒๓๔๕๖๗.๘๙")
├─Javanese ("꧑꧒꧓꧔꧕꧖꧗.꧘꧙")
├─Odia ("୧୨୩୪୫୬୭.୮୯")
└─Tibetan ("༡༢༣༤༥༦༧.༨༩")
```

##### 『default_algo』 `[string]`
- 定義要用於所有未來密碼和會話的算法。​選項：​PASSWORD_DEFAULT（標準），​PASSWORD_BCRYPT，​PASSWORD_ARGON2I（需要PHP >= 7.2.0），​PASSWORD_ARGON2ID（需要PHP >= 7.3.0）。

```
default_algo
├─PASSWORD_DEFAULT ("PASSWORD_DEFAULT")
├─PASSWORD_BCRYPT ("PASSWORD_BCRYPT")
├─PASSWORD_ARGON2I ("PASSWORD_ARGON2I (PHP >= 7.2.0)")
└─PASSWORD_ARGON2ID ("PASSWORD_ARGON2ID (PHP >= 7.3.0)")
```

##### 『theme』 `[string]`
- 用於phpMussel前端的美學。

```
theme
├─default ("Default")
├─rbi ("Red-Blue Inverted")
├─slate ("Slate")
├─bluemetal ("Blue Metal")
├─moss ("Moss")
├─fullmoon ("Full Moon")
└─…其他
```

##### 『magnification』 `[float]`
- 字體放大。​標準 = 1。

#### 『web』 （類別）
上傳處理程序的配置。

##### 『uploads_log』 `[string]`
- 應該記錄所有阻止的上傳的位置。​指定一個文件名，​或留空以關閉。

##### 『forbid_on_block』 `[bool]`
- phpMussel應該發送`403`頭隨著文件上傳受阻信息，​或堅持標準`200 OK`？​False（假）=發送`200`；True（真）=發送`403`【標準】。

##### 『max_uploads』 `[int]`
- 最大允許數值的文件為掃描當文件上傳掃描之前中止掃描和告訴用戶他們是上傳太多在同一時間！​提供保護針對一個理論攻擊哪裡一個攻擊者嘗試DDoS您的系統或CMS通過超載phpMussel以減速PHP進程到一個停止。​推薦：10。​您可能想增加或減少這個數值，​根據速度的您的硬件。​注意這個數值不交待為或包括存檔內容。

##### 『ignore_upload_errors』 `[bool]`
- 這個指令按說應會關閉除非它是需要為對功能的phpMussel在您的具體系統。​按說，​當是關閉，​當phpMussel檢測存在元素在`$_FILES`數組，​它將嘗試引發一個掃描的文件代表通過那些元素，​和，​如果他們是空或空白，​phpMussel將回報一個錯誤信息。​這個是正確行為為phpMussel。​然而，​為某些CMS，​空元素在`$_FILES`可以發生因之的自然的行為的那些CMS，​或錯誤可能會報告當沒有任何，​在這種情況，​正常行為為phpMussel將會使乾擾為正常行為的那些CMS。​如果這樣的一個情況發生為您，​激活這個指令將指示phpMussel不嘗試引發掃描為這樣的空元素，​忽略他們當發現和不回報任何關聯錯誤信息，​從而允許延續的頁面請求。​False（假）=不忽略；True（真）=忽略。

##### 『theme』 `[string]`
- 用於『上傳是否認』頁面的美學。

```
theme
├─default ("Default")
├─rbi ("Red-Blue Inverted")
├─slate ("Slate")
├─bluemetal ("Blue Metal")
├─moss ("Moss")
├─fullmoon ("Full Moon")
└─…其他
```

##### 『magnification』 `[float]`
- 字體放大。​標準 = 1。

#### 『phpmailer』 （類別）
PHPMailer的配置（用於雙因素身份驗證）。

##### 『event_log』 `[string]`
- 用於記錄與PHPMailer相關的所有事件的文件。​指定一個文件名，​或留空以禁用。

##### 『enable_two_factor』 `[bool]`
- 該指令確定是否將2FA用於前端帳戶。

##### 『enable_notifications』 `[string]`
- 如果要在阻止上傳時通過電子郵件收到通知，請在此處指定收件人電子郵件地址。

##### 『skip_auth_process』 `[bool]`
- 將此指令設置為`true`會指示PHPMailer跳過通過SMTP發送電子郵件時通常會發生的正常身份驗證過程。​應該避免這種情況，因為跳過此過程可能會將出站電子郵件暴露給MITM攻擊，但在此過程阻止PHPMailer連接到SMTP服務器的情況下可能是必要的。

##### 『host』 `[string]`
- 用於出站電子郵件的SMTP主機。

##### 『port』 `[int]`
- 用於出站電子郵件的端口號。​標準=587。

##### 『smtp_secure』 `[string]`
- 通過SMTP發送電子郵件時使用的協議（TLS或SSL）。

```
smtp_secure
├─default ("-")
├─tls ("TLS")
└─ssl ("SSL")
```

##### 『smtp_auth』 `[bool]`
- 此指令確定是否對SMTP會話進行身份驗證（通常應該保持不變）。

##### 『username』 `[string]`
- 通過SMTP發送電子郵件時使用的用戶名。

##### 『password』 `[string]`
- 通過SMTP發送電子郵件時使用的密碼。

##### 『set_from_address』 `[string]`
- 通過SMTP發送電子郵件時引用的發件人地址。

##### 『set_from_name』 `[string]`
- 通過SMTP發送電子郵件時引用的發件人姓名。

##### 『add_reply_to_address』 `[string]`
- 通過SMTP發送電子郵件時引用的回复地址。

##### 『add_reply_to_name』 `[string]`
- 通過SMTP發送電子郵件時引用的回複姓名。

---


### 8. <a name="SECTION8"></a>簽名格式

*也可以看看：*
- *[什麼是『簽名』？](#WHAT_IS_A_SIGNATURE)*

phpMussel簽名文件前9個字節（`[x0-x8]`）是`phpMussel`。​它作為一個『魔術數字』【magic number】，將其標識為簽名文件（這有助於防止phpMussel意外地嘗試使用文件不是簽名文件）。​下一個字節`[x9]`標識簽名文件的類型。​這一點必須知道以便能夠正確解釋簽名文件。​以下類型的簽名文件被認可：

類型 | 字節 | 說明
---|---|---
`General_Command_Detections` | `0?` | 為CSV（逗號分隔值）簽名文件。​值（簽名）是在文件中查找的十六進制編碼字符串。​這裡的簽名沒有任何名稱或其他詳細信息（只有要檢測的字符串）。
`Filename` | `1?` | 為文件名簽名。
`Hash` | `2?` | 為哈希簽名。
`Standard` | `3?` | 為與文件內容直接工作的簽名文件。
`Standard_RegEx` | `4?` | 為與文件內容直接工作的簽名文件。​簽名可以包含正則表達式。
`Normalised` | `5?` | 為用於ANSI標準化文件內容的簽名文件。
`Normalised_RegEx` | `6?` | 為用於ANSI標準化文件內容的簽名文件。​簽名可以包含正則表達式。
`HTML` | `7?` | 為用於HTML標準化文件內容的簽名文件。
`HTML_RegEx` | `8?` | 為用於HTML標準化文件內容的簽名文件。​簽名可以包含正則表達式。
`PE_Extended` | `9?` | 為使用PE元數據的簽名文件（但不PE部分元數據）。
`PE_Sectional` | `A?` | 為使用PE部分元數據的簽名文件。
`Complex_Extended` | `B?` | 為使用各種規則的簽名文件，基於由phpMussel生成的擴展元數據。
`URL_Scanner` | `C?` | 為使用URL的簽名文件。

下一個字節`[x10]`是一個換行符`[0A]`，並結束phpMussel簽名文件頭。

之後的每個非空行都是簽名或規則。​每個簽名或規則佔用一行。​支持的簽名格式如下所述。

#### *文件名簽名*
所有文件名簽名跟隨格式：

`NAME:FNRX`

`NAME`是名援引為簽名和`FNRX`是正則表達式匹配文件名（未編碼）為。

#### *哈希簽名*
所有哈希簽名跟隨格式：

`HASH:FILESIZE:NAME`

`HASH`是全文件的哈希（通常是MD5），​`FILESIZE`是總文件大小和`NAME`是名援引為簽名。

#### *移植可執行【PE】部分簽名*
所有移植可執行【PE】部分簽名跟隨格式：

`SIZE:HASH:NAME`

`HASH`是一個MD5哈希的一個部分的一個移植可執行【PE】文件，​`SIZE`是總大小的該部分和`NAME`是名援引為簽名。

#### *移植可執行【PE】擴展簽名*
所有移植可執行【PE】擴展簽名跟隨格式：

`$VAR:HASH:SIZE:NAME`

`$VAR`是移植可執行【PE】變量名匹配為，​`HASH`是一個MD5哈希的該變量，​`SIZE`是總大小的該變量和`NAME`是名援引為簽名。

#### *複雜擴展簽名*
複雜擴展簽名是寧不同從其他可能phpMussel簽名類型，​在某種意義上說，​什麼他們匹配針對是指定通過這些簽名他們自己和他們可以匹配針對多重標準。​多重標準是分隔通過【;】和匹配類型和匹配數據的每多重標準是分隔通過【:】以確保格式為這些簽名往往看起來有點像：

`$變量1:某些數據;$變量2:某些數據;簽名等等`

#### *一切其他*
所有其他簽名跟隨格式：

`NAME:HEX:FROM:TO`

`NAME`是名援引為簽名和`HEX`是一個十六進制編碼分割的文件意味被匹配通過有關簽名。​`FROM`和`TO`是可選參數，​說明從哪里和向哪裡在源數據匹配針對。

#### *正則表達式/REGEX*
任何形式的正則表達式了解和正確地處理通過PHP應還會正確地了解和處理通過phpMussel和它的簽名。​然而，​我將建議採取極端謹慎當寫作新正則表達式為基礎的簽名，​因為，​如果您不完全肯定什麼您被做，​可以有很不規則和/或意外結果。​看一眼的phpMussel源代碼如果您不完全肯定的上下文其中正則表達式語句被處理。​還，​記得，​所有語句（除外為文件名，​存檔元數據和MD5語句）必須是十六進制編碼（和除外為語句句法，​還，​當然）！

---


### 9. <a name="SECTION9"></a>已知的兼容問題

#### 殺毒軟件兼容性

有時phpMussel和其他防病毒解決方案之間存在兼容性問題。​因此，大約每隔幾個月，我對照Virus Total檢查了最新版本的phpMussel代碼庫，為了看那裡是否報告了任何問題。​報告了問題時，我會在文檔中在此處列出報告的問題。

當我最近檢查（2019年10月10日）時，沒有任何問題的報告。

我不檢查簽名文件，文檔或其他外圍內容。​當其他防病毒解決方案檢測到簽名文件時，它們總是會引起一些誤報（假陽性）。​因此，我強烈建議，如果您打算在已經存在另一種防病毒解決方案的計算機上安裝phpMussel，將phpMussel簽名文件列入白名單。

*也可以看看：​[兼容性圖表](https://maikuolan.github.io/Compatibility-Charts/)。*

---


### 10. <a name="SECTION10"></a>常見問題（FAQ）

- [什麼是『簽名』？](#WHAT_IS_A_SIGNATURE)
- [什麼是『假陽性』？](#WHAT_IS_A_FALSE_POSITIVE)
- [什麼是簽名更新頻率？](#SIGNATURE_UPDATE_FREQUENCY)
- [我在使用phpMussel時遇到問題和我不知道該怎麼辦！​請幫忙！](#ENCOUNTERED_PROBLEM_WHAT_TO_DO)
- [我想使用phpMussel v3與早於7.2.0的PHP版本；​您能幫我嗎？](#MINIMUM_PHP_VERSION_V3)
- [我可以使用單個phpMussel安裝來保護多個域嗎？](#PROTECT_MULTIPLE_DOMAINS)
- [我不想浪費時間安裝這個和確保它在我的網站上功能正常；我可以僱用您這樣做嗎？](#PAY_YOU_TO_DO_IT)
- [我可以聘請您或這個項目的任何開發者私人工作嗎？](#HIRE_FOR_PRIVATE_WORK)
- [我需要專家修改，​的定制，​等等；您能幫我嗎？](#SPECIALIST_MODIFICATIONS)
- [我是開發人員，​網站設計師，​或程序員。​我可以接受還是提供與這個項目有關的工作？](#ACCEPT_OR_OFFER_WORK)
- [我想為這個項目做出貢獻；我可以這樣做嗎？](#WANT_TO_CONTRIBUTE)
- [掃描時如何訪問文件的具體細節？](#SCAN_DEBUGGING)
- [黑名單 – 白名單 – 灰名單 – 他們是什麼，我如何使用它們？](#BLACK_WHITE_GREY)
- [『PDO DSN』是什麼？如何能PDO與phpMussel一起使用？](#HOW_TO_USE_PDO)
- [我的上傳工具是異步的（例如，使用ajax，ajaj，json，等等）。當上傳阻止時，我看不到任何特殊消息或警告。發生了什麼？](#AJAX_AJAJ_JSON)
- [phpMussel可以檢測EICAR嗎？](#DETECT_EICAR)

#### <a name="WHAT_IS_A_SIGNATURE"></a>什麼是『簽名』？

在phpMussel的上下文中，『簽名』是用於識別我們正在尋找的特定內容的數據，它通常採取一些非常小，不同，無害的一些更大和有害的東西的形式（例如，它可以識別病毒，木馬，等等）。​也可以是文件校驗和，哈希或其他類似的標識符。​通常包括一個標籤和一些其他數據，以幫助提供額外的上下文，可以由phpMussel使用它來確定遇到我們正在尋找的最佳方法。

#### <a name="WHAT_IS_A_FALSE_POSITIVE"></a>什麼是『假陽性』？

術語『假陽性』（*或者：『假陽性錯誤』；『虛驚』*；英語：*false positive*； *false positive error*； *false alarm*），​很簡單地描述，​和在一個廣義上下文，​被用來當測試一個因子，​作為參考的測試結果，​當結果是陽性（即：因子被確定為『陽性』，​或『真』），​但預計將為（或者應該是）陰性（即：因子，​在現實中，​是『陰性』，​或『假』）。​一個『假陽性』可被認為是同樣的『哭狼』 (其中，​因子被測試是是否有狼靠近牛群，​因子是『假』由於該有沒有狼靠近牛群，​和因子是報告為『陽性』由牧羊人通過叫喊『狼，​狼』），​或類似在醫學檢測情況，​當患者被診斷有一些疾病，​當在現實中，​他們沒有疾病。

一些相關術語是『真陽性』，​『真陰性』和『假陰性』。​一個『真陽性』指的是當測試結果和真實因子狀態都是『真』（或『陽性』），​和一個『真陰性』指的是當測試結果和真實因子狀態都是『假』（或『陰性』）；一個『真陽性』或『真陰性』被認為是一個『正確的推理』。​對立面『假陽性』是一個『假陰性』；一個『假陰性』指的是當測試結果是『陰性』（即：因子被確定為『陰性』，​或『假』），​但預計將為（或者應該是）陽性（即：因子，​在現實中，​是『陽性』，​或『真』）。

在phpMussel的上下文，​這些術語指的是phpMussel的簽名和他們阻止的文件。​當phpMussel阻止一個文件由於惡劣的，​過時的，​或不正確的簽名，​但不應該這樣做，​或當它這樣做為錯誤的原因，​我們將此事件作為一個『假陽性』。​當phpMussel未能阻止文件該應該已被阻止，​由於不可預見的威脅，​缺少簽名或不足簽名，​我們將此事件作為一個『檢測錯過』（同樣的『假陰性』）。

這可以通過下表來概括：

&nbsp; | phpMussel不應該阻止文件 | phpMussel應該阻止文件
---|---|---
phpMussel不會阻止文件 | 真陰性（正確的推理） | 檢測錯過（同樣的『假陰性』）
phpMussel會阻止文件 | __假陽性__ | 真陽性（正確的推理）

#### <a name="SIGNATURE_UPDATE_FREQUENCY"></a>什麼是簽名更新頻率？

更新頻率根據相關的簽名文件而有所不同。​所有的phpMussel簽名文件的維護者通常盡量保持他們的簽名為最新，​但是因為我們所有人都有各種其他承諾，​和因為我們的生活超越了項目，​和因為我們不得到經濟補償/付款為我們的項目的努力，​無法保證精確的更新時間表。​通常，​簽名被更新每當有足夠的時間。​幫助總是感謝，​如果你願意提供任何。

#### <a name="ENCOUNTERED_PROBLEM_WHAT_TO_DO"></a>我在使用phpMussel時遇到問題和我不知道該怎麼辦！​請幫忙！

- 您使用軟件的最新版本嗎？​您使用簽名文件的最新版本嗎？​如果這兩個問題的答案是不，​嘗試首先更新一切，​然後檢查問題是否仍然存在。​如果它仍然存在，​繼續閱讀。
- 您檢查過所有的文檔嗎？​如果沒有做，​請這樣做。​如果文檔不能解決問題，​繼續閱讀。
- 您檢查過[issues頁面](https://github.com/phpMussel/phpMussel/issues)嗎？​檢查是否已經提到了問題。​如果已經提到了，​請檢查是否提供了任何建議，​想法或解決方案。​按照需要嘗試解決問題。
- 如果問題仍然存在，請通過在issues頁面上創建新issue尋求幫助。

#### <a name="MINIMUM_PHP_VERSION_V3"></a>我想使用phpMussel v3與早於7.2.0的PHP版本；​您能幫我嗎？

不能。PHP >= 7.2.0是phpMussel v3的最低要求。

*也可以看看：​[兼容性圖表](https://maikuolan.github.io/Compatibility-Charts/)。*

#### <a name="PROTECT_MULTIPLE_DOMAINS"></a>我可以使用單個phpMussel安裝來保護多個域嗎？

可以。

#### <a name="PAY_YOU_TO_DO_IT"></a>我不想浪費時間安裝這個和確保它在我的網站上功能正常；我可以僱用您這樣做嗎？

也許。​這是根據具體情況考慮的。​告訴我們您需要什麼，​您提供什麼，​和我們會告訴您是否可以幫忙。

#### <a name="HIRE_FOR_PRIVATE_WORK"></a>我可以聘請您或這個項目的任何開發者私人工作嗎？

*參考上面。​*

#### <a name="SPECIALIST_MODIFICATIONS"></a>我需要專家修改，​的定制，​等等；您能幫我嗎？

*參考上面。​*

#### <a name="ACCEPT_OR_OFFER_WORK"></a>我是開發人員，​網站設計師，​或程序員。​我可以接受還是提供與這個項目有關的工作？

您可以。​我們的許可證並不禁止這一點。

#### <a name="WANT_TO_CONTRIBUTE"></a>我想為這個項目做出貢獻；我可以這樣做嗎？

您可以。​對項目的貢獻是歡迎。​有關詳細信息，​請參閱『CONTRIBUTING.md』。

#### <a name="SCAN_DEBUGGING"></a>掃描時如何訪問文件的具體細節？

在啟動掃描之前，​請分配一個數組以用於此目的。

在下面的例子中，​`$Foo` 是分配以用於此目的。​掃描 `/文件/路徑/...` 後，​關於 `/文件/路徑/...` 所包含的文件的信息將包含在 `$Foo` 中。

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);

$Scanner->setScanDebugArray($Foo);

$Results = $Scanner->scan('/文件/路徑/...');

var_dump($Foo);
```

數組是多維的。​元素表示掃描的每個文件。​子元素表示這些文件的詳細信息。​子要素如下：

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

*† - 在緩存結果中沒有提供 （僅在新的掃描結果中提供）。​*

*‡ - 僅在掃描PE文件時提供。​*

如果您想，​可以通過使用以下命令來破壞此數組：

```PHP
$Scanner->destroyScanDebugArray($Foo);
```

#### <a name="BLACK_WHITE_GREY"></a>黑名單 – 白名單 – 灰名單 – 他們是什麼，我如何使用它們？

這些術語在不同的上下文中表達不同的含義。​在phpMussel中，有三個使用這些術語的上下文：​文件大小響應，文件類型響應，和簽名灰名單。

為了以最低的處理成本達到理想的效果，phpMussel在實際掃描文件之前可以檢查一些簡單的事情，如文件的大小，名稱和擴展名。​例如；如果文件太大，或者其擴展名表示在我們的網站上我們不想要的文件類型，我們可以立即標記文件，並且不需要掃描它。

文件大小響應是phpMussel在文件超出指定限制時響應的方式。​沒有涉及實際列表，但根據文件的大小，文件可能會在黑名單，白名單或灰名單中被有效考慮了。​存在兩種不同的可選配置指令來分別指定限制和期望的響應。

文件類型響應是phpMussel在文件擴展名時響應的方式。​存在三種不同的可選配置指令，用於明確指定哪些擴展應在黑名單，白名單和灰名單中位於。​如果文件的擴展名分別與指定的擴展名匹配，則可以在黑名單，白名單或灰名單中該文件有效地考慮了。

在這兩種上下文中，在白名單上意味著它不應該被掃描或標記；在黑名單上意味著它應該被標記（因此不需要掃描它）；和在灰名單上意味著需要進一步的分析來確定是否我們應該標記它（即，它應該被掃描）。

簽名灰名單是基本上應該忽略的簽名列表（這在文檔中已經簡要地提到了）。​當灰名單上的簽名被觸發時，phpMussel繼續通過其簽名工作，並且對於在灰名單上的簽名不要採取任何特殊行動。​沒有簽名黑名單，因為隱含的行為無論和触發簽名的正常的行為是一樣的，並且沒有簽名白名單，因為考慮到phpMussel的正常的工作方式以及它的已有的功能，隱含的行為不會有意義。

如果您需要解決由特定簽名造成的問題，並且不想禁用或卸載整個簽名文件，則簽名灰名單很有用。

#### <a name="HOW_TO_USE_PDO"></a>『PDO DSN』是什麼？如何能PDO與phpMussel一起使用？

『PDO』 是 『[PHP Data Objects](https://www.php.net/manual/zh/intro.pdo.php)』 的首字母縮寫（它的意思是『PHP數據對象』）。​它為PHP提供了一個接口，使其能夠連接到各種PHP應用程序通常使用的某些數據庫系統。

『DSN』 是 『[data source name](https://en.wikipedia.org/wiki/Data_source_name)』 的首字母縮寫（它的意思是『數據源名稱』）。​『PDO DSN』向PDO描述了它應如何連接到數據庫。

phpMussel可以將PDO用於緩存。​為了使其正常工作，您需要相應地配置phpMussel，從而啟用PDO，需要為phpMussel創建一個新數據庫以供使用（如果您尚未想到要供phpMussel使用的數據庫），並需要按照以下結構在數據庫中創建一個新表。

當數據庫連接成功時，但是必要的表不存在，表自動創建將嘗試。​但是，此行為尚未經過廣泛測試，因此無法保證成功。

當然，這僅在您確實希望phpMussel使用PDO時適用。​如果您對phpMussel使用平面文件緩存（按照其默認配置）或提供的任何其他各種緩存選項感到足夠滿意，則無需費心設置數據庫，數據庫表，等等。

下面描述的結構使用『phpmussel』作為其數據庫名稱，但是您可以使用任何想要的數據庫名稱，只要在DSN配置中名稱被複製。

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

phpMussel的`pdo_dsn`應配置如下。

```
取決於所使用的數據庫驅動程序......
│
├─4d （警告：實驗性，未經測試，不建議！）
│ │
│ │         ╔═══════╗
│ └─4D:host=localhost;charset=UTF-8
│           ╚╤══════╝
│            └要查找數據庫的主機。
│
├─cubrid
│ │
│ │             ╔═══════╗      ╔═══╗        ╔═════╗
│ └─cubrid:host=localhost;port=33000;dbname=example
│               ╚╤══════╝      ╚╤══╝        ╚╤════╝
│                │              │            └要使用的數據庫的名稱。
│                │              │
│                │              └連接的主機端口號。
│                │
│                └要查找數據庫的主機。
│
├─dblib
│ │
│ │ ╔═══╗      ╔═══════╗        ╔═════╗
│ └─dblib:host=localhost;dbname=example
│   ╚╤══╝      ╚╤══════╝        ╚╤════╝
│    │          │                └要使用的數據庫的名稱。
│    │          │
│    │          └要查找數據庫的主機。
│    │
│    └可能的值： 『mssql』， 『sybase』， 『dblib』。
│
├─firebird
│ │
│ │                 ╔═══════════════════╗
│ └─firebird:dbname=/path/to/database.fdb
│                   ╚╤══════════════════╝
│                    ├可以是本地數據庫文件的路徑。
│                    │
│                    ├可以連接主機和端口號。
│                    │
│                    └如果要使用此功能，請參閱Firebird文檔。
│
├─ibm
│ │
│ │         ╔═════╗
│ └─ibm:DSN=example
│           ╚╤════╝
│            └要連接的在目錄中數據庫。
│
├─informix
│ │
│ │              ╔═════╗
│ └─informix:DSN=example
│                ╚╤════╝
│                 └要連接的在目錄中數據庫。
│
├─mysql （最推薦！）
│ │
│ │              ╔═════╗      ╔═══════╗      ╔══╗
│ └─mysql:dbname=example;host=localhost;port=3306
│                ╚╤════╝      ╚╤══════╝      ╚╤═╝
│                 │            │              └連接的主機端口號。
│                 │            │
│                 │            └要查找數據庫的主機。
│                 │
│                 └要使用的數據庫的名稱。
│
├─oci
│ │
│ │            ╔═════╗
│ └─oci:dbname=example
│              ╚╤════╝
│               ├可以參考特定的在目錄中數據庫。
│               │
│               ├可以連接主機和端口號。
│               │
│               └如果要使用此功能，請參閱Oracle文檔。
│
├─odbc
│ │
│ │      ╔═════╗
│ └─odbc:example
│        ╚╤════╝
│         ├可以參考特定的在目錄中數據庫。
│         │
│         ├可以連接主機和端口號。
│         │
│         └如果要使用此功能，請參閱ODBC/DB2文檔。
│
├─pgsql
│ │
│ │            ╔═══════╗      ╔══╗        ╔═════╗
│ └─pgsql:host=localhost;port=5432;dbname=example
│              ╚╤══════╝      ╚╤═╝        ╚╤════╝
│               │              │           └要使用的數據庫的名稱。
│               │              │
│               │              └連接的主機端口號。
│               │
│               └要查找數據庫的主機。
│
├─sqlite
│ │
│ │        ╔════════╗
│ └─sqlite:example.db
│          ╚╤═══════╝
│           └要使用的本地數據庫文件的路徑。
│
└─sqlsrv
  │
  │               ╔═══════╗ ╔══╗          ╔═════╗
  └─sqlsrv:Server=localhost,1521;Database=example
                  ╚╤══════╝ ╚╤═╝          ╚╤════╝
                   │         │             └要使用的數據庫的名稱。
                   │         │
                   │         └連接的主機端口號。
                   │
                   └要查找數據庫的主機。
```

如果不確定如何構造DSN，請嘗試先查看它是否按原樣工作，而不進行任何更改。

請注意， `pdo_username` 和 `pdo_password` 應與您為數據庫選擇的用戶名和密碼相同。

#### <a name="AJAX_AJAJ_JSON"></a>我的上傳工具是異步的（例如，使用ajax，ajaj，json，等等）。當上傳阻止時，我看不到任何特殊消息或警告。發生了什麼？

這很正常。​phpMussel的標準『上傳是否認』頁面作為HTML。​對於典型的同步請求應該足夠了，但是如果您的上傳工具需要一些不同的東西，可能還不夠。​如果您的上傳工具是異步的，或者希望異步提供上傳狀態，為了使phpMussel能夠滿足您的上傳工具的需求，您可以嘗試做一些事情。

1. 創建自定義輸出模板以提供HTML以外的東西。
2. 創建自定義插件以完全繞過標準的『上傳是否認』頁面並在上傳被阻止時讓上傳處理程序執行其他操作（上傳處理程序提供了一些插件掛鉤，可能有用）。
3. 完全禁用上傳處理程序，而是只從您的上傳工具中調用phpMussel API。

#### <a name="DETECT_EICAR"></a>phpMussel可以檢測EICAR嗎？

可以。​用於檢測EICAR的簽名包含在『phpMussel標準正則表達式簽名文件』中（`phpmussel_regex.db`）。​只要安裝並激活了該簽名文件，phpMussel就應該能夠檢測到EICAR。​由於ClamAV數據庫還包含許多專門用於檢測EICAR的簽名，因此ClamAV可以輕鬆檢測EICAR，但是由於phpMussel僅利用了ClamAV提供的全部簽名中的一部分，因此它們本身可能不足以使phpMussel檢測EICAR。​檢測它的能力還可能取決於您的確切配置。

---


### 11. <a name="SECTION11"></a>法律信息

#### 11.0 章節前言

本文檔章節描述了有關該軟件包的使用和實施的可能法律考慮事項，並提供一些基本的相關信息。​這對於一些用戶來說可能很重要，作為確保遵守其運營所在國家可能存在的任何法律要求的一種手段。​一些用戶可能需要根據這些信息調整他們的網站政策。

首先，請認識到我（軟件包作者）不是律師或合格的法律專業人員。​因此，我無法合法提供法律建議。​此外，在某些情況下，不同國家和地區的具體法律要求可能會有所不同。​這些不同的法律要求有時可能會相互矛盾​（例如：支持[隱私權](https://zh.wikipedia.org/wiki/%E9%9A%B1%E7%A7%81%E6%AC%8A_(%E8%87%BA%E7%81%A3))和[被遺忘權](https://zh.wikipedia.org/wiki/%E8%A2%AB%E9%81%BA%E5%BF%98%E6%AC%8A)的國家，與支持擴展數據保留的國家相比）。​還要考慮到對軟件包的訪問不限於特定的國家或轄區，因此，軟件包用戶群很可能在地理上多樣化。​這些觀點認為，我無法說明在所有方面對所有用戶『符合法律』意味著什麼。​不過，我希望這裡的信息能夠幫助您自己決定您必須做些什麼為了在軟件包的上下文中符合法律。​如果您對此處的信息有任何疑問或擔憂，或者您需要從法律角度提供更多幫助和建議，我會建議諮詢合格的法律專業人員。

#### 11.1 法律責任

此軟件包不提供任何擔保（這已由包許可證提及）。​這包括（但不限於）所有責任範圍。​為了您的方便，該軟件包已提供給您。​希望它會有用，它會為你帶來一些好處。​但是，使用或實施該軟件包是您自己的選擇。​您不是被迫使用或實施該軟件包，但是當您這樣做時，您需要對該決定負責。​我，和其他軟件包貢獻者，對於您的決定的後果不承擔法律責任，無論是直接的，間接的，暗示的，還是其他方式。

#### 11.2 第三方

取決於其確切的配置和實施，在某些情況下，該軟件包可能與第三方進行通信和共享信息。​在某些情況下，某些轄區可能會將此信息定義為『[個人身份信息](https://zh.wikipedia.org/wiki/%E5%80%8B%E4%BA%BA%E5%8F%AF%E8%AD%98%E5%88%A5%E8%B3%87%E8%A8%8A)』（PII）。

這些信息如何被這些第三方使用，是受這些第三方制定的各種政策的約束，並且超出了本文檔的範圍。​但是，在所有這些情況下，與這些第三方共享信息可能被禁用。​在所有這些情況下，如果您選擇啟用它，則有責任研究您可能遇到的任何問題（如果您擔心這些第三方的隱私，安全，和PII使用情況）。​如果存在任何疑問，或者您對PII方面的這些第三方的行為不滿意，最好禁用與這些第三方分享的所有信息。

為了透明的目的，共享信息的類型，以及與誰共享，如下所述。

##### 11.2.1 URL掃描程序

上文件上傳中找到的URL可能會與Google安全瀏覽API共享，取決於軟件包的具體配置方式。​Google安全瀏覽API的使用需要API密鑰，因此默認情況下是禁用。

*相關配置指令：*
- `urlscanner` -> `google_api_key`

##### 11.2.2 VIRUS TOTAL

當phpMussel掃描文件上傳時，這些文件的哈希值可能會與Virus Total API共享，具體取決於軟件包的配置方式。​有計劃在未來的某個時候能夠共享整個文件，但目前該軟件包不支持該功能。​Virus Total API的使用需要API密鑰，因此默認情況下是禁用。

與Virus Total共享的信息（包括文件和相關文件元數據）也可能與其合作夥伴，關聯公司以及其他各方共享用於研究目的。​這在他們的隱私政策中有更詳細的描述。

*看到： [Privacy Policy &ndash; VirusTotal](https://support.virustotal.com/hc/en-us/articles/115002168385-Privacy-Policy).*

*相關配置指令：*
- `virustotal` -> `vt_public_api_key`

#### 11.3 日誌記錄

由於多種原因，日誌記錄是phpMussel的重要組成部分。​當沒有日誌記錄時，可能難以診斷和假陽性，可能很難確定phpMussel在某些情況下的表現如何，而且可能很難確定其不足之處，以及可能需要更改哪些配置或簽名，以使其繼續按預期運行。​無論如何，一些用戶可能不想要記錄，並且它仍然是完全可選的。​在phpMussel中，默認情況下日誌記錄是禁用。​要啟用它，必須相應地配置phpMussel。

另外，如果日誌記錄在法律上是允許的，並且在法律允許的範圍內（例如，可記錄的信息類型，多長時間，在什麼情況下），可以變化，具體取決於管轄區域和phpMussel的實施上下文（例如，如果您是個人或公司實體經營，如果您在商業或非商業基礎上運營，等等）。​因此，仔細閱讀本節可能對您有用。

phpMussel可以執行多種類型的日誌記錄。​不同類型的日誌記錄涉及不同類型的信息，出於各種原因。

##### 11.3.0 掃描日誌

當在程序包配置中啟用時，phpMussel保存文件掃描日誌。​此類日誌記錄有兩種不同的格式：
- 人類可讀的日誌文件。
- 序列化日誌文件。

人類可讀日誌文件的條目通常看起來像這樣（作為示例）：

```
Sun, 19 Jul 2020 13:33:31 +0800 開始。
→ 正在檢查『ascii_standard_testfile.txt』。
─→ 檢測phpMussel-Testfile.ASCII.Standard（ascii_standard_testfile.txt）！
Sun, 19 Jul 2020 13:33:31 +0800 完了。
```

掃描日誌條目通常包括以下信息：
- 掃描文件的日期和時間。
- 掃描的文件的名稱。
- 文件中檢測到的內容（如果檢測到任何內容）。

*相關配置指令：*
- `general` -> `scan_log`
- `general` -> `scan_log_serialized`

當這些指令保留為空時，此類日誌記錄將保持禁用狀態。

##### 11.3.1 上傳日誌

在程序包配置中啟用時，phpMussel會保留已阻止的上傳日誌。

*日誌條目示例：*

```
日期: Sun, 19 Jul 2020 13:33:31 +0800
IP地址: 127.0.0.x
== 掃描結果（為什麼標記） ==
檢測phpMussel-Testfile.ASCII.Standard（ascii_standard_testfile.txt）！
== 哈希簽名重建 ==
dcacac499064454218823fbabff7e09b5b011c0c877ee6f215f35bffb195b6e9:654:ascii_standard_testfile.txt
検疫為『1595142388-2e017ea9ac1478e45dc15794a1fc18c0.qfu』。
```

這些日誌條目通常包括以下信息：
- 上傳被阻止的日期和時間。
- 上傳源自的IP地址。
- 文件被阻止的原因（檢測到的內容）。
- 被阻止文件的名稱。
- 被阻止文件的大小和校驗和。
- 是否文件被検疫，以及內部名稱是什麼。

*相關配置指令：*
- `web` -> `uploads_log`

##### 11.3.2 前端日誌記錄

此類日誌記錄涉及前端登錄嘗試，僅在用戶嘗試登錄前端時才會發生（假設啟用了前端訪問）。

前端日誌條目包含嘗試登錄的用戶的IP地址，嘗試發生的日期和時間以及的結果（登錄成功或失敗）。​前端日誌條目通常看起來像這樣（作為示例）：

```
x.x.x.x - Day, dd Mon 20xx hh:ii:ss +0000 - "admin" - 已登錄。
```

*相關配置指令：*
- `general` -> `frontend_log`

##### 11.3.3 日誌輪換

您可能希望在一段時間後清除日誌，或者可能被要求依法執行（即，您在法律上允許保留日誌的時間可能受法律限制）。​您可以通過在程序包配置指定的日誌文件名中包含日期/時間標記（例如，`{yyyy}-{mm}-{dd}.log`），​然後啟用日誌輪換來實現此目的（日誌輪換允許您在超出指定限制時對日誌文件執行某些操作）。

例如：如果法律要求我在30天后刪除日誌，我可以在我的日誌文件的名稱中指定`{dd}.log`（`{dd}`代表天），將`log_rotation_limit`的值設置為30，並將`log_rotation_action`的值設置為`Delete`。

相反，如果您需要長時間保留日誌，你可以選擇完全不使用日誌輪換，或者你可以將`log_rotation_action`的值設置為`Archive`，以壓縮日誌文件，從而減少它們佔用的磁盤空間總量。

*相關配置指令：*
- `general` -> `log_rotation_limit`
- `general` -> `log_rotation_action`

##### 11.3.4 日誌截斷

如果這是您想要做的事情，也可以在超過特定大小時截斷個別日誌文件。

*相關配置指令：*
- `general` -> `truncate`

##### 11.3.5 IP地址『PSEUDONYMISATION』

首先，如果您不熟悉這個術語，『pseudonymisation』是指處理個人數據，使其不能在沒有補充信息的情況下被識別為屬於任何特定的『數據主體』，並規定這些補充信息分開保存，採取技術和組織措施以確保個人數據不能被識別給任何自然人。

以下資源可以幫助更詳細地解釋它：
- [[trust-hub.com] What is pseudonymisation?](https://www.trust-hub.com/news/what-is-pseudonymisation/)
- [[Wikipedia] Pseudonymization](https://en.wikipedia.org/wiki/Pseudonymization)

在某些情況下，您可能在法律上要求對收集，處理，或存儲的任何PII進行『pseudonymise』或『anonymise』。​雖然這個概念已經存在了相當長的一段時間，但GDPR/DSGVO提到，並特別鼓勵『pseudonymisation』。

當記錄它們時，phpMussel可以對IP地址進行pseudonymise，如果這是您想做的事情。​當這個情況發生時，IPv4地址的最後八位字節，以及IPv6地址的第二部分之後的所有內容，將由『x』表示（有效地將IPv4地址四捨五入到它的第24個子網因素的初始地址，和將IPv6地址四捨五入到它的第32個子網因素的初始地址）。

*相關配置指令：*
- `legal` -> `pseudonymise_ip_addresses`

##### 11.3.6 統計

phpMussel可選擇跟踪統計信息，例如自特定時間以來掃描和阻止的文件總數。​默認情況下此功能是禁用，但可以通過程序包配置啟用此功能。​所跟踪的信息類型不應視為PII。

*相關配置指令：*
- `general` -> `statistics`

##### 11.3.7 加密

phpMussel不[加密](https://zh.wikipedia.org/wiki/%E5%8A%A0%E5%AF%86)其緩存或任何日誌信息。​可能會在將來引入緩存和日誌加密，但目前沒有任何具體的計劃。​如果您擔心未經授權的第三方獲取可能包含PII或敏感信息（如緩存或日誌）的phpMussel部分的訪問權限，我建議不要將phpMussel安裝在可公開訪問的位置（例如，在標準`public_html`或等效目錄之外【可用於大多數標準網絡服務器】安裝phpMussel），​也我建議對安裝目錄強制執行適當的限制權限。​如果這還不足以解決您的疑慮，應該配置phpMussel為不會首先收集或記錄引起您關注的信息類型（例如，通過禁用日誌記錄）。

#### 11.4 COOKIE

當用戶成功登錄前端時，phpMussel設置cookie以便能夠在後續請求中的記住用戶（即，cookie用於向登錄會話驗證用戶身份）。​在登錄頁面上，cookie警告顯著顯示，警告用戶如果他們參與相關操作將設置cookie。 Cookie不會在代碼庫中的任何其他位置設置。

#### 11.5 市場營銷和廣告

phpMussel不收集或處理任何信息用於營銷或廣告目的，既不銷售也不從任何收集或記錄的信息中獲利。​phpMussel不是商業企業，也不涉及任何商業利益，因此做這些事情沒有任何意義。​自項目開始以來就一直如此，今天仍然如此。​此外，做這些事情會對整個項目的精神和預期目的產生反作用，並且只要我繼續維護項目，永遠不會發生。

#### 11.6 隱私政策

在某些情況下，您可能需要依法在您網站的所有頁面和部分上清楚地顯示您的隱私政策鏈接。​這可能為了確保用戶充分了解您的隱私慣例，收集的個人身份信息類型以及您打算如何使用它的是很重要。​為了能夠在phpMussel的『上傳是否認』頁面上包含這樣的鏈接，提供了配置指令來指定隱私策略的URL。

*相關配置指令：*
- `legal` -> `privacy_policy`

#### 11.7 GDPR/DSGVO

『通用數據保護條例』（GDPR）是歐盟法規，自2018年5月25日起生效。​該法規的主要目標是向歐盟公民和居民提供有關其個人數據的控制權，並統一歐盟內有關隱私和個人數據的法規。

該法規包含有關處理任何歐盟『數據主體』（任何已識別或可識別的自然人）的『[個人身份信息](https://zh.wikipedia.org/wiki/%E5%80%8B%E4%BA%BA%E5%8F%AF%E8%AD%98%E5%88%A5%E8%B3%87%E8%A8%8A)』（PII）的具體規定。​為了符合條例，『企業』（按照法規的定義），和任何相關的系統和流程必須默認實現『隱私設計』，​必須使用盡可能高的隱私設置，​必須對任何存儲或處理的信息實施必要的保護措施（數據的 pseudonymisation 或完整 anonymisation ），​必須明確無誤地聲明他們收集的數據類型，​他們如何處理數據，​出於何種原因，​他們保留多長時間，​以及他們是否與任何第三方分享這些數據，​與第三方共享的數據類型，​為什麼，​等等。

只有按照條例有合法依據才能處理數據。​一般而言，這意味著為了在合法基礎上處理數據主體的數據，必須遵守法律義務，或者僅在從數據主體獲得明確，明智，明確的同意之後才進行處理。

因為條例的各個方面可能會及時演變，並為了避免過時信息的傳播，從權威來源中學習可能會更好的，而不是簡單地在包文檔中包含相關信息（這個信息可能最終會過時）。

一些推薦的資源用於了解更多信息：
- [关于欧盟GDPR隐私合规，中国数字营销人不得不知的9大问题](http://www.adexchanger.cn/top_news/28813.html)
- [史上最严的隐私条例出台，2018年开始执行](https://zhuanlan.zhihu.com/p/20865602)
- [《欧盟数据保护条例》对中国企业的影响 —- 以阿里巴巴集团为例](https://spiegeler.com/%E3%80%8A%E6%AC%A7%E7%9B%9F%E6%95%B0%E6%8D%AE%E4%BF%9D%E6%8A%A4%E6%9D%A1%E4%BE%8B%E3%80%8B%E5%AF%B9%E4%B8%AD%E5%9B%BD%E4%BC%81%E4%B8%9A%E7%9A%84%E5%BD%B1%E5%93%8D-%E4%BB%A5%E9%98%BF%E9%87%8C/)
- [歐盟個人資料保護法 GDPR 即將上路！與電商賣家息息相關的 Google Analytics 資料保留政策，你瞭解了嗎？](https://shopline.hk/blog/google-analytics-gdpr/)
- [歐盟一般資料保護規範](https://zh.wikipedia.org/wiki/%E6%AD%90%E7%9B%9F%E4%B8%80%E8%88%AC%E8%B3%87%E6%96%99%E4%BF%9D%E8%AD%B7%E8%A6%8F%E7%AF%84)
- [REGULATION (EU) 2016/679 OF THE EUROPEAN PARLIAMENT AND OF THE COUNCIL](https://eur-lex.europa.eu/legal-content/EN/TXT/?uri=celex:32016R0679)

---


最後更新：2021年2月7日。
