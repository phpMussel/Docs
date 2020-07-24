## <div dir="rtl">phpMussel v3 لئے دستاویزی (اردو).</div>

### <div dir="rtl">فہرست:</div>
<div dir="rtl"><ul>
 <li>۱. <a href="#SECTION1">تمہید</a></li>
 <li>۲. <a href="#SECTION2">انسٹال کرنے کا طریقہ</a></li>
 <li>۳. <a href="#SECTION3">کس طرح استعمال</a></li>
 <li>۴. <a href="#SECTION4">PHPMUSSEL میں توسیع</a></li>
 <li>۷. <a href="#SECTION7">ترتیب کے اختیارات</a></li>
 <li>۸. <a href="#SECTION8">دستخط فارمیٹ</a></li>
 <li>۹. <a href="#SECTION9">جانا جاتا مطابقت کے مسائل</a></li>
 <li>۱۰. <a href="#SECTION10">اکثر پوچھے گئے سوالات (FAQ)</a></li>
 <li>۱۱. <a href="#SECTION11">قانونی معلومات</a></li>
</ul></div>

<div dir="rtl"><em>ترجمہ سلسلے نوٹ: کی غلطیوں کی صورت میں (جیسے، ترجمہ، typos کے، وغیرہ کے درمیان تضادات)، مجھے پڑھ کے انگریزی ورژن اصل اور مستند ورژن سمجھا جاتا ہے. آپ کو کسی بھی کی غلطیوں کو تلاش کریں تو ان کو ٹھیک کرنے میں آپ کی مدد کا خیر مقدم کیا جائے گا.</em></div>

---


### <div dir="rtl">۱. <a name="SECTION1"></a>تمہید</div>

<div dir="rtl">phpMussel، ایک PHP کی سکرپٹ کو جہاں کہیں سکرپٹ جھکا ہے، ClamAV اور دوسروں کے دستخط کی بنیاد پر آپ کے سسٹم پر اپ لوڈ کی فائلوں کے اندر اندر ٹروجن، وائرس، میلویئر اور دیگر خطرات کا پتہ لگانے کے لئے ڈیزائن کیا استعمال کرنے کے لئے آپ کا شکریہ.<br /><br /></div>

<div dir="rtl"><a dir="ltr" href="https://phpmussel.github.io/">PHPMUSSEL</a> کاپی رائٹ 2013 اور <a dir="ltr" href="https://github.com/Maikuolan">Caleb M (Maikuolan)</a> کی طرف GNU/GPLv2 اجازت سے آگے.<br /><br /></div>

<div dir="rtl">یہ سکرپٹ مفت سافٹ ویئر ہے. آپ اسے دوبارہ تقسیم اور/یا ترمیم کے طور پر مفت سافٹ ویئر فاؤنڈیشن کی جانب سے شائع GNU جنرل پبلک لائسنس کی شرائط کے تحت اس پر نظر ثانی کر سکتے ہیں؛ یا تو لائسنس کے ورژن 2، یا (آپ کے اختیارات پر) کسی بھی جدید ورژن. یہ سکرپٹ یہ مفید ہو جائے گا، لیکن کسی بھی وارنٹی کے بغیر امید میں تقسیم کیا جاتا ہے؛ کسی خاص مقصد کے لئے قابل فروختگی یا فٹنس کی بھی تقاضا وارنٹی کے بغیر. مزید تفصیلات کے لئے GNU جنرل پبلک لائسنس، "LICENSE.txt" فائل اور سے بھی دستیاب میں واقع دیکھیں:</div>
- <https://www.gnu.org/licenses/>.
- <https://opensource.org/licenses/>.

<div dir="rtl">کرنے کے لئے خصوصی شکریہ ادا کیا. <a dir="ltr" href="https://www.clamav.net/">ClamAV</a> دونوں منصوبے پریرتا کے لئے اور اس سکرپٹ کا استعمال ہے کہ دستخط، اسکرپٹ کا امکان موجود نہیں کریں گے، جس کے بغیر، یا سب کے لئے، بہت محدود قدر ہو گی.<br /><br /></div>

SourceForge اور Bitbucket اور GitHub کے لئے خصوصی شکریہ، اور اضافی ذرائع کے phpMussel طرف سے استعمال کیا دستخطوں کی ایک بڑی تعداد کی: <a dir="ltr" href="https://www.phishtank.com/">PhishTank</a>، <a dir="ltr" href="https://nlnetlabs.nl/">NLNetLabs</a>، <a dir="ltr" href="https://malware.expert/">Malware.Expert</a> اور دوسروں کو، اور یہ کہ میں نے ذکر کرنا وگرنہ بھول گئے ہیں، اور اسکرپٹ استعمال کرنے کے لئے، کسی اور کو اس منصوبے کی حمایت تمام والوں کے لئے خصوصی شکریہ.<br /><br /></div>

---


### <div dir="rtl">۲. <a name="SECTION2"></a>انسٹال کرنے کا طریقہ</div>

#### <div dir="rtl">۲.۰ COMPOSER کے ساتھ نصب</div>

<div dir="rtl">phpMussel v3 انسٹال کرنے کا تجویز کردہ طریقہ Composer کے ذریعے ہے.<br /><br /></div>

<div dir="rtl">سہولت کے لئے، سب سے زیادہ عام طور پر درکار phpMussel انحصار پرانے مین ذخیرے سے انسٹال کیا جاسکتا ہے:<br /><br /></div>

`composer require phpmussel/phpmussel`

<div dir="rtl">متبادل کے طور پر، آپ انفرادی طور پر انتخاب کرنے کے قابل ہیں کہ آپ کے نفاذ کے دوران آپ کو کس انحصار کی ضرورت ہوگی. یہ بالکل ممکن ہے کہ آپ صرف مخصوص انحصار چاہیں گے اور ہر چیز کی ضرورت نہیں ہوگی.<br /><br /></div>

<div dir="rtl">phpMussel کے ساتھ کچھ کرنے کے لئے، "core" کی ضرورت ہوگی.<br /><br /></div>

`composer require phpmussel/core`

<div dir="rtl">phpMussel کے لئے انتظامی انٹرفیس فراہم کرتا ہے:<br /><br /></div>

`composer require phpmussel/frontend`

<div dir="rtl">آپ کی ویب سائٹ کے لئے خود کار طریقے سے فائل اپ لوڈ اسکیننگ فراہم کرتا ہے:<br /><br /></div>

`composer require phpmussel/web`

<div dir="rtl">انٹرایکٹو CLI-موڈ ایپلی کیشن کے طور پر phpMussel کو استعمال کرنے کی صلاحیت فراہم کرتا ہے:<br /><br /></div>

`composer require phpmussel/cli`

<div dir="rtl">phpMussel اور PHPMailer کے مابین ایک پُل فراہم کرتا ہے، phpMussel کو دو عنصر کی توثیق، مسدود فائل فائلوں کے بارے میں ای میل کی اطلاع کے لئے PHPMailer کو استعمال کرنے کے قابل بنانا:<br /><br /></div>

`composer require phpmussel/phpmailer`

<div dir="rtl">phpMusselل کو کسی بھی چیز کا پتہ لگانے کے قابل بنانے کے لئے، دستخط انسٹال کرنا ہوں گے. اس کے لئے کوئی خاص پیکیج نہیں ہے. دستخطوں کو انسٹال کرنے کے لئے، اگلے دستاویز والے حصے میں آگے پڑھیں.<br /><br /></div>

<div dir="rtl">متبادل کے طور پر، اگر آپ Composer استعمال نہیں کرنا چاہتے ہیں تو، پری پیکج زپ کو یہاں سے ڈاؤن لوڈ کیا جاسکتا ہے.<br /><br /></div>

https://github.com/phpMussel/Examples

<div dir="rtl">پری پیکجڈ زپ میں مذکورہ بالا تمام انحصار کے، ساتھ ساتھ تمام معیاری phpMussel دستخط فائلیں شامل ہیں، اس کے ساتھ ساتھ آپ کے نفاذ میں phpMussel کو کس طرح استعمال کرنے کے ل فراہم کی گئی کچھ مثالوں کے ساتھ.<br /><br /></div>

#### <div dir="rtl"><a name="INSTALLING_SIGNATURES"></a>۲.۱ تنصیب کا دستخط</div>

<div dir="rtl">خاص خطرات کا پتہ لگانے کے لئے phpMussel کے دستخط کی ضرورت ہوتی ہے. دستخط کو انسٹال کرنے کے لئے 2 اہم طریقوں ہیں:<br /><br /></div>

<div dir="rtl"><ul>
 <li>۱. "SigTool" کا استعمال کرتے ہوئے دستخط پیدا کریں اور دستی طور پر انسٹال کریں.</li>
 <li>۲. <code dir="ltr">"phpMussel/Signatures"</code> یا <code dir="ltr">"phpMussel/Examples"</code> سے دستخط ڈاؤن لوڈ کریں اور دستی طور پر انسٹال کریں.</li>
</ul></div>

##### <div dir="rtl">۲.۱.۰ "SigTool" کا استعمال کرتے ہوئے دستخط پیدا کریں اور دستی طور پر انسٹال کریں.</div>

<div dir="rtl">دیکھیں: <a href="https://github.com/phpMussel/SigTool#documentation">SigTool دستاویزات</a>.<br /><br /></div>

<div dir="rtl">یہ بھی نوٹ کریں: SigTool صرف ClamAV کے دستخطوں پر کارروائی کرتا ہے. تاکہ دوسرے ذرائع سے دستخط حاصل کریں (مثال کے طور پر، جو خاص طور پر phpMussel کے لئے لکھے گئے ہیں، یا اس کی جانچ فائلوں کا پتہ لگانے کے لئے درکار ہیں)، اس طریقہ کو یہاں ذکر کردہ دیگر طریقوں میں سے کسی ایک کے ذریعہ تکمیل کرنے کی ضرورت ہوگی.<br /><br /></div>

##### <div dir="rtl">۲.۱.۱ <code dir="ltr">"phpMussel/Signatures"</code> یا <code dir="ltr">"phpMussel/Examples"</code> سے دستخط ڈاؤن لوڈ کریں اور دستی طور پر انسٹال کریں.</div>

<div dir="rtl">سب سے پہلے، <a dir="ltr" href="https://github.com/phpMussel/Signatures">phpMussel/Signatures</a> پر جائیں. ذخیرہ پر مشتمل مختلف GZ کمپریسڈ دستخط فائلیں. آپ کی ضرورت فائلوں کو ڈاؤن لوڈ کریں، ان کو ڈسپوز کریں، اور ان کو اپنی تنصیب کی دستخطوں کی ڈائرکٹری میں کاپی کریں.<br /><br /></div>

<div dir="rtl">متبادل کے طور پر، <a dir="ltr" href="https://github.com/phpMussel/Examples">phpMussel/Examples</a> سے تازہ ترین زپ ڈاؤن لوڈ کریں. اس کے بعد آپ اس آرکائوچ سے دستخطوں کو اپنی تنصیب میں کاپی/پیسٹ کرسکتے ہیں.<br /><br /></div>

---


### <div dir="rtl">۳. <a name="SECTION3"></a>کس طرح استعمال</div>

#### <div dir="rtl">۳.۰ PHPMUSSEL تشکیل کرنا</div>

<div dir="rtl">phpMussel انسٹال کرنے کے بعد، آپ کو ایک تشکیل فائل ترتیب دینے کی ضرورت ہوگی. phpMussel ترتیب فائلوں INI یا YML فائلوں کے طور پر فارمیٹ کیا جا سکتا ہے. اگر آپ ZIP فائلوں کی مثال سے کام کر رہے ہیں تو، آپ کے پاس پہلے ہی دو نمونے والی فائلیں دستیاب ہوں گی (<code dir="ltr">phpmussel.ini</code> اور <code dir="ltr">phpmussel.yml</code>). اگر آپ چاہیں تو آپ ان سے کام کرسکتے ہیں. اگر آپ ZIP کی مثال سے کام نہیں کررہے ہیں تو، آپ کو ایک نئی فائل بنانے کی ضرورت ہوگی.<br /><br /></div>

<div dir="rtl">اگر آپ پہلے سے طے شدہ ترتیب سے مطمئن ہیں اور کچھ تبدیل نہیں کرنا چاہتے ہیں تو، آپ خالی فائل استعمال کرسکتے ہیں. آپ جس چیز کو تبدیل کرنا چاہتے ہیں اس کے لئے صرف اقدار طے کریں. باقی ہر چیز ڈیفالٹس کا استعمال کرے گی.<br /><br /></div>

<div dir="rtl">اگر آپ چاہتے ہیں تو، آپ فرنٹ اینڈ کنفیگریشن پیج سے سب کچھ تشکیل دے سکتے ہیں. لیکن، v3 کے بعد سے، لاگ ان کی معلومات آپ کی تشکیل فائل میں محفوظ ہے، لہذا آپ کو لاگ ان کرنے کیلئے ایک اکاؤنٹ بنانے کی ضرورت ہوگی، اور پھر، وہاں سے، آپ لاگ ان کرسکیں گے اور فرنٹ اینڈ کنفیگریشن پیج کو ہر چیز کو کنفیگر کرنے کیلئے استعمال کرسکیں گے.<br /><br /></div>

<div dir="rtl">درج ذیل متن صارف نام "admin"، اور پاس ورڈ "password" کے ساتھ سامنے کے آخر میں ایک نیا اکاؤنٹ شامل کرے گا.<br /><br /></div>

<div dir="rtl">INI فائلوں کے لئے:<br /><br /></div>

```INI
[user.admin]
password='$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK'
permissions='1'
```

<div dir="rtl">YML فائلوں کے لئے:<br /><br /></div>

```YAML
user.admin:
 password: "$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK"
 permissions: 1
```

<div dir="rtl">آپ اپنی تشکیل کو جو چاہیں نام دے سکتے ہیں (جب تک کہ آپ ایکسٹینشن والے حصے کو برقرار رکھیں، تاکہ phpMussel کو فارمیٹ کا پتہ چل سکے)، اور آپ جہاں چاہیں اسٹور کرسکتے ہیں. آپ phpMussel کو بتا سکتے ہیں کہ لوڈر کو تیز کرتے وقت اپنی راہ کی فراہمی کرکے اپنی کنفیگریشن فائل کو کہاں تلاش کریں. اگر کوئی راستہ فراہم نہیں کیا جاتا ہے تو، phpMussel اسے vendor ڈائرکٹری کے والدین میں تلاش کرنے کی کوشش کرے گا.<br /><br /></div>

<div dir="rtl">کچھ ماحولوں، جیسے Apache، یہاں تک کہ اپنے ڈھانچے کو چھپانے اور عوامی رسائی کو روکنے کے آپ کے کنفیگریشن کے سامنے ایک نقطہ لگانا بھی ممکن ہے.<br /><br /></div>

<div dir="rtl">phpMussel کو دستیاب مختلف ترتیب ہدایتوں کے بارے میں مزید معلومات کے ل التشکیل کے سیکشن کا حوالہ لیں.<br /><br /></div>

#### <div dir="rtl">۳.۱ PHPMUSSEL CORE</div>

<div dir="rtl">اس سے قطع نظر کہ آپ phpMussel کو کس طرح استعمال کرنا چاہتے ہیں، کم و بیش ہر عمل درآمد میں کچھ ایسا ہی ہوگا:<br /><br /></div>

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
```

<div dir="rtl">لوڈر phpMussel استعمال کرنے کی بنیادی ضروریات کی تیاری کا ذمہ دار ہے. اسکیننگ بنیادی اسکیننگ کی بنیادی فعالیت کے لئے ذمہ دار ہے.<br /><br /></div>

<div dir="rtl">لوڈر کے لئے تعمیر کنندہ پانچ پیرامیٹرز کو قبول کرتا ہے (سب اختیاری ہیں).<br /><br /></div>

```PHP
public function __construct(
    string $ConfigurationPath = '',
    string $CachePath = '',
    string $QuarantinePath = '',
    string $SignaturesPath = '',
    string $VendorPath = ''
)
```

<div dir="rtl">پیرامیٹر ۱ آپ کی کنفیگریشن فائل کا مکمل راستہ ہے. جب اس کی وضاحت نہیں کی جاتی ہے، <code dir="ltr">phpmussel.ini</code> یا <code dir="ltr">phpmussel.yml</code> استعمال ہوگا (یہ اسی ڈائرکٹری میں چیک کرتا ہے جس میں vendor ہوتا ہے).<br /><br /></div>

<div dir="rtl">پیرامیٹر ۲ ایک ڈائریکٹری کا راستہ ہے جسے آپ phpMussel ل کو کیچنگ اور عارضی فائل اسٹوریج کے لاستعمال کرنے کی اجازت دیتے ہیں. جب اس کی وضاحت نہیں کی جاتی ہے، ایک نئی ڈائریکٹری <code dir="ltr">phpmussel-cache</code> بنانے کی کوشش کی جائے گی (یہ اسی ڈائرکٹری میں چیک کرتا ہے جس میں vendor ہوتا ہے). اس راستے کی وضاحت کرتے وقت، ڈیٹا کو ناپسندیدہ ہونے سے بچنے کے لئے، خالی ڈائریکٹری کا انتخاب بہترین ہے.<br /><br /></div>

<div dir="rtl">پیرامیٹر ۳ قرنطین کے لئے استعمال ہونے والی ڈائریکٹری کا راستہ ہے. جب اس کی وضاحت نہیں کی جاتی ہے، ایک نئی ڈائریکٹری <code dir="ltr">phpmussel-quarantine</code> بنانے کی کوشش کی جائے گی (یہ اسی ڈائرکٹری میں چیک کرتا ہے جس میں vendor ہوتا ہے). اس راستے کی وضاحت کرتے وقت، ڈیٹا کو ناپسندیدہ ہونے سے بچنے کے لئے، خالی ڈائریکٹری کا انتخاب بہترین ہے. قرنطین کے لئے استعمال ہونے والی ڈائریکٹری تک عوامی رسائی کو روکنے کی سفارش کی جاتی ہے.<br /><br /></div>

<div dir="rtl">پیرامیٹر ۴ ڈائریکٹری کا راستہ ہے جس میں phpMussel دستخط فائلیں ہیں. جب اس کی وضاحت نہیں کی جاتی ہے، دستخط فائلوں کو <code dir="ltr">phpmussel-signatures</code> ڈائرکٹری میں تلاش کیا جائے گا (یہ اسی ڈائرکٹری میں چیک کرتا ہے جس میں vendor ہوتا ہے).<br /><br /></div>

<div dir="rtl">پیرامیٹر ۵ آپ کی vendor ڈائریکٹری کا راستہ ہے. اسے کبھی بھی کسی اور چیز کی طرف اشارہ نہیں کرنا چاہئے. جب اس کی وضاحت نہیں کی جاتی ہے، phpMussel خود بخود اس ڈائرکٹری کو تلاش کرنے کی کوشش کرے گا. یہ پیرامیٹر عمل درآمد کے ساتھ آسانی سے انضمام کی سہولت کے لئے فراہم کیا گیا ہے جس میں یہ ضروری نہیں ہے کہ عام Composer پروجیکٹ کی طرح کا ڈھانچہ ہو.<br /><br /></div>

<div dir="rtl">اسکینر کے لئے تعمیر کنندہ صرف ایک ہی پیرامیٹر قبول کرتا ہے (یہ لازمی ہے). لوڈر اعتراض. چونکہ اسے حوالہ سے منظور کیا جاتا ہے، لہذا لوڈر کو متغیر کے ذریعہ فوری طور پر بنایا جانا چاہئے (قدر سے گزرنا درست استعمال نہیں ہے).<br /><br /></div>

```PHP
public function __construct(\phpMussel\Core\Loader &$Loader)
```

#### <div dir="rtl">۳.۲ خودکار فائل اپ لوڈ اسکیننگ</div>

<div dir="rtl">اپ لوڈ ہینڈلر کی مثال بنانے کے ل:<br /><br /></div>

```PHP
$Web = new \phpMussel\Web\Web($Loader, $Scanner);
```

<div dir="rtl">فائل اپ لوڈز کو اسکین کرنے کے لئے:<br /><br /></div>

```PHP
$Web->scan();
```

<div dir="rtl">اگر آپ چاہیں تو، اختیاری طور پر، phpMussel اپ لوڈز کے ناموں کی مرمت کرنے کی کوشش کرسکتا ہے.<br /><br /></div>

```PHP
$Web->demojibakefier();
```

<div dir="rtl">ایک مکمل مثال کے طور پر:<br /><br /></div>

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

<div dir="rtl"><code dir="ltr">ascii_standard_testfile.txt</code> فائل اپ لوڈ کرنے کی کوشش کی جا رہی ہے (یہ ایک سومی نمونہ ہے جو phpMussel کی جانچ کے واحد مقصد کے لئے فراہم کیا گیا ہے):<br /><br /></div>

![اسکرین شاٹ](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/web-v3.0.0-alpha2.png)

#### <div dir="rtl">۳.۳ CLI وضع</div>

<div dir="rtl">سی ایل آئی ہینڈلر کو تیز کرنے کے ل:<br /><br /></div>

```PHP
$CLI = new \phpMussel\CLI\CLI($Loader, $Scanner);
```

<div dir="rtl">ایک مکمل مثال کے طور پر:<br /><br /></div>

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

<div dir="rtl">اسکرین شاٹ:<br /><br /></div>

![اسکرین شاٹ](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/cli-v3.0.0-alpha2.png)

#### <div dir="rtl">۳.۴ سامنے کے آخر</div>

<div dir="rtl">سامنے کے آخر کو تیز کرنے کے لئے:<br /><br /></div>

```PHP
$FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
```

<div dir="rtl">ایک مکمل مثال کے طور پر:<br /><br /></div>

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

<div dir="rtl">اسکرین شاٹ:<br /><br /></div>

![اسکرین شاٹ](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/frontend-v3.0.0-alpha2.png)

#### <div dir="rtl">۳.۷ اسکینر API</div>

<div dir="rtl">اگر آپ چاہیں تو، آپ دوسرے پروگراموں اور اسکرپٹ کے اندر بھی phpMussel سکینر API لاگو کرسکتے ہیں.<br /><br /></div>

<div dir="rtl">ایک مکمل مثال کے طور پر:<br /><br /></div>

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

<div dir="rtl">اس مثال سے نوٹ کرنے کے لئے اہم حصہ <code dir="ltr">scan()</code> طریقہ ہے. <code dir="ltr">scan()</code> کا طریقہ دو پیرامیٹرز کو قبول کرتا ہے:<br /><br /></div>

```PHP
public function scan(mixed $Files, int $Format = 0): mixed
```

<div dir="rtl">پہلا پیرامیٹر سٹرنگ یا ایک سرنی ہوسکتا ہے، اور اسکینر کو بتاتا ہے کہ اسے کیا اسکین کرنا چاہئے. یہ سٹرنگ ہوسکتی ہے جس میں ایک مخصوص فائل یا ڈائرکٹری کا اشارہ ہو، یا متعدد فائلوں/ڈائریکٹریوں کی وضاحت کرنے کے لئے تار کا ایک صف.<br /><br /></div>

<div dir="rtl">جب تار کے طور پر، اس کی طرف اشارہ کرنا چاہئے جہاں سے ڈیٹا مل سکتا ہے. جب ایک صف کے طور پر، سرنی کی چابیاں کو اسکین کرنے والی اشیاء کے اصل ناموں کی نشاندہی کرنی چاہئے، اور اقدار کی طرف اشارہ کرنا چاہئے کہ ڈیٹا کہاں سے مل سکتا ہے.<br /><br /></div>

<div dir="rtl">دوسرا پیرامیٹر ایک عدد ہے، اور اسکینر کو بتاتا ہے کہ اسے اس کے اسکین نتائج کیسے لوٹانا چاہئے.<br /><br /></div>

<div dir="rtl">انٹریجر کے بطور اسکین کردہ ہر آئٹم کے لئے اسکین کے نتائج کو ایک صف کے طور پر واپس کرنے کے لئے 1 کی وضاحت کریں.<br /><br /></div>

<div dir="rtl">ان سبھی کے مندرجہ ذیل معنی ہیں:<br /><br /></div>

نتائج | تفصیل
--:|--:
-5 | <div dir="rtl">اشارہ کرتا ہے کہ اسکین دیگر وجوہات کی بناء پر مکمل نہیں ہوسکا.</div>
-4 | <div dir="rtl">اس بات کی نشاندہی کرتا ہے کہ خفیہ کاری کی وجہ سے ڈیٹا کو اسکین نہیں کیا جاسکا.</div>
-3 | <div dir="rtl">اشارہ کرتا ہے کہ phpMussel دستخط فائلوں کے ساتھ مسائل کا سامنا کرنا پڑا.</div>
-2 | <div dir="rtl">اشارہ کرتا ہے کہ اسکین کے دوران خراب ڈیٹا کا پتہ چلا تھا اور اس طرح اسکین مکمل ہونے میں ناکام رہا تھا.</div>
-1 | <div dir="rtl">اس بات کی نشاندہی کرتا ہے کہ PHP کی طرف سے اسکین پر عمل درآمد کیلئے درکار توسیعات غائب تھیں اور اس طرح یہ اسکین مکمل ہونے میں ناکام رہا.</div>
0 | <div dir="rtl">اشارہ کرتا ہے کہ اسکین کا ہدف موجود نہیں ہے اور اس طرح اسکین کرنے کے لئے کچھ نہیں تھا.</div>
1 | <div dir="rtl">اشارہ کرتا ہے کہ ہدف کو کامیابی کے ساتھ اسکین کیا گیا تھا اور کسی قسم کی پریشانی کا پتہ نہیں چل سکا تھا.</div>
2 | <div dir="rtl">اشارہ کرتا ہے کہ ہدف کو کامیابی کے ساتھ اسکین کیا گیا تھا اور مسائل کا پتہ چلا تھا.</div>

<div dir="rtl">اسکین کے نتائج کو بولین کے طور پر واپس کرنے کے لئے 2 کی وضاحت کریں.<br /><br /></div>

نتائج | تفصیل
:-:|:--
`true` | <div dir="rtl">دشواریوں کا پتہ چلا (اسکین کا ہدف خراب/خطرناک ہے).</div>
`false` | <div dir="rtl">دشواریوں کا پتہ نہیں چل سکا (اسکین کا ہدف شاید محفوظ ہے).</div>

<div dir="rtl">اسکرین کے نتائج کو انسانی پڑھنے کے قابل متن کے بطور اسکین کردہ ہر آئٹم کے لئے ایک صف کے طور پر واپس کرنے کے لئے 3 کی وضاحت کریں.<br /><br /></div>

<div dir="rtl">مثال پیداوار:<br /><br /></div>

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

<div dir="rtl">اسکین کے نتائج کو انسانی پڑھنے کے قابل متن کی ایک تار کے بطور واپس کرنے کے لئے 4 کی وضاحت کریں (جیسے 3، لیکن مشترکہ).<br /><br /></div>

<div dir="rtl">مثال پیداوار:<br /><br /></div>

```
Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)! Detected phpMussel-Testfile.CoEx (coex_testfile.rtf)! Detected encrypted archive; Encrypted archives not permitted (encrypted.zip)!
```

<div dir="rtl">فارمیٹڈ ٹیکسٹ کو واپس کرنے کے لئے کوئی دوسری قیمت بتائیں (CLI کا استعمال کرتے وقت بالکل ایسا ہی لگتا ہے).<br /><br /></div>

<div dir="rtl">مثال پیداوار:<br /><br /></div>

<div dir="rtl">بھی دیکھو: <a href="#SCAN_DEBUGGING">کس طرح وہ سکین کر رہے ہیں جب فائلوں کے بارے میں مزید تفصیلات تک رسائی حاصل کرنے کے لئے؟</a><br /><br /></div>

#### <div dir="rtl">۳.۵ 2FA<br /><br /></div>

<div dir="rtl">2FA کو چالو کرنے کے ذریعہ front-end کو مزید محفوظ بنانے کے لئے ممکن ہے. جب 2FA کے ساتھ اکاؤنٹ میں لاگ ان ہو تو، اس اکاؤنٹ سے منسلک ای میل ایڈریس پر ایک ای میل بھیجا جاتا ہے. اس ای میل میں "2FA کوڈ" شامل ہے، جو اس صارف کا استعمال کرتے ہوئے لاگ ان کرنے کے لۓ صارف کا نام اور پاسورڈ کے علاوہ صارف کو داخل ہونا ضروری ہے. اس کا مطلب یہ ہے کہ اکاؤنٹ اکاؤنٹ پاس ورڈ حاصل کرنے کے لئے کسی بھی ہیکر یا ممکنہ حملہ آور کو اس اکاؤنٹ میں لاگ ان کرنے کے قابل نہیں ہو گا، کیونکہ انہیں وصول کرنے کے قابل ہونے کے لئے ان اکاؤنٹ سے منسلک ای میل ایڈریس تک رسائی حاصل ہوگی. اور سیشن کے ساتھ منسلک 2FA کوڈ استعمال کریں.<br /><br /></div>

<div dir="rtl">PHPMailer نصب کرنے کے بعد، آپ کو phpMussel ترتیب کے صفحے یا ترتیب کی فائل کے ذریعے PHPMailer کے لئے ترتیب ہدایات کو آباد کرنے کی ضرورت ہوگی. ان ترتیبات کے ہدایات کے بارے میں مزید معلومات اس دستاویز کے ترتیب کے حصے میں شامل ہیں. PHPMailer ترتیب ہدایات آبادی کے بعد، <code dir="ltr">enable_two_factor</code> <code dir="ltr">true</code> سیٹ کریں. 2FA اب فعال ہونا چاہئے.<br /><br /></div>

<div dir="rtl">اگلا، آپ کو ایک ای میل ایڈریس کو اکاؤنٹ کے ساتھ منسلک کرنے کی ضرورت ہوگی، تاکہ phpMussel کو معلوم ہے کہ اس اکاؤنٹ کے ساتھ لاگ ان کرتے وقت 2FA کوڈ بھیجنے کے لئے. ایسا کرنے کے لئے، اکاؤنٹ کے صارف نام کے طور پر ای میل پتہ استعمال کریں (کچھ <code dir="ltr">foo@bar.tld</code> کی طرح)، یا اس صارف کے صارف کے حصے کے طور پر ای میل ایڈریس بھی شامل ہے جس طرح آپ عام طور پر ای میل بھیجیں گے (کچھ <code dir="ltr">Foo Bar &lt;foo@bar.tld&gt;</code> کی طرح).<br /><br /></div>

---


### <div dir="rtl">۴. <a name="SECTION4"></a>PHPMUSSEL میں توسیع</div>

---


### <div dir="rtl">۷. <a name="SECTION7"></a>ترتیب کے اختیارات</div>

<div dir="rtl">مندرجہ ذیل phpMussel کے <code dir="ltr">"config.ini"</code> کنفیگریشن فائل میں پایا، ان کے مقاصد اور تقریب کی ایک وضاحت کے ساتھ ساتھ متغیر کی ایک فہرست ہے.<br /><br /></div>

```
کنفگریشن (v3)
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

#### <div dir="rtl">"core" (قسم)<br /></div>
<div dir="rtl">عام ترتیبات (کنفیگریشن جس کا تعلق دوسری قسموں سے نہیں ہے).<br /><br /></div>

##### <div dir="rtl">"scan_log" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>فائل کا نام مسل تمام سکیننگ نتائج کے لاگ ان کرنے کے لئے. ایک فائل کا نام کی وضاحت کریں، یا غیر فعال کرنے کو خالی چھوڑ.</li></ul></div>

##### <div dir="rtl">"scan_log_serialized" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>فائل کا نام مسل تمام سکیننگ کے نتائج کو (serialized فارمیٹ استعمال کرتے ہوئے) لاگ ان کریں. ایک فائل کا نام کی وضاحت کریں، یا غیر فعال کرنے کو خالی چھوڑ.</li></ul></div>

##### <div dir="rtl">"error_log" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>کسی بھی غیر مہلک غلطیوں کو لاگ کرنے کیلئے ایک فائل کا پتہ چلا. ایک فائل کا نام کی وضاحت کریں، یا غیر فعال کرنے کو خالی چھوڑ.</li></ul></div>

##### <div dir="rtl">"truncate" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>وہ ایک خاص سائز تک پہنچنے میں جب صاف لاگ مسلیں؟ ویلیو میں B/KB/MB/GB/TB زیادہ سے زیادہ سائز ہے. جب 0KB، وہ غیر معینہ مدت تک ترقی کر سکتا ہے (پہلے سے طے). نوٹ: واحد فائلوں پر لاگو ہوتا ہے! فائلیں اجتماعی غور نہیں کر رہے ہیں.</li></ul></div>

##### <div dir="rtl">"log_rotation_limit" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>لاگ گرد گردش کسی بھی وقت کسی بھی وقت موجود ہونا لاگ ان کی تعداد محدود کرتا ہے. جب نیا لاگ ان کی تخلیق کی جاتی ہے تو، اگر لاگ ان کی کل تعداد مخصوص حد سے زیادہ ہوتی ہے تو مخصوص کارروائی کی جائے گی. آپ یہاں مطلوبہ حد کی وضاحت کرسکتے ہیں. 0 کی قیمت لاگ گرد گردش کو غیر فعال کرے گی.</li></ul></div>

##### <div dir="rtl">"log_rotation_action" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>لاگ گرد گردش کسی بھی وقت کسی بھی وقت موجود ہونا لاگ ان کی تعداد محدود کرتا ہے. جب نیا لاگ ان کی تخلیق کی جاتی ہے تو، اگر لاگ ان کی کل تعداد مخصوص حد سے زیادہ ہوتی ہے تو مخصوص کارروائی کی جائے گی. آپ یہاں مطلوبہ کارروائی کی وضاحت کرسکتے ہیں. Delete = قدیم ترین لاگ ان کو حذف کریں، جب تک کہ حد تک زیادہ نہیں ہوسکتی ہے. Archive = سب سے پہلے آرکائیو، اور پھر سب سے پرانی لاگ ان کو حذف کریں، جب تک کہ حد زیادہ نہیں ہوسکتی.</li></ul></div>

```
log_rotation_action
├─Delete ("Delete")
└─Archive ("Archive")
```

##### <div dir="rtl">"timezone" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>استعمال کرنے کے لئے ٹائم زون کی وضاحت کرتا ہے (جیسے، Africa/Cairo، America/New_York، Asia/Tokyo، Australia/Perth، Europe/Berlin، Pacific/Guam، وغیرہ). SYSTEM کی وضاحت کریں تاکہ PHP کو آپ کے لئے خود بخود یہ سنبھل سکے.</li></ul></div>

```
timezone
├─SYSTEM ("نظام کو پہلے سے طے شدہ ٹائم زون کا استعمال کریں.")
├─UTC ("UTC")
└─…دیگر
```

##### <div dir="rtl">"time_offset" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>ٹائم زون منٹ میں آفسیٹ.</li></ul></div>

##### <div dir="rtl">"time_format" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>phpMussel کی طرف سے استعمال کی تاریخوں کا فارم. اضافی اختیارات درخواست پر شامل کیا جا سکتا ہے.</li></ul></div>

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
└─…دیگر
```

##### <div dir="rtl">"ipaddr" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>کہاں درخواستوں منسلک کرنے کے IP ایڈریس کو تلاش کرنے کے لئے؟ پہلے سے طے شدہ = REMOTE_ADDR (جیسا Cloudflare کے اور پسند کرتا ہے کے طور پر خدمات کے لئے مفید). انتباہ: ڈان \ کر رہے T تبدیلی اس الا یہ کہ آپ آپ کو \ کیا معلوم!</li></ul></div>

```
ipaddr
├─HTTP_INCAP_CLIENT_IP ("HTTP_INCAP_CLIENT_IP (Incapsula)")
├─HTTP_CF_CONNECTING_IP ("HTTP_CF_CONNECTING_IP (Cloudflare)")
├─CF-Connecting-IP ("CF-Connecting-IP (Cloudflare)")
├─HTTP_X_FORWARDED_FOR ("HTTP_X_FORWARDED_FOR (Cloudbric)")
├─X-Forwarded-For ("X-Forwarded-For (Squid)")
├─REMOTE_ADDR ("REMOTE_ADDR (Default)")
└─…دیگر
```

<div dir="rtl">بھی دیکھو:<ul dir="rtl">
<li><a dir="ltr" href="https://docs.nginx.com/nginx/admin-guide/web-server/reverse-proxy/">NGINX Reverse Proxy</a></li>
<li><a dir="ltr" href="http://www.squid-cache.org/Doc/config/forwarded_for/">Squid configuration directive forwarded_for</a></li>
</ul></div>

##### <div dir="rtl">"delete_on_sight" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>Eفوری طور پر دستخط کے ذریعے یا دوسری صورت میں چاہے، الفاظ کے ملاپ کے کسی بھی پتہ لگانے کے معیار پر کسی بھی سکین کی کوشش کی فائل اپ لوڈ حذف کرنے کی کوشش کرنے کے لئے اس ہدایت nabling سکرپٹ ہدایت کرے گا. "صاف" ہونے کا تعین کیا فائلیں چھوا نہیں کیا جائے گا. ابلیھاگاروں کی صورت میں، پورے آرکائیو حذف کر دیا جائے گا قطع نظر یا نہیں آمیز فائل کا صرف ایک ہی محفوظ شدہ دستاویزات کے اندر موجود کئی فائلوں میں سے ہے. فائل اپ لوڈ کی سکیننگ کے معاملے کے طور پر، عام طور پر، یہ ضروری نہیں ہے، یہ ہدایت چالو کرنے کے لئے عام طور پر PHP کی خود کار طریقے سے اس کی کیشے کے مندرجات مٹا دے گا کیونکہ عملدرآمد ختم ہو گیا ہے جب یہ عام طور پر سرور ہے جب تک کہ اس کے ذریعے اپ لوڈ کردہ کسی بھی فائلوں کو خارج کر دیں گے جس کا مطلب ہے، وہ منتقل کر دیا کاپی یا پہلے سے ہی خارج کر دیا گیا ہے. یہ ہدایت جن PHP کی کاپیاں ہمیشہ انداز کی توقع میں برتاؤ نہیں کر سکتے ہیں ان کے لئے سیکورٹی کی ایک اضافی اقدام کے طور پر یہاں شامل کی جاتی ہے. False (جھوٹی) = سکیننگ کے بعد، اکیلے فائل [پہلے سے طے شدہ] چھوڑ دیں؛ True (سچے) = سکیننگ کے بعد، صاف نہیں ہے تو، فوری طور پر حذف.</li></ul></div>

##### <div dir="rtl">"lang" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>phpMussel لئے پہلے سے طے شدہ زبان کی وضاحت.</li></ul></div>

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

##### <div dir="rtl">"lang_override" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>جب بھی ممکن ہو HTTP_ACCEPT_LANGUAGE کے مطابق لوکلائز کریں؟ True (سچے) = جی ہاں [پہلے سے طے شدہ]؛ False (جھوٹی) = نہیں.</li></ul></div>

##### <div dir="rtl">"scan_cache_expiry" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>کب تک phpMussel سکیننگ کے نتائج کیشے چاہئے؟ قیمت کے لئے سکیننگ کے نتائج کیشے سیکنڈ کی تعداد ہے. پہلے سے طے شدہ 21600 سیکنڈ (6 گھنٹے) ہے؛ 0 کی قدر سکیننگ کے نتائج کیشنگ کو غیر فعال کریں گے.</li></ul></div>

##### <div dir="rtl">"maintenance_mode" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>بحالی کا موڈ فعال کریں؟ True (سچے) = جی ہاں؛ False (جھوٹی) = کوئی [پہلے سے طے شدہ]. سامنے کے اختتام کے مقابلے میں سب کچھ غیر فعال کرتا ہے. کبھی کبھی آپ کے CMS، فریم ورک، وغیرہ کو اپ ڈیٹ کرنے کے لئے مفید ہے.</li></ul></div>

##### <div dir="rtl">"statistics" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>phpMussel استعمال کے اعداد و شمار کو ٹریک کریں؟ True (سچے) = جی ہاں؛ False (جھوٹی) = نہیں [پہلے سے طے شدہ].</li></ul></div>

##### <div dir="rtl">"disabled_channels" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>درخواستوں کو بھیجنے کے لئے خاص طور پر چینلز کا استعمال کے لئے phpMussel کو روکنے کے لئے یہ استعمال کیا جا سکتا ہے (مثال کے طور پر، جب اپ ڈیٹ کرنا، اجزاء میٹا ڈیٹا، وغیرہ کو پکڑنے کے بعد).</li></ul></div>

```
disabled_channels
├─GitHub ("GitHub")
├─BitBucket ("BitBucket")
├─VirusTotal_HTTPS ("VirusTotal (HTTPS)")
└─VirusTotal_HTTP ("VirusTotal (HTTP)")
```

#### <div dir="rtl">"signatures" (قسم)<br /></div>
<div dir="rtl">دستخطوں، دستخط فائلوں، وغیرہ کے لئے تشکیل.<br /><br /></div>

##### <div dir="rtl">"active" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>فعال دستخط کی فائلوں، کوما سے ختم ہونے والی کی ایک فہرست. نوٹ: دستخط فائلوں کو پہلے ہی انسٹال کرنا ضروری ہے، اس سے پہلے کہ آپ ان کو چالو کرسکیں. ٹیسٹ کی فائلوں کو صحیح طریقے سے کام کرنے کے لئے، دستخط فائلوں کو انسٹال کرنا اور چالو کرنا ضروری ہے.</li></ul></div>

##### <div dir="rtl">"fail_silently" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>جب دستخط فائلوں غائب یا خراب phpMussel رپورٹ چاہئے؟ تو <code dir="ltr">fail_silently</code> کے، معذور لاپتہ اور خراب فائلوں سکیننگ پر اطلاع دی جائے گی، اور اگر <code dir="ltr">fail_silently</code> کے لاپتہ، فعال ہے اور خراب فائلوں ان فائلوں کے لئے رپورٹنگ سکیننگ کے ساتھ، نظر انداز کر دیا جائے گا کہ کوئی مسئلہ نہیں ہیں. آپ گر کر تباہ یا اسی طرح کے مسائل کا سامنا کر رہے ہیں جب تک کہ یہ عام تنہا چھوڑ دیا جانا چاہئے. False (جھوٹی) = معذور؛ True (سچے) = چالو کیا [پہلے سے طے شدہ].</li></ul></div>

##### <div dir="rtl">"fail_extensions_silently" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>رپورٹ phpMussel چاہئے جب توسیعات لاپتہ ہیں؟ تو <code dir="ltr">fail_extensions_silently</code> کے معذور، لاپتہ توسیعات سکیننگ پر اطلاع دی جائے گی، اور اگر <code dir="ltr">fail_extensions_silently</code> کے چالو حالت میں ہے، ملانے لاپتہ وہاں نہیں کسی بھی ہیں کہ سکیننگ ان فائلوں کے لئے رپورٹنگ کے ساتھ، نظر انداز کر دیا جائے گا مسائل. اس حکم کو غیر فعال ممکنہ طور پر آپ کی سیکورٹی میں اضافہ ہو سکتا ہے، بلکہ جھوٹے مثبت کا اضافہ کا باعث بن سکتا. False (جھوٹی) = معذور؛ True (سچے) = چالو کیا [پہلے سے طے شدہ].</li></ul></div>

##### <div dir="rtl">"detect_adware" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>phpMussel ایڈویئر کا پتہ لگانے کے لئے دستخط تجزیہ کرنا چاہیے؟ False (جھوٹی) = کوئی؛ True (سچے) = جی ہاں [پہلے سے طے شدہ].</li></ul></div>

##### <div dir="rtl">"detect_joke_hoax" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>phpMussel مذاق / چکما میلویئر / وائرس کا پتہ لگانے کے لئے دستخط تجزیہ کرنا چاہیے؟ False (جھوٹی) = کوئی؛ True (سچے) = جی ہاں [پہلے سے طے شدہ].</li></ul></div>

##### <div dir="rtl">"detect_pua_pup" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>phpMussel PUA/PUP کا پتہ لگانے کے لئے دستخط تجزیہ کرنا چاہیے؟ False (جھوٹی) = کوئی؛ True (سچے) = جی ہاں [پہلے سے طے شدہ].</li></ul></div>

##### <div dir="rtl">"detect_packer_packed" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>phpMussel پیکرز اور پیک کے اعداد و شمار کا پتہ لگانے کے لئے دستخط تجزیہ کرنا چاہیے؟ False (جھوٹی) = کوئی؛ True (سچے) = جی ہاں [پہلے سے طے شدہ].</li></ul></div>

##### <div dir="rtl">"detect_shell" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>phpMussel شیل اسکرپٹ کا پتہ لگانے کے لئے دستخط تجزیہ کرنا چاہیے؟ False (جھوٹی) = کوئی؛ True (سچے) = جی ہاں [پہلے سے طے شدہ].</li></ul></div>

##### <div dir="rtl">"detect_deface" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>phpMussel defacements اور defacers کا پتہ لگانے کے لئے دستخط تجزیہ کرنا چاہیے؟ False (جھوٹی) = کوئی؛ True (سچے) = جی ہاں [پہلے سے طے شدہ].</li></ul></div>

##### <div dir="rtl">"detect_encryption" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>phpMussel کو خفیہ کاری فائلوں کا پتہ لگانے اور بلاک کرنا چاہئے؟ False (جھوٹی) = کوئی؛ True (سچے) = جی ہاں [پہلے سے طے شدہ].</li></ul></div>

##### <div dir="rtl">"heuristic_threshold" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>فائلوں کی مشکوک اور ممکنہ طور پر بدنیتی پر مبنی خصوصیات کی شناخت کے لئے ارادہ کر رہے ہیں کہ phpMussel کے بعض دستخط خود میں بغیر اپ لوڈ کیا جا رہا ہے ان فائلوں بدنیتی پر مبنی ہونے کے طور پر خاص طور پر اپ لوڈ کیا جا رہا ہے کی شناخت ہیں. یہ "دہلیز" قدر phpMussel بتاتا ہے ان فائلوں درنساوناپورن کا جھنڈا لگا ہو رہے ہیں اس سے پہلے کیا فائلوں کی مشکوک اور ممکنہ طور پر بدنیتی پر مبنی خصوصیات کے زیادہ سے زیادہ کل وزن اپ لوڈ کیا جا رہا ہے کی اجازت ہے. اس تناظر میں وزن کی تعریف کی شناخت مشکوک اور ممکنہ طور پر بدنیتی پر مبنی خصوصیات کی کل تعداد ہے. بنیادی طور پر، اس کی قیمت 3. ایک کم قیمت عام طور پر جھوٹے مثبت کے ایک اعلی موجودگی کے نتیجے میں جائے کرنے کے لئے مقرر کیا جائے گا لیکن بدنیتی پر مبنی فائلوں کی ایک بڑی تعداد جھنڈا لگایا جا رہا ہے، ایک زیادہ قیمت عام طور پر جھوٹے مثبت کی ایک کم موجودگی لیکن ایک کے نتیجے میں جائے جبکہ بدنیتی پر مبنی فائلوں کی کم تعداد جھنڈا لگایا جا رہا ہے. یہ آپ کو اس سے متعلق دشواریاں پیش آ رہے ہیں \ جب تک کہ اس کا بنیادی میں اس قدر چھوڑنے کے لئے عام طور پر سب سے بہتر ہے.</li></ul></div>

#### <div dir="rtl">"files" (قسم)<br /></div>
<div dir="rtl">اسکین کرتے وقت فائلوں کو ہینڈل کرنے کا طریقہ کی تفصیلات.<br /><br /></div>

##### <div dir="rtl">"filesize_limit" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>میں KB فائل کی حد. 65536 = 64MB [پہلے سے طے شدہ]؛ 0 = کوئی حد نہیں (ہمیشہ سرمئی درج)، کسی بھی (مثبت) عددی قیمت قبول کر لیا. آپ PHP کی ترتیب میموری ایک عمل کو پکڑ کر سکتے کے یا اگر رقم کو محدود کر دیتی ہے جب یہ مفید ہو سکتا اپ لوڈز آپ PHP کی ترتیب حدود فائل.</li></ul></div>

##### <div dir="rtl">"filesize_response" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>فائل کی حد سے تجاوز ہے کہ (اگر موجود ہو) فائلوں کے ساتھ کیا کیا جائے. False (جھوٹی) = وائٹ فہرست; True (سچے) = بلیک لسٹ [پہلے سے طے شدہ].</li></ul></div>

##### <div dir="rtl">"filetype_whitelist" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>آپ کے سسٹم صرف فائلوں کی مخصوص اقسام اپ لوڈ کیا جا کرنے کی اجازت دیتا ہے، یا آپ کے سسٹم کو واضح طور پر، فائلوں کی بعض اقسام کی تردید کرتے ہیں وائٹ لسٹیں، بلیک لسٹ اور سرمئی فہرستوں میں ان قسم کی فائلوں کی وضاحت جس میں رفتار سکیننگ جائیں کرنے سکرپٹ اجازت دے کر کیا جاتا ہے بڑھا سکتے ہیں اگر تو بعض قسم کی فائلوں کے دوران. ڈاک CSV (علامت سے علیحدہ اقدار) ہے. آپ کو سب کچھ، بلکہ وائٹ لسٹ، بلیک لسٹ یا بھوری رنگ کی فہرست کے مقابلے میں اسکین کرنے کے لئے چاہتے ہیں، متغیر خالی چھوڑ؛ ایسا کرنے سے وائٹ لسٹ/بلیک لسٹ/سرمئی فہرست کو غیر فعال کریں گے. وائٹ لسٹ:</li></ul></div>

##### <div dir="rtl">"filetype_blacklist" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>بلیک لسٹ:</li></ul></div>

##### <div dir="rtl">"filetype_greylist" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>گرے فہرست:</li></ul></div>

##### <div dir="rtl">"check_archives" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>ابلیھاگاروں کے مندرجات کو چیک کرنے کی کوشش؟ False (جھوٹی) = چیک نہ کریں؛ True (سچے) = چیک کریں [پہلے سے طے شدہ]. تائید: Zip (libzip کی ضرورت ہے)، Tar، Rar (rar توسیع کی ضرورت ہے).</li></ul></div>

##### <div dir="rtl">"filesize_archives" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>ابلیھاگاروں کے مندرجات کو فائل بلیک لسٹ / وہسلنگ لے؟ False (جھوٹی) = نہیں (صرف بھوری رنگ کی فہرست میں سب کچھ); True (سچے) = ہاں [پہلے سے طے شدہ].</li></ul></div>

##### <div dir="rtl">"filetype_archives" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>قسم کی فائل بلیک لسٹ/دستاویز کے مندرجات کو وہسلنگ لے؟ False (جھوٹی) = کوئی (صرف greylist سب کچھ) [پہلے سے طے شدہ]؛ True (سچے) = جی ہاں.</li></ul></div>

##### <div dir="rtl">"max_recursion" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>ابلیھاگاروں کے لئے زیادہ سے زیادہ تکرار کی گہرائی کی حد. پہلے سے طے شدہ = 3.</li></ul></div>

##### <div dir="rtl">"block_encrypted_archives" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>پتہ لگانے اور بلاک مرموز آرکائیوز؟ کیونکہ phpMussel مرموز ابلیھاگاروں کے مندرجات کو اسکین کرنے کے قابل نہیں ہے، یہ ممکن ہے کہ محفوظ شدہ دستاویزات خفیہ کاری phpMussel، اینٹی وائرس سکینر اور ایسی دیگر تحفظات کو نظرانداز کرنے کی کوشش کرنے کا ایک ذریعہ کے طور پر ایک حملہ آور کی طرف سے ملازم ہو جائے. یہ مرموز جائے کرنے کو پتہ چلتا ہے کہ کسی بھی تاریخی دستاویز کو بلاک کرنے phpMussel تربیت؛ ممکنہ طور پر یہ اس طرح کے امکانات کے ساتھ منسلک کسی بھی خطرے کو کم کرنے میں مدد کر سکتا ہے. False (جھوٹی) = نہیں; True (سچے) = ہاں [پہلے سے طے شدہ].</li></ul></div>

##### <div dir="rtl">"max_files_in_archives" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>اسکین کو ختم کرنے سے قبل آرکائیوز کے اندر سے اسکین کرنے کی فائلوں کی زیادہ سے زیادہ تعداد. پہلے سے طے شدہ = 0 (زیادہ سے زیادہ نہیں ہے).</li></ul></div>

##### <div dir="rtl">"chameleon_from_php" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>نہ تو PHP فائلوں کو نہ پہچان لیا آرکائیوز ہیں کہ فائلوں میں PHP ہیڈر لئے تلاش. False (جھوٹی) = بند; True (سچے) = پر.</li></ul></div>

##### <div dir="rtl">"can_contain_php_file_extensions" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>فائل کی توسیع کی ایک فہرست PHP کوڈ پر مشتمل ہونے کی اجازت دیتا ہے، جو کمم کے ذریعہ الگ ہوتی ہے. اگر PHP کی چیلنج حملے کا پتہ چلتا ہے تو، PHP کوڈ پر مشتمل فائلوں، جو اس فہرست پر مشتمل نہیں ہیں، اس PHP کی چیلنج حملوں کے طور پر پتہ چلا جائے گا.</li></ul></div>

##### <div dir="rtl">"chameleon_from_exe" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>نہ تو چلنے نہ ہی تسلیم کیا آرکائیوز ہیں کہ فائلوں میں اور چلنے جن ہیڈرز غلط ہیں کے لئے کارکردگی قابل ہیڈرز کے لئے تلاش کریں. False (جھوٹی) = بند; True (سچے) = پر.</li></ul></div>

##### <div dir="rtl">"chameleon_to_archive" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>آرکائیو اور کمپریسڈ فائلوں میں غلط ہیڈر کا پتہ لگائیں. تائید: BZ/BZIP2، GZ/GZIP، LZF، RAR، ZIP False (جھوٹی) = بند; True (سچے) = پر.</li></ul></div>

##### <div dir="rtl">"chameleon_to_doc" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>جن ہیڈرز غلط ہیں دفتر کی دستاویزات کے لئے تلاش کریں (تائید: DOC، ڈاٹ، پی پی ایس، PPT، XLA، XLS، جانکار). False (جھوٹی) = بند; True (سچے) = پر.</li></ul></div>

##### <div dir="rtl">"chameleon_to_img" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>جن ہیڈرز ہیں تصاویر کے لئے تلاش غلط (تائید: BMP، DIB، PNG، GIF، JPEG، JPG، XCF، PSD، PDD، WEBP). False (جھوٹی) = بند; True (سچے) = پر.</li></ul></div>

##### <div dir="rtl">"chameleon_to_pdf" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>پی ڈی ایف فائلوں جن ہیڈرز غلط ہیں کے لئے تلاش کریں. False (جھوٹی) = بند; True (سچے) = پر.</li></ul></div>

##### <div dir="rtl">"archive_file_extensions" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>تسلیم شدہ آرکائیو فائل ایکسٹنشن (شکل CSV ہے، صرف شامل کرنے یا ہٹانے چاہئے مسائل پائے جاتے ہیں جب، غیر ضروری طور پر ہٹانے کے جھوٹے مثبت غیر ضروری طور پر انہوں نے مزید کہا جبکہ آپ کو حملے کی مخصوص پتہ لگانے سے شامل کر رہے ہیں کیا بنیادی طور پر وائٹ لسٹ گے، ذخیرہ فائلوں کے لئے ظاہر کرنے کے لئے کی وجہ سے ہو سکتا ہے، احتیاط کے ساتھ نظر ثانیw یہ بھی نوٹ کریں کہ اس تاریخی دستاویز اور مواد کی سطح پر تجزیہ نہیں کیا جا سکتا کر سکتے ہیں پر کوئی اثر) ہے. فہرست، ڈیفالٹ میں ہے کے طور پر، نظام اور CMS کی اکثریت کے اس پار سب سے زیادہ عام طور پر استعمال والوں فارمیٹس کی فہرست، لیکن جان بوجھ ضروری جامع نہیں ہے.</li></ul></div>

##### <div dir="rtl">"block_control_characters" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>(نیولائنز علاوہ) کسی بھی کنٹرول حروف پر مشتمل کسی بھی فائلوں کو مسدود کریں؟ (<code dir="ltr">[\x00-\x08\x0b\x0c\x0e\x1f\x7f]</code>) اگر تم ہو صرف سادہ ٹیکسٹ اپ لوڈ کرنے، اس کے بعد آپ کے سسٹم کے لئے کچھ اضافی تحفظ فراہم کرنے پر آپ اس اختیار کو تبدیل کر سکتے ہیں. تاہم، اگر آپ کو سادہ متن کے علاوہ اور کچھ پر اس رخ جھوٹے مثبت نتیجے میں اپ لوڈ کریں. False (جھوٹی) = مسدود نہ کریں [پہلے سے طے شدہ]؛ True (سچے) = بلاک.</li></ul></div>

##### <div dir="rtl">"corrupted_exe" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>خراب فائلوں اور غلطیوں کا تجزیہ. False (جھوٹی) = نظرانداز کریں. True (سچے) = بلاک [پہلے سے طے شدہ]. پتہ لگانے اور ممکنہ طور پر خراب PE (پورٹ ایبل نفاذ پذیر) فائلوں کو بلاک؟ اکثر ایسا ہوتا ہے (لیکن ہمیشہ نہیں)، ایک PE فائل کے کچھ پہلوؤں کو خراب کر رہے ہیں یا\ سکتے ٹی صحیح تجزیہ کیا جائے تو یہ ایک وائرل انفیکشن کا اشارہ ہو سکتا ہے. سب سے زیادہ اینٹی وائرس پروگراموں کی طرف سے استعمال کیا جاتا ہے عمل UN رہنے کے لئے ان کے وائرس اجازت کرنے کے لئے، کچھ طریقوں سے، ایک وائرس کے پروگرامر کے بارے میں معلوم ہو تو خاص طور پر روکنے کی کوشش کریں گے، جس میں ان فائلوں کی تصریف ضرورت ہوتی PE فائلوں میں وائرس کا پتہ لگانے کے پتہ لگایا.</li></ul></div>

##### <div dir="rtl">"decode_threshold" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>خام ڈیٹا جس کے اندر ڈیکوڈ کمانڈز کے پتہ جانی چاہئے کی لمبائی کے حد سے (کے معاملے میں کسی بھی نمایاں کارکردگی کے مسائل جبکہ سکیننگ سے ہیں). پہلے سے طے شدہ = 512KB. زیرو یا شہوت انگیز null قیمت (فائل کی بنیاد پر اس طرح کے کسی بھی حد کو ہٹانے کے) حد سے نااہل کیا.</li></ul></div>

##### <div dir="rtl">"scannable_threshold" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>کہ phpMussel پڑھیں اور سکین کرنے کی اجازت ہے خام ڈیٹا کی لمبائی کی حد (کے معاملے میں کوئی نمایاں کارکردگی کے مسائل جبکہ سکیننگ ہیں). پہلے سے طے شدہ = 32MB. زیرو یا خالی قدر حد سے غیر فعال. عام طور پر، اس کی قیمت آپ چاہتے ہیں اور filesize_limit ہدایت کے مقابلے میں زیادہ نہیں ہونا چاہئے، آپ کے سرور یا ویب سائٹ کو حاصل کرنے کی توقع ہے کہ فائل اپ لوڈ کی اوسط فائل سے کم نہیں ہونا چاہئے، اور میں سے ایک تقریبا سے زیادہ پانچویں نہیں ہونا چاہئے کل قابل اجازت میموری مختص "php.ini" ترتیب دینے کی فائل کے ذریعے PHP کے لئے عطا کی. یہ ہدایت بہت زیادہ میموری کا استعمال کرتے ہوئے کی طرف سے phpMussel کو روکنے کے لئے کوشش کرنے کے لئے موجود ہے (کہ کامیابی کی ایک مخصوص فائل کے اوپر فائلوں کو اسکین کرنے کے قابل ہونے سے روکنے کروں گا).</li></ul></div>

##### <div dir="rtl">"allow_leading_trailing_dots" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>فائلوں کے آغاز اور اختتام پر نقطہ نظر کی اجازت دیں؟ یہ کبھی کبھی استعمال کرنے کے لئے فائلوں کو چھپانے کے لئے، یا کچھ نظام کو ڈائل کرنے کے لئے استعمال کیا جا سکتا ہے ڈائرکٹری کے تبادلوں کی اجازت دیتا ہے. False (جھوٹی) = اجازت نہ دیں [پہلے سے طے شدہ]؛ True (سچے) = اجازت دیں.</li></ul></div>

##### <div dir="rtl">"block_macros" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>میکروس پر مشتمل کسی بھی فائل کو روکنے کی کوشش کریں؟ کچھ قسم کے دستاویزات اور سپریڈ شیٹوں میں قابل عمل میکروس شامل ہوسکتا ہے، اس طرح ایک خطرناک ممکنہ میلویئر ویکٹر فراہم کرتا ہے. False (جھوٹی) = مسدود نہ کریں [پہلے سے طے شدہ]؛ True (سچے) = بلاک.</li></ul></div>

##### <div dir="rtl">"only_allow_images" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>جب true پر سیٹ کریں، اسکینر کے ذریعہ پائے جانے والی غیر تصویر والی فائلوں کو فوری طور پر نشان زد کیا جائے گا، اسکین کیے بغیر. اس سے کچھ معاملات میں اسکین مکمل کرنے کے لئے درکار وقت کو کم کرنے میں مدد مل سکتی ہے. بطور ڈیفالٹ false پر سیٹ کریں.</li></ul></div>

#### <div dir="rtl">"quarantine" (قسم)<br /></div>
<div dir="rtl">سنگرودھ کے لئے ترتیبات.<br /><br /></div>

##### <div dir="rtl">"quarantine_key" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>phpMussel مسدود فائل اپلوڈز کو الگ تھلگ کرنے کے قابل ہے، اگر یہ وہ چیز ہے جو آپ چاہتے ہیں. صرف دل کی گہرائیوں سے کسی بھی پرچم لگایا کوشش کی فائل اپ لوڈ اس فعالیت کو غیر فعال کر چھوڑ دینا چاہئے تجزیہ کرنے میں کوئی دلچسپی کے بغیر ان کی ویب سائٹ یا ہوسٹنگ ماحول کی حفاظت کے لئے چاہتے ہیں کہ phpMussel کے آرام دہ اور پرسکون صارفین، لیکن میلویئر کی تحقیق کے لئے یا اسی طرح کے پرچم لگائے کوشش کی فائل اپ لوڈ کی مزید تجزیہ کرنے میں دلچسپی رکھتے کسی بھی صارفین ایسی چیزوں کو اس فعالیت کو چالو کرنا چاہئے. نشان زدہ کوشش کی فائل اپ لوڈ کی Quarantining کبھی کبھی بھی، جھوٹے مثبت ٹھیک کرنا میں مدد کر سکتے ہیں یہ اکثر آپ کے لئے اس وقت ہوتی ہے کہ کچھ ہے. سنگرودھ فعالیت کو غیر فعال کرنے کیلئے، بس <code dir="ltr"> quarantine_key </code> کے ہدایت خالی چھوڑ دیں، یا یہ کہ ہدایت کے مندرجات کو مٹانے یہ پہلے سے خالی نہیں ہے. سنگرودھ فعالیت کو چالو کرنے کے لئے، ہدایت میں کچھ قیمت درج کریں. <code dir="ltr"> quarantine_key </code> کے ممکنہ حملہ آوروں کی طرف سے اور سنگرودھ کے اندر اندر ذخیرہ کردہ ڈیٹا کی کسی بھی ممکنہ پھانسی کی روک تھام کا ایک ذریعہ کے طور پر استحصال کیا جا رہا ہے سے قرنطینہ فعالیت کی روک تھام کا ایک ذریعہ کے طور پر ضرورت سنگرودھ فعالیت کا ایک اہم حفاظتی خصوصیت ہے. <code dir="ltr"> quarantine_key </code> کے آپ کے پاس ورڈ کے طور پر اسی انداز میں علاج کیا جانا چاہئے: اب بہتر ہے، اور مضبوطی سے اس کی حفاظت. بہترین اثر کے لیے، کے ساتھ مل کر میں استعمال کرتے ہیں <code dir="ltr">delete_on_sight</code>.</li></ul></div>

##### <div dir="rtl">"quarantine_max_filesize" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>فائلوں کی زیادہ سے زیادہ قابل اجازت فائل قرنطینہ جائے. متعین قدر سے بڑی فائلوں قرنطینہ نہیں رکھا جائے گا. یہ ہدایت کسی بھی ممکنہ حملہ آوروں کے ممکنہ طور پر اپنے ہوسٹنگ سروس پر رن ​​دور ڈیٹا کے استعمال کے باعث ناپسندیدہ اعداد و شمار کے ساتھ آپ کے سنگرودھ سیلاب کے لئے یہ زیادہ مشکل بنانے کا ایک ذریعہ کے طور پر اہم ہے. پہلے سے طے شدہ = 2MB.</li></ul></div>

##### <div dir="rtl">"quarantine_max_usage" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>زیادہ سے زیادہ میموری کا استعمال سنگرودھ کے لئے کی اجازت دی. سنگرودھ طرف سے استعمال کیا کل میموری اس قیمت تک پہنچ جاتا ہے تو، استعمال کیا کل میموری اب کوئی اس قیمت تک پہنچ جاتا ہے جب تک قدیم ترین قرنطینہ فائلوں کو خارج کر دیا جائے گا. یہ ہدایت کسی بھی ممکنہ حملہ آوروں کے ممکنہ طور پر اپنے ہوسٹنگ سروس پر رن ​​دور ڈیٹا کے استعمال کے باعث ناپسندیدہ اعداد و شمار کے ساتھ آپ کے سنگرودھ سیلاب کے لئے یہ زیادہ مشکل بنانے کا ایک ذریعہ کے طور پر اہم ہے. پہلے سے طے شدہ = 64MB.</li></ul></div>

##### <div dir="rtl">"quarantine_max_files" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>قرنطین میں موجود فائلوں کی زیادہ سے زیادہ تعداد. جب قرنطین میں نئی فائلوں کو شامل کیا جاتا ہے تو، اگر یہ نمبر تجاوز کردی جاتی ہے تو، پرانی فائلوں کو حذف کر دیا جائے گا جب باقی باقی اب اس نمبر سے زیادہ نہیں ہیں. پہلے سے طے شدہ = 100.</li></ul></div>

#### <div dir="rtl">"virustotal" (قسم)<br /></div>
<div dir="rtl">Virus Total انضمام کی ترتیبات.<br /><br /></div>

##### <div dir="rtl">"vt_public_api_key" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>اختیاری، phpMussel وائرس، trojans، میلویئر اور دیگر خطرات کے خلاف تحفظ کی ایک بہت بڑھا سطح فراہم کرنے کے لئے ایک طریقہ کے طور پر وائرس کل API کا استعمال کرتے ہوئے فائلوں کو اسکین کرنے کے قابل ہے. بطور ڈیفالٹ، سکیننگ فائلوں وائرس کل API کا استعمال غیر فعال ہے. یہ فعال کرنے کیلئے، وائرس کل سے ایک API کلید درکار ہے. اہم فائدہ کی وجہ سے اس سے آپ کے لئے میں انتہائی چالو کرنے کی سفارش کرتے ہیں کہ، یہ 'ے کچھ فراہم کر سکتا ہے. براہ کرم آگاہ رہیں، تاہم، کہ وائرس کل API استعمال کرنے کے لئے، آپ <em><strong> پر ضروری ہے </strong></em> کو ان کے سروس کی شرائط سے اتفاق کرتا ہوں اور آپ <em><strong> پر ضروری ہے </strong></em> مطابق وائرس کل دستاویزات کی طرف سے بیان کو تمام ہدایات پر عمل! آپ پڑھیں اور وائرس کل اور اس API کے سروس کی شرائط سے اتفاق کرتا ہوں: آپ جب تک یہ انضمام خصوصیت کو استعمال کرنے کی اجازت نہیں ہے. تم نے پڑھا ہے اور آپ کو ایک کم از کم، سمجھنے، وائرس کل پبلک API دستاویزات کے (بعد "VirusTotal کی عوامی API V2.0" سب کچھ لیکن "فہرست" سے پہلے) تمہید.</li></ul></div>

<div dir="rtl">بھی دیکھو:<ul dir="rtl">
<li><a dir="ltr" href="https://www.virustotal.com/en/about/terms-of-service/">Terms of Service</a></li>
<li><a dir="ltr" href="https://developers.virustotal.com/reference">Getting started</a></li>
</ul></div>

##### <div dir="rtl">"vt_suspicion_level" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>بطور ڈیفالٹ، phpMussel جس فائلوں کی یہ "مشکوک" سمجھتی ہے کہ ان فائلوں کو وائرس کل API کا استعمال کرتے ہوئے کو سکین کرتا ہے کو محدود کریں گے. آپ اختیاری <code dir="ltr"> vt_suspicion_level </code> کے ہدایت کی قدر میں تبدیلی کرتے ہوئے اس پابندی کو ایڈجسٹ کر سکتے ہیں.</li></ul></div>

##### <div dir="rtl">"vt_weighting" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>phpMussel detections کر کے طور پر یا پتہ لگانے weighting کے طور وائرس کل API کا استعمال کرتے ہوئے سکیننگ کے نتائج کو درخواست دینی چاہیے؟ (اور بدنیتی پر مبنی فائلوں کی ایک بڑی تعداد پکڑے جانے لہذا میں) ایک سے زیادہ کے انجن کو استعمال کرتے ہوئے (جیسا وائرس کل کرتا ہے) ایک فائل کو سکین ایک اضافہ کا پتہ لگانے کی شرح کے نتیجے چاہئے، اگرچہ، یہ بھی جھوٹے کی زیادہ تعداد کے نتیجے کر سکتے ہیں، کیونکہ یہ ہدایت موجود ہے، مثبت ہے، اور اس وجہ سے، کچھ حالات میں، سکیننگ کے نتائج بہتر ایک حتمی نتیجے پر اس اعتماد کا سکور کے طور پر کی بجائے استعمال کیا جا سکتا ہے. 0 کی قدر استعمال کیا جاتا ہے تو، وائرس کل API کا استعمال کرتے ہوئے سکیننگ کے نتائج کسی بھی انجن وائرس کل پرچم فائل کو بدنیتی پر مبنی ہونے کے طور پر سکین کیا جا رہا ہے کی طرف سے استعمال کیا جاتا ہے تو، detections کر کے طور پر لاگو کیا جائے گا، اور اس وجہ سے، phpMussel بدنیتی پر مبنی ہونے کے لئے فائل پر غور کریں گے. کسی دوسرے کی قدر استعمال کیا جاتا ہے تو، وائرس کل API کا استعمال کرتے ہوئے سکیننگ کے نتائج کا پتہ لگانے weighting کے طور پر لاگو کیا جائے گا، اور اس وجہ سے، فائل پرچم کہ وائرس کل کی طرف سے استعمال کے انجن کی تعداد سکین کیا جا رہا ہے درنساوناپورن ہونے (ایک اعتماد سکور کے طور پر کام کرے گا کے طور پر یا پتہ لگانے weighting کے) کے لئے ہے یا نہیں کی فائل کو سکین کیا جا رہا phpMussel طرف بدنیتی پر مبنی سمجھا جانا چاہئے (استعمال کیا کم از کم اعتماد کی نمائندگی کریں گے ویلیو سکور یا ترتیب میں کی ضرورت وزن بدنیتی پر مبنی سمجھا جائے). 0 کی قدر سے طے شدہ کی طرف سے استعمال کیا جاتا ہے.</li></ul></div>

##### <div dir="rtl">"vt_quota_rate" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>وائرس کل API دستاویزات کے مطابق، "یہ کسی بھی 1 منٹ ٹائم فریم میں کسی بھی نوعیت کی زیادہ سے زیادہ 4 درخواستوں تک محدود ہے. آپ کو ایک honeyclient، honeypot یا اور نہ صرف VirusTotal کی کرنے کے لئے وسائل فراہم کرنے کے لئے کی جا رہی ہے کہ کسی دوسرے آٹومیشن چلاتے ہیں تو رپورٹیں آپ کو ایک اعلی کی درخواست کی شرح کوٹہ "کے حقدار ہیں بازیافت. بطور ڈیفالٹ، phpMussel سختی سے ان حدود پر عمل کرے گا، لیکن ان کی شرح کوٹہ کے امکان میں اضافہ کیا جا رہا ہے کی وجہ سے، ان دو ہدایات آپ اس پر کیا عمل کرنا چاہئے محدود کرنے کے طور phpMussel ہدایت کرنے کے لئے ایک وسیلہ کے طور پر فراہم کی جاتی ہیں. آپ \ جب تک، ایسا کرنے کی ہدایت کی گئی ہے، یہ ہے، آپ کو ان اقدار میں اضافہ کرنے کے لئے سفارش کی نہیں ہے، لیکن آپ کو \ تو آپ کی شرح کوٹہ پہنچنے سے متعلق سامنا کرنا پڑا مسائل کردینے گھٹ ان اقدار <em><strong> پر MAY </ مضبوط> </em> کو کبھی کبھی ان مسائل سے نمٹنے میں آپ کی مدد. آپ کی شرح کی حد <code dir="ltr"> vt_quota_rate </code> کے کسی بھی <code dir="ltr"> میں کسی بھی نوعیت کی درخواستوں vt_quota_time </code> کے لمحے وقت کی حد کے طور پر مقرر کیا جاتا ہے.</li></ul></div>

##### <div dir="rtl">"vt_quota_time" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>(مندرجہ بالا وضاحت ملاحظہ کریں).</li></ul></div>

#### <div dir="rtl">"urlscanner" (قسم)<br /></div>
<div dir="rtl">URL سکینر کی ترتیبات.<br /><br /></div>

##### <div dir="rtl">"google_api_key" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>ضروری API کلید وضاحت کی گئی ہے جب گوگل محفوظ براؤزنگ API کو API لک اپ کو فعال کرتا ہے.</li></ul></div>

<div dir="rtl">بھی دیکھو:<ul dir="rtl">
<li><a dir="ltr" href="https://console.developers.google.com/">Google API Console</a></li>
</ul></div>

##### <div dir="rtl">"maximum_api_lookups" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>انفرادی اسکین iteration کے مطابق انجام دینے کے لئے API لک اپ کی زیادہ سے زیادہ قابل اجازت تعداد. ہر اضافی API لک اپ ہر ایک اسکین تکرار مکمل کرنے کی ضرورت کل وقت کا اضافہ کریں گے، لہذا آپ کو مجموعی طور پر اسکین کے عمل کو تیز کرنے کے لئے ایک حد مقرر کر سکتے ہیں. 0 مقرر کرتے وقت، کوئی ایسی زیادہ سے زیادہ قابل اجازت تعداد میں لاگو کیا جائے گا. پہلے سے طے شدہ کی طرف سے 10 سیٹ کریں.</li></ul></div>

##### <div dir="rtl">"maximum_api_lookups_response" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>API لک اپ کی زیادہ سے زیادہ قابل اجازت تعداد سے تجاوز کر جاتا ہے تو کیا کیا جائے؟ False (جھوٹی) = کچھ بھی نہیں (پروسیسنگ جاری رہے) [پہلے سے طے شدہ] ہو؛ True (سچے) = فلیگ / فائل بلاک.</li></ul></div>

##### <div dir="rtl">"cache_time" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>کب تک (سیکنڈوں میں) API لک اپ کے نتائج کے لئے محفوظ ہو جائے چاہئے؟ پہلے سے طے شدہ 3600 سیکنڈ ہے (1 گھنٹہ).</li></ul></div>

#### <div dir="rtl">"legal" (قسم)<br /></div>
<div dir="rtl">قانونی تقاضوں کے لئے ترتیبات.<br /><br /></div>

##### <div dir="rtl">"pseudonymise_ip_addresses" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>لاگ ان کرتے وقت پی ایس ڈی نامناسب IP پتے؟ True (سچے) = جی ہاں [پہلے سے طے شدہ]؛ False (جھوٹی) = نہیں.</li></ul></div>

##### <div dir="rtl">"privacy_policy" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>کسی بھی پیدا کردہ صفحات کے فوٹر میں ظاہر ہونے والی متعلقہ رازداری کی پالیسی کا پتہ. ایک URL کی وضاحت کریں، یا غیر فعال کرنے کیلئے خالی چھوڑ دیں.</li></ul></div>

#### <div dir="rtl">"supplementary_cache_options" (قسم)<br /></div>
<div dir="rtl">ضمنی کیشے کے اختیارات.<br /><br /></div>

##### <div dir="rtl">"enable_apcu" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>اس کی وضاحت کرتا ہے کہ کیش کے لئے APCu استعمال کرنا چاہے. پہلے سے طے شدہ = False (جھوٹی).</li></ul></div>

##### <div dir="rtl">"enable_memcached" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>اس کی وضاحت کرتا ہے کہ کیش کے لئے Memcached استعمال کرنا چاہے. پہلے سے طے شدہ = False (جھوٹی).</li></ul></div>

##### <div dir="rtl">"enable_redis" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>اس کی وضاحت کرتا ہے کہ کیش کے لئے Redis استعمال کرنا چاہے. پہلے سے طے شدہ = False (جھوٹی).</li></ul></div>

##### <div dir="rtl">"enable_pdo" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>اس کی وضاحت کرتا ہے کہ کیش کے لئے PDO استعمال کرنا چاہے. پہلے سے طے شدہ = False (جھوٹی).</li></ul></div>

##### <div dir="rtl">"memcached_host" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>Memcached کے میزبان نام. پہلے سے طے شدہ = "localhost".</li></ul></div>

##### <div dir="rtl">"memcached_port" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>Memcached کے لئے بندرگاہ. پہلے سے طے شدہ = "11211".</li></ul></div>

##### <div dir="rtl">"redis_host" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>Redis کے میزبان نام. پہلے سے طے شدہ = "localhost".</li></ul></div>

##### <div dir="rtl">"redis_port" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>Redis کے لئے بندرگاہ. پہلے سے طے شدہ = "6379".</li></ul></div>

##### <div dir="rtl">"redis_timeout" <code dir="ltr">[float]</code><br /></div>
<div dir="rtl"><ul><li>Redis کے لئے ٹائم آؤٹ. پہلے سے طے شدہ = "2.5".</li></ul></div>

##### <div dir="rtl">"pdo_dsn" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>PDO کے لئے DSN. پہلے سے طے شدہ = "mysql:dbname=phpmussel;host=localhost;port=3306".</li></ul></div>

##### <div dir="rtl">"pdo_username" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>PDO کے لئے صارف نام.</li></ul></div>

##### <div dir="rtl">"pdo_password" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>PDO کیلئے پاس ورڈ.</li></ul></div>

#### <div dir="rtl">"frontend" (قسم)<br /></div>
<div dir="rtl">سامنے کے آخر کے لئے ترتیبات.<br /><br /></div>

##### <div dir="rtl">"frontend_log" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>سامنے کے آخر میں لاگ ان کوششوں لاگنگ کے لئے دائر. ایک فائل کا نام کی وضاحت کریں، یا غیر فعال کرنے کو خالی چھوڑ.</li></ul></div>

##### <div dir="rtl">"max_login_attempts" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>لاگ ان کوششوں کی زیادہ سے زیادہ تعداد (سامنے کے آخر میں). پہلے سے طے شدہ = 5.</li></ul></div>

##### <div dir="rtl">"numbers" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>آپ کس طرح تعداد میں ظاہر کرنے کے لئے پسند کرتے ہیں؟ مثال کے طور پر منتخب کریں جو آپ کے لئے سب سے زیادہ درست نظر آتے ہیں.</li></ul></div>

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

##### <div dir="rtl">"default_algo" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>اس بات کی وضاحت کرتا ہے جو تمام مستقبل کے پاس ورڈ اور سیشن کے لئے الگورتھم استعمال کرنا ہے. اختیارات: PASSWORD_DEFAULT (ڈیفالٹ), PASSWORD_BCRYPT, PASSWORD_ARGON2I (PHP &gt;= 7.2.0 کی ضرورت ہے), PASSWORD_ARGON2ID (PHP &gt;= 7.3.0 کی ضرورت ہے).</li></ul></div>

```
default_algo
├─PASSWORD_DEFAULT ("PASSWORD_DEFAULT")
├─PASSWORD_BCRYPT ("PASSWORD_BCRYPT")
├─PASSWORD_ARGON2I ("PASSWORD_ARGON2I (PHP >= 7.2.0)")
└─PASSWORD_ARGON2ID ("PASSWORD_ARGON2ID (PHP >= 7.3.0)")
```

##### <div dir="rtl">"theme" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>phpMussel سامنے کے آخر کے لئے استعمال کرنے کے لئے جمالیاتی.</li></ul></div>

```
theme
├─default ("Default")
├─rbi ("Red-Blue Inverted")
├─slate ("Slate")
├─bluemetal ("Blue Metal")
├─moss ("Moss")
├─fullmoon ("Full Moon")
└─…دیگر
```

##### <div dir="rtl">"magnification" <code dir="ltr">[float]</code><br /></div>
<div dir="rtl"><ul><li>فونٹ اضافہ. پہلے سے طے شدہ = 1.</li></ul></div>

#### <div dir="rtl">"web" (قسم)<br /></div>
<div dir="rtl">اپ لوڈ ہینڈلر کیلئے ترتیبات.<br /><br /></div>

##### <div dir="rtl">"uploads_log" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>جہاں تمام مسدود شدہ اپ لوڈز لاگ ان ہوجائیں. ایک فائل کا نام کی وضاحت کریں، یا غیر فعال کرنے کو خالی چھوڑ.</li></ul></div>

##### <div dir="rtl">"forbid_on_block" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>phpMussel فائل اپ بلاک کر کے پیغام کے ساتھ 403 ہیڈرز بھیجیں، یا کے ساتھ معمول کے 200 OK رہنا چاہیے؟ False (جھوٹی) = نہیں (200)؛ True (سچے) = جی ہاں (403) [پہلے سے طے شدہ].</li></ul></div>

##### <div dir="rtl">"max_uploads" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>فائلوں کی زیادہ سے زیادہ قابل اجازت تعداد میں فائلوں کو اپ لوڈ اسکین اسکین اسقاط اور صارف کو وہ ایک ہی بار میں بہت زیادہ اپ لوڈ کررہے ہیں مطلع کرنے سے پہلے دوران اسکین کرنے کے! ایک نظریاتی حملے ہیں جس کے تحت ایک حملہ آور ایک پیسنے رک PHP عمل کو سست کرنے phpMussel اوور لوڈنگ کی طرف سے آپ کے سسٹم یا CMS DDOS کرنے کی کوشش کے خلاف تحفظ فراہم کرتا ہے. تجویز کردہ: 10. آپ کو بڑھانے یا اس نمبر سے آپ ہارڈ ویئر کی رفتار پر منحصر ہے کو کم کر سکتے ہیں. کہ اس نمبر کے لئے اکاؤنٹ یا ابلیھاگاروں کے مندرجات شامل نہیں ہے یاد رکھیں کہ..</li></ul></div>

##### <div dir="rtl">"ignore_upload_errors" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>جب تک یہ آپ کی مخصوص نظام پر phpMussel کا صحیح فعالیت کے لئے ضروری ہے یہ ہدایت عام طور پر غیر فعال کر دیا جائے چاہئے. عام طور پر، جب معذور، phpMussel میں عناصر کی موجودگی کا پتہ لگاتا ہے جب <code dir="ltr">$_FILES</code> <code dir="ltr">array()</code>، یہ phpMussel ایک غلطی پیغام واپس آ جائیں گے، ان عناصر کو خالی یا خالی ہو تو، فائلوں ان عناصر کی نمائندگی کرتے ہیں کی ایک اسکین شروع کرنے کی کوشش کرتے ہیں، اور کرے گا. یہ phpMussel لئے مناسب رویہ ہے. تاہم، کچھ CMS کے لئے، میں خالی عناصر <code dir="ltr">$_FILES</code> وہاں نہ کوئی بھی ہوتے ہیں تو اس صورت میں، phpMussel لئے عام رویہ ان لوگوں CMS کے عام رویے کے ساتھ مداخلت کی جائے گی رپورٹ کیا جا سکتا ہے ان لوگوں کے CMS، یا غلطیوں کے قدرتی رویے کے نتیجے میں ہو سکتا ہے. ایک ایسی صورتحال نے اس وقت ہوتی ہے، تو اس اختیار کو چالو کرنے کے، phpMussel طرح خالی عناصر کے لئے علیحدہ اسکین کی ضرورت شروع کرنے کی کوشش نہ کرنے کی ہدایت دیں گے، اس طرح کے صفحے کی درخواست کے تسلسل کی اجازت دی چلا جب ان کو نظر انداز اور کسی بھی متعلقہ خرابی کے پیغامات واپس نہیں کرنا. False (جھوٹی) = بند کر؛ True (سچے) = چالو کردیا.</li></ul></div>

##### <div dir="rtl">"theme" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>"اپ لوڈ کریں تردید" صفحہ کیلئے استعمال کرنے کے لئے جمالیاتی.</li></ul></div>

```
theme
├─default ("Default")
├─rbi ("Red-Blue Inverted")
├─slate ("Slate")
├─bluemetal ("Blue Metal")
├─moss ("Moss")
├─fullmoon ("Full Moon")
└─…دیگر
```

##### <div dir="rtl">"magnification" <code dir="ltr">[float]</code><br /></div>
<div dir="rtl"><ul><li>فونٹ اضافہ. پہلے سے طے شدہ = 1.</li></ul></div>

#### <div dir="rtl">"phpmailer" (قسم)<br /></div>
<div dir="rtl">PHPMailer کی ترتیبات (دو عنصر کی توثیق کے لئے استعمال کیا جاتا ہےn).<br /><br /></div>

##### <div dir="rtl">"event_log" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>PHPMailer کے سلسلے میں تمام واقعات کو لاگ ان کرنے کے لئے ایک فائل. ایک فائل کا نام کی وضاحت کریں، یا غیر فعال کرنے کو خالی چھوڑ.</li></ul></div>

##### <div dir="rtl">"enable_two_factor" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>یہ تعین کرتا ہے کہ 2FA استعمال کیا جانا چاہئے.</li></ul></div>

##### <div dir="rtl">"enable_notifications" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>اگر اپ لوڈ بند ہونے پر آپ ای میل کے ذریعہ مطلع کرنا چاہتے ہیں تو، وصول کنندہ کا ای میل پتہ یہاں بتائیں.</li></ul></div>

##### <div dir="rtl">"skip_auth_process" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>جب <code dir="ltr">true</code>، SMTP کی تصدیق کے عمل کو چھوڑ دیا گیا ہے. اس سے بچنا چاہئے. اگر عمل ختم ہو جاتا ہے تو، آؤٹ باؤنڈ ای میل MITM حملوں سے بے نقاب ہوسکتا ہے. مخصوص معاملات میں ضروری ہوسکتا ہے (مثال کے طور پر، جب SMTP سرور مناسب طریقے سے منسلک نہیں کرے گا).</li></ul></div>

##### <div dir="rtl">"host" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>آؤٹ پاؤنڈ ای میل کے لئے استعمال کرنے کے لئے SMTP میزبان.</li></ul></div>

##### <div dir="rtl">"port" <code dir="ltr">[int]</code><br /></div>
<div dir="rtl"><ul><li>آؤٹ پاؤنڈ ای میل کے لئے استعمال کرنے کے لئے پورٹ نمبر. پہلے سے طے شدہ = 587.</li></ul></div>

##### <div dir="rtl">"smtp_secure" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>ای میل بھیجنے پر پروٹوکول استعمال کرنے کے لئے (TLS یا SSL).</li></ul></div>

```
smtp_secure
├─default ("-")
├─tls ("TLS")
└─ssl ("SSL")
```

##### <div dir="rtl">"smtp_auth" <code dir="ltr">[bool]</code><br /></div>
<div dir="rtl"><ul><li>کیا SMTP سیشن کو مستند کیا جاسکتا ہے؟ (عام طور پر اس کو نظر انداز کرنا چاہئے).</li></ul></div>

##### <div dir="rtl">"username" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>ای میل بھیجنے کے لئے صارف کا نام.</li></ul></div>

##### <div dir="rtl">"password" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>ای میل بھیجنے کے لئے پاس ورڈ.</li></ul></div>

##### <div dir="rtl">"set_from_address" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>ای میل بھیجنے کے لئے بھیجنے والے کا پتہ.</li></ul></div>

##### <div dir="rtl">"set_from_name" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>ای میل بھیجنے کے لئے بھیجنے کا نام.</li></ul></div>

##### <div dir="rtl">"add_reply_to_address" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>ای میل بھیجنے پر جواب کا پتہ.</li></ul></div>

##### <div dir="rtl">"add_reply_to_name" <code dir="ltr">[string]</code><br /></div>
<div dir="rtl"><ul><li>ای میل بھیجنے پر جواب کا نام.</li></ul></div>

---


### <div dir="rtl">۸. <a name="SECTION8"></a>دستخط فارمیٹ</div>

<div dir="rtl">بھی دیکھو:<br /></div>
<div dir="rtl"><ul>
 <li><a href="#WHAT_IS_A_SIGNATURE">ایک "دستخط" کیا ہے؟</a></li>
</ul></div>

<div dir="rtl">پہلا 9 بائٹس <code dir="ltr">[x0-x8]</code> phpMussel دستخط فائل کی <code dir="ltr">phpMussel</code> ہے، اور "جادو نمبر"(magic number) کے طور پر کام کرتے ہیں، انہیں دستخط شدہ فائلوں کے طور پر شناخت کرنے کے لئے (اس فائلوں کا استعمال کرتے ہوئے حادثے سے بچنے میں مدد ملتی ہے جو دستخط شدہ فائلوں میں نہیں ہیں). اگلے بائٹ <code dir="ltr">[x9]</code> دستخط فائل کی قسم کی شناخت کرتا ہے، دستخط فائل کو سمجھنے کے قابل ہونے کے لئے ضروری ہے. مندرجہ ذیل قسم کے دستخط فائلوں کو تسلیم کیا جاتا ہے:<br /><br /></div>

&nbsp; <div dir="rtl" style="display:inline">قسم</div> | <div dir="rtl">بائٹ</div> | <div dir="rtl">تفصیل</div>
---|---|---
`General_Command_Detections` | `0?` | <div dir="rtl">"کوما علیحدہ اقدار" دستخط فائلوں کے لئے. دستخط فائلوں کے اندر اندر تلاش کرنے کے لئے ہییکسڈیکیلٹ - انکوڈ کرنگ ہیں. یہاں دستخط کسی نام یا دیگر تفصیلات نہیں ہیں (پتہ لگانے کے لئے صرف تار).</div>
`Filename` | `1?` | <div dir="rtl">فائل نام کے دستخط کے لئے.</div>
`Hash` | `2?` | <div dir="rtl">ہش دستخط کے لئے.</div>
`Standard` | `3?` | <div dir="rtl">دستخط کی فائلوں کے لئے جو براہ راست فائل فائل کے ساتھ کام کرتی ہے.</div>
`Standard_RegEx` | `4?` | <div dir="rtl">دستخط کی فائلوں کے لئے جو براہ راست فائل فائل کے ساتھ کام کرتی ہے. دستخط باقاعدگی سے اظہار میں شامل ہوسکتے ہیں.</div>
`Normalised` | `5?` | <div dir="rtl">دستخط کردہ فائلوں کے لئے جو معمولی فائل کے مواد کے ساتھ کام کرتی ہے.</div>
`Normalised_RegEx` | `6?` | <div dir="rtl">دستخط کردہ فائلوں کے لئے جو معمولی فائل کے مواد کے ساتھ کام کرتی ہے. دستخط باقاعدگی سے اظہار میں شامل ہوسکتے ہیں.</div>
`HTML` | `7?` | <div dir="rtl">دستخط فائلوں کے لئے جو HTML مواد کے ساتھ کام کرتا ہے.</div>
`HTML_RegEx` | `8?` | <div dir="rtl">دستخط فائلوں کے لئے جو HTML مواد کے ساتھ کام کرتا ہے. دستخط باقاعدگی سے اظہار میں شامل ہوسکتے ہیں.</div>
`PE_Extended` | `9?` | <div dir="rtl">پی ایچ میٹ میٹاٹا کے ساتھ کام کرنے والی دستخط کی فائلوں کے لئے.</div>
`PE_Sectional` | `A?` | <div dir="rtl">پی ایچ سیکشنل میٹا ڈیٹا کے ساتھ کام کرنے والی دستخط کی فائلوں کے لئے.</div>
`Complex_Extended` | `B?` | <div dir="rtl">دستخط فائلوں کے لئے جو وسیع قوانین کے ساتھ وسیع پیمانے پر میٹا ڈیٹا ڈیٹا پر مبنی کام کرتی ہیں.</div>
`URL_Scanner` | `C?` | <div dir="rtl">سائن ان فائلوں کے لئے جو URL کے ساتھ کام کرتی ہیں.</div>

<div dir="rtl">اگلے بائٹ <code dir="ltr">[x10]</code> ایک نیا لائن ہے <code dir="ltr">[0A]</code>.<br /><br /></div>

<div dir="rtl">اس کے بعد ہر غیر خالی لائن ایک دستخط یا حکمرانی ہے. ہر دستخط یا قاعدہ ایک لائن پر قبضہ کرتی ہے. معاون دستخط کی حمایت ذیل میں بیان کی گئی ہے.<br /><br /></div>

#### <div dir="rtl"><em>فائل کا نام دستخط</em></div>
<div dir="rtl">تمام فائل کا نام دستخطوں کی شکل پر عمل کریں:<br /><br /></div>

`NAME:FNRX`

<div dir="rtl">NAME کہاں کہ دستخط کے لئے پیش کرنے کے لئے نام ہے اور FNRX اسم مسل (انکوڈنگ نہیں) خلاف سے ملنے کے لئے رگ نمونہ ہے.<br /><br /></div>

#### <div dir="rtl"><em>ہش دستخط</em></div>
<div dir="rtl">تمام ہش دستخط شکل پر عمل کریں:<br /><br /></div>

`HASH:FILESIZE:NAME`

<div dir="rtl">کہاں ہیش ایک پوری فائل کی ہش ہیش ہے (عام طور پر MD5)، FILESIZE وہ فائل کا مجموعی حجم ہے اور NAME کہ دستخط کے لئے پیش کرنے کے لئے نام ہے.<br /><br /></div>

#### <div dir="rtl"><em>PE تخباگیی دستخط</em></div>
<div dir="rtl">تمام PE تخباگیی دستخط شکل پر عمل کریں:<br /><br /></div>

`SIZE:HASH:NAME`

<div dir="rtl">کہاں ہیش ایک PE فائل کے ایک حصے کی MD5 ہیش ہے، SIZE اس حصے کا مجموعی حجم ہے اور NAME کہ دستخط کے لئے پیش کرنے کے لئے نام ہے.<br /><br /></div>

#### <div dir="rtl"><em>PE توسیع دستخط</em></div>
<div dir="rtl">تمام PE توسیع کر دستخطوں کی شکل پر عمل کریں:<br /><br /></div>

`$VAR:HASH:SIZE:NAME`

<div dir="rtl">$VAR کہاں کیخلاف سے ملنے کے لئے پیئ متغیر کا نام ہے، ہیش کہ متغیر کی MD5 ہیش، SIZE کہ متغیر کا مجموعی حجم ہے اور NAME کہ دستخط کے لئے پیش کرنے کے لئے نام ہے.<br /><br /></div>

#### <div dir="rtl"><em>پیچیدہ بڑھا دیا دستخط</em></div>
<div dir="rtl">کمپلیکس توسیعی دستخط وہ خود کے خلاف دستخطوں کی طرف سے مخصوص کیا جاتا ہے کے ملاپ کر رہے ہیں کہ میں phpMussel ساتھ ممکن دستخط کے دیگر اقسام کے بجائے مختلف ہیں اور وہ متعدد معیارات کے خلاف میچ کر سکتے ہیں. میچ کے criterias کی طرف سے محدود رہے ہیں "؛" اور ہر میچ کا کلیہ کی طرف سے محدود کیا جاتا ہے کے ملاپ کی قسم اور میچ کے اعداد و شمار ":" کے طور پر تو ان کے دستخط کے لئے اس کی شکل کی طرح تھوڑا سا نظر جاتا:<br /><br /></div>

`$variable1:SOMEDATA;$variable2:SOMEDATA;SignatureName`

#### <div dir="rtl"><em>باقی سب کچھ</em></div>
<div dir="rtl">دیگر تمام دستخطوں کی شکل پر عمل کریں:<br /><br /></div>

`NAME:HEX:FROM:TO`

<div dir="rtl">کہاں کا نام ہے کہ دستخط کے لئے پیش کرنے کے لئے نام ہے اور HEX دیا دستخط کی طرف سے ملائے جا کرنا فائل کی ایک شش اعشاری انکوڈنگ طبقہ ہے. FROM اور کرنے کا اشارہ، اختیاری پیرامیٹرز ہیں جس کے خلاف جانچ کرنا ماخذ ڈیٹا میں عہدوں کے لئے اور جس میں سے.<br /><br /></div>

#### <div dir="rtl"><em>رگ</em></div>
<div dir="rtl">رگ کی کسی بھی شکل سمجھا اور صحیح طریقے سے PHP کی طرف سے کارروائی بھی صحیح phpMussel اور اس کے دستخط کی طرف سے سمجھ اور اس پر عملدرآمد کیا جانا چاہئے. تاہم، میں نے نئے رگ بنیاد پر دستخط لکھنے جب، انتہائی احتیاط لینے کیا آپ کیا کر رہے ہیں مکمل طور پر یقین نہیں ہے تو، کیونکہ مشورہ تھا، انتہائی فاسد اور/یا غیر متوقع نتائج ہو جائے کر سکتے ہیں. phpMussel منبع کوڈ پر ایک نظر ڈالیں آپ سیاق و سباق ہے جس میں رگ بیانات تصریف کر رہے ہیں کے بارے میں مکمل طور پر یقین نہیں ہیں تو. اس کے علاوہ، کہ تمام نمونوں (فائل نام، ذخیرہ میٹاڈیٹا اور MD5 نمونوں کو رعایت کے ساتھ) شش اعشاری (کورس کی، پوروگامی پیٹرن نحو) انکوڈنگ جائے ضروری ہے یاد رکھنا!<br /><br /></div>

---


### <div dir="rtl">۹. <a name="SECTION9"></a>جانا جاتا مطابقت کے مسائل</div>

#### <div dir="rtl">PHP اور PCRE</div>

<div dir="rtl">phpMussel صحیح PHP اور PCRE پر عمل کرنے اور تقریب کی ضرورت ہے. PHP کے بغیر، یا PHP کی PCRE توسیع کے بغیر، phpMussel پھانسی یا صحیح طریقے سے کام نہیں کرے گا. پہلے ڈاؤن لوڈ کرنے اور phpMussel نصب کرنے سے آپ کے سسٹم PHP اور PCRE دونوں نصب ہے اس بات کا یقین اور دستیاب بنانا چاہئے.<br /><br /></div>

#### <div dir="rtl">اینٹی وائرس سافٹ ویئر کی مطابقت</div>

<div dir="rtl">بعض اوقات phpMussel اور دیگر اینٹی وائرس حلوں کے مابین مطابقت کی دشواری ہوتی ہے. لہذا ہر چند مہینوں کے بعد، میں رپورٹ شدہ پریشانیوں کے لئے Virus Total کے خلاف phpMussel چیک کرتا ہوں. جب وہاں پر مسائل کی اطلاع دی جاتی ہے تو، میں دستاویزات میں، درج کردہ مسائل کو یہاں درج کرتا ہوں.<br /><br /></div>

<div dir="rtl">جب میں نے حال ہی میں جانچ کیا (2019.10.10)، تو کوئی پریشانی کی اطلاع نہیں ملی.<br /><br /></div>

<div dir="rtl">میں دستخط فائلوں، دستاویزات، یا دیگر پردیی مواد کی جانچ نہیں کرتا ہوں. جب دوسرے اینٹی وائرس حل ان کا پتہ لگاتے ہیں تو دستخط فائلیں ہمیشہ کچھ غلط مثبت کا سبب بنتی ہیں. لہذا میں سختی سے سفارش کروں گا، اگر آپ کسی ایسی مشین میں phpMussel انسٹال کرنے کا ارادہ رکھتے ہیں جہاں پہلے ہی ایک اور اینٹی وائرس حل موجود ہے، آپ کی وائٹ لسٹ میں phpMussel دستخط فائلوں کو ڈالنے کے لئے.<br /><br /></div>

---


### <div dir="rtl">۱۰. <a name="SECTION10">اکثر پوچھے گئے سوالات (FAQ)</div>

<div dir="rtl"><ul>
 <li><a href="#WHAT_IS_A_SIGNATURE">ایک "دستخط" کیا ہے؟</a></li>
 <li><a href="#WHAT_IS_A_FALSE_POSITIVE">ایک "جھوٹی مثبت" سے کیا مراد ہے؟</a></li>
 <li><a href="#SIGNATURE_UPDATE_FREQUENCY">دستخط کیسے بیشتر اپ ڈیٹ کر رہے ہیں؟</a></li>
 <li><a href="#ENCOUNTERED_PROBLEM_WHAT_TO_DO">phpMussel استعمال کرتے ہوئے میں ایک مسئلہ کا سامنا کرنا پڑا ہے اور میں اس کے بارے میں کیا پتہ نہیں ہے! مدد کریں!</a></li>
 <li><a href="#MINIMUM_PHP_VERSION_V3">میں 7.2.0 سے زیادہ پرانے ایک PHP ورژن کے ساتھ phpMussel v3 استعمال کرنا چاہتے ہیں؛ کیا آپ مدد کر سکتے ہیں؟</a></li>
 <li><a href="#PROTECT_MULTIPLE_DOMAINS">میں نے ایک سے زیادہ ڈومینز کی حفاظت کے لئے ایک واحد phpMussel تنصیب کا استعمال کر سکتا ہوں؟</a></li>
 <li><a href="#PAY_YOU_TO_DO_IT">میں نے اس پر وقت خرچ نہیں کرنا چاہتا (اسے انسٹال، اس کے قیام، وغیرہ)؛ میں نے آپ کو ایسا کرنے کے لئے ادا کر سکتے ہیں؟</a></li>
 <li><a href="#HIRE_FOR_PRIVATE_WORK">میں ذاتی کام کے لئے آپ کی خدمات حاصل کر سکتے ہیں؟</a></li>
 <li><a href="#SPECIALIST_MODIFICATIONS">مجھے خصوصی ترمیم کی ضرورت؛ کیا آپ مدد کر سکتے ہیں؟</a></li>
 <li><a href="#ACCEPT_OR_OFFER_WORK">میں نے ایک ڈویلپر، ویب سائٹ ڈیزائنر، یا پروگرامر ہوں. میں اس منصوبے سے متعلق کام کر سکتے ہیں؟</a></li>
 <li><a href="#WANT_TO_CONTRIBUTE">میں نے اس منصوبے میں شراکت کے لئے چاہتے ہیں؛ میں یہ کر سکتا ہوں؟</a></li>
 <li><a href="#SCAN_DEBUGGING">کس طرح وہ سکین کر رہے ہیں جب فائلوں کے بارے میں مزید تفصیلات تک رسائی حاصل کرنے کے لئے؟</a></li>
 <li><a href="#BLACK_WHITE_GREY">بلیک لسٹ – سفید لسٹ – سرمئی لسٹ – وہ کیا ہیں، اور میں ان کا کیسے استعمال کروں؟</a></li>
 <li><a href="#HOW_TO_USE_PDO">"PDO DSN" کیا ہے؟ میں phpMussel کے ساتھ PDO کیسے استعمال کرسکتا ہوں؟</a></li>
 <li><a href="#AJAX_AJAJ_JSON">میری اپ لوڈ کی فعالیت نہیں ہم وقت ساز (مثال کے طور پر، ajax، ajaj، json، وغیرہ استعمال کرتا ہے). اپلوڈ مسدود ہونے پر مجھے کوئی خاص پیغام یا انتباہ نظر نہیں آتا ہے. کیا ہو رہا ہے؟</a></li>
</ul></div>

#### <div dir="rtl"><a name="WHAT_IS_A_SIGNATURE"></a>ایک "دستخط" کیا ہے؟<br /><br /></div>

<div dir="rtl">phpMussel میں، ایک "دستخط" ڈیٹا کو ایک شناخت کے طور پر کام کرتا ہے کہ مراد، عام طور پر کچھ کے لئے بڑی پورے کا ایک چھوٹا سا ٹکڑا کے طور پر ہم تلاش کر رہے ہیں. عام طور پر اضافی سیاق و سباق فراہم کرنے میں مدد کرنے کے لئے ایک لیبل، اور دیگر مفید ڈیٹا شامل ہیں. یہ ہم اسے تلاش کرتے وقت آگے بڑھنے کا بہترین طریقہ کا تعین کرنے میں مدد کر سکتے ہیں.<br /><br /></div>

#### <div dir="rtl"><a name="WHAT_IS_A_FALSE_POSITIVE"></a>ایک "جھوٹی مثبت" سے کیا مراد ہے؟<br /><br /></div>

<div dir="rtl">اصطلاح "جھوٹی مثبت" (<em>متبادل کے طور پر: "جھوٹی مثبت غلطی"؛ "جھوٹے الارم"</em>)، بیان بہت صرف، اور ایک عام سیاق و سباق میں، ایک کی حالت کے لئے جانچ جب، استعمال کیا جاتا ہے کہ ٹیسٹ کے نتائج کا حوالہ دیتے ہیں کے لئے، نتائج مثبت ہیں جب (یعنی حالت "مثبت" یا "سچ" ہونے کا تعین کیا جاتا ہے)، لیکن بننے کی توقع کی جاتی ہے (یا ہونا چاہیئے) منفی (یعنی حالت، حقیقت میں، "منفی"، یا "جھوٹے"). "جھوٹی مثبت" مثل غور کیا جا سکتا کے لئے "رونا بھیڑیا" (جس حالت تجربہ کیا جا رہا، حالت "جھوٹے" کہ میں ریوڑ کے قریب کوئی بھیڑیا ہے، اور شرط کے طور پر رپورٹ کیا جاتا ہے ریوڑ کے قریب ایک بھیڑیا ہے کہ آیا ہے "بھیڑیا، بھیڑیا" بلا کی راہ کی طرف چرواہا کی طرف سے "مثبت")، یا طبی جانچ میں حالات جس میں ایک مریض، کچھ بیماری یا مرض ہونے حقیقت میں، وہ ایسی کوئی بیماری یا مرض ہے جب کے طور پر تشخیص کی جاتی ہے کے مطابق.<br /><br /></div>

<div dir="rtl">ایک شرط کے لئے جانچ جب متعلقہ نتائج "سچ مثبت" کی اصطلاحات کا استعمال کرتے ہوئے، "سچ منفی" اور "جھوٹے منفی" بیان کیا جا سکتا ہے. "سچ مثبت" جب ٹیسٹ کے نتائج اور حالت کی اصل ریاست دونوں حقیقی (یا "مثبت")، اور ایک "حقیقی منفی" ہیں سے مراد ہے سے مراد ہے جب ٹیسٹ کے نتائج اور کی اصل ریاست شرط ہیں دونوں جھوٹے ہیں (یا "منفی")؛ "سچ مثبت" یا "سچ منفی" ایک "صحیح اندازہ" سمجھا جاتا ہے. ایک "جھوٹی مثبت" کے برعکس ایک "جھوٹے منفی" ہے؛ "جھوٹے منفی" سے ٹیسٹ کے نتائج منفی ہیں، جب (یعنی حالت "منفی"، یا "جھوٹے" ہونے کا تعین کیا جاتا ہے)، لیکن بننے کی توقع کی جاتی ہے (یا ہونا چاہیئے) مراد مثبت (یعنی، حالت، حقیقت میں، "مثبت" یا "سچ") ہے.<br /><br /></div>

<div dir="rtl">phpMussel کے تناظر میں، ان شرائط phpMussel کے دستخط اور فائلوں کو وہ بلاک ہے کہ حوالہ دیتے ہیں. جب phpMussel وجہ سے بری فرسودہ یا غلط دستخط کرنے کے بلاکس ایک فائل ہے، لیکن ایسا نہیں کیا جاتا یا یہ غلط وجوہات کی بناء پر ایسا کرتا ہے جب، ہم نے ایک "جھوٹی مثبت" کے طور پر اس ایونٹ کا حوالہ دیتے ہیں. phpMussel ایک فائل ہے، کی وجہ سے غیر متوقع خطرات سے، بلاک کر دیا گیا ہے چاہئے لاپتہ اس کے دستخط میں دستخط یا کمی کو بلاک کرنے میں ناکام ہونے پر، ہم نے ایک "یاد کا پتہ لگانے" (ایک "جھوٹے منفی" کے مطابق ہوتا ہے) کے طور پر اس واقعہ کا حوالہ دیتے ہیں.<br /><br /></div>

<div dir="rtl">یہ مندرجہ ذیل ٹیبل کی طرف سے بیان کیا جا سکتا ہے:<br /><br /></div>

&nbsp; <div dir="rtl" style="display:inline">phpMussel چاہئے <strong>نہیں</strong> ایک فائل بلاک</div> | &nbsp; <div dir="rtl" style="display:inline">phpMussel ایک فائل کو بلاک کرنا چاہئے</div> | &nbsp;
---|---|---
&nbsp; <div dir="rtl" style="display:inline">یہ سچ ہے کہ منفی (صحیح اندازہ)</div> | <div dir="rtl">فوت شدہ کا پتہ لگانے (جھوٹے منفی کے مطابق)</div> | <div dir="rtl">phpMussel <strong>نہیں</strong> ایک فائل کو بلاک</div>
&nbsp; <div dir="rtl" style="display:inline"><strong>جھوٹی مثبت</strong></div> | <div dir="rtl">یہ سچ ہے کہ مثبت (صحیح اندازہ)</div> | <div dir="rtl"><strong>phpMussel کرتا فائل کو بلاک</strong></div>

#### <div dir="rtl"><a name="SIGNATURE_UPDATE_FREQUENCY"></a>دستخط کیسے بیشتر اپ ڈیٹ کر رہے ہیں؟<br /><br /></div>

<div dir="rtl">اپ ڈیٹ فریکوئنسی سوال میں دستخط کی فائلوں پر منحصر ہوتی ہے. phpMussel دستخط کی فائلوں کے لئے تمام حاکم عام طور پر اپ ڈیٹ کرنے کے لئے ممکن ہے کے طور پر کے طور پر ان کے دستخط رکھنے کی کوشش کرتے ہیں، لیکن ہم سب کے طور پر مختلف دیگر وعدوں، اس منصوبے سے باہر ہماری زندگی ہے، اور ہم میں سے کوئی اس کو مالی طور پر معاوضہ رہے ہیں (یعنی، ادا کی ) منصوبے پر ہماری کوششوں کے لئے ایک عین مطابق اپ ڈیٹ کے شیڈول کی ضمانت نہیں کیا جا سکتا. دستخط کو اپ ڈیٹ کیا جاتا ہے جب ایسا کرنے کا کافی وقت ہے. اگر آپ کو کوئی پیشکش کرنے کو تیار ہیں تو اس سلسلے میں معاونت ہمیشہ تعریف کی ہے.<br /><br /></div>

#### <div dir="rtl"><a name="ENCOUNTERED_PROBLEM_WHAT_TO_DO"></a>phpMussel استعمال کرتے ہوئے میں ایک مسئلہ کا سامنا کرنا پڑا ہے اور میں اس کے بارے میں کیا پتہ نہیں ہے! مدد کریں!</div>
<div dir="rtl"><ul>
 <li>آپ نے سافٹ ویئر کا تازہ ترین ورژن استعمال کر رہے ہیں؟ آپ کو آپ کے دستخط فائلوں کا تازہ ترین ورژن استعمال کر رہے ہیں؟ ان دو سوالوں کی یا تو کرنے کے لئے جواب نہیں ہے تو، سب سے پہلے سب کچھ کو اپ ڈیٹ کرنے کی کوشش کریں، اور چاہے وہ مسئلہ برقرار رہتا ہے چیک کریں. یہ برقرار رہتا ہے، پڑھنے جاری رکھیں.</li>
 <li>اگر آپ کو تمام دستاویزات کے ذریعے کی جانچ پڑتال کی ہے؟ اگر نہیں، تو براہ مہربانی. مسئلہ دستاویزات استعمال کر حل نہیں کیا جا سکتا ہے، تو پڑھنے جاری رکھیں.</li>
 <li>اگر آپ کو <strong><a href="https://github.com/phpMussel/phpMussel/issues">issues صفحے</a></strong>، دیکھنا چاہے مسئلہ پہلے ذکر کیا گیا ہے؟ اس سے پہلے ذکر کیا گیا ہے تو، چاہے وہ کسی بھی تجاویز، خیالات، اور/یا کے حل فراہم کیا گیا جانچ اور مسئلہ حل کرنے کی کوشش کرنے کے لئے ضروری کے مطابق عمل کریں.</li>
 <li>اگر مسئلہ اب بھی جاری رہتا ہے، تو issues کے صفحے پر ایک نیا issue تشکیل دے کر اس کے بارے میں مدد طلب کریں.</li>
</ul></div>

#### <div dir="rtl"><a name="MINIMUM_PHP_VERSION_V3"></a>میں 7.2.0 سے زیادہ پرانے ایک PHP ورژن کے ساتھ phpMussel v3 استعمال کرنا چاہتے ہیں؛ کیا آپ مدد کر سکتے ہیں؟<br /><br /></div>

<div dir="rtl">نہیں. phpMussel v3 کم از کم PHP >= 7.2.0 کی ضرورت ہے.<br /><br /></div>

<div dir="rtl"><em>بھی دیکھو: <a href="https://maikuolan.github.io/Compatibility-Charts/">مطابقت چارٹ</a>.</em><br /><br /></div>

#### <div dir="rtl"><a name="PROTECT_MULTIPLE_DOMAINS"></a>میں نے ایک سے زیادہ ڈومینز کی حفاظت کے لئے ایک واحد phpMussel تنصیب کا استعمال کر سکتا ہوں؟<br /><br /></div>

<div dir="rtl">جی ہاں.<br /><br /></div>

#### <div dir="rtl"><a name="PAY_YOU_TO_DO_IT"></a>میں نے اس پر وقت خرچ نہیں کرنا چاہتا (اسے انسٹال، اس کے قیام، وغیرہ)؛ میں نے آپ کو ایسا کرنے کے لئے ادا کر سکتے ہیں؟<br /><br /></div>

<div dir="rtl">شاید. یہ معاملہ در معاملہ کی بنیاد پر کیا جاتا ہے. کی آپ کو ضرورت ہے ہمیں بتائیں. ہمیں بتائیں کہ آپ کی پیشکش کر رہے ہیں. ہم آپ کو بتا دیں گے ہم مدد کر سکتے ہیں.<br /><br /></div>

#### <div dir="rtl"><a name="HIRE_FOR_PRIVATE_WORK"></a>میں ذاتی کام کے لئے آپ کی خدمات حاصل کر سکتے ہیں؟<br /><br /></div>

<div dir="rtl"><em>اوپر ملاحظہ کریں.</em><br /><br /></div>

#### <div dir="rtl"><a name="SPECIALIST_MODIFICATIONS"></a>مجھے خصوصی ترمیم کی ضرورت؛ کیا آپ مدد کر سکتے ہیں؟<br /><br /></div>

<div dir="rtl"><em>اوپر ملاحظہ کریں.</em><br /><br /></div>

#### <div dir="rtl"><a name="ACCEPT_OR_OFFER_WORK"></a>میں نے ایک ڈویلپر، ویب سائٹ ڈیزائنر، یا پروگرامر ہوں. میں اس منصوبے سے متعلق کام کر سکتے ہیں؟<br /><br /></div>

<div dir="rtl">جی ہاں. ہمارے لائسنس اس کی ممانعت نہیں کرتا.<br /><br /></div>

#### <div dir="rtl"><a name="WANT_TO_CONTRIBUTE"></a>میں نے اس منصوبے میں شراکت کے لئے چاہتے ہیں؛ میں یہ کر سکتا ہوں؟<br /><br /></div>

<div dir="rtl">جی ہاں. اس کا خیر مقدم کیا جاتا ہے. "CONTRIBUTING.md" ملاحظہ کریں مزید معلومات کے لئے.<br /><br /></div>

#### <div dir="rtl"><a name="SCAN_DEBUGGING"></a>کس طرح وہ سکین کر رہے ہیں جب فائلوں کے بارے میں مزید تفصیلات تک رسائی حاصل کرنے کے لئے؟<br /><br /></div>

<div dir="rtl">آپ کو اس مقصد ان کو اسکین کرنے phpMussel ہدایت کرنے سے پہلے کے لئے استعمال کرنے کے لئے ایک صف بتائے کی طرف سے ایسا کر سکتے ہیں.<br /><br /></div>

<div dir="rtl">ذیل کی مثال میں، <code dir="ltr">$Foo</code> اس مقصد کے لئے مقرر کیا جاتا ہے. سکیننگ کے بعد <code dir="ltr">/file/path/...</code>، <code dir="ltr">/file/path/...</code> کی طرف سے موجود فائلوں کے بارے میں تفصیلی معلومات <code dir="ltr">$Foo</code> کی طرف سے پر مشتمل ہو گا.<br /><br /></div>

```PHP
<?php
require 'phpmussel/loader.php';

$phpMussel['Set-Scan-Debug-Array']($Foo);

$Results = $phpMussel['Scan']('/file/path/...');

var_dump($Foo);
```

<div dir="rtl">صف کثیرالابعاد ہے. عناصر ہر فائل کو سکین کیا جا رہا ہے کی نمائندگی کرتے ہیں. ذیلی عناصر ان فائلوں کے بارے میں تفصیلات نمائندگی کرتے ہیں. ذیلی عناصر مندرجہ ذیل ہیں:<br /><br /></div>

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

<div dir="rtl"><em>† - عارضی نتائج کے ساتھ فراہم نہیں (صرف نئے اسکین کے نتائج کے لئے فراہم).</em><br /><br /></div>

<div dir="rtl"><em>‡ - PE فائلوں کو سکین جب صرف فراہم کی.</em><br /><br /></div>

<div dir="rtl">اختیاری، اس صف میں مندرجہ ذیل کا استعمال کرتے ہوئے کی طرف سے تباہ کیا جا سکتا ہے:<br /><br /></div>

```PHP
$phpMussel['Destroy-Scan-Debug-Array']($Foo);
```

#### <div dir="rtl"><a name="BLACK_WHITE_GREY"></a>بلیک لسٹ – سفید لسٹ – سرمئی لسٹ – وہ کیا ہیں، اور میں ان کا کیسے استعمال کروں؟<br /><br /></div>

<div dir="rtl">سیاق و ضوابط پر منحصر ہے، یہ الفاظ مختلف چیزوں کا مطلب ہے. phpMussel میں، تین شرائط ہیں جہاں یہ شرائط استعمال کیا جاتا ہے: فائل کا ناپ، فائل کی قسم، اور سرمئی لسٹ دستخط.<br /><br /></div>

<div dir="rtl">کم سے کم پروسیسنگ کے ساتھ مطلوبہ مطلوبہ نتائج حاصل کرنے کے لئے، فائلوں کو اسکین کرنے سے قبل phpMussel کچھ چیزیں کرسکتے ہیں، مثال کے طور پر، فائل کا سائز، نام، اور توسیع چیک کر رہا ہے. اگر ایک فائل بہت بڑی ہے، یا اگر اس کے کسی قسم کی فائل کا توسیع ہے جسے ہم نہیں چاہتے ہیں، ہم فوری طور پر فائل کی شناخت کر سکتے ہیں، اور اسے اسکین کرنے کی ضرورت نہیں ہے.<br /><br /></div>

<div dir="rtl">فائل کا سائز کے سیاق و سباق کا طریقہ phpMussel کا جواب ہے جب ایک فائل ایک مخصوص حد سے کہیں زیادہ ہے. کوئی فہرست شامل نہیں ہیں، لیکن اس کے سائز پر مبنی ایک فائل کو سمجھا جا سکتا ہے. دو الگ الگ، اختیاری ترتیب کے ہدایات بالترتیب ایک حد اور مطلوبہ جواب کی وضاحت کرنے کے لئے موجود ہیں.<br /><br /></div>

<div dir="rtl">فائل کی قسم کا جواب یہ ہے کہ phpMussel فائل کی توسیع کا جواب ہے. تین علیحدہ، اختیاری ترتیب کے ہدایات واضح طور پر واضح کرنے کے لئے موجود ہیں کہ بالترتیب ہر لسٹ پر ہر ترتیب پر ہونا چاہئے. ایک فائل درج کی جا سکتی ہے اگر اس کی توسیع بالترتیب کسی بھی مخصوص ملانے سے ملتی ہے.<br /><br /></div>

<div dir="rtl">ان دونوں مقاصد میں، وائٹسٹسٹ کا مطلب یہ ہے کہ اسے اسکین یا پرچم نہیں کیا جانا چاہئے؛ بلیک لسٹ پر ہونے کا مطلب یہ ہے کہ اسے نشان زد کیا جانا چاہئے (اور اس وجہ سے اس کو اسکین کرنے کی ضرورت نہیں ہے)؛ اور گرینسٹ پر ہونے کا مطلب یہ ہے کہ اس بات کا تعین کرنے کے لئے مزید تجزیہ کی ضرورت ہے کہ آیا ہمیں اسے پرچم دینا چاہیے (یعنی، اسے اسکین کیا جانا چاہئے).<br /><br /></div>

<div dir="rtl">دستخط سرمئی لسٹ دستخط کی ایک فہرست ہے جو لازمی طور پر نظر انداز کی جانی چاہئے (اس دستاویز میں پہلے ہی مختصر بیان کی گئی ہے). جب سرمئی لسٹ پر دستخط ہوجائے تو، phpMussel اپنے دستخط کے ذریعہ کام جاری رکھتا ہے اور سرمئی لسٹ پر دستخط کے حوالے سے کوئی خاص کارروائی نہیں کرتا ہے. کوئی دستخط بلیک لسٹ نہیں ہے، کیونکہ تخیل شدہ دستخط کے لئے منسلک سلوک رویہ عام رویے ہے. اس میں کوئی دستخط نہیں ہے، کیونکہ یہ اس سلسلے میں ضروری نہیں ہے.<br /><br /></div>

<div dir="rtl">اگر آپ کو دستخط یا مکمل دستخط فائل غیر فعال کرنے کے بغیر کسی خاص دستخط کی وجہ سے مسائل کو حل کرنے کی ضرورت ہوتی ہے تو دستخط سرمئی لسٹ مفید ہے.<br /><br /></div>

#### <div dir="rtl"><a name="HOW_TO_USE_PDO"></a>"PDO DSN" کیا ہے؟ میں phpMussel کے ساتھ PDO کیسے استعمال کرسکتا ہوں؟<br /><br /></div>

<div dir="rtl">"<a dir="ltr" href="https://www.php.net/manual/en/intro.pdo.php">PHP Data Objects</a>" (PHP ڈیٹا آبجیکٹ)، "PDO" کا مخفف ہے. یہ PHP کو ایک انٹرفیس فراہم کرتا ہے تاکہ وہ PHP کی ایپلی کیشنز کے ذریعہ استعمال ہونے والے ڈیٹا بیس سسٹم سے رابطہ قائم کرسکیں.<br /><br /></div>

<div dir="rtl">"<a dir="ltr" href="https://en.wikipedia.org/wiki/Data_source_name">data source name</a>" (ڈیٹا سورس کا نام)، "DSN" کا مخفف ہے. یہ PDO کو بیان کرتا ہے کہ اسے ڈیٹا بیس سے کیسے جڑنا چاہئے.<br /><br /></div>

<div dir="rtl">phpMussel میں، آپ کیڈیچنگ مقاصد کے لئے PDO استعمال کرسکتے ہیں. تاکہ اسے صحیح طریقے سے کام کیا جاسکے، ترتیب کے ذریعہ اس کو اہل بنائیں، اس کے لئے ایک ڈیٹا بیس بنائیں، اور نیچے بیان کردہ ڈھانچے کے مطابق اپنے ڈیٹا بیس میں ایک نیا ٹیبل بنائیں.<br /><br /></div>

<div dir="rtl">جب ایک ڈیٹا بیس کنکشن کامیابی کے ساتھ ہے، لیکن ضروری جدول موجود نہیں ہے، یہ خود بخود تخلیق کرنے کی کوشش کرے گی. تاہم، اس طرز عمل کا بڑے پیمانے پر تجربہ نہیں کیا گیا ہے اور کامیابی کی ضمانت نہیں دی جاسکتی ہے.<br /><br /></div>

<div dir="rtl">اگر آپ اسے استعمال نہیں کرنا چاہتے ہیں تو، آپ ان ہدایات کو نظرانداز کرسکتے ہیں.<br /><br /></div>

<div dir="rtl">ذیل میں بیان کردہ ڈھانچے میں "phpmussel" کو اپنے ڈیٹا بیس کے نام کے بطور استعمال کیا گیا ہے، لیکن آپ اپنے ڈیٹا بیس کے لئے جو بھی نام استعمال کرنا چاہ، استعمال کرسکتے ہیں، جب تک کہ وہی نام آپ کی ڈی ایس این ترتیب میں نقل کیا جائے.<br /><br /></div>

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

<div dir="rtl"><code dir="ltr">pdo_dsn</code> نیچے جیسا کہ بیان کیا جانا چاہئے.<br /><br /></div>

```
ڈیٹا بیس ڈرائیور کس پر استعمال ہوتا ہے اس پر منحصر ہے...
│
├─4d (انتباہ: تجرباتی، غیر جانچ شدہ، تجویز کردہ نہیں)
│ │
│ │         ╔═══════╗
│ └─4D:host=localhost;charset=UTF-8
│           ╚╤══════╝
│            └رابطہ کرنے کیلئے میزبان
│
├─cubrid
│ │
│ │             ╔═══════╗      ╔═══╗        ╔═════╗
│ └─cubrid:host=localhost;port=33000;dbname=example
│               ╚╤══════╝      ╚╤══╝        ╚╤════╝
│                │              │            └استعمال کرنے کے لئے ڈیٹا بیس کا نام
│                │              │
│                │              └استعمال کرنے کیلئے پورٹ نمبر
│                │
│                └رابطہ کرنے کیلئے میزبان
│
├─dblib
│ │
│ │ ╔═══╗      ╔═══════╗        ╔═════╗
│ └─dblib:host=localhost;dbname=example
│   ╚╤══╝      ╚╤══════╝        ╚╤════╝
│    │          │                └استعمال کرنے کے لئے ڈیٹا بیس کا نام
│    │          │
│    │          └رابطہ کرنے کیلئے میزبان
│    │
│    └Possible values: "mssql", "sybase", "dblib".
│
├─firebird
│ │
│ │                 ╔═══════════════════╗
│ └─firebird:dbname=/path/to/database.fdb
│                   ╚╤══════════════════╝
│                    ├مقامی ڈیٹا بیس فائل کا راستہ ثابت ہوسکتا ہے
│                    │
│                    ├ایک میزبان اور پورٹ نمبر سے رابطہ کرسکتے ہیں
│                    │
│                    └اگر آپ اسے استعمال کرنا چاہتے ہیں تو آپ کو Firebird دستاویزات کا حوالہ دینا چاہئے
│
├─ibm
│ │
│ │         ╔═════╗
│ └─ibm:DSN=example
│           ╚╤════╝
│            └رابطہ کرنے کے لئے کیٹلوجڈ ڈیٹا بیس
│
├─informix
│ │
│ │              ╔═════╗
│ └─informix:DSN=example
│                ╚╤════╝
│                 └رابطہ کرنے کے لئے کیٹلوجڈ ڈیٹا بیس
│
├─mysql (سب سے زیادہ تجویز کردہ)
│ │
│ │              ╔═════╗      ╔═══════╗      ╔══╗
│ └─mysql:dbname=example;host=localhost;port=3306
│                ╚╤════╝      ╚╤══════╝      ╚╤═╝
│                 │            │              └استعمال کرنے کیلئے پورٹ نمبر
│                 │            │
│                 │            └رابطہ کرنے کیلئے میزبان
│                 │
│                 └استعمال کرنے کے لئے ڈیٹا بیس کا نام
│
├─oci
│ │
│ │            ╔═════╗
│ └─oci:dbname=example
│              ╚╤════╝
│               ├مخصوص کیٹلوجڈ ڈیٹا بیس کا حوالہ دے سکتا ہے
│               │
│               ├ایک میزبان اور پورٹ نمبر سے رابطہ کرسکتے ہیں
│               │
│               └اگر آپ اسے استعمال کرنا چاہتے ہیں تو آپ کو Oracle دستاویزات کا حوالہ دینا چاہئے
│
├─odbc
│ │
│ │      ╔═════╗
│ └─odbc:example
│        ╚╤════╝
│         ├مخصوص کیٹلوجڈ ڈیٹا بیس کا حوالہ دے سکتا ہے
│         │
│         ├ایک میزبان اور پورٹ نمبر سے رابطہ کرسکتے ہیں
│         │
│         └اگر آپ اسے استعمال کرنا چاہتے ہیں تو آپ کو ODBC/DB2 دستاویزات کا حوالہ دینا چاہئے
│
├─pgsql
│ │
│ │            ╔═══════╗      ╔══╗        ╔═════╗
│ └─pgsql:host=localhost;port=5432;dbname=example
│              ╚╤══════╝      ╚╤═╝        ╚╤════╝
│               │              │           └استعمال کرنے کے لئے ڈیٹا بیس کا نام
│               │              │
│               │              └استعمال کرنے کیلئے پورٹ نمبر
│               │
│               └رابطہ کرنے کیلئے میزبان
│
├─sqlite
│ │
│ │        ╔════════╗
│ └─sqlite:example.db
│          ╚╤═══════╝
│           └استعمال کرنے کے لئے مقامی ڈیٹا بیس فائل کا راستہ
│
└─sqlsrv
  │
  │               ╔═══════╗ ╔══╗          ╔═════╗
  └─sqlsrv:Server=localhost,1521;Database=example
                  ╚╤══════╝ ╚╤═╝          ╚╤════╝
                   │         │             └استعمال کرنے کے لئے ڈیٹا بیس کا نام
                   │         │
                   │         └استعمال کرنے کیلئے پورٹ نمبر
                   │
                   └رابطہ کرنے کیلئے میزبان
```

<div dir="rtl">اگر آپ اپنے DSN کو تبدیل کرنے کے بارے میں یقین نہیں رکھتے ہیں تو، کچھ بھی تبدیل کیے بغیر اسے استعمال کرنے کی کوشش کریں.<br /><br /></div>

<div dir="rtl"><code dir="ltr">pdo_username</code> اور <code dir="ltr">pdo_password</code> آپ کے صارف کے نام اور پاس ورڈ کی طرح ہونا چاہئے جو آپ نے اپنے ڈیٹا بیس کے لئے منتخب کیا ہے.<br /><br /></div>

#### <div dir="rtl"><a name="AJAX_AJAJ_JSON"></a>میری اپ لوڈ کی فعالیت نہیں ہم وقت ساز (مثال کے طور پر، ajax، ajaj، json، وغیرہ استعمال کرتا ہے). اپلوڈ مسدود ہونے پر مجھے کوئی خاص پیغام یا انتباہ نظر نہیں آتا ہے. کیا ہو رہا ہے؟<br /><br /></div>

<div dir="rtl">یہ عام بات ہے. phpMussel کے معیاری "اپ لوڈ کریں تردید" کا صفحہ HTML کے بطور پیش کیا گیا ہے. عام درخواستوں کے ل یہ کافی ہونا چاہئے، لیکن اگر آپ کو زیادہ کی ضرورت ہو یہ شاید کافی نہیں ہوگا. اگر یہ ایک مسئلہ بن جاتا ہے، کچھ چیزیں ایسی ہیں جن کی آپ کوشش کرسکتے ہیں.<br /><br /></div>

<div dir="rtl"><ul>
 <li>۱. HTML کے علاوہ کسی اور چیز کی خدمت کے لئے کسٹم آؤٹ پٹ ٹیمپلیٹ تشکیل دینا.</li>
 <li>۲. معیاری "اپ لوڈ کریں تردید" صفحہ کو مکمل طور پر نظر انداز کرنے کے لئے ایک کسٹم پلگ ان بنانا اور اپ لوڈ کو روکنے پر اپ لوڈ ہینڈلر کو کچھ اور کروائیں (اپلوڈر ہینڈلر کے ذریعہ فراہم کردہ کچھ پلگ ان ہکس ہیں جو اس کے لئے مددگار ثابت ہوسکتے ہیں).</li>
 <li>۳. اپ لوڈ ہینڈلر کو مکمل طور پر غیر فعال کرنا اور اس کے بجائے آپ کی اپ لوڈ فعالیت میں phpMussel API کو کال کرنا.</li>
</ul></div>

---


### <div dir="rtl">۱۱. <a name="SECTION11">قانونی معلومات</div>

#### <div dir="rtl">۱۱.۰ سیکشن پریامبل<br /><br /></div>

<div dir="rtl">دستاویزات کا یہ حصہ پیکج کے استعمال اور عمل کے بارے میں ممکنہ قانونی مفکوم بیان کرتا ہے، اور کچھ بنیادی متعلق معلومات فراہم کرتی ہے. بعض صارفین کے لئے شکایت کا یقین کرنے کے لئے یہ ممکن ہو سکتا ہے کہ وہ کسی بھی قانونی تقاضے کے ساتھ موجود ممالک میں موجود ہوسکتے ہیں جس میں وہ کام کرتے ہیں، اور کچھ صارفین اس کی معلومات کے مطابق اپنی ویب سائٹ کی پالیسیوں کو ایڈجسٹ کرنے کی ضرورت ہوسکتی ہے.<br /><br /></div>

<div dir="rtl">سب سے پہلے، سب سے اہم، یاد رکھیں کہ میں (پیکیج کا مصنف) ایک وکیل نہیں ہوں. لہذا، میں قانونی مشورہ فراہم کرنے کے لئے قانونی طور پر قابل نہیں ہوں. اس کے علاوہ، کچھ معاملات میں، قانونی ضروریات مختلف ممالک اور دائرہ کاروں کے درمیان مختلف ہوتی ہیں. یہ مختلف قانونی ضروریات کبھی کبھی متفق ہیں (مثلا، ایسے ممالک جو "رازداری کے حقوق" اور "بھول جانے کا حق"، ایسے ممالک کے مقابلے میں جو "ڈیٹا برقرار رکھنے" کا حق رکھتے ہیں). یہ بھی غور کریں کہ پیکیج تک رسائی مخصوص ممالک یا دائرہ کاروں سے محدود نہیں ہے, اور اس وجہ سے، پیکج کے صارفین جغرافیایی متنوع ہونے کا امکان رکھتے ہیں. ان پوائنٹس پر غور کیا گیا ہے، میں ایسی حیثیت میں نہیں ہوں جو یہ سب کے لئے "قانونی طور پر مطابق" ہونے کا مطلب ہے. تاہم، مجھے امید ہے کہ اس معلومات میں آپ کو یہ فیصلہ کرنے میں مدد ملتی ہے کہ پیکج کے تناظر میں قانونی طور پر مطابق رہنے کے لۓ آپ کو کیا کرنا ہوگا. اگر آپ کو کوئی شبہ ہے، یا اگر آپ کو قانونی نقطہ نظر سے اضافی مدد اور مشورہ کی ضرورت ہو تو، میں ایک قانونی پیشہ ورانہ مشاورت کی سفارش کروں گا.<br /><br /></div>

#### <div dir="rtl">۱۱.۱ ذمہ داری<br /><br /></div>

<div dir="rtl">پیکج کسی بھی وارنٹی کے ساتھ فراہم نہیں کی جاتی ہے (لائسنس پہلے ہی اس کا ذکر کرتا ہے). یہ ذمہ داری کے تمام مقاصد پر لاگو ہوتا ہے. پیکج آپ کی سہولت کے لئے فراہم کی جاتی ہے. امید ہے کہ یہ مفید ہو گا، اور یہ آپ کے لئے کچھ فائدہ فراہم کرے گا. تاہم، پیکج کا استعمال کرتے ہوئے یا لاگو آپ کا اپنا فیصلہ ہے. آپ اسے استعمال کرنے یا اسے لاگو کرنے پر مجبور نہیں ہوئے ہیں. جب آپ ایسا کرتے ہو تو، آپ اس فیصلے کے ذمہ دار ہیں. میں اور دوسرا پیکج شراکت دار، آپ کے فیصلوں کے نتائج کے لئے قانونی طور پر ذمہ دار نہیں ہے.<br /><br /></div>

#### <div dir="rtl">۱۱.۲ تیسرے فریقوں<br /><br /></div>

<div dir="rtl">اس پیکیج پر منحصر ہے کہ کس طرح پیکج ترتیب اور لاگو ہوتا ہے، کچھ صورتو میں، یہ تیسری جماعتوں کے ساتھ معلومات کا اشتراک کرسکتا ہے. کچھ قواعد و ضوابط میں، کچھ دائرہ کار کی طرف سے، یہ "ذاتی طور پر شناختی معلومات" کے طور پر بیان کیا جا سکتا ہے.<br /><br /></div>

<div dir="rtl">تیسری جماعتوں کی طرف سے یہ معلومات کس طرح استعمال کی جاتی ہے، ان کی پالیسیوں کے تابع ہے، اور اس دستاویزات کے دائمے سے باہر ہے. تاہم، اس طرح کے معاملات میں، معلومات کا اشتراک معذور ہوسکتا ہے. اس طرح کے معاملات میں، اگر آپ اسے چالو کرنے کا انتخاب کرتے ہیں تو، یہ آپ کی ذمہ داری ہے کہ آپ کو ان خدشات کے بارے میں معلومات کی رازداری، سیکورٹی اور استعمال کے بارے میں کوئی خدشات کی تحقیقات کی جا سکتی ہے. اگر کوئی شبہ موجود ہے، یا اگر آپ ان تیسری جماعتوں کے انعقاد سے ناخوش ہیں تو، ان تیسری جماعتوں کے ساتھ معلومات کے تمام حصول کو غیر فعال کرنے میں یہ سب سے بہتر ہوسکتا ہے.<br /><br /></div>

<div dir="rtl">شفافیت کے مقصد کے لئے، مشترکہ معلومات کی قسم ذیل میں بیان کی گئی ہے.<br /><br /></div>

##### <div dir="rtl">۱۱.۲.۱ URL سکینر<br /><br /></div>

<div dir="rtl">فائل اپ لوڈوں کے اندر پایا URL <code dir="ltr">Google Safe Browsing API</code> کے ساتھ اشتراک کیا جا سکتا ہے، اس سلسلے پر منحصر ہے کہ کس طرح پیکج کو ترتیب دیا گیا ہے.<br /><br /></div>

<div dir="rtl">متعلقہ ترتیب ہدایات:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">google_api_key</code> &lt;- <code dir="ltr">urlscanner</code></li>
</ul></div>

##### <div dir="rtl">۱۱.۲.۲ VIRUS TOTAL<br /><br /></div>

<div dir="rtl">جب phpMussel فائل فائل اپ لوڈ کرتا ہے، ان فائلوں کے ہیس کو Virus Total API کے ساتھ اشتراک کیا جاسکتا ہے، اس پر منحصر ہے کہ کس طرح پیکج کو تشکیل دیا گیا ہے. مستقبل میں کچھ عرصے سے پوری فائلوں کو بھی اشتراک کرنے کے قابل ہونے کا منصوبہ موجود ہے، لیکن اس خصوصیت اس وقت پیکج کے ذریعہ معاون نہیں ہے. اس خصوصیت کو استعمال کرنے کے لئے API کی کلید کی ضرورت ہے.<br /><br /></div>

<div dir="rtl">معلومات Virus Total کے ساتھ اشتراک کیا جا سکتا ہے، تحقیق کے مقاصد کے لۓ ان کے شراکت دار، ملحقہ، اور دیگر دیگر کے ساتھ بھی اشتراک کیا جا سکتا ہے. یہ ان کی رازداری کی پالیسی کی طرف سے مزید تفصیل میں بیان کی گئی ہے.<br /><br /></div>

<div dir="rtl">دیکھیں: <a dir="ltr" href="https://support.virustotal.com/hc/en-us/articles/115002168385-Privacy-Policy">Privacy Policy &ndash; VirusTotal</a>.<br /><br /></div>

<div dir="rtl">متعلقہ ترتیب ہدایات:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">vt_public_api_key</code> &lt;- <code dir="ltr">virustotal</code></li>
</ul></div>

#### <div dir="rtl">۱۱.۳ لاگ<br /><br /></div>

<div dir="rtl">لاگنگ کئی وجوہات کے لئے phpMussel کا ایک اہم حصہ ہے. اس کے بغیر، غلطیوں کو تلاش کرنے اور مسائل کی تشخیص مشکل ہوسکتی ہے. اگر ہمارے پاس یہ معلومات نہیں ہے اور کسی چیز کو تبدیل کرنے کی ضرورت ہے، یہ جاننا مشکل ہوسکتا ہے کہ بالکل وہی چیز جو تبدیل کرنے کی ضرورت ہے. اس کے باوجود، ہر کوئی اس معلومات کو ریکارڈ نہیں کرنا چاہتا، لہذا یہ اختیاری رہتا ہے. phpMussel میں، یہ ڈیفالٹ کی طرف سے معذور ہے. اسے فعال کرنے کے لئے، phpMussel کے مطابق ترتیب دیا جانا چاہئے.<br /><br /></div>

<div dir="rtl">یہ یاد رکھنا چاہیے کہ لاگنگ کے لئے عین مطابق قانونی ضروریات دائرہ کاروں کے درمیان مختلف ہو سکتی ہیں. عملدرآمد کا تناظر بھی متعلقہ ہو سکتا ہے (مثال کے طور پر، ایک فرد کے طور پر، ایک کارپوریٹ ادارے کے طور پر، تجارتی بنیاد پر، غیر تجارتی بنیاد پر، وغیرہ). اس کی وجہ سے، یہاں کی معلومات آپ کے لئے مفید ہوسکتی ہے.<br /><br /></div>

<div dir="rtl">بہت سے مختلف قسم کی معلومات درج کی جا سکتی ہیں، مختلف وجوہات کے لئے.<br /><br /></div>

##### <div dir="rtl">۱۱.۳.۰ اسکین لاگ<br /><br /></div>

<div dir="rtl">پیکیج ترتیب میں فعال ہونے پر، phpMussel فائلوں کے لاگ رکھتا ہے اسے اسکین کرتا ہے. یہ دو مختلف فارمیٹس میں دستیاب ہے:<br /></div>
<div dir="rtl"><ul>
 <li>لاگ جو انسان کی طرف سے پڑھ سکتے ہیں.</li>
 <li>سیریلائزڈ لاگ.</li>
</ul></div>

<div dir="rtl">فائلوں میں ڈیٹا جو انسان کی طرف سے پڑھ سکتے ہیں، عام طور پر اس طرح لگ رہا ہے (ایک مثال کے طور):<br /><br /></div>

```
Sun, 19 Jul 2020 13:33:31 +0800 شروع.
→ "ascii_standard_testfile.txt" چیک کر رہا ہے.
─→ کے پتہ phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
Sun, 19 Jul 2020 13:33:31 +0800 ختم.
```

<div dir="rtl">اسکین لاگ ان عام طور پر مندرجہ ذیل معلومات شامل ہیں:<br /></div>
<div dir="rtl"><ul>
 <li>فائل اور تاریخ جس کا فائل اسکین کیا گیا تھا.</li>
 <li>اس فائل کا نام اسکین کیا گیا تھا.</li>
 <li>فائل میں کیا پتہ چلا تھا (اگر کچھ پتہ چلا).</li>
</ul></div>

<div dir="rtl">متعلقہ ترتیب ہدایات:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">scan_log</code> &lt;- <code dir="ltr">general</code></li>
 <li><code dir="ltr">scan_log_serialized</code> &lt;- <code dir="ltr">general</code></li>
</ul></div>

<div dir="rtl">جب یہ ہدایات خالی رہیں تو، اس قسم کی ریکارڈنگ غیر فعال رہیں گے.<br /><br /></div>

##### <div dir="rtl">۱۱.۳.۱ اپ لوڈ لاگ<br /><br /></div>

<div dir="rtl">کی ترتیب فعال ہونے پر، phpMussel اپ لوڈ کی ریکارڈز کو برقرار رکھتا ہے جو بلاک کردی گئی ہیں.<br /><br /></div>

<div dir="rtl">ایک مثال کے طور:<br /><br /></div>

<pre dir="rtl">
تاریخ: <code dir="ltr">Sun, 19 Jul 2020 13:33:31 +0800</code>
IP پتہ: <code dir="ltr">127.0.0.x</code>
== اسکین کے نتائج (پرچم کیوں) ==
کے پتہ <code dir="ltr">phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)</code>!
== ہش کا دستخط دوبارہ تعمیر ==
<code dir="ltr">dcacac499064454218823fbabff7e09b5b011c0c877ee6f215f35bffb195b6e9:654:ascii_standard_testfile.txt</code>
یہ طور قرنطینہ میں "<code dir="ltr">1595142388-2e017ea9ac1478e45dc15794a1fc18c0.qfu</code>" کے.
</pre>

<div dir="rtl">بلاک شدہ اپ لوڈس کے بارے میں معلومات عام طور پر شامل ہیں:<br /></div>
<div dir="rtl"><ul>
 <li>اپ لوڈ کردہ تاریخ اور وقت.</li>
 <li>IP ایڈریس جہاں اپ لوڈ سے پیدا ہوا ہے.</li>
 <li>فائل کیوں بلاک ہوگئی تھی (پتہ لگانا ہوئی).</li>
 <li>اس فائل کا نام جو بلاک کیا گیا تھا.</li>
 <li>فائل مسدود ہوگئی کے لئے چیک اور سائز.</li>
 <li>الگ تھلگ؟ کیا نام استعمال کیا؟</li>
</ul></div>

<div dir="rtl">متعلقہ ترتیب ہدایات:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">uploads_log</code> &lt;- <code dir="ltr">web</code></li>
</ul></div>

##### <div dir="rtl">۱۱.۳.۲ سامنے کے آخر لاگ<br /><br /></div>

<div dir="rtl">یہ سامنے کے آخر میں لاگ ان کرنے کی کوشش کرنے سے متعلق ہے. جب سامنے کے آخر میں رسائی کو فعال کیا جاتا ہے، جب صارف کو سامنے کے آخر میں لاگ ان کرنے کی کوشش ہوتی ہے، تو ریکارڈ کیا جاتا ہے.<br /><br /></div>

<div dir="rtl">اس ریکارڈ میں صارف کے IP ایڈریس، تاریخ اور وقت اور اس کے نتائج شامل ہیں (کامیاب یا ناکامی). یہ عام طور پر اس طرح کچھ نظر آتا ہے:<br /><br /></div>

```
x.x.x.x - Day, dd Mon 20xx hh:ii:ss +0000 - "admin" - لاگ ان.
```

<div dir="rtl">متعلقہ ترتیب ہدایات:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">frontend_log</code> &lt;- <code dir="ltr">general</code></li>
</ul></div>

##### <div dir="rtl">۱۱.۳.۳ لاگ گھومنے<br /><br /></div>

<div dir="rtl">آپ چاہتے ہیں، یا قانونی طور پر ہو سکتا ہے، کچھ وقت کے بعد لاگ ان کو صاف کرنے کے لئے (کتنی دیر تک آپ لاگ ان کو برقرار رکھ سکتے ہیں قانون کی طرف سے محدود ہوسکتے ہیں). یہ لاگ ان کے مطابق لاگ ان کی ترتیب میں تاریخ/وقت مارکر مقرر کرنے کی طرف سے کیا جا سکتا ہے (مثال کے طور پر، <code dir="ltr">{yyyy}-{mm}-{dd}.log</code>)، اور پھر لاگ گرد گھومنے کو چالو کرنے (لاگ گرد کی گردش آپ کو لاگ ان کی حد سے زیادہ حد تک زیادہ سے زیادہ لاگ ان پر لاگو کرنے کی اجازت دیتا ہے).<br /><br /></div>

<div dir="rtl">مثال کے طور پر: اگر مجھے 30 دنوں کے بعد لاگز کو خارج کرنے کی ضرورت ہوتی ہے تو میں <code dir="ltr">{dd}.log</code> اپنے لاگ ان کے نام میں ڈال سکتا ہوں (<code dir="ltr">{dd}</code> دن کی نمائندگی کرتا ہے)، <code dir="ltr">log_rotation_limit</code> کو 30 مقرر کریں، اور <code dir="ltr">log_rotation_action</code> کو <code dir="ltr">Delete</code> مقرر کریں.<br /><br /></div>

<div dir="rtl">اگر آپ کو کچھ وقت کے لئے ریکارڈ رکھنے کی ضرورت ہے تو، آپ کو لاگ گرد گھومنے کا استعمال نہ کرنے کا انتخاب کرسکتے ہیں، یا آپ <code dir="ltr">log_rotation_action</code> کی قدر <code dir="ltr">Archive</code> پر مقرر کر سکتے ہیں (اس ریکارڈ کو کمپیکٹ کریں گے، اس طرح ڈسک کے استعمال کو کم کرنا ہوگا).<br /><br /></div>

<div dir="rtl">متعلقہ ترتیب ہدایات:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">log_rotation_limit</code> &lt;- <code dir="ltr">general</code></li>
 <li><code dir="ltr">log_rotation_action</code> &lt;- <code dir="ltr">general</code></li>
</ul></div>

##### <div dir="rtl">۱۱.۳.۴ ٹرنک لاگ<br /><br /></div>

<div dir="rtl">اگر آپ چاہتے ہیں تو، آپ انفرادی ریکارڈز کو چھوٹ سکتے ہیں جب وہ مخصوص سائز سے کہیں زیادہ ہیں.<br /><br /></div>

<div dir="rtl">متعلقہ ترتیب ہدایات:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">truncate</code> &lt;- <code dir="ltr">general</code></li>
</ul></div>

##### <div dir="rtl">۱۱.۳.۵ IP ایڈریس PSEUDONYMISATION<br /><br /></div>

<div dir="rtl">سب سے پہلے، اگر آپ اصطلاح سے واقف نہیں ہیں، "pseudonymisation" ذاتی اعداد و شمار کی پروسیسنگ سے مراد اس طرح سے ہے کہ یہ کسی بھی مخصوص شخص کو بغیر کسی ضمنی معلومات کی نشاندہی نہیں کی جاسکتی ہے، فراہم کی جاتی ہے کہ اس طرح کی اضافی معلومات علیحدہ طریقے سے برقرار رکھی جاتی ہے اور تکنیکی اور تنظیمی تدابیر کے تابع ہوتے ہیں اس بات کو یقینی بنانے کے لئے کہ ذاتی ڈیٹا کسی قدرتی شخص کو نشاندہی نہیں کی جاسکتی ہے.<br /><br /></div>

<div dir="rtl">مندرجہ ذیل وسائل اس سے مزید تفصیل میں وضاحت کرنے میں مدد کرسکتے ہیں:</div>
<div dir="rtl"><ul>
 <li><a dir="ltr" href="https://www.trust-hub.com/news/what-is-pseudonymisation/">[trust-hub.com] What is pseudonymisation?</a></li>
 <li><a dir="ltr" href="https://en.wikipedia.org/wiki/Pseudonymization">[Wikipedia] Pseudonymization</a></li>
</ul></div>

<div dir="rtl">کچھ حالات میں، آپ کو کسی بھی PII جمع، عملدرآمد، یا ذخیرہ کرنے کے لئے "anonymisation" یا "pseudonymisation" کو لاگو کرنا قانونی طور پر ضروری ہوسکتا ہے. یہ تصور ابھی کچھ وقت تک وجود میں آیا ہے، لیکن GDPR/DSGVO خاص طور پر "pseudonymisation" کا ذکر اور حوصلہ افزائی کرتا ہے.<br /><br /></div>

<div dir="rtl">اگر آپ چاہتے ہیں تو، phpMussel لاگ ان کرتے وقت لاگ ان کرتے وقت IP پتے کے لئے یہ کر سکتے ہیں. جب لکھنا لکھنا، IPv4 پتے کے آخری آکٹیٹ اور IPv6 پتے کے دوسرے حصے کے بعد سب کچھ، "x" کی طرف سے نمائندگی کی جائے گی.<br /><br /></div>

<div dir="rtl">متعلقہ ترتیب ہدایات:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">pseudonymise_ip_addresses</code> &lt;- <code dir="ltr">legal</code></li>
</ul></div>

##### <div dir="rtl">۱۱.۳.۶ اعداد و شمار<br /><br /></div>

<div dir="rtl">phpMussel اعداد و شمار کو ٹریک کر سکتے ہیں، جیسے کہ ایک خاص وقت سے کتنے فائلوں کو سکینڈ اور بند کر دیا گیا ہے. یہ خصوصیت ڈیفالٹ کے ذریعہ غیر فعال ہے، لیکن پیکیج کی ترتیب کے ذریعے فعال کیا جا سکتا ہے. ٹریک کردہ معلومات کی قسم PII کے طور پر نہیں جانا چاہئے.<br /><br /></div>

<div dir="rtl">متعلقہ ترتیب ہدایات:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">statistics</code> &lt;- <code dir="ltr">general</code></li>
</ul></div>

##### <div dir="rtl">۱۱.۳.۷ خفیہ کاری<br /><br /></div>

<div dir="rtl">phpMussel اس کے لاگ ان یا کیش کو خفیہ نہیں کرتا. یہ مستقبل میں متعارف کرایا جا سکتا ہے، لیکن فی الحال اس کی کوئی مخصوص منصوبہ نہیں ہے. اگر آپ غیر قانونی شدہ تیسری جماعتوں کے بارے میں فکر مند ہیں تو phpMussel میں حساس معلومات تک رسائی حاصل ہے، میں سفارش کرتا ہوں کہ عام طور پر قابل رسائی مقام پر phpMussel انسٹال نہیں کیا جائے گا (مثال کے طور پر، <code dir="ltr">public_html</code> میں انسٹال نہ کریں) اور اس بات کو یقینی بنائیں کہ مناسب حد تک محدود پابندیوں کو نافذ کیا جائے. اگر یہ آپ کے خدشات کو حل کرنے کے لئے کافی نہیں ہے تو پھر phpMussel کو ترتیب دیں تاکہ حساس معلومات جمع نہیں کی جائے گی (جیسے جیسے، لاگ ان کو غیر فعال کرکے).<br /><br /></div>

#### <div dir="rtl">۱۱.۴ کوکی<br /><br /></div>

<div dir="rtl">صارف کو سامنے کے آخر میں لاگ ان ہونے پر phpMussel ایک کوکی سیٹ کرتا ہے (تصدیق کے مقاصد کے لئے). لاگ ان کے صفحے پر، صارف کو خبردار کیا جاتا ہے کہ اگر وہ صفحہ مشغول ہوجائے تو ایک کوکی پیدا کی جائے گی. کوکیز کہیں اور نہیں بنائے جاتے ہیں.<br /><br /></div>

<div dir="rtl">متعلقہ ترتیب ہدایات:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">disable_frontend</code> &lt;- <code dir="ltr">general</code></li>
</ul></div>

#### <div dir="rtl">۱۱.۵ مارکیٹنگ اور اشتہارات<br /><br /></div>

<div dir="rtl">phpMussel مارکیٹنگ یا اشتہارات کے مقاصد کے لئے کسی بھی معلومات جمع یا عمل نہیں کرتا ہے. یہ کسی جمع کردہ یا لاگ ان معلومات سے کوئی فائدہ نہیں فروخت کرتا ہے. phpMussel ایک تجارتی ادارہ نہیں ہے، اور کسی بھی تجارتی مفادات سے متعلق نہیں ہے، لہذا ان کاموں کو کوئی احساس نہیں ہوگا. اس منصوبے کی شروعات کے بعد یہ معاملہ رہا ہے، اور آج ہی مقدمہ جاری ہے.<br /><br /></div>

#### <div dir="rtl">۱۱.۶ رازداری کی پالیسی<br /><br /></div>

<div dir="rtl">بعض اوقات آپ کو قانون کی طرف سے آپ کی ویب سائٹ پر اپنی جگہ پر اپنی رازداری کی پالیسی پر ایک لنک ظاہر کرنے کی ضرورت ہوسکتی ہے. اس بات کو یقینی بنانے کیلئے صارفین کو آپ کی رازداری کے طریقوں کے بارے میں مطلع کیا جاسکتا ہے، جو آپ جمع کرتے ہیں، اور آپ اس معلومات کے ساتھ کیا کرتے ہیں. phpMussel کے "اپ لوڈ کریں تردید" کے صفحے پر اس لنک کو شامل کرنے کے قابل ہونے کے لۓ، آپ کی رازداری کی پالیسی کے ایڈریس کی وضاحت کرنے کے لئے ایک ترتیب کا اختیار فراہم کیا جاتا ہے.<br /><br /></div>

<div dir="rtl">متعلقہ ترتیب ہدایات:<br /></div>
<div dir="rtl"><ul>
 <li><code dir="ltr">privacy_policy</code> &lt;- <code dir="ltr">legal</code></li>
</ul></div>

#### <div dir="rtl">۱۱.۷ GDPR/DSGVO<br /><br /></div>

<div dir="rtl">GDPR یورپی یونین کا ایک ضابطہ ہے جو 25 مئی، 2018 تک اثر انداز ہوتا ہے. ریگولیشن کا بنیادی مقصد یہ ہے کہ یورپی یونین کے شہریوں اور باشندوں کو ان کے اپنے ذاتی ڈیٹا سے متعلق قابو پانے، اور پرائیویٹ اور ذاتی ڈیٹا کے بارے میں یورپی یونین کے اندر ریگولیشن کو متحد کرنا.<br /><br /></div>

<div dir="rtl">ریگولیشن کسی بھی EU کے "اعداد و شمار کے مضامین" (کسی بھی شناخت یا شناختی قدرتی شخص) کے "ذاتی طور پر شناختی معلومات" کی پروسیسنگ سے متعلق مخصوص اجزاء پر مشتمل ہے. تعمیل کرنے کے لئے، کمپنیوں، عمل، اور متعلقہ نظام، "ڈیزائن کی طرف سے رازداری" کو لاگو کرنا لازمی ہے، سب سے زیادہ ممکن راز رازداری کی ترتیبات کا استعمال کرنا ضروری ہے، کسی ذخیرہ یا پروسیسنگ معلومات کے لئے حفاظتی انتظامات کو لاگو کرنا ضروری ہے (بشمول، لیکن تک محدود نہیں، "pseudonymisation" اور "anonymisation")، واضح طور پر ان اعداد و شمار کی اقسام کا اعلان کرنا چاہیے جو وہ جمع کرتے ہیں، وہ کس طرح کے سببوں کے لئے، اس کے عمل کو کس طرح، وہ کتنی عرصے تک اسے برقرار رکھتی ہیں، اور اگر وہ اس ڈیٹا کو کسی بھی تیسری پارٹی کے ساتھ شریک کریں، اعداد و شمار کی اقسام، کیسے، کیوں، اور اسی طرح کی اقسام.<br /><br /></div>

<div dir="rtl">اعداد و شمار پر عملدرآمد نہیں کیا جاسکتا جب تک کہ ایسا کرنے کے لئے قانونی بنیاد نہ ہو، قواعد و ضوابط کے مطابق. عام طور پر، اس کا مطلب یہ ہے کہ یہ قانونی ذمہ داریوں کے مطابق ہونا ضروری ہے، اور صرف واضح ہونے کے بعد، اچھی طرح سے مطلع رضامندی کے اعداد و شمار سے حاصل کی گئی ہے.<br /><br /></div>

<div dir="rtl">وقت میں، قوانین تبدیل کر سکتے ہیں. لہذا، پرانے معلومات کو پھیلانے سے بچنے کے لۓ، یہ مستند ذریعہ سے سیکھنا بہتر ہوگا. اگر میں براہ راست یہاں معلومات شامل ہوں تو، یہ تاریخ سے باہر ہوسکتا ہے.<br /><br /></div>

<div dir="rtl">مزید معلومات سیکھنے کے لئے کچھ سفارش کردہ وسائل:<br /></div>
<div dir="rtl"><ul>
 <li><a href="https://ur.wikipedia.org/wiki/%D8%AC%D9%86%D8%B1%D9%84_%DA%88%DB%8C%D9%B9%D8%A7_%D9%BE%D8%B1%D9%88%D9%B9%DB%8C%DA%A9%D8%B4%D9%86_%D8%B1%DB%8C%DA%AF%D9%88%D9%84%DB%8C%D8%B4%D9%86">جنرل ڈیٹا پروٹیکشن ریگولیشن</a></li>
 <li><a href="https://eur-lex.europa.eu/legal-content/EN/TXT/?uri=celex:32016R0679">REGULATION (EU) 2016/679 OF THE EUROPEAN PARLIAMENT AND OF THE COUNCIL</a></li>
</ul></div>

---


<div dir="rtl">آخری تازہ کاری: 21 جولائی 2020 (2020.07.21).</div>
