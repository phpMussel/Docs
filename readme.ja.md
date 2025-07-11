## phpMussel v3のドキュメンテーション（日本語）。

### 目次
- １.[序文](#user-content-SECTION1)
- ２.[インストール方法](#user-content-SECTION2)
- ３.[使用方法](#user-content-SECTION3)
- ４.[PHPMUSSELの拡張](#user-content-SECTION4)
- ７.[コンフィギュレーション（設定オプション）](#user-content-SECTION5)
- ８.[シグネチャ（署名）フォーマット](#user-content-SECTION6)
- ９.[適合性問題](#user-content-SECTION7)
- １０.[よくある質問（ＦＡＱ）](#user-content-SECTION8)
- １１.[法律情報](#user-content-SECTION9)

*Regarding translations: My native language is English. Because this is a free and open-source hobby project which generates zero income, and translatable content is likely to change as the features and functionality supported by the project changes, it doesn't make sense for me to spend money for translations. Because I'm the sole author/developer/maintainer for the project and I'm not a ployglot, any translations I produce are very likely to contain errors. Sorry, but realistically, that won't ever change. If you find any such errors/typos/mistakes/etc, your assistance to correct them would be very much appreciated. Pull requests are invited and encouraged. Otherwise, if you find these errors too much to handle, just stick with the original English source. If a translation is irredeemably incomprehensible, let me know which, and I can delete it. If you're not sure how to perform pull requests, ask. I can help.*

---


### １.<a name="SECTION1"></a>序文

phpMussel（ピー・エイチ・ピー・マッスル）をご利用頂き、​ありがとうございます。​phpMusselは、​ClamAV をはじめとしたシグネチャを利用して、​システムにアップロードされるファイルを対象して、​トロイ型のウィルスやマルウェア等を検出するようデザインされたPHPスクリプトです。

[PHPMUSSEL](https://phpmussel.github.io/)著作権２０１３とＧＮＵ一般公衆ライセンスv2を超える権利について：​[Caleb M (Maikuolan)](https://github.com/Maikuolan)著。

本スクリプトはフリーウェアです。​フリーソフトウェア財団発行のＧＮＵ一般公衆ライセンス・バージョン２（またはそれ以降のバージョン）に従い、​再配布ならびに加工が可能です。​配布の目的は、​役に立つことを願ってのものですが、​『保証はなく、​また商品性や特定の目的に適合するのを示唆するものでもありません』。​『LICENSE.txt』にある『GNU General Public License』（一般ライセンス）を参照して下さい。​以下のURLからも閲覧できます：
- <https://www.gnu.org/licenses/>。
- <https://opensource.org/licenses/>。

作成のインスピレーションと本スクリプトが利用するシグネチャについて[ClamAV](https://www.clamav.net/)に感謝の意を表したいと思います。​この２つがなければ、​本スクリプトは存在しえないか、​あるいは極めて限られた利用価値しかもたないと言ってよいでしょう。

本プロジェクトファイルのホスト先であるGitHubとBitbucket、​phpMusselが利用するシグネチャの提供先である：​[PhishTank](https://www.phishtank.com/)、​[NLNetLabs](https://nlnetlabs.nl/)、​[Malware.Expert](https://malware.expert/) 他、​本プロジェクトを支援して下さった全ての方々に感謝の意を表したいと思います。

---


### ２.<a name="SECTION2"></a>インストール方法

#### 2.0 COMPOSERを使用してインストールする

phpMussel v3をインストールするには、Composerを使用することをお勧めします。

便宜上、古いメインのphpMusselリポジトリを介して、最も一般的に必要とされるphpMussel依存関係をインストールできます。

`composer require phpmussel/phpmussel`

または、実装時に必要な依存関係を個別に選択することもできます。​特定の依存関係のみを必要とし、すべてを必要としない可能性は十分にあります。

phpMusselで何かを行うには、phpMusselコア・コードベースが必要です：

`composer require phpmussel/core`

phpMusselのフロントエンド管理機能を提供します：

`composer require phpmussel/frontend`

ウェブサイトの自動ファイル・アップロード・スキャンを提供します：

`composer require phpmussel/web`

phpMusselをインタラクティブなＣＬＩモード・アプリケーションとして利用する機能を提供します：

`composer require phpmussel/cli`

phpMusselとPHPMailerの間のブリッジを提供に、phpMusselがPHPMailerを使用して二要素認証、ブロックされたファイル・アップロードに関するＥメール通知を行えるようにします、など：

`composer require phpmussel/phpmailer`

phpMusselが何かを検出できるようにするには、シグネチャをインストールする必要があります。​そのための特定のパッケージはありません。​シグネチャをインストールするには、このドキュメントの次のセクションを参照してください。

あるいは、Composerを使用したくない場合は、ここからパッケージ済みのＺＩＰをダウンロードできます。

https://github.com/phpMussel/Examples

あらかじめパッケージ化されたＺＩＰには、前述の依存関係のすべてと、標準のphpMusselシグネチャ・ファイルがすべて含まれています。​また、実装でphpMusselを使用する方法の例もいくつか含まれています。

#### <a name="INSTALLING_SIGNATURES"></a>2.1 シグネチャ・インストール

特定の脅威を検出するためには、phpMusselによってシグネチャが必要です。​シグネチャをインストールする主な方法は２つあります。

1. 「SigTool」を使用してシグネチャを生成し、手動でインストールします。
2. 「phpMussel/Signatures」または「phpMussel/Examples」からシグネチャをダウンロードし、手動でインストールします。

##### 2.1.0 「SigTool」を使用してシグネチャを生成し、手動でインストールします。

*参照：[SigToolドキュメンテーション](https://github.com/phpMussel/SigTool#documentation)。*

*また注意してください：SigToolは、ClamAVからのシグネチャのみを処理します。​phpMusselのテストサンプルの検出に必要なシグネチャ、phpMussel用に特別に記述された、などを含む他のソースからシグネチャを取得するには、このメソッドに、ここで説明する他のメソッドのいずれかを追加する必要があります。*

##### 2.1.1 「phpMussel/Signatures」または「phpMussel/Examples」からシグネチャをダウンロードし、手動でインストールします。

まず、[phpMussel/Signatures](https://github.com/phpMussel/Signatures)に行く。​リポジトリには、​さまざまなＧＺ圧縮シグネチャ・ファイルが含まれています。​それらをインストールするには、​必要なファイルをダウンロードして解凍し、​それらをインストールのシグネチャ・ディレクトリにコピーします。

あるいは、[phpMussel/Examples](https://github.com/phpMussel/Examples)から最新のＺＩＰをダウンロードします。​次に、そのアーカイブからインストールにシグネチャをコピーとペーストことができます。

---


### ３.<a name="SECTION3"></a>使用方法

#### 3.0 PHPMUSSELを設定するため

phpMusselをインストールしたら、設定できるようにコンフィギュレーション・ファイルが必要です。​phpMusselコンフィギュレーション・ファイルは、ＩＮＩファイルまたはＹＭＬファイルとしてフォーマットできます。​サンプルＺＩＰから作業している場合は、すでに二つのサンプルのコンフィギュレーション・ファイルを使用できます（`phpmussel.ini`と`phpmussel.yml`）。​必要に応じて、それらから選択できます。​サンプルＺＩＰを使用していない場合は、新しいファイルを作成する必要があります。

phpMusselのデフォルト・コンフィギュレーションに満足していて、何も変更したくない場合は、コンフィギュレーション・ファイルとして空のファイルを使用できます。​変更したいコンフィギュレーションの値を設定するだけです。​それ以外はすべてデフォルトを使用します。

phpMusselフロントエンドを使用する場合は、フロントエンド・コンフィギュレーション・ページからすべてを設定できます。​ただし、v3以降、フロントエンドのログイン情報はコンフィギュレーション・ファイルに保存されます。​そのため、フロントエンドにログインするには、アカウントを設定する必要があります。​次に、それを使用してログインし、その他すべてを設定できます。

以下の抜粋では、ユーザー名「admin」とパスワード「password」を使用して、フロントエンドに新しいアカウントを追加します。

ＩＮＩファイルの場合：

```INI
[user.admin]
password='$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK'
permissions='1'
```

ＹＭＬファイルの場合：

```YAML
user.admin:
 password: "$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK"
 permissions: 1
```

コンフィギュレーションには任意の名前を付けることができます（拡張子を維持する限り、phpMusselはコンフィギュレーション・ファイルが使用するフォーマットを認識できるようにするため）。​どこにでも保存できます。​ローダーをインスタンス化するときにパスを指定することにより、phpMusselにコンフィギュレーション・ファイルの場所を伝えることができます。​パスが指定されていない場合、phpMusselは「vendor」ディレクトリの親の中でパスを見つけようとします。

Apacheなどの環境では、コンフィギュレーションの前にドットを配置してそれを非表示にし、パブリック・アクセスを禁止することもできます。

phpMusselで使用できるさまざまなコンフィギュレーション・ディレクティブの詳細については、このドキュメントのコンフィギュレーション・セクションを参照してください。

#### 3.1 PHPMUSSEL CORE

phpMusselの使用方法に関係なく、ほとんどすべての実装には、少なくとも次のようなものが含まれます：

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
```

ローダー「Loader」は、phpMusselを使用するための基本的な必要性の準備を担当します。​スキャナー「Scanner」は、すべての中核的なスキャン機能を担当します。

ローダーのコンストラクターは五つのパラメーターを受け入れます（すべてオプションです）。

```PHP
public function __construct(
    string $ConfigurationPath = '',
    string $CachePath = '',
    string $QuarantinePath = '',
    string $SignaturesPath = '',
    string $VendorPath = ''
)
```

パラメータ１は、コンフィグレーション・ファイルへの完全なパスです。​省略した場合、phpMusselは「vendor」ディレクトリの親の中「phpmussel.ini」または「phpmussel.yml」という名前のコンフィグレーション・ファイルを探します。

パラメータ２は、phpMusselがキャッシュと一時ファイルの保存に使用することを許可するディレクトリへのパスです。​省略した場合、phpMusselは「vendor」ディレクトリの親の中「phpmussel-cache」という名前の、使用する新しいディレクトリを作成しようとします。​このパスを自分で指定する場合は、空ディレクトリを選択することをお勧めします（指定したディレクトリにある他のデータが不要に失われるのを防ぐためです）。

パラメータ３は、phpMusselが検疫に使用することを許可するディレクトリへのパスです。​省略した場合、phpMusselは「vendor」ディレクトリの親の中「phpmussel-quarantine」という名前の、使用する新しいディレクトリを作成しようとします。​このパスを自分で指定する場合は、空ディレクトリを選択することをお勧めします（指定したディレクトリにある他のデータが不要に失われるのを防ぐためです）。​検疫に使用するディレクトリへのパブリックアクセスを禁止することを強くお勧めします。

パラメータ４は、phpMusselシグネチャ・ファイルを含むディレクトリへのパスです。​省略した場合、phpMusselは「vendor」ディレクトリの親の中「phpmussel-signatures」という名前のディレクトリでシグネチャ・ファイルを探します。

パラメータ５は、「vendor」ディレクトリへのパスです。​それは他のものを指すべきではありません。​省略した場合、phpMusselはこのディレクトリを自動的に見つけようとします。​このパラメーターは、通常のComposerプロジェクトと必ずしも同じ構造ではない可能性がある実装との統合を容易にするために提供されています。

スキャナーのコンストラクターは１つのパラメーターのみを受け入れます（それが必須です）：インスタンス化されたローダーオブジェクト。​参照渡しされるため、ローダーは変数にインスタンス化する必要があります（ローダーをスキャナーのパラメーターに直接インスタンス化することは、phpMusselを使用する正しい方法ではありません）。

```PHP
public function __construct(\phpMussel\Core\Loader &$Loader)
```

#### 3.2 自動ファイル・アップロード・スキャン

アップロード・ハンドラをインスタンス化するには：

```PHP
$Web = new \phpMussel\Web\Web($Loader, $Scanner);
```

ファイルのアップロードをスキャンするには：

```PHP
$Web->scan();
```

必要に応じて、phpMusselはオプションで、何か問題が発生した場合にアップロードの名前を修復することができます：

```PHP
$Web->demojibakefier();
```

完全な例として：

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

*ファイル`ascii_standard_testfile.txt`をアップロードしようとしています（これは、phpMusselのテストのみを目的として提供されている無害なサンプルです）：*

![スクリーンショット](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/web-v3.0.0-alpha2.png)

#### 3.3 ＣＬＩモード

ＣＬＩハンドラーをインスタンス化するには：

```PHP
$CLI = new \phpMussel\CLI\CLI($Loader, $Scanner);
```

完全な例として：

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

*スクリーンショット：*

![スクリーンショット](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/cli-v3.5.0.png)

#### 3.4 フロントエンド

フロントエンドをインスタンス化するには：

```PHP
$FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
```

完全な例として：

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

*スクリーンショット：*

![スクリーンショット](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/frontend-v3.4.0.png)

#### 3.5 スキャナーＡＰＩ

必要に応じて、他のプログラムやスクリプト内にphpMusselスキャナーＡＰＩを実装することもできます。

完全な例として：

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

その例から注意すべき重要な部分は、`scan()`メソッドです。 `scan()`メソッドは二つのパラメーターを受け入れます。

```PHP
public function scan(mixed $Files, int $Format = 0): mixed
```

最初のパラメーターは文字列または配列で、スキャナーにスキャン対象を指示します。​特定のファイルまたはディレクトリを示す文字列、または複数のファイル/ディレクトリを指定するためのそのような文字列の配列です。

文字列の場合は、データが見つかる場所を指す必要があります。​配列の場合、配列キーはスキャンするアイテムの元の名前を示し、値はデータが見つかる場所を指す必要があります。

二番目のパラメーターは整数で、スキャナーにスキャン結果を返す方法を指示します。

整数としてスキャンされた各アイテムのスキャン結果を配列として返すには、「1」を指定します。

これらの整数には次の意味があります。

結果 | 説明
--:|:--
-5 | 他の理由でスキャンが完了しませんでした。
-4 | 暗号化のため、データをスキャンできませんでした。
-3 | phpMusselシグネチャ・ファイルで問題が発生したことを示します。
​-2 | スキャン中に破損データを検出したためスキャン失敗。
-1 | ＰＨＰがスキャンに必要な拡張子あるいはアドオンがないためにスキャン失敗。
0 | スキャンの対象が存在しないこと。
​1 | 対象のスキャンを完了しかつ問題がないこと。
​2 | 対象のスキャンを完了しかつ問題を検出したことを意味します。

スキャン結果をブール値として返すには、「2」を指定します。

結果 | 説明
:-:|:--
`true` | 問題が検出されました（スキャン・ターゲットが不良/危険です）。
`false` | 問題は検出されませんでした（スキャン・ターゲットはおそらく問題ありません）。

人間が読めるテキストとしてスキャンされた各アイテムのスキャン結果を配列として返すには、「3」を指定します。

*出力例：*

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

スキャン結果を人間が読めるテキストの文字列として返すには、「4」を指定します（これは「3」に似ていますが、内破されています）。

*出力例：*

```
Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)! Detected phpMussel-Testfile.CoEx (coex_testfile.rtf)! Detected encrypted archive; Encrypted archives not permitted (encrypted.zip)!
```

書式付きテキストとして返すには、他の値を指定します（i.e., the scan results seen when using CLI）。

*出力例：*

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

*また見てください： [ファイルのスキャン時に特定の詳細情報にアクセスするにはどうすればよいですか？](#user-content-SCAN_DEBUGGING)*

#### 3.6 ２ＦＡ（二要素認証）

２ＦＡ「二要素認証」を有効にすることで、フロントエンドをより安全にすることができます。​２ＦＡを使用するアカウントにログインすると、そのアカウントに関連付けられた電子Ｅメール・アドレスに電子Ｅメールが送信されます。​このＥメールには「２ＦＡコード」が含まれています。​このアカウントを使用してログインできるように、ユーザーはこの２ＦＡコードとユーザー名とパスワードを入力する必要があります。​つまり、アカウントのパスワードでは、ハッカーや潜在的な攻撃者がそのアカウントにログインするのに十分ではありません。​セッションに関連付けられた２ＦＡコードを受信して利用するには、そのアカウントに関連付けられた電子Ｅメールアドレスにアクセスする必要があります。

PHPMailerをインストールしたら、phpMusselコンフィギュレーション・ページまたはコンフィギュレーション・ファイルを使用して、PHPMailerのコンフィギュレーション・ディレクティブを設定する必要があります。​これらのコンフィギュレーション・ディレクティブの詳細については、このドキュメントのコンフィギュレーション・セクションに記載されています。​PHPMailerコンフィギュレーション・ディレクティブを設定したら、`enable_two_factor`を`true`に設定します。​２ＦＡが有効にされている。

次に、phpMusselがそのアカウントでログインする際に２ＦＡコードを送信する場所を知るように、電子Ｅメール・アドレスをアカウントに関連付ける必要があります。​これを行うには、電子Ｅメール・アドレスをアカウントのユーザー名として使用する（例えば、`foo@bar.tld`）か、電子Ｅメール・アドレスを通常どおり電子Ｅメールを送信する場合と同じ方法でユーザー名の一部として含めます（例えば、`Foo Bar <foo@bar.tld>`）。

---


### ４.<a name="SECTION4"></a>PHPMUSSELの拡張

phpMusselは拡張性を考慮して設計されています。​phpMussel組織の任意のリポジトリへのプル・リクエスト、および一般的な[貢献](https://github.com/phpMussel/.github/blob/master/CONTRIBUTING.md)はいつでも歓迎します。​必要に応じて、独自のニーズに合わせてphpMusselを変更または拡張することもできます​（例えば、特定の実装に固有のもの、公開できないもの、または独自のリポジトリに適したものがある場合、プラグイン、またはphpMusselを必要とする新しいComposerパッケージ、など）。

ｖ３以降、すべてのphpMussel機能はクラスとして存在します。​つまり、ＰＨＰが提供する[オブジェクト継承](https://www.php.net/manual/ja/language.oop5.inheritance.php)メカニズムが、phpMusselを拡張するための簡単で適切な方法である場合があります。

phpMusselは、拡張性のための独自のメカニズムも提供します。​ｖ３より前は、推奨されるメカニズムはphpMusselの統合プラグイン・システムでした。​ｖ３以降、推奨されるメカニズムはイベント・オーケストレーターです。

phpMusselを拡張し、新しいプラグインを作成するためのボイラープレート・コードは、[ボイラープレート・リポジトリ](https://github.com/phpMussel/plugin-boilerplates)で公開されています。​また、[現在サポートされているすべてのイベントのリスト](https://github.com/phpMussel/plugin-boilerplates/tree/master/boilerplate-v3#currently-supported-events)と、ボイラープレート・コードの使用方法に関する詳細な手順も含まれています。

ｖ３ボイラープレート・コードの構造は、さまざまなphpMussel v3リポジトリの構造と同じです。​それは偶然ではありません。​可能な限り、拡張性の目的でｖ３ボイラープレート・コードを利用し、phpMussel v3自体と同様の設計原則を利用することをお勧めします。​新しい拡張機能またはプラグインを公開することを選択した場合、Composerサポートを統合できます。​そうすれば、phpMussel v3自体とまったく同じ方法で拡張機能やプラグインを利用できるようになります、他のComposer依存関係と一緒にそれを必要とし、実装時に必要なイベント・ハンドラーを適用するだけです​（もちろん、パブリケーションに指示を含めることを忘れないでください。​そうすることで、存在する可能性のある必要なイベント・ハンドラーや、パブリケーションの正しいインストールと利用に必要となる可能性のあるその他の情報を他の人が知ることができます）。

---


### ７.<a name="SECTION5"></a>コンフィギュレーション（設定オプション）

以下は、phpMusselが受け入れるコンフィグレーション・ディレクティブのリストです、ならびにその目的と機能のリストです。

```
コンフィギュレーション (v3)
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

#### "core" （カテゴリ）
全般的な設定（他のカテゴリに属さないの設定）。

##### "scan_log" `[string]`
- 全スキャニング結果を記録するファイルのファイル名。​ファイル名指定するか、無効にしたい場合は空白のままにして下さい。

役に立つヒント:時刻形式のプレースホルダーを使用して、ログ・ファイルの名前に日付/時刻情報を添付できます。​使用可能な時刻形式のプレースホルダーが<a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>に表示されます。

##### "scan_log_serialized" `[string]`
- 全スキャニング結果を記録するファイルのファイル名（シリアル化形式を利用）。​ファイル名指定するか、無効にしたい場合は空白のままにして下さい。

役に立つヒント:時刻形式のプレースホルダーを使用して、ログ・ファイルの名前に日付/時刻情報を添付できます。​使用可能な時刻形式のプレースホルダーが<a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>に表示されます。

##### "error_log" `[string]`
- 検出された致命的でないエラーを記録するためのファイル。​ファイル名指定するか、無効にしたい場合は空白のままにして下さい。

役に立つヒント:時刻形式のプレースホルダーを使用して、ログ・ファイルの名前に日付/時刻情報を添付できます。​使用可能な時刻形式のプレースホルダーが<a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>に表示されます。

##### "outbound_request_log" `[string]`
- アウトバウンド要求の結果を記録するためのファイル。​ファイル名指定するか、無効にしたい場合は空白のままにして下さい。

役に立つヒント:時刻形式のプレースホルダーを使用して、ログ・ファイルの名前に日付/時刻情報を添付できます。​使用可能な時刻形式のプレースホルダーが<a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>に表示されます。

##### "truncate" `[string]`
- ログ・ファイルが一定のサイズに達したら切り詰めますか？​値は、ログ・ファイルが切り捨てられる前に大きくなる可能性があるＢ/ＫＢ/ＭＢ/ＧＢ/ＴＢ単位の最大サイズです。​デフォルト値の０ＫＢは切り捨てを無効にします （ログ・ファイルは無期限に拡張できます）。​注：個々のログ・ファイルに適用されます。​ログ・ファイルのサイズは一括して考慮されません。

##### "log_rotation_limit" `[int]`
- ログ・ローテーションは、一度に存在する必要があるログ・ファイルの数を制限します。​新しいログ・ファイルが作成されると、ログ・ファイルの総数が指定された制限を超えると、指定されたアクションが実行されます。​ここで希望の制限を指定することができます。​値「0」は、ログ・ローテーションを無効にします。

##### "log_rotation_action" `[string]`
- ログ・ローテーションは、一度に存在する必要があるログ・ファイルの数を制限します。​新しいログ・ファイルが作成されると、ログ・ファイルの総数が指定された制限を超えると、指定されたアクションが実行されます。​ここで希望のアクションを指定できます。

```
log_rotation_action
├─Delete ("最も古いログ・ファイルを削除して、制限を超過しないようにします。")
└─Archive ("最初にアーカイブしてから、最も古いログ・ファイルを削除して、制限を超過しないようにします。")
```

##### "timezone" `[string]`
- 使用するタイムゾーンを指定します​（例えば、「Africa/Cairo」、「America/New_York」、「Asia/Tokyo」、「Australia/Perth」、「Europe/Berlin」、「Pacific/Guam」、等）。​「SYSTEM」を指定すると、ＰＨＰがこれを自動的に処理します。

```
timezone
├─SYSTEM ("システムのデフォルトタイムゾーンを使用します。")
├─UTC ("UTC")
└─…その他
```

##### "time_offset" `[int]`
- タイムゾーン・オフセット（分）。

##### "time_format" `[string]`
- phpMusselで使用される日付表記形式。​追加のオプションがリクエストに応じて追加される場合があります。

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
└─…その他
```

__*プレースホルダー – 説明 – 例は2024-04-30T18:27:49+08:00に基づいています。*__<br />
`{yyyy}` – 年 – 例えば、2024。<br />
`{yy}` – 短縮年 – 例えば、24。<br />
`{Mon}` – 月の略称（英語） – 例えば、Apr。<br />
`{mm}` – 先頭にゼロが付いた月 – 例えば、04。<br />
`{m}` – 月 – 例えば、4。<br />
`{Day}` – 曜日の略称（英語） – 例えば、Tue。<br />
`{dd}` – 先頭にゼロが付いた日 – 例えば、30。<br />
`{d}` – 日 – 例えば、30。<br />
`{hh}` – 先頭にゼロが付いた時間（24時間制を使用） – 例えば、18。<br />
`{h}` – 時間（24時間制を使用） – 例えば、18。<br />
`{ii}` – 先頭にゼロが付いた分 – 例えば、27。<br />
`{i}` – 分 – 例えば、27。<br />
`{ss}` – 先頭にゼロが付いた秒 – 例えば、49。<br />
`{s}` – 秒 – 例えば、49。<br />
`{tz}` – タイムゾーン（コロンなし） – 例えば、+0800。<br />
`{t:z}` – タイムゾーン（コロン付き） – 例えば、+08:00。

##### "ipaddr" `[string]`
- 接続リクエストのＩＰアドレスをどこで見つけるべきかについて（Cloudflareなどのサービスに役立ちます）。 Default/デフォルルト = REMOTE_ADDR。​注意：あなたが何をしているのか、分からない限り、これを変更しないでください。

```
ipaddr
├─HTTP_INCAP_CLIENT_IP ("HTTP_INCAP_CLIENT_IP (Incapsula)")
├─HTTP_CF_CONNECTING_IP ("HTTP_CF_CONNECTING_IP (Cloudflare)")
├─CF-Connecting-IP ("CF-Connecting-IP (Cloudflare)")
├─HTTP_X_FORWARDED_FOR ("HTTP_X_FORWARDED_FOR (Cloudbric)")
├─X-Forwarded-For ("X-Forwarded-For (Squid)")
├─Forwarded ("Forwarded")
├─REMOTE_ADDR ("REMOTE_ADDR (デフォルト)")
└─…その他
```

参照してください：
- [NGINX Reverse Proxy](https://docs.nginx.com/nginx/admin-guide/web-server/reverse-proxy/)
- [Squid configuration directive forwarded_for](http://www.squid-cache.org/Doc/config/forwarded_for/)
- [Forwarded - HTTP \| MDN](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Forwarded)

##### "delete_on_sight" `[bool]`
- このディレクティブを有効にすると、検知基準（シグネチャでも何でも）にあったアップロードファイルは直ちに削除されます。​クリーンと判断されたファイルはそのままです。​アーカイブの場合、問題のファイルが一部であってもアーカイブ全てが削除の対象となります。​アップロードファイルのスキャンにおいては、本ディレクティブを有効にすることは必須ではありません。​なぜならＰＨＰはスクリプト実行後に自動的にキャッシュの内容を破棄するからです。​言い換えれば、ファイルが移動されたか、コピーされたか、削除されない限り、ＰＨＰはサーバーにアップロードしたファイルを残しておくことは通常ありません。​このディレクティブはセキュリティーに念を入れる目的で設置されています。​ＰＨＰは稀に予測外の振る舞いをすることがあるからです。​False（偽） = スキャニング後、ファイルはそのまま（デフォルト設定）。​True（真） = スキャニング後、クリーンでなければ直ちに削除。

##### "lang" `[string]`
- phpMusselのデフォルト言語を設定します。

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
- 可能な限り「HTTP_ACCEPT_LANGUAGE」に従ってローカライズしますか？ True = はい（Default/デフォルルト）。 False = いいえ。

##### "scan_cache_expiry" `[int]`
- phpMusselはスキャニング結果をどれくらいの期間キャッシュすべきか？​秒単位で、デフォルトは２１，６００秒（６時間）となっています。​０にするとキャッシュ無効になります。

##### "maintenance_mode" `[bool]`
- メンテナンス・モードを有効にしますか？ True = はい。 False = いいえ（Default/デフォルルト）。​フロントエンド以外のすべてを無効にします。​ＣＭＳ、フレームワークなどを更新するときに便利です。

##### "statistics" `[bool]`
- phpMussel使用統計を追跡しますか？ True = はい。 False = いいえ（Default/デフォルルト）。

##### "hide_version" `[bool]`
- ログとページ出力からバージョン情報を隠すか？ True = はい。 False = いいえ（Default/デフォルルト）。

##### "disabled_channels" `[string]`
- これは、要求を送信するときにphpMusselが特定のチャネルを使用しないようにするために使用できます。

```
disabled_channels
├─GitHub ("GitHub")
├─BitBucket ("BitBucket")
├─VirusTotal_HTTPS ("VirusTotal (HTTPS)")
└─VirusTotal_HTTP ("VirusTotal (HTTP)")
```

##### "request_proxy" `[string]`
- 送信リクエストをプロキシ経由で送信したい場合は、ここでそのプロキシを指定します。​そうでない場合は、空白のままにします。

##### "request_proxyauth" `[string]`
- プロキシ経由で送信リクエストを送信する場合、そのプロキシでユーザー名とパスワードが必要な場合は、ここでユーザー名とパスワードを指定します（例えば、`user:pass`）。​そうでない場合は、空白のままにします。

##### "default_timeout" `[int]`
- 外部リクエストに使用するデフォルトのタイムアウト？ Default/デフォルルト = １２秒。

#### "signatures" （カテゴリ）
シグネチャ、シグネチャ・ファイル、などのコンフィギュレーション。

##### "active" `[string]`
- カンマで区切られたアクティブなシグネチャ・ファイルのリスト。​注意：シグネチャ・ファイルは、アクティブ化する前に、まず、インストールする必要があります。​テスト・ファイルを正しく機能するには、シグネチャ・ファイルを、まず、インストールしてアクティブ化する必要があります。

##### "fail_silently" `[bool]`
- シグネチャ・ファイルがない、あるいは破損している場合に、phpMusselがそれをリポートすべきか否か？​`fail_silently`が無効ならば、問題はリポートされ、有効であれば、問題は無視されたスキャニングレポートが作成されます。​クラッシュするというような害がなければ、デフォルト設定のままにしておくべきです。​False（偽） = Disabled/無効; True（真） = Enabled/有効 （Default/デフォルト）。

##### "fail_extensions_silently" `[bool]`
- 拡張子がない場合にphpMusselがそれをレポートすべきか否か？​`fail_extensions_silently`が無効の場合、拡張子なしはスキャニング時にレポートされ、有効の場合は無視され問題は報告されません。​このディレクティブを無効にすることは、セキュリティーを向上させるかもしれませんが、誤検出も増加する恐れがあります。​False（偽） = Disabled/無効; True（真） = Enabled/有効（Default/デフォルト）。

##### "detect_adware" `[bool]`
- phpMusselはアドウェア検出のためにシグネチャを分析すべきか否か？​False（偽） = いいえ；​True（真） = はい（Default/デフォルト）。

##### "detect_joke_hoax" `[bool]`
- phpMusselは悪戯/偽造やマルウェア/ウィルス検出のためにシグネチャを分析すべきか否か？​False（偽） = いいえ；​True（真） = はい（Default/デフォルト）。

##### "detect_pua_pup" `[bool]`
- phpMusselはＰＵＡ/ＰＵＰ検出のためにシグネチャを分析すべきか否か？​False（偽） = いいえ；​True（真） = はい（Default/デフォルト）。

##### "detect_packer_packed" `[bool]`
- phpMusselはパッカーやパックデータ検出のためにシグネチャを分析すべきか否か？​False（偽） = いいえ；​True（真） = はい（Default/デフォルト）。

##### "detect_shell" `[bool]`
- phpMusselはshellスクリプト検出のためにシグネチャを分析すべきか否か？​False（偽） = いいえ；​True（真） = はい（Default/デフォルト）。

##### "detect_deface" `[bool]`
- phpMusselは改ざんやディフェーサー検出のためにシグネチャを分析すべきか否か？​False（偽） = いいえ；​True（真） = はい（Default/デフォルト）。

##### "detect_encryption" `[bool]`
- phpMusselは暗号化ファイルを検出してブロックする必要がありますか？​False（偽） = いいえ；​True（真） = はい（Default/デフォルト）。

##### "heuristic_threshold" `[int]`
- phpMusselには、このファイルは疑わしく危険性が高いと判断するシグネチャがあります。​しきい値は、アップロードされているファイルの危険性の最大値であり、これを超えるとマルウェアと判断されます。​ここにおける危険性の定義とは、疑わしいと特定されたものの総数です。​デフォルトでは３に設定されています。​これより低いと誤検出の可能性が増え、大きすぎると、誤検出は減るものの危険性のあるファイルが検出されない可能性が増加してしまいます。​特に問題がなければ、デフォルト値のままにしておくことお勧めします。

#### "files" （カテゴリ）
スキャン時にファイルを処理する方法の詳細。

##### "filesize_limit" `[string]`
- ファイルサイズ上限の単位はＫＢです。​６５５３６＝６４ＭＢ（Default/デフォルト）；​0 = リミットしません（上限なし、常にグレイリスト化）、正の数値であれば何でも構いません。​ＰＨＰの設定でメモリーに制限があったり、アップロードファイルサイズの上限が設定されている場合に有効的です。

##### "filesize_response" `[bool]`
- 上限サイズを超えるファイルをどう処理するかについてです。​False（偽）=ホワイトリストして「Whitelist」。True（真）=ブラックリストして「Blacklist」（Default/デフォルト）。

##### "filetype_whitelist" `[string]`
- ファイルタイプ・ホワイトリスト:

__これがどのように機能する。__ システムが特定タイプのファイルのみアップロードを許可する、あるいは拒絶する場合は、ファイルタイプを適切にホワイトリスト、ブラックリスト、グレーリストにて分類しておくと、ファイルタイプによって弾かれるファイルはスキャンをスキップできるため、スピードアップに繋がります。​フォーマットはＣＳＶ（カンマ区切り）です。

__プロセスの論理的順序。__ ファイルタイプがホワイトリストに記載されていれば、スキャンせず、ブロックせず、ブラックリストおよびグレイリストに対してチェックを行いません。​ファイルタイプがブラックリストに記載されていれば、スキャンすることなく、直ちににブロックし、グレーリストに対してチェックを行いません。​グレーリストが空、あるいはグレーリストが空でなくかつそのファイルタイプがあれば、通常通りスキャンしブロックするか否かを判断します。​グレーリストが空でなくかつそのファイルタイプが含まれていなければ、ブラックリストと同様の扱いをすることになり、スキャンなしにブロックします。

##### "filetype_blacklist" `[string]`
- ファイルタイプ・ブラックリスト:

__これがどのように機能する。__ システムが特定タイプのファイルのみアップロードを許可する、あるいは拒絶する場合は、ファイルタイプを適切にホワイトリスト、ブラックリスト、グレーリストにて分類しておくと、ファイルタイプによって弾かれるファイルはスキャンをスキップできるため、スピードアップに繋がります。​フォーマットはＣＳＶ（カンマ区切り）です。

__プロセスの論理的順序。__ ファイルタイプがホワイトリストに記載されていれば、スキャンせず、ブロックせず、ブラックリストおよびグレイリストに対してチェックを行いません。​ファイルタイプがブラックリストに記載されていれば、スキャンすることなく、直ちににブロックし、グレーリストに対してチェックを行いません。​グレーリストが空、あるいはグレーリストが空でなくかつそのファイルタイプがあれば、通常通りスキャンしブロックするか否かを判断します。​グレーリストが空でなくかつそのファイルタイプが含まれていなければ、ブラックリストと同様の扱いをすることになり、スキャンなしにブロックします。

##### "filetype_greylist" `[string]`
- ファイルタイプ・グレーリスト:

__これがどのように機能する。__ システムが特定タイプのファイルのみアップロードを許可する、あるいは拒絶する場合は、ファイルタイプを適切にホワイトリスト、ブラックリスト、グレーリストにて分類しておくと、ファイルタイプによって弾かれるファイルはスキャンをスキップできるため、スピードアップに繋がります。​フォーマットはＣＳＶ（カンマ区切り）です。

__プロセスの論理的順序。__ ファイルタイプがホワイトリストに記載されていれば、スキャンせず、ブロックせず、ブラックリストおよびグレイリストに対してチェックを行いません。​ファイルタイプがブラックリストに記載されていれば、スキャンすることなく、直ちににブロックし、グレーリストに対してチェックを行いません。​グレーリストが空、あるいはグレーリストが空でなくかつそのファイルタイプがあれば、通常通りスキャンしブロックするか否かを判断します。​グレーリストが空でなくかつそのファイルタイプが含まれていなければ、ブラックリストと同様の扱いをすることになり、スキャンなしにブロックします。

##### "check_archives" `[bool]`
- アーカイブのコンテンツに対してチェックを試みるか否かについてです。 False（偽） = チェックしない; True（真） = チェックする（Default/デフォルト）。 Ｚｉｐ（ｌｉｂｚｉｐが必要です）、Ｔａｒ、Ｒａｒ（ｒａｒ拡張が必要です）をサポートされています。

##### "filesize_archives" `[bool]`
- ファイルサイズのブラックリスト化/ホワイトリスト化をアーカイブのコンテンツに持ち込むか否か？​False = いいえ（ただグレーリストすべて）; True = はい 「Default/デフォルト設定」。

##### "filetype_archives" `[bool]`
- ファイルタイプのブラックリスト化/ホワイトリスト化をアーカイブのコンテンツに持ち込むか否か？​False = いいえ（ただグレーリストすべて） 「Default/デフォルト設定」; True = はい。

##### "max_recursion" `[int]`
- アーカイブに対する最大再帰深さです。​デフォルト＝３。

##### "block_encrypted_archives" `[bool]`
- 暗号化されたアーカイブを検出しブロックするか否か？​phpMusselは暗号化されたアーカイブをスキャンすることはできないので、アーカイブの暗号化によってphpMussel、アンチウィルススキャナー等をかいくぐろうとする攻撃者がいるかもしれません。​暗号化されたアーカイブをブロックすることにより、このようなリスクを回避することができます。​False（偽） = いいえ；​True（真） = はい（Default/デフォルト）。

##### "max_files_in_archives" `[int]`
- スキャンを中止する前にアーカイブ内からスキャンするファイルの最大数。​デフォルト＝０（上限なし）。

##### "chameleon_from_php" `[bool]`
- ファイルでもなくＰＨＰアーカイブとも認識できないファイル中のＰＨＰヘッダーを探します。 False（偽） = オフ。 True（真） = オン。

##### "can_contain_php_file_extensions" `[string]`
- カンマで区切られたＰＨＰコードを含むことができるファイル拡張子のリスト。​ＰＨＰカメレオン攻撃検出が有効になっている場合、このリストにない拡張子を持つＰＨＰコードを含むファイルは、ＰＨＰカメレオン攻撃として検出されます。

##### "chameleon_from_exe" `[bool]`
- 実行ファイルでもなく実行ファイルのアーカイブとも認識できないファイル中の実行ヘッダーや不正なヘッダーの実行ファイルを探します。 False（偽） = オフ。 True（真） = オン。

##### "chameleon_to_archive" `[bool]`
- ヘッダーが正しくないアーカイブを探します（ＢＺ/ＢＺＩＰ２、ＧＺ/ＧＺＩＰ、ＬＺＦ、ＲＡＲ、ＺＩＰをサポートされています）。 False（偽） = オフ。 True（真） = オン。

##### "chameleon_to_doc" `[bool]`
- ヘッダーが正しくないオフィスドキュメントを探します（ＤＯＣ、ＤＯＴ、ＰＰＳ、ＰＰＴ、ＸＬＡ、ＸＬＳ、ＷＩＺをサポートされています）。 False（偽） = オフ。 True（真） = オン。

##### "chameleon_to_img" `[bool]`
- ヘッダーが正しくない画像ファイルを探します（ＢＭＰ、ＤＩＢ、ＰＮＧ、ＧＩＦ、ＪＰＥＧ、ＪＰＧ、ＸＣＦ、ＰＳＤ、ＰＤＤ、ＷＥＢＰをサポートされています）。 False（偽） = オフ。 True（真） = オン。

##### "chameleon_to_pdf" `[bool]`
- ヘッダーが正しくないPDFファイルを探します。 False（偽） = オフ。 True（真） = オン。

##### "archive_file_extensions" `[string]`
- 認識可能なアーカイブファイルエクステンションです（フォーマットはCSV；問題があった場合にのみ追加あるいは取り除くべきです。​不用意に取り除くと誤検出の原因となる可能性があります。​反対に不用意に追加すると、アタックースペシフィック検出から追加したものをホワイトリスト化してしまいます。​充分に注意に上、変更して下さい。​なお、コンテントレベルにおいてアーカイブを分析することが出来るか否かには影響しません）。​デフォルトでは最も一般なフォーマットをリストしていますが、意図的に包括的にはしていません。

##### "block_control_characters" `[bool]`
- 制御文字を含んだファイルをブロックするか否か（改行以外）？​もし、テキストのみをアップロードするなら、このオプションを有効にして、さらにプロテクションを強化できます。​テキスト以外もアップロード対象であれば、有効にすると誤検出の原因になりえます。​False（偽） = ブロックしない（Default/デフォルト）；​True（真） = ブロックする。

##### "corrupted_exe" `[bool]`
- 破損ファイルとエラー解析。​False（偽） = 無視する；​True（真） = ブロックする（Default/デフォルト）。​破損の可能性があるPEファイルをブロックし検出するか否か？​についてです。​PEファイルの一部が破損し、正しく分析できないことは珍しくなく、ウィルス感染をみるバロメーターになります。​PEファイル内のウィルスを検出するアンチウィルスプログラムは、PEファイルの解析を行いますが、ウィルスを作る側では、ウィルスが検出されないようそれを避けようとするものだからです。

##### "decode_threshold" `[string]`
- デコード・コマンドが検出されるべき生データの長さの制限（スキャニング中に顕著な問題がある場合に必要に応じて設定）。​デフォルト＝５１２ＫＢ。​ゼロあるいは値なし（null）はしきい値を無効化します（ファイルサイズによる制限を取り除きます）。

##### "scannable_threshold" `[string]`
- phpMusselが読みスキャンしてよい生データの長さの制限（スキャニング中に顕著な問題がある場合に必要に応じて設定）。​デフォルト＝３２ＭＢ。​ゼロあるいは値なし（null）はしきい値を無効化します。​値は、サーバーやウェブサイトでアップロードされるファイルの平均ファイルサイズより大きく、filesize_limitディレクティブより小さく設定すべきです。​また"php.ini"設定によってPHPに割り当てられたメモリーのおおよそ5分の１を超えるべきではありません。​このディレクティブはphpMusselがメモリーを使い過ぎないようにするためのものです。​（一定のサイズ以上のファイルはスキャンできなくなることもあります）。

##### "allow_leading_trailing_dots" `[bool]`
- ファイル名に先頭と末尾のドットを使用できますか？​これは、ファイルを隠すためや、ディレクトリ・トラバーサルを許可するようにシステムを騙すために使用されることがあります。​False（偽）=許可しない（Default/デフォルト）。True（真）=許可します。

##### "block_macros" `[bool]`
- マクロを含むファイルをブロックしようとしていますか？​ドキュメントやスプレッドシートには実行可能なマクロが含まれている可能性があります。​False（偽） = ブロックしない（Default/デフォルト）；​True（真） = ブロックする。

##### "only_allow_images" `[bool]`
- Trueに設定した場合、スキャナーで検出された非画像ファイルには、スキャンされずに、直ちにマークされます。​これは、場合によっては、スキャンの完了に必要な時間を短縮するのに役立ちます。​デフォルトではfalseに設定されています。

##### "entropy_limit" `[float]`
- 正規化されたデータを使用するシグネチャのエントロピー制限（デフォルトは、「7.7」です）。​この文脈では、エントロピーはスキャンされるファイルの内容のシャノン・エントロピーとして定義されます。​エントロピー制限とエントロピー・ファイル・サイズ制限の両方を超えた場合、誤検知のリスクを減らすために、正規化されたデータを使用する一部のシグネチャは無視されます。

##### "entropy_filesize_limit" `[string]`
- 正規化されたデータを使用するシグネチャのエントロピー・ファイル・サイズの制限（デフォルトは、「256KB」です）。​エントロピー制限とエントロピー・ファイル・サイズ制限の両方を超えた場合、誤検知のリスクを減らすために、正規化されたデータを使用する一部のシグネチャは無視されます。

#### "quarantine" （カテゴリ）
検疫のコンフィギュレーション。

##### "quarantine_key" `[string]`
- phpMusselは、必要とあれば、ブロックされたファイルのアップロードを検疫することができます。​一般的なphpMusselのユーザーは、ウェブサイトやホスティング環境の保護ができれば充分と考えており、フラグ付のようなものにさらなる分析を加えようまでの要求はないようですので、無効で構いません。​ですが詳細に分析してマルウェアに備えたいユーザーは有効にすると良いでしょう。​フラグ付ファイルのアップロードの検疫は誤検出のデバッグに役立つことがあります。​検疫機能を無効にするには、`quarantine_key`ディレクティブを空にしておくか、空でない場合はディレクティブ内のコンテンツを消去して下さい。​有効にするには、デイレクティブに何らかの値を入れて下さい。​`quarantine_key`は検疫機能における重要なセキュリティー要素であり、検疫機能内に保存されたデータの執行を各種の攻撃から守っています。​`quarantine_key`はパスワードと同様に考えて下さい。​長い方がより安全と言えます。​最も効果的な使用法は`delete_on_sight`との併用です。

##### "quarantine_max_filesize" `[string]`
- 検疫されるファイルサイズの上限。​この値より大きなファイルは検疫されません。​クオランティンの容量を超える異常に大きなファイルサイズによる攻撃で、メモリーが無駄に消費されるのを防ぐ意味で重要です。​デフォルト設定は２ＭＢです。

##### "quarantine_max_usage" `[string]`
- 検疫のために利用する最大メモリー量。​全メモリー量が使用されると、この範囲内に収まるよう古いファイルが削除の対象となります。​クオランティンの容量を超える異常に大きなファイルサイズによる攻撃で、メモリーが無駄に消費されるのを防ぐ意味で重要です。​デフォルト設定は６４ＭＢです。

##### "quarantine_max_files" `[int]`
- 検疫に存在できるファイルの最大数。​検疫ファイルに新しいファイルが追加されると、この数を超えた場合、残りのファイルがこの数を超えなくなるまで古いファイルが削除されます。​デフォルト設定は１００です。

#### "virustotal" （カテゴリ）
Virus Total統合のコンフィギュレーション。

##### "vt_public_api_key" `[string]`
- オプションですが、phpMusselはVirus Total APIを使ってファイルをスキャンすることができます。​ウィルス、トロイの木馬、マルウェア、その他の攻撃に対して非常に効果的に機能します。​デフォルトではVirus Total APIを使ったスキャニングは無効になっています。​有効にするには、Virus TotalのAPIキーが必要です。​メリットが極めて大きいため、有効にすることを強く推奨します。​Virus Total APIの使用にあたっては、Virus Totalのドキュメンテーションにある通り、利用規定ならびにガイドラインを遵守しなくてはなりません。​この統合機能を使用するためには：​Virus TotalとAPIのサービス規定を読み同意すること。​最低でもVirus Total Public APIドキュメンテーションの前文を読み理解すること（VirusTotalPublic API v2.0以降Contents「コンテンツ」前まで）。

参照してください：
- [Terms of Service](https://www.virustotal.com/en/about/terms-of-service/)
- [Getting started](https://developers.virustotal.com/reference)

##### "vt_suspicion_level" `[int]`
- デフォルト設定では、phpMusselがVirus Total APIを使ってスキャンするファイル（疑がわしいもの）には制限があります。​`vt_suspicion_level`ディレクティブを編集することのより、この制限を変更することが可能です。

```
vt_suspicion_level
├─0 (ヒューリスティックな重みを持つファイルのみをスキャンします。): ファイルは、ヒューリスティックな重みが発生する場合にのみスキャンされます。​ューリスティックな重みは、感染を示唆しているが感染を保証していない指紋をキャッチするためのシグネチャから発生する可能性があります。​疑いを正当化するが確実性を提供しない結果については、ルックアップはセカンド・オピニオンを提供するのに役立ちます。
├─1 (ヒューリスティックな重みを持つファイル、実行可能ファイル、および実行可能データを含む可能性のファイルをスキャンします。): 実行可能ファイル、および実行可能データを含む可能性のファイルの例には、Windows
│ PEファイル、Linux
│ ELFファイル、Mach-Oファイル、DOCXファイル、ZIPファイル、などが含まれます。
└─2 (すべてのファイルをスキャンします。)
```

##### "vt_weighting" `[int]`
- phpMusselがVirus Total APIを使ったスキャニング結果を検出として扱うか、検出の重み付けとして扱うべきか？​複数のエンジン（Virus Totalのように）を使用したスキャニングは、検出率の向上（より多くのマルウェアが検出）をもたらす一方で誤検出の増加も招くため、このディレクティブが存在します。​したがって、スキャニング結果は、決定的判断ではなく信頼スコアとして利用した方が適当なケースもあります。​値が０の場合、Virus Total APIを使ったスキャンは検出として扱われ、Virus Totalのエンジンがマルウェアとフラグを付けたファイルは、phpMusselもマルウェアと判断します。​その他の値の場合は結果は検出の重み付けとなり、スキャンされたファイルがマルウェアかどうかphpMusselが判断するための信頼スコア（あるいは検出の重み付け）となります（値はマルウェアと判断するための最小信頼スコア、あるいは重み）。​デフォルト値は０です。

##### "vt_quota_rate" `[int]`
- Virus Total APIのドキュメンテーションによると「１分間のタイムフレームの間にリクエストは最大４回」の上限があります。​ハニークライアントやハニーポット等のオートメーションを使用し、リポートを受け取るだけでなく、VirusTotal にリソースを提供していれば、上限は引き上げられます。​phpMussel のデフォルトでは最大４回を遵守していますが、前述の事情から、この２つのディレクトリを準備し、状況に合わせて変更できるようになっています。​制限に達してしまうといった不都合や問題がない限りデフォルト値を変更することは勧められませんが、値を小さくすることが適当なケースもあります。​上限はタイムフレーム`vt_quota_time`（ヴィティ・クォータ・タイム）「 分内に」`vt_quota_rate`（ヴィティ・クォータ・レート）で設定します。

##### "vt_quota_time" `[int]`
- （上記の説明を参照）。

#### "urlscanner" （カテゴリ）
ＵＲＬスキャナー・コンフィギュレーション。

##### "google_api_key" `[string]`
- 必要なＡＰＩ鍵が定義されれば、ＡＰＩのGoogle Safe Browsing APIルックアップが有効になります。

参照してください：
- [Google API Console](https://console.developers.google.com/)

##### "maximum_api_lookups" `[int]`
- スキャン反復におけるAPIルックアップの最大回数。​APIルックアップの度にスキャン反復の時間が積み重なってしまうので、スキャン処理の速度向上のため、制限を設けたいと考えるかもしれません。​０は制限なしを意味します。​デフォルトは１０です。

##### "maximum_api_lookups_response" `[bool]`
- APIルックアップの回数制限を超えた時の対応です。​False（偽） = 何もしない/処理を継続する（Default/デフォルト）；​True（真） = ファイルにフラグを付ける/ブロックする。

##### "cache_time" `[int]`
- ＡＰＩルックアップの結果をどれくらいキャッシュするか（秒単位です）？​デフォルトは３６００秒（一時間）。

#### "legal" （カテゴリ）
法的要件のコンフィギュレーション。

##### "pseudonymise_ip_addresses" `[bool]`
- ログ・ファイルを書き込むときにＩＰアドレス偽名化するか「プセユードニマイズ」？ True = はい（Default/デフォルルト）。 False = いいえ。

##### "privacy_policy" `[string]`
- 生成されたページのフッターに表示される関連プライバシー・ポリシーのアドレス。​ＵＲＬを指定するか、無効にしたい場合は空白のままにして下さい。

#### "supplementary_cache_options" （カテゴリ）
補足キャッシュ・オプション。 注：これらの値を変更すると、ログアウトする可能性があります。

##### "prefix" `[string]`
- ここで指定された値は、すべてのキャッシュ・エントリ・キーの前に追加されます。 Default/デフォルルト = 「phpMussel_」。 同じサーバーに複数のインストールが存在する場合、これはキャッシュを互いに分離しておくのに役立ちます。

##### "enable_apcu" `[bool]`
- キャッシュに「APCu」を使用するかどうかを指定します。 Default/デフォルルト = True。

##### "enable_memcached" `[bool]`
- キャッシュに「Memcached」を使用するかどうかを指定します。 Default/デフォルルト = False。

##### "enable_redis" `[bool]`
- キャッシュに「Redis」を使用するかどうかを指定します。 Default/デフォルルト = False。

##### "enable_pdo" `[bool]`
- キャッシュに「PDO」を使用するかどうかを指定します。 Default/デフォルルト = False。

##### "memcached_host" `[string]`
- Memcachedのホスト値。 Default/デフォルルト = localhost。

##### "memcached_port" `[int]`
- Memcachedのポート値。 Default/デフォルルト = 「11211」。

##### "redis_host" `[string]`
- Redisのホスト値。 Default/デフォルルト = localhost。

##### "redis_port" `[int]`
- Redisのポート値。 Default/デフォルルト = 「6379」。

##### "redis_timeout" `[float]`
- Redisのタイムアウト値。 Default/デフォルルト = 「2.5」。

##### "redis_database_number" `[int]`
- Redisのデータベース番号。 Default/デフォルルト = 0。 注：Redis Clusterでは、0 以外の値を使用できません。

##### "pdo_dsn" `[string]`
- PDOのDSN値。 Default/デフォルルト = 「mysql:dbname=phpmussel;host=localhost;port=3306」。

__ＦＡＱ。__ *<a href="https://github.com/phpMussel/Docs/blob/master/readme.ja.md#user-content-HOW_TO_USE_PDO" hreflang="ja-JP">「PDO DSN」とは何ですか？​phpMusselでPDOを使用するにはどうすればよいですか？</a>*

##### "pdo_username" `[string]`
- PDOのユーザー名。

##### "pdo_password" `[string]`
- PDOのパスワード。

#### "frontend" （カテゴリ）
フロントエンド・コンフィギュレーション。

##### "frontend_log" `[string]`
- フロントエンド・ログインの試みを記録するためのファイル。​ファイル名指定するか、無効にしたい場合は空白のままにして下さい。

役に立つヒント:時刻形式のプレースホルダーを使用して、ログ・ファイルの名前に日付/時刻情報を添付できます。​使用可能な時刻形式のプレースホルダーが<a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>に表示されます。

##### "max_login_attempts" `[int]`
- ログイン試行の最大回数（フロントエンド）。 Default/デフォルルト = ５。

##### "numbers" `[string]`
- どのように数字を表示するのが好きですか？​あなたに一番正しい例を選択してください。

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
- 将来のすべてのパスワードとセッションに使用するアルゴリズムを定義します。

```
default_algo
├─PASSWORD_DEFAULT ("PASSWORD_DEFAULT")
├─PASSWORD_BCRYPT ("PASSWORD_BCRYPT")
├─PASSWORD_ARGON2I ("PASSWORD_ARGON2I")
└─PASSWORD_ARGON2ID ("PASSWORD_ARGON2ID (PHP >= 7.3.0)")
```

##### "theme" `[string]`
- phpMusselフロントエンドに使用する美学。

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
└─…その他
```

##### "magnification" `[float]`
- フォントの倍率。 Default/デフォルルト = １。

##### "custom_header" `[string]`
- すべてのフロントエンド・ページの最初にＨＴＭＬとして挿入されます。​ウェブサイトのロゴ、パーソナライズされたヘッダー、スクリプト、などに役立ちます。

##### "custom_footer" `[string]`
- すべてのフロントエンド・ページの最下部にＨＴＭＬとして挿入されます。​法的通知、連絡先リンク、ビジネス情報、などに役立ちます。

#### "web" （カテゴリ）
アップロード・ハンドラの設定。

##### "uploads_log" `[string]`
- ブロックされたすべてのアップロードを記録する場所。​ファイル名指定するか、無効にしたい場合は空白のままにして下さい。

役に立つヒント:時刻形式のプレースホルダーを使用して、ログ・ファイルの名前に日付/時刻情報を添付できます。​使用可能な時刻形式のプレースホルダーが<a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>に表示されます。

##### "forbid_on_block" `[bool]`
- アップロードファイルがブロックされたメッセージと共に、phpMusselから４０３ヘッダーを送るべきか、通常の２００でよいかどうかについて。​False（偽）=いいえ（２００）；​True（真）=はい（４０３）「Default/デフォルト設定」。

##### "unsupported_media_type_header" `[bool]`
- ブラックリストに登録されているファイル・タイプが原因でアップロードがブロックされた場合、phpMusselは、４１５ヘッダーを送信する必要がありますか？​Trueの場合、この設定は`forbid_on_block`よりも優先されます。​False（偽）=いいえ「Default/デフォルト設定」；​True（真）=はい。

##### "max_uploads" `[int]`
- 一度にスキャンできるアップロードファイル数の上限で、これを超えるとスキャンを中断し、ユーザーにその旨を知らせ、論理攻撃からの保護として機能します。​システムやＣＭＳがＤＤｏＳ攻撃にあい、phpMusselがオーバーロードしてＰＨＰプロセスに支障をきたすことがないようにするためです。​推奨数は１０ですが、ハードウェアのスピードによっては、これ以上/以下がよいということもあるでしょう。​この数は、アーカイブのコンテンツは含まないことを覚えておいて下さい。

##### "ignore_upload_errors" `[bool]`
- システム上でphpMusselの機能に修正が必要でない限りはこのディレクティブは通常無効です。​無効に設定すると、`$_FILES` array()に要素の存在を検知したとき、その要素が表すファイルのスキャンが開始され、要素が空白か無であればphpMusselはエラーメッセージを返します。​これは本来phpMusselがあるべき姿です。​しかしＣＭＳにおいては、$_FILESの空要素は普通に発生するものであり、正常なphpMusselの挙動が正常なＣＭＳの挙動を阻害する恐れがあります。​このような場合は、本オプションを有効にして、phpMusselが空要素をスキャンしてエラーメッセージを返すのを避け、要求のあったページへスムーズに進むことができるようにします。​False（偽）=ＯＦＦ「オフ」です。`true`（真）=ＯＮ「オン」です。

##### "theme" `[string]`
- 「アップロード拒否」ページで使用する美学。

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
└─…その他
```

##### "magnification" `[float]`
- フォントの倍率。 Default/デフォルルト = １。

##### "custom_header" `[string]`
- すべての「アップロード拒否」ページの最初にＨＴＭＬとして挿入されます。​ウェブサイトのロゴ、パーソナライズされたヘッダー、スクリプト、などに役立ちます。

##### "custom_footer" `[string]`
- すべての「アップロード拒否」ページの最下部にＨＴＭＬとして挿入されます。​法的通知、連絡先リンク、ビジネス情報、などに役立ちます。

#### "phpmailer" （カテゴリ）
PHPMailerの設定（二要素認証とＥメール通知に使用されます）。

##### "event_log" `[string]`
- PHPMailerに関連してすべてのイベントを記録するためのファイル。​ファイル名指定するか、無効にしたい場合は空白のままにして下さい。

役に立つヒント:時刻形式のプレースホルダーを使用して、ログ・ファイルの名前に日付/時刻情報を添付できます。​使用可能な時刻形式のプレースホルダーが<a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>に表示されます。

##### "enable_two_factor" `[bool]`
- このディレクティブは、フロントエンド・アカウントに２ＦＡを使用するかどうかを決定します。

##### "enable_notifications" `[string]`
- アップロードがブロックされたときにＥメールで通知を受け取りたい場合は、ここで受信者のＥメール・アドレスを指定します。

##### "skip_auth_process" `[bool]`
- このディレクティブを`true`に設定すると、PHPMailerはSMTP経由でＥメールを送信する際に通常発生する認証プロセスをスキップします。​このプロセスをスキップすると、送信ＥメールがＭＩＴＭ攻撃にさらされる可能性があるため、これは避けるべきです。​しかし、PHPMailerがSMTPサーバに接続できない場合、このプロセスが必要な場合があります。

##### "host" `[string]`
- 送信Ｅメールに使用するＳＭＴＰホスト。

##### "port" `[int]`
- 送信Ｅメールに使用するポート番号。 Default/デフォルルト = 587。

##### "smtp_secure" `[string]`
- ＳＭＴＰ経由でＥメールを送信するときに使用するプロトコル（ＴＬＳまたはＳＳＬ）。

```
smtp_secure
├─default ("-")
├─tls ("TLS")
└─ssl ("SSL")
```

##### "smtp_auth" `[bool]`
- このディレクティブは、ＳＭＴＰセッションを認証するかどうかを決定します（通常はそれをそのまま残すべきです）。

##### "username" `[string]`
- ＳＭＴＰ経由でＥメールを送信するときに使用するユーザー名。

##### "password" `[string]`
- ＳＭＴＰ経由でＥメールを送信するときに使用するパスワード。

##### "set_from_address" `[string]`
- ＳＭＴＰ経由でＥメールを送信するときに引用する送信者アドレス。

##### "set_from_name" `[string]`
- ＳＭＴＰ経由でＥメールを送信するときに引用する送信者名。

##### "add_reply_to_address" `[string]`
- ＳＭＴＰ経由でＥメールを送信するときに引用する返信アドレス。

##### "add_reply_to_name" `[string]`
- ＳＭＴＰ経由でＥメールを送信するときに引用する返信名。

---


### ８.<a name="SECTION6"></a>シグネチャ（署名）フォーマット

*参照：*
- *[「シグネチャ」とは何ですか？](#user-content-WHAT_IS_A_SIGNATURE)*

phpMusselシグネチャ・ファイルの最初の9バイト（`[x0-x8]`）は`phpMussel`であり、​「マジック・ナンバー」（magic number）として機能します（それらをシグネチャ・ファイルとして識別するために）。​シグネチャ・ファイルではないファイルを誤って使用するのを防ぐのに役立ちます。​次のバイト（`[x9]`）は、シグネチャ・ファイルのタイプを識別する。​シグネチャ・ファイルを正しく解釈できるようにするためにこれを知っておく必要があります。​次のタイプのシグネチャ・ファイルが認識されます。

タイプ | バイト | 説明
---|---|---
`General_Command_Detections` | `0?` | ＣＳＶ（カンマ区切りの値）のシグネチャ・ファイル。​シグネチャは１６進数でエンコードされた文字列です。​ここの​シグネチャには、名前やその他の詳細はありません（検出する文字列のみ）。
`Filename` | `1?` | ファイル名の​シグネチャ。
`Hash` | `2?` | ハッシュ・シグネチャ。
`Standard` | `3?` | ファイルコンテンツで直接動作する​シグネチャ・ファイル。
`Standard_RegEx` | `4?` | ファイルコンテンツで直接動作する​シグネチャ・ファイル。​シグネチャには正規表現を含めることができます。
`Normalised` | `5?` | ＡＮＳＩ標準化されたファイルコンテンツで動作するシグネチャ・ファイル。
`Normalised_RegEx` | `6?` | ＡＮＳＩ標準化されたファイルコンテンツで動作するシグネチャ・ファイル。​シグネチャには正規表現を含めることができます。
`HTML` | `7?` | ＨＴＭＬ標準化されたファイルコンテンツで動作するシグネチャ・ファイル。
`HTML_RegEx` | `8?` | ＨＴＭＬ標準化されたファイルコンテンツで動作するシグネチャ・ファイル。​シグネチャには正規表現を含めることができます。
`PE_Extended` | `9?` | ＰＥメタデータで動作するシグネチャ・ファイル（ＰＥのセクション・メタデータでは使用できません）。
`PE_Sectional` | `A?` | ＰＥセクション・メタデータで動作するシグネチャ・ファイル。
`Complex_Extended` | `B?` | phpMusselによって生成された拡張メタデータに基づいてさまざまなルールで動作するシグネチャ・ファイル。
`URL_Scanner` | `C?` | ＵＲＬで動作するシグネチャ・ファイル。

次のバイト（`[x10]`）は改行（`[0A]`）であり、phpMusselのシグネチャ・ファイルのヘッダを終えます。

その後の各空でない行は、​シグネチャまたは規則です。​各シグネチャまたは規則は１行を占有します。​サポートされているシグネチャ形式は以下のとおりです。

#### *ファイル名シグネチャ*
ファイル名シグネチャのフォーマットは例外なく次のようになります。

`NAME:FNRX`

NAMEはそのシグネチャを指す名前でFNRXはファイル名（エンコードされていない）にマッチする正規表現パターンです。

#### *ハッシュ・シグネチャ*
ハッシュ・シグネチャのフォーマットは例外なく次のようになります。

`HASH:FILESIZE:NAME`

HASHはファイル全体のハッシュ（通常はＭＤ５）、​FILESIZEはファイルの全サイズ、​NAMEはそのシグネチャを指す名前です。

#### *ＰＥセクショナルシグネチャ*
ＰＥセクショナルシグネチャのフォーマットは例外なく次のようになります。

`SIZE:HASH:NAME`

HASHはＰＥファイルのある部分のＭＤ５ハッシュ、​SIZEはその部分の全サイズ、​NAMEはシグネチャを指す名前です。

#### *ＰＥ拡張シグネチャ*
ＰＥ拡張シグネチャのフォーマットは例外なく次のようになります。

`$VAR:HASH:SIZE:NAME`

$VARはマッチするＰＥ変数の名前、​HASHはその変数のＭＤ５ハッシュ、​サイズは変数の全サイズ、​NAMEはそのシグネチャを指す名前です。

#### *複合拡張シグネチャ*
複合拡張シグネチャは他のシグネチャとは少し違い、​何に適合するかはそれ自身のシグネチャによって決まり、​基準は一つではありません。​適合基準は「;」により、​適合タイプ、​適合データは「:」によります。​したがってフォーマットは、​$変数１:何らかのデータ;$変数２:SOMEDATA;何らかのデータのようになります。

`$variable1:SOMEDATA;$variable2:SOMEDATA;SignatureName`

#### *その他*
その他のシグネチャのフォーマットです。

`NAME:HEX:FROM:TO`

NAMEはそのシグネチャを指す名前、​HEXは与えられたシグネチャにより適合を見るファイルの１６進法にエンコードされたセグメントです。 FROMとTOはオプション・パラメータで、​データソースのどこからどこまでチェックするかを示します（メール機能ではサポートしていません）。

#### *正規表現*
ＰＨＰが正規表現と判断し処理するフォーマットであれば、​phpMusselとシグネチャによって間違いなく処理されます。​しかし念のため、​シグネチャを基礎とする正規表現を新規に作成する場合は細心の注意を払って下さい。​絶対的な自信がない状況では、​思いもしないエラーが発生しかねません。​正規表現ステートメントが解析されているコンテキストを完全に理解していないならば、​phpMusselのコードを見て下さい。​パターンは全て（ファイル名、​アーカイブ・メタデータ、​ＭＤ５パターンを除く）１６進法でエンコードされなければならない点に注意(上記のパターン構文も)です！

---


### ９.<a name="SECTION7"></a>適合性問題

#### アンチウィルスソフトウェアとの互換性

phpMusselと一部のアンチウイルス・ベンダー間の互換性の問題は、過去に時々発生することが知られています。​そこで、およそ数ヶ月ごとに、phpMusselコードベースの最新バージョンをVirus Totalでチェックし、問題が報告されているかどうかを確認します。​問題が報告された場合、私は、報告された問題をドキュメントにリストします。

最近チェックしたとき（２０２２年５月１２日）、問題は報告されませんでした。

私は、シグネチャ・ファイル、ドキュメンテーション、またはその他の周辺コンテンツをチェックしません。​シグネチャ・ファイルは、他のアンチウイルス・ソリューションが検出すると、常にいくつかの誤検知を引き起こします。​したがって、別のアンチウイルス・ソリューションが既に存在するマシンにphpMusselをインストールする場合は、phpMusselシグネチャ・ファイルをホワイトリストに登録することを強くお勧めします。

*参照：​[互換性チャート](https://maikuolan.github.io/Compatibility-Charts/)。*

---


### １０.<a name="SECTION8"></a>よくある質問（ＦＡＱ）

- [「シグネチャ」とは何ですか？](#user-content-WHAT_IS_A_SIGNATURE)
- [「偽陽性」とは何ですか？](#user-content-WHAT_IS_A_FALSE_POSITIVE)
- [シグネチャはどれくらいの頻度でアップデイトされますか？](#user-content-SIGNATURE_UPDATE_FREQUENCY)
- [phpMusselを使用しているときに問題が発生しましたが、​何をすべきかわかりません！​助けてください！](#user-content-ENCOUNTERED_PROBLEM_WHAT_TO_DO)
- [7.2.0より古いＰＨＰバージョンでphpMussel v3を使用したいと思います；​手伝ってくれますか？](#user-content-MINIMUM_PHP_VERSION_V3)
- [複数のドメインを保護するために１つのphpMusselインストールを使用できますか？](#user-content-PROTECT_MULTIPLE_DOMAINS)
- [私はこれをインストールするか、​それが私のウェブサイト上で動作することを保証する時間を費やす、​にしたくない；​それできますか？​私はあなたを雇うことができますか？](#user-content-PAY_YOU_TO_DO_IT)
- [あなたまたはこのプロジェクトの任意の開発者は雇用可能ですか？](#user-content-HIRE_FOR_PRIVATE_WORK)
- [私は専門家の変更、​カスタム化、​等が必要です；​手伝ってくれますか？](#user-content-SPECIALIST_MODIFICATIONS)
- [私は開発者、​ウェブサイトデザイナー、​またはプログラマーです。​このプロジェクトに関連する作業を行うことはできますか？](#user-content-ACCEPT_OR_OFFER_WORK)
- [私はプロジェクトに貢献したい；​これはできますか？](#user-content-WANT_TO_CONTRIBUTE)
- [ファイルのスキャン時に特定の詳細情報にアクセスするにはどうすればよいですか？](#user-content-SCAN_DEBUGGING)
- [ブラックリスト – ホワイトリスト – グレーリスト – 彼らは何ですか？私はどのように使用しますか？](#user-content-BLACK_WHITE_GREY)
- [「PDO DSN」とは何ですか？​phpMusselでPDOを使用するにはどうすればよいですか？](#user-content-HOW_TO_USE_PDO)
- [私のアップロード機能性は非同期です（例えば、ajax、ajaj、json、などを使用します）。​アップロードがブロックされたときに特別なメッセージや警告が表示されません。​何が起こっていますか？](#user-content-AJAX_AJAJ_JSON)
- [phpMusselはEICARを検出できますか？](#user-content-DETECT_EICAR)

#### <a name="WHAT_IS_A_SIGNATURE"></a>「シグネチャ」とは何ですか？

phpMusselのコンテキストでは、​「シグネチャ」とは、​私たちが探しているものを特定するデータを指します（ウイルス、​トロイの木馬など）。​このデータは、​通常、​ファイルのチェックサム、​ハッシュ、​または他の同様に識別するインジケータです。​通常、​ラベルや追加のコンテキストを提供するためのその他のデータが含まれています。

#### <a name="WHAT_IS_A_FALSE_POSITIVE"></a>「偽陽性」とは何ですか？

一般化された文脈で簡単に説明、​条件の状態をテストするときに、​結果を参照する目的で、​用語「偽陽性」（*または：偽陽性のエラー、​虚報；* 英語：​*false positive*; *false positive error*; *false alarm*）の意味は、​結果は「陽性」のようです、​しかし結果は間違いです（即ち、​真の条件は「陽性/真」とみなされます、​しかしそれは本当に「陰性/偽」です）。​「偽陽性」は「泣く狼」に類似していると考えることができます（その状態は群の近くに狼がいるかどうかである、​真の条件は「偽/陰性」です、​群れの近くに狼がないからです、​しかし条件は「真/陽性」として報告されます、​羊飼いが「狼！​狼！​」を叫んだからです）、​または、​医療検査に類似、​患者が誤って診断されたとき。

いくつかの関連する用語は、​「真陽性」、​「真陰性」、​と「偽陰性」です。​これらの用語が示す意味：​「真陽性」の意味は、​テスト結果と真の条件が真です（即ち、​「陽性」です）。​「真陰性」の意味は、​テスト結果と真の条件が偽です（即ち、​「陰性」です）。​「真陽性」と「真陰性」は「正しい推論」とみなされます。​「偽陽性」の反対は「偽陰性」です。​「偽陰性」の意味は、​テスト結果が偽です（即ち、​「陰性」です）、​しかし、​真の条件が本当に真です（即ち、​「陽性」です）；​両方テスト結果と真の条件、​が「真/陽性」すべきであるはずです。

phpMusselの文脈で、​これらの用語は、​phpMusselのシグネチャとそれらがブロックするファイルを指します。​phpMusselが誤ってファイルをブロックすると（例えば、​不正確なシグネチャ、​時代遅れのシグネチャなどによる）、​我々はこのイベント「偽陽性」のを呼び出します。​phpMusselがファイルをブロックできなかった場合（例えば、​予期せぬ脅威、​シグネチャの欠落などによる）、​我々はこのイベント「不在検出」のを呼び出します（「偽陰性」のアナログです）。

これは、​以下の表に要約することができます。

&nbsp; | phpMusselは、​ファイルをブロック必要がありません | phpMusselは、​ファイルをブロック必要があります
---|---|---
phpMusselは、​ファイルをブロックしません | 真陰性（正しい推論） | 不在検出（それは「偽陰性」と同じです）
phpMusselは、​ファイルをブロックします | __偽陽性__ | 真陽性（正しい推論）

#### <a name="SIGNATURE_UPDATE_FREQUENCY"></a>シグネチャはどれくらいの頻度でアップデイトされますか？

アップデイト頻度は、​シグネチャ・ファイルによって異なります。​phpMusselのシグネチャ・ファイルのすべてのメンテナーが頻繁にアップデイトを試みる、​しかし、​私たちの皆様には、​他にもさまざまなコミットメントがあり、​私たちはプロジェクトの外で生活しており、​と誰も財政的に補償されていない、​したがって、​正確なアップデイトスケジュールは保証されません。​一般に、​十分な時間があればシグネチャがアップデイトされます。​あなたが何かを提供できるのであれば、​援助は常に高く評価されます。

#### <a name="ENCOUNTERED_PROBLEM_WHAT_TO_DO"></a>phpMusselを使用しているときに問題が発生しましたが、​何をすべきかわかりません！​助けてください！

- あなたは最新のソフトウェアバージョンを使用していますか？​あなたは最新のシグネチャ・ファイルバージョンを使用していますか？​そうでない場合は、​まずすべてをアップデイトしてください。​問題が解決しないかどうかをチェックしてください。​それが続く場合は、​読んでください。
- あなたはドキュメンテーションをチェックしましたか？​もしそうでなければ、​そうしてください。​ドキュメンテーションを使用して問題を解決できない場合は、​引き続き読んでください。
- **[イシュー・ページ](https://github.com/phpMussel/phpMussel/issues)** をチェックしましたか？​問題が以前に言及されているかどうかをチェックしてください。​提案、​アイデア、​ソリューションが提供されたかどうかをチェックしてください。
- 問題が解決しない場合は、​教えてください。​イシュー・ページに関する新しいディスカッションを作成する。

#### <a name="MINIMUM_PHP_VERSION_V3"></a>7.2.0より古いＰＨＰバージョンでphpMussel v3を使用したいと思います；​手伝ってくれますか？

いいえ。 PHP >= 7.2.0 は phpMussel v3 の最小要件です。

*参照：​[互換性チャート](https://maikuolan.github.io/Compatibility-Charts/)。*

#### <a name="PROTECT_MULTIPLE_DOMAINS"></a>複数のドメインを保護するために１つのphpMusselインストールを使用できますか？

はい。

#### <a name="PAY_YOU_TO_DO_IT"></a>私はこれをインストールするか、​それが私のウェブサイト上で動作することを保証する時間を費やす、​にしたくない；​それできますか？​私はあなたを雇うことができますか？

多分。​これは、​ケースバイケースで検討されています。​あなたのニーズと提供できるものを教えてください。​私たちが助けることができるかどうかを教えてあげます。

#### <a name="HIRE_FOR_PRIVATE_WORK"></a>あなたまたはこのプロジェクトの任意の開発者は雇用可能ですか？

*上記を参照。​*

#### <a name="SPECIALIST_MODIFICATIONS"></a>私は専門家の変更、​カスタム化、​等が必要です；​手伝ってくれますか？

*上記を参照。​*

#### <a name="ACCEPT_OR_OFFER_WORK"></a>私は開発者、​ウェブサイトデザイナー、​またはプログラマーです。​このプロジェクトに関連する作業を行うことはできますか？

はい。​私たちのライセンスはこれを禁止していません。

#### <a name="WANT_TO_CONTRIBUTE"></a>私はプロジェクトに貢献したい；​これはできますか？

はい。​プロジェクトへの貢献は大歓迎です。​詳細については、​「CONTRIBUTING.md」を参照してください。

#### <a name="SCAN_DEBUGGING"></a>ファイルのスキャン時に特定の詳細情報にアクセスするにはどうすればよいですか？

これは、​phpMusselにそれらをスキャンするように指示する前に、​この目的のために使用する配列を割り当てることによって行うことができます。

以下の例では、​この目的のために`$Foo`が割り当てられています。​`/ファイル/パス/...`をスキャンした後、​`/ファイル/パス/...`のファイルに関する情報は`$Foo`にあります。

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);

$Scanner->setScanDebugArray($Foo);

$Results = $Scanner->scan('/ファイル/パス/...');

var_dump($Foo);
```

配列は多次元です。​要素はスキャンされる各ファイルを表します。​サブ要素は、​これらのファイルの詳細を表します。​サブ要素は次のとおりです。

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

*† - キャッシュされた結果は提供されません （新しいスキャン結果にのみ提供されます）。​*

*‡ - ＰＥファイルをスキャンするときにのみ提供されます。​*

必要に応じて、​この配列は以下を使用して破棄できます。

```PHP
$Scanner->destroyScanDebugArray($Foo);
```

#### <a name="BLACK_WHITE_GREY"></a>ブラックリスト – ホワイトリスト – グレーリスト – 彼らは何ですか？私はどのように使用しますか？

これらの用語は、異なる文脈で異なる意味を伝える。​phpMusselには、これらの用語が使用される３つのコンテキストが（ファイルサイズの応答、ファイルタイプの応答、シグネチャ・グレーリスト）あります。

処理コストを最小限に抑えて希望の結果を得るために、phpMusselがファイルを実際にスキャンする前に確認できる簡単な方法がいくつかあります（例えば；ファイルのサイズ、名前、および拡張子）。​例えば；ファイルが大きすぎる場合、またはその拡張子が私たちのウェブサイトに許可したくないファイルの種類を示している場合、すぐにファイルにフラグを立てることができますし、スキャンする必要はありません。

ファイルサイズの応答は、ファイルが指定された制限を超えたときにphpMusselが応答する方法です。​実際のリストは含まれていませんが、ファイルはそのサイズに基づいて、効果的にブラックリストに載っている、ホワイトリストに載っている、またはグレイリストに載ってと考えられます。​制限と望ましい応答をそれぞれ指定するために、２つの異なる設定オプションが存在します。

ファイルタイプの応答は、phpMusselがファイルの拡張子に応答する方法です。​どの拡張がブラックリスト、ホワイトリスト、またはグリットリストにあるべきかを明示的に指定するための3つの異なる設定オプションが存在します。​拡張子が指定された拡張子のいずれかにそれぞれ一致する場合、ファイルは有効にリストされていると見なされることがあります。

この２つのコンテキストがでは、ホワイトリストに載っているはスキャンまたはフラグ付けすべきではないことを意味します、ブラックリストに載っているはフラグ付けすべきですことを意味します（したがって、それをスキャンするすべきではない）そして、グレーリストに載っているは、フラグを立てる必要があるかどうかを判断するには、さらに分析が必要ですことを意味します（したがって、スキャンする必要があります）。

シグネチャ・グレーリストは本質的に無視すべきシグネチャのリストです（これについては、前述のドキュメントで簡単に説明しています）。​シグネチャはグレーリスト上のシグネチャがトリガーされると、phpMusselは私は仕事を続け、グレーリスト上のシグネチャに関して特別な処置をとりません。​暗黙の動作はトリガされたシグネチャの通常の動作であるため、シグネチャ・ブラックリストはありません。​この文脈では必要ではないので、シグネチャ・ホワイトリストはありません。

シグネチャ・ファイル全体をディセーブルまたはアンインストールせずに特定のシグネチャによって発生した問題を解決する必要がある場合は、シグネチャ・グレーリストが役立ちます。

#### <a name="HOW_TO_USE_PDO"></a>「PDO DSN」とは何ですか？​phpMusselでPDOを使用するにはどうすればよいですか？

「PDO」は「[PHP Data Objects](https://www.php.net/manual/ja/intro.pdo.php)」の頭字語です。​さまざまなPHPアプリケーションで一般的に使用されるデータベース・システムに接続できるように、PHPのインターフェイスを提供します。

「DSN」は「[data source name](https://en.wikipedia.org/wiki/Data_source_name)」（データ・ソース名）の頭字語です。​「PDO DSN」は、PDOがデータベースに接続する方法を説明しています。

phpMusselは、キャッシュにPDOを利用するオプションを提供します。​これが適切に機能するためには、それに応じてphpMusselのコンフィギュレーションを設定する必要があります（したがって、PDOを有効にします）、次にphpMusselが使用する新しいデータベースを作成します（phpMusselが使用するデータベースをまだ考慮していない場合）、次に、以下に説明する構造に従って、データベースに新しいテーブルを作成します。

データベース接続は成功したが、必要なテーブルが存在しない場合、それは自動的に作成しようとします。​ただし、この動作は十分にテストされていないため、成功を保証することはできません。

もちろん、これは、phpMusselで実際にPDOを使用する場合にのみ適用されます。​フラット・ファイル・キャッシュ（デフォルトのコンフィギュレーションに従って）、または提供されているその他のさまざまなキャッシュオプションを使用することに満足している場合は、データベース、テーブルなどの設定に悩む必要はありません。

以下で説明する構造では、データベース名として「phpmussel」を使用していますが、DSN構成で同じ名前が複製される限り、データベースに任意の名前を使用できます。

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

phpMusselの「`pdo_dsn`」コンフィギュレーション・ディレクティブは、次のように設定する必要があります。

```
使用するデータベース・ドライバーに応じて...
├─4d （警告：実験的、未テスト、非推奨！）
│ │
│ │         ╔═══════╗
│ └─4D:host=localhost;charset=UTF-8
│           ╚╤══════╝
│            └データベースを見つけるために接続するホスト。
├─cubrid
│ │
│ │             ╔═══════╗      ╔═══╗        ╔═════╗
│ └─cubrid:host=localhost;port=33000;dbname=example
│               ╚╤══════╝      ╚╤══╝        ╚╤════╝
│                │              │            └データベース使用する名前。
│                │              │
│                │              └ホストに接続するポート番号。
│                │
│                └データベースを見つけるために接続するホスト。
├─dblib
│ │
│ │ ╔═══╗      ╔═══════╗        ╔═════╗
│ └─dblib:host=localhost;dbname=example
│   ╚╤══╝      ╚╤══════╝        ╚╤════╝
│    │          │                └データベース使用する名前。
│    │          │
│    │          └データベースを見つけるために接続するホスト。
│    │
│    └可能な値：「mssql」、「sybase」、「dblib」。
├─firebird
│ │
│ │                 ╔═══════════════════╗
│ └─firebird:dbname=/path/to/database.fdb
│                   ╚╤══════════════════╝
│                    ├ローカル・データベース・ファイルへのパスにすることができます。
│                    │
│                    ├ホストとポート番号で接続できます。
│                    │
│                    └これを使用する場合は、Firebirdのドキュメントを参照してください。
├─ibm
│ │
│ │         ╔═════╗
│ └─ibm:DSN=example
│           ╚╤════╝
│            └接続するカタログ化されたデータベース。
├─informix
│ │
│ │              ╔═════╗
│ └─informix:DSN=example
│                ╚╤════╝
│                 └接続するカタログ化されたデータベース。
├─mysql （最も推奨されます！）
│ │
│ │              ╔═════╗      ╔═══════╗      ╔══╗
│ └─mysql:dbname=example;host=localhost;port=3306
│                ╚╤════╝      ╚╤══════╝      ╚╤═╝
│                 │            │              └ホストに接続するポート番号。
│                 │            │
│                 │            └データベースを見つけるために接続するホスト。
│                 │
│                 └データベース使用する名前。
├─oci
│ │
│ │            ╔═════╗
│ └─oci:dbname=example
│              ╚╤════╝
│               ├特定のカタログ化されたデータベースを参照できます。
│               │
│               ├ホストとポート番号で接続できます。
│               │
│               └これを使用する場合は、Oracleのドキュメントを参照してください。
├─odbc
│ │
│ │      ╔═════╗
│ └─odbc:example
│        ╚╤════╝
│         ├特定のカタログ化されたデータベースを参照できます。
│         │
│         ├ホストとポート番号で接続できます。
│         │
│         └これを使用する場合は、ODBC/DB2のドキュメントを参照してください。
├─pgsql
│ │
│ │            ╔═══════╗      ╔══╗        ╔═════╗
│ └─pgsql:host=localhost;port=5432;dbname=example
│              ╚╤══════╝      ╚╤═╝        ╚╤════╝
│               │              │           └データベース使用する名前。
│               │              │
│               │              └ホストに接続するポート番号。
│               │
│               └データベースを見つけるために接続するホスト。
├─sqlite
│ │
│ │        ╔════════╗
│ └─sqlite:example.db
│          ╚╤═══════╝
│           └使用するローカル・データベース・ファイルへのパス。
└─sqlsrv
  │
  │               ╔═══════╗ ╔══╗          ╔═════╗
  └─sqlsrv:Server=localhost,1521;Database=example
                  ╚╤══════╝ ╚╤═╝          ╚╤════╝
                   │         │             └データベース使用する名前。
                   │         │
                   │         └ホストに接続するポート番号。
                   │
                   └データベースを見つけるために接続するホスト。
```

DSNの特定の部分に何を使用するかわからない場合は、何も変更せずに、DSNがそのまま機能するかどうかを最初に確認してください。

「`pdo_username`」と「`pdo_password`」は、データベース用に選択したユーザー名とパスワードと同じでなければならないことに注意してください。

#### <a name="AJAX_AJAJ_JSON"></a>私のアップロード機能性は非同期です（例えば、ajax、ajaj、json、などを使用します）。​アップロードがブロックされたときに特別なメッセージや警告が表示されません。​何が起こっていますか？

これは正常です。​phpMusselの標準の「アップロード拒否」ページはＨＴＭＬとして提供されます。​通常の同期リクエストには十分なはずですが、アップロード機能が他の何かを期待している場合はおそらく十分ではありません。​アップロード機能が非同期である場合、またはアップロード・ステータスが非同期で提供されることが予想される場合、phpMusselがアップロード機能のニーズに応えるためにできることはいくつかあります。

１.ＨＴＭＬ以外のものを提供するカスタム出力テンプレートを作成します。
２.カスタム・プラグインを作成して、標準の「アップロード拒否」ページを完全にバイパスし、アップロードがブロックされたときにアップロード・ハンドラーに別の処理を行わせます（この目的のためにアップローダー・ハンドラーによって提供されるいくつかのプラグイン・フックがあります）。
３.アップロード・ハンドラーを完全に無効にし、代わりにアップロード機能内からphpMussel APIを呼び出すだけです。

#### <a name="DETECT_EICAR"></a>phpMusselはEICARを検出できますか？

はい。​EICARを検出するためのシグネチャは、「phpMussel標準正規表現シグネチャ・ファイル」（`phpmussel_regex.db`）に含まれています。​そのシグネチャ・ファイルがインストールされてアクティブ化されている限り、phpMusselはEICARを検出できるはずです。​ClamAVデータベースには、特にEICARを検出するための多数のシグネチャも含まれているため、ClamAVはEICARを簡単に検出できます。​しかし、phpMusselはClamAVによって提供されるシグネチャ全体の一部のみを使用するため、phpMusselがEICARを検出するのに十分ではない可能性があります。​それを検出する機能は、実際のコンフィグレーションによっても異なる場合があります。

---


### １１.<a name="SECTION9"></a>法律情報

#### 9.0 セクション・プリアンブル

ドキュメンテーションのこのセクションは、パッケージの使用と実装に関する法律上の考慮事項を説明し、基本的な関連情報を提供することを目的としています。​これは、操作している国に存在する可能性のある法的要件の遵守を確実にする手段として、一部のユーザーにとって重要な場合があります。​一部のユーザーは、この情報に従ってウェブサイトポリシーを調整する必要があります。

まず、私（パッケージ作成者）は弁護士ではない、有資格の法律専門家でもないことを認識してください。​したがって、私は法律上のアドバイスを提供する法的資格はありません。​また、場合によっては、正確な法的要件は、国や地域によって異なる場合があります。​また、これらが競合することがあります​（例えば：[プライバシーの権利](https://ja.wikipedia.org/wiki/%E3%83%97%E3%83%A9%E3%82%A4%E3%83%90%E3%82%B7%E3%83%BC)を享受する国と[忘れられる権利](https://ja.wikipedia.org/wiki/%E5%BF%98%E3%82%8C%E3%82%89%E3%82%8C%E3%82%8B%E6%A8%A9%E5%88%A9)の場合には、拡張されたデータ保持を望む国と比較して）。​また、パッケージへのアクセスが特定の国や管轄区域に限定されているわけではないので、パッケージのユーザーベースは地理的に多様である可能性が高いと考えてください。​これらの点を考慮して、私はすべての点で、すべてのユーザーにとって「法的に準拠する」であることが何を意味するかを述べる立場にはいません。​ただし、ここに記載されている情報が、パッケージの文脈で法的に遵守するために必要な作業を自分で決定するのに役立つことを願っています。​疑義が存続する場合、または法的な観点から追加の助けと助言が必要な場合は、有資格の法律専門家に相談することをおすすめします。

#### 9.1 責任

パッケージ・ライセンスに記載されている通り、パッケージは無保証で提供されます。​これには、すべての責任範囲が含まれます（ただしこれに限定されません）。​あなたの便宜のためにパッケージが提供されています。​それが有用であり、それがあなたのためにいくつかの利益をもたらすことが期待されます。​しかし、あなたがパッケージを使用するか実装するかは、あなた自身の選択です。​あなたはパッケージを使用するよう強制されません。​しかし、あなたが決めるところでは、あなたはその決定に責任があります。​あなたの意思決定の結果について、私と他のパッケージ寄稿者は、直接的、間接的、暗示的、またはその他の方法にかかわらず、責任を負いません。

#### 9.2 第三者

その正確なコンフィギュレーションと実装に応じて、パッケージは場合によっては第三者と通信し、情報を共有することがあります。​この情報は、いくつかの国において、状況によっては、「[個人識別情報](https://ja.wikipedia.org/wiki/%E5%80%8B%E4%BA%BA%E6%83%85%E5%A0%B1)」（ＰＩＩ）と定義することができます。

これらの第三者がこの情報をどのように使用するかは、これらの第三者によって定められたさまざまなポリシーの対象となります。​このドキュメントの範囲外です。​ただし、このような場合は、これらの第三者との情報の共有を無効にすることができます。​そのような場合は、有効にすることを選択した場合、これらの第三者によるＰＩＩのプライバシー、セキュリティ、および使用に関する懸念事項を調査することは、おあなたの責任です。​ご不明な点がある場合、またはＰＩＩに関してこれらの第三者の行為に不満がある場合は、これらの第三者との情報の共有をすべて無効にすることが最善の方法です。

透明性のために、共有される情報のタイプと、誰と、以下に記載されています。

##### 9.2.1 ＵＲＬスキャナー

ファイルのアップロード内に見つかったＵＲＬは、パッケージ・コンフィギュレーションに応じて、Googleセーフ・ブラウジングAPIと共有できます。​Googleセーフ・ブラウジングAPIは、正常に動作するためにはAPIキーが必要です。​したがって、デフォルトでは無効になっています。

*関連するコンフィギュレーション・ディレクティブ：*
- `urlscanner` -> `google_api_key`

##### 9.2.2 VIRUS TOTAL （ウイルス・トータル）

phpMusselがファイルのアップロードをスキャンすると、そのように設定されていると、ファイルハッシュがVirus Total APIと共有される可能性があります。​将来、ある時点でファイル全体を共有できる計画がありますが、これはまだサポートされていません。​この機能を使用するには、ＡＰＩキーが必要です。

Virus Totalと共有される情報（ファイルおよび関連するファイルのメタデータを含む）は、研究目的で、パートナー、関連会社、その他さまざまな人々と共有することもできます。​これについては、プライバシー・ポリシーで詳しく説明しています。

*見る： [Privacy Policy &ndash; VirusTotal](https://support.virustotal.com/hc/en-us/articles/115002168385-Privacy-Policy)。*

*関連するコンフィギュレーション・ディレクティブ：*
- `virustotal` -> `vt_public_api_key`

#### 9.3 ロギング

ロギングは、多くの理由からphpMusselの重要な部分です。​ロギングせずに、偽陽性が発生した場合、それを診断して解決することは困難です。​ロギングせずに、phpMusselがいかに効果的に実行されているかを確かめること、その潜在的な問題を確認すること機能させるために必要なコンフィギュレーションやシグネチャの変更を決定するのが難しいことがあります。​いずれにせよ、ロギングは一部のユーザーには望ましくなく、完全にオプションです。​phpMusselでは、デフォルトでロギングは無効になっています。​これを有効にするには、それに応じてphpMusselを設定する必要があります。

ロギングが法的に許可されているかどうか、および法的に許容される範囲で​（例えば、ログに記録される可能性があるタイプの情報、期間、および状況）、​管轄区域およびphpMusselが実施されている状況に応じて変わる可能性がある​（例えば、あなたが個人として、企業として、商業的または非商業的に動作しているかどうか）。​したがって、このセクションを注意深く読んで役に立つかもしれない。

phpMusselが実行できる複数のタイプのロギングがあります。​異なるタイプのロギングには、さまざまな理由で異なるタイプの情報が含まれます。

##### 9.3.0 スキャン・ログ

パッケージ・コンフィギュレーションで有効にすると、phpMusselはスキャンするファイルのログを保持します。​このタイプのロギングは、２つの異なる形式で使用できます：
- 人間が読めるログ・ファイル。
- シリアライズされたログ・ファイル。

人間が読めるログ・ファイルに記録されたブロック・イベントは、通常次のようになります（例として）：

```
Sun, 19 Jul 2020 13:33:31 +0800 開始しています。
→ 「ascii_standard_testfile.txt」をチェックしています。
─→ phpMussel-Testfile.ASCII.Standardを検出しました（ascii_standard_testfile.txt）！
Sun, 19 Jul 2020 13:33:31 +0800 完了。
```

スキャン・ログ・エントリには、通常、次の情報が含まれます：
- ファイルがスキャンされた日時。
- スキャンしたファイルの名前。
- ファイル内で何が検出されたか（何かが検出された場合）。

*関連するコンフィギュレーション・ディレクティブ：*
- `general` -> `scan_log`
- `general` -> `scan_log_serialized`

これらのディレクティブを空のままにすると、このタイプのロギングは無効のままです。

##### 9.3.1 アップロード・ログ

パッケージ・コンフィギュレーションで有効にすると、phpMusselはブロックされたアップロードのログを保持します。

*例として：*

```
日時: Sun, 19 Jul 2020 13:33:31 +0800
ＩＰアドレス: 127.0.0.x
== スキャン結果（なぜそれが識別されるのか） ==
phpMussel-Testfile.ASCII.Standardを検出しました（ascii_standard_testfile.txt）！
== ハッシュ・シグネチャの再構築 ==
dcacac499064454218823fbabff7e09b5b011c0c877ee6f215f35bffb195b6e9:654:ascii_standard_testfile.txt
「1595142388-2e017ea9ac1478e45dc15794a1fc18c0.qfu」として検疫。
```

これらログ・エントリには通常、次の情報が含まれます。
- アップロードがブロックされた日時。
- アップロード元のＩＰアドレス。
- ファイルがブロックされた理由（検出されたもの）。
- ブロックされたファイルの名前。
- ブロックされたファイルのチェックサムとサイズ。
- ファイルが検疫されているかどうか、どのような名前が内部の使用されます。

*関連するコンフィギュレーション・ディレクティブ：*
- `web` -> `uploads_log`

##### 9.3.2 フロントエンド・ロギング

このロギングは、フロントエンドのログイン試行に関係します。​これは、ユーザーがフロントエンドにログインしようとするとき、およびフロントエンド・アクセスが有効な場合にのみ発生します。

フロントエンドのログ・エントリには、ログインしようとしているユーザーのＩＰアドレス、試行が行われた日時、試行の結果が含まれます（正常にログインしたか、ログインに失敗しました）。​フロントエンドのログ・エントリは通常、次のようになります（例として）。

```
x.x.x.x - Day, dd Mon 20xx hh:ii:ss +0000 - "admin" - ログインしました。
```

*関連するコンフィギュレーション・ディレクティブ：*
- `general` -> `frontend_log`

##### 9.3.3 ログ・ローテーション

一定期間後にログをパージしたい場合や、法律によってログをパージする必要がある場合があります（例えば、ログを保持することが法的に許可される時間は、法律によって制限される場合があります）。​ログ・ローテーションを使用すると、指定された制限を超えるとログ・ファイルに対して何らかのアクションを実行できます。​パッケージ・コンフィギュレーションで指定されたログ・ファイルの名前に日付/時刻マーカーを含めることし（例えば、`{yyyy}-{mm}-{dd}.log`）、ログ・ローテーションを有効にするで、これを行うことができます。

例えば：法的に３０日後にログを削除する必要がある場合は、ログ・ファイルの名前に`{dd}.log`を（`{dd}`は日を表す）指定し、`log_rotation_limit`の値を`30`に設定し、`log_rotation_action`の値を`Delete`に設定することができます。

逆に、長期間ログを保持する必要がある場合は、ログ・ローテーションを無効にするか、ログ・ファイルを圧縮するために`log_rotation_action`の値を`Archive`に設定することができます（占有するディスク・スペースの総量が削減されます）。

*関連するコンフィギュレーション・ディレクティブ：*
- `general` -> `log_rotation_limit`
- `general` -> `log_rotation_action`

##### 9.3.4 ログ切り捨て

必要に応じて、特定のサイズを超えた個々のログ・ファイルを切り捨てることができます。

*関連するコンフィギュレーション・ディレクティブ：*
- `general` -> `truncate`

##### 9.3.5 ＩＰアドレス・スドニマイゼーション

まず、あなたが用語に精通していない場合：​「スドニマイゼーション」（pseudonymisation）とは、補足情報なしで特定のデータ対象に特定できないような個人データの処理を指します​（ただし、そのような補足情報は、個人データが自然人に特定されないことを保証するために、個別に維持され、技術的および組織的措置を受けるものとします）。

次のリソースは詳細情報を提供します。
- [[trust-hub.com] What is pseudonymisation?](https://www.trust-hub.com/news/what-is-pseudonymisation/)
- [[Wikipedia] Pseudonymization](https://en.wikipedia.org/wiki/Pseudonymization)

場合によっては、収集、処理、または保存されたＰＩＩに対して「アノニマイゼーション」または「スドニマイゼーション」を実施することが法的に要求されることがあります。​このコンセプトはかなり以前から存在していましたが、ＧＤＰＲ/ＤＳＶＧＯは「スドニマイゼーション」を特に言及し、奨励しています。

必要に応じて、phpMusselはＩＰアドレスを記録するときにこれを行うことができます。​ログに記録されると、ＩＰｖ４アドレスの最後のオクテット、およびＩＰｖ６アドレスの２番目の部分の後のすべてが、「x」として表される。​これは、本質的には、ＩＰｖ４アドレスを２４番目のサブネット・ファクタの最初のアドレスに丸め、ＩＰｖ６アドレスを３２番目のサブネット・ファクタの最初のアドレスに丸めます。

*関連するコンフィギュレーション・ディレクティブ：*
- `legal` -> `pseudonymise_ip_addresses`

##### 9.3.6 統計 （スタティスティックス）

phpMusselは、オプションで、特定の時間以降にスキャンおよびブロックされたファイルの総数などの統計を追跡できます。​この機能はデフォルトで無効になっていますが、パッケージ・コンフィギュレーションで有効にすることができます。​追跡される情報のタイプはＰＩＩと見なすべきではない。

*関連するコンフィギュレーション・ディレクティブ：*
- `general` -> `statistics`

##### 9.3.7 暗号化 （エンクリプション）

phpMusselは、キャッシュまたはログ情報を[暗号化](https://ja.wikipedia.org/wiki/%E6%9A%97%E5%8F%B7)しません。​キャッシュとログの暗号化は、将来導入される可能性がありますが、現在のところ具体的な計画はありません。​権限のない第三者によるＰＩＩへのアクセスについて（例えば、キャッシュ、ログ）：​phpMusselは、一般にアクセス可能な場所にはインストールしないことをお勧めします（例えば、ほとんどのウェブサーバーで使用できる標準の`public_html`ディレクトリの外にphpMusselをインストールする）、​そして適切に制限された権限が強制されるようにする。​懸念が残っている場合は、phpMusselを設定して、この情報が収集または記録されないようにすることができます​（例えば、ロギングを無効にするなど）。

#### 9.4 COOKIES （クッキー）

ユーザーがフロントエンドに正常にログインすると、phpMusselは後続のリクエストのためにユーザーを覚えておくために[Cookie](https://ja.wikipedia.org/wiki/HTTP_cookie)を設定します（すなわち、Cookieはユーザーをログインセッションに認証するために使用されます）。​ログイン・ページでは、Cookieの警告が目立つように表示され、関連する操作を行った場合にCookieが設定されることをユーザーに警告します。​Cookieは、コードベースの他のどの場所にも設定されていません。

#### 9.5 マーケティングやアドバタイジング

phpMusselは、マーケティングやアドバタイジング目的で情報を収集または処理しません。​収集または記録された情報を販売したり、利益を得たりすることはありません。​phpMusselは商業的企業ではなく、商業的利益には関係しないので、これらのことは意味をなさないでしょう。​これは、プロジェクトの開始以来のケースであり、今日も引き続き行われています。​さらに、これらのことを行うことは、プロジェクトの精神と目的に沿ったものではなく、私がプロジェクトを維持し続ける限り、決して起こらないでしょう。

#### 9.6 プライバシー・ポリシー

場合によっては、ウェブサイトのすべてのページとセクションにプライバシー・ポリシーへのリンクを明確に表示することが法的に要求されることがあります。​これは、ユーザーが正確なプライバシー・プラクティス、収集するＰＩＩのタイプ、および使用する方法を十分に知らされていることを保証する手段として重要です。​このようなリンクをphpMusselの「アップロード拒否」ページに含めるには、プライバシー・ポリシーのＵＲＬを指定するためのコンフィギュレーション・ディレクティブが用意されています。

*関連するコンフィギュレーション・ディレクティブ：*
- `legal` -> `privacy_policy`

#### 9.7 GDPR/DSGVO

一般データ保護規制（ＧＤＰＲ）は、2018年5月25日に発効するＥＵの規制です。​規制の第一の目的は、ＥＵ市民および居住者に個人情報を管理させ、個人情報および個人情報に関するＥＵ内の規制を統一することです。

この規制には、ＥＵ（欧州連合）の「データ主体」（識別された、または識別可能な自然人）の「[個人識別情報](https://ja.wikipedia.org/wiki/%E5%80%8B%E4%BA%BA%E6%83%85%E5%A0%B1)」（ＰＩＩ）の処理に関する特定の規定が含まれています。​規制に準拠するためには、「企業」（規制によって定義されている）、関連するシステムおよびプロセスは、デフォルトで「<a href="https://ja.wikipedia.org/wiki/%E3%83%97%E3%83%A9%E3%82%A4%E3%83%90%E3%82%B7%E3%83%BC%E3%83%90%E3%82%A4%E3%83%87%E3%82%B6%E3%82%A4%E3%83%B3">プライバシー・バイ・デザイン</a>」を実装する必要があります、最高のプライバシー設定を使用する必要があります、格納された情報または処理された情報のためにセーフガードを実装する必要があります（「スドニマイゼーション」の実装またはデータの完全な「アノニマイゼーション」を含むがこれらに限定されません）、収集するデータの種類、処理方法、理由、保持期間、および第三者とこのデータを共有するかどうかを明確かつ明白に宣言する必要があります、第三者と共有されるデータの種類、方法、理由などが含まれます。

規制によって定義されているように、合法的な根拠がない限り、データを処理することはできません。​一般的に、これは、合法的な基準でデータ対象のデータを処理するためには、法的義務を遵守しなければならないを意味します、または明示され、十分に情報があり、明白な同意がデータ対象から得られた後にのみ行われる。

規制のいくつかの側面は時間とともに変化する可能性があります。​時代遅れの情報が広がらないようにするには、関係する情報をここに入れるのではなく、正式な情報源から規制について学ぶ方が良いでしょう（ここに含まれる情報が古くなる可能性があります）。

より多くの情報を習得するための推奨リソース：
- [GDPR（EU一般データ保護規制）とは | 語句説明・適用範囲・与える影響を解説](https://boxil.jp/mag/a4605/)
- [EU一般データ保護規則](https://ja.wikipedia.org/wiki/EU%E4%B8%80%E8%88%AC%E3%83%87%E3%83%BC%E3%82%BF%E4%BF%9D%E8%AD%B7%E8%A6%8F%E5%89%87)
- [GDPR（EU一般データ保護規制）対策](https://eizone.info/gdpr/)
- [REGULATION (EU) 2016/679 OF THE EUROPEAN PARLIAMENT AND OF THE COUNCIL](https://eur-lex.europa.eu/legal-content/EN/TXT/?uri=celex:32016R0679)
- [GDPRの対象となる個人データとは](https://www.eyjapan.jp/services/advisory/column/2017-06-06.html)

---


最終アップデート：２０２５年７月９日。
