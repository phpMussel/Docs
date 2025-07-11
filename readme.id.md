## Dokumentasi untuk phpMussel v3 (Bahasa Indonesia).

### Isi
- 1. [SEPATAH KATA](#user-content-SECTION1)
- 2. [BAGAIMANA CARA MENGINSTAL](#user-content-SECTION2)
- 3. [BAGAIMANA CARA MENGGUNAKAN](#user-content-SECTION3)
- 4. [MEMPERLUAS PHPMUSSEL](#user-content-SECTION4)
- 5. [OPSI KONFIGURASI](#user-content-SECTION5)
- 6. [FORMAT TANDA TANGAN](#user-content-SECTION6)
- 7. [MASALAH KOMPATIBILITAS DIKETAHUI](#user-content-SECTION7)
- 8. [PERTANYAAN YANG SERING DIAJUKAN (FAQ)](#user-content-SECTION8)
- 9. [INFORMASI HUKUM](#user-content-SECTION9)

*Regarding translations: My native language is English. Because this is a free and open-source hobby project which generates zero income, and translatable content is likely to change as the features and functionality supported by the project changes, it doesn't make sense for me to spend money for translations. Because I'm the sole author/developer/maintainer for the project and I'm not a ployglot, any translations I produce are very likely to contain errors. Sorry, but realistically, that won't ever change. If you find any such errors/typos/mistakes/etc, your assistance to correct them would be very much appreciated. Pull requests are invited and encouraged. Otherwise, if you find these errors too much to handle, just stick with the original English source. If a translation is irredeemably incomprehensible, let me know which, and I can delete it. If you're not sure how to perform pull requests, ask. I can help.*

---


### 1. <a name="SECTION1"></a>SEPATAH KATA

Terima kasih untuk menggunakan phpMussel, sebuah skrip PHP yang di-design untuk mendeteksi berbagai trojan, virus dan serangan-serangan lainnya dalam semua file yang diupload ke sistem Anda dimanapun berads , berdasarkan data dari ClamAV dan sebagainya.

[PHPMUSSEL](https://phpmussel.github.io/) HAK CIPTA 2013 dan di atas GNU/GPLv2 oleh [Caleb M (Maikuolan)](https://github.com/Maikuolan).

Skrip ini berbasis Sumber Terbuka; Anda dapat mendistribusikan kembali dan/atau memodifikasinya dalam batasan dari lisensu GNU General Public License, seperti di publikasikan dari Free Software Foundation; baik versi 2 dari License, atau (dalam opsi Anda) versi selanjutnya apapun. Skrip ini didistribusikan untuk harapan dapat digunakan tapi TANPA JAMINAN; tanpa walaupun garansi dari DIPERJUALBELIKAN atau KECOCOKAN UNTUK TUJUAN TERTENTU. Mohon Lihat GNU General Public Licence untuk lebih detail, terletak di file `LICENSE.txt` dan tersedia juga dari:
- <https://www.gnu.org/licenses/>.
- <https://opensource.org/licenses/>.

Terima kasih khususnya untuk ClamAV untuk inspirasi project dan tanda tangan dimana skrip ini menggunakan ClamAV, tanpa nya skrip ini tidak akan ada, atau akan mengalami nilai yang kurang baik.

Khusus terima kasih kepada GitHub dan Bitbucket untuk menghost file proyek ini, dan kepada sumber-sumber tambahan yang dimanfaatkan oleh phpMussel: [PhishTank](https://www.phishtank.com/), [NLNetLabs](https://nlnetlabs.nl/), [Malware.Expert](https://malware.expert/) dan lain-lain, dan khusus terima kasih kepada semua orang yang mendukung proyek, kepada orang lain bahwa saya mungkin telah dinyatakan lupa untuk menyebutkan, dan khususnya kepada anda yang menggunakan skrip ini.

---


### 2. <a name="SECTION2"></a>BAGAIMANA CARA MENGINSTAL

#### 2.0 MENGINSTAL DENGAN COMPOSER

Cara yang direkomendasikan untuk menginstal phpMussel v3 adalah melalui Composer.

Untuk kenyamanan, Anda dapat menginstal dependensi phpMussel yang paling umum dibutuhkan melalui repositori phpMussel utama:

`composer require phpmussel/phpmussel`

Atau, Anda dapat memilih secara manual dependensi mana yang Anda butuhkan untuk implementasinya . Sangat mungkin Anda hanya menginginkan dependensi tertentu dan tidak membutuhkan segalanya.

Untuk melakukan apapun dengan phpMussel, Anda hanya butuh basis kode utama dari phpMussel:

`composer require phpmussel/core`

Menyediakan fasilitas admin untuk phpMussel:

`composer require phpmussel/frontend`

Menyediakan pemindaian upload file otomatis untuk situs web Anda:

`composer require phpmussel/web`

Menyediakan kemampuan untuk memanfaatkan phpMussel sebagai aplikasi mode CLI yang interaktif:

`composer require phpmussel/cli`

Menyediakan jembatan antara phpMussel dan PHPMailer, memungkinkan phpMussel untuk menggunakan PHPMailer untuk otentikasi dua faktor, memberi pemberitahuan email tentang upload file yang diblokir, dll:

`composer require phpmussel/phpmailer`

Agar phpMussel dapat mendeteksi apapun, Anda harus memasang tanda tangan. Tidak ada paket khusus untuk ini. Untuk menginstal tanda tangan, lihat bagian selanjutnya dari dokumen ini.

Atau, jika Anda tidak ingin menggunakan Composer, Anda dapat mengunduh ZIP yang sudah dikemas dari sini:

https://github.com/phpMussel/Examples

ZIP yang sudah dikemas mencakup semua dependensi yang disebutkan diatas, serta semua file tanda tangan phpMussel standar, bersama dengan beberapa contoh yang disediakan untuk bagaimana menggunakan phpMussel pada implementasi Anda.

#### <a name="INSTALLING_SIGNATURES"></a>2.1 MENGINSTAL TANDA TANGAN

Tanda tangan dibutuhkan oleh phpMussel untuk mendeteksi ancaman tertentu. Ada 2 metode utama untuk menginstal tanda tangan:

1. Buat tanda tangan menggunakan "SigTool" dan instal secara manual.
2. Download tanda tangan dari "phpMussel/Signatures" atau "phpMussel/Examples" dan instal secara manual.

##### 2.1.0 Buat tanda tangan menggunakan "SigTool" dan instal secara manual.

*Lihat: [Dokumentasi SigTool](https://github.com/phpMussel/SigTool#documentation).*

*Juga mencatat: SigTool hanya memproses tanda tangan dari ClamAV. Untuk mendapatkan tanda tangan dari sumber lain, seperti yang ditulis khusus untuk phpMussel, yang mencakup tanda tangan yang diperlukan untuk mendeteksi sampel uji phpMussel, metode ini perlu ditambah dengan salah satu metode lain yang disebutkan disini.*

##### 2.1.1 Download tanda tangan dari "phpMussel/Signatures" atau "phpMussel/Examples" dan instal secara manual.

Pertama, pergi ke [phpMussel/Signatures](https://github.com/phpMussel/Signatures). Repositori berisi berbagai file tanda tangan yang GZ-dikompres. Download file yang Anda perlukan, dekompresi mereka, dan salin ke direktori tanda tangan instalasi Anda.

Sebagai alternatif, download ZIP terbaru dari [phpMussel/Examples](https://github.com/phpMussel/Examples). Anda kemudian dapat menyalin/menempelkan tanda tangan dari arsip ini ke instalasi Anda.

---


### 3. <a name="SECTION3"></a>BAGAIMANA CARA MENGGUNAKAN

#### 3.0 MENGKONFIGURASI PHPMUSSEL

Setelah menginstal phpMussel, Anda akan memerlukan file konfigurasi sehingga Anda dapat mengkonfigurasinya. File konfigurasi phpMussel dapat diformat sebagai file INI atau YML. Jika Anda bekerja dari salah satu contoh ZIP, Anda sudah memiliki dua contoh file konfigurasi yang tersedia, `phpmussel.ini` atau `phpmussel.yml`; Anda dapat memilih salah satu dari ini-ini untuk bekerja, jika Anda mau. Jika Anda tidak bekerja dari salah satu ZIP contoh, Anda harus membuat file baru.

Jika Anda puas dengan konfigurasi default untuk phpMussel dan tidak ingin mengubah apapun, Anda dapat menggunakan file kosong sebagai file konfigurasi Anda. Apapun yang tidak dikonfigurasikan oleh file konfigurasi Anda akan menggunakan defaultnya, jadi Anda hanya perlu mengkonfigurasi sesuatu secara eksplisit jika Anda ingin itu berbeda dari defaultnya (artinya, file konfigurasi kosong akan menyebabkan phpMussel memanfaatkan semua konfigurasi defaultnya).

Jika Anda ingin menggunakan front-end phpMussel, Anda dapat mengonfigurasi semuanya dari halaman konfigurasi front-end. Tetapi, sejak v3 dan seterusnya, informasi login untuk front-end disimpan dalam file konfigurasi Anda, jadi untuk masuk ke front-end, Anda harus setidaknya mengkonfigurasi akun yang akan digunakan untuk login, dan kemudian, dari sana, Anda akan dapat masuk dan menggunakan halaman konfigurasi front-end untuk mengkonfigurasi yang lainnya.

Kutipan dibawah ini akan menambahkan akun baru ke front-end dengan nama pengguna "admin", dan kata sandi "password".

Untuk file INI:

```INI
[user.admin]
password='$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK'
permissions='1'
```

Untuk file YML:

```YAML
user.admin:
 password: "$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK"
 permissions: 1
```

Anda dapat memberi nama konfigurasi apapun yang Anda inginkan (selama Anda mempertahankan ekstensi, sehingga phpMussel tahu format mana yang digunakannya), dan Anda dapat menyimpannya dimana pun Anda inginkan. Anda dapat memberi tahu phpMussel dimana menemukan file konfigurasi Anda dengan menyediakan jalurnya saat menginstansiasi loader. Jika tidak ada jalur yang disediakan, phpMussel akan mencoba untuk menemukannya di dalam direktori induk untuk vendor.

Di beberapa lingkungan, seperti Apache, bahkan mungkin untuk menempatkan titik di depan konfigurasi Anda untuk menyembunyikannya dan mencegah akses publik.

Lihat bagian konfigurasi dokumen ini untuk informasi lebih lanjut tentang berbagai direktif konfigurasi yang tersedia untuk phpMussel.

#### 3.1 PHPMUSSEL CORE

Terlepas dari bagaimana Anda ingin menggunakan phpMussel, hampir setiap implementasi akan mengandung sesuatu seperti ini, minimal:

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
```

Seperti namanya, loader bertugas untuk mempersiapkan kebutuhan dasar menggunakan phpMussel, dan pemindai (scanner) bertugas atas semua fungsionalitas pemindaian inti.

Konstruktor untuk loader menerima lima parameter, semuanya opsional.

```PHP
public function __construct(
    string $ConfigurationPath = '',
    string $CachePath = '',
    string $QuarantinePath = '',
    string $SignaturesPath = '',
    string $VendorPath = ''
)
```

Parameter pertama adalah jalur lengkap ke file konfigurasi Anda. Ketika tidak dispesifikan, phpMussel akan mencari untuk file konfigurasi bernama `phpmussel.ini` atau `phpmussel.yml`, di direktori induk dari vendor.

Parameter kedua adalah jalur ke direktori yang Anda izinkan phpMussel digunakan untuk penyimpanan file sementara dan caching. Ketika tidak dispesifikan, phpMussel akan berusaha membuat direktori baru untuk digunakan, dinamakan sebagai `phpmussel-cache`, di direktori induk dari vendor. Jika Anda ingin menspesifikan jalur ini sendiri, memilih direktori kosong adalah terbaik, untuk menghindari hilangnya data lain dalam direktori yang dispesifikan.

Parameter ketiga adalah jalur ke direktori yang Anda izinkan phpMussel digunakan untuk karantina. Ketika tidak dispesifikan, phpMussel akan berusaha membuat direktori baru untuk digunakan, dinamakan sebagai `phpmussel-quarantine`, di direktori induk dari vendor. Jika Anda ingin menspesifikan jalur ini sendiri, memilih direktori kosong adalah terbaik, untuk menghindari hilangnya data lain dalam direktori yang dispesifikan. Sangat direkomendasikan agar Anda mencegah akses publik ke direktori yang digunakan untuk karantina.

Parameter keempat adalah jalur ke direktori yang berisi file tanda tangan untuk phpMussel. Ketika tidak dispesifikan, phpMussel akan mencoba mencari untuk file tanda tangan di direktori bernama `phpmussel-signatures`, di direktori induk dari vendor.

Parameter kelima adalah jalur ke direktori vendor Anda. Seharusnya tidak pernah menunjuk ke tempat lain. Ketika tidak dispesifikan, phpMussel akan mencoba mencari untuk direktori ini untuk dirinya sendiri. Parameter ini disediakan untuk memudahkan integrasi yang lebih mudah dengan implementasi yang mungkin tidak harus memiliki struktur yang sama dengan proyek Composer pada umumnya.

Konstruktor untuk pemindai (scanner) hanya menerima satu parameter, dan ini wajib: Objek loader yang diinstansiasi. Ketika dilewatkan oleh referensi, loader harus diinstansiasi ke variabel (menginstansiasi loader langsung ke pemindai untuk melewati sebagai nilai bukan cara yang benar untuk menggunakan phpMussel).

```PHP
public function __construct(\phpMussel\Core\Loader &$Loader)
```

#### 3.2 PEMINDAIAN UPLOAD FILE OTOMATIS

Untuk menginstansiasi penangan upload:

```PHP
$Web = new \phpMussel\Web\Web($Loader, $Scanner);
```

Untuk memindai upload file:

```PHP
$Web->scan();
```

Secara opsional, phpMussel dapat mencoba memperbaiki nama upload jika ada yang salah, jika Anda ingin:

```PHP
$Web->demojibakefier();
```

Sebagai contoh lengkap:

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

*Mencoba mengupload file `ascii_standard_testfile.txt`, sampel jinak disediakan untuk tujuan pengujian phpMussel:*

![Screenshot](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/web-v3.0.0-alpha2.png)

#### 3.3 MODE CLI

Untuk menginstansiasi dalam mode CLI:

```PHP
$CLI = new \phpMussel\CLI\CLI($Loader, $Scanner);
```

Sebagai contoh lengkapnya:

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

Untuk menginstansiasi halaman depan (front-end):

```PHP
$FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
```

Sebagai contoh lengkapnya:

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

#### 3.5 API PEMINDAI

Anda juga dapat mengimplementasikan pemindai phpMussel di dalam program dan skrip lain, jika Anda mau.

Sebagai contoh lengkapnya:

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

Bagian terpentinf yang perlu diperhatikan dari contoh ini adalah metode `scan()`. Metode `scan()` menerima dua parameter:

```PHP
public function scan(mixed $Files, int $Format = 0): mixed
```

Parameter pertama dapat berupa string atau array, dan memberi tahu pemindai apa yang harus dipindai. Ini bisa berupa string yang menunjukkan file atau direktori tertentu, atau bisa berupa array yang berisi string untuk menentukan banyak file/direktori.

Ketika sebagai string, itu harus menunjuk ke tempat data dapat ditemukan. Ketika sebagai array, kunci-kunci array harus menunjukkan nama-nama asli dari item yang akan dipindai, dan nilai-nilai harus menunjuk ke tempat data dapat ditemukan.

Parameter kedua adalah integer, dan memberi tahu pemindai bagaimana seharusnya mengembalikan hasil pemindaiannya.

Tentukan 1 untuk mengembalikan hasil pemindaian sebagai array yang berisi integer untuk setiap item yang dipindai.

Integer ini memiliki arti sebagai berikut:

Hasil | Deskripsi
--:|:--
-5 | Mengindikasikan bahwa pemindaian gagal diselesaikan karena alasan lain.
-4 | Mengindikasikan bahwa data tidak dapat dipindai karena enkripsi.
-3 | Mengindikasikan bahwa masalah adalah ditemui dengan file tanda tangan phpMussel.
-2 | Mengindikasikan bahwa file dikorup terdeteksi selama proses memindai dan proses memindai gagal selesai.
-1 | Mengindikasikan bahwa ekstensi atau addon yang dibutuhkan oleh PHP untuk mengeksekusi pemindaian hilang dan demikian gagal selesai.
0 | Mengindikasikan bahwa target pemindaian tidak ada dan tidak ada yang dipindai.
1 | Mengindikasikan bahwa target sukses dipindai dan tidak ada masalah terdeteksi.
2 | Mengindikasikan target sukses di scan namun ada masalah terdeteksi.

Tentukan 2 untuk mengembalikan hasil pemindaian sebagai boolean.

Hasil | Deskripsi
:-:|:--
`true` | Masalah terdeteksi (target pemindaian buruk/berbahaya).
`false` | Masalah tidak terdeteksi (target pemindaian mungkin baik-baik saja).

Tentukan 3 untuk mengembalikan hasil pemindaian sebagai array untuk setiap item yang dipindai sebagai teks yang dapat dibaca oleh manusia.

*Contoh output:*

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

Tentukan 4 untuk mengembalikan hasil pemindaian sebagai string teks yang dapat dibaca oleh manusia (seperti 3, tetapi digabungkan).

*Contoh output:*

```
Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)! Detected phpMussel-Testfile.CoEx (coex_testfile.rtf)! Detected encrypted archive; Encrypted archives not permitted (encrypted.zip)!
```

Tentukan *nilai lain* untuk mengembalikan teks yang diformat (seperti hasil pemindaian yang terlihat saat menggunakan CLI).

*Contoh output:*

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

*Lihat juga: [Bagaimana cara mengakses rincian spesifik tentang file saat dipindai?](#user-content-SCAN_DEBUGGING)*

#### 3.6 OTENTIKASI DUA FAKTOR

Mungkin untuk membuat bagian depan lebih aman dengan mengaktifkan otentikasi dua faktor ("2FA"). Saat masuk ke akun berkemampuan 2FA, email dikirim ke alamat email yang terkait dengan akun tersebut. Email ini berisi "kode 2FA", yang kemudian harus dimasukkan oleh pengguna, selain nama pengguna dan kata sandi, agar dapat masuk menggunakan akun tersebut. Ini berarti bahwa mendapatkan kata sandi akun tidak akan cukup bagi peretas atau penyerang potensial untuk dapat masuk ke akun tersebut, karena mereka juga harus sudah memiliki akses ke alamat email yang terkait dengan akun tersebut agar dapat menerima dan memanfaatkan kode 2FA yang terkait dengan sesi, sehingga membuat bagian depan lebih aman.

Setelah Anda menginstal PHPMailer, Anda harus mengisi direktif konfigurasi untuk PHPMailer melalui halaman konfigurasi phpMussel atau file konfigurasi. Informasi lebih lanjut tentang direktif konfigurasi ini termasuk dalam bagian konfigurasi dokumen ini. Setelah Anda mengisi direktif konfigurasi PHPMailer, atur `enable_two_factor` ke `true`. Otentikasi dua faktor sekarang harus diaktifkan.

Selanjutnya, Anda harus mengaitkan alamat email dengan akun, sehingga phpMussel tahu ke mana harus mengirim 2FA kode ketika masuk dengan akun tersebut. Untuk melakukan ini, gunakan alamat email sebagai nama pengguna untuk akun tersebut (seperti `foo@bar.tld`), atau sertakan alamat email sebagai bagian dari nama pengguna dengan cara yang sama seperti ketika mengirim email secara normal (seperti `Foo Bar <foo@bar.tld>`).

---


### 4. <a name="SECTION4"></a>MEMPERLUAS PHPMUSSEL

phpMussel dirancang dengan ekstensibilitas dalam pikiran. Pull request ke salah satu repositori di organisasi phpMussel, dan [kontribusi](https://github.com/phpMussel/.github/blob/master/CONTRIBUTING.md) secara umum, selalu diterima. Juga, jika Anda perlu memodifikasi atau memperluas phpMussel dengan cara-cara yang tidak cocok untuk berkontribusi kembali repositori-repositori tertentu, ini pasti mungkin untuk dilakukan (misalnya, untuk modifikasi atau ekstensi yang spesifik untuk implementasi khusus Anda, yang tidak dapat dipublikasikan karena kerahasiaan atau kebutuhan privasi di organisasi Anda, atau yang mungkin lebih disukai dipublikasikan di repositori mereka sendiri, seperti untuk plugins dan paket Composer baru yang membutuhkan phpMussel).

Sejak v3, semua fungsionalitas phpMussel ada sebagai kelas, yang berarti bahwa dalam beberapa kasus, mekanisme [pewarisan objek](https://www.php.net/manual/en/language.oop5.inheritance.php) yang disediakan oleh PHP dapat menjadi cara yang mudah dan tepat untuk memperluas phpMussel.

phpMussel juga menyediakan mekanismenya sendiri untuk ekstensibilitas. Sebelum v3, mekanisme yang disukai adalah sistem plugin terintegrasi untuk phpMussel. Sejak v3, mekanisme yang disukai adalah orkestrator acara.

Kode boilerplate untuk memperluas phpMussel dan untuk menulis plugin baru tersedia untuk umum di [repositori boilerplates](https://github.com/phpMussel/plugin-boilerplates). Termasuk juga daftar [semua acara yang saat ini didukung](https://github.com/phpMussel/plugin-boilerplates/tree/master/boilerplate-v3#currently-supported-events) dan petunjuk lebih rinci tentang cara menggunakan kode boilerplate.

Anda akan melihat bahwa struktur kode boilerplate v3 identik dengan struktur berbagai repositori phpMussel v3 di organisasi phpMussel. Ini bukan kebetulan. Jika memungkinkan, saya merekomendasikan penggunaan kode boilerplate v3 untuk tujuan ekstensibilitas, dan menggunakan prinsip desain yang mirip dengan phpMussel v3 sendiri. Jika Anda memilih untuk menerbitkan ekstensi atau plugin baru Anda, Anda dapat mengintegrasikan dukungan Komposer untuknya, dan secara teoritis mungkin bagi orang lain untuk menggunakan ekstensi atau plugin Anda dengan cara yang persis sama seperti phpMussel v3 sendiri, hanya membutuhkannya bersama dengan dependensi Composer mereka yang lain, dan menerapkan penangan acara yang diperlukan pada implementasinya. (Tentu saja, jangan lupa untuk menyertakan instruksi dengan publikasi Anda, sehingga orang lain akan tahu tentang penangan acara yang mungkin ada, dan informasi lain yang mungkin diperlukan untuk instalasikan dan pemanfaatan yang benar dari publikasi Anda).

---


### 5. <a name="SECTION5"></a>OPSI KONFIGURASI

Berikut ini adalah daftar direktif konfigurasi yang diterima oleh phpMussel, dengan deskripsi dari tujuan dan fungsi.

```
Konfigurasi (v3)
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

#### "core" (Kategori)
Konfigurasi umum (konfigurasi inti apapun yang bukan milik kategori lain).

##### "scan_log" `[string]`
- Nama dari file untuk mencatat semua hasil pemindaian. Spesifikasikan nama atau biarkan kosong untuk menonaktifkan.

Kiat yang berguna: Anda dapat melampirkan informasi tanggal/waktu ke nama file log dengan menggunakan placeholder format waktu. Placeholder format waktu yang tersedia ditampilkan di <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "scan_log_serialized" `[string]`
- Nama dari file untuk mencatat semua hasil pemindaian (menggunakan format serial). Spesifikasikan nama atau biarkan kosong untuk menonaktifkan.

Kiat yang berguna: Anda dapat melampirkan informasi tanggal/waktu ke nama file log dengan menggunakan placeholder format waktu. Placeholder format waktu yang tersedia ditampilkan di <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "error_log" `[string]`
- File untuk mencatat kesalahan tidak fatal yang terdeteksi. Spesifikasikan nama file, atau biarkan kosong untuk menonaktifkan.

Kiat yang berguna: Anda dapat melampirkan informasi tanggal/waktu ke nama file log dengan menggunakan placeholder format waktu. Placeholder format waktu yang tersedia ditampilkan di <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "outbound_request_log" `[string]`
- File untuk mencatat hasil permintaan keluar apapun. Spesifikasikan nama file, atau biarkan kosong untuk menonaktifkan.

Kiat yang berguna: Anda dapat melampirkan informasi tanggal/waktu ke nama file log dengan menggunakan placeholder format waktu. Placeholder format waktu yang tersedia ditampilkan di <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "truncate" `[string]`
- Memotong file log ketika mereka mencapai ukuran tertentu? Nilai adalah ukuran maksimum dalam B/KB/MB/GB/TB yang bisa ditambahkan untuk file log sebelum dipotong. Nilai default 0KB menonaktifkan pemotongan (file log dapat tumbuh tanpa batas waktu). Catat: Berlaku untuk file log individu! Ukuran file log tidak dianggap secara kolektif.

##### "log_rotation_limit" `[int]`
- Rotasi log membatasi jumlah file log yang seharusnya ada pada satu waktu. Ketika file log baru dibuat, jika jumlah total file log melebihi batas yang ditentukan, tindakan yang ditentukan akan dilakukan. Anda dapat menentukan batas yang diinginkan disini. Nilai 0 akan menonaktifkan rotasi log.

##### "log_rotation_action" `[string]`
- Rotasi log membatasi jumlah file log yang seharusnya ada pada satu waktu. Ketika file log baru dibuat, jika jumlah total file log melebihi batas yang ditentukan, tindakan yang ditentukan akan dilakukan. Anda dapat menentukan tindakan yang diinginkan disini.

```
log_rotation_action
├─Delete ("Hapus file log tertua, hingga batasnya tidak lagi terlampaui.")
└─Archive ("Pertama arsipkan, lalu hapus file log tertua, hingga batasnya tidak lagi terlampaui.")
```

##### "timezone" `[string]`
- Ini digunakan untuk menentukan zona waktu yang akan digunakan (misalnya, Africa/Cairo, America/New_York, Asia/Tokyo, Australia/Perth, Europe/Berlin, Pacific/Guam, dll). Menentukan "SYSTEM" untuk membiarkan PHP menangani ini untuk Anda secara otomatis.

```
timezone
├─SYSTEM ("Gunakan zona waktu default sistem.")
├─UTC ("UTC")
└─…Lain
```

##### "time_offset" `[int]`
- Offset zona waktu dalam hitungan menit.

##### "time_format" `[string]`
- Format notasi tanggal/waktu yang digunakan oleh phpMussel. Opsi tambahan dapat ditambahkan atas permintaan.

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
└─…Lain
```

__*Placeholder – Penjelasan – Contoh berdasarkan 2024-04-30T18:27:49+08:00.*__<br />
`{yyyy}` – Tahun – Misalnya, 2024.<br />
`{yy}` – Tahun yang disingkat – Misalnya, 24.<br />
`{Mon}` – Nama bulan yang disingkat (dalam bahasa Inggris) – Misalnya, Apr.<br />
`{mm}` – Bulan dengan angka nol di depannya – Misalnya, 04.<br />
`{m}` – Bulan – Misalnya, 4.<br />
`{Day}` – Nama hari yang disingkat (dalam bahasa Inggris) – Misalnya, Tue.<br />
`{dd}` – Hari dengan angka nol di depannya – Misalnya, 30.<br />
`{d}` – Hari – Misalnya, 30.<br />
`{hh}` – Jam dengan angka nol di depannya (menggunakan waktu 24 jam) – Misalnya, 18.<br />
`{h}` – Jam (menggunakan waktu 24 jam) – Misalnya, 18.<br />
`{ii}` – Menit dengan angka nol di depannya – Misalnya, 27.<br />
`{i}` – Menit – Misalnya, 27.<br />
`{ss}` – Detik dengan angka nol di depannya – Misalnya, 49.<br />
`{s}` – Detik – Misalnya, 49.<br />
`{tz}` – Zona waktu (tanpa titik dua) – Misalnya, +0800.<br />
`{t:z}` – Zona waktu (dengan titik dua) – Misalnya, +08:00.

##### "ipaddr" `[string]`
- Dimana menemukan alamat IP dari menghubungkan permintaan? (Berguna untuk layanan seperti Cloudflare). Default = REMOTE_ADDR. PERINGATAN: Jangan ganti ini kecuali Anda tahu apa yang Anda lakukan!

```
ipaddr
├─HTTP_INCAP_CLIENT_IP ("HTTP_INCAP_CLIENT_IP (Incapsula)")
├─HTTP_CF_CONNECTING_IP ("HTTP_CF_CONNECTING_IP (Cloudflare)")
├─CF-Connecting-IP ("CF-Connecting-IP (Cloudflare)")
├─HTTP_X_FORWARDED_FOR ("HTTP_X_FORWARDED_FOR (Cloudbric)")
├─X-Forwarded-For ("X-Forwarded-For (Squid)")
├─Forwarded ("Forwarded")
├─REMOTE_ADDR ("REMOTE_ADDR (Default)")
└─…Lain
```

Lihat juga:
- [NGINX Reverse Proxy](https://docs.nginx.com/nginx/admin-guide/web-server/reverse-proxy/)
- [Squid configuration directive forwarded_for](http://www.squid-cache.org/Doc/config/forwarded_for/)
- [Forwarded - HTTP \| MDN](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Forwarded)

##### "delete_on_sight" `[bool]`
- Mengaktifkan direktif ini akan menginstruksikan skrip untuk berusaha secepatnya menghapus file apapun yang ditemukannya selama scan yang mencocokkan pada kriteria deteksi apapun, baik melalui tanda tangan atau yang lain. File yang diidentifikasi sebagai "bersih" tidak akan disentuh. Dalam kasus arsip, seluruh arsip akan dihapus, terlepas dari apakah file tersebut hanya salah satu dari beberapa file yang terdapat dalam arsip. Untuk kasus pemindaian upload file biasanya, tidak cocok untuk Mengaktifkan direktif ini, karena biasanya, PHP akan secara otomatis menyatukan isi dari cache ketika eksekusi selesai, berarti bahwa dia akan selalu menghapus file terupload apapun melalui server jika tidak dipindahkan, dikopi, atau dihapus sebelumnya. Direktif tersebut ditambahkan disini sebagai ukuran keamanan ekstra untuk semua salinan PHP yang tidak selalu bersikap pada perilaku yang diharapkan. False = Setelah pemindahaian, biarkan file [Default]; True = Setelah pemindaian, jika bukan bersih, menghapusnya langsung.

##### "lang" `[string]`
- Tentukan bahasa default untuk phpMussel.

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
- Melokalisasikan sesuai dengan HTTP_ACCEPT_LANGUAGE jika memungkinkan? True = Ya [Default]; False = Tidak.

##### "scan_cache_expiry" `[int]`
- Untuk berapa lama harus phpMussel cache hasil-hasil? Nilai adalah jumlah detik untuk cache hasil-hasil untuk. Default adalah 21600 detik (6 jam); Nilai 0 akan menonaktifkan caching hasil-hasil.

##### "maintenance_mode" `[bool]`
- Aktifkan modus perawatan? True = Ya; False = Tidak [Default]. Nonaktifkan semuanya selain bagian depan. Terkadang berguna saat memperbarui CMS, kerangka kerja, dll.

##### "statistics" `[bool]`
- Lacak statistik penggunaan phpMussel? True = Ya; False = Tidak [Default].

##### "hide_version" `[bool]`
- Sembunyikan informasi versi dari log dan output halaman? True = Ya; False = Tidak [Default].

##### "disabled_channels" `[string]`
- Ini dapat digunakan untuk mencegah phpMussel dari menggunakan saluran tertentu saat mengirim permintaan.

```
disabled_channels
├─GitHub ("GitHub")
├─BitBucket ("BitBucket")
├─VirusTotal_HTTPS ("VirusTotal (HTTPS)")
└─VirusTotal_HTTP ("VirusTotal (HTTP)")
```

##### "request_proxy" `[string]`
- Jika Anda ingin permintaan keluar dikirim melalui proxy, tentukan proxy tersebut disini. Jika tidak, biarkan ini kosong.

##### "request_proxyauth" `[string]`
- Jika mengirim permintaan keluar melalui proxy dan jika proxy tersebut memerlukan nama pengguna dan kata sandi, tentukan nama pengguna dan kata sandi tersebut disini (misalnya, `user:pass`). Jika tidak, biarkan ini kosong.

##### "default_timeout" `[int]`
- Batas waktu default yang digunakan untuk permintaan eksternal? Default = 12 detik.

#### "signatures" (Kategori)
Konfigurasi untuk tanda tangan, file tanda tangan, dll.

##### "active" `[string]`
- Daftar file tanda tangan yang aktif, dipisahkan oleh koma. Catat: File tanda tangan harus diinstal pertama-tama, sebelum Anda dapat mengaktifkannya. Agar file test berfungsi dengan benar, file tanda tangan harus diinstal dan diaktifkan.

##### "fail_silently" `[bool]`
- Seharusnya laporan phpMussel ketika file tanda tangan hilang atau dikorup? Jika `fail_silently` dinonaktifkan, file dikorup dan hilang akan dilaporkan ketika pemindaian, dan jika `fail_silently` diaktifkan, file dikorup dan hilang akan diabaikan, dengan pemindaian melaporkan untuk file-file ini bahwa tidak ada masalah. Harus ini dibiarkan sendirian jika Anda pernah mengalami crash atau masalah lain. False = Dinonaktifkan; True = Diaktifkan [Default].

##### "fail_extensions_silently" `[bool]`
- Seharusnya laporan phpMussel ketika ekstensi hilang? Jika `fail_extensions_silently` dinonaktifkan, ekstensi hilang akan dilaporkan ketika pemindaian, dan jika `fail_extensions_silently` diaktifkan, ekstensi hilang akan diabaikan, dengan pemindaian melaporkan untuk file-file ini bahwa tidak ada masalah. Menonaktifkan direktif ini berpotensi dapat meningkatkan keamanan Anda, tapi juga dapat menyebabkan peningkatan positif palsu. False = Dinonaktifkan; True = Diaktifkan [Default].

##### "detect_adware" `[bool]`
- Harus phpMussel menggunakan tanda tangan untuk mendeteksi adware? False = Tidak; True = Ya [Default].

##### "detect_joke_hoax" `[bool]`
- Harus phpMussel menggunakan tanda tangan untuk mendeteksi lelucon/kebohongan malware/virus? False = Tidak; True = Ya [Default].

##### "detect_pua_pup" `[bool]`
- Harus phpMussel menggunakan tanda tangan untuk mendeteksi PUAs/PUPs? False = Tidak; True = Ya [Default].

##### "detect_packer_packed" `[bool]`
- Harus phpMussel menggunakan tanda tangan untuk mendeteksi pengepakan dan file dikemas? False = Tidak; True = Ya [Default].

##### "detect_shell" `[bool]`
- Harus phpMussel menggunakan tanda tangan untuk mendeteksi skrip shell? False = Tidak; True = Ya [Default].

##### "detect_deface" `[bool]`
- Harus phpMussel menggunakan tanda tangan untuk mendeteksi perusakan dan perusak? False = Tidak; True = Ya [Default].

##### "detect_encryption" `[bool]`
- Harus phpMussel mendeteksi dan memblokir file terenkripsi? False = Tidak; True = Ya [Default].

##### "heuristic_threshold" `[int]`
- Ada tanda tangan tertentu dari phpMussel yang dimaksudkan untuk mengidentifikasi kualitas yang mencurigakan dan berpotensi berbahaya pada file-file yang di-upload tanpa di diri mereka mengidentifikasi file-file yang di-upload spesifik sebagai berbahaya. Ini "threshold" nilai memberitahu phpMussel apa total berat maksimum untuk kualitas yang mencurigakan dan berpotensi berbahaya pada file-file yang di-upload yang diijinkan adalah sebelum file-file yang akan diidentifikasi sebagai berbahaya. Definisi berat dalam konteks ini adalah jumlah total kualitas mencurigakan dan berpotensi berbahaya diidentifikasi. Secara default, nilai ini akan ditetapkan sebagai 3. Sebuah nilai lebih rendah umumnya akan menghasilkan sebagai lebih tinggi positif palsu kejadian tapi sebuah jumlah lebih tinggi file berbahaya diidentifikasi, sedangkan sebuah nilai lebih tinggi umumnya akan menghasilkan sebagai lebih rendah positif palsu kejadian tapi sebuah jumlah lebih rendah pada file berbahaya yang diidentifikasi. Ini umumnya terbaik untuk meninggalkan nilai ini di default kecuali jika Anda mengalami masalah berhubungan dengan itu.

#### "files" (Kategori)
Rincian cara menangani file saat memindai.

##### "filesize_limit" `[string]`
- Batas ukuran file dalam KB. 65536 = 64MB [Default]; 0 = Tidak ada batasa (selalu bertanda abu-abu), nilai angka positif apapun diterima. Ini dapat berguna ketika batasan konfigurasi PHP Anda membatasi jumah memori dari proses yang dapat ditampungnya atau jika konfigurasi PHP Anda membatasi jumlah ukuran upload Anda.

##### "filesize_response" `[bool]`
- Apa yang Anda lakukan dengan file-file yang melebihi batasan ukuran (jika ada). False = Bertanda putih; True = Bertanda hitam [Default].

##### "filetype_whitelist" `[string]`
- Daftar Putih:

__Bagaimana ini bekerja.__ Jika sistem Anda hanya mengizinkan jenis file spesifik menjadi diupload, atau jika sistem Anda secara eksplisit menolak jenis file-file tertentu, menspesifikasikan jenis file dalam bertanda putih, bertanda hitam dan bertanda abu-abu dapat menaikkan kecepatan dari pemindaian dilakukan dengan mengizinkan skrip untuk mengabaikan jenis file tertentu. Format adalah CSV (nilai yang dipisahkan koma).

__Urutan pemrosesan logis.__ Jika jenis file bertanda putih, jangan memindai dan jangan memblokir file, dan jangan memeriksa file terhadap daftar hitam atau daftar abu-abu. Jika jenis file bertanda hitam, jangan memindai file tetapi memblokir bagaimanapun, dan jangan memeriksa file terhadap daftar abu-abu. Jika daftar abu-abu yang kosong atau jika daftar abu-abu tidak kosong dan jenis file bertanda abu-abu, memindai file seperti biasa dan menentukan apakah untuk memblokir berdasarkan hasil memindai, tapi jika daftar abu-abu tidak kosong dan jenis file tidak bertanda abu-abu, memperlakukan seolah olah bertanda hitam, demikian tidak memindai tapi memblokir itu bagaimanapun.

##### "filetype_blacklist" `[string]`
- Daftar Hitam:

__Bagaimana ini bekerja.__ Jika sistem Anda hanya mengizinkan jenis file spesifik menjadi diupload, atau jika sistem Anda secara eksplisit menolak jenis file-file tertentu, menspesifikasikan jenis file dalam bertanda putih, bertanda hitam dan bertanda abu-abu dapat menaikkan kecepatan dari pemindaian dilakukan dengan mengizinkan skrip untuk mengabaikan jenis file tertentu. Format adalah CSV (nilai yang dipisahkan koma).

__Urutan pemrosesan logis.__ Jika jenis file bertanda putih, jangan memindai dan jangan memblokir file, dan jangan memeriksa file terhadap daftar hitam atau daftar abu-abu. Jika jenis file bertanda hitam, jangan memindai file tetapi memblokir bagaimanapun, dan jangan memeriksa file terhadap daftar abu-abu. Jika daftar abu-abu yang kosong atau jika daftar abu-abu tidak kosong dan jenis file bertanda abu-abu, memindai file seperti biasa dan menentukan apakah untuk memblokir berdasarkan hasil memindai, tapi jika daftar abu-abu tidak kosong dan jenis file tidak bertanda abu-abu, memperlakukan seolah olah bertanda hitam, demikian tidak memindai tapi memblokir itu bagaimanapun.

##### "filetype_greylist" `[string]`
- Daftar Abu-Abu:

__Bagaimana ini bekerja.__ Jika sistem Anda hanya mengizinkan jenis file spesifik menjadi diupload, atau jika sistem Anda secara eksplisit menolak jenis file-file tertentu, menspesifikasikan jenis file dalam bertanda putih, bertanda hitam dan bertanda abu-abu dapat menaikkan kecepatan dari pemindaian dilakukan dengan mengizinkan skrip untuk mengabaikan jenis file tertentu. Format adalah CSV (nilai yang dipisahkan koma).

__Urutan pemrosesan logis.__ Jika jenis file bertanda putih, jangan memindai dan jangan memblokir file, dan jangan memeriksa file terhadap daftar hitam atau daftar abu-abu. Jika jenis file bertanda hitam, jangan memindai file tetapi memblokir bagaimanapun, dan jangan memeriksa file terhadap daftar abu-abu. Jika daftar abu-abu yang kosong atau jika daftar abu-abu tidak kosong dan jenis file bertanda abu-abu, memindai file seperti biasa dan menentukan apakah untuk memblokir berdasarkan hasil memindai, tapi jika daftar abu-abu tidak kosong dan jenis file tidak bertanda abu-abu, memperlakukan seolah olah bertanda hitam, demikian tidak memindai tapi memblokir itu bagaimanapun.

##### "check_archives" `[bool]`
- Berusaha mencek isi file terkompress? False = Tidak (Tidak mencek); True = Ya (Mencek) [Default]. Didukung: Zip (membutuhkan libzip), Tar, Rar (membutuhkan ekstensi rar).

##### "filesize_archives" `[bool]`
- Memperlalaikan ukuran daftar hitam/putih dari isi file terkompress? False = Tidak (Bertanda abu-abu semua); True = Ya [Default].

##### "filetype_archives" `[bool]`
- Memperlalaikan jenis file daftar hitam/putih dari isi file terkompress? False = Tidak (Bertanda abu-abu semua) [Default]; True = Ya.

##### "max_recursion" `[int]`
- Batas kedalaman rekursi maksimum untuk arsip. Default = 3.

##### "block_encrypted_archives" `[bool]`
- Mendeteksi dan memblokir dienkripsi arsip? Karena phpMussel tidak mampu memindai isi arsip dienkripsi, itu mungkin bahwa enkripsi arsip dapat digunakan oleh penyerang sebagai sarana mencoba untuk memotong phpMussel, anti-virus pemindai dan perlindungan mirip lainnya. Menginstruksikan phpMussel untuk memblokir setiap arsip dienkripsi ditemukan akan berpotensi membantu mengurangi risiko terkait dengan kemungkinan tersebut. False = Tidak; True = Ya [Default].

##### "max_files_in_archives" `[int]`
- Jumlah maksimum file yang akan dipindai dari dalam arsip sebelum membatalkan pemindaian. Default = 0 (tidak ada maksimal).

##### "chameleon_from_php" `[bool]`
- Cari header PHP tidak di dalam file-file PHP atau file terkompress. False = Dinonaktifkan; True = Diaktifkan.

##### "can_contain_php_file_extensions" `[string]`
- Daftar ekstensi file diperbolehkan untuk berisi kode PHP, dipisahkan oleh koma. Jika deteksi serangan chameleon PHP diaktifkan, file yang berisi kode PHP, yang memiliki ekstensi yang tidak ada dalam daftar ini, akan terdeteksi sebagai serangan chameleon PHP.

##### "chameleon_from_exe" `[bool]`
- Cari header yang dapat dieksekusi di dalam file-file yang dapat dieksekusi atau file terkompress yang dikenali dan untuk file dapat dieksekusi yang headernya tidak benar. False = Dinonaktifkan; True = Diaktifkan.

##### "chameleon_to_archive" `[bool]`
- Mendeteksi header yang salah dalam arsip dan file terkompresi. Didukung: BZ/BZIP2, GZ/GZIP, LZF, RAR, ZIP. False = Dinonaktifkan; True = Diaktifkan.

##### "chameleon_to_doc" `[bool]`
- Cari dokumen office yang header nya tidak benar (Didukung: DOC, DOT, PPS, PPT, XLA, XLS, WIZ). False = Dinonaktifkan; True = Diaktifkan.

##### "chameleon_to_img" `[bool]`
- Cari gambar yang header nya tidak benar (Didukung: BMP, DIB, PNG, GIF, JPEG, JPG, XCF, PSD, PDD, WEBP). False = Dinonaktifkan; True = Diaktifkan.

##### "chameleon_to_pdf" `[bool]`
- Cari file PDF yang headernya tidak benar. False = Dinonaktifkan; True = Diaktifkan.

##### "archive_file_extensions" `[string]`
- Ekstensi file terkompres yang dikenali (format nya CSV; seharusnya hanya menambah atau menghapus ketika masalah terjadi; tidak cocok langsung menghapus karena dapat menyebabkan angka positif yang salah terjadi pada file terkompres, dimana juga menambahkan deteksi; memodifikasi dengan peringatan; juga dicatat bahwa ini tidak memberi efek pada file terkompress apa yang dapat dan tidak dapat di analisa pada level isi). Daftar sebagaimana defaultnya, memberi daftar format-format yang digunakan yang paling umum melalui melalui mayoritas sistem dan CMS, tapi bermaksud tidak komprehensif.

##### "block_control_characters" `[bool]`
- Memblokir file apapun yang berisi karakter pengendali (lain dari baris baru)? Jika Anda hanya sedang mengupload file teks biasa, maka Anda dapat menghidupkan opsi ini untuk menyediakan perlindungan tambahan ke sistem Anda. Bagaimanapun jika Anda mengupload apapun lebih dari file teks biasa, menghidupkan opsi ini mungkin mengakibatkan angka positif salah. False = Jangan memblokirnya [Default]; True = Memblokirnya.

##### "corrupted_exe" `[bool]`
- File korup dan diurai kesalahan. False = Mengabaikan; True = Memblokir [Default]. Mendeteksi dan memblokir file PE (Portable Executable) berpotensi korup? Sering (tapi tidak selalu), ketika aspek-aspek tertentu dari file PE yang korup atau tidak bisa diurai dengan benar, itu dapat menjadi indikasi dari infeksi virus. Proses yang digunakan oleh sebagian besar program anti-virus untuk mendeteksi virus dalam file PE memerlukan parsing file-file dengan cara tertentu, yang, jika programmer virus menyadari, secara khusus akan mencoba untuk mencegah, untuk memungkinkan virus mereka untuk tetap tidak terdeteksi.

##### "decode_threshold" `[string]`
- Ambang batas dengan panjang file mentah yang dalam decode perintah harus terdeteksi (dalam kasus ada masalah kinerja sementara pemindaian). Default = 512KB. Nol atau nilai null menonaktifkan ambang batas (menghapus apapun batasan berdasarkan ukuran file).

##### "scannable_threshold" `[string]`
- Ambang batas dengan panjang file mentah yang phpMussel diperbolehkan untuk membaca dan memindai (dalam kasus ada masalah kinerja sementara pemindaian). Default = 32MB. Nol atau nilai null menonaktifkan ambang batas. Umumnya, nilai ini tidak seharusnya kurang dari ukuran file rata-rata upload file yang Anda inginkan dan Anda harapkan untuk menerima ke server atau website, tidak seharusnya lebih dari direktif filesize_limit, dan tidak seharusnya lebih dari sekitar seperlima dari total alokasi memori yang diijinkan ke PHP melalui file konfigurasi "php.ini". Direktif ini ada untuk mencegah phpMussel menggunakan terlalu banyak memori (yang bisa mencegah dari yang berhasil memindai file di atas tertentu ukuran file).

##### "allow_leading_trailing_dots" `[bool]`
- Izinkan memimpin dan mengikuti titik-titik dalam nama file? Ini kadang-kadang dapat digunakan untuk menyembunyikan file, atau untuk mengelabui beberapa sistem agar memungkinkan direktori traversal. False = Jangan izinkan [Default]. True = Izinkan.

##### "block_macros" `[bool]`
- Cobalah memblokir semua file yang mengandung macro? Beberapa jenis dokumen dan spreadsheet mungkin berisi makro yang dapat dijalankan, sehingga menyediakan vektor berbahaya berpotensi. False = Jangan memblokirnya [Default]; True = Memblokirnya.

##### "only_allow_images" `[bool]`
- Bila diset ke true, file apapun ditemukan oleh pemindai yang bukan gambar akan segera ditandai, tanpa dipindai. Ini dapat membantu mengurangi waktu yang dibutuhkan untuk menyelesaikan pemindaian dalam beberapa kasus. Diset ke false secara default.

##### "entropy_limit" `[float]`
- Batas entropi untuk tanda tangan yang menggunakan data yang dinormalisasi (defaultnya 7.7). Dalam konteks ini, entropi didefinisikan sebagai entropi shannon dari konten file yang sedang dipindai. Ketika batas entropi dan batas ukuran file entropi terlampaui, untuk mengurangi risiko positif palsu, beberapa tanda tangan yang menggunakan data ternormalisasi akan diabaikan.

##### "entropy_filesize_limit" `[string]`
- Batas ukuran file entropi untuk tanda tangan yang menggunakan data yang dinormalisasi (defaultnya 256KB). Ketika batas entropi dan batas ukuran file entropi terlampaui, untuk mengurangi risiko positif palsu, beberapa tanda tangan yang menggunakan data ternormalisasi akan diabaikan.

#### "quarantine" (Kategori)
Konfigurasi untuk karantina.

##### "quarantine_key" `[string]`
- phpMussel dapat mengkarantina upload file yang diblokir, jika ini adalah sesuatu yang Anda ingin lakukan. Pengguna biasa dari phpMussel yang hanya ingin memproteksi website mereka dan/atau lingkungan hosting mereka tanpa memiliki minat dalam-dalam menganalisis setiap ditandai upload file harus meninggalkan fungsi ini dinonaktifkan, tapi setiap pengguna yang tertarik pada analisis lebih lanjut dari ditandai upload file bagi penelitian malware atau untuk hal-hal seperti serupa harus mengaktifkan fungsi ini. Mengkarantina ditandai upload file dapat kadang-kadang juga membantu dalam men-debug false-positif, jika ini adalah sesuatu yang sering terjadi untuk Anda. Untuk menonaktifkan fungsi karantina, meninggalkan `quarantine_key` direktif kosong, atau menghapus isi dari direktif ini jika tidak sudah kosong. Untuk mengaktifkan fungsi karantina, masukkan beberapa nilai dalam direktif ini. `quarantine_key` adalah fitur keamanan penting dari fungsi karantina diharuskan sebagai sarana untuk mencegah fungsi karantina dari dieksploitasi oleh penyerang potensial dan sebagai sarana mencegah eksekusi potensi file yang disimpan dalam karantina. `quarantine_key` harus diperlakukan dengan cara yang sama seperti kata sandi Anda: Semakin lama semakin baik, dan menjaganya diproteksi erat. Bagi efek terbaik, gunakan dalam hubungannya dengan `delete_on_sight`.

##### "quarantine_max_filesize" `[string]`
- Ukuran file maksimum yang diijinkan dari file yang akan dikarantina. File yang lebih besar dari nilai yang ditentukan dibawah ini TIDAK akan dikarantina. Direktif ini penting sebagai sarana untuk membuat lebih sulit bagi setiap penyerang potensial untuk banjir karantina Anda dengan file yang tidak diinginkan berpotensi menyebabkan penggunaan file kelebihan pada layanan hosting Anda. Default = 2MB.

##### "quarantine_max_usage" `[string]`
- Penggunaan memori maksimal yang diijinkan untuk karantina. Jika total penggunaan memori oleh karantina mencapai nilai ini, file yang dikarantina tertua akan dihapus sampai total penggunaan memori tidak lagi mencapai nilai ini. Direktif ini penting sebagai sarana untuk membuat lebih sulit bagi setiap penyerang potensial untuk banjir karantina Anda dengan file yang tidak diinginkan berpotensi menyebabkan penggunaan file kelebihan pada layanan hosting Anda. Default = 64MB.

##### "quarantine_max_files" `[int]`
- Jumlah maksimum file yang dapat ada di karantina. Ketika file baru ditambahkan ke karantina, jika nomor ini terlampaui, file lama akan dihapus hingga sisanya tidak lagi melebihi nomor ini. Default = 100.

#### "virustotal" (Kategori)
Konfigurasi untuk integrasi Virus Total.

##### "vt_public_api_key" `[string]`
- Secara fakultatif, phpMussel mampu memindai file menggunakan API Virus Total sebagai cara untuk memberikan tingkat sangat ditingkatkan perlindungan terhadap virus, trojan, malware dan ancaman lainnya. Secara default, file pemindaian menggunakan API Virus Total dinonaktifkan. Untuk mengaktifkannya, kunci API dari Virus Total diperlukan. Karena manfaat yang signifikan bahwa ini bisa memberikan kepada Anda, itu adalah sesuatu yang sangat direkomendasi mengaktifkan. Perlu diketahui, bagaimanapun, menggunakan API Virus Total, Anda __*HARUS*__ setuju untuk Terms of Service dan Anda __*HARUS*__ mematuhi semua pedoman terkait dijelaskan oleh Virus Total dokumentasi! Anda TIDAK diizinkan untuk menggunakan fungsi ini KECUALI KALAU: Anda membaca dan setuju untuk Terms of Service dari Virus Total dan API mereka. Anda membaca dan memahami, setidaknya, mukadimah dari Virus Total dokumentasi API (semuanya setelah "VirusTotal Public API v2.0" tapi sebelum "Contents").

Lihat juga:
- [Terms of Service](https://www.virustotal.com/en/about/terms-of-service/)
- [Getting started](https://developers.virustotal.com/reference)

##### "vt_suspicion_level" `[int]`
- Secara default, phpMussel akan membatasi file dipindai menggunakan API Virus Total untuk file-file yang dianggap "mencurigakan". Anda dapat menyesuaikan pembatasan ini dengan mengubah nilai direktif `vt_suspicion_level`.

```
vt_suspicion_level
├─0 (Pindai hanya file dengan bobot heuristik.): File akan dipindai hanya jika memiliki bobot heuristik. Bobot heuristik
│ dapat ditimbulkan dari tanda tangan yang dimaksudkan untuk menangkap sidik
│ jari umum yang terkait dengan infeksi potensial yang tidak selalu menjamin
│ infeksi. Pencarian, dalam kasus tersebut, dapat berfungsi untuk memberikan
│ pendapat kedua untuk hasil yang membenarkan kecurigaan tetapi tidak
│ memberikan kepastian apapun.
├─1 (Pindai file dengan bobot heuristik, file yang dapat dieksekusi, dan file yang berpotensi berisi data yang dapat dieksekusi.): Contoh file yang dapat dieksekusi, dan file yang berpotensi berisi data yang
│ dapat dieksekusi, termasuk file Windows PE, file Linux ELF, file Mach-O,
│ file DOCX, file ZIP, dll.
└─2 (Pindai semua file.)
```

##### "vt_weighting" `[int]`
- Apakah Anda ingin phpMussel menerapkan hasil pemindaian menggunakan API Virus Total sebagai deteksi atau deteksi pembobotan? Direktif ini ada, karena, meskipun memindai file menggunakan mesin-mesin kelipatan (sebagai Virus Total melakukannya) harus menghasilkan tingkat deteksi meningkat (dan demikian lebih banyak file berbahaya tertangkap), juga dapat menghasilkan jumlah yang lebih banyak dari positif palsu, dan demikian, dalam kondisi beberapa, hasil pemindaian dapat digunakan lebih efektif sebagai nilai keyakinan daripada daripada sebagai kesimpulan definitif. Jika nilai 0 digunakan, hasil pemindaian menggunakan API Virus Total akan diaplikasikan sebagai pendeteksian, dan demikian, jika mesin-mesin digunakan oleh Virus Total menandai file dipindai sebagai berbahaya, phpMussel akan menganggap file yang berbahaya. Jika nilai lain yang digunakan, hasil pemindaian menggunakan API Virus Total akan diaplikasikan sebagai deteksi pembobotan, dan demikian, jumlah mesin digunakan oleh Virus Total menandai file dipindai sebagai berbahaya akan berfungsi sebagai nilai keyakinan (atau deteksi pembobotan) untuk jika file dipindai harus dianggap berbahaya oleh phpMussel (nilai digunakan akan mewakili nilai keyakinan minimum atau pembobotan minimum diperlukan untuk dianggap berbahaya). Nilai 0 digunakan secara default.

##### "vt_quota_rate" `[int]`
- Menurut Virus Total dokumentasi API, itu terbatas untuk paling 4 permintaan dalam bentuk apapun dalam jangka waktu 1 menit diberikan. Jika Anda menjalankan sebuah honeyclient, honeypot atau otomatisasi lainnya yang akan menyediakan file untuk VirusTotal dan tidak hanya mengambil laporan Anda berhak untuk kuota permintaan lebih tinggi. Secara default, phpMussel ketat akan mematuhi keterbatasan ini, tapi karena kemungkinan kuota ini sedang meningkat, dua direktif ini yang disediakan sebagai sarana bagi Anda untuk menginstruksikan phpMussel tentang apa batas harus dipatuhi. Kecuali Anda telah diperintahkan untuk melakukannya, itu tidak direkomendasikan bagi Anda untuk meningkat nilai-nilai ini, tapi, jika Anda mengalami masalah berkaitan dengan mencapai kuota Anda, penurunan nilai-nilai ini kadang __*DAPAT*__ membantu Anda bagi berurusan dengan masalah-masalah ini. Batas Anda ditentukan sebagai `vt_quota_rate` permintaan dalam bentuk apapun dalam jangka waktu `vt_quota_time` menit.

##### "vt_quota_time" `[int]`
- (Lihat uraian di atas).

#### "urlscanner" (Kategori)
Konfigurasi untuk pemindai URL.

##### "google_api_key" `[string]`
- Memungkinkan pemeriksaan API ke Google Safe Browsing API ketika kunci API diperlukan didefinisikan.

Lihat juga:
- [Google API Console](https://console.developers.google.com/)

##### "maximum_api_lookups" `[int]`
- Jumlah maksimum pemeriksaan API melakukan per iterasi memindai individual. Karena setiap API pemeriksaan akan menambah tambahan waktu total dibutuhkan untuk menyelesaikan setiap iterasi pemindaian, Anda mungkin ingin menetapkan batasan untuk mempercepat proses pemindaian secara keseluruhan. Bila diset untuk 0, sejumlah maksimum tidak akan diterapkan. Diset untuk 10 secara default.

##### "maximum_api_lookups_response" `[bool]`
- Apa yang harus dilakukan jika jumlah maksimal pemeriksaan API dilampaui? False = Jangan melakukan apa-apa (melanjutkan pemrosesan) [Default]; True = Menandai/Memblokir file.

##### "cache_time" `[int]`
- Berapa lama (dalam detik) harus hasil API untuk disimpan dalam cache? Default adalah 3600 detik (1 jam).

#### "legal" (Kategori)
Konfigurasi untuk persyaratan hukum.

##### "pseudonymise_ip_addresses" `[bool]`
- Pseudonimisasikan alamat IP saat menulis file log? True = Ya [Default]; False = Tidak.

##### "privacy_policy" `[string]`
- Alamat dari kebijakan privasi yang relevan untuk ditampilkan di footer dari setiap halaman yang dihasilkan. Spesifikasikan URL, atau biarkan kosong untuk menonaktifkan.

#### "supplementary_cache_options" (Kategori)
Opsi cache tambahan. Catat: Mengubah nilai ini berpotensi membuat Anda keluar.

##### "prefix" `[string]`
- Nilai yang ditentukan disini akan ditambahkan ke awal kunci untuk semua entri di cache. Default = "phpMussel_". Ketika beberapa instalasi ada di server, ini dapat berguna untuk menjaga cache mereka terpisah.

##### "enable_apcu" `[bool]`
- Menentukan apakah akan mencoba menggunakan APCu untuk cache. Default = True.

##### "enable_memcached" `[bool]`
- Menentukan apakah akan mencoba menggunakan Memcached untuk cache. Default = False.

##### "enable_redis" `[bool]`
- Menentukan apakah akan mencoba menggunakan Redis untuk cache. Default = False.

##### "enable_pdo" `[bool]`
- Menentukan apakah akan mencoba menggunakan PDO untuk cache. Default = False.

##### "memcached_host" `[string]`
- Nilai host Memcached. Default = localhost.

##### "memcached_port" `[int]`
- Nilai port Memcached. Default = "11211".

##### "redis_host" `[string]`
- Nilai host Redis. Default = localhost.

##### "redis_port" `[int]`
- Nilai port Redis. Default = "6379".

##### "redis_timeout" `[float]`
- Nilai batas waktu Redis. Default = "2.5".

##### "redis_database_number" `[int]`
- Nomor basis data Redis. Default = 0. Catat: Tidak dapat menggunakan nilai selain 0 dengan Redis Cluster.

##### "pdo_dsn" `[string]`
- Nilai DSN PDO. Default = "mysql:dbname=phpmussel;host=localhost;port=3306".

__FAQ.__ *<a href="https://github.com/phpMussel/Docs/blob/master/readme.id.md#user-content-HOW_TO_USE_PDO" hreflang="id-ID">Apa itu "PDO DSN"? Bagaimana saya bisa menggunakan PDO dengan phpMussel?</a>*

##### "pdo_username" `[string]`
- Nama pengguna PDO.

##### "pdo_password" `[string]`
- Kata sandi PDO.

#### "frontend" (Kategori)
Konfigurasi untuk bagian depan.

##### "frontend_log" `[string]`
- File untuk mencatat upaya masuk bagian depan. Spesifikasikan nama file, atau biarkan kosong untuk menonaktifkan.

Kiat yang berguna: Anda dapat melampirkan informasi tanggal/waktu ke nama file log dengan menggunakan placeholder format waktu. Placeholder format waktu yang tersedia ditampilkan di <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "max_login_attempts" `[int]`
- Jumlah maksimum upaya memasukkan ke bagian depan. Default = 5.

##### "numbers" `[string]`
- Cara apa yang kamu suka nomor menjadi ditampilkan? Pilih contoh yang paling sesuai untuk Anda.

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
- Mendefinisikan algoritma mana yang akan digunakan untuk semua kata sandi dan sesi di masa depan.

```
default_algo
├─PASSWORD_DEFAULT ("PASSWORD_DEFAULT")
├─PASSWORD_BCRYPT ("PASSWORD_BCRYPT")
├─PASSWORD_ARGON2I ("PASSWORD_ARGON2I")
└─PASSWORD_ARGON2ID ("PASSWORD_ARGON2ID (PHP >= 7.3.0)")
```

##### "theme" `[string]`
- Estetika yang digunakan untuk bagian depan phpMussel.

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
└─…Lain
```

##### "magnification" `[float]`
- Perbesaran font. Default = 1.

##### "custom_header" `[string]`
- Disisipkan sebagai HTML di awal semua halaman front-end. Ini dapat berguna jika Anda ingin menyertakan logo situs web, header yang dipersonalisasi, skrip, atau sejenisnya di semua halaman tersebut.

##### "custom_footer" `[string]`
- Disisipkan sebagai HTML di akhir semua halaman front-end. Ini dapat berguna jika Anda ingin menyertakan pemberitahuan hukum, tautan kontak, informasi bisnis, atau sejenisnya di semua halaman tersebut.

#### "web" (Kategori)
Konfigurasi untuk penangan upload.

##### "uploads_log" `[string]`
- Dimana semua upload yang diblokir harus dicatat. Spesifikan nama atau biarkan kosong untuk menonaktifkan.

Kiat yang berguna: Anda dapat melampirkan informasi tanggal/waktu ke nama file log dengan menggunakan placeholder format waktu. Placeholder format waktu yang tersedia ditampilkan di <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "forbid_on_block" `[bool]`
- Seharusnya phpMussel mengirimkan 403 headers dengan pesan upload file yang terblok, atau cocok dengan 200 OK? False = Tidak (200); True = Ya (403) [Default].

##### "unsupported_media_type_header" `[bool]`
- Seharusnya phpMussel mengirimkan 415 headers saat upload diblokir karena jenis filenya ada di daftar hitam? Jika true, pengaturan ini menggantikan `forbid_on_block`. False = Tidak [Default]; True = Ya.

##### "max_uploads" `[int]`
- Maksimum jumla file-file yang diizinkan untuk dipindai selama pemindaian upload file sebelum menghentikan pemindaian dan menginformasikan pengguna bahwa mereka mengupload terlalu banyak! Menyediakan perlindungan pada serangan teoritis dimana penyerang mencoba DDoS pada sistem atau CMS Anda melalui membebani phpMussel supaya berjalan lambat. Proses PHP ke penghentian keras. Recommendasi: 10. Anda dapat menaikkan atau menurunkan angka ini bergantung dari kecepatan hardware Anda. Catat itu nomor ini tidak mengakuntabilitas atau mengikutkan konten dari file terkompres.

##### "ignore_upload_errors" `[bool]`
- Direktif ini umumnya harus DINONAKTIFKAN kecuali diharuskan untuk fungsi yang benar dari phpMussel pada sistem tertentu. Biasanya, ketika DINONAKTIFKAN, ketika phpMussel mendeteksi adanya elemen dalam `$_FILES` array(), itu akan mencoba untuk memulai scan file yang mewakili elemen, dan, jika elemen tersebut adalah kosong, phpMussel akan mengembalikan pesan kesalahan. Ini adalah perilaku yang tepat untuk phpMussel. Namun, untuk beberapa CMS, elemen kosong di `$_FILES` dapat terjadi sebagai akibat dari perilaku alami jadi CMS tersebut, atau kesalahan dapat dilaporkan bila tidak ada, dan dalam kasus seperti itu, perilaku normal untuk phpMussel akan mengganggu untuk perilaku normal itu CMS. Jika situasi seperti itu terjadi untuk Anda, MENGAKTIFKAN direktif ini akan menginstruksikan phpMussel untuk tidak mencoba untuk memulai scan untuk elemen kosong, mengabaikan saat ditemui dan untuk tidak kembali terkait pesan kesalahan, sehingga memungkinkan kelanjutan dari halaman permintaan. False = DINONAKTIFKAN; True = DIAKTIFKAN.

##### "theme" `[string]`
- Estetika yang digunakan untuk halaman "upload ditolak".

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
└─…Lain
```

##### "magnification" `[float]`
- Perbesaran font. Default = 1.

##### "custom_header" `[string]`
- Disisipkan sebagai HTML di awal semua halaman "upload ditolak". Ini dapat berguna jika Anda ingin menyertakan logo situs web, header yang dipersonalisasi, skrip, atau sejenisnya di semua halaman tersebut.

##### "custom_footer" `[string]`
- Disisipkan sebagai HTML di akhir semua halaman "upload ditolak". Ini dapat berguna jika Anda ingin menyertakan pemberitahuan hukum, tautan kontak, informasi bisnis, atau sejenisnya di semua halaman tersebut.

#### "phpmailer" (Kategori)
Konfigurasi untuk PHPMailer (digunakan untuk otentikasi dua-faktor dan untuk pemberitahuan email).

##### "event_log" `[string]`
- File untuk mencatat semua kejadian yang terkait dengan PHPMailer. Spesifikasikan nama file, atau biarkan kosong untuk menonaktifkan.

Kiat yang berguna: Anda dapat melampirkan informasi tanggal/waktu ke nama file log dengan menggunakan placeholder format waktu. Placeholder format waktu yang tersedia ditampilkan di <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "enable_two_factor" `[bool]`
- Direktif ini menentukan apakah akan menggunakan 2FA untuk akun depan.

##### "enable_notifications" `[string]`
- Jika Anda ingin diberi tahu melalui email saat upload diblokir, tentukan alamat email penerima disini.

##### "skip_auth_process" `[bool]`
- Pengaturan direktif ini ke `true` menginstruksikan PHPMailer untuk melewati proses otentikasi yang biasanya terjadi ketika mengirim email melalui SMTP. Ini harus dihindari, karena melewatkan proses ini dapat mengekspos email keluar ke serangan MITM, tetapi mungkin diperlukan dalam kasus dimana proses ini mencegah PHPMailer menghubungkan ke server SMTP.

##### "host" `[string]`
- Host SMTP yang digunakan untuk email keluar.

##### "port" `[int]`
- Nomor port yang digunakan untuk email keluar. Default = 587.

##### "smtp_secure" `[string]`
- Protokol yang digunakan saat mengirim email melalui SMTP (TLS atau SSL).

```
smtp_secure
├─default ("-")
├─tls ("TLS")
└─ssl ("SSL")
```

##### "smtp_auth" `[bool]`
- Direktif ini menentukan apakah akan mengotentikasi sesi SMTP (biasanya harus dibiarkan sendiri).

##### "username" `[string]`
- Nama pengguna yang digunakan saat mengirim email melalui SMTP.

##### "password" `[string]`
- Kata sandi yang digunakan saat mengirim email melalui SMTP.

##### "set_from_address" `[string]`
- Alamat pengirim yang dikutip saat mengirim email melalui SMTP.

##### "set_from_name" `[string]`
- Nama pengirim yang dikutip saat mengirim email melalui SMTP.

##### "add_reply_to_address" `[string]`
- Alamat balasan yang dikutip saat mengirim email melalui SMTP.

##### "add_reply_to_name" `[string]`
- Nama balasan yang dikutip saat mengirim email melalui SMTP.

---


### 6. <a name="SECTION6"></a>FORMAT TANDA TANGAN

*Lihat juga:*
- *[Apa yang "tanda tangan"?](#user-content-WHAT_IS_A_SIGNATURE)*

9 byte pertama `[x0-x8]` dari file tanda tangan phpMussel adalah `phpMussel`, dan Bertindak sebagai "nomor ajaib" (magic number), untuk mengidentifikasi mereka sebagai file tanda tangan (ini membantu mencegah phpMussel secara tidak sengaja mencoba menggunakan file yang bukan file tanda tangan). Byte berikutnya `[x9]` mengidentifikasi jenis file tanda tangan, yang harus diketahui oleh phpMussel agar bisa menafsirkan file tanda tangan dengan benar. Jenis file tanda tangan berikut dikenali:

Tipe | Byte | Deskripsi
---|---|---
`General_Command_Detections` | `0?` | Untuk file tanda tangan CSV (comma separated values). Nilai (tanda tangan) adalah string yang dikodekan heksadesimal untuk dicari dalam file. Tanda tangan disini tidak memiliki nama atau rincian lainnya (hanya string yang bisa dideteksi).
`Filename` | `1?` | Untuk tanda tangan nama file.
`Hash` | `2?` | Untuk tanda tangan hash.
`Standard` | `3?` | Untuk file tanda tangan yang bekerja langsung dengan isi file.
`Standard_RegEx` | `4?` | Untuk file tanda tangan yang bekerja langsung dengan isi file. Tanda tangan dapat berisi ekspresi reguler.
`Normalised` | `5?` | Untuk file tanda tangan yang bekerja dengan isi file yang dibuat menjadi ANSI.
`Normalised_RegEx` | `6?` | Untuk file tanda tangan yang bekerja dengan isi file yang dibuat menjadi ANSI. Tanda tangan dapat berisi ekspresi reguler.
`HTML` | `7?` | Untuk file tanda tangan yang bekerja dengan isi file yang dibuat menjadi HTML.
`HTML_RegEx` | `8?` | Untuk file tanda tangan yang bekerja dengan isi file yang dibuat menjadi HTML. Tanda tangan dapat berisi ekspresi reguler.
`PE_Extended` | `9?` | Untuk file tanda tangan yang bekerja dengan metadata PE (selain metadata seksi PE).
`PE_Sectional` | `A?` | Untuk file tanda tangan yang bekerja dengan metadata seksi PE.
`Complex_Extended` | `B?` | Untuk file tanda tangan yang bekerja dengan berbagai peraturan berdasarkan metadata yang diperluas yang dihasilkan oleh phpMussel.
`URL_Scanner` | `C?` | Untuk file tanda tangan yang bekerja dengan URL.

Byte berikutnya `[x10]` adalah baris baru `[0A]`, dan menyimpulkan header file tanda tangan phpMussel.

Setiap baris yang tidak kosong setelah itu adalah tanda tangan atau peraturan. Setiap tanda tangan atau peraturan menempati satu baris. Format tanda tangan yang didukung dijelaskan dibawah ini.

#### *TANDA TANGAN NAMA FILE*
Semua tanda tangan nama file mengikuti format ini:

`NAMA:FNRX`

Dimana NAMA adalah nama mengutip tanda tangan dan FNRX adalah pola regex untuk mencocokkan nama file (tidak ter-encode).

#### *TANDA TANGAN HASH*
Semua tanda tangan HASH mengikuti format ini:

`HASH:UKURAN:NAMA`

Dimana HASH adalah hash (biasanya MD5) dari keseluruhan file, UKURAN adalah total ukuran file dan NAMA adalah nama untuk mengutip tanda tangan tersebut.

#### *TANDA TANGAN SEKSIONAL PE*
Semua tanda tangan seksional PE mengikuti format ini:

`UKURAN:HASH:NAMA`

Dimana HASH adalah MD5 dari seksi PE, UKURAN adalah total ukuran dari seksi PE dan NAMA adalah nama untuk mengutip tanda tangan tersebut.

#### *TANDA TANGAN DIPERPANJANG PE*
Semua tanda tangan diperpanjang PE mengikuti format ini:

`$VAR:HASH:UKURAN:NAMA`

Dimana $VAR adalah nama dari PE variabel untuk mencocokkan terhadap, HASH adalah MD5 dari variabel, UKURAN adalah ukuran total dari variabel dan NAMA adalah nama untuk mengutip tanda tangan tersebut.

#### *TANDA TANGAN DIPERPANJANG KOMPLEKS*
Tanda tangan diperpanjang kompleks adalah berbeda dengan jenis lain dari tanda tangan phpMussel, melalui bahwa apa yang mencocokkan mereka ditentukan oleh tanda tangan sendiri dan mereka dapat mencocokkan terhadap beberapa kriteria. Kriteria mencocokkan yang dipisahkan oleh ";" dan pencocokan jenis dan pencocokan data masing-masing kriteria yang dipisahkan oleh ":" sebagai sehingga format untuk tanda tangan ini cenderung terlihat sedikit seperti:

`$variabel1:DATA;$variabel:DATA;NamaTandaTangan`

#### *YANG LAIN*
Semua tanda tangan yang lain mengikuti format ini:

`NAMA:HEX:FROM:TO`

Dimana NAMA adalah nama yang mengutip tanda tangan ini dan HEX adalah sebuah segmen heksadesimal-dikodekan dari data yang dimaksudkan untuk dicocokkan oleh tanda tangan yang diberikan. FROM dan TO adalah parameter opsional, mengindikasikan dari mana dan kemana posisi dari sumber file untuk cek.

#### *REGEX (REGULAR EXPRESSIONS)*
Setiap bentuk dari regex mengerti dan dengan benar diproses oleh PHP seharusnya bisa dengan benar dimengerti dan diproses oleh phpMussel dan tanda tangannya. Bagaimanapun, saya menyarankan peringatan ekstrim ketika menuliskan tanda tangan berbasis regex baru karena, jika Anda tidak yakin apa yang Anda lakukan dapat menghasilkan hal yang tidak diinginkan. Coba lihat source-code phpMussel dan jika Anda tidak yakin tentang konteks dari statemen regex diparsing. Juga ingat bahwa semua pola (dengan pengecualian ke nama data, metadata terkompres dan pola MD5) harus diencode heksadesimal (sintaksis pola sebelumnya, tentu saja)!

---


### 7. <a name="SECTION7"></a>MASALAH KOMPATIBILITAS DIKETAHUI

#### KOMPATIBILITAS SOFTWARE ANTI-VIRUS

Masalah kompatibilitas antara phpMussel dan beberapa vendor anti-virus telah diketahui terjadi di masa lalu, jadi setiap beberapa bulan atau sekitar itu, saya memeriksa versi terbaru dari basis kode phpMussel terhadap Total Virus, untuk melihat apakah ada masalah dilaporkan disana. Ketika masalah dilaporkan disana, saya daftar masalah yang dilaporkan disini, dalam dokumentasi.

Ketika saya baru-baru ini memeriksa (2022.05.12), tidak ada masalah dilaporkan.

Saya tidak memeriksa file tanda tangan, dokumentasi, atau konten periferal lainnya. File tanda tangan selalu menyebabkan beberapa kesalahan positif ketika solusi anti-virus lain mendeteksi mereka, jadi saya akan sangat menyarankan, bahwa jika Anda berencana untuk menginstal phpMussel di mesin dimana solusi anti-virus lain sudah ada, untuk daftar file tanda tangan phpMussel di daftar putih Anda.

*Lihat juga: [Bagan Kompatibilitas](https://maikuolan.github.io/Compatibility-Charts/).*

---


### 8. <a name="SECTION8"></a>PERTANYAAN YANG SERING DIAJUKAN (FAQ)

- [Apa yang "tanda tangan"?](#user-content-WHAT_IS_A_SIGNATURE)
- [Apa yang dimaksud dengan "positif palsu"?](#user-content-WHAT_IS_A_FALSE_POSITIVE)
- [Seberapa sering tanda tangan diperbarui?](#user-content-SIGNATURE_UPDATE_FREQUENCY)
- [Saya mengalami masalah ketika menggunakan phpMussel dan saya tidak tahu apa saya harus lakukan! Tolong bantu!](#user-content-ENCOUNTERED_PROBLEM_WHAT_TO_DO)
- [Saya ingin menggunakan phpMussel v3 dengan versi PHP yang lebih tua dari 7.2.0; Anda dapat membantu?](#user-content-MINIMUM_PHP_VERSION_V3)
- [Dapatkah saya menggunakan satu instalasi phpMussel untuk melindungi beberapa domain?](#user-content-PROTECT_MULTIPLE_DOMAINS)
- [Saya tidak ingin membuang waktu dengan menginstal ini dan membuatnya bekerja dengan situs web saya; Bisakah saya membayar Anda untuk melakukan semuanya untuk saya?](#user-content-PAY_YOU_TO_DO_IT)
- [Dapatkah saya mempekerjakan Anda atau pengembang proyek ini untuk pekerjaan pribadi?](#user-content-HIRE_FOR_PRIVATE_WORK)
- [Saya perlu modifikasi khusus, customisasi, dll; Apakah kamu bisa membantu?](#user-content-SPECIALIST_MODIFICATIONS)
- [Saya seorang pengembang, perancang situs web, atau programmer. Dapatkah saya menerima atau menawarkan pekerjaan yang berkaitan dengan proyek ini?](#user-content-ACCEPT_OR_OFFER_WORK)
- [Saya ingin berkontribusi pada proyek ini; Dapatkah saya melakukan ini?](#user-content-WANT_TO_CONTRIBUTE)
- [Bagaimana cara mengakses rincian spesifik tentang file saat dipindai?](#user-content-SCAN_DEBUGGING)
- [Daftar hitam – Daftar putih – Daftar abu-abu – Apa itu mereka, dan bagaimana cara menggunakannya?](#user-content-BLACK_WHITE_GREY)
- [Apa itu "PDO DSN"? Bagaimana saya bisa menggunakan PDO dengan phpMussel?](#user-content-HOW_TO_USE_PDO)
- [Fasilitas upload saya tidak sinkron (misalnya, menggunakan ajax, ajaj, json, dll). Saya tidak melihat pesan atau peringatan khusus ketika upload diblokir. Apa yang sedang terjadi?](#user-content-AJAX_AJAJ_JSON)
- [Bisakah phpMussel mendeteksi EICAR?](#user-content-DETECT_EICAR)

#### <a name="WHAT_IS_A_SIGNATURE"></a>Apa yang "tanda tangan"?

Dalam konteks phpMussel, "tanda tangan" mengacu pada data yang bertindak sebagai indikator/pengenal untuk sesuatu spesifik yang kita cari, biasanya dalam bentuk segmen yang sangat kecil, unik, tidak berbahaya dari sesuatu yang lebih besar dan biasanya, sebaliknya berbahaya, seperti virus atau trojan, atau dalam bentuk file checksum, hash, atau indikator yang mengidentifikasi lainnya, dan biasanya termasuk label, dan beberapa data lainnya, untuk membantu memberikan konteks tambahan yang bisa digunakan oleh phpMussel untuk menentukan cara terbaik untuk melanjutkan ketika menemukan apa yang kita cari.

#### <a name="WHAT_IS_A_FALSE_POSITIVE"></a>Apa yang dimaksud dengan "positif palsu"?

Istilah "positif palsu" (*alternatif: "kesalahan positif palsu"; "alarm palsu"*; Bahasa Inggris: *false positive*; *false positive error*; *false alarm*), dijelaskan dengan sangat sederhana, dan dalam konteks umum, digunakan saat pengujian untuk kondisi, untuk merujuk pada hasil tes, ketika hasilnya positif (yaitu, kondisi adalah dianggap untuk menjadi "positif", atau "benar"), namun diharapkan (atau seharusnya) menjadi negatif (yaitu, kondisi ini, pada kenyataannya, adalah "negatif", atau "palsu"). Sebuah "positif palsu" bisa dianggap analog dengan "menangis serigala" (dimana kondisi dites adalah apakah ada serigala di dekat kawanan, kondisi adalah "palsu" di bahwa tidak ada serigala di dekat kawanan, dan kondisi ini dilaporkan sebagai "positif" oleh gembala dengan cara memanggil "serigala, serigala"), atau analog dengan situasi dalam pengujian medis dimana seorang pasien didiagnosis sebagai memiliki beberapa penyakit, ketika pada kenyataannya, mereka tidak memiliki penyakit tersebut.

Hasil terkait ketika pengujian untuk kondisi dapat digambarkan menggunakan istilah "positif benar", "negatif benar" dan "negatif palsu". Sebuah "positif benar" mengacu pada saat hasil tes dan keadaan sebenarnya dari kondisi adalah keduanya benar (atau "positif"), dan sebuah "negatif benar" mengacu pada saat hasil tes dan keadaan sebenarnya dari kondisi adalah keduanya palsu (atau "negatif"); Sebuah "positif benar" atau "negatif benar" adalah dianggap untuk menjadi sebuah "inferensi benar". Antitesis dari "positif palsu" adalah sebuah "negatif palsu"; Sebuah "negatif palsu" mengacu pada saat hasil tes are negatif (yaitu, kondisi adalah dianggap untuk menjadi "negatif", atau "palsu"), namun diharapkan (atau seharusnya) menjadi positif (yaitu, kondisi ini, pada kenyataannya, adalah "positif", atau "benar").

Dalam konteks phpMussel, istilah-istilah ini mengacu pada tanda tangan dari phpMussel dan file yang mereka memblokir. Ketika phpMussel blok file karena buruk, usang atau salah tanda tangan, tapi seharusnya tidak melakukannya, atau ketika melakukannya untuk alasan salah, kita menyebut acara ini sebuah "positif palsu". Ketika phpMussel gagal untuk memblokir file yang seharusnya diblokir, karena ancaman tak terduga, hilang tanda tangan atau kekurangan dalam tanda tangan nya, kita menyebut acara ini sebuah "deteksi terjawab" atau "missing detection" (ini analog dengan sebuah "negatif palsu").

Ini dapat diringkas dengan tabel dibawah:

&nbsp; | phpMussel seharusnya *TIDAK* memblokir file | phpMussel *SEHARUSNYA* memblokir file
---|---|---
phpMussel *TIDAK* memblokir file | Negatif benar (inferensi benar) | Deteksi terjawab (analog dengan negatif palsu)
phpMussel memblokir file | __Positif palsu__ | Positif benar (inferensi benar)

#### <a name="SIGNATURE_UPDATE_FREQUENCY"></a>Seberapa sering tanda tangan diperbarui?

Frekuensi pembaruan bervariasi tergantung pada file tanda tangan. Semua penulis bagi file tanda tangan phpMussel umumnya mencoba untuk menjaga tanda tangan mereka sebagai diperbarui sebanyak mungkin, tapi karena semua dari kita memiliki komitmen lainnya, kehidupan kita di luar proyek, dan karena kita tidak dikompensasi finansial (yaitu, dibayar) untuk upaya kami pada proyek, jadwal pembaruan yang tepat tidak dapat dijamin. Umumnya, tanda tangan diperbarui ketika ada cukup waktu untuk memperbaruinya. Bantuan selalu dihargai jika Anda bersedia untuk menawarkan.

#### <a name="ENCOUNTERED_PROBLEM_WHAT_TO_DO"></a>Saya mengalami masalah ketika menggunakan phpMussel dan saya tidak tahu apa saya harus lakukan! Tolong bantu!

- Apakah Anda menggunakan versi terbaru bagi perangkat lunak? Apakah Anda menggunakan versi terbaru bagi file tanda tangan Anda? Jika jawaban untuk salah satu dari dua pertanyaan ini adalah tidak, mencoba untuk memperbarui segala sesuatu pertama, dan memeriksa apakah masalah terus berlanjut. Jika terus berlanjut, lanjutkan membaca.
- Apakah Anda memeriksa semua dokumentasi? Jika tidak, silakan melakukannya. Jika masalah tidak dapat diselesaikan dengan menggunakan dokumentasi, lanjutkan membaca.
- Apakah Anda memeriksa **[halaman issues](https://github.com/phpMussel/phpMussel/issues)**, untuk melihat apakah masalah telah disebutkan sebelumnya? Jika sudah disebutkan sebelumnya, memeriksa apakah ada saran, ide, dan/atau solusi yang tersedia, dan ikuti sesuai yang diperlukan untuk mencoba untuk menyelesaikan masalah.
- Jika masalah masih berlanjut, silakan mencari bantuan dengan membuat issue baru di halaman issues.

#### <a name="MINIMUM_PHP_VERSION_V3"></a>Saya ingin menggunakan phpMussel v3 dengan versi PHP yang lebih tua dari 7.2.0; Anda dapat membantu?

Tidak. PHP >= 7.2.0 adalah persyaratan minimum untuk phpMussel v3.

*Lihat juga: [Bagan Kompatibilitas](https://maikuolan.github.io/Compatibility-Charts/).*

#### <a name="PROTECT_MULTIPLE_DOMAINS"></a>Dapatkah saya menggunakan satu instalasi phpMussel untuk melindungi beberapa domain?

Ya.

#### <a name="PAY_YOU_TO_DO_IT"></a>Saya tidak ingin membuang waktu dengan menginstal ini dan membuatnya bekerja dengan situs web saya; Bisakah saya membayar Anda untuk melakukan semuanya untuk saya?

Mungkin. Ini dipertimbangkan berdasarkan kasus per kasus. Beritahu kami apa yang Anda butuhkan, apa yang Anda tawarkan, dan kami akan memberitahu Anda jika kami dapat membantu.

#### <a name="HIRE_FOR_PRIVATE_WORK"></a>Dapatkah saya mempekerjakan Anda atau pengembang proyek ini untuk pekerjaan pribadi?

*Lihat di atas.*

#### <a name="SPECIALIST_MODIFICATIONS"></a>Saya perlu modifikasi khusus, customisasi, dll; Apakah kamu bisa membantu?

*Lihat di atas.*

#### <a name="ACCEPT_OR_OFFER_WORK"></a>Saya seorang pengembang, perancang situs web, atau programmer. Dapatkah saya menerima atau menawarkan pekerjaan yang berkaitan dengan proyek ini?

Ya. Lisensi kami tidak melarang hal ini.

#### <a name="WANT_TO_CONTRIBUTE"></a>Saya ingin berkontribusi pada proyek ini; Dapatkah saya melakukan ini?

Ya. Kontribusi untuk proyek ini sangat disambut baik. Silakan lihat "CONTRIBUTING.md" untuk informasi lebih lanjut.

#### <a name="SCAN_DEBUGGING"></a>Bagaimana cara mengakses rincian spesifik tentang file saat dipindai?

Anda dapat mengakses rincian spesifik tentang file saat dipindai dengan menetapkan array yang akan digunakan untuk tujuan ini sebelum menginstruksikan phpMussel untuk memindai mereka.

Pada contoh dibawah ini, `$Foo` ditugaskan untuk tujuan ini. Setelah memindai `/jalur/file/...`, informasi rinci tentang file yang dalam `/jalur/file/...` akan berada dalam `$Foo`.

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);

$Scanner->setScanDebugArray($Foo);

$Results = $Scanner->scan('/jalur/file/...');

var_dump($Foo);
```

Array yang multidimensi dan terdiri dari elemen yang mewakili setiap file yang dipindai dan sub-elemen yang mewakili rincian tentang file-file ini. Sub-elemen ini adalah sebagai berikut:

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

*† - Tidak disediakan untuk hasil yang di-cache (hanya disediakan untuk hasil scan yang baru).*

*‡ - Hanya disediakan saat memindai file PE.*

Opsional, array ini bisa dihancurkan dengan menggunakan berikut ini:

```PHP
$Scanner->destroyScanDebugArray($Foo);
```

#### <a name="BLACK_WHITE_GREY"></a>Daftar hitam – Daftar putih – Daftar abu-abu – Apa itu mereka, dan bagaimana cara menggunakannya?

Istilah-istilah ini menyampaikan makna yang berbeda dalam konteks yang berbeda. Di phpMussel, ada tiga konteks dimana istilah-istilah ini digunakan: Respons ukuran file, respons jenis file, dan daftar abu-abu tanda tangan.

Untuk mencapai hasil yang diinginkan dengan biaya minimal untuk diproses, ada beberapa hal sederhana yang dapat diperiksa oleh phpMussel sebelum benar-benar memindai file, seperti ukuran file, nama, dan ekstensi. Sebagai contoh; Jika file terlalu besar, atau jika ekstensi menunjukkan jenis file yang kami tidak ingin izinkan ke situs web kami, kami dapat segera menandai file, dan tidak perlu memindainya.

Respons ukuran file adalah cara phpMussel merespons ketika file melebihi batas yang ditentukan. Meskipun tidak ada daftar terlibat, sebuah file dapat dianggap masuk daftar hitam, masuk daftar putih, atau masuk daftar abu-abu, berdasarkan ukurannya. Dua direktif konfigurasi opsional yang terpisah ada untuk menentukan batas dan respons yang diinginkan masing-masing.

Respons jenis file adalah cara phpMussel merespons ekstensi file. Tiga direktif konfigurasi opsional tersedia untuk secara eksplisit menentukan ekstensi mana yang harus dimasukkan dalam daftar hitam, daftar putih, atau daftar abu-abu. Sebuah file dapat dianggap masuk daftar hitam, masuk daftar putih, atau masuk daftar abu-abu jika ekstensinya cocok dengan salah satu ekstensi yang ditentukan.

Dalam dua konteks ini, menjadi masuk daftar putih berarti tidak boleh dipindai atau ditandai; masuk daftar hitam berarti harus ditandai (dan karena itu tidak perlu memindainya); dan menjadi masuk daftar abu-abu berarti analisis lebih lanjut diperlukan untuk menentukan apakah kita harus menandainya (yaitu, itu harus dipindai).

Daftar abu-abu tanda tangan adalah daftar tanda tangan yang pada dasarnya harus diabaikan (ini secara singkat disebutkan sebelumnya dalam dokumentasi). Ketika tanda tangan di daftar abu-abu tanda tangan dipicu, phpMussel terus bekerja melalui tandatangannya dan tidak mengambil tindakan khusus dalam hal tanda tangan dalam daftar abu-abu. Tidak ada daftar hitam tanda tangan, karena perilaku tersirat adalah perilaku normal untuk tanda tangan yang dipicu, dan tidak ada daftar putih tanda tangan, karena perilaku tersirat tidak akan benar-benar masuk akal dengan pertimbangan bagaimana phpMussel bekerja normal dan kemampuan yang sudah dimiliki.

Daftar abu-abu tanda tangan berguna jika Anda perlu menyelesaikan masalah yang disebabkan oleh tanda tangan tertentu tanpa menonaktifkan atau menghapus seluruh file tanda tangan.

#### <a name="HOW_TO_USE_PDO"></a>Apa itu "PDO DSN"? Bagaimana saya bisa menggunakan PDO dengan phpMussel?

"PDO" adalah akronim dari "[PHP Data Objects](https://www.php.net/manual/en/intro.pdo.php)". Ini menyediakan antarmuka untuk PHP untuk dapat terhubung ke beberapa sistem database yang biasa digunakan oleh berbagai aplikasi PHP.

"DSN" adalah akronim dari "[data source name](https://en.wikipedia.org/wiki/Data_source_name)" (nama sumber data). "PDO DSN" menjelaskan kepada PDO bagaimana seharusnya terhubung ke database.

phpMussel menyediakan opsi untuk memanfaatkan PDO untuk tujuan caching. Agar ini berfungsi sebagaimana dimaksud, Anda harus mengkonfigurasi phpMussel yang sesuai, demikian mengaktifkan PDO, membuat basis data baru untuk digunakan oleh phpMussel (jika Anda belum memiliki basis data untuk digunakan oleh phpMussel), dan membuat tabel baru di database Anda sesuai dengan struktur yang dijelaskan dibawah.

Ketika koneksi basis data berhasil, tapi tabel yang diperlukan tidak ada, akan berusaha membuatnya secara otomatis. Namun, perilaku ini belum diuji secara luas dan kesuksesan tidak dapat dijamin.

Ini, tentu saja, hanya berlaku jika Anda ingin phpMussel menggunakan PDO. Jika Anda cukup senang untuk phpMussel untuk menggunakan caching flatfile (per konfigurasi default), atau salah satu dari berbagai opsi caching lain yang disediakan, Anda tidak perlu repot-repot menyusahkan diri Anda dengan mengatur database, tabel dan sebagainya.

Struktur yang dijelaskan dibawah menggunakan "phpmussel" sebagai nama basis datanya, tetapi Anda dapat menggunakan nama yang Anda inginkan untuk basis data Anda, asalkan nama yang sama direplikasi pada konfigurasi DSN Anda.

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

Direktif konfigurasi `pdo_dsn` harus dikonfigurasi seperti dijelaskan dibawah.

```
Tergantung pada driver basis data yang digunakan...
├─4d (Peringatan: Eksperimental, belum diuji, tidak direkomendasikan!)
│ │
│ │         ╔═══════╗
│ └─4D:host=localhost;charset=UTF-8
│           ╚╤══════╝
│            └Host untuk terhubung dengan untuk menemukan database.
├─cubrid
│ │
│ │             ╔═══════╗      ╔═══╗        ╔═════╗
│ └─cubrid:host=localhost;port=33000;dbname=example
│               ╚╤══════╝      ╚╤══╝        ╚╤════╝
│                │              │            └Nama basis data yang akan
│                │              │             digunakan.
│                │              │
│                │              └Nomor port yang akan dihubungkan dengan host.
│                │
│                └Host untuk terhubung dengan untuk menemukan database.
├─dblib
│ │
│ │ ╔═══╗      ╔═══════╗        ╔═════╗
│ └─dblib:host=localhost;dbname=example
│   ╚╤══╝      ╚╤══════╝        ╚╤════╝
│    │          │                └Nama basis data yang akan digunakan.
│    │          │
│    │          └Host untuk terhubung dengan untuk menemukan database.
│    │
│    └Nilai yang mungkin: "mssql", "sybase", "dblib".
├─firebird
│ │
│ │                 ╔═══════════════════╗
│ └─firebird:dbname=/path/to/database.fdb
│                   ╚╤══════════════════╝
│                    ├Dapat menjadi jalur ke file database lokal.
│                    │
│                    ├Dapat terhubung dengan nomor host dan port.
│                    │
│                    └Anda harus merujuk pada dokumentasi Firebird jika Anda
│                     ingin menggunakan ini.
├─ibm
│ │
│ │         ╔═════╗
│ └─ibm:DSN=example
│           ╚╤════╝
│            └Database yang di katalog untuk dihubungkan.
├─informix
│ │
│ │              ╔═════╗
│ └─informix:DSN=example
│                ╚╤════╝
│                 └Database yang di katalog untuk dihubungkan.
├─mysql (Paling direkomendasikan!)
│ │
│ │              ╔═════╗      ╔═══════╗      ╔══╗
│ └─mysql:dbname=example;host=localhost;port=3306
│                ╚╤════╝      ╚╤══════╝      ╚╤═╝
│                 │            │              └Nomor port yang akan dihubungkan
│                 │            │               dengan host.
│                 │            │
│                 │            └Host untuk terhubung dengan untuk menemukan
│                 │             database.
│                 │
│                 └Nama basis data yang akan digunakan.
├─oci
│ │
│ │            ╔═════╗
│ └─oci:dbname=example
│              ╚╤════╝
│               ├Dapat merujuk ke database terkatalog spesifik.
│               │
│               ├Dapat terhubung dengan nomor host dan port.
│               │
│               └Anda harus merujuk pada dokumentasi Oracle jika Anda ingin
│                menggunakan ini.
├─odbc
│ │
│ │      ╔═════╗
│ └─odbc:example
│        ╚╤════╝
│         ├Dapat merujuk ke database terkatalog spesifik.
│         │
│         ├Dapat terhubung dengan nomor host dan port.
│         │
│         └Anda harus merujuk pada dokumentasi ODBC/DB2 jika Anda ingin
│          menggunakan ini.
├─pgsql
│ │
│ │            ╔═══════╗      ╔══╗        ╔═════╗
│ └─pgsql:host=localhost;port=5432;dbname=example
│              ╚╤══════╝      ╚╤═╝        ╚╤════╝
│               │              │           └Nama basis data yang akan
│               │              │            digunakan.
│               │              │
│               │              └Nomor port yang akan dihubungkan dengan host.
│               │
│               └Host untuk terhubung dengan untuk menemukan database.
├─sqlite
│ │
│ │        ╔════════╗
│ └─sqlite:example.db
│          ╚╤═══════╝
│           └Jalur ke file database lokal untuk digunakan.
└─sqlsrv
  │
  │               ╔═══════╗ ╔══╗          ╔═════╗
  └─sqlsrv:Server=localhost,1521;Database=example
                  ╚╤══════╝ ╚╤═╝          ╚╤════╝
                   │         │             └Nama basis data yang akan digunakan.
                   │         │
                   │         └Nomor port yang akan dihubungkan dengan host.
                   │
                   └Host untuk terhubung dengan untuk menemukan database.
```

Jika Anda tidak yakin tentang apa yang harus digunakan untuk beberapa bagian tertentu dari DSN Anda, coba lihat terlebih dahulu apakah itu berfungsi baik dan tanpa mengubah apapun.

Perhatikan bahwa `pdo_username` dan` pdo_password` harus sama dengan nama pengguna dan kata sandi yang Anda pilih untuk basis data Anda.

#### <a name="AJAX_AJAJ_JSON"></a>Fasilitas upload saya tidak sinkron (misalnya, menggunakan ajax, ajaj, json, dll). Saya tidak bisa melihat pesan atau peringatan khusus ketika upload diblokir. Apa yang sedang terjadi?

Ini normal. Halaman "Upload Ditolak" standar phpMussel disajikan sebagai HTML, yang seharusnya cukup untuk permintaan sinkron biasa, tetapi yang mungkin tidak akan cukup jika fasilitas upload Anda mengharapkan sesuatu yang lain. Jika fasilitas upload Anda tidak sinkron, atau mengharapkan status upload akan dilayani secara tidak sinkron, ada beberapa hal yang Anda dapat coba lakukan agar phpMussel dapat melayani kebutuhan fasilitas upload Anda.

1. Membuat templat keluaran dipersonalisasi untuk menyajikan sesuatu selain HTML.
2. Membuat plugin dipersonalisasi untuk memotong halaman "Upload Ditolak" standar seluruhnya dan suruh penangan upload melakukan hal lain saat upload diblokir (ada beberapa poin dalam kode yang disediakan oleh penangan upload yang dapat membantu untuk ini).
3. Menonaktifkan penangan upload seluruhnya dan alih-alih hanya memanggil phpMussel API dari dalam fasilitas upload Anda.

#### <a name="DETECT_EICAR"></a>Bisakah phpMussel mendeteksi EICAR?

Ya. Tanda tangan untuk mendeteksi EICAR disertakan dalam "file tanda tangan ekspresi reguler standar phpMussel" (`phpmussel_regex.db`). Selama file tanda tangan tersebut diinstal dan diaktifkan, phpMussel seharusnya dapat mendeteksi EICAR. Karena database ClamAV juga menyertakan banyak tanda tangan khusus untuk mendeteksi EICAR, ClamAV dapat dengan mudah mendeteksi EICAR, tetapi karena phpMussel hanya menggunakan sebagian kecil dari total tanda tangan yang disediakan oleh ClamAV, mereka mungkin saja tidak cukup untuk phpMussel mendeteksi EICAR. Kemampuan untuk mendeteksinya mungkin juga bergantung pada konfigurasi Anda.

---


### 9. <a name="SECTION9"></a>INFORMASI HUKUM

#### 9.0 PENGANTAR BAGIAN

Bagian dokumentasi ini dimaksudkan untuk menjelaskan kemungkinan pertimbangan hukum mengenai penggunaan dan implementasi paket, dan untuk memberikan beberapa informasi dasar terkait. Ini mungkin penting bagi beberapa pengguna sebagai sarana untuk memastikan kepatuhan dengan persyaratan hukum yang mungkin ada di negara tempat mereka beroperasi, dan beberapa pengguna mungkin perlu menyesuaikan kebijakan situs web mereka sesuai dengan informasi ini.

Pertama dan terutama, silakan menyadari bahwa saya (penulis paket) bukan seorang pengacara, atau profesional hukum yang berkualitas dalam bentuk apapun. Oleh karena itu, saya secara hukum tidak memenuhi syarat untuk memberikan nasihat hukum. Juga, dalam beberapa kasus, persyaratan hukum yang tepat dapat bervariasi antara negara dan yurisdiksi yang berbeda, dan berbagai persyaratan hukum ini terkadang dapat menimbulkan konflik (seperti, misalnya, dalam kasus negara-negara yang mendukung hak privasi dan hak untuk dilupakan, versus negara-negara yang mendukung retensi data diperpanjang). Pertimbangkan juga bahwa akses ke paket tidak terbatas pada negara atau yurisdiksi tertentu, dan oleh karena itu, pengguna paket cenderung ke geografis yang beragam. Poin-poin ini dianggap, saya tidak dalam posisi untuk menyatakan apa artinya "mematuhi hukum" untuk semua pengguna, dalam semua hal. Namun, saya berharap informasi disini akan membantu Anda untuk mengambil keputusan sendiri mengenai apa yang Anda harus lakukan agar tetap mematuhi hukum dalam konteks paket. Jika Anda memiliki keraguan atau kekhawatiran mengenai informasi disini, atau jika Anda membutuhkan bantuan dan saran tambahan dari perspektif hukum, saya merekomendasikan konsultasi dengan profesional hukum yang berkualitas.

#### 9.1 TANGGUNG JAWAB DAN KEWAJIBAN HUKUM

Seperti yang telah dinyatakan oleh lisensi paket, paket ini disediakan tanpa jaminan apapun. Ini termasuk (tetapi tidak terbatas pada) semua lingkup kewajiban hukum. Paket ini diberikan kepada Anda untuk kenyamanan Anda, dengan harapan itu akan berguna, dan itu akan memberikan beberapa manfaat bagi Anda. Namun, apakah Anda menggunakan atau mengimplementasikan paket ini, adalah pilihan Anda sendiri. Anda tidak dipaksa untuk menggunakan atau mengimplementasikan paket ini, tetapi ketika Anda melakukannya, Anda bertanggung jawab atas keputusan itu. Bukan saya, dan tidak ada kontributor lain untuk paket ini, bertanggung jawab secara hukum atas konsekuensi keputusan yang Anda buat, terlepas dari apakah langsung, tidak langsung, tersirat, atau sebaliknya.

#### 9.2 PIHAK KETIGA

Tergantung pada konfigurasi dan implementasinya yang tepat, paket dapat berkomunikasi dan berbagi informasi dengan pihak ketiga dalam beberapa kasus. Informasi ini dapat didefinisikan sebagai "informasi identitas pribadi" (PII) dalam beberapa konteks, oleh beberapa yurisdiksi.

Bagaimana informasi ini dapat digunakan oleh pihak ketiga, tunduk pada berbagai kebijakan yang ditetapkan oleh pihak ketiga, dan berada di luar ruang lingkup dokumentasi. Namun, dalam semua kasus tersebut, berbagi informasi dengan pihak ketiga ini dapat matikan. Dalam semua kasus semacam itu, jika Anda memilih untuk mengaktifkannya, Anda bertanggung jawab untuk meneliti setiap kekhawatiran yang mungkin Anda miliki tentang privasi, keamanan, dan penggunaan PII oleh pihak ketiga ini. Jika ada keraguan, atau jika Anda tidak puas dengan perilaku pihak ketiga ini sehubungan dengan PII, mungkin terbaik adalah menonaktifkan semua pembagian informasi dengan pihak ketiga ini.

Untuk tujuan transparansi, jenis informasi yang dibagikan, dan dengan siapa, dijelaskan dibawah ini.

##### 9.2.1 SCANNER URL

URL ditemukan dalam upload file dapat dibagikan dengan API Google Safe Browsing, tergantung bagaimana paket dikonfigurasi. API Google Safe Browsing memerlukan kunci API agar berfungsi dengan benar, dan karenanya dinonaktifkan secara default.

*Direktif konfigurasi yang relevan:*
- `urlscanner` -> `google_api_key`

##### 9.2.2 VIRUS TOTAL

Ketika phpMussel memindai upload file, hash dari file-file tersebut dapat dibagikan dengan API Virus Total, tergantung bagaimana paket dikonfigurasi. Ada rencana untuk dapat membagikan seluruh file di beberapa titik di masa depan juga, tetapi fitur ini tidak didukung oleh paket saat ini. API Virus Total membutuhkan kunci API agar berfungsi dengan benar, dan karenanya dinonaktifkan secara default.

Informasi (termasuk file dan metadata file terkait) yang dibagikan dengan Virus Total, juga dapat dibagikan dengan mitra mereka, afiliasi mereka, dan berbagai lainnya untuk tujuan penelitian. Ini dijelaskan lebih detail oleh kebijakan privasi mereka.

*Lihat: [Privacy Policy &ndash; VirusTotal](https://support.virustotal.com/hc/en-us/articles/115002168385-Privacy-Policy).*

*Direktif konfigurasi yang relevan:*
- `virustotal` -> `vt_public_api_key`

#### 9.3 PENCATATAN

Pencatatan adalah bagian penting dari phpMussel karena berbagai alasan. Tanpa mencatat waktu terblokir, mungkin sulit untuk mendiagnosis kesalahan positif, untuk memastikan secara akurat seberapa baik kinerja phpMussel dalam konteks tertentu, dan untuk menentukan dimana kekurangannya, dan perubahan apa yang mungkin diperlukan untuk konfigurasi atau tanda tangan yang sesuai, agar terus berfungsi sebagaimana dimaksud. Apapun, pencatatan mungkin tidak diinginkan untuk semua pengguna, dan tetap sepenuhnya opsional. Di phpMussel, pencatatan dinonaktifkan secara default. Untuk mengaktifkannya, phpMussel harus dikonfigurasi dengan benar.

Juga, apakah pencatatan diizinkan secara hukum, dan sejauh diizinkan secara hukum (misalnya, jenis informasi yang dapat dicatat, untuk berapa lama, dan dalam keadaan apa), dapat bervariasi, tergantung pada yurisdiksi dan pada konteks dimana phpMussel diimplementasikan (misalnya, apakah Anda beroperasi sebagai individu, sebagai entitas perusahaan, dan apakah secara komersial atau non-komersial). Jadi, mungkin berguna bagi Anda untuk membaca bagian ini dengan seksama.

Ada beberapa jenis pencatatan yang dapat dilakukan oleh phpMussel. Berbagai jenis pencatatan melibatkan berbagai jenis informasi, untuk berbagai alasan.

##### 9.3.0 LOG PEMINDAIAN

Ketika diaktifkan dalam konfigurasi paket, phpMussel menyimpan log dari file yang dipindainya. Jenis pencatatan ini tersedia dalam dua format berbeda:
- File log yang dapat dibaca oleh manusia.
- File log dalam format serial.

Entri ke log yang dapat dibaca oleh manusia biasanya terlihat seperti ini (sebagai contoh):

```
Sun, 19 Jul 2020 13:33:31 +0800 Dimulai.
→ Memeriksa "ascii_standard_testfile.txt".
─→ Terdeteksi phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
Sun, 19 Jul 2020 13:33:31 +0800 Selesai.
```

Entri log pemindaian biasanya mencakup informasi berikut:
- Tanggal dan waktu file dipindai.
- Nama file yang dipindai.
- Apa yang terdeteksi dalam file (jika ada apapun yang terdeteksi).

*Direktif konfigurasi yang relevan:*
- `general` -> `scan_log`
- `general` -> `scan_log_serialized`

Ketika direktif ini dibiarkan kosong, jenis pencatatan ini akan tetap dinonaktifkan.

##### 9.3.1 DIBLOKIR OLEH PEMINDAI

Ketika diaktifkan dalam konfigurasi paket, phpMussel menyimpan log dari upload yang telah diblokir.

*Contoh untuk log ini:*

```
Tanggal: Sun, 19 Jul 2020 13:33:31 +0800
Alamat IP: 127.0.0.x
== Hasil pindai (mengapa ditandai) ==
Terdeteksi phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
== Rekonstruksi tanda tangan hash ==
dcacac499064454218823fbabff7e09b5b011c0c877ee6f215f35bffb195b6e9:654:ascii_standard_testfile.txt
Dikarantina sebagai "1595142388-2e017ea9ac1478e45dc15794a1fc18c0.qfu".
```

Entri log ini biasanya mencakup informasi berikut:
- Tanggal dan waktu saat upload diblokir.
- Alamat IP tempat upload berasal.
- Alasan mengapa file diblokir (hal yang terdeteksi).
- Nama file yang terblokir.
- Checksum dan ukuran untuk file yang diblokir.
- Apakah file adalah dikarantina, dan dibawah nama internal apa.

*Direktif konfigurasi yang relevan:*
- `web` -> `uploads_log`

##### 9.3.2 LOG BAGIAN DEPAN

Jenis pencatatan ini berhubungan dengan upaya masuk bagian depan, dan hanya terjadi ketika pengguna mencoba masuk ke bagian depan (dengan asumsi akses bagian depan diaktifkan).

Entri log untuk bagian depan berisi alamat IP pengguna yang mencoba masuk, tanggal dan waktu ketika itu terjadi, dan hasil dari upaya tersebut (berhasil masuk, atau gagal masuk). Entri log untuk bagian depan biasanya terlihat seperti ini (sebagai contoh):

```
x.x.x.x - Day, dd Mon 20xx hh:ii:ss +0000 - "admin" - Dimasuk.
```

*Direktif konfigurasi yang relevan:*
- `general` -> `frontend_log`

##### 9.3.3 ROTASI LOG

Anda mungkin ingin menanpilkan log setelah jangka waktu tertentu, atau mungkin diminta untuk melakukannya oleh hukum (yaitu, jumlah waktu yang diizinkan secara hukum bagi Anda untuk mempertahankan log mungkin dibatasi oleh hukum). Anda dapat mencapai ini dengan menyertakan penanda tanggal/waktu dalam nama-nama file log Anda sesuai yang ditentukan oleh konfigurasi paket Anda (misalnya, `{yyyy}-{mm}-{dd}.log`), dan kemudian mengaktifkan rotasi log (rotasi log memungkinkan Anda untuk melakukan beberapa tindakan pada file log ketika batas yang ditentukan terlampaui).

Sebagai contoh: Jika saya secara hukum diminta untuk menghapus log setelah 30 hari, saya bisa menentukan `{dd}.log` dalam nama file log saya (`{dd}` represents days), atur nilai `log_rotation_limit` ke 30, dan atur nilai `log_rotation_action` ke `Delete`.

Sebaliknya, jika Anda diminta untuk menyimpan log untuk jangka waktu yang panjang, Anda bisa memilih untuk tidak menggunakan rotasi log sama sekali, atau Anda bisa mengatur nilai `log_rotation_action` ke `Archive`, untuk mengompres file log, sehingga mengurangi jumlah total ruang disk yang mereka tempati.

*Direktif konfigurasi yang relevan:*
- `general` -> `log_rotation_limit`
- `general` -> `log_rotation_action`

##### 9.3.4 PEMOTONGAN LOG

Ini juga memungkinkan untuk memotong file log individu ketika mereka melebihi ukuran tertentu, jika ini adalah sesuatu yang mungkin Anda butuhkan atau ingin lakukan.

*Direktif konfigurasi yang relevan:*
- `general` -> `truncate`

##### 9.3.5 PSEUDONIMISASI ALAMAT IP

Pertama, jika Anda tidak akrab dengan istilah ini, "pseudonimisasi" mengacu pada memproses data pribadi sedemikian rupa sehingga tidak dapat diidentifikasi ke subjek data tertentu lagi tanpa beberapa informasi tambahan, dan dengan ketentuan bahwa informasi tambahan tersebut dipelihara secara terpisah dan tunduk pada tindakan teknis dan organisasi untuk memastikan bahwa data pribadi tidak dapat diidentifikasi kepada orang alami.

Dalam beberapa keadaan, Anda mungkin diperlukan secara hukum untuk membuat dianonimisasi atau dipseudonimisasi setiap PII dikumpulkan, diproses, atau disimpan. Meskipun konsep ini telah ada untuk beberapa waktu sekarang, GDPR/DSGVO terutama menyebutkan, dan secara khusus mendorong "pseudonimisasi".

phpMussel mampu mem-pseudonimisasi alamat IP ketika melakukan pencatatan, jika ini adalah sesuatu yang mungkin Anda butuhkan atau ingin lakukan. Ketika phpMussel mem-pseudonimkan alamat IP, saat dicatat, oktet terakhir dari alamat IPv4, dan semuanya setelah bagian kedua dari alamat IPv6 diwakili oleh "x" (efektif membulatkan alamat IPv4 ke alamat awal dari subnet ke-24 dari faktor dimana mereka dimasukkan, dan alamat IPv6 ke alamat awal dari subnet ke-32 dari faktor dimana mereka dimasukkan).

*Direktif konfigurasi yang relevan:*
- `legal` -> `pseudonymise_ip_addresses`

##### 9.3.6 STATISTIK

phpMussel secara opsional dapat melacak statistik seperti jumlah total file yang dipindai dan diblokir sejak beberapa titik waktu tertentu. Fitur ini dinonaktifkan secara default, tetapi dapat diaktifkan melalui konfigurasi paket. Fitur ini hanya melacak jumlah total kejadian yang terjadi, dan tidak termasuk informasi apapun tentang kejadian tertentu (dan dengan demikian, tidak boleh dianggap sebagai PII).

*Direktif konfigurasi yang relevan:*
- `general` -> `statistics`

##### 9.3.7 ENKRIPSI

phpMussel tidak mengenkripsi cache atau informasi log apapun. [Enkripsi](https://id.wikipedia.org/wiki/Enkripsi) cache dan log dapat diperkenalkan di masa depan, tetapi tidak ada rencana khusus untuk itu saat ini. Jika Anda khawatir tentang pihak ketiga yang tidak sah mendapatkan akses ke bagian depan dari phpMussel yang mungkin berisi PII atau informasi sensitif seperti cache atau log-nya, saya akan merekomendasikan bahwa phpMussel tidak diinstal di lokasi yang dapat diakses publik (misalnya, instal phpMussel di luar direktori `public_html` standar atau yang setara dengan yang tersedia untuk sebagian besar web server standar) dan bahwa perizinan restriktif yang tepat diberlakukan untuk direktori tempat ia tinggal. Jika itu tidak cukup untuk mengatasi masalah Anda, konfigurasikan phpMussel sedemikian rupa sehingga jenis informasi yang menyebabkan kekhawatiran Anda tidak akan dikumpulkan atau dicatat di tempat pertama (seperti, dengan menonaktifkan pencatatan).

#### 9.4 COOKIE

Ketika pengguna berhasil masuk ke akses bagian depan, phpMussel menetapkan [cookie](https://id.wikipedia.org/wiki/Kuki_HTTP) agar dapat mengingat pengguna untuk permintaan berikutnya (yaitu, cookie digunakan untuk mengotentikasi pengguna ke sesi masuk). Pada halaman masuk, peringatan cookie ditampilkan dengan jelas, memperingatkan pengguna bahwa cookie akan diatur jika mereka terlibat dalam tindakan yang relevan. Cookie tidak diatur dalam titik lain di basis kode.

#### 9.5 PEMASARAN DAN PERIKLANAN

phpMussel tidak mengumpulkan atau memproses informasi apapun untuk tujuan pemasaran atau periklanan, dan tidak menjual atau memperoleh keuntungan dari informasi yang dikumpulkan atau dicatat. phpMussel bukan perusahaan komersial, juga tidak terkait dengan kepentingan komersial, sehingga melakukan hal-hal ini tidak akan masuk akal. Ini telah terjadi sejak awal proyek, dan terus menjadi kasus hari ini. Juga, melakukan hal-hal ini akan menjadi kontra-produktif terhadap semangat dan tujuan yang dimaksudkan dari proyek secara keseluruhan, dan selama saya terus mempertahankan proyek, tidak akan pernah terjadi.

#### 9.6 KEBIJAKAN PRIVASI

Dalam beberapa keadaan, Anda mungkin diharuskan secara hukum untuk secara jelas menampilkan tautan ke kebijakan privasi Anda pada semua halaman dan bagian dari situs web Anda. Ini mungkin penting sebagai sarana untuk memastikan bahwa pengguna mendapat informasi yang jelas tentang praktik privasi Anda, jenis PII yang Anda kumpulkan, dan bagaimana Anda akan menggunakannya. Agar dapat menyertakan tautan di halaman "Upload Ditolak" phpMussel, direktif konfigurasi disediakan untuk menentukan URL ke kebijakan privasi Anda.

*Direktif konfigurasi yang relevan:*
- `legal` -> `privacy_policy`

#### 9.7 GDPR/DSGVO

Regulasi Perlindungan Data Umum (GDPR) adalah regulasi dari Uni Eropa, yang mulai berlaku pada 25 Mei 2018. Tujuan utama dari regulasi ini adalah untuk memberikan kontrol kepada warga dan penduduk negara Uni Eropa mengenai data pribadi mereka sendiri, dan untuk menyatukan regulasi di Uni Eropa terkait privasi dan data pribadi.

Regulasi ini tersebut berisi ketentuan khusus yang berkaitan dengan pemrosesan "informasi identitas pribadi" (PII) dari setiap "subjek data" (setiap orang alami yang teridentifikasi atau dapat diidentifikasi) dari atau di dalam Uni Eropa. Agar sesuai dengan regulasi, "perusahaan" atau "enterprise" (sesuai yang didefinisikan oleh regulasi), dan sistem dan proses yang relevan harus mengimplementasikan "privasi berdasarkan desain" secara default, harus menggunakan pengaturan privasi setinggi mungkin, harus mengimplementasikan pengamanan yang diperlukan untuk informasi yang disimpan atau diproses (termasuk, tetapi tidak terbatas pada, mengimplementasikan pseudonimisasi atau anonimisasi yang penuh untuk data), harus jelas dan tidak ambigu menyatakan jenis data yang mereka kumpulkan, bagaimana mereka memprosesnya, untuk alasan apa, untuk berapa lama mereka menyimpannya, dan apakah mereka membagikan data ini dengan pihak ketiga manapun, jenis data yang dibagikan dengan pihak ketiga, bagaimana, mengapa, dan sebagainya.

Data tidak dapat diproses kecuali jika ada dasar yang sah untuk melakukannya, sesuai yang didefinisikan oleh regulasi. Umumnya, ini berarti bahwa untuk memproses data data subjek secara sah, itu harus dilakukan sesuai dengan kewajiban hukum, atau dilakukan hanya setelah persetujuan eksplisit, terinformasi dengan baik, dan tidak ambigu diperoleh dari subjek data.

Karena aspek regulasi dapat berevolusi dalam waktu, untuk menghindari penyebaran informasi yang ketinggalan jaman, mungkin lebih baik untuk belajar tentang regulasi dari sumber yang berwenang, dibandingkan dengan hanya memasukkan informasi yang relevan disini dalam dokumentasi paket (yang akhirnya bisa menjadi usang seiring berkembangnya regulasi).

Beberapa sumber bacaan yang direkomendasikan untuk mempelajari informasi lebih lanjut:
- [REGULATION (EU) 2016/679 OF THE EUROPEAN PARLIAMENT AND OF THE COUNCIL](https://eur-lex.europa.eu/legal-content/EN/TXT/?uri=celex:32016R0679)
- [Regulasi Perlindungan Data](https://id.wikipedia.org/wiki/Regulasi_Perlindungan_Data)

---


Terakhir Diperbarui: 9 Juli 2025 (2025.07.09).
