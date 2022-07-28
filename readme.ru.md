## Документация для phpMussel v3 (Русский)

### Содержание
- 1. [ПРЕДИСЛОВИЕ](#SECTION1)
- 2. [ИНСТАЛЛЯЦИЯ](#SECTION2)
- 3. [ИСПОЛЬЗОВАНИЕ](#SECTION3)
- 4. [РАСШИРЕНИЕ PHPMUSSEL](#SECTION4)
- 5. [НАСТРОЙКИ](#SECTION5)
- 6. [ФОРМАТ СИГНАТУРЕЙ](#SECTION6)
- 7. [ИЗВЕСТНЫЕ ПРОБЛЕМЫ СОВМЕСТИМОСТИ](#SECTION7)
- 8. [ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ (FAQ)](#SECTION8)
- 9. [ЛЕГАЛЬНАЯ ИНФОРМАЦИЯ](#SECTION9)

*Regarding translations: My native language is English. Because this is a free and open-source hobby project which generates zero income, and translatable content is likely to change as the features and functionality supported by the project changes, it doesn't make sense sense for me to spend money for translations. Because I'm the sole author/developer/maintainer for the project and I'm not a ployglot, any translations I produce are very likely to contain errors. Sorry, but realistically, that won't ever change. If you find any such errors/typos/mistakes/etc, your assistance to correct them would be very much appreciated. Pull requests invited and encouraged. Otherwise, if you find these errors too much to handle, just stick with the original English source. If a translation is totally irredeemably incomprehensible, let me know which, and I can just delete them entirely. If you're not sure how to perform pull requests, ask. I can help.*

---


### 1. <a name="SECTION1"></a>ПРЕДИСЛОВИЕ

Большое спасибо всем, кто пользуется данным phpMussel-пособием. PHP-руководство позволяет обнаружить вирусы, троянские кони и другие вредоносные программы, проникающие в ваш компьютер, имеющие код ClamAV и другие.

[PHPMUSSEL](https://phpmussel.github.io/) авторское право 2013 года, а также GNU/GPLv2, созданный [Caleb M (Maikuolan)](https://github.com/Maikuolan).

Это руководство находится в свободном доступе. Вы можете его передавать и/или модифицировать на условиях GNU General Public License, как публикует Фонд свободного программного обеспечения (Free Software Foundation); либо под второй версией лицензии, либо любой другой более поздней версией (по вашему выбору). Пособие публикуется не в целях увеличения прибыли или создания себе рекламы, а лишь в надежде принести пользу, правда, без всякой гарантии. Подробности Вы можете узнать на странице GNU General Public License в разделе `LICENSE.txt`, а также на страницах:
- <https://www.gnu.org/licenses/>.
- <https://opensource.org/licenses/>.

За вдохновение по созданию этого руководства я говорю большое спасибо [ClamAV](https://www.clamav.net/). Также я благодарю всех, кто пользуется этим руководством. Без вас оно, вероятно, никогда не существовало бы или ценность его была бы не очень большой.

Также большую благодарность выражаю GitHub и Bitbucket за созданные ими хостадреса проектов; Подписчикам [PhishTank](https://www.phishtank.com/), [NLNetLabs](https://nlnetlabs.nl/), [Malware.Expert](https://malware.expert/) и другим. Особая благодарность тем, кто поддержит этот проект, а также всем неназванным мною людям, в том чисте и Вам за то, что пользуетесь этим пособием.

---


### 2. <a name="SECTION2"></a>ИНСТАЛЛЯЦИЯ

#### 2.0 ИНСТАЛЛЯЦИЯ С ПОМОЩЬЮ COMPOSER

Рекомендуемый способ установки phpMussel v3: Composer.

Для удобства вы можете установить наиболее часто используемые зависимости phpMussel через старый основной репозиторий phpMussel:

`composer require phpmussel/phpmussel`

Кроме того, вы можете индивидуально выбирать, какие зависимости вам понадобятся в вашей имплементации. Вполне возможно, что вам нужны только определенные зависимости, и вам не нужно все.

Чтобы что-то сделать с phpMussel, вам понадобится базовая кодовая база phpMussel:

`composer require phpmussel/core`

Предоставляет административный интерфейс для phpMussel:

`composer require phpmussel/frontend`

Предоставляет автоматическую проверку загрузки файлов для вашего сайта:

`composer require phpmussel/web`

Предоставляет возможность использовать phpMussel в качестве интерактивного приложения в режиме CLI:

`composer require phpmussel/cli`

Предоставляет мост между phpMussel и PHPMailer, позволяя phpMussel использовать PHPMailer для двухфакторной аутентификации, уведомления по электронной почте о заблокированных загрузках файлов и т.д.:

`composer require phpmussel/phpmailer`

Чтобы phpMussel мог что-либо обнаруживать, вам нужно установить сигнатуры. Для этого нет специального пакета. Чтобы установить сигнатуры, обратитесь к следующему разделу этого документа.

Кроме того, если вы не хотите использовать Composer, вы можете скачать предварительно упакованные ZIP-файлы отсюда:

https://github.com/phpMussel/Examples

Предварительно упакованные ZIP-архивы включают в себя все вышеупомянутые зависимости, а также все стандартные файлы сигнатур phpMussel, а также некоторые примеры того, как использовать phpMussel в вашей имплементации.

#### <a name="INSTALLING_SIGNATURES"></a>2.1 ИНСТАЛЛЯЦИЯ СИГНАТУРЕЙ

Сигнатуры требуются phpMussel для обнаружения конкретных угроз. Существует 2 основных метода установки сигнатурей:

1. Создавайте сигнатуры с помощью «SigTool» и установите вручную.
2. Загрузите сигнатуры из «phpMussel/Signatures» или «phpMussel/Examples» и установите вручную.

##### 2.1.0 Создавайте сигнатуры с помощью «SigTool» и установите вручную.

*Видеть: [Документация SigTool](https://github.com/phpMussel/SigTool#documentation).*

*Также обратите внимание: SigTool обрабатывает только сигнатуры из ClamAV. Чтобы получить сигнатуры из других источников, например, написанных специально для phpMussel, которая включает в себя сигнатуры, необходимые для обнаружения тестовых образцов phpMussel, этот метод должен быть дополнен одним из других методов, упомянутых здесь.*

##### 2.1.1 Загрузите сигнатуры из «phpMussel/Signatures» или «phpMussel/Examples» и установите вручную.

В первую очередь, перейти к [phpMussel/Signatures](https://github.com/phpMussel/Signatures). Репозиторий содержит различные файлы сигнатур, сжатые GZ. Загрузите нужные вам файлы, распакуйте их, и скопируйте их в каталог сигнатур вашей установки.

Альтернативно, скачать самый последний ZIP из [phpMussel/Examples](https://github.com/phpMussel/Examples). Затем вы можете скопировать/вставить сигнатуры из этого архива в вашу установку.

---


### 3. <a name="SECTION3"></a>ИСПОЛЬЗОВАНИЕ

#### 3.0 НАСТРОЙКА PHPMUSSEL

После установки phpMussel вам понадобится файл конфигурации, чтобы вы могли его настроить. Файлы конфигурации phpMussel могут быть отформатированы как файлы INI или YML. Если вы работаете с одним из примеров ZIP, у вас уже есть два примера конфигурационных файлов, `phpmussel.ini` и `phpmussel.yml`; Вы можете работать с этим, если хотите. Если вы не работаете с одним из примеров ZIP, вам нужно создать новый файл.

Если вы удовлетворены конфигурацией по умолчанию для phpMussel и не хотите ничего менять, вы можете использовать пустой файл в качестве файла конфигурации. Все, что не настроено вашим файлом конфигурации, будет использовать значение по умолчанию, поэтому вам нужно явно настроить что-то, только если вы хотите, чтобы оно отличалось от значения по умолчанию (означает, что пустой файл конфигурации заставит phpMussel использовать всю свою конфигурацию по умолчанию).

Если вы хотите использовать фронтенд phpMussel, вы можете настроить все на странице конфигурации фронтэнда. Но, начиная с v3, информация о входе в фронтенд сохраняется в вашем файле конфигурации, поэтому, чтобы войти в фронтенд, вам нужно как минимум настроить аккаунт для входа в фронтенду, а затем оттуда вы сможете войти и использовать страницу конфигурации фронтэнда для настройки всего остального.

Приведенные ниже выдержки добавят аккаунт в фронтенд с именем пользователя «admin» и паролем «password».

Для файлов INI:

```INI
[user.admin]
password='$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK'
permissions='1'
```

Для файлов YML:

```YAML
user.admin:
 password: "$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK"
 permissions: 1
```

Вы можете назвать свою конфигурацию как хотите (до тех пор, пока вы сохраняете его расширение, так что phpMussel знает, какой формат это использует), и вы можете хранить его где угодно. Вы можете указать phpMussel, где искать файл конфигурации, указав его путь при создании экземпляра загрузчика. Если путь не указан, phpMussel попытается найти его в родительском каталоге vendor.

В некоторых средах, таких как Apache, даже возможно поместить точку в начале вашей конфигурации, чтобы скрыть ее и предотвратить публичный доступ.

Обратитесь к разделу конфигурации этого документа для получения дополнительной информации о различных директивах конфигурации, доступно для phpMussel.

#### 3.1 PHPMUSSEL CORE

Независимо от того, как вы хотите использовать phpMussel, почти каждая имплементация будет содержать что-то вроде этого, как минимум:

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
```

Как подразумевается именами этих классов, загрузчик (loader) отвечает за подготовку основных потребностей использования phpMussel, а сканер (scanner) отвечает за все функции сканирования.

Конструктор для загрузчика принимает пять параметров, все необязательно.

```PHP
public function __construct(
    string $ConfigurationPath = '',
    string $CachePath = '',
    string $QuarantinePath = '',
    string $SignaturesPath = '',
    string $VendorPath = ''
)
```

Параметр 1: Полный путь к вашему файлу конфигурации. Если опущено, phpMussel будет искать файл конфигурации с именем `phpmussel.ini` или `phpmussel.yml`, в родительском каталоге «vendor».

Параметр 2: Путь к каталогу, который вы разрешаете phpMussel использовать для кэширования и временного хранения файлов. Если опущено, phpMussel попытается создать новый каталог для использования с именем `phpmussel-cache`, в родительском каталоге «vendor». Если вы хотите указать этот путь самостоятельно, было бы лучше выбрать пустой каталог, чтобы избежать нежелательной потери других данных в указанном каталоге.

Параметр 3: Путь к каталогу, который вы разрешаете phpMussel использовать для его карантина. Если опущено, phpMussel попытается создать новый каталог для использования с именем `phpmussel-quarantine`, в родительском каталоге «vendor». Если вы хотите указать этот путь самостоятельно, было бы лучше выбрать пустой каталог, чтобы избежать нежелательной потери других данных в указанном каталоге. Настоятельно рекомендуется запретить публичный доступ к каталогу используемому для карантина.

Параметр 4: Путь к каталогу, содержащему файлы сигнатур для phpMussel. Если опущено, phpMussel попытается найти файлы сигнатуры в каталоге с именем `phpmussel-signatures`, в родительском каталоге «vendor».

Параметр 5: Путь к вашей директории «vendor». Это никогда не должно указывать на что-либо еще. Если опущено, phpMussel попытается найти этот каталог для себя. Этот параметр предоставлен для облегчения интеграции с имплементациями, которые могут не обязательно иметь ту же структуру, что и типичный проект Composer.

Конструктор для сканера принимает только один параметр, и он обязателен: Объект загрузчика. Поскольку он передается по ссылке, загрузчик должен быть создан в переменной (Создание загрузчика непосредственно в параметрах сканера: Неправильный способ использования phpMussel).

```PHP
public function __construct(\phpMussel\Core\Loader &$Loader)
```

#### 3.2 АВТОМАТИЧЕСКОЕ СКАНИРОВАНИЕ ЗАГРУЗКИ ФАЙЛОВ

Чтобы создать инстанция обработчика загрузки:

```PHP
$Web = new \phpMussel\Web\Web($Loader, $Scanner);
```

Для сканирования загрузки файлов:

```PHP
$Web->scan();
```

Необязательно, phpMussel может попытаться восстановить имена загрузок, если что-то не так, если вы хотите:

```PHP
$Web->demojibakefier();
```

В качестве полного примера:

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

*Попытка загрузить файл `ascii_standard_testfile.txt`, доброкачественный образец, предоставленный с единственной целью тестирования phpMussel:*

![Скриншот](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/web-v3.0.0-alpha2.png)

#### 3.3 РЕЖИМ CLI

Чтобы создать инстанция обработчика CLI:

```PHP
$CLI = new \phpMussel\CLI\CLI($Loader, $Scanner);
```

В качестве полного примера:

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

*Скриншот:*

![Скриншот](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/cli-v3.0.0-alpha2.png)

#### 3.4 ФРОНТЕНД

Чтобы создать инстанция фронтенда:

```PHP
$FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
```

В качестве полного примера:

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

*Скриншот:*

![Скриншот](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/frontend-v3.0.0-alpha2.png)

#### 3.5 API СКАНЕРА

Вы также можете использовать API сканера phpMussel в других программах и скриптах, если хотите.

В качестве полного примера:

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

Метод `scan()` является наиболее важной частью этого примера. Метод `scan()` принимает два параметра:

```PHP
public function scan(mixed $Files, int $Format = 0): mixed
```

Первый параметр может быть строкой или массивом и сообщает сканеру, что он должен сканировать. Это может быть строка, указывающая конкретный файл или каталог, или массив таких строк для указания нескольких файлов/каталогов.

Когда в виде строки, он должен указывать, где данные могут быть найдены. Когда в виде массива, ключи массива должны указывать исходные имена проверяемых элементов, а значения должны указывать, где можно найти данные.

Второй параметр является целым числом и сообщает сканеру, как он должен возвращать результаты сканирования.

Укажите 1, чтобы вернуть результаты сканирования в виде массива для каждого элемента отсканированного, как целые числа.

Эти целые числа имеют следующие значения:

Результаты | Описание
--:|:--
-5 | Указывает, что сканирование не удалось завершить по другим причинам.
-4 | Указывает, что данные не могут быть отсканированы из-за шифрования.
-3 | Указывает, что имеются проблемы с файлом сигнатуры phpMussel.
-2 | Указывает, что повреждённые файлы найдены, но сканирование не закончено.
-1 | Означает, что для сканирования необходимы отсутствующие PHP-расширения или дополнения, поэтому сканирование не завершено.
0 | Говорит о том, что цель не существует, а следовательно не может быть и проверена.
1 | Означает, что цель успешно проверена и проблем не найдено.
2 | Цель успешно проверена, но имеются проблемы.

Укажите 2, чтобы вернуть результаты сканирования как логическое значение.

Результаты | Описание
:-:|:--
`true` | Проблемы обнаружены (цель сканирования плохая/опасная).
`false` | Проблемы не обнаружены (цель сканирования, вероятно, доброкачественная).

Укажите 3, чтобы возвращать результаты сканирования в виде массива для каждого элемента отсканированного, как читабельный текст.

*Пример вывода:*

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

Укажите 4, чтобы вернуть результаты сканирования в виде строки читабельного человеком текста (вроде 3, но в сочетании).

*Пример вывода:*

```
Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)! Detected phpMussel-Testfile.CoEx (coex_testfile.rtf)! Detected encrypted archive; Encrypted archives not permitted (encrypted.zip)!
```

Укажите *любое другое значение* для возврата форматированного текста (что похоже на результаты сканирования при использовании CLI).

*Пример вывода:*

*Смотрите также: [Как получить доступ к конкретным сведениям о файлах при их сканировании?](#SCAN_DEBUGGING)*

#### 3.6 ДВУХФАКТОРНАЯ АУТЕНТИФИКАЦИЯ

Возможно сделать фронтенд более безопасным, включив двухфакторную аутентификацию («2FA»). При входе в аккаунт с поддержкой 2FA, электронное письмо отправляется на адрес электронной почты, связанный с этой аккаунтой. Это электронное письмо содержит «код 2FA», который затем должен ввести пользователь в дополнение к имени пользователя и паролю, чтобы иметь возможность войти в систему, используя эту аккаунт. Это означает, что получить пароль аккаунтой будет недостаточно для того, чтобы любой хакер или потенциальный злоумышленник могли войти в эту аккаунт, потому что им также необходимо будет иметь доступ к адресу электронной почты, связанному с этой аккаунтой, чтобы иметь возможность получать и использовать код 2FA, связанный с сеансом, что делает фронтенд более безопасным.

После того, как Вы установили PHPMailer, вам нужно будет заполнить директивы конфигурации для PHPMailer через страницу конфигурации phpMussel или файл конфигурации. Более подробная информация об этих директивах конфигурации содержится в разделе конфигурации этого документа. После того, как Вы заполнили директивы конфигурации PHPMailer, установите `enable_two_factor` в `true`. На этом этапе должна быть включена двухфакторная аутентификация.

Затем вам нужно связать адрес электронной почты с аккаунтой, чтобы phpMussel знал, куда отправлять коды 2FA при входе в эту аккаунт. Для этого используйте адрес электронной почты в качестве имени пользователя для аккаунтой (например, `foo@bar.tld`), или указать адрес электронной почты как часть имени пользователя так же, как при отправке письма обычно (например, `Foo Bar <foo@bar.tld>`).

---


### 4. <a name="SECTION4"></a>РАСШИРЕНИЕ PHPMUSSEL

phpMussel разработан с учетом расширяемости. Тянуть запросов в любой из репозиториев в организации phpMussel, и [вклады](https://github.com/phpMussel/.github/blob/master/CONTRIBUTING.md) в целом всегда приветствуются. Кроме того, если вам нужно изменить или расширить phpMussel способами, которые не подходят для этих конкретных репозиториев, это, безусловно, можно сделать (например, для модификаций или расширений, которые специфическими для вашей конкретной имплементации, которые не могут быть опубликованы из-за потребностей конфиденциальности в вашей организации, или которые могут быть предпочтительно опубликованы в их собственном репозитории, например, для плагинов и новых пакетов Composer, для которых требуется phpMussel).

Начиная с версии 3, все функции phpMussel существуют в виде классов, что означает, что в некоторых случаях механизмы [наследования объектов](https://www.php.net/manual/ru/language.oop5.inheritance.php), предоставляемые PHP, могут быть простым и подходящим способом расширения phpMussel.

phpMussel также предоставляет собственные механизмы расширяемости. До v3, предпочтительным механизмом была интегрированная система плагинов для phpMussel. Начиная с версии 3, предпочтительным механизмом является оркестратор событий.

Код шаблона для расширения phpMussel и для написания новых плагинов общедоступен в [репозитории шаблонов](https://github.com/phpMussel/plugin-boilerplates). Включен также список [всех поддерживаемых в настоящее время событий](https://github.com/phpMussel/plugin-boilerplates/tree/master/boilerplate-v3#currently-supported-events) и более подробные инструкции относительно того, как использовать шаблонный код.

Вы заметите, что структура кода шаблона v3 идентична структуре различных репозиториев phpMussel v3 в организации phpMussel. Это не совпадение. По возможности я бы рекомендовал использовать шаблонный код v3 для целей расширяемости и использовать принципы проектирования, аналогичные принципам самого phpMussel v3. Если вы решите опубликовать свое новое расширение или плагин, вы можете интегрировать для него поддержку Composer, и тогда у других должно быть теоретически возможно использовать ваше расширение или плагин точно так же, как и сам phpMussel v3, просто требуя его вместе с другими их зависимостями Composer, и применяя все необходимые обработчики событий при их реализации. (Конечно, не забудьте включить инструкции в свои публикации, чтобы другие знали о любых необходимых обработчиках событий и любой другой информации, которая может потребоваться для правильной установки и использования вашей публикации).

---


### 5. <a name="SECTION5"></a>НАСТРОЙКИ

Ниже представлен список директив конфигурации, принятых phpMussel, а также краткое описание их функций.

```
Конфигурация (v3)
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
├───web
│       uploads_log [string]
│       forbid_on_block [bool]
│       unsupported_media_type_header [bool]
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

#### «core» (Категория)
Общая конфигурация (любая конфигурация ядра, не относящаяся к другим категориям).

##### «scan_log» `[string]`
- Название файла, в который записываются результаты всех контрольных проверок. Задайте имя файлу, или оставьте пустым чтобы деактивировать опцию.

##### «scan_log_serialized» `[string]`
- Название файла, в который записываются результаты всех контрольных проверок (сериализовано Формат). Задайте имя файлу, или оставьте пустым чтобы деактивировать опцию.

##### «error_log» `[string]`
- Файл для регистрации обнаруженных нефатальных ошибок. Задайте имя файлу, или оставьте пустым чтобы деактивировать опцию.

##### «truncate» `[string]`
- Усекать лог-файлы, когда они достигают определенного размера? Значение это максимальный размер в Б/КБ/МБ/ГБ/ТБ, до которого файл журнала может увеличиться до усечения. Стандартное значение 0КБ отключает усечение (лог-файлы может расти неограниченно). Примечание: относится к отдельным лог-файлы! Размер файлов журнала не учитывается совместно.

##### «log_rotation_limit» `[int]`
- Лог вращения ограничивает количество журнальных лог-файлов, которые должны существовать в любой момент времени. Когда создаются новые лог-файлы, если общее количество лог-файлов превышает указанный предел, указанное действие будет выполнено. Здесь Вы можете указать желаемый лимит. Значение 0 отключит вращение лог.

##### «log_rotation_action» `[string]`
- Лог вращения ограничивает количество журнальных лог-файлов, которые должны существовать в любой момент времени. Когда создаются новые лог-файлы, если общее количество лог-файлов превышает указанный предел, указанное действие будет выполнено. Здесь Вы можете указать желаемое действие.

```
log_rotation_action
├─Delete ("Удалите самые старые лог-файлы, пока лимит больше не будет превышен.")
└─Archive ("Сначала архивируйте, а затем удалите самые старые лог-файлы, пока лимит больше не будет превышен.")
```

##### «timezone» `[string]`
- Это используется, чтобы указать часовой пояс для использования (например, Africa/Cairo, America/New_York, Asia/Tokyo, Australia/Perth, Europe/Berlin, Pacific/Guam, и т.д.). Укажите «SYSTEM», чтобы позволить PHP обрабатывать это автоматически.

```
timezone
├─SYSTEM ("Использовать часовой пояс по умолчанию.")
├─UTC ("UTC")
└─…Другие
```

##### «time_offset» `[int]`
- Смещение часового пояса в минут.

##### «time_format» `[string]`
- Формат нотации даты, используемый phpMussel. Дополнительные опции могут быть добавлены по запросу.

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
└─…Другие
```

##### «ipaddr» `[string]`
- Место IP-адреса актуального соединения в общем потоке данных (полезно для Cloud-сервиса). Стандарт = REMOTE_ADDR. Внимание! Изменяйте это значение только в том случае, если Вы уверены в своих действиях!

```
ipaddr
├─HTTP_INCAP_CLIENT_IP ("HTTP_INCAP_CLIENT_IP (Incapsula)")
├─HTTP_CF_CONNECTING_IP ("HTTP_CF_CONNECTING_IP (Cloudflare)")
├─CF-Connecting-IP ("CF-Connecting-IP (Cloudflare)")
├─HTTP_X_FORWARDED_FOR ("HTTP_X_FORWARDED_FOR (Cloudbric)")
├─X-Forwarded-For ("X-Forwarded-For (Squid)")
├─Forwarded ("Forwarded")
├─REMOTE_ADDR ("REMOTE_ADDR (Стандарт)")
└─…Другие
```

Смотрите также:
- [NGINX Reverse Proxy](https://docs.nginx.com/nginx/admin-guide/web-server/reverse-proxy/)
- [Squid configuration directive forwarded_for](http://www.squid-cache.org/Doc/config/forwarded_for/)
- [Forwarded - HTTP \| MDN](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Forwarded)

##### «delete_on_sight» `[bool]`
- Эта опция позволяет в течение сканирования немедленно удалять файлы при наличии в них опознавательных признаков, содержащихся в сигнатуры или других методах. При этом не будут затрагиваться файлы, идентифицированные как неинфицированные. Если в архиве будет инфицирован хотя бы один файл, то будет удалён весь архив. Во время загрузки файлов эту функцию активировать не обязательно, так как PHP после исполнения удаляет содержимое кэш-памяти. Это означает, что PHP удалит каждый скаченный через сервер файл, если он не перемещён, не скопирован или не удалён. Эта опция, как дополнительная мера, была введена для большей безопасности, но в основном для систем, в которых PHP ведёт себя по-другому. False = После проверки файл останется нетронутым [Стандарт]; True = После проверки инфицированный файл будет немедленно удалён.

##### «lang» `[string]`
- Задаёт phpMussel стандарт языка.

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

##### «lang_override» `[bool]`
- Локализовать в соответствии с HTTP_ACCEPT_LANGUAGE, когда это возможно? True = Да [Стандарт]; False = Нет.

##### «scan_cache_expiry» `[int]`
- Как долго должна phpMussel хранить результаты сканирования в буфере? Значение измеряется секундами. Стандартное значение 21600 секунд (6 часов). Значение равное 0 деактивирует временную память результатов сканирования.

##### «maintenance_mode» `[bool]`
- Включить режим обслуживания? True = Да; False = Нет [Стандарт]. Отключает все, кроме фронтенд. Иногда полезно при обновлении CMS, фреймворков и т.д.

##### «statistics» `[bool]`
- Отслеживать статистику использования phpMussel? True = Да; False = Нет [Стандарт].

##### «hide_version» `[bool]`
- Скрыть информацию о версии из журналов и вывода на страницу? True = Да; False = Нет [Стандарт].

##### «disabled_channels» `[string]`
- Это можно использовать для предотвращения использования phpMussel определенных каналов при отправке запросов (например, при обновлении, при извлечении метаданных компонента, и т.д.).

```
disabled_channels
├─GitHub ("GitHub")
├─BitBucket ("BitBucket")
├─VirusTotal_HTTPS ("VirusTotal (HTTPS)")
└─VirusTotal_HTTP ("VirusTotal (HTTP)")
```

##### «default_timeout» `[int]`
- Тайм-аут по умолчанию для внешних запросов? Стандарт = 12 секунд.

#### «signatures» (Категория)
Конфигурация для сигнатурей, файлов сигнатурей и т.д.

##### «active» `[string]`
- Список активных файлов сигнатур, разделенных запятыми. Заметка: Сначала необходимо установить файлы сигнатуры, прежде чем вы сможете их активировать. Чтобы тестовые файлы работали правильно, файлы сигнатуры должны быть установлены и активированы.

##### «fail_silently» `[bool]`
- Реакция phpMussel на отсутсвие сигнатурей или дефект в них. Когда `fail_silently` деактивирована, то в течение сканирования будет сообщаться об отсутствии сигнатуры или изъянах в ней. В случае если `fail_silently` активирована, то отсутствующие или дефектные сигнатуры будут игнорироваться, не сообщая о проблемах. Эта опция должна оставаться такой, если только Вы не ожидаете отказа системы или чего-то подобного. False = Деактивировано; True = Активировано [Стандарт].

##### «fail_extensions_silently» `[bool]`
- Должна phpMussel сообщать, что отсутствует расширение файла? Если `fail_extensions_silently` деактивирована, то при сканировании придёт сообщение об отсутствии расширения файла, если же `fail_extensions_silently` активирована, то файлы с отсутствующим расширением будут игнорироваться, и при сканировании придёт сообщение, что с этими файлами всё в порядке. Деактивация или активация могут повысить Вашу безопасность, однако способствовать увеличению ложных сообщений. False = Деактивировано; True = Активировано [Стандарт].

##### «detect_adware» `[bool]`
- Интерпретировать сигнатурей для обнаружить рекламное программное? False = Нет; True = Да [Стандарт].

##### «detect_joke_hoax» `[bool]`
- Интерпретировать сигнатурей для обнаружить шутка вредоносные/вирусы программы? False = Нет; True = Да [Стандарт].

##### «detect_pua_pup» `[bool]`
- Интерпретировать сигнатурей для обнаружить PUAs/PUPs (потенциально нежелательных программы/приложений)? False = Нет; True = Да [Стандарт].

##### «detect_packer_packed» `[bool]`
- Интерпретировать сигнатурей для обнаружить упаковщики и упакованные данные? False = Нет; True = Да [Стандарт].

##### «detect_shell» `[bool]`
- Интерпретировать сигнатурей для обнаружить веб-шелл скрипты? False = Нет; True = Да [Стандарт].

##### «detect_deface» `[bool]`
- Интерпретировать сигнатурей для обнаружить дифейсмент/обезображивание программы? False = Нет; True = Да [Стандарт].

##### «detect_encryption» `[bool]`
- Должен ли phpMussel обнаруживать и блокировать зашифрованные файлы? False = Нет; True = Да [Стандарт].

##### «heuristic_threshold» `[int]`
- phpMussel имеет определённые сигнатуры, с помощью которых она идентифицирует подозрительные и потенциально вредоносные свойства загружаемых файлов, не проверяя при этом сами файлы на вредоносность. При помощи этой директиВы phpMussel определяет степень опасности подозрительных и потенциально вредоносных файлов, прежде чем назвать их вредоносными. В этой связи, определение степени опасности = это общее количество подозрительных и потенциально вредоносных свойств. Стандартное значение равняется 3. Значение меньше 3, как правило, ведёт к увеличению ложных сигналов тревоги и опознанию большего числа вредных файлов; значение больше 3 вызывает меньшее количество ложных сигналов тревоги и метиться как вредные будет незначительное количество файлов. Оставив это значение таким, Вы должны осознавать проблемы, которые будут вызваны этой установкой.

#### «files» (Категория)
Специфика работы с файлами при сканировании.

##### «filesize_limit» `[string]`
- Ограничение объема файла в килобайтах. 65536 = 64MB [Стандарт]; 0 = без ограничений (устанавливается для «серого листа»), принимается любое (положительное) цифровое значение. Это полезно, если PHP-конфигурация Вашей системы в каждом процессе ограничивает использование имеющейся памяти или ограничивает объём загружаемого файла.

##### «filesize_response» `[bool]`
- Обработка файлов, превышающих ограничение объёма файлов (если указано). False = Добавить к белому списку; True = Добавить к чёрному списку [Стандарт].

##### «filetype_whitelist» `[string]`
- Белый список:

__Как это работает.__ Если ваша система позволяет или полностью запрещает загружать специальные файлы, то, отсортировав их на белый, чёрный или серый список, программа ускоряет процесс сканирования, пропуская эти типы файлов. Он в формате CSV (отделяемые запятой величины).

__Логичная последовательность обработки.__ Файл, занесённый с белый список, сканирует не блокируя; файл из белого или серого списка не проверяет. Файл из чёрного списка не сканирует, но всё же блокирует; файл из серого списка не проверяет. Если файл относится к типу файлов, занесённых в серый список, то независимо от того пуст или заполнен серый список, программа будет сканировать файл как обычно и, базируясь на сканировании, определит должен ли он блокироваться или нет; если серый список заполнен и тип файла не значится в сером списке, то программа поступит с ним так, как будто он занесён в чёрный список, т.е. не сканирует его, но всё равно блокирует.

##### «filetype_blacklist» `[string]`
- Черный список:

__Как это работает.__ Если ваша система позволяет или полностью запрещает загружать специальные файлы, то, отсортировав их на белый, чёрный или серый список, программа ускоряет процесс сканирования, пропуская эти типы файлов. Он в формате CSV (отделяемые запятой величины).

__Логичная последовательность обработки.__ Файл, занесённый с белый список, сканирует не блокируя; файл из белого или серого списка не проверяет. Файл из чёрного списка не сканирует, но всё же блокирует; файл из серого списка не проверяет. Если файл относится к типу файлов, занесённых в серый список, то независимо от того пуст или заполнен серый список, программа будет сканировать файл как обычно и, базируясь на сканировании, определит должен ли он блокироваться или нет; если серый список заполнен и тип файла не значится в сером списке, то программа поступит с ним так, как будто он занесён в чёрный список, т.е. не сканирует его, но всё равно блокирует.

##### «filetype_greylist» `[string]`
- Серый список:

__Как это работает.__ Если ваша система позволяет или полностью запрещает загружать специальные файлы, то, отсортировав их на белый, чёрный или серый список, программа ускоряет процесс сканирования, пропуская эти типы файлов. Он в формате CSV (отделяемые запятой величины).

__Логичная последовательность обработки.__ Файл, занесённый с белый список, сканирует не блокируя; файл из белого или серого списка не проверяет. Файл из чёрного списка не сканирует, но всё же блокирует; файл из серого списка не проверяет. Если файл относится к типу файлов, занесённых в серый список, то независимо от того пуст или заполнен серый список, программа будет сканировать файл как обычно и, базируясь на сканировании, определит должен ли он блокироваться или нет; если серый список заполнен и тип файла не значится в сером списке, то программа поступит с ним так, как будто он занесён в чёрный список, т.е. не сканирует его, но всё равно блокирует.

##### «check_archives» `[bool]`
- Нужно ли проверять содержимое архивов? False = Нет (никакой проверки); True = Да (будет проверяться) [Стандарт]. Поддерживаются: Zip (требует libzip), Tar, Rar (требует расширения rar).

##### «filesize_archives» `[bool]`
- Должен ли объём файла чёрного/белого списка быть перенесён на содержание архива? False = Нет (всё поместить в серый лист); True = Да [Стандарт].

##### «filetype_archives» `[bool]`
- Должен ли тип файла чёрного/белого списка быть перенесён на содержание архива? False = Нет (всё поместить в серый лист) [Стандарт]; True = Да.

##### «max_recursion» `[int]`
- Максимальная граница рекурсионной глубины архивов. Стандарт = 3.

##### «block_encrypted_archives» `[bool]`
- Нужно ли узнавать и блокировать зашифрованные архивы? phpMussel не может сканировать зашифрованные архивы. Не исключена вероятность того, что кодировка архива используется агрессором, чтобы избежать phpMussel, антивирусных сканеров и других подобных защитных программ. Умение phpMussel блокировать зашифрованные архиВы может быть поможет уменьшить риски, связанные с этой возможностью. False = Нет; True = Да [Стандарт].

##### «max_files_in_archives» `[int]`
- Максимальное количество файлов для сканирования из архивов перед прекращением сканирования. Стандарт = 0 (не максимум).

##### «chameleon_from_php» `[bool]`
- Поиск PHP-заголовков в файлах, которые не были опознаны ни как PHP-файлы, ни как архивы. False = Деактивировано; True = Активировано.

##### «can_contain_php_file_extensions» `[string]`
- Список расширений файлов позволяет содержать PHP-код, разделенный запятыми. Если обнаружение атаки хамелеона PHP включено, файлы, содержащие PHP-код, которые имеют расширения, которые не входят в этот список, будут обнаружены как атаки хамелеона PHP.

##### «chameleon_from_exe» `[bool]`
- Поиск способных загрузиться заголовков в файлах, которые нельзя ни загрузить, ни определить как архив; поиск способных загрузиться файлов, чьи заголовки не соответствуют требованиям. False = Деактивировано; True = Активировано.

##### «chameleon_to_archive» `[bool]`
- Обнаружение неправильных заголовков в архивах и сжатых файлах. Поддерживаются: BZ/BZIP2, GZ/GZIP, LZF, RAR, ZIP. False = Деактивировано; True = Активировано.

##### «chameleon_to_doc» `[bool]`
- Поиск офисных документов с некорректными заголовками (поддерживаются: DOC, DOT, PPS, PPT, XLA, XLS, WIZ). False = Деактивировано; True = Активировано.

##### «chameleon_to_img» `[bool]`
- Поиск графиков с некорректными заголовками (поддерживаются: BMP, DIB, PNG, GIF, JPEG, JPG, XCF, PSD, PDD, WEBP). False = Деактивировано; True = Активировано.

##### «chameleon_to_pdf» `[bool]`
- Поиск PDF-файлов с некорректными заголовками. False = Деактивировано; True = Активировано.

##### «archive_file_extensions» `[string]`
- Опознаёт расширение архива или файла (CSV-формат; включать или удалять только при проблемах; удаление без нужны может вызвать для архива сигнал тревоги; включение без нужды может внести в белый список то, что раньше определялось как возможная атака; изменяйте список очень осторожно; помните, что программа не влияет на функцию архива и не может анализировать содержание). Этот список содержит форматы архивов, наиболее часто используемых большинством систем и CMS, однако он не завершён, но сделано это намеренно.

##### «block_control_characters» `[bool]`
- Должны ли файлы, содержащие командные сигналы (отличные от Newline/конец строки), быть блокированными? При загрузке только «голого» текста Вы можете активировать эту опцию, чтобы усилить защиту своей системы. Но когда она активирована, а Вы хотите загрузить не только текст, то программа подаст вам ложный сигнал тревоги. False = Не блокировать [Стандарт]; True = Блокировать.

##### «corrupted_exe» `[bool]`
- Дефектные файлы и разобрать ошибки. False = Игнорировать; True = Блокировать [Стандарт]. Должны ли потенциально дефектные файлы при загрузке проверяться и блокироваться? В случае когда определённые аспекты PE-файла повреждены или могут быть неправильно обработаны, то часто (однако не всегда) они идентифицируются как инфицированные файлы. Многие антивирусные программы используют различные методы по опознанию вирусов в таких файлах. Программисты вирусов, зная об этом, прилагают много усилий к тому, чтобы вирус остался неопознанным.

##### «decode_threshold» `[string]`
- Порог числа исходных данных, которые должны узнаваться командой декодирования (если во время процесса сканирования не возникнут ощутимые проблемы производительности). Стандартная установка 512КБ. Ноль или нулевое значение деактивирует ограничение (все такие ограничения нужно устранять, ориентируясь на величину файла).

##### «scannable_threshold» `[string]`
- Порог числа исходных данных, которые phpMussel должна прочитать и просканировать (если во время процесса сканирования возникнут ощутимые проблемы производительности). Стандартная установка 32МБ. Ноль или нулевое значение деактивирует ограничения. Основное правило: это значение должно быть меньше среднего объёма загружаемых файлов, которые Вы хотите скачать на свой сервер или веб-страницу, не больше нормы filesize_limit, и не превышать пятой части общей PHP-памяти «php.ini» файлов конфигурации. Эти правила не дают phpMussel использовать слишком большой объём памяти (что препятствовало бы phpMussel успешно сканировать файлы, превышающие определенную величину).

##### «allow_leading_trailing_dots» `[bool]`
- Разрешить точки в начале и конце имен файлов? Иногда это может быть использовано для скрытия файлов или для обмана некоторых систем для разрешения обхода каталога. False = Не разрешать [Стандарт]. True = Разрешать.

##### «block_macros» `[bool]`
- Попробуйте заблокировать любые файлы, содержащие макросы? Некоторые типы документов и таблиц могут содержать исполняемые макросы, что создает опасный потенциальный вредоносный вектор. False = Не блокировать [Стандарт]; True = Блокировать.

##### «only_allow_images» `[bool]`
- Когда установлено в true, любые файлы, обнаруженные сканером, которые не являются изображениями, будут помечены немедленно, без сканирования. Это может помочь сократить время, необходимое для завершения сканирования в некоторых случаях. Стандартное значение false.

#### «quarantine» (Категория)
Конфигурация для карантина.

##### «quarantine_key» `[string]`
- phpMussel может изолировать загруженные файлы на карантин, если это будет Вам нужно. Эту функцию должны деактивировать те пользователи, которые хотят лишь защитить свои интернет-сайты или окружение своего хоста, но дальнейший контроль выделенных файлов им не интересен. Активировать эту функцию должны те пользователи, которые хотят анализировать изолированные файлы на вредоносность или тому подобное. Изоляция выделенных файлов иногда может использоваться для поиска ошибки при частом появлении сигнала тревоги. Чтобы деактивировать функцию карантина, не заполняйте `quarantine_key`, и удалите содержание строки, если она заполнена. Для активирования функции карантина задайте значение. `quarantine_key` = Это важный элемент карантинной функции, способная защитить функцию карантина от атак вредоносных программ, и предотвратить запуск удерживаемых на карантине файлов. Значение `quarantine_key` Вы должны хранить втайне от всех, как и пароли. Оптимально в сочетании с `delete_on_sight`.

##### «quarantine_max_filesize» `[string]`
- Максимально допустимый объём файлов, которые могут быть изолированы в карантине. В карантинном регистре НЕ будет сохраняться файлы, объём которых больше указанного значения. Эта команда важна тем, что затрудняет потенциальному агрессору наводнить нежелательными данными ваш карантинный регистр, а также кэш-память вашего хост-сервера. Стандарт = 2МБ.

##### «quarantine_max_usage» `[string]`
- Максимально допустимая загрузка карантина. Когда общий объём файлов на карантине достигает этого значения, то начинают удаляться старые файлы пока не будет достигнуто необходимое значение. Эта команда важна тем, что затрудняет потенциальному агрессору наводнить нежелательными данными ваш карантинный регистр, а также кэш-память вашего хост-сервера. Стандарт = 64МБ.

##### «quarantine_max_files» `[int]`
- Максимальное количество файлов, которые могут существовать в карантине. Когда новые файлы добавляются в карантин, если этот номер будет превышен, старые файлы будут удалены до тех пор, пока остаток больше не будет превышать этот номер. Стандарт = 100.

#### «virustotal» (Категория)
Конфигурация для интеграции Virus Total.

##### «vt_public_api_key» `[string]`
- Для большей защиты от вирусов, троянов, вредоносных программ и других угроз phpMussel может сканировать файлы с Virus Total API. Стандартная установка = опция Virus Total API деактивирована. Для активизации нужно воспользоваться API-ключом от Virus Total. Эта опция даёт много преимуществ, поэтому рекомендуется её активировать. Важно осознавать: для использования Virus Total API, необходимо согласиться со всеми условиями пользования и соблюдать все директивы, описанные в документах Virus Total! Эту функцию интеграции нельзя применять КРОМЕ: Вы прочитали инструкцию по использованию Virus Total и API и согласен с ней. Как минимум, Вы прочитали предисловие к Virus Total Public API документации и понял о чём речь (всё после „Virus Total Public API v2.0“ но до „Contents“).

Смотрите также:
- [Terms of Service](https://www.virustotal.com/en/about/terms-of-service/)
- [Getting started](https://developers.virustotal.com/reference)

##### «vt_suspicion_level» `[int]`
- Допуская файлы к сканированию Virus Total API, phpMussel будет ограничиваться только теми файлами, которые рассматриваются «опасными». Опционально Вы можете регулировать эти ограничения, изменив значение `vt_suspicion_level` директивы.

##### «vt_weighting» `[int]`
- Должна phpMussel использовать результаты сканирования с Virus Total API в качестве опознания или как определение степени доверия? Существование этой директиВы объясняется тем, что сканирование файла со многими ядрами должно быть более тщательным (как это делает Virus Total) и, следовательно, будет найдено большее количество вредоносных файлов, что может привести к большему количеству ложных тревог. Есть ситуации, когда результаты сканирования бывают выше степени доверия, и тогда применяется однозначный результат. Применение значения 0 означает, что результаты сканирования будут применяться как опознание. В этом случае phpMussel будет рассматривать файл как вредоносный, если какие-то используемые в сканировании ядра файлов Virus Total обозначил опасными. При установке другого значения, результаты сканирования с Virus Total API будут использоваться как определение степени доверия. Количество используемых Virus Total ядер, обозначающих файл как вредоносный, будет служить степенью доверия (или определением степени доверия). Используемое значение будет определять, какую степень доверия (минимальную или требуемую) примет phpMussel во внимание, чтобы признать сканируемый файл вредоносным или безвредным. Стандартное значение = 0.

##### «vt_quota_rate» `[int]`
- Согласно Virus Total API-документации «Лимит времени, за которое должны обрабатываться 4 любых запроса, составляет 1 минуту. Используя Honeyclient, Honeypot или какую-либо другую активную систему, которая содействует VirusTotal, и не только вызывает сообщения, то Вы имеете право на более высокий лимит времени». phpMussel будет строго придерживаться этого лимита. Для его повышения даны эти две директивы, указывающие phpMussel на какой лимит она должна ориентироваться. Рекомендуется без необходимости это значение не повышать. С возникновением проблем по достижению лимита, уменьшение этого значения должно немного помочь. Твой лимит будет установлен как `vt_quota_rate` запросы любого типа в каждом `vt_quota_time` минутном промежутке времени.

##### «vt_quota_time» `[int]`
- (См. Описание выше).

#### «urlscanner» (Категория)
Конфигурация для URL сканер.

##### «google_api_key» `[string]`
- Активировать Google Safe Browsing API интеграция если необходимое API ключ вводится.

Смотрите также:
- [Google API Console](https://console.developers.google.com/)

##### «maximum_api_lookups» `[int]`
- Максимально допустимая количество API звонков, которые проводятся в каждом сессии сканирования. Потому каждый дополнительный API запрос, увеличивает время для сессии сканирования, Вы мог бы хотите, чтобы указать предел при определенных обстоятельствах чтобы ускорить процесс сканирования по всему. Если 0 установлен, нет предела применяется. Стандарт, значение установленов 10.

##### «maximum_api_lookups_response» `[bool]`
- Что должно произойти, если максимальное число допустимых API запросов будет достигнута? False = Не делайте ничего (Продолжить обработку) [Стандарт]; True = Отметить/блокировки файла.

##### «cache_time» `[int]`
- Как долго (в секундах) результаты API вызовов, которые должны быть в кэше? Стандарт 3600 секунд (1 час).

#### «legal» (Категория)
Конфигурация для юридических требований.

##### «pseudonymise_ip_addresses» `[bool]`
- Псевдонимный IP-адреса при записи файлов журнала? True = Да [Стандарт]; False = Нет.

##### «privacy_policy» `[string]`
- Адрес соответствующей политики конфиденциальности, отображаемый в нижнем колонтитуле любых сгенерированных страниц. Укажите URL-адрес, или оставьте пустым для отключения.

#### «supplementary_cache_options» (Категория)
Дополнительные параметры кэша. Примечание: Изменение этих значений потенциально может привести к выходу из системы.

##### «prefix» `[string]`
- Указанное здесь значение будет добавлено в начало всех ключей записи кэша. По стандарту пустой. Когда на одном сервере существует несколько установок, это может быть полезно для хранения их кэшей отдельно.

##### «enable_apcu» `[bool]`
- Указывает, использовать ли APCu для кэширования. Стандарт = True.

##### «enable_memcached» `[bool]`
- Указывает, использовать ли Memcached для кэширования. Стандарт = False.

##### «enable_redis» `[bool]`
- Указывает, использовать ли Redis для кэширования. Стандарт = False.

##### «enable_pdo» `[bool]`
- Указывает, использовать ли PDO для кэширования. Стандарт = False.

##### «memcached_host» `[string]`
- Значение хоста Memcached. Стандарт = «localhost».

##### «memcached_port» `[int]`
- Значение порта Memcached. Стандарт = «11211».

##### «redis_host» `[string]`
- Значение хоста Redis. Стандарт = «localhost».

##### «redis_port» `[int]`
- Значение порта Redis. Стандарт = «6379».

##### «redis_timeout» `[float]`
- Значение тайм-аута Redis. Стандарт = «2.5».

##### «pdo_dsn» `[string]`
- Значение DSN PDO. Стандарт = «mysql:dbname=phpmussel;host=localhost;port=3306».

__FAQ.__ <em><a href="https://github.com/phpMussel/Docs/blob/master/readme.ru.md#HOW_TO_USE_PDO" hreflang="ru">Что такое «PDO DSN»? Как я могу использовать PDO с phpMussel?</a></em>

##### «pdo_username» `[string]`
- Имя пользователя PDO.

##### «pdo_password» `[string]`
- Пароль PDO.

#### «frontend» (Категория)
Конфигурация для фронтенда.

##### «frontend_log» `[string]`
- Файл для запись всех попыток входа в фронтенд. Задайте имя файлу, или оставьте пустым чтобы деактивировать опцию.

##### «max_login_attempts» `[int]`
- Максимальное количество попыток входа в систему фронтенда. Стандарт = 5.

##### «numbers» `[string]`
- Как Вы предпочитаете номера для отображения? Выберите пример, который выглядит наиболее правильным для вас.

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

##### «default_algo» `[string]`
- Определяет, какой алгоритм использовать для всех будущих паролей и сеансов. Опции: PASSWORD_DEFAULT (стандарт), PASSWORD_BCRYPT, PASSWORD_ARGON2I (требует PHP >= 7.2.0), PASSWORD_ARGON2ID (требует PHP >= 7.3.0).

```
default_algo
├─PASSWORD_DEFAULT ("PASSWORD_DEFAULT")
├─PASSWORD_BCRYPT ("PASSWORD_BCRYPT")
├─PASSWORD_ARGON2I ("PASSWORD_ARGON2I")
└─PASSWORD_ARGON2ID ("PASSWORD_ARGON2ID (PHP >= 7.3.0)")
```

##### «theme» `[string]`
- Эстетика использования для фронтенда phpMussel.

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
└─…Другие
```

##### «magnification» `[float]`
- Увеличение шрифта. Стандарт = 1.

#### «web» (Категория)
Конфигурация для обработчика загрузки.

##### «uploads_log» `[string]`
- Где все заблокированные загрузки должны быть зарегистрированы. Задайте имя файлу, или оставьте пустым чтобы деактивировать опцию.

##### «forbid_on_block» `[bool]`
- Возвращённый 403-HTTP-заголовок при заблокированной загрузке данных. False = Нет (200); True = Да (403) [Стандарт].

##### «unsupported_media_type_header» `[bool]`
- Должен ли phpMussel отправлять 415 заголовков, когда загрузка заблокирована из-за типов файлов, занесенных в черный список? Когда true, этот параметр заменяет `forbid_on_block`. False = Нет [Стандарт]; True = Да.

##### «max_uploads» `[int]`
- Максимально разрешённое количество проверяемых файлов в течение одной загрузки файлов. Если количество скачиваемых файлов превышает это значение, то, прежде чем сканирование прекратится, пользователь будет об этом проинформирован. Эта опция защищает от теоретической DDoS-атаки на вашу систему или CMS, тем что, пока агрессор перегружает phpMussel, останавливается PHP-процесс. Рекомендуется установить число 10. В зависимости от мощности вашего устройства Вы можете повышать или уменьшать это значение. Внимание! Это значение не учитывает содержание архивов.

##### «ignore_upload_errors» `[bool]`
- Как правило, эта директива находится в положении False/Деактивировано, если только нет потребности в ней для правильного функционирования phpMussel на вашей системе. При находящейся в положении False/Деактивировано директиве phpMussel, опознав нѐкий элемент в `$_FILES` array(), начинает проверять файлы, представляющие этот элемент. В случае если файлы окажутся пустыми, phpMussel подаёт сигнал тревоги. Это нормальная реакция phpMussel. Однако некоторые CMS нормальными считают пустые элементы в `$_FILES`, и сигнал тревоги подаётся в случае отсутствия пустых элементов. В этой ситуации возникает конфликт между нормальным поведением phpMussel и CMS. Если это касается вашей CMS, то вам необходимо переключить опцию в позицию True/Активировано, тогда phpMussel не будет искать пустые элементы, а найдя будет их игнорировать, не сообщая об ошибке. Сигнал запроса страницы, таким образом, может продолжаться. False = Деактивировано; True = Активировано.

##### «theme» `[string]`
- Эстетика для использования на странице «Загрузка Отказана».

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
└─…Другие
```

##### «magnification» `[float]`
- Увеличение шрифта. Стандарт = 1.

#### «phpmailer» (Категория)
Конфигурация для PHPMailer (используется для двухфакторной аутентификации).

##### «event_log» `[string]`
- Файл для регистрации всех событий в отношении PHPMailer. Задайте имя файлу, или оставьте пустым чтобы деактивировать опцию.

##### «enable_two_factor» `[bool]`
- Эта директива включает/отключает использование 2FA для фронтенд счетов.

##### «enable_notifications» `[string]`
- Если вы хотите получать уведомления по электронной почте, когда загрузка заблокирована, укажите адрес электронной почты получателя здесь.

##### «skip_auth_process» `[bool]`
- Установка этой директивы на `true` указывает PHPMailer пропустить обычный процесс проверки подлинности, который обычно возникает при отправке электронной почты через SMTP. Этого следует избегать, поскольку пропуская этот процесс может выдать исходящую электронную почту для атак MITM, но может потребоваться в тех случаях, когда этот процесс препятствует подключению PHPMailer к SMTP-серверу.

##### «host» `[string]`
- Хост SMTP используется для исходящей электронной почты.

##### «port» `[int]`
- Номер порта для исходящей электронной почты. Стандарт = 587.

##### «smtp_secure» `[string]`
- Протокол для при отправке электронной почты через SMTP (TLS или SSL).

```
smtp_secure
├─default ("-")
├─tls ("TLS")
└─ssl ("SSL")
```

##### «smtp_auth» `[bool]`
- Эта директива включает/отключает аутентификацию сессия SMTP (обычно ее следует оставить в покое).

##### «username» `[string]`
- Имя пользователя для отправки электронной почты через SMTP.

##### «password» `[string]`
- Пароль для отправки электронной почты через SMTP.

##### «set_from_address» `[string]`
- Адрес отправителя для отправки электронной почты через SMTP.

##### «set_from_name» `[string]`
- Имя отправителя для отправки электронной почты через SMTP.

##### «add_reply_to_address» `[string]`
- Адрес ответа для отправки электронной почты через SMTP.

##### «add_reply_to_name» `[string]`
- Имя ответа для отправки электронной почты через SMTP.

---


### 6. <a name="SECTION6"></a>ФОРМАТ СИГНАТУРЕЙ

*Смотрите также:*
- *[Что такое «сигнатур»?](#WHAT_IS_A_SIGNATURE)*

Первые 9 байтов `[x0-x8]` файла сигнатуры phpMussel: `phpMussel`. Это действует как «магическое число» (magic number), чтобы идентифицировать их как файлы сигнатуры (это помогает предотвратить случайное использование файлов, которые не являются сигнатурными файлами). Следующий байт `[x9]` определяет тип файла сигнатуры, который phpMussel должен знать, чтобы иметь возможность правильно интерпретировать файл сигнатуры. Признаются следующие типы файлов сигнатур:

Тип | Байт | Описание
---|---|---
`General_Command_Detections` | `0?` | Для файлов сигнатуры CSV (с разделителями-запятыми). Значения (сигнатуры) представляют собой строки с шестнадцатеричным кодированием для поиска внутри файлов. Сигнатуры здесь не имеют никаких имен или других деталей.
`Filename` | `1?` | Для сигнатуры имен файлов.
`Hash` | `2?` | Для сигнатуры хэш.
`Standard` | `3?` | Для файлов сигнатуры, которые работают непосредственно с содержимым файла.
`Standard_RegEx` | `4?` | Для файлов сигнатуры, которые работают непосредственно с содержимым файла. Сигнатуры могут содержать регулярные выражения.
`Normalised` | `5?` | Для файлов сигнатуры, которые работают с ANSI-нормализованным содержимым файла.
`Normalised_RegEx` | `6?` | Для файлов сигнатуры, которые работают с ANSI-нормализованным содержимым файла. Сигнатуры могут содержать регулярные выражения.
`HTML` | `7?` | Для файлов сигнатуры, которые работают с HTML-нормализованным содержимым файла.
`HTML_RegEx` | `8?` | Для файлов сигнатуры, которые работают с HTML-нормализованным содержимым файла. Сигнатуры могут содержать регулярные выражения.
`PE_Extended` | `9?` | Для файлов сигнатуры, которые работают с метаданными PE (кроме метаданных секторов PE).
`PE_Sectional` | `A?` | Для файлов сигнатуры, которые работают с метаданных секторов PE.
`Complex_Extended` | `B?` | Для файлов сигнатуры, которые работают с различными правилами на основе расширенных метаданных, сгенерированных phpMussel.
`URL_Scanner` | `C?` | Для файлов сигнатуры, которые работают с URL-адресами.

Следующий байт: `[x10]`. Это символ новой строки, `[0A]`. На этом завершается заголовок файла сигнатуры phpMussel.

Каждая непустая строка после этого является сигнатурой или правилом. Каждая сигнатур или правило занимает одну строку. Поддерживаемые форматы сигнатуры описаны ниже.

#### *СИГНАТУРЫ НАЗВАНИЙ ФАЙЛОВ*
Все сигнатуры названий файлов имеют следующий формат:

`NAME:FNRX`

NAME = Название сигнатуры; FNRX = Regex-образец опознания для сравнения (декодированных) названий файлов.

#### *СИГНАТУРЫ ХЭШ*
Все сигнатуры хэш имеют следующий формат:

`HASH:FILESIZE:NAME`

HASH = Это хэш (обычно MD5) всего файла; FILESIZE = Это общий объём файла; NAME = Название сигнатуры.

#### *PE-СЕКЦИОННЫЕ СИГНАТУРЫ*
Все PE-секционные сигнатуры имеют следующий формат:

`SIZE:HASH:NAME`

HASH = Это MD5-Hash одной PE-секции файла; FILESIZE = Общий объём PE-секции; NAME = Название сигнатуры.

#### *PE РАСШИРЕННЫХ СИГНАТУРЕЙ*
Все PE расширенных сигнатурей имеют следующий формат:

`$VAR:HASH:SIZE:NAME`

Where $VAR is the name of the PE variable to match against, HASH is the MD5 hash of that variable, SIZE is the total size of that variable and NAME is the name to cite for that signature.

#### *КОМПЛЕКС РАСШИРЕННЫХ СИГНАТУРЕЙ*
Сигнатуры, входящие в комплекс расширенных сигнатурей, сильно отличаются от других видов возможных сигнатурей phpMussel. По многим критериям они не согласуются с тем, что специфицируют сигнатуры. Критерии соответствия разделяются между собой «;». Тип и данные каждой критерии соответствия отделяются друг от друга «:». Формат этой сигнатуры выглядит примерно так:

`$variable1:SOMEDATA;$variable2:SOMEDATA;SignatureName`

#### *ВСЕ ПРОЧИЕ СИГНАТУРЫ*
Все прочие сигнатуры имеют следующий формат:

`NAME:HEX:FROM:TO`

NAME = Название сигнатуры; HEX = Сегмент файла, закодированный в шестнадцатеричный системе счисления (hexadecimal), который будет проверяться вместе с данной подписью. FROM и TO = Опциональный параметры, задающие для проверки старт и конечный пункт в исходных данных.

#### *REGEX (REGULAR EXPRESSIONS)*
Каждая форма регулярных выражений, понятных и правильно загружаемых PHP, должна также пониматься и phpMussel, чтобы правильно загружать сигнатуры. Будьте крайне осторожны в написании новых сигнатурей, базирующихся на регулярных выражениях. Неумелые действия могут привести к неправильным и/или неожиданным результатам. Если у вас нет абсолютной уверенности, то посмотрите исходный текст phpMussel, описывающий процесс обработки регулярных выражений. Помните, что все поисковые образцы, кроме названия файлов, архива метаданных и MD5-проверочных образцов, должны быть закодированы в шестнадцатеричный системе счисления (за исключением синтаксис, естественно)!

---


### 7. <a name="SECTION7"></a>ИЗВЕСТНЫЕ ПРОБЛЕМЫ СОВМЕСТИМОСТИ

#### СОВМЕСТИМОСТЬ С АНТИВИРУСНЫМ ПРОГРАММНЫМ ОБЕСПЕЧЕНИЕМ

Известно, что проблемы совместимости между phpMussel и некоторыми поставщиками антивирусов иногда возникали в прошлом, так каждые несколько месяцев или около того, я проверяю последние доступные версии кодовая база phpMussel против Virus Total, чтобы увидеть, есть ли там какие-либо проблемы. Когда о проблемах сообщают там, я перечисляю сообщенные проблемы здесь, в документации.

Когда я последний раз проверял (2022.05.12), проблем не было.

Я не проверяю файлы сигнатуры, документацию или другое периферийное содержимое. Файлы сигнатур всегда вызывают ложноположительный, когда другие антивирусные решения обнаруживают их. Поэтому я настоятельно рекомендую, если вы планируете установить phpMussel на компьютер, где уже существует другое антивирусное решение, внести в белый список файлы сигнатуры phpMussel.

*Смотрите также: [Графики Совместимости](https://maikuolan.github.io/Compatibility-Charts/).*

---


### 8. <a name="SECTION8"></a>ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ (FAQ)

- [Что такое «сигнатур»?](#WHAT_IS_A_SIGNATURE)
- [Что такое «ложноположительный»?](#WHAT_IS_A_FALSE_POSITIVE)
- [Как часто обновляются сигнатуры?](#SIGNATURE_UPDATE_FREQUENCY)
- [Я столкнулся с проблемой при использовании phpMussel, и я не знаю, что с этим делать! Пожалуйста помоги!](#ENCOUNTERED_PROBLEM_WHAT_TO_DO)
- [Я хочу использовать phpMussel v3 с версией PHP ниже 7.2.0; Вы можете помочь?](#MINIMUM_PHP_VERSION_V3)
- [Могу ли я использовать одну установку phpMussel для защиты нескольких доменов?](#PROTECT_MULTIPLE_DOMAINS)
- [Я не хочу возиться с установкой этого и заставить его работать с моим сайтом; Могу я просто заплатить вам за все это?](#PAY_YOU_TO_DO_IT)
- [Могу ли я нанять вас или любого из разработчиков этого проекта для частной работы?](#HIRE_FOR_PRIVATE_WORK)
- [Мне нужны модификации специалиста, настройки и т.д; Вы можете помочь?](#SPECIALIST_MODIFICATIONS)
- [Я разработчик, веб-дизайнер, или программист. Могу ли я принять или предложить работу, связанную с этим проектом?](#ACCEPT_OR_OFFER_WORK)
- [Я хочу внести свой вклад в проект; Я могу сделать это?](#WANT_TO_CONTRIBUTE)
- [Как получить доступ к конкретным сведениям о файлах при их сканировании?](#SCAN_DEBUGGING)
- [Черные списки – Белые списки – Серые списки – Каковы они и как их использовать?](#BLACK_WHITE_GREY)
- [Что такое «PDO DSN»? Как я могу использовать PDO с phpMussel?](#HOW_TO_USE_PDO)
- [Моя функция загрузки асинхронна (например, использует ajax, ajaj, json и т.д.). Я не вижу специальных сообщений или предупреждений, когда загрузка заблокирована. В чем дело?](#AJAX_AJAJ_JSON)
- [Может ли phpMussel обнаружить EICAR?](#DETECT_EICAR)

#### <a name="WHAT_IS_A_SIGNATURE"></a>Что такое «сигнатур»?

В контексте phpMussel, «сигнатур» относится к данным, которые служат идентификатор/индикатором того, что мы ищем, обычно в виде какого-то очень маленького, отчетливого, безобидного сегмента чего-то большего и в противном случае вредного, как вирус или троянец, или в виде контрольной суммы файла, хэша или другого аналогично идентифицирующего индикатора, и обычно включает ярлык, И некоторые другие данные, чтобы помочь предоставить дополнительный контекст, который может быть использован phpMussel для определения наилучшего способа продолжения, когда он встречает то, что мы ищем.

#### <a name="WHAT_IS_A_FALSE_POSITIVE"></a>Что такое «ложноположительный»?

Термин «ложноположительный» (*альтернативно: «ложноположительными ошибка»; «ложная сигнализация»*; Английский: *false positive*; *false positive error*; *false alarm*), описал очень просто, и в обобщенном контексте, используется при проверке условия, для ссылаясь на результаты этого теста, когда результаты будут положительный (то есть, условия определяется будут «положительный», или «истинно»), но как ожидается будет (или должно было) отрицательный (то есть, условие, в действительности, является «отрицательный», или «ложно»). Термин «ложноположительный» можно было бы считать аналогом «плачет волк» (английский идиома в которой условие проверяется является ли там волк возле стада, условие является «ложно» в том, что нет никакого волка возле стада, и условие сообщается «положительный» посредством пастух путем кричать «волк, волк»), или аналогично ситуации в медицинском тестировании в которой пациент диагностирован как какую-то болезнь, когда в действительности, у них нет болезни.

Связанные результаты при проверке условия можно описать с использование терминов «истинноположительный», «истинноотрицательный» и «ложноотрицательный». «Истинноположительный» описывает когда результаты испытаний и фактическое состояние условия оба являются истинными (или положительные), и «истинноотрицательный» описывает когда результаты испытаний и фактическое состояние условия оба являются ложными (или отрицательные); «Истинноположительный» или «истинноотрицательный» рассматриваются как «правильный вывод». Противоположностью «ложноположительный» является «ложноотрицательный»; «Ложноотрицательный» описывает когда результаты испытаний отрицательные (то есть, условие определяется как отрицательные, или ложными), но как ожидается будет (или должно было) положительные (то есть, условие, в действительности, является «положительный», или «истинно»).

В контексте phpMussel, эти термины относятся к сигнатур phpMussel и файлы которые они блокируют. Когда phpMussel блокирует файл из-за плохой, устаревшей или неправильной сигнатур, но не должно быть сделано, или когда он делает это по неправильным причинам, мы называем это событие как «ложноположительный». Когда phpMussel не удается блокировать файл, который должен был быть заблокированы, из-за непредвиденных угроз, недостающие сигнатур или недостатки в своих сигнатурей, мы называем это событие как «обнаружение не удалось» (аналогична «ложноотрицательный»).

Это может быть суммированы в таблице ниже:

&nbsp; | phpMussel *НЕ* должны блокировать файл | phpMussel *ДОЛЖНЫ* блокировать файл
---|---|---
phpMussel *НЕ* блокирует файл | Истинноотрицательный (правильный вывод) | Обнаружение не удалось (аналогична ложноотрицательный)
phpMussel *ДЕЛАЕТ* блокирует файл | __Ложноположительный__ | Истинноположительный (правильный вывод)

#### <a name="SIGNATURE_UPDATE_FREQUENCY"></a>Как часто обновляются сигнатуры?

Частота обновления зависит от файлов сигнатур. Предпринята попытка обновить файлов сигнатур в максимально возможной степени, но, потому всех нас есть различные другие обязательства, наша жизнь вне проекта, и мы не получаем материальной компенсации (т.е., оплата) за наши усилия по проекту, точный график обновления не может быть гарантирован. В общем, обновления происходят, когда есть время. Помощь всегда приветствуется, если Вы готовы предложить любую.

#### <a name="ENCOUNTERED_PROBLEM_WHAT_TO_DO"></a>Я столкнулся с проблемой при использовании phpMussel, и я не знаю, что с этим делать! Пожалуйста помоги!

- Используете ли Вы последнюю версию программного обеспечения? Используете ли Вы последние версии ваших файлов сигнатуры? Если ответ на любой из этих двух вопросов отрицательный, попробуйте сначала обновить все, и попытайтесь решить проблема. Если оно сохраняется, продолжайте чтение.
- Вы проверили всю документацию? Если нет, сделайте это. Если проблема не может быть решена с помощью документации, продолжите чтение.
- Вы проверили **[странице «issues»](https://github.com/phpMussel/phpMussel/issues)**, чтобы узнать упоминалась ли эта проблема ранее? Если это было уже упоминалось, проверить были ли предоставлены какие-либо предложения, идеи и/или решения, и следуйте по необходимости чтобы попытаться решить проблема.
- Если проблема не решена, пожалуйста, обратитесь за помощью, создав новую «issue» на странице «issues».

#### <a name="MINIMUM_PHP_VERSION_V3"></a>Я хочу использовать phpMussel v3 с версией PHP ниже 7.2.0; Вы можете помочь?

Нет. PHP >= 7.2.0 является минимальным требованием для phpMussel v3.

*Смотрите также: [Графики Совместимости](https://maikuolan.github.io/Compatibility-Charts/).*

#### <a name="PROTECT_MULTIPLE_DOMAINS"></a>Могу ли я использовать одну установку phpMussel для защиты нескольких доменов?

Да.

#### <a name="PAY_YOU_TO_DO_IT"></a>Я не хочу возиться с установкой этого и заставить его работать с моим сайтом; Могу я просто заплатить вам за все это?

Может быть. Это рассматривается в каждом конкретном случае. Расскажите, что вам нужно, что Вы предлагаете, и мы расскажем вам, можем ли мы помочь.

#### <a name="HIRE_FOR_PRIVATE_WORK"></a>Могу ли я нанять вас или любого из разработчиков этого проекта для частной работы?

*См. Выше.*

#### <a name="SPECIALIST_MODIFICATIONS"></a>Мне нужны модификации специалиста, настройки и т.д; Вы можете помочь?

*См. Выше.*

#### <a name="ACCEPT_OR_OFFER_WORK"></a>Я разработчик, веб-дизайнер, или программист. Могу ли я принять или предложить работу, связанную с этим проектом?

Да. Наша лицензия не запрещает это.

#### <a name="WANT_TO_CONTRIBUTE"></a>Я хочу внести свой вклад в проект; Я могу сделать это?

Да. Вклады в проект очень приветствуются. Для получения дополнительной информации см. «CONTRIBUTING.md».

#### <a name="SCAN_DEBUGGING"></a>Как получить доступ к конкретным сведениям о файлах при их сканировании?

Вы можете сделать это, назначив массив для использования для этой цели, прежде чем указывать phpMussel для их сканирования.

В приведенном ниже примере, Для этой цели назначается `$Foo`. После сканирования `/путь/к/файлу/...`, подробная информация о файлах, содержащихся в `/путь/к/файлу/...`, будет содержаться в `$Foo`.

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);

$Scanner->setScanDebugArray($Foo);

$Results = $Scanner->scan('/путь/к/файлу/...');

var_dump($Foo);
```

Массив многомерен, состоящий из элементов, представляющих каждый сканируемый файл, и подэлементы представляют данные об этих файлах. Эти подэлементы следующие:

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

*† - Не предоставляется кэшированными результатами (предоставляется только для новых результатов сканирования).*

*‡ - Предоставляется только при сканировании файлов PE.*

Необязательно, этот массив можно уничтожить, используя следующее:

```PHP
$Scanner->destroyScanDebugArray($Foo);
```

#### <a name="BLACK_WHITE_GREY"></a>Черные списки – Белые списки – Серые списки – Каковы они и как их использовать?

Термины передают различные значения в разных контекстах. В phpMussel существуют три контекста, в которых используются эти термины: Ответ размер файла, ответ тип файла, и серые списки сигнатуры.

Для достижения желаемого результата при минимальных затратах на обработку, есть некоторые простые вещи, которые phpMussel может проверить до фактического сканирования файлов, такие как размер, имя и расширение файла. Например; Если файл слишком велик, или если его расширение указывает тип файла, который мы не хотим разрешать на наших веб-сайтах, мы можем немедленно пометить файл и не нужно его сканировать.

Ответ размер файла: Так реагирует phpMussel, когда файл превышает указанный предел. Никаких фактических списков не задействован, но файл может считаться эффективно занесенным в черный список, белый список, или серый список, в зависимости от его размера. Существуют две отдельные опциональные директивы конфигурации для указания предела и желаемого ответа соответственно.

Ответ тип файла: Так реагирует phpMussel на расширение файла. Существуют три отдельные опциональные директивы конфигурации, позволяющие явно указывать, какие расширения должны быть занесены в черный список, белый список, или серый список. Файл может считаться эффективно занесенным в черный список, белый список, или серый список, если его расширение соответствует любому из указанных расширений соответственно.

В этих двух контекстах, включение в белый список означает, что оно не должно сканироваться или пометить; включение в черный список означает, что оно должно быть пометито (и поэтому нам не нужно сканировать его); и включение в серый список означает, требуется дальнейший анализ, чтобы определить, следует ли его пометить (то есть, он должен быть отсканирован).

Серые списки сигнатуры: Список сигнатурей, которые следует по существу игнорировать (это кратко упоминается ранее в документации). Когда срабатывает сигнатуры в серый список, phpMussel продолжает работать через свои сигнатуры и не предпринимает особых действий в отношении сигнатуры на серый список. Нет черного списка сигнатур, потому что подразумеваемое поведение то же самое как нормальное поведение для инициированных сигнатурей в любом случае, и нет белого списка сигнатур, потому что подразумеваемое поведение не имеет особого смысла в отношении того, как работает phpMussel и функциональность, которая уже существует.

Серый список: Полезен, если вам нужно разрешить проблемы, вызванные конкретной сигнатурой, без отключения или удаления всего файла сигнатуры.

#### <a name="HOW_TO_USE_PDO"></a>Что такое «PDO DSN»? Как я могу использовать PDO с phpMussel?

«PDO» является акроним для «[PHP Data Objects](https://www.php.net/manual/ru/intro.pdo.php)» (объектов данных PHP). Он предоставляет интерфейс для PHP, чтобы иметь возможность подключаться к некоторым системам баз данных, обычно используемым различными приложениями PHP.

«DSN» является акроним для «[data source name](https://en.wikipedia.org/wiki/Data_source_name)» (имени источника данных). «PDO DSN» описывает как PDO должен подключаться к базе данных.

phpMussel предоставляет возможность использовать PDO для целей кэширования. Чтобы это работало должным образом, вам необходимо соответствующим образом настроить phpMussel, включив PDO, создать новую базу данных для phpMussel использовать (если вы еще не имеете в виду базу данных для phpMussel использовать), и создать новую Таблица в вашей базе данных в соответствии со структурой, описанной ниже.

Когда соединение с базой данных успешно, но необходимая таблица не существует, автоматическое создание таблицы будет предпринято. Тем не менее, это поведение не было тщательно проверено, и успех не может быть гарантирован.

Это, конечно, применимо, только если вы действительно хотите, чтобы phpMussel использовал PDO. Если вы достаточно довольны тем, что phpMussel использует кэширование плоских файлов (в соответствии с его конфигурацией по умолчанию) или любые другие предоставляемые опции кэширования, вам не нужно беспокоиться о настройке баз данных, таблиц, и т.д.

Структура, описанная ниже, использует «phpmussel» в имени базы данных, но вы можете использовать любое имя, которое вы хотите для своей базы данных, при условии, что это же имя реплицируется в конфигурации DSN.

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

Директива конфигурации phpMussel `pdo_dsn` должна быть настроена, как описано ниже.

```
Согласно базе данных драйвер используется...
├─4d (Предупреждение: экспериментально, не проверено, не рекомендуется!)
│ │
│ │         ╔═══════╗
│ └─4D:host=localhost;charset=UTF-8
│           ╚╤══════╝
│            └Хост, с которым нужно связаться, чтобы найти базу данных.
├─cubrid
│ │
│ │             ╔═══════╗      ╔═══╗        ╔═════╗
│ └─cubrid:host=localhost;port=33000;dbname=example
│               ╚╤══════╝      ╚╤══╝        ╚╤════╝
│                │              │            └Имя базы данных для
│                │              │             использования.
│                │              │
│                │              └Номер порта для подключения к хосту.
│                │
│                └Хост, с которым нужно связаться, чтобы найти базу данных.
├─dblib
│ │
│ │ ╔═══╗      ╔═══════╗        ╔═════╗
│ └─dblib:host=localhost;dbname=example
│   ╚╤══╝      ╚╤══════╝        ╚╤════╝
│    │          │                └Имя базы данных для использования.
│    │          │
│    │          └Хост, с которым нужно связаться, чтобы найти базу данных.
│    │
│    └Возможные значения: «mssql», «sybase», «dblib».
├─firebird
│ │
│ │                 ╔═══════════════════╗
│ └─firebird:dbname=/path/to/database.fdb
│                   ╚╤══════════════════╝
│                    ├Может быть путем к файлу локальной базы данных.
│                    │
│                    ├Может соединиться с хостом и номером порта.
│                    │
│                    └Вам следует обратиться к документации Firebird, если вы
│                     хотите использовать это.
├─ibm
│ │
│ │         ╔═════╗
│ └─ibm:DSN=example
│           ╚╤════╝
│            └Каталогизированная база данных для связи.
├─informix
│ │
│ │              ╔═════╗
│ └─informix:DSN=example
│                ╚╤════╝
│                 └Каталогизированная база данных для связи.
├─mysql (Наиболее рекомендуется!)
│ │
│ │              ╔═════╗      ╔═══════╗      ╔══╗
│ └─mysql:dbname=example;host=localhost;port=3306
│                ╚╤════╝      ╚╤══════╝      ╚╤═╝
│                 │            │              └Номер порта для подключения к
│                 │            │               хосту.
│                 │            │
│                 │            └Хост, с которым нужно связаться, чтобы найти
│                 │             базу данных.
│                 │
│                 └Имя базы данных для использования.
├─oci
│ │
│ │            ╔═════╗
│ └─oci:dbname=example
│              ╚╤════╝
│               ├Может ссылаться на конкретную каталогизированную базу данных.
│               │
│               ├Может соединиться с хостом и номером порта.
│               │
│               └Вам следует обратиться к документации Oracle, если вы хотите
│                использовать это.
├─odbc
│ │
│ │      ╔═════╗
│ └─odbc:example
│        ╚╤════╝
│         ├Может ссылаться на конкретную каталогизированную базу данных.
│         │
│         ├Может соединиться с хостом и номером порта.
│         │
│         └Вам следует обратиться к документации ODBC/DB2, если вы хотите
│          использовать это.
├─pgsql
│ │
│ │            ╔═══════╗      ╔══╗        ╔═════╗
│ └─pgsql:host=localhost;port=5432;dbname=example
│              ╚╤══════╝      ╚╤═╝        ╚╤════╝
│               │              │           └Имя базы данных для использования.
│               │              │
│               │              └Номер порта для подключения к хосту.
│               │
│               └Хост, с которым нужно связаться, чтобы найти базу данных.
├─sqlite
│ │
│ │        ╔════════╗
│ └─sqlite:example.db
│          ╚╤═══════╝
│           └Путь к файлу локальной базы данных для использования.
└─sqlsrv
  │
  │               ╔═══════╗ ╔══╗          ╔═════╗
  └─sqlsrv:Server=localhost,1521;Database=example
                  ╚╤══════╝ ╚╤═╝          ╚╤════╝
                   │         │             └Имя базы данных для использования.
                   │         │
                   │         └Номер порта для подключения к хосту.
                   │
                   └Хост, с которым нужно связаться, чтобы найти базу данных.
```

Если вы не уверены, что использовать для какой-либо конкретной части вашего DSN, попробуйте сначала выяснить, работает ли она как есть, ничего не меняя.

Обратите внимание, что `pdo_username` и `pdo_password` должны совпадать с именем пользователя и паролем, которые вы выбрали для своей базы данных.

#### <a name="AJAX_AJAJ_JSON"></a>Моя функция загрузки асинхронна (например, использует ajax, ajaj, json и т.д.). Я не вижу специальных сообщений или предупреждений, когда загрузка заблокирована. В чем дело?

Это нормально. Стандартная страница phpMussel «Загрузка Отказана» обслуживается как HTML, которого должно быть достаточно для типичных синхронных запросов, но этого, вероятно, будет недостаточно если ваше функция загрузки ожидает чего-то другого. Если ваша функция загрузки является асинхронной или ожидает, что статус загрузки будет обслуживаться асинхронно, есть некоторые вещи которые вы можете попробовать сделать чтобы phpMussel соответствовал вашим функциональным возможностям загрузки.

1. Создание собственного шаблона вывода для обслуживания чего-то другого, кроме HTML.
2. Создание собственного плагина, позволяющего полностью обойти стандартную страницу «Загрузка Отказана» и, чтобы функция загрузки делает что-то еще, когда загрузка заблокирована (есть некоторые кодовые точки, предоставляемые обработчиком загрузка, которые могут быть полезны для этого).
3. Полностью отключите обработчик загрузки и просто вызовите phpMussel API из вашей функции загрузки.

#### <a name="DETECT_EICAR"></a>Может ли phpMussel обнаружить EICAR?

Да. Сигнатуры для обнаружения EICAR включена в «файл сигнатуры стандартных регулярных выражений phpMussel» (`phpmussel_regex.db`). Пока этот файл сигнатуры установлен и активирован, phpMussel должен уметь обнаруживать EICAR. Поскольку база данных ClamAV также включает множество сигнатур специально для обнаружения EICAR, ClamAV может легко обнаружить EICAR, но поскольку phpMussel использует только сокращенное подмножество сигнатур, предоставляемых ClamAV, их самих может быть недостаточно для phpMussel для обнаружения EICAR. Возможность его обнаружения также может зависеть от вашей точной конфигурации.

---


### 9. <a name="SECTION9"></a>ЛЕГАЛЬНАЯ ИНФОРМАЦИЯ

#### 9.0 ПРЕАМБУЛА РАЗДЕЛА

Этот раздел документации предназначен для описания возможных юридических соображений, касающихся использования и имплементации пакета, и предоставления некоторой базовой связанной информации. Это может быть важно для некоторых пользователей в качестве средства обеспечения соответствия любым юридическим требованиям, которые могут существовать в странах, в которых они работают, и некоторым пользователям, возможно, придется корректировать свои политики веб-сайта в соответствии с этой информацией.

Прежде всего, поймите, что я (автор пакета) не квалифицированный юрист любого рода. Поэтому я не имею юридической силы для предоставления юридических консультаций. Кроме того, в некоторых случаях, точные законодательные требования могут различаться между различными странами и юрисдикциями, и эти различные юридические требования могут иногда противоречить (таких как, например, в случае стран, которые поддерживают права на [неприкосновенность частной жизни](https://ru.wikipedia.org/wiki/%D0%9D%D0%B5%D0%BF%D1%80%D0%B8%D0%BA%D0%BE%D1%81%D0%BD%D0%BE%D0%B2%D0%B5%D0%BD%D0%BD%D0%BE%D1%81%D1%82%D1%8C_%D1%87%D0%B0%D1%81%D1%82%D0%BD%D0%BE%D0%B9_%D0%B6%D0%B8%D0%B7%D0%BD%D0%B8), и [право быть забытым](https://ru.wikipedia.org/wiki/%D0%9F%D1%80%D0%B0%D0%B2%D0%BE_%D0%BD%D0%B0_%D0%B7%D0%B0%D0%B1%D0%B2%D0%B5%D0%BD%D0%B8%D0%B5), по сравнению с странами, которые предпочитают [расширенное хранение данных](https://ru.wikipedia.org/wiki/%D0%97%D0%B0%D0%BA%D0%BE%D0%BD_%D0%AF%D1%80%D0%BE%D0%B2%D0%BE%D0%B9)). Учтите также, что доступ к пакету не ограничивается конкретными странами или юрисдикциями, и, следовательно, пользовательская база пакетов, вероятно, будет географически разнообразной. При рассмотрении этих вопросов, я не в состоянии заявить, что это означает быть «юридически совместимым» для всех пользователей, во всех отношениях. Однако я надеюсь, что приведенная здесь информация поможет вам самим принять решение о том, что вы должны сделать, чтобы оставаться юридически совместимым в контексте пакета. Если у вас есть какие-либо сомнения относительно информации, или если вам нужна дополнительная помощь и рекомендации с юридической точки зрения, Я бы рекомендовал обратиться к квалифицированному юристу.

#### 9.1 ОТВЕТСТВЕННОСТЬ

В соответствии с уже заявленной лицензией на пакет, пакет предоставляется без каких-либо гарантий. Это включает (но не ограничивается) всю сферу ответственности. Пакет предоставляется вам для вашего удобства, в надежде, что он будет полезен, и что он принесет вам определенную пользу. Однако, независимо от того, используете ли вы или реализуете пакет, это ваш собственный выбор. Вы не обязаны использовать или внедрять пакет, но когда вы это делаете, вы несете ответственность за это решение. Ни я, ни другие участники пакета не несут юридическую ответственность за последствия решений, которые вы принимаете, независимо от того, являются ли они прямыми, косвенными, подразумеваемыми или нет.

#### 9.2 ТРЕТЬИ ЛИЦА

В зависимости от его точной конфигурации и имплементации пакет может передавать и обмениваться информацией с третьими лицами в некоторых случаях. Эта информация может быть определена как «[персональные данные](https://ru.wikipedia.org/wiki/%D0%9F%D0%B5%D1%80%D1%81%D0%BE%D0%BD%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B5_%D0%B4%D0%B0%D0%BD%D0%BD%D1%8B%D0%B5)» (PII/ПИИ) в некоторых контекстах, в некоторых юрисдикциях.

Как эта информация может использоваться этими третьими лицами, зависит от различных политик, установленных этими третьими лицами, и выходит за рамки этой документации. Однако, во всех таких случаях обмен информацией с этими третьими лицами может быть отключен. Во всех таких случаях, если вы решите включить его, вы несете ответственность за исследование любых проблем, которые могут возникнуть в отношении конфиденциальности, безопасности и использования PII/ПИИ этими третьими лицами. Если существуют какие-либо сомнения, или если вы неудовлетворены действиями этих третьих сторон в отношении PII/ПИИ, лучше всего отключить весь обмен информацией с этими третьими лицами.

В целях прозрачности тип информации, совместно используемой, и с кем, описан ниже.

##### 9.2.1 СКАНЕР URL

URL-адреса, найденные в файлах, могут быть переданы API Google Safe Browsing, в зависимости от того, как настроен пакет. Для правильной работы API Google Safe Browsing требуется использовать ключи API, поэтому по умолчанию он отключен.

*Соответствующие директивы конфигурации:*
- `urlscanner` -> `google_api_key`

##### 9.2.2 VIRUS TOTAL

Когда phpMussel сканирует загрузку файла, хэши этих файлов могут использоваться совместно с API Total Virus, в зависимости от того, как настроен пакет. Планируется также возможность совместного использования файлов в определенный момент в будущем, но эта функция не поддерживается пакетом в настоящее время. API Virus Total требуется ключ API для правильной работы, и поэтому отключен по умолчанию.

Информация (включая файлы и связанные метаданные файлов), отправленные в Virus Total, также могут быть отправлены их партнерам, аффилированным и другим в исследовательских целях. Это более подробно описано в их политике конфиденциальности.

*Видеть: [Privacy Policy &ndash; VirusTotal](https://support.virustotal.com/hc/en-us/articles/115002168385-Privacy-Policy).*

*Соответствующие директивы конфигурации:*
- `virustotal` -> `vt_public_api_key`

#### 9.3 ЖУРНАЛОВ

Журналов (альтернативно: регистрация, логгинг) – Это важная часть phpMussel по ряду причин. Без регистрируются может быть трудно диагностировать ложные-срабатывания, чтобы точно определить, насколько эффективный phpMussel в любом конкретном контексте, и может быть трудно определить, где его недостатки могут быть, и какие изменения могут потребоваться для его конфигурации или сигнатуры соответственно, чтобы он продолжал функционировать по назначению. Несмотря на это, регистрация может быть нежелательна для всех пользователей и остается полностью необязательной. Несмотря на это, регистрация может быть нежелательна для всех пользователей и остается полностью необязательной. В phpMussel регистрация по умолчанию отключена. Чтобы включить его, phpMussel должен быть настроен соответствующим образом.

Дополнительно, ли ведение журнала разрешено законом, и в какой степени (например, типы информации, которые могут быть зарегистрированы, как долго, и при каких обстоятельствах), может варьироваться в зависимости от юрисдикции и контекста, в котором реализуется phpMussel (например, если вы работаете как индивидуальный лицо, корпоративный лицо, если вы работаете на коммерческой или некоммерческой основе). Поэтому это может быть полезно для вас внимательно прочитать этот раздел.

phpMussel может выполнять несколько типов ведения журнала. Различные типы ведения журнала включают различные типы информации по разным причинам.

##### 9.3.0 СКАНИРОВАНИЕ ЖУРНАЛОВ

Когда включено в конфигурации пакета, phpMussel хранит журналы файлов, которые он сканирует. Этот тип ведения журнала доступен в двух разных форматах:
- Человекочитаемые лог-файлы.
- Сериализованные лог-файлы.

Записи в человекочитаемые лог-файлы обычно выглядят примерно так (в качестве примера):

```
Sun, 19 Jul 2020 13:33:31 +0800 Начало работы.
→ Проверяю «ascii_standard_testfile.txt».
─→ Обнаружено phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
Sun, 19 Jul 2020 13:33:31 +0800 Готово.
```

Запись журнала сканирования обычно включает следующую информацию:
- Дата и время сканирования файла.
- Имя сканируемого файла.
- Что было обнаружено в файле (если что-то было обнаружено).

*Соответствующие директивы конфигурации:*
- `general` -> `scan_log`
- `general` -> `scan_log_serialized`

Когда эти директивы остаются пустыми, этот тип ведения журнала останется отключенным.

##### 9.3.1 ЖУРНАЛ ЗАГРУЗОК

Когда включено в конфигурации пакета, phpMussel сохраняет журналы заблокированных загрузок.

*Например:*

```
Дата: Sun, 19 Jul 2020 13:33:31 +0800
IP-адрес: 127.0.0.x
== Результаты сканирования (почему помечены) ==
Обнаружено phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
== Реконструкция хэш-сигнатур ==
dcacac499064454218823fbabff7e09b5b011c0c877ee6f215f35bffb195b6e9:654:ascii_standard_testfile.txt
Помещен на карантин в «1595142388-2e017ea9ac1478e45dc15794a1fc18c0.qfu».
```

Эти записи журнала обычно включают следующую информацию:
- Дата и время, когда загрузка была заблокирована.
- IP-адрес, из которого произошла загрузка.
- Причина, по которой файл был заблокирован (что было обнаружено).
- Имя файла заблокировано.
- Контрольная сумма и размер файла заблокированы.
- Был ли файл помещен в карантин и под каким внутренним именем.

*Соответствующие директивы конфигурации:*
- `web` -> `uploads_log`

##### 9.3.2 ФРОНТЕНД ЖУРНАЛОВ

Этот тип ведения журнала связан с попытками входа в фронтенд и возникает только тогда, когда пользователь пытается войти в фронтенд (при условии, что фронтенд включен).

Эти записи журнала содержат IP-адрес пользователя, пытающегося войти в систему, дату и время совершения попытки, и результаты попытки (успешно вошел в систему или не смог войти в систему). Обычно они выглядят примерно так (в качестве примера):

```
x.x.x.x - Day, dd Mon 20xx hh:ii:ss +0000 - "admin" - Вошли в систему.
```

*Соответствующие директивы конфигурации:*
- `general` -> `frontend_log`

##### 9.3.3 ВРАЩЕНИЕ ЖУРНАЛА

Возможно, вы захотите очистить журналы через определенный промежуток времени или, возможно, потребуется сделать это по закону (то есть, количество времени, которое законно допустимо для вас сохранять журналы, может быть ограничено законом). Вы можете достичь этого, включив маркеры даты/времени в имена ваших файлов журналов в соответствии с настройками вашего пакета (например, `{yyyy}-{mm}-{dd}.log`), и затем разрешить вращение журнала (поворот журнала позволяет выполнять некоторые действия на лог-файлах при превышении указанных пределов).

Например: Если мне было необходимо закончить журналы через 30 дней, я мог бы указать `{dd}.log` в именах моих лог-файлов (`{dd}` представляет дни), установить значение `log_rotation_limit` в 30, и установить значение `log_rotation_action` в `Delete`.

И наоборот, если вам необходимо сохранять журналы в течение длительного периода времени, вы можете либо не использовать поворот журнала вообще, либо вы можете установить значение `log_rotation_action` в `Archive`, чтобы сжать лог-файлы, тем самым уменьшив общий объем занимаемого ими дискового пространства.

*Соответствующие директивы конфигурации:*
- `general` -> `log_rotation_limit`
- `general` -> `log_rotation_action`

##### 9.3.4 УСЕЧЕНИЕ ЖУРНАЛА

Также возможно обрезать отдельные лог-файлы, если они превышают определенный размер, если это то, что вы хотите/нуждаетесь сделать.

*Соответствующие директивы конфигурации:*
- `general` -> `truncate`

##### 9.3.5 ПСЕВДОНИМИЗАЦИЯ IP-АДРЕСА

Во-первых, если вы не знакомы с термином, «псевдонимизация» относится к обработке персональных данных таким образом, что она не может быть идентифицирована ни с каким конкретным объектом данных без дополнительной информации, и при условии, что такая дополнительная информация поддерживается отдельно и подлежит техническим и организационным мерам для обеспечения того, чтобы личные данные не могли быть идентифицированы ни одному физическому лицу.

В некоторых случаях вам может быть юридически требуется анонимизировать или псевдонимизировать любого PII/ПИИ, собранного, обработанного, или сохраненного. Хотя эта концепция существует уже довольно давно, GDPR/DSGVO особенно упоминает и специально поощряет «псевдонимизация».

phpMussel может псевдонимизировать IP-адреса при входе в журналы, если это то, что вы хотите/нуждаетесь сделать. Когда phpMussel псевдонимизирует IP-адреса, при входе в журналы, окончательный октет адресов IPv4, и все после второй части адресов IPv6 представлено символом «x» (эффективно округляя адреса IPv4 до начального адреса 24-й подсети, в которую они входят, и адреса IPv6 на начальный адрес 32-й подсети, в которую они входят).

*Соответствующие директивы конфигурации:*
- `legal` -> `pseudonymise_ip_addresses`

##### 9.3.6 СТАТИСТИКА

phpMussel по желанию может отслеживать статистику, такую как общее количество файлов, отсканированных и заблокированных с определенного момента времени. Эта функция отключена по умолчанию, но можно включить с помощью конфигурации пакета. Тип отслеживаемой информации не должен рассматриваться как PII/ПИИ.

*Соответствующие директивы конфигурации:*
- `general` -> `statistics`

##### 9.3.7 ШИФРОВАНИЕ

phpMussel не шифрует свой кэш или какую-либо информацию журнала. [Шифрование](https://ru.wikipedia.org/wiki/%D0%A8%D0%B8%D1%84%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5) кэша и журналов могут быть введены в будущем, но в настоящее время нет конкретных планов. Если вы обеспокоены тем, что несанкционированные сторонние лица получают доступ к частям phpMussel, которые могут содержать PII/ПИИ или конфиденциальную информацию, такую как ее кэш или журналы, я бы рекомендовал, чтобы phpMussel не был установлен в общедоступном месте (например, установить phpMussel за пределами стандартного каталога `public_html` или его эквивалента, доступного большинству стандартных веб-серверов) и я рекомендую применять соответствующие ограничительные разрешения для каталога установки. Если этого недостаточно для решения ваших проблем, настройте phpMussel таким образом, чтобы типы информации, вызывающие ваши проблемы, не собирались или не регистрировались в первую очередь (например, путем отключения ведения журнала).

#### 9.4 КУКИ

Когда пользователь успешно входит в фронтенд, phpMussel устанавливает [куки](https://ru.wikipedia.org/wiki/Cookie), чтобы иметь возможность запоминать пользователя для последующих запросов (то есть, куки используются для аутентификации пользователя в сеансе фронтенд). На странице входа в систему предупреждения куки отображаются на видном месте, предупреждающее пользователя о том, что куки будет установлен, если они участвуют в соответствующем действии. Куки не установлены ни в одном другом месте в кодовой базе.

#### 9.5 МАРКЕТИНГ И РЕКЛАМА

phpMussel не собирает и не обрабатывает какую-либо информацию для маркетинговых или рекламных целей и не продает и не получает прибыль от любой собранной или занесенной в журнал информации. phpMussel не коммерческим предприятием и не имеет отношения к каким-либо коммерческим интересам, поэтому делать это не имеет смысла. Это имело место с самого начала проекта и по-прежнему имеет место сегодня. Кроме того, делать эти вещи было бы контрпродуктивным для духа и намеченной цели проекта в целом, и до тех пор, пока я продолжаю поддерживать проект, никогда не произойдет.

#### 9.6 ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ

В некоторых случаях вам может быть юридически необходимо четко отображать ссылку на вашу политику конфиденциальности на всех страницах и разделах вашего сайта. Это может быть важно как средство обеспечения того, чтобы пользователи были хорошо информированы о ваших точных правилах конфиденциальности, типах PII/ПИИ, которые вы собираете, и о том, как вы собираетесь их использовать. Чтобы иметь возможность включить такую ссылку на странице phpMussel «Загрузка Отказана», предоставляется директива конфигурации для указания URL-адреса вашей политики конфиденциальности.

*Соответствующие директивы конфигурации:*
- `legal` -> `privacy_policy`

#### 9.7 GDPR/DSGVO

«Общее Регулирование Защиты Данных» – Это регламент Европейского Союза, который вступает в силу с 25 Мая 2018 года. Основная цель регулирования – Дать контроль гражданам и жителям ЕС в отношении их личных данных, и унифицировать регулирование в ЕС относительно конфиденциальности и личных данных.

Регулирование содержит конкретные положения, касающиеся обработки «[личной идентифицируемой информации](https://ru.wikipedia.org/wiki/%D0%9F%D0%B5%D1%80%D1%81%D0%BE%D0%BD%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B5_%D0%B4%D0%B0%D0%BD%D0%BD%D1%8B%D0%B5)» (PII/ПИИ) любых «субъектов данных», (любое идентифицированное или идентифицируемое физическое лицо) из или в пределах ЕС. Чтобы соответствовать регулированию, «предприятия» (согласно определению, указанным в регулирование), и любые соответствующие системы и процессы должны реализовать «конфиденциальность по дизайну» по умолчанию, должны использовать максимально возможные настройки конфиденциальности, должны обеспечивать необходимые гарантии для любой сохраненной или обработанной информации (включая, но не ограничиваясь, внедрение псевдонимизированный или полную анонимизированный данных), должны четко и недвусмысленно объявлять типы собираемых ими данных, как они обрабатывают его, по каким причинам, как долго они его сохраняют, и делится ли они этими данными с любыми третьими лицами, типами данных, совместно используемыми с третьими лицами, как, почему, и т.д.

Данные не могут быть обработаны, если нет законных оснований для этого, в соответствии с определением правила. Как правило, это означает, что для обработки данных субъекта данных на законной основе, это должно выполняться в соответствии с юридическими обязательствами, или только после того, как явное, хорошо информированное, однозначное согласие было получено от субъекта данных.

Поскольку аспекты регулирования могут развиваться во времени, чтобы избежать распространения устаревшей информации, лучше узнать о регулировании из авторитетного источника, а не просто включать соответствующую информацию в документацию к пакету (которые в конечном итоге могут устареть, поскольку регулирование развивается).

Некоторые рекомендуемые ресурсы для получения дополнительной информации:
- [Новый европейский регламент по защите данных – последствия для российских организаций](https://www.buzko.legal/content-ru/general-data-protection-regulation)
- [GDPR — новые правила обработки персональных данных в Европе для международного IT-рынка](https://habr.com/company/digitalrightscenter/blog/344064/)
- [Общий регламент по защите данных](https://ru.wikipedia.org/wiki/%D0%9E%D0%B1%D1%89%D0%B8%D0%B9_%D1%80%D0%B5%D0%B3%D0%BB%D0%B0%D0%BC%D0%B5%D0%BD%D1%82_%D0%BF%D0%BE_%D0%B7%D0%B0%D1%89%D0%B8%D1%82%D0%B5_%D0%B4%D0%B0%D0%BD%D0%BD%D1%8B%D1%85)
- [REGULATION (EU) 2016/679 OF THE EUROPEAN PARLIAMENT AND OF THE COUNCIL](https://eur-lex.europa.eu/legal-content/EN/TXT/?uri=celex:32016R0679)

---


Последнее обновление: 12 Мая 2022 г (2022.05.12).
