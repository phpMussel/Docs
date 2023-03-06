## Tài liệu của phpMussel v3 (Tiếng Việt).

### Nội dung
- 1. [LỜI GIỚI THIỆU](#user-content-SECTION1)
- 2. [CÁCH CÀI ĐẶT](#user-content-SECTION2)
- 3. [CÁCH SỬ DỤNG](#user-content-SECTION3)
- 4. [MỞ RỘNG PHPMUSSEL](#user-content-SECTION4)
- 5. [TÙY CHỌN CHO CẤU HÌNH](#user-content-SECTION5)
- 6. [ĐỊNH DẠNG CỦA CHỬ KÝ](#user-content-SECTION6)
- 7. [NHỮNG VẤN ĐỀ HỢP TƯƠNG TÍCH](#user-content-SECTION7)
- 8. [NHỮNG CÂU HỎI THƯỜNG GẶP (FAQ)](#user-content-SECTION8)
- 9. [THÔNG TIN HỢP PHÁP](#user-content-SECTION9)

*Regarding translations: My native language is English. Because this is a free and open-source hobby project which generates zero income, and translatable content is likely to change as the features and functionality supported by the project changes, it doesn't make sense for me to spend money for translations. Because I'm the sole author/developer/maintainer for the project and I'm not a ployglot, any translations I produce are very likely to contain errors. Sorry, but realistically, that won't ever change. If you find any such errors/typos/mistakes/etc, your assistance to correct them would be very much appreciated. Pull requests are invited and encouraged. Otherwise, if you find these errors too much to handle, just stick with the original English source. If a translation is irredeemably incomprehensible, let me know which, and I can delete it. If you're not sure how to perform pull requests, ask. I can help.*

---


### 1. <a name="SECTION1"></a>LỜI GIỚI THIỆU

Cảm ơn bạn đã chọn phpMussel, một loại bản PHP được thiết kế để phát hiện trojan, vi rút, phần mềm đọc hại và những gì có thể gây nguy hiểm trong những các tập tin tài lên trên máy của bạn. Bất cứ nơi nào mà bản đã được nối, dưa trên chử ký của ClamAV và những người khác.

BẢN QUYỀN [PHPMUSSEL](https://phpmussel.github.io/) 2013 và hơn GNU/GPLv2 by [Caleb M (Maikuolan)](https://github.com/Maikuolan).

Bản này là chương trình miễn phí; bạn có thể phân phối lại hoạc sửa đổi dưới điều kiện của GNU Giấy Phép Công Cộng xuất bản bởi Free Software Foundation; một trong giấy phép phần hai, hoạc (tùy theo sự lựa chọn của bạn) bất kỳ phiên bản nào sau này. Bản này được phân phối với hy vọng rằng nó sẽ có hữu ích, nhưng mà KHÔNG CÓ BẢO HÀNH; ngay cả những bảo đảm ngụ ý KHẢ NĂNG BÁN HÀNG hoạc PHÙ HỢP VỚI MỤC ĐÍT VÀO. Hảy xem GNU Giấy Phép Công Cộng để biết them chi tiết, nằm trong tập tin `LICENSE.txt`, và kho chứa của tập tin này có thể tiềm đước tại:
- <https://www.gnu.org/licenses/>.
- <https://opensource.org/licenses/>.

Chân thành cám ơn [ClamAV](https://www.clamav.net/) cho nguồn cảm hứng cho chương trình này, và cho những chữ ký mà kịch bản này sử dụng, mà nếu không, kịch bản này sẽ không có cơ hội tồn tại, hoặc ít nhất, sẽ có giá trị rất nhỏ.

Chân thành cám ơn GitHub và Bitbucket cho cung cấp một nơi cho các tập tin dự án, và những người cung cấp một số các chữ ký thêm mà được sử dụng bởi phpMussel: [PhishTank](https://www.phishtank.com/), [NLNetLabs](https://nlnetlabs.nl/), [Malware.Expert](https://malware.expert/) vân vân, và chân thành cảm ơn những người đã ủng hộ chương trình này, và bất cứ ai khác mà tôi quên cảm ơn, và bạn, đã sử dụng bản này.

---


### 2. <a name="SECTION2"></a>CÁCH CÀI ĐẶT

#### 2.0 CÀI ĐẶT VỚI COMPOSER

Cách được khuyến khích để cài đặt phpMussel v3 là thông qua Composer.

Để thuận tiện, bạn có thể cài đặt các phụ thuộc cho phpMussel cần thiết nhất thông qua kho lưu trữ phpMussel chính cũ:

`composer require phpmussel/phpmussel`

Nếu không thì, bạn có thể chọn riêng những phụ thuộc mà bạn cần. Hoàn toàn có thể bạn sẽ chỉ muốn phụ thuộc cụ thể và sẽ không cần mọi thứ.

Để làm bất cứ điều gì với phpMussel, bạn sẽ cần cơ sở mã phpMussel lõi:

`composer require phpmussel/core`

Cung cấp giao diện quản trị cho phpMussel:

`composer require phpmussel/frontend`

Cung cấp quét tập tin tải lên tự động cho trang web của bạn:

`composer require phpmussel/web`

Cung cấp khả năng sử dụng phpMussel như một ứng dụng chế độ CLI tương tác:

`composer require phpmussel/cli`

Cung cấp một cầu nối giữa phpMussel và PHPMailer, cho phép phpMussel sử dụng PHPMailer để xác thực hai yếu tố, thông báo qua email về việc tập tin tải lên bị chặn, vv:

`composer require phpmussel/phpmailer`

Để phpMussel có thể phát hiện bất cứ điều gì, bạn sẽ cần cài đặt chữ ký. Không có một gói cụ thể cho điều đó. Để cài đặt chữ ký, tham khảo phần tiếp theo của tài liệu này.

Nếu không thì, nếu bạn không muốn sử dụng Composer, bạn có thể tải xuống các tập tin ZIP đóng gói sẵn từ đây:

https://github.com/phpMussel/Examples

Các ZIP được đóng gói sẵn bao gồm tất cả các phụ thuộc đã nói ở trên, cũng như tất cả các tập tin chữ ký phpMussel tiêu chuẩn, cùng với một số ví dụ được cung cấp cho cách sử dụng phpMussel.

#### <a name="INSTALLING_SIGNATURES"></a>2.1 CÀI ĐẶT CHỮ KÝ

Chữ ký được yêu cầu bởi phpMussel để phát hiện các mối đe dọa cụ thể. Có 2 phương pháp chính để cài đặt chữ ký:

1. Tạo chữ ký bằng cách sử dụng "SigTool" và cài đặt thủ công.
2. Tải xuống chữ ký từ "phpMussel/Signatures" hoặc "phpMussel/Examples" và cài đặt thủ công.

##### 2.1.0 Tạo chữ ký bằng cách sử dụng "SigTool" và cài đặt thủ công.

*Xem: [Tài liệu SigTool](https://github.com/phpMussel/SigTool#documentation).*

*Cũng lưu ý: SigTool chỉ xử lý chữ ký từ ClamAV. Để có được chữ ký từ các nguồn khác, chẳng hạn như các chữ ký được viết riêng cho phpMussel, bao gồm các chữ ký cần thiết để phát hiện các mẫu thử nghiệm của phpMussel, phương pháp này sẽ cần được bổ sung bằng một trong các phương pháp khác được đề cập ở đây.*

##### 2.1.1 Tải xuống chữ ký từ "phpMussel/Signatures" hoặc "phpMussel/Examples" và cài đặt thủ công.

Thứ nhất, đi đến [phpMussel/Signatures](https://github.com/phpMussel/Signatures). Kho chứa các tập tin chữ ký nén GZ khác nhau. tải về các tập tin mà bạn cần, giải nén chúng, và sao chép chúng vào thư mục chữ ký của bản cài đặt của bạn.

Như một sự thay thế, tải xuống ZIP gần đây nhất từ [phpMussel/Examples](https://github.com/phpMussel/Examples). Sau đó, bạn có thể sao chép và dán chữ ký từ kho lưu trữ đó vào bản cài đặt của mình.

---


### 3. <a name="SECTION3"></a>CÁCH SỬ DỤNG

#### 3.0 ĐỂ CẤU HÌNH PHPMUSSEL

Sau khi cài đặt phpMussel, bạn sẽ cần một tập tin cấu hình để bạn có thể định cấu hình nó. Các tập tin cấu hình phpMussel có thể được định dạng là các tập tin INI hoặc YML. Nếu bạn đang làm việc từ một trong các ZIP mẫu, bạn sẽ có sẵn hai tập tin cấu hình ví dụ, `phpmussel.ini` và `phpmussel.yml`; bạn có thể chọn một trong số đó để làm việc, nếu bạn muốn. Nếu bạn không làm việc từ một trong các ZIP mẫu, bạn sẽ cần tạo một tập tin mới.

Nếu bạn hài lòng với cấu hình mặc định cho phpMussel và không muốn thay đổi bất cứ điều gì, bạn có thể sử dụng một tập tin trống làm tập tin cấu hình của mình. Bất cứ điều gì không được cấu hình bởi tập tin cấu hình của bạn sẽ sử dụng mặc định của nó, vì vậy bạn chỉ cần cấu hình rõ ràng một cái gì đó nếu bạn muốn nó khác với mặc định của nó (có nghĩa là, một tập tin cấu hình trống sẽ khiến phpMussel sử dụng tất cả cấu hình mặc định của nó).

Nếu bạn muốn sử dụng giao diện người dùng phpMussel, bạn có thể định cấu hình mọi thứ từ trang cấu hình giao diện người dùng. Nhưng, kể từ v3 trở đi, thông tin đăng nhập giao diện người dùng được lưu trữ trong tập tin cấu hình của bạn, vì vậy, để đăng nhập vào giao diện người dùng, ít nhất bạn sẽ cần định cấu hình tài khoản để sử dụng để đăng nhập, và sau đó, từ đó, bạn sẽ có thể đăng nhập và sử dụng trang cấu hình giao diện người dùng để định cấu hình mọi thứ khác.

Các trích đoạn dưới đây sẽ thêm một tài khoản mới vào giao diện người dùng với tên người dùng "admin" và mật khẩu "password".

Đối với các tập tin INI:

```INI
[user.admin]
password='$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK'
permissions='1'
```

Đối với các tập tin YML:

```YAML
user.admin:
 password: "$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK"
 permissions: 1
```

Bạn có thể đặt tên cho cấu hình của bạn bất cứ điều gì bạn muốn (miễn là bạn giữ lại phần mở rộng của nó, để phpMussel biết nó sử dụng định dạng nào), và bạn có thể lưu trữ nó bất cứ nơi nào bạn muốn. Bạn có thể cho phpMussel biết nơi tìm tập tin cấu hình của bạn bằng cách cung cấp đường dẫn của nó khi khởi tạo loader. Nếu không có đường dẫn nào được cung cấp, phpMussel sẽ cố gắng định vị nó trong thư mục mẹ của thư mục vendor.

Trong một số môi trường, chẳng hạn như Apache, thậm chí có thể đặt một dấu chấm ở phía trước cấu hình của bạn để ẩn nó và ngăn truy cập công khai.

Tham khảo phần cấu hình của tài liệu này để biết thêm thông tin về các chỉ thị cấu hình khác nhau có sẵn cho phpMussel.

#### 3.1 PHPMUSSEL CORE

Bất kể bạn muốn sử dụng phpMussel như thế nào, hầu như mọi triển khai sẽ chứa một cái gì đó như thế này, ở mức tối thiểu:

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
```

Như tên của các lớp này ngụ ý, loader chịu trách nhiệm chuẩn bị các nhu cầu cơ bản của việc sử dụng phpMussel, và máy quét (scanner) chịu trách nhiệm cho tất cả các chức năng quét lõi.

Hàm tạo cho loader chấp nhận năm tham số, tất cả đều tùy chọn.

```PHP
public function __construct(
    string $ConfigurationPath = '',
    string $CachePath = '',
    string $QuarantinePath = '',
    string $SignaturesPath = '',
    string $VendorPath = ''
)
```

Tham số đầu tiên là đường dẫn đầy đủ đến tập tin cấu hình của bạn. Khi bị bỏ qua, phpMussel sẽ tìm cho tập tin cấu hình có tên là `phpmussel.ini` hoặc `phpmussel.yml` trong cha mẹ của thư mục vendor.

Tham số thứ hai là đường dẫn đến một thư mục mà bạn cho phép phpMussel sử dụng để lưu trữ tạm thời. Khi bị bỏ qua, phpMussel sẽ cố gắng tạo một thư mục mới để sử dụng, được đặt tên là `phpmussel-cache`, trong cha mẹ của thư mục vendor. Nếu bạn muốn tự chỉ định đường dẫn này, tốt nhất nên chọn một thư mục trống, để tránh mất dữ liệu khác trong thư mục được chỉ định.

Tham số thứ ba là đường dẫn đến một thư mục mà bạn cho phép phpMussel sử dụng để kiểm dịch. Khi bị bỏ qua, phpMussel sẽ cố gắng tạo một thư mục mới để sử dụng, được đặt tên là `phpmussel-quarantine`, trong cha mẹ của thư mục vendor. Nếu bạn muốn tự chỉ định đường dẫn này, tốt nhất nên chọn một thư mục trống, để tránh mất dữ liệu khác trong thư mục được chỉ định. Tôi thực sự khuyên bạn nên ngăn chặn truy cập công khai vào thư mục được sử dụng để kiểm dịch.

Tham số thứ tư là đường dẫn đến thư mục chứa các tập tin chữ ký cho phpMussel. Khi bị bỏ qua, phpMussel sẽ thử tìm kiếm các tập tin chữ ký trong một thư mục có tên là `phpmussel-signatures` trong cha mẹ của thư mục vendor.

Tham số thứ năm là đường dẫn đến thư mục vendor của bạn. Nó không bao giờ nên chỉ vào bất cứ điều gì khác. Khi bị bỏ qua, phpMussel sẽ cố gắng xác định vị trí thư mục này cho chính nó. Tham số này được cung cấp để tạo điều kiện tích hợp dễ dàng hơn với các triển khai có thể không nhất thiết phải có cấu trúc giống như một dự án Composer thông thường.

Hàm tạo cho trình quét chỉ chấp nhận một tham số và nó là bắt buộc: Các đối tượng loader. Vì nó được truyền bằng tham chiếu, trình nạp phải được khởi tạo thành một biến (khởi tạo trình tải trực tiếp vào các tham số của máy quét không phải là cách chính xác để sử dụng phpMussel).

```PHP
public function __construct(\phpMussel\Core\Loader &$Loader)
```

#### 3.2 QUÉT TẢI LÊN TẬP TIN TỰ ĐỘNG

Để khởi tạo trình xử lý tải lên:

```PHP
$Web = new \phpMussel\Web\Web($Loader, $Scanner);
```

Để quét tập tin tải lên:

```PHP
$Web->scan();
```

Tùy chọn, phpMussel có thể cố gắng sửa tên của các tải lên trong trường hợp có gì đó không đúng, nếu bạn muốn:

```PHP
$Web->demojibakefier();
```

Như một ví dụ đầy đủ:

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

*Đang cố tải lên tập tin `ascii_standard_testfile.txt`, một mẫu lành tính được cung cấp cho mục đích duy nhất là thử nghiệm phpMussel:*

![Ảnh chụp màn hình](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/web-v3.0.0-alpha2.png)

#### 3.3 CHẾ ĐỘ CLI

Để khởi tạo trình xử lý CLI:

```PHP
$CLI = new \phpMussel\CLI\CLI($Loader, $Scanner);
```

Như một ví dụ đầy đủ:

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

*Ảnh chụp màn hình:*

![Ảnh chụp màn hình](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/cli-v3.0.0-alpha2.png)

#### 3.4 GIAO DIỆN NGƯỜI DÙNG (FRONT-END)

Để khởi tạo giao diện người dùng:

```PHP
$FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
```

Như một ví dụ đầy đủ:

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

*Ảnh chụp màn hình:*

![Ảnh chụp màn hình](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/frontend-v3.0.0-alpha2.png)

#### 3.5 API MÁY QUÉT

Bạn cũng có thể triển khai API trình quét phpMussel trong các chương trình và tập lệnh khác, nếu bạn muốn.

Như một ví dụ đầy đủ:

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

Phần quan trọng cần lưu ý từ ví dụ đó là phương thức `scan()`. Phương thức `scan()` chấp nhận hai tham số:

```PHP
public function scan(mixed $Files, int $Format = 0): mixed
```

Tham số đầu tiên có thể là một chuỗi hoặc một mảng và cho máy quét biết những gì nó cần quét. Nó có thể là chuỗi chỉ ra một tập tin hoặc thư mục cụ thể, hoặc một mảng các chuỗi như vậy để chỉ định nhiều tập tin và thư mục.

Khi là một chuỗi, nó sẽ trỏ đến nơi có thể tìm thấy dữ liệu. Khi là một mảng, các khóa mảng sẽ chỉ ra tên gốc của các mục sẽ được quét và các giá trị sẽ trỏ đến nơi có thể tìm thấy dữ liệu.

Tham số thứ hai là một số nguyên và cho máy quét biết cách trả về kết quả quét của nó.

Chỉ định 1 để trả về kết quả quét dưới dạng một mảng cho mỗi mục được quét dưới dạng số nguyên.

Các số nguyên này có ý nghĩa như sau:

Các kết quả | Sự miêu tả
--:|:--
-5 | Chỉ ra rằng việc quét không hoàn thành vì lý do khác.
-4 | Chỉ ra rằng không thể quét dữ liệu vì mã hóa.
-3 | Chỉ ra rằng vấn đề gặp phải với các tập tin chữ ký.
-2 | Chỉ ra rằng dữ liệu bị hỏng đã được phát hiện trong quá trình quét và như vậy quét không hoàn thành.
-1 | Chỉ ra rằng mở rộng hay bổ sung theo yêu cầu của PHP để thực hiện quá trình quét bị mất tích và như vậy quét không hoàn thành.
0 | Chỉ ra rằng mục tiêu quét không tồn tại và như vậy không có gì để quét.
1 | Chỉ ra rằng các mục tiêu đã được quét thành công và không có vấn đề đã được phát hiện.
2 | Chỉ ra rằng các mục tiêu đã được quét thành công và vấn đề đã được phát hiện.

Chỉ định 2 để trả về kết quả quét dưới dạng boolean.

Các kết quả | Sự miêu tả
:-:|:--
`true` | Vấn đề đã được phát hiện (mục tiêu quét là nguy hiểm).
`false` | Vấn đề không được phát hiện (mục tiêu quét có thể an toàn).

Chỉ định 3 để trả về kết quả quét dưới dạng một mảng cho mỗi mục được quét dưới dạng văn bản có thể đọc được.

*Ví dụ đầu ra:*

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

Chỉ định 4 để trả về kết quả quét dưới dạng một chuỗi văn bản có thể đọc được (thích 3, nhưng kết hợp).

*Ví dụ đầu ra:*

```
Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)! Detected phpMussel-Testfile.CoEx (coex_testfile.rtf)! Detected encrypted archive; Encrypted archives not permitted (encrypted.zip)!
```

Chỉ định *bất kỳ giá trị nào khác* để trả về văn bản có định dạng (giống như kết quả quét được thấy khi sử dụng CLI).

*Ví dụ đầu ra:*

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

*Xem thêm: [Làm thế nào để truy cập chi tiết cụ thể về các tập tin khi chúng được quét?](#user-content-SCAN_DEBUGGING)*

#### 3.6 2FA (XÁC THỰC HAI YẾU TỐ)

Việc bật xác thực hai yếu tố ("2FA") có thể làm cho front-end an toàn hơn. Khi đăng nhập vào tài khoản có hỗ trợ 2FA, một email sẽ được gửi đến địa chỉ email được liên kết với tài khoản đó. Email này chứa "mã 2FA", mà sau đó người dùng phải nhập, ngoài tên người dùng và mật khẩu, để có thể đăng nhập bằng tài khoản đó. Điều này có nghĩa là việc lấy mật khẩu tài khoản sẽ không đủ cho bất kỳ tin tặc hoặc kẻ tấn công tiềm năng nào có thể đăng nhập vào tài khoản đó, bởi vì họ cũng cần phải có quyền truy cập vào địa chỉ email được liên kết với tài khoản đó để có thể nhận và sử dụng mã 2FA được kết hợp với phiên, do đó làm cho front-end an toàn hơn.

Sau khi bạn đã cài đặt PHPMailer, bạn sẽ cần điền các chỉ thị cấu hình cho PHPMailer thông qua trang cấu hình phpMussel hoặc tập tin cấu hình. Thông tin thêm về các chỉ thị cấu hình này được bao gồm trong phần cấu hình của tài liệu này. Sau khi bạn đã điền các chỉ thị cấu hình PHPMailer, hãy đặt `enable_two_factor` thành `true`. Xác thực hai yếu tố bây giờ sẽ được bật.

Tiếp theo, bạn cần liên kết địa chỉ email với tài khoản, để phpMussel có thể biết nơi gửi mã 2FA khi đăng nhập bằng tài khoản đó. Để thực hiện việc này, hãy sử dụng địa chỉ email làm tên người dùng cho tài khoản (như `foo@bar.tld`), hoặc bao gồm địa chỉ email như một phần của tên người dùng giống như khi gửi email thông thường (như `Foo Bar <foo@bar.tld>`).

---


### 4. <a name="SECTION4"></a>MỞ RỘNG PHPMUSSEL

phpMussel được thiết kế với khả năng mở rộng trong tâm trí. Kéo yêu cầu cho bất kỳ kho lưu trữ nào tại tổ chức phpMussel và các [đóng góp](https://github.com/phpMussel/.github/blob/master/CONTRIBUTING.md) nói chung là luôn được chào đón. Ngoài ra, nếu bạn cần sửa đổi hay mở rộng phpMussel theo những cách không phù hợp để đóng góp lại các kho lưu trữ cụ thể đó, điều đó chắc chắn là có thể làm được (ví dụ, cho các sửa đổi hay mở rộng dành riêng cho việc triển khai cụ thể của bạn, mà không thể được phát hành bởi vì mối quan tâm riêng tư tại tổ chức của bạn, or which might be preferably published at their own repository, hoặc tốt nhất có thể được phát hành tại kho lưu trữ của riêng họ, chẳng hạn như cho plugins và cho gói Composer mới mà yêu cầu phpMussel).

Kể từ v3, tất cả các chức năng của phpMussel đều tồn tại dưới dạng các lớp, có nghĩa là trong một số trường hợp, các cơ chế [kế thừa đối tượng](https://www.php.net/manual/en/language.oop5.inheritance.php) do PHP cung cấp có thể là một cách dễ dàng và thích hợp để mở rộng phpMussel.

phpMussel cũng cung cấp các cơ chế của riêng để có thể mở rộng. Trước v3, cơ chế được ưu tiên là hệ thống plugin tích hợp cho phpMussel. Kể từ v3, cơ chế được ưu tiên là trình điều phối sự kiện.

Mã boilerplate để mở rộng phpMussel và để viết các plugin mới là có sẵn công khai [tại kho lưu trữ boilerplates](https://github.com/phpMussel/plugin-boilerplates). Danh sách [tất cả các sự kiện hiện được hỗ trợ](https://github.com/phpMussel/plugin-boilerplates/tree/master/boilerplate-v3#currently-supported-events) và hướng dẫn chi tiết hơn liên quan đến cách sử dụng mã boilerplate cũng được bao gồm.

Bạn sẽ nhận thấy rằng cấu trúc của mã boilerplate v3 giống với cấu trúc của các kho lưu trữ phpMussel v3 khác nhau. Đó không phải là một sự ngẫu nhiên. Bất cứ khi nào có thể, tôi khuyên bạn nên sử dụng mã boilerplate v3 cho mục đích mở rộng và sử dụng các nguyên tắc thiết kế tương tự như của chính phpMussel v3. Nếu bạn chọn công khai tiện ích mở rộng hoặc plugin mới của mình, bạn có thể tích hợp hỗ trợ Composer cho nó và về mặt lý thuyết, những người khác có thể sử dụng tiện ích mở rộng hoặc plugin của bạn theo cách chính xác như chính phpMussel v3, chỉ cần yêu cầu nó cùng với các phụ thuộc Composer khác của họ và áp dụng bất kỳ trình xử lý sự kiện cần thiết nào khi triển khai chúng. (Tất nhiên, đừng quên bao gồm hướng dẫn với các ấn phẩm của bạn để những người khác sẽ biết về bất kỳ trình xử lý sự kiện cần thiết nào có thể tồn tại và bất kỳ thông tin nào khác có thể cần thiết để cài đặt và sử dụng chính xác ấn phẩm của bạn).

---


### 5. <a name="SECTION5"></a>TÙY CHỌN CHO CẤU HÌNH

Sau đây là danh sách các chỉ thị cấu hình mà phpMussel chấp nhận, cùng với một mô tả về mục đích và chức năng của chúng.

```
Cấu Hình (v3)
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

#### "core" (Thể loại)
Cấu hình chung (bất kỳ cấu hình cốt lõi nào không thuộc về các loại khác).

##### "scan_log" `[string]`
- Tên của tập tin để ghi lại tất cả các kết quả quét. Chỉ định một tên tập tin, hoặc để trống để vô hiệu hóa.

##### "scan_log_serialized" `[string]`
- Tên của tập tin để ghi lại tất cả các kết quả quét (sử dụng một định dạng tuần tự). Chỉ định một tên tập tin, hoặc để trống để vô hiệu hóa.

##### "error_log" `[string]`
- Một tập tin để ghi lại bất kỳ lỗi không nghiêm trọng được phát hiện. Chỉ định một tên tập tin, hoặc để trống để vô hiệu hóa.

##### "truncate" `[string]`
- Dọn dẹp các bản ghi khi họ được một kích thước nhất định? Giá trị là kích thước tối đa bằng B/KB/MB/GB/TB mà một tập tin bản ghi có thể tăng lên trước khi bị dọn dẹp. Giá trị mặc định 0KB sẽ vô hiệu hoá dọn dẹp (các bản ghi có thể tăng lên vô hạn). Lưu ý: Áp dụng cho tập tin riêng biệt! Kích thước tập tin bản ghi không được coi là tập thể.

##### "log_rotation_limit" `[int]`
- Xoay vòng nhật ký giới hạn số lượng của tập tin nhật ký có cần tồn tại cùng một lúc. Khi các tập tin nhật ký mới được tạo, nếu tổng số lượng tập tin nhật ký vượt quá giới hạn được chỉ định, hành động được chỉ định sẽ được thực hiện. Bạn có thể chỉ định giới hạn mong muốn tại đây. Giá trị 0 sẽ vô hiệu hóa xoay vòng nhật ký.

##### "log_rotation_action" `[string]`
- Xoay vòng nhật ký giới hạn số lượng của tập tin nhật ký có cần tồn tại cùng một lúc. Khi các tập tin nhật ký mới được tạo, nếu tổng số lượng tập tin nhật ký vượt quá giới hạn được chỉ định, hành động được chỉ định sẽ được thực hiện. Bạn có thể chỉ định hành động mong muốn tại đây.

```
log_rotation_action
├─Delete ("Xóa các tập tin nhật ký cũ nhất, cho đến khi giới hạn không còn vượt quá.")
└─Archive ("Trước tiên lưu trữ, và sau đó xóa các tập tin nhật ký cũ nhất, cho đến khi giới hạn không còn vượt quá.")
```

##### "timezone" `[string]`
- Điều này được sử dụng để chỉ định múi giờ sử dụng (ví dụ, Africa/Cairo, America/New_York, Asia/Tokyo, Australia/Perth, Europe/Berlin, Pacific/Guam, vv). Chỉ định "SYSTEM" để cho phép PHP tự động xử lý việc này cho bạn.

```
timezone
├─SYSTEM ("Sử dụng múi giờ mặc định của hệ thống.")
├─UTC ("UTC")
└─…Khác
```

##### "time_offset" `[int]`
- Múi giờ bù đắp trong phút.

##### "time_format" `[string]`
- Định dạng ngày tháng sử dụng bởi phpMussel. Các tùy chọn bổ sung có thể được bổ sung theo yêu cầu.

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
└─…Khác
```

##### "ipaddr" `[string]`
- Nơi để tìm thấy các địa chỉ IP của các yêu cầu kết nối? (Hữu ích cho các dịch vụ như thế Cloudflare và vv). Mặc định = REMOTE_ADDR. CẢNH BÁO: Không thay đổi này trừ khi bạn biết những gì bạn đang làm!

```
ipaddr
├─HTTP_INCAP_CLIENT_IP ("HTTP_INCAP_CLIENT_IP (Incapsula)")
├─HTTP_CF_CONNECTING_IP ("HTTP_CF_CONNECTING_IP (Cloudflare)")
├─CF-Connecting-IP ("CF-Connecting-IP (Cloudflare)")
├─HTTP_X_FORWARDED_FOR ("HTTP_X_FORWARDED_FOR (Cloudbric)")
├─X-Forwarded-For ("X-Forwarded-For (Squid)")
├─Forwarded ("Forwarded")
├─REMOTE_ADDR ("REMOTE_ADDR (Mặc định)")
└─…Khác
```

Xem thêm:
- [NGINX Reverse Proxy](https://docs.nginx.com/nginx/admin-guide/web-server/reverse-proxy/)
- [Squid configuration directive forwarded_for](http://www.squid-cache.org/Doc/config/forwarded_for/)
- [Forwarded - HTTP \| MDN](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Forwarded)

##### "delete_on_sight" `[bool]`
- Bật tùy chọn này sẽ hướng dẫn các kịch bản để cố gắng xóa ngay lập tức bất kỳ đã quét tải lên tập tin mà phù hợp bất kỳ tiêu chí phát hiện, dù qua chữ ký hay thứ khác. Tập tin xác định là "sạch" sẽ không được bị chạm vào. Trong trường hợp kho lưu trữ, các toàn bộ kho lưu trữ sẽ bị xóa, bất kể nếu các tập tin vi phạm chỉ là một trong nhiều tập tin chứa trong các kho lưu trữ. Trong trường hợp quét tập tin tải lên, thông thường, nó không phải là cần thiết để kích hoạt tùy chọn này, bởi vì thông thường, PHP sẽ tự động tẩy các nội dung của bộ nhớ cache của nó khi thực hiện xong, điều đó có nghĩa là nó thường sẽ xóa bất kỳ tập tin tải lên thông qua nó đến máy chủ trừ khi họ đã được chuyển, sao chép hay xóa rồi. Tùy chọn này được thêm vào ở đây như một biện pháp bảo mật thêm cho những người có bản sao của PHP mà có thể không luôn luôn cư xử theo cách mong đợi. False = Sau khi quét, làm không có gì để các tập tin [Mặc định]; True = Sau khi quét, nếu không sạch, xóa ngay lập tức.

##### "lang" `[string]`
- Xác định tiếng mặc định cho phpMussel.

```
lang
├─en ("English")
├─ar ("العربية")
├─bn ("বাংলা")
├─de ("Deutsch")
├─es ("Español")
├─fa ("فارسی")
├─fr ("Français")
├─he ("עברית")
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

##### "lang_override" `[bool]`
- Bản địa hóa theo HTTP_ACCEPT_LANGUAGE bất cứ khi nào có thể? True = Vâng [Mặc định]; False = Không.

##### "scan_cache_expiry" `[int]`
- Trong bao lâu phpMussel nên nhớ đệm kết quả quét? Giá trị là số giây để nhớ đệm các kết quả quét cho. Mặc định là 21600 giây (6 giờ); Giá trị 0 sẽ vô hiệu hóa bộ nhớ đệm kết quả quét.

##### "maintenance_mode" `[bool]`
- Bật chế độ bảo trì? True = Vâng; False = Không [Mặc định]. Vô hiệu hoá mọi thứ khác ngoài các front-end. Đôi khi hữu ích khi cập nhật CMS, framework của bạn, vv.

##### "statistics" `[bool]`
- Giám sát thống kê sử dụng phpMussel? True = Vâng; False = Không [Mặc định].

##### "hide_version" `[bool]`
- Ẩn thông tin phiên bản từ nhật ký và đầu ra của trang? True = Vâng; False = Không [Mặc định].

##### "disabled_channels" `[string]`
- Điều này có thể được sử dụng để ngăn phpMussel sử dụng các kênh cụ thể khi gửi yêu cầu.

```
disabled_channels
├─GitHub ("GitHub")
├─BitBucket ("BitBucket")
├─VirusTotal_HTTPS ("VirusTotal (HTTPS)")
└─VirusTotal_HTTP ("VirusTotal (HTTP)")
```

##### "default_timeout" `[int]`
- Thời gian chờ mặc định để sử dụng cho các yêu cầu bên ngoài? Mặc định = 12 giây.

#### "signatures" (Thể loại)
Cấu hình cho chữ ký, tập tin chữ ký, vv.

##### "active" `[string]`
- Một danh sách các kích hoạt tập tin chữ ký, giới hạn bởi dấu phẩy. Chú thích: Tập tin chữ ký trước tiên phải được cài đặt, trước khi bạn có thể kích hoạt chúng. Để các tập tin thử nghiệm có thể làm việc đúng, các tập tin chữ ký phải được cài đặt và kích hoạt.

##### "fail_silently" `[bool]`
- phpMussel nên báo cáo khi tập tin chữ ký bị mất hay bị hỏng? Nếu `fail_silently` được vô hiệu hóa, tập tin bị mất hay bị hỏng sẽ được báo cáo khi quét, và nếu `fail_silently` được kích hoạt, tập tin bị mất hay bị hỏng sẽ bị bỏ qua, với báo cáo quét cho những tập tin mà không có bất kỳ vấn đề. Điều này thường cần được ở một mình trừ khi bạn gặp sự cố hay vấn đề tương tự. False = Không cho phép; True = Cho phép [Mặc định].

##### "fail_extensions_silently" `[bool]`
- phpMussel nên báo cáo khi mở rộng bị mất? Nếu `fail_extensions_silently` được vô hiệu hóa, mở rộng bị mất sẽ được báo cáo khi quét, và nếu `fail_extensions_silently` được kích hoạt, mở rộng bị mất hay bị hỏng sẽ bị bỏ qua, với báo cáo quét cho những tập tin mà không có bất kỳ vấn đề. Vô hiệu hóa tùy chọn này có khả năng có thể làm tăng bảo mật của bạn, nhưng cũng có thể dẫn đến sự gia tăng giả tích cực. False = Không cho phép; True = Cho phép [Mặc định].

##### "detect_adware" `[bool]`
- phpMussel nên sử dụng chữ ký cho phát hiện adware? False = Không; True = Vâng [Mặc định].

##### "detect_joke_hoax" `[bool]`
- phpMussel nên sử dụng chữ ký cho phát hiện câu nói đùa và chơi khăm phần mềm độc hại và vi rút? False = Không; True = Vâng [Mặc định].

##### "detect_pua_pup" `[bool]`
- phpMussel nên sử dụng chữ ký cho phát hiện các PUA/PUP? False = Không; True = Vâng [Mặc định].

##### "detect_packer_packed" `[bool]`
- phpMussel nên sử dụng chữ ký cho phát hiện đóng gói tập tin và dữ liệu đã đóng gói? False = Không; True = Vâng [Mặc định].

##### "detect_shell" `[bool]`
- phpMussel nên sử dụng chữ ký cho phát hiện shell script? False = Không; True = Vâng [Mặc định].

##### "detect_deface" `[bool]`
- phpMussel nên sử dụng chữ ký cho phát hiện deface và công cụ làm xấu? False = Không; True = Vâng [Mặc định].

##### "detect_encryption" `[bool]`
- phpMussel nên phát hiện và chặn các tập tin mật mã? False = Không; True = Vâng [Mặc định].

##### "heuristic_threshold" `[int]`
- Có một số chữ ký của phpMussel mà được dự định để xác định đáng ngờ và phẩm chất của các tập tin khả năng độc hại từ đang được tải lên mà không có trong tự xác định các tập tin đang được tải lên cụ thể như là độc hại. Giá trị "threshold" này nói với phpMussel tổng trọng lượng tối đa của đáng ngờ và phẩm chất của các tập tin khả năng độc hại đang được tải lên đó là phép trước những tập tin đang được gắn cờ là độc hại. Định nghĩa về trọng lượng trong bối cảnh này là tổng số đáng ngờ và phẩm chất tiềm ẩn độc hại được xác định. Theo mặc định, giá trị này sẽ được thiết lập để 3. Một giá trị thấp hơn nói chung sẽ cho kết quả trong một sự xuất hiện cao hơn của sai tích cực nhưng một số cao hơn các tập tin độc hại được gắn cờ, trong khi một giá trị cao hơn nói chung sẽ cho kết quả trong một sự xuất hiện thấp hơn của sai tích cực nhưng một số thấp hơn các tập tin độc hại được gắn cờ. Nói chung, nó là tốt nhất để có giá trị này tại mặc định của nó trừ khi bạn đang gặp phải các vấn đề liên quan đến nó.

#### "files" (Thể loại)
Các chi tiết cụ thể về cách xử lý tập tin khi quét.

##### "filesize_limit" `[string]`
- Giới hạn của kích thước tập tin trong KB. 65536 = 64MB [Mặc định]; 0 = Không giới hạn (luôn có trên danh sách xám), bất kỳ giá trị số dương chấp nhận. Điều này có thể hữu ích khi cấu hình PHP của bạn hạn chế số lượng bộ nhớ một quá trình có thể giữ hay nếu hình PHP của bạn giới hạn kích thước của tải lên tập tin.

##### "filesize_response" `[bool]`
- Làm gì với tập tin mà vượt quá các giới hạn kích thước của tải lên (nếu tồn tại). False = Danh sách trắng; True = Danh sách đen [Mặc định].

##### "filetype_whitelist" `[string]`
- Danh sách trắng:

__Làm thế nào điều này hoạt động.__ Nếu hệ thống của bạn chỉ cho phép các loại tệp cụ thể được tải lên, hay nếu hệ thống của bạn từ chối một cách rõ ràng các loại tập tin cụ thể, xác định các loại tập tin trong danh sách trắng, danh sách đen và danh sách xám có thể tăng tốc độ quét được tiến hành bằng cách cho phép các kịch bản bỏ qua các loại tập tin nhất định. Định dạng là CSV (dấu phẩy ngăn cách giá trị).

__Thứ tự hợp lý của chế biến.__ Nếu loại tệp là trên danh sách trắng, không quét và không chặn các tập tin, và không kiểm tra các tập tin chống lại danh sách đen hay danh sách xám. Nếu loại tệp là trên danh sách đen, không quét các tập tin nhưng chặn nó dù sao, và không kiểm tra các tập tin chống lại danh sách xám. Nếu danh sách xám là trống hay nếu danh sách xám không phải là trống và các loại tệp là danh sách xám, quét các tập tin như bình thường và xác định xem có chặn nó dựa trên kết quả của quá trình quét, nhưng nếu danh sách xám không phải là trống và các loại tệp không phải trên danh sách xám, điều trị các tập tin như thể nó là trên danh sách đen, vì thế không quét nó nhưng chặn nó dù sao.

##### "filetype_blacklist" `[string]`
- Danh sách đen:

__Làm thế nào điều này hoạt động.__ Nếu hệ thống của bạn chỉ cho phép các loại tệp cụ thể được tải lên, hay nếu hệ thống của bạn từ chối một cách rõ ràng các loại tập tin cụ thể, xác định các loại tập tin trong danh sách trắng, danh sách đen và danh sách xám có thể tăng tốc độ quét được tiến hành bằng cách cho phép các kịch bản bỏ qua các loại tập tin nhất định. Định dạng là CSV (dấu phẩy ngăn cách giá trị).

__Thứ tự hợp lý của chế biến.__ Nếu loại tệp là trên danh sách trắng, không quét và không chặn các tập tin, và không kiểm tra các tập tin chống lại danh sách đen hay danh sách xám. Nếu loại tệp là trên danh sách đen, không quét các tập tin nhưng chặn nó dù sao, và không kiểm tra các tập tin chống lại danh sách xám. Nếu danh sách xám là trống hay nếu danh sách xám không phải là trống và các loại tệp là danh sách xám, quét các tập tin như bình thường và xác định xem có chặn nó dựa trên kết quả của quá trình quét, nhưng nếu danh sách xám không phải là trống và các loại tệp không phải trên danh sách xám, điều trị các tập tin như thể nó là trên danh sách đen, vì thế không quét nó nhưng chặn nó dù sao.

##### "filetype_greylist" `[string]`
- Danh sách xám:

__Làm thế nào điều này hoạt động.__ Nếu hệ thống của bạn chỉ cho phép các loại tệp cụ thể được tải lên, hay nếu hệ thống của bạn từ chối một cách rõ ràng các loại tập tin cụ thể, xác định các loại tập tin trong danh sách trắng, danh sách đen và danh sách xám có thể tăng tốc độ quét được tiến hành bằng cách cho phép các kịch bản bỏ qua các loại tập tin nhất định. Định dạng là CSV (dấu phẩy ngăn cách giá trị).

__Thứ tự hợp lý của chế biến.__ Nếu loại tệp là trên danh sách trắng, không quét và không chặn các tập tin, và không kiểm tra các tập tin chống lại danh sách đen hay danh sách xám. Nếu loại tệp là trên danh sách đen, không quét các tập tin nhưng chặn nó dù sao, và không kiểm tra các tập tin chống lại danh sách xám. Nếu danh sách xám là trống hay nếu danh sách xám không phải là trống và các loại tệp là danh sách xám, quét các tập tin như bình thường và xác định xem có chặn nó dựa trên kết quả của quá trình quét, nhưng nếu danh sách xám không phải là trống và các loại tệp không phải trên danh sách xám, điều trị các tập tin như thể nó là trên danh sách đen, vì thế không quét nó nhưng chặn nó dù sao.

##### "check_archives" `[bool]`
- Cố gắng để kiểm tra nội dung của kho lưu trữ? False = Không kiểm tra; True = Kiểm tra [Mặc định]. Được hỗ trợ: Zip (yêu cầu libzip), Tar, Rar (yêu cầu mở rộng rar).

##### "filesize_archives" `[bool]`
- Thừa kế danh sách đen/trắng cho kích thước của tập tin trong kho lưu trữ? False = Không (chỉ danh sách xám mọi điều); True = Vâng [Mặc định].

##### "filetype_archives" `[bool]`
- Thừa kế danh sách đen/trắng cho loại tệp của tập tin trong kho lưu trữ? False = Không (chỉ danh sách xám mọi điều) [Mặc định]; True = Vâng.

##### "max_recursion" `[int]`
- Tối đa đệ quy chiều sâu giới hạn cho kho lưu trữ. Mặc định = 3.

##### "block_encrypted_archives" `[bool]`
- Phát hiện và chặn kho lưu trữ được mã hóa? Bởi vì phpMussel không thể quét các nội dung của kho lưu trữ được mã hóa, nó có thể mã hóa kho lưu trữ có thể được sử dụng bởi một kẻ tấn công như một phương tiện cố gắng để vượt qua phpMussel, máy quét chống vi rút và bảo vệ khác như. Hướng dẫn phpMussel để ngăn chặn bất kỳ kho lưu trữ mà nó phát hiện được mã hóa có thể giúp giảm nguy cơ nào liên kết với những khả năng này. False = Không; True = Vâng [Mặc định].

##### "max_files_in_archives" `[int]`
- Số lượng tập tin tối đa để quét từ trong kho lưu trữ trước khi hủy quét. Mặc định = 0 (không tối đa).

##### "chameleon_from_php" `[bool]`
- Tìm kiếm cho định danh PHP trong các tập tin mà không phải là PHP cũng không phải là kho lưu trữ được công nhận. False = Tắt; True = Trên.

##### "can_contain_php_file_extensions" `[string]`
- Danh sách các phần mở rộng tập tin được phép chứa mã PHP, được phân tách bằng dấu phẩy. Nếu phát hiện tấn công tắc kè hoa PHP được kích hoạt, các tập tin có chứa mã PHP, mà có các phần mở rộng không có trong danh sách này, sẽ được phát hiện là các tấn công tắc kè hoa PHP.

##### "chameleon_from_exe" `[bool]`
- Tìm kiếm cho định danh tập tin thực thi trong các tập tin mà không phải là tập tin thực thi cũng không phải là kho lưu trữ được công nhận, và cho tập tin thực thi tập tin mà có định danh sai. False = Tắt; True = Trên.

##### "chameleon_to_archive" `[bool]`
- Phát hiện tiêu đề không chính xác trong lưu trữ và tập tin nén. Được hỗ trợ: BZ/BZIP2, GZ/GZIP, LZF, RAR, ZIP. False = Tắt; True = Trên.

##### "chameleon_to_doc" `[bool]`
- Tìm kiếm cho tài liệu văn phòng mà có định danh sai (Được hỗ trợ: DOC, DOT, PPS, PPT, XLA, XLS, WIZ). False = Tắt; True = Trên.

##### "chameleon_to_img" `[bool]`
- Tìm kiếm cho hình ảnh mà có định danh sai (Được hỗ trợ: BMP, DIB, PNG, GIF, JPEG, JPG, XCF, PSD, PDD, WEBP). False = Tắt; True = Trên.

##### "chameleon_to_pdf" `[bool]`
- Tìm kiếm cho tập tin PDF mà có định danh sai. False = Tắt; True = Trên.

##### "archive_file_extensions" `[string]`
- Được công nhận mở rộng cho tập tin kho lưu trữ (định dạng là CSV; chỉ nên thêm hay loại bỏ khi có vấn đề xảy ra; loại bỏ không cần thiết có thể gây ra sai tích cực để xuất hiện cho tập tin kho lưu trữ, trong khi thêm không cần thiết sẽ trong bản chất danh sách trắng những gì bạn đang thêm từ phát hiện cụ tấn công; sửa đổi với cách thận trọng; cũng lưu ý rằng điều này không có tác dụng liên quan đến những gì kho lưu trữ có thể và không thể được phân tích ở nội dung cấp). Danh sách này, như là mặc định, liệt kê các định dạng sử dụng phổ biến nhất trên phần lớn các hệ thống và CMS, nhưng là cố tình không nhất thiết phải toàn diện.

##### "block_control_characters" `[bool]`
- Chặn bất kỳ tập tin có chứa bất kỳ ký tự điều khiển (khác hơn so với dòng mới)? Nếu bạn *__CHỈ__* tải lên văn bản thô, thế thì bạn có thể kích hoạt tùy chọn này để cung cấp một số bảo vệ bổ sung để hệ thống của bạn. Tuy nhiên, nếu bạn tải lên bất cứ điều gì khác hơn văn bản thô, cho phép điều này có thể dẫn đến sai tích cực. False = Không chặn [Mặc định]; True = Chặn.

##### "corrupted_exe" `[bool]`
- Tập tin bị hỏng và phân tích lỗi. False = Bỏ qua; True = Chặn [Mặc định]. Phát hiện và chặn khả thi tập tin PE (portable executable / thực thi di động) bị hỏng? Thường (nhưng không phải lúc nào), khi khía cạnh cụ thể của một tập tin PE đang bị hỏng hay không thể được phân tích chính xác, nó có thể chỉ ra một nhiễm vi rút. Các quy trình được sử dụng bởi hầu hết các chương trình chống vi rút để phát hiện vi rút trong các tập tin PE đòi hỏi phải phân tích những tập tin theo một cách mà, nếu các lập trình viên của một vi rút là nhận thức của, cụ thể sẽ cố gắng để ngăn chặn, để cho phép vi rút của mình để không bị phát hiện.

##### "decode_threshold" `[string]`
- Ngưỡng cho chiều dài của dữ liệu thô trong đó các lệnh giải mã nên được phát hiện (trong trường hợp có bất kỳ vấn đề hiệu suất đáng chú ý trong khi quét). Mặc định = 512KB. Số không hay số null vô hiệu hóa các ngưỡng (loại bỏ bất kỳ giới hạn dựa trên kích cỡ tập tin).

##### "scannable_threshold" `[string]`
- Ngưỡng cho chiều dài của dữ liệu mà phpMussel được phép đọc và quét (trong trường hợp có bất kỳ vấn đề hiệu suất đáng chú ý trong khi quét). Mặc định = 32MB. Số không hay số null vô hiệu hóa các ngưỡng. Nói chung, giá trị này không nên được ít hơn kích thước trung bình của tải lên tập tin bạn muốn và mong đợi để nhận được đến máy chủ hay trang mạng của bạn, không nên được ít hơn tùy chọn filesize_limit, và không nên được ít hơn khoảng một phần năm tổng số cấp phát bộ nhớ cấp cho PHP thông qua tập tin cấu hình "php.ini". Tùy chọn này tồn tại để cố gắng ngăn chặn phpMussel từ việc sử dụng quá nhiều bộ nhớ (mà sẽ ngăn chặn nó từ việc có thể quét các tập tin thành công trên một kích thước tập tin nhất định).

##### "allow_leading_trailing_dots" `[bool]`
- Cho phép các dấu chấm đầu và cuối trong tên tập tin? Điều này đôi khi có thể được sử dụng để ẩn các tập tin hoặc để lừa một số hệ thống cho phép truyền traversal thư mục. False = Không cho phép [Mặc định]. True = Cho phép.

##### "block_macros" `[bool]`
- Thử chặn bất kỳ tập tin nào chứa macro? Một số loại tài liệu và bảng tính có thể chứa macro thực thi, do đó cung cấp một vectơ phần mềm độc hại tiềm ẩn nguy hiểm. False = Không chặn [Mặc định]; True = Chặn.

##### "only_allow_images" `[bool]`
- Khi được đặt thành true, bất kỳ tập tin không phải là hình ảnh nào mà máy quét gặp phải sẽ được gắn cờ ngay lập tức mà không được quét. Điều này có thể giúp giảm thời gian cần thiết để hoàn thành quét trong một số trường hợp. Đặt thành false theo mặc định.

#### "quarantine" (Thể loại)
Cấu hình cho các kiểm dịch.

##### "quarantine_key" `[string]`
- phpMussel có thể kiểm dịch tập tin tải lên mà bị chặn, nếu đây là cái gì bạn muốn nó làm. Các người dùng bình thường của phpMussel mà chỉ đơn giản là muốn bảo vệ các môi trường kho lưu trữ hay trang mạng của họ, mà không có bất cứ quan tâm trong việc phân tích sâu sắc của bất kỳ tải lên tập tin mà đã được đánh dấu, nên để chức năng này bị vô hiệu hóa còn lại, nhưng bất kỳ người dùng quan tâm trong phân tích sâu hơn của tải lên tập tin mà đã được đánh dấu cho nghiên cứu phần mềm độc hại hay cho những thứ tương tự như vậy nên kích hoạt chức năng này. Các kiểm dịch của tải lên tập tin mà đã được đánh dấu đôi khi cũng có thể hỗ trợ trong việc gỡ lỗi sai tích cực, nếu đây là cái gì đó thường xuyên xảy ra đối với bạn. Để vô hiệu hóa chức năng kiểm dịch, chỉ đơn giản để lại tùy chọn `quarantine_key` trống rỗng, hay xóa nội dung của nó nếu nó không phải là đã trống rỗng. Để kích hoạt chức năng kiểm dịch, nhập một số giá trị vào các tùy chọn. `quarantine_key` là một tính năng bảo mật quan trọng của chức năng kiểm dịch yêu cầu như là một phương tiện cho ngăn chặn chức năng kiểm dịch được khai thác bởi kẻ tấn công tiềm năng và như một phương tiện ngăn chặn bất kỳ thực hiện tiềm năng của kho lưu trữ trong kiểm dịch. `quarantine_key` nên được đối xử theo cách tương tự như mật khẩu của bạn: Càng dài thì càng tốt, và cất giữ nó thật chặt. Đối với hiệu quả tốt nhất, sử dụng kết hợp với `delete_on_sight`.

##### "quarantine_max_filesize" `[string]`
- Cho phép tối đa kích thước của tập tin để được kiểm dịch. Tập tin mà lớn hơn giá trị quy định sẽ KHÔNG được kiểm dịch. Tùy chọn này là rất quan trọng như là một phương tiện làm cho nó khó khăn hơn cho bất kỳ kẻ tấn công tiềm năng lũ kiểm dịch của bạn với các dữ liệu không mong muốn, có khả năng gây ra việc sử dụng quá mức dữ liệu trên dịch vụ kho lưu trữ của bạn. Mặc định = 2MB.

##### "quarantine_max_usage" `[string]`
- Cho phép tối đa sử dụng bộ nhớ cho kiểm dịch. Nếu tổng số sử dụng bộ nhớ bởi các kiểm dịch đạt giá trị này, các tập tin trong kiểm dịch cho dài nhất sẽ bị xóa cho đến khi các tổng bộ nhớ sử dụng không còn đạt giá trị này. Tùy chọn này là rất quan trọng như là một phương tiện làm cho nó khó khăn hơn cho bất kỳ kẻ tấn công tiềm năng lũ kiểm dịch của bạn với các dữ liệu không mong muốn, có khả năng gây ra việc sử dụng quá mức dữ liệu trên dịch vụ kho lưu trữ của bạn. Mặc định = 64MB.

##### "quarantine_max_files" `[int]`
- Số lượng tập tin tối đa có thể tồn tại trong kiểm dịch. Khi tập tin mới được thêm vào trong kiểm dịch, nếu số này vượt quá, các tập tin cũ sẽ bị xóa cho đến khi phần còn lại không còn vượt quá con số này. Mặc định = 100.

#### "virustotal" (Thể loại)
Cấu hình cho hội nhập Virus Total.

##### "vt_public_api_key" `[string]`
- Nếu bạn muốn, phpMussel có thể quét tập tin sử dụng các Virus Total API như một cách để cung cấp bảo vệ tăng cường rất nhiều chống lại vi rút, trojan, phần mềm độc hại và các mối đe dọa khác. Theo mặc định, quét của tập tin sử dụng các Virus Total API bị vô hiệu hóa. Để kích hoạt nó, một khóa API từ Virus Total là cần thiết. Do những lợi ích đáng kể rằng điều này có thể cung cấp cho bạn, nó là một cái gì đó mà tôi rất khuyên bạn nên cho phép. Xin hãy lưu ý, tuy nhiên, rằng để sử dụng các Virus Total API, bạn *__PHẢI__* đồng ý với điều khoản dịch vụ của họ và bạn *__PHẢI__* tuân theo tất cả các hướng dẫn như mô tả của các tài liệu của Virus Total! Bạn KHÔNG được phép để sử dụng tính năng hội nhập này TRỪ KHI: Bạn đã đọc và đồng ý với các Điều khoản và Điều kiện của Virus Total và API của nó. Bạn đã đọc và bạn hiểu, ở mức nhỏ nhất, lời mở đầu của các tài liệu API công cộng của Virus Total (mọi điều sau "VirusTotal Public API v2.0" nhưng trước "Contents").

Xem thêm:
- [Terms of Service](https://www.virustotal.com/en/about/terms-of-service/)
- [Getting started](https://developers.virustotal.com/reference)

##### "vt_suspicion_level" `[int]`
- Theo mặc định, phpMussel sẽ hạn chế các tập tin nó quét bằng cách sử dụng Virus Total API đến các tập tin mà nó coi như là "đáng ngờ". Bạn có thể tùy chọn điều chỉnh hạn chế này bằng cách thay đổi các giá trị của tùy chọn `vt_suspicion_level`.

```
vt_suspicion_level
├─0 (Chỉ quét các tập tin có trọng số heuristic.): Các tập tin sẽ chỉ được quét nếu chúng chịu một số
│ trọng số heuristic. Trọng số heuristic có thể phát sinh từ
│ các chữ ký nhằm bắt dấu vân tay phổ biến gợi ý lây
│ nhiễm nhưng không đảm bảo lây nhiễm. Đối với các kết
│ quả chứng minh sự nghi ngờ nhưng không cung cấp bất kỳ sự
│ chắc chắn nào, việc tra cứu có thể phục vụ để đưa ra ý
│ kiến thứ hai.
├─1 (Quét các tập tin có trọng số heuristic, tập tin thực thi, và tập tin có khả năng chứa dữ liệu thực thi.): Ví dụ về tập tin thực thi, và tập tin có khả năng chứa
│ dữ liệu thực thi, bao gồm tập tin Windows PE, tập tin Linux ELF,
│ tập tin Mach-O, tập tin DOCX, tập tin ZIP, vv.
└─2 (Quét tất cả các tập tin.)
```

##### "vt_weighting" `[int]`
- phpMussel nên áp dụng các kết quả quét từ sử dụng Virus Total API như các phát hiện hoặc như các cân nặng phát hiện? Tùy chọn này tồn tại, bởi vì, mặc dù quét một tập tin sử dụng nhiều công cụ (như Virus Total làm) nên dẫn đến một tỷ lệ phát hiện tăng (và do đó ở một số cao hơn các tập tin độc hại bị bắt), nó cũng có thể dẫn đến một số cao hơn của sai tích cực, và vì thế, trong một số trường hợp, các kết quả quét có thể là tốt hơn sử dụng như một điểm tự tin chứ không phải là một kết luận dứt khoát. Nếu giá trị 0 được sử dụng, các kết quả quét từ sử dụng Virus Total API sẽ được áp dụng như phát hiện, và vì thế, nếu bất kỳ công cụ được sử dụng bởi Virus Total đánh dấu các tập tin được quét như độc hại, phpMussel sẽ cân nhắc các tập tin đến được độc hại. Nếu bất kỳ giá trị nào khác được sử dụng, các kết quả quét từ sử dụng Virus Total API sẽ được áp dụng như cân nặng phát hiện, và vì thế, các số lượng động cơ được sử dụng bởi Virus Total mà đánh dấu các tập tin được quét như được độc hại sẽ phục vụ như là một điểm tin (hay cân nặng phát hiện) cho nếu các tập tin được quét nên được xem như độc hại bởi phpMussel (giá trị sử dụng sẽ đại diện cho số điểm tin cậy hay cân nặng tối thiểu mà là cần thiết để có thể được coi độc hại). Giá trị 0 được sử dụng bởi mặc định.

##### "vt_quota_rate" `[int]`
- Theo tài liệu VirusTotal API, nó được giới hạn tối đa là 4 yêu cầu của bất kỳ chất trong bất kỳ khung thời gian 1 phút nào. Nếu bạn chạy một honeyclient, honeypot hay bất kỳ tự động hóa khác sẽ là cung cấp các nguồn lực để VirusTotal và không chỉ sẽ là lấy báo cáo bạn có quyền được một hạn ngạch có yêu cầu cao hơn. Theo mặc định, phpMussel nghiêm sẽ tuân thủ những hạn chế, nhưng do khả năng của các hạn ngạch yêu cầu đang được tăng lên, hai tùy chọn này được cung cấp như một phương tiện để bạn có thể hướng dẫn phpMussel như những gì giới hạn nó phải tuân thủ. Trừ khi bạn đã được hướng dẫn làm như vậy, nó không được khuyến khích cho bạn để tăng các giá trị, nhưng, nếu bạn đã gặp phải vấn đề liên quan đến hạn ngạch của bạn, giảm các giá trị *__CÓ THỂ__* đôi khi giúp bạn trong việc đối phó với những vấn đề này. Hạn ngạch yêu cầu của bạn được xác định như `vt_quota_rate` yêu cầu của bất kỳ chất trong bất kỳ khung thời gian `vt_quota_time` phút nào.

##### "vt_quota_time" `[int]`
- (Xem mô tả ở trên).

#### "urlscanner" (Thể loại)
Cấu hình cho trình quét URL.

##### "google_api_key" `[string]`
- Cho phép tra cứu API đến API của Google Safe Browsing khi khóa API cần thiết được xác định.

Xem thêm:
- [Google API Console](https://console.developers.google.com/)

##### "maximum_api_lookups" `[int]`
- Số lượng tối đa cho phép của tra cứu API để thực hiện mỗi quét lặp cá nhân. Bởi vì mỗi tra cứu API thêm sẽ thêm vào tổng thời gian cần thiết để hoàn thành mỗi quét lặp, bạn có thể muốn để quy định một giới hạn để đẩy nhanh các quá trình quét tổng thể. Khi thiết lập để 0, không số lượng tối đa cho phép sẽ được áp dụng. Đặt 10 theo mặc định.

##### "maximum_api_lookups_response" `[bool]`
- Phải làm gì nếu số lượng tối đa cho phép của tra cứu API được vượt quá? False = Không làm gì cả (tiếp tục chế biến) [Mặc định]; True = Dấu/Chặn các tập tin.

##### "cache_time" `[int]`
- Kết quả tra cứu API nên được lưu trữ trong (trong giây) bao lâu? Mặc định là 3600 giây (1 giờ).

#### "legal" (Thể loại)
Cấu hình cho các yêu cầu pháp lý.

##### "pseudonymise_ip_addresses" `[bool]`
- Pseudonymise địa chỉ IP khi viết các tập tin nhật ký? True = Vâng [Mặc định]; False = Không.

##### "privacy_policy" `[string]`
- Địa chỉ của chính sách bảo mật liên quan được hiển thị ở chân trang của bất kỳ trang nào được tạo. Chỉ định URL, hoặc để trống để vô hiệu hóa.

#### "supplementary_cache_options" (Thể loại)
Tùy chọn bộ nhớ cache bổ sung. Lưu ý: Việc thay đổi các giá trị này có thể khiến bạn bị đăng xuất.

##### "prefix" `[string]`
- Giá trị được chỉ định ở đây sẽ được thêm vào trước tất cả các khóa mục nhập bộ nhớ cache. Mặc định = "phpMussel_". Khi nhiều bản cài đặt tồn tại trên cùng một máy chủ, điều này có thể hữu ích để giữ các bộ nhớ cache của chúng tách biệt với nhau.

##### "enable_apcu" `[bool]`
- Điều này xác định có nên thử sử dụng APCu để lưu trữ không. Mặc định = True.

##### "enable_memcached" `[bool]`
- Điều này xác định có nên thử sử dụng Memcached để lưu trữ không. Mặc định = False.

##### "enable_redis" `[bool]`
- Điều này xác định có nên thử sử dụng Redis để lưu trữ không. Mặc định = False.

##### "enable_pdo" `[bool]`
- Điều này xác định có nên thử sử dụng PDO để lưu trữ không. Mặc định = False.

##### "memcached_host" `[string]`
- Giá trị máy chủ Memcached. Mặc định = "localhost".

##### "memcached_port" `[int]`
- Giá trị cổng Memcached. Mặc định = "11211".

##### "redis_host" `[string]`
- Giá trị máy chủ Redis. Mặc định = "localhost".

##### "redis_port" `[int]`
- Giá trị cổng Redis. Mặc định = "6379".

##### "redis_timeout" `[float]`
- Giá trị thời gian chờ Redis. Mặc định = "2.5".

##### "pdo_dsn" `[string]`
- Giá trị DSN PDO. Mặc định = "mysql:dbname=phpmussel;host=localhost;port=3306".

__Câu hỏi thường gặp.__ <em><a href="https://github.com/phpMussel/Docs/blob/master/readme.vi.md#HOW_TO_USE_PDO" hreflang="vi">"PDO DSN" là gì? Làm cách nào tôi có thể sử dụng PDO với phpMussel?</a></em>

##### "pdo_username" `[string]`
- Tên người dùng PDO.

##### "pdo_password" `[string]`
- Mật khẩu PDO.

#### "frontend" (Thể loại)
Cấu hình cho các front-end.

##### "frontend_log" `[string]`
- Tập tin cho ghi cố gắng đăng nhập front-end. Chỉ định một tên tập tin, hoặc để trống để vô hiệu hóa.

##### "max_login_attempts" `[int]`
- Số lượng tối đa cố gắng đăng nhập front-end. Mặc định = 5.

##### "numbers" `[string]`
- Làm thế nào để bạn thích số được hiển thị? Chọn ví dụ có vẻ chính xác nhất cho bạn.

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
- Xác định thuật toán nào sẽ sử dụng cho tất cả các mật khẩu và phiên trong tương lai.

```
default_algo
├─PASSWORD_DEFAULT ("PASSWORD_DEFAULT")
├─PASSWORD_BCRYPT ("PASSWORD_BCRYPT")
├─PASSWORD_ARGON2I ("PASSWORD_ARGON2I")
└─PASSWORD_ARGON2ID ("PASSWORD_ARGON2ID (PHP >= 7.3.0)")
```

##### "theme" `[string]`
- Tính thẩm mỹ để sử dụng cho giao diện người dùng phpMussel.

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
└─…Khác
```

##### "magnification" `[float]`
- Phóng to chữ. Mặc định = 1.

##### "custom_header" `[string]`
- Được chèn dưới dạng HTML ở đầu tất cả các trang front-end. Điều này có thể hữu ích trong trường hợp bạn muốn bao gồm biểu trưng trang web, tiêu đề được cá nhân hóa, tập lệnh, hoặc tương tự ở tất cả các trang như vậy.

##### "custom_footer" `[string]`
- Được chèn dưới dạng HTML ở cuối tất cả các trang front-end. Điều này có thể hữu ích trong trường hợp bạn muốn bao gồm thông báo pháp lý, liên kết liên hệ, thông tin doanh nghiệp, hoặc tương tự ở tất cả các trang như vậy.

#### "web" (Thể loại)
Cấu hình cho trình xử lý tải lên.

##### "uploads_log" `[string]`
- Trường hợp tất cả các tải lên bị chặn nên được đăng nhập. Chỉ định một tên tập tin, hoặc để trống để vô hiệu hóa.

##### "forbid_on_block" `[bool]`
- phpMussel nên gửi 403 Forbidden chúng với các thông điệp tải lên tập tin bị chặn, hoặc chỉ sử dụng 200 OK? False = Không (200); True = Vâng (403) [Mặc định].

##### "unsupported_media_type_header" `[bool]`
- phpMussel có nên gửi tiêu đề 415 khi tải lên bị chặn do các loại tập tin nằm trong danh sách đen không? Khi true, cài đặt này thay thế `forbid_on_block`. False = Không [Mặc định]; True = Vâng.

##### "max_uploads" `[int]`
- Số lượng tối đa của tập tin cho phép để quét trong khi quét tập tin tải lên trước khi hủy bỏ quá trình quét và thông báo cho người dùng rằng họ đang tải lên quá nhiều cùng một lúc! Trong lý thuyết, cung cấp bảo vệ chống lại một cuộc tấn công nhờ đó mà một kẻ tấn công cố gắng DDoS hệ thống hay CMS của bạn bằng cách quá tải phpMussel để làm chậm quá trình PHP đến khi nó dừng lại. Đề xuất: 10. Bạn có thể muốn tăng hoặc giảm số này tùy thuộc vào tốc độ của phần cứng của bạn. Chú ý rằng con số này không tính đến hoặc bao gồm các nội dung của kho lưu trữ.

##### "ignore_upload_errors" `[bool]`
- Nói chung, tùy chọn này nên bị vô hiệu hóa, trừ khi nó cần thiết cho chức năng đúng của phpMussel trên hệ thống cụ thể của bạn. Thông thường, khi bị vô hiệu, khi phpMussel phát hiện sự hiện diện của elements (yếu tố) trong array `$_FILES`, nó sẽ cố gắng để bắt đầu quét của các tập tin mà những yếu tố đại diện, và, nếu những yếu tố này là trống, phpMussel sẽ trả về thông báo lỗi. Đây là hành vi thích hợp cho phpMussel. Tuy nhiên, đối với một số CMS, phần tử rỗng trong `$_FILES` có thể xảy ra như là kết quả của các hành vi tự nhiên của những CMS, hay lỗi có thể được báo cáo khi không có bất kỳ, và trong trường hợp này, các hành vi tự nhiên cho phpMussel sẽ gây trở ngại với các hành vi bình thường của những CMS. Nếu một tình huống như vậy xảy ra cho bạn, bật tùy chọn này sẽ hướng dẫn phpMussel không cố gắng để bắt đầu quét cho phần tử rỗng, bỏ qua chúng khi tìm thấy và không trả lại bất kỳ thông báo lỗi liên quan, do đó cho phép tiếp tục của yêu cầu trang. False = TẮT; True = TRÊN.

##### "theme" `[string]`
- Tính thẩm mỹ để sử dụng cho trang "Sự tải lên đã bị từ chối".

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
└─…Khác
```

##### "magnification" `[float]`
- Phóng to chữ. Mặc định = 1.

##### "custom_header" `[string]`
- Được chèn dưới dạng HTML ở đầu tất cả các trang "sự tải lên đã bị từ chối". Điều này có thể hữu ích trong trường hợp bạn muốn bao gồm biểu trưng trang web, tiêu đề được cá nhân hóa, tập lệnh, hoặc tương tự ở tất cả các trang như vậy.

##### "custom_footer" `[string]`
- Được chèn dưới dạng HTML ở cuối tất cả các trang "sự tải lên đã bị từ chối". Điều này có thể hữu ích trong trường hợp bạn muốn bao gồm thông báo pháp lý, liên kết liên hệ, thông tin doanh nghiệp, hoặc tương tự ở tất cả các trang như vậy.

#### "phpmailer" (Thể loại)
Cấu hình cho PHPMailer (được sử dụng để xác thực hai yếu tố).

##### "event_log" `[string]`
- Một tập tin để ghi nhật ký tất cả các sự kiện liên quan đến PHPMailer. Chỉ định một tên tập tin, hoặc để trống để vô hiệu hóa.

##### "enable_two_factor" `[bool]`
- Chỉ thị này xác định có nên sử dụng 2FA cho tài khoản front-end hay không.

##### "enable_notifications" `[string]`
- Nếu bạn muốn được thông báo qua email khi tải lên bị chặn, hãy chỉ định địa chỉ email người nhận ở đây.

##### "skip_auth_process" `[bool]`
- Đặt chỉ thị này thành `true` chỉ thị cho PHPMailer bỏ qua quy trình xác thực thông thường thường xảy ra khi gửi email qua SMTP. Điều này nên tránh, bởi vì bỏ qua quá trình này có thể tiết lộ email gửi đến các cuộc tấn công MITM, nhưng có thể cần thiết trong trường hợp quá trình này ngăn PHPMailer kết nối với máy chủ SMTP.

##### "host" `[string]`
- Máy chủ SMTP để sử dụng cho email gửi đi.

##### "port" `[int]`
- Số cổng để sử dụng cho email gửi đi. Mặc định = 587.

##### "smtp_secure" `[string]`
- Giao thức sử dụng khi gửi email qua SMTP (TLS hoặc SSL).

```
smtp_secure
├─default ("-")
├─tls ("TLS")
└─ssl ("SSL")
```

##### "smtp_auth" `[bool]`
- Chỉ thị này xác định xem có nên xác thực các phiên SMTP (thường nên để lại một mình).

##### "username" `[string]`
- Tên người dùng để sử dụng khi gửi email qua SMTP.

##### "password" `[string]`
- Mật khẩu để sử dụng khi gửi email qua SMTP.

##### "set_from_address" `[string]`
- Địa chỉ người gửi để trích dẫn khi gửi email qua SMTP.

##### "set_from_name" `[string]`
- Tên người gửi để trích dẫn khi gửi email qua SMTP.

##### "add_reply_to_address" `[string]`
- Địa chỉ trả lời để trích dẫn khi gửi email qua SMTP.

##### "add_reply_to_name" `[string]`
- Tên trả lời để trích dẫn khi gửi email qua SMTP.

---


### 6. <a name="SECTION6"></a>ĐỊNH DẠNG CỦA CHỬ KÝ

*Xem thêm:*
- *["Chữ ký" là gì?](#user-content-WHAT_IS_A_SIGNATURE)*

9 byte đầu tiên `[x0-x8]` của một tập tin chữ ký cho phpMussel là `phpMussel`, và hoạt động như một "số ma thuật" (magic number), để xác định chúng như tập tin chữ ký (điều này giúp ngăn ngừa phpMussel vô tình cố gắng sử dụng các tập tin mà không phải là tập tin chữ ký). Byte tiếp theo `[x9]` xác định loại tập tin chữ ký, mà phpMussel phải biết để có thể giải thích chính xác các tập tin chữ ký. Các loại tập tin chữ ký sau đây được nhận dạng:

Loại | Byte | Sự miêu tả
---|---|---
`General_Command_Detections` | `0?` | Cho các tập tin chữ ký CSV (giá trị được phân cách bằng dấu phẩy). Giá trị (chữ ký) là các chuỗi được mã hoá bằng hệ thập lục phân để tìm kiếm trong các tập tin. Chữ ký ở đây không có bất kỳ tên hoặc các chi tiết khác (chỉ có các chuỗi để phát hiện).
`Filename` | `1?` | Cho các chữ ký tên tập tin.
`Hash` | `2?` | Cho các chữ ký băm.
`Standard` | `3?` | Cho các tập tin chữ ký mà làm việc trực tiếp với nội dung tập tin.
`Standard_RegEx` | `4?` | Cho các tập tin chữ ký mà làm việc trực tiếp với nội dung tập tin. Chữ ký có thể chứa các biểu thức chính quy.
`Normalised` | `5?` | Cho các tập tin chữ ký mà làm việc với nội dung tập tin bình thường hóa ANSI.
`Normalised_RegEx` | `6?` | Cho các tập tin chữ ký mà làm việc với nội dung tập tin bình thường hóa ANSI. Chữ ký có thể chứa các biểu thức chính quy.
`HTML` | `7?` | Cho các tập tin chữ ký mà làm việc với nội dung tập tin bình thường hóa HTML.
`HTML_RegEx` | `8?` | Cho các tập tin chữ ký mà làm việc với nội dung tập tin bình thường hóa HTML. Chữ ký có thể chứa các biểu thức chính quy.
`PE_Extended` | `9?` | Cho các tập tin chữ ký mà làm việc với siêu dữ liệu PE (nhưng không phải siêu dữ liệu PE phần).
`PE_Sectional` | `A?` | Cho các tập tin chữ ký mà làm việc với siêu dữ liệu PE phần.
`Complex_Extended` | `B?` | Cho các tập tin chữ ký mà làm việc với các quy tắc khác nhau dựa trên siêu dữ liệu mở rộng tạo bởi phpMussel.
`URL_Scanner` | `C?` | Cho các tập tin chữ ký mà làm việc với các URL.

Byte kế tiếp `[x10]` là một dòng mới `[0A]`, và kết luận tiêu đề của tập tin chữ ký cho phpMussel.

Mỗi dòng không rỗng sau đó là một chữ ký hoặc quy tắc. Mỗi chữ ký hoặc quy tắc chiếm một dòng. Các định dạng chữ ký được hỗ trợ được mô tả dưới đây.

#### *CHỮ KÝ CHO TÊN TẬP TIN*
Tất cả các chữ ký cho tên tập tin tuân theo các định dạng:

`NAME:FNRX`

NAME là tên cho các chữ ký và FNRX là mô hình biểu thức chính quy để kiểm tra tên tập tin (không mã hóa).

#### *CHỮ KÝ BĂM*
Tất cả các chữ ký băm tuân theo các định dạng:

`HASH:FILESIZE:NAME`

HASH là băm (thường là MD5) của toàn bộ tập tin, FILESIZE là tổng dung lượng tập tin và NAME là tên cho các chữ ký.

#### *CHỮ KÝ PHẦN PE*
Tất cả các chữ ký phần PE tuân theo các định dạng:

`SIZE:HASH:NAME`

HASH là băm MD5 của một phần của một tập tin PE, SIZE là tổng kích thước của phần đó và NAME là tên cho các chữ ký.

#### *CHỮ KÝ KÉO DÀI PE*
Tất cả các chữ ký kéo dài PE tuân theo các định dạng:

`$VAR:HASH:SIZE:NAME`

$VAR là tên của các biến PE để kiểm tra, HASH là băm MD5 của biến đó, SIZE là tổng kích thước biến và NAME là tên cho các chữ ký.

#### *CHỮ KÝ KÉO DÀI PHỨC TẠP*
Chữ ký kéo dài phức tạp là khá khác nhau với các loại khác của chữ ký có thể với phpMussel, trong ý nghĩa rằng những gì họ đang kiểm tra cho được quy định bởi những chữ ký tự và họ có thể kiểm tra cho nhiều tiêu chí. Các tiêu chí được giới hạn bởi ";" và các loại kiểm tra và dữ liệu kiểm tra cho từng tiêu chí được giới hạn bởi ":" như vậy mà định dạng cho những chữ ký trông hơi giống như:

`$Biến_Số1:Một_Số_Dữ_Liệu;$Biến_Số2:Một_Số_Dữ_Liệu;Tên_Chữ_Ký`

#### *MỌI THỨ KHÁC*
Tất cả các chữ ký khác làm theo các định dạng:

`NAME:HEX:FROM:TO`

NAME là tên cho các chữ ký và HEX là một phân khúc thập lục phân mã hóa của các tập tin dự định để được xuất hiện bởi các chữ ký. FROM và TO là thông số tùy chọn, cho thấy nơi trong nguồn dữ liệu, bắt đầu và kết thúc, để kiểm tra lại.

#### *BIỂU THỨC CHÍNH QUY*
Bất kỳ cách thức biểu thức chính quy hiểu và xử lý một cách chính xác qua PHP cũng nên được hiểu hiểu và xử lý một cách chính xác bởi phpMussel và chữ ký của nó. Tuy nhiên, tôi muốn đề nghị lấy hết sức thận trọng khi viết chữ ký biểu thức chính quy mới, bởi vì, nếu bạn không hoàn toàn chắc chắn bạn đang làm gì vậy, có thể có kết quả rất bất thường hay bất ngờ. Nhìn vào các mã nguồn nếu bạn không hoàn toàn về bối cảnh rằng họ đang phân tích cú pháp. Ngoài ra, nhớ lại rằng tất cả mọi thứ (ngoại trừ tên tập tin, cú pháp, siêu dữ liệu kho lưu trữ và mẫu MD5) phải được mã hóa hệ thập lục phân!

---


### 7. <a name="SECTION7"></a>NHỮNG VẤN ĐỀ HỢP TƯƠNG TÍCH

#### KHẢ NĂNG TƯƠNG THÍCH PHẦN MỀM CHỐNG VI RÚT

Các vấn đề tương thích giữa phpMussel và một số nhà cung cấp chống vi-rút đã được biết là đôi khi xảy ra trong quá khứ, vì vậy xấp xỉ cứ sau vài tháng, tôi kiểm tra các phiên bản mới nhất của cơ sở mã phpMussel chống lại Virus Total, để xem liệu có bất kỳ vấn đề nào được báo cáo ở đó không. Khi các vấn đề được báo cáo ở đó, tôi liệt kê các vấn đề được báo cáo ở đây, trong tài liệu.

Khi tôi kiểm tra gần đây nhất (2022.05.12), không có vấn đề nào được báo cáo.

Tôi không kiểm tra các tập tin chữ ký, tài liệu hoặc nội dung ngoại vi khác. Các tập tin chữ ký luôn gây ra một số sai tích cực khi các giải pháp chống vi-rút khác phát hiện ra chúng. Do đó tôi rất muốn giới thiệu, nếu bạn có kế hoạch cài đặt phpMussel tại một máy đã có giải pháp chống vi-rút khác, đặt tập tin chữ ký của phpMussel trong danh sách trắng của bạn.

*Xem thêm: [Biểu đồ tương thích](https://maikuolan.github.io/Compatibility-Charts/).*

---


### 8. <a name="SECTION8"></a>NHỮNG CÂU HỎI THƯỜNG GẶP (FAQ)

- ["Chữ ký" là gì?](#user-content-WHAT_IS_A_SIGNATURE)
- ["Sai tích cực" là gì?](#user-content-WHAT_IS_A_FALSE_POSITIVE)
- [Tần suất cập nhật chữ ký là bao nhiêu?](#user-content-SIGNATURE_UPDATE_FREQUENCY)
- [Tôi đã gặp một vấn đề trong khi sử dụng phpMussel và tôi không biết phải làm gì về nó! Hãy giúp tôi!](#user-content-ENCOUNTERED_PROBLEM_WHAT_TO_DO)
- [Tôi muốn sử dụng phpMussel v3 với phiên bản PHP cũ hơn 7.2.0; Bạn có thể giúp?](#user-content-MINIMUM_PHP_VERSION_V3)
- [Tôi có thể sử dụng một cài đặt phpMussel để bảo vệ nhiều tên miền?](#user-content-PROTECT_MULTIPLE_DOMAINS)
- [Tôi không muốn lãng phí thời gian bằng cách cài đặt này và đảm bảo rằng nó hoạt động với trang web của tôi; Tôi có thể trả tiền cho bạn để làm điều đó cho tôi?](#user-content-PAY_YOU_TO_DO_IT)
- [Tôi có thể thuê bạn hay bất kỳ nhà phát triển nào của dự án này cho công việc riêng tư?](#user-content-HIRE_FOR_PRIVATE_WORK)
- [Tôi cần sửa đổi chuyên môn, tuỳ chỉnh, vv; Bạn có thể giúp?](#user-content-SPECIALIST_MODIFICATIONS)
- [Tôi là nhà phát triển, nhà thiết kế trang web, hay lập trình viên. Tôi có thể chấp nhận hay cung cấp các công việc liên quan đến dự án này không?](#user-content-ACCEPT_OR_OFFER_WORK)
- [Tôi muốn đóng góp cho dự án; Tôi có thể làm được điều này?](#user-content-WANT_TO_CONTRIBUTE)
- [Làm thế nào để truy cập chi tiết cụ thể về các tập tin khi chúng được quét?](#user-content-SCAN_DEBUGGING)
- [Danh sách đen – Danh sách trắng – Danh sách xám – Họ là gì, và làm cách nào để sử dụng chúng?](#user-content-BLACK_WHITE_GREY)
- ["PDO DSN" là gì? Làm cách nào tôi có thể sử dụng PDO với phpMussel?](#user-content-HOW_TO_USE_PDO)
- [Chức năng tải lên của tôi không đồng bộ (ví dụ, sử dụng ajax, ajaj, json, vv). Tôi không thấy bất kỳ thông báo hoặc cảnh báo đặc biệt nào khi tải lên bị chặn. Chuyện gì đang xảy ra vậy?](#user-content-AJAX_AJAJ_JSON)
- [phpMussel có thể phát hiện EICAR không?](#user-content-DETECT_EICAR)

#### <a name="WHAT_IS_A_SIGNATURE"></a>"Chữ ký" là gì?

Trong bối cảnh của phpMussel, "chữ ký" đề cập đến dữ liệu hoạt động như một chỉ thị hay cơ chế định danh cho một cái gì đó cụ thể mà chúng tôi đang tìm kiếm, thường là một đoạn nhỏ và không nguy hiểm của một cái gì đó lớn hơn và có hại, chẳng hạn như vi rút hoặc trojan, hoặc, một tập tin băm, hoặc các chỉ số nhận dạng tương tự khác, và nó thường bao gồm một nhãn, và một số dữ liệu khác để giúp cung cấp bối cảnh bổ sung mà có thể được sử dụng bởi phpMussel để xác định cách tốt nhất để tiến hành khi nó gặp những gì chúng ta đang tìm kiếm.

#### <a name="WHAT_IS_A_FALSE_POSITIVE"></a>"Sai tích cực" là gì?

Nghĩa của "sai tích cực" (*hay: "lỗi sai tích cực"; "báo động giả"*; Tiếng Anh: *false positive*; *false positive error*; *false alarm*), mô tả rất đơn giản, và trong một bối cảnh tổng quát, được sử dụng khi kiểm tra cho một điều kiện, để tham khảo các kết quả của bài kiểm tra, khi kết quả là tích cực (hay, điều kiện được xác định là "tích cực", hay "đúng"), nhưng dự kiến sẽ được (hay cần phải có được) tiêu cực (hay, điều kiện, thực tế, là "tiêu cực", hay "sai"). "Sai tích cực" có thể được coi là điều tương tự như "khóc sói" (theo đó các điều kiện đang được kiểm tra là liệu có con sói gần đàn, điều kiện là "sai" bởi vì không có con sói gần đàn, và điều kiện được báo cáo là "tích cực" bởi các người chăn bằng cách gọi "sói, sói"), hay tương tự như tình huống trong thử nghiệm y tế theo đó một bệnh nhân được chẩn đoán là có một số bệnh, trong khi thực tế, họ không có bất kỳ số bệnh.

Một số các từ ngữ khác sử dụng là "đúng tích cực", "đúng tiêu cực" và "sai tiêu cực". "Đúng tích cực" đề cập đến khi các kết quả kiểm tra và tình trạng thực tế của điều kiện là cả hai đúng (hay "tích cực"), và "đúng tiêu cực" đề cập đến khi các kết quả kiểm tra và tình trạng thực tế của điều kiện là cả hai sai (hay "tiêu cực"); "Đúng tích cực" hay "đúng tiêu cực" được coi là một "suy luận đúng". Các phản đề của "sai tích cực" là "sai tiêu cực"; "Sai tiêu cực" đề cập đến khi các kết quả kiểm tra là tiêu cực (hay, điều kiện được xác định là "tiêu cực", hay "sai"), nhưng dự kiến sẽ được (hay cần phải có được) tích cực (hay, điều kiện, thực tế, là "tích cực", hay "đúng").

Trong bối cảnh phpMussel, các từ ngữ đề cập đến chữ ký của phpMussel và các tập tin mà họ chặn. Khi phpMussel chặn một tập tin bởi vì chữ ký của nó là xấu, lỗi thời hay không chính xác, nhưng không nên làm như vậy, hay khi nó làm như vậy vì những lý do sai, chúng tôi đề cập đến sự kiện này như "sai tích cực". Khi phpMussel không chặn một tập tin đó nên đã bị chặn, bởi vì mối đe dọa khó lường, chữ ký mất tích hay thiếu sót trong chữ ký, chúng tôi đề cập đến sự kiện này như "phát hiện mất tích" (which is analogous to a "sai tiêu cực").

Điều này có thể được tóm tắt bằng bảng dưới đây:

&nbsp; | phpMussel *KHÔNG* nên chặn một tập tin | phpMussel *NÊN* chặn một tập tin
---|---|---
phpMussel *KHÔNG* chặn một tập tin | Đúng tiêu cực (suy luận đúng) | Phát hiện mất tích (điều tương tự như sai tiêu cực)
phpMussel chặn một tập tin | __Sai tích cực__ | Đúng tích cực (suy luận đúng)

#### <a name="SIGNATURE_UPDATE_FREQUENCY"></a>Tần suất cập nhật chữ ký là bao nhiêu?

Tần suất cập nhật thay đổi tùy thuộc vào các tập tin chữ ký trong câu hỏi. Nói chung là, tất cả các người bảo trì cho các tất cả tập tin chữ ký cố gắng đảm bảo rằng chữ ký của họ được cập nhật càng nhiều càng tốt, nhưng bởi vì tất cả chúng ta đều có nhiều cam kết khác, cuộc sống của chúng ta bên ngoài dự án, và bởi vì không ai trong chúng ta được bồi thường tài chính (hay được thanh toán) cho các nỗ lực dự án của chúng tôi, Một lịch trình cập nhật chính xác không thể được đảm bảo. Nói chung là, chữ ký được cập nhật bất cứ khi nào có đủ thời gian để cập nhật chúng. Trợ giúp luôn được đánh giá cao nếu bạn sẵn sàng cung cấp bất kỳ.

#### <a name="ENCOUNTERED_PROBLEM_WHAT_TO_DO"></a>Tôi đã gặp một vấn đề trong khi sử dụng phpMussel và tôi không biết phải làm gì về nó! Hãy giúp tôi!

- Bạn đang sử dụng phiên bản mới nhất của phần mềm? Bạn đang sử dụng phiên bản mới nhất của tập tin chữ ký của bạn? Nếu câu trả lời cho một trong hai những câu hỏi này là không, cố gắng cập nhật mọi thứ đầu tiên, và kiểm tra nếu vấn đề vẫn còn. Nếu nó vẫn còn, tiếp tục đọc.
- Bạn đã kiểm tra tất cả các tài liệu chưa? Nếu không, xin hãy làm như vậy. Nếu vấn đề không thể giải quyết bằng cách sử dụng tài liệu, hãy tiếp tục đọc.
- Bạn đã kiểm tra các **[trang issues](https://github.com/phpMussel/phpMussel/issues)** chưa, để xem nếu vấn đề đã được đề cập trước đó? Nếu nó đã được đề cập trước đó, kiểm tra nếu có bất kỳ đề xuất, ý tưởng, hay giải pháp đã được cung cấp, và làm theo như là cần thiết để cố gắng giải quyết vấn đề.
- Nếu vấn đề vẫn còn, vui lòng hãy tìm sự giúp đỡ về nó bằng cách tạo ra một issue mới trên trang issues.

#### <a name="MINIMUM_PHP_VERSION_V3"></a>Tôi muốn sử dụng phpMussel v3 với phiên bản PHP cũ hơn 7.2.0; Bạn có thể giúp?

Không. PHP >= 7.2.0 là yêu cầu tối thiểu đối với phpMussel v3.

*Xem thêm: [Biểu đồ tương thích](https://maikuolan.github.io/Compatibility-Charts/).*

#### <a name="PROTECT_MULTIPLE_DOMAINS"></a>Tôi có thể sử dụng một cài đặt phpMussel để bảo vệ nhiều tên miền?

Vâng.

#### <a name="PAY_YOU_TO_DO_IT"></a>Tôi không muốn lãng phí thời gian bằng cách cài đặt này và đảm bảo rằng nó hoạt động với trang web của tôi; Tôi có thể trả tiền cho bạn để làm điều đó cho tôi?

Có lẽ. Điều này được xem xét theo từng trường hợp cụ thể. Cho chúng tôi biết những gì bạn cần, những gì bạn đang cung cấp, và chúng tôi sẽ cho bạn biết liệu chúng tôi có thể giúp đỡ hay không.

#### <a name="HIRE_FOR_PRIVATE_WORK"></a>Tôi có thể thuê bạn hay bất kỳ nhà phát triển nào của dự án này cho công việc riêng tư?

*Xem ở trên.*

#### <a name="SPECIALIST_MODIFICATIONS"></a>Tôi cần sửa đổi chuyên môn, tuỳ chỉnh, vv; Bạn có thể giúp?

*Xem ở trên.*

#### <a name="ACCEPT_OR_OFFER_WORK"></a>Tôi là nhà phát triển, nhà thiết kế trang web, hay lập trình viên. Tôi có thể chấp nhận hay cung cấp các công việc liên quan đến dự án này không?

Vâng. Giấy phép của chúng tôi không cấm điều này.

#### <a name="WANT_TO_CONTRIBUTE"></a>Tôi muốn đóng góp cho dự án; Tôi có thể làm được điều này?

Vâng. Đóng góp cho dự án rất được hoan nghênh. Vui lòng xem "CONTRIBUTING.md" để biết thêm thông tin.

#### <a name="SCAN_DEBUGGING"></a>Làm thế nào để truy cập chi tiết cụ thể về các tập tin khi chúng được quét?

Bạn có thể truy cập chi tiết cụ thể về các tập tin khi chúng được quét bằng cách gán một mảng để sử dụng cho mục đích này trước khi hướng dẫn phpMussel để quét chúng.

Trong ví dụ dưới đây, `$Foo` được gán cho mục đích này. Sau khi quét `/đường/dẫn/tập/tin/...`, thông tin chi tiết về các tập tin chứa bởi `/đường/dẫn/tập/tin/...` sẽ được chứa bởi `$Foo`.

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);

$Scanner->setScanDebugArray($Foo);

$Results = $Scanner->scan('/đường/dẫn/tập/tin/...');

var_dump($Foo);
```

Mảng này là đa chiều. Các phần tử đại diện cho các tập tin được quét và các phần tử con đại diện cho các chi tiết về các tập tin này. Các phần tử con này như sau:

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

*† - Không được cung cấp với kết quả lưu trữ (chỉ cung cấp cho các kết quả quét mới).*

*‡ - Chỉ cung cấp khi quét tập tin PE.*

Nếu bạn muốn, mảng này có thể bị phá hủy bằng cách sử dụng sau:

```PHP
$Scanner->destroyScanDebugArray($Foo);
```

#### <a name="BLACK_WHITE_GREY"></a>Danh sách đen – Danh sách trắng – Danh sách xám – Họ là gì, và làm cách nào để sử dụng chúng?

Các thuật ngữ mang ý nghĩa khác nhau trong các ngữ cảnh khác nhau. Trong phpMussel, có ba ngữ cảnh mà các thuật ngữ này được sử dụng: Đáp ứng kích thước tập tin, đáp ứng loại tập tin, và danh sách xám cho chữ ký.

Để đạt được một kết quả mong muốn với chi phí tối thiểu để xử lý, có một số điều đơn giản mà phpMussel có thể kiểm tra trước khi thực sự quét các tập tin, chẳng hạn như các kích thước, các tên, và các phần mở rộng của tập tin. Ví dụ; Nếu một tập tin quá lớn, hay nếu phần mở rộng của tập tin đó cho biết loại tập tin mà chúng tôi không muốn cho phép trên các trang web của chúng tôi, chúng tôi có thể đánh dấu tập tin ngay lập tức, và không cần quét nó.

Đáp ứng kích thước tập tin là cách mà phpMussel đáp ứng khi tập tin vượt quá giới hạn được chỉ định. Mặc dù không có danh sách thực tế, một tập tin có thể được xem là có hiệu quả trong danh sách đen, danh sách trắng hoặc danh sách xám, dựa trên kích thước của tập tin. Hai chỉ thị cấu hình khác biệt tồn tại để chỉ định một giới hạn và đáp ứng mong muốn tương ứng.

Đáp ứng loại tập tin là cách mà phpMussel đáp ứng với phần mở rộng của tập tin. Có ba chỉ thị cấu hình khác biệt tồn tại để chỉ định các phần mở rộng nào sẽ nằm trong danh sách đen, danh sách trắng hoặc danh sách xám. Một tập tin có thể được xem xét có hiệu quả trên danh sách đen, danh sách trắng hoặc danh sách xám nếu phần mở rộng của nó khớp với bất kỳ phần mở rộng được chỉ định tương ứng.

Trong hai ngữ cảnh này, nằm trong danh sách trắng có nghĩa là không được quét hoặc gắn cờ; nằm trong danh sách đen có nghĩa là nó phải được gắn cờ (và do đó không cần phải quét nó); và nằm trong danh sách xám có nghĩa là phân tích thêm là cần thiết để xác định xem chúng ta nên gắn cờ nó (và như vậy, nó nên được quét).

Danh sách xám cho chữ ký là một danh sách các chữ ký mà về cơ bản sẽ được bỏ qua (điều này đã được đề cập trước đó trong tài liệu). Khi một chữ ký trên danh sách xám được kích hoạt, phpMussel tiếp tục làm việc thông qua các chữ ký của nó và không có hành động cụ thể liên quan đến chữ ký trên danh sách xám. Không có danh sách đen chữ ký, bởi vì hành vi ngụ ý là hành vi bình thường cho chữ ký kích hoạt, và không có danh sách trắng chữ ký, bởi vì hành vi ngụ ý sẽ không thực sự có ý nghĩa trong việc xem xét như thế nào phpMussel hoạt động bình thường và những điều đã có thể đã làm.

Danh sách xám chữ ký rất hữu ích nếu bạn cần giải quyết các vấn đề gây ra bởi một chữ ký cụ thể mà không cần vô hiệu hoặc gỡ cài đặt toàn bộ tập tin chữ ký.

#### <a name="HOW_TO_USE_PDO"></a>"PDO DSN" là gì? Làm cách nào tôi có thể sử dụng PDO với phpMussel?

"PDO" là từ viết tắt của "[PHP Data Objects](https://www.php.net/manual/en/intro.pdo.php)" (đối tượng dữ liệu PHP). Nó cung cấp một giao diện cho PHP để có thể kết nối với một số hệ thống cơ sở dữ liệu thường được sử dụng bởi các ứng dụng PHP khác nhau.

"DSN" là từ viết tắt của "[data source name](https://en.wikipedia.org/wiki/Data_source_name)" (tên nguồn dữ liệu). "PDO DSN" mô tả với PDO cách nó sẽ kết nối với cơ sở dữ liệu.

phpMussel cung cấp tùy chọn để sử dụng PDO cho mục đích bộ nhớ cache. Để điều này hoạt động chính xác, bạn sẽ cần định cấu hình phpMussel phù hợp, do đó cho phép PDO, tạo cơ sở dữ liệu mới cho phpMussel để sử dụng (nếu bạn chưa có cơ sở dữ liệu cho phpMussel để sử dụng), và tạo một bảng mới trong cơ sở dữ liệu của bạn theo cấu trúc được mô tả dưới đây.

Khi kết nối cơ sở dữ liệu thành công, nhưng bảng cần thiết không tồn tại, nó sẽ cố gắng tạo nó tự động. Tuy nhiên, hành vi này đã không được thử nghiệm rộng rãi và thành công không thể được đảm bảo.

Tất nhiên, điều này chỉ áp dụng nếu bạn thực sự muốn phpMussel sử dụng PDO. Nếu bạn đủ hạnh phúc cho phpMussel để sử dụng bộ đệm ẩn phẳng (theo cấu hình mặc định của nó) hoặc bất kỳ tùy chọn bộ nhớ cache nào khác được cung cấp, bạn sẽ không cần phải lo lắng về việc thiết lập cơ sở dữ liệu, bảng, vv.

Cấu trúc được mô tả dưới đây sử dụng "phpmussel" làm tên cơ sở dữ liệu của nó, nhưng bạn có thể sử dụng bất kỳ tên nào bạn muốn cho cơ sở dữ liệu của mình, miễn là cùng tên đó được sao chép trong cấu hình DSN của bạn.

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

Chỉ thị cấu hình `pdo_dsn` của phpMussel nên được cấu hình như mô tả bên dưới.

```
Tùy thuộc vào trình điều khiển cơ sở dữ liệu nào được sử dụng...
├─4d (Cảnh báo: Thử nghiệm, chưa được kiểm tra, không được khuyến khích!)
│ │
│ │         ╔═══════╗
│ └─4D:host=localhost;charset=UTF-8
│           ╚╤══════╝
│            └Máy chủ để kết nối với để tìm cơ sở dữ liệu.
├─cubrid
│ │
│ │             ╔═══════╗      ╔═══╗        ╔═════╗
│ └─cubrid:host=localhost;port=33000;dbname=example
│               ╚╤══════╝      ╚╤══╝        ╚╤════╝
│                │              │            └Tên của cơ sở dữ liệu để sử dụng.
│                │              │
│                │              └Số cổng để kết nối với máy chủ.
│                │
│                └Máy chủ để kết nối với để tìm cơ sở dữ liệu.
├─dblib
│ │
│ │ ╔═══╗      ╔═══════╗        ╔═════╗
│ └─dblib:host=localhost;dbname=example
│   ╚╤══╝      ╚╤══════╝        ╚╤════╝
│    │          │                └Tên của cơ sở dữ liệu để sử dụng.
│    │          │
│    │          └Máy chủ để kết nối với để tìm cơ sở dữ liệu.
│    │
│    └Những giá trị khả thi: "mssql", "sybase", "dblib".
├─firebird
│ │
│ │                 ╔═══════════════════╗
│ └─firebird:dbname=/path/to/database.fdb
│                   ╚╤══════════════════╝
│                    ├Có thể là một đường dẫn đến một tập tin cơ sở dữ liệu
│                    │cục bộ.
│                    │
│                    ├Có thể kết nối với một máy chủ và số cổng.
│                    │
│                    └Bạn nên tham khảo tài liệu Firebird nếu bạn muốn sử dụng
│                     trình điều khiển này.
├─ibm
│ │
│ │         ╔═════╗
│ └─ibm:DSN=example
│           ╚╤════╝
│            └Các cơ sở dữ liệu được phân loại để kết nối với.
├─informix
│ │
│ │              ╔═════╗
│ └─informix:DSN=example
│                ╚╤════╝
│                 └Các cơ sở dữ liệu được phân loại để kết nối với.
├─mysql (Được khuyến nghị nhất!)
│ │
│ │              ╔═════╗      ╔═══════╗      ╔══╗
│ └─mysql:dbname=example;host=localhost;port=3306
│                ╚╤════╝      ╚╤══════╝      ╚╤═╝
│                 │            │              └Số cổng để kết nối với máy chủ.
│                 │            │
│                 │            └Máy chủ để kết nối với để tìm cơ sở dữ liệu.
│                 │
│                 └Tên của cơ sở dữ liệu để sử dụng.
├─oci
│ │
│ │            ╔═════╗
│ └─oci:dbname=example
│              ╚╤════╝
│               ├Can refer to the specific catalogued database.
│               │
│               ├Có thể kết nối với một máy chủ và số cổng.
│               │
│               └Bạn nên tham khảo tài liệu Oracle nếu bạn muốn sử dụng
│                trình điều khiển này.
├─odbc
│ │
│ │      ╔═════╗
│ └─odbc:example
│        ╚╤════╝
│         ├Có thể tham khảo cơ sở dữ liệu danh mục cụ thể.
│         │
│         ├Có thể kết nối với một máy chủ và số cổng.
│         │
│         └Bạn nên tham khảo tài liệu ODBC/DB2 nếu bạn muốn sử dụng
│          trình điều khiển này.
├─pgsql
│ │
│ │            ╔═══════╗      ╔══╗        ╔═════╗
│ └─pgsql:host=localhost;port=5432;dbname=example
│              ╚╤══════╝      ╚╤═╝        ╚╤════╝
│               │              │           └Tên của cơ sở dữ liệu để sử dụng.
│               │              │
│               │              └Số cổng để kết nối với máy chủ.
│               │
│               └Máy chủ để kết nối với để tìm cơ sở dữ liệu.
├─sqlite
│ │
│ │        ╔════════╗
│ └─sqlite:example.db
│          ╚╤═══════╝
│           └Đường dẫn đến tập tin cơ sở dữ liệu cục bộ để sử dụng.
└─sqlsrv
  │
  │               ╔═══════╗ ╔══╗          ╔═════╗
  └─sqlsrv:Server=localhost,1521;Database=example
                  ╚╤══════╝ ╚╤═╝          ╚╤════╝
                   │         │             └Tên của cơ sở dữ liệu để sử dụng.
                   │         │
                   │         └Số cổng để kết nối với máy chủ.
                   │
                   └Máy chủ để kết nối với để tìm cơ sở dữ liệu.
```

Nếu bạn không chắc chắn về việc sử dụng cái gì cho một phần cụ thể trong DSN của mình, hãy thử xem trước tiên xem nó có hoạt động như cũ không mà không thay đổi gì.

Lưu ý rằng `pdo_username` và `pdo_password` phải giống với tên người dùng và mật khẩu bạn đã chọn cho cơ sở dữ liệu của mình.

#### <a name="AJAX_AJAJ_JSON"></a>Chức năng tải lên của tôi không đồng bộ (ví dụ, sử dụng ajax, ajaj, json, vv). Tôi không thấy bất kỳ thông báo hoặc cảnh báo đặc biệt nào khi tải lên bị chặn. Chuyện gì đang xảy ra vậy?

Điều này là bình thường. Trang "sự tải lên đã bị từ chối" tiêu chuẩn của phpMussel được phục vụ dưới dạng HTML. Nó phải đủ cho các yêu cầu đồng bộ điển hình, nhưng có lẽ sẽ không đủ nếu chức năng tải lên của bạn đang mong đợi điều gì khác. Nếu chức năng tải lên của bạn không đồng bộ hoặc mong muốn trạng thái tải lên được cung cấp không đồng bộ, có một số điều bạn có thể thử làm để phpMussel phục vụ nhu cầu về chức năng tải lên của bạn.

1. Tạo một mẫu đầu ra tùy chỉnh để phục vụ một cái gì đó ngoài HTML.
2. Tạo một plugin tùy chỉnh để hoàn toàn bỏ qua trang "sự tải lên đã bị từ chối" tiêu chuẩn và yêu cầu trình xử lý tải lên làm một cái gì đó khác khi tải lên bị chặn (có một số hook plugin được cung cấp bởi trình xử lý tải lên có thể hữu ích cho việc này).
3. Vô hiệu hóa hoàn toàn trình xử lý tải lên và thay vào đó chỉ gọi API phpMussel từ bên trong chức năng tải lên của bạn.

#### <a name="DETECT_EICAR"></a>phpMussel có thể phát hiện EICAR không?

Vâng. Chữ ký để phát hiện EICAR được bao gồm trong "tập tin chữ ký biểu thức chính quy chuẩn phpMussel" (`phpmussel_regex.db`). Miễn là tập tin chữ ký đó được cài đặt và kích hoạt, phpMussel sẽ có thể phát hiện EICAR. Vì cơ sở dữ liệu ClamAV cũng bao gồm nhiều chữ ký đặc biệt để phát hiện EICAR, ClamAV có thể dễ dàng phát hiện EICAR, nhưng vì phpMussel chỉ sử dụng một tập hợp con nhỏ hơn trong tổng số chữ ký do ClamAV cung cấp, có thể bản thân chúng sẽ không đủ để phpMussel phát hiện ra EICAR. Khả năng phát hiện nó cũng có thể phụ thuộc vào cấu hình chính xác của bạn.

---


### 9. <a name="SECTION9"></a>THÔNG TIN HỢP PHÁP

#### 9.0 PHẦN MỞ ĐẦU

Phần tài liệu này nhằm mô tả các cân nhắc pháp lý có thể có về việc sử dụng và thực hiện của gói, và cung cấp một số thông tin liên quan cơ bản. Điều này có thể quan trọng đối với một số người dùng như một phương tiện để đảm bảo tuân thủ mọi yêu cầu pháp lý có thể tồn tại ở các quốc gia mà họ hoạt động, và một số người dùng có thể cần phải điều chỉnh chính sách trang web của họ theo thông tin này.

Đầu tiên và quan trọng nhất, xin vui lòng nhận ra rằng tôi (tác giả gói) không phải là luật sư, cũng không phải là một chuyên gia pháp lý đủ điều kiện. Do đó, tôi không đủ tư cách pháp lý để cung cấp tư vấn pháp lý. Ngoài ra, trong một số trường hợp, yêu cầu pháp lý chính xác có thể khác nhau giữa các quốc gia và khu vực pháp lý khác nhau, và các yêu cầu pháp lý khác nhau đôi khi có thể xung đột (chẳng hạn như, ví dụ, trong trường hợp các quốc gia mà ủng hộ [quyền riêng tư](https://vi.wikipedia.org/wiki/Quy%E1%BB%81n_%C4%91%C6%B0%E1%BB%A3c_b%E1%BA%A3o_v%E1%BB%87_%C4%91%E1%BB%9Di_t%C6%B0) và quyền bị lãng quên, so với các quốc gia mà ủng hộ luật lưu giữ dữ liệu). Cũng xem xét việc truy cập vào gói không bị giới hạn ở các quốc gia hoặc khu vực pháp lý cụ thể, và do đó, cơ sở người dùng gói có khả năng đa dạng về mặt địa lý. Những điểm này được xem xét, tôi không ở trong một vị trí để tuyên bố những gì nó có nghĩa là để "tuân thủ về mặt pháp lý" cho tất cả người dùng, trong tất cả các liên quan. Tuy nhiên, tôi hy vọng rằng thông tin trong tài liệu này sẽ giúp bạn tự quyết định về những gì bạn phải làm để duy trì tuân thủ về mặt pháp lý trong bối cảnh của gói. Nếu bạn có bất kỳ nghi ngờ hoặc quan tâm nào về thông tin ở đây, hoặc nếu bạn cần thêm trợ giúp và tư vấn từ góc độ pháp lý, tôi khuyên bạn nên tham khảo ý kiến chuyên gia pháp lý đủ điều kiện.

#### 9.1 TRÁCH NHIỆM PHÁP LÝ

Theo như đã nêu trong giấy phép gói, gói được cung cấp mà không có bất kỳ bảo hành nào. Điều này bao gồm (nhưng không giới hạn) tất cả phạm vi trách nhiệm pháp lý. Gói phần mềm được cung cấp cho bạn để thuận tiện cho bạn, với hy vọng rằng nó sẽ hữu ích, và rằng nó sẽ cung cấp một số lợi ích cho bạn. Tuy nhiên, việc sử dụng hoặc triển khai gói, là lựa chọn của riêng bạn. Bạn không bị buộc phải sử dụng hoặc triển khai gói, nhưng khi bạn làm như vậy, bạn chịu trách nhiệm về quyết định đó. Tôi và những người đóng góp gói khác, không chịu trách nhiệm pháp lý về hậu quả của các quyết định mà bạn đưa ra, bất kể trực tiếp, gián tiếp, ngụ ý, hay nói cách khác.

#### 9.2 BÊN THỨ BA

Tùy thuộc vào cấu hình và triển khai chính xác của nó, gói có thể giao tiếp và chia sẻ thông tin với bên thứ ba trong một số trường hợp. Thông tin này có thể được định nghĩa là "[thông tin nhận dạng cá nhân](https://www.pcworld.com.vn/articles/cong-nghe/an-ninh-mang/2016/05/1248000/thong-tin-ca-nhan-tai-san-rieng-cung-la-tien/)" (PII) trong một số ngữ cảnh, bởi một số khu vực pháp lý.

Thông tin này có thể được các bên thứ ba này sử dụng như thế nào, là tuân theo của chính sách của các bên thứ ba, và nằm ngoài phạm vi của tài liệu này. Tuy nhiên, trong tất cả các trường hợp như vậy, việc chia sẻ thông tin với các bên thứ ba này có thể bị vô hiệu hóa. Trong tất cả các trường hợp như vậy, nếu bạn chọn kích hoạt nó, bạn có trách nhiệm nghiên cứu bất kỳ mối lo ngại nào về sự riêng tư, bảo mật, và việc sử dụng PII của các bên thứ ba này. Nếu có bất kỳ nghi ngờ nào, hoặc nếu bạn không hài lòng với hành vi của các bên thứ ba liên quan đến PII, tốt nhất là nên vô hiệu hóa tất cả việc chia sẻ thông tin với các bên thứ ba này.

Với mục đích minh bạch, loại thông tin được chia sẻ, và với ai, được mô tả dưới đây.

##### 9.2.1 MÁY QUÉT URL

Các URL được tìm thấy trong các tải lên tập tin có thể được chia sẻ với API duyệt web an toàn của Google, tùy thuộc vào cách gói được định cấu hình. API duyệt web an toàn của Google yêu cầu các khóa API để hoạt động chính xác, và do đó được vô hiệu hóa theo mặc định.

*Chỉ thị cấu hình có liên quan:*
- `urlscanner` -> `google_api_key`

##### 9.2.2 VIRUS TOTAL

Khi phpMussel quét một tập tin tải lên, các băm của các tập tin đó có thể được chia sẻ với API Virus Total, tùy thuộc vào cách gói được định cấu hình. Có những kế hoạch để có thể chia sẻ toàn bộ tập tin tại một số thời điểm trong tương lai, nhưng tính năng này không được gói hỗ trợ tại thời điểm này. API Virus Total yêu cầu khóa API để hoạt động chính xác, và do đó được vô hiệu hóa theo mặc định.

Thông tin (bao gồm các tập tin và siêu dữ liệu tập tin có liên quan) được chia sẻ với Virus Total, cũng có thể được chia sẻ với các đối tác, chi nhánh, và nhiều người khác cho mục đích nghiên cứu. Điều này được mô tả chi tiết hơn theo chính sách bảo mật của họ.

*Xem: [Privacy Policy &ndash; VirusTotal](https://support.virustotal.com/hc/en-us/articles/115002168385-Privacy-Policy).*

*Chỉ thị cấu hình có liên quan:*
- `virustotal` -> `vt_public_api_key`

#### 9.3 NHẬT KÝ

Nhật ký là một phần quan trọng của phpMussel vì một số lý do. Khi không có nhật ký, có thể khó để chẩn đoán sai tích cực, để xác định chính xác phpMussel hoạt động tốt như thế nào trong bất kỳ ngữ cảnh cụ thể nào, và để xác định nơi bất cập của nó, và những thay đổi nào có thể cần thiết đối với cấu hình hay chữ ký của nó, để nó có thể tiếp tục hoạt động như dự định. Bất kể, nhật ký có thể không được mong muốn cho tất cả người dùng, và vẫn hoàn toàn tùy chọn. Trong phpMussel, ghi nhật ký bị vô hiệu hóa theo mặc định. Để kích hoạt nó, phpMussel phải được cấu hình cho phù hợp.

Ngoài ra, việc nhật ký có được cho phép hợp pháp hay không, và trong phạm vi được cho phép hợp pháp (ví dụ, các loại thông tin có thể được nhật ký, bao lâu, và trong hoàn cảnh gì), có thể thay đổi, tùy thuộc vào thẩm quyền pháp lý và trong bối cảnh phpMussel được triển khai (ví dụ, nếu bạn đang hoạt động như một cá nhân, như một thực thể công ty, và nếu trên cơ sở thương mại hay phi thương mại). Do đó, nó có thể hữu ích cho bạn để đọc kỹ phần này.

Có nhiều kiểu ghi nhật ký mà phpMussel có thể thực hiện. Các loại ghi nhật ký khác nhau liên quan đến các loại thông tin khác nhau, vì các lý do khác nhau.

##### 9.3.0 NHẬT KÝ QUÉT

Khi được kích hoạt trong cấu hình gói, phpMussel lưu nhật ký của các tập tin mà nó quét. Loại ghi nhật ký này có sẵn ở hai định dạng khác nhau:
- Tập tin nhật ký mà có thể được đọc bởi con người.
- Tập tin nhật ký được tuần tự hóa.

Các mục nhập vào một tập tin nhật ký mà có thể được đọc bởi con người thường trông giống như sau (ví dụ):

```
Sun, 19 Jul 2020 13:33:31 +0800 Đã bắt đầu.
→ Đang kiểm tra "ascii_standard_testfile.txt".
─→ Đã được phát hiện phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
Sun, 19 Jul 2020 13:33:31 +0800 Hoàn thành.
```

Mục nhập nhật ký quét thường bao gồm các thông tin sau:
- Ngày và giờ tập tin được quét.
- Tên của tập tin được quét.
- Những gì đã được phát hiện trong tập tin (nếu bất cứ điều gì đã được phát hiện).

*Chỉ thị cấu hình có liên quan:*
- `general` -> `scan_log`
- `general` -> `scan_log_serialized`

Khi các chỉ thị này được để trống, loại ghi nhật ký này sẽ vẫn bị vô hiệu hóa.

##### 9.3.1 TẢI LÊN BỊ CHẶN

Khi được kích hoạt trong cấu hình gói, phpMussel lưu nhật ký của các tải lên đã bị chặn.

*Một mục nhật ký ví dụ:*

```
Ngày: Sun, 19 Jul 2020 13:33:31 +0800
Địa chỉ IP: 127.0.0.x
== Kết quả quét (tại sao được gắn cờ) ==
Đã được phát hiện phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
== Tái thiết chữ ký băm ==
dcacac499064454218823fbabff7e09b5b011c0c877ee6f215f35bffb195b6e9:654:ascii_standard_testfile.txt
Đã được kiểm dịch là "1595142388-2e017ea9ac1478e45dc15794a1fc18c0.qfu".
```

Các mục nhật ký này thường bao gồm các thông tin sau:
- Ngày và giờ tải lên bị chặn.
- Địa chỉ IP nơi tải lên bắt nguồn từ đó.
- Lý do tại sao tập tin bị chặn (những gì đã được phát hiện).
- Tên của tập tin bị chặn.
- Tổng kiểm tra và kích thước của tập tin bị chặn.
- Liệu tập tin có bị đưa vào kiểm dịch hay không và dưới tên nội bộ nào.

*Chỉ thị cấu hình có liên quan:*
- `web` -> `uploads_log`

##### 9.3.2 NHẬT KÝ FRONT-END

Loại nhật ký này liên quan đến cố gắng đăng nhập, và chỉ xảy ra khi người dùng cố gắng đăng nhập vào front-end (giả sử truy cập front-end được kích hoạt).

Mục nhập nhật ký front-end chứa địa chỉ IP của người dùng đang cố gắng đăng nhập, ngày và giờ xảy ra điều này, và kết quả của cố gắng này (đăng nhập thành công, hoặc thành công không thành công). Mục nhập nhật ký front-end thường trông giống như thế này (làm ví dụ):

```
x.x.x.x - Day, dd Mon 20xx hh:ii:ss +0000 - "admin" - Đã đăng nhập.
```

*Chỉ thị cấu hình có liên quan:*
- `general` -> `frontend_log`

##### 9.3.3 XOAY VÒNG NHẬT KÝ

Bạn có thể muốn thanh lọc nhật ký sau một khoảng thời gian, hoặc có thể được yêu cầu làm như vậy theo luật pháp (khoảng thời gian được phép giữ nhật ký hợp pháp có thể bị giới hạn bởi luật pháp). Bạn có thể đạt được điều này bằng cách đưa dấu ngày/giờ vào tên tập tin nhật ký của bạn theo quy định của cấu hình gói của bạn (ví dụ, `{yyyy}-{mm}-{dd}.log`), và sau đó kích hoạt xoay vòng nhật ký (xoay vòng nhật ký cho phép bạn thực hiện một số hành động trên tập tin nhật ký khi vượt quá giới hạn được chỉ định).

Ví dụ: Nếu tôi được yêu cầu xóa nhật ký sau 30 ngày theo pháp luật, tôi có thể chỉ định `{dd}.log` trong tên của tập tin nhật ký của tôi (`{dd}` đại diện cho ngày), đặt giá trị của `log_rotation_limit` để 30, và đặt giá trị của `log_rotation_action` để `Delete`.

Ngược lại, nếu bạn được yêu cầu giữ lại nhật ký trong một khoảng thời gian dài, bạn có thể cân nhắc không sử dụng xoay vòng nhật ký, hoặc bạn có thể đặt giá trị của `log_rotation_action` để `Archive`, để nén tập tin nhật ký, do đó làm giảm tổng dung lượng đĩa mà họ chiếm.

*Chỉ thị cấu hình có liên quan:*
- `general` -> `log_rotation_limit`
- `general` -> `log_rotation_action`

##### 9.3.4 CẮT NGẮN NHẬT KÝ

Cũng có thể cắt ngắn các tập tin nhật ký riêng lẻ khi chúng vượt quá một kích thước nhất định, nếu đây bạn có thể cần hay muốn làm.

*Chỉ thị cấu hình có liên quan:*
- `general` -> `truncate`

##### 9.3.5 PSEUDONYMISATION ĐỊA CHỈ IP

Thứ nhất, nếu bạn không quen thuộc với thuật ngữ này, "pseudonymisation" đề cập đến việc xử lý dữ liệu cá nhân sao cho không thể xác định được dữ liệu cá nhân cho bất kỳ chủ đề dữ liệu cụ thể nào nữa trừ khi có thông tin bổ sung, và miễn là thông tin bổ sung đó được duy trì riêng biệt và phải chịu sự các biện pháp kỹ thuật và tổ chức để đảm bảo rằng dữ liệu cá nhân không thể được xác định cho bất kỳ người tự nhiên nào.

Trong một số trường hợp, bạn có thể được yêu cầu về mặt pháp lý để sử dụng "anonymisation" hoặc "pseudonymisation" cho bất kỳ PII nào được thu thập, xử lý hoặc lưu trữ. Mặc dù khái niệm này đã tồn tại trong một thời gian khá lâu, GDPR/DSGVO đề cập đến, và đặc biệt khuyến khích "pseudonymisation".

phpMussel có thể sử dụng "pseudonymisation" cho các địa chỉ IP khi nhật ký chúng vào bản ghi, nếu đây bạn có thể cần hay muốn làm. Khi phpMussel sử dụng "pseudonymisation" cho các địa chỉ IP, khi nhật ký chúng vào bản ghi, octet cuối cùng của địa chỉ IPv4, và mọi thứ sau phần thứ hai của địa chỉ IPv6 được đại diện bởi một "x" (hiệu quả làm tròn địa chỉ IPv4 đến địa chỉ đầu tiên của mạng con thứ 24 mà chúng đưa vào, và địa chỉ IPv6 đến địa chỉ đầu tiên của mạng con thứ 32 mà chúng đưa vào).

*Chỉ thị cấu hình có liên quan:*
- `legal` -> `pseudonymise_ip_addresses`

##### 9.3.6 SỐ LIỆU THỐNG KÊ

phpMussel có thể tùy chọn theo dõi số liệu thống kê như tổng số tập tin được quét và bị chặn kể từ một số thời điểm cụ thể. Tính năng này được vô hiệu hóa theo mặc định, nhưng có thể được kích hoạt thông qua cấu hình gói. Tính năng này chỉ theo dõi tổng số sự kiện đã xảy ra và không bao gồm bất kỳ thông tin nào về các sự kiện cụ thể (và do đó, không nên được coi là PII).

*Chỉ thị cấu hình có liên quan:*
- `general` -> `statistics`

##### 9.3.7 MÃ HÓA

phpMussel không mã hóa bộ nhớ cache của nó hoặc bất kỳ thông tin log nào. [Mã hóa](https://vi.wikipedia.org/wiki/M%C3%A3_h%C3%B3a) bộ nhớ cache và log có thể được giới thiệu trong tương lai, nhưng hiện tại không có bất kỳ kế hoạch cụ thể nào. Nếu bạn lo lắng về các bên thứ ba không được phép truy cập vào các phần của phpMussel có thể chứa thông tin nhận dạng cá nhân hay thông tin nhạy cảm như bộ nhớ cache hoặc nhật ký của nó, tôi khuyên bạn không nên cài đặt phpMussel tại vị trí có thể truy cập công khai (ví dụ, cài đặt phpMussel bên ngoài thư mục `public_html` tiêu chuẩn hoặc tương đương chúng có sẵn cho hầu hết các máy chủ web tiêu chuẩn) và các quyền hạn chế thích hợp sẽ được thực thi cho thư mục nơi nó cư trú. Nếu điều đó không đủ để giải quyết mối quan ngại của bạn, hãy định cấu hình phpMussel để các loại thông tin gây ra mối lo ngại của bạn sẽ không được thu thập hoặc nhật ký ở địa điểm đầu tiên (ví dụ, bằng cách tắt ghi nhật ký).

#### 9.4 COOKIE

Khi người dùng đăng nhập thành công vào front-end, phpMussel đặt [cookie](https://vi.wikipedia.org/wiki/Cookie_(tin_h%E1%BB%8Dc)) để có thể nhớ người dùng cho các yêu cầu tiếp theo (cookie được sử dụng để xác thực người dùng đến phiên đăng nhập). Trên trang đăng nhập, cảnh báo cookie được hiển thị nổi bật, cảnh báo người dùng rằng cookie sẽ được đặt nếu họ tham gia vào các hành động có liên quan. Cookie không được đặt ở bất kỳ điểm nào khác trong cơ sở mã.

#### 9.5 TIẾP THỊ VÀ QUẢNG CÁO

phpMussel không thu thập hoặc xử lý bất kỳ thông tin nào cho mục đích tiếp thị hoặc quảng cáo, và không bán hoặc lợi nhuận từ bất kỳ thông tin được thu thập hoặc ghi lại nào. phpMussel không phải là một doanh nghiệp thương mại, cũng không liên quan đến bất kỳ lợi ích thương mại nào, do đó, làm những việc này sẽ không có ý nghĩa gì cả. Đây là trường hợp kể từ khi bắt đầu dự án, và tiếp tục là trường hợp ngày hôm nay. Ngoài ra, làm những việc này sẽ phản tác dụng với tinh thần và mục đích dự định của toàn bộ dự án, và miễn là tôi tiếp tục duy trì dự án, sẽ không bao giờ xảy ra.

#### 9.6 CHÍNH SÁCH BẢO MẬT

Trong một số trường hợp, bạn có thể được yêu cầu về mặt pháp lý để hiển thị rõ ràng liên kết đến chính sách bảo mật của bạn trên tất cả các trang và phần trong trang web của bạn. Điều này có thể quan trọng như một phương tiện để đảm bảo rằng người dùng được thông báo đầy đủ về các thực tiễn bảo mật chính xác của bạn, loại PII bạn thu thập, và cách bạn định sử dụng. Để có thể bao gồm một liên kết trên trang "Sự tải lên đã bị từ chối" của phpMussel, một chỉ thị cấu hình được cung cấp để chỉ định URL cho chính sách bảo mật của bạn.

*Chỉ thị cấu hình có liên quan:*
- `legal` -> `privacy_policy`

#### 9.7 GDPR/DSGVO

Quy định bảo vệ dữ liệu chung (GDPR) là một quy định của Liên minh châu Âu, có hiệu lực kể từ 25 Tháng Năm 2018. Mục tiêu chính của quy định là cung cấp quyền kiểm soát cho công dân và cư dân EU về dữ liệu cá nhân của riêng họ, và thống nhất quy định trong EU về quyền riêng tư và dữ liệu cá nhân.

Quy định này bao gồm các điều khoản cụ thể liên quan đến việc xử lý "thông tin nhận dạng cá nhân" (PII) của bất kỳ "chủ đề dữ liệu" nào (bất kỳ người tự nhiên được xác định hoặc có thể nhận dạng được) từ hoặc trong EU. Để tuân thủ quy định, "enterprise" hoặc "doanh nghiệp" (theo quy định của quy định), và bất kỳ hệ thống và quy trình có liên quan nào phải ghi nhớ sự riêng tư ngay từ đầu, phải sử dụng cài đặt bảo mật cao nhất có thể, phải thực hiện các biện pháp bảo vệ thích hợp cho bất kỳ thông tin được lưu trữ hay xử lý nào (bao gồm nhưng không giới hạn trong việc thực hiện "pseudonymisation" hoặc "anonymisation" đầy đủ của dữ liệu), phải khai báo rõ ràng các loại dữ liệu mà họ thu thập, cách họ xử lý nó, vì lý do gì, trong bao lâu họ giữ nó, và nếu họ chia sẻ dữ liệu này với bất kỳ bên thứ ba nào, các loại dữ liệu được chia sẻ với bên thứ ba, cách, tại sao, vv.

Dữ liệu có thể không được xử lý trừ khi có cơ sở hợp pháp để làm như vậy, theo quy định của quy định. Nói chung, điều này có nghĩa là để xử lý dữ liệu của chủ đề dữ liệu trên cơ sở hợp pháp, nó phải được thực hiện theo nghĩa vụ pháp lý, hoặc chỉ được thực hiện sau khi có sự đồng ý rõ ràng và đầy đủ thông tin đã được lấy từ chủ đề dữ liệu.

Bởi vì các khía cạnh của quy định có thể phát triển trong thời gian, để tránh việc truyền bá thông tin lỗi thời, nó có thể là tốt hơn để tìm hiểu về các quy định từ một nguồn có thẩm quyền, trái ngược với việc chỉ bao gồm các thông tin có liên quan ở đây trong tài liệu gói (mà cuối cùng có thể trở nên lỗi thời khi quy định phát triển).

Một số tài nguyên được khuyến khích để tìm hiểu thêm thông tin:
- [REGULATION (EU) 2016/679 OF THE EUROPEAN PARLIAMENT AND OF THE COUNCIL](https://eur-lex.europa.eu/legal-content/EN/TXT/?uri=celex:32016R0679)
- [Quy định bảo vệ dữ liệu chung](https://vi.wikipedia.org/wiki/Quy_%C4%91%E1%BB%8Bnh_b%E1%BA%A3o_v%E1%BB%87_d%E1%BB%AF_li%E1%BB%87u_chung)

---


Lần cuối cập nhật: 2023.03.05.
