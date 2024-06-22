## phpMussel v3 설명서 (한국어).

### 목차
- 1. [서문](#user-content-SECTION1)
- 2. [설치 방법](#user-content-SECTION2)
- 3. [사용 방법](#user-content-SECTION3)
- 4. [PHPMUSSEL 확장](#user-content-SECTION4)
- 5. [설정 옵션](#user-content-SECTION5)
- 6. [서명 형식](#user-content-SECTION6)
- 7. [알려진 호환성 문제](#user-content-SECTION7)
- 8. [자주 묻는 질문 (FAQ)](#user-content-SECTION8)
- 9. [법률 정보](#user-content-SECTION9)

*Regarding translations: My native language is English. Because this is a free and open-source hobby project which generates zero income, and translatable content is likely to change as the features and functionality supported by the project changes, it doesn't make sense for me to spend money for translations. Because I'm the sole author/developer/maintainer for the project and I'm not a ployglot, any translations I produce are very likely to contain errors. Sorry, but realistically, that won't ever change. If you find any such errors/typos/mistakes/etc, your assistance to correct them would be very much appreciated. Pull requests are invited and encouraged. Otherwise, if you find these errors too much to handle, just stick with the original English source. If a translation is irredeemably incomprehensible, let me know which, and I can delete it. If you're not sure how to perform pull requests, ask. I can help.*

---


### 1. <a name="SECTION1"></a>서문

스크립트가 hook된 곳에서 ClamAV 등의 서명을 기반으로 시스템에 업로드된 파일 내의 트로이 목마, 바이러스, 멀웨어 및 기타 위협 요소를 탐지하기 위한 PHP 스크립트인 phpMussel을 이용해 주셔서 감사합니다.

[PHPMUSSEL](https://phpmussel.github.io/) COPYRIGHT 2013 and beyond GNU/GPLv2 by [Caleb M (Maikuolan)](https://github.com/Maikuolan).

이 스크립트는 자유 소프트웨어입니다; 자유 소프트웨어 재단이 공표한 GNU 일반 공중 사용 허가서의 버전 2 또는 그 이후 버전 (선택 사항)의 조건에 따라 이를 재배포하거나 수정할 수 있습니다. 이 스크립트가 유용할 것이라는 희망에서 배포되었지만 어떠한 보증도 하지 않습니다; 상품성 또는 특정 목적에 대한 적합성에 대한 묵시적인 보증조차 하지 않습니다. 자세한 사항은 `LICENSE.txt` 파일 또는 다음 링크에서 확인할 수 있는 GNU 일반 공중 사용 허가서를 참조하시기 바랍니다:
- <https://www.gnu.org/licenses/>.
- <https://opensource.org/licenses/>.

프로젝트에 영감을 주고 이 스크립트가 활용하는 서명을 제공하는 [ClamAV](https://www.clamav.net/)에게 감사의 말씀을 드립니다. 그 서명 없이는 이 스크립트가 존재하지 않았거나 극히 제한적인 가치밖에 없었을 것입니다.

프로젝트 파일을 호스팅하는 GitHub과 Bitbucket, phpMussel이 활용하는 서명의 추가적인 소스: [PhishTank](https://www.phishtank.com/), [NLNetLabs](https://nlnetlabs.nl/), [Malware.Expert](https://malware.expert/) 등, 이 프로젝트를 지원해 주신 분들, 제가 잊어버리고 언급하지 못했을 다른 분들과 이 스크립트를 사용하는 당신에게 감사의 말씀을 드립니다.

---


### 2. <a name="SECTION2"></a>설치 방법

#### 2.0 COMPOSER를 이용하여 설치

phpMussel v3을 설치하는 권장되는 방법은 Composer를 통해 설치하는 것입니다.

편의를 위해 예전의 주 저장소를 통해 가장 일반적으로 필요한 phpMussel 의존성을 설치할 수 있습니다:

`composer require phpmussel/phpmussel`

또는 구현 시 필요할 의존성을 개별적으로 선택할 수 있습니다. 특정 의존성만 원하고 모든 것이 다 필요하지는 않을 가능성이 높습니다.

phpMussel을 이용하여 무엇이든 하려면 phpMussel 코어 코드베이스가 필요합니다:

`composer require phpmussel/core`

phpMussel에 대한 프론트엔드 관리 기능을 제공합니다:

`composer require phpmussel/frontend`

웹 사이트에 대해 자동 파일 업로드 검사를 제공합니다:

`composer require phpmussel/web`

phpMussel을 대화형 CLI 모드 애플리케이션으로 활용할 수 있도록 해 줍니다:

`composer require phpmussel/cli`

phpMussel과 PHPMailer를 연결하여 phpMussel이 2단계 인증, 차단된 파일 업로드에 대한 이메일 알림 등에 PHPMailer를 활용할 수 있도록 해 줍니다:

`composer require phpmussel/phpmailer`

phpMussel이 무엇이든 감지하려면 서명을 설치해야 합니다. 이를 위한 특정 패키지는 없습니다. 서명을 설치하려면 이 문서의 다음 섹션을 참조하세요.

또는 Composer를 사용하고 싶지 않다면 여기에서 사전 패키지된 ZIP을 다운로드할 수 있습니다:

https://github.com/phpMussel/Examples

사전 패키지된 ZIP에는 앞서 언급한 모든 의존성과 모든 표준 phpMussel 서명 파일과 구현 시 phpMussel을 사용하는 방법에 대한 예제가 포함되어 있습니다.

#### <a name="INSTALLING_SIGNATURES"></a>2.1 서명 설치

phpMussel은 특정 위협을 감지하기 위해 서명을 요구합니다. 서명을 설치하는 2가지 주요 방법이 있습니다:

1. "SigTool"을 이용하여 서명 생성 및 수동 설치.
2. "phpMussel/Signatures"나 "phpMussel/Examples"에서 서명 다운로드 후 수동 설치.

##### 2.1.0 "SigTool"을 이용하여 서명 생성 및 수동 설치.

*참조: [SigTool 설명서](https://github.com/phpMussel/SigTool#documentation).*

*참고 사항: SigTool은 ClamAV의 서명만 처리합니다. phpMussel의 테스트 샘플을 탐지하는 데 필요한 서명이 포함된 phpMussel 전용 서명과 같이 다른 소스에서 서명을 얻으려면 여기에 언급된 다른 방법으로 보완해야 합니다.*

##### 2.1.1 "phpMussel/Signatures"나 "phpMussel/Examples"에서 서명 다운로드 후 수동 설치

먼저 [phpMussel/Signatures](https://github.com/phpMussel/Signatures)로 가세요. 저장소에 다양한 GZ 압축 서명 파일이 포함되어 있습니다. 필요한 파일을 다운로드하고 압축을 푼 다음 설치본의 signatures 디렉토리에 복사하세요.

또는 [phpMussel/Examples](https://github.com/phpMussel/Examples)에서 최신 ZIP을 다운로드하세요. 그리고 해당 압축 파일에 들어 있는 서명을 설치본에 복사/붙여넣기할 수 있습니다.

---


### 3. <a name="SECTION3"></a>사용 방법

#### 3.0 PHPMUSSEL 구성

phpMussel을 설치한 후 이를 구성하기 위해 구성 파일이 필요합니다. phpMussel 구성 파일에 INI나 YML 파일 형식을 사용할 수 있습니다. 예제 ZIP 중 하나를 이용하여 작업하는 경우 이미 두 가지 예제 구성 파일인 `phpmussel.ini`와 `phpmussel.yml` 파일이 있습니다; 원한다면 둘 중 하나를 선택하여 작업할 수 있습니다. 예제 ZIP 중 하나를 이용하여 작업하지 않는다면 새 파일을 만들어야 합니다.

phpMussel의 기본 구성에 만족하고 아무것도 변경하지 않으려면 빈 파일을 구성 파일로 사용할 수 있습니다. 구성 파일에서 구성되지 않은 것은 기본값을 사용하므로 기본값과 다른 것을 사용하고 싶은 것만 명시적으로 구성하면 됩니다 (즉, 빈 구성 파일은 phpMussel이 모든 기본값을 사용하도록 합니다).

phpMussel 프론트엔드를 사용하고 싶다면 프론트엔드 구성 페이지에서 모든 것을 구성할 수 있습니다. 단 v3부터는 프론트엔드 로그인 정보가 구성 파일에 저장되므로 프론트엔드에 로그인하려면 최소한 로그인할 때 사용할 계정을 구성해야 하며, 그런 다음 로그인한 후 프론트엔드 구성 페이지를 이용하여 다른 것들을 구성할 수 있습니다.

아래는 사용자 이름이 "admin"이고 비밀번호가 "password"인 새 계정을 프론트엔드에 추가합니다.

INI 파일의 경우:

```INI
[user.admin]
password='$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK'
permissions='1'
```

YML 파일의 경우:

```YAML
user.admin:
 password: "$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK"
 permissions: 1
```

원하는 대로 구성 이름을 지정할 수 있으며 (어떤 형식을 사용하는지 phpMussel이 알 수 있도록 확장자를 유지하는 한) 원하는 곳에 저장할 수 있습니다. 로더를 인스턴스화할 때 경로를 제공하여 phpMussel이 어디서 구성 파일을 찾을지 알려줄 수 있습니다. 경로가 제공되지 않으면 phpMussel은 vendor 디렉토리의 상위에서 구성 파일 찾기를 시도합니다.

Apache와 같은 일부 환경에서는 구성 파일 앞에 점을 붙여 이를 숨기고 공개 액세스를 막을 수도 있습니다.

phpMussel에서 사용할 수 있는 다양한 구성 지시문에 대한 자세한 내용은 이 문서의 구성 섹션을 참조하세요.

#### 3.1 PHPMUSSEL 코어

phpMussel을 어떻게 사용하고 싶든 거의 모든 구현에는 최소한 다음과 같은 내용이 포함됩니다:

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
```

클래스 이름이 암시하듯이 로더는 phpMussel을 사용하는 데 기본적으로 필요한 것들을 준비하는 것을 담당하고 스캐너는 모든 핵심 검사 기능을 담당합니다.

로더의 생성자는 매개변수 5개를 허용하며 모두 선택 사항입니다.

```PHP
public function __construct(
    string $ConfigurationPath = '',
    string $CachePath = '',
    string $QuarantinePath = '',
    string $SignaturesPath = '',
    string $VendorPath = ''
)
```

1번째 매개변수는 구성 파일의 전체 경로입니다. 생략하면 phpMussel은 vendor 디렉토리의 상위에서 `phpmussel.ini`나 `phpmussel.yml`이라는 이름의 구성 파일을 찾습니다.

2번째 매개변수는 phpMussel이 캐싱과 임시 파일 저장에 사용하도록 허용하는 디렉토리의 경로입니다. 생략하면 phpMussel은 vendor 디렉토리의 상위에 `phpmussel-cache`라는 이름으로 사용할 새 디렉토리 만들기를 시도합니다. 이 경로를 직접 지정하고 싶다면 지정된 디렉토리에 있는 다른 데이터의 원치 않는 손실을 방지하기 위해 빈 디렉토리를 선택하는 것이 가장 좋습니다.

3번째 매개변수는 phpMussel이 격리에 사용하도록 허용하는 디렉토리의 경로입니다. 생략하면 phpMussel은 vendor 디렉토리의 상위에 `phpmussel-quarantine`이라는 이름으로 사용할 새 디렉토리 만들기를 시도합니다. 이 경로를 직접 지정하고 싶다면 지정된 디렉토리에 있는 다른 데이터의 원치 않는 손실을 방지하기 위해 빈 디렉토리를 선택하는 것이 가장 좋습니다. 격리에 사용되는 디렉토리에 대한 공개 액세스를 막는 것이 좋습니다.

4번째 매개변수는 phpMussel의 서명 파일이 포함된 디렉토리의 경로입니다. 생략하면 phpMussel은 vendor 디렉토리의 상위에 있는 `phpmussel-signatures`라는 이름의 디렉토리에서 서명 파일 찾기를 시도합니다.

5번째 매개변수는 vendor 디렉토리의 경로입니다. 절대로 다른 것을 가리켜서는 안 됩니다. 생략하면 phpMussel은 스스로 이 디렉토리 찾기를 시도합니다. 이 매개변수는 일반적인 Composer 프로젝트와 구조가 같지 않을 수도 있는 구현과 쉽게 통합할 수 있도록 제공됩니다.

스캐너의 생성자는 매개변수 1개만 허용하며 이는 필수입니다: 인스턴스화된 로더 객체. 이는 참조로 전달되므로 변수를 이용하여 인스턴스화해야 합니다 (값으로 전달하기 위해 스캐너 내에서 직접 인스턴스화하는 것은 phpMussel을 사용하는 올바른 방법이 아닙니다).

```PHP
public function __construct(\phpMussel\Core\Loader &$Loader)
```

#### 3.2 자동 파일 업로드 검사

업로드 핸들러를 인스턴스화하려면:

```PHP
$Web = new \phpMussel\Web\Web($Loader, $Scanner);
```

파일 업로드를 검사하려면:

```PHP
$Web->scan();
```

선택적으로, 원하는 경우 phpMussel은 문제가 있는 경우 업로드의 이름 복구를 시도할 수 있습니다:

```PHP
$Web->demojibakefier();
```

완전한 예를 들면:

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

*phpMussel 테스트 전용으로 제공되는 무해한 샘플인 `ascii_standard_testfile.txt` 파일 업로드 시도:*

![스크린샷](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/web-v3.0.0-alpha2.png)

#### 3.3 CLI 모드

CLI 핸들러를 인스턴스화하려면:

```PHP
$CLI = new \phpMussel\CLI\CLI($Loader, $Scanner);
```

완전한 예를 들면:

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

*스크린샷:*

![스크린샷](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/cli-v3.4.1.png)

#### 3.4 프론트엔드

프론트엔드를 인스턴스화하려면:

```PHP
$FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
```

완전한 예를 들면:

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

*스크린샷:*

![스크린샷](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/frontend-v3.4.0.png)

#### 3.5 스캐너 API

원하는 경우 다른 프로그램이나 스크립트에서 phpMussel 스캐너 API를 구현할 수도 있습니다.

완전한 예를 들면:

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

해당 예시에서 주목해야 할 중요한 부분은 `scan()` 메서드입니다. `scan()` 메서드는 매개변수 2개를 허용합니다:

```PHP
public function scan(mixed $Files, int $Format = 0): mixed
```

1번째 매개변수는 문자열이나 배열일 수 있으며 스캐너에 무엇을 검사해야 하는지 알려줍니다. 특정 파일이나 디렉토리를 나타내는 문자열이나 여러 파일/디렉토리를 지정하는 이러한 문자열의 배열일 수 있습니다.

문자열인 경우 데이터를 찾을 수 있는 위치를 가리켜야 합니다. 배열인 경우 배열 키는 검사할 항목의 원래 이름을 나타내야 하고 값은 데이터를 찾을 수 있는 위치를 가리켜야 합니다.

2번째 매개변수는 정수이며 스캐너가 검사 결과를 반환하는 방법을 알려줍니다.

검사 결과를 검사한 각 항목에 대한 정수의 배열로 반환하려면 1을 지정하세요.

이러한 정수의 의미는 다음과 같습니다:

결과 | 설명
--:|:--
-5 | 다른 이유로 검사를 완료하지 못했음을 나타냄.
-4 | 암호화로 인해 데이터를 검사할 수 없었음을 나타냄.
-3 | phpMussel 서명 파일에 문제가 있었음을 나타냄.
-2 | 검사 중 손상된 데이터가 감지되어 검사를 완료하지 못했음을 나타냄.
-1 | PHP가 검사를 수행하기 위해 요구하는 확장 기능이나 애드온이 없어서 검사를 완료하지 못했음을 나타냄.
0 | 검사 대상이 존재하지 않아서 검사할 것이 없었음을 나타냄.
1 | 대상이 성공적으로 검사되었고 문제가 감지되지 않았음을 나타냄.
2 | 대상이 성공적으로 검사되었고 문제가 감지되었음을 나타냄.

검사 결과를 부울로 반환하려면 2를 지정하세요.

결과 | 설명
:-:|:--
`true` | 문제가 감지됨 (검사 대상이 악의적이거나 위험함).
`false` | 문제가 감지되지 않음 (검사 대상이 정상일 수 있음).

검사 결과를 검사한 각 항목에 대한 사람이 읽을 수 있는 텍스트의 배열로 반환하려면 3을 지정하세요.

*출력 예시:*

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

검사 결과를 사람이 읽을 수 있는 텍스트의 문자열로 반환하려면 4를 지정하세요 (3과 비슷하지만 합쳐져 있습니다).

*출력 예시:*

```
Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)! Detected phpMussel-Testfile.CoEx (coex_testfile.rtf)! Detected encrypted archive; Encrypted archives not permitted (encrypted.zip)!
```

형식화된 텍스트 (즉, CLI를 사용할 때 표시되는 검사 결과)를 반환하려면 다른 값을 지정하세요.

*출력 예시:*

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

*도보시오: [파일을 검사할 때 파일에 대한 특정 세부 정보에 액세스하는 방법은 무엇인가요?](#user-content-SCAN_DEBUGGING)*

#### 3.6 2단계 인증

2단계 인증 ("2FA")을 활성화해서 프론트엔드를 더 안전하게 만들 수 있습니다. 2FA가 활성화된 계정으로 로그인하면 해당 계정과 연결된 이메일 주소로 이메일이 전송됩니다. 이 이메일에는 사용자가 해당 계정으로 로그인하기 위해 사용자 이름과 비밀번호에 추가로 입력해야 하는 "2FA 코드"가 포함되어 있습니다. 이는 세션과 연결된 2FA 코드를 받고 이용하기 위해서는 계정과 연결된 이메일 주소에도 액세스할 수 있어야 하므로 계정 비밀번호를 얻는 것만으로는 해커나 잠재적 공격자가 해당 계정으로 로그인하기에 충분하지 않다는 것을 의미합니다. 따라서 프론트엔드를 더 안전하게 만듭니다.

PHPMailer를 설치한 후 phpMussel 구성 페이지나 구성 파일을 통해 PHPMailer에 대한 구성 지시문을 채워야 합니다. 이러한 구성 지시문에 대한 더 많은 정보는 이 문서의 구성 섹션에 포함되어 있습니다. PHPMailer 구성 지시문을 채운 후 `enable_two_factor`를 `true`로 설정하세요. 이제 2단계 인증이 활성화되었을 것입니다.

다음으로, phpMussel이 해당 계정으로 로그인할 때 어디로 2FA 코드를 보낼지 알 수 있도록 이메일 주소를 계정과 연결해야 합니다. 이렇게 하려면 이메일 주소를 계정의 사용자 이름으로 사용하거나 (`foo@bar.tld`처럼) 일반적으로 이메일을 보낼 때처럼 이메일 주소를 사용자 이름에 포함시키세요 (`Foo Bar <foo@bar.tld>`처럼).

---


### 4. <a name="SECTION4"></a>PHPMUSSEL 확장

phpMussel은 확장성을 염두에 두고 설계되었습니다. phpMussel 조직의 저장소에 대한 pull 요청과 일반적인 [기여](https://github.com/phpMussel/.github/blob/master/CONTRIBUTING.md)는 언제나 환영합니다. 그러나 특정 저장소에 기여하기에는 적합하지 않은 방법으로 phpMussel을 수정하거나 확장해야 한다면 그렇게 하는 것도 가능합니다 (예: 조직에서 기밀성이나 개인 정보 보호가 필요하여 공개할 수 없거나 phpMussel을 요구하는 플러그인과 새 Composer 패키지와 같이 자체 저장소에서 공개하는 것이 좋을 수 있는 특정 구현 전용인 수정이나 확장의 경우).

v3부터 모든 phpMussel 기능은 클래스로 존재하며 이는 경우에 따라서는 PHP에서 제공하는 [객체 상속](https://www.php.net/manual/en/language.oop5.inheritance.php) 메커니즘이 phpMussel을 확장하는 쉽고 적절한 방법이 될 수 있음을 의미합니다.

phpMussel은 확장성을 위한 자체 메커니즘도 제공합니다. v3 이전에 선호되는 메커니즘은 phpMussel의 통합 플러그인 시스템이었습니다. v3부터 선호되는 메커니즘은 events orchestrator입니다.

phpMussel을 확장하고 새 플러그인을 작성하기 위한 boilerplate 코드는 [boilerplates 저장소](https://github.com/phpMussel/plugin-boilerplates)에 공개되어 있습니다. [현재 지원하는 모든 이벤트](https://github.com/phpMussel/plugin-boilerplates/tree/master/boilerplate-v3#currently-supported-events) 목록과 boilerplate 코드를 사용하는 방법에 대한 더 자세한 설명도 포함되어 있습니다.

v3 boilerplate 코드의 구조는 phpMussel 조직의 다양한 phpMussel v3 저장소의 구조와 동일하다는 것을 알 수 있습니다. 그것은 우연이 아닙니다. 가능하면 확장 목적으로 v3 boilerplate 코드를 활용하고 phpMussel v3 자체와 유사한 설계 원칙을 활용하는 것을 추천합니다. 새 확장이나 플러그인을 공개하기로 선택한 경우 이에 대한 Composer 지원을 통합할 수 있으며 그러면 다른 사람들이 phpMussel v3 자체와 같은 방법으로 다른 Composer 의존성과 함께 확장이나 플러그인을 요구하고 구현에 필요한 이벤트 핸들러를 적용하는 것만으로 확장이나 플러그인을 활용하는 것이 이론적으로 가능할 것입니다. (물론 다른 사람들이 존재할 수도 있는 필요한 이벤트 핸들러와 공개한 것의 올바른 설치와 활용에 필요한 기타 정보를 알 수 있도록 설명을 포함하는 것을 잊지 마세요).

---


### 5. <a name="SECTION5"></a>설정 옵션

다음은 phpMussel에서 허용하는 구성 지시문 목록입니다, 그들의 목적과 기능에 대한 설명과 함께.

```
구성 (v3)
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

#### "core" (카테고리)
일반 설정 (다른 카테고리에 속하지 않는 설정).

##### "scan_log" `[string]`
- 전체 스캔 결과를 기록하는 파일의 파일 이름. 파일 이름을 지정하십시오. 비활성화하려면 비워 둡니다.

유용한 팁 : 시간 형식 자리 표시자를 사용하여 로그 파일 이름에 날짜/시간 정보를 첨부할 수 있습니다. 사용 가능한 시간 형식 자리 표시자는 {{Links.ConfigRef.time_format}}에 표시됩니다.

##### "scan_log_serialized" `[string]`
- 전체 스캔 결과를 기록하는 파일의 파일 이름 (serialization 형식을 이용). 파일 이름을 지정하십시오. 비활성화하려면 비워 둡니다.

유용한 팁 : 시간 형식 자리 표시자를 사용하여 로그 파일 이름에 날짜/시간 정보를 첨부할 수 있습니다. 사용 가능한 시간 형식 자리 표시자는 {{Links.ConfigRef.time_format}}에 표시됩니다.

##### "error_log" `[string]`
- 치명적이지 않은 오류를 탐지하기위한 파일. 파일 이름을 지정하십시오. 비활성화하려면 비워 둡니다.

유용한 팁 : 시간 형식 자리 표시자를 사용하여 로그 파일 이름에 날짜/시간 정보를 첨부할 수 있습니다. 사용 가능한 시간 형식 자리 표시자는 {{Links.ConfigRef.time_format}}에 표시됩니다.

##### "outbound_request_log" `[string]`
- 아웃바운드 요청의 결과를 기록하기 위한 파일. 파일 이름을 지정하십시오. 비활성화하려면 비워 둡니다.

유용한 팁 : 시간 형식 자리 표시자를 사용하여 로그 파일 이름에 날짜/시간 정보를 첨부할 수 있습니다. 사용 가능한 시간 형식 자리 표시자는 {{Links.ConfigRef.time_format}}에 표시됩니다.

##### "truncate" `[string]`
- 로그 파일이 특정 크기에 도달하면 잘 있습니까? 값은 로그 파일이 잘 리기 전에 커질 가능성이있는 B/KB/MB/GB/TB 단위의 최대 크기입니다. 기본값 "0KB"은 절단을 해제합니다 (로그 파일은 무한정 확장 할 수 있습니다). 참고 : 개별 로그 파일에 적용됩니다! 로그 파일의 크기는 일괄 적으로 고려되지 않습니다.

##### "log_rotation_limit" `[int]`
- 로그 회전은 한 번에 존재해야하는 로그 파일 수를 제한합니다. 새 로그 파일을 만들 때 총 로그, 파일 수가 지정된 제한을 초과하면, 지정된 작업이 수행됩니다. 여기서 원하는 한계를 지정할 수 있습니다. 값 0은 로그 회전을 비활성화합니다.

##### "log_rotation_action" `[string]`
- 로그 회전은 한 번에 존재해야하는 로그 파일 수를 제한합니다. 새 로그 파일을 만들 때 총 로그, 파일 수가 지정된 제한을 초과하면, 지정된 작업이 수행됩니다. 여기서 원하는 동작을 지정할 수 있습니다.

```
log_rotation_action
├─Delete ("제한이 더 이상 초과되지 않을 때까지, 가장 오래된 로그 파일을 삭제하십시오.")
└─Archive ("제한이 더 이상 초과되지 않을 때까지, 가장 오래된 로그 파일을 보관 한 다음 삭제하십시오.")
```

##### "timezone" `[string]`
- 사용할 시간대를 지정합니다 (예 : Africa/Cairo, America/New_York, Asia/Tokyo, Australia/Perth, Europe/Berlin, Pacific/Guam, 등등). PHP가 자동으로 처리하도록하려면, "SYSTEM"을 지정하십시오.

```
timezone
├─SYSTEM ("시스템 기본 시간대를 사용하십시오.")
├─UTC ("UTC")
└─…다른
```

##### "time_offset" `[int]`
- 시간대 오프셋 (분).

##### "time_format" `[string]`
- phpMussel에서 사용되는 날짜 형식. 추가 옵션이 요청에 따라 추가 될 수 있습니다.

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
└─…다른
```

__*자리 표시자 – 설명 – 예시는 2024-04-30T18:27:49+08:00를 기준으로 합니다.*__<br />
`{yyyy}` – 연도 – 예 : 2024.<br />
`{yy}` – 약식 연도 – 예 : 24.<br />
`{Mon}` – 해당 월의 약칭(영문) – 예 : Apr.<br />
`{mm}` – 앞에 0이 붙는 달 – 예 : 04.<br />
`{m}` – 달 – 예 : 4.<br />
`{Day}` – 요일의 약칭(영문) – 예 : Tue.<br />
`{dd}` – 앞에 0이 붙은 해당 월의 일 – 예 : 30.<br />
`{d}` – 해당 월의 일 – 예 : 30.<br />
`{hh}` – 앞에 0이 붙은 시간(24시간제 사용) – 예 : 18.<br />
`{h}` – 시간(24시간제 사용) – 예 : 18.<br />
`{ii}` – 앞에 0이 붙는 분 – 예 : 27.<br />
`{i}` – 분 – 예 : 27.<br />
`{ss}` – 앞에 0이 붙은 초 – 예 : 49.<br />
`{s}` – 초 – 예 : 49.<br />
`{tz}` – 시간대(콜론 제외) – 예 : +0800.<br />
`{t:z}` – 시간대(콜론 포함) – 예 : +08:00.

##### "ipaddr" `[string]`
- 연결 요청의 IP 주소를 어디에서 찾을 것인가에 대해 (Cloudflare 같은 서비스에 대해 유효). Default (기본 설정) = REMOTE_ADDR. 주의 : 당신이 무엇을하고 있는지 모르는 한이를 변경하지 마십시오.

```
ipaddr
├─HTTP_INCAP_CLIENT_IP ("HTTP_INCAP_CLIENT_IP (Incapsula)")
├─HTTP_CF_CONNECTING_IP ("HTTP_CF_CONNECTING_IP (Cloudflare)")
├─CF-Connecting-IP ("CF-Connecting-IP (Cloudflare)")
├─HTTP_X_FORWARDED_FOR ("HTTP_X_FORWARDED_FOR (Cloudbric)")
├─X-Forwarded-For ("X-Forwarded-For (Squid)")
├─Forwarded ("Forwarded")
├─REMOTE_ADDR ("REMOTE_ADDR (기본값)")
└─…다른
```

또한보십시오 :
- [NGINX Reverse Proxy](https://docs.nginx.com/nginx/admin-guide/web-server/reverse-proxy/)
- [Squid configuration directive forwarded_for](http://www.squid-cache.org/Doc/config/forwarded_for/)
- [Forwarded - HTTP \| MDN](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Forwarded)

##### "delete_on_sight" `[bool]`
- 이 지시문을 사용하면 감지 기준 (서명이든 뭐든)에 있던 업로드 파일은 즉시 삭제됩니다. 클린 판단 된 파일은 그대로입니다. 아카이브의 경우, 문제의 파일이 일부라도 아카이브 모든이 삭제 대상이됩니다. 업로드 파일 검사에서는 본 지시어를 활성화 할 필요는 없습니다. 왜냐하면 PHP는 스크립트 실행 후 자동으로 캐시의 내용을 파기하기 때문입니다. 즉, 파일이 이동되거나 복사되거나 삭제되지 않는 한, PHP는 서버에 업로드 한 파일을 남겨 두는 것은 보통 없습니다. 이 지시어는 보안에 공을들이는 목적으로 설치되어 있습니다. PHP는 드물게 예상치 못한 행동을 할 수 있기 때문입니다. False = 스캔 후 파일은 그대로 (기본 설정). True = 스캔 후 깨끗해야 즉시 삭제합니다.

##### "lang" `[string]`
- phpMussel의 기본 언어를 설정합니다.

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
├─fr ("Français")
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
├─zh-CN ("中文（简体）")
└─zh-TW ("中文（傳統）")
```

##### "lang_override" `[bool]`
- 가능할 때마다 HTTP_ACCEPT_LANGUAGE에 따라 현지화 하시겠습니까? True = 예 (Default / 기본값); False = 아니오.

##### "scan_cache_expiry" `[int]`
- phpMussel는 스캐닝 결과를 얼마 동안 캐시해야합니까? 초이며, 기본값은 21,600 초 (6 시간)로되어 있습니다. 0으로 설정하면 캐시 비활성화됩니다.

##### "maintenance_mode" `[bool]`
- 유지 관리 모드를 사용 하시겠습니까? True = 예; False = 아니오 (Default / 기본 설정). 프런트 엔드 이외의 모든 것을 비활성화합니다. CMS, 프레임 워크 등을 업데이트 할 때 유용합니다.

##### "statistics" `[bool]`
- phpMussel 사용 통계를 추적합니까? True = 예; False = 아니오 (Default / 기본 설정).

##### "hide_version" `[bool]`
- 로그 및 페이지 출력에서 버전 정보 숨기기? True = 예; False = 아니오 (Default / 기본 설정).

##### "disabled_channels" `[string]`
- 이것은 phpMussel이 요청을 보낼 때 특정 채널을 사용하지 못하게하는 데 사용할 수 있습니다.

```
disabled_channels
├─GitHub ("GitHub")
├─BitBucket ("BitBucket")
├─VirusTotal_HTTPS ("VirusTotal (HTTPS)")
└─VirusTotal_HTTP ("VirusTotal (HTTP)")
```

##### "default_timeout" `[int]`
- 외부 요청에 사용할 기본 제한 시간? Default (기본 설정) = 12 초.

#### "signatures" (카테고리)
서명, 서명 파일, 등의 설정.

##### "active" `[string]`
- 쉼표로 구분 된 활성 시그니처 파일의 목록입니다. 노트 : 활성화하기 전에, 첫째로, 서명 파일을 설치해야 합니다. 테스트 파일이 올바르게 작동하려면, 서명 파일을 설치하고 활성화해야 합니다.

##### "fail_silently" `[bool]`
- 서명 파일이 없거나 손상된 경우 phpMussel 그것을 리포트 해야하는지 여부? `fail_silently`이 유효하지 않으면 문제가 리포트되어 유효하면 문제는 무시 된 스캔 보고서가 작성됩니다. 충돌하는 같은 피해가 없으면 기본 설정을 그대로 유지한다. False = Disabled/장애인; True = Enabled/유효 (Default / 기본 설정).

##### "fail_extensions_silently" `[bool]`
- 확장자가없는 경우 phpMussel이 그것을보고해야하는지 여부? `fail_extensions_silently`이 잘못된 경우 확장자없이는 스캐닝시에보고되고 활성화되면 무시됩니다 문제는보고되지 않습니다. 이 지시어를 무효로하는 것은 보안을 향상시킬 수 있지만, 오진도 증가 할 수 있습니다. False = Disabled/장애인; True = Enabled/유효 (Default / 기본 설정).

##### "detect_adware" `[bool]`
- phpMussel 애드웨어 탐지를 위해 서명을 분석해야하는지 여부? `false` = 아니오; True = 예 (Default / 기본 설정).

##### "detect_joke_hoax" `[bool]`
- phpMussel 장난 / 위조 및 악성 코드 / 바이러스 탐지를 위해 서명을 분석해야하는지 여부? `false` = 아니오; True = 예 (Default / 기본 설정).

##### "detect_pua_pup" `[bool]`
- phpMussel는 PUAs/PUPs 탐지를 위해 서명을 분석해야하는지 여부? `false` = 아니오; True = 예 (Default / 기본 설정).

##### "detect_packer_packed" `[bool]`
- phpMussel는 패커와 팩 데이터 검출을 위해 서명을 분석해야하는지 여부? `false` = 아니오; True = 예 (Default / 기본 설정).

##### "detect_shell" `[bool]`
- phpMussel는 shell 스크립트 탐지를 위해 서명을 분석해야하는지 여부? `false` = 아니오; True = 예 (Default / 기본 설정).

##### "detect_deface" `[bool]`
- phpMussel를 위조 및 디훼사 탐지를 위해 서명을 분석해야하는지 여부? `false` = 아니오; True = 예 (Default / 기본 설정).

##### "detect_encryption" `[bool]`
- phpMussel이 암호화 된 파일을 탐지하고 차단해야합니까? `false` = 아니오; True = 예 (Default / 기본 설정).

##### "heuristic_threshold" `[int]`
- phpMussel이 파일은 의심 위험성이 높다고 판단하는 서명이 있습니다. 임계 값은 업로드 된 파일의 위험의 최대 값이며이를 초과하면 악성 코드로 판단됩니다. 여기에서 위험의 정의는 의심과 특정되었지만 수입니다. 기본적으로 3으로 설정되어 있습니다. 이보다 낮은 오진의 가능성이 증가하고, 너무 크면 오류 검출은 감소하지만 위험성이있는 파일이 검색되지 않을 수 증가하게됩니다. 특히 문제가 없으면 기본 설정을 유지하는 것이 좋습니다.

#### "files" (카테고리)
스캔 시 파일을 처리하는 방법에 대한 세부 사항.

##### "filesize_limit" `[string]`
- 파일 크기 제한의 단위는 KB입니다. 65536 = 64MB (Default / 기본 설정); 0 = 제한하지 않습니다 (제한없이 항상 그레이리스트 화) 양수이면 무엇이든 상관 없습니다. PHP 설정에서 메모리에 제한이 있고, 업로드 파일 크기 제한이 설정되어있는 경우에 효과적입니다.

##### "filesize_response" `[bool]`
- 최대 크기보다 큰 파일을 처리하는 방법에 관한 것입니다. False = Whitelist/화이트리스트; True = Blacklist/블랙리스트 (Default / 기본 설정).

##### "filetype_whitelist" `[string]`
- 파일 유형 화이트리스트 :

__작동 원리.__ 시스템이 특정 유형의 파일 만 업로드를 허용하거나 거절하는 경우 파일 유형을 적절히 화이트리스트, 블랙리스트, 그레이리스트로 분류 해두면 파일 유형에 튀겨 진 파일은 스캔을 건너 뛸 수 때문에 속도로 연결됩니다. 형식은 CSV (쉼표로 구분)입니다.

__프로세스의 논리적 순서.__ 파일 형식이 화이트리스트에 포함되어 있으면, 스캔하지 않고 블록하지 않고 블랙리스트 및 그레이리스트에 체크를하지 않습니다. 파일 형식이 블랙리스트에 있으면 스캔하지 않고 즉시 차단하고 그레이리스트에 체크를하지 않습니다. 회색 목록이 비어 또는 그레이리스트가 하늘이 아닌 한편 그 파일 타입이 있으면 정상적으로 스캔 차단 여부를 판단합니다. 그레이리스트가 하늘이 아닌 한편 그 파일 유형이 포함되어 있지 않으면 블랙리스트와 같은 취급을 할 수 있고 스캔없이 차단합니다.

##### "filetype_blacklist" `[string]`
- 파일 유형 블랙리스트 :

__작동 원리.__ 시스템이 특정 유형의 파일 만 업로드를 허용하거나 거절하는 경우 파일 유형을 적절히 화이트리스트, 블랙리스트, 그레이리스트로 분류 해두면 파일 유형에 튀겨 진 파일은 스캔을 건너 뛸 수 때문에 속도로 연결됩니다. 형식은 CSV (쉼표로 구분)입니다.

__프로세스의 논리적 순서.__ 파일 형식이 화이트리스트에 포함되어 있으면, 스캔하지 않고 블록하지 않고 블랙리스트 및 그레이리스트에 체크를하지 않습니다. 파일 형식이 블랙리스트에 있으면 스캔하지 않고 즉시 차단하고 그레이리스트에 체크를하지 않습니다. 회색 목록이 비어 또는 그레이리스트가 하늘이 아닌 한편 그 파일 타입이 있으면 정상적으로 스캔 차단 여부를 판단합니다. 그레이리스트가 하늘이 아닌 한편 그 파일 유형이 포함되어 있지 않으면 블랙리스트와 같은 취급을 할 수 있고 스캔없이 차단합니다.

##### "filetype_greylist" `[string]`
- 파일 유형 그레이리스트 :

__작동 원리.__ 시스템이 특정 유형의 파일 만 업로드를 허용하거나 거절하는 경우 파일 유형을 적절히 화이트리스트, 블랙리스트, 그레이리스트로 분류 해두면 파일 유형에 튀겨 진 파일은 스캔을 건너 뛸 수 때문에 속도로 연결됩니다. 형식은 CSV (쉼표로 구분)입니다.

__프로세스의 논리적 순서.__ 파일 형식이 화이트리스트에 포함되어 있으면, 스캔하지 않고 블록하지 않고 블랙리스트 및 그레이리스트에 체크를하지 않습니다. 파일 형식이 블랙리스트에 있으면 스캔하지 않고 즉시 차단하고 그레이리스트에 체크를하지 않습니다. 회색 목록이 비어 또는 그레이리스트가 하늘이 아닌 한편 그 파일 타입이 있으면 정상적으로 스캔 차단 여부를 판단합니다. 그레이리스트가 하늘이 아닌 한편 그 파일 유형이 포함되어 있지 않으면 블랙리스트와 같은 취급을 할 수 있고 스캔없이 차단합니다.

##### "check_archives" `[bool]`
- 아카이브의 컨텐츠에 대해 체크를 시도 여부에 대해서입니다. False = 체크하지 않는다; True = 확인 (Default / 기본 설정). Zip (libzip이 필요합니다), Tar, Rar (rar 확장이 필요합니다)이 지원됩니다.

##### "filesize_archives" `[bool]`
- 파일 크기 블랙리스트/화이트리스트 화를 아카이브의 컨텐츠에 반입 여부? `false` = 아니오 (단지 그레이리스트 모두); True = 예 (Default / 기본 설정).

##### "filetype_archives" `[bool]`
- 파일 타입 블랙리스트/화이트리스트 화를 아카이브의 컨텐츠에 반입 여부? `false` = 아니오 (단지 그레이리스트 모두) (Default / 기본 설정); True = 예.

##### "max_recursion" `[int]`
- 아카이브에 대한 최대 재귀 깊이입니다. 기본 설정 = 3.

##### "block_encrypted_archives" `[bool]`
- 암호화 된 아카이브를 감지하고 차단 여부? phpMussel은 암호화 된 아카이브를 검색 할 수 없기 때문에 아카이브의 암호화를 통해 phpMussel 안티 바이러스 스캐너 등을 かいくぐろ하려는 공격자가 있을지도 모릅니다. 암호화 된 아카이브를 차단함으로써 이러한 위험을 방지 할 수 있습니다. False = 아니오; True = 예 (Default / 기본 설정).

##### "max_files_in_archives" `[int]`
- 검사를 중단하기 전에 보관소에서 검사 할 최대 파일 수입니다. 기본 설정 = 0 (최대 값 없음).

##### "chameleon_from_php" `[bool]`
- 파일도 아니고 PHP 아카이브도 인식 할 수없는 파일에서 PHP 헤더를 찾습니다. False = 해제; True = 온.

##### "can_contain_php_file_extensions" `[string]`
- 쉼표로 구분 된 PHP 코드를 포함 할 수있는 파일 확장명 목록. PHP 카멜레온 공격 탐지가 활성화 된 경우이 목록에없는 확장자를 가진 PHP 코드가 포함 된 파일은 PHP 카멜레온 공격으로 탐지됩니다.

##### "chameleon_from_exe" `[bool]`
- 실행 파일없이 실행 파일의 아카이브도 인식 할 수없는 파일의 실행 헤더 및 악성 헤더의 실행 파일을 찾습니다. False = 해제; True = 온.

##### "chameleon_to_archive" `[bool]`
- 아카이브 및 압축 파일에서 잘못된 헤더를 탐지합니다 (BZ/BZIP2, GZ/GZIP, LZF, RAR, ZIP이 지원됩니다). False = 해제; True = 온.

##### "chameleon_to_doc" `[bool]`
- 헤더가 잘못 오피스 문서를 찾습니다 (DOC, DOT, PPS, PPT, XLA XLS, WIZ이 지원됩니다). False = 해제; True = 온.

##### "chameleon_to_img" `[bool]`
- 헤더가 잘못된 이미지 파일을 찾습니다 (BMP, DIB, PNG, GIF, JPEG, JPG, XCF, PSD, PDD, WEBP이 지원됩니다). False = 해제; True = 온.

##### "chameleon_to_pdf" `[bool]`
- 헤더가 잘못 PDF 파일을 찾습니다. False = 해제; True = 온.

##### "archive_file_extensions" `[string]`
- 인식 가능한 아카이브 파일 확장입니다 (CSV 형식; 문제가있을 경우에만 추가 또는 제거해야합니다. 실수로 제거하면 오진의 원인이 될 수 있습니다. 반대로 실수로 추가하면 어택 자 스페시 픽 검출에서 추가 된 화이트리스트 화되어 버립니다. 충분히주의 위 변경하십시오. 또한 컨텐트 수준에서 아카이브를 분석 할 수 있는지 여부에는 영향을주지 않습니다). 기본적으로 가장 일반적 형식을 나열하고 있지만 의도적으로 포괄적으로하지 않습니다.

##### "block_control_characters" `[bool]`
- 제어 문자를 포함한 파일을 차단 여부 (줄 바꿈을 제외한)? 만약 텍스트를 업로드하는 경우,이 옵션을 사용하여 추가 보호를 강화할 수 있습니다. 텍스트 이외도 업로드 할 경우, 사용하면 오진의 원인이 될 수 있습니다. False = 차단하지 (Default / 기본 설정); True = 차단합니다.

##### "corrupted_exe" `[bool]`
- 손상된 파일과 오류 분석. False = 무시; True = 차단 (Default / 기본 설정). 손상의 가능성이있는 PE 파일을 차단 검출 여부? 관한 것입니다. PE 파일의 일부가 손상되어 제대로 분석 할 수없는 것은 드물지 않고, 바이러스 감염을 보는 바로미터가됩니다. PE 파일의 바이러스를 감지하는 안티 바이러스 프로그램은 PE 파일 분석을 실시 합니다만, 바이러스를 만드는 사람이 바이러스가 검출되지 않도록 그것을 피하려고 할 것이기 때문입니다.

##### "decode_threshold" `[string]`
- 디코드 명령이 감지 될 원시 데이터의 길이 제한 (스캐닝 중에 눈에 띄는 문제가있는 경우에는 필요에 따라 설정). 기본값 = 512KB. 제로 또는 값 없음 (null)은 임계 값을 비활성화합니다 (파일 크기의 제한을 제거합니다).

##### "scannable_threshold" `[string]`
- phpMussel이 읽고 스캔 할 수있는 원시 데이터의 길이에 대한 임계 값 (스캐닝 중에 눈에 띄는 문제가있는 경우에는 필요에 따라 설정). 기본값 = 32MB. 제로 또는 값 없음 (null)은 임계 값을 비활성화합니다. 값은 서버 나 웹 사이트에 업로드되는 파일의 평균 파일 크기보다 크고 filesize_limit 지시어보다 작게 설정해야합니다. 또한 "php.ini" 설정에 따라 PHP에 할당 된 메모리의 대략 5 분의 1을 초과해서는 없습니다. 이 지시문은 phpMussel가 메모리를 너무 많이 사용하지 않도록하기위한 것입니다. (일정 크기 이상의 파일은 스캔하지 못할 수도 있습니다).

##### "allow_leading_trailing_dots" `[bool]`
- 파일 이름에 선행 및 후행 점을 허용 하시겠습니까? 이것은 때때로 파일을 숨기거나 디렉토리 트래버 설을 허용하도록 일부 시스템을 속이는 데 사용될 수 있습니다. False = 허용되지 않습니다 (Default / 기본 설정). True = 허용된다.

##### "block_macros" `[bool]`
- 매크로가 포함 된 파일을 차단하려고합니까? 일부 유형의 문서 및 스프레드 시트에는 실행 매크로가 포함될 수 있으므로 위험 할 수있는 맬웨어 벡터를 제공합니다. False = 차단하지 (Default / 기본 설정); True = 차단합니다.

##### "only_allow_images" `[bool]`
- True로 설정하면, 스캐너가 발견한 이미지가 아닌 파일은 스캔하지 않고 즉시 신고됩니다. 이는 때에 따라 스캔을 완료하는 데 필요한 시간을 줄이는 데 도움이 될 수 있습니다. 기본 설정에 따라 false로 설정되어 있습니다.

#### "quarantine" (카테고리)
검역 설정.

##### "quarantine_key" `[string]`
- phpMussel은, 필요하다면, 차단된 파일 업로드를 격리 할 수 있습니다. 일반적인 phpMussel 사용자는 웹 사이트 및 호스팅 환경 보호가 있으면 충분하다고 생각하고 플래그가있는 같은 것이 추가 분석을 가하려까지 요청이없는 것이므로 무효로 될 수 있습니다. 그렇지만 상세하게 분석하여 악성 코드에 대비하려는 사용자는 사용하면 좋습니다. 플래그 첨부 파일 업로드 격리 가양 디버깅에 도움이 될 수 있습니다. 격리 기능을 해제하려면`quarantine_key` 지시문을 비워 두거나 비어 있지 않은 경우 지시문의 내용을 삭제하십시오. 활성화하려면 데이레쿠티부에 어떤 값을 넣어주세요. `quarantine_key` 격리 기능의 중요한 보안 요소이며, 검역 기능에 저장된 데이터의 집행을 각종 공격으로부터 지키고 있습니다. `quarantine_key`는 암호처럼 생각하세요. 긴 것이 더 안전 할 수 있습니다. 가장 효과적인 사용법은`delete_on_sight`과 함께합니다.

##### "quarantine_max_filesize" `[string]`
- 격리 된 파일 크기 제한. 이 값보다 큰 파일은 격리되지 않습니다. 쿠오란팅의 용량을 초과 비정상적으로 큰 파일 크기 공격에서 메모리가 낭비되는 것을 방지하는 의미에서 중요합니다. 기본값은 2MB입니다.

##### "quarantine_max_usage" `[string]`
- 검역을 위해 사용할 최대 메모리 량. 전체 메모리 양이 사용되면이 범위에 맞게 오래된 파일이 삭제 대상이됩니다. 쿠오란팅의 용량을 초과 비정상적으로 큰 파일 크기 공격에서 메모리가 낭비되는 것을 방지하는 의미에서 중요합니다. 기본 설정은 64MB입니다.

##### "quarantine_max_files" `[int]`
- 격리에 존재할 수있는 최대 파일 수입니다. 격리 저장소에 새 파일이 추가되면이 수가 초과되면 나머지 파일이 더 이상이 수를 초과하지 않을 때까지 오래된 파일이 삭제됩니다. 기본 설정은 100입니다.

#### "virustotal" (카테고리)
Virus Total 통합 설정.

##### "vt_public_api_key" `[string]`
- 옵션이지만, phpMussel은 Virus Total API를 사용하여 파일을 검색 할 수 있습니다. 바이러스, 트로이 목마, 악성 코드 및 기타 공격에 매우 효과적으로 작동합니다. 기본적으로 Virus Total API를 사용한 스캐닝은 비활성화되어 있습니다. 활성화하려면 Virus Total의 API 키가 필요합니다. 이점이 매우 크기 때문에 사용하는 것이 좋습니다. Virus Total API의 사용에 있어서는 Virus Total 문서에있는대로 이용 규정 및 지침을 준수하지 않으면 안됩니다. 이 통합 기능을 사용하기 위해서는 : Virus Total와 API의 서비스 규정을 읽고 동의해야합니다. 최소 Virus Total Public API 문서의 전문을 읽고 이해하여 (VirusTotalPublic API v2.0 이후 Contents "콘텐츠"이전까지).

또한보십시오 :
- [Terms of Service](https://www.virustotal.com/en/about/terms-of-service/)
- [Getting started](https://developers.virustotal.com/reference)

##### "vt_suspicion_level" `[int]`
- 기본 설정은 phpMussel이 Virus Total API를 사용하여 스캔 파일 (疑がわし 주물)에 제한이 있습니다. `vt_suspicion_level` 지시문을 편집 할 더, 이 제한을 변경할 수 있습니다.

```
vt_suspicion_level
├─0 (휴리스틱 가중치가 있는 파일만 검사합니다.): 휴리스틱 가중치가 발생하는 경우에만 파일이
│ 검색됩니다. 감염을 암시하지만 감염을 보장하지는 않는
│ 지문을 포착하기 위한 서명에서 휴리스틱 가중치가
│ 발생할 수 있습니다. 의심을 정당화하지만 확실성을
│ 제공하지 않는 결과의 경우 검색을 통해 두 번째 의견을
│ 제공할 수 있습니다.
├─1 (휴리스틱 가중치가 있는 파일, 실행 파일, 및 잠재적으로 실행 가능 데이터가 포함된 파일을 검사합니다.): 실행 파일 및 잠재적으로 실행 데이터를 포함하는 파일의
│ 예로는 Windows PE 파일, Linux ELF 파일, Mach-O 파일, DOCX 파일,
│ ZIP 파일, 등이 있습니다.
└─2 (모든 파일을 스캔합니다.)
```

##### "vt_weighting" `[int]`
- phpMussel이 Virus Total API를 사용한 스캐닝 결과를 감지으로 대우하거나, 검색 가중치로 취급 할 것인가? 여러 엔진 (Virus Total처럼)을 사용한 스캐닝은 검색 속도 향상 (더 많은 악성 코드가 감지)을 가져다 한편 오진의 증가도 발생하므로이 지시어가 존재합니다. 따라서 스캐닝 결과는 결정적인 판단이 아니라 신뢰 점수로 사용하는 것이 적절한 경우도 있습니다. 값이 0이면 Virus Total API를 사용한 검색은 검색으로 처리되어 Virus Total 엔진이 악성 코드 및 플래그가 지정된 파일은 phpMussel도 악성 코드로 판단합니다. 다른 값의 경우 결과는 검출 가중되고, 스캔 된 파일이 악성 코드 여부 phpMussel가 결정하는 신뢰 점수 (또는 감지 가중치)입니다 (값은 악성이라고 판단하기위한 최소 신뢰 점수 또는 가중치). 기본값은 0입니다.

##### "vt_quota_rate" `[int]`
- Virus Total API 문서에 따르면 "1 분간의 타임 프레임 사이에 요청 최대 4 회" 의 제한이 있습니다. 허니 클라이언트와 허니팟 등의 자동화를 사용하여 리포트를받을뿐만 아니라 VirusTotal 자원을 제공하는 경우, 상한은 올라갑니다. phpMussel 기본적으로 최대 4 번을 준수하고 있습니다 만, 위의 상황에서이 두 디렉토리를 준비하고 상황에 맞게 변경할 수 있도록되어 있습니다. 한계에 도달 버리는 등의 불편이나 문제가 없으면 기본값을 변경하는 것은 권장되지 않지만 값을 작게하는 것이 적절한 경우도 있습니다. 상한은 시간 프레임`vt_quota_time` (분 내에) `vt_quota_rate`로 설정합니다.

##### "vt_quota_time" `[int]`
- (위의 설명 참조).

#### "urlscanner" (카테고리)
URL 스캐너 설정.

##### "google_api_key" `[string]`
- 필요한 API 키가 정의되면, API는 Google Safe Browsing API 조회가 활성화됩니다.

또한보십시오 :
- [Google API Console](https://console.developers.google.com/)

##### "maximum_api_lookups" `[int]`
- 스캔 반복의 API 조회의 최대 수입니다. API 조회 때마다 스캔 반복의 시간이 쌓여 버리므로, 스캔 처리 속도 향상을 위해 제한을두고 싶다고 생각할지도 모릅니다. 0은 제한 없음을 의미합니다. 기본값은 10입니다.

##### "maximum_api_lookups_response" `[bool]`
- API 조회 횟수 제한을 초과했을 때의 대응입니다. False = 아무것도 / 처리를 계속한다 (Default / 기본 설정); True = 파일에 플래그를 지정 / 차단한다.

##### "cache_time" `[int]`
- API 조회의 결과를 얼마나 캐시할지 (초 단위)? 기본값은 3600 초 (한 시간).

#### "legal" (카테고리)
법적 요구 사항 설정.

##### "pseudonymise_ip_addresses" `[bool]`
- 로그 파일을 쓸 때 가명으로 하다 IP 주소? True = 예 (Default / 기본 설정); False = 아니오.

##### "privacy_policy" `[string]`
- 생성 된 페이지의 꼬리말에 표시 할 관련 개인 정보 정책 방침의 주소입니다. URL 지정, 또는 사용하지 않으려면 비워 두십시오.

#### "supplementary_cache_options" (카테고리)
보충 캐시 옵션. 참고 : 이 값을 변경하면 잠재적으로 로그아웃될 수 있습니다.

##### "prefix" `[string]`
- 여기에 지정된 값은 모든 캐시 항목 키 앞에 추가됩니다. Default (기본값) = "phpMussel_". 동일한 서버에 여러 설치가 있는 경우, 캐시를 서로 분리하여 유지하는 데 유용할 수 있습니다.

##### "enable_apcu" `[bool]`
- 캐싱에 APCu를 사용할지 여부를 지정합니다. Default (기본값) = True.

##### "enable_memcached" `[bool]`
- 캐싱에 Memcached를 사용할지 여부를 지정합니다. Default (기본값) = False.

##### "enable_redis" `[bool]`
- 캐싱에 Redis를 사용할지 여부를 지정합니다. Default (기본값) = False.

##### "enable_pdo" `[bool]`
- 캐싱에 PDO를 사용할지 여부를 지정합니다. Default (기본값) = False.

##### "memcached_host" `[string]`
- Memcached 호스트 값. Default (기본값) = "localhost".

##### "memcached_port" `[int]`
- Memcached 포트 값. Default (기본값) = "11211".

##### "redis_host" `[string]`
- Redis 호스트 값. Default (기본값) = "localhost".

##### "redis_port" `[int]`
- Redis 포트 값. Default (기본값) = "6379".

##### "redis_timeout" `[float]`
- Redis 시간 초과 값. Default (기본값) = "2.5".

##### "redis_database_number" `[int]`
- Redis 데이터베이스 번호입니다. Default (기본값) = 0. 참고 : Redis 클러스터에서는 0 이외의 값을 사용할 수 없습니다.

##### "pdo_dsn" `[string]`
- PDO DSN 값. Default (기본값) = "mysql:dbname=phpmussel;host=localhost;port=3306".

__자주하는 질문.__ *<a href="https://github.com/phpMussel/Docs/blob/master/readme.ko.md#user-content-HOW_TO_USE_PDO" hreflang="ko-KR">"PDO DSN"은 무엇입니까? phpMussel과 함께 PDO를 사용하려면 어떻게해야합니까?</a>*

##### "pdo_username" `[string]`
- PDO 사용자 이름.

##### "pdo_password" `[string]`
- PDO 암호.

#### "frontend" (카테고리)
프론트 엔드 설정.

##### "frontend_log" `[string]`
- 프론트 엔드 로그인 시도를 기록하는 파일. 파일 이름을 지정하십시오. 비활성화하려면 비워 둡니다.

유용한 팁 : 시간 형식 자리 표시자를 사용하여 로그 파일 이름에 날짜/시간 정보를 첨부할 수 있습니다. 사용 가능한 시간 형식 자리 표시자는 {{Links.ConfigRef.time_format}}에 표시됩니다.

##### "max_login_attempts" `[int]`
- 로그인 시도 최대 횟수입니다 (프론트 엔드). Default / 기본 설정 = 5.

##### "numbers" `[string]`
- 어떻게 숫자를 표시하는 것을 선호합니까? 가장 정확한 것으로 보이는 예제를 선택하십시오.

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

##### "default_algo" `[string]`
- 향후 모든 암호와 세션에 사용할 알고리즘을 정의합니다.

```
default_algo
├─PASSWORD_DEFAULT ("PASSWORD_DEFAULT")
├─PASSWORD_BCRYPT ("PASSWORD_BCRYPT")
├─PASSWORD_ARGON2I ("PASSWORD_ARGON2I")
└─PASSWORD_ARGON2ID ("PASSWORD_ARGON2ID (PHP >= 7.3.0)")
```

##### "theme" `[string]`
- phpMussel 프론트 엔드에 사용할 미학.

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
└─…다른
```

##### "magnification" `[float]`
- 글꼴 배율. Default (기본 설정) = 1.

##### "custom_header" `[string]`
- 모든 프런트 엔드 페이지의 맨 처음에 HTML로 삽입됩니다. 웹사이트 로고, 개인화된 헤더, 스크립트, 등에 유용합니다.

##### "custom_footer" `[string]`
- 모든 프런트 엔드 페이지의 맨 아래에 HTML로 삽입됩니다. 법적 고지, 연락처 링크, 비즈니스 정보, 등에 유용합니다.

#### "web" (카테고리)
업로드 핸들러 설정.

##### "uploads_log" `[string]`
- 차단된 모든 업로드를 기록해야 하는 위치. 파일 이름을 지정하십시오. 비활성화하려면 비워 둡니다.

유용한 팁 : 시간 형식 자리 표시자를 사용하여 로그 파일 이름에 날짜/시간 정보를 첨부할 수 있습니다. 사용 가능한 시간 형식 자리 표시자는 {{Links.ConfigRef.time_format}}에 표시됩니다.

##### "forbid_on_block" `[bool]`
- 업로드 파일이 차단 된 메시지와 함께 phpMussel에서 403 헤더를 보내야하거나 일반 200 좋은지에 대해. False = 아니오 (200); True = 예 (403) [Default / 기본 설정].

##### "unsupported_media_type_header" `[bool]`
- 블랙리스트 파일 형식으로 인해 업로드가 차단되면 phpMussel이 415 헤더를 보내야 합니까? True이면이 설정이 `forbid_on_block`를 대체합니다. False = 아니오 [Default / 기본 설정]; True = 예.

##### "max_uploads" `[int]`
- 한 번에 스캔 할 수있는 업로드 파일 수 제한으로이를 초과하면 스캔을 중단하고 사용자에게 그 사실을 알리고 논리적 공격으로부터 보호 역할을합니다. 시스템과 CMS가 DDoS 공격을 만나 phpMussel가 오버로드하여 PHP 프로세스에 지장을 초래하는 일이 없도록하기 위해서입니다. 권장 수는 10이지만, 하드웨어의 속도에 따라 더 이상 / 이하이 좋은 것도있을 것입니다. 이 숫자는 아카이브의 내용을 포함하지 않는 것을 기억하십시오.

##### "ignore_upload_errors" `[bool]`
- 시스템에서 phpMussel의 기능에 수정이 필요한 경우가 아니면이 지시문은 일반적으로 사용할 수 없습니다. 비활성화하면 `$_FILES` array()요소를 감지했을 때, 그 요소가 나타내는 파일의 스캔이 시작됩니다, 요소가 비어 있거나없는 경우 phpMussel는 오류 메시지를 반환합니다. 이것은 본래 phpMussel가 있어야 할 모습입니다. 그러나 CMS에서는 $_FILES 하늘 요소는 일반적으로 발생하는 것이며, 정상적인 phpMussel의 행동이 정상적인 CMS의 거동을 저해 할 우려가 있습니다. 이러한 경우에는 본 옵션을 사용하여 phpMussel 빈 요소를 검사하고 오류 메시지를 반환을 피하고 요청한 페이지로 원활하게 진행할 수 있도록합니다. False = OFF (해제입니다); True = ON (온입니다).

##### "theme" `[string]`
- "업로드 거부"페이지에 사용할 미학.

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
└─…다른
```

##### "magnification" `[float]`
- 글꼴 배율. Default (기본 설정) = 1.

##### "custom_header" `[string]`
- 모든 "업로드 거부" 페이지의 맨 처음에 HTML로 삽입됩니다. 웹사이트 로고, 개인화된 헤더, 스크립트, 등에 유용합니다.

##### "custom_footer" `[string]`
- 모든 "업로드 거부" 페이지 맨 아래에 HTML로 삽입됩니다. 법적 고지, 연락처 링크, 비즈니스 정보, 등에 유용합니다.

#### "phpmailer" (카테고리)
PHPMailer 설정 (이중 인증 및 이메일 알림에 사용됩니다).

##### "event_log" `[string]`
- PHPMailer와 관련된 모든 이벤트를 기록하는 파일입니다. 파일 이름을 지정하십시오. 비활성화하려면 비워 둡니다.

유용한 팁 : 시간 형식 자리 표시자를 사용하여 로그 파일 이름에 날짜/시간 정보를 첨부할 수 있습니다. 사용 가능한 시간 형식 자리 표시자는 {{Links.ConfigRef.time_format}}에 표시됩니다.

##### "enable_two_factor" `[bool]`
- 이 지시문은 프런트 엔드 계정에 2FA를 사용할지 여부를 결정합니다.

##### "enable_notifications" `[string]`
- 업로드가 차단될 때 이메일로 알림을 받으려면, 여기에서 수신자 이메일 주소를 지정하십시오.

##### "skip_auth_process" `[bool]`
- `true` 일 때, PHPMailer는 전자 메일 전송을위한 SMTP 인증 프로세스를 건너 뛰도록 지시합니다. 이 프로세스를 건너 뛰면 아웃 바운드 전자 메일이 MITM 공격에 노출 될 수 있으므로 피해야합니다. 특정 경우에 필요할 수 있음 (예 : PHPMailer가 SMTP 서버에 제대로 연결할 수없는 경우).

##### "host" `[string]`
- 아웃 바운드 전자 메일에 사용할 SMTP 호스트입니다.

##### "port" `[int]`
- 아웃 바운드 이메일에 사용할 포트 번호입니다. Default (기본 설정) = 587.

##### "smtp_secure" `[string]`
- SMTP를 통해 이메일을 보낼 때 사용할 프로토콜 (TLS 또는 SSL).

```
smtp_secure
├─default ("-")
├─tls ("TLS")
└─ssl ("SSL")
```

##### "smtp_auth" `[bool]`
- 이 지시문은 SMTP 세션을 인증할지 여부를 결정합니다 (보통 이것을 무시해야합니다).

##### "username" `[string]`
- SMTP를 통해 이메일을 보낼 때 사용할 사용자 이름입니다.

##### "password" `[string]`
- SMTP를 통해 이메일을 보낼 때 사용할 비밀번호입니다.

##### "set_from_address" `[string]`
- SMTP를 통해 전자 메일을 보낼 때 인용 할 보낸 사람 주소입니다.

##### "set_from_name" `[string]`
- SMTP를 통해 전자 메일을 보낼 때 인용 할 보낸 사람 이름입니다.

##### "add_reply_to_address" `[string]`
- SMTP를 통해 전자 메일을 보낼 때 인용 할 회신 주소입니다.

##### "add_reply_to_name" `[string]`
- SMTP를 통해 이메일을 보낼 때 인용 할 회신 이름입니다.

---


### 6. <a name="SECTION6"></a>서명 형식

*참조 :*
- *["서명"이란 무엇입니까?](#user-content-WHAT_IS_A_SIGNATURE)*

phpMussel 서명 파일의 첫 번째 9 바이트 `[x0-x8]` 는`phpMussel`이며, "매직 넘버" (magic number)로 기능합니다 (그들을 서명 파일로 식별하기 위해). 서명 파일이 아닌 파일을 잘못 사용하는 것을 방지 할 수 있습니다. 다음 바이트는 `[x9]` 서명 파일의 유형을 식별합니다. 서명 파일을 올바르게 해석 할 수 있도록하기 위해 이것을 알고 있어야합니다. 다음 유형의 서명 파일이 인식됩니다.

유형 | 바이트 | 설명
---|---|---
`General_Command_Detections` | `0?` | CSV (쉼표로 구분 된 값)의 서명 파일. 서명은 16 진수로 인코딩 된 문자열입니다. 여기 서명에는 이름 및 기타 세부 사항은 없습니다 (검색 문자열 만).
`Filename` | `1?` | 파일 이름의 서명.
`Hash` | `2?` | 해시 서명.
`Standard` | `3?` | 파일 내용에서 직접 운영하는 서명 파일.
`Standard_RegEx` | `4?` | 파일 내용에서 직접 운영하는 서명 파일. 서명에 정규 표현식을 포함 할 수 있습니다.
`Normalised` | `5?` | ANSI 표준화 된 파일 내용에서 작동하는 서명 파일.
`Normalised_RegEx` | `6?` | ANSI 표준화 된 파일 내용에서 작동하는 서명 파일. 서명에 정규 표현식을 포함 할 수 있습니다.
`HTML` | `7?` | HTML 표준화 된 파일 내용에서 작동하는 서명 파일.
`HTML_RegEx` | `8?` | HTML 표준화 된 파일 내용에서 작동하는 서명 파일. 서명에 정규 표현식을 포함 할 수 있습니다.
`PE_Extended` | `9?` | PE 메타 데이터에서 작동하는 서명 파일 (PE 섹션 메타 데이터는 사용할 수 없습니다).
`PE_Sectional` | `A?` | PE 섹션 메타 데이터에서 작동하는 서명 파일.
`Complex_Extended` | `B?` | phpMussel 의해 생성 된 확장 메타 데이터를 기반으로 다양한 규칙에서 동작하는 서명 파일.
`URL_Scanner` | `C?` | URL에서 작동하는 서명 파일.

다음 바이트는 `[x10]` 개행이며 `[0A]`, phpMussel 서명 파일의 헤더를 끝냅니다.

이후 각 비어 있지 않은 행은 서명 또는 규칙입니다. 각 서명 또는 규칙은 한 줄을 차지합니다. 지원되는 서명 형식은 다음과 같습니다.

#### *파일 이름 서명*
파일 이름 서명의 형식은 예외없이 다음과 같이됩니다.

`NAME:FNRX`

NAME은 그 서명을 가리키는 이름으로 FNRX은 파일 이름 (인코딩되지 않은)에 일치하는 정규식 패턴입니다.

#### *해시 서명*
해시 서명의 형식은 예외없이 다음과 같이됩니다.

`HASH:FILESIZE:NAME`

HASH는 모든 파일의 해시 (보통 MD5), FILESIZE 파일의 전체 크기, NAME은 그 서명을 가리키는 이름입니다.

#### *PE 섹션 셔널 서명*
PE 섹션 셔널 서명의 형식은 예외없이 다음과 같이됩니다.

`SIZE:HASH:NAME`

HASH는 PE 파일이있는 부분의 MD5 해시, SIZE는 그 부분의 전체 크기, NAME은 서명을 가리키는 이름입니다.

#### *PE 확장 서명*
PE 확장 서명의 형식은 예외없이 다음과 같이됩니다.

`$VAR:HASH:SIZE:NAME`

$VAR는 일치하는 PE 변수의 이름, HASH은 그 변수의 MD5 해시 크기는 변수의 전체 크기, NAME은 그 서명을 가리키는 이름입니다.

#### *복합 확장 서명*
복합 확장 서명은 다른 시그니처와는 조금 달리 무엇에 적합한 지 그것이 자신의 서명에 의해 결정 기준은 하나가 아닙니다. 적합 기준은 ";"은 적합 타입 적합 데이터는 ":"에 따릅니다. 따라서 형식은 $variable1 : 어떤 데이터; $variable2 : SOMEDATA; 어떤 데이터 수 있습니다.

`$variable1:SOMEDATA;$variable2:SOMEDATA;SignatureName`

#### *기타*
기타 서명 형식입니다.

`NAME:HEX:FROM:TO`

NAME은 그 서명을 가리키는 이름, HEX는 주어진 서명에 의해 적합을 보는 파일의 16 진수로 인코딩 된 세그먼트입니다. FROM과 TO는 옵션 매개 변수 데이터 소스 어디서부터 어디까지 확인 여부를 나타냅니다 (메일 기능은 지원하지 않습니다).

#### *정규 표현식*
PHP는 정규 표현식 판단 처리하는 형식이면 phpMussel과 서명에 의해 확실히 처리됩니다. 그러나 만약을 위해 서명을 기초로하는 정규 표현식을 새로 만들려면 세심한주의를 기울이십시오. 절대적인 자신이없는 상황에서는 생각도 못한 오류가 발생 될 수 있습니다. 정규식 구문이 준비되어 문맥을 완전히 이해하지 않는다면 phpMussel 코드를 보라. 패턴은 모든 (파일 이름 아카이브 메타 데이터의 MD5 패턴 제외) 16 진수로 인코딩되어야한다는 점에주의 (위의 패턴 구문도)입니다!

---


### 7. <a name="SECTION7"></a>알려진 호환성 문제

#### 안티 바이러스 소프트웨어와의 호환성

phpMussel과 일부 안티바이러스 공급 업체 간의 호환성 문제는 과거에 가끔 발생하는 것으로 알려져 있습니다. 따라서 대략 몇 개월마다, 내가 Virus Total과 비교하여 최신 버전의 phpMussel 코드 베이스를 확인합니다, 문제가보고되는지 확인하기 위해. 문제가보고 된 경우 보고 된 문제는 여기 문서에 나열되어 있습니다.

가장 최근에 확인했을 때 (2022년 5월 12일) 아무런 문제 가보고되지 않았습니다.

나는 서명 파일, 설명서 또는 기타 주변 장치 내용을 확인하지 않습니다. 시그너처 파일은 다른 안티 바이러스 솔루션이 탐지 할 때 항상 오 탐지를 유발합니다. 따라서 다른 안티 바이러스 솔루션이 이미 존재하는 머신에 phpMussel을 설치하려는 경우, phpMussel 서명 파일을 허용 목록에 추가하는 것이 좋습니다.

*참조 : [호환성 차트](https://maikuolan.github.io/Compatibility-Charts/).*

---


### 8. <a name="SECTION8"></a>자주 묻는 질문 (FAQ)

- ["서명"이란 무엇입니까?](#user-content-WHAT_IS_A_SIGNATURE)
- ["거짓 양성"는 무엇입니까?](#user-content-WHAT_IS_A_FALSE_POSITIVE)
- [서명은 얼마나 자주 업데이트됩니까?](#user-content-SIGNATURE_UPDATE_FREQUENCY)
- [phpMussel을 사용하는 데 문제가 발생했지만 무엇을 해야할지 모르겠어요! 도와주세요!](#user-content-ENCOUNTERED_PROBLEM_WHAT_TO_DO)
- [7.2.0보다 오래된 PHP 버전에서 phpMussel v3을 사용하고 싶습니다; 도울 수 있니?](#user-content-MINIMUM_PHP_VERSION_V3)
- [단일 phpMussel 설치를 사용하여 여러 도메인을 보호 할 수 있습니까?](#user-content-PROTECT_MULTIPLE_DOMAINS)
- [나는 이것을 설치하거나 그것이 내 웹 사이트상에서 동작하는 것을 보장하는 시간을 보내고, 하고 싶지 않아; 그것을 할 수 있습니까? 나는 당신을 고용 할 수 있습니까?](#user-content-PAY_YOU_TO_DO_IT)
- [당신 또는 이 프로젝트의 모든 개발자는 고용 가능합니까?](#user-content-HIRE_FOR_PRIVATE_WORK)
- [나는 전문가의 변경 및 사용자 맞춤형 등이 필요합니다; 도울 수 있니?](#user-content-SPECIALIST_MODIFICATIONS)
- [나는 개발자, 웹 사이트 디자이너, 또는 프로그래머입니다. 이 프로젝트 관련 작업을 할 수 있습니까?](#user-content-ACCEPT_OR_OFFER_WORK)
- [나는 프로젝트에 공헌하고 싶다; 이것은 수 있습니까?](#user-content-WANT_TO_CONTRIBUTE)
- [파일을 검사할 때 파일에 대한 특정 세부 정보에 액세스하는 방법은 무엇인가요?](#user-content-SCAN_DEBUGGING)
- [블랙리스트 – 화이트리스트 – 그레이리스트 – 그들은 무엇이며 어떻게 사용합니까?](#user-content-BLACK_WHITE_GREY)
- ["PDO DSN"은 무엇입니까? phpMussel과 함께 PDO를 사용하려면 어떻게해야합니까?](#user-content-HOW_TO_USE_PDO)
- [내 업로드 기능이 비동기입니다 (예를 들어, ajax, ajaj, json 등을 사용합니다). 업로드가 차단되면 특별한 메시지 나 경고가 표시되지 않습니다. 무슨 일이야?](#user-content-AJAX_AJAJ_JSON)
- [phpMussel이 EICAR를 감지 할 수 있습니까?](#user-content-DETECT_EICAR)

#### <a name="WHAT_IS_A_SIGNATURE"></a>"서명"이란 무엇입니까?

phpMussel의 맥락에서, "서명" 이라 함은 우리가 찾고있는 것을 식별하는 데이터를 의미합니다 (바이러스, 트로이 목마, 등). 이 데이터는 일반적으로 파일의 체크섬 해시 또는 기타 유사한 식별 표시합니다. 일반적으로 라벨이나 추가 컨텍스트를 제공하기위한 기타 데이터가 포함되어 있습니다.

#### <a name="WHAT_IS_A_FALSE_POSITIVE"></a>"거짓 양성"는 무엇입니까?

일반화 된 상황에서 쉽게 설명 조건의 상태를 테스트 할 때 결과를 참조 할 목적으로 용어 "거짓 양성"의 (*또는 : 위양성의 오류, 허위 보도;* 영어 : *false positive*; *false positive error*; *false alarm*) 의미는 결과는 "양성"의 것, 그러나 결과는 실수 (즉, 진실의 조건은 "양성/진실"로 간주됩니다, 그러나 정말 "음성/거짓"입니다). "거짓 양성"는 "우는 늑대"와 유사하다고 생각할 수 있습니다 (그 상태는 군 근처에 늑대가 있는지 여부이다, 진실 조건은 "거짓/음성"입니다 무리의 가까이에 늑대가 없기 때문입니다하지만 조건은 "진실/양성"로보고됩니다 목자가 "늑대! 늑대!"를 외쳤다 때문입니다) 또는 의료 검사와 유사 환자가 잘못 진단 된 경우.

몇 가지 관련 용어는 "진실 양성", "진실 음성"와 "거짓 음성"입니다. 이러한 용어가 나타내는 의미 : "진실 양성"의 의미는 테스트 결과와 진실 조건이 진실입니다 (즉, "양성"입니다). "진실 음성"의 의미는 테스트 결과와 진실 조건이 거짓 (즉, "음성"입니다). "진실 양성"과 "진실 음성"는 "올바른 추론"로 간주됩니다. "거짓 양성"의 반대는 "거짓 음성"입니다. "거짓 음성"의 의미는 테스트 결과가 거짓입니다 (즉, "음성"입니다) 하지만 진실의 조건이 정말 진실입니다 (즉, "양성"입니다); 두 테스트 결과와 진실 인 조건이 "진실/양성" 해야한다 것입니다.

phpMussel의 맥락에서 이러한 용어는 phpMussel 서명과 그들이 차단 된 파일을 말합니다. phpMussel가 실수로 파일을 차단하면 (예를 들어, 부정확 한 서명, 구식의 서명 등에 의한), 우리는이 이벤트 "틀린 확실성"을 호출합니다. phpMussel이 파일을 차단할 수없는 경우 (예를 들어, 예상치 못한 위협 서명 누락 등으로 인한), 우리는이 이벤트 "부재 감지"를 호출합니다 ("위음성"의 아날로그입니다).

이것은 다음 표에 요약 할 수 있습니다.

&nbsp; | phpMussel은 파일을 차단 필요가 없습니다 | phpMussel은 파일을 차단해야합니다
---|---|---
phpMussel은 파일을 차단하지 않습니다 | 진정한 네거티브 (올바른 추론) | 부재 검출 (그것은 "위음성"와 같습니다)
phpMussel은 파일을 차단합니다 | __위양성__ | 진정한 양성 (올바른 추론)

#### <a name="SIGNATURE_UPDATE_FREQUENCY"></a>서명은 얼마나 자주 업데이트됩니까?

업 데이트 빈도는 서명 파일에 따라 다릅니다. phpMussel 서명 파일의 모든 메인테이너가 자주 업 데이트를 시도하지만, 우리의 여러분에게는 그 밖에도 다양한 노력이있어, 우리는 프로젝트 외부에서 생활하고 있으며, 아무도 재정적으로 보상되지 않는, 따라서 정확한 업 데이트 일정은 보장되지 않습니다. 일반적으로 충분한 시간이 있으면 서명이 업 데이트됩니다. 당신이 뭔가를 제공 할 수 있다면, 원조는 항상 높게 평가됩니다.

#### <a name="ENCOUNTERED_PROBLEM_WHAT_TO_DO"></a>phpMussel을 사용하는 데 문제가 발생했지만 무엇을 해야할지 모르겠어요! 도와주세요!

- 당신은 최신 소프트웨어 버전을 사용하고 있습니까? 당신은 최신 서명 파일 버전을 사용하고 있습니까? 그렇지 않은 경우, 먼저 업 데이트하십시오. 문제가 해결되지 여부를 확인하십시오. 그것이 계속되면 읽어보십시오.
- 당신은 문서를 확인 했습니까? 만약 그렇지 않으면, 그렇지하십시오. 문서를 사용하여 문제를 해결할 수없는 경우, 계속 읽어보십시오.
- **[이슈 페이지를](https://github.com/phpMussel/phpMussel/issues)** 확인 했습니까? 문제가 이전에 언급되어 있는지 확인하십시오. 제안, 아이디어, 솔루션이 제공되었는지 여부를 확인하십시오.
- 문제가 해결되지 않으면 알려 주시기 바랍니다. 이슈 페이지에서 토론을 창조한다.

#### <a name="MINIMUM_PHP_VERSION_V3"></a>7.2.0보다 오래된 PHP 버전에서 phpMussel v3을 사용하고 싶습니다; 도울 수 있니?

아니오. PHP >= 7.2.0은 phpMussel v3의 최소 요구 사항입니다.

*참조 : [호환성 차트](https://maikuolan.github.io/Compatibility-Charts/).*

#### <a name="PROTECT_MULTIPLE_DOMAINS"></a>단일 phpMussel 설치를 사용하여 여러 도메인을 보호 할 수 있습니까?

예.

#### <a name="PAY_YOU_TO_DO_IT"></a>나는 이것을 설치하거나 그것이 내 웹 사이트상에서 동작하는 것을 보장하는 시간을 보내고, 하고 싶지 않아; 그것을 할 수 있습니까? 나는 당신을 고용 할 수 있습니까?

아마. 이는 사례별로 검토되고 있습니다. 당신의 요구로 제공할 수 있는 것을 가르쳐주세요. 우리가 도울 수 있는지를 가르쳐주고 있습니다.

#### <a name="HIRE_FOR_PRIVATE_WORK"></a>당신 또는 이 프로젝트의 모든 개발자는 고용 가능합니까?

*위를 참조하십시오.*

#### <a name="SPECIALIST_MODIFICATIONS"></a>나는 전문가의 변경 및 사용자 맞춤형 등이 필요합니다; 도울 수 있니?

*위를 참조하십시오.*

#### <a name="ACCEPT_OR_OFFER_WORK"></a>나는 개발자, 웹 사이트 디자이너, 또는 프로그래머입니다. 이 프로젝트 관련 작업을 할 수 있습니까?

예. 우리의 라이센스는이를 금지하지 않습니다.

#### <a name="WANT_TO_CONTRIBUTE"></a>나는 프로젝트에 공헌하고 싶다; 이것은 수 있습니까?

예. 프로젝트에 기여 환영합니다. 자세한 내용은 "CONTRIBUTING.md"를 참조하십시오.

#### <a name="SCAN_DEBUGGING"></a>파일을 검사할 때 파일에 대한 특정 세부 정보에 액세스하는 방법은 무엇인가요?

이것은 phpMussel 그들을 검사하도록 지시하기 전 에이 목적을 위해 사용하는 배열을 할당하여 수행할 수 있습니다.

다음 예제에서는이 목적을 위해 `$Foo` 가 할당되어 있습니다. `/파일/경로/...` 를 스캔 한 후 `/파일/경로/...` 파일에 대한 정보는 `$Foo` 에 있습니다.

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);

$Scanner->setScanDebugArray($Foo);

$Results = $Scanner->scan('/파일/경로/...');

var_dump($Foo);
```

배열은 다차원입니다. 요소는 검사되는 각 파일을 나타냅니다. 하위 요소는 이러한 파일의 내용을 나타냅니다. 하위 요소는 다음과 같습니다.

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

*† - 캐시 된 결과는 제공되지 않습니다 (새로운 검색 결과 만 제공됩니다).*

*‡ - PE 파일을 스캔하는 경우에만 제공됩니다.*

필요한 경우, 이 배열은 다음을 사용하여 삭제합니다.

```PHP
$Scanner->destroyScanDebugArray($Foo);
```

#### <a name="BLACK_WHITE_GREY"></a>블랙리스트 – 화이트리스트 – 그레이리스트 – 그들은 무엇이며 어떻게 사용합니까?

용어는 다른 맥락에서 다른 의미를 전달합니다. phpMussel에는, 이러한 용어가 사용되는 세 가지 상황이 있습니다 : 파일 크기 응답, 파일 형식 응답, 및 서명 그레이리스트.

최소한의 처리 비용으로 원하는 결과를 얻으려면, phpMussel이 파일을 실제로 스캔하기 전에 확인할 수있는 간단한 방법이 몇 가지 있습니다 (예를 들어, 파일의 크기, 이름, 및 확장자). 예를 들어; 파일이 너무 큰 경우 또는 확장자가 우리의 웹 사이트에 허용하지 않으려는 파일 유형을 나타내는 경우, 즉시 파일에 플래그를 세울 수 있으며, 스캔 할 필요가 없습니다.

파일 크기 응답 파일이 지정된 제한을 초과하면 phpMussel가 응답하는 방법입니다. 실제 목록은 포함되지 않지만, 파일은 그 크기에 따라 효과적으로 블랙리스트에있는 화이트리스트에있는 또는 그레이리스트에 있다고 생각합니다. 한계와 원하는 응답을 각각 지정하는 두 개의 별개의 구성 지시문이 있습니다.

파일 유형의 응답은 phpMussel 파일 확장명에 응답하는 방법입니다. 어떤 확장자가 어떤 목록에 있어야하는지 명시 적으로 지정하는 세 가지 별개의 구성 지시문이 있습니다. 확장자가 지정된 확장자와 각각 일치하면 파일이 효과적으로 나열된 것으로 간주 될 수 있습니다.

이 두 컨텍스트는 화이트리스트에있는 스캔 또는 플래그 지정해서는 없다는 것을 의미합니다, 블랙리스트에있는 플래그 지정해야합니다 것을 의미합니다 (따라서 스캔해야 아니다) 그리고, 그레이리스트에있는 플래그를 세울 필요가 있는지 여부를 판단하기 위해 추가 분석이 필요합니다 것을 의미합니다 (따라서 스캔해야합니다).

서명 그레이리스트는 본질적으로 무시해서는 시그니처 목록입니다 (이 내용은 위의 문서에서 쉽게 설명하고 있습니다). 서명은 회색 목록에 서명이 트리거되면 phpMussel 내가 일을 계속 회색 목록에 서명 관하여 특별한 조치를 취하지 않습니다. 무언의 동작은 트리거 된 서명의 정상적인 작동이기 때문에 시그니처 블랙리스트가 없습니다. 이러한 맥락에서 필요하지 않기 때문에 서명 화이트리스트가 없습니다.

서명 파일 전체를 비활성화하거나 제거하지 않고 특정 서명에 의해 발생한 문제를 해결해야하는 경우 서명 그레이리스트가 도움이됩니다.

#### <a name="HOW_TO_USE_PDO"></a>"PDO DSN"은 무엇입니까? phpMussel과 함께 PDO를 사용하려면 어떻게해야합니까?

"PDO"는 "[PHP Data Objects](https://www.php.net/manual/en/intro.pdo.php)"의 약어입니다 (PHP 데이터 객체). PHP가 다양한 PHP 응용 프로그램에서 일반적으로 사용하는 일부 데이터베이스 시스템에 연결할 수 있도록 인터페이스를 제공합니다.

"DSN"은 "[data source name](https://en.wikipedia.org/wiki/Data_source_name)"의 약어입니다 (데이터 소스 이름). "PDO DSN"은 PDO가 데이터베이스에 연결하는 방법을 설명합니다.

phpMussel은 캐싱 목적으로 PDO 을 활용할 수 있는 옵션을 제공합니. 이 기능이 제대로 작동하려면, phpMussel을 적절히 구성하고 (따라서 PDO를 사용하도록 설정), 사용할 phpMussel 용 데이터베이스를 새로 작성하고 (phpMussel 용 데이터베이스를 아직 염두에 두지 않은 경우), 그런 아래 설명된 구조에 따라 데이터베이스에 새 테이블을 작성하십시오.

데이터베이스 연결이 성공한 경우, 그러나 필요한 테이블이 존재하지 않습니다, 자동 생성이 시도됩니다. 그러나 이 동작은 광범위하게 테스트 되지 않았으며 성공을 보장할 수 없습니다.

물론 이것은 실제로 phpMussel이 PDO 을 사용하도록 하려는 경우에만 적용됩니다. 플랫 파일 캐싱 (기본 구성에 따라) 또는 제공된 다양한 캐싱 옵션을 사용하기에 충분하다면, 데이터베이스, 테이블 등을 설정하는 데 어려움을 겪을 필요가 없습니다.

아래 설명된 구조는 "phpmussel"을 데이터베이스 이름으로 사용하지만, DSN 구성에 동일한 이름이 복제되는 한 데이터베이스에 원하는 이름을 사용할 수 있습니다.

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

phpMussel의 `pdo_dsn` 설정 지시어는 아래와 같이 설정해야합니다.

```
사용되는 데이터베이스 드라이버에 따라...
├─4d (경고 : 실험적, 테스트 되지 않은, 권장하지 않음!)
│ │
│ │         ╔═══════╗
│ └─4D:host=localhost;charset=UTF-8
│           ╚╤══════╝
│            └데이터베이스를 찾기 위해 연결할 호스트입니다.
├─cubrid
│ │
│ │             ╔═══════╗      ╔═══╗        ╔═════╗
│ └─cubrid:host=localhost;port=33000;dbname=example
│               ╚╤══════╝      ╚╤══╝        ╚╤════╝
│                │              │            └사용할 데이터베이스의 이름입니다.
│                │              │
│                │              └호스트에 연결할 포트 번호입니다.
│                │
│                └데이터베이스를 찾기 위해 연결할 호스트입니다.
├─dblib
│ │
│ │ ╔═══╗      ╔═══════╗        ╔═════╗
│ └─dblib:host=localhost;dbname=example
│   ╚╤══╝      ╚╤══════╝        ╚╤════╝
│    │          │                └사용할 데이터베이스의 이름입니다.
│    │          │
│    │          └데이터베이스를 찾기 위해 연결할 호스트입니다.
│    │
│    └가능한 값 : "mssql", "sybase", "dblib".
├─firebird
│ │
│ │                 ╔═══════════════════╗
│ └─firebird:dbname=/path/to/database.fdb
│                   ╚╤══════════════════╝
│                    ├로컬 데이터베이스 파일의 경로일 수 있습니다.
│                    │
│                    ├호스트 및 포트 번호와 연결할 수 있습니다.
│                    │
│                    └이것을 사용하려면 Firebird 설명서를 참조하십시오.
├─ibm
│ │
│ │         ╔═════╗
│ └─ibm:DSN=example
│           ╚╤════╝
│            └연결할 카탈로그 된 데이터베이스입니다.
├─informix
│ │
│ │              ╔═════╗
│ └─informix:DSN=example
│                ╚╤════╝
│                 └연결할 카탈로그 된 데이터베이스입니다.
├─mysql (가장 추천!)
│ │
│ │              ╔═════╗      ╔═══════╗      ╔══╗
│ └─mysql:dbname=example;host=localhost;port=3306
│                ╚╤════╝      ╚╤══════╝      ╚╤═╝
│                 │            │              └호스트에 연결할 포트 번호입니다.
│                 │            │
│                 │            └데이터베이스를 찾기 위해 연결할 호스트입니다.
│                 │
│                 └사용할 데이터베이스의 이름입니다.
├─oci
│ │
│ │            ╔═════╗
│ └─oci:dbname=example
│              ╚╤════╝
│               ├카탈로그 된 특정 데이터베이스를 참조 할 수 있습니다.
│               │
│               ├호스트 및 포트 번호와 연결할 수 있습니다.
│               │
│               └이것을 사용하려면 Oracle 설명서를 참조하십시오.
├─odbc
│ │
│ │      ╔═════╗
│ └─odbc:example
│        ╚╤════╝
│         ├카탈로그 된 특정 데이터베이스를 참조 할 수 있습니다.
│         │
│         ├호스트 및 포트 번호와 연결할 수 있습니다.
│         │
│         └이것을 사용하려면 ODBC/DB2 설명서를 참조하십시오.
├─pgsql
│ │
│ │            ╔═══════╗      ╔══╗        ╔═════╗
│ └─pgsql:host=localhost;port=5432;dbname=example
│              ╚╤══════╝      ╚╤═╝        ╚╤════╝
│               │              │           └사용할 데이터베이스의 이름입니다.
│               │              │
│               │              └호스트에 연결할 포트 번호입니다.
│               │
│               └데이터베이스를 찾기 위해 연결할 호스트입니다.
├─sqlite
│ │
│ │        ╔════════╗
│ └─sqlite:example.db
│          ╚╤═══════╝
│           └사용할 로컬 데이터베이스 파일의 경로입니다.
└─sqlsrv
  │
  │               ╔═══════╗ ╔══╗          ╔═════╗
  └─sqlsrv:Server=localhost,1521;Database=example
                  ╚╤══════╝ ╚╤═╝          ╚╤════╝
                   │         │             └사용할 데이터베이스의 이름입니다.
                   │         │
                   │         └호스트에 연결할 포트 번호입니다.
                   │
                   └데이터베이스를 찾기 위해 연결할 호스트입니다.
```

DSN의 특정 부분에 무엇을 사용해야할지 확실하지 않은 경우, 아무것도 변경하지 않고 그대로 작동하는지 먼저 확인하십시오.

`pdo_username` 및 `pdo_password` 는 데이터베이스에 대해 선택한 사용자 이름 및 비밀번호와 같아야합니다.

#### <a name="AJAX_AJAJ_JSON"></a>내 업로드 기능이 비동기입니다 (예를 들어, ajax, ajaj, json 등을 사용합니다). 업로드가 차단되면 특별한 메시지 나 경고가 표시되지 않습니다. 무슨 일이야?

이것은 정상입니다. phpMussel의 표준 "업로드 거부"페이지는 HTML로 제공됩니다. 일반적인 동기 요청에는 충분하지만, 업로드 기능이 다른 것을 기대하는 경우 충분하지 않을 수 있습니다. 업로드 기능이 비동기식이거나 업로드 상태가 비동기식으로 제공될 것으로 예상되는 경우, phpMussel이 업로드 기능의 요구를 충족시키기 위해 시도 할 수있는 몇 가지가 있습니다.

1. HTML 이외의 것을 제공하기 위해 사용자 정의 출력 템플 리트 작성.
2. 표준 "업로드 거부"페이지를 완전히 무시하고 업로드가 차단될 때 업로드 핸들러가 다른 작업을 수행하도록 사용자 정의 플러그인 작성 (이 목적을 위해 업 로더 핸들러가 제공하는 플러그인 훅이 있습니다).
3. 업로드 핸들러를 완전히 비활성화하고 대신 업로드 기능 내에서 phpMussel API를 호출하십시오.

#### <a name="DETECT_EICAR"></a>phpMussel이 EICAR를 감지 할 수 있습니까?

예. EICAR 감지를 위한 서명은 "phpMussel 표준 정규식 서명 파일"에 (`phpmussel_regex.db`) 포함되어 있습니다. 서명 파일이 설치 및 활성화되어있는 한, phpMussel은 EICAR을 감지할 수 있어야 합니다. ClamAV 데이터베이스에는 특히 EICAR 감지를 위한 수많은 서명이 포함되어 있음으로 ClamAV는 EICAR을 쉽게 감지 할 수 있습니다, 그러나 phpMussel은 ClamAV에서 제공하는 전체 서명의 일부만 사용하므로 phpMussel에서 EICAR을 감지하는 데 그 자체로는 충분하지 않을 수 있습니다. 이를 감지하는 기능은 정확한 구성에 따라 달라질 수 있습니다.

---


### 9. <a name="SECTION9"></a>법률 정보

#### 9.0 섹션 프리앰블

이 절은 패키지의 사용 및 구현에 관한 가능한 법적 고려 사항을 설명하고 기본 관련 정보를 제공하기위한 것입니다. 이 정보는 자국에서있을 수있는 법적 요구 사항 때문에 일부 사용자에게 중요 할 수 있습니다. 일부 사용자는이 정보에 따라 웹 사이트 정책을 조정해야 할 수도 있습니다.

무엇보다, 나는 (패키지 저자)가 변호사 또는 자격을 갖춘 법률 전문가가 아님을 알아 주시기 바랍니다. 따라서, 나는 법률 자문을 제공 할 자격이 없다. 또한 법률 요건은 국가 및 관할 구역마다 다를 수 있습니다. 이러한 다양한 법적 요구 사항도 때로는 충돌 할 수 있습니다 (예를 들면 : [개인 정보 보호 권리와](https://ko.wikipedia.org/wiki/%EC%A0%95%EB%B3%B4%ED%86%B5%EC%8B%A0%EB%A7%9D_%EC%9D%B4%EC%9A%A9%EC%B4%89%EC%A7%84_%EB%B0%8F_%EC%A0%95%EB%B3%B4%EB%B3%B4%ED%98%B8_%EB%93%B1%EC%97%90_%EA%B4%80%ED%95%9C_%EB%B2%95%EB%A5%A0#%EA%B0%9C%EC%9D%B8%EC%A0%95%EB%B3%B4%EC%9D%98_%EB%B3%B4%ED%98%B8) [잊혀진 권리를](https://namu.wiki/w/%EC%9E%8A%ED%9E%90%20%EA%B6%8C%EB%A6%AC) 선호하는 국가들, 확장 된 데이터 보존을 선호하는 국가들에 비해). 패키지에 대한 액세스가 특정 국가 또는 관할 지역에만 국한되지, 않으므로 패키지 사용자베이스가 지리적으로 다양 할 수 있습니다. 이 점을 고려해 볼 때, 나는 모든 사람에게 "법적으로 준수하는"것이 무엇을 의미 하는지를 말할 입장이 아닙니다. 그러나 여기에있는 정보가 패키지의 맥락에서 법적으로 준수하기 위해해야 할 일을 스스로 결정하는 데 도움이되기를 바랍니다. 의심의 여지가 있거나 법률적인 관점에서 추가 도움과 조언이 필요한 경우 자격을 갖춘 법률 전문가와상의하는 것이 좋습니다.

#### 9.1 책임

패키지 라이센스에 의해 이미 명시된 바와 같이, 패키지에는 어떠한 보증도 없습니다. 여기에는 모든 책임 범위가 포함되지만 이에 국한되지는 않습니다. 이 패키지는 편리함을 위해 제공되며, 유용 할 것으로 기대되며, 귀하에게 도움이 될 것입니다. 그러나, 당신이 패키지를 사용하든, 당신 자신의 선택입니다. 당신은 패키지를 사용하도록 강요 당하지 않지만, 그렇게 할 때, 당신은 그 결정에 대한 책임이 있습니다. 본인 및 기타 패키지 제공자는 귀하가 직접, 간접적으로, 암시 적으로, 또는 다른 방법으로 관계없이, 결정한 결과에 대해 법적 책임을지지 않습니다.

#### 9.2 제 3 자

정확한 구성과 구현에 따라, 패키지는 경우에 따라 제 3 자와 통신하고 정보를 공유 할 수 있습니다. 이 정보는 일부 관할 구역에 따라 일부 상황에서 "[개인 식별 정보](https://ko.wikipedia.org/wiki/%EA%B0%9C%EC%9D%B8%EC%A0%95%EB%B3%B4)"(PII)로 정의 될 수 있습니다.

이 정보가 이러한 제 3 자에 의해 어떻게 사용될 수 있는지는 제 3 자에 의해 설정된 다양한 정책의 적용을받습니다. 설명서는 이러한 요점을 다루지 않습니다. 그러나 이러한 모든 경우에 이러한 제 3 자와의 정보 공유를 비활성화 할 수 있습니다. 그러한 모든 경우, 이를 사용하기로 선택한 경우, 이러한 제 3 자의 개인 정보, 보안 및 PII 사용과 관련하여 우려 할 사항을 조사하는 것은 귀하의 책임입니다. 의심스러운 점이 있거나 PII와 관련하여 이러한 제 3 자의 행위에 만족하지 않는 경우, 이러한 제 3 자와의 모든 정보 공유를 비활성화하는 것이 가장 좋습니다.

투명성을 목적으로, 공유되는 정보의 유형은 아래에 설명되어 있습니다.

##### 9.2.1 URL 스캐너

파일 업로드 내에서 발견 된 URL은 패키지 구성 방식에 따라 Google 안전 브라우징 API와 공유 될 수 있습니다. Google 안전 브라우징 API는 제대로 작동하려면 API 키가 있어야하며 기본적으로 사용 중지됩니다.

*관련 설정 지시어 :*
- `urlscanner` -> `google_api_key`

##### 9.2.2 VIRUS TOTAL

phpMussel은 파일 업로드를 검색 할 때 Virus Total API와 파일 해시를 공유하도록 구성 할 수 있습니다. 앞으로 어떤 시점에서 전체 파일을 공유 할 계획이 있지만 아직 지원되지 않습니다. 이 기능을 사용하려면 API 키가 있어야합니다.

Virus Total과 공유되는 정보 (파일 및 관련 파일 메타 데이터 포함)는 연구 목적으로 파트너, 계열사, 및 기타 여러 사람들과 공유 할 수도 있습니다. 이에 대한 자세한 내용은 개인 정보 취급 방침을 참조하십시오.

*참조하십시오 : [Privacy Policy &ndash; VirusTotal](https://support.virustotal.com/hc/en-us/articles/115002168385-Privacy-Policy).*

*관련 설정 지시어 :*
- `virustotal` -> `vt_public_api_key`

#### 9.3 로깅

로깅은 여러 가지 이유로 phpMussel의 중요한 부분입니다. 로깅없이 phpMussel이 얼마나 효과적으로 수행하는지 확인하기 위해 가양 성을 진단하는 것이 어려울 수 있습니다. 그것의 부족을 확인하는 것은 어려울 수 있으며 의도 한대로 기능을 계속 수행하려면 구성이나 서명에 어떤 변경이 필요할 수 있습니다. 어쨌든 로깅은 일부 사용자가 원하지 않는 경우도 있으며 전체적으로 선택 사항입니다. phpMussel에서 로깅은 기본적으로 사용되지 않습니다. 이를 사용하려면 phpMussel을 적절히 구성해야합니다.

또한, 관할권 및 구현 컨텍스트에 따라 (예 : 당신이 개인으로서 또는 기업체로서 및 상업적 또는 비상업적 기반 여부 운영되고 있는지 여부), 로깅의 법적인 허용이 달라질 수 있습니다 (예 : 로깅의 할 수있는 정보의 유형, 기간 및 상황). 따라서, 이 섹션을주의 깊게 읽는 것이 유용 할 수 있습니다.

phpMussel이 수행 할 수있는 로깅에는 여러 유형이 있습니다. 서로 다른 유형의 로깅에는 여러 가지 다른 유형의 정보가 포함됩니다.

##### 9.3.0 스캔 로그

패키지 구성에서 활성화하면, phpMussel은 검사하는 파일의 로그를 보존합니다. 이 유형의 로깅은 다음과 같은 두 가지 형식으로 사용할 수 있습니다 :
- 사람이 읽을 수있는 로그 파일.
- 직렬화 된 로그 파일.

사람이 읽을 수있는 로그 파일 항목은 일반적으로 다음과 같습니다 (예로서) :

```
Sun, 19 Jul 2020 13:33:31 +0800 시작합니다.
→ "ascii_standard_testfile.txt"를 확인 중입니다.
─→ phpMussel-Testfile.ASCII.Standard을 발견했습니다 (ascii_standard_testfile.txt)!
Sun, 19 Jul 2020 13:33:31 +0800 완료.
```

검사 로그 항목에는 일반적으로 다음 정보가 포함됩니다 :
- 파일이 분석 된 날짜와 시간.
- 분석 된 파일의 이름.
- 파일에서 발견 된 내용 (무엇인가가 발견되면).

*관련 설정 지시어 :*
- `general` -> `scan_log`
- `general` -> `scan_log_serialized`

이러한 지시문을 비워두면이, 유형의 로깅은 비활성화 된 상태로 유지됩니다.

##### 9.3.1 업로드 로그

패키지 구성에서 활성화하면, phpMussel은 차단 된 업로드 로그를 보존합니다.

*예로서 :*

```
날짜 : Sun, 19 Jul 2020 13:33:31 +0800
IP 주소 : 127.0.0.x
== 스캔 결과 (신고 된 이유) ==
phpMussel-Testfile.ASCII.Standard을 발견했습니다 (ascii_standard_testfile.txt)!
== 해시 서명 재구성 ==
dcacac499064454218823fbabff7e09b5b011c0c877ee6f215f35bffb195b6e9:654:ascii_standard_testfile.txt
"1595142388-2e017ea9ac1478e45dc15794a1fc18c0.qfu"로 격리.
```

이러한 로그 항목에는 일반적으로 다음 정보가 포함됩니다 :
- 업로드가 차단 된 날짜와 시간.
- 업로드가 시작된 IP 주소입니다.
- 파일이 차단 된 이유 (발견 된 것).
- 차단 된 파일의 이름입니다.
- 체크섬 및 파일 크기가 차단되었습니다.
- 파일이 격리되었는지 여부 및 내부 이름 사용 여부.

*관련 설정 지시어 :*
- `web` -> `uploads_log`

##### 9.3.2 프론트 엔드 로깅

이 로깅은 프런트 엔드 로그인 시도와 관련이 있습니다. 사용자가 프런트 엔드에 로그인을 시도 할 때 및 프런트 엔드 액세스가 활성화 된 경우에만 발생합니다.

프런트 엔드 로그 항목에는 로그인을 시도하는 사용자의 IP 주소, 시도가 발생한 날짜와 시간 및 시도의 결과가 포함됩니다 (로그인 성공 또는 로그인 실패). 프론트 엔드 로그 항목은 일반적으로 다음과 같이 표시됩니다 (예로서) :

```
x.x.x.x - Day, dd Mon 20xx hh:ii:ss +0000 - "admin" - 로그인 했습니다.
```

*관련 설정 지시어 :*
- `general` -> `frontend_log`

##### 9.3.3 로그 회전

일정 기간 후에 로그를 제거하려고 할 수 있습니다, 또는 법에 따라 그렇게해야 할 수도 있습니다 (즉, 로그를 보관하는 것이 법적으로 허용되는 시간은 법률에 의해 제한 될 수 있습니다). 로그 파일의 이름에 날짜/시간 표시자를 (예를 들어, `{yyyy}-{mm}-{dd}.log`) 포함하고 (패키지 구성에 지정된대로) 로그 회전을 활성화하여이 작업을 수행 할 수 있습니다 (로그 회전을 사용하면 지정된 제한을 초과하면 로그 파일에 대해 몇 가지 작업을 수행 할 수 있습니다).

예 : 법적으로 30 일 후에 로그를 삭제해야한다면, 로그 파일 이름에 `{dd}.log`를 지정하고 (`{dd}`는 일 수를 나타냅니다), `log_rotation_limit` 값을 30으로 설정하고, `log_rotation_action` 값을 `Delete`로 설정할 수 있습니다.

또는, 오랜 시간 동안 로그를 유지해야하는 경우, 로그 회전을 비활성화하거나, 로그 파일을 압축하기 위해 `log_rotation_action` 값을 `Archive`로 설정하십시오 (이렇게하면 점유하는 디스크 공간의 총량이 줄어 듭니다).

*관련 설정 지시어 :*
- `general` -> `log_rotation_limit`
- `general` -> `log_rotation_action`

##### 9.3.4 로그 자르기

원하는 경우 특정 크기를 초과하면 개별 로그 파일을자를 수 있습니다.

*관련 설정 지시어 :*
- `general` -> `truncate`

##### 9.3.5 IP 주소 PSEUDONYMISATION

첫째, 용어에 익숙하지 않은 경우, "pseudonymisation"는 보충 정보없이 특정 "데이터 주체"로 식별 될 수없는 방식으로 개인 데이터를 처리하는 것을 의미합니다 (개인 정보를 자연인에게 확인할 수 없도록 추가 정보가 별도로 유지되고 기술적 및 조직적 조치를 조건으로 제공되어야합니다).

다음 자료는 추가 정보를 제공합니다.
- [[trust-hub.com] What is pseudonymisation?](https://www.trust-hub.com/news/what-is-pseudonymisation/)
- [[Wikipedia] Pseudonymization](https://en.wikipedia.org/wiki/Pseudonymization)

어떤 경우에는, 수집, 처리 또는 저장되는 "PII"에 대해 "anonymisation"또는 "pseudonymisation"을 구현할 법적 구속을받을 수 있습니다. 이 개념은 현재 상당 기간 존재 해 왔지만 GDPR/DSGVO는 "pseudonymisation"을 언급하고 장려합니다.

원하는 경우 phpMussel은 IP 주소를 기록 할 때이 작업을 수행 할 수 있습니다. 기록 될 때 IPv4 주소의 마지막 옥텟과 IPv6 주소의 두 번째 부분 이후의 모든 항목은 "x"로 표시됩니다. 이것은 본질적으로 IPv4 주소를 24 번째 서브넷 요소의 초기 주소로 반올림하고 IPv6 주소를 32 번째 서브넷 요소의 초기 주소로 반올림합니다.

*관련 설정 지시어 :*
- `legal` -> `pseudonymise_ip_addresses`

##### 9.3.6 통계

phpMussel은 선택적으로 특정 시간 이후로 검색 및 차단 된 총 파일 수와 같은 통계를 추적 할 수 있습니다. 이 기능은 기본적으로 비활성화되어 있지만 패키지 구성을 통해 활성화 할 수 있습니다. 추적되는 정보 유형은 PII로 간주되어서는 안됩니다.

*관련 설정 지시어 :*
- `general` -> `statistics`

##### 9.3.7 암호화

phpMussel은 캐시 또는 로그 정보를 [암호화](https://ko.wikipedia.org/wiki/%EC%95%94%ED%98%B8%ED%99%94)하지 않습니다. 캐시 및 로그 암호화는 향후 도입 될 수 있지만 현재 구체적인 계획은 없습니다. 승인되지 않은 제 3 자의 개인 식별 정보 (PII)에 대한 액세스 (예, 캐시 또는 로그) : 공개적으로 접근 가능한 위치에 phpMussel을 설치하지 않을 것을 권장합니다 (예, 대부분의 표준 웹 서버에서 사용할 수있는 표준 `public_html` 디렉토리 외부에 phpMussel 설치) 과 적절하게 제한적인 권한이 시행되는지 확인하십시오. 문제가 지속되면 phpMussel을 구성하여이 정보가 수집되거나 기록되지 않도록 할 수 있습니다 (예, 로깅 비활성화).

#### 9.4 COOKIE (쿠키)

사용자가 프론트 엔드에 성공적으로 로그인하면, phpMussel은 후속 요청에 대해 사용자를 기억할 수 있도록 [쿠키](https://ko.wikipedia.org/wiki/HTTP_%EC%BF%A0%ED%82%A4)를 설정합니다 (즉, 쿠키는 로그인 세션에 대해 사용자를 인증하는 데 사용됩니다). 로그인 페이지에서, 사용자는 관련 작업에 참여할 경우 쿠키가 설정된다는 사실을 눈에 띄게 경고합니다. 쿠키는 코드베이스의 다른 지점에서 설정되지 않습니다.

#### 9.5 마케팅과 광고

phpMussel은 마케팅이나 광고 목적으로 정보를 수집하거나 처리하지 않습니다. 수집되거나 기록 된 정보를 판매하거나 이익을 얻지 않습니다. phpMussel은 상업적 기업이 아니며 상업적 이익과 관련이 없으므로, 이러한 일을하는 것이 타당하지 않습니다. 이것은 프로젝트가 시작된 이래로 그랬다, 오늘날에도 계속해서 그러합니다. 또한, 이러한 일을하는 것은 프로젝트의 정신과 목적에 맞지 않습니다과, 내가 프로젝트를 계속 유지한다면, 결코 일어나지 않을 것이다.

#### 9.6 개인 정보 정책

경우에 따라 웹 사이트의 모든 페이지와 섹션에 개인 정보 취급 방침에 대한 링크를 명확하게 표시해야 할 수도 있습니다. 이는 개인 정보 보호 관행, 수집하는 개인 식별 정보 유형 및 개인 정보 사용 방법에 대해 사용자에게 알리는 데 중요 할 수 있습니다. 이러한 링크를 phpMussel의 "업로드 거부"페이지에 포함 시키려면 개인 정보 보호 정책에 대한 URL을 지정하는 구성 지시문이 제공됩니다.

*관련 설정 지시어 :*
- `legal` -> `privacy_policy`

#### 9.7 GDPR/DSGVO

일반 데이터 보호 규정 (GDPR)은 2018 년 5 월 25 일부터 효력을 발생하는 유럽 연합 (EU)의 규정입니다. 이 규정의 주요 목표는 EU 시민과 주민들에게 개인 정보를 통제하고 프라이버시 및 개인 정보와 관련하여 EU 내 규정을 통일하는 것입니다.

이 규정에는 유럽 연합 (EU)의 "데이터 주체"에 대한 "[개인 식별 정보](https://ko.wikipedia.org/wiki/%EA%B0%9C%EC%9D%B8%EC%A0%95%EB%B3%B4)"(PII) 처리와 관련된 특정 조항이 포함되어 있습니다 ("데이터 주체"는 식별 된 또는 식별 가능한 자연인을 의미합니다). 규정을 준수하려면 "기업"(규정에 정의 된대로) 및 관련 시스템 및 프로세스가 수행해야하는 몇 가지 사항이 있습니다 : 표준으로 "디자인에 의한 개인 정보 보호"구현; 최대한 높은 개인 정보 설정 사용; 저장된 정보 나 처리 된 정보에 대한 안전 장치 구현 (여기에는 다음이 포함됩니다 : 데이터의 pseudonymisation 또는 완전한 anonymisation 구현); 데이터 수집 유형, 처리 방법, 이유, 보유 기간 및 제 3 자와의 공유 여부를 모호하지 않게 선언하십시오; 제 3 자와 공유하는 데이터의 유형, 방법, 이유 등을 설명합니다.

규정에 정의 된대로 합법적 인 근거가없는 한 데이터를 처리 할 수 없습니다. 이것은 다음을 의미합니다 : 처리는 법적 의무를 준수하여 수행되어야합니다, 또는, 명백하고, 정보에 입각하고, 모호하지 않은 동의가 데이터 주체로부터 얻어진 후에 만 그것을 행한다.

규제의 일부 측면은 시간이 지남에 따라 변경 될 수 있습니다. 구식 정보의 확산을 피하기 위해, 관련 정보를 여기에 포함하는 대신 권위있는 출처에서 규제에 대해 배우는 것이 더 좋습니다 (여기에 포함 된 정보가 오래 될 수 있습니다).

추가 정보를 배우기 위해 권장되는 자료 :
- [유럽 개인정보 보호법 GDPR 안내](https://www.privacy.go.kr/gdpr)
- [유럽 개인정보보호법, GDPR을 알아보자 | HACKTAGON](https://hacktagon.github.io/chinnie/law/gdpr/privacy/GDPR_01)
- [REGULATION (EU) 2016/679 OF THE EUROPEAN PARLIAMENT AND OF THE COUNCIL](https://eur-lex.europa.eu/legal-content/EN/TXT/?uri=celex:32016R0679)
- [일반 데이터 보호 규칙](https://ko.wikipedia.org/wiki/%EC%9D%BC%EB%B0%98_%EB%8D%B0%EC%9D%B4%ED%84%B0_%EB%B3%B4%ED%98%B8_%EA%B7%9C%EC%B9%99)

---


최종 업데이트 : 2024년 6월 22일.
