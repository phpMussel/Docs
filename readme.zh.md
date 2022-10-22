## phpMussel v3 中文（简体）文档。

### 内容
- 1. [前言](#SECTION1)
- 2. [如何安装](#SECTION2)
- 3. [如何使用](#SECTION3)
- 4. [扩展PHPMUSSEL](#SECTION4)
- 5. [配置选项](#SECTION5)
- 6. [签名格式](#SECTION6)
- 7. [已知的兼容问题](#SECTION7)
- 8. [常见问题（FAQ）](#SECTION8)
- 9. [法律信息](#SECTION9)

*Regarding translations: My native language is English. Because this is a free and open-source hobby project which generates zero income, and translatable content is likely to change as the features and functionality supported by the project changes, it doesn't make sense for me to spend money for translations. Because I'm the sole author/developer/maintainer for the project and I'm not a ployglot, any translations I produce are very likely to contain errors. Sorry, but realistically, that won't ever change. If you find any such errors/typos/mistakes/etc, your assistance to correct them would be very much appreciated. Pull requests are invited and encouraged. Otherwise, if you find these errors too much to handle, just stick with the original English source. If a translation is irredeemably incomprehensible, let me know which, and I can delete it. If you're not sure how to perform pull requests, ask. I can help.*

---


### 1. <a name="SECTION1"></a>前言

感谢使用phpMussel，​这是一个根据ClamAV的签名和其他签名在上传完成后来自动检测木马/病毒/恶意软件和其他可能威胁到您系统安全的文件的PHP脚本。

[PHPMUSSEL](https://phpmussel.github.io/) COPYRIGHT 2013 和走向未来 GNU/GPLv2 由 [Caleb M (Maikuolan)](https://github.com/Maikuolan)。

本脚本是基于GNU通用许可V2.0版许可协议发布的，​您可以在许可协议的允许范围内自行修改和发布，​但请遵守GNU通用许可协议。​使用脚本的过程中，​作者不提供任何担保和任何隐含担保。​更多的细节请参见GNU通用公共许可证，​下的`LICENSE.txt`文件也可从访问：
- <https://www.gnu.org/licenses/>。
- <https://opensource.org/licenses/>。

谢谢[ClamAV](https://www.clamav.net/)为本脚本提供文件签名库访问许可。​没有它，​这个脚本很可能不会存在，​或者其价值有限。

谢谢GitHub和Bitbucket为项目托管，​还有谢谢这些组织为提供一些签名：​[PhishTank](https://www.phishtank.com/)，​[NLNetLabs](https://nlnetlabs.nl/)，[Malware.Expert](https://malware.expert/)，​等人。

---


### 2. <a name="SECTION2"></a>如何安装

#### 2.0 与COMPOSER安装

推荐的安装phpMussel v3的方法是通过Composer。

为了方便起见，您可以通过旧的主要phpMussel存储库安装最常用的phpMussel依赖项：

`composer require phpmussel/phpmussel`

作为备选，您可以单独选择所需的依赖项。您很可能只需要特定的依赖项，而不需要所有。

为了使用phpMussel做任何事情，您需要phpMussel核心代码库：

`composer require phpmussel/core`

提供phpMussel的前端管理工具：

`composer require phpmussel/frontend`

为您的网站提供自动文件上传扫描：

`composer require phpmussel/web`

提供了将phpMussel用作交互式CLI模式应用：

`composer require phpmussel/cli`

在phpMussel和PHPMailer之间建立桥梁，使phpMussel可以利用PHPMailer进行双因素身份验证，有关阻止的文件上传的电子邮件通知，等等：

`composer require phpmussel/phpmailer`

为了使phpMussel能够检测到任何东西，您需要安装签名。没有特定的程序包。要安装签名，请参阅本文档的下一部分。

作为备选，如果您不想使用Composer，则可以从此处下载预打包的ZIP：

https://github.com/phpMussel/Examples

预先打包的ZIP包含所有上述依赖关系，以及所有标准phpMussel签名文件，以及一些示例，这些示例说明了如何在实现中使用phpMussel。

#### <a name="INSTALLING_SIGNATURES"></a>2.1 安装签名

phpMussel需要签名来检测特定的威胁。​安装签名有二种主要方法：

1. 使用“SigTool”生成签名并手动安装。
2. 从“phpMussel/Signatures”或“phpMussel/Examples”下载签名并手动安装。

##### 2.1.0 使用“SigTool”生成签名并手动安装。

*看到：[SigTool文档](https://github.com/phpMussel/SigTool#documentation).*

*另请注意：SigTool仅处理来自ClamAV的签名。为了获得其他来源的签名（例如，专门为phpMussel编写的签名，其中包括检测phpMussel的测试样本所必需的签名），此方法将需要通过此处提到的其他方法之一进行补充。*

##### 2.1.1 从“phpMussel/Signatures”或“phpMussel/Examples”下载签名并手动安装。

首先，去[phpMussel/Signatures](https://github.com/phpMussel/Signatures)。​存储库包含各种GZ压缩的签名文件。​下载所需的文件，解压缩文件，并将它们复制到安装的签名目录。

作为备选，从[phpMussel/Examples](https://github.com/phpMussel/Examples)下载最新的ZIP。然后，您可以将签名从该存档复制/粘贴到您的安装中。

---


### 3. <a name="SECTION3"></a>如何使用

#### 3.0 配置PHPMUSSEL

安装phpMussel之后，您将需要一个配置文件，以便对其进行配置。​phpMussel配置文件可以格式化为INI或YML文件。​如果您使用示例ZIP之一，则已经有两个示例配置文件可用，`phpmussel.ini`和`phpmussel.yml`。​您可以根据需要选择其中一种，如果您想。​如果您不是使用示例ZIP之一，则需要创建一个新文件。

如果您对phpMussel的默认配置感到满意，并且不想更改任何内容，则可以使用一个空文件作为您的配置文件。​只需设置要更改的值即可。​其他所有内容都将使用默认值。

您可以从前端配置页面配置所有内容，如果您想。​但是，从v3开始，前端登录信息将存储在您的配置文件中。​因此，要登录到前端，您需要设置一个帐户。​然后，您可以使用它登录并配置其他所有内容。

以下摘录将使用用户名“admin”和密码“password”向前端添加一个新帐户。

对于INI文件：

```INI
[user.admin]
password='$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK'
permissions='1'
```

对于YML文件：

```YAML
user.admin:
 password: "$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK"
 permissions: 1
```

您可以根据需要命名配置即可（只要保留其扩展名，以便phpMussel知道其使用的格式）。​您可以将其存储在任何位置中。​您可以在实例化加载程序时通过提供其路径来告诉phpMussel在哪里找到您的配置文件。​如果没有提供路径，phpMussel将尝试在vendor目录的父目录中找到它。

在某些环境（例如Apache）中，甚至可以在配置的前面放置一个点以隐藏它并阻止公共访问。

有关可用于phpMussel的各种配置指令的更多信息，请参阅本文档的配置部分。

#### 3.1 PHPMUSSEL CORE

无论您如何使用phpMussel，几乎每个实施都至少包含以下内容：

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
```

正如这些类的名称所暗示的，加载程序【Loader】负责准备使用phpMussel的基本必需品，扫描程序【Scanner】负责所有核心扫描功能。

加载程序的构造函数接受五个参数，均为可选参数。

```PHP
public function __construct(
    string $ConfigurationPath = '',
    string $CachePath = '',
    string $QuarantinePath = '',
    string $SignaturesPath = '',
    string $VendorPath = ''
)
```

第一个参数是配置文件的完整路径。​当省略时，phpMussel将在vendor目录的父目录中查找名为`phpmussel.ini`或`phpmussel.yml`的配置文件。

第二个参数是您允许phpMussel用于缓存和临时文件存储的目录的路径。​当省略时，phpMussel将在vendor目录的父目录中尝试创建一个要使用的新目录，名为`phpmussel-cache`。​如果要自己指定此路径，则最好选择一个空目录，以避免不必要地丢失指定目录中的其他数据。

第三个参数是phpMussel可以用来隔离的目录的路径。​当省略时，phpMussel将在vendor目录的父目录中尝试创建一个要使用的新目录，名为`phpmussel-quarantine`。​如果要自己指定此路径，则最好选择一个空目录，以避免不必要地丢失指定目录中的其他数据。​强烈建议您禁止公共访问用于隔离的目录。

第四个参数是包含phpMussel签名文件的目录的路径。​当省略时，phpMussel将在vendor目录的父目录中尝试在名为`phpmussel-signatures`的目录中查找签名文件。

第五个参数是vendor目录的路径。​它永远不要指向其他任何东西。​当省略时，phpMussel将尝试自行找到此目录。​提供此参数是为了便于与不一定具有与典型Composer项目相同结构的实施进行集成。

扫描程序的构造函数仅接受一个参数，这是必需的：实例化的加载程序对象。​由于它是通过引用传递的，因此加载程序必须实例化为变量（加载程序实例化实例化到扫描程序的参数中不是使用phpMussel的正确方法）。

```PHP
public function __construct(\phpMussel\Core\Loader &$Loader)
```

#### 3.2 自动文件上传扫描

实例化上传处理程序：

```PHP
$Web = new \phpMussel\Web\Web($Loader, $Scanner);
```

要扫描文件上传：

```PHP
$Web->scan();
```

可选地，phpMussel可以尝试修复上传的名称，以防万一出了问题，如果您想：

```PHP
$Web->demojibakefier();
```

一个更完整的示例：

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

*尝试上传文件`ascii_standard_testfile.txt`，仅出于测试phpMussel的目的而提供的良性样本：*

![屏幕截图](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/web-v3.0.0-alpha2.png)

#### 3.3 CLI模式

要实例化CLI处理程序：

```PHP
$CLI = new \phpMussel\CLI\CLI($Loader, $Scanner);
```

一个更完整的示例：

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

*屏幕截图：*

![屏幕截图](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/cli-v3.0.0-alpha2.png)

#### 3.4 前端

实例化前端：

```PHP
$FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
```

一个更完整的示例：

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

*屏幕截图：*

![屏幕截图](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/frontend-v3.0.0-alpha2.png)

#### 3.5 扫描程序API

如果您想，还可以在其他程序和脚本中利用phpMussel扫描程序API。

一个更完整的示例：

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

该示例要注意的重要部分是`scan()`方法。​`scan()`方法接受两个参数：

```PHP
public function scan(mixed $Files, int $Format = 0): mixed
```

第一个参数可以是字符串或数组，并告诉扫描程序应扫描的内容。​它可以是指示特定文件或目录的字符串，也可以是此类字符串的数组以指定多个文件/目录。

当为字符串时，它应指向可以在何处找到数据。​当作为阵列时，阵列键应指示要扫描的项目的原始名称，并且值应指向可以找到数据的位置。

第二个参数是整数，它告诉扫描程序应如何返回其扫描结果。

指定“1”以将扫描结果作为数组返回，每个元素将扫描项表示为整数。

这些整数具有以下含义：

结果 | 说明
--:|:--
-5 | 表明由于其他原因，扫描无法完成。
-4 | 表明由于加密而无法扫描数据。
-3 | 表明问题是遇到关于phpMussel签名文件。
-2 | 表明损坏数据是检测中扫描和因此扫描失败完成。
-1 | 表明扩展或插件需要通过PHP以经营扫描是失踪和因此扫描失败完成。
0 | 表明扫描目标不存在和因此没有任何事为扫描。
1 | 表明扫描目标是成功扫描和没有任何问题检测。
2 | 表明扫描目标是成功扫描和至少一些问题是检测。

指定2以将扫描结果作为布尔值返回。

结果 | 说明
:-:|:--
`true` | 检测到问题（扫描目标很危险）。
`false` | 未检测到问题（扫描目标可能是安全的）。

指定3以数组形式返回扫描结果，每个扫描项目的每个元素均包含人类可读的文本。

*示例输出：*

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

指定4以将扫描结果作为人类可读文本字符串返回（像3，但内爆了）。

*示例输出：*

```
Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)! Detected phpMussel-Testfile.CoEx (coex_testfile.rtf)! Detected encrypted archive; Encrypted archives not permitted (encrypted.zip)!
```

指定其他任何值以返回格式化的文本（即，使用CLI时看到的扫描结果）。

*示例输出：*

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

*也可以看看： [扫描时如何访问文件的具体细节？](#SCAN_DEBUGGING)*

#### 3.6 2FA（双因素身份验证）

通过启用双因素身份验证，可以使前端更安全。​当登录使用2FA的帐户时，会向与该帐户关联的电子邮件地址发送电子邮件。​此电子邮件包含“2FA代码”，用户必须输入它（以及他们的用户名和密码），为了能够使用该帐户登录。​这意味着获取帐户密码不足以让任何黑客或潜在攻击者能够帐户登录，因为他们还需要访问帐户的电子邮件地址才能接收和使用会话的2FA代码（从而使前端更安全）。

在安装PHPMailer后，您需要通过phpMussel配置页面或配置文件填充PHPMailer的配置指令。​有关这些配置指令的更多信息包含在本文档的配置部分中。​在填充PHPMailer配置指令后，将`enable_two_factor`设置为`true`。​现在应启用双因素身份验证。

接下来，您需要让phpMussel知道在使用该帐户登录时将2FA代码发送到何处。​为此，请使用电子邮件地址作为帐户的用户名（例如，`foo@bar.tld`），或者将电子邮件地址作为用户名的一部分包括在内，就像通常发送电子邮件一样（例如，`Foo Bar <foo@bar.tld>`）。

---


### 4. <a name="SECTION4"></a>扩展PHPMUSSEL

phpMussel在设计时考虑了可扩展性。​向phpMussel组织中的任何存储库拉请求和[贡献](https://github.com/phpMussel/.github/blob/master/CONTRIBUTING.md)总是欢迎的。​如果需要，您也可以修改或扩展phpMussel以适合自己的需求（例如，用于特定于您的特定实现的修改或扩展，用于需要phpMussel的新插件和新Composer软件包，等等）。

从v3开始，所有phpMussel功能都作为类存在。​这意味着在某些情况下，PHP提供的[对象继承](https://www.php.net/manual/zh/language.oop5.inheritance.php)机制可能是扩展phpMussel的简便且适当的方法。

phpMussel还提供了自己的扩展机制。​在v3之前，首选的机制是phpMussel的集成插件系统。​从v3开始，首选的机制是事件编排程序。

用于扩展phpMussel和编写新插件的样板代码可在[样板库](https://github.com/phpMussel/plugin-boilerplates)中公开获得。​还包括[所有当前支持的事件](https://github.com/phpMussel/plugin-boilerplates/tree/master/boilerplate-v3#currently-supported-events)的列表，以及有关如何使用样板代码的更详细的说明。

v3样板代码的结构与phpMussel组织中各种phpMussel v3存储库的结构相同。​这不是巧合。​只要有可能，我建议您将v3样板代码用于可扩展性，并使用与phpMussel v3本身相似的设计原理。​如果您选择公开您的新扩展程序或插件，您可以集成Composer支持，理论上其他人应该有可能以与phpMussel v3完全相同的方式来利用您的扩展程序或插件，只需将其与其他Composer依赖项一起使用，并在实现时应用任何必要的事件处理程序即可​（当然，不要忘了在出版物中包含说明，以便其他人知道可能存在的任何必要事件处理程序，以及正确安装和使用出版物所必需的任何其他信息）。

---


### 5. <a name="SECTION5"></a>配置选项

以下是phpMussel接受的配置指令的列表，​以及一个说明的他们的目的和功能。

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

#### “core” （类别）
基本配置（任何不属于其他类别的核心配置）。

##### “scan_log” `[string]`
- 文件为记录在所有扫描结果。​指定一个文件名，​或留空以关闭。

##### “scan_log_serialized” `[string]`
- 文件为记录在所有扫描结果（它采用序列化格式）。​指定一个文件名，​或留空以关闭。

##### “error_log” `[string]`
- 用于记录检测到的任何非致命错误的文件。​指定一个文件名，​或留空以禁用。

##### “truncate” `[string]`
- 截断日志文件当他们达到一定的大小吗？​值是在B/KB/MB/GB/TB，​是日志文件允许的最大大小直到它被截断。​默认值为“0KB”将禁用截断（日志文件可以无限成长）。​注意：适用于单个日志文件！​日志文件大小不被算集体的。

##### “log_rotation_limit” `[int]`
- 日志轮转限制了任何时候应该存在的日志文件的数量。​当新的日志文件被创建时，如果日志文件的指定的最大数量已经超过，将执行指定的操作。​您可以在此指定所需的限制。​值为“0”将禁用日志轮转。

##### “log_rotation_action” `[string]`
- 日志轮转限制了任何时候应该存在的日志文件的数量。​当新的日志文件被创建时，如果日志文件的指定的最大数量已经超过，将执行指定的操作。​您可以在此处指定所需的操作。

```
log_rotation_action
├─Delete ("删除最旧的日志文件，直到不再超出限制。")
└─Archive ("首先归档，然后删除最旧的日志文件，直到不再超出限制。")
```

##### “timezone” `[string]`
- 这用于指定要使用的时区​（例如，Africa/Cairo，America/New_York，Asia/Tokyo，Australia/Perth，Europe/Berlin，Pacific/Guam，等等）。​指定“SYSTEM”使PHP自动为您处理。

```
timezone
├─SYSTEM ("使用系统默认时区。")
├─UTC ("UTC")
└─…其他
```

##### “time_offset” `[int]`
- 时区偏移量（分钟）。

##### “time_format” `[string]`
- phpMussel使用的日期符号格式。​可根据要求增加附加选项。

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

##### “ipaddr” `[string]`
- 在哪里可以找到连接请求IP地址？​（可以使用为服务例如Cloudflare和类似）。​标准 = REMOTE_ADDR。​警告：不要修改此除非您知道什么您做着！

```
ipaddr
├─HTTP_INCAP_CLIENT_IP ("HTTP_INCAP_CLIENT_IP (Incapsula)")
├─HTTP_CF_CONNECTING_IP ("HTTP_CF_CONNECTING_IP (Cloudflare)")
├─CF-Connecting-IP ("CF-Connecting-IP (Cloudflare)")
├─HTTP_X_FORWARDED_FOR ("HTTP_X_FORWARDED_FOR (Cloudbric)")
├─X-Forwarded-For ("X-Forwarded-For (Squid)")
├─Forwarded ("Forwarded")
├─REMOTE_ADDR ("REMOTE_ADDR (标准)")
└─…其他
```

也可以看看：
- [NGINX Reverse Proxy](https://docs.nginx.com/nginx/admin-guide/web-server/reverse-proxy/)
- [Squid configuration directive forwarded_for](http://www.squid-cache.org/Doc/config/forwarded_for/)
- [Forwarded - HTTP \| MDN](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Forwarded)

##### “delete_on_sight” `[bool]`
- 激活的这个指令将指示脚本马上删除任何扫描文件上传匹配任何检测标准，​是否通过签名或任何事其他。​文件已确定是清洁将会忽略。​如果是存档，​全存档将会删除，​不管如果违规文件是只有一个的几个文件包含在存档。​为文件上传扫描，​按说，​它不必要为您激活这个指令，​因为按说，​PHP将自动清洗内容的它的缓存当执行是完，​意思它将按说删除任何文件上传从它向服务器如果不已移动，​复制或删除。​这个指令是添加这里为额外安全为任何人谁的PHP副本可能不始终表现在预期方式。​False【假/负】：之后扫描，​忽略文件【标准】，​True【真/正】：之后扫描，​如果不清洁，​马上删除。

##### “lang” `[string]`
- 指定标准phpMussel语言。

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
├─ms ("Bahasa Melayu")
├─nl ("Nederlandse")
├─no ("Norsk")
├─pl ("Polski")
├─pt ("Português")
├─ru ("Русский")
├─sv ("Svenska")
├─ta ("தமிழ்")
├─th ("ภาษาไทย")
├─tr ("Türkçe")
├─uk ("Українська")
├─ur ("اردو")
├─vi ("Tiếng Việt")
├─zh ("中文（简体）")
└─zh-TW ("中文（傳統）")
```

##### “lang_override” `[bool]`
- 尽可能根据HTTP_ACCEPT_LANGUAGE进行本地化？True（真）=进行本地化【标准】；False（假）=不要本地化。

##### “scan_cache_expiry” `[int]`
- 多长时间应该phpMussel维持扫描结果？​数值是秒数为维持扫描结果。​标准是21600秒（6小时）； 一个`0`数值将停止维持扫描结果。

##### “maintenance_mode” `[bool]`
- 启用维护模式？​True（真）=关闭；​False（假）=不关闭【标准】。​它停用一切以外前端。​有时候在更新CMS，框架，等时有用。

##### “statistics” `[bool]`
- 跟踪phpMussel使用情况统计？​True（真）=跟踪；False（假）=不跟踪【标准】。

##### “hide_version” `[bool]`
- 从日志和页面输出中隐藏版本信息吗？​True（真）=关闭；False（假）=不关闭【标准】。

##### “disabled_channels” `[string]`
- 这可用于防止phpMussel在发送请求时使用特定通道。

```
disabled_channels
├─GitHub ("GitHub")
├─BitBucket ("BitBucket")
├─VirusTotal_HTTPS ("VirusTotal (HTTPS)")
└─VirusTotal_HTTP ("VirusTotal (HTTP)")
```

##### “default_timeout” `[int]`
- 用于外部请求的默认超时？ 标准 = 12秒。

#### “signatures” （类别）
签名，签名文件，等的配置。

##### “active” `[string]`
- 活性签名文件的列表，​以逗号分隔。​注意：首先必须安装签名文件，然后才能激活它们。​为了使测试文件正常工作，必须安装并激活签名文件。

##### “fail_silently” `[bool]`
- phpMussel应该报告当签名文件是失踪或损坏吗？​如果`fail_silently`是关闭，​失踪和损坏文件将会报告当扫描，​和如果`fail_silently`是激活，​失踪和损坏文件将会忽略，​有扫描报告为那些文件哪里没有问题。​这个应该按说被留下除非您遇到失败或有其他类似问题。​False（假）=是关闭；True（真）=是激活【默认】。

##### “fail_extensions_silently” `[bool]`
- phpMussel应该报告当扩展是失踪吗？​如果`fail_extensions_silently`是关闭，​失踪扩展将会报告当扫描，​和如果`fail_extensions_silently`是激活，​失踪扩展将会忽略，​有扫描报告为那些文件哪里没有任何问题。​关闭的这个指令可能的可以增加您的安全，​但可能还导致一个增加的假阳性。​False（假）=是关闭；True（真）=是激活【默认】。

##### “detect_adware” `[bool]`
- phpMussel应该使用签名为广告软件检测吗？​False（假）=不检查，​True（真）=检查【默认】。

##### “detect_joke_hoax” `[bool]`
- phpMussel应该使用签名为病毒/恶意软件笑话/恶作剧检测吗？​False（假）=不检查，​True（真）=检查【默认】。

##### “detect_pua_pup” `[bool]`
- phpMussel应该使用签名为PUP/PUA（可能无用/非通缉程序/软件）检测吗？​False（假）=不检查，​True（真）=检查【默认】。

##### “detect_packer_packed” `[bool]`
- phpMussel应该使用签名为打包机和打包数据检测吗？​False（假）=不检查，​True（真）=检查【默认】。

##### “detect_shell” `[bool]`
- phpMussel应该使用签名为webshell脚本检测吗？​False（假）=不检查，​True（真）=检查【默认】。

##### “detect_deface” `[bool]`
- phpMussel应该使用签名为污损和污损软件检测吗？​False（假）=不检查，​True（真）=检查【默认】。

##### “detect_encryption” `[bool]`
- phpMussel应该检测并阻止加密的文件吗？​False（假）=不检查，​True（真）=检查【默认】。

##### “heuristic_threshold” `[int]`
- 有某些签名的phpMussel意味为确定可疑和可能恶意文件零件被上传有不在他们自己确定那些文件被上传特别是作为恶意。​这个“threshold”数值告诉phpMussel什么是最大总重量的可疑和潜在恶意文件零件被上传允许之前那些文件是被识别作为恶意。​定义的重量在这个上下文是总数值的可疑和可能恶意文件零件确定。​作为默认，​这个数值将会设置作为3。​一个较低的值通常将结果在一个更高的发生的假阳性但一个更高的发生的恶意文件被确定，​而一个更高的数值将通常结果在一个较低的发生的假阳性但一个较低的数值的恶意文件被确定。​它是通常最好忽略这个数值除非您遇到关联问题。

#### “files” （类别）
在扫描过程中如何处理文件。

##### “filesize_limit” `[string]`
- 文件大小限在KB。​65536 = 64MB【默认】，​0 = 没有限（始终灰名单），​任何正数值接受。​这个可以有用当您的PHP配置限内存量一个进程可以占据或如果您的PHP配置限文件大小的上传。

##### “filesize_response” `[bool]`
- 如何处理文件超过文件大小限（如果存在）。​False（假）=白名单；True（真）=黑名单【默认】。

##### “filetype_whitelist” `[string]`
- 白名单：

__这是如何工作的。__ 如果您的系统只允许具体文件类型被上传，​或如果您的系统明确地否认某些文件类型，​指定那些文件类型在白名单，​黑名单和灰名单可以增加扫描执行速度通过允许脚本跳过某些文件类型。​格式是CSV（逗号分隔变量）。

__进程的逻辑顺序。__ 如果文件类型已白名单，​不扫描和不受阻文件，​和不匹配文件对照黑名单或灰名单。​如果文件类型已黑名单，​不扫描文件但阻止它无论如何，​和不匹配文件对照灰名单。​如果灰名单是空，​或如果灰名单不空和文件类型已灰名单，​扫描文件像正常和确定如果阻止它基于扫描结果，​但如果灰名单不空和文件类型不灰名单，​过程文件仿佛已黑名单，​因此不扫描它但阻止它无论如何。

##### “filetype_blacklist” `[string]`
- 黑名单：

__这是如何工作的。__ 如果您的系统只允许具体文件类型被上传，​或如果您的系统明确地否认某些文件类型，​指定那些文件类型在白名单，​黑名单和灰名单可以增加扫描执行速度通过允许脚本跳过某些文件类型。​格式是CSV（逗号分隔变量）。

__进程的逻辑顺序。__ 如果文件类型已白名单，​不扫描和不受阻文件，​和不匹配文件对照黑名单或灰名单。​如果文件类型已黑名单，​不扫描文件但阻止它无论如何，​和不匹配文件对照灰名单。​如果灰名单是空，​或如果灰名单不空和文件类型已灰名单，​扫描文件像正常和确定如果阻止它基于扫描结果，​但如果灰名单不空和文件类型不灰名单，​过程文件仿佛已黑名单，​因此不扫描它但阻止它无论如何。

##### “filetype_greylist” `[string]`
- 灰名单：

__这是如何工作的。__ 如果您的系统只允许具体文件类型被上传，​或如果您的系统明确地否认某些文件类型，​指定那些文件类型在白名单，​黑名单和灰名单可以增加扫描执行速度通过允许脚本跳过某些文件类型。​格式是CSV（逗号分隔变量）。

__进程的逻辑顺序。__ 如果文件类型已白名单，​不扫描和不受阻文件，​和不匹配文件对照黑名单或灰名单。​如果文件类型已黑名单，​不扫描文件但阻止它无论如何，​和不匹配文件对照灰名单。​如果灰名单是空，​或如果灰名单不空和文件类型已灰名单，​扫描文件像正常和确定如果阻止它基于扫描结果，​但如果灰名单不空和文件类型不灰名单，​过程文件仿佛已黑名单，​因此不扫描它但阻止它无论如何。

##### “check_archives” `[bool]`
- 尝试匹配存档内容吗？​False（假）=不匹配；True（真）=匹配【默认】。 已支持：Zip（需要libzip），Tar，Rar（需要rar扩展名）。

##### “filesize_archives” `[bool]`
- 继承文件大小黑名单/白名单在存档内容吗？​False（假）=不继承（刚灰名单一切）；True（真）=继承【默认】。

##### “filetype_archives” `[bool]`
- 继承文件类型黑名单/白名单在存档内容吗？​False（假）=不继承（刚灰名单一切）【默认】；​True（真）=继承。

##### “max_recursion” `[int]`
- 最大存档递归深度限。​默认=3。

##### “block_encrypted_archives” `[bool]`
- 检测和受阻加密的存档吗？​因为phpMussel是不能够扫描加密的存档内容，​它是可能存档加密可能的可以使用通过一个攻击者作为一种手段尝试绕过phpMussel，​杀毒扫描程序和其他这样的保护。​指示phpMussel受阻任何存档它发现被加密可能的可以帮助减少任何风险有关联这些可能性。​False（假）=不受阻；True（真）=受阻【默认】。

##### “max_files_in_archives” `[int]`
- 在中止扫描之前从档案中扫描的最大文件数。​默认=0（没有最大文件数）。

##### “chameleon_from_php” `[bool]`
- 寻找PHP头在文件是不PHP文件也不认可存档文件。​False（假）=是关闭；True（真）=是激活。

##### “can_contain_php_file_extensions” `[string]`
- 允许包含PHP代码的文件扩展名列表，以逗号分隔。​如果启用了PHP变色龙攻击检测，包含PHP代码的文件，其扩展名不在此列表中，将被检测为PHP变色龙攻击。

##### “chameleon_from_exe” `[bool]`
- 寻找可执行头在文件是不可执行文件也不认可存档文件和寻找可执行文件谁的头是不正确。​False（假）=是关闭；True（真）=是激活。

##### “chameleon_to_archive” `[bool]`
- 检测在存档和压缩文件中的错误标头。已支持：BZ/BZIP2，GZ/GZIP，LZF，RAR，ZIP。​False（假）=是关闭；True（真）=是激活。

##### “chameleon_to_doc” `[bool]`
- 寻找办公文档谁的头是不正确（已支持：DOC，​DOT，​PPS，​PPT，​XLA，​XLS，​WIZ）。​False（假）=是关闭；True（真）=是激活。

##### “chameleon_to_img” `[bool]`
- 寻找图像谁的头是不正确（已支持：BMP，​DIB，​PNG，​GIF，​JPEG，​JPG，​XCF，​PSD，​PDD，​WEBP）。​False（假）=是关闭；True（真）=是激活。

##### “chameleon_to_pdf” `[bool]`
- 寻找PDF文件谁的头是不正确。​False（假）=是关闭；True（真）=是激活。

##### “archive_file_extensions” `[string]`
- 认可存档文件扩展（格式是CSV；应该只添加或去掉当问题发生；不必要的去掉可能的可以导致假阳性出现为存档文件，​而不必要的增加将实质上白名单任何事您增加从专用攻击检测；修改有慎重；还请注这个无影响在什么存档可以和不能被分析在内容级）。​这个名单，​作为是作为标准，​名单那些格式使用最常见的横过多数的系统和CMS，​但有意是不全面。

##### “block_control_characters” `[bool]`
- 受阻任何文件包含任何控制字符吗（以外换行符）？​如果您只上传纯文本，​您可以激活这个指令以提供某些另外保护在您的系统。​然而，​如果您上传任何事以外纯文本，​激活这个可能结果在假阳性。​False（假）=不受阻【默认】；True（真）=受阻。

##### “corrupted_exe” `[bool]`
- 损坏文件和处理错误。​False（假）=忽略；True（真）=受阻【默认】。​检测和受阻潜在的损坏移植可执行【PE】文件吗？​时常（但不始终），​当某些零件的一个移植可执行【PE】文件是损坏或不能被正确处理，​它可以建议建议的一个病毒感染。​过程使用通过最杀毒程序以检测病毒在PE文件需要处理那些文件在某些方式，​哪里，​如果程序员的一个病毒是意识的，​将特别尝试防止，​以允许他们的病毒留不检测。

##### “decode_threshold” `[string]`
- 在原始数据中解码命令的长度限制（如果有任何引人注目性能问题当扫描）。​默认 = 512KB。​零或空值将关闭门槛（去除任何这样的限基于文件大小）。

##### “scannable_threshold” `[string]`
- 原始数据读取和扫描的最大长度（如果有任何引人注目性能问题当扫描）。​默认 = 32MB。​零或空值将关闭门槛。​按说，​这个数值应不会少于平均文件大小的文件上传您想和期待收到您的服务器或网站，​应不会多于`filesize_limit`指令，​和应不会多于大致五分之一的总允许内存分配获授PHP通过"php.ini"配置文件。​这个指令存在为尝试防止phpMussel从用的太多内存（这个将防止它从能够顺利扫描文件以上的一个特别文件大小）。

##### “allow_leading_trailing_dots” `[bool]`
- 允许文件名中的前导和尾随点吗？​这有时可用于隐藏文件，或欺骗某些系统允许目录遍历。​False（假）=不允许【默认】；True（真）=允许。

##### “block_macros” `[bool]`
- 尝试阻止任何包含宏的文件吗？​某些文档和电子表格类型可能包含可执行的宏，因此提供了危险的潜在恶意软件向量。​False（假）=不阻止【默认】；​True（真）=阻止。

##### “only_allow_images” `[bool]`
- 设置为true时，扫描程序遇到的任何非图像文件将被立即标记，而不会被扫描。​在某些情况下，这可能有助于减少完成扫描所需的时间。​默认情况下设置为false。

#### “quarantine” （类别）
隔离配置。

##### “quarantine_key” `[string]`
- phpMussel能够隔离被阻止的文件上传，​如果这个是某物您想。​普通用户的phpMussel简单地想保护他们的网站或宿主环境无任何兴趣在深深分析任何尝试文件上传应该离开这个功能关闭，​但任何用户有兴趣在更深分析的尝试文件上传为目的恶意软件研究或为类似这样事情应该激活这个功能。​检疫的尝试文件上传可以有时还助攻在调试假阳性，​如果这个是某物经常发生为您。​以关闭检疫功能，​简单地离开`quarantine_key`指令空白，​或抹去内容的这个指令如果它不已空白。​以激活隔离功能，​输入一些值在这个指令。​`quarantine_key`是一个重要安全功能的隔离功能需要以预防检疫功能从成为利用通过潜在攻击者和以预防任何潜在执行的数据存储在检疫。​`quarantine_key`应该被处理在同样方法作为您的密码：更长是更好，​和紧紧保护它。​为获得最佳效果，​在结合使用`delete_on_sight`。

##### “quarantine_max_filesize” `[string]`
- 最大允许文件大小为文件在检疫。​文件大于这个指定数值将不成为检疫。​这个指令是重要为使它更难为任何潜在攻击者洪水您的检疫用非通缉数据潜在的造成过度数据用法在您的虚拟主机服务。​标准 = 2MB。

##### “quarantine_max_usage” `[string]`
- 最大内存使用允许为检疫。​如果总内存已用通过隔离到达这个数值，​最老检疫文件将会删除直到总内存已用不再到达这个数值。​这个指令是重要为使它更难为任何潜在攻击者洪水您的检疫用非通缉数据潜在的造成过度数据用法在您的虚拟主机服务。​标准 = 64MB。

##### “quarantine_max_files” `[int]`
- 隔离中可以存在的最大文件数量。​新文件添加到隔离时，如果超过此数量，则旧文件将被删除，直到剩余的文件不再超过此数量。​标准=100。

#### “virustotal” （类别）
Virus Total整合的配置。

##### “vt_public_api_key” `[string]`
- 可选的，​phpMussel可以扫描文件使用【Virus Total API】作为一个方法提供一个显着的改善保护级别针对病毒，​木马，​恶意软件和其他威胁。​作为默认，​扫描文件使用【Virus Total API】是关闭。​以激活它，​一个API密钥从VirusTotal是需要。​因为的显着好处这个可以提供为您，​它是某物我很推荐激活。​请注意，​然而，​以使用的【Virus Total API】，​您必须同意他们的服务条款和您必须坚持所有方针按照说明通过VirusTotal阅读材料！​您是不允许使用这个积分功能除非：您已阅读和您同意服务条款的VirusTotal和它的API。​您已阅读和您了解至少序言的VirusTotal公共API阅读材料(一切之后“VirusTotal Public API v2.0”但之前“Contents”）。

也可以看看：
- [Terms of Service](https://www.virustotal.com/en/about/terms-of-service/)
- [Getting started](https://developers.virustotal.com/reference)

##### “vt_suspicion_level” `[int]`
- 作为标准，​phpMussel将限制什么文件它扫描通过使用【Virus Total API】为那些文件它考虑作为“可疑”。​您可以可选调整这个局限性通过修改的`vt_suspicion_level`指令数值。

##### “vt_weighting” `[int]`
- phpMussel应使用扫描结果使用【Virus Total API】作为检测或作为检测重量吗？​这个指令存在，​因为，​虽说扫描一个文件使用多AV引擎（例如怎么样VirusTotal做） 应结果有一个增加检测率（和因此在一个更恶意文件被抓），​它可以还结果有更假阳性，​和因此，​为某些情况，​扫描结果可能被更好使用作为一个置信得分而不是作为一个明确结论。​如果一个数值的`0`是使用，​扫描结果使用【Virus Total API】将会适用作为检测，​和因此，​如果任何AV引擎使用通过VirusTotal标志文件被扫描作为恶意，​phpMussel将考虑文件作为恶意。​如果任何其他数值是使用，​扫描结果使用【Virus Total API】将会适用作为检测重量，​和因此，​数的AV引擎使用通过VirusTotal标志文件被扫描作为恶意将服务作为一个置信得分（或检测重量） 为如果文件被扫描应会考虑恶意通过phpMussel（数值使用将代表最低限度的置信得分或重量需要以被考虑恶意）。​一个数值的`0`是使用作为标准。

##### “vt_quota_rate” `[int]`
- 根据【Virus Total API】阅读材料，​它是限于最大的`4`请求的任何类型在任何`1`分钟大体时间。​如果您经营一个“honeyclient”，​蜜罐或任何其他自动化将会提供资源为VirusTotal和不只取回报告您是有权一个更高请求率配额。​作为标准，​phpMussel将严格的坚持这些限制，​但因为可能性的这些率配额被增加，​这些二指令是提供为您指示phpMussel为什么限它应坚持。​除非您是指示这样做，​它是不推荐为您增加这些数值，​但，​如果您遇到问题相关的到达您的率配额，​减少这些数值可能有时帮助您解析这些问题。​您的率限是决定作为`vt_quota_rate`请求的任何类型在任何`vt_quota_time`分钟大体时间。

##### “vt_quota_time” `[int]`
- （见上面的说明）。

#### “urlscanner” （类别）
URL扫描程序的配置。

##### “google_api_key” `[string]`
- 激活Google Safe Browsing API当API密钥是设置。

也可以看看：
- [Google API Console](https://console.developers.google.com/)

##### “maximum_api_lookups” `[int]`
- 最大数值API请求来执行每个扫描迭代。​额外API请求将增加的总要求完成时间每扫描迭代，​所以，​您可能想来规定一个限以加快全扫描过程。​当设置`0`，​没有最大数值将会应用的。​设置`10`作为默认。

##### “maximum_api_lookups_response” `[bool]`
- 该什么办如果最大数值API请求已超过？​False（假）=没做任何事（继续处理）【默认】；True（真）=标志/受阻文件。

##### “cache_time” `[int]`
- 多长时间（以秒为单位）应API结果被缓存？​默认是3600秒（1小时）。

#### “legal” （类别）
法律要求的配置。

##### “pseudonymise_ip_addresses” `[bool]`
- 编写日志文件时使用假名的IP地址吗？​True（真）=使用假名【标准】；False（假）=不使用假名。

##### “privacy_policy” `[string]`
- 要显示在任何生成的页面的页脚中的相关隐私政策的地址。​指定一个URL，或留空以禁用。

#### “supplementary_cache_options” （类别）
补充缓存选项。​注意：更改这些值可能会使您注销。

##### “prefix” `[string]`
- 该值将附加到所有缓存条目的键的开头。​标准 = “phpMussel_”。​当同一服务器上存在多个安装时，这对于将它们的缓存彼此分开非常有用。

##### “enable_apcu” `[bool]`
- 指定是否尝试使用APCu进行缓存。​标准 = True。

##### “enable_memcached” `[bool]`
- 指定是否尝试使用Memcached进行缓存。​标准 = False。

##### “enable_redis” `[bool]`
- 指定是否尝试使用Redis进行缓存。​标准 = False。

##### “enable_pdo” `[bool]`
- 指定是否尝试使用PDO进行缓存。​标准 = False。

##### “memcached_host” `[string]`
- Memcached主机值。​标准 = “localhost”。

##### “memcached_port” `[int]`
- Memcached端口值。​标准 = “11211”。

##### “redis_host” `[string]`
- Redis主机值。​标准 = “localhost”。

##### “redis_port” `[int]`
- Redis端口值。​标准 = “6379”。

##### “redis_timeout” `[float]`
- Redis超时值。​标准 = “2.5”。

##### “pdo_dsn” `[string]`
- PDO DSN值。​标准 = “mysql:dbname=phpmussel;host=localhost;port=3306”。

__常问问题。__ <em><a href="https://github.com/phpMussel/Docs/blob/master/readme.zh.md#HOW_TO_USE_PDO" hreflang="zh-CN">“PDO DSN”是什么？如何能PDO与phpMussel一起使用？</a></em>

##### “pdo_username” `[string]`
- PDO用户名。

##### “pdo_password” `[string]`
- PDO密码。

#### “frontend” （类别）
前端的配置。

##### “frontend_log” `[string]`
- 前端登录尝试的录音文件。​指定一个文件名，​或留空以禁用。

##### “max_login_attempts” `[int]`
- 最大前端登录尝试次数。​标准=5。

##### “numbers” `[string]`
- 您如何喜欢显示数字？​选择最适合示例。

```
numbers
├─Arabic-1 ("١٢٣٤٥٦٧٫٨٩")
├─Arabic-2 ("١٬٢٣٤٬٥٦٧٫٨٩")
├─Arabic-3 ("۱٬۲۳۴٬۵۶۷٫۸۹")
├─Arabic-4 ("۱۲٬۳۴٬۵۶۷٫۸۹")
├─Armenian ("Ռ̅Մ̅Լ̅ՏՇԿԷ")
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

##### “default_algo” `[string]`
- 定义要用于所有未来密码和会话的算法。

```
default_algo
├─PASSWORD_DEFAULT ("PASSWORD_DEFAULT")
├─PASSWORD_BCRYPT ("PASSWORD_BCRYPT")
├─PASSWORD_ARGON2I ("PASSWORD_ARGON2I")
└─PASSWORD_ARGON2ID ("PASSWORD_ARGON2ID (PHP >= 7.3.0)")
```

##### “theme” `[string]`
- 用于phpMussel前端的美学。

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
└─…其他
```

##### “magnification” `[float]`
- 字体放大。​标准 = 1。

##### “custom_header” `[string]`
- 在所有前端页面的开头作为HTML插入。​如果您想在所有此类页面中包含网站徽标、个性化标题、脚本、或类似，这可能会很有用。

##### “custom_footer” `[string]`
- 在所有前端页面的末尾作为HTML插入。​如果您想在所有此类页面中包含法律声明、联系链接、业务信息、或类似，这可能会很有用。

#### “web” （类别）
上传处理程序的配置。

##### “uploads_log” `[string]`
- 应该记录所有阻止的上传的位置。​指定一个文件名，​或留空以关闭。

##### “forbid_on_block” `[bool]`
- phpMussel应该发送`403`头随着文件上传受阻信息，​或坚持标准`200 OK`？​False（假）=发送`200`；True（真）=发送`403`【标准】。

##### “unsupported_media_type_header” `[bool]`
- 当上传因列入黑名单的文件类型而被阻止时，phpMussel是否应该发送415标头？​如果为true（真），此设置将取代`forbid_on_block`。​False（假）=不发送【标准】；True（真）=发送。

##### “max_uploads” `[int]`
- 最大允许数值的文件为扫描当文件上传扫描之前中止扫描和告诉用户他们是上传太多在同一时间！​提供保护针对一个理论攻击哪里一个攻击者尝试DDoS您的系统或CMS通过超载phpMussel以减速PHP进程到一个停止。​推荐：10。​您可能想增加或减少这个数值，​根据速度的您的硬件。​注意这个数值不交待为或包括存档内容。

##### “ignore_upload_errors” `[bool]`
- 这个指令按说应会关闭除非它是需要为对功能的phpMussel在您的具体系统。​按说，​当是关闭，​当phpMussel检测存在元素在`$_FILES`数组，​它将尝试引发一个扫描的文件代表通过那些元素，​和，​如果他们是空或空白，​phpMussel将回报一个错误信息。​这个是正确行为为phpMussel。​然而，​为某些CMS，​空元素在`$_FILES`可以发生因之的自然的行为的那些CMS，​或错误可能会报告当没有任何，​在这种情况，​正常行为为phpMussel将会使干扰为正常行为的那些CMS。​如果这样的一个情况发生为您，​激活这个指令将指示phpMussel不尝试引发扫描为这样的空元素，​忽略他们当发现和不回报任何关联错误信息，​从而允许延续的页面请求。​False（假）=不忽略；True（真）=忽略。

##### “theme” `[string]`
- 用于“上传是否认”页面的美学。

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
└─…其他
```

##### “magnification” `[float]`
- 字体放大。​标准 = 1。

##### “custom_header” `[string]`
- 在所有“上传是否认”页面的开头作为HTML插入。​如果您想在所有此类页面中包含网站徽标、个性化标题、脚本、或类似，这可能会很有用。

##### “custom_footer” `[string]`
- 在所有“上传是否认”页面的末尾作为HTML插入。​如果您想在所有此类页面中包含法律声明、联系链接、业务信息、或类似，这可能会很有用。

#### “phpmailer” （类别）
PHPMailer的配置（用于双因素身份验证）。

##### “event_log” `[string]`
- 用于记录与PHPMailer相关的所有事件的文件。​指定一个文件名，​或留空以禁用。

##### “enable_two_factor” `[bool]`
- 该指令确定是否将2FA用于前端帐户。

##### “enable_notifications” `[string]`
- 如果要在阻止上传时通过电子邮件收到通知，请在此处指定收件人电子邮件地址。

##### “skip_auth_process” `[bool]`
- 将此指令设置为`true`会指示PHPMailer跳过通过SMTP发送电子邮件时通常会发生的正常身份验证过程。​应该避免这种情况，因为跳过此过程可能会将出站电子邮件暴露给MITM攻击，但在此过程阻止PHPMailer连接到SMTP服务器的情况下可能是必要的。

##### “host” `[string]`
- 用于出站电子邮件的SMTP主机。

##### “port” `[int]`
- 用于出站电子邮件的端口号。​标准=587。

##### “smtp_secure” `[string]`
- 通过SMTP发送电子邮件时使用的协议（TLS或SSL）。

```
smtp_secure
├─default ("-")
├─tls ("TLS")
└─ssl ("SSL")
```

##### “smtp_auth” `[bool]`
- 此指令确定是否对SMTP会话进行身份验证（通常应该保持不变）。

##### “username” `[string]`
- 通过SMTP发送电子邮件时使用的用户名。

##### “password” `[string]`
- 通过SMTP发送电子邮件时使用的密码。

##### “set_from_address” `[string]`
- 通过SMTP发送电子邮件时引用的发件人地址。

##### “set_from_name” `[string]`
- 通过SMTP发送电子邮件时引用的发件人姓名。

##### “add_reply_to_address” `[string]`
- 通过SMTP发送电子邮件时引用的回复地址。

##### “add_reply_to_name” `[string]`
- 通过SMTP发送电子邮件时引用的回复姓名。

---


### 6. <a name="SECTION6"></a>签名格式

*也可以看看：*
- *[什么是“签名”？](#WHAT_IS_A_SIGNATURE)*

phpMussel签名文件前9个字节（`[x0-x8]`）是`phpMussel`。​它作为一个“魔术数字”【magic number】，将其标识为签名文件（这有助于防止phpMussel意外地尝试使用文件不是签名文件）。​下一个字节`[x9]`标识签名文件的类型。​这一点必须知道以便能够正确解释签名文件。​以下类型的签名文件被认可：

类型 | 字节 | 说明
---|---|---
`General_Command_Detections` | `0?` | 为CSV（逗号分隔值）签名文件。​值（签名）是在文件中查找的十六进制编码字符串。​这里的签名没有任何名称或其他详细信息（只有要检测的字符串）。
`Filename` | `1?` | 为文件名签名。
`Hash` | `2?` | 为哈希签名。
`Standard` | `3?` | 为与文件内容直接工作的签名文件。
`Standard_RegEx` | `4?` | 为与文件内容直接工作的签名文件。​签名可以包含正则表达式。
`Normalised` | `5?` | 为用于ANSI标准化文件内容的签名文件。
`Normalised_RegEx` | `6?` | 为用于ANSI标准化文件内容的签名文件。​签名可以包含正则表达式。
`HTML` | `7?` | 为用于HTML标准化文件内容的签名文件。
`HTML_RegEx` | `8?` | 为用于HTML标准化文件内容的签名文件。​签名可以包含正则表达式。
`PE_Extended` | `9?` | 为使用PE元数据的签名文件（但不PE部分元数据）。
`PE_Sectional` | `A?` | 为使用PE部分元数据的签名文件。
`Complex_Extended` | `B?` | 为使用各种规则的签名文件，基于由phpMussel生成的扩展元数据。
`URL_Scanner` | `C?` | 为使用URL的签名文件。

下一个字节`[x10]`是一个换行符`[0A]`，并结束phpMussel签名文件头。

之后的每个非空行都是签名或规则。​每个签名或规则占用一行。​支持的签名格式如下所述。

#### *文件名签名*
所有文件名签名跟随格式：

`NAME:FNRX`

`NAME`是名援引为签名和`FNRX`是正则表达式匹配文件名（未编码）为。

#### *哈希签名*
所有哈希签名跟随格式：

`HASH:FILESIZE:NAME`

`HASH`是全文件的哈希（通常是MD5），​`FILESIZE`是总文件大小和`NAME`是名援引为签名。

#### *移植可执行【PE】部分签名*
所有移植可执行【PE】部分签名跟随格式：

`SIZE:HASH:NAME`

`HASH`是一个MD5哈希的一个部分的一个移植可执行【PE】文件，​`SIZE`是总大小的该部分和`NAME`是名援引为签名。

#### *移植可执行【PE】扩展签名*
所有移植可执行【PE】扩展签名跟随格式：

`$VAR:HASH:SIZE:NAME`

`$VAR`是移植可执行【PE】变量名匹配为，​`HASH`是一个MD5哈希的该变量，​`SIZE`是总大小的该变量和`NAME`是名援引为签名。

#### *复杂扩展签名*
复杂扩展签名是宁不同从其他可能phpMussel签名类型，​在某种意义上说，​什么他们匹配针对是指定通过这些签名他们自己和他们可以匹配针对多重标准。​多重标准是分隔通过【;】和匹配类型和匹配数据的每多重标准是分隔通过【:】以确保格式为这些签名往往看起来有点像：

`$变量1:某些数据;$变量2:某些数据;签名等等`

#### *一切其他*
所有其他签名跟随格式：

`NAME:HEX:FROM:TO`

`NAME`是名援引为签名和`HEX`是一个十六进制编码分割的文件意味被匹配通过有关签名。​`FROM`和`TO`是可选参数，​说明从哪里和向哪里在源数据匹配针对。

#### *正则表达式/REGEX*
任何形式的正则表达式了解和正确地处理通过PHP应还会正确地了解和处理通过phpMussel和它的签名。​然而，​我将建议采取极端谨慎当写作新正则表达式为基础的签名，​因为，​如果您不完全肯定什么您被做，​可以有很不规则和/或意外结果。​看一眼的phpMussel源代码如果您不完全肯定的上下文其中正则表达式语句被处理。​还，​记得，​所有语句（除外为文件名，​存档元数据和MD5语句）必须是十六进制编码（和除外为语句句法，​还，​当然）！

---


### 7. <a name="SECTION7"></a>已知的兼容问题

#### 杀毒软件兼容性

有时phpMussel和其他防病毒解决方案之间存在兼容性问题。​因此，大约每隔几个月，我对照Virus Total检查了最新版本的phpMussel代码库，为了看那里是否报告了任何问题。​报告了问题时，我会在文档中在此处列出报告的问题。

当我最近检查（2022年5月12日）时，没有任何问题的报告。

我不检查签名文件，文档或其他外围内容。​当其他防病毒解决方案检测到签名文件时，它们总是会引起一些误报（假阳性）。​因此，我强烈建议，如果您打算在已经存在另一种防病毒解决方案的计算机上安装phpMussel，将phpMussel签名文件列入白名单。

*也可以看看：​[兼容性图表](https://maikuolan.github.io/Compatibility-Charts/)。*

---


### 8. <a name="SECTION8"></a>常见问题（FAQ）

- [什么是“签名”？](#WHAT_IS_A_SIGNATURE)
- [什么是“假阳性”？](#WHAT_IS_A_FALSE_POSITIVE)
- [什么是签名更新频率？](#SIGNATURE_UPDATE_FREQUENCY)
- [我在使用phpMussel时遇到问题和我不知道该怎么办！​请帮忙！](#ENCOUNTERED_PROBLEM_WHAT_TO_DO)
- [我想使用phpMussel v3与早于7.2.0的PHP版本；​您能帮我吗？](#MINIMUM_PHP_VERSION_V3)
- [我可以使用单个phpMussel安装来保护多个域吗？](#PROTECT_MULTIPLE_DOMAINS)
- [我不想浪费时间安装这个和确保它在我的网站上功能正常；我可以雇用您这样做吗？](#PAY_YOU_TO_DO_IT)
- [我可以聘请您或这个项目的任何开发者私人工作吗？](#HIRE_FOR_PRIVATE_WORK)
- [我需要专家修改，​的定制，​等等；您能帮我吗？](#SPECIALIST_MODIFICATIONS)
- [我是开发人员，​网站设计师，​或程序员。​我可以接受还是提供与这个项目有关的工作？](#ACCEPT_OR_OFFER_WORK)
- [我想为这个项目做出贡献；我可以这样做吗？](#WANT_TO_CONTRIBUTE)
- [扫描时如何访问文件的具体细节？](#SCAN_DEBUGGING)
- [黑名单 – 白名单 – 灰名单 – 他们是什么，我如何使用它们？](#BLACK_WHITE_GREY)
- [“PDO DSN”是什么？如何能PDO与phpMussel一起使用？](#HOW_TO_USE_PDO)
- [我的上传工具是异步的（例如，使用ajax，ajaj，json，等等）。当上传阻止时，我看不到任何特殊消息或警告。发生了什么？](#AJAX_AJAJ_JSON)
- [phpMussel可以检测EICAR吗？](#DETECT_EICAR)

#### <a name="WHAT_IS_A_SIGNATURE"></a>什么是“签名”？

在phpMussel的上下文中，“签名”是用于识别我们正在寻找的特定内容的数据，它通常采取一些非常小，不同，无害的一些更大和有害的东西的形式（例如，它可以识别病毒，木马，等等）。​也可以是文件校验和，哈希或其他类似的标识符。​通常包括一个标签和一些其他数据，以帮助提供额外的上下文，可以由phpMussel使用它来确定遇到我们正在寻找的最佳方法。

#### <a name="WHAT_IS_A_FALSE_POSITIVE"></a>什么是“假阳性”？

术语“假阳性”（*或者：“假阳性错误”；“虚惊”*；英语：*false positive*； *false positive error*； *false alarm*），​很简单地描述，​和在一个广义上下文，​被用来当测试一个因子，​作为参考的测试结果，​当结果是阳性（即：因子被确定为“阳性”，​或“真”），​但预计将为（或者应该是）阴性（即：因子，​在现实中，​是“阴性”，​或“假”）。​一个“假阳性”可被认为是同样的“哭狼” (其中，​因子被测试是是否有狼靠近牛群，​因子是“假”由于该有没有狼靠近牛群，​和因子是报告为“阳性”由牧羊人通过叫喊“狼，​狼”），​或类似在医学检测情况，​当患者被诊断有一些疾病，​当在现实中，​他们没有疾病。

一些相关术语是“真阳性”，​“真阴性”和“假阴性”。​一个“真阳性”指的是当测试结果和真实因子状态都是“真”（或“阳性”），​和一个“真阴性”指的是当测试结果和真实因子状态都是“假”（或“阴性”）；一个“真阳性”或“真阴性”被认为是一个“正确的推理”。​对立面“假阳性”是一个“假阴性”；一个“假阴性”指的是当测试结果是“阴性”（即：因子被确定为“阴性”，​或“假”），​但预计将为（或者应该是）阳性（即：因子，​在现实中，​是“阳性”，​或“真”）。

在phpMussel的上下文，​这些术语指的是phpMussel的签名和他们阻止的文件。​当phpMussel阻止一个文件由于恶劣的，​过时的，​或不正确的签名，​但不应该这样做，​或当它这样做为错误的原因，​我们将此事件作为一个“假阳性”。​当phpMussel未能阻止文件该应该已被阻止，​由于不可预见的威胁，​缺少签名或不足签名，​我们将此事件作为一个“检测错过”（同样的“假阴性”）。

这可以通过下表来概括：

&nbsp; | phpMussel不应该阻止文件 | phpMussel应该阻止文件
---|---|---
phpMussel不会阻止文件 | 真阴性（正确的推理） | 检测错过（同样的“假阴性”）
phpMussel会阻止文件 | __假阳性__ | 真阳性（正确的推理）

#### <a name="SIGNATURE_UPDATE_FREQUENCY"></a>什么是签名更新频率？

更新频率根据相关的签名文件而有所不同。​所有的phpMussel签名文件的维护者通常尽量保持他们的签名为最新，​但是因为我们所有人都有各种其他承诺，​和因为我们的生活超越了项目，​和因为我们不得到经济补偿/付款为我们的项目的努力，​无法保证精确的更新时间表。​通常，​签名被更新每当有足够的时间。​帮助总是感谢，​如果你愿意提供任何。

#### <a name="ENCOUNTERED_PROBLEM_WHAT_TO_DO"></a>我在使用phpMussel时遇到问题和我不知道该怎么办！​请帮忙！

- 您使用软件的最新版本吗？​您使用签名文件的最新版本吗？​如果这两个问题的答案是不，​尝试首先更新一切，​然后检查问题是否仍然存在。​如果它仍然存在，​继续阅读。
- 您检查过所有的文档吗？​如果没有做，​请这样做。​如果文档不能解决问题，​继续阅读。
- 您检查过[issues页面](https://github.com/phpMussel/phpMussel/issues)吗？​检查是否已经提到了问题。​如果已经提到了，​请检查是否提供了任何建议，​想法或解决方案。​按照需要尝试解决问题。
- 如果问题仍然存在，请通过在issues页面上创建新issue寻求帮助。

#### <a name="MINIMUM_PHP_VERSION_V3"></a>我想使用phpMussel v3与早于7.2.0的PHP版本；​您能帮我吗？

不能。PHP >= 7.2.0是phpMussel v3的最低要求。

*也可以看看：​[兼容性图表](https://maikuolan.github.io/Compatibility-Charts/)。*

#### <a name="PROTECT_MULTIPLE_DOMAINS"></a>我可以使用单个phpMussel安装来保护多个域吗？

可以。

#### <a name="PAY_YOU_TO_DO_IT"></a>我不想浪费时间安装这个和确保它在我的网站上功能正常；我可以雇用您这样做吗？

也许。​这是根据具体情况考虑的。​告诉我们您需要什么，​您提供什么，​和我们会告诉您是否可以帮忙。

#### <a name="HIRE_FOR_PRIVATE_WORK"></a>我可以聘请您或这个项目的任何开发者私人工作吗？

*参考上面。​*

#### <a name="SPECIALIST_MODIFICATIONS"></a>我需要专家修改，​的定制，​等等；您能帮我吗？

*参考上面。​*

#### <a name="ACCEPT_OR_OFFER_WORK"></a>我是开发人员，​网站设计师，​或程序员。​我可以接受还是提供与这个项目有关的工作？

您可以。​我们的许可证并不禁止这一点。

#### <a name="WANT_TO_CONTRIBUTE"></a>我想为这个项目做出贡献；我可以这样做吗？

您可以。​对项目的贡献是欢迎。​有关详细信息，​请参阅“CONTRIBUTING.md”。

#### <a name="SCAN_DEBUGGING"></a>扫描时如何访问文件的具体细节？

在启动扫描之前，​请分配一个数组以用于此目的。

在下面的例子中，​`$Foo` 是分配以用于此目的。​扫描 `/文件/路径/...` 后，​关于 `/文件/路径/...` 所包含的文件的信息将包含在 `$Foo` 中。

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);

$Scanner->setScanDebugArray($Foo);

$Results = $Scanner->scan('/文件/路径/...');

var_dump($Foo);
```

数组是多维的。​元素表示扫描的每个文件。​子元素表示这些文件的详细信息。​子要素如下：

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

*† - 在缓存结果中没有提供 （仅在新的扫描结果中提供）。​*

*‡ - 仅在扫描PE文件时提供。​*

如果您想，​可以通过使用以下命令来破坏此数组：

```PHP
$Scanner->destroyScanDebugArray($Foo);
```

#### <a name="BLACK_WHITE_GREY"></a>黑名单 – 白名单 – 灰名单 – 他们是什么，我如何使用它们？

这些术语在不同的上下文中表达不同的含义。​在phpMussel中，有三个使用这些术语的上下文：​文件大小响应，文件类型响应，和签名灰名单。

为了以最低的处理成本达到理想的效果，phpMussel在实际扫描文件之前可以检查一些简单的事情，如文件的大小，名称和扩展名。​例如；如果文件太大，或者其扩展名表示在我们的网站上我们不想要的文件类型，我们可以立即标记文件，并且不需要扫描它。

文件大小响应是phpMussel在文件超出指定限制时响应的方式。​没有涉及实际列表，但根据文件的大小，文件可能会在黑名单，白名单或灰名单中被有效考虑了。​存在两种不同的可选配置指令来分别指定限制和期望的响应。

文件类型响应是phpMussel在文件扩展名时响应的方式。​存在三种不同的可选配置指令，用于明确指定哪些扩展应在黑名单，白名单和灰名单中位于。​如果文件的扩展名分别与指定的扩展名匹配，则可以在黑名单，白名单或灰名单中该文件有效地考虑了。

在这两种上下文中，在白名单上意味着它不应该被扫描或标记；在黑名单上意味着它应该被标记（因此不需要扫描它）；和在灰名单上意味着需要进一步的分析来确定是否我们应该标记它（即，它应该被扫描）。

签名灰名单是基本上应该忽略的签名列表（这在文档中已经简要地提到了）。​当灰名单上的签名被触发时，phpMussel继续通过其签名工作，并且对于在灰名单上的签名不要采取任何特殊行动。​没有签名黑名单，因为隐含的行为无论和触发签名的正常的行为是一样的，并且没有签名白名单，因为考虑到phpMussel的正常的工作方式以及它的已有的功能，隐含的行为不会有意义。

如果您需要解决由特定签名造成的问题，并且不想禁用或卸载整个签名文件，则签名灰名单很有用。

#### <a name="HOW_TO_USE_PDO"></a>“PDO DSN”是什么？如何能PDO与phpMussel一起使用？

“PDO” 是 “[PHP Data Objects](https://www.php.net/manual/zh/intro.pdo.php)” 的首字母缩写（它的意思是“PHP数据对象”）。​它为PHP提供了一个接口，使其能够连接到各种PHP应用程序通常使用的某些数据库系统。

“DSN” 是 “[data source name](https://en.wikipedia.org/wiki/Data_source_name)” 的首字母缩写（它的意思是“数据源名称”）。​“PDO DSN”向PDO描述了它应如何连接到数据库。

phpMussel可以将PDO用于缓存。​为了使其正常工作，您需要相应地配置phpMussel，从而启用PDO，需要为phpMussel创建一个新数据库以供使用（如果您尚未想到要供phpMussel使用的数据库），并需要按照以下结构在数据库中创建一个新表。

当数据库连接成功时，但是必要的表不存在，表自动创建将尝试。​但是，此行为尚未经过广泛测试，因此无法保证成功。

当然，这仅在您确实希望phpMussel使用PDO时适用。​如果您对phpMussel使用平面文件缓存（按照其默认配置）或提供的任何其他各种缓存选项感到足够满意，则无需费心设置数据库，数据库表，等等。

下面描述的结构使用“phpmussel”作为其数据库名称，但是您可以使用任何想要的数据库名称，只要在DSN配置中名称被复制。

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

phpMussel的`pdo_dsn`应配置如下。

```
取决于所使用的数据库驱动程序......
├─4d （警告：实验性，未经测试，不建议！）
│ │
│ │         ╔═══════╗
│ └─4D:host=localhost;charset=UTF-8
│           ╚╤══════╝
│            └要查找数据库的主机。
├─cubrid
│ │
│ │             ╔═══════╗      ╔═══╗        ╔═════╗
│ └─cubrid:host=localhost;port=33000;dbname=example
│               ╚╤══════╝      ╚╤══╝        ╚╤════╝
│                │              │            └要使用的数据库的名称。
│                │              │
│                │              └连接的主机端口号。
│                │
│                └要查找数据库的主机。
├─dblib
│ │
│ │ ╔═══╗      ╔═══════╗        ╔═════╗
│ └─dblib:host=localhost;dbname=example
│   ╚╤══╝      ╚╤══════╝        ╚╤════╝
│    │          │                └要使用的数据库的名称。
│    │          │
│    │          └要查找数据库的主机。
│    │
│    └可能的值： “mssql”， “sybase”， “dblib”。
├─firebird
│ │
│ │                 ╔═══════════════════╗
│ └─firebird:dbname=/path/to/database.fdb
│                   ╚╤══════════════════╝
│                    ├可以是本地数据库文件的路径。
│                    │
│                    ├可以连接主机和端口号。
│                    │
│                    └如果要使用此功能，请参阅Firebird文档。
├─ibm
│ │
│ │         ╔═════╗
│ └─ibm:DSN=example
│           ╚╤════╝
│            └要连接的在目录中数据库。
├─informix
│ │
│ │              ╔═════╗
│ └─informix:DSN=example
│                ╚╤════╝
│                 └要连接的在目录中数据库。
├─mysql （最推荐！）
│ │
│ │              ╔═════╗      ╔═══════╗      ╔══╗
│ └─mysql:dbname=example;host=localhost;port=3306
│                ╚╤════╝      ╚╤══════╝      ╚╤═╝
│                 │            │              └连接的主机端口号。
│                 │            │
│                 │            └要查找数据库的主机。
│                 │
│                 └要使用的数据库的名称。
├─oci
│ │
│ │            ╔═════╗
│ └─oci:dbname=example
│              ╚╤════╝
│               ├可以参考特定的在目录中数据库。
│               │
│               ├可以连接主机和端口号。
│               │
│               └如果要使用此功能，请参阅Oracle文档。
├─odbc
│ │
│ │      ╔═════╗
│ └─odbc:example
│        ╚╤════╝
│         ├可以参考特定的在目录中数据库。
│         │
│         ├可以连接主机和端口号。
│         │
│         └如果要使用此功能，请参阅ODBC/DB2文档。
├─pgsql
│ │
│ │            ╔═══════╗      ╔══╗        ╔═════╗
│ └─pgsql:host=localhost;port=5432;dbname=example
│              ╚╤══════╝      ╚╤═╝        ╚╤════╝
│               │              │           └要使用的数据库的名称。
│               │              │
│               │              └连接的主机端口号。
│               │
│               └要查找数据库的主机。
├─sqlite
│ │
│ │        ╔════════╗
│ └─sqlite:example.db
│          ╚╤═══════╝
│           └要使用的本地数据库文件的路径。
└─sqlsrv
  │
  │               ╔═══════╗ ╔══╗          ╔═════╗
  └─sqlsrv:Server=localhost,1521;Database=example
                  ╚╤══════╝ ╚╤═╝          ╚╤════╝
                   │         │             └要使用的数据库的名称。
                   │         │
                   │         └连接的主机端口号。
                   │
                   └要查找数据库的主机。
```

如果不确定如何构造DSN，请尝试先查看它是否按原样工作，而不进行任何更改。

请注意， `pdo_username` 和 `pdo_password` 应与您为数据库选择的用户名和密码相同。

#### <a name="AJAX_AJAJ_JSON"></a>我的上传工具是异步的（例如，使用ajax，ajaj，json，等等）。当上传阻止时，我看不到任何特殊消息或警告。发生了什么？

这很正常。​phpMussel的标准“上传是否认”页面作为HTML。​对于典型的同步请求应该足够了，但是如果您的上传工具需要一些不同的东西，可能还不够。​如果您的上传工具是异步的，或者希望异步提供上传状态，为了使phpMussel能够满足您的上传工具的需求，您可以尝试做一些事情。

1. 创建自定义输出模板以提供HTML以外的东西。
2. 创建自定义插件以完全绕过标准的“上传是否认”页面并在上传被阻止时让上传处理程序执行其他操作（上传处理程序提供了一些插件挂钩，可能有用）。
3. 完全禁用上传处理程序，而是只从您的上传工具中调用phpMussel API。

#### <a name="DETECT_EICAR"></a>phpMussel可以检测EICAR吗？

可以。​用于检测EICAR的签名包含在“phpMussel标准正则表达式签名文件”中（`phpmussel_regex.db`）。​只要安装并激活了该签名文件，phpMussel就应该能够检测到EICAR。​由于ClamAV数据库还包含许多专门用于检测EICAR的签名，因此ClamAV可以轻松检测EICAR，但是由于phpMussel仅利用了ClamAV提供的全部签名中的一部分，因此它们本身可能不足以使phpMussel检测EICAR。​检测它的能力还可能取决于您的确切配置。

---


### 9. <a name="SECTION9"></a>法律信息

#### 9.0 章节前言

本文档章节描述了有关该软件包的使用和实施的可能法律考虑事项，并提供一些基本的相关信息。​这对于一些用户来说可能很重要，作为确保遵守其运营所在国家可能存在的任何法律要求的一种手段。​一些用户可能需要根据这些信息调整他们的网站政策。

首先，请认识到我（软件包作者）不是律师或合格的法律专业人员。​因此，我无法合法提供法律建议。​此外，在某些情况下，不同国家和地区的具体法律要求可能会有所不同。​这些不同的法律要求有时可能会相互矛盾​（例如：支持[隐私权](https://zh.wikipedia.org/wiki/%E9%9A%90%E7%A7%81%E6%9D%83)和[被遺忘權](https://zh.wikipedia.org/wiki/%E8%A2%AB%E9%81%BA%E5%BF%98%E6%AC%8A)的国家，与支持扩展数据保留的国家相比）。​还要考虑到对软件包的访问不限于特定的国家或辖区，因此，软件包用户群很可能在地理上多样化。​这些观点认为，我无法说明在所有方面对所有用户“符合法律”意味着什么。​不过，我希望这里的信息能够帮助您自己决定您必须做些什么为了在软件包的上下文中符合法律。​如果您对此处的信息有任何疑问或担忧，或者您需要从法律角度提供更多帮助和建议，我会建议咨询合格的法律专业人员。

#### 9.1 法律责任

此软件包不提供任何担保（这已由包许可证提及）。​这包括（但不限于）所有责任范围。​为了您的方便，该软件包已提供给您。​希望它会有用，它会为你带来一些好处。​但是，使用或实施该软件包是您自己的选择。​您不是被迫使用或实施该软件包，但是当您这样做时，您需要对该决定负责。​我，和其他软件包贡献者，对于您的决定的后果不承担法律责任，无论是直接的，间接的，暗示的，还是其他方式。

#### 9.2 第三方

取决于其确切的配置和实施，在某些情况下，该软件包可能与第三方进行通信和共享信息。​在某些情况下，某些辖区可能会将此信息定义为“[个人身份信息](https://zh.wikipedia.org/wiki/%E5%80%8B%E4%BA%BA%E5%8F%AF%E8%AD%98%E5%88%A5%E8%B3%87%E8%A8%8A)”（PII）。

这些信息如何被这些第三方使用，是受这些第三方制定的各种政策的约束，并且超出了本文档的范围。​但是，在所有这些情况下，与这些第三方共享信息可能被禁用。​在所有这些情况下，如果您选择启用它，则有责任研究您可能遇到的任何问题（如果您担心这些第三方的隐私，安全，和PII使用情况）。​如果存在任何疑问，或者您对PII方面的这些第三方的行为不满意，最好禁用与这些第三方分享的所有信息。

为了透明的目的，共享信息的类型，以及与谁共享，如下所述。

##### 9.2.1 URL扫描程序

上文件上传中找到的URL可能会与Google安全浏览API共享，取决于软件包的具体配置方式。​Google安全浏览API的使用需要API密钥，因此默认情况下是禁用。

*相关配置指令：*
- `urlscanner` -> `google_api_key`

##### 9.2.2 VIRUS TOTAL

当phpMussel扫描文件上传时，这些文件的哈希值可能会与Virus Total API共享，具体取决于软件包的配置方式。​有计划在未来的某个时候能够共享整个文件，但目前该软件包不支持该功能。​Virus Total API的使用需要API密钥，因此默认情况下是禁用。

与Virus Total共享的信息（包括文件和相关文件元数据）也可能与其合作伙伴，关联公司以及其他各方共享用于研究目的。​这在他们的隐私政策中有更详细的描述。

*看到： [Privacy Policy &ndash; VirusTotal](https://support.virustotal.com/hc/en-us/articles/115002168385-Privacy-Policy).*

*相关配置指令：*
- `virustotal` -> `vt_public_api_key`

#### 9.3 日志记录

由于多种原因，日志记录是phpMussel的重要组成部分。​当没有日志记录时，可能难以诊断和假阳性，可能很难确定phpMussel在某些情况下的表现如何，而且可能很难确定其不足之处，以及可能需要更改哪些配置或签名，以使其继续按预期运行。​无论如何，一些用户可能不想要记录，并且它仍然是完全可选的。​在phpMussel中，默认情况下日志记录是禁用。​要启用它，必须相应地配置phpMussel。

另外，如果日志记录在法律上是允许的，并且在法律允许的范围内（例如，可记录的信息类型，多长时间，在什么情况下），可以变化，具体取决于管辖区域和phpMussel的实施上下文（例如，如果您是个人或公司实体经营，如果您在商业或非商业基础上运营，等等）。​因此，仔细阅读本节可能对您有用。

phpMussel可以执行多种类型的日志记录。​不同类型的日志记录涉及不同类型的信息，出于各种原因。

##### 9.3.0 扫描日志

当在程序包配置中启用时，phpMussel保存文件扫描日志。​此类日志记录有两种不同的格式：
- 人类可读的日志文件。
- 序列化日志文件。

人类可读日志文件的条目通常看起来像这样（作为示例）：

```
Sun, 19 Jul 2020 13:33:31 +0800 开始。
→ 正在检查“ascii_standard_testfile.txt”。
─→ 检测phpMussel-Testfile.ASCII.Standard（ascii_standard_testfile.txt）！
Sun, 19 Jul 2020 13:33:31 +0800 完了。
```

扫描日志条目通常包括以下信息：
- 扫描文件的日期和时间。
- 扫描的文件的名称。
- 文件中检测到的内容（如果检测到任何内容）。

*相关配置指令：*
- `general` -> `scan_log`
- `general` -> `scan_log_serialized`

当这些指令保留为空时，此类日志记录将保持禁用状态。

##### 9.3.1 上传日志

在程序包配置中启用时，phpMussel会保留已阻止的上传日志。

*日志条目示例：*

```
日期: Sun, 19 Jul 2020 13:33:31 +0800
IP地址: 127.0.0.x
== 扫描结果（为什么标记） ==
检测phpMussel-Testfile.ASCII.Standard（ascii_standard_testfile.txt）！
== 哈希签名重建 ==
dcacac499064454218823fbabff7e09b5b011c0c877ee6f215f35bffb195b6e9:654:ascii_standard_testfile.txt
隔离为“1595142388-2e017ea9ac1478e45dc15794a1fc18c0.qfu”。
```

这些日志条目通常包括以下信息：
- 上传被阻止的日期和时间。
- 上传源自的IP地址。
- 文件被阻止的原因（检测到的内容）。
- 被阻止文件的名称。
- 被阻止文件的大小和校验和。
- 是否文件被隔离，以及内部名称是什么。

*相关配置指令：*
- `web` -> `uploads_log`

##### 9.3.2 前端日志记录

此类日志记录涉及前端登录尝试，仅在用户尝试登录前端时才会发生（假设启用了前端访问）。

前端日志条目包含尝试登录的用户的IP地址，尝试发生的日期和时间以及的结果（登录成功或失败）。​前端日志条目通常看起来像这样（作为示例）：

```
x.x.x.x - Day, dd Mon 20xx hh:ii:ss +0000 - "admin" - 已登录。
```

*相关配置指令：*
- `general` -> `frontend_log`

##### 9.3.3 日志轮换

您可能希望在一段时间后清除日志，或者可能被要求依法执行（即，您在法律上允许保留日志的时间可能受法律限制）。​您可以通过在程序包配置指定的日志文件名中包含日期/时间标记（例如，`{yyyy}-{mm}-{dd}.log`），​然后启用日志轮换来实现此目的（日志轮换允许您在超出指定限制时对日志文件执行某些操作）。

例如：如果法律要求我在30天后删除日志，我可以在我的日志文件的名称中指定`{dd}.log`（`{dd}`代表天），将`log_rotation_limit`的值设置为30，并将`log_rotation_action`的值设置为`Delete`。

相反，如果您需要长时间保留日志，你可以选择完全不使用日志轮换，或者你可以将`log_rotation_action`的值设置为`Archive`，以压缩日志文件，从而减少它们占用的磁盘空间总量。

*相关配置指令：*
- `general` -> `log_rotation_limit`
- `general` -> `log_rotation_action`

##### 9.3.4 日志截断

如果这是您想要做的事情，也可以在超过特定大小时截断个别日志文件。

*相关配置指令：*
- `general` -> `truncate`

##### 9.3.5 IP地址“PSEUDONYMISATION”

首先，如果您不熟悉这个术语，“pseudonymisation”是指处理个人数据，使其不能在没有补充信息的情况下被识别为属于任何特定的“数据主体”，并规定这些补充信息分开保存，采取技术和组织措施以确保个人数据不能被识别给任何自然人。

以下资源可以帮助更详细地解释它：
- [[trust-hub.com] What is pseudonymisation?](https://www.trust-hub.com/news/what-is-pseudonymisation/)
- [[Wikipedia] Pseudonymization](https://en.wikipedia.org/wiki/Pseudonymization)

在某些情况下，您可能在法律上要求对收集，处理，或存储的任何PII进行“pseudonymise”或“anonymise”。​虽然这个概念已经存在了相当长的一段时间，但GDPR/DSGVO提到，并特别鼓励“pseudonymisation”。

当记录它们时，phpMussel可以对IP地址进行pseudonymise，如果这是您想做的事情。​当这个情况发生时，IPv4地址的最后八位字节，以及IPv6地址的第二部分之后的所有内容，将由“x”表示（有效地将IPv4地址四舍五入到它的第24个子网因素的初始地址，和将IPv6地址四舍五入到它的第32个子网因素的初始地址）。

*相关配置指令：*
- `legal` -> `pseudonymise_ip_addresses`

##### 9.3.6 统计

phpMussel可选择跟踪统计信息，例如自特定时间以来扫描和阻止的文件总数。​默认情况下此功能是禁用，但可以通过程序包配置启用此功能。​所跟踪的信息类型不应视为PII。

*相关配置指令：*
- `general` -> `statistics`

##### 9.3.7 加密

phpMussel不[加密](https://zh.wikipedia.org/wiki/%E5%8A%A0%E5%AF%86)其缓存或任何日志信息。​可能会在将来引入缓存和日志加密，但目前没有任何具体的计划。​如果您担心未经授权的第三方获取可能包含PII或敏感信息（如缓存或日志）的phpMussel部分的访问权限，我建议不要将phpMussel安装在可公开访问的位置（例如，在标准`public_html`或等效目录之外【可用于大多数标准网络服务器】安装phpMussel），​也我建议对安装目录强制执行适当的限制权限。​如果这还不足以解决您的疑虑，应该配置phpMussel为不会首先收集或记录引起您关注的信息类型（例如，通过禁用日志记录）。

#### 9.4 COOKIE

当用户成功登录前端时，phpMussel设置cookie以便能够在后续请求中的记住用户（即，cookie用于向登录会话验证用户身份）。​在登录页面上，cookie警告显着显示，警告用户如果他们参与相关操作将设置cookie。 Cookie不会在代码库中的任何其他位置设置。

#### 9.5 市场营销和广告

phpMussel不收集或处理任何信息用于营销或广告目的，既不销售也不从任何收集或记录的信息中获利。​phpMussel不是商业企业，也不涉及任何商业利益，因此做这些事情没有任何意义。​自项目开始以来就一直如此，今天仍然如此。​此外，做这些事情会对整个项目的精神和预期目的产生反作用，并且只要我继续维护项目，永远不会发生。

#### 9.6 隐私政策

在某些情况下，您可能需要依法在您网站的所有页面和部分上清楚地显示您的隐私政策链接。​这可能为了确保用户充分了解您的隐私惯例，收集的个人身份信息类型以及您打算如何使用它的是很重要。​为了能够在phpMussel的“上传是否认”页面上包含这样的链接，提供了配置指令来指定隐私策略的URL。

*相关配置指令：*
- `legal` -> `privacy_policy`

#### 9.7 GDPR/DSGVO

“通用数据保护条例”（GDPR）是欧盟法规，自2018年5月25日起生效。​该法规的主要目标是向欧盟公民和居民提供有关其个人数据的控制权，并统一欧盟内有关隐私和个人数据的法规。

该法规包含有关处理任何欧盟“数据主体”（任何已识别或可识别的自然人）的“[个人身份信息](https://zh.wikipedia.org/wiki/%E5%80%8B%E4%BA%BA%E5%8F%AF%E8%AD%98%E5%88%A5%E8%B3%87%E8%A8%8A)”（PII）的具体规定。​为了符合条例，“企业”（按照法规的定义），和任何相关的系统和流程必须默认实现“隐私设计”，​必须使用尽可能高的隐私设置，​必须对任何存储或处理的信息实施必要的保护措施（数据的 pseudonymisation 或完整 anonymisation ），​必须明确无误地声明他们收集的数据类型，​他们如何处理数据，​出于何种原因，​他们保留多长时间，​以及他们是否与任何第三方分享这些数据，​与第三方共享的数据类型，​为什么，​等等。

只有按照条例有合法依据才能处理数据。​一般而言，这意味着为了在合法基础上处理数据主体的数据，必须遵守法律义务，或者仅在从数据主体获得明确，明智，明确的同意之后才进行处理。

因为条例的各个方面可能会及时演变，并为了避免过时信息的传播，从权威来源中学习可能会更好的，而不是简单地在包文档中包含相关信息（这个信息可能最终会过时）。

一些推荐的资源用于了解更多信息：
- [关于欧盟GDPR隐私合规，中国数字营销人不得不知的9大问题](http://www.adexchanger.cn/top_news/28813.html)
- [史上最严的隐私条例出台，2018年开始执行](https://zhuanlan.zhihu.com/p/20865602)
- [《欧盟数据保护条例》对中国企业的影响 —- 以阿里巴巴集团为例](https://spiegeler.com/%E3%80%8A%E6%AC%A7%E7%9B%9F%E6%95%B0%E6%8D%AE%E4%BF%9D%E6%8A%A4%E6%9D%A1%E4%BE%8B%E3%80%8B%E5%AF%B9%E4%B8%AD%E5%9B%BD%E4%BC%81%E4%B8%9A%E7%9A%84%E5%BD%B1%E5%93%8D-%E4%BB%A5%E9%98%BF%E9%87%8C/)
- [歐盟個人資料保護法 GDPR 即將上路！與電商賣家息息相關的 Google Analytics 資料保留政策，你瞭解了嗎？](https://shopline.hk/blog/google-analytics-gdpr/)
- [歐盟一般資料保護規範](https://zh.wikipedia.org/wiki/%E6%AD%90%E7%9B%9F%E4%B8%80%E8%88%AC%E8%B3%87%E6%96%99%E4%BF%9D%E8%AD%B7%E8%A6%8F%E7%AF%84)
- [REGULATION (EU) 2016/679 OF THE EUROPEAN PARLIAMENT AND OF THE COUNCIL](https://eur-lex.europa.eu/legal-content/EN/TXT/?uri=celex:32016R0679)

---


最后更新：2022年9月26日。
