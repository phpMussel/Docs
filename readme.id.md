## Dokumentasi untuk phpMussel (Bahasa Indonesia).

### Isi
- 1. [SEPATAH KATA](#SECTION1)
- 2. [BAGAIMANA CARA MENGINSTAL](#SECTION2)
- 3. [BAGAIMANA CARA MENGGUNAKAN](#SECTION3)
- 4. [MANAJEMEN BAGIAN DEPAN](#SECTION4)
- 5. [CLI (COMMAND LINE INTERFACE)](#SECTION5)
- 6. [FILE YANG DIIKUTKAN DALAM PAKET INI](#SECTION6)
- 7. [OPSI KONFIGURASI](#SECTION7)
- 8. [FORMAT TANDA TANGAN](#SECTION8)
- 9. [MASALAH KOMPATIBILITAS DIKETAHUI](#SECTION9)
- 10. [PERTANYAAN YANG SERING DIAJUKAN (FAQ)](#SECTION10)
- 11. [INFORMASI HUKUM](#SECTION11)

*Catatan tentang terjemahan: Dalam hal kesalahan (misalnya, perbedaan antara terjemahan, kesalahan cetak, dll), versi bahasa Inggris dari README dianggap versi asli dan berwibawa. Jika Anda menemukan kesalahan, bantuan Anda dalam mengoreksi mereka akan disambut.*

---


### 1. <a name="SECTION1"></a>SEPATAH KATA

Terima kasih untuk menggunakan phpMussel, sebuah skrip PHP di-design untuk mendeteksi trojan-trojan, virus-virus dan serangan-serangan lainnya dalam file-file diupload ke sistem Anda dimana saja skrip di kaitkan, berdasarkan tanda tangan dari ClamAV dan lain-lain.

[PHPMUSSEL](https://phpmussel.github.io/) HAK CIPTA 2013 dan di atas GNU/GPLv2 oleh [Caleb M (Maikuolan)](https://github.com/Maikuolan).

Skrip ini adalah perangkat lunak gratis; Anda dapat mendistribusikan kembali dan/atau memodifikasinya dalam batasan dari GNU General Public License, seperti di publikasikan dari Free Software Foundation; baik versi 2 dari License, atau (dalam opsi Anda) versi selanjutnya apapun. Skrip ini didistribusikan untuk harapan dapat digunakan tapi TANPA JAMINAN; tanpa walaupun garansi dari DIPERJUALBELIKAN atau KECOCOKAN UNTUK TUJUAN TERTENTU. Mohon Lihat GNU General Public Licence untuk lebih detail, terletak di file `LICENSE.txt` dan tersedia juga dari:
- <https://www.gnu.org/licenses/>.
- <https://opensource.org/licenses/>.

Terima kasih khususnya untuk ClamAV buat inspirasi project dan tanda tangan dimana skrip ini menggunakan ClamAV, tanpa nya skrip ini tidak akan ada, atau akan mengalami nilai yang kurang baik.

Khusus terima kasih kepada SourceForge, Bitbucket dan GitHub untuk menghost file proyek, dan kepada sumber-sumber tambahan tanda tangan dimanfaatkan oleh phpMussel: [PhishTank](https://www.phishtank.com/), [NLNetLabs](https://nlnetlabs.nl/), [Malware.Expert](https://malware.expert/) dan lain-lain, dan khusus terima kasih kepada semua orang yang mendukung proyek, kepada orang lain bahwa saya mungkin telah dinyatakan lupa untuk menyebutkan, dan kepada Anda, untuk menggunakan skrip.

Dokumen ini dan paket terhubung di dalamnya dapat di unduh secara gratis dari:
- [GitHub](https://github.com/phpMussel/phpMussel).
- [Bitbucket](https://bitbucket.org/Maikuolan/phpmussel).
- [SourceForge](https://sourceforge.net/projects/phpmussel/).

---


### 2. <a name="SECTION2"></a>BAGAIMANA CARA MENGINSTAL

#### 2.0 MENGINSTAL SECARA MANUAL (UNTUK SERVER WEB)

1) Dengan membaca ini, Saya asumsikan Anda telah mengunduh dan menyimpan copy dari skrip, membuka data terkompres dan isinya dan Anda meletakkannya pada mesin komputer lokal Anda. Dari sini, Anda akan latihan dimana di host Anda atau CMS Anda untuk meletakkan isi data terkompres nya. Sebuah direktori seperti `/public_html/phpmussel/` atau yang lain (walaupun tidak masalah Anda memilih direktori apa, selama dia aman dan dimana pun yang Anda senangi) akan mencukupi. *Sebelum Anda mulai upload, mohon baca dulu..*

2) Mengubah file nama `config.ini.RenameMe` ke `config.ini` (berada di dalam `vault`), dan secara fakultatif (sangat direkomendasikan untuk user dengan pengalaman lebih lanjut, tapi tidak untuk pemula atau yang tidak berpengalaman), membukanya (file ini berisikan semua opsi operasional yang tersedia untuk phpMussel; di atas tiap opsi seharusnya ada komentar tegas menguraikan tentang apa yang dilakukan dan untuk apa). Atur opsi-opsi ini seperti Anda lihat cocok, seperti apapun yang cocok untuk setup tertentu. Simpan file, menutupnya.

3) Upload isi (phpMussel dan file-filenya) ke direktori yang telah kamu putuskan sebelumnya (Anda tidak memerlukan file-file `*.txt`/`*.md`, tapi kebanyakan Anda harus mengupload semuanya).

4) Gunakan perinta CHMOD ke direktori `vault` dengan "755" (jika ada masalah, Anda dapat mencoba "777", tapi ini kurang aman). Direktori utama menyimpan isinya (yang Anda putuskan sebelumnya), umumnya dapat di biarkan sendirian, tapi status perintah "CHMOD" seharusnya di cek jika kamu punya izin di sistem Anda (defaultnya, seperti "755"). Pendeknya: Agar paket berfungsi dengan benar, PHP harus dapat membaca dan menulis file di dalam direktori `vault`. Banyak hal (memperbarui, pencatatan, dll) tidak akan mungkin, jika PHP tidak dapat menulis ke direktori `vault`, dan paket tidak akan berfungsi sama sekali jika PHP tidak dapat membaca dari direktori `vault`. Namun, untuk keamanan optimal, direktori `vault` TIDAK harus dapat diakses publik (informasi sensitif, seperti informasi yang dikandung oleh `config.ini` atau `frontend.dat`, dapat diekspos kepada penyerang potensial jika direktori `vault` dapat diakses oleh publik).

5) Instal semua tanda tangan yang Anda perlukan. *Lihat: [MENGINSTAL TANDA TANGAN](#INSTALLING_SIGNATURES).*

6) Selanjutnya Anda perlu menghubungkan phpMussel ke sistem atau CMS. Ada beberapa cara yang berbeda untuk menghubungkan skrip seperti phpMussel ke sistem atau CMS, tapi yang paling mudah adalah memasukkan skrip pada permulaan dari file murni dari sistem atau CMS (satu yang akan secara umum di muat ketika seseorang mengakses halaman apapun pada website) berdasarkan pernyataan `require` atau `include`. Umumnya, ini akan menjadi sesuatu yang disimpan di sebuah direktori seperti `/includes`, `/assets` atau `/functions` dan akan selalu di namai sesuatu seperti `init.php`, `common_functions.php`, `functions.php` atau yang sama. Anda harus bekerja pada file apa untuk situasi ini; Jika Anda mengalami kesulitan dalam menentukan ini untuk diri sendiri, kunjungi halaman issues (issues) phpMussel di GitHub atau forum dukungan phpMussel untuk bantuan; Ada kemungkinan bahwa saya sendiri atau pengguna lain mungkin memiliki pengalaman dengan CMS yang Anda gunakan (Anda harus memberitahu kami tahu mana CMS yang Anda gunakan), dan demikian, mungkin dapat memberikan beberapa bantuan kepada Anda. Untuk melakukannya [menggunakan `require` atau `include`], sisipkan baris kode dibawah pada file murni, menggantikan kata-kata berisikan didalam tanda kutip dari alamat file `loader.php` (alamat lokal, tidak alamat HTTP; akan terlihat seperti alamat vault yang di bicarakan sebelumnya).

`<?php require '/user_name/public_html/phpmussel/loader.php'; ?>`

Simpan file dan menutupnya. Upload kembali.

-- ATAU ALTERNATIF --

Jika Anda menggunakan webserver Apache dan jika Anda memiliki akses ke `php.ini`, Anda dapat menggunakan `auto_prepend_file` direktif untuk tambahkan phpMussel setiap kali ada permintaan PHP dibuat. Sesuatu seperti:

`auto_prepend_file = "/user_name/public_html/phpmussel/loader.php"`

Atau ini di file `.htaccess`:

`php_value auto_prepend_file "/user_name/public_html/phpmussel/loader.php"`

7) Pada titik ini, kamu telah selesai! Bagaimanapun, kamu mungkin seharusnya mencobanya untuk melihat dia bekerja dengan dengan baik. Untuk mencoba file keamanan upload, coba mengupload file-file testing yang dimasukkan dalam paket di `_testfiles` ke website Anda melalui metode upload di browser Anda. (Pastikan Anda menyertakan file tanda tangan `phpmussel*.*db` di direktif konfigurasi `active` untuk memicu file-file test). Jika semua bekerja dengan baik, sebuah pesan akan muncul dari phpMussel mengkonfirmasikan bahwa upload sudah sukses di blok. Jika tidak ada yang terjadi, ada sesuatu yang tidak bekerja dengan baik. Jika Anda menggunakan fitur-fitur lanjut atau jika Anda menggunakan tipe-tipe yang lain untuk memeriksa mungkin dengan alat-alat itu, saya sarankan mencoba dengan nya untuk memastikan dia bekerja seperti yang diharapkan juga.

#### 2.1 MENGINSTAL SECARA MANUAL (UNTUK CLI)

1) Dengan membaca ini, Saya asumsikan Anda telah mengunduh data terkompres nya dan menguraikan isi nya pada mesin komputer lokal Anda. Setelah Anda telah memilih lokasi dari phpMussel, lanjutkan.

2) phpMussel memerlukan PHP untuk diinstall pada mesin host untuk mengeksekusinya. Jika Anda tidak memiliki PHP pada mesin Anda, ikuti instruksi yang di supply oleh installer PHP.

3) Secara fakultatif (sangat direkomendasikan untuk user dengan pengalaman lebih lanjut, tapi tidak untuk pemula atau yang tidak berpengalaman), buka `config.ini` (berada di dalam `vault`) – File ini berisikan semua opsi operasional yang tersedia untuk phpMussel. Di atas tiap opsi seharusnya ada komentar tegas menguraikan tentang apa yang dilakukan dan untuk apa. Atur opsi-opsi ini seperti Anda lihat cocok, seperti apapun yang cocok untuk setup tertentu. Simpan file, menutupnya.

4) Secara fakultatif, Anda dapat menggunakan phpMussel di dalam mode CLI untuk diri Anda sendiri dengan menciptakan file batch untuk secara automatis memuat PHP dan phpMussel. Untuk melakukannya, buka sebuah text editor kosong seperti Notepad atau Notepad++, ketikkan jalur dari file `php.exe` di dalam direktori dari instalasi PHP Anda, diikuti spasi, diikuti dengan jalur lengkap dari file `loader.php` di dalam direktori dari instalasi phpMussel, simpan file dengan ekstensi `.bat` di simpan di tempat yang Anda mudah temukan dan klik dua kali pada file itu untuk menjalankan phpMussel di masa yang akan datang.

5) Instal semua tanda tangan yang Anda perlukan. *Lihat: [MENGINSTAL TANDA TANGAN](#INSTALLING_SIGNATURES).*

6) Pada titik ini, Anda selesai! Bagaimanapun Anda seharusnya mencobanya untuk memastikan berjalan dengan lancar. Untuk mencek phpMussel, jalankan phpMussel dan coba memindai `_testfiles` direktori yang disediakan dengan ini paket.

#### 2.2 MENGINSTAL DENGAN COMPOSER

[phpMussel terdaftar dengan Packagist](https://packagist.org/packages/phpmussel/phpmussel). Jika Anda akrab dengan Composer, Anda dapat menggunakan Composer untuk menginstal phpMussel (Anda masih perlu mempersiapkan konfigurasi, izin, tanda tangan dan kait meskipun; melihat "menginstal secara manual (untuk server web)" langkah 2, 4, 5, dan 6).

`composer require phpmussel/phpmussel`

#### <a name="INSTALLING_SIGNATURES"></a>2.3 MENGINSTAL TANDA TANGAN

Sejak v1.0.0, tanda tangan tidak termasuk dalam paket phpMussel. Tanda tangan dibutuhkan oleh phpMussel untuk mendeteksi ancaman tertentu. Ada 3 metode utama untuk menginstal tanda tangan:

1. Instal secara otomatis menggunakan halaman pembaruan dari bagian depan.
2. Buat tanda tangan menggunakan "SigTool" dan instal secara manual.
3. Download tanda tangan dari "phpMussel/Signatures" dan instal secara manual.

##### 2.3.1 Instal secara otomatis menggunakan halaman pembaruan dari bagian depan.

Pertama, Anda harus memastikan bahwa akses bagian depan diaktifkan. *Lihat: [MANAJEMEN BAGIAN DEPAN](#SECTION4).*

Kemudian, semua yang Anda perlu lakukan adalah pergi ke halaman pembaruan dari bagian depan, cari file tanda tangan yang diperlukan, dan menggunakan pilihan yang tersedia di halaman, menginstalnya, dan mengaktifkannya.

##### 2.3.2 Buat tanda tangan menggunakan "SigTool" dan instal secara manual.

*Lihat: [Dokumentasi SigTool](https://github.com/phpMussel/SigTool#documentation).*

##### 2.3.3 Download tanda tangan dari "phpMussel/Signatures" dan instal secara manual.

Pertama, pergi ke [phpMussel/Signatures](https://github.com/phpMussel/Signatures). Repositori berisi berbagai file tanda tangan yang GZ-dikompres. Download file yang Anda perlukan, dekompresi mereka, dan salin file yang didekompresi ke direktori `/vault/signatures` untuk menginstalnya. Cantumkan nama file yang disalin ke direktif `active` dalam konfigurasi phpMussel Anda untuk mengaktifkannya.

---


### 3. <a name="SECTION3"></a>BAGAIMANA CARA MENGGUNAKAN

#### 3.0 BAGAIMANA CARA MENGGUNAKAN (UNTUK SERVER WEB)

phpMussel harus mampu beroperasi benar dengan persyaratan minimal darimu: Setelah instalasi, harus bekerja segera dan harus berguna segera.

Memindai upload file secara automatis dan di mungkinkan secara default, jadi tidak ada yang diharuskan pada Anda untuk fungsi ini.

Bagaimanapun, Anda juga bisa menginstruksikan phpMussel untuk memindai file, direktori dan/atau arsip spesifik. Untuk melakukannya, pertama-tama Anda harus memastikan konfigurasi yang cocok diset di file `config.ini` (`cleanup` harus dinonaktifkan) dan ketika selesai, di sebuah file PHP yang di hubungkan ke phpMussel, gunakan fungsi berikut pada kode Anda:

`$phpMussel['Scan']($what_to_scan, $output_type, $output_flatness);`

- `$what_to_scan` dapat berupa string, array, atau array mengandung array-array, mengindikasikan apa file, file-file, direktori dan/atau direktori-direktori untuk memindai.
- `$output_type` adalah boolean, mengindikasikan format untuk hasil pemindaian untuk dikembalikan sebagai. `false` menginstruksikan fungsi untuk mengembalikan hasil sebagai integer. `true` menginstruksikan fungsi untuk mengembalikan hasil sebagai teks yang dapat dibaca manusia. Tambahan, dalam kedua kasus, hasilnya dapat diakses melalui variabel global setelah memindai selesai. Variabel ini adalah opsional, default untuk `false`. Berikut ini adalah deskripsi untuk hasil integer:

| Hasil | Deskripsi |
|---|---|
| -4 | Mengindikasikan bahwa data tidak dapat dipindai karena enkripsi. |
| -3 | Mengindikasikan bahwa masalah adalah ditemui dengan file tanda tangan phpMussel. |
| -2 | Mengindikasikan bahwa file dikorup terdeteksi selama proses memindai dan proses memindai gagal selesai. |
| -1 | Mengindikasikan bahwa ekstensi atau addon yang dibutuhkan oleh PHP untuk mengeksekusi pemindaian hilang dan demikian gagal selesai. |
| 0 | Mengindikasikan bahwa target pemindaian tidak ada dan tidak ada yang dipindai. |
| 1 | Mengindikasikan bahwa target sukses dipindai dan tidak ada masalah terdeteksi. |
| 2 | Mengindikasikan target sukses di scan namun ada masalah terdeteksi. |

- `$output_flatness` adalah boolean, mengindikasikan ke fungsi apakah akan mengembalikan hasil pemindaian (ketika ada beberapa target pemindaian) sebagai array atau string. `false` akan mengembalikan hasil sebagai array. `true` akan mengembalikan hasil sebagai string. Variabel ini adalah opsional, default untuk `false`.

Contoh:

```PHP
 $results = $phpMussel['Scan']('/user_name/public_html/my_file.html', true, true);
 echo $results;
```

Menghasilkan seperti ini (sebagai kata-kata):

```
 Wed, 16 Sep 2013 02:49:46 +0000 Dimulai.
 > Memeriksa '/user_name/public_html/my_file.html':
 -> Tidak ada masalah yang diketahui.
 Wed, 16 Sep 2013 02:49:47 +0000 Selesai.
```

Untuk sebuah pemecahan penuh dari jenis tanda tangan phpMussel yang digunakan selama pemindaian dan bagaimana dia memegang tanda tangan-tanda tangan ini, mencocokkan ke [FORMAT TANDA TANGAN](#SECTION8) dari file README.

Jika Anda menjumpai bilangan positif yang salah, jika Anda menemukan hal baru yang harus di blok atau untuk apapun dalam tanda tangan mohon hubungi saya mengenainya sehingga saya dapat membuat perubahan yang perlu, dimana, jika Anda tidak menghubungi saya saya tidak tahu. *(Lihat: [Apa yang dimaksud dengan "positif palsu"?](#WHAT_IS_A_FALSE_POSITIVE)).*

Untuk menonaktifkan tanda tangan-tanda tangan yang dimasukkan dalam phpMussel (seperti jika Anda berpengalaman sebuah angka positif yang salah untuk tujuan Anda yang seharusnya secara normal di hapus dari aliran), tambahkan nama tanda tangan spesifik yang harus dinonaktifkan ke file tanda tangan daftar abu-abu (`/vault/greylist.csv`), dipisahkan dengan koma.

*Lihat juga: [Bagaimana cara mengakses rincian spesifik tentang file saat dipindai?](#SCAN_DEBUGGING)*

#### 3.1 BAGAIMANA CARA MENGGUNAKAN (UNTUK CLI)

Silahkan lihat "MENGINSTAL SECARA MANUAL (UNTUK CLI)" dari file README.

Mohon diingat bahwa phpMussel adalah scanner *on-demand*; adalah *BUKAN* scanner *on-access* (dengan pengecualian upload file, pada saat upload), dan tidak seperti anti virus, tidak memonitor memori aktif! phpMussel hanya mendeteksi virus dalam upload file dan dalam file yang Anda perintahkan untuk dipindai.

---


### 4. <a name="SECTION4"></a>MANAJEMEN BAGIAN DEPAN

#### 4.0 APA YANG MANAJEMEN BAGIAN DEPAN.

Manajemen bagian depan menyediakan cara yang nyaman dan mudah untuk mempertahankan, mengelola, dan memperbarui instalasi phpMussel Anda. Anda dapat melihat, berbagi, dan download file log melalui halaman log, Anda dapat mengubah konfigurasi melalui halaman konfigurasi, Anda dapat instal dan uninstal/hapus komponen melalui halaman pembaruan, dan Anda dapat upload, download, dan memodifikasi file dalam vault Anda melalui file manager.

Bagian depan adalah dinonaktifkan secara default untuk mencegah akses yang tidak sah (akses yang tidak sah bisa memiliki konsekuensi yang signifikan untuk website Anda dan keamanannya). Instruksi untuk mengaktifkannya termasuk dibawah paragraf ini.

#### 4.1 BAGAIMANA CARA MENGAKTIFKAN MANAJEMEN BAGIAN DEPAN.

1) Menemukan direktif `disable_frontend` dalam `config.ini`, dan mengaturnya untuk `false` (akan menjadi `true` secara default).

2) Mengakses `loader.php` dari browser Anda (misalnya, `http://localhost/phpmussel/loader.php`).

3) Masuk dengan nama pengguna dan kata sandi default (admin/password).

Catat: Setelah Anda dimasukkan untuk pertama kalinya, untuk mencegah akses tidak sah ke manajemen bagian depan, Anda harus segera mengubah nama pengguna dan kata sandi Anda! Ini sangat penting, karena itu mungkin untuk meng-upload kode PHP sewenang-wenang untuk situs web Anda melalui bagian depan.

Juga, untuk keamanan yang optimal, memungkinkan "otentikasi dua faktor" untuk semua akun front-end sangat disarankan (petunjuk disediakan dibawah).

#### 4.2 BAGAIMANA CARA MENGGUNAKAN MANAJEMEN BAGIAN DEPAN.

Instruksi disediakan pada setiap halaman dari manajemen bagian depan, untuk menjelaskan cara yang benar untuk menggunakannya dan tujuan yang telah ditetapkan. Jika Anda membutuhkan penjelasan lebih lanjut atau bantuan khusus, silahkan hubungi dukungan, atau sebagai pilihan lain, ada beberapa video yang tersedia di YouTube yang dapat membantu dengan cara demonstrasi.

#### 4.3 OTENTIKASI DUA FAKTOR

Mungkin untuk membuat bagian depan lebih aman dengan mengaktifkan otentikasi dua faktor ("2FA"). Saat masuk ke akun berkemampuan 2FA, email dikirim ke alamat email yang terkait dengan akun tersebut. Email ini berisi "kode 2FA", yang kemudian harus dimasukkan oleh pengguna, selain nama pengguna dan kata sandi, agar dapat masuk menggunakan akun tersebut. Ini berarti bahwa mendapatkan kata sandi akun tidak akan cukup bagi peretas atau penyerang potensial untuk dapat masuk ke akun tersebut, karena mereka juga harus sudah memiliki akses ke alamat email yang terkait dengan akun tersebut agar dapat menerima dan memanfaatkan kode 2FA yang terkait dengan sesi, sehingga membuat bagian depan lebih aman.

Pertama, untuk mengaktifkan otentikasi dua faktor, menggunakan halaman pembaruan bagian depan, instal komponen PHPMailer. phpMussel menggunakan PHPMailer untuk mengirim email. Perlu dicatat bahwa meskipun phpMussel, dengan sendirinya, kompatibel dengan PHP >= 5.4.0, PHPMailer membutuhkan PHP >= 5.5.0, dengan demikian berarti bahwa mengaktifkan otentikasi dua faktor untuk bagian depan phpMussel tidak akan mungkin bagi pengguna PHP 5.4.

Setelah Anda menginstal PHPMailer, Anda harus mengisi direktif konfigurasi untuk PHPMailer melalui halaman konfigurasi phpMussel atau file konfigurasi. Informasi lebih lanjut tentang direktif konfigurasi ini termasuk dalam bagian konfigurasi dokumen ini. Setelah Anda mengisi direktif konfigurasi PHPMailer, atur `enable_two_factor` ke `true`. Otentikasi dua faktor sekarang harus diaktifkan.

Selanjutnya, Anda harus mengaitkan alamat email dengan akun, sehingga phpMussel tahu ke mana harus mengirim 2FA kode ketika masuk dengan akun tersebut. Untuk melakukan ini, gunakan alamat email sebagai nama pengguna untuk akun tersebut (seperti `foo@bar.tld`), atau sertakan alamat email sebagai bagian dari nama pengguna dengan cara yang sama seperti ketika mengirim email secara normal (seperti `Foo Bar <foo@bar.tld>`).

Catat: Melindungi vault Anda terhadap akses yang tidak sah (misalnya, dengan memperketat keamanan server Anda dan izin akses publik), sangat penting disini, karena akses tidak sah ke file konfigurasi Anda (yang disimpan dalam vault Anda), dapat berisiko mengekspos konfigurasi SMTP Anda (termasuk nama pengguna dan kata sandi SMTP). Anda harus memastikan bahwa vault Anda diamankan dengan benar sebelum mengaktifkan otentikasi dua faktor. Jika Anda tidak dapat melakukan ini, setidaknya Anda harus membuat akun email baru, yang didedikasikan untuk tujuan ini, untuk mengurangi risiko yang terkait dengan konfigurasi SMTP yang diekspos.

---


### 5. <a name="SECTION5"></a>CLI (COMMAND LINE INTERFACE)

phpMussel dapat dijalankan sebagai sebuah file interaktif pemindai dalam mode CLI dalam Windows. Lihat "BAGAIMANA CARA MENGINSTAL (UNTUK CLI)" dari file README untuk lebih detail.

Untuk daftar yang tersedia CLI perintah, pada prompt CLI, ketik 'c', dan tekan Enter.

Sebagai tambahan, bagi yang berminat, sebuah video tutorial untuk bagaimana menggunakan phpMussel di modus CLI tersedia disini:
- <https://youtu.be/H-Pa740-utc>

---


### 6. <a name="SECTION6"></a>FILE YANG DIIKUTKAN DALAM PAKET INI

```
https://github.com/phpMussel/phpMussel>v2
│   .gitattributes
│   .gitignore
│   .travis.php
│   .travis.yml
│   Changelog-v2.txt
│   composer.json
│   CONTRIBUTING.md
│   crowdin.yml
│   LICENSE.txt
│   loader.php
│   PEOPLE.md
│   README.md
│   SECURITY.md
│   web.config
│
├───.github
│       ISSUE_TEMPLATE.md
│
├───vault
│   │   .htaccess
│   │   channels.yaml
│   │   cli.php
│   │   components.dat
│   │   config.ini.RenameMe
│   │   config.php
│   │   config.yaml
│   │   event_handlers.php
│   │   frontend.php
│   │   frontend_functions.php
│   │   functions.php
│   │   greylist.csv
│   │   lang.php
│   │   plugins.dat
│   │   shorthand.yaml
│   │   signatures.dat
│   │   template_custom.html
│   │   template_default.html
│   │   themes.dat
│   │   upload.php
│   │
│   ├───cache
│   ├───classes
│   │   │   ArchiveHandler.php
│   │   │   CompressionHandler.php
│   │   │   TemporaryFileHandler.php
│   │   │
│   │   └───Maikuolan
│   │           Cache.php
│   │           ComplexStringHandler.php
│   │           DelayedIO.php
│   │           Demojibakefier.php
│   │           Events.php
│   │           L10N.php
│   │           NumberFormatter.php
│   │           YAML.php
│   │
│   ├───fe_assets
│   │       frontend.css
│   │       frontend.html
│   │       icons.php
│   │       pips.php
│   │       scripts.js
│   │       _2fa.html
│   │       _accounts.html
│   │       _accounts_row.html
│   │       _cache.html
│   │       _config.html
│   │       _config_row.html
│   │       _files.html
│   │       _files_edit.html
│   │       _files_rename.html
│   │       _files_row.html
│   │       _home.html
│   │       _login.html
│   │       _logs.html
│   │       _nav_complete_access.html
│   │       _nav_logs_access_only.html
│   │       _quarantine.html
│   │       _quarantine_row.html
│   │       _siginfo.html
│   │       _siginfo_row.html
│   │       _statistics.html
│   │       _updates.html
│   │       _updates_row.html
│   │       _upload_test.html
│   │
│   ├───lang
│   │       lang.ar.fe.yaml
│   │       lang.ar.yaml
│   │       lang.bn.fe.yaml
│   │       lang.bn.yaml
│   │       lang.de.fe.yaml
│   │       lang.de.yaml
│   │       lang.en.fe.yaml
│   │       lang.en.yaml
│   │       lang.es.fe.yaml
│   │       lang.es.yaml
│   │       lang.fr.fe.yaml
│   │       lang.fr.yaml
│   │       lang.hi.fe.yaml
│   │       lang.hi.yaml
│   │       lang.id.fe.yaml
│   │       lang.id.yaml
│   │       lang.it.fe.yaml
│   │       lang.it.yaml
│   │       lang.ja.fe.yaml
│   │       lang.ja.yaml
│   │       lang.ko.fe.yaml
│   │       lang.ko.yaml
│   │       lang.lv.fe.yaml
│   │       lang.lv.yaml
│   │       lang.nl.fe.yaml
│   │       lang.nl.yaml
│   │       lang.no.fe.yaml
│   │       lang.no.yaml
│   │       lang.pl.fe.yaml
│   │       lang.pl.yaml
│   │       lang.pt.fe.yaml
│   │       lang.pt.yaml
│   │       lang.ru.fe.yaml
│   │       lang.ru.yaml
│   │       lang.sv.fe.yaml
│   │       lang.sv.yaml
│   │       lang.th.fe.yaml
│   │       lang.th.yaml
│   │       lang.tr.fe.yaml
│   │       lang.tr.yaml
│   │       lang.ur.fe.yaml
│   │       lang.ur.yaml
│   │       lang.vi.fe.yaml
│   │       lang.vi.yaml
│   │       lang.zh-tw.fe.yaml
│   │       lang.zh-tw.yaml
│   │       lang.zh.fe.yaml
│   │       lang.zh.yaml
│   │
│   ├───plugins
│   ├───quarantine
│   └───signatures
│           switch.dat
│
└───_testfiles
        ascii_standard_testfile.txt
        coex_testfile.rtf
        exe_standard_testfile.exe
        general_standard_testfile.txt
        graphics_standard_testfile.gif
        html_standard_testfile.html
        md5_testfile.txt
        ole_testfile.ole
        pdf_standard_testfile.pdf
        pe_sectional_testfile.exe
        swf_standard_testfile.swf
```

---


### 7. <a name="SECTION7"></a>OPSI KONFIGURASI

Berikut list variabel yang ditemukan pada file konfigurasi phpMussel `config.ini`, dengan deskripsi dari tujuan dan fungsi.

```
Configuration (v2)
│
├───general
│       cleanup
│       scan_log
│       scan_log_serialized
│       scan_kills
│       error_log
│       truncate
│       log_rotation_limit
│       log_rotation_action
│       timezone
│       time_offset (v1: timeOffset)
│       time_format (v1: timeFormat)
│       ipaddr
│       enable_plugins
│       forbid_on_block
│       delete_on_sight
│       lang
│       lang_override
│       numbers
│       quarantine_key
│       quarantine_max_filesize
│       quarantine_max_usage
│       quarantine_max_files
│       honeypot_mode
│       scan_cache_expiry
│       disable_cli
│       disable_frontend
│       max_login_attempts
│       frontend_log (v1: FrontEndLog)
│       disable_webfonts
│       maintenance_mode
│       default_algo
│       statistics
│       disabled_channels
│
├───signatures
│       active (v1: Active)
│       fail_silently
│       fail_extensions_silently
│       detect_adware
│       detect_joke_hoax
│       detect_pua_pup
│       detect_packer_packed
│       detect_shell
│       detect_deface
│       detect_encryption
│
├───files
│       max_uploads
│       filesize_limit
│       filesize_response
│       filetype_whitelist
│       filetype_blacklist
│       filetype_greylist
│       check_archives
│       filesize_archives
│       filetype_archives
│       max_recursion
│       block_encrypted_archives
│       max_files_in_archives
│
├───attack_specific
│       chameleon_from_php
│       can_contain_php_file_extensions
│       chameleon_from_exe
│       chameleon_to_archive
│       chameleon_to_doc
│       chameleon_to_img
│       chameleon_to_pdf
│       archive_file_extensions
│       block_control_characters
│       corrupted_exe
│       decode_threshold
│       scannable_threshold
│       allow_leading_trailing_dots
│       block_macros
│
├───compatibility
│       ignore_upload_errors
│       only_allow_images
│
├───heuristic
│       threshold
│
├───virustotal
│       vt_public_api_key
│       vt_suspicion_level
│       vt_weighting
│       vt_quota_rate
│       vt_quota_time
│
├───urlscanner
│       lookup_hphosts
│       google_api_key
│       maximum_api_lookups
│       maximum_api_lookups_response
│       cache_time
│
├───legal
│       pseudonymise_ip_addresses
│       privacy_policy
│
├───template_data
│       theme
│       magnification (v1: Magnification)
│       css_url
│
├───PHPMailer
│       event_log (v1: EventLog)
│       skip_auth_process (v1: SkipAuthProcess)
│       enable_two_factor (v1: Enable2FA)
│       host (v1: Host)
│       port (v1: Port)
│       smtp_secure (v1: SMTPSecure)
│       smtp_auth (v1: SMTPAuth)
│       username (v1: Username)
│       password (v1: Password)
│       set_from_address (v1: setFromAddress)
│       set_from_name (v1: setFromName)
│       add_reply_to_address (v1: addReplyToAddress)
│       add_reply_to_name (v1: addReplyToName)
│
└───supplementary_cache_options
        enable_apcu
        enable_memcached
        enable_redis
        enable_pdo
        memcached_host
        memcached_port
        redis_host
        redis_port
        redis_timeout
        pdo_dsn
        pdo_username
        pdo_password
```

#### "general" (Kategori)
Konfigurasi umum dari phpMussel.

##### "cleanup"
- Membersihkan variabel skrip dan cache setelah eksekusi? False = Tidak; True = Ya [Default]. Jika Anda tidak menggunakan skrip untuk apapun selain memindai unggahan, Anda harus mengkonfigurasikannya ke `true` untuk meminimalkan penggunaan memori. Jika tidak demikian, Anda harus mengkonfigurasikannya ke `false`, untuk menyimpan dalam memori data yang diperlukan untuk mengeksekusi phpMussel tanpa perlu memuatnya kembali. Tidak memiliki pengaruh di dalam mode CLI.
- Tidak memiliki pengaruh di dalam mode CLI.

##### "scan_log"
- Nama dari file untuk mencatat semua hasil pemindaian. Spesifikasikan nama atau biarkan kosong untuk menonaktifkan.

##### "scan_log_serialized"
- Nama dari file untuk mencatat semua hasil pemindaian (menggunakan format serial). Spesifikasikan nama atau biarkan kosong untuk menonaktifkan.

##### "scan_kills"
- Nama dari fata untuk mencatat semua rekord dari upload terblok atau terbunuh. Spesifikan nama atau biarkan kosong untuk menonaktifkan.

*Tip berguna: Jika Anda mau, Anda dapat menambahkan informasi tanggal/waktu untuk nama-nama file log Anda oleh termasuk ini dalam nama: `{yyyy}` untuk tahun lengkap, `{yy}` untuk tahun disingkat, `{mm}` untuk bulan, `{dd}` untuk hari, `{hh}` untuk jam.*

*Contoh:*
- *`scan_log='scan_log.{yyyy}-{mm}-{dd}-{hh}.txt'`*
- *`scan_log_serialized='scan_log_serialized.{yyyy}-{mm}-{dd}-{hh}.txt'`*
- *`scan_kills='scan_kills.{yyyy}-{mm}-{dd}-{hh}.txt'`*

##### "error_log"
- File untuk mencatat kesalahan tidak fatal yang terdeteksi. Spesifikasikan nama file, atau biarkan kosong untuk menonaktifkan.

##### "truncate"
- Memotong file log ketika mereka mencapai ukuran tertentu? Nilai adalah ukuran maksimum dalam B/KB/MB/GB/TB yang bisa ditambahkan untuk file log sebelum dipotong. Nilai default 0KB menonaktifkan pemotongan (file log dapat tumbuh tanpa batas waktu). Catat: Berlaku untuk file log individu! Ukuran file log tidak dianggap secara kolektif.

##### "log_rotation_limit"
- Rotasi log membatasi jumlah file log yang seharusnya ada pada satu waktu. Ketika file log baru dibuat, jika jumlah total file log melebihi batas yang ditentukan, tindakan yang ditentukan akan dilakukan. Anda dapat menentukan batas yang diinginkan disini. Nilai 0 akan menonaktifkan rotasi log.

##### "log_rotation_action"
- Rotasi log membatasi jumlah file log yang seharusnya ada pada satu waktu. Ketika file log baru dibuat, jika jumlah total file log melebihi batas yang ditentukan, tindakan yang ditentukan akan dilakukan. Anda dapat menentukan tindakan yang diinginkan disini. Delete = Hapus file log tertua, hingga batasnya tidak lagi terlampaui. Archive = Pertama arsipkan, lalu hapus file log tertua, hingga batasnya tidak lagi terlampaui.

*Klarifikasi teknis: Dalam konteks ini, "tertua" berarti tidak dimodifikasi baru-baru.*

##### "timezone"
- Ini digunakan untuk menentukan zona waktu mana yang harus digunakan oleh phpMussel untuk operasi tanggal/waktu. Jika Anda tidak membutuhkannya, abaikan saja. Nilai yang mungkin ditentukan oleh PHP. Ini umumnya direkomendasikan sebagai gantinya untuk menyesuaikan direktif zona waktu dalam file `php.ini` Anda, tapi terkadang (seperti ketika bekerja dengan terbatas penyedia shared hosting) ini tidak selalu mungkin untuk melakukan, dan demikian, opsi ini disediakan disini.

##### "time_offset"
- *v1: "timeOffset"*
- Jika waktu server Anda tidak cocok waktu lokal Anda, Anda dapat menentukan offset sini untuk menyesuaikan informasi tanggal/waktu dihasilkan oleh phpMussel sesuai dengan kebutuhan Anda. Ini umumnya direkomendasikan sebagai gantinya untuk menyesuaikan direktif zona waktu dalam file `php.ini` Anda, tapi terkadang (seperti ketika bekerja dengan terbatas penyedia shared hosting) ini tidak selalu mungkin untuk melakukan, dan demikian, opsi ini disediakan disini. Offset adalah dalam menit.
- Contoh (untuk menambahkan satu jam): `time_offset=60`

##### "time_format"
- *v1: "timeFormat"*
- Format notasi tanggal/waktu yang digunakan oleh phpMussel. Default = `{Day}, {dd} {Mon} {yyyy} {hh}:{ii}:{ss} {tz}`.

##### "ipaddr"
- Dimana menemukan alamat IP dari permintaan alamat? (Bergunak untuk pelayanan-pelayanan seperti Cloudflare dan sejenisnya). Default = REMOTE_ADDR. PERINGATAN: Jangan ganti ini kecuali Anda tahu apa yang Anda lakukan!

Nilai yang disarankan untuk "ipaddr":

Nilai | Menggunakan
---|---
`HTTP_INCAP_CLIENT_IP` | Incapsula reverse proxy.
`HTTP_CF_CONNECTING_IP` | Cloudflare reverse proxy.
`CF-Connecting-IP` | Cloudflare reverse proxy (alternatif; jika di atas tidak bekerja).
`HTTP_X_FORWARDED_FOR` | Cloudbric reverse proxy.
`X-Forwarded-For` | [Squid reverse proxy](http://www.squid-cache.org/Doc/config/forwarded_for/).
*Ditetapkan oleh konfigurasi server.* | [Nginx reverse proxy](https://www.nginx.com/resources/admin-guide/reverse-proxy/).
`REMOTE_ADDR` | Tidak ada reverse proxy (nilai default).

##### "enable_plugins"
- Mengaktifkan dukungan untuk plugin phpMussel? False = Tidak; True = Ya [Default].

##### "forbid_on_block"
- Seharusnya phpMussel mengirimkan 403 headers dengan pesan upload file yang terblok, atau cocok dengan 200 OK? False = Tidak (200); True = Ya (403) [Default].

##### "delete_on_sight"
- Mengaktifkan opsi ini akan menginstruksikan skrip untuk berusaha secepatnya menghapus file apapun yang ditemukannya selama scan yang mencocokkan pada kriteria deteksi apapun, baik melalui tanda tangan atau yang lain. file-file ditentukan "clean" tidak akan disentuh. Pada kasus file terkompress seluruh file terkompress akan didelate (kecuali file yang menyerang adalah satu-satunya dari beberapa file yang menjadi isi file terkompress). Untuk kasus pemindaian upload file biasanya, tidak cocok untuk mengaktifkan opsi ini, karena biasanya PHP akan secara otomatis menyatukan isi dari cache ketika eksekusi selesai, berarti bahwa dia akan selalu menghapus file terupload apapun melalui server jika tidak dipindahkan, dikopi atau dihapus sebelumnya. Opsi tersebut ditambahkan disini sebagai ukuran keamanan ekstra untuk semua salinan PHP yang tidak selalu bersikap pada perilaku yang diharapkan. False = Setelah pemindahaian, biarkan file [Default]; True = Setelah pemindaian, jika tidak bersih, hapus langsung.

##### "lang"
- Tentukan bahasa default untuk phpMussel.

##### "lang_override"
- Melokalisasikan sesuai dengan HTTP_ACCEPT_LANGUAGE jika memungkinkan? True = Ya [Default]; False = Tidak.

##### "numbers"
- Menentukan bagaimana menampilkan nomor-nomor.

Nilai yang didukung saat ini:

Nilai | Menghasilkan | Deskripsi
---|---|---
`NoSep-1` | `1234567.89`
`NoSep-2` | `1234567,89`
`Latin-1` | `1,234,567.89` | Nilai default.
`Latin-2` | `1 234 567.89`
`Latin-3` | `1.234.567,89`
`Latin-4` | `1 234 567,89`
`Latin-5` | `1,234,567·89`
`China-1` | `123,4567.89`
`India-1` | `12,34,567.89`
`India-2` | `१२,३४,५६७.८९`
`India-3` | `૧૨,૩૪,૫૬૭.૮૯`
`India-4` | `੧੨,੩੪,੫੬੭.੮੯`
`India-5` | `೧೨,೩೪,೫೬೭.೮೯`
`India-6` | `౧౨,౩౪,౫౬౭.౮౯`
`Arabic-1` | `١٢٣٤٥٦٧٫٨٩`
`Arabic-2` | `١٬٢٣٤٬٥٦٧٫٨٩`
`Arabic-3` | `۱٬۲۳۴٬۵۶۷٫۸۹`
`Arabic-4` | `۱۲٬۳۴٬۵۶۷٫۸۹`
`Bengali-1` | `১২,৩৪,৫৬৭.৮৯`
`Burmese-1` | `၁၂၃၄၅၆၇.၈၉`
`Khmer-1` | `១.២៣៤.៥៦៧,៨៩`
`Lao-1` | `໑໒໓໔໕໖໗.໘໙`
`Thai-1` | `๑,๒๓๔,๕๖๗.๘๙`
`Thai-2` | `๑๒๓๔๕๖๗.๘๙`

*Catat: Nilai-nilai ini tidak terstandardisasi dimana pun, dan mungkin tidak akan relevan di luar paket. Juga, nilai yang didukung dapat berubah di masa depan.*

##### "quarantine_key"
- phpMussel dapat mengkarantina upload file ditandai dalam isolasi dalam vault phpMussel, jika ini adalah sesuatu yang Anda ingin lakukan. Pengguna biasa dari phpMussel yang hanya ingin memproteksi website mereka dan/atau lingkungan hosting mereka tanpa memiliki minat dalam-dalam menganalisis setiap ditandai upload file harus meninggalkan fungsi ini dinonaktifkan, tapi setiap pengguna yang tertarik pada analisis lebih lanjut dari ditandai upload file bagi penelitian malware atau untuk hal-hal seperti serupa harus mengaktifkan fungsi ini. Mengkarantina ditandai upload file dapat kadang-kadang juga membantu dalam men-debug false-positif, jika ini adalah sesuatu yang sering terjadi untuk Anda. Untuk menonaktifkan fungsi karantina, meninggalkan `quarantine_key` direktif kosong, atau menghapus isi dari direktif ini jika tidak sudah kosong. Untuk mengaktifkan fungsi karantina, masukkan beberapa nilai dalam direktif ini. `quarantine_key` adalah fitur keamanan penting dari fungsi karantina diharuskan sebagai sarana untuk mencegah fungsi karantina dari dieksploitasi oleh penyerang potensial dan sebagai sarana mencegah eksekusi potensi file yang disimpan dalam karantina. `quarantine_key` harus diperlakukan dengan cara yang sama seperti password Anda: Semakin lama semakin baik, dan menjaganya diproteksi erat. Bagi efek terbaik, gunakan dalam hubungannya dengan `delete_on_sight`.

##### "quarantine_max_filesize"
- Ukuran file maksimum yang diijinkan dari file yang akan dikarantina. File yang lebih besar dari nilai yang ditentukan dibawah ini TIDAK akan dikarantina. Direktif ini penting sebagai sarana untuk membuat lebih sulit bagi setiap penyerang potensial untuk banjir karantina Anda dengan file yang tidak diinginkan berpotensi menyebabkan penggunaan file kelebihan pada layanan hosting Anda. Default = 2MB.

##### "quarantine_max_usage"
- Penggunaan memori maksimal yang diijinkan untuk karantina. Jika total penggunaan memori oleh karantina mencapai nilai ini, file yang dikarantina tertua akan dihapus sampai total penggunaan memori tidak lagi mencapai nilai ini. Direktif ini penting sebagai sarana untuk membuat lebih sulit bagi setiap penyerang potensial untuk banjir karantina Anda dengan file yang tidak diinginkan berpotensi menyebabkan penggunaan file kelebihan pada layanan hosting Anda. Default = 64MB.

##### "quarantine_max_files"
- Jumlah maksimum file yang dapat ada di karantina. Ketika file baru ditambahkan ke karantina, jika nomor ini terlampaui, file lama akan dihapus hingga sisanya tidak lagi melebihi nomor ini. Default = 100.

##### "honeypot_mode"
- Bila modus honeypot diaktifkan, phpMussel akan mencoba untuk karantina setiap file upload yang dia menemui, terlepas dari apakah atau tidak file yang di-upload cocok dengan tanda tangan yang disertakan, dan tidak ada pemindaian aktual atau analisis dari upload file akan terjadi. Fungsi ini akan berguna bagi mereka yang ingin menggunakan phpMussel untuk tujuan virus/malware penelitian, tapi tidak direkomendasikan untuk mengaktifkan fungsi ini jika tujuan penggunaan dari phpMussel oleh pengguna adalah bagi aktual upload file pemindaian dan juga tidak direkomendasikan untuk menggunakan fungsi honeypot untuk tujuan selain bagi honeypot. Biasanya, opsi ini dinonaktifkan. False = Dinonaktifkan [Default]; True = Diaktifkan.

##### "scan_cache_expiry"
- Untuk berapa lama harus phpMussel cache hasil-hasil? Nilai adalah jumlah detik untuk cache hasil-hasil untuk. Default adalah 21600 detik (6 jam); Nilai 0 akan menonaktifkan caching hasil-hasil.

##### "disable_cli"
- Menonaktifkan modus CLI? Modus CLI diaktifkan secara default, tapi kadang-kadang dapat mengganggu alat pengujian tertentu (seperti PHPUnit, sebagai contoh) dan aplikasi CLI berbasis lainnya. Jika Anda tidak perlu menonaktifkan modus CLI, Anda harus mengabaikan direktif ini. False = Mengaktifkan modus CLI [Default]; True = Menonaktifkan modus CLI.

##### "disable_frontend"
- Menonaktifkan akses bagian depan? Akses bagian depan dapat membuat phpMussel lebih mudah dikelola, tapi juga dapat menjadi potensial resiko keamanan. Itu direkomendasi untuk mengelola phpMussel melalui bagian belakang bila mungkin, tapi akses bagian depan yang disediakan untuk saat itu tidak mungkin. Memilikinya dinonaktifkan kecuali jika Anda membutuhkannya. False = Mengaktifkan akses bagian depan; True = Menonaktifkan akses bagian depan [Default].

##### "max_login_attempts"
- Jumlah maksimum upaya memasukkan ke bagian depan. Default = 5.

##### "frontend_log"
- *v1: "FrontEndLog"*
- File untuk mencatat upaya masuk bagian depan. Spesifikasikan nama file, atau biarkan kosong untuk menonaktifkan.

##### "disable_webfonts"
- Menonaktifkan webfonts? True = Ya [Default]; False = Tidak.

##### "maintenance_mode"
- Aktifkan modus perawatan? True = Ya; False = Tidak [Default]. Nonaktifkan semuanya selain bagian depan. Terkadang berguna saat memperbarui CMS, kerangka kerja, dll.

##### "default_algo"
- Mendefinisikan algoritma mana yang akan digunakan untuk semua password dan sesi di masa depan. Opsi: PASSWORD_DEFAULT (default), PASSWORD_BCRYPT, PASSWORD_ARGON2I (membutuhkan PHP >= 7.2.0).

##### "statistics"
- Lacak statistik penggunaan phpMussel? True = Ya; False = Tidak [Default].

##### "disabled_channels"
- Ini dapat digunakan untuk mencegah phpMussel dari menggunakan saluran tertentu saat mengirim permintaan (misalnya, saat memperbarui, saat mengambil metadata komponen, dll).

#### "signatures" (Kategori)
Konfigurasi untuk tanda tangan.

##### "active"
- *v1: "Active"*
- Daftar file tanda tangan yang aktif, dipisahkan oleh koma.

*Catat:*
- *File tanda tangan harus diinstal pertama-tama, sebelum Anda dapat mengaktifkannya.*
- *Agar file test berfungsi dengan benar, file tanda tangan harus diinstal dan diaktifkan.*
- *Nilai dari arahan ini di-cache. Setelah mengubahnya, agar perubahan diterapkan, Anda mungkin perlu menghapus cache.*

##### "fail_silently"
- Seharusnya laporan phpMussel ketika file tanda tangan hilang atau dikorup? Jika `fail_silently` dinonaktifkan, file dikorup dan hilang akan dilaporkan ketika pemindaian, dan jika `fail_silently` diaktifkan, file dikorup dan hilang akan diabaikan, dengan pemindaian melaporkan untuk file-file ini bahwa tidak ada masalah. Harus ini dibiarkan sendirian jika Anda pernah mengalami crash atau masalah lain. False = Dinonaktifkan; True = Diaktifkan [Default].

##### "fail_extensions_silently"
- Seharusnya laporan phpMussel ketika ekstensi hilang? Jika `fail_extensions_silently` dinonaktifkan, ekstensi hilang akan dilaporkan ketika pemindaian, dan jika `fail_extensions_silently` diaktifkan, ekstensi hilang akan diabaikan, dengan pemindaian melaporkan untuk file-file ini bahwa tidak ada masalah. Menonaktifkan direktif ini berpotensi dapat meningkatkan keamanan Anda, tapi juga dapat menyebabkan peningkatan positif palsu. False = Dinonaktifkan; True = Diaktifkan [Default].

##### "detect_adware"
- Harus phpMussel menggunakan tanda tangan untuk mendeteksi adware? False = Tidak; True = Ya [Default].

##### "detect_joke_hoax"
- Harus phpMussel menggunakan tanda tangan untuk mendeteksi lelucon/kebohongan malware/virus? False = Tidak; True = Ya [Default].

##### "detect_pua_pup"
- Harus phpMussel menggunakan tanda tangan untuk mendeteksi PUAs/PUPs? False = Tidak; True = Ya [Default].

##### "detect_packer_packed"
- Harus phpMussel menggunakan tanda tangan untuk mendeteksi pengepakan dan file dikemas? False = Tidak; True = Ya [Default].

##### "detect_shell"
- Harus phpMussel menggunakan tanda tangan untuk mendeteksi skrip shell? False = Tidak; True = Ya [Default].

##### "detect_deface"
- Harus phpMussel menggunakan tanda tangan untuk mendeteksi perusakan dan perusak? False = Tidak; True = Ya [Default].

##### "detect_encryption"
- Harus phpMussel mendeteksi dan memblokir file terenkripsi? False = Tidak; True = Ya [Default].

#### "files" (Kategori)
Konfigurasi umum untuk mengambil alih file-file.

##### "max_uploads"
- Maksimum jumla file-file yang diizinkan untuk dipindai selama pemindaian upload file sebelum menghentikan pemindaian dan menginformasikan pengguna bahwa pengguna mengupload terlalu banyak! Menyediakan perlindungan pada serangan teoritis dimana penyerang mencoba DDoS pada sistem Anda atau CMS ada dengan overloading phpMussel supaya berjalan lambat. Proses PHP ke penghentian keras. Recommendasi: 10. Anda dapat menaikkan atau menurunkan angka ini bergantung dari kecepatan hardware Anda. Catat itu nomor ini tidak mengakuntabilitas atau mengikutkan konten dari file terkompres.

##### "filesize_limit"
- Batasan ukuran file dalam KB. 65536 = 64MB [Default]; 0 = Tidak ada batasa (selalu bertanda abu-abu), nilai angka positif apapun diterima. Ini dapat berguna ketika batasan konfigurasi PHP Anda membatasi jumah memori dari proses yang dapat ditampungnya atau jika konfigurasi PHP Anda membatasi jumlah ukuran upload Anda.

##### "filesize_response"
- Apa yang Anda lakukan dengan file-file yang melebihi batasan ukuran (jika ada). False = Bertanda putih; True = Bertanda hitam [Default].

##### "filetype_whitelist", "filetype_blacklist", "filetype_greylist"
- Jika sistem Anda hanya mengizinkan tipe file spesifik menjadi diupload, atau jika sistem Anda secara eksplisit menolak tipe file-file tertentu, menspesifikasikan tipe file dalam bertanda putih, bertanda hitam dan bertanda abu-abu dapat menaikkan kecepatan dari pemindaian dilakukan dengan mengizinkan skrip untuk mengabaikan tipe file tertentu. Format adalah CSV (comma separated values). Jika Anda ingin memindai semuanya, daripada daftar putih, daftar hitam atau daftar abu-abu, tinggalkan variabel kosong; Melakukannya akan menonaktifkan dafter putih/hitam/abu-abu.
- Urutan logis dari pengolahan:
  - Jika tipe file bertanda putih, tidak memindai dan tidak memblokir file, dan tidak memeriksa file terhadap daftar hitam atau daftar abu-abu.
  - Jika tipe file bertanda hitem, tidak memindai file tapi memblokir bagaimanapun, dan tidak memeriksa file terhadap daftar abu-abu.
  - Jika daftar abu-abu yang kosong atau jika daftar abu-abu tidak kosong dan tipe file bertanda abu-abu, memindai file seperti biasa dan menentukan apakah untuk memblokir berdasarkan hasil memindai, tapi jika daftar abu-abu tidak kosong dan tipe file tidak bertanda abu-abu, memperlakukan seolah olah bertanda hitam, demikian tidak memindai tapi memblokir itu bagaimanapun.

##### "check_archives"
- Berusaha mencek isi file terkompress? False = Tidak (Tidak mencek); True = Ya (Mencek) [Default].

Format | Dapat membaca | Dapat membaca secara rekursif | Dapat mendeteksi enkripsi | Catatan
---|---|---|---|---
Zip | ✔️ | ✔️ | ✔️ | Membutuhkan [libzip](https://secure.php.net/manual/en/zip.requirements.php) (biasanya dibundel dengan PHP pula). Juga didukung (menggunakan format zip): ✔️ Deteksi objek OLE. ✔️ Deteksi makro Office.
Tar | ✔️ | ✔️ | ➖ | Tidak ada persyaratan khusus. Format tidak mendukung enkripsi.
Rar | ✔️ | ✔️ | ✔️ | Membutuhkan ekstensi [rar](https://pecl.php.net/package/rar) (ketika ekstensi ini tidak diinstal, phpMussel tidak dapat membaca file rar).
Phar | ❌ | ❌ | ❌ | Dukungan untuk membaca file phar telah dihapus di v1.6.0, dan tidak akan ditambahkan lagi, karena masalah keamanan.

*Jika ada seseorang yang mampu dan bersedia membantu mengimplementasikan dukungan untuk membaca format arsip lain, bantuan ini akan disambut baik.*

##### "filesize_archives"
- Memperlalaikan ukuran daftar hitam/putih dari isi file terkompress? False = Tidak (Bertanda abu-abu semua); True = Ya [Default].

##### "filetype_archives"
- Memperlalaikan jenis file daftar hitam/putih dari isi file terkompress? False = Tidak (Bertanda abu-abu semua) [Default]; True = Ya.

##### "max_recursion"
- Batas kedalaman rekursi maksimum untuk arsip. Default = 3.

##### "block_encrypted_archives"
- Mendeteksi dan memblokir dienkripsi arsip? Karena phpMussel tidak mampu memindai isi arsip dienkripsi, itu mungkin bahwa enkripsi arsip dapat digunakan oleh penyerang sebagai sarana mencoba untuk memotong phpMussel, anti-virus pemindai dan perlindungan mirip lainnya. Menginstruksikan phpMussel untuk memblokir setiap arsip dienkripsi ditemukan akan berpotensi membantu mengurangi risiko terkait dengan kemungkinan tersebut. False = Tidak; True = Ya [Default].

##### "max_files_in_archives"
- Jumlah maksimum file yang akan dipindai dari dalam arsip sebelum membatalkan pemindaian. Default = 0 (tidak ada maksimal).

#### "attack_specific" (Kategori)
Direktif serangan spesifik.

Deteksi chameleon serangan: False = Dinonaktifkan; True = Diaktifkan.

##### "chameleon_from_php"
- Cari header PHP tidak di dalam file-file PHP atau file terkompress.

##### "can_contain_php_file_extensions"
- Daftar ekstensi file diperbolehkan untuk berisi kode PHP, dipisahkan oleh koma. Jika deteksi serangan chameleon PHP diaktifkan, file yang berisi kode PHP, yang memiliki ekstensi yang tidak ada dalam daftar ini, akan terdeteksi sebagai serangan chameleon PHP.

##### "chameleon_from_exe"
- Cari header yang dapat dieksekusi di dalam file-file yang dapat dieksekusi atau file terkompress yang dikenali dan untuk file dapat dieksekusi yang headernya tidak benar.

##### "chameleon_to_archive"
- Mendeteksi header yang salah dalam arsip dan file terkompresi. Didukung: BZ/BZIP2, GZ/GZIP, LZF, RAR, ZIP.

##### "chameleon_to_doc"
- Cari dokumen office yang header nya tidak benar (Didukung: DOC, DOT, PPS, PPT, XLA, XLS, WIZ).

##### "chameleon_to_img"
- Cari gambar yang header nya tidak benar (Didukung: BMP, DIB, PNG, GIF, JPEG, JPG, XCF, PSD, PDD, WEBP).

##### "chameleon_to_pdf"
- Cari file PDF yang headernya tidak benar.

##### "archive_file_extensions"
- Ekstensi file terkompres yang dikenali (format nya CSV; seharusnya hanya menambah atau menghapus ketika masalah terjadi; Tidak cocok langsung menghapus karena dapat menyebabkan angka positif yang salah terjadi pada file terkompres, dimana juga menambahkan deteksi; memodifikasi dengan peringatan; Juga dicatat bahwa ini tidak memberi efek pada file terkompress apa yang dapat dan tidak dapat di analisa pada level isi). Daftar sebagaimana defaultnya, memberi daftar format-format yang digunakan yang paling umum melalui melalui mayoritas sistem dan CMS, tapi bermaksud tidak komprehensif.

##### "block_control_characters"
- Memblokir file apapun yang berisi karakter pengendali (lain dari baris baru)? (`[\x00-\x08\x0b\x0c\x0e\x1f\x7f]`) Jika Anda hanya sedang mengupload file teks biasa, maka Anda dapat menghidupkan opsi ini untuk menyediakan perlindungan tambahan ke sistem Anda. Bagaimanapun jika Anda mengupload apapun lebih dari file teks biasa, menghidupkan opsi ini mungkin mengakibatkan angka positif salah. False = Jangan memblokirnya [Default]; True = Memblokirnya.

##### "corrupted_exe"
- File korup dan diurai kesalahan. False = Mengabaikan; True = Memblokir [Default]. Mendeteksi dan memblokir file PE (Portable Executable) berpotensi korup? Sering (tapi tidak selalu), ketika aspek-aspek tertentu dari file PE yang korup atau tidak bisa diurai dengan benar, itu dapat menjadi indikasi dari infeksi virus. Proses yang digunakan oleh sebagian besar program anti-virus untuk mendeteksi virus dalam file PE memerlukan parsing file-file dengan cara tertentu, yang, jika programmer virus menyadari, secara khusus akan mencoba untuk mencegah, untuk memungkinkan virus mereka untuk tetap tidak terdeteksi.

##### "decode_threshold"
- Ambang batas dengan panjang file mentah yang dalam decode perintah harus terdeteksi (dalam kasus ada masalah kinerja sementara pemindaian). Default = 512KB. Nol atau nilai null menonaktifkan ambang batas (menghapus apapun batasan berdasarkan ukuran file).

##### "scannable_threshold"
- Ambang batas dengan panjang file mentah yang phpMussel diperbolehkan untuk membaca dan memindai (dalam kasus ada masalah kinerja sementara pemindaian). Default = 32MB. Nol atau nilai null menonaktifkan ambang batas. Umumnya, nilai ini tidak seharusnya kurang dari ukuran file rata-rata upload file yang Anda inginkan dan Anda harapkan untuk menerima ke server atau website, tidak seharusnya lebih dari direktif filesize_limit, dan tidak seharusnya lebih dari sekitar seperlima dari total alokasi memori yang diijinkan ke PHP melalui file konfigurasi `php.ini`. Direktif ini ada untuk mencegah phpMussel menggunakan terlalu banyak memori (yang bisa mencegah dari yang berhasil memindai file di atas tertentu ukuran file).

##### "allow_leading_trailing_dots"
- Izinkan memimpin dan mengikuti titik-titik dalam nama file? Ini kadang-kadang dapat digunakan untuk menyembunyikan file, atau untuk mengelabui beberapa sistem agar memungkinkan direktori traversal. False = Jangan izinkan [Default]. True = Izinkan.

##### "block_macros"
- Cobalah untuk memblokir semua file yang mengandung macro? Beberapa jenis dokumen dan spreadsheet mungkin berisi makro yang dapat dijalankan, sehingga menyediakan vektor berbahaya berpotensi. False = Jangan memblokirnya [Default]; True = Memblokirnya.

#### "compatibility" (Kategori)
Direktif-direktif kompatibilitas pada phpMussel.

##### "ignore_upload_errors"
- Direktif ini umumnya harus DINONAKTIFKAN kecuali diharuskan untuk fungsi yang benar dari phpMussel pada sistem tertentu. Biasanya, ketika DINONAKTIFKAN, ketika phpMussel mendeteksi adanya elemen dalam `$_FILES` array(), itu akan mencoba untuk memulai scan file yang mewakili elemen, dan, jika elemen yang kosong, phpMussel akan mengembalikan pesan kesalahan. Ini adalah perilaku yang tepat untuk phpMussel. Namun, untuk beberapa CMS, elemen kosong di `$_FILES` dapat terjadi sebagai akibat dari perilaku alami itu CMS, atau kesalahan dapat dilaporkan bila tidak ada, dalam kasus seperti itu, perilaku normal untuk phpMussel akan mengganggu untuk perilaku normal itu CMS. Jika situasi seperti itu terjadi untuk Anda, MENGAKTIFKAN direktif ini akan menginstruksikan phpMussel untuk tidak mencoba untuk memulai scan untuk elemen kosong, mengabaikan saat ditemui dan untuk tidak kembali terkait pesan kesalahan, sehingga memungkinkan kelanjutan dari halaman permintaan. False = DINONAKTIFKAN; True = DIAKTIFKAN.

##### "only_allow_images"
- Jika Anda hanya mengharapkan atau hanya berniat untuk memungkinkan mengupload gambar ke sistem atau CMS, dan jika Anda benar-benar tidak memerlukan mengupload file selain gambar ke sistem atau CMS, direktif ini harus DIAKTIFKAN, tapi sebaliknya harus DINONAKTIFKAN. Jika direktif ini DIAKTIFKAN, ini akan menginstruksikan phpMussel untuk memblokir tanpa pandang bulu setiap upload diidentifikasi sebagai file tidak gambar, tanpa pemindaian mereka. Ini mungkin mengurangi waktu memproses dan penggunaan memori untuk mencoba upload file tidak gambar. False = DINONAKTIFKAN; True = DIAKTIFKAN.

#### "heuristic" (Kategori)
Direktif-direktif heuristik pada phpMussel.

##### "threshold"
- Ada tanda tangan tertentu dari phpMussel yang dimaksudkan untuk mengidentifikasi kualitas yang mencurigakan dan berpotensi berbahaya pada file-file yang di-upload tanpa di diri mereka mengidentifikasi file-file yang di-upload spesifik sebagai berbahaya. Ini "threshold" nilai memberitahu phpMussel apa total berat maksimum untuk kualitas yang mencurigakan dan berpotensi berbahaya pada file-file yang di-upload yang diijinkan adalah sebelum file-file yang akan diidentifikasi sebagai berbahaya. Definisi berat dalam konteks ini adalah jumlah total kualitas mencurigakan dan berpotensi berbahaya diidentifikasi. Secara default, nilai ini akan ditetapkan sebagai 3. Sebuah nilai lebih rendah umumnya akan menghasilkan sebagai lebih tinggi positif palsu kejadian tapi sebuah jumlah lebih tinggi file berbahaya diidentifikasi, sedangkan sebuah nilai lebih tinggi umumnya akan menghasilkan sebagai lebih rendah positif palsu kejadian tapi sebuah jumlah lebih rendah pada file berbahaya yang diidentifikasi. Ini umumnya terbaik untuk meninggalkan nilai ini di default kecuali jika Anda mengalami masalah berhubungan dengan itu.

#### "virustotal" (Kategori)
Konfigurasi untuk Virus Total integrasi.

##### "vt_public_api_key"
- Secara fakultatif, phpMussel mampu memindai file menggunakan Virus Total API sebagai cara untuk memberikan tingkat sangat ditingkatkan perlindungan terhadap virus, trojan, malware dan ancaman lainnya. Secara default, file pemindaian menggunakan Virus Total API dinonaktifkan. Untuk mengaktifkannya, kunci API dari Virus Total diperlukan. Karena manfaat yang signifikan bahwa ini bisa memberikan kepada Anda, itu adalah sesuatu yang sangat direkomendasi mengaktifkan. Perlu diketahui, bagaimanapun, menggunakan Virus Total API, Anda _**HARUS**_ setuju untuk Terms of Service dan Anda _**HARUS**_ mematuhi semua pedoman terkait dijelaskan oleh Virus Total dokumentasi! Anda TIDAK diizinkan untuk menggunakan fungsi ini KECUALI KALAU:
  - Anda membaca dan setuju untuk Terms of Service dari Virus Total dan API mereka. Terms of Service dari Virus Total dan API mereka dapat ditemukan di [Sini](https://www.virustotal.com/en/about/terms-of-service/).
  - Anda membaca dan memahami, setidaknya, mukadimah dari Virus Total dokumentasi API (semuanya setelah "VirusTotal Public API v2.0" tapi sebelum "Contents"). Virus Total dokumentasi API umum dapat ditemukan di [Sini](https://www.virustotal.com/en/documentation/public-api/).

Mencatat: Jika memindai file menggunakan Virus Total API dinonaktifkan, Anda tidak akan perlu meninjau salah di direktif-direktif dalam kategori ini (`virustotal`), karena tidak satupun dari mereka akan melakukan apapun jika ini dinonaktifkan. Untuk memperoleh Virus Total kunci API, dari dimanapun di website mereka, mengklik atas "Join our Community" link yang terletak ke arah kanan atas dari halaman, memasukkan informasi yang diminta, dan mengklik "Sign up" ketika dilakukan. Ikuti semua instruksi yang diberikan, dan ketika Anda punya kunci API umum Anda, menyalin/menempelkan bahwa kunci API umum untuk `vt_public_api_key` direktif dari `config.ini` file konfigurasi.

##### "vt_suspicion_level"
- Secara default, phpMussel akan membatasi file dipindai menggunakan Virus Total API untuk file-file yang dianggap "mencurigakan". Anda dapat menyesuaikan pembatasan ini dengan mengubah nilai direktif `vt_suspicion_level`.
- `0`: File hanya dianggap mencurigakan jika, setelah dipindai oleh phpMussel menggunakan tanda tangan sendiri, mereka dianggap membawa berat heuristik. Ini akan efektif berarti bahwa penggunaan Virus Total API akan untuk pendapat kedua ketika phpMussel mencurigai bahwa file berpotensi menjadi berbahaya, tapi tidak dapat sepenuhnya mengesampingkan bahwa hal itu juga berpotensi menjadi jinak (atau tidak berbahaya) dan demikian akan dinyatakan biasanya tidak memblokir atau mengindikasi itu sebagai berbahaya.
- `1`: File dianggap mencurigakan jika, setelah dipindai oleh phpMussel menggunakan tanda tangan sendiri, mereka dianggap membawa berat heuristik, jika mereka diketahui executable (PE file, Mach-O file, ELF/Linux file, dll), atau jika mereka diketahui dari format yang berpotensi berisi file executable (seperti macro executable, DOC/DOCX file, arsip file seperti RAR, ZIP dan dll). Ini adalah default dan direkomendasikan tingkat kecurigaan untuk menerapkan, efektif berarti bahwa penggunaan Virus Total API akan untuk pendapat kedua ketika phpMussel tidak awalnya mendeteksi sesuatu yang berbahaya atau yang salah dengan file yang dianggap mencurigakan dan demikian akan dinyatakan biasanya tidak memblokir atau mengindikasi itu sebagai berbahaya.
- `2`: Semua file dianggap mencurigakan dan harus dipindai menggunakan Virus Total API. Saya biasanya tidak merekomendasikan menerapkan tingkat kecurigaan ini, karena risiko mencapai kuota API Anda lebih cepat daripada yang akan terjadi, tapi ada kondisi beberapa (seperti ketika webmaster atau hostmaster memiliki sedikit iman atau kepercayaan apakah gerangan dalam apapun diupload dari pengguna mereka) dimana tingkat kecurigaan ini dapat bisa sesuai. Dengan tingkat kecurigaan ini, semua file biasanya tidak diblokir atau ditandai sebagai berbahaya akan dipindai menggunakan Virus Total API. Mencatat, bagaimanapun, phpMussel akan berhenti menggunakan Virus Total API ketika kuota API Anda telah tercapai (terlepas dari tingkat kecurigaan), dan kuota Anda kemungkinan akan dicapai jauh lebih cepat bila menggunakan tingkat kecurigaan ini.

Mencatat: Terlepas dari tingkat kecurigaan, setiap file yang masuk daftar hitam atau daftar putih oleh phpMussel tidak akan dipindai menggunakan Virus Total API, karena file seperti ini akan sudah dinyatakan sebagai jinak atau berbahaya oleh phpMussel pada saat itu mereka akan sudah dinyatakan telah dipindai oleh Virus Total API, dan demikian, memindai tambahan tidak akan diperlukan. Kemampuan phpMussel untuk memindai file menggunakan Virus Total API dimaksudkan untuk membangun kepercayaan lebih lanjut untuk apakah file yang berbahaya atau jinak pada mereka situasi dimana phpMussel sendiri tidak sepenuhnya yakin apakah file yang berbahaya atau jinak.

##### "vt_weighting"
- Apakah Anda ingin phpMussel menerapkan hasil pemindaian menggunakan Virus Total API sebagai deteksi atau deteksi pembobotan? Direktif ini ada, karena, meskipun memindai file menggunakan mesin-mesin kelipatan (sebagai Virus Total melakukannya) harus menghasilkan tingkat deteksi meningkat (dan demikian lebih banyak file berbahaya tertangkap), juga dapat menghasilkan jumlah yang lebih banyak dari positif palsu, dan demikian, dalam kondisi beberapa, hasil pemindaian dapat digunakan lebih efektif sebagai nilai keyakinan daripada daripada sebagai kesimpulan definitif. Jika nilai 0 digunakan, hasil pemindaian menggunakan Virus Total API akan diaplikasikan sebagai pendeteksian, dan demikian, jika mesin-mesin digunakan oleh Virus Total menandai file dipindai sebagai berbahaya, phpMussel akan menganggap file yang berbahaya. Jika nilai lain yang digunakan, hasil pemindaian menggunakan Virus Total API akan diaplikasikan sebagai deteksi pembobotan, dan demikian, jumlah mesin digunakan oleh Virus Total menandai file dipindai sebagai berbahaya akan berfungsi sebagai nilai keyakinan (atau deteksi pembobotan) untuk jika file dipindai harus dianggap berbahaya oleh phpMussel (nilai digunakan akan mewakili nilai keyakinan minimum atau pembobotan minimum diperlukan untuk dianggap berbahaya). Nilai 0 digunakan secara default.

##### "vt_quota_rate" dan "vt_quota_time"
- Menurut Virus Total dokumentasi API, itu terbatas untuk paling 4 permintaan dalam bentuk apapun dalam jangka waktu 1 menit diberikan. Jika Anda menjalankan sebuah honeyclient, honeypot atau otomatisasi lainnya yang akan menyediakan file untuk VirusTotal dan tidak hanya mengambil laporan Anda berhak untuk kuota permintaan lebih tinggi. Secara default, phpMussel ketat akan mematuhi keterbatasan ini, tapi karena kemungkinan kuota ini sedang meningkat, dua direktif ini yang disediakan sebagai sarana bagi Anda untuk menginstruksikan phpMussel tentang apa batas harus dipatuhi. Kecuali Anda telah diperintahkan untuk melakukannya, itu tidak direkomendasikan bagi Anda untuk meningkat nilai-nilai ini, tapi, jika Anda mengalami masalah berkaitan dengan mencapai kuota Anda, penurunan nilai-nilai ini kadang _**DAPAT**_ membantu Anda bagi berurusan dengan masalah-masalah ini. Batas Anda ditentukan sebagai `vt_quota_rate` permintaan dalam bentuk apapun dalam jangka waktu `vt_quota_time` menit.

#### "urlscanner" (Kategori)
Scanner URL adalah disertakan dengan phpMussel, mampu mendeteksi URL berbahaya dari dalam data atau file dipindai.

Mencatat: Jika scanner URL dinonaktifkan, Anda tidak perlu meninjaunya direktif-direktif dalam kategori ini (`urlscanner`), karena tidak satupun dari mereka akan melakukan apa-apa jika ini dinonaktifkan.

Konfigurasi scanner URL memeriksa API.

##### "lookup_hphosts"
- Memungkinkan pemeriksaan API ke [hpHosts](https://hosts-file.net/) API ketika diset untuk true. hpHosts tidak memerlukan kunci API untuk melakukan pemeriksaan API.

##### "google_api_key"
- Memungkinkan pemeriksaan API ke Google Safe Browsing API ketika kunci API diperlukan didefinisikan. Pemeriksaan Google Safe Browsing API memerlukan kunci API, diperoleh dari di [Sini](https://console.developers.google.com/).
- Mencatat: Ekstensi cURL diperlukan untuk menggunakan fitur ini.

##### "maximum_api_lookups"
- Jumlah maksimum pemeriksaan API melakukan per iterasi memindai individual. Karena setiap API pemeriksaan akan menambah tambahan waktu total dibutuhkan untuk menyelesaikan setiap iterasi pemindaian, Anda mungkin ingin menetapkan batasan untuk mempercepat proses pemindaian secara keseluruhan. Bila diset untuk 0, sejumlah maksimum tidak akan diterapkan. Diset untuk 10 secara default.

##### "maximum_api_lookups_response"
- Apa yang harus dilakukan jika jumlah maksimal pemeriksaan API dilampaui? False = Tidak melakukan apa-apa (melanjutkan pemrosesan) [Default]; True = Memblokir file.

##### "cache_time"
- Berapa lama (dalam detik) harus hasil API untuk disimpan dalam cache? Default adalah 3600 detik (1 jam).

#### "legal" (Kategori)
Konfigurasi yang berkaitan dengan persyaratan hukum.

*Untuk informasi lebih lanjut tentang persyaratan hukum dan bagaimana ini dapat mempengaruhi persyaratan konfigurasi Anda, silahkan lihat bagian "[LEGAL INFORMATION](#SECTION11)" pada dokumentasi.*

##### "pseudonymise_ip_addresses"
- Pseudonymise alamat IP saat menulis file log? True = Ya [Default]; False = Tidak.

##### "privacy_policy"
- Alamat dari kebijakan privasi yang relevan untuk ditampilkan di footer dari setiap halaman yang dihasilkan. Spesifikasikan URL, atau biarkan kosong untuk menonaktifkan.

#### "template_data" (Kategori)
Direktif-direktif dan variabel-variabel untuk template-template dan tema-tema.

File template berkaitan untuk HTML diproduksi yang digunakan untuk menghasilkan pesan "Upload Ditolak" yang ditampilkan kepada pengguna-pengguna ketika file upload yang diblokir. Jika Anda menggunakan tema kustom untuk phpMussel, HTML diproduksi yang bersumber dari file `template_custom.html`, dan sebaliknya, HTML diproduksi yang bersumber dari file `template.html`. Variabel ditulis untuk file konfigurasi bagian ini yang diurai untuk HTML diproduksi dengan cara mengganti nama-nama variabel dikelilingi dengan kurung keriting ditemukan dalam HTML diproduksi dengan file variabel sesuai. Sebagai contoh, dimana `foo="bar"`, setiap terjadinya `<p>{foo}</p>` ditemukan dalam HTML diproduksi akan menjadi `<p>bar</p>`.

##### "theme"
- Tema default untuk phpMussel.

##### "magnification"
- *v1: "Magnification"*
- Perbesaran font. Default = 1.

##### "css_url"
- File template untuk tema kustom menggunakan properti CSS eksternal, sedangkan file template untuk tema default menggunakan properti CSS internal. Untuk menginstruksikan phpMussel menggunakan file template untuk tema kustom, menentukan alamat HTTP publik file CSS tema kustom Anda menggunakan variable `css_url`. Jika Anda biarkan kosong variabel ini, phpMussel akan menggunakan file template untuk tema default.

#### "PHPMailer" (Kategori)
Konfigurasi PHPMailer.

Saat ini, phpMussel menggunakan PHPMailer hanya untuk otentikasi dua faktor untuk bagian depan. Jika Anda tidak menggunakan bagian depan, atau jika Anda tidak menggunakan otentikasi dua-faktor untuk bagian depan, Anda dapat mengabaikan direktif ini.

##### "event_log"
- *v1: "EventLog"*
- File untuk mencatat semua kejadian yang terkait dengan PHPMailer. Spesifikasikan nama file, atau biarkan kosong untuk menonaktifkan.

##### "skip_auth_process"
- *v1: "SkipAuthProcess"*
- Pengaturan direktif ini ke `true` menginstruksikan PHPMailer untuk melewati proses otentikasi normal yang biasanya terjadi ketika mengirim email melalui SMTP. Ini harus dihindari, karena melewatkan proses ini dapat mengekspos email keluar ke serangan MITM, tetapi mungkin diperlukan dalam kasus dimana proses ini mencegah PHPMailer menghubungkan ke server SMTP.

##### "enable_two_factor"
- *v1: "Enable2FA"*
- Direktif ini menentukan apakah akan menggunakan 2FA untuk akun depan.

##### "host"
- *v1: "Host"*
- Host SMTP yang digunakan untuk email keluar.

##### "port"
- *v1: "Port"*
- Nomor port yang digunakan untuk email keluar. Default = 587.

##### "smtp_secure"
- *v1: "SMTPSecure"*
- Protokol yang digunakan saat mengirim email melalui SMTP (TLS atau SSL).

##### "smtp_auth"
- *v1: "SMTPAuth"*
- Direktif ini menentukan apakah akan mengotentikasi sesi SMTP (biasanya harus dibiarkan sendiri).

##### "username"
- *v1: "Username"*
- Nama pengguna yang digunakan saat mengirim email melalui SMTP.

##### "password"
- *v1: "Password"*
- Kata sandi yang digunakan saat mengirim email melalui SMTP.

##### "set_from_address"
- *v1: "setFromAddress"*
- Alamat pengirim yang dikutip saat mengirim email melalui SMTP.

##### "set_from_name"
- *v1: "setFromName"*
- Nama pengirim yang dikutip saat mengirim email melalui SMTP.

##### "add_reply_to_address"
- *v1: "addReplyToAddress"*
- Alamat balasan yang dikutip saat mengirim email melalui SMTP.

##### "add_reply_to_name"
- *v1: "addReplyToName"*
- Nama balasan yang dikutip saat mengirim email melalui SMTP.

#### "supplementary_cache_options" (Kategori)
Opsi cache tambahan.

*Saat ini, ini sangat eksperimental, dan mungkin tidak berperilaku seperti yang diharapkan! Untuk saat ini, saya merekomendasi mengabaikannya.*

##### "enable_apcu"
- Menentukan apakah akan mencoba menggunakan APCu untuk cache. Default = False.

##### "enable_memcached"
- Menentukan apakah akan mencoba menggunakan Memcached untuk cache. Default = False.

##### "enable_redis"
- Menentukan apakah akan mencoba menggunakan Redis untuk cache. Default = False.

##### "enable_pdo"
- Menentukan apakah akan mencoba menggunakan PDO untuk cache. Default = False.

##### "memcached_host"
- Nilai host Memcached. Default = "localhost".

##### "memcached_port"
- Nilai port Memcached. Default = "11211".

##### "redis_host"
- Nilai host Redis. Default = "localhost".

##### "redis_port"
- Nilai port Redis. Default = "6379".

##### "redis_timeout"
- Nilai batas waktu Redis. Default = "2.5".

##### "pdo_dsn"
- Nilai DSN PDO. Default = "`mysql:dbname=phpmussel;host=localhost;port=3306`".

##### "pdo_username"
- Nama pengguna PDO.

##### "pdo_password"
- Kata sandi PDO.

---


### 8. <a name="SECTION8"></a>FORMAT TANDA TANGAN

*Lihat juga:*
- *[Apa yang "tanda tangan"?](#WHAT_IS_A_SIGNATURE)*

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


### 9. <a name="SECTION9"></a>MASALAH KOMPATIBILITAS DIKETAHUI

#### PHP dan PCRE
- phpMussel memerlukan PHP dan PCRE untuk mengeksekusi dan berfungsi dengan baik. Tanpa PHP, atau tanpa ekstensi PCRE, phpMussel tidak akan mengeksekusi atau berfungsi dengan baik. Seharusnya memastikan sistem Anda terinstal PHP dan PCRE dan tersedia secara prioritas untuk mengunduh dan menginstal phpMussel.

#### KOMPATIBILITAS SOFTWARE ANTI-VIRUS

Untuk banyak bagian, phpMussel seharusnya kompatibel dengan software pemindaian virus. Bagaimanapun konflik telah dilaporkan oleh penggunak di masa lalu. Informasi dibawah adalah dari virustotal.com, dan menguraikan sejumlah angka positif yang salah yang dilaporkan oleh bermacam-macam program anti-virus pada phpMussel. Walaupun informasi ini bukan jaminan absolut dari apakah Anda mengalami masalah kompatibilitas antara phpMussel dan perangkat anti-virus Anda, jika perangkat lunak anti-virus Anda tercatat berlawanan dengan phpMussel, Anda seharusnya mempertimbangkan menonaktifkannya bekerja dengan phpMussel atau seharusnya mempertimbangkan opsi alternatif ke software anti virus atau phpMussel.

Informasi ini diupdate 2018.10.09 dan cocok untuk semua rilis phpMussel dari dua versi minor terbaru versi (v1.5.0-v1.6.0) pada waktu saya menuliskan ini.

*Informasi ini hanya berlaku untuk paket utama. Hasil dapat bervariasi berdasarkan file tanda tangan yang diinstal, plugin, dan komponen periferal lainnya.*

| Scanner | Hasil |
|---|---|
| Bkav | Melaporkan "VEX.Webshell" |

---


### 10. <a name="SECTION10"></a>PERTANYAAN YANG SERING DIAJUKAN (FAQ)

- [Apa yang "tanda tangan"?](#WHAT_IS_A_SIGNATURE)
- [Apa yang dimaksud dengan "positif palsu"?](#WHAT_IS_A_FALSE_POSITIVE)
- [Seberapa sering tanda tangan diperbarui?](#SIGNATURE_UPDATE_FREQUENCY)
- [Saya mengalami masalah ketika menggunakan phpMussel dan saya tidak tahu apa saya harus lakukan! Tolong bantu!](#ENCOUNTERED_PROBLEM_WHAT_TO_DO)
- [Saya ingin menggunakan phpMussel (sebelum v2) dengan versi PHP yang lebih tua dari 5.4.0; Anda dapat membantu?](#MINIMUM_PHP_VERSION)
- [Saya ingin menggunakan phpMussel (v2) dengan versi PHP yang lebih tua dari 7.2.0; Anda dapat membantu?](#MINIMUM_PHP_VERSION_V2)
- [Dapatkah saya menggunakan satu instalasi phpMussel untuk melindungi beberapa domain?](#PROTECT_MULTIPLE_DOMAINS)
- [Saya tidak ingin membuang waktu dengan menginstal ini dan membuatnya bekerja dengan situs web saya; Bisakah saya membayar Anda untuk melakukan semuanya untuk saya?](#PAY_YOU_TO_DO_IT)
- [Dapatkah saya mempekerjakan Anda atau pengembang proyek ini untuk pekerjaan pribadi?](#HIRE_FOR_PRIVATE_WORK)
- [Saya perlu modifikasi khusus, customisasi, dll; Apakah kamu bisa membantu?](#SPECIALIST_MODIFICATIONS)
- [Saya seorang pengembang, perancang situs web, atau programmer. Dapatkah saya menerima atau menawarkan pekerjaan yang berkaitan dengan proyek ini?](#ACCEPT_OR_OFFER_WORK)
- [Saya ingin berkontribusi pada proyek ini; Dapatkah saya melakukan ini?](#WANT_TO_CONTRIBUTE)
- [Bagaimana cara mengakses rincian spesifik tentang file saat dipindai?](#SCAN_DEBUGGING)
- [Dapatkah saya menggunakan cron untuk mengupdate secara otomatis?](#CRON_TO_UPDATE_AUTOMATICALLY)
- [Dapatkah phpMussel memindai file dengan nama yang tidak ANSI?](#SCAN_NON_ANSI)
- [Daftar hitam – Daftar putih – Daftar abu-abu – Apa itu mereka, dan bagaimana cara menggunakannya?](#BLACK_WHITE_GREY)
- [Ketika saya mengaktifkan atau menonaktifkan file tanda tangan melalui halaman pembaruan, itu memilah mereka secara alfanumerik dalam konfigurasi. Bisakah saya mengubah cara mereka disortir?](#CHANGE_COMPONENT_SORT_ORDER)

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
- Apakah Anda memeriksa semua dokumentasi? Jika tidak, silahkan melakukannya. Jika masalah tidak dapat diselesaikan dengan menggunakan dokumentasi, lanjutkan membaca.
- Apakah Anda memeriksa **[halaman issues](https://github.com/phpMussel/phpMussel/issues)**, untuk melihat apakah masalah telah disebutkan sebelumnya? Jika sudah disebutkan sebelumnya, memeriksa apakah ada saran, ide, dan/atau solusi yang tersedia, dan ikuti sesuai yang diperlukan untuk mencoba untuk menyelesaikan masalah.
- Jika masalah masih berlanjut, silahkan mencari bantuan dengan membuat issue baru di halaman issues.

#### <a name="MINIMUM_PHP_VERSION"></a>Saya ingin menggunakan phpMussel (sebelum v2) dengan versi PHP yang lebih tua dari 5.4.0; Anda dapat membantu?

Tidak. PHP >= 5.4.0 adalah persyaratan minimum untuk phpMussel < v2.

#### <a name="MINIMUM_PHP_VERSION_V2"></a>Saya ingin menggunakan phpMussel (v2) dengan versi PHP yang lebih tua dari 7.2.0; Anda dapat membantu?

Tidak. PHP >= 7.2.0 adalah persyaratan minimum untuk phpMussel v2.

*Lihat juga: [Bagan Kompatibilitas](https://maikuolan.github.io/Compatibility-Charts/).*

#### <a name="PROTECT_MULTIPLE_DOMAINS"></a>Dapatkah saya menggunakan satu instalasi phpMussel untuk melindungi beberapa domain?

Ya. Instalasi phpMussel tidak secara alami terkunci pada domain tertentu, dan dengan demikian dapat digunakan untuk melindungi beberapa domain. Umumnya, kami mengacu pada instalasi phpMussel yang hanya melindungi satu domain as "instalasi domain tunggal" ("single-domain installations"), dan kami mengacu pada instalasi phpMussel yang melindungi beberapa domain dan/atau sub-domain sebagai "instalasi domain beberapa" ("multi-domain installations"). Jika Anda mengoperasikan instalasi domain beberapa dan perlu menggunakan berbagai kumpulan file tanda tangan untuk berbagai domain, atau perlu phpMussel untuk dikonfigurasi secara berbeda untuk domain berbeda, kamu bisa melakukan ini. Setelah memuat file konfigurasi (`config.ini`), phpMussel akan memeriksa adanya "file untuk pengganti konfigurasi" spesifik untuk domain (atau sub-domain) yang diminta (`domain-yang-diminta.tld.config.ini`), dan jika ditemukan, setiap nilai konfigurasi yang ditentukan oleh file untuk pengganti konfigurasi akan digunakan untuk instance eksekusi daripada nilai konfigurasi yang ditentukan oleh file konfigurasi. File untuk pengganti konfigurasi identik dengan file konfigurasi, dan atas kebijaksanaan Anda, dapat berisi keseluruhan semua konfigurasi yang tersedia untuk phpMussel, atau apapun bagian kecil yang dibutuhkan yang berbeda dari nilai yang biasanya ditentukan oleh file konfigurasi. File untuk pengganti konfigurasi diberi nama sesuai dengan domain yang mereka inginkan (jadi, misalnya, jika Anda memerlukan file untuk pengganti konfigurasi untuk domain, `http://www.some-domain.tld/`, file untuk pengganti konfigurasi harus diberi nama sebagai `some-domain.tld.config.ini`, dan harus ditempatkan di dalam vault bersama file konfigurasi, `config.ini`). Nama domain untuk instance eksekusi berasal dari header permintaan `HTTP_HOST`; "www" diabaikan.

#### <a name="PAY_YOU_TO_DO_IT"></a>Saya tidak ingin membuang waktu dengan menginstal ini dan membuatnya bekerja dengan situs web saya; Bisakah saya membayar Anda untuk melakukan semuanya untuk saya?

Mungkin. Ini dipertimbangkan berdasarkan kasus per kasus. Beritahu kami apa yang Anda butuhkan, apa yang Anda tawarkan, dan kami akan memberitahu Anda jika kami dapat membantu.

#### <a name="HIRE_FOR_PRIVATE_WORK"></a>Dapatkah saya mempekerjakan Anda atau pengembang proyek ini untuk pekerjaan pribadi?

*Lihat di atas.*

#### <a name="SPECIALIST_MODIFICATIONS"></a>Saya perlu modifikasi khusus, customisasi, dll; Apakah kamu bisa membantu?

*Lihat di atas.*

#### <a name="ACCEPT_OR_OFFER_WORK"></a>Saya seorang pengembang, perancang situs web, atau programmer. Dapatkah saya menerima atau menawarkan pekerjaan yang berkaitan dengan proyek ini?

Ya. Lisensi kami tidak melarang hal ini.

#### <a name="WANT_TO_CONTRIBUTE"></a>Saya ingin berkontribusi pada proyek ini; Dapatkah saya melakukan ini?

Ya. Kontribusi untuk proyek ini sangat disambut baik. Silahkan lihat "CONTRIBUTING.md" untuk informasi lebih lanjut.

#### <a name="SCAN_DEBUGGING"></a>Bagaimana cara mengakses rincian spesifik tentang file saat dipindai?

Anda dapat mengakses rincian spesifik tentang file saat dipindai dengan menetapkan array yang akan digunakan untuk tujuan ini sebelum menginstruksikan phpMussel untuk memindai mereka.

Pada contoh dibawah ini, `$Foo` ditugaskan untuk tujuan ini. Setelah memindai `/jalur/file/...`, informasi rinci tentang file yang dalam `/jalur/file/...` akan berada dalam `$Foo`.

```PHP
<?php
require 'phpmussel/loader.php';

$phpMussel['Set-Scan-Debug-Array']($Foo);

$Results = $phpMussel['Scan']('/jalur/file/...');

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
$phpMussel['Destroy-Scan-Debug-Array']($Foo);
```

#### <a name="CRON_TO_UPDATE_AUTOMATICALLY"></a>Dapatkah saya menggunakan cron untuk mengupdate secara otomatis?

Ya. API dibangun dalam bagian depan untuk berinteraksi dengan halaman pembaruan melalui skrip eksternal. Skrip terpisah, "[Cronable](https://github.com/Maikuolan/Cronable)", tersedia, dan dapat digunakan oleh cron manager atau cron scheduler untuk mengupdate paket ini dan paket didukung lainnya secara otomatis (script ini menyediakan dokumentasi sendiri).

#### <a name="SCAN_NON_ANSI"></a>Dapatkah phpMussel memindai file dengan nama yang tidak ANSI?

Misalkanlah ada direktori yang Anda ingin pindai. Di direktori ini, Anda memiliki beberapa file dengan nama non-ANSI.
- `Пример.txt`
- `一个例子.txt`
- `例です.txt`

Anggaplah Anda menggunakan mode CLI atau API phpMussel untuk memindai.

Ketika menggunakan PHP < 7.1.0, pada beberapa sistem, phpMussel tidak akan melihat file-file ini ketika mencoba untuk memindai direktori, dan karenanya, tidak akan dapat memindai file-file ini. Anda mungkin akan melihat hasil yang sama seperti jika Anda memindai direktori kosong:

```
 Sun, 01 Apr 2018 22:27:41 +0800 Dimulai.
 Sun, 01 Apr 2018 22:27:41 +0800 Selesai.
```

Juga, ketika menggunakan PHP < 7.1.0, memindai file secara individual menghasilkan hasil seperti ini:

```
 Sun, 01 Apr 2018 22:27:41 +0800 Dimulai.
 > Memeriksa 'X:/directory/Пример.txt' (FN: b831eb8f):
 -> File tidak valid!
 Sun, 01 Apr 2018 22:27:41 +0800 Selesai.
```

Atau ini:

```
 Sun, 01 Apr 2018 22:27:41 +0800 Dimulai.
 > X:/directory/??????.txt bukan file atau direktori.
 Sun, 01 Apr 2018 22:27:41 +0800 Selesai.
```

Ini karena cara PHP menangani nama file non-ANSI sebelum PHP 7.1.0. Jika Anda mengalami masalah ini, solusinya adalah memperbarui instalasi PHP Anda ke 7.1.0 atau yang lebih baru. Di PHP >= 7.1.0, nama file non-ANSI ditangani lebih baik, dan phpMussel harus dapat memindai file dengan benar.

Sebagai perbandingan, hasil ketika mencoba untuk memindai direktori menggunakan PHP >= 7.1.0:

```
 Sun, 01 Apr 2018 22:27:41 +0800 Dimulai.
 -> Memeriksa '\Пример.txt' (FN: b2ce2d31; FD: 27cbe813):
 --> Tidak ada masalah yang diketahui.
 -> Memeriksa '\一个例子.txt' (FN: 50debed5; FD: 27cbe813):
 --> Tidak ada masalah yang diketahui.
 -> Memeriksa '\例です.txt' (FN: ee20a2ae; FD: 27cbe813):
 --> Tidak ada masalah yang diketahui.
 Sun, 01 Apr 2018 22:27:41 +0800 Selesai.
```

Dan mencoba memindai file secara individual:

```
 Sun, 01 Apr 2018 22:27:41 +0800 Dimulai.
 > Memeriksa 'X:/directory/Пример.txt' (FN: b831eb8f; FD: 27cbe813):
 -> Tidak ada masalah yang diketahui.
 Sun, 01 Apr 2018 22:27:41 +0800 Selesai.
```

#### <a name="BLACK_WHITE_GREY"></a>Daftar hitam – Daftar putih – Daftar abu-abu – Apa itu mereka, dan bagaimana cara menggunakannya?

Istilah-istilah ini menyampaikan makna yang berbeda dalam konteks yang berbeda. Di phpMussel, ada tiga konteks dimana istilah-istilah ini digunakan: Respons ukuran file, respons jenis file, dan daftar abu-abu tanda tangan.

Untuk mencapai hasil yang diinginkan dengan biaya minimal untuk diproses, ada beberapa hal sederhana yang dapat diperiksa oleh phpMussel sebelum benar-benar memindai file, seperti ukuran file, nama, dan ekstensi. Sebagai contoh; Jika file terlalu besar, atau jika ekstensi menunjukkan jenis file yang kami tidak ingin izinkan ke situs web kami, kami dapat segera menandai file, dan tidak perlu memindainya.

Respons ukuran file adalah cara phpMussel merespons ketika file melebihi batas yang ditentukan. Meskipun tidak ada daftar terlibat, sebuah file dapat dianggap masuk daftar hitam, masuk daftar putih, atau masuk daftar abu-abu, berdasarkan ukurannya. Dua direktif konfigurasi opsional yang terpisah ada untuk menentukan batas dan respons yang diinginkan masing-masing.

Respons jenis file adalah cara phpMussel merespons ekstensi file. Tiga direktif konfigurasi opsional tersedia untuk secara eksplisit menentukan ekstensi mana yang harus dimasukkan dalam daftar hitam, daftar putih, atau daftar abu-abu. Sebuah file dapat dianggap masuk daftar hitam, masuk daftar putih, atau masuk daftar abu-abu jika ekstensinya cocok dengan salah satu ekstensi yang ditentukan.

Dalam dua konteks ini, menjadi masuk daftar putih berarti tidak boleh dipindai atau ditandai; masuk daftar hitam berarti harus ditandai (dan karena itu tidak perlu memindainya); dan menjadi masuk daftar abu-abu berarti analisis lebih lanjut diperlukan untuk menentukan apakah kita harus menandainya (yaitu, itu harus dipindai).

Daftar abu-abu tanda tangan adalah daftar tanda tangan yang pada dasarnya harus diabaikan (ini secara singkat disebutkan sebelumnya dalam dokumentasi). Ketika tanda tangan di daftar abu-abu tanda tangan dipicu, phpMussel terus bekerja melalui tandatangannya dan tidak mengambil tindakan khusus dalam hal tanda tangan dalam daftar abu-abu. Tidak ada daftar hitam tanda tangan, karena perilaku tersirat adalah perilaku normal untuk tanda tangan yang dipicu, dan tidak ada daftar putih tanda tangan, karena perilaku tersirat tidak akan benar-benar masuk akal dengan pertimbangan bagaimana phpMussel bekerja normal dan kemampuan yang sudah dimiliki.

Daftar abu-abu tanda tangan berguna jika Anda perlu menyelesaikan masalah yang disebabkan oleh tanda tangan tertentu tanpa menonaktifkan atau menghapus seluruh file tanda tangan.

#### <a name="CHANGE_COMPONENT_SORT_ORDER"></a>Ketika saya mengaktifkan atau menonaktifkan file tanda tangan melalui halaman pembaruan, itu memilah mereka secara alfanumerik dalam konfigurasi. Bisakah saya mengubah cara mereka disortir?

Ya. Jika Anda perlu memaksa beberapa file untuk dieksekusikan dalam urutan tertentu, Anda dapat menambahkan beberapa data sewenang-wenang sebelum nama mereka di direktif konfigurasi dimana mereka terdaftar, dipisahkan oleh titik dua. Ketika halaman pembaruan selanjutnya mengurutkan file lagi, data tambahan ini akan mempengaruhi urutan, menyebabkan mereka secara konsekuen mengeksekusi dalam urutan yang Anda inginkan, tanpa perlu mengganti nama mereka.

Misalnya, dengan asumsi direktif konfigurasi dengan file yang tercantum sebagai berikut:

`file1.php,file2.php,file3.php,file4.php,file5.php`

Jika Anda ingin `file3.php` untuk mengeksekusi terlebih dahulu, Anda bisa menambahkan sesuatu seperti `aaa:` sebelum nama file:

`file1.php,file2.php,aaa:file3.php,file4.php,file5.php`

Kemudian, jika file baru, `file6.php`, diaktifkan, ketika halaman pembaruan mengurutkan semuanya lagi, itu akan berakhir seperti ini:

`aaa:file3.php,file1.php,file2.php,file4.php,file5.php,file6.php`

Situasi adalah sama ketika file dinonaktifkan. Sebaliknya, jika Anda ingin file dieksekusi terakhir, Anda bisa menambahkan sesuatu seperti `zzz:` sebelum nama file. Dalam hal apapun, Anda tidak perlu mengganti nama file yang dimaksud.

---


### 11. <a name="SECTION11"></a>INFORMASI HUKUM

#### 11.0 PENGANTAR BAGIAN

Bagian dokumentasi ini dimaksudkan untuk menjelaskan kemungkinan pertimbangan hukum mengenai penggunaan dan implementasi paket, dan untuk memberikan beberapa informasi dasar terkait. Ini mungkin penting bagi beberapa pengguna sebagai sarana untuk memastikan kepatuhan dengan persyaratan hukum yang mungkin ada di negara tempat mereka beroperasi, dan beberapa pengguna mungkin perlu menyesuaikan kebijakan situs web mereka sesuai dengan informasi ini.

Pertama dan terutama, harap menyadari bahwa saya (penulis paket) bukan seorang pengacara, atau profesional hukum yang berkualitas dalam bentuk apapun. Oleh karena itu, saya secara hukum tidak memenuhi syarat untuk memberikan nasihat hukum. Juga, dalam beberapa kasus, persyaratan hukum yang tepat dapat bervariasi antara negara dan yurisdiksi yang berbeda, dan berbagai persyaratan hukum ini terkadang dapat menimbulkan konflik (seperti, misalnya, dalam kasus negara-negara yang mendukung hak privasi dan hak untuk dilupakan, versus negara-negara yang mendukung retensi data diperpanjang). Pertimbangkan juga bahwa akses ke paket tidak terbatas pada negara atau yurisdiksi tertentu, dan oleh karena itu, pengguna paket cenderung ke geografis yang beragam. Poin-poin ini dianggap, saya tidak dalam posisi untuk menyatakan apa artinya "mematuhi hukum" untuk semua pengguna, dalam semua hal. Namun, saya berharap informasi disini akan membantu Anda untuk mengambil keputusan sendiri mengenai apa yang Anda harus lakukan agar tetap mematuhi hukum dalam konteks paket. Jika Anda memiliki keraguan atau kekhawatiran mengenai informasi disini, atau jika Anda membutuhkan bantuan dan saran tambahan dari perspektif hukum, saya merekomendasikan konsultasi dengan profesional hukum yang berkualitas.

#### 11.1 TANGGUNG JAWAB DAN KEWAJIBAN HUKUM

Seperti yang telah dinyatakan oleh lisensi paket, paket ini disediakan tanpa jaminan apapun. Ini termasuk (tetapi tidak terbatas pada) semua lingkup kewajiban hukum. Paket ini diberikan kepada Anda untuk kenyamanan Anda, dengan harapan itu akan berguna, dan itu akan memberikan beberapa manfaat bagi Anda. Namun, apakah Anda menggunakan atau mengimplementasikan paket ini, adalah pilihan Anda sendiri. Anda tidak dipaksa untuk menggunakan atau mengimplementasikan paket ini, tetapi ketika Anda melakukannya, Anda bertanggung jawab atas keputusan itu. Bukan saya, dan tidak ada kontributor lain untuk paket ini, bertanggung jawab secara hukum atas konsekuensi keputusan yang Anda buat, terlepas dari apakah langsung, tidak langsung, tersirat, atau sebaliknya.

#### 11.2 PIHAK KETIGA

Tergantung pada konfigurasi dan implementasinya yang tepat, paket dapat berkomunikasi dan berbagi informasi dengan pihak ketiga dalam beberapa kasus. Informasi ini dapat didefinisikan sebagai "informasi identitas pribadi" (PII) dalam beberapa konteks, oleh beberapa yurisdiksi.

Bagaimana informasi ini dapat digunakan oleh pihak ketiga ini, tunduk pada berbagai kebijakan yang ditetapkan oleh pihak ketiga ini, dan berada di luar ruang lingkup dokumentasi ini. Namun, dalam semua kasus tersebut, berbagi informasi dengan pihak ketiga ini dapat dinonaktifkan. Dalam semua kasus semacam itu, jika Anda memilih untuk mengaktifkannya, Anda bertanggung jawab untuk meneliti setiap kekhawatiran yang mungkin Anda miliki tentang privasi, keamanan, dan penggunaan PII oleh pihak ketiga ini. Jika ada keraguan, atau jika Anda tidak puas dengan perilaku pihak ketiga ini sehubungan dengan PII, mungkin terbaik adalah menonaktifkan semua pembagian informasi dengan pihak ketiga ini.

Untuk tujuan transparansi, jenis informasi yang dibagikan, dan dengan siapa, dijelaskan dibawah ini.

##### 11.2.0 FONT WEB

Beberapa tema kustom, serta UI standar ("antarmuka pengguna") untuk halaman bagian depan phpMussel dan halaman "Upload Ditolak", dapat menggunakan font web untuk alasan estetika. Font web dinonaktifkan secara default, tetapi ketika diaktifkan, komunikasi langsung antara browser pengguna dan layanan hosting font web terjadi. Ini mungkin melibatkan informasi komunikasi seperti alamat IP pengguna, agen pengguna, sistem operasi, dan detail lainnya yang tersedia untuk permintaan tersebut. Sebagian besar font web ini dihosting oleh layanan [Google Fonts](https://fonts.google.com/).

*Direktif konfigurasi yang relevan:*
- `general` -> `disable_webfonts`

##### 11.2.1 SCANNER URL

URL ditemukan dalam upload file dapat dibagikan dengan API hpHosts atau API Google Safe Browsing, tergantung bagaimana paket dikonfigurasi. Dalam kasus API hpHosts, perilaku ini diaktifkan secara default. API Google Safe Browsing memerlukan kunci API agar berfungsi dengan benar, dan karenanya dinonaktifkan secara default.

*Direktif konfigurasi yang relevan:*
- `urlscanner` -> `lookup_hphosts`
- `urlscanner` -> `google_api_key`

##### 11.2.2 VIRUS TOTAL

Ketika phpMussel memindai upload file, hash dari file-file tersebut dapat dibagikan dengan API Virus Total, tergantung bagaimana paket dikonfigurasi. Ada rencana untuk dapat membagikan seluruh file di beberapa titik di masa depan juga, tetapi fitur ini tidak didukung oleh paket saat ini. API Virus Total membutuhkan kunci API agar berfungsi dengan benar, dan karenanya dinonaktifkan secara default.

Informasi (termasuk file dan metadata file terkait) yang dibagikan dengan Virus Total, juga dapat dibagikan dengan mitra mereka, afiliasi mereka, dan berbagai lainnya untuk tujuan penelitian. Ini dijelaskan lebih detail oleh kebijakan privasi mereka.

*Lihat: [Privacy Policy &ndash; VirusTotal](https://support.virustotal.com/hc/en-us/articles/115002168385-Privacy-Policy).*

*Direktif konfigurasi yang relevan:*
- `virustotal` -> `vt_public_api_key`

#### 11.3 PENCATATAN

Pencatatan adalah bagian penting dari phpMussel karena sejumlah alasan. Tanpa mencatat kejadian blokir, mungkin sulit untuk mendiagnosis kesalahan positif, untuk memastikan secara akurat seberapa baik kinerja phpMussel dalam konteks tertentu, dan untuk menentukan dimana kekurangannya, dan perubahan apa yang mungkin diperlukan untuk konfigurasi atau tanda tangan yang sesuai, agar terus berfungsi sebagaimana dimaksud. Apapun, pencatatan mungkin tidak diinginkan untuk semua pengguna, dan tetap sepenuhnya opsional. Di phpMussel, pencatatan dinonaktifkan secara default. Untuk mengaktifkannya, phpMussel harus dikonfigurasi dengan benar.

Juga, apakah pencatatan diizinkan secara hukum, dan sejauh diizinkan secara hukum (misalnya, jenis informasi yang dapat dicatat, untuk berapa lama, dan dalam keadaan apa), dapat bervariasi, tergantung pada yurisdiksi dan pada konteks dimana phpMussel diimplementasikan (misalnya, apakah Anda beroperasi sebagai individu, sebagai entitas perusahaan, dan apakah secara komersial atau non-komersial). Jadi, mungkin berguna bagi Anda untuk membaca bagian ini dengan seksama.

Ada beberapa jenis pencatatan yang dapat dilakukan oleh phpMussel. Berbagai jenis pencatatan melibatkan berbagai jenis informasi, untuk berbagai alasan.

##### 11.3.0 LOG PEMINDAIAN

Ketika diaktifkan dalam konfigurasi paket, phpMussel menyimpan log dari file yang dipindainya. Jenis pencatatan ini tersedia dalam dua format berbeda:
- File log yang dapat dibaca oleh manusia.
- File log dalam format serial.

Entri ke log yang dapat dibaca oleh manusia biasanya terlihat seperti ini (sebagai contoh):

```
Mon, 21 May 2018 00:47:58 +0800 Dimulai.
> Memeriksa 'ascii_standard_testfile.txt' (FN: ce76ae7a; FD: 7b9bfed5):
-> Terdeteksi phpMussel-Testfile.ASCII.Standard!
Mon, 21 May 2018 00:48:04 +0800 Selesai.
```

Entri log pemindaian biasanya mencakup informasi berikut:
- Tanggal dan waktu file dipindai.
- Nama file yang dipindai.
- CRC32b hash dari nama dan isi file.
- Apa yang terdeteksi dalam file (jika ada apapun yang terdeteksi).

*Direktif konfigurasi yang relevan:*
- `general` -> `scan_log`
- `general` -> `scan_log_serialized`

Ketika direktif ini dibiarkan kosong, jenis pencatatan ini akan tetap dinonaktifkan.

##### 11.3.1 DIBLOKIR OLEH PEMINDAI

Ketika diaktifkan dalam konfigurasi paket, phpMussel menyimpan log dari upload yang telah diblokir.

Entri ke log untuk file yang diblokir oleh pemindai biasanya terlihat seperti ini (sebagai contoh):

```
Tanggal: Mon, 21 May 2018 00:47:56 +0800
Alamat IP: 127.0.0.1
== Hasil pindai (mengapa ditandai) ==
Terdeteksi phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
== Rekonstruksi tanda tangan hash ==
3ed8a00c6c498a96a44d56533806153c:666:ascii_standard_testfile.txt
Dikarantina sebagai "/vault/quarantine/0000000000-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx.qfu".
```

Entri ke log untuk file yang diblokir oleh pemindai biasanya mencakup informasi berikut:
- Tanggal dan waktu saat upload diblokir.
- Alamat IP tempat upload berasal.
- Alasan mengapa file diblokir (apa yang terdeteksi).
- Nama file diblokir.
- MD5 dan ukuran file diblokir.
- Apakah file adalah dikarantina, dan dibawah nama internal apa.

*Direktif konfigurasi yang relevan:*
- `general` -> `scan_kills`

##### 11.3.2 LOG BAGIAN DEPAN

Jenis pencatatan ini berhubungan dengan upaya masuk bagian depan, dan hanya terjadi ketika pengguna mencoba masuk ke bagian depan (dengan asumsi akses bagian depan diaktifkan).

Entri log untuk bagian depan berisi alamat IP pengguna yang mencoba masuk, tanggal dan waktu ketika itu terjadi, dan hasil dari upaya tersebut (berhasil masuk, atau gagal masuk). Entri log untuk bagian depan biasanya terlihat seperti ini (sebagai contoh):

```
x.x.x.x - Day, dd Mon 20xx hh:ii:ss +0000 - "admin" - Dimasuk.
```

*Direktif konfigurasi yang relevan:*
- `general` -> `frontend_log`

##### 11.3.3 ROTASI LOG

Anda mungkin ingin membersihkan log setelah jangka waktu tertentu, atau mungkin diminta untuk melakukannya oleh hukum (yaitu, jumlah waktu yang diizinkan secara hukum bagi Anda untuk mempertahankan log mungkin dibatasi oleh hukum). Anda dapat mencapai ini dengan menyertakan penanda tanggal/waktu dalam nama-nama file log Anda sesuai yang ditentukan oleh konfigurasi paket Anda (misalnya, `{yyyy}-{mm}-{dd}.log`), dan kemudian mengaktifkan rotasi log (rotasi log memungkinkan Anda untuk melakukan beberapa tindakan pada file log ketika batas yang ditentukan terlampaui).

Sebagai contoh: Jika saya secara hukum diminta untuk menghapus log setelah 30 hari, saya bisa menentukan `{dd}.log` dalam nama file log saya (`{dd}` represents days), atur nilai `log_rotation_limit` ke 30, dan atur nilai `log_rotation_action` ke `Delete`.

Sebaliknya, jika Anda diminta untuk menyimpan log untuk jangka waktu yang panjang, Anda bisa memilih untuk tidak menggunakan rotasi log sama sekali, atau Anda bisa mengatur nilai `log_rotation_action` ke `Archive`, untuk mengompres file log, sehingga mengurangi jumlah total ruang disk yang mereka tempati.

*Direktif konfigurasi yang relevan:*
- `general` -> `log_rotation_limit`
- `general` -> `log_rotation_action`

##### 11.3.4 PEMOTONGAN LOG

Ini juga memungkinkan untuk memotong file log individu ketika mereka melebihi ukuran tertentu, jika ini adalah sesuatu yang mungkin Anda butuhkan atau ingin lakukan.

*Direktif konfigurasi yang relevan:*
- `general` -> `truncate`

##### 11.3.5 PSEUDONIMISASI ALAMAT IP

Pertama, jika Anda tidak akrab dengan istilah ini, "pseudonimisasi" mengacu pada memproses data pribadi sedemikian rupa sehingga tidak dapat diidentifikasi ke subjek data tertentu lagi tanpa beberapa informasi tambahan, dan dengan ketentuan bahwa informasi tambahan tersebut dipelihara secara terpisah dan tunduk pada tindakan teknis dan organisasi untuk memastikan bahwa data pribadi tidak dapat diidentifikasi kepada orang alami.

Dalam beberapa keadaan, Anda mungkin diperlukan secara hukum untuk membuat dianonimisasi atau dipseudonimisasi setiap PII dikumpulkan, diproses, atau disimpan. Meskipun konsep ini telah ada untuk beberapa waktu sekarang, GDPR/DSGVO terutama menyebutkan, dan secara khusus mendorong "pseudonimisasi".

phpMussel mampu mem-pseudonimisasi alamat IP ketika melakukan pencatatan, jika ini adalah sesuatu yang mungkin Anda butuhkan atau ingin lakukan. Ketika phpMussel mem-pseudonimkan alamat IP, saat dicatat, oktet terakhir dari alamat IPv4, dan semuanya setelah bagian kedua dari alamat IPv6 diwakili oleh "x" (efektif membulatkan alamat IPv4 ke alamat awal dari subnet ke-24 dari faktor dimana mereka dimasukkan, dan alamat IPv6 ke alamat awal dari subnet ke-32 dari faktor dimana mereka dimasukkan).

*Direktif konfigurasi yang relevan:*
- `legal` -> `pseudonymise_ip_addresses`

##### 11.3.6 STATISTIK

phpMussel secara opsional dapat melacak statistik seperti jumlah total file yang dipindai dan diblokir sejak beberapa titik waktu tertentu. Fitur ini dinonaktifkan secara default, tetapi dapat diaktifkan melalui konfigurasi paket. Fitur ini hanya melacak jumlah total kejadian yang terjadi, dan tidak termasuk informasi apapun tentang kejadian tertentu (dan dengan demikian, tidak boleh dianggap sebagai PII).

*Direktif konfigurasi yang relevan:*
- `general` -> `statistics`

##### 11.3.7 ENKRIPSI

phpMussel tidak mengenkripsi cache atau informasi log apapun. [Enkripsi](https://id.wikipedia.org/wiki/Enkripsi) cache dan log dapat diperkenalkan di masa depan, tetapi tidak ada rencana khusus untuk itu saat ini. Jika Anda khawatir tentang pihak ketiga yang tidak sah mendapatkan akses ke bagian depan dari phpMussel yang mungkin berisi PII atau informasi sensitif seperti cache atau log-nya, saya akan merekomendasikan bahwa phpMussel tidak diinstal di lokasi yang dapat diakses publik (misalnya, instal phpMussel di luar direktori `public_html` standar atau yang setara dengan yang tersedia untuk sebagian besar web server standar) dan bahwa perizinan restriktif yang tepat diberlakukan untuk direktori tempat ia tinggal (khususnya, untuk direktori vault). Jika itu tidak cukup untuk mengatasi masalah Anda, konfigurasikan phpMussel sedemikian rupa sehingga jenis informasi yang menyebabkan kekhawatiran Anda tidak akan dikumpulkan atau dicatat di tempat pertama (seperti, dengan menonaktifkan pencatatan).

#### 11.4 COOKIE

Ketika pengguna berhasil masuk ke akses bagian depan, phpMussel menetapkan [cookie](https://id.wikipedia.org/wiki/Kuki_HTTP) agar dapat mengingat pengguna untuk permintaan berikutnya (yaitu, cookie digunakan untuk mengotentikasi pengguna ke sesi masuk). Pada halaman masuk, peringatan cookie ditampilkan dengan jelas, memperingatkan pengguna bahwa cookie akan diatur jika mereka terlibat dalam tindakan yang relevan. Cookie tidak diatur dalam titik lain di basis kode.

*Direktif konfigurasi yang relevan:*
- `general` -> `disable_frontend`

#### 11.5 PEMASARAN DAN PERIKLANAN

phpMussel tidak mengumpulkan atau memproses informasi apapun untuk tujuan pemasaran atau periklanan, dan tidak menjual atau memperoleh keuntungan dari informasi yang dikumpulkan atau dicatat. phpMussel bukan perusahaan komersial, juga tidak terkait dengan kepentingan komersial, sehingga melakukan hal-hal ini tidak akan masuk akal. Ini telah terjadi sejak awal proyek, dan terus menjadi kasus hari ini. Juga, melakukan hal-hal ini akan menjadi kontra-produktif terhadap semangat dan tujuan yang dimaksudkan dari proyek secara keseluruhan, dan selama saya terus mempertahankan proyek, tidak akan pernah terjadi.

#### 11.6 KEBIJAKAN PRIVASI

Dalam beberapa keadaan, Anda mungkin diharuskan secara hukum untuk secara jelas menampilkan tautan ke kebijakan privasi Anda pada semua halaman dan bagian dari situs web Anda. Ini mungkin penting sebagai sarana untuk memastikan bahwa pengguna mendapat informasi yang jelas tentang praktik privasi Anda, jenis PII yang Anda kumpulkan, dan bagaimana Anda akan menggunakannya. Agar dapat menyertakan tautan di halaman "Upload Ditolak" phpMussel, direktif konfigurasi disediakan untuk menentukan URL ke kebijakan privasi Anda.

*Direktif konfigurasi yang relevan:*
- `legal` -> `privacy_policy`

#### 11.7 GDPR/DSGVO

Regulasi Perlindungan Data Umum (GDPR) adalah regulasi dari Uni Eropa, yang mulai berlaku pada 25 Mei 2018. Tujuan utama dari regulasi ini adalah untuk memberikan kontrol kepada warga dan penduduk negara Uni Eropa mengenai data pribadi mereka sendiri, dan untuk menyatukan regulasi di Uni Eropa terkait privasi dan data pribadi.

Regulasi ini tersebut berisi ketentuan khusus yang berkaitan dengan pemrosesan "informasi identitas pribadi" (PII) dari setiap "subjek data" (setiap orang alami yang teridentifikasi atau dapat diidentifikasi) dari atau di dalam Uni Eropa. Agar sesuai dengan regulasi, "perusahaan" atau "enterprise" (sesuai yang didefinisikan oleh regulasi), dan sistem dan proses yang relevan harus mengimplementasikan "privasi berdasarkan desain" secara default, harus menggunakan pengaturan privasi setinggi mungkin, harus mengimplementasikan pengamanan yang diperlukan untuk informasi yang disimpan atau diproses (termasuk, tetapi tidak terbatas pada, mengimplementasikan pseudonimisasi atau anonimisasi yang penuh untuk data), harus jelas dan tidak ambigu menyatakan jenis data yang mereka kumpulkan, bagaimana mereka memprosesnya, untuk alasan apa, untuk berapa lama mereka menyimpannya, dan apakah mereka membagikan data ini dengan pihak ketiga manapun, jenis data yang dibagikan dengan pihak ketiga, bagaimana, mengapa, dan sebagainya.

Data tidak dapat diproses kecuali jika ada dasar yang sah untuk melakukannya, sesuai yang didefinisikan oleh regulasi. Umumnya, ini berarti bahwa untuk memproses data data subjek secara sah, itu harus dilakukan sesuai dengan kewajiban hukum, atau dilakukan hanya setelah persetujuan eksplisit, terinformasi dengan baik, dan tidak ambigu diperoleh dari subjek data.

Karena aspek regulasi dapat berevolusi dalam waktu, untuk menghindari penyebaran informasi yang ketinggalan jaman, mungkin lebih baik untuk belajar tentang regulasi dari sumber yang berwenang, dibandingkan dengan hanya memasukkan informasi yang relevan disini dalam dokumentasi paket (yang akhirnya bisa menjadi usang seiring berkembangnya regulasi).

Beberapa sumber bacaan yang direkomendasikan untuk mempelajari informasi lebih lanjut:
- [REGULATION (EU) 2016/679 OF THE EUROPEAN PARLIAMENT AND OF THE COUNCIL](https://eur-lex.europa.eu/legal-content/EN/TXT/?uri=celex:32016R0679)
- [Regulasi Perlindungan Data](https://id.wikipedia.org/wiki/Regulasi_Perlindungan_Data)

---


Terakhir Diperbarui: 23 September 2019 (2019.09.23).
