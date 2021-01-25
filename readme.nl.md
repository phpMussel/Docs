## Documentatie voor phpMussel v3 (Nederlandse).

### Inhoud
- 1. [PREAMBULE](#SECTION1)
- 2. [HOE TE INSTALLEREN](#SECTION2)
- 3. [HOE TE GEBRUIKEN](#SECTION3)
- 4. [PHPMUSSEL UITBREIDEN](#SECTION4)
- 7. [CONFIGURATIE-OPTIES](#SECTION7)
- 8. [SIGNATURE FORMAAT](#SECTION8)
- 9. [BEKENDE COMPATIBILITEITSPROBLEMEN](#SECTION9)
- 10. [VEELGESTELDE VRAGEN (FAQ)](#SECTION10)
- 11. [LEGALE INFORMATIE](#SECTION11)

*Opmerking over vertalingen: In geval van fouten (b.v., verschillen tussen vertalingen, typefouten, enz), de Engels versie van de README wordt beschouwd als het origineel en gezaghebbende versie. Als u vinden elke fouten, uw hulp bij het corrigeren van hen zou worden toegejuicht.*

---


### 1. <a name="SECTION1"></a>PREAMBULE

Dank u voor het gebruiken van phpMussel, een PHP-script ontwikkeld om trojans, virussen, malware en andere bedreigingen te ontworpen, binnen bestanden geüpload naar uw systeem waar het script is haakte, gebaseerd op de signatures van ClamAV en anderen.

[PHPMUSSEL](https://phpmussel.github.io/) COPYRIGHT 2013 en verder GNU/GPLv2 van [Caleb M (Maikuolan)](https://github.com/Maikuolan).

Dit script is gratis software; u kunt, onder de voorwaarden van de GNU General Public License zoals gepubliceerd door de Free Software Foundation, herdistribueren en/of wijzigen dit; ofwel versie 2 van de Licentie, of (naar uw keuze) enige latere versie. Dit script wordt gedistribueerd in de hoop dat het nuttig zal zijn, maar ZONDER ENIGE GARANTIE; zonder zelfs de impliciete garantie van VERKOOPBAARHEID of GESCHIKTHEID VOOR EEN BEPAALD DOEL. Zie de GNU General Public License voor meer informatie, gelegen in het `LICENSE.txt` bestand en ook beschikbaar uit:
- <https://www.gnu.org/licenses/>.
- <https://opensource.org/licenses/>.

Speciale dank aan [ClamAV](https://www.clamav.net/) zowel voor project inspiratie en voor de signatures dat dit script maakt gebruik daarvan, zonder welke, het script zou waarschijnlijk niet bestaan, of op zijn best, zou heeft zeer beperkte waarde.

Speciale dank aan SourceForge, Bitbucket, en GitHub voor het hosten van de project-bestanden, en de extra bronnen van een aantal signatures gebruikt door phpMussel: [PhishTank](https://www.phishtank.com/), [NLNetLabs](https://nlnetlabs.nl/), [Malware.Expert](https://malware.expert/) en anderen, en speciale dank aan allen die het project steunen, aan iemand anders die ik anders misschien vergeten te vermelden, en voor u, voor het gebruik van het script.

---


### 2. <a name="SECTION2"></a>HOE TE INSTALLEREN

#### 2.0 INSTALLEREN MET COMPOSER

De aanbevolen manier om phpMussel v3 te installeren is via Composer.

Gemakshalve, u kunt de meest benodigde phpMussel-afhankelijkheden installeren via de oude hoofd phpMussel-repository:

`composer require phpmussel/phpmussel`

Als alternatief, u kunt individueel kiezen welke afhankelijkheden u nodig heeft bij uw implementatie. Het is heel goed mogelijk dat u alleen specifieke afhankelijkheden wilt en niet alles nodig heeft.

Om iets met phpMussel te doen, heb u de phpMussel core codebase nodig:

`composer require phpmussel/core`

Biedt een frontend administratieve faciliteit voor phpMussel:

`composer require phpmussel/frontend`

Biedt automatisch scannen van bestandsuploads voor uw website:

`composer require phpmussel/web`

Biedt de mogelijkheid om phpMussel te gebruiken als een interactieve CLI-modus applicatie:

`composer require phpmussel/cli`

Biedt een brug tussen phpMussel en PHPMailer, zodat phpMussel kan gebruiken PHPMailer voor tweefactorauthenticatie, e-mailmelding over geblokkeerde bestandsuploads, enz:

`composer require phpmussel/phpmailer`

Om phpMussel alles te laten detecteren, moet u signatures installeren. Daar is geen specifiek pakket voor dat. Raadpleeg het volgende gedeelte van dit document om signatures te installeren.

Als u Composer niet wilt gebruiken, u kunt ook voorverpakte ZIP's vanaf hier downloaden:

https://github.com/phpMussel/Examples

De voorverpakte ZIP's bevatten alle bovengenoemde afhankelijkheden, evenals alle standaard phpMussel-signatuurbestanden, samen met enkele voorbeelden voor het gebruik van phpMussel bij uw implementatie.

#### <a name="INSTALLING_SIGNATURES"></a>2.1 SIGNATURES INSTALLEREN

Signatures zijn vereist door phpMussel voor het opsporen van specifieke bedreigingen. Er zijn 2 hoofdmethoden om signatures te installeren:

1. Genereer signatures met behulp van "SigTool" en installeer handmatig.
2. Download signatures van "phpMussel/Signatures" of "phpMussel/Examples" en installeer handmatig.

##### 2.1.0 Genereer signatures met behulp van "SigTool" en installeer handmatig.

*Zien: [SigTool documentatie](https://github.com/phpMussel/SigTool#documentation).*

*Let ook op: SigTool verwerkt alleen de signatures van ClamAV. Om signatures van andere bronnen te verkrijgen, zoals die speciaal geschreven voor phpMussel, die de signatures bevat die nodig zijn voor het detecteren van phpMussel's testvoorbeelden, zal deze methode moeten worden aangevuld met een van de andere hier genoemde methoden.*

##### 2.1.1 Download signatures van "phpMussel/Signatures" of "phpMussel/Examples" en installeer handmatig.

Allereerst, ga naar [phpMussel/Signatures](https://github.com/phpMussel/Signatures). De repository bevat verschillende GZ-gecomprimeerde signatuurbestanden. Download de bestanden die u nodig hebt, decomprimeer ze, en kopieer ze naar de signatuurbestandsmap van uw installatie.

Alternatief, download de meest recente ZIP van [phpMussel/Examples](https://github.com/phpMussel/Examples). Vervolgens u kunt de signatures uit dat archief naar uw installatie kopiëren/plakken.

---


### 3. <a name="SECTION3"></a>HOE TE GEBRUIKEN

#### 3.0 PHPMUSSEL CONFIGUREREN

Na het installeren van phpMussel heb u een configuratiebestand nodig zodat u het kunt configureren. phpMussel-configuratiebestanden kunnen worden opgemaakt als INI- of YML-bestanden. Als u werkt met een van de voorbeeld-ZIP's, heeft u al twee voorbeeldconfiguratiebestanden beschikbaar, `phpmussel.ini` en `phpmussel.yml`; u kunt een van die kiezen om uit te werken, als u dat wilt. Als u niet werkt vanuit een van de voorbeeld-ZIP's, moet u een nieuw bestand maken.

Als u tevreden bent met de standaard configuratie voor phpMussel en u wilt niets veranderen, dan kun u een leeg bestand gebruiken als uw configuratiebestand. Alles wat niet door uw configuratiebestand is geconfigureerd gebruikt de standaard, dus u hoeft alleen iets expliciet te configureren als u wilt dat het anders is dan de standaard (dit betekent dat een leeg configuratiebestand ervoor zorgt dat phpMussel de standaardconfiguratie gebruikt).

Als u de phpMussel frontend wilt gebruiken, u kunt alles configureren vanaf de frontend configuratiepagina. Maar sinds v3 wordt frontend login-informatie opgeslagen in uw configuratiebestand, dus om in te loggen op de frontend, moet u op zijn minst een account configureren om in te loggen, en vanaf daar u kunt inloggen en de frontend configuratiepagina gebruiken om al het andere te configureren.

De onderstaande fragmenten voegen een nieuw account toe aan de frontend met de gebruikersnaam "admin" en het wachtwoord "password".

Voor INI-bestanden:

```INI
[user.admin]
password='$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK'
permissions='1'
```

Voor YML-bestanden:

```YAML
user.admin:
 password: "$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK"
 permissions: 1
```

U kunt uw configuratie een naam geven die u maar wilt (zolang u de extensie ervan behoudt, zodat phpMussel weet welk formaat het gebruikt), en u kunt hem opbergen waar u maar wilt. U kunt phpMussel vertellen waar het uw configuratiebestand kunt vinden door het pad op te geven bij het instantiëren van de lader. Als er geen pad wordt opgegeven, probeert phpMussel het te lokaliseren binnen de bovenliggende map van de vendorsmap.

In sommige omgevingen, zoals Apache, is het zelfs mogelijk om een punt aan de voorkant van uw configuratie te plaatsen om deze te verbergen en openbare toegang te voorkomen.

Raadpleeg het configuratiegedeelte van dit document voor meer informatie over de verschillende configuratierichtlijnen die beschikbaar zijn voor phpMussel.

#### 3.1 PHPMUSSEL CORE

Ongeacht hoe u phpMussel wilt gebruiken, bijna elke implementatie zal minimaal zoiets bevatten:

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
```

Zoals de namen van deze klassen aangeven, de loader is verantwoordelijk voor het voorbereiden van de basisbehoeften van het gebruik van phpMussel, en de scanner is verantwoordelijk voor alle kernscanfunctionaliteit.

De constructor voor de loader accepteert vijf parameters, allemaal optioneel.

```PHP
public function __construct(
    string $ConfigurationPath = '',
    string $CachePath = '',
    string $QuarantinePath = '',
    string $SignaturesPath = '',
    string $VendorPath = ''
)
```

De eerste parameter is het volledige pad naar uw configuratiebestand. Indien weggelaten, zoekt phpMussel naar een configuratiebestand met de naam `phpmussel.ini` of `phpmussel.yml` in de bovenliggende map van de vendor-map.

De tweede parameter is het pad naar een map die u toestaat phpMussel te gebruiken voor caching en tijdelijke bestandsopslag. Indien weggelaten, phpMussel zal proberen een nieuwe map te maken, genaamd `phpmussel-cache`, in de bovenliggende map van de vendor-map. Als u dit pad zelf wilt specificeren, het beste een lege map te kiezen om ongewenst verlies van andere gegevens in de opgegeven map te voorkomen.

De derde parameter is het pad naar een map die u phpMussel toestaat te gebruiken voor zijn quarantaine. Indien weggelaten, phpMussel zal proberen een nieuwe map te maken, genaamd `phpmussel-quarantine`, in de bovenliggende map van de vendor-map. Als u dit pad zelf wilt specificeren, het beste een lege map te kiezen om ongewenst verlies van andere gegevens in de opgegeven map te voorkomen. Het wordt ten zeerste aanbevolen om openbare toegang tot de map die voor quarantaine wordt gebruikt te voorkomen.

De vierde parameter is het pad naar de map met de signatuurbestanden voor phpMussel. Indien weggelaten, phpMussel zal proberen te zoeken naar de signatuurbestanden in een map met de naam `phpmussel-signatures` in de bovenliggende map van de vendor-map.

De vijfde parameter is het pad naar uw vendor-map. Het mag nooit naar iets anders verwijzen. Indien weggelaten, phpMussel zal proberen deze map zelf te lokaliseren. Deze parameter is bedoeld om de integratie met implementaties die mogelijk niet noodzakelijk dezelfde structuur hebben als een typisch Composer-project te vergemakkelijken.

De constructor voor de scanner accepteert slechts één parameter en deze is verplicht: Het geïnstantieerde loader-object. Aangezien het door verwijzing wordt doorgegeven, moet de loader worden geïnstantieerd naar een variabele (instantiëren van de loader direct in de parameters van de scanner is niet de juiste manier om phpMussel te gebruiken).

```PHP
public function __construct(\phpMussel\Core\Loader &$Loader)
```

#### 3.2 AUTOMATISCH SCANNEN VAN BESTANDEN UPLOADEN

Om de uploadhandler te instantiëren:

```PHP
$Web = new \phpMussel\Web\Web($Loader, $Scanner);
```

Voor het scannen van bestandsuploads:

```PHP
$Web->scan();
```

Optioneel, phpMussel kan proberen de namen van uploads te herstellen voor het geval er iets mis is, als u wilt:

```PHP
$Web->demojibakefier();
```

Als compleet voorbeeld:

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

*Probeert het bestand `ascii_standard_testfile.txt` te uploaden, een onschadelijk bestand dat uitsluitend is bedoeld om phpMussel te testen:*

![Screenshot](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/web-v3.0.0-alpha2.png)

#### 3.3 CLI-MODUS

Om de CLI-handler te instantiëren:

```PHP
$CLI = new \phpMussel\CLI\CLI($Loader, $Scanner);
```

Als compleet voorbeeld:

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

![Screenshot](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/cli-v3.0.0-alpha2.png)

#### 3.4 FRONTEND

Om de front-end te instantiëren:

```PHP
$FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
```

Als compleet voorbeeld:

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

![Screenshot](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/frontend-v3.0.0-alpha2.png)

#### 3.5 SCANNER-API

U kunt de phpMussel scanner-API ook in andere programma's en scripts implementeren, als u dat wilt.

Als compleet voorbeeld:

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

Het belangrijkste onderdeel dat uit dat voorbeeld moet worden opgemerkt, is de `scan()`-methode. De `scan()`-methode accepteert twee parameters:

```PHP
public function scan(mixed $Files, int $Format = 0): mixed
```

De eerste parameter kan een string of een array zijn en vertelt de scanner wat hij moet scannen. Het kan een string zijn die een specifiek bestand of een specifieke map aangeeft, of een array van dergelijke strings om meerdere bestanden/mappen op te geven.

Wanneer het een string is, moet het verwijzen naar waar de gegevens kunnen worden gevonden. Wanneer het een array is, moeten de array-sleutels de oorspronkelijke namen van de te scannen items aangeven, en moeten de waarden verwijzen naar waar de gegevens kunnen worden gevonden.

De tweede parameter is een integer en vertelt de scanner hoe deze de scanresultaten moet retourneren.

Geef 1 op om de scanresultaten te retourneren als een array voor elk item dat wordt gescand als integers.

Deze integers hebben de volgende betekenis:

Resultaten | Beschrijving
--:|:--
-5 | Betekent dat de scan om andere redenen niet is voltooid.
-4 | Betekent dat de data niet konden worden gescand vanwege encryptie.
-3 | Betekent problemen werden aangetroffen met de phpMussel signatuurbestanden.
-2 | Betekent dat beschadigd gegevens tijdens de scan werd ontdekt en dus de scan niet voltooid.
-1 | Betekent dat uitbreidingen of addons vereist door PHP om de scan te voeren werd ontbraken zijn en dus de scan niet voltooid.
0 | Betekent dat het scandoel bestaat niet en dus was er niets te scannen.
1 | Betekent dat het doel met succes werden gescand en geen problemen gedetecteerd.
2 | Betekent dat het doel met succes werd gescand en problemen werden gedetecteerd.

Geef 2 op om de scanresultaten als boolean te retourneren.

Resultaten | Beschrijving
:-:|:--
`true` | Er zijn problemen gedetecteerd (scandoel is slecht/gevaarlijk).
`false` | Er zijn geen problemen gevonden (scandoel is waarschijnlijk in orde).

Geef 3 op om de scanresultaten als een array te retourneren voor elk item dat wordt gescand als voor mensen leesbare tekst.

*Voorbeeld output:*

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

Geef 4 op om de scanresultaten te retourneren als tekst die voor mensen leesbaar is (zoals 3, maar geïmplodeerd).

*Voorbeeld output:*

```
Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)! Detected phpMussel-Testfile.CoEx (coex_testfile.rtf)! Detected encrypted archive; Encrypted archives not permitted (encrypted.zip)!
```

Geef *ieder andere waarde* op om opgemaakte tekst te retourneren (d.w.z., de scanresultaten die worden gezien bij gebruik van CLI).

*Voorbeeld output:*

*Zie ook: [Hoe krijgt u toegang tot specifieke gegevens over bestanden als ze worden gescand?](#SCAN_DEBUGGING)*

#### 3.6 TWEE-FACTOR AUTHENTICATIE

Het is mogelijk om de frontend veiliger te maken door twee-factor authenticatie ("2FA") in te schakelen. Bij inloggen met een account waarvoor 2FA is ingeschakeld, een e-mail wordt verzonden naar het e-mailadres dat aan dat account is gekoppeld. Deze e-mail bevat een "2FA-code", die de gebruiker vervolgens moet invoeren, in aanvulling op de gebruikersnaam en het wachtwoord, om te kunnen inloggen met dat account. Dit betekent dat het verkrijgen van een accountwachtwoord niet genoeg is voor een hacker of potentiële aanvaller om zich bij dat account te kunnen aanmelden, omdat ze ook al toegang moeten hebben tot het e-mailadres dat aan dat account is gekoppeld om de 2FA-code die aan de sessie is gekoppeld te kunnen ontvangen en gebruiken, daarmee het frontend veiliger maken.

Nadat u PHPMailer heeft geïnstalleerd, moet u de configuratie-richtlijnen voor PHPMailer invullen via de configuratiepagina of het configuratiebestand van phpMussel. Meer informatie over deze configuratie-richtlijnen is opgenomen in de configuratiesectie van dit document. Nadat u de PHPMailer-configuratie-richtlijnen hebt ingevuld, stelt u `enable_two_factor` in op `true`. Twee-factor authenticatie moet nu worden ingeschakeld.

Volgende, u moet een e-mailadres koppelen aan een account, zodat phpMussel weet waar 2FA-codes moeten worden verzonden wanneer hij zich aanmeldt met dat account. Om dit te doen, gebruik het e-mailadres als de gebruikersnaam voor het account (b.v., `foo@bar.tld`), of neem het e-mailadres op als onderdeel van de gebruikersnaam op dezelfde manier als bij het normaal verzenden van een e-mail (b.v., `Foo Bar <foo@bar.tld>`).

---


### 4. <a name="SECTION4"></a>PHPMUSSEL UITBREIDEN

phpMussel is ontworpen met het oog op uitbreidbaarheid. Pull-aanvragen naar de repositories van de phpMussel-organisatie en [bijdragen](https://github.com/phpMussel/.github/blob/master/CONTRIBUTING.md) in het algemeen zijn altijd welkom. Ook, als u phpMussel moet aanpassen of uitbreiden op manieren die niet geschikt zijn om die specifieke repositories bij te dragen, dat is zeker mogelijk (b.v., voor aanpassingen of uitbreidingen die specifiek zijn voor uw specifieke implementatie, die kan niet worden gepubliceerd vanwege vertrouwelijkheid of privacybehoeften binnen uw organisatie, of die bij voorkeur in hun eigen repository worden gepubliceerd, zoals voor plug-ins en nieuwe Composer-pakketten die phpMussel vereisen).

Sinds v3 bestaat alle phpMussel-functionaliteit als klassen, wat betekent dat in sommige gevallen de [objectoverervingsmechanismen](https://www.php.net/manual/en/language.oop5.inheritance.php) van PHP een gemakkelijke en geschikte manier kunnen zijn om phpMussel uit te breiden.

phpMussel biedt ook zijn eigen mechanismen voor uitbreidbaarheid. Vóór v3 was het mechanisme dat de voorkeur heeft het geïntegreerde plug-insysteem voor phpMussel. Sinds v3 is het mechanisme dat de voorkeur heeft de events orchestrator.

Boilerplate-code voor het uitbreiden van phpMussel en voor het schrijven van nieuwe plug-ins is publiekelijk beschikbaar op de [boilerplates-repository](https://github.com/phpMussel/plugin-boilerplates). Inbegrepen is ook een lijst van [alle momenteel ondersteunde evenementen](https://github.com/phpMussel/plugin-boilerplates/tree/master/boilerplate-v3#currently-supported-events) en meer gedetailleerde instructies over het gebruik van de boilerplate-code.

Je zult merken dat de structuur van de v3-boilerplate-code identiek is aan de structuur van de verschillende phpMussel v3-repositories bij de phpMussel-organisatie. Dat is geen toeval. Waar mogelijk zou ik aanraden om de v3-boilerplate-code te gebruiken voor uitbreidingsdoeleinden en vergelijkbare ontwerpprincipes te gebruiken als die van phpMussel v3 zelf. Als u ervoor kiest om uw nieuwe extensie of plug-in te publiceren, kunt u Composer-ondersteuning ervoor integreren, en het zou dan theoretisch mogelijk moeten zijn voor anderen om uw extensie of plug-in op exact dezelfde manier te gebruiken als phpMussel v3 zelf, door het simpelweg samen met hun andere Composer-afhankelijkheden, en het toepassen van alle noodzakelijke event handlers bij hun implementatie. (Natuurlijk, vergeet niet om instructies bij uw publicaties te voegen, zodat anderen op de hoogte zijn van eventuele noodzakelijke event handlers en alle andere informatie die nodig kan zijn voor de juiste installatie en gebruik van uw publicatie).

---


### 7. <a name="SECTION7"></a>CONFIGURATIE-OPTIES

Hieronder volgt een lijst met de configuratierichtlijnen die door phpMussel zijn geaccepteerd, samen met een beschrijving van hun doel en functie.

```
Configuratie (v3)
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

#### "core" (Categorie)
Algemene configuratie (elke kernconfiguratie die niet tot andere categorieën behoort).

##### "scan_log" `[string]`
- Bestandsnaam van het bestand te opnemen alle scanresultaten. Geef een bestandsnaam of laat leeg om te uitschakelen.

##### "scan_log_serialized" `[string]`
- Bestandsnaam van het bestand te opnemen alle scanresultaten (formaat is geserialiseerd). Geef een bestandsnaam of laat leeg om te uitschakelen.

##### "error_log" `[string]`
- Een bestand voor het vastleggen van gedetecteerde niet-fatale fouten. Geef een bestandsnaam, of laat leeg om uit te schakelen.

##### "truncate" `[string]`
- Trunceren logbestanden wanneer ze een bepaalde grootte bereiken? Waarde is de maximale grootte in B/KB/MB/GB/TB dat een logbestand kan groeien tot voordat het wordt getrunceerd. De standaardwaarde van 0KB schakelt truncatie uit (logbestanden kunnen onbepaald groeien). Notitie: Van toepassing op individuele logbestanden! De grootte van de logbestanden wordt niet collectief beschouwd.

##### "log_rotation_limit" `[int]`
- Logrotatie beperkt het aantal logbestanden dat op elk moment zou moeten bestaan. Wanneer nieuwe logbestanden worden gemaakt en het totale aantal logbestanden de opgegeven limiet overschrijdt, wordt de opgegeven actie uitgevoerd. U kunt hier de gewenste limiet opgeven. Een waarde van 0 zal logrotatie uitschakelen.

##### "log_rotation_action" `[string]`
- Logrotatie beperkt het aantal logbestanden dat op elk moment zou moeten bestaan. Wanneer nieuwe logbestanden worden gemaakt en het totale aantal logbestanden de opgegeven limiet overschrijdt, wordt de opgegeven actie uitgevoerd. U kunt hier de gewenste actie opgeven. Delete = Verwijder de oudste logbestanden, totdat de limiet niet langer wordt overschreden. Archive = Eerst archiveer en verwijder vervolgens de oudste logbestanden, totdat de limiet niet langer wordt overschreden.

```
log_rotation_action
├─Delete ("Delete")
└─Archive ("Archive")
```

##### "timezone" `[string]`
- Dit wordt gebruikt om de te gebruiken tijdzone op te geven (b.v., Africa/Cairo, America/New_York, Asia/Tokyo, Australia/Perth, Europe/Berlin, Pacific/Guam, enz). Geef "SYSTEM" op om PHP dit automatisch voor u te laten afhandelen.

```
timezone
├─SYSTEM ("Gebruik de systeem standaard tijdzone.")
├─UTC ("UTC")
└─…Anders
```

##### "time_offset" `[int]`
- Tijdzone offset in minuten.

##### "time_format" `[string]`
- De datum notatie gebruikt door phpMussel. Extra opties kunnen worden toegevoegd op aanvraag.

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
└─…Anders
```

##### "ipaddr" `[string]`
- Waar het IP-adres van het aansluiten verzoek te vinden? (Handig voor diensten zoals Cloudflare en dergelijke). Standaard = REMOTE_ADDR. WAARSCHUWING: Verander dit niet tenzij u weet wat u doet!

```
ipaddr
├─HTTP_INCAP_CLIENT_IP ("HTTP_INCAP_CLIENT_IP (Incapsula)")
├─HTTP_CF_CONNECTING_IP ("HTTP_CF_CONNECTING_IP (Cloudflare)")
├─CF-Connecting-IP ("CF-Connecting-IP (Cloudflare)")
├─HTTP_X_FORWARDED_FOR ("HTTP_X_FORWARDED_FOR (Cloudbric)")
├─X-Forwarded-For ("X-Forwarded-For (Squid)")
├─REMOTE_ADDR ("REMOTE_ADDR (Default)")
└─…Anders
```

Zie ook:
- [NGINX Reverse Proxy](https://docs.nginx.com/nginx/admin-guide/web-server/reverse-proxy/)
- [Squid configuration directive forwarded_for](http://www.squid-cache.org/Doc/config/forwarded_for/)

##### "delete_on_sight" `[bool]`
- Het inschakelen van dit richtlijn zal instrueren het script om elke gescande geprobeerd bestand upload dat gecontroleerd tegen elke detectie criteria te proberen onmiddellijk verwijderen, via signatures of anderszins. Bestanden vastbesloten te zijn schoon zal niet worden aangeraakt. In het geval van archieven, het hele archief wordt verwijderd, ongeacht of niet het overtredende bestand is slechts één van meerdere bestanden vervat in het archief. Voor het geval van bestand upload scannen, doorgaans, het is niet nodig om dit richtlijn te inschakelen, omdat doorgaans, PHP zal automatisch zuiveren de inhoud van zijn cache wanneer de uitvoering is voltooid, wat betekent dat het doorgans zal verwijdert ieder bestanden geüpload doorheen aan de server tenzij ze zijn verhuisd, gekopieerd of verwijderd alreeds. Dit richtlijn is toegevoegd hier als een extra maatregel van veiligheid voor degenen wier kopies van PHP misschien niet altijd gedragen op de manier verwacht. False = Na het scannen, met rust laten het bestand [Standaard]; True = Na het scannen, als niet schoon, onmiddellijk verwijderen.

##### "lang" `[string]`
- Geef de standaardtaal voor phpMussel.

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

##### "lang_override" `[bool]`
- Waar mogelijk lokaliseren volgens HTTP_ACCEPT_LANGUAGE? True = Ja [Standaard]; False = Nee.

##### "scan_cache_expiry" `[int]`
- Hoe lang moeten phpMussel cache de resultaten van de scan? Waarde is het aantal seconden dat de resultaten van het scannen moet wordt gecached voor. Standaard is 21600 seconden (6 uur); Een waarde van 0 zal uitschakelen caching de resultaten van de scan.

##### "maintenance_mode" `[bool]`
- Inschakelen de onderhoudsmodus? True = Ja; False = Nee [Standaard]. Schakelt alles anders dan het frontend uit. Soms nuttig bij het bijwerken van uw CMS, frameworks, enz.

##### "statistics" `[bool]`
- Track phpMussel gebruiksstatistieken? True = Ja; False = Nee [Standaard].

##### "disabled_channels" `[string]`
- Dit kan worden gebruikt om te voorkomen dat phpMussel bepaalde kanalen gebruikt bij het verzenden van verzoeken (b.v., bij het bijwerken, bij het ophalen van metagegevens van componenten, enzovoort).

```
disabled_channels
├─GitHub ("GitHub")
├─BitBucket ("BitBucket")
├─VirusTotal_HTTPS ("VirusTotal (HTTPS)")
└─VirusTotal_HTTP ("VirusTotal (HTTP)")
```

#### "signatures" (Categorie)
Configuratie voor signatures, signatuurbestanden, enz.

##### "active" `[string]`
- Een lijst van de actief signatuurbestanden, gescheiden door komma's. Notitie: Signatuurbestanden moeten eerst worden geïnstalleerd voordat u ze kunt activeren. Om de testbestanden correct te laten werken, moeten de signatuurbestanden worden geïnstalleerd en geactiveerd.

##### "fail_silently" `[bool]`
- Moet phpMussel rapporteren wanneer signatuurbestanden zijn ontbrekend of beschadigd? Als `fail_silently` is uitgeschakeld, ontbrekende en beschadigde bestanden zal worden gerapporteerd op het scannen, en als `fail_silently` is ingeschakeld, ontbrekende en beschadigde bestanden zal zijn genegeerd, met het scannen rapporten voor het bestanden die er geen problemen. Dit moet in het algemeen met rust gelaten worden tenzij u ervaart mislukt of soortgelijke problemen. False = Uitgeschakeld; True = Ingeschakeld [Standaard].

##### "fail_extensions_silently" `[bool]`
- Moet phpMussel rapporteren wanneer extensies zijn ontbreken? Als `fail_extensions_silently` is uitgeschakeld, ontbrekende extensies zal worden gerapporteerd op het scannen, en als `fail_extensions_silently` is ingeschakeld, ontbrekende extensies zal zijn genegeerd, met het scannen rapporten voor het bestanden die er geen problemen. Het uitschakelen van dit richtlijn kunt mogelijk verhogen van uw veiligheid, maar kunt ook leiden tot een toename van valse positieven. False = Uitgeschakeld; True = Ingeschakeld [Standaard].

##### "detect_adware" `[bool]`
- Moet phpMussel verwerken signatures voor het detecteren van adware? False = Nee; True = Ja [Standaard].

##### "detect_joke_hoax" `[bool]`
- Moet phpMussel verwerken signatures voor het detecteren van grap/beetnemerij malware/virussen? False = Nee; True = Ja [Standaard].

##### "detect_pua_pup" `[bool]`
- Moet phpMussel verwerken signatures voor het detecteren van PUAs/PUPs? False = Nee; True = Ja [Standaard].

##### "detect_packer_packed" `[bool]`
- Moet phpMussel verwerken signatures voor het detecteren van verpakkers en verpakt gegevens? False = Nee; True = Ja [Standaard].

##### "detect_shell" `[bool]`
- Moet phpMussel verwerken signatures voor het detecteren van shell scripts? False = Nee; True = Ja [Standaard].

##### "detect_deface" `[bool]`
- Moet phpMussel verwerken signatures voor het detecteren van schendingen/defacements en schenders/defacers? False = Nee; True = Ja [Standaard].

##### "detect_encryption" `[bool]`
- Moet phpMussel gecodeerde bestanden detecteren en blokkeren? False = Nee; True = Ja [Standaard].

##### "heuristic_threshold" `[int]`
- Er zijn bepaalde signatures van phpMussel dat zijn bedoeld om verdachte en potentieel kwaadaardige kwaliteiten te identificeren van bestanden wordt geüpload zonder zichzelf om bestanden wordt geüpload te identificeren specifiek als kwaadaardige. Dit "threshold" waarde vertelt phpMussel het maximaal totaalgewicht van verdachte en potentieel kwaadaardige kwaliteiten van bestanden wordt geüpload dat is toelaatbaar voordat deze bestanden worden gemarkeerd als kwaadaardig. De definitie van gewicht in dit verband is het aantal van verdachte en potentieel kwaadaardige kwaliteiten dat zijn geïdentificeerd. Standaard, dit waarde wordt ingesteld op 3. Algemeen, een lagere waarde zal resulteren in meer valse positieven maar meer kwaadaardige bestanden wordt gemarkeerd, terwijl een hogere waarde zal resulteren in minder valse positieven maar minder kwaadaardige bestanden wordt gemarkeerd. Algemeen, het is beste om dit waarde te laten op zijn standaard, tenzij u problemen ondervindt met betrekking tot het.

#### "files" (Categorie)
De details over het omgaan met bestanden tijdens het scannen.

##### "filesize_limit" `[string]`
- Bestandsgrootte limiet in KB. 65536 = 64MB [Standaard]; 0 = Geen limiet (altijd op de greylist), ieder (positief) numerieke waarde aanvaard. Dit kunt handig zijn als uw PHP configuratie beperkt de hoeveelheid van geheugen een proces kunt houden of als u PHP configuratie beperkt het bestandsgrootte van uploads.

##### "filesize_response" `[bool]`
- Wat te doen met bestanden dat overschrijden het bestandsgrootte limiet (als aanwezig). False = Whitelist; True = Blacklist [Standaard].

##### "filetype_whitelist" `[string]`
- Als uw systeem vergunningen alleen specifieke bestandstypen te uploaden, of als uw systeem expliciet ontkent bepaalde bestandstypen, specificeren deze bestandstypen in whitelists, blacklists en greylists kunt toenemen de snelheid waarin scannen is uitgevoerd via vergunningen het script te negeren bepaalde bestandstypen. Formaat is CSV (komma's gescheiden waarden). Als u wilt te scannen alles, eerder dan whitelist, blacklist of greylist, laat de variabele(/n) leeg; doen zo zal uitschakelen whitelist/blacklist/greylist. Logische volgorde van de verwerking is: Als het bestandstype is op de whitelist, niet scannen en niet blokkeren het bestand, en niet controleer het bestand tegen de blacklist of de greylist. Als het bestandstype is op de blacklist, niet scannen het bestand maar blokkeren het niettemin, en niet controleer het bestand tegen de greylist. Als de greylist is leeg of als de greylist is niet leeg en het bestandstype is op de greylist, scannen het bestand als per normaal en bepalen als om het gebaseerd op de resultaten van de scan te blokkeren, maar als de greylist is niet leeg en het bestandstype is niet op de greylist, behandel het bestand alsof op de blacklist, dus om het niet te scannen, maar toch blokkeren het niettemin. Whitelist:

##### "filetype_blacklist" `[string]`
- Blacklist:

##### "filetype_greylist" `[string]`
- Greylist:

##### "check_archives" `[bool]`
- Om de inhoud van archieven proberen te controleer? False = Nee (niet doen controleer); True = Ja (doen controleer) [Standaard]. Ondersteunde: Zip (vereist libzip), Tar, Rar (vereist de rar-extensie).

##### "filesize_archives" `[bool]`
- Erven het bestandsgrootte blacklist/whitelist staat om de inhoud van archieven? False = Nee (gewoon greylist alles); True = Ja [Standaard].

##### "filetype_archives" `[bool]`
- Erven het bestandstype blacklist/whitelist staat om de inhoud van archieven? False = Nee (gewoon greylist alles) [Standaard]; True = Ja.

##### "max_recursion" `[int]`
- Maximale recursiediepte limiet voor archieven. Standaard = 3.

##### "block_encrypted_archives" `[bool]`
- Detecteren en blokkeren gecodeerde archieven? Omdat phpMussel is niet in staat te scannen de inhoud van gecodeerde archieven, het is mogelijk dat archief encryptie kan worden toegepast door een aanvaller als middel van probeert te omzeilen phpMussel, anti-virus scanners en andere dergelijke beveiligingen. Instrueren phpMussel te blokkeren elke archieven dat het ontdekt worden gecodeerde zou kunnen helpen het risico in verband met deze dergelijke mogelijkheden te verminderen. False = Nee; True = Ja [Standaard].

##### "max_files_in_archives" `[int]`
- Maximumaantal bestanden dat vanuit archieven moet worden gescand voordat de scan wordt afgebroken. Standaard = 0 (geen maximum).

##### "chameleon_from_php" `[bool]`
- Zoeken naar PHP header in bestanden die niet zijn PHP-bestanden noch herkende archieven. False = Uitgeschakeld; True = Ingeschakeld.

##### "can_contain_php_file_extensions" `[string]`
- Een lijst met bestandsextensies die PHP-code mogen bevatten, gescheiden door komma's. Als PHP chameleon aanval detectie is ingeschakeld, zullen bestanden die PHP-code bevatten, met extensies die niet op deze lijst staan, worden gedetecteerd als PHP chameleon aanvallen.

##### "chameleon_from_exe" `[bool]`
- Zoeken naar PHP header in bestanden die niet zijn executables noch herkende archieven en naar executables waarvan de headers zijn onjuist. False = Uitgeschakeld; True = Ingeschakeld.

##### "chameleon_to_archive" `[bool]`
- Detecteer onjuiste headers in archieven en gecomprimeerde bestanden. Ondersteunde: BZ/BZIP2, GZ/GZIP, LZF, RAR, ZIP. False = Uitgeschakeld; True = Ingeschakeld.

##### "chameleon_to_doc" `[bool]`
- Zoeken naar office documenten waarvan headers zijn onjuist (Ondersteunde: DOC, DOT, PPS, PPT, XLA, XLS, WIZ). False = Uitgeschakeld; True = Ingeschakeld.

##### "chameleon_to_img" `[bool]`
- Zoeken naar beelden waarvan headers zijn onjuist (Ondersteunde: BMP, DIB, PNG, GIF, JPEG, JPG, XCF, PSD, PDD, WEBP). False = Uitgeschakeld; True = Ingeschakeld.

##### "chameleon_to_pdf" `[bool]`
- Zoeken naar PDF-bestanden waarvan headers zijn onjuist. False = Uitgeschakeld; True = Ingeschakeld.

##### "archive_file_extensions" `[string]`
- Herkende archief bestandsextensies (formaat is CSV; moet alleen toevoegen of verwijderen wanneer problemen voorkomen; onnodig verwijderen kan leiden tot vals-positieven te verschijnen voor archiefbestanden, terwijl onnodig toevoeging zal effectief whitelist wat u toevoegt van aanval-specifieke detectie; wijzigen met voorzichtigheid; ook noteren dat Dit heeft geen effect op welke archieven kan en niet kan wordt geanalyseerd op inhoudsniveau). De lijst, als is bij standaard, geeft die formaten gebruikt meest vaak door de meeste systemen en CMS, maar opzettelijk is niet noodzakelijk alomvattend.

##### "block_control_characters" `[bool]`
- Blokkeren alle bestanden bevatten controle karakters (andere dan nieuwe regels)? (`[\x00-\x08\x0b\x0c\x0e\x1f\x7f]`) Als u *__ALLEEN__* uploaden platte tekst, dan u kan inschakelen dit optie te bieden extra bescherming aan uw systeem. Hoewel, als u uploaden iets anders dan platte tekst, inschakelen dit kan leiden tot valse positieven. False = Niet blokkeren [Standaard]; True = Doen blokkeren.

##### "corrupted_exe" `[bool]`
- Corrupte bestanden en verwerking fouten. False = Negeren; True = Blokkeren [Standaard]. Detecteren en blokkeren mogelijk beschadigd PE (Portable Executable) bestanden? Vaak (maar niet altijd), wanneer bepaalde aspecten van een PE-bestand zijn beschadigd of kan niet correct worden verwerkt, het kan wijzen op een virale infectie. De processen gebruikt door de meeste anti-virus programma's om virussen in PE-bestanden te detecteren vereisen de verwerking van die bestanden op bepaalde manieren, dat, als de programmeur van een virus kent, specifiek zal proberen te verhinderen, zodat haar virus onopgemerkt blijven.

##### "decode_threshold" `[string]`
- Drempelwaarde de lengte van onverwerkte gegevens waarbinnen decoderen commando's moeten gedetecteerd worden (in het geval er enige merkbare prestatieproblemen terwijl scannen). Standaard = 512KB. Zero of nulwaarde zal uitschakelen het drempelwaarde (het verwijderen van een dergelijke limiet gebaseerd op bestandsgrootte).

##### "scannable_threshold" `[string]`
- Drempelwaarde de lengte van onverwerkte gegevens dat phpMussel is toegestaan te lezen en scan (in het geval er enige merkbare prestatieproblemen terwijl scannen). Standaard = 32MB. Zero of nulwaarde zal uitschakelen het drempelwaarde. Algemeen, dit waarde moeten niet zijn lagere dan de gemiddelde bestandsgrootte van het bestandsuploads dat u wilt en verwacht te ontvangen aan uw server of website, moeten niet zijn meer dan de filesize_limit richtlijn, en moeten niet zijn meet dan ongeveer een vijfde van de totale toegestane geheugentoewijzing toegekend aan PHP via de "php.ini" configuratiebestand. Dit richtlijn bestaat te proberen om phpMussel te verhinderen van het gebruik van teveel geheugen (dat zou verhinderen het van de mogelijkheid te scannen bestanden met succes boven een bepaalde bestandsgrootte).

##### "allow_leading_trailing_dots" `[bool]`
- Sta voorlopende en achterliggende stippen toe in bestandsnamen? Dit kan soms worden gebruikt om bestanden te verbergen, of om sommige systemen te misleiden om doorverwijzing van mappen mogelijk te maken. False = Niet toestaan [Standaard]. True = Toestaan.

##### "block_macros" `[bool]`
- Probeer u alle bestanden met macro's te blokkeren? Sommige soorten documenten en spreadsheets kunnen uitvoerbare macro's bevatten, waardoor een gevaarlijke potentiële malwarevector wordt geboden. False = Niet blokkeren [Standaard]; True = Doen blokkeren.

##### "only_allow_images" `[bool]`
- Indien ingesteld op true, worden alle niet-afbeeldingsbestanden die door de scanner worden aangetroffen, zullen werden onmiddellijk gemarkeerd, zonder te worden gescand. Dit kan in sommige gevallen de tijd verkorten die nodig is om een scan te voltooien. Standaard ingesteld op false.

#### "quarantine" (Categorie)
Configuratie voor de quarantaine.

##### "quarantine_key" `[string]`
- phpMussel kan geblokkeerde bestandsuploads in quarantaine plaatsen, als dit is iets wat u wilt doen. Regelmatige gebruikers van phpMussel dat gewoon willen om hun websites of hosting-omgeving te beschermen zonder enige interesse in diep analyseren van gevlagd geprobeerd bestandsuploads moet dit functionaliteit hebben uitgeschakeld, maar elke gebruikers geïnteresseerd in de verdere analyse van gevlagd geprobeerd bestandsuploads voor malware onderzoek of voor soortgelijke zaken moeten inschakelen dit functionaliteit. Quarantaine van gevlagd geprobeerd bestandsuploads kunt ook somtijds helpen bij het opsporen van vals-positieven, als dit is iets dat vaak voorkomt voor u. Voor de uitschakelen van quarantaine functionaliteit, gewoon laat de `quarantine_key` richtlijn leeg, of wissen de inhoud van de richtlijn als het niet leeg alreeds. Voor de inschakelen van quarantaine functionaliteit, invoeren soms waarde in de richtlijn. De `quarantine_key` is een belangrijke beveiliging kenmerk van de quarantaine functionaliteit vereist als middel om de functionaliteit quarantaine te verhinderen exploitatie door potentiële aanvallers en als middel om verhinderen van elke mogelijke gegevens uitvoering van gegevens opgeslagen in de quarantaine. De `quarantine_key` moeten op dezelfde manier als uw wachtwoorden worden behandeld: De langer de beter, en bewaken het goed. Voor het beste gevolg, gebruik in combinatie met `delete_on_sight`.

##### "quarantine_max_filesize" `[string]`
- De maximaal toegestane bestandsgrootte van bestanden te worden in quarantaine plaatsen. Bestanden groter dan de opgegeven waarde zal NIET in quarantaine plaatsen. Dit richtlijn is belangrijk als een middel van maak het moeilijker voor potentiële aanvallers te overspoelen uw quarantaine met ongewenste gegevens potentieel veroorzaakt weggelopen gebruiksgegevens op uw hosting service. Standaard = 2MB.

##### "quarantine_max_usage" `[string]`
- De maximale geheugengebruik toegestaan voor de quarantaine. Als de totale geheugengebruik van de quarantaine bereikt dit waarde, de oudste bestanden in quarantaine zullen worden verwijderd totdat het totale geheugengebruik niet meer bereikt dit waarde. Dit richtlijn is belangrijk als een middel van maak het moeilijker voor potentiële aanvallers te overspoelen uw quarantaine met ongewenste gegevens potentieel veroorzaakt weggelopen gebruiksgegevens op uw hosting service. Standaard = 64MB.

##### "quarantine_max_files" `[int]`
- Het maximale aantal bestanden dat in de quarantaine kan bestaan. Wanneer nieuwe bestanden aan de quarantaine worden toegevoegd, worden oude bestanden, als dit aantal wordt overschreden, verwijderd totdat de rest dit aantal niet overschrijdt. Standaard = 100.

#### "virustotal" (Categorie)
Configuratie voor Virus Totale integratie.

##### "vt_public_api_key" `[string]`
- Optioneel, met phpMussel, het is mogelijk om bestanden te scannen met behulp van de Virus Total API als een manier om een sterk verbeterde mate van bescherming te bieden tegen virussen, trojans, malware en andere bedreigingen. Standaard, scannen van bestanden met behulp van de Virus Total API is uitgeschakeld. Om het te inschakelen, een Virus Total API-sleutel is nodig. Vanwege de aanzienlijke voordeel dat dit zou kunnen om u te voorzien, het is iets dat ik sterk aanbevelen te inschakelen. Wees u ervan bewust, echter, dat voor gebruik op de Virus Total API, u *__MOET__* akkoord gaan hun Algemene Voorwaarden en u *__MOET__* voldoen aan alle richtlijnen per beschreven door de Virus Total documentatie! U bent NIET toegestaan om dit integratie functie te gebruiken TENZIJ: U heeft gelezen en u akkoord met de Algemene Voorwaarden van de Virus Total en zijn API. U heeft gelezen en u begrijpt, ten minste, de preambule van de Virus Total Public API-documentatie (alles na "VirusTotal Public API v2.0" maar vóór "Contents").

Zie ook:
- [Terms of Service](https://www.virustotal.com/en/about/terms-of-service/)
- [Getting started](https://developers.virustotal.com/reference)

##### "vt_suspicion_level" `[int]`
- Normaal, phpMussel zal beperken welke bestanden scant met behulp van de Virus Total API om het bestanden die zijn beschouwd "achterdochtig". Optioneel, u kan dit beperking aan te passen door de waarde van het `vt_suspicion_level` richtlijn.

##### "vt_weighting" `[int]`
- Moeten phpMussel de resultaten van het scannen met behulp van de Virus Total API toe te passen als detecties of detectie weging? Dit richtlijn bestaat, omdat, hoewel het scannen van een bestand met behulp van meerdere motoren (als Virus Total doet) moet leiden tot een verhoogde aantal van detecties (en dus in een hoger aantal van kwaadaardige bestanden worden gedetecteerd), het kan ook resulteren in een hoger aantal van valse positieven, en daarom, in sommige gevallen, de resultaten van de scan kan beter worden benut als betrouwbaarheidsscore eerder dan als een definitieve conclusie. Als een waarde van 0 wordt gebruikt, de resultaten van het scannen met behulp van de Virus Total API zal worden toegepast als detecties, en zo, als een motor gebruikt door Virus Total vlaggen het bestand wordt gescand als kwaadaardige, phpMussel zal het bestand overwegen kwaadaardig te zijn. Als een andere waarde wordt gebruikt, de resultaten van het scannen met behulp van de Virus Total API zal worden toegepast als detectie weging, en zo, het aantal van motoren gebruikt door Virus Total dat vlag het bestand wordt gescand als kwaadaardige zal dienen als een betrouwbaarheidsscore (of detectie weging) voor of het bestand dat wordt gescand moet worden beschouwd als kwaadaardige door phpMussel (de waarde die wordt gebruikt zal vertegenwoordigen de minimale betrouwbaarheidsscore of weging vereist om kwaadaardige te worden beschouwd). Een waarde van 0 wordt standaard gebruikt.

##### "vt_quota_rate" `[int]`
- Volgens de Virus Total API-documentatie, het is beperkt tot maximaal 4 verzoeken van welke aard in elk 1 minuut tijdsbestek. Als u een honeyclient, honeypot of andere automatisering te voorzien, dat gaat om middelen te verschaffen om VirusTotal en niet alleen rapporten opvragen heeft u recht op een hogere API-quotum. Normaal, phpMussel zal strikt houden aan deze beperkingen, maar vanwege de mogelijkheid van deze API-quotum verhoogd te worden, deze twee richtlijnen worden verstrekt als middel voor u om instrueren phpMussel wat limiet moeten houden worden. Tenzij u heeft geïnstrueerd om dit te doen, het is niet aan te raden voor u om deze waarden te verhogen, maar, als u heeft ondervonden problemen met betrekking tot uw tarief quota bereiken, afnemende deze waarden kunnen u soms helpen in het omgaan met deze problemen. Uw maximaal tarief bepaald als `vt_quota_rate` verzoeken van welke aard in elk `vt_quota_time` minuut tijdsbestek.

##### "vt_quota_time" `[int]`
- (Zie bovenstaande beschrijving).

#### "urlscanner" (Categorie)
Configuratie voor de URL-scanner.

##### "google_api_key" `[string]`
- Inschakelt gebruik van de Google Safe Browsing API wanneer de noodzakelijke API sleutel wordt gedefinieerd.

Zie ook:
- [Google API Console](https://console.developers.google.com/)

##### "maximum_api_lookups" `[int]`
- Maximaal toelaatbaar aantal van de API verzoeken te voeren per individuele scan iteratie. Omdat elke extra API verzoek zullen toevoegen aan de totale tijd die nodig te voltooien elke scan iteratie, u kunt wensen om een beperking te specificeren teneinde versnellen het algehele scanproces. Wanneer ingesteld op 0, geen dergelijk maximaal toelaatbaar aantal wordt toegepast. Ingesteld op 10 standaard.

##### "maximum_api_lookups_response" `[bool]`
- Wat te doen als het maximaal toelaatbaar aantal van API verzoeken wordt overschreden? False = Niets doen (voortzetten de verwerking) [Standaard]; True = Merken/blokkeren het bestand.

##### "cache_time" `[int]`
- Hoe lang (in seconden) moeten de resultaten van de API verzoeken worden gecached voor? Standaard is 3600 seconden (1 uur).

#### "legal" (Categorie)
Configuratie voor wettelijke vereisten.

##### "pseudonymise_ip_addresses" `[bool]`
- Pseudonimiseren de IP-adressen bij het schrijven van logbestanden? True = Ja [Standaard]; False = Nee.

##### "privacy_policy" `[string]`
- Het adres van een relevant privacybeleid dat moet worden weergegeven in de voettekst van eventuele gegenereerde pagina's. Geef een URL, of laat leeg om uit te schakelen.

#### "supplementary_cache_options" (Categorie)
Aanvullende cache-opties.

##### "enable_apcu" `[bool]`
- Dit geeft aan of APCu moet worden gebruikt voor caching. Standaard = False.

##### "enable_memcached" `[bool]`
- Dit geeft aan of Memcached moet worden gebruikt voor caching. Standaard = False.

##### "enable_redis" `[bool]`
- Dit geeft aan of Redis moet worden gebruikt voor caching. Standaard = False.

##### "enable_pdo" `[bool]`
- Dit geeft aan of PDO moet worden gebruikt voor caching. Standaard = False.

##### "memcached_host" `[string]`
- Memcached hostwaarde. Standaard = "localhost".

##### "memcached_port" `[int]`
- Memcached poortwaarde. Standaard = "11211".

##### "redis_host" `[string]`
- Redis hostwaarde. Standaard = "localhost".

##### "redis_port" `[int]`
- Redis poortwaarde. Standaard = "6379".

##### "redis_timeout" `[float]`
- Redis timeoutwaarde. Standaard = "2.5".

##### "pdo_dsn" `[string]`
- PDO DSN-waarde. Standaard = "mysql:dbname=phpmussel;host=localhost;port=3306".

##### "pdo_username" `[string]`
- PDO gebruikersnaam.

##### "pdo_password" `[string]`
- PDO wachtwoord.

#### "frontend" (Categorie)
Configuratie voor de frontend.

##### "frontend_log" `[string]`
- Bestand om de frontend login pogingen te loggen. Geef een bestandsnaam, of laat leeg om uit te schakelen.

##### "max_login_attempts" `[int]`
- Maximum aantal frontend-inlogpogingen. Standaard = 5.

##### "numbers" `[string]`
- Hoe verkiest u nummers die worden weergegeven? Selecteer het voorbeeld dat het meest correct voor u lijkt.

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

##### "default_algo" `[string]`
- Definieert welk algoritme u wilt gebruiken voor alle toekomstige wachtwoorden en sessies. Opties: PASSWORD_DEFAULT (standaard), PASSWORD_BCRYPT, PASSWORD_ARGON2I (vereist PHP >= 7.2.0), PASSWORD_ARGON2ID (vereist PHP >= 7.3.0).

```
default_algo
├─PASSWORD_DEFAULT ("PASSWORD_DEFAULT")
├─PASSWORD_BCRYPT ("PASSWORD_BCRYPT")
├─PASSWORD_ARGON2I ("PASSWORD_ARGON2I (PHP >= 7.2.0)")
└─PASSWORD_ARGON2ID ("PASSWORD_ARGON2ID (PHP >= 7.3.0)")
```

##### "theme" `[string]`
- De esthetiek voor de phpMussel frontend.

```
theme
├─default ("Default")
├─rbi ("Red-Blue Inverted")
├─slate ("Slate")
├─bluemetal ("Blue Metal")
├─moss ("Moss")
├─fullmoon ("Full Moon")
└─…Anders
```

##### "magnification" `[float]`
- Lettergrootte vergroting. Standaard = 1.

#### "web" (Categorie)
Configuratie voor de uploadhandler.

##### "uploads_log" `[string]`
- Waar alle geblokkeerde uploads moeten worden geregistreerd. Geef een bestandsnaam of laat leeg om te uitschakelen.

##### "forbid_on_block" `[bool]`
- Moet phpMussel reageren met 403 headers met het bestanden upload geblokkeerd bericht, of blijven met de gebruikelijke 200 OK? False = Nee (200); True = Ja (403) [Standaard].

##### "max_uploads" `[int]`
- Maximaal toegestane aantal bestanden te scannen tijdens bestandsupload scan voordat aborteren de scan en informeren de gebruiker ze zijn uploaden van te veel in een keer! Biedt bescherming tegen een theoretische aanval waardoor een aanvaller probeert te DDoS uw systeem of CMS door overbelasting phpMussel te vertragen het PHP proces tot stilstand. Aanbevolen: 10. U zou kunnen wil te verhogen of verlagen dit nummer afhankelijk van de snelheid van uw hardware. Noteren dat dit aantal niet verklaren voor of opnemen de inhoud van de archieven.

##### "ignore_upload_errors" `[bool]`
- Dit richtlijn moet in het algemeen worden uitgeschakeld tenzij het is vereist voor de juiste functionaliteit van phpMussel op uw specifieke systeem. Normaal, wanneer uitgeschakeld, wanneer phpMussel detecteert de aanwezigheid van elementen van de `$_FILES` array(), het zal proberen initiëren een scan van het bestanden deze elementen vertegenwoordigen, en, als deze elementen zijn leeg, phpMussel zal terugkeren een foutmelding. Dit is het juiste gedrag voor phpMussel. Dat gezegd hebbende, voor sommige CMS, lege elementen in `$_FILES` kan optreden als gevolg van het natuurlijke gedrag van deze CMS, of fouten zouden zijn gerapporteerd wanneer er geen, in welk geval, het normale gedrag voor phpMussel zullen bemoeien met het normale gedrag van deze CMS. Als dergelijke een situatie optreedt voor u, inschakelen dit optie zal instrueren phpMussel niet te proberen te initiëren scannen voor dergelijke lege elementen, negeer hem wanneer gevonden en niet terugkeren gerelateerde foutmeldingen, dus toelaten de voortzetting van de pagina-aanvraag. False = UITGESCHAKELD; True = INGESCHAKELD.

##### "theme" `[string]`
- De esthetiek die moet worden gebruikt voor de pagina "Upload Geweigerd".

```
theme
├─default ("Default")
├─rbi ("Red-Blue Inverted")
├─slate ("Slate")
├─bluemetal ("Blue Metal")
├─moss ("Moss")
├─fullmoon ("Full Moon")
└─…Anders
```

##### "magnification" `[float]`
- Lettergrootte vergroting. Standaard = 1.

#### "phpmailer" (Categorie)
Configuratie voor PHPMailer (gebruikt voor tweefactorauthenticatie).

##### "event_log" `[string]`
- Een bestand voor het loggen van alle evenementen met betrekking tot PHPMailer. Geef een bestandsnaam, of laat leeg om uit te schakelen.

##### "enable_two_factor" `[bool]`
- Deze richtlijn bepaalt of 2FA wordt gebruikt voor frontend-accounts.

##### "enable_notifications" `[string]`
- Als u via e-mail op de hoogte wilt worden gehouden wanneer een upload wordt geblokkeerd, geeft u hier het e-mailadres van de ontvanger op.

##### "skip_auth_process" `[bool]`
- Wanneer `true`, geeft PHPMailer opdracht om het verificatieproces over te slaan dat normaal optreedt bij het verzenden van e-mail via SMTP. Dit moet worden vermeden, omdat bij het overslaan van dit verificatieproces uitgaande e-mail aan MITM-aanvallen kan worden blootgesteld, maar kan nodig zijn in gevallen waarin dit verificatieproces verhindert dat PHPMailer verbinding maakt met een SMTP-server.

##### "host" `[string]`
- De SMTP-host dat moet worden gebruikt voor uitgaande e-mail.

##### "port" `[int]`
- Het poortnummer dat moet worden gebruikt voor uitgaande e-mail. Standaard = 587.

##### "smtp_secure" `[string]`
- Het protocol voor het verzenden van e-mail via SMTP (TLS of SSL).

```
smtp_secure
├─default ("-")
├─tls ("TLS")
└─ssl ("SSL")
```

##### "smtp_auth" `[bool]`
- Deze richtlijn bepaalt of SMTP-sessies moeten worden geverifieerd (moet meestal alleen worden gelaten).

##### "username" `[string]`
- De gebruikersnaam voor het verzenden van e-mail via SMTP.

##### "password" `[string]`
- Het wachtwoord voor het verzenden van e-mail via SMTP.

##### "set_from_address" `[string]`
- Het afzenderadres voor het verzenden van e-mail via SMTP.

##### "set_from_name" `[string]`
- De naam van de afzender voor het verzenden van e-mail via SMTP.

##### "add_reply_to_address" `[string]`
- Het antwoordadres voor het verzenden van e-mail via SMTP.

##### "add_reply_to_name" `[string]`
- De antwoordnaam voor het verzenden van e-mail via SMTP.

---


### 8. <a name="SECTION8"></a>SIGNATURE FORMAAT

*Zie ook:*
- *[Wat is een "signature"?](#WHAT_IS_A_SIGNATURE)*

De eerste 9 bytes `[x0-x8]` van een phpMussel signatuurbestand zijn `phpMussel`, en fungeren als een "magisch nummer" (magic number), om ze te identificeren als signatuurbestanden (dit helpt om te voorkomen dat phpMussel per ongeluk probeert bestanden te gebruiken die geen signatuurbestanden zijn). De volgende byte `[x9]` identificeert het type signatuurbestand, dat phpMussel moet weten om het signatuurbestand correct te kunnen interpreteren. De volgende typen signatuurbestanden worden herkend:

Type | Byte | Beschrijving
---|---|---
`General_Command_Detections` | `0?` | Voor CSV (komma gescheiden waarden) signatuurbestanden. Waarden (signatures) zijn hexadecimale gecodeerde strings om te zoeken naar bestanden. Signatures hier hebben geen namen of andere details (alleen de string die wordt gedetecteerd).
`Filename` | `1?` | Voor bestandsnaam signatures.
`Hash` | `2?` | Voor hash signatures.
`Standard` | `3?` | Voor signatuurbestanden die direct met de inhoud van het bestand werken.
`Standard_RegEx` | `4?` | Voor signatuurbestanden die direct met de inhoud van het bestand werken. Signatures kunnen reguliere expressies bevatten.
`Normalised` | `5?` | Voor signatuurbestanden die werken met ANSI-genormaliseerde bestandsinhoud.
`Normalised_RegEx` | `6?` | Voor signatuurbestanden die werken met ANSI-genormaliseerde bestandsinhoud. Signatures kunnen reguliere expressies bevatten.
`HTML` | `7?` | Voor signatuurbestanden die werken met HTML-genormaliseerde bestandsinhoud.
`HTML_RegEx` | `8?` | Voor signatuurbestanden die werken met HTML-genormaliseerde bestandsinhoud. Signatures kunnen reguliere expressies bevatten.
`PE_Extended` | `9?` | Voor signatuurbestanden die werken met PE metadata (andere dan PE sectionele metadata).
`PE_Sectional` | `A?` | Voor signatuurbestanden die werken met PE sectionele metadata.
`Complex_Extended` | `B?` | Voor signatuurbestanden die werken met verschillende regels op basis van uitgebreide metadata die gegenereerd worden door phpMussel.
`URL_Scanner` | `C?` | Voor signatuurbestanden die werken met URL's.

De volgende byte `[x10]` is een nieuwe lijn `[0A]`, en concludeert de phpMussel signatuurbestand header.

Elke lijn daarna die niet lege is een signature of regel. Elke signature of regel bevat één lijn. De ondersteunde signature formaten worden hieronder beschreven.

#### *BESTANDSNAAM SIGNATURES*
Alle bestandsnaam signatures volgt het formaat:

`NAME:FNRX`

Waar NAME is de naam te noemen voor dat signature en FNRX is de reguliere expressie patroon om bestandsnamen (ongecodeerde) te controleer tegen.

#### *HASH SIGNATURES*
Alle HASH signatures volgt het formaat:

`HASH:FILESIZE:NAME`

Waar HASH is de hash (doorgaans MD5) van een hele bestand, FILESIZE is de totale grootte van het bestand en NAME is de naam te noemen voor dat signature.

#### *PE SECTIONELE SIGNATURES*
Alle PE sectionele signatures volgt het formaat:

`SIZE:HASH:NAME`

Waar HASH is de MD5 hash van een sectie van een PE bestand, SIZE is de totale grootte van die sectie en NAME is de naam te noemen voor dat signature.

#### *PE UITGEBREIDE SIGNATURES*
Alle PE uitgebreide signatures volgt het formaat:

`$VAR:HASH:SIZE:NAME`

Waar $VAR is de naam van de PE-variabele te controleer tegen, HASH is de MD5 hash van die variabele, SIZE is de totale grootte van die variabele en NAME is de naam te noemen voor dat signature.

#### *COMPLEXE UITGEBREIDE SIGNATURES*
Complexe uitgebreid signatures zijn nogal verschillend van de andere signature typen mogelijk met phpMussel, doordat wat ze gecontroleerd tegen wordt bepaald door de signatures zelf en ze kunnen controleer tegen meervoudig criteria. De controle criteria zijn begrensd door ";" en de controle type en de controle gegevens van elke controle criteria wordt begrensd door ":" zoals zo dat formaat voor deze signatures heeft de neiging om een beetje uitzien als:

`$variable1:GEGEVENS;$variable2:GEGEVENS;Signaturenaam`

#### *AL HET ANDERE*
Alle andere signatures volgt het formaat:

`NAME:HEX:FROM:TO`

Waar NAME is de naam te noemen voor dat signature en HEX is een hexadecimale gecodeerd segment van het bestand bestemd om te worden gecontroleerd door de gegeven signature. FROM en TO optioneel parameters zijn, aangeeft van waaruit en waaraan in de brongegevens om te controleren tegen.

#### *REGEX (REGULAR EXPRESSIONS)*
Elke vorm van reguliere expressie begrepen en correct verwerkt door moet ook correct worden begrepen en verwerkt door phpMussel en signatures. Echter, Ik stel voor het nemen van extreem voorzichtigheid bij het schrijven van nieuwe signatures op basis van reguliere expressie, omdat, als u niet helemaal zeker wat u doet, kan er zeer onregelmatig en/of onverwachte resultaten worden. Neem een kijkje op de phpMussel broncode als u niet helemaal zeker over de context waarin regex verklaringen geïnterpreteerd worden. Ook, vergeet niet dat alle patronen (met uitzondering van bestandsnaam, archief metadata en MD5 patronen) moet hexadecimaal gecodeerd worden (voorgaande patroon syntaxis, natuurlijk)!

---


### 9. <a name="SECTION9"></a>BEKENDE COMPATIBILITEITSPROBLEMEN

#### ANTI-VIRUS SOFTWARECOMPATIBILITEIT

Compatibiliteitsproblemen tussen phpMussel en sommige antivirusleveranciers zijn in het verleden soms bekend, dus om de paar maanden of daaromtrent, controleer ik de nieuwste beschikbare versies van de phpMussel-codebase tegen Virus Total, om te zien of daar problemen worden gemeld. Wanneer daar problemen worden gemeld, vermeld ik de gerapporteerde problemen hier in de documentatie.

Toen ik het laatst controleerde (2019.10.10), werden er geen problemen gemeld.

Ik geen signatuurbestanden, documentatie of andere randinhoud controleer. De signatuurbestanden veroorzaken altijd een aantal valse positieven wanneer andere antivirusoplossingen deze detecteren. Ik zou daarom ten zeerste aanbevelen dat als u phpMussel wilt installeren op een machine waar al een andere antivirusoplossing bestaat, de phpMussel-signatuurbestanden op de witte lijst worden gezet.

*Zie ook: [Compatibiliteitskaarten](https://maikuolan.github.io/Compatibility-Charts/).*

---


### 10. <a name="SECTION10"></a>VEELGESTELDE VRAGEN (FAQ)

- [Wat is een "signature"?](#WHAT_IS_A_SIGNATURE)
- [Wat is een "vals positieve"?](#WHAT_IS_A_FALSE_POSITIVE)
- [Hoe vaak worden signatures bijgewerkt?](#SIGNATURE_UPDATE_FREQUENCY)
- [Ik heb een fout tegengekomen tijdens het gebruik van phpMussel en ik weet niet wat te doen! Help alstublieft!](#ENCOUNTERED_PROBLEM_WHAT_TO_DO)
- [Ik wil phpMussel v3 gebruiken met een PHP-versie ouder dan 7.2.0; Kan u helpen?](#MINIMUM_PHP_VERSION_V3)
- [Kan ik een enkele phpMussel-installatie gebruiken om meerdere domeinen te beschermen?](#PROTECT_MULTIPLE_DOMAINS)
- [Ik wil niet tijd verspillen met het installeren van dit en om het te laten werken met mijn website; Kan ik u betalen om het te doen?](#PAY_YOU_TO_DO_IT)
- [Kan ik u of een van de ontwikkelaars van dit project voor privéwerk huren?](#HIRE_FOR_PRIVATE_WORK)
- [Ik heb speciale modificaties en aanpassingen nodig; Kan u helpen?](#SPECIALIST_MODIFICATIONS)
- [Ik ben een ontwikkelaar, website ontwerper, of programmeur. Kan ik werken aan dit project accepteren of aanbieden?](#ACCEPT_OR_OFFER_WORK)
- [Ik wil bijdragen aan het project; Kan ik dit doen?](#WANT_TO_CONTRIBUTE)
- [Hoe krijgt u toegang tot specifieke gegevens over bestanden als ze worden gescand?](#SCAN_DEBUGGING)
- [Blacklists (zwarte lijsten) – Whitelists (witte lijsten) – Greylists (grijze lijst) – Wat zijn ze en hoe gebruik ik ze?](#BLACK_WHITE_GREY)
- [Wat is een "PDO DSN"? Hoe kan ik PDO gebruiken met phpMussel?](#HOW_TO_USE_PDO)
- [Mijn uploadfaciliteit is asynchroon (b.v., gebruikt ajax, ajaj, json, enz). Ik zie geen speciaal bericht of waarschuwing wanneer een upload is geblokkeerd. Wat is er aan de hand?](#AJAX_AJAJ_JSON)
- [Kan phpMussel EICAR detecteren?](#DETECT_EICAR)

#### <a name="WHAT_IS_A_SIGNATURE"></a>Wat is een "signature"?

In de context van phpMussel, een "signature" verwijst naar gegevens die als indicator/identifier werken voor iets specifiek waarnaar we op zoek zijn, meestal in de vorm van een zeer klein, duidelijk, onschadelijk segment van iets groter en anderszins schadelijk, zoals een virus of een trojan, of in de vorm van een controleschema, een hash of een andere identificerende indicator, en bevat gewoonlijk een label, en enkele andere gegevens om extra context te bieden die door phpMussel kan worden gebruikt om te bepalen de beste manier te gaan wanneer het ontmoet waar we naar op zoek zijn.

#### <a name="WHAT_IS_A_FALSE_POSITIVE"></a>Wat is een "vals positieve"?

De term "vals positieve" (*alternatief: "vals positieve fout"; "vals alarm"*; Engels: *false positive*; *false positive error*; *false alarm*), zeer eenvoudig beschreven, en een algemene context, wordt gebruikt bij het testen voor een toestand, om verwijst naar om de resultaten van die test, wanneer de resultaten positief zijn (d.w.z, de toestand wordt vastgesteld als "positief"), maar wordt verwacht "negatief" te zijn (d.w.z, de toestand in werkelijkheid is "negatief"). Een "vals positieve" analoog aan "huilende wolf" kan worden beschouwd (waarin de toestand wordt getest, is of er een wolf in de buurt van de kudde, de toestand is "vals" in dat er geen wolf in de buurt van de kudde, en de toestand wordt gerapporteerd als "positief" door de herder door middel van schreeuwen "wolf, wolf"), of analoog aan situaties in medische testen waarin een patiënt gediagnosticeerd als met een ziekte of aandoening, terwijl het in werkelijkheid, hebben ze geen ziekte of aandoening.

Enkele andere termen die worden gebruikt zijn "waar positieve", "waar negatieve" en "vals negatieve". Een "waar positieve" verwijst naar wanneer de resultaten van de test en de huidige staat van de toestand zijn beide waar (of "positief"), and a "waar negatieve" verwijst naar wanneer de resultaten van de test en de huidige staat van de toestand zijn beide vals (of "negatief"); En "waar positieve" of en "waar negatieve" wordt beschouwd als een "correcte gevolgtrekking" zijn. De antithese van een "vals positieve" is een "vals negatieve"; Een "vals negatieve" verwijst naar wanneer de resultaten van de test is negatief (d.w.z, de aandoening wordt vastgesteld als "negatief"), maar wordt verwacht "positief" te zijn (d.w.z, de toestand in werkelijkheid is "positief").

In de context van phpMussel, deze termen verwijzen naar de signatures van phpMussel en de bestanden die ze blokkeren. Wanneer phpMussel blokkeert een bestand, als gevolg van slechte, verouderde of onjuiste signature, maar moet niet hebben gedaan, of wanneer het doet om de verkeerde redenen, we verwijzen naar deze gebeurtenis als een "vals positieve". Wanneer phpMussel niet in slaagt te blokkeren om een bestand dat had moeten worden geblokkeerd, als gevolg van onvoorziene bedreigingen, ontbrekende signatures of tekorten in zijn signatures, we verwijzen naar deze gebeurtenis als een "gemiste detectie" (dat is analoog aan een "vals negatieve").

Dit kan worden samengevat in de onderstaande tabel:

&nbsp; | phpMussel moet *NIET* een bestand te blokkeren | phpMussel *MOET* een bestand te blokkeren
---|---|---
phpMussel *NIET* doet blokkeren van een bestand | Waar negatieve (correcte gevolgtrekking) | Gemiste detectie (analoog aan vals negatieve)
phpMussel *DOET* blokkeren van een bestand | __Vals positieve__ | Waar positieve (correcte gevolgtrekking)

#### <a name="SIGNATURE_UPDATE_FREQUENCY"></a>Hoe vaak worden signatures bijgewerkt?

Bijwerkfrequentie varieert afhankelijk van de signatuurbestanden betrokken. Alle de onderhouders voor phpMussel signatuurbestanden algemeen proberen om hun signatures regelmatig bijgewerkt te houden, maar als gevolg van dat ieder van ons hebben verschillende andere verplichtingen, ons leven buiten het project, en zijn niet financieel gecompenseerd (d.w.z., betaald) voor onze inspanningen aan het project, een nauwkeurige updateschema kan niet worden gegarandeerd. In het algemeen, signatures zullen worden bijgewerkt wanneer er genoeg tijd om dit te doen. Het verlenen van bijstand wordt altijd gewaardeerde als u bent bereid om dat te doen.

#### <a name="ENCOUNTERED_PROBLEM_WHAT_TO_DO"></a>Ik heb een fout tegengekomen tijdens het gebruik van phpMussel en ik weet niet wat te doen! Help alstublieft!

- Gebruikt u de nieuwste versie van de software? Gebruikt u de nieuwste versies van uw signatuurbestanden? Indien het antwoord op een van deze twee vragen is nee, probeer eerst om alles te bijwerken, en controleer of het probleem zich blijft voordoen. Als dit aanhoudt, lees verder.
- Hebt u door alle documentatie gecontroleerd? Zo niet, doe dat dan. Als het probleem niet kan worden opgelost met behulp van de documentatie, lees verder.
- Hebt u de **[issues pagina](https://github.com/phpMussel/phpMussel/issues)** gecontroleerd, om te zien of het probleem al eerder is vermeld? Als het eerder vermeld, controleer of eventuele suggesties, ideeën en/of oplossingen werden verstrekt, en volg als per nodig om te proberen het probleem op te lossen.
- Als het probleem blijft bestaan, zoek hulp door een nieuw issue op de issues pagina te maken.

#### <a name="MINIMUM_PHP_VERSION_V3"></a>Ik wil phpMussel v3 gebruiken met een PHP-versie ouder dan 7.2.0; Kan u helpen?

Nee. PHP >= 7.2.0 is een minimale vereiste voor phpMussel v3.

*Zie ook: [Compatibiliteitskaarten](https://maikuolan.github.io/Compatibility-Charts/).*

#### <a name="PROTECT_MULTIPLE_DOMAINS"></a>Kan ik een enkele phpMussel-installatie gebruiken om meerdere domeinen te beschermen?

Ja.

#### <a name="PAY_YOU_TO_DO_IT"></a>Ik wil niet tijd verspillen met het installeren van dit en om het te laten werken met mijn website; Kan ik u betalen om het te doen?

Misschien. Dit wordt per geval beoordeeld. Laat ons weten wat u nodig hebt, wat u aanbiedt, en wij laten u weten of we kunnen helpen.

#### <a name="HIRE_FOR_PRIVATE_WORK"></a>Kan ik u of een van de ontwikkelaars van dit project voor privéwerk huren?

*Zie hierboven.*

#### <a name="SPECIALIST_MODIFICATIONS"></a>Ik heb speciale modificaties en aanpassingen nodig; Kan u helpen?

*Zie hierboven.*

#### <a name="ACCEPT_OR_OFFER_WORK"></a>Ik ben een ontwikkelaar, website ontwerper, of programmeur. Kan ik werken aan dit project accepteren of aanbieden?

Ja. Onze licentie verbiedt dit niet.

#### <a name="WANT_TO_CONTRIBUTE"></a>Ik wil bijdragen aan het project; Kan ik dit doen?

Ja. Bijdragen aan het project zijn zeer welkom. Zie voor meer informatie "CONTRIBUTING.md".

#### <a name="SCAN_DEBUGGING"></a>Hoe krijgt u toegang tot specifieke gegevens over bestanden als ze worden gescand?

U kunt toegang krijgen tot specifieke gegevens over bestanden als ze worden gescand door een array toe te wijzen om hiervoor te gebruiken voordat u phpMussel instructeert om ze te scannen.

In het onderstaande voorbeeld, `$Foo` is hiervoor toegewezen. Na het scannen `/bestandspad/...`, gedetailleerde informatie over de bestanden die `/bestandspad/...` bevat zullen door `$Foo` worden opgenomen.

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);

$Scanner->setScanDebugArray($Foo);

$Results = $Scanner->scan('/bestandspad/...');

var_dump($Foo);
```

De array is multidimensionaal. Elementen vertegenwoordigen de bestanden die moeten worden gescand, en subelementen vertegenwoordigen de details over deze bestanden. Deze subelementen zijn als volgt:

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

*† - Niet voorzien van cache-resultaten (alleen voor nieuwe scanresultaten voorzien).*

*‡ - Alleen bij het scannen van PE-bestanden voorzien.*

Optioneel, deze array kan worden vernietigd door het volgende te gebruiken:

```PHP
$Scanner->destroyScanDebugArray($Foo);
```

#### <a name="BLACK_WHITE_GREY"></a>Blacklists (zwarte lijsten) – Whitelists (witte lijsten) – Greylists (grijze lijst) – Wat zijn ze en hoe gebruik ik ze?

De termen brengen verschillende betekenissen over in verschillende contexten. In phpMussel zijn er drie contexten waarin deze termen worden gebruikt: Bestandsgrootte respons, bestandstype respons, en de signature greylist.

Om een gewenst resultaat te bereiken tegen minimale kosten voor verwerking, zijn er enkele eenvoudige dingen die phpMussel kan controleren voordat bestanden daadwerkelijk worden gescand, zoals de grootte, de naam en de extensie van een bestand. Bijvoorbeeld; Als een bestand te groot is, of als de extensie een bestandstype aangeeft dat we sowieso niet willen toestaan op onze websites, we kunnen het bestand onmiddellijk markeren en hoeven het niet te scannen.

Bestandsgrootte respons is de manier waarop phpMussel reageert wanneer een bestand een opgegeven limiet overschrijdt. Hoewel er geen echte lijsten bij betrokken zijn, kan een bestand op basis van zijn grootte als effectief op de zwarte lijst, op de witte lijst of in de grijze lijst worden beschouwd. Er zijn twee afzonderlijke, optionele configuratie richtlijnen om respectievelijk een limiet en een gewenst antwoord op te geven.

Bestandstype respons is de manier waarop phpMussel reageert op de extensie van het bestand. Er zijn drie afzonderlijke, optionele configuratie richtlijnen om expliciet aan te geven welke extensies op de zwarte lijst, op de witte lijst of in de grijze lijst moeten staan. Een bestand kan als effectief worden beschouwd op de zwarte lijst, op de witte lijst of in de grijze lijst als de extensie overeenkomt met een van de opgegeven extensies.

In deze twee contexten, op de witte lijst staan betekent dat deze niet mag worden gescand of gemarkeerd; op de zwarte lijst staan betekent dat deze moet worden gemarkeerd (en daarom hoeft het niet te scannen); en op de grijze lijst staan betekent dat verdere analyse vereist is om te bepalen of we het moeten markeren (d.w.z, het moet worden gescand).

De signature greylist is een lijst met signatures die in essentie moet worden genegeerd (dit wordt eerder in de documentatie kort genoemd). Wanneer een signature op de signature greylist wordt geactiveerd, blijft phpMussel werken door zijn signatures en onderneemt geen specifieke actie met betrekking tot de signature dat op de greylist staat. Er is geen zwarte lijst, omdat het impliciete gedrag is hetzelfde als het normaal gedrag voor getriggerde signatures, en er is geen signature witte lijst, omdat het impliciete gedrag niet echt zinvol is in overweging van hoe phpMussel normaal werkt en de mogelijkheden die het al heeft.

De signature grijze lijst is handig als u problemen wilt oplossen die door een bepaalde signature worden veroorzaakt zonder het volledige signatuurbestand uit te schakelen of te deinstalleren.

#### <a name="HOW_TO_USE_PDO"></a>Wat is een "PDO DSN"? Hoe kan ik PDO gebruiken met phpMussel?

"PDO" is een acroniem voor "[PHP Data Objects](https://www.php.net/manual/en/intro.pdo.php)". Het biedt een interface voor PHP met sommige databasesystemen te verbinden die vaak worden gebruikt door verschillende PHP-applicaties.

"DSN" is een acroniem voor "[data source name](https://en.wikipedia.org/wiki/Data_source_name)". De "PDO DSN" beschrijft aan PDO hoe te verbinden met een database.

phpMussel biedt de optie om PDO te gebruiken voor cachingdoeleinden. Om dit correct te laten werken, moet u phpMussel dienovereenkomstig configureren, PDO ingeschakeld gemaakt, een nieuwe database maken die phpMussel kan gebruiken (als u nog geen database voor phpMussel in gedachten hebt), en een nieuwe tabel in uw database maken in overeenstemming met de hieronder beschreven structuur.

Wanneer een databaseverbinding succesvol is, maar de benodigde tabel bestaat niet, zal deze proberen de tabel automatisch aan te maken. Dit gedrag is echter niet uitgebreid getest en succes kan niet worden gegarandeerd.

Dit is natuurlijk alleen van toepassing als u daadwerkelijk wilt dat phpMussel PDO gebruikt. Als u tevreden bent dat phpMussel flatfile caching gebruikt (volgens de standaardconfiguratie), of een van de andere aangeboden cachingopties, hoeft u zich geen zorgen te maken over het opzetten van databases, tabellen, enzovoort.

De hieronder beschreven structuur gebruikt "phpmussel" als de databasenaam, maar u kunt elke gewenste naam gebruiken voor uw database, zolang diezelfde naam wordt gerepliceerd in uw DSN-configuratie.

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

phpMussel's `pdo_dsn` configuratie-richtlijn moet worden geconfigureerd zoals hieronder beschreven.

```
Afhankelijk van welk databasestuurprogramma wordt gebruikt...
│
├─4d (Waarschuwing: Experimenteel, niet getest, niet aanbevolen!)
│ │
│ │         ╔═══════╗
│ └─4D:host=localhost;charset=UTF-8
│           ╚╤══════╝
│            └De host waarmee verbinding wordt gemaakt om de database te
│             vinden.
│
├─cubrid
│ │
│ │             ╔═══════╗      ╔═══╗        ╔═════╗
│ └─cubrid:host=localhost;port=33000;dbname=example
│               ╚╤══════╝      ╚╤══╝        ╚╤════╝
│                │              │            └De naam van de database te
│                │              │             gebruiken.
│                │              │
│                │              └Het poortnummer waarmee verbinding moet worden
│                │               gemaakt met de host.
│                │
│                └De host waarmee verbinding wordt gemaakt om de database te
│                 vinden.
│
├─dblib
│ │
│ │ ╔═══╗      ╔═══════╗        ╔═════╗
│ └─dblib:host=localhost;dbname=example
│   ╚╤══╝      ╚╤══════╝        ╚╤════╝
│    │          │                └De naam van de database te gebruiken.
│    │          │
│    │          └De host waarmee verbinding wordt gemaakt om de database te
│    │           vinden.
│    │
│    └Mogelijke waarden: "mssql", "sybase", "dblib".
│
├─firebird
│ │
│ │                 ╔═══════════════════╗
│ └─firebird:dbname=/path/to/database.fdb
│                   ╚╤══════════════════╝
│                    ├Kan een pad zijn naar een lokaal databasebestand.
│                    │
│                    ├Kan verbinding maken met een host en poortnummer.
│                    │
│                    └Raadpleeg de Firebird-documentatie als u hiervan gebruik
│                     wilt maken.
│
├─ibm
│ │
│ │         ╔═════╗
│ └─ibm:DSN=example
│           ╚╤════╝
│            └Met welke gecatalogiseerde database om verbinding mee te maken.
│
├─informix
│ │
│ │              ╔═════╗
│ └─informix:DSN=example
│                ╚╤════╝
│                 └Met welke gecatalogiseerde database om verbinding mee te
│                  maken.
│
├─mysql (Meest aanbevolen!)
│ │
│ │              ╔═════╗      ╔═══════╗      ╔══╗
│ └─mysql:dbname=example;host=localhost;port=3306
│                ╚╤════╝      ╚╤══════╝      ╚╤═╝
│                 │            │              └Het poortnummer waarmee
│                 │            │               verbinding moet worden gemaakt
│                 │            │               met de host.
│                 │            │
│                 │            └De host waarmee verbinding wordt gemaakt om de
│                 │             database te vinden.
│                 │
│                 └De naam van de database te gebruiken.
│
├─oci
│ │
│ │            ╔═════╗
│ └─oci:dbname=example
│              ╚╤════╝
│               ├Kan verwijzen naar de specifieke gecatalogiseerde database.
│               │
│               ├Kan verbinding maken met een host en poortnummer.
│               │
│               └Raadpleeg de Oracle-documentatie als u hiervan gebruik wilt
│                maken.
│
├─odbc
│ │
│ │      ╔═════╗
│ └─odbc:example
│        ╚╤════╝
│         ├Kan verwijzen naar de specifieke gecatalogiseerde database.
│         │
│         ├Kan verbinding maken met een host en poortnummer.
│         │
│         └Raadpleeg de ODBC/DB2-documentatie als u hiervan gebruik wilt maken.
│
├─pgsql
│ │
│ │            ╔═══════╗      ╔══╗        ╔═════╗
│ └─pgsql:host=localhost;port=5432;dbname=example
│              ╚╤══════╝      ╚╤═╝        ╚╤════╝
│               │              │           └De naam van de database te
│               │              │            gebruiken.
│               │              │
│               │              └Het poortnummer waarmee verbinding moet worden
│               │               gemaakt met de host.
│               │
│               └De host waarmee verbinding wordt gemaakt om de database te
│                vinden.
│
├─sqlite
│ │
│ │        ╔════════╗
│ └─sqlite:example.db
│          ╚╤═══════╝
│           └Het pad naar het te gebruiken lokale databasebestand.
│
└─sqlsrv
  │
  │               ╔═══════╗ ╔══╗          ╔═════╗
  └─sqlsrv:Server=localhost,1521;Database=example
                  ╚╤══════╝ ╚╤═╝          ╚╤════╝
                   │         │             └De naam van de database te gebruiken.
                   │         │
                   │         └Het poortnummer waarmee verbinding moet worden
                   │          gemaakt met de host.
                   │
                   └De host waarmee verbinding wordt gemaakt om de database te
                    vinden.
```

Als u niet zeker weet wat u voor een bepaald deel van uw DSN moet gebruiken, probeer dan eerst te kijken of het werkt zoals het is, zonder iets te veranderen.

Merk op dat `pdo_username` en `pdo_password` hetzelfde moeten zijn als de gebruikersnaam en het wachtwoord dat u hebt gekozen voor uw database.

#### <a name="AJAX_AJAJ_JSON"></a>Mijn uploadfaciliteit is asynchroon (b.v., gebruikt ajax, ajaj, json, enz). Ik zie geen speciaal bericht of waarschuwing wanneer een upload is geblokkeerd. Wat is er aan de hand?

Dit is normaal. De standaardpagina "Upload Geweigerd" van phpMussel wordt als HTML weergegeven, wat voldoende zou moeten zijn voor typische synchrone verzoeken, maar waarschijnlijk zal niet voldoende zijn als uw uploadfaciliteit iets anders verwacht. Als uw uploadfaciliteit asynchroon is, of verwacht dat een uploadstatus asynchroon wordt weergegeven, er zijn enkele dingen die u zou kunnen proberen om phpMussel te voorzien in de behoeften van uw uploadfaciliteit.

1. Maak een aangepaste uitvoersjabloon om iets anders dan HTML weer te geven.
2. Maak een aangepaste plug-in om de standaardpagina "Upload Geweigerd" volledig te omzeilen en laat de uploadhandler iets anders doen wanneer een upload wordt geblokkeerd (er zijn enkele plug-inhaken die door de uploadhandler worden geleverd die hiervoor kunnen helpen).
3. Schakel de uploadhandler volledig uit en roep in plaats daarvan de phpMussel API aan alleen vanuit uw uploadfaciliteit.

#### <a name="DETECT_EICAR"></a>Kan phpMussel EICAR detecteren?

Ja. Een signature voor het detecteren van EICAR is opgenomen in het "phpMussel standard regular expressions signature file" (`phpmussel_regex.db`). Zolang dat signatuurbestand is geïnstalleerd en geactiveerd, zou phpMussel moeten kunnen EICAR detecteren. Omdat de ClamAV-database ook tal van signatures bevat die specifiek zijn bedoeld voor het detecteren van EICAR, ClamAV kan gemakkelijk EICAR detecteren, maar aangezien phpMussel slechts een beperkte subset van de totale signatures die door ClamAV worden geleverd gebruikt, zijn ze op zichzelf misschien niet voldoende voor phpMussel om EICAR te detecteren. De mogelijkheid om het te detecteren kan ook afhangen van uw exacte configuratie.

---


### 11. <a name="SECTION11"></a>LEGALE INFORMATIE

#### 11.0 SECTIE PREAMBULE

Dit sectie van de documentatie is bedoeld om mogelijke juridische overwegingen met betrekking tot het gebruik en de implementatie van het pakket te beschrijven, en om wat basisgerelateerde informatie te verstrekken. Dit kan voor sommige gebruikers belangrijk zijn om naleving van eventuele wettelijke vereisten in de landen waarin zij actief zijn te waarborgen, en sommige gebruikers moeten hun website-beleid mogelijk aanpassen in overeenstemming met deze informatie.

Eerst en vooral, realiseer je alstublieft dat ik (de auteur van het pakket) geen advocaat en geen gekwalificeerde juridische professional van welke aard. Daarom ben ik niet juridisch gekwalificeerd om juridisch advies te geven. Ook in sommige gevallen, exacte wettelijke vereisten kunnen verschillen tussen verschillende landen en rechtsgebieden, en deze variërende wettelijke vereisten kunnen soms conflicteren (zoals bijvoorbeeld, in het geval van landen die voorrang geven aan [privacyrechten](https://nl.wikipedia.org/wiki/Privacy) en het [recht om te worden vergeten](https://nl.wikipedia.org/wiki/Recht_om_vergeten_te_worden), versus landen die de voorrang geven aan uitgebreide [dataretentie](https://nl.wikipedia.org/wiki/Dataretentie)). Overweeg ook dat toegang tot het pakket niet beperkt is tot specifieke landen of rechtsgebieden, en daarom is de gebruikersbasis van het pakket waarschijnlijk geografisch divers. Gezien deze punten, ben ik niet in de positie om aan te geven wat het betekent om "in overeenstemming met de wetgeving" te zijn voor alle gebruikers, in alle opzichten. Ik hoop echter dat de informatie hierin u zal helpen om zelf tot een beslissing te komen over wat u moet doen om wettelijk compatibel te blijven in de context van het pakket. Als u twijfels of zorgen hebt met betrekking tot de informatie hierin, of als u aanvullende hulp en advies nodig hebt vanuit een juridisch perspectief, ik zou aanraden een gekwalificeerde juridische professional te raadplegen.

#### 11.1 AANSPRAKELIJKHEID EN VERANTWOORDELIJKHEID

Zoals al aangegeven door de pakketlicentie, wordt het pakket geleverd zonder enige garantie. Dit omvat (maar is niet beperkt tot) alle reikwijdte van aansprakelijkheid. Het pakket wordt u aangeboden voor uw gemak, in de hoop dat dit nuttig zal zijn, en dat het u enig voordeel oplevert. Echter, of u het pakket gebruikt of implementeert, is uw eigen keuze. U bent niet gedwongen om het pakket te gebruiken of te implementeren, maar wanneer u dat doet, bent u verantwoordelijk voor dat besluit. Noch ik, noch andere bijdragers aan het pakket, zijn juridisch aansprakelijk voor de gevolgen van de beslissingen die u neemt, ongeacht of het direct, indirect, impliciet, of anderszins is.

#### 11.2 DERDEN

Afhankelijk van de precieze configuratie en implementatie, kan het pakket in sommige gevallen communiceren en informatie delen met derden. Deze informatie kan in sommige contexten door sommige rechtsgebieden worden gedefinieerd als "[persoonsgegevens](https://nl.wikipedia.org/wiki/Persoonsgegevens)".

Hoe deze informatie door deze derden kan worden gebruikt, is onderworpen aan de verschillende beleidsregels uiteengezet door deze derden, en valt buiten het bestek van deze documentatie. In al dergelijke gevallen echter, het delen van informatie met deze derden kan worden uitgeschakeld. In al dergelijke gevallen, als u ervoor kiest om het in te schakelen, is het uw verantwoordelijkheid om eventuele zorgen die u heeft met betrekking tot de privacy, veiligheid, en gebruik van persoonsgegevens door deze derden te onderzoeken. Als er twijfels bestaan, of als u niet tevreden bent met het gedrag van deze derden met betrekking tot persoonsgegevens, is het wellicht het beste om het delen van informatie met deze derden uit te schakelen.

Met het oog op transparantie wordt het type informatie dat wordt gedeeld en met wie, hieronder beschreven.

##### 11.2.0 WEBFONTS

Sommige aangepaste thema's, evenals de standaard UI ("gebruikersinterface") voor de frontend van phpMussel en de pagina "Upload Geweigerd", kunnen webfonts gebruiken om esthetische redenen. Webfonts zijn standaard uitgeschakeld, maar indien ingeschakeld, vindt directe communicatie plaats tussen de browser van de gebruiker en de service die de webfonts host. Dit kan mogelijk inhouden dat informatie wordt doorgegeven zoals het IP-adres van de gebruiker, user agent, besturingssysteem, en andere details die beschikbaar zijn voor het verzoek. De meeste van deze webfonts worden gehost door de [Google Fonts](https://fonts.google.com/)-service.

*Relevante configuratie-opties:*
- `general` -> `disable_webfonts`

##### 11.2.1 URL SCANNER

URL's die worden gevonden in bestandsuploads kunnen worden gedeeld met de Google Safe Browsing API, afhankelijk van hoe het pakket is geconfigureerd. De Google Safe Browsing API heeft API-sleutels nodig om correct te werken, en is daarom standaard uitgeschakeld.

*Relevante configuratie-opties:*
- `urlscanner` -> `google_api_key`

##### 11.2.2 VIRUS TOTAL

Wanneer phpMussel een bestandsupload scant, kunnen de hashes van die bestanden worden gedeeld met de Virus Total API, afhankelijk van hoe het pakket is geconfigureerd. Er zijn plannen om op enig moment in de toekomst volledige bestanden te kunnen delen, maar deze functie wordt op dit moment niet door het pakket ondersteund. De Virus Total API heeft een API-sleutel nodig om correct te werken, en is daarom standaard uitgeschakeld.

Informatie (inclusief bestanden en gerelateerde bestandsmetadata) die wordt gedeeld met Virus Total, kan ook worden gedeeld met hun partners en diverse anderen voor onderzoeksdoeleinden. Dit wordt in meer detail beschreven in hun privacybeleid.

*Zien: [Privacy Policy &ndash; VirusTotal](https://support.virustotal.com/hc/en-us/articles/115002168385-Privacy-Policy).*

*Relevante configuratie-opties:*
- `virustotal` -> `vt_public_api_key`

#### 11.3 LOGGEN

Te toggen is om een aantal redenen een belangrijk onderdeel van phpMussel. Zonder loggen kan het moeilijk zijn om valse positieven te diagnosticeren, om precies vast te stellen hoe performant phpMussel zich in een bepaalde context bevindt, en het kan moeilijk zijn om te bepalen waar zijn tekortkomingen kunnen zijn, en welke veranderingen nodig kunnen zijn voor de configuratie of signatures dienovereenkomstig, zodat het blijft functioneren zoals bedoeld. Ongeacht, loggen is misschien niet wenselijk voor alle gebruikers, en blijft volledig optioneel. In phpMussel te loggen is standaard uitgeschakeld. Om dit in te schakelen, moet phpMussel dienovereenkomstig worden geconfigureerd.

Ook, als te loggen wettelijk toegestaan is, en voor zover dat wettelijk toegestaan is (bijvoorbeeld, de soorten informatie die kan worden vastgelegd, voor hoelang, en onder welke omstandigheden), kan variëren, afhankelijk van het rechtsgebied en de context waarin phpMussel wordt geïmplementeerd (bijvoorbeeld, of u als een individu, als een bedrijf, en op commerciële of niet-commerciële basis opereert). Het kan daarom nuttig zijn om dit gedeelte zorgvuldig door te lezen.

phpMussel kan informatie op verschillende manieren loggen, wat verschillende soorten informatie inhoudt, om verschillende redenen.

##### 11.3.0 SCAN LOGS

Indien ingeschakeld in de pakketconfiguratie houdt phpMussel logs bij van de bestanden die worden gescand. Dit type loggen is beschikbaar in twee verschillende indelingen:
- Door mensen leesbare logbestanden.
- Geserialiseerde logbestanden.

Invoer naar een mensen leesbaar logbestand ziet er meestal als volgt uit (bijvoorbeeld):

```
Sun, 19 Jul 2020 13:33:31 +0800 Gestart.
→ "ascii_standard_testfile.txt" aan het verifiëren.
─→ Gedetecteerd phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
Sun, 19 Jul 2020 13:33:31 +0800 Afgewerkt.
```

Een scan log bevat meestal de volgende informatie:
- De datum en tijd waarop het bestand is gescand.
- De naam van het gescande bestand.
- Wat werd er in het bestand gedetecteerd (als er iets werd gedetecteerd).

*Relevante configuratie-opties:*
- `general` -> `scan_log`
- `general` -> `scan_log_serialized`

Wanneer deze richtlijnen leeg worden gelaten, blijft dit type logboek uitgeschakeld.

##### 11.3.1 UPLOADS LOG

Indien ingeschakeld in de pakketconfiguratie houdt phpMussel logs bij van de uploads die zijn geblokkeerd.

*Als voorbeeld:*

```
Datum: Sun, 19 Jul 2020 13:33:31 +0800
IP adres: 127.0.0.x
== Scanresultaten (waarom gemarkeerd) ==
Gedetecteerd phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
== Hash signatures reconstructie ==
dcacac499064454218823fbabff7e09b5b011c0c877ee6f215f35bffb195b6e9:654:ascii_standard_testfile.txt
In quarantaine geplaatst als "1595142388-2e017ea9ac1478e45dc15794a1fc18c0.qfu".
```

Deze logs bevatten doorgaans de volgende informatie:
- De datum en tijd waarop de upload is geblokkeerd.
- Het IP-adres waar de upload vandaan komt.
- De reden waarom het bestand werd geblokkeerd (wat werd gedetecteerd).
- De naam van het bestand geblokkeerd.
- De checksum en de grootte van het bestand geblokkeerd.
- Of het bestand in quarantaine is geplaatst en onder welke interne naam.

*Relevante configuratie-opties:*
- `web` -> `uploads_log`

##### 11.3.2 FRONTEND LOGGEN

Dit type loggen is bedoeld voor pogingen om bij de frontend in te loggen, en gebeurt alleen op wanneer een gebruiker zich probeert in te loggen bij de frontend (ervan uitgaande dat de frontend-toegang is ingeschakeld).

Een frontend logsinvoer bevat het IP-adres van de gebruiker die probeert in te loggen, de datum en tijd waarop de poging heeft plaatsgevonden, en de resultaten van de poging (ingelogd succesvol of niet). Een frontend logsinvoer ziet er meestal als volgt uit (bijvoorbeeld):

```
x.x.x.x - Day, dd Mon 20xx hh:ii:ss +0000 - "admin" - Ingelogd.
```

*Relevante configuratie-opties:*
- `general` -> `frontend_log`

##### 11.3.3 LOGROTATIE

Mogelijk wilt u logs na een bepaalde periode opschonen, of mogelijk bent u wettelijk verplicht (d.w.z., de hoeveelheid tijd die het wettelijk toelaatbaar is om logs te bewaren, kan bij wet beperkt zijn). U kunt dit bereiken door datum/tijd-markeringen op te nemen in de namen van uw logbestanden, zoals gespecificeerd door uw pakketconfiguratie (b.v., `{yyyy}-{mm}-{dd}.log`), en vervolgens logrotatie in te schakelen (logrotatie stelt u in staat om enige actie in logbestanden uit te voeren wanneer de gespecificeerde limieten worden overschreden).

Bijvoorbeeld: Als ik wettelijk verplicht was om logs na 30 dagen te verwijderen, kon ik `{dd}.log` opgeven in de namen van mijn logbestanden (`{dd}` verwijst naar de dagen), de waarde van `log_rotation_limit` op 30 zetten, en de waarde van `log_rotation_action` op `Delete` zetten.

Omgekeerd, als u verplicht bent om logs gedurende langere tijd te bewaren, kunt u überhaupt geen logrotatie gebruiken, of kunt u de waarde van `log_rotation_action` op `Archive` zetten, om logbestanden te comprimeren, waardoor de totale hoeveelheid schijfruimte die ze innemen, wordt verminderd.

*Relevante configuratie-opties:*
- `general` -> `log_rotation_limit`
- `general` -> `log_rotation_action`

##### 11.3.4 LOGTRUNCATIE

Het is ook mogelijk om afzonderlijke logbestanden af te kappen als ze een bepaalde grootte overschrijden, als dit iets is dat u misschien nodig heeft, of zou willen doen.

*Relevante configuratie-opties:*
- `general` -> `truncate`

##### 11.3.5 IP-ADRES PSEUDONIMISATIE

Ten eerste, als u niet bekend bent met de term, "pseudonimisatie" verwijst naar de verwerking van persoonsgegevens als zodanig, zodat deze niet meer kan worden geïdentificeerd aan een specifieke persoon zonder aanvullende informatie, en op voorwaarde dat dergelijke aanvullende informatie afzonderlijk wordt bijgehouden en onderworpen wordt aan technische en organisatorische maatregelen om ervoor te zorgen dat persoonsgegevens niet kunnen worden geïdentificeerd aan een natuurlijke persoon.

De volgende bronnen kunnen helpen om het in meer detail uit te leggen:
- [[privacycompany.eu] Wat is het verschil tussen pseudonimiseren en anonimiseren van persoonsgegevens en wat zijn de gevolgen?](https://www.privacycompany.eu/blog-wat-is-het-verschil-tussen-pseudonimiseren-en-anonimiseren-van-persoonsgegevens-en-wat-zijn-de-gevolgen/)
- [[nen.nl] Pseudonimisatie](https://www.nen.nl/Normontwikkeling/Pseudonimisatie.htm)
- [[considerati.com] Anonimiseren en pseudonimiseren: wat is het verschil en wat is het belang ervan?](https://www.considerati.com/nl/publicaties/blog/anonimiseren-en-pseudonimiseren-wat-is-het-verschil-en-wat-is-het-belang-ervan/)
- [[Wikipedia] Pseudonimiseren](https://nl.wikipedia.org/wiki/Pseudonimiseren)

In sommige omstandigheden kan het wettelijk verplicht zijn om PII die is verzameld, verwerkt, of opgeslagen, te anonimiseren of te pseudonimiseren. Hoewel dit concept al geruime tijd bestaat, GDPR/DSGVO vermeldt, en moedigt specifiek "pseudonimisatie".

phpMussel kan IP-adressen pseudonimiseren wanneer ze worden geregistreerd, als dit iets is dat u misschien nodig heeft, of zou willen doen. Wanneer phpMussel IP-adressen pseudonimiseert, wanneer geregistreerd, het laatste octet van IPv4-adressen, en alles na het tweede deel van IPv6-adressen wordt weergegeven door een "x" (effectief afronding van IPv4-adressen naar het initiële adres van het 24e subnet waar ze in factoreren, en IPv6-adressen naar het initiële adres van het 32e subnet waar ze in factoreren).

*Relevante configuratie-opties:*
- `legal` -> `pseudonymise_ip_addresses`

##### 11.3.6 STATISTIEKEN

phpMussel is optioneel in staat om statistieken bij te houden, zoals het totale aantal gescande en geblokkeerde bestanden sinds een bepaald tijdstip. Deze functie is standaard uitgeschakeld, maar kan worden ingeschakeld via de pakketconfiguratie. Het type gevolgde informatie moet niet als PII worden beschouwd.

*Relevante configuratie-opties:*
- `general` -> `statistics`

##### 11.3.7 ENCRYPTIE

phpMussel codeert de cache of logboekinformatie niet. [Encryptie](https://nl.wikipedia.org/wiki/Encryptie) voor de cache en logs kunnen in de toekomst worden geïntroduceerd, maar er zijn momenteel geen specifieke plannen voor. Als u zich zorgen maakt over ongeautoriseerde derden die toegang krijgen tot delen van phpMussel die mogelijk PII of gevoelige informatie bevatten, zoals de cache of logbestanden, raad ik phpMussel aan niet te installeren op een openbare locatie (b.v., installeer phpMussel buiten de standaard `public_html` folder of gelijkwaardig daarvan beschikbaar voor de meeste standaard webservers) en dat de juiste beperkende machtigingen worden afgedwongen voor de folder waar deze zich bevindt. Als dat niet voldoende is om uw zorgen weg te nemen, configureer dan phpMussel als zodanig dat de soorten informatie die uw zorgen veroorzaken, niet zullen worden verzameld of ingelogd (zoals door loggen uit te schakelen).

#### 11.4 COOKIES

Wanneer een gebruiker zich met succes ingelogd bij de frontend, stelt phpMussel een [cookie](https://nl.wikipedia.org/wiki/Cookie_(internet)) in om de gebruiker te kunnen onthouden voor volgende aanvragen (d.w.z., cookies worden gebruikt om de gebruiker te authenticeren voor een login-sessie). Op de inlogpagina wordt een cookiewaarschuwing prominent weergegeven, waardoor de gebruiker wordt gewaarschuwd dat een cookie zal worden ingesteld als deze zich bezighoudt met de relevante actie. Cookies zijn niet ingesteld op andere punten in de codebase.

#### 11.5 MARKETING EN ADVERTEREN

phpMussel verzamelt of verwerkt geen informatie voor marketing of advertentie doeleinden, en verkoopt of profiteert niet van verzamelde of geregistreerde informatie. phpMussel is geen commerciële onderneming, en houdt geen verband met commerciële belangen, dus het zou geen zin hebben om deze dingen te doen. Dit is sinds het begin van het project het geval geweest, en is nog steeds het geval. Bovendien zou het doen van deze dingen contraproductief zijn ten opzichte van de geest en het beoogde doel van het project als geheel, en zolang ik het project blijf onderhouden, zal het nooit gebeuren.

#### 11.6 PRIVACYBELEID

In sommige omstandigheden kan het wettelijk verplicht zijn om duidelijk een link naar uw privacybeleid te tonen op alle pagina's en secties van uw website. Dit kan belangrijk zijn als middel om ervoor te zorgen dat gebruikers goed geïnformeerd zijn over uw exacte privacypraktijken, de soorten PII die u verzamelt, en hoe u van plan bent om het te gebruiken. Om een dergelijke link op de pagina "Upload Geweigerd" van phpMussel te kunnen opnemen, wordt een configuratie-optie verstrekt om de URL van uw privacybeleid op te geven.

*Relevante configuratie-opties:*
- `legal` -> `privacy_policy`

#### 11.7 GDPR/DSGVO/AVG

De Algemene Verordening Gegevensbescherming (AVG, of GDPR/DSGVO) is een verordening van de Europese Unie, die met ingang van 25 Mei 2018 in werking treedt. Het primaire doel van de verordening is om burgers en inwoners van de EU controle te geven over hun eigen persoonsgegevens, en om regelgeving binnen de EU te verenigen met betrekking tot privacy en persoonlijke gegevens.

De verordening bevat specifieke bepalingen met betrekking tot de verwerking van "[persoonsgegevens](https://nl.wikipedia.org/wiki/Persoonsgegevens)" (PII) van alle "betrokkenen" (elke geïdentificeerde of identificeerbare natuurlijke persoon) vanuit of binnen de EU. Om aan de regelgeving te voldoen, moeten "ondernemingen" (zoals bepaald door de verordening), en alle relevante systemen en processen moeten standaard "[privacy by design](https://autoriteitpersoonsgegevens.nl/nl/zelf-doen/privacycheck/privacy-design)" implementeren, moet de hoogst mogelijke privacy-instellingen gebruiken, moet de nodige waarborgen implementeren voor alle opgeslagen of verwerkte informatie (inclusief, maar niet beperkt tot, de implementatie van pseudonimisering of volledige anonimisering van gegevens), moet duidelijk en ondubbelzinnig verklaren welke soorten gegevens zij verzamelen, hoe zij deze verwerken, om welke redenen, hoe lang zij deze bewaren, en of zij deze gegevens delen met derden, de soorten gegevens die met derden worden gedeeld, hoe, waarom, enzovoort.

Gegevens worden mogelijk niet verwerkt tenzij er een wettelijke basis is om dit te doen, zoals bepaald door de verordening. In het algemeen betekent dit dat om de gegevens van een betrokkene op een wettige basis te verwerken, dit moet worden gedaan in overeenstemming met wettelijke verplichtingen, of alleen moet worden gedaan nadat de betrokkene expliciete, goed geïnformeerde, ondubbelzinnige toestemming heeft verkregen.

Omdat aspecten van de verordening in de loop van de tijd kunnen evolueren, om de verspreiding van verouderde informatie te voorkomen, is het wellicht beter om de verordening te leren van een gezaghebbende bron, in tegenstelling tot het simpelweg opnemen van de relevante informatie hier in de documentatie van het pakket (die uiteindelijk verouderd kan raken naarmate de regelgeving evolueert).

[EUR-Lex](https://eur-lex.europa.eu/) (een deel van de officiële website van de Europese Unie dat informatie biedt over EU-wetgeving) biedt uitgebreide informatie over GDPR/DSGVO/AVG, beschikbaar in 24 verschillende talen (op het moment dat dit wordt geschreven), en beschikbaar om te downloaden in PDF-formaat. Ik zou zeker aanraden om de informatie die ze bieden te lezen, om meer te leren over GDPR/DSGVO/AVG:
- [VERORDENING (EU) 2016/679 VAN HET EUROPEES PARLEMENT EN DE RAAD](https://eur-lex.europa.eu/legal-content/NL/TXT/?uri=celex:32016R0679)

Als alternatief is er een kort (niet-gezaghebbende) overzicht van GDPR/DSGVO/AVG beschikbaar op Wikipedia:
- [Algemene verordening gegevensbescherming](https://nl.wikipedia.org/wiki/Algemene_verordening_gegevensbescherming)

---


Laatste Bijgewerkt: 25 Januari 2021 (2021.01.25).
