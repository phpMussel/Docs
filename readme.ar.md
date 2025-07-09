## <div dir="rtl">phpMussel v3 بالعربية</div>

### <div dir="rtl">المحتويات:</div>
<div dir="rtl"><ul>
 <li>١. <a href="#user-content-SECTION1">مقدمة</a></li>
 <li>٢. <a href="#user-content-SECTION2">كيفية التحميل</a></li>
 <li>٣. <a href="#user-content-SECTION3">كيفية الإستخدام</a></li>
 <li>٤. <a href="#user-content-SECTION4">تمديد PHPMUSSEL</a></li>
 <li>٥. <a href="#user-content-SECTION5">خيارات التكوين/التهيئة</a></li>
 <li>٦. <a href="#user-content-SECTION6">شكل/تنسيق التوقيع</a></li>
 <li>٧. <a href="#user-content-SECTION7">مشاكل التوافق المعروفة</a></li>
 <li>٨. <a href="#user-content-SECTION8">أسئلة وأجوبة (FAQ)</a></li>
 <li>٩. <a href="#user-content-SECTION9">المعلومات القانونية</a></li>
</ul></div>

*Regarding translations: My native language is English. Because this is a free and open-source hobby project which generates zero income, and translatable content is likely to change as the features and functionality supported by the project changes, it doesn't make sense for me to spend money for translations. Because I'm the sole author/developer/maintainer for the project and I'm not a ployglot, any translations I produce are very likely to contain errors. Sorry, but realistically, that won't ever change. If you find any such errors/typos/mistakes/etc, your assistance to correct them would be very much appreciated. Pull requests are invited and encouraged. Otherwise, if you find these errors too much to handle, just stick with the original English source. If a translation is irredeemably incomprehensible, let me know which, and I can delete it. If you're not sure how to perform pull requests, ask. I can help.*

---


### <div dir="rtl">١. <a name="SECTION1"></a>مقدمة</div>

<div dir="rtl">شكراً لك على إستخدام phpMussel، المبرمج بلغة PHP للكشف عن ملفات الإختراق والفيروسات والبرمجيات الخبيثة الموجودة حيث يعتمد السكربت على توقيعات ClamAV وغيرها.<br /><br /></div>

<div dir="rtl">حقوق النشر محفوظة ل <a dir="ltr" href="https://phpmussel.github.io/">PHPMUSSEL</a> لعام ٢٠١٣ وما بعده تحت رخصة GNU/GPLv2 للمبرمج <a dir="ltr" href="https://github.com/Maikuolan">Caleb M (Maikuolan)</a>.<br /><br /></div>

<div dir="rtl">هذا البرنامج مجاني، يمكنك تعديله وإعادة نشره تحت رخصة GNU. نشارك هذا السكربت على أمل أن تعم الفائدة لكن لا نتحمل أية مسؤولية أو أية ضمانات لاستخدامك، اطلع على تفاصيل رخصة GNU للمزيد من المعلومات عبر الملف "LICENSE.txt" وللمزيد من المعلومات:</div>
- <https://www.gnu.org/licenses/>.
- <https://opensource.org/licenses/>.

<div dir="rtl">شكر خاص ل<a dir="ltr" href="https://www.clamav.net/">ClamAV</a> لكل من الإلهام للمشروع والتواقيع التي يعمد عليها السكربت، والتي من دونها كان من الممكن أن لا يتم إنجاز هذا البرنامج أو بأفضل الأحوال ستكون قيمته محدودة جداً.<br /><br /></div>

<div dir="rtl">شكر خاص أيضاً ل GitHub و Bitbucket لإستضافتهم ملفات المشروع، وأيضاً لمصادر التوقيعات التي يستخدمها phpMussel مثل: <a dir="ltr" href="https://www.phishtank.com/">PhishTank</a> و <a dir="ltr" href="https://nlnetlabs.nl/">NLNetLabs</a> و <a dir="ltr" href="https://malware.expert/">Malware.Expert</a> وغيرهم، والشكر مقدم لكل من يدعم المشروع وشكراً لك لاستخدامك للسكربت.<br /><br /></div>

---


### <div dir="rtl">٢. <a name="SECTION2"></a>كيفية التحميل</div>

#### <div dir="rtl">٢.٠ تثبيت مع COMPOSER</div>

<div dir="rtl">الطريقة الموصى بها لتثبيت phpMussel v3 هي من خلال Composer.<br /><br /></div>

<div dir="rtl">من أجل الراحة، يمكنك تثبيت تبعيات phpMussel الأكثر شيوعًا عبر مستودع phpMussel الرئيسي القديم:<br /><br /></div>

`composer require phpmussel/phpmussel`

<div dir="rtl">بدلاً من ذلك، يمكنك اختيار التبعيات التي ستحتاجها بشكل فردي عند التنفيذ. من المحتمل جدًا أنك ستحتاج فقط إلى تبعيات محددة ولن تحتاج إلى كل شيء.<br /><br /></div>

<div dir="rtl">من أجل القيام بأي شيء باستخدام phpMussel، ستحتاج إلى قاعدة التعليمات البرمجية phpMussel الأساسية:<br /><br /></div>

`composer require phpmussel/core`

<div dir="rtl">يوفر منشأة إدارية أمامية لـ phpMussel:<br /><br /></div>

`composer require phpmussel/frontend`

<div dir="rtl">يوفر فحصًا تلقائيًا لتحميل الملفات لموقعك على الويب:<br /><br /></div>

`composer require phpmussel/web`

<div dir="rtl">يوفر القدرة على استخدام phpMussel كتطبيق تفاعلي لوضع CLI:<br /><br /></div>

`composer require phpmussel/cli`

<div dir="rtl">يوفر جسرًا بين phpMussel و PHPMailer، مما يمكّن phpMussel من استخدام PHPMailer للمصادقة الثنائية، وإشعار البريد الإلكتروني حول تحميل الملفات المحظورة، وما إلى ذلك:<br /><br /></div>

`composer require phpmussel/phpmailer`

<div dir="rtl">لكي يتمكن phpMussel من اكتشاف أي شيء، ستحتاج إلى تثبيت التوقيعات. لا توجد حزمة محددة لذلك. لتثبيت التوقيعات، راجع القسم التالي من هذا المستند.<br /><br /></div>

<div dir="rtl">بدلاً من ذلك، إذا كنت لا تريد استخدام Composer، فيمكنك تنزيل ملفات ZIP المعبأة مسبقًا من هنا:<br /><br /></div>

https://github.com/phpMussel/Examples

<div dir="rtl">تتضمن ملفات ZIP المعبأة مسبقًا جميع التبعيات المذكورة أعلاه، بالإضافة إلى جميع ملفات توقيع phpMussel القياسية، إلى جانب بعض الأمثلة المقدمة حول كيفية استخدام phpMussel في التنفيذ.<br /><br /></div>

#### <div dir="rtl"><a name="INSTALLING_SIGNATURES"></a>٢.١ تثبيت التوقيعات</div>

<div dir="rtl">التوقيعات مطلوبة من قبل phpMussel للكشف عن تهديدات محددة. هناك 2 طرق رئيسية لتثبيت التوقيعات:<br /><br /></div>

<div dir="rtl"><ul>
 <li>١. توليد التوقيعات باستخدام "SigTool" وتثبيت يدويا.</li>
 <li>٢. تحميل التوقيعات من <code dir="ltr">"phpMussel/Signatures"</code>أو <code dir="ltr">"phpMussel/Examples"</code> وتثبيت يدويا.</li>
</ul></div>

##### <div dir="rtl">٢.١.٠ توليد التوقيعات باستخدام "SigTool" وتثبيت يدويا.</div>

<div dir="rtl">نرى: <a href="https://github.com/phpMussel/SigTool#documentation">وثائق SigTool</a>.<br /><br /></div>

<div dir="rtl">لاحظ أيضًا: يعالج SigTool التوقيعات من ClamAV فقط. من أجل الحصول على التوقيع من مصادر أخرى، مثل تلك المكتوبة خصيصًا لـ phpMussel، والتي تتضمن التوقيعات اللازمة للكشف عن عينات اختبار phpMussel، يجب استكمال هذه الطريقة بإحدى الطرق الأخرى المذكورة هنا.<br /><br /></div>

##### <div dir="rtl">٢.١.١ تحميل التوقيعات من <code dir="ltr">"phpMussel/Signatures"</code>أو <code dir="ltr">"phpMussel/Examples"</code> وتثبيت يدويا.</div>

<div dir="rtl">أولا، اذهب إلى <a dir="ltr" href="https://github.com/phpMussel/Signatures">phpMussel/Signatures</a>. يحتوي المستودع على ملفات توقيع GZ مضغوط مختلفة. تحميل الملفات التي تحتاج إليها، فك ضغطها، ونسخها إلى دليل التوقيعات من التثبيت الخاص بك.<br /><br /></div>

<div dir="rtl">كبديل، قم بتنزيل أحدث ملف ZIP من <a dir="ltr" href="https://github.com/phpMussel/Examples">phpMussel/Examples</a>. يمكنك بعد ذلك نسخ/لصق التوقيعات من هذا الأرشيف إلى التثبيت الخاص بك.<br /><br /></div>

---


### <div dir="rtl">٣. <a name="SECTION3"></a>كيفية الإستخدام</div>

#### <div dir="rtl">٣.٠ CONFIGURING PHPMUSSEL</div>

<div dir="rtl">بعد تثبيت phpMussel، ستحتاج إلى ملف تكوين بحيث يمكنك تكوينه. يمكن تهيئة ملفات التكوين phpMussel كملفات INI أو YML. إذا كنت تعمل من أحد ملفات ZIP النموذجية، فسيكون لديك بالفعل مثالان لملفات التكوين المتاحة، <code dir="ltr">phpmussel.ini</code> و <code dir="ltr">phpmussel.yml</code>؛ يمكنك اختيار واحد من هؤلاء للعمل منه، إذا كنت ترغب في ذلك. إذا كنت لا تعمل من أحد ملفات ZIP النموذجية، فستحتاج إلى إنشاء ملف جديد.<br /><br /></div>

<div dir="rtl">إذا كنت راضيًا عن التكوين الافتراضي لـ phpMussel ولا تريد تغيير أي شيء، يمكنك استخدام ملف فارغ كملف التكوين الخاص بك. أي شيء لم تتم تهيئته بواسطة ملف التهيئة الخاص بك سيستخدم الإعداد الافتراضي الخاص به، لذلك لن تحتاج إلا إلى تكوين شيء بشكل صريح إذا كنت تريد أن يكون مختلفًا عن الإعداد الافتراضي الخاص به (بمعنى أن ملف تكوين فارغ سيتسبب في أن يستخدم phpMussel جميع إعداداته الافتراضية).<br /><br /></div>

<div dir="rtl">إذا كنت تريد استخدام الواجهة الأمامية phpMussel، فيمكنك تكوين كل شيء من صفحة تكوين الواجهة الأمامية. ولكن، نظرًا لأن الإصدار v3 فصاعدًا، يتم تخزين معلومات تسجيل الدخول للجهة الأمامية في ملف التهيئة، لذلك لتسجيل الدخول إلى الواجهة الأمامية، ستحتاج على الأقل إلى تكوين حساب لاستخدامه لتسجيل الدخول، وبعد ذلك، من هناك، ستتمكن من تسجيل الدخول واستخدام صفحة تكوين الواجهة الأمامية لتكوين كل شيء آخر.<br /><br /></div>

<div dir="rtl">ستضيف المقتطفات أدناه حسابًا جديدًا للواجهة الأمامية باسم المستخدم "admin" وكلمة المرور "password".<br /><br /></div>

<div dir="rtl">لملفات INI:<br /><br /></div>

```INI
[user.admin]
password='$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK'
permissions='1'
```

<div dir="rtl">لملفات YML:<br /><br /></div>

```YAML
user.admin:
 password: "$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK"
 permissions: 1
```

<div dir="rtl">يمكنك تسمية التكوين الخاص بك ما تريد (طالما تحتفظ بامتدادها، بحيث يعرف phpMussel التنسيق الذي يستخدمه)، ويمكنك تخزينه في أي مكان تريده. يمكنك إخبار phpMussel بمكان العثور على ملف التكوين الخاص بك من خلال توفير مساره عند إنشاء اللودر. إذا لم يتم توفير أي مسار، فسيحاول phpMussel تحديد موقعه ضمن أصل دليل vendor.<br /><br /></div>

<div dir="rtl">في بعض البيئات، مثل Apache، من الممكن وضع نقطة في مقدمة التكوين الخاص بك لإخفائها ومنع الوصول العام.<br /><br /></div>

<div dir="rtl">راجع قسم التكوين في هذا المستند لمزيد من المعلومات حول توجيهات التكوين المتنوعة المتاحة لـ phpMussel.<br /><br /></div>

#### <div dir="rtl">٣.١ PHPMUSSEL CORE</div>

<div dir="rtl">بغض النظر عن الطريقة التي تريد بها استخدام phpMussel، سيحتوي كل تنفيذ تقريبًا على شيء مثل هذا، كحد أدنى:<br /><br /></div>

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
```

<div dir="rtl">كما تشير الأسماء، فإن اللودر مسؤول عن إعداد الضروريات الأساسية لاستخدام phpMussel، والماسح الضوئي مسؤول عن جميع وظائف المسح الأساسية.<br /><br /></div>

<div dir="rtl">يقبل منشئ اللودر خمس معلمات، كلها اختيارية.<br /><br /></div>

```PHP
public function __construct(
    string $ConfigurationPath = '',
    string $CachePath = '',
    string $QuarantinePath = '',
    string $SignaturesPath = '',
    string $VendorPath = ''
)
```

<div dir="rtl">المعلمة الأولى هي المسار الكامل إلى ملف التكوين الخاص بك. عند عدم التحديد، سيبحث phpMussel عن ملف تكوين باسم <code dir="ltr">phpmussel.ini</code> أو <code dir="ltr">phpmussel.yml</code>، في أصل دليل vendor.<br /><br /></div>

<div dir="rtl">المعلمة الثانية هي المسار إلى الدليل الذي تسمح لـ phpMussel باستخدامه في التخزين المؤقت وتخزين الملفات المؤقت. عند عدم التحديد، سيحاول phpMussel إنشاء دليل جديد لاستخدامه، يحمل الاسم <code dir="ltr">phpmussel-cache</code>، في أصل دليل vendor. إذا كنت ترغب في تحديد هذا المسار بنفسك، فمن الأفضل اختيار دليل فارغ لتجنب الفقدان غير المرغوب فيه للبيانات الأخرى في الدليل المحدد.<br /><br /></div>

<div dir="rtl">المعلمة الثالثة هي المسار إلى دليل تسمح لـ phpMussel باستخدامه في وحدة العزل الخاصة به. عند عدم التحديد، سيحاول phpMussel إنشاء دليل جديد لاستخدامه، يحمل الاسم <code dir="ltr">phpmussel-quarantine</code>، في أصل دليل vendor. إذا كنت ترغب في تحديد هذا المسار بنفسك، فمن الأفضل اختيار دليل فارغ لتجنب الفقدان غير المرغوب فيه للبيانات الأخرى في الدليل المحدد. يوصى بشدة بمنع الوصول العام إلى المسار المستخدم في وحدة العزل.<br /><br /></div>

<div dir="rtl">المعلمة الرابعة هي المسار إلى الدليل الذي يحتوي على ملفات التوقيع لـ phpMussel. عند عدم التحديد، سيحاول phpMussel البحث عن ملفات التوقيع في دليل باسم <code dir="ltr">phpmussel-signatures</code>، في أصل دليل vendor.<br /><br /></div>

<div dir="rtl">المعلمة الخامسة هي المسار إلى دليل vendor الخاص بك. لا يجب أن تشير إلى أي شيء آخر. عند عدم التحديد، سيحاول phpMussel تحديد موقع هذا الدليل لنفسه. يتم توفير هذه المعلمة من أجل تسهيل التكامل الأسهل مع عمليات التنفيذ التي قد لا تحتوي بالضرورة على نفس بنية مشروع Composer النموذجي.<br /><br /></div>

<div dir="rtl">يقبل مُنشئ الماسح الضوئي معلمة واحدة فقط، وهو إلزامي: مثيل كائن محمل. أثناء تمريره بالإشارة، يجب أن يتم إنشاء اللودر إلى متغير (إن إنشاء اللودر مباشرة في الماسح الضوئي للتمرير بالقيمة ليس الطريقة الصحيحة لاستخدام phpMussel).<br /><br /></div>

```PHP
public function __construct(\phpMussel\Core\Loader &$Loader)
```

#### <div dir="rtl">٣.٢ المسح التلقائي لتحميل الملف</div>

<div dir="rtl">لإنشاء معالج التحميل:<br /><br /></div>

```PHP
$Web = new \phpMussel\Web\Web($Loader, $Scanner);
```

<div dir="rtl">لفحص تحميلات الملفات:<br /><br /></div>

```PHP
$Web->scan();
```

<div dir="rtl">بشكل اختياري، يمكن أن يحاول phpMussel إصلاح أسماء التحميلات في حالة وجود خطأ ما، إذا كنت ترغب في:<br /><br /></div>

```PHP
$Web->demojibakefier();
```

<div dir="rtl">كمثال كامل:<br /><br /></div>

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

<div dir="rtl">عند محاولة تحميل الملف <code dir="ltr">ascii_standard_testfile.txt</code> (يتم توفير عينة حميدة لغرض وحيد هو اختبار phpMussel):<br /><br /></div>

![لقطة شاشة](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/web-v3.0.0-alpha2.png)

#### <div dir="rtl">٣.٣ وضع CLI</div>

<div dir="rtl">لإنشاء معالج CLI:<br /><br /></div>

```PHP
$CLI = new \phpMussel\CLI\CLI($Loader, $Scanner);
```

<div dir="rtl">كمثال كامل:<br /><br /></div>

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

<div dir="rtl">لقطة شاشة:<br /><br /></div>

![لقطة شاشة:](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/cli-v3.5.0.png)

#### <div dir="rtl">٣.٤ الواجهة الأمامية</div>

<div dir="rtl">لإنشاء الواجهة الأمامية:<br /><br /></div>

```PHP
$FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
```

<div dir="rtl">كمثال كامل:<br /><br /></div>

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

<div dir="rtl">لقطة شاشة:<br /><br /></div>

![لقطة شاشة](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/frontend-v3.4.0.png)

#### <div dir="rtl">٣.٥ API الماسح</div>

<div dir="rtl">يمكنك أيضًا استخدام واجهة برمجة تطبيقات الماسح الضوئي phpMussel في البرامج النصية والبرامج النصية الأخرى، إذا كنت ترغب في ذلك.<br /><br /></div>

<div dir="rtl">كمثال كامل:<br /><br /></div>

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

<div dir="rtl">الجزء المهم الذي يجب ملاحظته من هذا المثال هو طريقة <code dir="ltr">scan()</code>. تقبل الطريقة <code dir="ltr">scan()</code> معلمتين:<br /><br /></div>

```PHP
public function scan(mixed $Files, int $Format = 0): mixed
```

<div dir="rtl">يمكن أن تكون المعلمة الأولى عبارة عن سلسلة أو صفيف، وتخبر الماسح الضوئي بما يجب فحصه. يمكن أن تكون سلسلة تشير إلى ملف أو دليل معين، أو صفيف من هذه السلاسل لتحديد ملفات/أدلة متعددة.<br /><br /></div>

<div dir="rtl">عندما تكون كسلسلة، يجب أن تشير إلى مكان العثور على البيانات. عندما تكون صفيفًا، يجب أن تشير مفاتيح الصفيف إلى الأسماء الأصلية للعناصر المراد مسحها ضوئيًا، ويجب أن تشير القيم إلى مكان العثور على البيانات.<br /><br /></div>

<div dir="rtl">المعلمة الثانية هي عدد صحيح، وتخبر الماسح الضوئي بكيفية إرجاع نتائج المسح.<br /><br /></div>

<div dir="rtl">حدد 1 لإرجاع نتائج المسح كمصفوفة لكل عنصر تم مسحه ضوئيًا كأعداد صحيحة.<br /><br /></div>

<div dir="rtl">هذه الأعداد الصحيحة لها المعاني التالية:<br /><br /></div>

النتائج | وصف
--:|--:
-5 | <div dir="rtl">يشير إلى أن الفحص فشل في إكمال لأسباب أخرى.</div>
-4 | <div dir="rtl">يشير إلى أنه لا يمكن فحص البيانات بسبب التشفير.</div>
-3 | <div dir="rtl">يشير إلى وجود مشاكل في ملفات توقيعات phpMussel.</div>
-2 | <div dir="rtl">يشير إلى أنه تم الكشف عن بيانات فاسدة أثناء الفحص وبالتالي فشل اكتمال الفحص.</div>
-1 | <div dir="rtl">يشير إلى أن الامتدادات المطلوبة من قبل PHP لتنفيذ الفحص كانت مفقودة وبالتالي فشل إكمال الفحص.</div>
0 | <div dir="rtl">يشير إلى أن هدف الفحص غير موجود، وبالتالي لم يكن هناك شيء للمسح الضوئي.</div>
1 | <div dir="rtl">يشير إلى أن الهدف تم فحصه بنجاح ولم يتم اكتشاف أي مشاكل.</div>
2 | <div dir="rtl">يشير إلى أن الهدف تم فحصه بنجاح وتم اكتشاف المشكلات.</div>

<div dir="rtl">حدد 2 لإرجاع نتائج الفحص على أنها صحيحة أو خاطئة.<br /><br /></div>

النتائج | وصف
:-:|:--
`true` | <div dir="rtl">تم الكشف عن مشاكل (هدف الفحص سيء/خطير).</div>
`false` | <div dir="rtl">لم يتم الكشف عن المشكلات (ربما يكون هدف الفحص على ما يرام).</div>

<div dir="rtl">حدد 3 لإرجاع نتائج المسح كمصفوفة لكل عنصر تم مسحه ضوئيًا كنص قابل للقراءة البشرية.<br /><br /></div>

<div dir="rtl">إخراج المثال:<br /><br /></div>

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

<div dir="rtl">حدد 4 لإرجاع نتائج المسح كسلسلة نص قابل للقراءة (مثل 3، ولكن كسلسلة بدلاً من صفيف).<br /><br /></div>

<div dir="rtl">إخراج المثال:<br /><br /></div>

```
Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)! Detected phpMussel-Testfile.CoEx (coex_testfile.rtf)! Detected encrypted archive; Encrypted archives not permitted (encrypted.zip)!
```

<div dir="rtl">حدد أي قيمة أخرى لإرجاع النص المنسق (مثل نتائج الفحص التي تمت رؤيتها عند استخدام CLI).<br /><br /></div>

<div dir="rtl">إخراج المثال:<br /><br /></div>

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

<div dir="rtl">أنظر أيضا: <a href="#user-content-SCAN_DEBUGGING">كيفية الوصول إلى تفاصيل محددة حول الملفات عند مسحها ضوئيا؟</a><br /></div>

#### <div dir="rtl">٣.٦ 2FA<br /><br /></div>

<div dir="rtl">من الممكن جعل front-end أكثر أمانًا عن طريق تمكين 2FA. عند تسجيل الدخول إلى حساب باستخدام 2FA، يتم إرسال بريد إلكتروني إلى عنوان البريد الإلكتروني المقترن بهذا الحساب. تحتوي هذه الرسالة الإلكترونية على "رمز 2FA"، والذي يجب على المستخدم إدخاله، بالإضافة إلى اسم المستخدم وكلمة المرور، حتى تتمكن من تسجيل الدخول باستخدام هذا الحساب. وهذا يعني أن الحصول على كلمة مرور الحساب لن يكون كافيًا لأي متسلل أو مهاجم محتمل ليتمكن من تسجيل الدخول إلى هذا الحساب، لأنهم سيحتاجون أيضًا إلى الوصول بالفعل إلى عنوان البريد الإلكتروني المرتبط بهذا الحساب حتى يتمكنوا من تلقي رمز 2FA واستخدامه في الجلسة.<br /><br /></div>

<div dir="rtl">بعد تثبيت PHPMailer، ستحتاج إلى تعبئة توجيهات التهيئة لـ PHPMailer عبر صفحة تهيئة phpMussel أو ملف التكوين. يتم تضمين مزيد من المعلومات حول توجيهات التكوين هذه في قسم التكوين في هذا المستند. بعد ملء توجيهات تهيئة PHPMailer، اضبط <code dir="ltr">enable_two_factor</code> على <code dir="ltr">true</code>. 2FA ممكّن الآن.<br /><br /></div>

<div dir="rtl">بعد ذلك، ستحتاج إلى ربط عنوان بريد إلكتروني بحساب، حتى يعرف phpMussel مكان إرسال رموز 2FA عند تسجيل الدخول باستخدام هذا الحساب. للقيام بذلك، استخدم عنوان البريد الإلكتروني كاسم مستخدم للحساب (مثل <code dir="ltr">foo@bar.tld</code>)، أو تضمين عنوان البريد الإلكتروني كجزء من اسم المستخدم بالطريقة نفسها التي تريدها عند إرسال بريد إلكتروني بشكل طبيعي (مثل <code dir="ltr">Foo Bar &lt;foo@bar.tld&gt;</code>).<br /><br /></div>

---


### <div dir="rtl">٤. <a name="SECTION4"></a>تمديد PHPMUSSEL</div>

<div dir="rtl">تم تصميم phpMussel مع وضع القابلية للتوسعة في الاعتبار. نرحب دائمًا <a href="https://github.com/phpMussel/.github/blob/master/CONTRIBUTING.md">بالمساهمات</a> في أي من مستودعات منظمة phpMussel. من الممكن أيضًا تعديل أو توسيع phpMussel وفقًا لاحتياجاتك الفريدة، إذا كنت ترغب في ذلك (على سبيل المثال، بالنسبة للتعديلات أو الإضافات الخاصة بتنفيذك الخاص، والتي لا يمكن نشرها بسبب متطلبات السرية أو الخصوصية في مؤسستك، أو التي قد يُنصح بنشرها في مستودعها الخاص، مثل الإضافات وحزم Composer الجديدة التي تتطلب phpMussel).<br /><br /></div>

<div dir="rtl">منذ الإصدار 3، توجد جميع وظائف phpMussel كصنف، مما يعني أنه في بعض الحالات، آليات <a href="https://www.php.net/manual/en/language.oop5.inheritance.php" hreflang="en-US">وراثة الكائن</a> التي توفرها PHP طريقة سهلة ومناسبة لتوسيع phpMussel.<br /><br /></div>

<div dir="rtl">يوفر phpMussel أيضًا آلياته الخاصة للتوسع. قبل الإصدار 3، كانت الآلية المفضلة هي نظام البرنامج المساعد المدمج لـ phpMussel. منذ الإصدار 3، الآلية المفضلة هي منظم الأحداث.<br /><br /></div>

<div dir="rtl">كود معياري لتوسيع phpMussel وكتابة ملحقات جديدة متاح للجمهور في <a href="https://github.com/phpMussel/plugin-boilerplates" hreflang="en-AU">مستودع القياسية</a>. يتم تضمين أيضًا قائمة بجميع <a href="https://github.com/phpMussel/plugin-boilerplates/tree/master/boilerplate-v3#currently-supported-events" hreflang="en-AU">الأحداث المدعومة حاليًا</a> وإرشادات أكثر تفصيلاً بشأن كيفية استخدام الكود معياري.<br /><br /></div>

<div dir="rtl">ستلاحظ أن هيكل الكود القياسي v3 مطابق لهيكل مستودعات phpMussel v3 الأخرى. انها ليست صدفه. متى أمكن، أوصي باستخدام الكود القياسي v3 لتوسيع phpMussel، واستخدام مبادئ تصميم مماثلة لتلك الخاصة بـ phpMussel v3 نفسه. إذا اخترت نشر الإضافة أو المكون الإضافي الجديد، فيمكنك دمج دعم Composer له، ومن المفترض أن يكون من الممكن نظريًا للآخرين استخدام الامتداد أو المكون الإضافي بنفس الطريقة تمامًا مثل phpMussel v3 نفسه، ببساطة طلبها جنبًا إلى جنب مع تبعيات الملحن الأخرى، وتطبيق أي معالجات للأحداث ضرورية عند تنفيذها. (بالطبع، لا تنس تضمين الإرشادات مع منشوراتك، حتى يعرف الآخرون أي معالجات ضرورية للأحداث وأي معلومات أخرى قد تكون ضرورية لتثبيت المنشور الخاص بك واستخدامه بشكل صحيح).<br /><br /></div>

---


### <div dir="rtl">٥. <a name="SECTION5"></a>خيارات التكوين/التهيئة</div>

<div dir="rtl">فيما يلي قائمة بتوجيهات التكوين المقبولة من قبل phpMussel، بالإضافة إلى وصف الغرض منه و وظيفته.<br /><br /></div>

```
التكوين (v3)
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
│       request_proxy [string]
│       request_proxyauth [string]
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

#### <div dir="rtl">"core" (التصنيف)<br /></div>
<div dir="rtl">التكوين العام (أي التكوين الأساسي لا ينتمي إلى فئات أخرى).<br /><br /></div>

##### <div dir="rtl">"scan_log" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>اسم الملف لملف تسجيل جميع نتائج المسح. قم بتعيين اسم الملف، أو اتركه فارغا للتعطيل.</li></ul></div>

نصيحة مفيدة: يمكنك إرفاق معلومات التاريخ/الوقت بأسماء ملفات السجل باستخدام العناصر النائبة لتنسيق الوقت. يتم عرض العناصر النائبة لتنسيق الوقت المتوفرة عند <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format"><code dir="ltr">core➡time_format</code></a>.

##### <div dir="rtl">"scan_log_serialized" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>اسم الملف من ملف لتسجيل جميع نتائج المسح إلى (باستخدام تنسيق متسلسل). تحديد اسم الملف، أو اتركه فارغا للتعطيل.</li></ul></div>

نصيحة مفيدة: يمكنك إرفاق معلومات التاريخ/الوقت بأسماء ملفات السجل باستخدام العناصر النائبة لتنسيق الوقت. يتم عرض العناصر النائبة لتنسيق الوقت المتوفرة عند <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format"><code dir="ltr">core➡time_format</code></a>.

##### <div dir="rtl">"error_log" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>ملف لتسجيل أي أخطاء غير مميتة المكتشفة. تحديد اسم الملف، أو اتركه فارغا لتعطيل.</li></ul></div>

نصيحة مفيدة: يمكنك إرفاق معلومات التاريخ/الوقت بأسماء ملفات السجل باستخدام العناصر النائبة لتنسيق الوقت. يتم عرض العناصر النائبة لتنسيق الوقت المتوفرة عند <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format"><code dir="ltr">core➡time_format</code></a>.

##### <div dir="rtl">"outbound_request_log" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>ملف لتسجيل نتائج أي طلبات صادرة. تحديد اسم الملف، أو اتركه فارغا لتعطيل.</li></ul></div>

نصيحة مفيدة: يمكنك إرفاق معلومات التاريخ/الوقت بأسماء ملفات السجل باستخدام العناصر النائبة لتنسيق الوقت. يتم عرض العناصر النائبة لتنسيق الوقت المتوفرة عند <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format"><code dir="ltr">core➡time_format</code></a>.

##### <div dir="rtl">"truncate" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>اقتطاع ملفات السجل عندما تصل إلى حجم معين؟ القيمة هي الحجم الأقصى في بايت/كيلوبايت/ميغابايت/غيغابايت/تيرابايت الذي قد ينمو ملفات السجل إلى قبل اقتطاعه. القيمة الافتراضية 0KB تعطيل اقتطاع (ملفات السجل يمكن أن تنمو إلى أجل غير مسمى). ملاحظة: ينطبق على ملفات السجل الفردية! ولا يعتبر حجمها جماعيا.</li></ul></div>

##### <div dir="rtl">"log_rotation_limit" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>يحدد تدوير السجل عدد ملفات السجل التي يجب أن تكون موجودة في أي وقت. عند إنشاء ملفات السجل الجديدة، إذا تجاوز العدد الإجمالي لبيانات السجل الحد المحدد، فسيتم تنفيذ الإجراء المحدد. يمكنك تحديد الحد المرغوب هنا. ستعمل القيمة 0 على تعطيل تدوير السجل.</li></ul></div>

##### <div dir="rtl">"log_rotation_action" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>يحدد تدوير السجل عدد ملفات السجل التي يجب أن تكون موجودة في أي وقت. عند إنشاء ملفات السجل الجديدة، إذا تجاوز العدد الإجمالي لبيانات السجل الحد المحدد، فسيتم تنفيذ الإجراء المحدد. يمكنك تحديد الإجراء المطلوب هنا.</li></ul></div>

```
log_rotation_action
├─Delete ("احذف أقدم السجلات، حتى لا يتم تجاوز الحد.")
└─Archive ("أرشفة أولاً، ثم احذف أقدم السجلات، حتى لا يتم تجاوز الحد.")
```

##### <div dir="rtl">"timezone" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>يتم استخدام هذا لتحديد المنطقة الزمنية للاستخدام (على سبيل المثال، Africa/Cairo، America/New_York، Asia/Tokyo، Australia/Perth، Europe/Berlin، Pacific/Guam، إلخ). حدد "SYSTEM" للسماح لـ PHP بمعالجة هذا الأمر تلقائيًا.</li></ul></div>

```
timezone
├─SYSTEM ("استخدام المنطقة الزمنية الافتراضية للنظام.")
├─UTC ("UTC")
└─…آخر
```

##### <div dir="rtl">"time_offset" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>المنطقة الزمنية تعويض في غضون دقائق.</li></ul></div>

##### <div dir="rtl">"time_format" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>شكل التواريخ المستخدم من قبل phpMussel. ويمكن إضافة خيارات إضافية عند الطلب.</li></ul></div>

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
└─…آخر
```

<strong><em>العنصر النائب – تفسير – مثال يعتمد على <span dir="ltr">2024-04-30T18:27:49+08:00</span>.</em></strong><br />
<code dir="ltr" class="s">{yyyy}</code> – السنة – على سبيل المثال، 2024.<br />
<code dir="ltr" class="s">{yy}</code> – السنة المختصرة – على سبيل المثال، 24.<br />
<code dir="ltr" class="s">{Mon}</code> – اسم الشهر المختصر (باللغة الإنجليزية) – على سبيل المثال، Apr.<br />
<code dir="ltr" class="s">{mm}</code> – الشهر الذي مع الأصفار البادئة – على سبيل المثال، 04.<br />
<code dir="ltr" class="s">{m}</code> – الشهر – على سبيل المثال، 4.<br />
<code dir="ltr" class="s">{Day}</code> – اسم اليوم المختصر (باللغة الإنجليزية) – على سبيل المثال، Tue.<br />
<code dir="ltr" class="s">{dd}</code> – اليوم مع الأصفار البادئة – على سبيل المثال، 30.<br />
<code dir="ltr" class="s">{d}</code> – اليوم – على سبيل المثال، 30.<br />
<code dir="ltr" class="s">{hh}</code> – الساعة مع الأصفار البادئة (تستخدم نظام 24 ساعة) – على سبيل المثال، 18.<br />
<code dir="ltr" class="s">{h}</code> – الساعة (تستخدم نظام 24 ساعة) – على سبيل المثال، 18.<br />
<code dir="ltr" class="s">{ii}</code> – الدقيقة مع الأصفار البادئة – على سبيل المثال، 27.<br />
<code dir="ltr" class="s">{i}</code> – الدقيقة – على سبيل المثال، 27.<br />
<code dir="ltr" class="s">{ss}</code> – الثواني مع الأصفار البادئة – على سبيل المثال، 49.<br />
<code dir="ltr" class="s">{s}</code> – الثواني – على سبيل المثال، 49.<br />
<code dir="ltr" class="s">{tz}</code> – المنطقة الزمنية (بدون النقطتين) – على سبيل المثال، <span dir="ltr">+0800</span>.<br />
<code dir="ltr" class="s">{t:z}</code> – المنطقة الزمنية (مع النقطتين) – على سبيل المثال، <span dir="ltr">+08:00</span>.

##### <div dir="rtl">"ipaddr" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>أين يمكن العثور على عنوان IP لربط الطلبات؟ (مفيدة للخدمات مثل Cloudflare). الافتراضي = REMOTE_ADDR. تحذير: لا تغير هذا إلا إذا كنت تعرف ما تفعلونه!</li></ul></div>

```
ipaddr
├─HTTP_INCAP_CLIENT_IP ("HTTP_INCAP_CLIENT_IP (Incapsula)")
├─HTTP_CF_CONNECTING_IP ("HTTP_CF_CONNECTING_IP (Cloudflare)")
├─CF-Connecting-IP ("CF-Connecting-IP (Cloudflare)")
├─HTTP_X_FORWARDED_FOR ("HTTP_X_FORWARDED_FOR (Cloudbric)")
├─X-Forwarded-For ("X-Forwarded-For (Squid)")
├─Forwarded ("Forwarded")
├─REMOTE_ADDR ("REMOTE_ADDR (الافتراضي)")
└─…آخر
```

<div dir="rtl">أنظر أيضا:<ul dir="rtl">
<li><a dir="ltr" href="https://docs.nginx.com/nginx/admin-guide/web-server/reverse-proxy/">NGINX Reverse Proxy</a></li>
<li><a dir="ltr" href="http://www.squid-cache.org/Doc/config/forwarded_for/">Squid configuration directive forwarded_for</a></li>
<li><a dir="ltr" href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Forwarded">Forwarded - HTTP \| MDN</a></li>
</ul></div>

##### <div dir="rtl">"delete_on_sight" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>تمكين هذا التوجيه وإرشاد النصي لمحاولة حذف فورا عن أي الممسوحة ضوئيا تحميل ملف محاولة مطابقة أي معايير الكشف، سواء عن طريق التوقيعات أو غير ذلك. لن يكون لمست الملفات مصممة على أن تكون "نظيفة". في حالة المحفوظات، سيتم حذف أرشيف كامل، بغض النظر عن ما إذا كان أو لم يكن ملف المخالف هو واحد فقط من العديد من الملفات الواردة في الأرشيف. بالنسبة لحالة إيداع ملف المسح الضوئي، عادة، فإنه ليس من الضروري لتمكين هذا التوجيه، لأن العادة، PHP وتطهير محتويات ذاكرة التخزين المؤقت تلقائيا عند انتهاء التنفيذ، وهذا يعني انها سوف عادة حذف أي الملفات التي تم تحميلها من خلال ذلك إلى الخادم ما لم يكونوا قد تم نقلها أو نسخها أو حذفها بالفعل. يضاف هذا التوجيه هنا كإجراء إضافي من الأمن لأولئك الذين نسخ من PHP قد لا تتصرف دائما على النحو المتوقع. = كاذبة بعد المسح، وترك الملف وحده [الافتراضي]. صحيح/True = بعد المسح، إن لم يكن نظيفة، تحذف فورا.</li></ul></div>

##### <div dir="rtl">"lang" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>تحديد اللغة الافتراضية الخاصة بـ phpMussel.</li></ul></div>

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

##### <div dir="rtl">"lang_override" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>الترجمة وفقًا لـ HTTP_ACCEPT_LANGUAGE كلما أمكن ذلك؟ صحيح/True = نعم [افتراضي]؛ زائفة/False = لا.</li></ul></div>

##### <div dir="rtl">"scan_cache_expiry" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>إلى متى يجب أن phpMussel تخزين نتائج المسح؟ القيمة هي عدد الثواني لتخزين نتائج المسح ل. الافتراضي هو 21600 ثانية (6 ساعات)؛ وقيمة 0 تعطيل التخزين المؤقت نتائج المسح.</li></ul></div>

##### <div dir="rtl">"maintenance_mode" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>هل تريد تمكين وضع الصيانة؟ صحيح/True = نعم؛ زائفة/False = لا [افتراضي]. تعطيل كل شيء بخلاف front-end. قد تكون مفيدة أحيانا عند تحديث نظام إدارة المحتوى والأطر وما إلى ذلك.</li></ul></div>

##### <div dir="rtl">"statistics" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>هل تريد تتبع إحصاءات استخدام phpMussel؟ صحيح/True = نعم؛ زائفة/False = لا [افتراضي].</li></ul></div>

##### <div dir="rtl">"hide_version" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>إخفاء معلومات الإصدار من السجلات وإخراج الصفحة؟ صحيح/True = نعم؛ زائفة/False = لا [افتراضي].</li></ul></div>

##### <div dir="rtl">"disabled_channels" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>يمكن استخدام هذا لمنع phpMussel من استخدام قنوات معينة عند إرسال الطلبات.</li></ul></div>

```
disabled_channels
├─GitHub ("GitHub")
├─BitBucket ("BitBucket")
├─VirusTotal_HTTPS ("VirusTotal (HTTPS)")
└─VirusTotal_HTTP ("VirusTotal (HTTP)")
```

##### <div dir="rtl">"request_proxy" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>إذا كنت تريد إرسال الطلبات الصادرة عبر وكيل، حدد هذا الوكيل هنا. إذا لم يكن الأمر كذلك، اترك هذا فارغًا.</li></ul></div>

##### <div dir="rtl">"request_proxyauth" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>إذا كنت ترسل طلبات صادرة من خلال وكيل وإذا كان هذا الوكيل يتطلب اسم مستخدم وكلمة مرور، فحدد اسم المستخدم وكلمة المرور هنا (على سبيل المثال، <code dir="ltr">user:pass</code>). إذا لم يكن الأمر كذلك، اترك هذا فارغًا.</li></ul></div>

##### <div dir="rtl">"default_timeout" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>المهلة الافتراضية لاستخدامها للطلبات الخارجية؟ الافتراضي = 12 ثانية.</li></ul></div>

#### <div dir="rtl">"signatures" (التصنيف)<br /></div>
<div dir="rtl">التكوين للتوقيعات، ملفات التوقيع، إلخ.<br /><br /></div>

##### <div dir="rtl">"active" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>قائمة من الملفات توقيع النشطة، محدد بفواصل. ملحوظة: يجب أولاً تثبيت ملفات التوقيع، قبل أن تتمكن من تنشيطها. لكي تعمل ملفات الاختبار بشكل صحيح، يجب تثبيت ملفات التوقيع وتنشيطها.</li></ul></div>

##### <div dir="rtl">"fail_silently" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>هل يجب على phpMussel الابلاغ عندما يتم توقيع ملفات مفقودة أو تالفة؟ إذا كان <code dir="ltr">fail_silently</code> المعوقين، في عداد المفقودين وسيتم الإبلاغ عن ملفات فساد في المسح، وإذا <code dir="ltr">fail_silently</code> تمكين، في عداد المفقودين وسيتم تجاهل ملفات فساد، مع مسح الإبلاغ عن تلك الملفات أنه لا توجد أي مشاكل. وهذا ين بغي عموما أن تترك وحدها إلا إذا كنت تعاني من أعطال أو مشاكل مشابهة. خطأ = معطل. صحيح/True = ممكن [افتراضي].</li></ul></div>

##### <div dir="rtl">"fail_extensions_silently" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>هل يجب على phpMussel الابلاغ عندما تفقد الملحقات؟ إذا تم تعطيل <code dir="ltr">fail_extensions_silently</code>، وسيتم إبلاغ ملحقات مفقودة على المسح، وإذا تم تمكين <code dir="ltr">fail_extensions_silently</code>، سيتم تجاهل ملحقات المفقودة، مع مسح الإبلاغ عن تلك الملفات أنه لا توجد أي مشاكل. تعطيل هذا التوجيه قد يحتمل زيادة الأمان، ولكن قد يؤدي أيضا إلى زيادة من ايجابيات كاذبة. خطأ = معطل. صحيح/True = ممكن [افتراضي].</li></ul></div>

##### <div dir="rtl">"detect_adware" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>هل يجب على توقيعات phpMussel الكشف عن تجسس؟ زائفة/False = لا؛ صحيح/True = نعم [افتراضي].</li></ul></div>

##### <div dir="rtl">"detect_joke_hoax" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>هل يجب على توقيعات phpMussel الكشف عن خدعة البرمجيات الخبيثة / الفيروسات؟ زائفة/False = لا؛ صحيح/True = نعم [افتراضي].</li></ul></div>

##### <div dir="rtl">"detect_pua_pup" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>هل يجب على توقيعات phpMussel الكشف عن PUAs؟ زائفة/False = لا؛ صحيح/True = نعم [افتراضي].</li></ul></div>

##### <div dir="rtl">"detect_packer_packed" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>هل يجب على توقيعات phpMussel الكشف عن تعبئة والبيانات المعبأة؟ زائفة/False = لا؛ صحيح/True = نعم [افتراضي].</li></ul></div>

##### <div dir="rtl">"detect_shell" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>هل يجب على توقيعات phpMussel الكشف عن البرامج النصية قذيفة؟ زائفة/False = لا؛ صحيح/True = نعم [افتراضي].</li></ul></div>

##### <div dir="rtl">"detect_deface" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>هل يجب على توقيعات phpMussel الكشف عن مهاجمات وdefacers؟ زائفة/False = لا؛ صحيح/True = نعم [افتراضي].</li></ul></div>

##### <div dir="rtl">"detect_encryption" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>يجب phpMussel كشف ومنع الملفات المشفرة؟ زائفة/False = لا؛ صحيح/True = نعم [افتراضي].</li></ul></div>

##### <div dir="rtl">"heuristic_threshold" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>هناك توقيعات معينة من phpMussel التي تهدف إلى تحديد الصفات المشبوهة والمحتمل أن تكون ضارة من الملفات التي يتم تحميلها دون في أنفسهم تحديد تلك الملفات التي تم تحميلها على وجه التحديد بأنها خبيثة. هذه القيمة "الحد الأقصى " تقول phpMussel ما الحد الأقصى للوزن الكلي من الصفات المشبوهة والمحتمل أن تكون ضارة من الملفات التي يتم تحميلها هذا المسموح به هو قبل تلك الملفات ليتم وضع علامة بأنها خبيثة. تعريف الوزن في هذا السياق هو العدد الإجمالي من الصفات المشبوهة والمحتمل أن تكون ضارة تحديدها. افتراضيا، سيتم تعيين هذه القيمة إلى 3. القيمة المنخفضة عموما سوف يؤدي إلى حدوث أعلى من ايجابيات كاذبة ولكن عددا أكبر من الملفات الخبيثة التي لوحت، في حين أن أعلى قيمة عموما سوف يؤدي إلى حدوث انخفاض من ايجابيات كاذبة ولكن انخفاض عدد الملفات الخبيثة التي توضع. انها عموما من الأفضل ترك هذه القيمة في الافتراضي إلا إذا كنت تعاني من مشاكل المتعلقة بها.</li></ul></div>

#### <div dir="rtl">"files" (التصنيف)<br /></div>
<div dir="rtl">تفاصيل كيفية التعامل مع الملفات عند المسح.<br /><br /></div>

##### <div dir="rtl">"filesize_limit" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>حدود حجم الملف بالكيلو بايت. 65536 = 64MB [افتراضي]. 0 = لا يوجد حد (greylisted دائما)، أي (إيجابية) قيمة رقمية قبلت. هذا يمكن أن يكون مفيدا عندما يحد التكوين الخاص بي مقدار الذاكرة عملية يمكن أن تعقد أو إذا كان لديك PHP حدود التكوين حجم الملف من الإضافات.</li></ul></div>

##### <div dir="rtl">"filesize_response" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>ماذا تفعل مع الملفات التي تتجاوز الحد الأقصى لحجم الملف (إن وجد). زائفة/False = القائمة البيضاء. صحيح/True = القائمة السوداء [افتراضي].</li></ul></div>

##### <div dir="rtl">"filetype_whitelist" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>القائمة البيضاء:</li></ul></div>

__كيف يعمل هذا.__ إذا كان النظام يسمح فقط أنواع معينة من الملفات المراد تحميلها، أو إذا كان النظام ينفي صراحة أنواع معينة من الملفات، تحديد تلك نوع الملف في قوائم بيضاء، القوائم السوداء و القوائم الرمادية يمكن أن تزيد من السرعة التي يتم تنفيذ المسح من خلال السماح للبرنامج بتخطي بعض أنواع الملفات. الشكل هو CSV (قيم مفصولة بفواصل).

__الترتيب المنطقي للمعالجة.__ إذا نوع الملف موجود في القائمة البيضاء، لا يفحص ولا تحجب الملف، وعدم التدقيق في ملف ضد القائمة السوداء أو القائمة الرمادية. إذا نوع الملف موجود في القائمة السوداء، لا تفحص الملف ولكن منع ذلك على أي حال، وعدم التدقيق في ملف ضد قائمة رمادية. إذا كانت قائمة رمادية فارغة أو إذا كانت قائمة رمادية ليس فارغا من نوع الملف، مسح الملفات حسب طبيعتها وتحديد ما إذا كان لمنع ذلك بناء على نتائج الفحص، ولكن إذا كانت قائمة رمادية ليس فارغا ونوع الملف هو ليس ملف قائمة رمادية، معالجة الملف على القائمة السوداء، لذلك لا المسح الضوئي ولكن منع ذلك على أي حال.

##### <div dir="rtl">"filetype_blacklist" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>القائمة السوداء:</li></ul></div>

__كيف يعمل هذا.__ إذا كان النظام يسمح فقط أنواع معينة من الملفات المراد تحميلها، أو إذا كان النظام ينفي صراحة أنواع معينة من الملفات، تحديد تلك نوع الملف في قوائم بيضاء، القوائم السوداء و القوائم الرمادية يمكن أن تزيد من السرعة التي يتم تنفيذ المسح من خلال السماح للبرنامج بتخطي بعض أنواع الملفات. الشكل هو CSV (قيم مفصولة بفواصل).

__الترتيب المنطقي للمعالجة.__ إذا نوع الملف موجود في القائمة البيضاء، لا يفحص ولا تحجب الملف، وعدم التدقيق في ملف ضد القائمة السوداء أو القائمة الرمادية. إذا نوع الملف موجود في القائمة السوداء، لا تفحص الملف ولكن منع ذلك على أي حال، وعدم التدقيق في ملف ضد قائمة رمادية. إذا كانت قائمة رمادية فارغة أو إذا كانت قائمة رمادية ليس فارغا من نوع الملف، مسح الملفات حسب طبيعتها وتحديد ما إذا كان لمنع ذلك بناء على نتائج الفحص، ولكن إذا كانت قائمة رمادية ليس فارغا ونوع الملف هو ليس ملف قائمة رمادية، معالجة الملف على القائمة السوداء، لذلك لا المسح الضوئي ولكن منع ذلك على أي حال.

##### <div dir="rtl">"filetype_greylist" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>قائمة رمادية:</li></ul></div>

__كيف يعمل هذا.__ إذا كان النظام يسمح فقط أنواع معينة من الملفات المراد تحميلها، أو إذا كان النظام ينفي صراحة أنواع معينة من الملفات، تحديد تلك نوع الملف في قوائم بيضاء، القوائم السوداء و القوائم الرمادية يمكن أن تزيد من السرعة التي يتم تنفيذ المسح من خلال السماح للبرنامج بتخطي بعض أنواع الملفات. الشكل هو CSV (قيم مفصولة بفواصل).

__الترتيب المنطقي للمعالجة.__ إذا نوع الملف موجود في القائمة البيضاء، لا يفحص ولا تحجب الملف، وعدم التدقيق في ملف ضد القائمة السوداء أو القائمة الرمادية. إذا نوع الملف موجود في القائمة السوداء، لا تفحص الملف ولكن منع ذلك على أي حال، وعدم التدقيق في ملف ضد قائمة رمادية. إذا كانت قائمة رمادية فارغة أو إذا كانت قائمة رمادية ليس فارغا من نوع الملف، مسح الملفات حسب طبيعتها وتحديد ما إذا كان لمنع ذلك بناء على نتائج الفحص، ولكن إذا كانت قائمة رمادية ليس فارغا ونوع الملف هو ليس ملف قائمة رمادية، معالجة الملف على القائمة السوداء، لذلك لا المسح الضوئي ولكن منع ذلك على أي حال.

##### <div dir="rtl">"check_archives" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>محاولة للتحقق من محتويات المحفوظات؟ = كاذبة لا تحقق. صحيح/True = افحص [افتراضي]. المدعومة: Zip (يتطلب libzip)، Tar، Rar (يتطلب التمديد rar).</li></ul></div>

##### <div dir="rtl">"filesize_archives" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>ترحيل حجم ملف القائمة السوداء / قائمة بيضاء لمحتويات المحفوظات؟ زائفة/False = لا (فقط كل ما يدرجون)؛ صحيح/True = نعم [افتراضي].</li></ul></div>

##### <div dir="rtl">"filetype_archives" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>ترحيل نوع الملف القائمة السوداء / القائمة البيضاء لمحتويات المحفوظات؟ زائفة/False = لا (فقط كل ما يدرجون) [افتراضي]. صحيح/True = نعم.</li></ul></div>

##### <div dir="rtl">"max_recursion" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>الحد الأقصى لإعادة الحد الأقصى لعمق المحفوظات. افتراضي = 3.</li></ul></div>

##### <div dir="rtl">"block_encrypted_archives" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>كشف ومنع تشفير المحفوظات؟ لأن phpMussel ليست قادرة على مسح محتويات المحفوظات مشفرة، فمن الممكن أن التشفير أرشيف يجوز توظيف من قبل مهاجم كوسيلة لمحاولة تجاوز phpMussel، والماسحات الضوئية مكافحة الفيروسات وغيرها من مثل هذه الحماية. يمكن أن تعليمات phpMussel لمنع أي المحفوظات التي كان تكتشف لتكون مشفرة المحتمل أن يساعد على الحد من أي مخاطر المرتبطة بهذه مثل هذه الاحتمالات. زائفة/False = لا؛ صحيح/True = نعم [افتراضي].</li></ul></div>

##### <div dir="rtl">"max_files_in_archives" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>الحد الأقصى لعدد الملفات المطلوب مسحها من داخل الأرشيف قبل إحباط الفحص. افتراضي = 0 (ليس أي حد أقصى).</li></ul></div>

##### <div dir="rtl">"chameleon_from_php" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>البحث عن العنوان PHP في الملفات التي ليست ملفات PHP و لا المحفوظات معترفة بها. صحيح/True = على. زائفة/False = إيقاف.</li></ul></div>

##### <div dir="rtl">"can_contain_php_file_extensions" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>قائمة ملحقات الملفات المسموح بها تحتوي على شفرة PHP، مفصولة بفواصل. إذا تم تمكين الكشف عن هجوم حرباء PHP، فسيتم الكشف عن الملفات التي تحتوي على كود PHP، والتي تحتوي على ملحقات ليست موجودة في هذه القائمة، على أنها هجمات حرباء على PHP.</li></ul></div>

##### <div dir="rtl">"chameleon_from_exe" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>البحث عن العناوين قابلة للتنفيذ في الملفات التي ليست التنفيذية ولا المحفوظات المعترف بها والقابلة للتنفيذ التي هي العناوين غير صحيحة. صحيح/True = على. زائفة/False = إيقاف.</li></ul></div>

##### <div dir="rtl">"chameleon_to_archive" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>اكتشاف رؤوس غير صحيحة في الأرشيفات والملفات المضغوطة. المدعومة: BZ/BZIP2، GZ/GZIP، LZF، RAR، ZIP صحيح/True = على. زائفة/False = إيقاف.</li></ul></div>

##### <div dir="rtl">"chameleon_to_doc" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>البحث عن المستندات التي عناوينها غير صحيحة (المدعومة: DOC، وزارة النقل، PPS، PPT، XLA، XLS، WIZ). صحيح/True = على. زائفة/False = إيقاف.</li></ul></div>

##### <div dir="rtl">"chameleon_to_img" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>البحث عن الصور التي عناوينها غير صحيحة (المدعومة: BMP، DIB، PNG، GIF، JPEG، JPG، XCF، PSD، PDD، WEBP). صحيح/True = على. زائفة/False = إيقاف.</li></ul></div>

##### <div dir="rtl">"chameleon_to_pdf" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>البحث عن الملفات PDF التي عناوينها غير صحيحة. صحيح/True = على. زائفة/False = إيقاف.</li></ul></div>

##### <div dir="rtl">"archive_file_extensions" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>ملحقات ملفات الأرشيف المعترف بها (الشكل هو CSV، وينبغي فقط إضافة أو إزالة عندما تحدث المشاكل؛ إزالة دون داع قد يسبب ايجابيات كاذبة لتظهر لملفات الأرشيف، في حين اضاف داع سوف القائمة البيضاء أساسا ما كنت تقوم بإضافة من كشف المحدد الهجوم؛ تعديل مع الحذر، لاحظ أيضا أن هذا ليس له تأثير على ما المحفوظات يمكن ولا يمكن تحليلها على مستوى المحتوى). القائمة، كما هو في التقصير، يسرد تلك الأشكال الأكثر شيوعا في غالبية النظم واتفاقية الأنواع المهاجرة، ولكن عمدا ليست شاملة بالضرورة.</li></ul></div>

##### <div dir="rtl">"block_control_characters" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>حظر أي ملفات تحتوي على أي أحرف التحكم (عدا أسطر جديدة)؟ إذا كنت <strong>فقط</strong> تحميل نص عادي، ثم يمكنك تشغيل هذا الخيار لتوفير بعض الحماية إضافية على النظام الخاص بك. ومع ذلك، إذا قمت بتحميل أي شيء آخر غير نص عادي، وتحول هذا على قد يؤدي إلى ايجابيات كاذبة. = كاذبة لا منع [افتراضي]. صحيح/True = بلوك.</li></ul></div>

##### <div dir="rtl">"corrupted_exe" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>تلف الملفات وتحليل الأخطاء. خطأ = تجاهل. صحيح/True = كتلة [افتراضي]. كشف ومنع الملفات المحتمل تلف PE (محمول قابل للتنفيذ)؟ في كثير من الأحيان (ولكن ليس دائما)، عندما تلف جوانب معينة من ملف PE أو لا يمكن تحليله بشكل صحيح، فإنه يمكن أن يكون مؤشرا على وجود عدوى فيروسية. العمليات المستخدمة من قبل معظم برامج مكافحة الفيروسات للكشف عن الفيروسات في ملفات PE تتطلب تحليل تلك الملفات بطرق معينة والتي إذا كان مبرمج للفيروس هو على علم، ومحاولة خصيصا لمنع، من أجل السماح للفيروس لتبقى غير مكتشفة.</li></ul></div>

##### <div dir="rtl">"decode_threshold" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>الحد الأقصى لطول البيانات الخام من خلاله أن يتم الكشف عن أوامر فك (في حالة وجود أي مشكلات في الأداء ملحوظة أثناء المسح). افتراضي = 512KB. صفر أو قيمة فارغة تعطيل عتبة (إزالة مثل هذا القيد على أساس حجم الملف).</li></ul></div>

##### <div dir="rtl">"scannable_threshold" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>الحد الأقصى لطول البيانات الخام التي يسمح phpMussel لقراءة ومسح (في حالة وجود أي مشكلات في الأداء ملحوظة أثناء المسح). افتراضي = 32MB. صفر أو قيمة فارغة تعطيل العتبة. عموما، يجب أن لا تكون هذه القيمة أقل من متوسط حجم الملف من تحميل الملفات التي تريد وتتوقع الحصول على الخادم الخاص بك أو الموقع، لا ينبغي أن يكون أكثر من التوجيه filesize_limit، ويجب أن لا يكون خامس أكثر من ما يقرب من واحد من مجموع تخصيص الذاكرة المسموح منح لPHP عن طريق ملف التكوين "php.ini". هذا التوجيه موجود في محاولة لمنع phpMussel من استخدام ما يصل الكثير من الذاكرة (التي تريد منعها من أن تكون قادرة على مسح بنجاح الملفات فوق حجم الملف معين).</li></ul></div>

##### <div dir="rtl">"allow_leading_trailing_dots" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>السماح النقاط الرائدة والزائدة في أسماء الملفات؟ يمكن استخدام هذا أحيانًا لإخفاء الملفات أو خداع بعض الأنظمة للسماح بدخول الدليل. زائفة/False = لا تسمح [افتراضي]. صحيح/True = السماح.</li></ul></div>

##### <div dir="rtl">"block_macros" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>حاول حظر أي ملفات تحتوي على وحدات ماكرو؟ قد تحتوي بعض أنواع المستندات وجداول البيانات على وحدات ماكرو قابلة للتنفيذ، وبالتالي توفير ناقلات برامج ضارة محتملة خطيرة. زائفة/False = لا تمنع [افتراضي]. صحيح/True = تمنع.</li></ul></div>

##### <div dir="rtl">"only_allow_images" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>عند التعيين على true، أي ملفات ليست صورًا واجهها الماسح الضوئي سيتم وضع علامة على الفور، دون أن يتم فحصها. قد يساعد هذا في تقليل الوقت اللازم لإكمال الفحص في بعض الحالات. تعيين على false بشكل افتراضي.</li></ul></div>

##### <div dir="rtl">"entropy_limit" <code dir="ltr">[float]</code><br /></div>
<div dir="rtl"><ul><li>حد الإنتروبيا للتوقيعات التي تستخدم البيانات الطبيعية (الافتراضي هو 7.7). في هذا السياق، يتم تعريف الإنتروبيا على أنها إنتروبيا شانون لمحتوى الملف الذي يتم مسحه ضوئيًا. عندما يتم تجاوز كل من حد الإنتروبيا وحد حجم ملف الإنتروبيا، من أجل تقليل خطر الإيجابيات الخاطئة، سيتم تجاهل بعض التوقيعات التي تستخدم البيانات الطبيعية.</li></ul></div>

##### <div dir="rtl">"entropy_filesize_limit" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>حد حجم ملف الإنتروبيا للتوقيعات التي تستخدم البيانات الطبيعية (الافتراضي هو 256KB). عندما يتم تجاوز كل من حد الإنتروبيا وحد حجم ملف الإنتروبيا، من أجل تقليل خطر الإيجابيات الخاطئة، سيتم تجاهل بعض التوقيعات التي تستخدم البيانات الطبيعية.</li></ul></div>

#### <div dir="rtl">"quarantine" (التصنيف)<br /></div>
<div dir="rtl">التكوين الحجر الصحي.<br /><br /></div>

##### <div dir="rtl">"quarantine_key" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>phpMussel قادر على عزل تحميل الملفات المحجوبة، إذا كان هذا هو ما تريد أن تفعله. المستخدمين العاديين من phpMussel التي ترغب ببساطة لحماية مواقعها على شبكة الإنترنت أو بيئة استضافة دون وجود أي مصلحة في تحليل عميق أي ترفع علم تحميل الملفات حاول يجب ترك هذه الوظيفة ذوي الاحتياجات الخاصة، ولكن أي المستخدمين المهتمين في مزيد من التحليل للترفع علم حاولت تحميل الملفات للبحث عن البرامج الضارة أو ما شابه مثل هذه الأمور ينبغي أن تمكن هذه الوظيفة. الحجر الصحي لترفع العلم تحميل الملفات حاول يمكن في بعض الأحيان أن تساعد في تصحيح ايجابيات كاذبة، إذا كان هذا هو الشيء الذي كثيرا ما يحدث لك. إلى تعطيل وظيفة العزل، ببساطة مغادرة <code dir="ltr">quarantine_key</code> التوجيه فارغة، أو مسح محتويات هذا التوجيه إذا لم يكن خاليا بالفعل. لتمكين وظيفة العزل، وإدخال قيمة في التوجيه. و <code dir="ltr">quarantine_key</code> هي ميزة أمنية مهمة من وظائف الحجر الصحي المطلوبة كوسيلة لمنع وظيفة الحجر الصحي من أن تستغل من قبل المهاجمين المحتملين، وكوسيلة لمنع أي احتمال تنفيذ البيانات المخزنة داخل الحجر الصحي. و <code dir="ltr">quarantine_key</code> ينبغي أن يعامل بنفس الطريقة التي يعامل بها كلمات السر الخاصة بك: وكلما كان ذلك أفضل، وحراسته مشددة. للحصول على أفضل تأثير، استخدم بالتزامن مع <code dir="ltr">delete_on_sight</code>.</li></ul></div>

##### <div dir="rtl">"quarantine_max_filesize" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>الحد الأقصى لحجم الملف المسموح به من الملفات للحجر الصحي. لن يكون الحجر الصحي الملفات أكبر من القيمة المحددة. هذا التوجيه لا يقل أهمية عن وسيلة لجعل الأمر أكثر صعوبة لأي مهاجمين محتملين لإغراق الحجر الصحي الخاص مع البيانات غير المرغوب فيها مما يمكن أن يسبب استخدام البيانات التشغيل بعيدا عن خدمة الاستضافة. الافتراضي = 2MB.</li></ul></div>

##### <div dir="rtl">"quarantine_max_usage" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>الحد الأقصى لاستخدام الذاكرة يسمح للحجر الصحي. إذا كان إجمالي الذاكرة المستخدمة من قبل الحجر الصحي تصل هذه القيمة، سيتم حذف أقدم الملفات المعزولة حتى الذاكرة الإجمالية المستخدمة لم تعد تصل هذه القيمة. هذا التوجيه لا يقل أهمية عن وسيلة لجعل الأمر أكثر صعوبة لأي مهاجمين محتملين لإغراق الحجر الصحي الخاص مع البيانات غير المرغوب فيها مما يمكن أن يسبب استخدام البيانات التشغيل بعيدا عن خدمة الاستضافة. الافتراضي = 64MB.</li></ul></div>

##### <div dir="rtl">"quarantine_max_files" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>الحد الأقصى لعدد الملفات التي يمكن أن توجد في وحدة العزل. عند إضافة ملفات جديدة إلى وحدة العزل، إذا تم تجاوز هذا الرقم، فسيتم حذف الملفات القديمة حتى لا يتجاوز الجزء المتبقي هذا الرقم. الافتراضي = 100.</li></ul></div>

#### <div dir="rtl">"virustotal" (التصنيف)<br /></div>
<div dir="rtl">التكوين من أجل Virus Total.<br /><br /></div>

##### <div dir="rtl">"vt_public_api_key" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>اختياريا، phpMussel غير قادرة على مسح الملفات باستخدام الفيروسات مجموع API كوسيلة لتوفير مستوى تتعزز بشكل كبير من الحماية ضد الفيروسات، و ملفات التجسس، والبرمجيات الخبيثة وغيرها من التهديدات. افتراضيا، ملفات المسح الضوئي باستخدام الفيروسات مجموع API يتم تعطيل. لتمكينه، لا بد من وضع مفتاح API من الفيروسات إجمالي. ويرجع ذلك إلى فائدة كبيرة أن هذا يمكن أن توفر لك، هذا شيء أنا أوصي تمكين. يرجى أن يكون على علم، مع ذلك، أن استخدام الفيروسات مجموع API، التي يجب أن تتوافق مع شروط الخدمة، ويجب أن تلتزم جميع المبادئ التوجيهية حسب وصفه الفيروسات مجموع الوثائق! لا يجوز لك استخدام هذه الميزة التكامل ما لم: لقد قرأت ووافقت على شروط الخدمة من فيروس توتال و API لها. لقد قرأت وفهمت، كحد أدنى، ديباجة الفيروسات وثائق API ملفه مجموع (كل شيء بعد "فايروس توتال V2.0 API العام" ولكن قبل "المحتويات").</li></ul></div>

<div dir="rtl">أنظر أيضا:<ul dir="rtl">
<li><a dir="ltr" href="https://www.virustotal.com/en/about/terms-of-service/">Terms of Service</a></li>
<li><a dir="ltr" href="https://developers.virustotal.com/reference">Getting started</a></li>
</ul></div>

##### <div dir="rtl">"vt_suspicion_level" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>افتراضيا، سوف يقوم phpMussel بتقييد الملفات التي تقوم بمسح باستخدام الفيروسات API الكلي لتلك الملفات التي تعتبرها "المشبوهة". يمكنك ضبط اختياريا هذا التقييد عن طريق تغيير قيمة التوجيه "vt_suspicion_level".</li></ul></div>

```
vt_suspicion_level
├─0 (تحقق فقط من الملفات ذات الوزن الإرشادي.): سيتم فحص الملفات فقط إذا كانت تحمل الوزن
│ الإرشادي. يمكن أن يحدث "الوزن الإرشادي" من
│ التوقيعات التي تلتقط بصمات الأصابع التي
│ تشير إلى الإصابة ولكنها لا تضمن العدوى.
│ بالنسبة للنتائج التي تبرر الشك ولكنها لا
│ توفر أي يقين، يمكن أن يعمل البحث على توفير
│ رأي ثانٍ.
├─1 (تحقق من الملفات ذات الوزن الإرشادي والملفات القابلة للتنفيذ والملفات التي يحتمل أن تحتوي على بيانات قابلة للتنفيذ.): تتضمن هذه الملفات Windows PE و Linux ELF و Mach-O و DOCX
│ و ZIP وما إلى ذلك.
└─2 (تحقق من جميع الملفات.)
```

##### <div dir="rtl">"vt_weighting" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>هل phpMussel يطبق نتائج المسح باستخدام الفيروسات مجموع API كما المكتشفة أو الممكن كشفها؟ يوجد هذا التوجيه لأنه على الرغم من أن مسح ملف باستخدام محركات متعددة (كما فايروس توتال لا) ينبغي أن يؤدي في معدل اكتشاف زيادة (وبالتالي في عدد أكبر من الملفات الخبيثة الوقوع)، فإنه يمكن أن يؤدي أيضا إلى ارتفاع عدد كاذبة الإيجابيات، وبالتالي، في بعض الظروف، فإن نتائج المسح يمكن الاستفادة بشكل أفضل كما على درجة الثقة بدلا من أن تكون نتيجة محددة. إذا تم استخدام قيمة 0، سيتم تطبيق نتائج المسح باستخدام الفيروسات مجموع API كما المكتشفة و بالتالي إذا أي محرك تستخدم من قبل الفيروسات مجموع أعلام الملف تم مسحها ضوئيا بأنها خبيثة، وphpMussel النظر في الملف إلى تكون ضارة. إذا تم استخدام أي قيمة أخرى، سيتم تطبيق نتائج المسح باستخدام الفيروسات مجموع API كما الترجيح الكشف و بالتالي فإن عدد من المحركات المستخدمة من قبل الفيروسات إجمالي هذا العلم الملف تم مسحها ضوئيا بأنها خبيثة سيكون بمثابة نتيجة الثقة (أو الترجيح الكشف) عن ما إذا كان ملف تم مسحها ضوئيا ينبغي النظر الخبيثة التي كتبها phpMussel (القيمة المستخدمة سيمثل الحد الأدنى من الثقة يسجل أو الوزن المطلوب من أجل أن تعتبر ضارة). يتم استخدام قيمة 0 افتراضيا.</li></ul></div>

##### <div dir="rtl">"vt_quota_rate" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>استنادا إلى وثائق الفيروسات الكلي API، "فإنه يقتصر على الأكثر 4 طلبات من أي نوع في أي إطار زمني معين 1 دقيقة. إذا قمت بتشغيل honeyclient، مصيدة أو أي أتمتة الآخر الذي يجري لتوفير الموارد اللازمة لفايروس توتال ولا استرداد فقط تقارير يحق لك الحصول على أعلى حصص معدلات الطلب". افتراضيا، سوف phpMussel الالتزام الصارم لهذه القيود، ولكن نظرا لإمكانية هذه الحصص نسبة تجري زيادة، وتقدم هذه التوجيهات اثنين كوسيلة لتتمكن من إرشاد phpMussel على ما الحد الأقصى ينبغي أن تلتزم بها. إلا إذا كنت قد أعطيت تعليمات للقيام بذلك، فإنه من غير المستحسن بالنسبة لك لزيادة هذه القيم و لكن إذا كنت قد واجهت مشاكل تتعلق الوصول الحصص الخاصة بك، وخفض هذه القيم قد يساعد في بعض الأحيان كنت في التعامل مع هذه المشاكل. يتم تحديد الحد الأقصى معدل حسابك عن طلبات "vt_quota_rate" من أي نوع في أي إطار "vt_quota_time" الوقت دقيقة معين.</li></ul></div>

##### <div dir="rtl">"vt_quota_time" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>(انظر الوصف أعلاه).</li></ul></div>

#### <div dir="rtl">"urlscanner" (التصنيف)<br /></div>
<div dir="rtl">التكوين من الماسح الضوئي URL.<br /><br /></div>

##### <div dir="rtl">"google_api_key" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>العدد الأقصى المسموح به من عمليات بحث واجهة برمجة التطبيقات لأداء في تكرار المسح الفردية.</li></ul></div>

<div dir="rtl">أنظر أيضا:<ul dir="rtl">
<li><a dir="ltr" href="https://console.developers.google.com/">Google API Console</a></li>
</ul></div>

##### <div dir="rtl">"maximum_api_lookups" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>العدد الأقصى المسموح به من عمليات بحث واجهة برمجة التطبيقات لأداء في تكرار المسح الفردية. لأن كل بحث API إضافية سوف يضيف إلى الوقت الإجمالي المطلوب لإكمال كل تكرار المسح، قد ترغب في اشتراط وجود قيود من أجل الإسراع في عملية المسح الشاملة. عند تعيينها إلى 0، سيتم تطبيق الحد الأقصى لا هذا العدد المسموح به. تعيين إلى 10 افتراضيا.</li></ul></div>

##### <div dir="rtl">"maximum_api_lookups_response" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>ماذا تفعل إذا تم تجاوز الحد الأقصى المسموح به من عمليات بحث API؟ = كاذبة لا تفعل شيئا (متابعة المعالجة) [افتراضي]. صحيح/True = تحديد الملف.</li></ul></div>

##### <div dir="rtl">"cache_time" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>متى (بالثواني) يجب التوصل إلى نتائج عمليات بحث API؟ الافتراضي هو 3600 ثانية (1 ساعة).</li></ul></div>

#### <div dir="rtl">"legal" (التصنيف)<br /></div>
<div dir="rtl">التكوين للمتطلبات القانونية.<br /><br /></div>

##### <div dir="rtl">"pseudonymise_ip_addresses" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>إخفاء عناوين IP عند كتابة السجلات؟ صحيح/True = نعم [افتراضي]؛ زائفة/False = لا.</li></ul></div>

##### <div dir="rtl">"privacy_policy" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>عنوان سياسة الخصوصية ذات الصلة ليتم عرضها في تذييل الصفحات التي تم إنشاؤها. حدد عنوان URL، أو اتركه فارغًا لتعطيله.</li></ul></div>

#### <div dir="rtl">"supplementary_cache_options" (التصنيف)<br /></div>
<div dir="rtl">خيارات ذاكرة التخزين المؤقت التكميلية. ملاحظة: قد يؤدي تغيير هذه القيم إلى تسجيل خروجك.<br /><br /></div>

##### <div dir="rtl">"prefix" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>سيتم إضافة القيمة المحددة هنا إلى جميع مفاتيح إدخال ذاكرة التخزين المؤقت. افتراضي = "phpMussel_". عند وجود عدة عمليات تثبيت على نفس الخادم، يمكن أن يكون ذلك مفيدًا للحفاظ على ذاكرة التخزين المؤقت منفصلة عن بعضها البعض.</li></ul></div>

##### <div dir="rtl">"enable_apcu" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>يحدد هذا ما إذا كنت تريد استخدام APCu للتخزين المؤقت. افتراضي = True (صحيح).</li></ul></div>

##### <div dir="rtl">"enable_memcached" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>يحدد هذا ما إذا كنت تريد استخدام Memcached للتخزين المؤقت. افتراضي = False (زائفة).</li></ul></div>

##### <div dir="rtl">"enable_redis" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>يحدد هذا ما إذا كنت تريد استخدام Redis للتخزين المؤقت. افتراضي = False (زائفة).</li></ul></div>

##### <div dir="rtl">"enable_pdo" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>يحدد هذا ما إذا كنت تريد استخدام PDO للتخزين المؤقت. افتراضي = False (زائفة).</li></ul></div>

##### <div dir="rtl">"memcached_host" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>قيمة المضيف Memcached. افتراضي = localhost.</li></ul></div>

##### <div dir="rtl">"memcached_port" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>قيمة منفذ Memcached. افتراضي = "11211".</li></ul></div>

##### <div dir="rtl">"redis_host" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>قيمة المضيف Redis. افتراضي = localhost.</li></ul></div>

##### <div dir="rtl">"redis_port" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>قيمة منفذ Redis. افتراضي = "6379".</li></ul></div>

##### <div dir="rtl">"redis_timeout" <code dir="ltr">[float]</code><br /></div>
<div dir="rtl"><ul><li>Redis قيمة المهلة. افتراضي = "2.5".</li></ul></div>

##### <div dir="rtl">"redis_database_number" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>رقم قاعدة بيانات Redis. افتراضي = 0. ملاحظة: لا يمكن استخدام قيم غير 0 مع Redis Cluster.</li></ul></div>

##### <div dir="rtl">"pdo_dsn" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>قيمة PDO DSN. افتراضي = "mysql:dbname=phpmussel;host=localhost;port=3306".</li></ul></div>

__FAQ.__ <em><a href="https://github.com/phpMussel/Docs/blob/master/readme.ar.md#user-content-HOW_TO_USE_PDO" hreflang="ar">ما هو "PDO DSN"؟ كيف يمكنني استخدام PDO مع phpMussel؟</a></em>

##### <div dir="rtl">"pdo_username" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>PDO اسم المستخدم.</li></ul></div>

##### <div dir="rtl">"pdo_password" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>PDO كلمه السر.</li></ul></div>

#### <div dir="rtl">"frontend" (التصنيف)<br /></div>
<div dir="rtl">التكوين للواجهة الأمامية.<br /><br /></div>

##### <div dir="rtl">"frontend_log" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>ملف لتسجيل محاولات الدخول الأمامية. تحديد اسم الملف، أو اتركه فارغا لتعطيل.</li></ul></div>

نصيحة مفيدة: يمكنك إرفاق معلومات التاريخ/الوقت بأسماء ملفات السجل باستخدام العناصر النائبة لتنسيق الوقت. يتم عرض العناصر النائبة لتنسيق الوقت المتوفرة عند <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format"><code dir="ltr">core➡time_format</code></a>.

##### <div dir="rtl">"max_login_attempts" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>الحد الأقصى لعدد محاولات تسجيل الدخول (front-end). الافتراضي = 5.</li></ul></div>

##### <div dir="rtl">"numbers" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>كيف تفضل الأرقام ليتم عرضها؟ حدد المثال الذي يبدو أكثر صحيح لك.</li></ul></div>

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

##### <div dir="rtl">"default_algo" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>يحدد الخوارزمية التي سيتم استخدامها لكل كلمات المرور والجلسات المستقبلية.</li></ul></div>

```
default_algo
├─PASSWORD_DEFAULT ("PASSWORD_DEFAULT")
├─PASSWORD_BCRYPT ("PASSWORD_BCRYPT")
├─PASSWORD_ARGON2I ("PASSWORD_ARGON2I")
└─PASSWORD_ARGON2ID ("PASSWORD_ARGON2ID (PHP >= 7.3.0)")
```

##### <div dir="rtl">"theme" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>الجمالية المراد استخدامها في الواجهة الأمامية phpMussel.</li></ul></div>

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
└─…آخر
```

##### <div dir="rtl">"magnification" <code dir="ltr">[float]</code><br /></div>
<div dir="rtl"><ul><li>تكبير الخط. افتراضي = 1.</li></ul></div>

##### <div dir="rtl">"custom_header" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>تم إدراجها بتنسيق HTML في بداية جميع الصفحات الأمامية. قد يكون هذا مفيدًا في حالة رغبتك في تضمين شعار موقع ويب أو رأس مخصص أو نصوص أو ما شابه ذلك في جميع هذه الصفحات.</li></ul></div>

##### <div dir="rtl">"custom_footer" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>تم إدراجها بتنسيق HTML في الجزء السفلي من جميع الصفحات الأمامية. قد يكون هذا مفيدًا في حالة رغبتك في تضمين إشعار قانوني أو رابط اتصال أو معلومات تجارية أو ما شابه ذلك في كل هذه الصفحات.</li></ul></div>

#### <div dir="rtl">"web" (التصنيف)<br /></div>
<div dir="rtl">التكوين لمعالج التحميل.<br /><br /></div>

##### <div dir="rtl">"uploads_log" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>مكان تسجيل جميع التحميلات المحظورة. تحديد اسم الملف، أو اتركه فارغا لتعطيل.</li></ul></div>

نصيحة مفيدة: يمكنك إرفاق معلومات التاريخ/الوقت بأسماء ملفات السجل باستخدام العناصر النائبة لتنسيق الوقت. يتم عرض العناصر النائبة لتنسيق الوقت المتوفرة عند <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format"><code dir="ltr">core➡time_format</code></a>.

##### <div dir="rtl">"forbid_on_block" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>هل phpMussel يرسل 403 من العناوين مع الرسالة منعت إيداع الملف، أو يبقى مع المعتادة 200 موافق؟ خطأ = رقم (200). صحيح/True = نعم (403) [الافتراضي].</li></ul></div>

##### <div dir="rtl">"unsupported_media_type_header" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>هل يجب على phpMussel إرسال 415 رأسًا عندما يتم حظر التحميلات بسبب أنواع الملفات المدرجة في القائمة السوداء؟ عندما يكون هذا الإعداد صحيحًا، يحل هذا الإعداد محل <code dir="ltr">forbid_on_block</code>. زائفة/False = لا [الافتراضي]؛ صحيح/True = نعم.</li></ul></div>

##### <div dir="rtl">"max_uploads" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>العدد الأقصى المسموح به من ملفات لمسح أثناء تحميل الملفات مسح قبل إحباط عملية الفحص وإعلام المستخدم أنهم تحميل أكثر من اللازم في وقت واحد! يوفر الحماية ضد هجوم النظري حيث يحاول أحد المهاجمين دوس النظام الخاص بك أو CMS من الحمولة الزائدة phpMussel إلى إبطاء عملية PHP لوقف طحن. الموصى بها: 10. أنت قد ترغب في رفع أو خفض هذا الرقم اعتمادا على سرعة الجهاز. لاحظ أن هذا الرقم لا يأخذ في الحسبان أو تتضمن محتويات المحفوظات.</li></ul></div>

##### <div dir="rtl">"ignore_upload_errors" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>يجب أن يكون هذا التوجيه عموما هو تعطيل ما لم تصبح مطلوبة حصول على الوظائف الصحيحة لـ phpMussel على النظام الخاص بك محددة. عادة، عندما يكون في وضع تعطيل، عندما يكتشف phpMussel وجود عناصر في مجموعة <code dir="ltr">$_FILES</code>، وأنها سوف محاولة لبدء فحص الملفات التي تمثل تلك العناصر، وإذا كانت تلك العناصر هي فارغة أو فارغة، سوف phpMussel العودة رسالة خطأ. هذا هو السلوك الصحيح للـ phpMussel. ومع ذلك، بالنسبة لبعض CMS، العناصر الفارغة في <code dir="ltr">$_FILES</code> يمكن أن تحدث نتيجة لسلوك طبيعي لتلك CMS، أو أخطاء قد يتم الإعلام عندما لم تكن هناك أي، في هذه الحالة، السلوك العادي للphpMussel سوف تتدخل مع السلوك العادي من تلك CMS. في حال حدوث مثل هذه الحالة بالنسبة لك، تمكين هذا الخيار سوف يكلف phpMussel ليست محاولة لبدء المسح الضوئي لمثل هذه العناصر الفارغة، تجاهلها عندما وجدت وعدم إعادة أي رسائل خطأ ذات الصلة، مما يتيح استمرار طلب الصفحة. زائفة/False = أطفئ؛ صحيح/True = تشغيل.</li></ul></div>

##### <div dir="rtl">"theme" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>الجمالية المراد استخدامها لصفحة "رفض تحميل".</li></ul></div>

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
└─…آخر
```

##### <div dir="rtl">"magnification" <code dir="ltr">[float]</code><br /></div>
<div dir="rtl"><ul><li>تكبير الخط. افتراضي = 1.</li></ul></div>

##### <div dir="rtl">"custom_header" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>تم إدراجها بتنسيق HTML في بداية كل صفحات "رفض تحميل". قد يكون هذا مفيدًا في حالة رغبتك في تضمين شعار موقع ويب أو رأس مخصص أو نصوص أو ما شابه ذلك في جميع هذه الصفحات.</li></ul></div>

##### <div dir="rtl">"custom_footer" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>تم إدراجها بتنسيق HTML في الجزء السفلي من جميع صفحات "رفض تحميل". قد يكون هذا مفيدًا في حالة رغبتك في تضمين إشعار قانوني أو رابط اتصال أو معلومات تجارية أو ما شابه ذلك في كل هذه الصفحات.</li></ul></div>

#### <div dir="rtl">"phpmailer" (التصنيف)<br /></div>
<div dir="rtl">التكوين ل PHPMailer (يستخدم للمصادقة الثنائية ولإشعارات البريد الإلكتروني).<br /><br /></div>

##### <div dir="rtl">"event_log" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>ملف لتسجيل جميع الأحداث المتعلقة ب PHPMailer. تحديد اسم الملف، أو اتركه فارغا لتعطيل.</li></ul></div>

نصيحة مفيدة: يمكنك إرفاق معلومات التاريخ/الوقت بأسماء ملفات السجل باستخدام العناصر النائبة لتنسيق الوقت. يتم عرض العناصر النائبة لتنسيق الوقت المتوفرة عند <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format"><code dir="ltr">core➡time_format</code></a>.

##### <div dir="rtl">"enable_two_factor" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>يحدد هذا التوجيه ما إذا كان سيتم استخدام 2FA للحسابات front-end أم لا.</li></ul></div>

##### <div dir="rtl">"enable_notifications" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>إذا كنت تريد أن يتم إعلامك عبر البريد الإلكتروني عند حظر التحميل، فحدد عنوان البريد الإلكتروني للمستلم هنا.</li></ul></div>

##### <div dir="rtl">"skip_auth_process" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>تعيين هذا التوجيه إلى <code dir="ltr">true</code> يرشد PHPMailer لتخطي عملية المصادقة التي تحدث عادة عند إرسال البريد الإلكتروني عبر SMTP. يجب تجنب هذا، لأن تخطي هذه العملية قد يعرض البريد الإلكتروني الصادر إلى هجمات MITM، ولكنه قد يكون ضروريًا في الحالات التي تمنع فيها هذه العملية من اتصال PHPMailer بخادم SMTP.</li></ul></div>

##### <div dir="rtl">"host" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>مضيف SMTP الذي يستخدم للبريد الإلكتروني الصادر.</li></ul></div>

##### <div dir="rtl">"port" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>رقم المنفذ المراد استخدامه للبريد الإلكتروني الصادر. افتراضي = 587.</li></ul></div>

##### <div dir="rtl">"smtp_secure" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>البروتوكول المستخدم عند إرسال البريد الإلكتروني عبر SMTP (TLS أو SSL).</li></ul></div>

```
smtp_secure
├─default ("-")
├─tls ("TLS")
└─ssl ("SSL")
```

##### <div dir="rtl">"smtp_auth" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>يحدد هذا التوجيه ما إذا كنت تريد مصادقة جلسات SMTP (يجب ألا يغير هذا عادة).</li></ul></div>

##### <div dir="rtl">"username" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>اسم المستخدم لاستخدامه عند إرسال البريد الإلكتروني عبر SMTP.</li></ul></div>

##### <div dir="rtl">"password" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>كلمة المرور لاستخدامها عند إرسال البريد الإلكتروني عبر SMTP.</li></ul></div>

##### <div dir="rtl">"set_from_address" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>عنوان المرسل للاستشهاد عند إرسال البريد الإلكتروني عبر SMTP.</li></ul></div>

##### <div dir="rtl">"set_from_name" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>اسم المرسل للاستشهاد عند إرسال البريد الإلكتروني عبر SMTP.</li></ul></div>

##### <div dir="rtl">"add_reply_to_address" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>عنوان الرد للاستشهاد عند إرسال البريد الإلكتروني عبر SMTP.</li></ul></div>

##### <div dir="rtl">"add_reply_to_name" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>اسم الرد للاستشهاد عند إرسال البريد الإلكتروني عبر SMTP.</li></ul></div>

---


### <div dir="rtl">٦. <a name="SECTION6"></a>شكل/تنسيق التوقيع</div>

<div dir="rtl">أنظر أيضا:<br /></div>
<div dir="rtl"><ul>
 <li><a href="#user-content-WHAT_IS_A_SIGNATURE">ما هو "التوقيع"؟</a></li>
</ul></div>

<div dir="rtl">أول 9 بايت <code dir="ltr">[x0-x8]</code> من ملف التوقيع phpMussel هو <code dir="ltr">phpMussel</code>، والعمل بمثابة "عدد سحري" (magic number)، لتحديدها كملفات توقيع (وهذا يساعد على منع عن طريق الخطأ باستخدام الملفات التي ليست ملفات التوقيع). البايت المقبل <code dir="ltr">[x9]</code> يحدد نوع ملف التوقيع، والتي يجب أن تعرف من أجل أن تكون قادرة على تفسير ملف التوقيع بشكل صحيح. يتم التعرف على الأنواع التالية من ملفات التوقيع:<br /><br /></div>

&nbsp; <div dir="rtl" style="display:inline">نوع</div> | <div dir="rtl">بايت</div> | <div dir="rtl">وصف</div>
---|---|---
`General_Command_Detections` | `0?` | <div dir="rtl">بالنسبة إلى ملفات التوقيع "القيم المفصولة بفواصل". التوقيعات هي سلاسل مشفرة عشرية للبحث عن الملفات. التوقيعات هنا ليس لديها أي أسماء أو تفاصيل أخرى (فقط السلسلة للكشف).</div>
`Filename` | `1?` | <div dir="rtl">لتوقيعات اسم الملف.</div>
`Hash` | `2?` | <div dir="rtl">لتوقيعات تجزئة الملف.</div>
`Standard` | `3?` | <div dir="rtl">لملفات التوقيع التي تعمل مباشرة مع محتوى الملف.</div>
`Standard_RegEx` | `4?` | <div dir="rtl">لملفات التوقيع التي تعمل مباشرة مع محتوى الملف. يمكن أن تحتوي التوقيعات على تعبيرات عادية.</div>
`Normalised` | `5?` | <div dir="rtl">لملفات التوقيع التي تعمل مع محتوى ملف أنسي-تطبيع.</div>
`Normalised_RegEx` | `6?` | <div dir="rtl">لملفات التوقيع التي تعمل مع محتوى ملف أنسي-تطبيع. يمكن أن تحتوي التوقيعات على تعبيرات عادية.</div>
`HTML` | `7?` | <div dir="rtl">لملفات التوقيع التي تعمل مع محتوى ملف بتنسيق هتمل.</div>
`HTML_RegEx` | `8?` | <div dir="rtl">لملفات التوقيع التي تعمل مع محتوى ملف بتنسيق هتمل. يمكن أن تحتوي التوقيعات على تعبيرات عادية.</div>
`PE_Extended` | `9?` | <div dir="rtl">لملفات التوقيع التي تعمل مع البيانات الوصفية PE (باستثناء البيانات الوصفية المقطعية PE).</div>
`PE_Sectional` | `A?` | <div dir="rtl">لملفات التوقيع التي تعمل مع البيانات الوصفية المقطع PE.</div>
`Complex_Extended` | `B?` | <div dir="rtl">لملفات التوقيع التي تعمل مع قواعد مختلفة استنادا إلى بيانات التعريف الموسعة التي تم إنشاؤها بواسطة phpMussel.</div>
`URL_Scanner` | `C?` | <div dir="rtl">لملفات التوقيع التي تعمل مع عناوين URL.</div>

<div dir="rtl">البايت المقبل <code dir="ltr">[x10]</code> هو خط جديد <code dir="ltr">[0A]</code>، ويختتم رأس ملف التوقيع phpMussel.<br /><br /></div>

<div dir="rtl">كل خط غير فارغ بعد ذلك هو توقيع أو قاعدة. كل توقيع أو قاعدة تحتل سطر واحد. وفيما يلي وصف لأشكال التوقيع المعتمدة.<br /><br /></div>

#### *<div dir="rtl">توقيعات اسم الملف</div>*
<div dir="rtl">كل توقيعات اسم الملف تتبع التنسيق التالي:<br /><br /></div>

`NAME:FNRX`

<div dir="rtl">حيث "NAME" هو الاسم المذكور في التوقيع و "FNRX" نمط التعابير المنطقية بحيث تتطابق الأسماء (الغير مشفرة) مقابله.<br /><br /></div>

#### *<div dir="rtl">توقيعات تجزئة</div>*
<div dir="rtl">جميع التوقيعات تجزئة تتبع التنسيق:<br /><br /></div>

`HASH:FILESIZE:NAME`

<div dir="rtl">حيث "HASH" هي تجزئة تجزئة للملف كله (عادة MD5)، و "FILESIZE" هي الحجم الإجمالي لذلك الملف و "NAME" هو الاسم المذكور في التوقيع.<br /><br /></div>

#### *<div dir="rtl">توقيعات PE الجزئية</div>*
<div dir="rtl">جميع توقيعات PE الجزئية تتبع التنسيق:<br /><br /></div>

`SIZE:HASH:NAME`

<div dir="rtl">حيث "HASH" هو تجزئة "MD5" لجزء من ملف PE، "SIZE" هو الحجم الكلي لهذا القسم، "NAME" هو الاسم المذكور في التوقيع.<br /><br /></div>

#### *<div dir="rtl">توقيعات PE الموسعة</div>*
<div dir="rtl">جميع توقيعات PE الموسعة تتبع التنسيق:<br /><br /></div>

`$VAR:HASH:SIZE:NAME`

<div dir="rtl">حيث <code dir="ltr">$VAR</code> هو اسم المتغير PE للتطابق معه، "HASH" هو تجزئة "MD5" هذا المتغير، "SIZE" هو الحجم الكلي لهذا المتغير والاسم هو الاسم المذكور في التوقيع.<br /><br /></div>

#### *<div dir="rtl">التوقيعات المركبة الموسعة</div>*
<div dir="rtl">التواقيع المركبة الموسعة هي مختلفة عن أنواع أخرى من التوقيعات المحتملة مع phpMussel، في أنهم يقومون بمطابقة مع ما تم تعيينه من قبل التوقيعات أنفسهم وأنها يمكن أن تتطابق ضد معايير متعددة. محدد مع معايير المطابقة ";" ونوع المطابقة و بيانات المطابقة و كل معايير المطابقة محددة بواسطة ":" ذلك أن شكل هذه التوقيعات يميل قليلا إلى مثل:<br /><br /></div>

`$variable1:SOMEDATA;$variable2:SOMEDATA;SignatureName`

#### *<div dir="rtl">كل شيء آخر</div>*
<div dir="rtl">جميع التوقيعات الأخرى تتبع التنسيق:<br /><br /></div>

`NAME:HEX:FROM:TO`

<div dir="rtl">حيث "NAME" هو الاسم المذكور لهذا التوقيع و "HEX" هو الترميز الجزئي السادس عشري من الملف المراد أن يقابله تواقيع معينة. من وإلى المعاملات الاختيارية، مشيرا من خلالها إلى المواضع في البيانات المصدر للتحقق منها.<br /><br /></div>

#### *<div dir="rtl">التعابير المنطقية</div>*
<div dir="rtl">أي شكل من أشكال التعابير المنطقية يتم فهمها ومعالجتها بشكل صحيح عن طريق PHP و يجب أيضا أن يكون مفهوما بشكل صحيح و تتم معالجتها بواسطة phpMussel و توقيعاتها. مع ذلك، أود أن أقترح اتخاذ الحذر الشديد عند كتابة توقيعات التعابير المنطقية الجديدة، لأنه إذا لم تكن متأكدا تماما مما تفعله، يمكن أن يكون هناك عدم انتظام كبير و/أو نتائج غير متوقعة. القي نظرة على phpMussel مصدر الترميز إذا لم تكن متأكدا تماما من السياق الذي يتم تحليل البيانات باستخدام التعابير المنطقية. أيضا، تذكر أن كل أنماط (باستثناء اسم الملف، أرشيف البيانات الوصفية وأنماط MD5) يجب أن تتبع ترميز سادس عشري(عند تركيب نمط ما، بالتأكيد)!<br /><br /></div>

---


### <div dir="rtl">٧. <a name="SECTION7"></a>مشاكل التوافق المعروفة</div>

#### <div dir="rtl">التوافق البرمجي لبرنامج مكافحة الفيروسات</div>

<div dir="rtl">من المعروف أن مشاكل التوافق بين phpMussel وبعض بائعي برامج مكافحة الفيروسات تحدث في بعض الأحيان في الماضي، لذلك كل بضعة أشهر، أتحقق من أحدث الإصدارات المتاحة من قاعدة بيانات phpMussel ضد Virus Total، لمعرفة ما إذا كانت هناك أية مشكلات تم الإبلاغ عنها هناك. عندما يتم الإبلاغ عن المشكلات هناك، سأذكر المشاكل هنا في الوثائق.<br /><br /></div>

<div dir="rtl">عندما راجعت مؤخرًا (2022.05.12)، لم يتم الإبلاغ عن أي مشاكل.<br /><br /></div>

<div dir="rtl">لا أتحقق من ملفات التوقيع أو الوثائق أو أي محتوى محيطي آخر. تسبب ملفات التوقيع دائمًا بعض الإيجابيات الخاطئة عندما تكتشفها حلول مكافحة الفيروسات الأخرى. لذلك أوصي بشدة، إذا كنت تخطط لتثبيت phpMussel على جهاز يوجد به بالفعل حل آخر لمكافحة الفيروسات، لإدراج ملفات توقيع phpMussel في القائمة البيضاء.<br /><br /></div>

<div dir="rtl"><em>انظر أيضا: <a href="https://maikuolan.github.io/Compatibility-Charts/">مخططات التوافق</a>.</em><br /><br /></div>

---


### <div dir="rtl">٨. <a name="SECTION8"></a>أسئلة وأجوبة (FAQ)</div>

<div dir="rtl"><ul>
 <li><a href="#user-content-WHAT_IS_A_SIGNATURE">ما هو "التوقيع"؟</a></li>
 <li><a href="#user-content-WHAT_IS_A_FALSE_POSITIVE">ما هو "إيجابية خاطئة"؟</a></li>
 <li><a href="#user-content-SIGNATURE_UPDATE_FREQUENCY">عدد المرات التي يتم تحديثها التوقيعات؟</a></li>
 <li><a href="#user-content-ENCOUNTERED_PROBLEM_WHAT_TO_DO">لقد واجهت مشكلة! أنا لا أعرف ما يجب القيام به! الرجاء المساعدة!</a></li>
 <li><a href="#user-content-MINIMUM_PHP_VERSION_V3">أريد استخدام phpMussel v3 مع نسخة PHP كبار السن من 7.2.0؛ يمكنك أن تساعد؟</a></li>
 <li><a href="#user-content-PROTECT_MULTIPLE_DOMAINS">هل يمكنني استخدام تثبيت phpMussel واحد لحماية نطاقات متعددة؟</a></li>
 <li><a href="#user-content-PAY_YOU_TO_DO_IT">أنا لا أريد أن تضيع الوقت مع تثبيت هذا أو ضمان أنه يعمل لموقع الويب الخاص بي؛ يمكنني دفع لك أن تفعل ذلك بالنسبة لي؟</a></li>
 <li><a href="#user-content-HIRE_FOR_PRIVATE_WORK">هل يمكنني توظيفك أو أي من مطوري هذا المشروع للعمل الخاص؟</a></li>
 <li><a href="#user-content-SPECIALIST_MODIFICATIONS">أنا بحاجة إلى تعديلات متخصصة، والتخصيصات، الخ؛ يمكنك أن تساعد؟</a></li>
 <li><a href="#user-content-ACCEPT_OR_OFFER_WORK">أنا مطور، مصمم موقع، أو مبرمج. هل يمكنني قبول أو عرض العمل المتعلق بهذا المشروع؟</a></li>
 <li><a href="#user-content-WANT_TO_CONTRIBUTE">أريد أن أساهم في المشروع؛ هل يمكنني فعل هذا؟</a></li>
 <li><a href="#user-content-SCAN_DEBUGGING">كيفية الوصول إلى تفاصيل محددة حول الملفات عند مسحها ضوئيا؟</a></li>
 <li><a href="#user-content-BLACK_WHITE_GREY">القوائم السوداء – القوائم البيضاء – القائمة الرمادية – ما هي، وكيف أستخدمها؟</a></li>
 <li><a href="#user-content-HOW_TO_USE_PDO">ما هو "PDO DSN"؟ كيف يمكنني استخدام PDO مع phpMussel؟</a></li>
 <li><a href="#user-content-AJAX_AJAJ_JSON">تحميلاتي غير متزامنة (على سبيل المثال، يستخدم ajax، ajaj، json، إلخ). لا أرى أي رسالة أو تحذير خاص عند حظر التحميل. ماذا يحدث هنا؟</a></li>
 <li><a href="#user-content-DETECT_EICAR">هل يستطيع phpMussel اكتشاف EICAR؟</a></li>
</ul></div>

#### <div dir="rtl"><a name="WHAT_IS_A_SIGNATURE"></a>ما هو "التوقيع"؟<br /><br /></div>

<div dir="rtl">في phpMussel، يشير "التوقيع" إلى البيانات التي تعمل كمعرف، وعادة ما تكون قطعة صغيرة من الكل أكبر لشيء نسعى. تتضمن عادة تصنيفا، وبيانات مفيدة أخرى للمساعدة في توفير سياق إضافي. وهذا يمكن أن يساعدنا على تحديد أفضل طريقة للمضي قدما عندما نجد ذلك.<br /><br /></div>

#### <div dir="rtl"><a name="WHAT_IS_A_FALSE_POSITIVE"></a>ما هو "إيجابية خاطئة"؟<br /><br /></div>

<div dir="rtl">المصطلح "إيجابية خاطئة" (<em>بدلا من ذلك: "خطأ إيجابية خاطئة"؛ "انذار خاطئة"</em>؛ الإنجليزية: <em>false positive</em>; <em>false positive error</em>; <em>false alarm</em>)، وصف ببساطة، بشكل عام، يستخدم عند اختبار حالة، للإشارة إلى نتائج هذا الاختبار، عندما تكون النتائج إيجابية (أي، تحديد حالة أن يكون "إيجابية"، أو "صحيح")، ولكن من المتوقع أن تكون (أو كان ينبغي أن يكون) سلبي (أي، الحالة، في الواقع، هو "سلبي"، أو "خاطئة"). "إيجابية خاطئة" ويمكن اعتبار التناظرية من "الذئب الباكي" (حيث لحالة يجري اختبارها هو ما إذا كان هناك ذئب بالقرب من القطيع، الحالة هو "خاطئة" في أنه لا يوجد الذئب بالقرب من القطيع، و الحالة يقال بأنها "إيجابية" بواسطة الراعي عن طريق الدعوة "الذئب، الذئب")، أو التناظرية من الفحص الطبي حيث المريض يتم تشخيص المرض، عندما تكون في واقع، ليس لديهم المرض.<br /><br /></div>

<div dir="rtl">بعض المصطلحات ذات الصلة هي "إيجابية صحيح"، "سلبي صحيح" و "سلبي خاطئة". "إيجابية صحيح" هو عندما تكون نتائج الاختبار والحالة الفعلية للحالة على حد سواء صحيح (أو "إيجابية")، و "سلبي صحيح" هو عندما تكون نتائج الاختبار والحالة الفعلية للحالة على حد سواء خاطئة (أو "سلبي")؛ "إيجابية صحيح" أو "سلبي صحيح" ويعتبر أن تكون "الاستدلال الصحيح". نقيض ل "إيجابية خاطئة" هو "سلبي خاطئة"؛ "سلبي خاطئة" هو عندما تكون النتائج سلبي (أي، تحديد حالة أن يكون "سلبي"، أو "خاطئة")، ولكن من المتوقع أن تكون (أو كان ينبغي أن يكون) إيجابية (أي، الحالة، في الواقع، هو "إيجابية"، أو "صحيح").<br /><br /></div>

<div dir="rtl">في سياق phpMussel، هذه المصطلحات تشير إلى التوقيعات phpMussel والملفات التي كانت منع. عندما phpMussel يمنع ملف نظرا لتوقيع سيئة، قديمة أو غير صحيحة، ولكن لا ينبغي أن تفعل ذلك، أو عندما يفعل ذلك لأسباب خاطئة، نشير إلى هذا الحدث باعتباره "إيجابية خاطئة". عندما phpMussel يفشل لمنع ملف التي كان ينبغي أن سدت، بسبب تهديدات غير متوقعة، التوقيعات المفقودة أو أوجه القصور توقيع، نشير إلى هذا الحدث باعتباره "افتقد" (هذا هو التناظرية من ا "سلبي خاطئة").<br /><br /></div>

<div dir="rtl">هذا يمكن تلخيصها حسب الجدول أدناه:<br /><br /></div>

&nbsp; <div dir="rtl" style="display:inline">phpMussel لا ينبغي منع ملف</div> | &nbsp; <div dir="rtl" style="display:inline">phpMussel يجب منع ملف</div> | &nbsp;
---|---|---
&nbsp; <div dir="rtl" style="display:inline">سلبي صحيح (الاستدلال الصحيح)</div> | <div dir="rtl">افتقد (التناظرية من سلبي خاطئة)</div> | <div dir="rtl"><strong>phpMussel لا يمنع ملف</strong></div>
&nbsp; <div dir="rtl" style="display:inline"><strong>إيجابية خاطئة</strong></div> | <div dir="rtl">إيجابية صحيح (الاستدلال الصحيح)</div> | <div dir="rtl"><strong>phpMussel منع ملف</strong></div>

#### <div dir="rtl"><a name="SIGNATURE_UPDATE_FREQUENCY"></a>عدد المرات التي يتم تحديثها التوقيعات؟<br /><br /></div>

<div dir="rtl">أنه يختلف. نحن نحاول قدر الإمكان، ولكن نظرا لالتزامات أخرى، حياتنا اليومية، وعدم حصولهم على رواتبهم، تحديث الجدول الزمني الدقيق لا يمكن أن تكون مضمونة. ورحب المساعدة دائما.<br /><br /></div>

#### <div dir="rtl"><a name="ENCOUNTERED_PROBLEM_WHAT_TO_DO"></a>لقد واجهت مشكلة! أنا لا أعرف ما يجب القيام به! الرجاء المساعدة!</div>
<div dir="rtl"><ul>
 <li>تحقق مما إذا كنت تستخدم أحدث إصدار من البرنامج والتوقيع الملفات.</li>
 <li>قراءة الوثائق. قد تكون هناك إجابات هناك.</li>
 <li>قراءة <strong><a href="https://github.com/phpMussel/phpMussel/issues">صفحة المشكلات</a></strong>. قد تكون هناك إجابات هناك.</li>
 <li>لا يوجد حتى الآن إجابات؟ يرجى طلب المساعدة عبر صفحة القضايا.</li>
</ul></div>

#### <div dir="rtl"><a name="MINIMUM_PHP_VERSION_V3"></a>أريد استخدام phpMussel v3 مع نسخة PHP كبار السن من 7.2.0؛ يمكنك أن تساعد؟<br /><br /></div>

<div dir="rtl">لا. PHP >= 7.2.0 هو الحد الأدنى لمتطلبات phpMussel v3.<br /><br /></div>

<div dir="rtl"><em>انظر أيضا: <a href="https://maikuolan.github.io/Compatibility-Charts/">مخططات التوافق</a>.</em><br /><br /></div>

#### <div dir="rtl"><a name="PROTECT_MULTIPLE_DOMAINS"></a>هل يمكنني استخدام تثبيت phpMussel واحد لحماية نطاقات متعددة؟<br /><br /></div>

<div dir="rtl">نعم.<br /><br /></div>

#### <div dir="rtl"><a name="PAY_YOU_TO_DO_IT"></a>أنا لا أريد أن تضيع الوقت مع تثبيت هذا أو ضمان أنه يعمل لموقع الويب الخاص بي؛ يمكنني دفع لك أن تفعل ذلك بالنسبة لي؟<br /><br /></div>

<div dir="rtl">ربما. وينظر في ذلك على أساس كل حالة على حدة. أخبرنا احتياجاتك وما تقدمه. سنخبرك بما إذا كنا نستطيع مساعدتك أم لا.<br /><br /></div>

#### <div dir="rtl"><a name="HIRE_FOR_PRIVATE_WORK"></a>هل يمكنني توظيفك أو أي من مطوري هذا المشروع للعمل الخاص؟<br /><br /></div>

<div dir="rtl"><em>راجع اإلجابة أعاله.</em><br /><br /></div>

#### <div dir="rtl"><a name="SPECIALIST_MODIFICATIONS"></a>أنا بحاجة إلى تعديلات متخصصة، والتخصيصات، الخ؛ يمكنك أن تساعد؟<br /><br /></div>

<div dir="rtl"><em>راجع اإلجابة أعاله.</em><br /><br /></div>

#### <div dir="rtl"><a name="ACCEPT_OR_OFFER_WORK"></a>أنا مطور، مصمم موقع، أو مبرمج. هل يمكنني قبول أو عرض العمل المتعلق بهذا المشروع؟<br /><br /></div>

<div dir="rtl">نعم. ترخيصنا لا يحظر هذا.<br /><br /></div>

#### <div dir="rtl"><a name="WANT_TO_CONTRIBUTE"></a>أريد أن أساهم في المشروع؛ هل يمكنني فعل هذا؟<br /><br /></div>

<div dir="rtl">نعم. المساهمة في المشروع هو موضع ترحيب كبير. يرجى الاطلاع على "CONTRIBUTING.md" لمزيد من المعلومات.<br /><br /></div>

#### <div dir="rtl"><a name="SCAN_DEBUGGING"></a>كيفية الوصول إلى تفاصيل محددة حول الملفات عند مسحها ضوئيا؟<br /><br /></div>

<div dir="rtl">يمكنك الوصول إلى تفاصيل محددة حول الملفات عند مسحها عن طريق تعيين مصفوفة لاستخدامها لهذا الغرض قبل توجيه phpMussel لمسحها.<br /><br /></div>

<div dir="rtl">في المثال أدناه، يتم تعيين <code dir="ltr">$Foo</code> لهذا الغرض. بعد مسح <code dir="ltr">/file/path/...</code>، سيتم تضمين معلومات مفصلة حول الملفات التي تحتوي عليها <code dir="ltr">/file/path/...</code> من قبل <code dir="ltr">$Foo</code>.<br /><br /></div>

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);

$Scanner->setScanDebugArray($Foo);

$Results = $Scanner->scan('/file/path/...');

var_dump($Foo);
```

<div dir="rtl">المصفوفة عبارة عن مصفوفة متعددة الأبعاد تتكون من عناصر تمثل كل ملف يتم مسحه ضوئيا وعناصر فرعية تمثل تفاصيل هذه الملفات. وهذه العناصر الفرعية هي كما يلي:<br /><br /></div>

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

<div dir="rtl"><em>† - لم يتم توفير نتائج مخبأة (تقدم فقط لنتائج مسح جديدة).</em><br /><br /></div>

<div dir="rtl"><em>‡ - يتم توفيرها فقط عند مسح ملفات PE.</em><br /><br /></div>

<div dir="rtl">اختياريا، يمكن تدمير هذه المصفوفة باستخدام ما يلي:<br /><br /></div>

```PHP
$Scanner->destroyScanDebugArray($Foo);
```

#### <div dir="rtl"><a name="BLACK_WHITE_GREY"></a>القوائم السوداء – القوائم البيضاء – القائمة الرمادية – ما هي، وكيف أستخدمها؟<br /><br /></div>

<div dir="rtl">تعبر المصطلحات معان مختلفة في سياقات مختلفة. في phpMussel، هناك ثلاث سياقات حيث يتم استخدام هذه المصطلحات: استجابة حجم الملف، استجابة نوع الملف، والتوقيع القائمة الرمادية.<br /><br /></div>

<div dir="rtl">من أجل تحقيق نتيجة مرغوبة بأقل تكلفة ممكنة للمعالجة، هناك بعض الأشياء البسيطة التي يمكن لـ phpMussel التحقق منها قبل مسح الملفات، مثل حجم الملف والاسم والامتداد. فمثلا؛ إذا كان الملف كبيرًا جدًا، أو إذا كانت إضافته تشير إلى نوع من الملفات لا نريد السماح به على مواقعنا الإلكترونية على أي حال، فيمكننا الإبلاغ عن الملف على الفور، ولا تحتاج إلى فحصه.<br /><br /></div>

<div dir="rtl">استجابة حجم الملف هي الطريقة التي يستجيب بها phpMussel عندما يتجاوز الملف حدًا معينًا. على الرغم من عدم وجود قوائم فعلية، يمكن اعتبار الملف في هذه القوائم بناءً على حجمه. يوجد خياران منفصلان للتوصيف لتحديد الحد والاستجابة المرغوبة على التوالي.<br /><br /></div>

<div dir="rtl">استجابة نوع الملف هي الطريقة التي يستجيب بها phpMussel لتمديد الملف. توجد ثلاثة خيارات تكوين منفصلة لتحديد الإضافات التي يجب أن تكون على أي القوائم. يمكن اعتبار الملف مدرجًا بشكل فعال إذا كانت إضافته مطابقة لأي من الإضافات المحددة على التوالي.<br /><br /></div>

<div dir="rtl">في هذين السياقين، يعني الوجود في القائمة البيضاء أنه لا يجب فحصه أو وضع علامة عليه؛ في القائمة السوداء يعني أنه يجب وضع علامة عليها (وبالتالي لا تحتاج لمسحها ضوئيًا)؛ وكونه على الشبح الرمزي يعني أن هناك حاجة إلى مزيد من التحليل لتحديد ما إذا كان ينبغي لنا وضع علامة عليه (أي، يجب فحصها).<br /><br /></div>

<div dir="rtl">القائمة الرمادية هو قائمة بالتوقيعات التي يجب تجاهلها (هذا يذكر لفترة وجيزة في وقت سابق من الوثائق). عندما يتم تشغيل التوقيع على توقيع القائمة الرمادية، يستمر phpMussel بالعمل من خلال توقيعاته ولا يتخذ أي إجراء معين فيما يتعلق بالتوقيع. لا توجد قائمة سوداء مميزة، لأن السلوك الضمني هو سلوك طبيعي للتوقيعات المشغلة على أي حال، وليس هناك قائمة بيضاء مميزة، لأن السلوك الضمني لن يكون منطقيًا حقًا بالنظر إلى كيفية عمل phpMussel العادي والإمكانيات المتوفرة لديه بالفعل.<br /><br /></div>

<div dir="rtl">يكون توقيع القائمة الرمادية مفيدًا إذا كنت بحاجة إلى حل المشكلات التي يسببها توقيع معين دون تعطيل أو إلغاء تثبيت ملف التوقيع بأكمله.<br /><br /></div>

#### <div dir="rtl"><a name="HOW_TO_USE_PDO"></a>ما هو "PDO DSN"؟ كيف يمكنني استخدام PDO مع phpMussel؟<br /><br /></div>

<div dir="rtl">"PDO" هو اختصار لـ "<a dir="ltr" href="https://www.php.net/manual/en/intro.pdo.php">PHP Data Objects</a>" (كائنات بيانات PHP). يوفر واجهة لـ PHP لتكون قادرة على الاتصال ببعض أنظمة قواعد البيانات التي يشيع استخدامها في مختلف تطبيقات PHP.<br /><br /></div>

<div dir="rtl">"DSN" هو اختصار لـ "<a dir="ltr" href="https://en.wikipedia.org/wiki/Data_source_name">data source name</a>" (اسم مصدر البيانات). يصف "PDO DSN" لـ PDO كيف يجب أن تتصل بقاعدة بيانات.<br /><br /></div>

<div dir="rtl">يوفر phpMussel خيار استخدام PDO لأغراض التخزين المؤقت. من أجل هذا للعمل بشكل صحيح، ستحتاج إلى تكوين phpMussel وفقًا لذلك، وتمكين PDO، وإنشاء قاعدة بيانات جديدة لاستخدام لphpMussel (إذا لم يكن لديك بالفعل قاعدة بيانات لاستخدام لphpMussel)، وإنشاء جدول جديد في قاعدة البيانات الخاصة بك بما يتوافق مع الهيكل الموصوف أدناه.<br /><br /></div>

<div dir="rtl">عندما يكون اتصال قاعدة البيانات بنجاح، لكن الجدول الضروري غير موجود، فسيحاول إنشاؤه تلقائيًا. ومع ذلك، لم يتم اختبار هذا السلوك على نطاق واسع ولا يمكن ضمان النجاح.<br /><br /></div>

<div dir="rtl">هذا، بالطبع، ينطبق فقط إذا كنت تريد بالفعل أن تستخدم PDO لphpMussel. إذا كنت سعيدًا بدرجة كافية لاستخدام التخزين المؤقت للملفات (وفقًا للتهيئة الافتراضية لـ phpMussel)، أو أي من خيارات التخزين المؤقت الأخرى المتوفرة، فلن تحتاج إلى متاعب نفسك في إعداد قواعد البيانات والجداول.<br /><br /></div>

<div dir="rtl">يستخدم الهيكل الموصوف أدناه "phpmussel" كاسم قاعدة البيانات الخاصة به، ولكن يمكنك استخدام أي اسم تريده لقاعدة البيانات الخاصة بك، طالما يتم نسخ نفس الاسم في تكوين DSN الخاص بك.<br /><br /></div>

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

<div dir="rtl">يجب تكوين توجيه التكوين <code dir="ltr">pdo_dsn</code> الخاص بـ phpMussel كما هو موضح أدناه.<br /><br /></div>

```
اعتمادًا على برنامج تشغيل قاعدة البيانات المستخدم...
├─4d (تحذير: تجريبي، لم يتم اختباره، غير مستحسن)
│ │
│ │         ╔═══════╗
│ └─4D:host=localhost;charset=UTF-8
│           ╚╤══════╝
│            └المضيف للاتصال مع للعثور على قاعدة البيانات
├─cubrid
│ │
│ │             ╔═══════╗      ╔═══╗        ╔═════╗
│ └─cubrid:host=localhost;port=33000;dbname=example
│               ╚╤══════╝      ╚╤══╝        ╚╤════╝
│                │              │            └اسم قاعدة البيانات المراد استخدامها
│                │              │
│                │              └رقم المنفذ للاتصال بالمضيف مع
│                │
│                └المضيف للاتصال مع للعثور على قاعدة البيانات
├─dblib
│ │
│ │ ╔═══╗      ╔═══════╗        ╔═════╗
│ └─dblib:host=localhost;dbname=example
│   ╚╤══╝      ╚╤══════╝        ╚╤════╝
│    │          │                └اسم قاعدة البيانات المراد استخدامها
│    │          │
│    │          └المضيف للاتصال مع للعثور على قاعدة البيانات
│    │
│    └"mssql", "sybase", "dblib": القيم الممكنة
├─firebird
│ │
│ │                 ╔═══════════════════╗
│ └─firebird:dbname=/path/to/database.fdb
│                   ╚╤══════════════════╝
│                    ├يمكن أن يكون الطريق إلى ملف قاعدة البيانات المحلية
│                    │
│                    ├يمكن الاتصال مع المضيف ورقم المنفذ
│                    │
│                    └يجب عليك الرجوع إلى وثائق Firebird إذا كنت تريد استخدام هذا
├─ibm
│ │
│ │         ╔═════╗
│ └─ibm:DSN=example
│           ╚╤════╝
│            └التي فهرستها قاعدة البيانات للتواصل مع
├─informix
│ │
│ │              ╔═════╗
│ └─informix:DSN=example
│                ╚╤════╝
│                 └التي فهرستها قاعدة البيانات للتواصل مع
├─mysql (الأكثر الموصى بها)
│ │
│ │              ╔═════╗      ╔═══════╗      ╔══╗
│ └─mysql:dbname=example;host=localhost;port=3306
│                ╚╤════╝      ╚╤══════╝      ╚╤═╝
│                 │            │              └رقم المنفذ للاتصال بالمضيف مع
│                 │            │
│                 │            └المضيف للاتصال مع للعثور على قاعدة البيانات
│                 │
│                 └اسم قاعدة البيانات المراد استخدامها
├─oci
│ │
│ │            ╔═════╗
│ └─oci:dbname=example
│              ╚╤════╝
│               ├يمكن الرجوع إلى قاعدة البيانات المفهرسة المحددة
│               │
│               ├يمكن الاتصال مع المضيف ورقم المنفذ
│               │
│               └يجب عليك الرجوع إلى وثائق Oracle إذا كنت تريد استخدام هذا
├─odbc
│ │
│ │      ╔═════╗
│ └─odbc:example
│        ╚╤════╝
│         ├يمكن الرجوع إلى قاعدة البيانات المفهرسة المحددة
│         │
│         ├يمكن الاتصال مع المضيف ورقم المنفذ
│         │
│         └└يجب عليك الرجوع إلى وثائق ODBC/DB2 إذا كنت تريد استخدام هذا
├─pgsql
│ │
│ │            ╔═══════╗      ╔══╗        ╔═════╗
│ └─pgsql:host=localhost;port=5432;dbname=example
│              ╚╤══════╝      ╚╤═╝        ╚╤════╝
│               │              │           └اسم قاعدة البيانات المراد استخدامها
│               │              │
│               │              └رقم المنفذ للاتصال بالمضيف مع
│               │
│               └المضيف للاتصال مع للعثور على قاعدة البيانات
├─sqlite
│ │
│ │        ╔════════╗
│ └─sqlite:example.db
│          ╚╤═══════╝
│           └المسار إلى ملف قاعدة البيانات المحلية للاستخدام
└─sqlsrv
  │
  │               ╔═══════╗ ╔══╗          ╔═════╗
  └─sqlsrv:Server=localhost,1521;Database=example
                  ╚╤══════╝ ╚╤═╝          ╚╤════╝
                   │         │             └اسم قاعدة البيانات المراد استخدامها
                   │         │
                   │         └رقم المنفذ للاتصال بالمضيف مع
                   │
                   └المضيف للاتصال مع للعثور على قاعدة البيانات
```

<div dir="rtl">إذا لم تكن متأكدًا مما يمكنك استخدامه في جزء معين من DSN، فحاول أولاً معرفة ما إذا كان يعمل كما هو، دون تغيير أي شيء.<br /><br /></div>

<div dir="rtl">لاحظ أن <code dir="ltr">pdo_username</code> و <code dir="ltr">pdo_password</code> يجب أن يكونا نفس اسم المستخدم وكلمة المرور اللذين اخترتهما لقاعدة بياناتك.<br /><br /></div>

#### <div dir="rtl"><a name="AJAX_AJAJ_JSON"></a>تحميلاتي غير متزامنة (على سبيل المثال، يستخدم ajax، ajaj، json، إلخ). لا أرى أي رسالة أو تحذير خاص عند حظر التحميل. ماذا يحدث هنا؟<br /><br /></div>

<div dir="rtl">هذا امر طبيعي. يتم تقديم صفحة phpMussel القياسية "رفض تحميل" ك HTML، والتي يجب أن تكون كافية للطلبات المتزامنة المعتادة، ولكن ربما لن يكون ذلك كافيًا إذا كانت وسيلة التحميل لديك تتوقع شيئًا آخر. إذا كانت عمليات التحميل غير متزامنة، أو تحتاج إلى تقديمها بشكل غير متزامن، هناك بعض الأشياء التي يمكنك تجربتها حتى يتمكن phpMussel من تلبية احتياجات وظيفة التحميل.<br /><br /></div>

<div dir="rtl"><ul>
 <li>١. إنشاء قالب إخراج مخصص لخدمة شيء آخر غير HTML.</li>
 <li>٢. إنشاء مكون إضافي مخصص لتجاوز صفحة "رفض تحميل" القياسية تمامًا واطلب من معالج التحميل فعل شيء آخر عندما يتم حظر التحميل (هناك بعض روابط المكوّنات الإضافية التي يوفرها معالج التحميل والتي قد تكون مفيدة لهذا الغرض).</li>
 <li>٣. تعطيل معالج التحميل بالكامل وبدلاً من ذلك فقط اتصل بـ phpMussel API من داخل وظيفة التحميل الخاصة بك.</li>
</ul></div>

#### <div dir="rtl"><a name="DETECT_EICAR"></a>هل يستطيع phpMussel اكتشاف EICAR؟<br /><br /></div>

<div dir="rtl">نعم. يتم تضمين توقيع للكشف عن EICAR في "ملف توقيع التعبيرات العادية القياسية phpMussel" (<code dir="ltr">phpmussel_regex.db</code>). طالما تم تثبيت ملف التوقيع هذا وتنشيطه، يجب أن يكون phpMussel قادرًا على اكتشاف EICAR. نظرًا لأن قاعدة بيانات ClamAV تتضمن أيضًا العديد من التوقيعات خصيصًا لاكتشاف EICAR، يمكن لـ ClamAV اكتشاف EICAR بسهولة، ولكن نظرًا لأن phpMussel لا يستخدم سوى مجموعة فرعية صغيرة من إجمالي التوقيعات التي يوفرها ClamAV، فقد لا تكون كافية في حد ذاتها لـ phpMussel لاكتشاف EICAR. قد تعتمد القدرة على اكتشافه أيضًا على التكوين الدقيق الخاص بك.<br /><br /></div>

---


### <div dir="rtl">٩. <a name="SECTION9"></a>المعلومات القانونية</div>

#### <div dir="rtl">٩.٠ مقدمة القسم<br /><br /></div>

<div dir="rtl">يصف هذا القسم من الوثائق الاعتبارات القانونية الممكنة فيما يتعلق باستخدام الحزمة وتنفيذها، ويوفر بعض المعلومات الأساسية ذات الصلة. قد يكون هذا مهمًا لبعض المستخدمين كوسيلة لضمان التوافق مع أي متطلبات قانونية قد تكون موجودة في البلدان التي يعملون فيها، وقد يحتاج بعض المستخدمين إلى تعديل سياسات موقع الويب الخاصة بهم وفقًا لهذه المعلومات.<br /><br /></div>

<div dir="rtl">أولا، يرجى ندرك أنني (مؤلف حزمة) لست محام، وليس أي نوع من المهنيين القانونيين المؤهلين. لذلك، لست مؤهلاً قانونًا لتقديم المشورة القانونية. أيضا، في بعض الحالات، قد تختلف المتطلبات القانونية بين الدول والاختصاصات المختلفة، وهذه المتطلبات القانونية المتفاوتة قد تكون متناقضة في بعض الأحيان (على سبيل المثال، الدول التي تفضل "<a href="https://ar.wikipedia.org/wiki/%D8%AD%D9%82_%D9%81%D9%8A_%D8%A7%D9%84%D8%AE%D8%B5%D9%88%D8%B5%D9%8A%D8%A9">حقوق الخصوصية</a>" و "<a href="https://ar.wikipedia.org/wiki/%D8%AD%D9%82_%D8%A7%D9%84%D9%85%D8%B1%D8%A1_%D8%A3%D9%86_%D9%8A%D9%86%D8%B3%D9%89">الحق في أن تنسى</a>"، مقارنة بالبلدان التي تفضل "الاحتفاظ بالبيانات"). ضع في اعتبارك أيضًا أن الوصول إلى الحزمة لا يقتصر على بلدان أو ولايات قضائية محددة، وبالتالي، فإن مستخدمي الحزمة من المحتمل أن يكونوا متنوعين جغرافيًا. بالنظر إلى هذه النقاط، فأنا لست في وضع يسمح لي بالإشارة إلى ما يعنيه أن يكون "متوافقة مع القانون" مع الجميع. ومع ذلك، آمل أن تساعدك هذه المعلومات على أن تقرر بنفسك ما يجب عليك القيام به للبقاء ملتزمين قانونًا في سياق الحزمة. إذا كانت لديك أي شكوك بخصوص هذه المعلومات، أو إذا كنت بحاجة إلى مساعدة ومشورة إضافية من منظور قانوني، فإنني أوصيك باستشارة متخصص قانوني مؤهل.<br /><br /></div>

#### <div dir="rtl">٩.١ المسؤولية<br /><br /></div>

<div dir="rtl">كما هو مذكور بالفعل من قبل ترخيص الحزمة، يتم توفير الحزمة دون أي ضمان. وهذا يشمل (على سبيل المثال لا الحصر) كل نطاق المسؤولية. يتم توفير الحزمة لك لراحتك، على أمل أن تكون مفيدة، وأنها سوف توفر بعض الفائدة بالنسبة لك. ومع ذلك، سواء كنت تستخدم أو تنفذ الحزمة، فذلك هو خيارك. لا تضطر إلى استخدام الحزمة أو تنفيذها، ولكن عندما تقوم بذلك، فأنت مسؤول عن هذا القرار. لا أنا ولا أي مساهم آخر في الحزمة مسؤول قانونيًا عن عواقب القرارات التي تتخذها، بصرف النظر عما إذا كانت مباشرة أو غير مباشرة أو ضمنية أو غير ذلك.<br /><br /></div>

#### <div dir="rtl">٩.٢ الأطراف الثالثة<br /><br /></div>

<div dir="rtl">اعتمادا على التكوين الدقيق والتنفيذ، قد تتواصل الحزمة وتتبادل المعلومات مع أطراف ثالثة في بعض الحالات. في بعض السياقات، من خلال بعض السلطات القضائية، يمكن تعريف ذلك على أنه "<a href="https://ar.wikipedia.org/wiki/%D9%85%D8%B9%D9%84%D9%88%D9%85%D8%A7%D8%AA_%D8%B4%D8%AE%D8%B5%D9%8A%D8%A9">معلومات تعريف شخصية</a>".<br /><br /></div>

<div dir="rtl">إن كيفية استخدام هذه المعلومات من قِبل هذه الجهات الخارجية تخضع لسياساتها، وهي خارج نطاق هذه الوثائق. ومع ذلك، في جميع هذه الحالات، يمكن تعطيل مشاركة المعلومات. في جميع هذه الحالات، إذا اخترت تمكينها، تقع على عاتقك مسؤولية البحث عن أي مخاوف قد تكون لديك بشأن الخصوصية والأمان واستخدام هذه المعلومات من قِبل هذه الأطراف الثالثة. إذا وجدت أي شكوك، أو إذا كنت غير راضي عن سلوك هذه الأطراف الثالثة، قد يكون من الأفضل تعطيل كل مشاركة المعلومات مع هذه الأطراف الثالثة.<br /><br /></div>

<div dir="rtl">لغرض الشفافية، يتم وصف نوع المعلومات المشتركة أدناه.<br /><br /></div>

##### <div dir="rtl">٩.٢.١ ماسح URL<br /><br /></div>

<div dir="rtl">قد تتم مشاركة عناوين URL الموجودة داخل عمليات تحميل الملفات مع براجهة برمجة تطبيقات التصفح الآمن Google، بناءً على كيفية تهيئة الحزمة. تتطلب واجهة برمجة تطبيقات التصفح الآمن من Google مفاتيح API لكي تعمل بشكل صحيح، وبالتالي يتم تعطيلها افتراضيًا.<br /><br /></div>

<div dir="rtl">خيارات التكوين ذات الصلة:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">google_api_key</code> &lt;- <code dir="ltr">urlscanner</code></li>
</ul></div>

##### <div dir="rtl">٩.٢.٢ VIRUS TOTAL<br /><br /></div>

<div dir="rtl">عندما يقوم phpMussel بمسح تحميل الملف، قد تتم مشاركة تجزئة تلك الملفات مع Virus Total API، بناءً على كيفية تكوين الحزمة. هناك خطط لتتمكن من مشاركة ملفات كاملة في وقت ما في المستقبل أيضًا، ولكن هذه الميزة غير مدعومة بواسطة الحزمة في الوقت الحالي. مطلوب مفتاح API من أجل استخدام هذه الميزة.<br /><br /></div>

<div dir="rtl">يمكن أيضًا مشاركة المعلومات (بما في ذلك الملفات والبيانات الوصفية ذات الصلة للملف) التي تم مشاركتها مع Virus Total مع شركائها والشركات التابعة لها ومختلف الشركات الأخرى لأغراض البحث. يتم وصف ذلك بمزيد من التفاصيل من خلال سياسة الخصوصية الخاصة بهم.<br /><br /></div>

<div dir="rtl">نرى: <a dir="ltr" href="https://support.virustotal.com/hc/en-us/articles/115002168385-Privacy-Policy">Privacy Policy &ndash; VirusTotal</a>.<br /><br /></div>

<div dir="rtl">خيارات التكوين ذات الصلة:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">vt_public_api_key</code> &lt;- <code dir="ltr">virustotal</code></li>
</ul></div>

#### <div dir="rtl">٩.٣ تسجيل<br /><br /></div>

<div dir="rtl">التسجيل هو جزء مهم من phpMussel لعدد من الأسباب. قد يكون من الصعب تشخيص وحل إيجابيات خاطئة عندما لا يتم تسجيل أحداث الحظر التي تسبب لهم. بدون تسجيل، قد يكون من الصعب تشخيص الإيجابيات الكاذبة، للتأكد من أداء phpMussel بشكل جيد، وقد يكون من الصعب تحديد مواطن ضعفها، وما هي التغييرات التي قد تكون مطلوبة لتكوينها أو توقيعاتها، لكي تستمر في العمل على النحو المنشود. بغض النظر، ربما لا يريد الجميع التسجيل، لذلك يبقى اختياريًا تمامًا. في phpMussel، يتم تعطيل التسجيل افتراضيًا. لتمكينه، يجب تكوين phpMussel وفقًا لذلك.<br /><br /></div>

<div dir="rtl">بالإضافة إلى، ما إذا كان تخزين هذا النوع من البياناتمسموحًا به قانونًا، وإلى الحد المسموح به قانونًا (ذلك بالقول، أنواع المعلومات التي يمكن تسجيلها، إلى متى، وتحت أي ظروف)، قد تختلف، وهذا يتوقف على الاختصاص واعتمادًا على سياق التنفيذ (فمثلا، سواء كنت تعمل كفرد أو مؤسسة، وعما إذا كان ذلك على أساس تجاري أو غير تجاري). لذلك قد يكون من المفيد لك قراءة هذا القسم بعناية.<br /><br /></div>

<div dir="rtl">هناك العديد من أنواع المعلومات المختلفة التي يمكن تسجيلها، لأسباب مختلفة.<br /><br /></div>

##### <div dir="rtl">٩.٣.٠ سجلات الفحص<br /><br /></div>

<div dir="rtl">عند تمكينه في تكوين الحزمة، يحتفظ phpMussel بسجلات الملفات التي يقوم بمسحها. يتوفر هذا النوع من التسجيل بتنسيقين مختلفين:<br /></div>
<div dir="rtl"><ul>
 <li>السجلات التي يمكن قراءتها من قبل البشر.</li>
 <li>سجلات مسلسلة.</li>
</ul></div>

<div dir="rtl">عادةً ما تبدو الإدخالات إلى ملف السجل البشري المقروء شيئًا مثل هذا (كمثال):<br /><br /></div>

```
Sun, 19 Jul 2020 13:33:31 +0800 بدأت.
→ فحص "ascii_standard_testfile.txt".
─→ الكشف phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
Sun, 19 Jul 2020 13:33:31 +0800 انتهى.
```

<div dir="rtl">عادةً ما يتضمن إدخال سجل الفحص المعلومات التالية:<br /></div>
<div dir="rtl"><ul>
 <li>تاريخ ووقت فحص الملف.</li>
 <li>اسم الملف الممسوح ضوئيًا.</li>
 <li>ما تم اكتشافه في الملف (إذا تم اكتشاف أي شيء).</li>
</ul></div>

<div dir="rtl">خيارات التكوين ذات الصلة:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">scan_log</code> &lt;- <code dir="ltr">general</code></li>
 <li><code dir="ltr">scan_log_serialized</code> &lt;- <code dir="ltr">general</code></li>
</ul></div>

<div dir="rtl">عندما يتم ترك هذه التوجيهات فارغة، سيظل هذا النوع من التسجيل معطلاً.<br /><br /></div>

##### <div dir="rtl">٩.٣.١ سجل التحميلات<br /><br /></div>

<div dir="rtl">عند تمكينه في تكوين الحزمة، phpMussel يحتفظ بسجلات التحميلات التي تم حظرها.<br /><br /></div>

<div dir="rtl">إدخال سجل مثال:<br /><br /></div>

<pre dir="rtl">
التاريخ: <code dir="ltr">Sun, 19 Jul 2020 13:33:31 +0800</code>
عنوان IP: <code dir="ltr">127.0.0.x</code>
== نتائج المسح (لماذا تم الإبلاغ عنها) ==
الكشف <code dir="ltr">phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)</code>!
== إعادة بناء التواقيع التجزئة ==
<code dir="ltr">dcacac499064454218823fbabff7e09b5b011c0c877ee6f215f35bffb195b6e9:654:ascii_standard_testfile.txt</code>
الحجر الصحي بأنه "<code dir="ltr">1595142388-2e017ea9ac1478e45dc15794a1fc18c0.qfu</code>".
</pre>

<div dir="rtl">عادةً ما تتضمن إدخالات السجل هذه المعلومات التالية:<br /></div>
<div dir="rtl"><ul>
 <li>التاريخ والوقت الذي تم حظر التحميل فيه.</li>
 <li>عنوان IP الذي نشأ فيه التحميل.</li>
 <li>سبب حظر الملف (ما تم اكتشافه).</li>
 <li>اسم الملف المحظور.</li>
 <li>تم حظر المجموع الاختباري وحجم الملف.</li>
 <li>ما إذا كان الملف قد تم عزله، وتحت أي اسم داخلي.</li>
</ul></div>

<div dir="rtl">خيارات التكوين ذات الصلة:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">uploads_log</code> &lt;- <code dir="ltr">web</code></li>
</ul></div>

##### <div dir="rtl">٩.٣.٢ سجلات الواجهة الأمامية<br /><br /></div>

<div dir="rtl">هذا التسجيل يتصل محاولات تسجيل الدخول الأمامية. يحدث فقط عندما يحاول مستخدم تسجيل الدخول إلى الواجهة الأمامية، وفقط عندما يتم تمكين الوصول للجهة الأمامية.<br /><br /></div>

<div dir="rtl">يحتوي إدخال سجل الواجهة الأمامية على عنوان IP الخاص بالمستخدم الذي يحاول تسجيل الدخول وتاريخ ووقت حدوث المحاولة ونتائج المحاولة (تم تسجيل الدخول بنجاح، أو فشل في تسجيل الدخول). يبدو عادة مثل هذا (كمثال):<br /><br /></div>

```
x.x.x.x - Day, dd Mon 20xx hh:ii:ss +0000 - "admin" - حاليا على.
```

<div dir="rtl">خيارات التكوين ذات الصلة:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">frontend_log</code> &lt;- <code dir="ltr">general</code></li>
</ul></div>

##### <div dir="rtl">٩.٣.٣ دوران السجل<br /><br /></div>

<div dir="rtl">قد ترغب في تطهير السجلات بعد فترة من الوقت، أو قد تكون مطلوبة للقيام بذلك بموجب القانون (أي أن مقدار الوقت المسموح به قانونًا لك للاحتفاظ بالسجلات قد يكون محدودًا بموجب القانون). يمكنك تحقيق ذلك عن طريق تضمين علامات التاريخ/الوقت في أسماء ملفات السجل الخاصة بك كما هو محدد بواسطة تكوين الحزمة الخاصة بك (على سبيل المثال، <code dir="ltr">{yyyy}-{mm}-{dd}.log</code>)، ثم تمكين دوران السجل (يسمح لك تدوير السجل بتنفيذ بعض الإجراءات على ملفات السجل عندما يتم تجاوز الحدود المحددة).<br /><br /></div>

<div dir="rtl">فمثلا: إذا كان من الضروري قانونًا حذف السجلات بعد 30 يومًا، يمكنني تحديد <code dir="ltr">{dd}.log</code> في أسماء ملفات السجل الخاصة بي (<code dir="ltr">{dd}</code> يمثل عدد الأيام)، قم بتعيين قيمة <code dir="ltr">log_rotation_limit</code> إلى 30، وقم بتعيين قيمة <code dir="ltr">log_rotation_action</code> إلى <code dir="ltr">Delete</code>.<br /><br /></div>

<div dir="rtl">على العكس من ذلك، إذا كنت مطالبًا بالاحتفاظ بالسجلات لفترة زمنية طويلة، فيمكنك تعطيل تدوير السجل، أو يمكنك تعيين قيمة <code dir="ltr">log_rotation_action</code> إلى <code dir="ltr">Archive</code>، لضغط ملفات السجل، وبالتالي تقليل إجمالي مساحة القرص التي يشغلونها.<br /><br /></div>

<div dir="rtl">خيارات التكوين ذات الصلة:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">log_rotation_limit</code> &lt;- <code dir="ltr">general</code></li>
 <li><code dir="ltr">log_rotation_action</code> &lt;- <code dir="ltr">general</code></li>
</ul></div>

##### <div dir="rtl">٩.٣.٤ سجل اقتطاع<br /><br /></div>

<div dir="rtl">إذا أردت، يمكنك اقتطاع ملفات السجل الفردية عندما تتجاوز حجمًا معينًا.<br /><br /></div>

<div dir="rtl">خيارات التكوين ذات الصلة:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">truncate</code> &lt;- <code dir="ltr">general</code></li>
</ul></div>

##### <div dir="rtl">٩.٣.٥ عنوان IP PSEUDONYMISATION<br /><br /></div>

<div dir="rtl">أولاً، إذا لم تكن على دراية بهذا المصطلح، "pseudonymisation" يشير إلى معالجة البيانات الشخصية على هذا النحو بحيث لا يمكن تحديدها لأي موضوع بيانات محدد بعد الآن بدون معلومات إضافية، وشريطة أن يتم الاحتفاظ بهذه المعلومات التكميلية بشكل منفصل وتخضع للتدابير التقنية والتنظيمية لضمان عدم إمكانية تحديد البيانات الشخصية لأي شخص طبيعي.<br /><br /></div>

<div dir="rtl">يمكن أن تساعد الموارد التالية في شرحها بمزيد من التفاصيل:</div>
<div dir="rtl"><ul>
 <li><a dir="ltr" href="https://www.trust-hub.com/news/what-is-pseudonymisation/">[trust-hub.com] What is pseudonymisation?</a></li>
 <li><a dir="ltr" href="https://en.wikipedia.org/wiki/Pseudonymization">[Wikipedia] Pseudonymization</a></li>
</ul></div>

<div dir="rtl">في بعض الحالات، قد يُطلب منك قانونًا تنفيذ "anonymisation" أو "pseudonymisation" لأي معلومات PII تم جمعها أو معالجتها أو تخزينها. على الرغم من وجود هذا المفهوم منذ بعض الوقت، GDPR/DSGVO يذكر بشكل ملحوظ ويشجع "pseudonymisation".<br /><br /></div>

<div dir="rtl">إذا أردت، يمكن لـ phpMussel القيام بذلك لعناوين IP عند الكتابة إلى السجلات. عند الكتابة إلى السجلات، سيتم تمثيل الثمانية النهائية لعناوين IPv4 وكل شيء بعد الجزء الثاني من عناوين IPv6 بواسطة "x" (تقريب عناوين IPv4 إلى العنوان الأولي للشبكة الفرعية الـ 24 التي تدخلها، وعناوين IPv6 إلى العنوان الأولي للشبكة الفرعية 32 التي تدخلها).<br /><br /></div>

<div dir="rtl">خيارات التكوين ذات الصلة:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">pseudonymise_ip_addresses</code> &lt;- <code dir="ltr">legal</code></li>
</ul></div>

##### <div dir="rtl">٩.٣.٦ الإحصاء<br /><br /></div>

<div dir="rtl">phpMussel قادر بشكل اختياري على تتبع الإحصائيات مثل العدد الإجمالي للملفات التي تم مسحها وحظرها منذ وقت معين. يتم تعطيل هذه الميزة بشكل افتراضي، ولكن يمكن تمكينها من خلال تهيئة الحزمة. لا يجب اعتبار نوع المعلومات التي يتم تتبعها كمعلومات تحديد الهوية الشخصية.<br /><br /></div>

<div dir="rtl">خيارات التكوين ذات الصلة:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">statistics</code> &lt;- <code dir="ltr">general</code></li>
</ul></div>

##### <div dir="rtl">٩.٣.٧ التشفير<br /><br /></div>

<div dir="rtl">لا يقوم phpMussel بتشفير ذاكرة التخزين المؤقت أو أي معلومات سجل. قد يتم إدخال <a href="https://ar.wikipedia.org/wiki/%D8%AA%D8%B4%D9%81%D9%8A%D8%B1">تشفير</a> ذاكرة التخزين المؤقت والسجلات في المستقبل، ولكن لا توجد خطط محددة لها حاليًا. إذا كنت قلقًا بشأن حصول أطراف ثالثة غير مصرح لها على إمكانية الوصول إلى أجزاء من phpMussel قد تحتوي على معلومات تحديد الهوية الشخصية أو معلومات حساسة مثل ذاكرة التخزين المؤقت أو السجلات، أوصي بعدم تثبيت phpMussel في مكان يمكن الوصول إليه بشكل عام (على سبيل المثال، مجلد تثبيت phpMussel خارج الدليل <code dir="ltr">public_html</code> القياسي أو ما يعادله، متاح لمعظم خوادم الويب القياسية) والتأكد من فرض الأذونات المقيدة بشكل مناسب لدليل التثبيت. إذا لم يكن ذلك كافيًا لمعالجة مخاوفك، فقم بتكوين phpMussel بحيث لا يتم جمع أنواع المعلومات التي تسبب مخاوفك أو تسجيلها في المقام الأول (مثل، عن طريق تعطيل التسجيل).<br /><br /></div>

#### <div dir="rtl">٩.٤ ملف تعريف ارتباط<br /><br /></div>

<div dir="rtl">عندما يسجل المستخدم بنجاح في الواجهة الأمامية، يعين phpMussel <a href="https://ar.wikipedia.org/wiki/%D9%85%D9%84%D9%81_%D8%AA%D8%B9%D8%B1%D9%8A%D9%81_%D8%A7%D8%B1%D8%AA%D8%A8%D8%A7%D8%B7">ملف تعريف ارتباط</a> حتى يتمكن من تذكر المستخدم للطلبات اللاحقة (أي، يتم استخدام ملفات تعريف الارتباط لمصادقة المستخدم على جلسة تسجيل الدخول). في صفحة تسجيل الدخول، يتم عرض تحذير ملف تعريف ارتباط بشكل بارز، ويحذر المستخدم من أنه سيتم تعيين ملف تعريف ارتباط إذا شارك في الإجراء ذي الصلة. لا يتم تعيين ملفات تعريف الارتباط في أي نقاط أخرى في مصدر التعليمات البرمجية.<br /><br /></div>

#### <div dir="rtl">٩.٥ التسويق والإعلان<br /><br /></div>

<div dir="rtl">لا تجمع phpMussel أو تعالج أي معلومات لأغراض التسويق أو الإعلانات، ولا تبيع أو تحقق أرباحًا من أي معلومات تم جمعها أو تسجيلها. phpMussel ليست مؤسسة تجارية، ولا ترتبط بأي مصالح تجارية، لذا فإن القيام بهذه الأشياء لن يكون له أي معنى. كان هذا هو الحال منذ بداية المشروع، وما زالت الحالة اليوم. بالإضافة إلى ذلك، فإن القيام بهذه الأشياء سيؤدي إلى نتائج عكسية للمشروع والغرض المقصود من المشروع ككل، وطالما استمر في الحفاظ على المشروع، لن يحدث أبداً.<br /><br /></div>

#### <div dir="rtl">٩.٦ سياسة الخصوصية<br /><br /></div>

<div dir="rtl">في بعض الحالات، قد يُطلب منك قانونًا عرض رابط لسياسة الخصوصية بوضوح في جميع صفحات وأقسام موقعك. قد يكون هذا أمرًا مهمًا كوسيلة لضمان معرفة المستخدمين جيدًا بممارسات الخصوصية الدقيقة، وأنواع معلومات تحديد الهوية الشخصية التي تجمعها، وكيفية تنوي استخدامها. لتتمكن من تضمين مثل هذا الارتباط في صفحة "رفض تحميل" الخاصة بـ phpMussel، يتم توفير توجيه تكوين لتحديد عنوان URL لسياسة الخصوصية الخاصة بك.<br /><br /></div>

<div dir="rtl">خيارات التكوين ذات الصلة:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">privacy_policy</code> &lt;- <code dir="ltr">legal</code></li>
</ul></div>

#### <div dir="rtl">٩.٧ GDPR/DSGVO<br /><br /></div>

<div dir="rtl">يعد اللائحة العامة لحماية البيانات (GDPR) لائحة خاصة بالاتحاد الأوروبي، والتي تدخل حيز التنفيذ اعتبارًا من 25 مايو 2018. الهدف الأساسي من التنظيم هو إعطاء السيطرة على المواطنين والمقيمين في الاتحاد الأوروبي فيما يتعلق ببياناتهم الشخصية، وتوحيد الأنظمة داخل الاتحاد الأوروبي فيما يتعلق بالخصوصية والبيانات الشخصية.<br /><br /></div>

<div dir="rtl">تحتوي اللائحة على أحكام محددة تتعلق بمعالجة "معلومات التعريف الشخصية" لأي "موضوعات بيانات" تابعة للاتحاد الأوروبي (أي شخص طبيعي محدد أو قابل للتحديد). من أجل الامتثال للأنظمة، "الشركات" (كما هو محدد في اللائحة)، وكذلك أي أنظمة وعمليات ذات صلة، يجب تنفيذ "الخصوصية حسب التصميم" بشكل افتراضي، يجب استخدام أعلى إعدادات الخصوصية الممكنة، يجب تنفيذ الضمانات اللازمة لأية معلومات مخزنة أو معالجتها (بما في ذلك، على سبيل المثال لا الحصر، تنفيذ "pseudonymisation" أو "anonymisation" الكامل للبيانات)، يجب أن يعلن بوضوح وبشكل لا لبس فيه أنواع البيانات التي يجمعونها، كيفية معالجتها، لأي أسباب، إلى متى تحتفظ بها، وإذا شاركوا هذه البيانات مع أطراف ثالثة، وأنواع البيانات المشتركة مع أطراف ثالثة، وكيف، ولماذا، وما إلى ذلك.<br /><br /></div>

<div dir="rtl">لا يجوز معالجة البيانات ما لم يكن هناك أساس قانوني للقيام بذلك، كما هو محدد في اللائحة. وبشكل عام، يعني هذا أنه من أجل معالجة بيانات موضوع البيانات على أساس قانوني، يجب أن يتم ذلك وفقًا لالتزامات قانونية، أو يتم فقط بعد الحصول على موافقة واضحة ومطلعة بشكل لا لبس فيه من موضوع البيانات.<br /><br /></div>

<div dir="rtl">قد تتطور جوانب التنظيم في الوقت المناسب، ومن أجل تجنب نشر المعلومات القديمة، قد يكون من الأفضل معرفة التنظيم من مصدر موثوق، بدلاً من مجرد تضمين المعلومات ذات الصلة هنا في وثائق الحزمة (مثل المعلومات المضمنة قد تصبح في نهاية المطاف عفا عليها الزمن مع تطور التنظيم).<br /><br /></div>

<div dir="rtl">بعض الموارد الموصى بها لتعلم المزيد من المعلومات:<br /></div>
<div dir="rtl"><ul>
 <li><a href="https://ar.wikipedia.org/wiki/%D8%A7%D9%84%D9%86%D8%B8%D8%A7%D9%85_%D8%A7%D9%84%D8%A3%D9%88%D8%B1%D9%88%D8%A8%D9%8A_%D9%84%D8%AD%D9%85%D8%A7%D9%8A%D8%A9_%D8%A7%D9%84%D8%A8%D9%8A%D8%A7%D9%86%D8%A7%D8%AA_%D8%A7%D9%84%D8%B9%D8%A7%D9%85%D8%A9">النظام الأوروبي لحماية البيانات العامة</a></li>
 <li><a href="https://taqnia24.com/2018/05/24/%D8%AA%D8%B9%D8%B1%D9%81-%D8%B9%D9%84%D9%89-%D9%82%D8%A7%D9%86%D9%88%D9%86-%D8%AD%D9%85%D8%A7%D9%8A%D8%A9-%D8%AE%D8%B5%D9%88%D8%B5%D9%8A%D8%A9-%D8%A7%D9%84%D8%A8%D9%8A%D8%A7%D9%86%D8%A7%D8%AA-gdpr/">تعرف على قانون حماية خصوصية البيانات GDPR</a></li>
 <li><a href="https://eur-lex.europa.eu/legal-content/EN/TXT/?uri=celex:32016R0679">REGULATION (EU) 2016/679 OF THE EUROPEAN PARLIAMENT AND OF THE COUNCIL</a></li>
</ul></div>

---


<div dir="rtl">آخر تحديث: ٩ يوليو ٢٠٢٥ (٢٠٢٥.٠٧.٠٩).</div>
