## Dokumentation für phpMussel v3 (Deutsch).

### Inhalt
- 1. [VORWORT](#user-content-SECTION1)
- 2. [INSTALLATION](#user-content-SECTION2)
- 3. [BENUTZUNG](#user-content-SECTION3)
- 4. [ERWEITERUNG VON PHPMUSSEL](#user-content-SECTION4)
- 5. [EINSTELLUNGEN](#user-content-SECTION5)
- 6. [SIGNATURENFORMAT](#user-content-SECTION6)
- 7. [BEKANNTE KOMPATIBILITÄTSPROBLEME](#user-content-SECTION7)
- 8. [HÄUFIG GESTELLTE FRAGEN (FAQ)](#user-content-SECTION8)
- 9. [RECHTSINFORMATION](#user-content-SECTION9)

*Regarding translations: My native language is English. Because this is a free and open-source hobby project which generates zero income, and translatable content is likely to change as the features and functionality supported by the project changes, it doesn't make sense for me to spend money for translations. Because I'm the sole author/developer/maintainer for the project and I'm not a ployglot, any translations I produce are very likely to contain errors. Sorry, but realistically, that won't ever change. If you find any such errors/typos/mistakes/etc, your assistance to correct them would be very much appreciated. Pull requests are invited and encouraged. Otherwise, if you find these errors too much to handle, just stick with the original English source. If a translation is irredeemably incomprehensible, let me know which, and I can delete it. If you're not sure how to perform pull requests, ask. I can help.*

---


### 1. <a name="SECTION1"></a>VORWORT

Vielen Dank für die Benutzung von phpMussel, einem PHP-Script, um Trojaner, Viren, Malware und andere Bedrohungen in Dateien zu entdecken, die auf Ihr System hochgeladen werden könnten, welches die Signaturen von ClamAV und weitere nutzt.

[PHPMUSSEL](https://phpmussel.github.io/) COPYRIGHT 2013 und darüber hinaus GNU/GPLv2 by [Caleb M (Maikuolan)](https://github.com/Maikuolan).

Dieses Skript ist freie Software; Sie können Sie weitergeben und/oder modifizieren unter den Bedingungen der GNU General Public License, wie von der Free Software Foundation veröffentlicht; entweder unter Version 2 der Lizenz oder (nach Ihrer Wahl) jeder späteren Version. Dieses Skript wird in der Hoffnung verteilt, dass es nützlich sein wird, allerdings OHNE JEGLICHE GARANTIE; ohne implizite Garantien für VERMARKTUNG/VERKAUF/VERTRIEB oder FÜR EINEN BESTIMMTEN ZWECK. Lesen Sie die GNU General Public License für weitere Details, in der Datei `LICENSE.txt`, ebenfalls verfügbar auf:
- <https://www.gnu.org/licenses/>.
- <https://opensource.org/licenses/>.

Besonderer Dank geht an [ClamAV](https://www.clamav.net/) für die Inspiration und die Signaturen, die dieses Script benutzt, ohne die dieses Script wahrscheinlich nicht existieren würde oder bestenfalls einen sehr begrenzten Wert hätte.

Besonderer Dank geht auch an GitHub und Bitbucket für das Hosten der Projektdateien, und an die weiteren Quellen einiger von phpMussel verwendeten Signaturen: [PhishTank](https://www.phishtank.com/), [NLNetLabs](https://nlnetlabs.nl/) und andere, und Besonderer Dank geht an alle diejenigen die das Projekt unterstützen werden, an andere nicht erwähnte Personen, und an Sie, für die Verwendung des Scripts.

---


### 2. <a name="SECTION2"></a>INSTALLATION

#### 2.0 INSTALLATION MIT COMPOSER

Die empfohlene Methode zur Installation von phpMussel v3 ist Composer.

Einfachheitshalber, können Sie die am häufigsten benötigten phpMussel-Abhängigkeiten über das alte phpMussel-Hauptrepository installieren:

`composer require phpmussel/phpmussel`

Alternativ können Sie individuell auswählen, welche Abhängigkeiten Sie bei Ihrer Implementierung benötigen. Es ist durchaus möglich, dass Sie nur bestimmte Abhängigkeiten möchten und nicht alles benötigen.

Um etwas mit phpMussel zu tun, benötigen Sie die phpMussel-Core codebasis:

`composer require phpmussel/core`

Bietet eine Front-End-Verwaltungsfunktion für phpMussel:

`composer require phpmussel/frontend`

Bietet automatisches Scannen des Datei-Uploads für Ihre Website:

`composer require phpmussel/web`

Bietet die Möglichkeit, phpMussel als interaktive CLI-Modus-Anwendung zu verwenden:

`composer require phpmussel/cli`

Bietet eine Brücke zwischen phpMussel und PHPMailer, sodass phpMussel PHPMailer für die Zwei-Faktor-Authentifizierung, E-Mail-Benachrichtigung über blockierte Datei-Uploads u.s.w. verwenden kann:

`composer require phpmussel/phpmailer`

Damit phpMussel etwas erkennen kann, müssen Sie Signaturen installieren. Dafür gibt es kein spezielles Paket. Informationen zum Installieren von Signaturen finden Sie im nächsten Abschnitt dieses Dokuments.

Wenn Sie Composer nicht verwenden möchten, können Sie alternativ vorgefertigte ZIPs von hier herunterladen:

https://github.com/phpMussel/Examples

Die vorgefertigten ZIPs enthalten alle oben genannten Abhängigkeiten sowie alle Standard-phpMussel-Signaturdateien sowie einige Beispiele für die Verwendung von phpMussel bei Ihrer Implementierung.

#### <a name="INSTALLING_SIGNATURES"></a>2.1 SIGNATUREN INSTALLIEREN

Signaturen werden von phpMussel benötigt, um bestimmte Bedrohungen zu erkennen. Es gibt 2 Hauptmethoden, um Signaturen zu installieren:

1. Signaturen mit „SigTool“ generieren und manuell installieren.
2. Signaturen aus "phpMussel/Signatures" oder "phpMussel/Examples" herunterladen und manuell installieren.

##### 2.1.0 Signaturen mit „SigTool“ generieren und manuell installieren.

*Sehen: [SigTool Dokumentation](https://github.com/phpMussel/SigTool#documentation).*

*Beachten Sie auch: SigTool verarbeitet nur die Signaturen von ClamAV. Um Signaturen aus anderen Quellen zu erhalten, z.B. diejenigen die speziell für phpMussel geschriebenen, die einschließlich der zum Nachweis der Testproben von phpMussel erforderlichen Signaturen, muss diese Methode durch eine der anderen hier genannten Methoden ergänzt werden.*

##### 2.1.1 Signaturen aus "phpMussel/Signatures" oder "phpMussel/Examples" herunterladen und manuell installieren.

Zuerst, nach [phpMussel/Signatures](https://github.com/phpMussel/Signatures) gehen. Das Repository enthält verschiedene GZ-komprimierte Signaturdateien. Laden Sie die Dateien herunter, die du brauchst, dekomprimieren und kopieren Sie die dekomprimierten Dateien in das Signatur-Verzeichnis Ihrer Installation.

Alternativ können Sie die neueste ZIP-Datei von [phpMussel/Examples](https://github.com/phpMussel/Examples) herunterladen. Sie können dann die Signaturen aus diesem Archiv in Ihre Installation kopieren/einfügen.

---


### 3. <a name="SECTION3"></a>BENUTZUNG

#### 3.0 PHPMUSSEL KONFIGURIEREN

Nach der Installation von phpMussel benötigen Sie eine Konfigurationsdatei, damit Sie diese konfigurieren können. phpMussel-Konfigurationsdateien können entweder als INI- oder YML-Dateien formatiert werden. Wenn Sie mit einer der Beispiel-ZIPs arbeiten, stehen Ihnen bereits zwei Beispielkonfigurationsdateien zur Verfügung, `phpmussel.ini` und `phpmussel.yml`. Wenn Sie möchten, können Sie eine davon auswählen, aus der Sie arbeiten möchten. Wenn Sie nicht mit einer der Beispiel-ZIPs arbeiten, müssen Sie eine neue Datei erstellen.

Wenn Sie mit der Standardkonfiguration für phpMussel zufrieden sind und nichts ändern möchten, können Sie eine leere Datei als Konfigurationsdatei verwenden. Alles, was nicht von Ihrer Konfigurationsdatei konfiguriert wurde, verwendet die Standardeinstellung. Sie müssen also nur explizit etwas konfigurieren, wenn Sie möchten, dass es sich von der Standardeinstellung unterscheidet (das heißt, eine leere Konfigurationsdatei führt dazu, dass phpMussel die gesamte Standardkonfiguration verwendet).

Wenn Sie das phpMussel-Frontend verwenden möchten, können Sie alles auf das Frontend-Konfigurationsseite konfigurieren. Ab v3 werden die Frontend-Anmeldeinformationen jedoch in Ihrer Konfigurationsdatei gespeichert, also um sich das Frontend einzuloggen, müssen Sie mindestens ein Konto konfigurieren, um sich einzuloggen, und von dort aus können Sie sich einloggen und auf das Frontend-Konfigurationsseite alles andere konfigurieren.

In den folgenden Auszügen wird ein neues Konto im Front-End mit dem Benutzernamen „admin“ und dem Kennwort „password“ hinzugefügt.

Für INI-Dateien:

```INI
[user.admin]
password='$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK'
permissions='1'
```

Für YML-Dateien:

```YAML
user.admin:
 password: "$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK"
 permissions: 1
```

Sie können Ihre Konfiguration beliebig benennen (solange Sie die Erweiterung beibehalten, damit phpMussel weiß, welches Format es verwendet), und Sie können es speichern, wo immer Sie wollen. Sie können phpMussel mitteilen, wo sich Ihre Konfigurationsdatei befindet, indem Sie beim Instanziieren des Loaders den Pfad angeben. Wenn kein Pfad angegeben wird, versucht phpMussel ihm im das übergeordneten Verzeichnis des vendor zu finden.

In einigen Umgebungen wie Apache ist es sogar möglich, einen Punkt vor Ihrer Konfiguration zu platzieren, um ihn auszublenden und den öffentlichen Zugriff zu verhindern.

Für weitere Informationen zu finden verweisen Sie den Konfigurationsabschnitt dieses Dokuments.

#### 3.1 PHPMUSSEL CORE

Unabhängig davon, wie Sie phpMussel verwenden möchten, enthält fast jede Implementierung mindestens Folgendes:

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
```

Wie die Namen dieser Klassen andeuten, der Loader ist für die Vorbereitung der Grundbedürfnisse der Verwendung von phpMussel verantwortlich, und der Scanner ist für alle zentralen Scanfunktionen verantwortlich.

Der Konstruktor für den Loader akzeptiert fünf Parameter, alle optional.

```PHP
public function __construct(
    string $ConfigurationPath = '',
    string $CachePath = '',
    string $QuarantinePath = '',
    string $SignaturesPath = '',
    string $VendorPath = ''
)
```

Der erste Parameter ist der vollständige Pfad zu Ihrer Konfigurationsdatei. Wenn dies weggelassen wird, versucht phpMussel im übergeordneten Verzeichnis des vendor nach einer Konfigurationsdatei mit dem Namen `phpmussel.ini` oder `phpmussel.yml`.

Der zweite Parameter ist der Pfad zu einem Verzeichnis, das phpMussel zum Zwischenspeichern und zum temporären Speichern von Dateien verwenden darf. Wenn dies weggelassen wird, versucht phpMussel im übergeordneten Verzeichnis des vendor ein neues Verzeichnis mit dem Namen `phpmussel-cache` zu erstellen. Wenn Sie diesen Pfad selbst angeben möchten, wählen Sie am besten ein leeres Verzeichnis, um den unerwünschten Verlust anderer Daten im angegebenen Verzeichnis zu vermeiden.

Der dritte Parameter ist der Pfad zu einem Verzeichnis, das phpMussel für seine Quarantäne verwenden darf. Wenn dies weggelassen wird, versucht phpMussel im übergeordneten Verzeichnis des vendor ein neues Verzeichnis mit dem Namen `phpmussel-quarantine` zu erstellen. Wenn Sie diesen Pfad selbst angeben möchten, wählen Sie am besten ein leeres Verzeichnis, um den unerwünschten Verlust anderer Daten im angegebenen Verzeichnis zu vermeiden. Es wird dringend empfohlen, den öffentlichen Zugriff auf Verzeichnis das für die Quarantäne verwendete zu verhindern.

Der vierte Parameter ist der Pfad zu dem Verzeichnis, das die Signaturdateien für phpMussel enthält. Wenn dies weggelassen wird, versucht phpMussel im übergeordneten Verzeichnis des vendor nach den Signaturdateien in einem Verzeichnis mit dem Namen `phpmussel-signatures` zu suchen.

Der fünfte Parameter ist der Pfad zu Ihrem vendor-Verzeichnis. Es sollte niemals auf etwas anderes hinweisen. Wenn nicht angegeben, versucht phpMussel dieses Verzeichnis für sich selbst zu finden. Dieser Parameter wird bereitgestellt, um die Integration in Implementierungen zu erleichtern, die möglicherweise nicht unbedingt dieselbe Struktur wie ein typisches Composer-Projekt haben.

Der Konstruktor für den Scanner akzeptiert nur einen Parameter und ist obligatorisch: Das instanziierte Loader-Objekt. Da es als Referenz übergeben wird, muss der Loader zu einer Variablen instanziiert werden (die Instanziierung des Loaders direkt in den Scanner als ein Wert zu übergeben ist nicht die richtige Art um phpMussel zu verwenden).

```PHP
public function __construct(\phpMussel\Core\Loader &$Loader)
```

#### 3.2 AUTOMATISCHES SCANNEN DES DATEI-UPLOADS

Instanziieren des Upload-Handlers:

```PHP
$Web = new \phpMussel\Web\Web($Loader, $Scanner);
```

Scannen von Datei-Uploads:

```PHP
$Web->scan();
```

Optional kann phpMussel versuchen, die Namen von Uploads zu reparieren, falls etwas nicht stimmt, wenn Sie möchten:

```PHP
$Web->demojibakefier();
```

Als vollständiges Beispiel:

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

*Beim Uploaden von `ascii_standard_testfile.txt`, einem harmlosen Beispiel das ausschließlich zum Testen von phpMussel bereitgestellt wird:

![Screenshot](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/web-v3.0.0-alpha2.png)

#### 3.3 CLI-MODUS

Instanziieren des CLI-Handlers:

```PHP
$CLI = new \phpMussel\CLI\CLI($Loader, $Scanner);
```

Als vollständiges Beispiel:

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

![Screenshot](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/cli-v3.4.1.png)

#### 3.4 FRONTEND

Instanziieren des Frontends:

```PHP
$FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
```

Als vollständiges Beispiel:

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

#### 3.5 SCANNER-API

Sie können die phpMussel-Scanner-API auch in anderen Programmen und Skripten implementieren, wenn Sie möchten.

Als vollständiges Beispiel:

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

Der wichtige Teil dieses Beispiels ist die `scan()`-Methode. Die `scan()`-Methode akzeptiert zwei Parameter:

```PHP
public function scan(mixed $Files, int $Format = 0): mixed
```

Der erste Parameter kann eine String oder ein Array sein und teilt dem Scanner mit, was gescannt werden soll. Es kann sich um eine String handeln, die eine bestimmte Datei oder ein bestimmtes Verzeichnis angibt, oder um ein Array solcher Zeichenfolgen, um mehrere Dateien/Verzeichnisse anzugeben.

Als String sollte es zeigen, wo sich die Daten befinden. Als Array sollten die Array-Schlüssel die ursprünglichen Namen der zu scannenden Elemente angeben, und die Werte sollten darauf verweisen, wo sich die Daten befinden.

Der zweite Parameter ist eine Integer/Ganzzahl und teilt dem Scanner mit, wie er seine Scanergebnisse zurückgeben soll.

Geben Sie 1 an, um die Scanergebnisse als Array für jedes als Integer/Ganzzahl gescannte Element zurückzugeben.

Diese Integers/Ganzzahlen haben folgende Bedeutung:

Ergebnisse | Beschreibung
--:|:--
-5 | Zeigt an, dass der Scan aus anderen Gründen nicht abgeschlossen werden konnte.
-4 | Zeigt an, dass Daten aufgrund der Verschlüsselung nicht gescannt werden konnten.
-3 | Zeigt an, dass es Probleme mit den phpMussel Signaturdateien gibt.
-2 | Zeigt an, dass beschädigte Dateien gefunden wurden und der Scan nicht abgeschlossen wurde.
-1 | Zeigt an, dass fehlende Erweiterungen oder Addons von PHP benötigt werden, um den Scan durchzuführen und der Scan deshalb nicht abgeschlossen wurde.
0 | Zeigt an, dass das Ziel nicht existiert und somit nichts überprüft werden konnte.
1 | Zeigt an, dass das Ziel erfolgreich geprüft wurde und keine Probleme erkannt wurden.
2 | Zeigt an, dass das Ziel erfolgreich geprüft wurde, jedoch Probleme gefunden wurden.

Geben Sie 2 um die Scanergebnisse als Booleschen Wert zurückzugeben an.

Ergebnisse | Beschreibung
:-:|:--
`true` | Probleme wurden erkannt (Scan-Ziel ist schlecht/gefährlich).
`false` | Probleme wurden nicht erkannt (Scan-Ziel ist wahrscheinlich in Ordnung).

Geben Sie 3 um die Scanergebnisse als Array für jedes Element als menschlich lesbarer Text gescannte zurückzugeben an.

*Beispielausgabe:*

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

Geben Sie 4 um die Scanergebnisse als Zeichenfolge mit lesbarem Text zurückzugeben an (wie 3, aber implodiert).

*Beispielausgabe:*

```
Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)! Detected phpMussel-Testfile.CoEx (coex_testfile.rtf)! Detected encrypted archive; Encrypted archives not permitted (encrypted.zip)!
```

Geben Sie *jede anderen Wert* um formatierten Text zurückzugeben an (d.h., die Scanergebnisse dass wenn Verwendung von CLI gesehen werden).

*Beispielausgabe:*

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

*Siehe auch: [Wie man spezifische Details über Dateien zugreifen, wenn sie gescannt werden?](#user-content-SCAN_DEBUGGING)*

#### 3.6 ZWEI-FAKTOR-AUTHENTIFIZIERUNG

Es ist möglich, das Frontend sicherer zu machen, indem Sie die Zwei-Faktor-Authentifizierung ("2FA") aktivieren. Wenn Sie sich bei einem 2FA-aktivierten Konto eingeloggt, wird eine E-Mail an die mit diesem Konto verknüpfte E-Mail-Adresse gesendet. Diese E-Mail enthält einen „2FA-Code“, den der Nutzer zusätzlich zum Benutzernamen und Passwort eingeben muss, um sich mit diesem Konto einloggen zu können. Das bedeutet, dass das Erlangen eines Kontopassworts nicht ausreicht, damit sich ein Hacker oder potentieller Angreifer in diesem Konto einloggen kann, da sie auch bereits Zugriff auf die mit diesem Konto verknüpfte E-Mail-Adresse haben müssen, um den mit der Sitzung verbundenen 2FA-Code empfangen und verwenden zu können, dadurch wird das Frontend sicherer.

Nachdem Sie PHPMailer installiert haben, müssen Sie die Konfigurationsdirektiven für PHPMailer über die phpMussel-Konfigurationsseite oder Konfigurationsdatei auffüllen. Weitere Informationen zu diesen Konfigurationsanweisungen finden Sie im Konfigurationsabschnitt dieses Dokuments. Nachdem Sie die PHPMailer-Konfigurationsdirektiven gefüllt haben, setzen Sie `enable_two_factor` auf `true`. Die Zwei-Faktor-Authentifizierung sollte jetzt aktiviert sein.

Nächst, müssen Sie eine E-Mail-Adresse mit einem Konto verknüpfen, damit phpMussel bei der Einloggen mit diesem Konto weiß, wohin die 2FA-Codes gesendet werden müssen. Um dies zu tun, verwenden Sie die E-Mail-Adresse als Nutzername für das Konto (wie `foo@bar.tld`), oder fügen Sie die E-Mail-Adresse als Teil des Benutzernamens genauso ein wie beim normalen Senden einer E-Mail (wie `Foo Bar <foo@bar.tld>`).

---


### 4. <a name="SECTION4"></a>ERWEITERUNG VON PHPMUSSEL

phpMussel wurde unter Berücksichtigung der Erweiterbarkeit entwickelt. Pull-Anfragen an eines der Repositories der phpMussel-Organisation und [Beiträge](https://github.com/phpMussel/.github/blob/master/CONTRIBUTING.md) im Allgemeinen sind immer willkommen. phpMussel kann auch für Ihre eigenen individuellen Bedürfnisse geändert oder erweitert werden wenn Sie wünschen (z.B., für Änderungen oder Erweiterungen, die für Ihre Implementierung spezifisch sind, und die aufgrund von Vertraulichkeits oder Datenschutzanforderungen in Ihrem Unternehmen nicht veröffentlicht werden können, oder für die vorzugsweise in ihrem eigenen Repository veröffentlicht werden könnten, zum Beispiel für Plugins und neue Composer-Pakete für die phpMussel erforderlich ist).

Seit v3 existieren alle phpMussel-Funktionen als Klassen, was in einigen Fällen bedeutet dass die von PHP bereitgestellten [Objekt-Vererbungsmechanismen](https://www.php.net/manual/de/language.oop5.inheritance.php) eine einfache und angemessene Möglichkeit phpMussel zu erweitern sein können.

phpMussel bietet auch eigene Mechanismen zur Erweiterbarkeit. Vor v3 war der bevorzugte Mechanismus das integrierte Plugin-System für phpMussel. Seit v3 ist der bevorzugte Mechanismus der Ereignis-Orchestrator.

Boilerplate-Code zum Erweiterung von phpMussel und zum Schreiben neuer Plugins ist im [Boilerplates-Repository](https://github.com/phpMussel/plugin-boilerplates) öffentlich verfügbar. Enthalten sind auch eine Liste aller [derzeit unterstützten Ereignisse](https://github.com/phpMussel/plugin-boilerplates/tree/master/boilerplate-v3#currently-supported-events) und detailliertere Anweisungen zur Verwendung des Boilerplate-Codes.

Die Struktur des v3-Boilerplate-Codes ist identisch mit der Struktur einer Reihe anderer Dinge in der phpMussel-Organisation. Das ist kein Zufall. Wann immer möglich, würde ich empfehlen den v3-Boilerplate-Code für Erweiterungszwecke zu verwenden und ähnliche Entwurfsprinzipien wie bei phpMussel v3 selbst zu verwenden. Wenn Sie Ihre neue Erweiterung oder Ihr neues Plugin veröffentlichen möchten, können Sie die Composer-Unterstützung dafür integrieren. Es sollte dann theoretisch für andere möglich sein, Ihre Erweiterung oder Ihr Plugin genauso zu verwenden wie phpMussel v3 selbst, indem Sie es einfach zusammen mit benötigen ihre anderen Composer-Abhängigkeiten und Anwenden aller erforderlichen Ereignishandler bei ihrer Implementierung. (Natürlich, vergessen Sie nicht Ihren Veröffentlichungen Anweisungen beizufügen, damit andere kann über eventuell erforderliche Event-Handler und andere Informationen die für die korrekte Installation und Verwendung Ihrer Publikation erforderlich sind informiert werden).

---


### 5. <a name="SECTION5"></a>EINSTELLUNGEN

Das Folgende ist eine Liste der Konfigurationsanweisungen die von phpMussel akzeptiert werden mit einer kurzen Beschreibung ihrer Funktionen.

```
Konfiguration (v3)
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

#### „core“ (Kategorie)
Allgemeine Konfiguration (jede Kernkonfiguration, die nicht zu anderen Kategorien gehört).

##### „scan_log“ `[string]`
- Name einer Datei zum Aufzeichnen aller Resultate von Überprüfungen. Geben Sie einen Dateinamen an oder lassen Sie die Option zum Deaktivieren leer.

##### „scan_log_serialized“ `[string]`
- Name einer Datei zum Aufzeichnen aller Resultate von Überprüfungen (Format ist serialisiert). Geben Sie einen Dateinamen an oder lassen Sie die Option zum Deaktivieren leer.

##### „error_log“ `[string]`
- Einer Datei zum Protokollieren aller erkannten Fehler, die nicht schwerwiegend sind. Geben Sie einen Dateinamen an oder lassen Sie die Option zum Deaktivieren leer.

##### „outbound_request_log“ `[string]`
- Eine Datei zum Protokollieren der Ergebnisse aller ausgehenden Anforderungen. Geben Sie einen Dateinamen an oder lassen Sie die Option zum Deaktivieren leer.

##### „truncate“ `[string]`
- Trunkate Protokolldateien, wenn sie eine bestimmte Größe erreichen? Wert ist die maximale Größe in B/KB/MB/GB/TB, die eine Protokolldatei wachsen kann, bevor sie trunkiert wird. Der Standardwert von 0KB deaktiviert die Trunkierung (Protokolldateien können unbegrenzt wachsen). Hinweis: Gilt für einzelne Protokolldateien! Die Größe der Protokolldateien gilt nicht als kollektiv.

##### „log_rotation_limit“ `[int]`
- Die Protokollrotation begrenzt die Anzahl der Protokolldateien, die gleichzeitig vorhanden sein dürfen. Wenn neue Protokolldateien erstellt werden, und wenn die Gesamtzahl der Protokolldateien den angegebenen Limit überschreitet, wird die angegebene Aktion ausgeführt. Sie können hier das gewünschte Limit angeben. Ein Wert von 0 deaktiviert die Protokollrotation.

##### „log_rotation_action“ `[string]`
- Die Protokollrotation begrenzt die Anzahl der Protokolldateien, die gleichzeitig vorhanden sein sollten. Wenn neue Protokolldateien erstellt werden, und wenn die Gesamtzahl der Protokolldateien den angegebenen Limit überschreitet, wird die angegebene Aktion ausgeführt. Sie können hier die gewünschte Aktion angeben.

```
log_rotation_action
├─Delete ("Löschen Sie die ältesten Protokolldateien, bis das Limit nicht mehr überschritten wird.")
└─Archive ("Zuerst archivieren, und dann löschen Sie die ältesten Protokolldateien, bis das Limit nicht mehr überschritten wird.")
```

##### „timezone“ `[string]`
- Gibt welche Zeitzone verwendet werden soll an (z.B., Africa/Cairo, America/New_York, Asia/Tokyo, Australia/Perth, Europe/Berlin, Pacific/Guam, u.s.w.). Damit PHP dies automatisch für Sie erledigt, geben Sie „SYSTEM“ an.

```
timezone
├─SYSTEM ("System Standard-Zeitzone verwenden.")
├─UTC ("UTC")
└─…Andere
```

##### „time_offset“ `[int]`
- Zeitzonenversatz in Minuten.

##### „time_format“ `[string]`
- Das Datumsformat verwendet von phpMussel. Zusätzliche Optionen können auf Anfrage hinzugefügt werden.

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
└─…Andere
```

##### „ipaddr“ `[string]`
- Ort der IP-Adresse der aktuellen Verbindung im gesamten Datenstrom (nützlich für Cloud-Services). Standardeinstellung = REMOTE_ADDR. ACHTUNG: Ändern Sie diesen Wert nur, wenn Sie wissen, was Sie tun!

```
ipaddr
├─HTTP_INCAP_CLIENT_IP ("HTTP_INCAP_CLIENT_IP (Incapsula)")
├─HTTP_CF_CONNECTING_IP ("HTTP_CF_CONNECTING_IP (Cloudflare)")
├─CF-Connecting-IP ("CF-Connecting-IP (Cloudflare)")
├─HTTP_X_FORWARDED_FOR ("HTTP_X_FORWARDED_FOR (Cloudbric)")
├─X-Forwarded-For ("X-Forwarded-For (Squid)")
├─Forwarded ("Forwarded")
├─REMOTE_ADDR ("REMOTE_ADDR (Standardeinstellung)")
└─…Andere
```

Siehe auch:
- [NGINX Reverse Proxy](https://docs.nginx.com/nginx/admin-guide/web-server/reverse-proxy/)
- [Squid configuration directive forwarded_for](http://www.squid-cache.org/Doc/config/forwarded_for/)
- [Forwarded - HTTP \| MDN](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Forwarded)

##### „delete_on_sight“ `[bool]`
- Diese Option weist das Script an, Dateien während eines Scans sofort zu löschen, wenn ein Erkennungsmerkmal, ob durch Signaturen oder andere Methoden, zutrifft. Dateien, die als nicht infiziert eingestuft werden, werden nicht berührt. Im Falle von Archiven wird das gesamte Archiv gelöscht, auch wenn nur eine einzige Datei im Archiv infiziert sein sollte. Normalerweise ist es bei einem Dateiupload nicht notwendig, diese Option zu aktivieren, da PHP nach der Ausführung von Scripten den Inhalt vom Cache löscht, d.h. PHP löscht jede Datei, die über den Server hochgeladen wird, sofern Sie nicht verschoben, kopiert oder bereits gelöscht wurde. Diese Option wurde als zusätzliches Maß an Sicherheit hinzugefügt, außerdem für Systeme, deren PHP-Installation nicht dem üblichen Verhalten entspricht. False = Nach der Überprüfung wird die Datei so belassen [Standardeinstellung]; True = Nach der Überprüfung wird die Datei sofort gelöscht, sofern Sie infiziert ist.

##### „lang“ `[string]`
- Gibt die Standardsprache für phpMussel an.

```
lang
├─af ("Afrikaans")
├─ar ("العربية")
├─bg ("Български")
├─bn ("বাংলা")
├─cs ("Čeština")
├─de ("Deutsch")
├─en ("English (AU/GB/NZ)")
├─en-CA ("English (CA)")
├─en-US ("English (US)")
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
├─pa ("ਪੰਜਾਬੀ")
├─pl ("Polski")
├─pt-BR ("Português (Brasil)")
├─pt-PT ("Português (Europeu)")
├─ro ("Română")
├─ru ("Русский")
├─sv ("Svenska")
├─ta ("தமிழ்")
├─th ("ภาษาไทย")
├─tr ("Türkçe")
├─uk ("Українська")
├─ur ("اردو")
├─vi ("Tiếng Việt")
├─zh-CN ("中文（简体）")
└─zh-TW ("中文（傳統）")
```

##### „lang_override“ `[bool]`
- Nach HTTP_ACCEPT_LANGUAGE lokalisieren wann möglich? True = Ja [Standardeinstellung]; False = Nein.

##### „scan_cache_expiry“ `[int]`
- Für wie lange soll phpMussel die Scan-Ergebnisse zwischenspeichern? Wert entspricht der Anzahl Sekunden, wie lange die Scan-Ergebnisse zwischengespeichert werden. Standard ist 21600 Sekunden (6 Stunden); Ein Wert von 0 wird das Zwischenspeichern von Scan-Ergebnissen deaktivieren.

##### „maintenance_mode“ `[bool]`
- Deaktiviert alles andere als das Frontend. Manchmal nützlich für die Aktualisierung Ihrer CMS, Frameworks, u.s.w. Wartungsmodus aktivieren? True = Ja; False = Nein [Standardeinstellung].

##### „statistics“ `[bool]`
- phpMussel-Nutzungsstatistiken verfolgen? True = Ja; False = Nein [Standardeinstellung].

##### „hide_version“ `[bool]`
- Versionsinformationen aus Protokollen und Seitenausgabe ausblenden? True = Ja; False = Nein [Standardeinstellung].

##### „disabled_channels“ `[string]`
- Dies kann verwendet werden, um zu verhindern, dass phpMussel beim Senden von Anforderungen bestimmte Kanäle verwendet.

```
disabled_channels
├─GitHub ("GitHub")
├─BitBucket ("BitBucket")
├─VirusTotal_HTTPS ("VirusTotal (HTTPS)")
└─VirusTotal_HTTP ("VirusTotal (HTTP)")
```

##### „default_timeout“ `[int]`
- Standardzeitlimit für externe Anforderungen? Standardeinstellung = 12 Sekunden.

#### „signatures“ (Kategorie)
Konfiguration für Signaturen, Signaturdateien, u.s.w.

##### „active“ `[string]`
- Eine Liste der aktiven Signaturdateien, die durch Kommas getrennt sind. Hinweis: Signaturdateien müssen zuerst installiert werden, bevor Sie sie aktivieren können. Damit die Testdateien erkannt werden, müssen die phpMussel-Signaturdateien installiert sein.

##### „fail_silently“ `[bool]`
- Reaktion von phpMussel auf fehlende oder defekte Signaturen. Ist `fail_silently` deaktiviert, werden fehlende oder defekte Signaturen während des Scanvorgangs gemeldet, ist `fail_silently` aktiviert, werden fehlende oder defekte Signaturen ignoriert, ohne dass entsprechende Probleme gemeldet werden. Diese Option sollte so belassen werden, es sei denn, Sie erwarten Abstürze oder ähnliches. False = Deaktiviert; True = Aktiviert [Standardeinstellung].

##### „fail_extensions_silently“ `[bool]`
- Soll phpMussel melden, wenn Dateierweiterungen fehlen? Wenn `fail_extensions_silently` deaktiviert ist, werden fehlende Dateierweiterungen beim Scannen gemeldet und wenn `fail_extensions_silently` aktiviert ist, werden fehlende Dateierweiterungen ignoriert und beim Scan gemeldet, dass es mit diesen Dateien keine Probleme gibt. Das Deaktivieren dieser Anweisung kann möglicherweise deine Sicherheit erhöhen, kann aber auch zu mehr Falschmeldungen führen. False = Deaktiviert; True = Aktiviert [Standardeinstellung].

##### „detect_adware“ `[bool]`
- Soll phpMussel Signaturen für die Erkennung von Adware parsen? False = Nein; True = Ja [Standardeinstellung].

##### „detect_joke_hoax“ `[bool]`
- Soll phpMussel Signaturen für die Erkennung von Scherz/Fake-Malware/Viren parsen? False = Nein; True = Ja [Standardeinstellung].

##### „detect_pua_pup“ `[bool]`
- Soll phpMussel Signaturen für die Erkennung von PUAs/PUPs parsen? False = Nein; True = Ja [Standardeinstellung].

##### „detect_packer_packed“ `[bool]`
- Soll phpMussel Signaturen für die Erkennung von Packern und komprimierten Daten parsen? False = Nein; True = Ja [Standardeinstellung].

##### „detect_shell“ `[bool]`
- Soll phpMussel Signaturen für die Erkennung von Shell-Scripten parsen? False = Nein; True = Ja [Standardeinstellung].

##### „detect_deface“ `[bool]`
- Soll phpMussel Signaturen für die Erkennung von Defacements und Defacer parsen? False = Nein; True = Ja [Standardeinstellung].

##### „detect_encryption“ `[bool]`
- Soll phpMussel verschlüsselte Dateien erkennen und blockieren? False = Nein; True = Ja [Standardeinstellung].

##### „heuristic_threshold“ `[int]`
- Es gibt bestimmte Signaturen in phpMussel, die dazu dienen, verdächtige und potenziell bösartige Eigenschaften von hochgeladenen Dateien zu identifizieren, ohne diese Dateien an sich zu überprüfen und als bösartig zu identifizieren. Diese Direktive teilt phpMussel mit, welche Gewichtung von verdächtigen und potenziell bösartigen Eigenschaften zulässig ist, bevor diese Dateien als bösartig gekennzeichnet werden. Die Definition des Gewichts ist in diesem Zusammenhang die Gesamtzahl der verdächtigen und potenziell bösartigen Eigenschaften. Standardwert ist 3. Ein niedriger Wert in der Regel führt zu einem vermehrten Auftreten von Fehlalarmen und eine größere Anzahl von schädlichen Dateien werden erkannt, während ein höherer Wert weniger Fehlalarme auslöst und eine geringere Anzahl von schädlichen Dateien markiert werden. Dieser Wert sollte so belassen werden, es sei denn, Sie erkennen Probleme, die durch diese Einstellung hervorgerufen werden.

#### „files“ (Kategorie)
Einzelheiten zum Umgang mit Dateien beim Scannen.

##### „filesize_limit“ `[string]`
- Begrenzung der Dateigröße in KB. 65536 = 64MB [Standardeinstellung]; 0 = Keine Begrenzung (wird immer zur Greylist hinzugefügt), jeder (positive) numerische Wert wird akzeptiert. Dies ist nützlich, wenn Ihre PHP-Konfiguration den verfügbaren Speicherverbrauch je Prozess einschränkt oder die Dateigröße von Uploads begrenzt.

##### „filesize_response“ `[bool]`
- Handhabung von Dateien, die die Begrenzung der Dateigröße (sofern angegeben) überschreiten. False = Hinzufügen zur Whitelist; True = Hinzufügen zur Blacklist [Standardeinstellung].

##### „filetype_whitelist“ `[string]`
- Whitelist:

__Wie das funktioniert.__ Sofern Ihr System spezielle Dateitypen im Upload erlaubt oder komplett verweigert, so unterteilen Sie diese Dateitypen in Whitelists, Blacklists oder Greylists, um den Scanvorgang zu beschleunigen, indem diese Dateitypen übersprungen werden. Format ist CSV (Komma-getrennte Werte).

__Logische Reihenfolge der Verarbeitung.__ Wenn der Dateityp in der Whitelist ist, scanne und blockieren nicht die Datei, und überprüfe nicht wenn die Datei in der Whitelist oder in der Greylist ist. Wenn der Dateityp in der Blacklist ist, scanne nicht die Datei aber blockieren sie trotzdem, und überprüfe nicht wenn die Datei in der Greylist ist. Wenn die Greylist leer ist oder wenn die Greylist nicht leer ist und der Dateityp in der Greylist ist, scanne die Datei wie standardmäßig eingestellt ist und stelle fest, ob diese blockiert werden soll, basierend auf dem Scan, aber wenn die Greylist nicht leer ist und der Dateityp nicht in der Greylist ist, behandel die Datei als ob sie in der Blacklist ist, scanne sie nicht aber blockiere sie trotzdem.

##### „filetype_blacklist“ `[string]`
- Blacklist:

__Wie das funktioniert.__ Sofern Ihr System spezielle Dateitypen im Upload erlaubt oder komplett verweigert, so unterteilen Sie diese Dateitypen in Whitelists, Blacklists oder Greylists, um den Scanvorgang zu beschleunigen, indem diese Dateitypen übersprungen werden. Format ist CSV (Komma-getrennte Werte).

__Logische Reihenfolge der Verarbeitung.__ Wenn der Dateityp in der Whitelist ist, scanne und blockieren nicht die Datei, und überprüfe nicht wenn die Datei in der Whitelist oder in der Greylist ist. Wenn der Dateityp in der Blacklist ist, scanne nicht die Datei aber blockieren sie trotzdem, und überprüfe nicht wenn die Datei in der Greylist ist. Wenn die Greylist leer ist oder wenn die Greylist nicht leer ist und der Dateityp in der Greylist ist, scanne die Datei wie standardmäßig eingestellt ist und stelle fest, ob diese blockiert werden soll, basierend auf dem Scan, aber wenn die Greylist nicht leer ist und der Dateityp nicht in der Greylist ist, behandel die Datei als ob sie in der Blacklist ist, scanne sie nicht aber blockiere sie trotzdem.

##### „filetype_greylist“ `[string]`
- Greylist:

__Wie das funktioniert.__ Sofern Ihr System spezielle Dateitypen im Upload erlaubt oder komplett verweigert, so unterteilen Sie diese Dateitypen in Whitelists, Blacklists oder Greylists, um den Scanvorgang zu beschleunigen, indem diese Dateitypen übersprungen werden. Format ist CSV (Komma-getrennte Werte).

__Logische Reihenfolge der Verarbeitung.__ Wenn der Dateityp in der Whitelist ist, scanne und blockieren nicht die Datei, und überprüfe nicht wenn die Datei in der Whitelist oder in der Greylist ist. Wenn der Dateityp in der Blacklist ist, scanne nicht die Datei aber blockieren sie trotzdem, und überprüfe nicht wenn die Datei in der Greylist ist. Wenn die Greylist leer ist oder wenn die Greylist nicht leer ist und der Dateityp in der Greylist ist, scanne die Datei wie standardmäßig eingestellt ist und stelle fest, ob diese blockiert werden soll, basierend auf dem Scan, aber wenn die Greylist nicht leer ist und der Dateityp nicht in der Greylist ist, behandel die Datei als ob sie in der Blacklist ist, scanne sie nicht aber blockiere sie trotzdem.

##### „check_archives“ `[bool]`
- Soll der Inhalt von Archiven überprüft werden? False = Nein (keine Überprüfung); True = Ja (wird überprüft) [Standardeinstellung]. Unterstützt: Zip (erfordert libzip), Tar, Rar (erfordert die rar-Erweiterung).

##### „filesize_archives“ `[bool]`
- Soll das Blacklisting/Whitelisting der Dateigröße auf den Inhalt des Archivs übertragen werden? False = Nein (alles nur in die Greylist aufnehmen); True = Ja [Standardeinstellung].

##### „filetype_archives“ `[bool]`
- Soll das Blacklisting/Whitelisting des Dateityps auf den Inhalt des Archivs übertragen werden? False = Nein (alles nur in die Greylist aufnehmen) [Standardeinstellung]; True = Ja.

##### „max_recursion“ `[int]`
- Maximale Grenze der Rekursionstiefe von Archiven. Standardwert = 3.

##### „block_encrypted_archives“ `[bool]`
- Verschlüsselte Archive erkennen und blockieren? Denn phpMussel ist nicht in der Lage, die Inhalte von verschlüsselten Archiven zu scannen. Es ist möglich, dass Archiv-Verschlüsselung von Angreifern zum Umgehen von phpMussel, Antiviren-Scanner und weiterer solcher Schutzlösungen verwendet wird. Die Anweisung, dass phpMussel verschlüsselte Archive blockiert kann möglicherweise helfen, die Risiken, die mit dieser Möglichkeit verbunden sind, zu verringern. False = Nein; True = Ja [Standardeinstellung].

##### „max_files_in_archives“ `[int]`
- Maximale Anzahl Dateien, die aus Archiven gescannt werden sollen, bevor der Scan abgebrochen wird. Standardwert = 0 (kein Maximum).

##### „chameleon_from_php“ `[bool]`
- Suche nach PHP-Headern in Dateien, die weder PHP-Dateien noch erkannte Archive sind. False = Deaktiviert; True = Aktiviert.

##### „can_contain_php_file_extensions“ `[string]`
- Eine Liste von Dateierweiterungen, die PHP-Code enthalten dürfen, getrennt durch Kommas. Wenn die PHP-Chameleon-Angriffserkennung aktiviert ist, werden Dateien mit PHP-Code, die Erweiterungen aufweisen, die nicht in dieser Liste enthalten sind, als PHP-Chameleon-Angriffe erkannt.

##### „chameleon_from_exe“ `[bool]`
- Suche nach ausführbaren Headern in Dateien, die weder ausführbar noch erkannte Archive sind und nach ausführbaren Dateien, deren Header nicht korrekt sind. False = Deaktiviert; True = Aktiviert.

##### „chameleon_to_archive“ `[bool]`
- Identifizieren Sie falsche Header in Archiven und komprimierten Dateien. Unterstützt: BZ/BZIP2, GZ/GZIP, LZF, RAR, ZIP. False = Deaktiviert; True = Aktiviert.

##### „chameleon_to_doc“ `[bool]`
- Suche nach Office-Dokumenten, deren Header nicht korrekt sind (Unterstützt: DOC, DOT, PPS, PPT, XLA, XLS, WIZ). False = Deaktiviert; True = Aktiviert.

##### „chameleon_to_img“ `[bool]`
- Suche nach Bildern, deren Header nicht korrekt sind (Unterstützt: BMP, DIB, PNG, GIF, JPEG, JPG, XCF, PSD, PDD, WEBP). False = Deaktiviert; True = Aktiviert.

##### „chameleon_to_pdf“ `[bool]`
- Suche nach PDF-Dateien, deren Header nicht korrekt sind. False = Deaktiviert; True = Aktiviert.

##### „archive_file_extensions“ `[string]`
- Erkannte Archiv-Dateierweiterungen (Format ist CSV; nur bei Problemen hinzufügen oder entfernen; unnötiges Entfernen könnte Fehlalarme für Archive auslösen, unnötiges Hinzufügen fügt das zur Whitelist hinzu, was vorher als möglicher Angriff definiert wurde; Ändern Sie diese Liste äußerst vorsichtig; Beachten Sie, dass dies keinen Einfluss darauf hat, wozu Archive fähig sind und nicht auf Inhaltsebene analysiert werden können). Diese Liste enthält die Archivformate, die am häufigsten von der Mehrzahl der Systeme und CMS verwendet werden, ist aber absichtlich nicht vollständig.

##### „block_control_characters“ `[bool]`
- Sollen Dateien, welche Steuerzeichen (andere als Newline/Zeilenumbruch) enthalten, blockiert werden?Sofern Sie *__NUR__* reinen Text hochladen, können Sie diese Option aktivieren, um Ihrem System zusätzlichen Schutz zu bieten. Sollten Sie anderes als reinen Text hochladen, werden bei aktivierter Option Fehlalarme ausgelöst. False = Nicht blockieren [Standardeinstellung]; True = Blockieren.

##### „corrupted_exe“ `[bool]`
- Defekte Dateien und Parse-Errors. False = Ignorieren; True = Blockieren [Standardeinstellung]. Soll auf potentiell defekte ausführbare Dateien geprüft und diese blockiert werden? Oftmals (aber nicht immer), wenn bestimmte Aspekte einer PE-Datei beschädigt sind oder nicht korrekt verarbeitet werden können, ist dies ein Hinweis auf eine infizierte Datei. Viele Antiviren-Programme nutzen verschiedene Methoden, um Viren in solchen Dateien zu erkennen, sofern sich der Programmierer eines Virus dieser Tatsache bewußt ist, wird er versuchen, diese Maßnahmen zu verhindern, damit der Virus unentdeckt bleibt.

##### „decode_threshold“ `[string]`
- Schwelle der Menge der Rohdaten, die durch den Decode-Befehl erkannt werden sollen (sofern während des Scanvorgangs spürbare Performance-Probleme auftreten). Standardeinstellung ist 512KB. Null oder ein Null-Wert deaktiviert die Beschränkung (Entfernen aller solcher Einschränkungen basierend auf die Dateigröße).

##### „scannable_threshold“ `[string]`
- Schwelle der Menge der Rohdaten, die phpMussel lesen und scannen darf (sofern während des Scanvorgangs spürbare Performance-Probleme auftreten). Standardeinstellung ist 32MB. Null oder ein Null-Wert deaktiviert die Beschränkung. Generell sollte dieser Wert nicht kleiner sein als die durchschnittliche Dateigröße von Datei-Uploads, die Sie auf Ihrem Server oder Ihrer Website erwarten, sollte nicht größer sein als die Richtlinie filesize_limit und sollte nicht mehr als ein Fünftel der Gesamtspeicherzuweisung für PHP in der Konfigurationsdatei „php.ini“ sein. Diese Richtlinie verhindert, dass phpMussel zu viel Speicher benutzt (was phpMussel daran hindern würde, einen Scan ab einer bestimmten Dateigröße erfolgreich durchzuführen).

##### „allow_leading_trailing_dots“ `[bool]`
- Erlaube führende und nachfolgende Punkte in Dateinamen? Dies kann manchmal verwendet werden, um Dateien auszublenden oder um einige Systeme dazu zu bringen, Directory Traversal zuzulassen. False = Nicht erlauben [Standardeinstellung]. True = Erlauben.

##### „block_macros“ `[bool]`
- Versuchen Sie, alle Dateien die Makros enthalten zu blockieren? Einige Arten von Dokumenten und Tabellen können ausführbare Makros enthalten und somit einen gefährlichen potenziellen Malware-Vektor darstellen. False = Nicht blockieren [Standardeinstellung]; True = Blockieren.

##### „only_allow_images“ `[bool]`
- Wenn auf true gesetzt, alle vom Scanner gefundenen Dateien die keine Bilder sind, werden sofort markiert, ohne gescannt zu werden. Dies kann in einigen Fällen hilfreich sein für die Durchführung eines Scans erforderliche Zeit zu verkürzen. Standardmäßig auf false gesetzt.

#### „quarantine“ (Kategorie)
Konfiguration für die Quarantäne.

##### „quarantine_key“ `[string]`
- phpMussel kann blockierte Datei-Uploads unter Quarantäne isolieren, sofern Sie dies tun wollen. Nutzer, die nur daran interessiert sind, ihre Webauftritte oder ihre Hosting-Umgebung zu schützen ohne das Interesse, die markierten Dateien weitergehend zu untersuchen, sollten diese Funktionalität deaktivieren, Nutzer, die diese Dateien zur Ananlyse auf Malware o.ä. benötigen, sollten diese Funktion aktivieren. Die Isolation von markierten Dateien kann manchmal auch bei der Fehlersuche von Fehlalarmen helfen, wenn dies häufiger bei Ihnen auftritt. Um die Quarantänefunktion zu deaktivieren, lassen Sie die Richtlinie `quarantine_key` leer oder löschen Sie den Inhalt dieser Richtlinie, wenn sie nicht bereits leer ist. Um die Quarantänefunktion zu aktivieren, geben Sie einen Wert ein. Der `quarantine_key` ist ein wichtiges Sicherheitsmerkmal der Quarantänfunktionen, um zu verhindern, dass die Quarantänefunktionen einem Exploit ausgesetzt wird und gespeicherte Daten in der Quarantäneumgebung ausgeführt werden können. Der Wert des `quarantine_key` sollte so behandelt werden, wie Ihre Passwörter: Je länger, desto besser, und halten Sie sie geheim. Optimal in Verbindung mit `delete_on_sight`.

##### „quarantine_max_filesize“ `[string]`
- Die maximal zulässige Dateigröße von Dateien, die in der Quarantäne isoliert werden sollen. Dateien, die größer sind als der angegebene Wert, werden NICHT im Quarantäneverzeichnis gespeichert. Diese Richtlinie ist wichtig, um es einem potentiellen Angreifer zu erschweren, die Quarantäne -und somit Ihren zugesicherten Speicher auf Ihrem Hostservice- mit unerwünschten Daten zu überfluten. Standardeinstellung = 2MB.

##### „quarantine_max_usage“ `[string]`
- Die maximal zulässige Speichernutzung der Quarantäne. Erreicht die Geamtgröße der Dateien in der Quarantäne diesen Wert, werden die ältesten Dateien in der Quarantäne gelöscht, bis der Wert unterschritten wird. Diese Richtlinie ist wichtig, um es einem potentiellen Angreifer zu erschweren, die Quarantäne -und somit Ihren zugesicherten Speicher auf Ihrem Hostservice- mit unerwünschten Daten zu überfluten. Standardwert = 64MB.

##### „quarantine_max_files“ `[int]`
- Die maximale Anzahl von Dateien, die in der Quarantäne vorhanden sein können. Wenn neue Dateien zur Quarantäne hinzugefügt werden, werden alte Dateien gelöscht, wenn diese Anzahl überschritten wird, bis der Rest diese Nummer nicht mehr überschreitet. Standardwert = 100.

#### „virustotal“ (Kategorie)
Konfiguration für die Integration von Virus Total.

##### „vt_public_api_key“ `[string]`
- Optional, phpMussel kann Dateien mit der Virus Total API scannen, um einen noch besseren Schutz gegen Viren, Trojaner, Malware und andere Bedrohungen zu bieten. Standardmäßig ist das Scannen von Dateien mit der Virus Total API deaktiviert. Um es zu aktivieren, wird ein API Schlüssel von Virus Total benötigt. Wegen dem großen Vorteil den dir das bietet, empfehle ich die Aktivierung. Bitte sei dir bewusst, um die Virus Total API zu nutzen, dass du deren Nutzungsbedingungen zustimmen und dich an alle Richtlinien halten musst, wie es in der Virus Total Dokumentation beschrieben ist! Du darfst diese Integrations-Funktion nicht verwenden AUSSER: Du hast die Nutzungsbedingungen von Virus Total und der API gelesen und stimmst diesen zu. Du hast, zu einem Minimum, das Vorwort von der Virus Total Public API Dokumentation gelesen und verstanden (alles nach „Virus Total Public API v2.0“ aber vor „Contents“).

Siehe auch:
- [Terms of Service](https://www.virustotal.com/en/about/terms-of-service/)
- [Getting started](https://developers.virustotal.com/reference)

##### „vt_suspicion_level“ `[int]`
- phpMussel wird standardmäßig die mit der Virus Total API zu scannenden Dateien auf Dateien eisnchränken, die es als „verdächtig“ betrachtet. Du kannst optional diese Einschränkung durch Änderung des Wertes der `vt_suspicion_level` Direktive anpassen.

```
vt_suspicion_level
├─0 (Scannen nur Dateien mit heuristischem Gewicht.): Dateien werden nur gescannt wenn sie ein heuristisches Gewicht haben.
│ Heuristisches Gewicht kann aus Signaturen entstehen die gemeinsame
│ Fingerabdrücke erfassen, die eine Infektion nahelegen aber keine Infektion
│ garantieren. Für Ergebnissen die einen Verdacht rechtfertigen aber keine
│ Gewissheit geben, kann die Lookup dazu dienen eine zweite Meinung dienen.
├─1 (Scannen Dateien mit heuristischem Gewicht, ausführbare Dateien, und Dateien die möglicherweise ausführbare Daten enthalten.): Beispiele für ausführbare Dateien, und Dateien die möglicherweise
│ ausführbare Daten enthalten, umfassen Windows PE-Dateien, Linux
│ ELF-Dateien, Mach-O-Dateien, DOCX-Dateien, ZIP-Dateien, u.s.w.
└─2 (Scannen alle Dateien.)
```

##### „vt_weighting“ `[int]`
- Soll phpMussel die Ergebnisse des Scans mit der Virus Total API als Erkennungen oder Erkennungs-Gewichtung anwenden? Diese Direktive existiert, weil das Scannen einer Datei mit mehreren Engines (wie es Virus Total macht) in einer höheren Erkennungsrate resultieren sollte (und somit eine größere Anzahl schädlicher Dateien erwischt werden), dies kann aber zu in einer höheren Anzahl von Falschmeldungen führen. Unter manchen Umständen würden die Ergebnisse des Scans besser als Vertrauens-Wert als ein eindeutiges Ergebnis verwendet werden. Wenn der Wert 0 verwendet wird, werden die Ergebnisse des Scans als Erkennungen angewendet und somit wird phpMussel, falls irgendeine von Virus Total verwendete Engine die gescannte Datei als schädlich markiert, die Datei als schädlich betrachten. Wird ein anderer Wert verwendet, werden die Ergebnisse des Scans mit der Virus Total API als Erkennungs-Gewichtung angewendet. Die Anzahl der von Virus Total verwendeten Engines, welche die Datei als schädlich markieren, wird als Vertrauens-Wert (oder Erkennungs-Gewichtung) dienen, ob die gescannte Datei von phpMussel als schädlich angesehen werden soll (der verwendete Wert wird den Mindest-Vertrauens-Wert oder erforderliche Gewichtung repräsentieren, um als schädlich angesehen zu werden. Standardmäßig der Wert 0 verwendet.

##### „vt_quota_rate“ `[int]`
- Laut der Virus Total API Dokumentation, „ist diese auf 4 Anfragen irgendeiner Art in einer 1 Minuten Zeitspanne limitiert. Falls du einen Honeyclient, Honeypot oder einen andere Automatisierung verwendest, was etwas zu VirusTotal beiträgt und nicht nur Berichte abruft, bist du für ein höheres Limit berechtigt“. Standardmäßig wird sich phpMussel strikt daran halten, da aber diese Limits erhöht werden können, stehen dir diese zwei Direktiven zur Verfügung um phpMussel anzuweisen, an welches Limit es sich halten soll. Außer du bist dazu aufgefordert, ist es nicht empfohlen diese Werte zu erhöhen. Solltest du aber Probleme bezogen auf das Erreichen des Limits haben, *__SOLLTE__* das Verringern dieser Werte manchmal helfen. Dein Limit wird festgelegt als `vt_quota_rate` Anfragen jeder Art in jeder `vt_quota_time` Minuten Zeitspanne.

##### „vt_quota_time“ `[int]`
- (Siehe Beschreibung oben).

#### „urlscanner“ (Kategorie)
Konfiguration für den URL-Scanner.

##### „google_api_key“ `[string]`
- Aktiviert API-Abfragen zur Google Safe Browsing API wenn der benötigte API-Schlüssel festgelegt ist.

Siehe auch:
- [Google API Console](https://console.developers.google.com/)

##### „maximum_api_lookups“ `[int]`
- Die maximal erlaubte Anzahl von API-Abfragen die bei jedem Scan-Durchgang durchgeführt werden. Weil jede zusätzliche API-Abfrage die Zeit für einen Scan-Durchgang erhöht, wollen Sie unter Umständen ein Limit festlegen, um den gedamten Scan-Prozess zu beschleunigen. Wenn 0 eingestellt wird, wird kein Limit angewendet. Standardmäßig ist der Wert auf 10 gesetzt.

##### „maximum_api_lookups_response“ `[bool]`
- Was soll passieren, wenn die maximale Anzahl der erlaubten API-Abfragen erreicht wird? False = Nichts (Verarbeitung fortführen) [Standardeinstellung]; True = Markiere/blockiere die Datei.

##### „cache_time“ `[int]`
- Wie lange (in Sekunden) sollen die Ergebnisse von API-Abfragen zwischengespeichert werden? Standardeinstellung ist 3600 Sekunden (1 Stunde).

#### „legal“ (Kategorie)
Konfiguration für gesetzliche Anforderungen.

##### „pseudonymise_ip_addresses“ `[bool]`
- Pseudonymisieren IP-Adressen beim Schreiben der Protokolldateien? True = Ja [Standardeinstellung]; False = Nein.

##### „privacy_policy“ `[string]`
- Die Adresse einer relevanten Datenschutz-Bestimmungen, die in der Fußzeile aller generierten Seiten angezeigt werden soll. Geben Sie eine URL ein, oder lassen Sie sie leer, um sie zu deaktivieren.

#### „supplementary_cache_options“ (Kategorie)
Zusätzliche Cache-Optionen. Hinweis: Das Ändern dieser Werte kann Sie möglicherweise ausloggen.

##### „prefix“ `[string]`
- Dieser Wert hier wird zu allen Cache-Eintragsschlüsseln vorangestellt. Standardeinstellung = „phpMussel_“. Wenn mehrere Installationen auf demselben Server vorhanden sind, kann dies nützlich sein, um ihre Caches getrennt zu halten.

##### „enable_apcu“ `[bool]`
- Dies gibt an, ob APCu für das Caching verwendet werden soll. Standardeinstellung = True.

##### „enable_memcached“ `[bool]`
- Dies gibt an, ob Memcached für das Caching verwendet werden soll. Standardeinstellung = False.

##### „enable_redis“ `[bool]`
- Dies gibt an, ob Redis für das Caching verwendet werden soll. Standardeinstellung = False.

##### „enable_pdo“ `[bool]`
- Dies gibt an, ob PDO für das Caching verwendet werden soll. Standardeinstellung = False.

##### „memcached_host“ `[string]`
- Memcached Hostwert. Standardeinstellung = „localhost“.

##### „memcached_port“ `[int]`
- Memcached Portwert. Standardeinstellung = „11211“.

##### „redis_host“ `[string]`
- Redis Hostwert. Standardeinstellung = „localhost“.

##### „redis_port“ `[int]`
- Redis Portwert. Standardeinstellung = „6379“.

##### „redis_timeout“ `[float]`
- Redis Timeout-Wert. Standardeinstellung = „2.5“.

##### „pdo_dsn“ `[string]`
- PDO DSN-Wert. Standardeinstellung = „mysql:dbname=phpmussel;host=localhost;port=3306“.

__FAQ.__ *<a href="https://github.com/phpMussel/Docs/blob/master/readme.de.md#user-content-HOW_TO_USE_PDO" hreflang="de-DE">Was ist ein „PDO DSN“? Wie kann ich PDO mit phpMussel verwenden?</a>*

##### „pdo_username“ `[string]`
- PDO Nutzername.

##### „pdo_password“ `[string]`
- PDO Passwort.

#### „frontend“ (Kategorie)
Konfiguration für das Frontend.

##### „frontend_log“ `[string]`
- Datei für die Protokollierung von Frontend Anmelde-Versuchen. Geben Sie einen Dateinamen an oder lassen Sie die Option zum Deaktivieren leer.

##### „max_login_attempts“ `[int]`
- Maximale Anzahl der Versucht zum Anmelden (Frontend). Standardeinstellung = 5.

##### „numbers“ `[string]`
- Wie willst du Nummern anzeigen? Wählen Sie das Beispiel aus, das Ihnen am besten entspricht.

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

##### „default_algo“ `[string]`
- Definiert den Algorithmus für alle zukünftigen Passwörter und Sitzungen.

```
default_algo
├─PASSWORD_DEFAULT ("PASSWORD_DEFAULT")
├─PASSWORD_BCRYPT ("PASSWORD_BCRYPT")
├─PASSWORD_ARGON2I ("PASSWORD_ARGON2I")
└─PASSWORD_ARGON2ID ("PASSWORD_ARGON2ID (PHP >= 7.3.0)")
```

##### „theme“ `[string]`
- Die Ästhetik für das phpMussel-Frontend.

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
└─…Andere
```

##### „magnification“ `[float]`
- Schriftvergrößerung. Standardeinstellung = 1.

##### „custom_header“ `[string]`
- Als HTML ganz am Anfang aller Frontend-Seiten eingefügt. Dies kann nützlich sein, wenn Sie auf allen solchen Seiten ein Website-Logo, einen personalisierten Header, Skripte, oder ähnliches einfügen möchten.

##### „custom_footer“ `[string]`
- Als HTML ganz am Unten aller Frontend-Seiten eingefügt. Dies kann nützlich sein, wenn Sie auf allen solchen Seiten einen rechtlichen Hinweis, einen Kontaktlink, Geschäftsinformationen, oder ähnliches einfügen möchten.

#### „web“ (Kategorie)
Konfiguration für den Upload-Handler.

##### „uploads_log“ `[string]`
- Wo sollen alle blockierten Uploads protokolliert werden. Geben Sie einen Dateinamen an oder lassen Sie die Option zum Deaktivieren leer.

##### „forbid_on_block“ `[bool]`
- Zurückgegebener 403-HTTP-Header bei einem blockierten Dateiupload. False = Nein (200); True = Ja (403) [Standardeinstellung].

##### „unsupported_media_type_header“ `[bool]`
- Sollte phpMussel 415 Header senden, wenn Uploads aufgrund von Dateitypen auf der schwarzen Liste blockiert werden? Wenn true, ersetzt diese Einstellung `forbid_on_block`. False = Nein [Standardeinstellung]; True = Ja.

##### „max_uploads“ `[int]`
- Maximale erlaubte Anzahl zu überprüfender Dateien während eines Dateiuploads bevor der Scan abgebrochen und der Nutzer darüber informiert wird, dass er zu viele Dateien auf einmal hochgeladen hat. Bietet einen Schutz gegen den theoretischen Angriff eines DDoS auf Ihr System oder CMS, indem der Angreifer phpMussel überlastet und den PHP-Prozess zum Stillstand bringt. Empfohlen: 10. Sie können den Wert abhängig von Ihrer Hardware erhöhen oder senken. Beachten Sie, dass dieser Wert nicht den Inhalt von Archiven berücksichtigt.

##### „ignore_upload_errors“ `[bool]`
- Diese Direktive sollte generell AUS geschaltet bleiben sofern es nicht für die korrekte Funktion von phpMussel auf Ihrem System benötigt wird. Normalerweise, sobald phpMussel bei AUS geschalteter Direktive ein Element in `$_FILES` array() erkennt, wird es beginnen, die Dateien, die diese Elemente repräsentieren, zu überprüfen, sollten diese Elemente leer sein, gibt phpMussel eine Fehlermeldung zurück. Dies ist das normale Verhalten von phpMussel. Bei einigen CMS werden allerdings als normales Verhalten leere Elemente in `$_FILES` zurückgegeben oder Fehlermeldungen ausgelöst, sobald sich dort keine leeren Elemente befinden, in diesem Fall tritt ein Konflikt zwischen dem normalen Verhalten von phpMussel und dem CMS auf. Sollte eine solche Konstellation bei Ihrem CMS zutreffen, so stellen Sie diese Option AN, phpMussel wird somit nicht nach leeren Elementen suchen, Sie bei einem Fund ignorieren und keine zugehörigen Fehlermeldungen ausgeben, der Request zum Seitenaufruf kann somit fortgesetzt werden. False = AUS/OFF; True = AN/ON.

##### „theme“ `[string]`
- Die Ästhetik für die Seite „Upload verweigert“.

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
└─…Andere
```

##### „magnification“ `[float]`
- Schriftvergrößerung. Standardeinstellung = 1.

##### „custom_header“ `[string]`
- Als HTML ganz am Anfang aller "Upload verweigert"-Seiten eingefügt. Dies kann nützlich sein, wenn Sie auf allen solchen Seiten ein Website-Logo, einen personalisierten Header, Skripte, oder ähnliches einfügen möchten.

##### „custom_footer“ `[string]`
- Als HTML ganz am Unten aller "Upload verweigert"-Seiten eingefügt. Dies kann nützlich sein, wenn Sie auf allen solchen Seiten einen rechtlichen Hinweis, einen Kontaktlink, Geschäftsinformationen, oder ähnliches einfügen möchten.

#### „phpmailer“ (Kategorie)
Konfiguration für PHPMailer (für Zwei-Faktor-Authentifizierung verwendet).

##### „event_log“ `[string]`
- Eine Datei zum Protokollieren aller Ereignisse in Bezug auf PHPMailer. Geben Sie einen Dateinamen an oder lassen Sie die Option zum Deaktivieren leer.

##### „enable_two_factor“ `[bool]`
- Diese Direktive bestimmt, ob 2FA für Frontend-Konten verwendet werden soll.

##### „enable_notifications“ `[string]`
- Wenn Sie per E-Mail benachrichtigt werden möchten, wenn ein Upload blockiert ist, geben Sie hier die E-Mail-Adresse des Empfängers an.

##### „skip_auth_process“ `[bool]`
- Wenn Sie diese Direktive auf `true` setzen, wird PHPMailer angewiesen, den normalen Authentifizierungsprozess zu überspringen, der normalerweise beim Senden von E-Mails über SMTP auftritt. Dies sollte vermieden werden, da das Überspringen dieses Prozesses ausgehende E-Mails MITM-Angriffen aussetzen kann. Dies kann jedoch in Fällen erforderlich sein, in denen dieser Prozess die Verbindung von PHPMailer zu einem SMTP-Server verhindert.

##### „host“ `[string]`
- Der SMTP-Host zum Senden von ausgehende E-Mails.

##### „port“ `[int]`
- Die Portnummer zum Senden von ausgehende E-Mails. Standardeinstellung = 587.

##### „smtp_secure“ `[string]`
- Das Protokoll zum Senden von E-Mails über SMTP (TLS oder SSL).

```
smtp_secure
├─default ("-")
├─tls ("TLS")
└─ssl ("SSL")
```

##### „smtp_auth“ `[bool]`
- Diese Direktive bestimmt, ob SMTP-Sitzungen authentifiziert werden sollen (sollte normalerweise in Ruhe gelassen werden).

##### „username“ `[string]`
- Der Benutzername zum Senden von E-Mails über SMTP.

##### „password“ `[string]`
- Das Passwort zum Senden von E-Mails über SMTP.

##### „set_from_address“ `[string]`
- Die Absenderadresse, die beim Senden von E-Mails über SMTP verwendet werden soll.

##### „set_from_name“ `[string]`
- Der Name des Absenders, der beim Senden von E-Mails über SMTP verwendet werden soll.

##### „add_reply_to_address“ `[string]`
- Die Antwortadresse, die beim Senden von E-Mails über SMTP verwendet werden soll.

##### „add_reply_to_name“ `[string]`
- Der Name für der Antwort, die beim Senden von E-Mails über SMTP verwendet werden soll.

---


### 6. <a name="SECTION6"></a>SIGNATURENFORMAT

*Siehe auch:*
- *[Was ist eine „Signatur“?](#user-content-WHAT_IS_A_SIGNATURE)*

Die ersten 9 Bytes `[x0-x8]` einer phpMussel Signaturdatei sind `phpMussel`, und handeln als eine „Magische Zahl“ (Magic Number), um sie als Signaturdateien zu identifizieren (dies hilft zu verhindern, dass phpMussel versehentlich versucht, Dateien zu verwenden, die keine Signaturdateien sind). Das nächste Byte `[x9]` identifiziert die Art der Signaturdatei, welche phpMussel wissen muss, um die Signaturdatei korrekt interpretieren zu können. Folgende Arten von Signaturdateien werden erkannt:

Art | Byte | Beschreibung
---|---|---
`General_Command_Detections` | `0?` | Für CSV (comma separated values, Komma-getrennte Werte) Signaturdateien. Werte (Signaturen) sind hexadezimal-codierte Zeichenfolgen, um in Dateien zu suchen. Signaturen hier haben keine Namen oder andere Details (nur die Zeichenfolge zu erkennen).
`Filename` | `1?` | Für Dateinamen-Signaturen.
`Hash` | `2?` | Für Hash-Signaturen.
`Standard` | `3?` | Für Signaturdateien, die direkt mit Dateiinhalten arbeiten.
`Standard_RegEx` | `4?` | Für Signaturdateien, die direkt mit Dateiinhalten arbeiten. Signaturen können Reguläre Ausdrücke enthalten.
`Normalised` | `5?` | Für Signaturdateien, die mit ANSI-normalisiertem Dateiinhalt arbeiten.
`Normalised_RegEx` | `6?` | Für Signaturdateien, die mit ANSI-normalisiertem Dateiinhalt arbeiten. Signaturen können Reguläre Ausdrücke enthalten.
`HTML` | `7?` | Für Signaturdateien, die mit HTML-normalisierte Dateiinhalte arbeiten.
`HTML_RegEx` | `8?` | Für Signaturdateien, die mit HTML-normalisierte Dateiinhalte arbeiten. Signaturen können Reguläre Ausdrücke enthalten.
`PE_Extended` | `9?` | Für Signaturdateien, die mit PE-Metadaten arbeiten (andere als PE-Sektional-Metadaten).
`PE_Sectional` | `A?` | Für Signaturdateien, die mit PE-Sektional-Metadaten arbeiten.
`Complex_Extended` | `B?` | Für Signaturdateien, die mit verschiedenen Regeln arbeiten, die auf erweiterten Metadaten basieren, die von phpMussel generiert wurden.
`URL_Scanner` | `C?` | Für Signaturdateien, die mit URLs arbeiten.

Das nächste Byte `[x10]` ist ein Zeilenumbruch `[0A]`, und schließt den phpMussel-Signaturdatei-Header ab.

Jede nicht leere Zeile ist danach eine Signatur oder Regel. Jede Signatur oder Regel belegt eine Zeile. Die unterstützten Signaturformate werden nachfolgend beschrieben.

#### *DATEINAMEN-SIGNATUREN*
Alle Dateinamen-Signaturen besitzen folgendes Format:

`NAME:FNRX`

NAME ist der Name, um die Signatur zu benennen und FNRX ist das Regex-Erkennungsmuster zum Vergleich von (nicht kodierten) Dateinamen.

#### *HASH-SIGNATUREN*
Alle Hash-Signaturen besitzen folgendes Format:

`HASH:FILESIZE:NAME`

HASH ist der Hash (in der Regel MD5) der ganzen Datei, FILESIZE ist die gesamte Größe der Datei und NAME ist der Name, um die Signatur zu benennen.

#### *PE-SECTIONAL-SIGNATUREN*
Alle PE-Sectional-Signaturen besitzen folgendes Format:

`SIZE:HASH:NAME`

HASH ist der MD5-Hash einer PE-Sektion der Datei, FILESIZE ist die gesamte Größe der PE-Sektion und NAME ist der Name, um die Signatur zu benennen.

#### *PE-ERWEITERT-SIGNATUREN*
Alle PE-Erweitert-Signaturen besitzen folgendes Format:

`$VAR:HASH:SIZE:NAME`

Wo $VAR der Name der zu prüfenden PE-Variable ist, HASH ist der MD5-Hash von dieser Variable, SIZE ist die gesamte Größe von dieser Variable und NAME ist der Name für diese Signatur.

#### *KOMPLEX-ERWEITERT-SIGNATUREN*
Komplex-Erweitert-Signaturen sind ziemlich unterschiedlich zu anderen Arten von möglichen Signaturen für phpMussel. Insofern, dass sie gegen das übereinstimmen was die Signaturen spezifizieren und das können mehrere Kriterien sein. Die Übereinstimmungs-Kriterien werden durch ";" getrennt und der Übereinstimmungs-Typ und die Übereinstimmungs-Daten jedes Übereinstimmungskriteriums ist durch ":" getrennt sodass das Format für diese Signaturen in etwa so aussieht:

`$variable1:SOMEDATA;$variable2:SOMEDATA;SignatureName`

#### *ALLE SONSTIGEN SIGNATUREN*
Alle sonstigen Signaturen besitzen folgendes Format:

`NAME:HEX:FROM:TO`

NAME ist der Name, um die Signatur zu benennen und HEX ist ein hexidezimal-kodiertes Segment der Datei, welches mit der gegebenen Signatur geprüft werden soll. FROM und TO sind optionale Parameter, sie geben Start- und Endpunkt in den Quelldaten zur Überprüfung an.

#### *REGEX (REGULAR EXPRESSIONS)*
Jede Form von regulären Ausdrücken, die von PHP verstanden und korrekt ausgeführt werden, sollten auch von phpMussel und den Signaturen verstanden und korrekt ausgeführt werden können. Lassen Sie extreme Vorsicht walten, wenn Sie neue Signaturen schreiben, die auf regulären Ausdrücken basieren. Wenn Sie nicht absolut sicher sind, was Sie dort machen, kann dies zu nicht korrekten und/oder unerwarteten Ergebnissen führen. Schauen Sie im Quelltext von phpMussel nach, wenn Sie sich nicht absolut sicher sind, wie die regulären Ausdrücke verarbeitet werden. Beachten Sie bitte, dass alle Suchmuster (außer Dateinamen, Archive-Metadata and MD5-Prüfmuster) hexadezimal kodiert sein müssen (mit Ausnahme von Syntax, natürlich)!

---


### 7. <a name="SECTION7"></a>BEKANNTE KOMPATIBILITÄTSPROBLEME

#### KOMPATIBILITÄT ZU ANTIVIREN-SOFTWARE

Kompatibilitätsprobleme zwischen phpMussel und einigen Antiviren-Anbietern sind in der Vergangenheit aufgetreten, daher überprüfe ich etwa alle paar Monate die aktuellsten verfügbaren Versionen der phpMussel-Codebasis auf Virus Total, um festzustellen, ob dort Probleme gemeldet werden. Wenn dort Probleme gemeldet werden, ich liste die gemeldeten Probleme hier in der Dokumentation.

Bei meiner letzten Überprüfung (2022.05.12) wurden keine Probleme gemeldet.

Ich überprüfe keine Signaturdateien, Dokumentationen oder sonstigen peripheren Inhalte. Die Signaturdateien verursachen immer einige Fehlalarme, wenn andere Antiviren-Lösungen sie erkennen. Ich würde daher dringend empfehlen, wenn Sie phpMussel auf einem Computer installieren möchten, auf dem bereits eine andere Antiviren-Lösung vorhanden ist, die phpMussel-Signaturdateien auf eine Whitelist zu setzen.

*Siehe auch: [Kompatibilitätstabellen](https://maikuolan.github.io/Compatibility-Charts/).*

---


### 8. <a name="SECTION8"></a>HÄUFIG GESTELLTE FRAGEN (FAQ)

- [Was ist eine „Signatur“?](#user-content-WHAT_IS_A_SIGNATURE)
- [Was ist ein „Falsch-Positiv“?](#user-content-WHAT_IS_A_FALSE_POSITIVE)
- [Wie häufig werden Signaturen aktualisiert?](#user-content-SIGNATURE_UPDATE_FREQUENCY)
- [Ich habe ein Problem bei der Verwendung von phpMussel und ich weiß nicht was ich tun soll! Bitte helfen Sie!](#user-content-ENCOUNTERED_PROBLEM_WHAT_TO_DO)
- [Ich möchte phpMussel v3 mit einer PHP-Version älter als 7.2.0 verwenden; Können Sie helfen?](#user-content-MINIMUM_PHP_VERSION_V3)
- [Kann ich eine einzige phpMussel-Installation verwenden, um mehrere Domains zu schützen?](#user-content-PROTECT_MULTIPLE_DOMAINS)
- [Ich möchte keine Zeit damit verbringen (es zu installieren, es richtig zu ordnen, u.s.w.); Kann ich dich einfach bezahlen, um alles für mich zu tun?](#user-content-PAY_YOU_TO_DO_IT)
- [Kann ich Sie oder einen der Entwickler dieses Projektes für private Arbeit einstellen?](#user-content-HIRE_FOR_PRIVATE_WORK)
- [Ich brauche spezialisierte Modifikationen, Anpassungen, u.s.w.; Können Sie helfen?](#user-content-SPECIALIST_MODIFICATIONS)
- [Ich bin ein Entwickler, Website-Designer oder Programmierer. Kann ich die Arbeit an diesem Projekt annehmen oder anbieten?](#user-content-ACCEPT_OR_OFFER_WORK)
- [Ich möchte zum Projekt beitragen; Darf ich dies machen?](#user-content-WANT_TO_CONTRIBUTE)
- [Wie man spezifische Details über Dateien zugreifen, wenn sie gescannt werden?](#user-content-SCAN_DEBUGGING)
- [Blacklists – Whitelists – Greylists – Was sind sie und wie benutze ich sie?](#user-content-BLACK_WHITE_GREY)
- [Was ist ein „PDO DSN“? Wie kann ich PDO mit phpMussel verwenden?](#user-content-HOW_TO_USE_PDO)
- [Meine Upload-Funktionalität ist asynchron (z.B., verwendet ajax, ajaj, json, u.s.w.). Ich sehe keine spezielle Nachricht oder Warnung, wenn ein Upload blockiert ist. Was ist los?](#user-content-AJAX_AJAJ_JSON)
- [Kann phpMussel EICAR erkennen?](#user-content-DETECT_EICAR)

#### <a name="WHAT_IS_A_SIGNATURE"></a>Was ist eine „Signatur“?

Im Kontext von phpMussel, eine „Signatur“ bezieht sich auf Daten, die als Indikator/Identifikator fungieren, für etwas Bestimmtes das wir suchen, in der Regel in Form eines sehr kleinen, deutlichen, unschädlichen Segments von etwas Größerem und sonst schädlich, so wie ein Virus oder Trojaner, oder in Form einer Datei-Prüfsumme, Hash oder einer anderen identifizierenden Indikator, und enthält in der Regel ein Label, und einige andere Daten zu helfen, zusätzliche Kontext, die von phpMussel verwendet werden können, um den besten Weg zu bestimmen, wenn es aufsieht was wir suchen.

#### <a name="WHAT_IS_A_FALSE_POSITIVE"></a>Was ist ein „Falsch-Positiv“?

Der Begriff „Falsch-Positiv“ (*Alternative: „falsch-positiv Fehler“; „falscher Alarm“*; Englisch: *false positive*; *false positive error*; *false alarm*), sehr einfach beschrieben, und in einem verallgemeinerten Kontext, verwendet wird, wenn eine Bedingung zu testen und wenn die Ergebnisse positiv sind, um die Ergebnisse dieser Tests zu entnehmen (d.h., die Bedingung bestimmt wird positiv oder wahr), aber sind zu erwarten sein (oder sollte gewesen) negativ (d.h., der Zustand, in Wirklichkeit, ist negativ oder falsch). Eine „Falsch-Positiv“ könnte analog zu „weinen Wolf“ betrachtet (wobei die Bedingung geprüft wird, ob es ein Wolf in der Nähe der Herde ist, die Bedingung „falsch“ ist in dass es keinen Wolf in der Nähe der Herde, und die Bedingung wird als „positiv“ berichtet durch die Schäfer durch Aufruf "Wolf, Wolf"), oder analog zu Situationen in medizinischen Tests, wobei ein Patient als mit eine Krankheit diagnostiziert, wenn sie in Wirklichkeit haben sie keine solche Krankheit.

Einige andere Begriffe verwendet: „Wahr-Positiv“, „Wahr-Negativ“ und „Falsch-Negativ“. Eine „Wahr-Positiv“ ist, wenn die Ergebnisse des Tests und der wahren Zustand beide wahr sind (oder „Positiv“), und eine „Wahr-Negativ“ ist, wenn die Ergebnisse des Tests und der wahren Zustand beide falsch sind (oder „Negativ“); Eine „Wahr-Positiv“ oder Eine „Wahr-Negativ“ gilt als eine „korrekte Folgerung“ zu sein. Der Antithese von einem „Falsch-Positiv“ ist eine „Falsch-Negativ“; Eine „Falsch-Negativ“ ist, wenn die Ergebnisse des Tests negativ sind (d.h., die Bedingung bestimmt wird negativ oder falsch zu sein), aber sind zu erwarten sein (oder sollte gewesen) positiv (d.h., der Zustand, in Wirklichkeit, ist „positiv“, oder „wahr“).

Im Kontext der phpMussel, Diese Begriffe beziehen sich auf der Signaturen von phpMussel, und die Dateien die Sie blockieren. Wenn phpMussel Blöcke eine Datei wegen schlechten, veraltete oder falsche Signaturen, sollte aber nicht so getan haben, oder wenn sie es tut, so aus den falschen Gründen, wir beziehen sich auf dieses Ereignis als eine „Falsch-Positiv“. Wenn phpMussel, aufgrund unvorhergesehener Bedrohungen, fehlende Signaturen oder Defizite in ihren Signaturen, versagt eine Datei zu blockieren, die blockiert werden sollte, wir beziehen sich auf dieses Ereignis als eine „verpasste Erkennung“ (das entspricht einem „Falsch-Negativ“).

Dies kann durch die folgende Tabelle zusammengefasst werden:

&nbsp; | phpMussel sollte *KEINE* Datei blockieren | phpMussel *SOLLTE* eine Datei blockieren
---|---|---
phpMussel tut blockiert eine Datei *NICHT* | Wahr-Negativ (korrekte Folgerung) | Verpasste Erkennung (analog zu Falsch-Negativ)
phpMussel *TUT* blockiert eine Datei | __Falsch-Positiv__ | True-Positiv (korrekte Folgerung)

#### <a name="SIGNATURE_UPDATE_FREQUENCY"></a>Wie häufig werden Signaturen aktualisiert?

Die Aktualisierungshäufigkeit hängt von den betreffenden Signaturdateien ab. In der Regel, alle Betreuer für phpMussel Signaturdateien versuchen ihre Signaturen so aktuell wie möglich zu halten, aber da haben wir alle anderen Verpflichtungen, unser Leben außerhalb des Projekts, und da für unsere Bemühungen um das Projekt, keiner von uns wird finanziell entschädigt (d.h., bezahlt), ein genauer Aktualisierungs-Zeitplan kann nicht garantiert werden. In der Regel, Signaturen werden aktualisiert, wann immer es genügend Zeit gibt sie zu aktualisieren. Hilfe wird immer geschätzt, wenn Sie bereit bist, irgendwelche anzubieten.

#### <a name="ENCOUNTERED_PROBLEM_WHAT_TO_DO"></a>Ich habe ein Problem bei der Verwendung von phpMussel und ich weiß nicht was ich tun soll! Bitte helfen Sie!

- Verwenden Sie die neueste Version der Software? Verwenden Sie die neuesten Versionen Ihrer Signaturdateien? Wenn die Antwort auf eine dieser beiden Fragen nein ist, Versuchen alles zuerst zu aktualisieren, und überprüfen Sie ob das Problem weiterhin besteht. Wenn es weiterhin besteht, lesen Sie weiter.
- Haben Sie alle der Dokumentation überprüft? Wenn nicht, bitte tun Sie dies. Wenn das Problem nicht mit der Dokumentation gelöst werden kann, lesen Sie weiter.
- Haben Sie die **[Issues-Seite](https://github.com/phpMussel/phpMussel/issues)** überprüft, ob das Problem vorher erwähnt wurde? Wenn es vorher erwähnt wurde, überprüfen Sie ob irgendwelche Vorschläge, Ideen und/oder Lösungen zur Verfügung gestellt wurden, und folge wie nötig um das Problem zu lösen.
- Wenn das Problem weiterhin besteht, bitte fragen Sie nach Hilfe, indem Sie auf der Issues-Seite ein neues Issue erstellen.

#### <a name="MINIMUM_PHP_VERSION_V3"></a>Ich möchte phpMussel v3 mit einer PHP-Version älter als 7.2.0 verwenden; Können Sie helfen?

Nein. PHP >= 7.2.0 ist eine Mindestanforderung für phpMussel v3.

*Siehe auch: [Kompatibilitätstabellen](https://maikuolan.github.io/Compatibility-Charts/).*

#### <a name="PROTECT_MULTIPLE_DOMAINS"></a>Kann ich eine einzige phpMussel-Installation verwenden, um mehrere Domains zu schützen?

Ja.

#### <a name="PAY_YOU_TO_DO_IT"></a>Ich möchte keine Zeit damit verbringen (es zu installieren, es richtig zu ordnen, u.s.w.); Kann ich dich einfach bezahlen, um alles für mich zu tun?

Vielleicht. Dies wird von Fall zu Fall bewertet. Sagen Sie uns was sie brauchen und was du anbietest. Danach können wir ihnen sagen, ob wir helfen können.

#### <a name="HIRE_FOR_PRIVATE_WORK"></a>Kann ich Sie oder einen der Entwickler dieses Projektes für private Arbeit einstellen?

*Siehe oben.*

#### <a name="SPECIALIST_MODIFICATIONS"></a>Ich brauche spezialisierte Modifikationen, Anpassungen, u.s.w.; Können Sie helfen?

*Siehe oben.*

#### <a name="ACCEPT_OR_OFFER_WORK"></a>Ich bin ein Entwickler, Website-Designer oder Programmierer. Kann ich die Arbeit an diesem Projekt annehmen oder anbieten?

Ja. Unsere Lizenz verbietet dies nicht.

#### <a name="WANT_TO_CONTRIBUTE"></a>Ich möchte zum Projekt beitragen; Darf ich dies machen?

Ja. Beiträge zum Projekt sind sehr willkommen. Bitte beachten Sie „CONTRIBUTING.md“ für weitere Informationen.

#### <a name="SCAN_DEBUGGING"></a>Wie man spezifische Details über Dateien zugreifen, wenn sie gescannt werden?

Sie können auf spezifische Details über Dateien zugreifen, wenn sie gescannt werden, indem Sie ein Array zuweisen, das zu diesem Zweck verwendet werden soll, bevor Sie phpMussel anweisen, sie zu scannen.

Im folgenden Beispiel, `$Foo` ist zu diesem Zweck zugeordnet. Nach dem Scannen `/Dateipfad/...`, detaillierte Informationen über die von `/Dateipfad/...` enthaltenen Dateien werden von `$Foo` enthalten sein.

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);

$Scanner->setScanDebugArray($Foo);

$Results = $Scanner->scan('/Dateipfad/...');

var_dump($Foo);
```

Das Array ist ein multidimensionales Array, das aus Elementen besteht, die jede gescannte Datei repräsentieren, und Subelemente, die die Details zu diesen Dateien darstellen. Diese Subelemente sind wie folgt:

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

*† - Nicht mit Ergebnissen aus dem Cache versehen (nur für neue Ergebnissen versehen).*

*‡ - Wird nur beim Scannen von PE-Dateien bereitgestellt.*

Optional, kann dieses Array zerstört werden, indem man folgendes verwendet:

```PHP
$Scanner->destroyScanDebugArray($Foo);
```

#### <a name="BLACK_WHITE_GREY"></a>Blacklists – Whitelists – Greylists – Was sind sie und wie benutze ich sie?

Die Begriffe vermitteln unterschiedliche Bedeutungen in verschiedenen Kontexten. In phpMussel gibt es drei Kontexte, in denen diese Begriffe verwendet werden: Dateigröße Antwort, Dateityp Antwort, und die Signatur-Greylist.

Um ein gewünschtes Ergebnis bei minimalen Kosten für die Verarbeitung zu erzielen, gibt es einige einfache Dinge, die phpMussel vor dem eigentlichen Scannen von Dateien überprüfen kann, wie Dateigröße, Name und Erweiterung. Beispielsweise; Wenn eine Datei zu groß ist, oder ihre Erweiterung einen Dateityp angibt, den wir auf unseren Websites sowieso nicht zulassen möchten, können wir die Datei sofort markieren und müssen sie nicht scannen.

Dateigröße Antwort ist die Art, wie phpMussel reagiert, wenn eine Datei ein bestimmtes Limit überschreitet. Obwohl keine tatsächlichen Listen betroffen sind, kann eine Datei basierend auf ihrer Größe als effektiv auf Blacklists, Whitelists oder Greylists betrachtet werden. Es gibt zwei separate, optionale Konfigurationsdirektiven, um jeweils ein Limit und eine gewünschte Antwort anzugeben.

Dateityp Antwort ist die Art, wie phpMussel auf die Dateierweiterung reagiert. Es gibt drei separate, optionale Konfigurationsdirektiven, mit denen explizit angegeben werden kann, welche Erweiterungen auf die Blacklist, Whitelist oder Greylist gesetzt werden sollen. Eine Datei kann in einer dieser Listen effektiv betrachtet werden, wenn ihre Erweiterung mit einer der angegebenen Erweiterungen übereinstimmt.

In diesen beiden Kontexten, Whitelist bedeutet, dass es nicht gescannt oder markiert werden sollte; Blacklist bedeutet, dass es markiert werden sollte (und muss daher nicht gescannt werden); und Greylist bedeutet, dass eine weitere Analyse erforderlich ist, um festzustellen, ob wir sie markieren sollten (d.h., es sollte gescannt werden).

Die Signatur-Greylist ist eine Liste von Signaturen, die im Wesentlichen ignoriert werden sollten (Dies wird kurz in der Dokumentation erwähnt). Wenn eine Signatur auf der Signatur-Greylist ausgelöst wird, arbeitet phpMussel weiter durch seine Signaturen und unternimmt keine besondere Aktion in Bezug auf die Signatur auf der Greylist. Es gibt keine Signatur-Blacklist, da das implizierte Verhalten ohnehin normal für ausgelöste Signaturen ist, und es gibt keine Signatur-Whitelist, weil das implizierte Verhalten keinen Sinn ergibt, wenn man bedenkt, wie phpMussel normal funktioniert und welche Fähigkeiten es bereits hat.

Die Signatur-Greylist ist nützlich, wenn Sie Probleme beheben müssen, die von einer bestimmten Signatur verursacht werden, ohne die gesamte Signaturdatei zu deaktivieren oder zu deinstallieren.

#### <a name="HOW_TO_USE_PDO"></a>Was ist ein „PDO DSN“? Wie kann ich PDO mit phpMussel verwenden?

„PDO“ ist eine Akronym für "[PHP Data Objects](https://www.php.net/manual/de/intro.pdo.php)". Es bietet eine Schnittstelle zum Verbinden von PHP mit einigen Datenbanksystemen die häufig von verschiedenen PHP-Anwendungen verwendet werden.

„DSN“ ist eine Akronym für "[data source name](https://de.wikipedia.org/wiki/Data_Source_Name)". Der „PDO DSN“ beschreibt wie PDO zum einer Datenbank verbindet.

phpMussel bietet die Option, PDO für Caching-Zwecke zu verwenden. Damit dies ordnungsgemäß funktioniert, müssen Sie phpMussel entsprechend konfigurieren, PDO aktivieren, eine neue Datenbank für phpMussel erstellen (falls Sie noch keine Datenbank für phpMussel in Betracht gezogen haben) und eine neue Tabelle erstellen in Ihrer Datenbank entsprechend der unten beschriebenen Struktur.

Wenn eine Datenbankverbindung erfolgreich hergestellt wurde, aber die erforderliche Tabelle jedoch nicht vorhanden ist, wird versucht sie automatisch zu erstellen. Dieses Verhalten wurde jedoch nicht ausführlich getestet und der Erfolg kann nicht garantiert werden.

Dies gilt natürlich nur, wenn phpMussel tatsächlich PDO verwenden soll. Wenn Sie zufrieden sind, dass phpMussel Flatfile-Caching (gemäß Standardkonfiguration) oder eine der verschiedenen anderen Caching-Optionen verwendet, müssen Sie sich nicht mit dem Einrichten von Datenbanken, Tabellen u.s.w. befassen.

In der unten beschriebenen Struktur wird „phpmussel“ als Datenbankname verwendet. Sie können jedoch einen beliebigen Namen für Ihre Datenbank verwenden, sofern dieser Name in Ihrer DSN-Konfiguration repliziert wird.

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

Die Konfigurationsanweisung `pdo_dsn` von phpMussel sollte wie folgt konfiguriert werden.

```
Abhängig davon, welcher Datenbanktreiber verwendet wird...
├─4d (Warnung: Experimentell, ungetestet, nicht empfohlen!)
│ │
│ │         ╔═══════╗
│ └─4D:host=localhost;charset=UTF-8
│           ╚╤══════╝
│            └Der Host, auf dem sich die Datenbank befindet.
├─cubrid
│ │
│ │             ╔═══════╗      ╔═══╗        ╔═════╗
│ └─cubrid:host=localhost;port=33000;dbname=example
│               ╚╤══════╝      ╚╤══╝        ╚╤════╝
│                │              │            └Der Name der Datenbank.
│                │              │
│                │              └Die Portnummer, die beim Herstellen der
│                │               Verbindung verwendet werden soll.
│                │
│                └Der Host, auf dem sich die Datenbank befindet.
├─dblib
│ │
│ │ ╔═══╗      ╔═══════╗        ╔═════╗
│ └─dblib:host=localhost;dbname=example
│   ╚╤══╝      ╚╤══════╝        ╚╤════╝
│    │          │                └Der Name der Datenbank.
│    │          │
│    │          └Der Host, auf dem sich die Datenbank befindet.
│    │
│    └Mögliche Werte: "mssql", "sybase", "dblib".
├─firebird
│ │
│ │                 ╔═══════════════════╗
│ └─firebird:dbname=/path/to/database.fdb
│                   ╚╤══════════════════╝
│                    ├Kann ein Pfad zu einer lokalen Datenbankdatei sein.
│                    │
│                    ├Kann eine Verbindung mit einem Host und einer Portnummer
│                    │herstellen.
│                    │
│                    └Sie sollten auf die Firebird-Dokumentation lesen wenn Sie
│                     diese verwenden möchten.
├─ibm
│ │
│ │         ╔═════╗
│ └─ibm:DSN=example
│           ╚╤════╝
│            └Die katalogisierte Datenbank, mit der eine Verbindung hergestellt
│             werden soll.
├─informix
│ │
│ │              ╔═════╗
│ └─informix:DSN=example
│                ╚╤════╝
│                 └Die katalogisierte Datenbank, mit der eine Verbindung
│                  hergestellt werden soll.
├─mysql (Am meisten empfohlen!)
│ │
│ │              ╔═════╗      ╔═══════╗      ╔══╗
│ └─mysql:dbname=example;host=localhost;port=3306
│                ╚╤════╝      ╚╤══════╝      ╚╤═╝
│                 │            │              └Die Portnummer, die beim
│                 │            │               Herstellen der Verbindung
│                 │            │               verwendet werden soll.
│                 │            │
│                 │            └Der Host, auf dem sich die Datenbank befindet.
│                 │
│                 └Der Name der Datenbank.
├─oci
│ │
│ │            ╔═════╗
│ └─oci:dbname=example
│              ╚╤════╝
│               ├Kann auf die spezifische katalogisierte Datenbank verweisen.
│               │
│               ├Kann eine Verbindung mit einem Host und einer Portnummer
│               │herstellen.
│               │
│               └Sie sollten auf die Oracle-Dokumentation lesen wenn Sie diese
│                verwenden möchten.
├─odbc
│ │
│ │      ╔═════╗
│ └─odbc:example
│        ╚╤════╝
│         ├Kann auf die spezifische katalogisierte Datenbank verweisen.
│         │
│         ├Kann eine Verbindung mit einem Host und einer Portnummer herstellen.
│         │
│         └Sie sollten auf die ODBC/DB2-Dokumentation lesen wenn Sie diese
│          verwenden möchten.
├─pgsql
│ │
│ │            ╔═══════╗      ╔══╗        ╔═════╗
│ └─pgsql:host=localhost;port=5432;dbname=example
│              ╚╤══════╝      ╚╤═╝        ╚╤════╝
│               │              │           └Der Name der Datenbank.
│               │              │
│               │              └Die Portnummer, die beim Herstellen der
│               │               Verbindung verwendet werden soll.
│               │
│               └Der Host, auf dem sich die Datenbank befindet.
├─sqlite
│ │
│ │        ╔════════╗
│ └─sqlite:example.db
│          ╚╤═══════╝
│           └Der Pfad zur lokalen Datenbankdatei, die verwendet werden soll.
└─sqlsrv
  │
  │               ╔═══════╗ ╔══╗          ╔═════╗
  └─sqlsrv:Server=localhost,1521;Database=example
                  ╚╤══════╝ ╚╤═╝          ╚╤════╝
                   │         │             └Der Name der Datenbank.
                   │         │
                   │         └Die Portnummer, die beim Herstellen der
                   │          Verbindung verwendet werden soll.
                   │
                   └Der Host, auf dem sich die Datenbank befindet.
```

Wenn Sie sich nicht sicher sind, was Sie für einen bestimmten Teil Ihres DSN verwenden sollen, prüfen Sie zunächst, ob der DSN so funktioniert, wie er ist, ohne etwas zu ändern.

Beachten Sie, dass `pdo_username` und `pdo_password` mit dem Benutzernamen und dem Passwort übereinstimmen sollten, die Sie für Ihre Datenbank ausgewählt haben.

#### <a name="AJAX_AJAJ_JSON"></a>Meine Upload-Funktionalität ist asynchron (z.B., verwendet ajax, ajaj, json, u.s.w.). Ich sehe keine spezielle Nachricht oder Warnung, wenn ein Upload blockiert ist. Was ist los?

Das ist normal. Die Standardseite „Upload verweigert“ von phpMussel wird als HTML-Code bereitgestellt, der für typische synchrone Anforderungen ausreichen sollte, aber das wird wahrscheinlich nicht ausreichen, wenn Ihre Upload-Funktionalität etwas anderes erwartet. Wenn Ihre Upload-Funktionalität asynchron ist, oder erwartet dass ein Upload-Status asynchron bereitgestellt wird, es gibt einige Dinge die Sie versuchen könnten, damit phpMussel die Anforderungen Ihrer Upload-Funktionalität erfüllt.

1. Erstellen einer benutzerdefinierten Ausgabevorlage für anderes als HTML zu bedienen.
2. Erstellen einer benutzerdefinierten Plugin, um die Standardseite „Upload verweigert“ vollständig zu umgehen, und lassen Sie den Upload-Handler etwas anderes tun wenn ein Upload blockiert ist (es gibt einige Plugin-Hooks, die vom Upload-Handler bereitgestellt werden und für diese Aufgabe hilfreich sein könnten).
3. Deaktivieren Sie den Upload-Handler vollständig und rufen Sie stattdessen einfach die phpMussel-API in Ihrer Upload-Funktionalität auf.

#### <a name="DETECT_EICAR"></a>Kann phpMussel EICAR erkennen?

Ja. Eine Signatur zum Erkennen von EICAR ist in der „phpMussel Standard Signaturdatei für reguläre Ausdrücke“ enthalten (`phpmussel_regex.db`). Solange diese Signaturdatei installiert und aktiviert ist, sollte phpMussel EICAR erkennen können. Da die ClamAV-Datenbank auch zahlreiche Signaturen speziell zur Erkennung von EICAR enthält, kann ClamAV EICAR problemlos erkennen, aber da phpMussel nur eine reduzierte Teilmenge der von ClamAV bereitgestellten Signaturen verwendet, reichen sie möglicherweise nicht aus damit phpMussel EICAR erkennt. Die Fähigkeit zu erkennen hängt auch von Ihrer genauen Konfiguration ab.

---


### 9. <a name="SECTION9"></a>RECHTSINFORMATION

#### 9.0 ABSCHNITT VORWORT

Dieser Abschnitt der Dokumentation beschreibt mögliche rechtliche Überlegungen zur Verwendung und Implementierung des Pakets, und um einige grundlegende verwandte Informationen zur Verfügung zu stellen. Dies kann für einige Benutzer wichtig sein, um sicherzustellen, dass die gesetzlichen Anforderungen in den Ländern eingehalten werden, in denen sie tätig sind, und einige Benutzer müssen möglicherweise ihre Website-Richtlinien in Übereinstimmung mit diesen Informationen anpassen.

Zuallererst, bitte beachten Sie, dass ich (der Autor des Pakets) weder Rechtsanwalt noch qualifizierter Jurist bin. Daher bin ich rechtlich nicht zur Rechtsberatung qualifiziert. Auch, in einigen Fällen können die genauen rechtlichen Anforderungen zwischen verschiedenen Ländern und Rechtsordnungen variieren, und diese unterschiedlichen rechtlichen Anforderungen können sich manchmal widersprechen (wie zum Beispiel, in Ländern, die [Privatsphäre](https://de.wikipedia.org/wiki/Privatsph%C3%A4re) und das [Recht auf Vergessenwerden bevorzugen](https://de.wikipedia.org/wiki/Recht_auf_Vergessenwerden), gegenüber Ländern, die eine erweiterte [Vorratsdatenspeicherung](https://de.wikipedia.org/wiki/Vorratsdatenspeicherung) bevorzugen). Berücksichtigen Sie auch, dass der Zugriff auf das Paket nicht auf bestimmte Länder oder Gerichtsbarkeiten beschränkt ist und daher die Paket-Nutzerbasis wahrscheinlich geografisch-vielfältig ist. Nach diesen Punkten kann ich nicht sagen, was es heißt, in allen Belangen für alle Nutzer „rechtskonform“ zu sein. Jedoch, ich hoffe, dass die hier enthaltenen Informationen Ihnen helfen, selbst zu einer Entscheidung zu kommen, was Sie tun müssen, um im Kontext des Pakets rechtskonform zu bleiben. Wenn Sie Zweifel oder Bedenken hinsichtlich der hierin enthaltenen Informationen haben, oder wenn Sie aus rechtlicher Sicht zusätzliche Hilfe und Rat benötigen, würde ich Ihnen empfehlen, einen qualifizierten Rechtsberater zu konsultieren.

#### 9.1 HAFTUNG UND VERANTWORTUNG

Wie bereits in der Paketlizenz angegeben, wird das Paket ohne jegliche Gewährleistung bereitgestellt. Dies beinhaltet (aber ist nicht beschränkt auf) den gesamten Umfang der Haftung. Das Paket wird Ihnen zu Ihrer Bequemlichkeit zur Verfügung gestellt, in der Hoffnung, dass es nützlich sein wird, und dass es Ihnen einen Vorteil bringen wird. Sie das Paket verwenden oder implementieren, ist jedoch Ihre eigene Entscheidung. Sie sind nicht gezwungen, das Paket zu verwenden oder zu implementieren, aber wenn Sie dies tun, sind Sie für diese Entscheidung verantwortlich. Weder ich noch andere Mitwirkende des Pakets sind rechtlich verantwortlich für die Folgen der Entscheidungen, die Sie treffen, unabhängig davon, ob sie direkt, indirekt, implizit oder anderweitig sind.

#### 9.2 DRITTE

Abhängig von seiner genauen Konfiguration und Implementierung kann das Paket in einigen Fällen mit Dritten kommunizieren und Informationen teilen. Diese Informationen können in einigen Kontexten von einigen Gerichtsbarkeiten als "[personenbezogene Daten](https://de.wikipedia.org/wiki/Personenbezogene_Daten)" (oder „PII“) definiert werden.

Wie diese Informationen von diesen Dritten verwendet werden können, unterliegt den verschiedenen Richtlinien, die von diesen Dritten festgelegt wurden, und liegt außerhalb des Anwendungsbereichs dieser Dokumentation. In allen diesen Fällen jedoch kann der Austausch von Informationen mit diesen Dritten deaktiviert werden. In allen diesen Fällen liegt es in Ihrer Verantwortung, wenn Sie sich dafür entscheiden, Ihre Bedenken hinsichtlich der Vertraulichkeit, Sicherheit, und Verwendung von personenbezogenen Daten durch diese Dritten zu untersuchen. Wenn irgendwelche Zweifel bestehen oder wenn Sie mit dem Verhalten dieser Dritten in Bezug auf PII nicht zufrieden sind, ist es möglicherweise am besten, den gesamten Informationsaustausch mit diesen Dritten zu deaktivieren.

Aus Gründen der Transparenz wird im Folgenden beschrieben, welche Art von Informationen, und mit wem, geteilt werden.

##### 9.2.1 URL-SCANNER

URLs, die innerhalb von Dateiuploads gefunden werden, können je nach Konfiguration des Pakets mit der Google Safe Browsing-API geteilt werden. Die Google Safe Browsing-API benötigt API-Schlüssel, um ordnungsgemäß zu funktionieren, und ist daher standardmäßig deaktiviert.

*Relevante Konfigurationsdirektiven:*
- `urlscanner` -> `google_api_key`

##### 9.2.2 VIRUS TOTAL

Wenn phpMussel einen Dateiupload scannt, werden die Hashwerte dieser Dateien möglicherweise mit der Virus Total-API geteilt, je nachdem, wie das Paket konfiguriert ist. Es ist geplant, in der Zukunft auch ganze Dateien gemeinsam nutzen zu können, aber diese Funktion wird derzeit nicht vom Paket unterstützt. Die Virus Total API benötigt einen API-Schlüssel, um korrekt zu funktionieren, und ist daher standardmäßig deaktiviert.

Informationen (einschließlich Dateien und zugehörige Dateimetadaten), die mit Virus Total geteilt werden, können auch mit ihren Partnern, verbundenen Unternehmen und verschiedenen anderen zu Forschungszwecken geteilt werden. Dies wird detaillierter durch ihre Datenschutzrichtlinie beschrieben.

*Sehen: [Privacy Policy &ndash; VirusTotal](https://support.virustotal.com/hc/en-us/articles/115002168385-Privacy-Policy).*

*Relevante Konfigurationsdirektiven:*
- `virustotal` -> `vt_public_api_key`

#### 9.3 PROTOKOLLIERUNG

Protokollierung ist aus verschiedenen Gründen ein wichtiger Teil von phpMussel. Ohne Protokollierung kann es schwierig sein, falsche Positive zu diagnostizieren, um genau festzustellen, wie gut phpMussel in einem bestimmten Kontext funktioniert, und es kann schwierig sein zu bestimmen, wo seine Defizite liegen und welche Änderungen möglicherweise an seiner Konfiguration oder den Signatures vorgenommen werden müssen, damit es weiterhin wie beabsichtigt funktioniert. Ungeachtet, die Protokollierung ist möglicherweise nicht für alle Benutzer wünschenswert und bleibt vollständig optional. In phpMussel ist die Protokollierung standardmäßig deaktiviert. Um es zu aktivieren, muss phpMussel entsprechend konfiguriert werden.

Zusätzlich, ob Protokollierung rechtlich zulässig ist, und in welchem Umfang es rechtlich zulässig ist (z.B., die Arten von Informationen, die protokolliert werden können, für wie lange und unter welchen Umständen), kann je nach Rechtsprechung und Kontext (z.B., ob Sie als Einzelperson, als juristische Person tätig sind, und ob auf kommerzieller oder nichtkommerzieller Basis), in dem phpMussel implementiert wird, variieren. Es kann daher sinnvoll sein, diesen Abschnitt sorgfältig durchzulesen.

Es gibt mehrere Arten der Protokollierung, die phpMussel ausführen kann. Verschiedene Arten der Protokollierung beinhalten verschiedene Arten von Informationen, aus verschiedenen Gründen.

##### 9.3.0 SCAN PROTOKOLLIERUNG

Wenn in der Paketkonfiguration aktiviert, speichert phpMussel Protokolle der Dateien, die es gescannt. Diese Art der Protokollierung ist in zwei verschiedenen Formaten verfügbar:
- Menschenlesbar oder benutzerfreundliche Protokolldateien.
- Serialisierte Protokolldateien.

Einträge in einer für menschenlesbaren Protokolldatei sehen in etwa wie folgt aus (als Beispiel):

```
Sun, 19 Jul 2020 13:33:31 +0800 Gestartet.
→ Überprüfe „ascii_standard_testfile.txt“.
─→ Entdeckt phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
Sun, 19 Jul 2020 13:33:31 +0800 Fertig.
```

Ein Scan-Protokolleintrag enthält normalerweise die folgenden Informationen:
- Datum und Uhrzeit, zu der die Datei gescannt wurde.
- Der Name der gescannten Datei.
- Was wurde in der Datei gefunden (falls etwas entdeckt wurde).

*Relevante Konfigurationsdirektiven:*
- `general` -> `scan_log`
- `general` -> `scan_log_serialized`

Wenn diese Direktiven leer bleiben, bleibt diese Art der Protokollierung deaktiviert.

##### 9.3.1 UPLOADS PROTOKOLLIERUNG

Wenn in der Paketkonfiguration aktiviert, speichert phpMussel Protokolle der Uploads, die blockiert wurden.

*Als Beispiel:*

```
Datum: Sun, 19 Jul 2020 13:33:31 +0800
IP Adresse: 127.0.0.x
== Scan-Ergebnisse (warum gekennzeichnet) ==
Entdeckt phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
== Rekonstruktion der Hash-Signaturen ==
dcacac499064454218823fbabff7e09b5b011c0c877ee6f215f35bffb195b6e9:654:ascii_standard_testfile.txt
Als „1595142388-2e017ea9ac1478e45dc15794a1fc18c0.qfu“ unter Quarantäne gestellt.
```

Diese Protokolleinträge enthalten normalerweise die folgenden Informationen:
- Das Datum und die Uhrzeit, zu der der Upload gesperrt wurde.
- Die IP-Adresse, von der der Upload stammt.
- Der Grund, warum die Datei blockiert wurde (was entdeckt wurde).
- Der Name der blockierten Datei.
- Die Prüfsumme und die Größe der Datei sind blockiert.
- Ob die Datei unter Quarantäne gestellt wurde, und unter welchem internen Namen.

*Relevante Konfigurationsdirektiven:*
- `web` -> `uploads_log`

##### 9.3.2 FRONTEND PROTOKOLLIERUNG

Diese Art der Protokollierung bezieht sich auf Frontend-Einloggen-Versuchen und tritt nur auf, wenn ein Benutzer versucht, sich am Frontend anzumelden (vorausgesetzt, das Frontend-Zugriff ist aktiviert).

Ein Frontend-Protokolleintrag enthält die IP-Adresse des Benutzers, der sich anzumelden versucht, das Datum und die Uhrzeit des Versuchs, und die Ergebnisse des Versuchs (erfolgreich eingeloggt oder könnte sich nicht einloggen). Ein Frontend-Protokolleintrag sieht in etwa wie folgt aus (als Beispiel):

```
x.x.x.x - Day, dd Mon 20xx hh:ii:ss +0000 - „admin“ - Eingeloggt.
```

*Die für die Frontend-Protokollierung verantwortliche Konfigurationsdirektiven lautet:*
- `general` -> `frontend_log`

##### 9.3.3 PROTOKOLLROTATION

Möglicherweise möchten Sie Protokolle nach einer gewissen Zeit löschen, oder müssen dies gesetzlich tun (d.h., die Zeitspanne, die für die Aufbewahrung von Protokolldateien gesetzlich zulässig ist, kann gesetzlich beschränkt sein). Sie können dies erreichen, indem Sie Datums/Zeitmarkierungen in die Namen Ihrer Protokolldateien einfügen, die in Ihrer Paketkonfiguration festgelegt sind (z.B., `{yyyy}-{mm}-{dd}.log`), und dann Aktivieren der Protokollrotation (Protokollrotation ermöglicht es Ihnen, einige Aktionen in Protokolldateien durchzuführen, wenn bestimmte Limits überschritten werden).

Beispielsweise: Wenn ich gesetzlich dazu verpflichtet wäre, Protokolldateien nach 30 Tagen zu löschen, könnte ich `{dd}.log` in den Namen meiner Protokolldateien angeben (`{dd}` steht für Tage), setze den Wert von `log_rotation_limit` auf 30, und setze den Wert von `log_rotation_action` auf `Delete`.

Umgekehrt, wenn Sie Protokolldateien für einen längeren Zeitraum aufbewahren müssen, Sie könnten entweder überhaupt keine Protokollrotation verwenden, oder Sie könnten den Wert von `log_rotation_action` auf `Archive` setzen, um Protokolldateien zu komprimieren, wodurch der Gesamtbetrag des belegten Speicherplatzes reduziert wird.

*Relevante Konfigurationsdirektiven:*
- `general` -> `log_rotation_limit`
- `general` -> `log_rotation_action`

##### 9.3.4 PROTOKOLL-TRUNKIERUNG

Es ist auch möglich, um einzelne Protokolldateien zu trunkieren, wenn sie eine bestimmte Größe überschreiten, falls Sie dies benötigen oder tun möchten.

*Relevante Konfigurationsdirektiven:*
- `general` -> `truncate`

##### 9.3.5 IP-ADRESSE PSEUDONYMISIERUNG

Erstens, wenn Sie mit dem Begriff nicht vertraut sind, „Pseudonymisierung“ bezieht sich auf die Verarbeitung personenbezogener Daten, so dass sie ohne zusätzliche Informationen nicht mehr für eine bestimmte Person identifiziert werden können, und vorausgesetzt, dass diese zusätzlichen Informationen getrennt aufbewahrt werden, und vorbehaltlich technischer und organisatorischer Maßnahmen, um sicherzustellen, dass personenbezogene Daten für keine natürliche Person identifiziert werden können.

Die folgenden Ressourcen können helfen, es genauer zu erklären:
- [[johner-institut.de] Anonymisierung und Pseudonymisierung](https://www.johner-institut.de/blog/gesundheitswesen/anonymisierung-und-pseudonymisierung/)
- [[datenschutzbeauftragter-info.de] Pseudonymisierung – was ist das eigentlich?](https://www.datenschutzbeauftragter-info.de/pseudonymisierung-was-ist-das-eigentlich/)
- [[Wikipedia] Anonymisierung und Pseudonymisierung](https://de.wikipedia.org/wiki/Anonymisierung_und_Pseudonymisierung)

Unter gewissen Umständen sind Sie gesetzlich dazu verpflichtet, alle PII, die gesammelt, verarbeitet oder gespeichert werden, zu anonymisieren oder zu pseudonymisieren. Obwohl dieses Konzept schon seit einiger Zeit besteht, erwähnt und ermutigt die GDPR/DSGVO ausdrücklich die „Pseudonymisierung“ der PII.

phpMussel ist in der Lage, IP-Adressen zu pseudonymisieren, wenn Sie sie protokollieren, wenn Sie dies benötigen oder tun möchten. Wenn phpMussel IP-Adressen pseudonymisiert, wird das letzte Oktett von IPv4-Adressen und alles nach dem zweiten Teil von IPv6-Adressen durch ein „x“ dargestellt (runden effektiv IPv4-Adressen in Subnetz 24 und IPv6-Adressen in Subnetz 32 ab).

*Relevante Konfigurationsdirektiven:*
- `legal` -> `pseudonymise_ip_addresses`

##### 9.3.6 STATISTIKEN

phpMussel ist optional in der Lage, Statistiken wie die Gesamtzahl der gescannten und blockierten Dateien seit einem bestimmten Zeitpunkt zu verfolgen. Diese Funktion ist standardmäßig deaktiviert, kann jedoch über die Paketkonfiguration aktiviert werden. Die Art der erfassten Informationen sollte nicht als PII betrachtet werden.

*Relevante Konfigurationsdirektiven:*
- `general` -> `statistics`

##### 9.3.7 KRYPTOGRAPHIE

phpMussel verwendet keine [Kryptografie](https://de.wikipedia.org/wiki/Kryptographie) zu den Cache oder Protokollierung. Kryptographie für den Cache oder Protokollierung kann in Zukunft eingeführt werden, aber es gibt derzeit keine konkreten Pläne dafür. Wenn Sie befürchten, dass unbefugte Dritte Zugang zu Teilen von phpMussel erhalten, die PII oder vertrauliche Informationen wie Cache oder Protokolle enthalten, würde ich empfehlen, phpMussel nicht an einem öffentlich zugänglichen Ort zu installieren (z.B., installieren Sie phpMussel außerhalb des Standard-Verzeichnisses `public_html` oder eines entsprechenden Verzeichnisses, das für die meisten Standard-Webserver verfügbar ist) und dass entsprechend restriktive Berechtigungen für das Verzeichnis erzwungen werden, in dem sie sich befinden. Wenn dies nicht ausreicht, um Ihre Bedenken auszuräumen, konfigurieren Sie phpMussel so, dass die Arten von Informationen, die Ihre Bedenken verursachen, nicht erfasst oder protokolliert werden (z.B. durch Deaktivieren der Protokollierung).

#### 9.4 COOKIES

Wenn sich ein Benutzer erfolgreich am Frontend eingeloggt, phpMussel setzt eine einen [Cookie](https://de.wikipedia.org/wiki/HTTP-Cookie), um sich den Benutzer für nachfolgende Anfragen merken zu können (d.h., Cookies dienen zur Authentifizierung des Benutzers bei einer Einloggen-Sitzung). Auf der Einloggen-Seite wird eine Cookie-Warnung angezeigt, die den Benutzer warnen, dass ein Cookie gesetzt wird, wenn er die relevante Aktion ausführt. An anderen Stellen in der Codebasis werden keine Cookies gesetzt.

#### 9.5 VERMARKTUNG UND WERBUNG

phpMussel sammelt und verarbeitet keine Informationen für der Zweck des Vermarktung oder Werbung, und weder verkauft noch profitiert von gesammelten oder protokolliert Informationen. phpMussel ist kein kommerzielles Unternehmen, noch bezieht es sich auf irgendwelche kommerziellen Interessen, daher macht es keinen Sinn, diese Dinge zu tun. Dies ist seit Beginn des Projekts der Fall und ist auch heute noch der Fall. Außerdem, diese Dinge wären kontraproduktiv für den Geist und den beabsichtigten Zweck des gesamten Projekts, und so lange ich das Projekt weiterführen, wird nie passieren.

#### 9.6 DATENSCHUTZERKLÄRUNG

Unter bestimmten Umständen können Sie gesetzlich dazu verpflichtet sein, auf allen Seiten und Abschnitten Ihrer Website einen Link zu Ihrer Datenschutzerklärung deutlich anzuzeigen. Dies kann wichtig sein, um sicherzustellen, dass die Benutzer genau über Ihre genauen Datenschutzpraktiken, die Arten von personenbezogenen Daten, die Sie sammeln, und über Ihre beabsichtigte Verwendung informiert sind. Um einen solchen Link auf der Seite „Zugriff verweigert“ von phpMussel einzubinden, wird eine Konfigurationsdirektive bereitgestellt, um die URL zu Ihrer Datenschutzerklärung anzugeben.

*Relevante Konfigurationsdirektiven:*
- `legal` -> `privacy_policy`

#### 9.7 GDPR/DSGVO

Die Datenschutz-Grundverordnung (DSGVO) ist eine Verordnung der Europäischen Union, die am 25. Mai 2018 in Kraft tritt. Das Hauptziel der Verordnung besteht darin, den EU-Bürgern und EU-Anwohnern die Kontrolle über ihre eigenen personenbezogenen Daten zu ermöglichen und die Regulierung innerhalb der EU in Bezug auf Privatsphäre und personenbezogene Daten zu vereinheitlichen.

Die Verordnung enthält spezifische Bestimmungen für die Verarbeitung "[personenbezogenen Daten](https://de.wikipedia.org/wiki/Personenbezogene_Daten)" (PII) von „betroffenen Personen“ (jede identifizierte oder identifizierbare natürliche Person) aus oder innerhalb der EU. Um der Verordnung zu entsprechen, müssen „Unternehmen“ (gemäß der Definition in der Verordnung) und alle relevanten Systeme und Prozesse "[Datenschutz durch Design](https://digitalcourage.de/blog/2015/was-ist-privacy-design)" standardmäßig implementieren, müssen die höchstmögliche Privatsphäre Einstellungen verwenden, müssen die erforderlichen Sicherheitsmaßnahmen für gespeicherte oder verarbeitete Informationen implementieren (einschließlich, aber nicht beschränkt auf die Durchführung der Pseudonymisierung oder vollständigen Anonymisierung von Daten), müssen die Art der Daten, die sie sammeln, eindeutig und eindeutig angeben, aus welchen Gründen, für wie lange sie diese Daten speichern und ob sie diese Daten an Dritte weitergeben, die Arten von Daten, die mit Dritten geteilt werden, wie, warum, u.s.w.

Daten dürfen nicht verarbeitet werden, es sei denn, es gibt eine gesetzliche Grundlage dafür, wie in der Verordnung definiert. Im Allgemeinen bedeutet dies, dass die Verarbeitung der Daten eines Datensubjekts auf gesetzlicher Grundlage gemäß den gesetzlichen Verpflichtungen oder nur nach ausdrücklicher, gut informierter und eindeutiger Zustimmung der betroffenen Person erfolgen muss.

Da sich Aspekte der Verordnung mit der Zeit weiterentwickeln können, um die Verbreitung veralteter Informationen zu vermeiden, ist es möglicherweise besser, die Vorschrift von einer autoritativen Quelle zu erfahren, als einfach die relevanten Informationen hier in die Paketdokumentation einzubeziehen (was eventuell mit der Entwicklung der Verordnung veraltet).

[EUR-Lex](https://eur-lex.europa.eu/) (ein Teil der offiziellen Website der Europäischen Union, die Informationen über EU-Recht bietet) bietet umfangreiche Informationen zu GDPR/DSGVO, die zum Zeitpunkt der Erstellung in 24 Sprachen verfügbar sind, und im PDF-Format heruntergeladen werden können. Ich würde definitiv empfehlen, die Informationen zu lesen, die sie zur Verfügung stellen, um mehr über GDPR/DSGVO zu erfahren:
- [VERORDNUNG (EU) 2016/679 DES EUROPÄISCHEN PARLAMENTS UND DES RATES](https://eur-lex.europa.eu/legal-content/DE/TXT/?uri=celex:32016R0679)

[Intersoft Consulting](https://www.intersoft-consulting.de/) bietet auch umfassende Informationen über DSGVO, die in deutscher und englischer Sprache verfügbar sind und die nützlich sein könnten, um mehr über GDPR/DSGVO zu erfahren:
- [Datenschutz-Grundverordnung (EU-DSGVO) als übersichtliche Website](https://dsgvo-gesetz.de/)

Alternativ gibt es einen kurzen (nicht autoritativen) Überblick über die GDPR/DSGVO bei Wikipedia:
- [Datenschutz-Grundverordnung](https://de.wikipedia.org/wiki/Datenschutz-Grundverordnung)

---


Zuletzt aktualisiert: 12. Oktober 2023 (2023.10.12).
