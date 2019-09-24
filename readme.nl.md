## Documentatie voor phpMussel (Nederlandse).

### Inhoud
- 1. [PREAMBULE](#SECTION1)
- 2. [HOE TE INSTALLEREN](#SECTION2)
- 3. [HOE TE GEBRUIKEN](#SECTION3)
- 4. [FRONTEND MANAGEMENT](#SECTION4)
- 5. [CLI (COMMANDLIJN INTERFACE)](#SECTION5)
- 6. [BESTANDEN IN DIT PAKKET](#SECTION6)
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

Dit document en de bijbehorende pakket kunt gedownload gratis zijn van:
- [GitHub](https://github.com/phpMussel/phpMussel).
- [Bitbucket](https://bitbucket.org/Maikuolan/phpmussel).
- [SourceForge](https://sourceforge.net/projects/phpmussel/).

---


### 2. <a name="SECTION2"></a>HOE TE INSTALLEREN

#### 2.0 HANDMATIG INSTALLEREN (VOOR WEBSERVERS)

1) Omdat u zijn lezen dit, ik ben ervan uit u al gedownload een gearchiveerde kopie van het script, uitgepakt zijn inhoud en heeft het ergens op uw lokale computer. Vanaf hier, u nodig te bepalen waar op uw host of CMS die inhoud te plaatsen. Een bestandsmap zoals `/public_html/phpmussel/` of soortgelijk (hoewel, het is niet belangrijk welke u kiest, zolang het is iets veilig en iets waar u blij mee bent) zal volstaan. *Voordat u het uploaden begint, lees verder..*

2) Hernoemen `config.ini.RenameMe` naar `config.ini` (gelegen binnen `vault`), en facultatief (sterk aanbevolen voor ervaren gebruikers, maar niet aan te raden voor beginners of voor de onervaren), open het (dit bestand bevat alle beschikbare phpMussel configuratie opties; boven elke optie moet een korte opmerking te beschrijven wat het doet en wat het voor). Pas deze opties als het u past, volgens welke geschikt is voor uw configuratie. Sla het bestand, sluiten.

3) Upload de inhoud (phpMussel en zijn bestanden) naar het bestandsmap die u zou op eerder besloten (u nodig niet de `*.txt`/`*.md` bestanden opgenomen, maar meestal, u moeten uploaden alles).

4) CHMOD het `vault`-bestandsmap naar "755" (als er problemen, u kan proberen "777"; dit is minder veilig, hoewel). De belangrijkste bestandsmap opslaan van de inhoud (degene die u eerder koos), gewoonlijk, kunt worden genegeerd, maar CHMOD-status moet worden gecontroleerd als u machtigingen problemen heeft in het verleden met uw systeem (standaard, moet iets zijn als "755"). In het kort: Om het pakket goed te laten werken, PHP moet bestanden in de `vault`-bestandsmap kunnen lezen en schrijven. Veel dingen (updaten, loggen, enz) zullen niet mogelijk zijn, als PHP niet naar de `vault`-bestandsmap kan schrijven, en het pakket zal helemaal niet werken als PHP niet kan lezen vanuit de `vault`-bestandsmap. Voor de beste beveiliging echter de `vault`-bestandsmap mag NIET publiek toegankelijk zijn (gevoelige informatie, zoals de informatie in `config.ini` of `frontend.dat`, kan worden blootgesteld aan potentiële aanvallers als de `vault`-bestandsmap publiek toegankelijk is).

5) Installeer alle signatures die u nodig hebt. *Zien: [SIGNATURES INSTALLEREN](#INSTALLING_SIGNATURES).*

6) Volgende, u nodig om "haak" phpMussel om uw systeem of CMS. Er zijn verschillende manieren waarop u kunt "haak" scripts zoals phpMussel om uw systeem of CMS, maar het makkelijkste is om gewoon omvatten voor het script aan het begin van een kern bestand van uw systeem of CMS (een die het algemeen altijd zal worden geladen wanneer iemand heeft toegang tot een pagina in uw website) met behulp van een `require` of `include` opdracht. Meestal is dit wel iets worden opgeslagen in een bestandsmap zoals `/includes`, `/assets` of `/functions`, en zal vaak zijn vernoemd iets als `init.php`, `common_functions.php`, `functions.php` of soortgelijk. U nodig om te bepalen welk bestand dit is voor uw situatie; Als u problemen ondervindt bij het bepalen van dit voor uzelf, ga naar de phpMussel issues pagina op GitHub of de phpMussel support forums voor assistentie; Het is mogelijk dat ofwel mijzelf of een andere gebruiker kunt ervaring met de CMS die u gebruikt heeft (u nodig om ons te laten weten welk CMS u gebruikt), en dus, in staat zijn om wat hulp te bieden in dit gebied. Om dit te doen [te gebruiken `require` of `include`], plaatst u de volgende regel code aan het begin op die kern bestand, vervangen van de string die binnen de aanhalingstekens met het exacte adres van het `loader.php` bestand (lokaal adres, niet het HTTP-adres; zal vergelijkbaar zijn met de eerder genoemde vault adres).

`<?php require '/user_name/public_html/phpmussel/loader.php'; ?>`

Opslaan bestand, sluiten, heruploaden.

-- OF ALTERNATIEF --

Als u gebruik een Apache webserver en als u heeft toegang om `php.ini`, u kunt gebruiken de `auto_prepend_file` richtlijn naar prepend phpMussel wanneer een PHP verzoek wordt gemaakt. Zoiets als:

`auto_prepend_file = "/user_name/public_html/phpmussel/loader.php"`

Of dit in het `.htaccess` bestand:

`php_value auto_prepend_file "/user_name/public_html/phpmussel/loader.php"`

7) Op dit punt, u bent klaar! Echter, u moet waarschijnlijk test het uit om ervoor te zorgen dat het werken correct. Voor het testen van het bestand upload protecties, proberen om de testen bestanden te uploaden opgenomen in het pakket als `_testfiles` naar uw website via uw gebruikelijke browser-gebaseerde uploaden methoden. (Zorg ervoor dat u de `phpmussel*.*db` signatuurbestanden hebt opgenomen in de `active`-configuratierichtlijn om de testbestanden te activeren). Wanneer alles werkt, verschijnt er een bericht uit phpMussel bevestigen dat de upload met succes werd geblokkeerd. Wanneer er niets, is er iets niet correct werkt. Als u met behulp van een geavanceerde functies of als u met behulp van de andere types van het scannen mogelijk met het gereedschap, ik stel het uit te proberen met die ervoor zorgen dat het werkt zoals verwacht, ook.

#### 2.1 HANDMATIG INSTALLEREN (VOOR CLI)

1) Omdat u zijn lezen dit, ik ben ervan uit u al gedownload een gearchiveerde kopie van het script, uitgepakt zijn inhoud en heeft het ergens op uw lokale computer. Wanneer u heeft beslist dat u bent tevreden met de gekozen phpMussel locatie, voortzetten.

2) phpMussel vereist van PHP moet worden geïnstalleerd op de host machine om uit te werken correct. Als u niet heeft PHP geïnstalleerd op uw machine, installeer PHP op uw machine, volgende instructies door de PHP installateur geleverd.

3) Facultatief (sterk aanbevolen voor ervaren gebruikers, maar niet aan te raden voor beginners of voor de onervaren), open `config.ini` (gelegen binnen `vault`) – Dit bestand bevat alle beschikbare phpMussel configuratie opties. Boven elke optie moet een korte opmerking te beschrijven wat het doet en wat het voor. Wijzigen deze opties volgens welke geschikt is voor uw configuratie. Sla het bestand, sluiten.

4) Facultatief, u kunt om phpMussel in CLI-modus te maken makkelijker voor uzelf door het creëren van een batch-bestand te automatisch laden PHP en phpMussel. Om dit te doen, open een platte tekst editor zoals Notepad of Notepad++, typt u het volledige pad naar de `php.exe` bestand in het bestandsmap van uw PHP-installatie, gevolgd door een spatie, gevolgd door het volledige pad naar de `loader.php` bestand in het bestandsmap van uw phpMussel installatie, Sla het bestand op met een `.bat` extensie ergens dat u het gemakkelijk vinden, en dubbelklik op het bestand om phpMussel te opereren in de toekomst.

5) Installeer alle signatures die u nodig hebt. *Zien: [SIGNATURES INSTALLEREN](#INSTALLING_SIGNATURES).*

6) Op dit punt, u bent klaar! Echter, u moet waarschijnlijk test het uit om ervoor te zorgen dat het werken correct. Om phpMussel testen, draaien phpMussel en probeer het scannen van de `_testfiles` bestandsmap die bij het pakket.

#### 2.2 INSTALLEREN MET COMPOSER

[phpMussel is geregistreerd bij Packagist](https://packagist.org/packages/phpmussel/phpmussel), en dus, als u bekend bent met Composer, kunt u Composer gebruiken om phpMussel installeren (u zult nog steeds nodig om de configuratie, rechten, signatures en haken te bereiden niettemin; zie "handmatig installeren (voor webservers)" stappen 2, 4, 5, en 6).

`composer require phpmussel/phpmussel`

#### <a name="INSTALLING_SIGNATURES"></a>2.3 SIGNATURES INSTALLEREN

Sinds v1.0.0, signatures zijn niet opgenomen in het phpMussel-pakket. Signatures zijn vereist door phpMussel voor het opsporen van specifieke bedreigingen. Er zijn 3 hoofdmethoden om signatures te installeren:

1. Installeer automatisch met de frontend updates pagina.
2. Genereer signatures met behulp van "SigTool" en installeer handmatig.
3. Download signatures van "phpMussel/Signatures" en installeer handmatig.

##### 2.3.1 Installeer automatisch met de frontend updates pagina.

Allereerst, moet u ervoor zorgen dat het frontend is ingeschakeld. *Zien: [frontend MANAGEMENT](#SECTION4).*

Dan, alles wat u moet doen is ga naar de frontend updates pagina, vind de nodige signatuurbestanden, en gebruik de opties die op de pagina zijn aangebracht, installeer ze en activeer ze.

##### 2.3.2 Genereer signatures met behulp van "SigTool" en installeer handmatig.

*Zien: [SigTool documentatie](https://github.com/phpMussel/SigTool#documentation).*

##### 2.3.3 Download signatures van "phpMussel/Signatures" en installeer handmatig.

Allereerst, ga naar [phpMussel/Signatures](https://github.com/phpMussel/Signatures). De repository bevat verschillende GZ-gecomprimeerde signatuurbestanden. Download de bestanden die u nodig hebt, decomprimeer ze en kopieer de gedecomprimeerde bestanden naar de `/vault/signatures` map om ze te installeren. Geef de namen van de gekopieerde bestanden op in de `active` richtlijn in uw phpMussel-configuratie om ze te activeren.

---


### 3. <a name="SECTION3"></a>HOE TE GEBRUIKEN

#### 3.0 HOE TE GEBRUIKEN (VOOR WEBSERVERS)

phpMussel moet in staat zijn om correct te werken met minimale eisen van uw kant: Na de installatie, het moeten onmiddellijk aan het werk en zijn onmiddellijk bruikbare.

Het scannen van het bestanden uploaden is geautomatiseerd en ingeschakeld door standaard, zo niets is vereist op namens u voor deze specifieke functie.

Echter, u bent ook in staat om te instrueren phpMussel om te scannen specifiek bestanden, bestandsmappen en/of archieven. Om dit te doen, ten eerste, moet u ervoor zorgen dat de juiste configuratie is ingesteld in het `config.ini` configuratiebestand (`cleanup` moet worden uitgeschakeld), en als u klaar bent, in een PHP-bestand dat wordt gehaakt op phpMussel, gebruik de volgende functie in uw code:

`$phpMussel['Scan']($what_to_scan, $output_type, $output_flatness);`

- `$what_to_scan` kunt worden een string, een array, of een array van arrays, en vermelding welk bestand, bestanden, bestandsmap en/of bestandsmappen om scannen.
- `$output_type` is een boolean, met vermelding van het formaat voor de scanresultaten te worden geretourneerd als. `false` instrueert de functie om de resultaten als een integer retourneer. `true` instrueert de functie om de resultaten als leesbare tekst retourneer. Bovendien, in elk geval, de resultaten kunnen worden geraadpleegd via globale variabelen na het scannen is voltooid. Deze variabele is optioneel, voorgedefinieerd als `false`. Deze integer resultaten worden hieronder beschreven:

| Resultaten | Beschrijving |
|---|---|
| -4 | Betekent dat de data niet konden worden gescand vanwege encryptie. |
| -3 | Betekent problemen werden aangetroffen met de phpMussel signatuurbestanden. |
| -2 | Betekent dat beschadigd gegevens tijdens de scan werd ontdekt en dus de scan niet voltooid. |
| -1 | Betekent dat uitbreidingen of addons vereist door PHP om de scan te voeren werd ontbraken zijn en dus de scan niet voltooid. |
| 0 | Betekent dat het scandoel bestaat niet en dus was er niets te scannen. |
| 1 | Betekent dat het doel met succes werden gescand en geen problemen gedetecteerd. |
| 2 | Betekent dat het doel met succes werd gescand en problemen werden gedetecteerd. |

- `$output_flatness` is een boolean, vermelding van de functie of de resultaten van de scan retourneren (wanneer er meerdere scandoelen) als een array of een string. `false` zullen de resultaten als een array retourneer. `true` zullen de resultaten als een string retourneer. Deze variabele is optioneel, voorgedefinieerd als `false`.

Voorbeeld:

```PHP
 $results = $phpMussel['Scan']('/user_name/public_html/my_file.html', true, true);
 echo $results;
```

Retourneren iets als dit (als een string):

```
 Wed, 16 Sep 2013 02:49:46 +0000 Gestart.
 > Verifiëren '/user_name/public_html/my_file.html':
 -> Geen problemen gevonden.
 Wed, 16 Sep 2013 02:49:47 +0000 Afgewerkt.
```

Voor een volledige beschrijving van de soorten van de signatures gebruikt door phpMussel tijdens de scans en hoe het omgaat met deze signatures, raadpleeg de [SIGNATURE FORMAAT](#SECTION8) sectie van dit README bestand.

Als u tegenkomen valse positieven, als u iets nieuws tegenkomen waarvan u denkt dat zou moeten geblokkeerd worden, of voor iets anders met betrekking tot signatures, neem dan contact met mij over het zo dat ik de noodzakelijke veranderingen kunnen maken, die, als u niet contact met mij over, ik zou niet per se bewust van. *(Zien: [Wat is een "vals positieve"?](#WHAT_IS_A_FALSE_POSITIVE)).*

Voor uitschakelen om de signatures die bij phpMussel (zoals als u het ervaren van een vals positief specifiek voor uw doeleinden dat mag niet normaal van stroomlijn worden verwijderd), voeg de namen van de specifieke signatures die moet worden uitgeschakeld toe aan het greylist-bestand (`/vault/greylist.csv`), gescheiden door komma's.

*Zie ook: [Hoe krijgt u toegang tot specifieke gegevens over bestanden als ze worden gescand?](#SCAN_DEBUGGING)*

#### 3.1 HOE TE GEBRUIKEN (VOOR CLI)

Raadpleeg de "HANDMATIG INSTALLEREN (VOOR CLI)" sectie van dit README bestand.

Eveneens, noteren dat phpMussel is een *on-demand* scanner; Het is *GEEN* *on-access* scanner (anders dan voor het uploaden van bestanden, bij de tijd van de upload), en in tegenstelling tot conventionele anti-virus suites, het maakt niet actief geheugen controleren! Het zal alleen virussen te detecteren, in de bestand uploaden en in specifieke bestanden dat u expliciet zeggen dat het te scannen.

---


### 4. <a name="SECTION4"></a>FRONTEND MANAGEMENT

#### 4.0 WAT IS DE FRONTEND.

De frontend biedt een gemakkelijke en eenvoudige manier te onderhouden, beheren en updaten van uw phpMussel installatie. U kunt bekijken, delen en downloaden log bestanden via de pagina logs, u kunt de configuratie wijzigen via de configuratiepagina, u kunt installeren en verwijderen/desinstalleren van componenten via de pagina updates, en u kunt uploaden, downloaden en wijzigen bestanden in uw vault via de bestandsbeheer.

De frontend is standaard uitgeschakeld om ongeautoriseerde toegang te voorkomen (ongeautoriseerde toegang kan belangrijke gevolgen hebben voor uw website en de beveiliging hebben). Instructies voor het inschakelen van deze zijn hieronder deze paragraaf opgenomen.

#### 4.1 HOE DE FRONTEND TE INSCHAKELEN.

1) Vind de `disable_frontend` richtlijn in `config.ini`, en stel dat het `false` (deze is `true` door standaard).

2) Toegang tot `loader.php` vanuit uw browser (b.v., `http://localhost/phpmussel/loader.php`).

3) Inloggen u aan met de standaard gebruikersnaam en wachtwoord (admin/password).

Notitie: Nadat u hebt ingelogd voor de eerste keer, om ongeautoriseerde toegang tot de frontend te voorkomen, moet u onmiddellijk veranderen uw gebruikersnaam en wachtwoord! Dit is zeer belangrijk, want het is mogelijk om willekeurige PHP-code te uploaden naar uw website via de frontend.

Voor optimale beveiliging wordt het ten zeerste aanbevolen om "twee-factor authenticatie" voor alle frontend accounts in te schakelen (onderstaande instructies).

#### 4.2 HOE DE FRONTEND GEBRUIKEN.

Instructies worden op elke pagina van de frontend, om uit te leggen hoe het te gebruiken en het beoogde doel. Als u meer uitleg of een speciale hulp nodig hebben, neem dan contact op met ondersteuning. Als alternatief, zijn er een aantal video's op YouTube die zouden kunnen helpen door middel van een demonstratie.

#### 4.3 TWEE-FACTOR AUTHENTICATIE

Het is mogelijk om de frontend veiliger te maken door twee-factor authenticatie ("2FA") in te schakelen. Bij inloggen met een account waarvoor 2FA is ingeschakeld, een e-mail wordt verzonden naar het e-mailadres dat aan dat account is gekoppeld. Deze e-mail bevat een "2FA-code", die de gebruiker vervolgens moet invoeren, in aanvulling op de gebruikersnaam en het wachtwoord, om te kunnen inloggen met dat account. Dit betekent dat het verkrijgen van een accountwachtwoord niet genoeg is voor een hacker of potentiële aanvaller om zich bij dat account te kunnen aanmelden, omdat ze ook al toegang moeten hebben tot het e-mailadres dat aan dat account is gekoppeld om de 2FA-code die aan de sessie is gekoppeld te kunnen ontvangen en gebruiken, daarmee het frontend veiliger maken.

Ten eerste, om twee-factor authenticatie in te schakelen, gebruikt u de frontend-updates-pagina om de PHPMailer-component te installeren. phpMussel gebruikt PHPMailer voor het verzenden van e-mails. Notitie: Hoewel phpMussel op zichzelf compatibel met >= 5.4.0 is, PHPMailer heeft nodig PHP >= 5.5.0, daarom is twee-factor authenticatie voor de frontend van phpMussel niet mogelijk voor PHP 5.4-gebruikers.

Nadat u PHPMailer heeft geïnstalleerd, moet u de configuratie-richtlijnen voor PHPMailer invullen via de configuratiepagina of het configuratiebestand van phpMussel. Meer informatie over deze configuratie-richtlijnen is opgenomen in de configuratiesectie van dit document. Nadat u de PHPMailer-configuratie-richtlijnen hebt ingevuld, stelt u `enable_two_factor` in op `true`. Twee-factor authenticatie moet nu worden ingeschakeld.

Volgende, u moet een e-mailadres koppelen aan een account, zodat phpMussel weet waar 2FA-codes moeten worden verzonden wanneer hij zich aanmeldt met dat account. Om dit te doen, gebruik het e-mailadres als de gebruikersnaam voor het account (b.v., `foo@bar.tld`), of neem het e-mailadres op als onderdeel van de gebruikersnaam op dezelfde manier als bij het normaal verzenden van een e-mail (b.v., `Foo Bar <foo@bar.tld>`).

Notitie: Het beschermen van uw vault tegen ongeautoriseerde toegang (b.v., door de beveiliging van uw server en openbare toegangsrechten te verbeteren), is hier bijzonder belangrijk, vanwege deze ongeautoriseerde toegang tot uw configuratiebestand (dat is opgeslagen in uw vault), kan het risico lopen dat uw uitgaande SMTP-instellingen (inclusief SMTP gebruikersnaam en wachtwoord) worden weergegeven. U moet ervoor zorgen dat uw vault correct is beveiligd voordat u twee-factor authenticatie inschakelt. Als u dit niet kunt doen, moet u op z'n minst een nieuw e-mailaccount maken, speciaal voor dit doel, om de risico's van blootgestelde SMTP-instellingen te verminderen.

---


### 5. <a name="SECTION5"></a>CLI (COMMANDLIJN INTERFACE)

phpMussel kan worden uitgevoerd als een interactief bestand scanner in de CLI-modus onder Windows-gebaseerde systemen. Raadpleeg de sectie "HOE TE INSTALLEREN (VOOR CLI)" van deze README bestand voor meer informatie.

Voor een lijst van beschikbare CLI commando's, bij de CLI-prompt, typ 'c', en druk op Enter.

Daarnaast, voor diegenen die geïnteresseerd, een video-tutorial voor hoe te gebruiken phpMussel in de CLI-modus is hier beschikbaar:
- <https://youtu.be/H-Pa740-utc>

---


### 6. <a name="SECTION6"></a>BESTANDEN IN DIT PAKKET

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


### 7. <a name="SECTION7"></a>CONFIGURATIE-OPTIES

Het volgende is een lijst van variabelen die in de `config.ini` configuratiebestand van phpMussel, samen met een beschrijving van hun doel en functie.

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

#### "general" (Categorie)
Algemene configuratie voor phpMussel.

##### "cleanup"
- Vrijmaken script variabelen en de cache na de uitvoering? False = Nee; True = Ja [Standaard]. Als u het script voor niets anders gebruikt dan het scannen van uploads, moet u dit zetten op `true` om geheugengebruik te minimaliseren. Anders moet u dit zetten op `false`, om de gegevens die nodig zijn om phpMussel uit te voeren in het geheugen te bewaren zonder deze onnodig opnieuw te laden. Heeft geen invloed in CLI-modus.
- Heeft geen invloed in CLI-modus.

##### "scan_log"
- Bestandsnaam van het bestand te opnemen alle scanresultaten. Geef een bestandsnaam of laat leeg om te uitschakelen.

##### "scan_log_serialized"
- Bestandsnaam van het bestand te opnemen alle scanresultaten (formaat is geserialiseerd). Geef een bestandsnaam of laat leeg om te uitschakelen.

##### "scan_kills"
- Bestandsnaam van het bestand te opnemen alle geblokkeerde of gedood upload. Geef een bestandsnaam of laat leeg om te uitschakelen.

*Handige tip: Als u wil, U kunt datum/tijd informatie toevoegen om de namen van uw logbestanden door deze op in naam inclusief: `{yyyy}` voor volledige jaar, `{yy}` voor verkorte jaar, `{mm}` voor maand, `{dd}` voor dag, `{hh}` voor het uur.*

*Voorbeelden:*
- *`scan_log='scan_log.{yyyy}-{mm}-{dd}-{hh}.txt'`*
- *`scan_log_serialized='scan_log_serialized.{yyyy}-{mm}-{dd}-{hh}.txt'`*
- *`scan_kills='scan_kills.{yyyy}-{mm}-{dd}-{hh}.txt'`*

##### "error_log"
- Een bestand voor het vastleggen van gedetecteerde niet-fatale fouten. Geef een bestandsnaam, of laat leeg om uit te schakelen.

##### "truncate"
- Trunceren logbestanden wanneer ze een bepaalde grootte bereiken? Waarde is de maximale grootte in B/KB/MB/GB/TB dat een logbestand kan groeien tot voordat het wordt getrunceerd. De standaardwaarde van 0KB schakelt truncatie uit (logbestanden kunnen onbepaald groeien). Notitie: Van toepassing op individuele logbestanden! De grootte van de logbestanden wordt niet collectief beschouwd.

##### "log_rotation_limit"
- Logrotatie beperkt het aantal logbestanden dat op elk moment zou moeten bestaan. Wanneer nieuwe logbestanden worden gemaakt en het totale aantal logbestanden de opgegeven limiet overschrijdt, wordt de opgegeven actie uitgevoerd. U kunt hier de gewenste limiet opgeven. Een waarde van 0 zal logrotatie uitschakelen.

##### "log_rotation_action"
- Logrotatie beperkt het aantal logbestanden dat op elk moment zou moeten bestaan. Wanneer nieuwe logbestanden worden gemaakt en het totale aantal logbestanden de opgegeven limiet overschrijdt, wordt de opgegeven actie uitgevoerd. U kunt hier de gewenste actie opgeven. Delete = Verwijder de oudste logbestanden, totdat de limiet niet langer wordt overschreden. Archive = Eerst archiveer en verwijder vervolgens de oudste logbestanden, totdat de limiet niet langer wordt overschreden.

*Technische verduidelijking: In deze context, de "oudste" betekent de minste recentelijk gewijzigd.*

##### "timezone"
- Dit wordt gebruikt om op te geven welke tijdzone phpMussel moet gebruiken voor de datum/tijd-bewerkingen. Als je het niet nodig hebt, negeer het. Mogelijke waarden worden bepaald door PHP. Het is in het algemeen in plaats aanbevolen de tijdzone richtlijn in uw bestand `php.ini` aan te passen, maar somtijds (zoals bij het werken met beperkte shared hosting providers) dit is niet altijd mogelijk om te voldoen, en dus, Dit optie is hier voorzien.

##### "time_offset"
- *v1: "timeOffset"*
- Als uw server tijd niet overeenkomt met uw lokale tijd, u kunt opgeven hier een offset om de datum/tijd informatie gegenereerd door phpMussel aan te passen volgens uw behoeften. Het is in het algemeen in plaats aanbevolen de tijdzone richtlijn in uw bestand `php.ini` aan te passen, maar somtijds (zoals bij het werken met beperkte shared hosting providers) dit is niet altijd mogelijk om te voldoen, en dus, Dit optie is hier voorzien. Offset is in een minuten.
- Voorbeeld (een uur toe te voegen): `time_offset=60`

##### "time_format"
- *v1: "timeFormat"*
- De datum notatie gebruikt door phpMussel. Standaard = `{Day}, {dd} {Mon} {yyyy} {hh}:{ii}:{ss} {tz}`.

##### "ipaddr"
- Waar het IP-adres van het aansluiten verzoek te vinden? (Handig voor diensten zoals Cloudflare en dergelijke) Standaard = REMOTE_ADDR. WAARSCHUWING: Verander dit niet tenzij u weet wat u doet!

Aanbevolen waarden voor "ipaddr":

Waarde | Gebruik makend van
---|---
`HTTP_INCAP_CLIENT_IP` | Incapsula reverse proxy.
`HTTP_CF_CONNECTING_IP` | Cloudflare reverse proxy.
`CF-Connecting-IP` | Cloudflare reverse proxy (alternatief; als bovenstaande niet werkt).
`HTTP_X_FORWARDED_FOR` | Cloudbric reverse proxy.
`X-Forwarded-For` | [Squid reverse proxy](http://www.squid-cache.org/Doc/config/forwarded_for/).
*Definieerd door de server configuratie.* | [Nginx reverse proxy](https://www.nginx.com/resources/admin-guide/reverse-proxy/).
`REMOTE_ADDR` | Geen reverse proxy (standaardwaarde).

##### "enable_plugins"
- Activeer ondersteuning voor phpMussel plugins? False = Nee; True = Ja [Standaard].

##### "forbid_on_block"
- Moet phpMussel reageren met 403 headers met het bestanden upload geblokkeerd bericht, of blijven met de gebruikelijke 200 OK? False = Nee (200); True = Ja (403) [Standaard].

##### "delete_on_sight"
- Het inschakelen van dit richtlijn zal instrueren het script om elke gescande geprobeerd bestand upload dat gecontroleerd tegen elke detectie criteria te proberen onmiddellijk verwijderen, via signatures of anderszins. Bestanden vastbesloten te zijn schoon zal niet worden aangeraakt. In het geval van archieven, het hele archief wordt verwijderd, ongeacht of niet het overtredende bestand is slechts één van meerdere bestanden vervat in het archief. Voor het geval van bestand upload scannen, doorgaans, het is niet nodig om dit richtlijn te inschakelen, omdat doorgaans, PHP zal automatisch zuiveren de inhoud van zijn cache wanneer de uitvoering is voltooid, wat betekent dat het doorgans zal verwijdert ieder bestanden geüpload doorheen aan de server tenzij ze zijn verhuisd, gekopieerd of verwijderd alreeds. Dit richtlijn is toegevoegd hier als een extra maatregel van veiligheid voor degenen wier kopies van PHP misschien niet altijd gedragen op de manier verwacht. False = Na het scannen, met rust laten het bestand [Standaard]; True = Na het scannen, als niet schoon, onmiddellijk verwijderen.

##### "lang"
- Geef de standaardtaal voor phpMussel.

##### "lang_override"
- Waar mogelijk lokaliseren volgens HTTP_ACCEPT_LANGUAGE? True = Ja [Standaard]; False = Nee.

##### "numbers"
- Specificeert hoe u nummers wilt weergeven.

Momenteel ondersteunde waarden:

Waarde | Produceert | Beschrijving
---|---|---
`NoSep-1` | `1234567.89`
`NoSep-2` | `1234567,89`
`Latin-1` | `1,234,567.89` | Standaardwaarde.
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

*Notitie: Deze waarden zijn nergens gestandaardiseerd, en zullen waarschijnlijk niet relevant zijn buiten het pakket. Ook kunnen ondersteunde waarden in de toekomst veranderen.*

##### "quarantine_key"
- phpMussel is in staat om gevlagd geprobeerd bestandsuploads te quarantaine in isolatie binnen de phpMussel vault, als dit is iets wat u wilt doen. Regelmatige gebruikers van phpMussel dat gewoon willen om hun websites of hosting-omgeving te beschermen zonder enige interesse in diep analyseren van gevlagd geprobeerd bestandsuploads moet dit functionaliteit hebben uitgeschakeld, maar elke gebruikers geïnteresseerd in de verdere analyse van gevlagd geprobeerd bestandsuploads voor malware onderzoek of voor soortgelijke zaken moeten inschakelen dit functionaliteit. Quarantaine van gevlagd geprobeerd bestandsuploads kunt ook somtijds helpen bij het opsporen van vals-positieven, als dit is iets dat vaak voorkomt voor u. Voor de uitschakelen van quarantaine functionaliteit, gewoon laat de `quarantine_key` richtlijn leeg, of wissen de inhoud van de richtlijn als het niet leeg alreeds. Voor de inschakelen van quarantaine functionaliteit, invoeren soms waarde in de richtlijn. De `quarantine_key` is een belangrijke beveiliging kenmerk van de quarantaine functionaliteit vereist als middel om de functionaliteit quarantaine te verhinderen exploitatie door potentiële aanvallers en als middel om verhinderen van elke mogelijke gegevens uitvoering van gegevens opgeslagen in de quarantaine. De `quarantine_key` moeten op dezelfde manier als uw wachtwoorden worden behandeld: De langer de beter, en bewaken het goed. Voor het beste gevolg, gebruik in combinatie met `delete_on_sight`.

##### "quarantine_max_filesize"
- De maximaal toegestane bestandsgrootte van bestanden te worden in quarantaine plaatsen. Bestanden groter dan de opgegeven waarde zal NIET in quarantaine plaatsen. Dit richtlijn is belangrijk als een middel van maak het moeilijker voor potentiële aanvallers te overspoelen uw quarantaine met ongewenste gegevens potentieel veroorzaakt weggelopen gebruiksgegevens op uw hosting service. Standaard = 2MB.

##### "quarantine_max_usage"
- De maximale geheugengebruik toegestaan voor de quarantaine. Als de totale geheugengebruik van de quarantaine bereikt dit waarde, de oudste bestanden in quarantaine zullen worden verwijderd totdat het totale geheugengebruik niet meer bereikt dit waarde. Dit richtlijn is belangrijk als een middel van maak het moeilijker voor potentiële aanvallers te overspoelen uw quarantaine met ongewenste gegevens potentieel veroorzaakt weggelopen gebruiksgegevens op uw hosting service. Standaard = 64MB.

##### "quarantine_max_files"
- Het maximale aantal bestanden dat in de quarantaine kan bestaan. Wanneer nieuwe bestanden aan de quarantaine worden toegevoegd, worden oude bestanden, als dit aantal wordt overschreden, verwijderd totdat de rest dit aantal niet overschrijdt. Standaard = 100.

##### "honeypot_mode"
- Wanneer honeypot-modus is ingeschakeld, phpMussel zal proberen om ieder bestandsupload dat het tegenkomt in quarantaine plaatsen, ongeacht of niet het bestand wordt geüpload is gecontroleerd tegen een meegeleverde signatures, en geen daadwerkelijke scannen of analyse van deze gevlagd geprobeerd bestandsuploads zal daadwerkelijk opgebeurt. Dit functionaliteit moet nuttig zijn voor degenen dat willen gebruik phpMussel voor de toepassing van virus/malware onderzoek, maar het is niet aanbevolen om dit functionaliteit te inschakelen wanneer het beoogde gebruik van phpMussel door de gebruiker is voor werkelijke bestandsupload scannen, noch aanbevolen te gebruik de honeypot functionaliteit voor andere doeleinden andere dan honeypotting. Als standaard, dit optie is uitgeschakeld. False = Uitgeschakeld [Standaard]; True = Ingeschakeld.

##### "scan_cache_expiry"
- Hoe lang moeten phpMussel cache de resultaten van de scan? Waarde is het aantal seconden dat de resultaten van het scannen moet wordt gecached voor. Standaard is 21600 seconden (6 uur); Een waarde van 0 zal uitschakelen caching de resultaten van de scan.

##### "disable_cli"
- Uitschakelen CLI-modus? CLI-modus is standaard ingeschakeld, maar kunt somtijds interfereren met bepaalde testtools (zoals PHPUnit bijvoorbeeld) en andere CLI-gebaseerde applicaties. Als u niet hoeft te uitschakelen CLI-modus, u moeten om dit richtlijn te negeren. False = Inschakelen CLI-modus [Standaard]; True = Uitschakelen CLI-modus.

##### "disable_frontend"
- Uitschakelen frontend toegang? Frontend toegang kan phpMussel beter beheersbaar te maken, maar kan ook een potentieel gevaar voor de veiligheid zijn. Het is aan te raden om phpMussel te beheren via het backend wanneer mogelijk, maar frontend toegang is hier voorzien voor wanneer het niet mogelijk is. Hebben het uitgeschakeld tenzij u het nodig hebt. False = Inschakelen frontend toegang; True = Uitschakelen frontend toegang [Standaard].

##### "max_login_attempts"
- Maximum aantal frontend-inlogpogingen. Standaard = 5.

##### "frontend_log"
- *v1: "FrontEndLog"*
- Bestand om de frontend login pogingen te loggen. Geef een bestandsnaam, of laat leeg om uit te schakelen.

##### "disable_webfonts"
- Uitschakelen webfonts? True = Ja [Standaard]; False = Nee.

##### "maintenance_mode"
- Inschakelen de onderhoudsmodus? True = Ja; False = Nee [Standaard]. Schakelt alles anders dan het frontend uit. Soms nuttig bij het bijwerken van uw CMS, frameworks, enz.

##### "default_algo"
- Definieert welk algoritme u wilt gebruiken voor alle toekomstige wachtwoorden en sessies. Opties: PASSWORD_DEFAULT (standaard), PASSWORD_BCRYPT, PASSWORD_ARGON2I (vereist PHP >= 7.2.0).

##### "statistics"
- Track phpMussel gebruiksstatistieken? True = Ja; False = Nee [Standaard].

##### "disabled_channels"
- Dit kan worden gebruikt om te voorkomen dat phpMussel bepaalde kanalen gebruikt bij het verzenden van verzoeken (b.v., bij het bijwerken, bij het ophalen van metagegevens van componenten, enzovoort).

#### "signatures" (Categorie)
Configuratie voor signatures.

##### "active"
- *v1: "Active"*
- Een lijst van de actief signatuurbestanden, gescheiden door komma's.

*Notitie:*
- *Signatuurbestanden moeten eerst worden geïnstalleerd voordat u ze kunt activeren.*
- *Om de testbestanden correct te laten werken, moeten de signatuurbestanden worden geïnstalleerd en geactiveerd.*
- *De waarde van deze richtlijn is in de cache opgeslagen. Na het wijzigingen, om enig effect te hebben, moet u mogelijk de cache verwijderen.*

##### "fail_silently"
- Moet phpMussel rapporteren wanneer signatuurbestanden zijn ontbrekend of beschadigd? Als `fail_silently` is uitgeschakeld, ontbrekende en beschadigde bestanden zal worden gerapporteerd op het scannen, en als `fail_silently` is ingeschakeld, ontbrekende en beschadigde bestanden zal zijn genegeerd, met het scannen rapporten voor het bestanden die er geen problemen. Dit moet in het algemeen met rust gelaten worden tenzij u ervaart mislukt of soortgelijke problemen. False = Uitgeschakeld; True = Ingeschakeld [Standaard].

##### "fail_extensions_silently"
- Moet phpMussel rapporteren wanneer extensies zijn ontbreken? Als `fail_extensions_silently` is uitgeschakeld, ontbrekende extensies zal worden gerapporteerd op het scannen, en als `fail_extensions_silently` is ingeschakeld, ontbrekende extensies zal zijn genegeerd, met het scannen rapporten voor het bestanden die er geen problemen. Het uitschakelen van dit richtlijn kunt mogelijk verhogen van uw veiligheid, maar kunt ook leiden tot een toename van valse positieven. False = Uitgeschakeld; True = Ingeschakeld [Standaard].

##### "detect_adware"
- Moet phpMussel verwerken signatures voor het detecteren van adware? False = Nee; True = Ja [Standaard].

##### "detect_joke_hoax"
- Moet phpMussel verwerken signatures voor het detecteren van grap/beetnemerij malware/virussen? False = Nee; True = Ja [Standaard].

##### "detect_pua_pup"
- Moet phpMussel verwerken signatures voor het detecteren van PUAs/PUPs? False = Nee; True = Ja [Standaard].

##### "detect_packer_packed"
- Moet phpMussel verwerken signatures voor het detecteren van verpakkers en verpakt gegevens? False = Nee; True = Ja [Standaard].

##### "detect_shell"
- Moet phpMussel verwerken signatures voor het detecteren van shell scripts? False = Nee; True = Ja [Standaard].

##### "detect_deface"
- Moet phpMussel verwerken signatures voor het detecteren van schendingen/defacements en schenders/defacers? False = Nee; True = Ja [Standaard].

##### "detect_encryption"
- Moet phpMussel gecodeerde bestanden detecteren en blokkeren? False = Nee; True = Ja [Standaard].

#### "files" (Categorie)
Bestand hanteren configuratie.

##### "max_uploads"
- Maximaal toegestane aantal bestanden te scannen tijdens bestandsupload scan voordat aborteren de scan en informeren de gebruiker ze zijn uploaden van te veel in een keer! Biedt bescherming tegen een theoretische aanval waardoor een aanvaller probeert te DDoS uw systeem of CMS door overbelasting phpMussel te vertragen het PHP proces tot stilstand. Aanbevolen: 10. U zou kunnen wil te verhogen of verlagen dit nummer afhankelijk van de snelheid van uw hardware. Noteren dat dit aantal niet verklaren voor of opnemen de inhoud van de archieven.

##### "filesize_limit"
- Bestandsgrootte limiet in KB. 65536 = 64MB [Standaard]; 0 = Geen limiet (altijd op de greylist), ieder (positief) numerieke waarde aanvaard. Dit kunt handig zijn als uw PHP configuratie beperkt de hoeveelheid van geheugen een proces kunt houden of als u PHP configuratie beperkt het bestandsgrootte van uploads.

##### "filesize_response"
- Wat te doen met bestanden dat overschrijden het bestandsgrootte limiet (als aanwezig). False = Whitelist; True = Blacklist [Standaard].

##### "filetype_whitelist", "filetype_blacklist", "filetype_greylist"
- Als uw systeem vergunningen alleen specifieke bestandstypen te uploaden, of als uw systeem expliciet ontkent bepaalde bestandstypen, specificeren deze bestandstypen in whitelists, blacklists en greylists kunt toenemen de snelheid waarin scannen is uitgevoerd via vergunningen het script te negeren bepaalde bestandstypen. Formaat is CSV (komma's gescheiden waarden). Als u wilt te scannen alles, eerder dan whitelist, blacklist of greylist, laat de variabele(/n) leeg; doen zo zal uitschakelen whitelist/blacklist/greylist.
- Logische volgorde van de verwerking is:
  - Als het bestandstype is op de whitelist, niet scannen en niet blokkeren het bestand, en niet controleer het bestand tegen de blacklist of de greylist.
  - Als het bestandstype is op de blacklist, niet scannen het bestand maar blokkeren het niettemin, en niet controleer het bestand tegen de greylist.
  - Als de greylist is leeg of als de greylist is niet leeg en het bestandstype is op de greylist, scannen het bestand als per normaal en bepalen als om het gebaseerd op de resultaten van de scan te blokkeren, maar als de greylist is niet leeg en het bestandstype is niet op de greylist, behandel het bestand alsof op de blacklist, dus om het niet te scannen, maar toch blokkeren het niettemin.

##### "check_archives"
- Om de inhoud van archieven proberen te controleer? False = Nee (niet doen controleer); True = Ja (doen controleer) [Standaard].

Formaat | Kan lezen | Kan recursief lezen | Kan encryptie detecteren | Notities
---|---|---|---|---
Zip | ✔️ | ✔️ | ✔️ | Vereist [libzip](https://secure.php.net/manual/en/zip.requirements.php) (normaal is het gebundeld met PHP). Wordt ook ondersteund (gebruikt het zip-formaat): ✔️ OLE-object detectie. ✔️ Office macro detectie.
Tar | ✔️ | ✔️ | ➖ | Geen speciale vereisten. Formaat ondersteunt geen encryptie.
Rar | ✔️ | ✔️ | ✔️ | Vereist de [rar](https://pecl.php.net/package/rar)-extensie (wanneer deze extensie niet is geïnstalleerd, kan phpMussel geen rar-bestanden lezen).
Phar | ❌ | ❌ | ❌ | Ondersteuning voor het lezen van phar-bestanden is verwijderd in v1.6.0, en zal vanwege bezorgdheid over de veiligheid niet opnieuw worden toegevoegd.

*Als iemand in staat en bereid is te helpen bij het implementeren van ondersteuning voor het lezen van andere archiefformaten, zou dergelijke hulp welkom zijn.*

##### "filesize_archives"
- Erven het bestandsgrootte blacklist/whitelist staat om de inhoud van archieven? False = Nee (gewoon greylist alles); True = Ja [Standaard].

##### "filetype_archives"
- Erven het bestandstype blacklist/whitelist staat om de inhoud van archieven? False = Nee (gewoon greylist alles) [Standaard]; True = Ja.

##### "max_recursion"
- Maximale recursiediepte limiet voor archieven. Standaard = 3.

##### "block_encrypted_archives"
- Detecteren en blokkeren gecodeerde archieven? Omdat phpMussel is niet in staat te scannen de inhoud van gecodeerde archieven, het is mogelijk dat archief encryptie kan worden toegepast door een aanvaller als middel van probeert te omzeilen phpMussel, anti-virus scanners en andere dergelijke beveiligingen. Instrueren phpMussel te blokkeren elke archieven dat het ontdekt worden gecodeerde zou kunnen helpen het risico in verband met deze dergelijke mogelijkheden te verminderen. False = Nee; True = Ja [Standaard].

##### "max_files_in_archives"
- Maximumaantal bestanden dat vanuit archieven moet worden gescand voordat de scan wordt afgebroken. Standaard = 0 (geen maximum).

#### "attack_specific" (Categorie)
Aanval-specifieke richtlijnen.

Chameleon aanval detectie: False = Uitgeschakeld; True = Ingeschakeld.

##### "chameleon_from_php"
- Zoeken naar PHP header in bestanden die niet zijn PHP-bestanden noch herkende archieven.

##### "can_contain_php_file_extensions"
- Een lijst met bestandsextensies die PHP-code mogen bevatten, gescheiden door komma's. Als PHP chameleon aanval detectie is ingeschakeld, zullen bestanden die PHP-code bevatten, met extensies die niet op deze lijst staan, worden gedetecteerd als PHP chameleon aanvallen.

##### "chameleon_from_exe"
- Zoeken naar PHP header in bestanden die niet zijn executables noch herkende archieven en naar executables waarvan de headers zijn onjuist.

##### "chameleon_to_archive"
- Detecteer onjuiste headers in archieven en gecomprimeerde bestanden. Ondersteunde: BZ/BZIP2, GZ/GZIP, LZF, RAR, ZIP.

##### "chameleon_to_doc"
- Zoeken naar office documenten waarvan headers zijn onjuist (Ondersteunde: DOC, DOT, PPS, PPT, XLA, XLS, WIZ).

##### "chameleon_to_img"
- Zoeken naar beelden waarvan headers zijn onjuist (Ondersteunde: BMP, DIB, PNG, GIF, JPEG, JPG, XCF, PSD, PDD, WEBP).

##### "chameleon_to_pdf"
- Zoeken naar PDF-bestanden waarvan headers zijn onjuist.

##### "archive_file_extensions"
- Herkende archief bestandsextensies (formaat is CSV; moet alleen toevoegen of verwijderen wanneer problemen voorkomen; onnodig verwijderen kan leiden tot vals-positieven te verschijnen voor archiefbestanden, terwijl onnodig toevoeging zal effectief whitelist wat u toevoegt van aanval-specifieke detectie; wijzigen met voorzichtigheid; ook noteren dat Dit heeft geen effect op welke archieven kan en niet kan wordt geanalyseerd op inhoudsniveau). De lijst, als is bij standaard, geeft die formaten gebruikt meest vaak door de meeste systemen en CMS, maar opzettelijk is niet noodzakelijk alomvattend.

##### "block_control_characters"
- Blokkeren alle bestanden bevatten controle karakters (andere dan nieuwe regels)? (`[\x00-\x08\x0b\x0c\x0e\x1f\x7f]`) Als u _**ALLEEN**_ uploaden platte tekst, dan u kan inschakelen dit optie te bieden extra bescherming aan uw systeem. Hoewel, als u uploaden iets anders dan platte tekst, inschakelen dit kan leiden tot valse positieven. False = Niet blokkeren [Standaard]; True = Doen blokkeren.

##### "corrupted_exe"
- Corrupte bestanden en verwerking fouten. False = Negeren; True = Blokkeren [Standaard]. Detecteren en blokkeren mogelijk beschadigd PE (Portable Executable) bestanden? Vaak (maar niet altijd), wanneer bepaalde aspecten van een PE-bestand zijn beschadigd of kan niet correct worden verwerkt, het kan wijzen op een virale infectie. De processen gebruikt door de meeste anti-virus programma's om virussen in PE-bestanden te detecteren vereisen de verwerking van die bestanden op bepaalde manieren, dat, als de programmeur van een virus kent, specifiek zal proberen te verhinderen, zodat haar virus onopgemerkt blijven.

##### "decode_threshold"
- Drempelwaarde de lengte van onverwerkte gegevens waarbinnen decoderen commando's moeten gedetecteerd worden (in het geval er enige merkbare prestatieproblemen terwijl scannen). Standaard = 512KB. Zero of nulwaarde zal uitschakelen het drempelwaarde (het verwijderen van een dergelijke limiet gebaseerd op bestandsgrootte).

##### "scannable_threshold"
- Drempelwaarde de lengte van onverwerkte gegevens dat phpMussel is toegestaan te lezen en scan (in het geval er enige merkbare prestatieproblemen terwijl scannen). Standaard = 32MB. Zero of nulwaarde zal uitschakelen het drempelwaarde. Algemeen, dit waarde moeten niet zijn lagere dan de gemiddelde bestandsgrootte van het bestandsuploads dat u wilt en verwacht te ontvangen aan uw server of website, moeten niet zijn meer dan de filesize_limit richtlijn, en moeten niet zijn meet dan ongeveer een vijfde van de totale toegestane geheugentoewijzing toegekend aan PHP via de `php.ini` configuratiebestand. Dit richtlijn bestaat te proberen om phpMussel te verhinderen van het gebruik van teveel geheugen (dat zou verhinderen het van de mogelijkheid te scannen bestanden met succes boven een bepaalde bestandsgrootte).

##### "allow_leading_trailing_dots"
- Sta voorlopende en achterliggende stippen toe in bestandsnamen? Dit kan soms worden gebruikt om bestanden te verbergen, of om sommige systemen te misleiden om doorverwijzing van mappen mogelijk te maken. False = Niet toestaan [Standaard]. True = Toestaan.

##### "block_macros"
- Probeer u alle bestanden met macro's te blokkeren? Sommige soorten documenten en spreadsheets kunnen uitvoerbare macro's bevatten, waardoor een gevaarlijke potentiële malwarevector wordt geboden. False = Niet blokkeren [Standaard]; True = Doen blokkeren.

#### "compatibility" (Categorie)
Compatibiliteit richtlijnen voor phpMussel.

##### "ignore_upload_errors"
- Dit richtlijn moet in het algemeen worden uitgeschakeld tenzij het is vereist voor de juiste functionaliteit van phpMussel op uw specifieke systeem. Normaal, wanneer uitgeschakeld, wanneer phpMussel detecteert de aanwezigheid van elementen van de `$_FILES` array(), het zal proberen initiëren een scan van het bestanden deze elementen vertegenwoordigen, en, als deze elementen zijn leeg, phpMussel zal terugkeren een foutmelding. Dit is het juiste gedrag voor phpMussel. Dat gezegd hebbende, voor sommige CMS, lege elementen in `$_FILES` kan optreden als gevolg van het natuurlijke gedrag van deze CMS, of fouten zouden zijn gerapporteerd wanneer er geen, in welk geval, het normale gedrag voor phpMussel zullen bemoeien met het normale gedrag van deze CMS. Als dergelijke een situatie opgebeurt voor u, inschakelen dit optie zal instrueren phpMussel niet te proberen te initiëren scannen voor dergelijke lege elementen, negeer hem wanneer gevonden en niet terugkeren gerelateerde foutmeldingen, dus toelaten de voortzetting van de pagina-aanvraag. False = UITGESCHAKELD; True = INGESCHAKELD.

##### "only_allow_images"
- Als u alleen verwachten of alleen bedoelen toestaan beelden worden geüpload om uw systeem of CMS, en als u absoluut nodig geen bestanden behalve afbeeldingen te wordt geüpload om uw systeem of CMS, dit richtlijn moet worden ingeschakeld, maar moet anderszins worden uitgeschakeld. Als dit richtlijn is ingeschakeld, het zal instrueren phpMussel zonder onderscheid te blokkeren elke upload geïdentificeerd als niet-beeldbestanden, zonder te scannen. Dit kan verminderen verwerkingstijd en geheugengebruik voor het geprobeerd uploaden van niet-beeldbestanden. False = UITGESCHAKELD; True = INGESCHAKELD.

#### "heuristic" (Categorie)
Heuristische richtlijnen.

##### "threshold"
- Er zijn bepaalde signatures van phpMussel dat zijn bedoeld om verdachte en potentieel kwaadaardige kwaliteiten te identificeren van bestanden wordt geüpload zonder zichzelf om bestanden wordt geüpload te identificeren specifiek als kwaadaardige. Dit "threshold" waarde vertelt phpMussel het maximaal totaalgewicht van verdachte en potentieel kwaadaardige kwaliteiten van bestanden wordt geüpload dat is toelaatbaar voordat deze bestanden worden gemarkeerd als kwaadaardig. De definitie van gewicht in dit verband is het aantal van verdachte en potentieel kwaadaardige kwaliteiten dat zijn geïdentificeerd. Standaard, dit waarde wordt ingesteld op 3. Algemeen, een lagere waarde zal resulteren in meer valse positieven maar meer kwaadaardige bestanden wordt gemarkeerd, terwijl een hogere waarde zal resulteren in minder valse positieven maar minder kwaadaardige bestanden wordt gemarkeerd. Algemeen, het is beste om dit waarde te laten op zijn standaard, tenzij u problemen ondervindt met betrekking tot het.

#### "virustotal" (Categorie)
VirusTotal.com richtlijnen.

##### "vt_public_api_key"
- Optioneel, met phpMussel, het is mogelijk om bestanden te scannen met behulp van de Virus Total API als een manier om een sterk verbeterde mate van bescherming te bieden tegen virussen, trojans, malware en andere bedreigingen. Standaard, scannen van bestanden met behulp van de Virus Total API is uitgeschakeld. Om het te inschakelen, een Virus Total API-sleutel is nodig. Vanwege de aanzienlijke voordeel dat dit zou kunnen om u te voorzien, het is iets dat ik sterk aanbevelen te inschakelen. Wees u ervan bewust, echter, dat voor gebruik op de Virus Total API, u _**MOET**_ akkoord gaan hun Algemene Voorwaarden en u _**MOET**_ voldoen aan alle richtlijnen per beschreven door de Virus Total documentatie! U bent NIET toegestaan om dit integratie functie te gebruiken TENZIJ:
  - U heeft gelezen en u akkoord met de Algemene Voorwaarden van de Virus Total en zijn API. De Algemene Voorwaarden van de Virus Total en zijn API kan [Hier](https://www.virustotal.com/en/about/terms-of-service/) worden gevonden.
  - U heeft gelezen en u begrijpt, ten minste, de preambule van de Virus Total Public API-documentatie (alles na "VirusTotal Public API v2.0" maar vóór "Contents"). De Virus Total Public API-documentatie kan [Hier](https://www.virustotal.com/en/documentation/public-api/) worden gevonden.

Noteren: Als het scannen van bestanden met behulp van de Virus Total API is uitgeschakeld, u hoeft niet herziening van de richtlijnen in dit categorie (`virustotal`), omdat geen van hen iets te doen als dit is uitgeschakeld. Om een Virus Total API-sleutel te verwerven, van ergens op hun website, klik op de "Registreren" link gelegen in de richting van de rechterbovenhoek van de pagina, invoeren in de gevraagde informatie, en klik "Registreren" wanneer u klaar. Volg alle instructies geleverd, en wanneer u uw publieke API-sleutel heeft, kopieren/plakken dat publieke API om de `vt_public_api_key` richtlijn van de `config.ini` configuratiebestand.

##### "vt_suspicion_level"
- Normaal, phpMussel zal beperken welke bestanden scant met behulp van de Virus Total API om het bestanden die zijn beschouwd "achterdochtig". Optioneel, u kan dit beperking aan te passen door de waarde van het `vt_suspicion_level` richtlijn.
- `0`: Bestanden worden beschouwd achterdochtig alleen als, na te zijn gescand door phpMussel met eigen signatures, zij geacht worden een heuristische gewicht te dragen. Dit zou effectief betekenen dat het gebruik van de Virus Total API zou zijn voor een tweede mening wanneer phpMussel vermoedt dat een bestand potentieel kwaadaardig kan zijn, maar kan niet helemaal uitsluiten dat het kan ook potentieel goedaardig zijn (niet-kwaadaardig) en daarom anders zou normaal niet blokkeren of vlag als kwaadaardig.
- `1`: Bestanden worden beschouwd achterdochtig alleen als, na te zijn gescand door phpMussel met eigen signatures, zij geacht worden een heuristische gewicht te dragen, als ze bekend is executable te zijn (PE bestanden, Mach-O bestanden, ELF/Linux bestanden, etc), of als ze bekend zijn van een formaat dat potentieel executable gegevens kan bevatten (zoals executable macros, DOC/DOCX bestanden, archiefbestanden zoals RARs, ZIPS en etc). Dit is de standaard en aanbevolen achterdocht niveau toe te passen, effectief betekent dat het gebruik van de Virus Total API zou zijn voor een tweede mening wanneer in eerste instantie niets kwaadaardige of slecht wordt gevonden door phpMussel met een bestand beschouwd achterdochtig te zijn en daarom anders zou normaal niet blokkeren of vlag als kwaadaardig.
- `2`: Alle bestanden beschouwd achterdochtig worden en moeten worden gescand met behulp van de Virus Total API. Ik meestal niet raden het toepassen van dit achterdocht niveau, vanwege het risico bereiken API-quotum veel sneller dan anders het geval zou zijn, maar er zijn bepaalde omstandigheden (zoals wanneer de webmaster of hostmaster heeft weinig geloof of vertrouwen in de geringste in een van de geüploade inhoud van hun gebruikers) waarin dit achterdocht niveau kon passend zijn. Met dit achterdocht niveau, Alle bestanden normaal niet geblokkeerd of gemarkeerd als kwaadaardig zou worden gescand met behulp van de Virus Total API. Noteren, echter, dat phpMussel zal ophouden met behulp van de Virus Total API wanneer uw API-quotum is bereikt (ongeacht van achterdocht niveau), en dat uw API-quotum zal waarschijnlijk veel sneller bereikt met het gebruik van dit achterdocht niveau.

Noteren: Ongeacht van achterdocht niveau, elke bestanden die ofwel worden de zwarte lijst of witte lijst door phpMussel zal niet worden gescand met behulp van de Virus Total API, omdat die dergelijke bestanden reeds zou hebben verklaard als ofwel kwaadaardig of goedaardig door phpMussel tegen de tijd dat ze anders zouden hebben gescand door de Virus Total API, en daarom, extra scannen zou niet nodig. Het vermogen van phpMussel om bestanden te scannen met de Virus Total API is bedoeld om het vertrouwen bouwen verder voor of een bestand is kwaadaardig of goedaardig in die omstandigheden waarin phpMussel zelf is niet helemaal zeker de vraag van of een bestand is kwaadaardig of goedaardig.

##### "vt_weighting"
- Moeten phpMussel de resultaten van het scannen met behulp van de Virus Total API toe te passen als detecties of detectie weging? Dit richtlijn bestaat, omdat, hoewel het scannen van een bestand met behulp van meerdere motoren (als Virus Total doet) moet leiden tot een verhoogde aantal van detecties (en dus in een hoger aantal van kwaadaardige bestanden worden gedetecteerd), het kan ook resulteren in een hoger aantal van valse positieven, en daarom, in sommige gevallen, de resultaten van de scan kan beter worden benut als betrouwbaarheidsscore eerder dan als een definitieve conclusie. Als een waarde van 0 wordt gebruikt, de resultaten van het scannen met behulp van de Virus Total API zal worden toegepast als detecties, en zo, als een motor gebruikt door Virus Total vlaggen het bestand wordt gescand als kwaadaardige, phpMussel zal het bestand overwegen kwaadaardig te zijn. Als een andere waarde wordt gebruikt, de resultaten van het scannen met behulp van de Virus Total API zal worden toegepast als detectie weging, en zo, het aantal van motoren gebruikt door Virus Total dat vlag het bestand wordt gescand als kwaadaardige zal dienen als een betrouwbaarheidsscore (of detectie weging) voor of het bestand dat wordt gescand moet worden beschouwd als kwaadaardige door phpMussel (de waarde die wordt gebruikt zal vertegenwoordigen de minimale betrouwbaarheidsscore of weging vereist om kwaadaardige te worden beschouwd). Een waarde van 0 wordt standaard gebruikt.

##### "vt_quota_rate" en "vt_quota_time"
- Volgens de Virus Total API-documentatie, het is beperkt tot maximaal 4 verzoeken van welke aard in elk 1 minuut tijdsbestek. Als u een honeyclient, honeypot of andere automatisering te voorzien, dat gaat om middelen te verschaffen om VirusTotal en niet alleen rapporten opvragen heeft u recht op een hogere API-quotum. Normaal, phpMussel zal strikt houden aan deze beperkingen, maar vanwege de mogelijkheid van deze API-quotum verhoogd te worden, deze twee richtlijnen worden verstrekt als middel voor u om instrueren phpMussel wat limiet moeten houden worden. Tenzij u heeft geïnstrueerd om dit te doen, het is niet aan te raden voor u om deze waarden te verhogen, maar, als u heeft ondervonden problemen met betrekking tot uw tarief quota bereiken, afnemende deze waarden kunnen u soms helpen in het omgaan met deze problemen. Uw maximaal tarief bepaald als `vt_quota_rate` verzoeken van welke aard in elk `vt_quota_time` minuut tijdsbestek.

#### "urlscanner" (Categorie)
Een URL scanner wordt meegeleverd met phpMussel, het opsporen van kwaadaardige URL's vanuit alle gegevens of bestanden gescand.

Noteren: Als de URL scanner wordt uitgeschakeld, zult u geen behoefte aan een van de richtlijnen in dit categorie te herzien (`urlscanner`), omdat geen van hen zal alles doen als dit is uitgeschakeld.

URL scanner API configuratie.

##### "lookup_hphosts"
- Inschakelt gebruik van de [hpHosts](https://hosts-file.net/) API wanneer zet op true. hpHosts nodig geen API sleutel voor het uitvoeren API verzoeken.

##### "google_api_key"
- Inschakelt gebruik van de Google Safe Browsing API wanneer de noodzakelijke API sleutel wordt gedefinieerd. Google Safe Browsing API nodig hebben een API sleutel, dat kan worden verkregen van [Hier](https://console.developers.google.com/).
- Noteren: De cURL uitbreiding is nodig om deze functie te gebruiken.

##### "maximum_api_lookups"
- Maximaal toelaatbaar aantal van de API verzoeken te voeren per individuele scan iteratie. Omdat elke extra API verzoek zullen toevoegen aan de totale tijd die nodig te voltooien elke scan iteratie, u kunt wensen om een beperking te specificeren teneinde versnellen het algehele scanproces. Wanneer ingesteld op 0, geen dergelijk maximaal toelaatbaar aantal wordt toegepast. Ingesteld op 10 standaard.

##### "maximum_api_lookups_response"
- Wat te doen als het maximaal toelaatbaar aantal van API verzoeken wordt overschreden? False = Niets doen (voortzetten de verwerking) [Standaard]; True = Merken/blokkeren het bestand.

##### "cache_time"
- Hoe lang (in seconden) moeten de resultaten van de API verzoeken worden gecached voor? Standaard is 3600 seconden (1 uur).

#### "legal" (Category)
Configuratie met betrekking tot wettelijke vereisten.

*Voor meer informatie over wettelijke vereisten en hoe dit uw configuratie-eisen kan beïnvloeden, zie het sectie "[LEGALE INFORMATIE](#SECTION11)" van de documentatie.*

##### "pseudonymise_ip_addresses"
- Pseudonimiseren de IP-adressen bij het schrijven van logbestanden? True = Ja [Standaard]; False = Nee.

##### "privacy_policy"
- Het adres van een relevant privacybeleid dat moet worden weergegeven in de voettekst van eventuele gegenereerde pagina's. Geef een URL, of laat leeg om uit te schakelen.

#### "template_data" (Categorie)
Richtlijnen/Variabelen voor sjablonen en thema's.

Sjabloongegevens betreft op de HTML-uitvoer die wordt gegenereerd en gebruikt voor de "Upload Geweigerd" bericht getoond om de gebruikers wanneer een bestand upload is geblokkeerd. Als u gebruik aangepaste thema's voor phpMussel, HTML-uitvoer is afkomstig van de `template_custom.html` bestand, en alternatief, HTML-uitvoer is afkomstig van de `template.html` bestand. Variabelen geschreven om dit sectie van het configuratiebestand worden geïnterpreteerd aan de HTML-uitvoer door middel van het vervangen van variabelennamen omringd door accolades gevonden binnen de HTML-uitvoer met de bijbehorende variabele gegevens. Bijvoorbeeld, waar `foo="bar"`, elk geval van `<p>{foo}</p>` gevonden binnen de HTML-uitvoer `<p>bar</p>` zal worden.

##### "theme"
- Standaard thema om te gebruiken voor phpMussel.

##### "magnification"
- *v1: "Magnification"*
- Lettergrootte vergroting. Standaard = 1.

##### "css_url"
- De sjabloonbestand voor aangepaste thema's maakt gebruik van externe CSS-eigenschappen, terwijl de sjabloonbestand voor het standaardthema maakt gebruik van interne CSS-eigenschappen. Om phpMussel instrueren om de sjabloonbestand voor aangepaste thema's te gebruiken, geef het openbare HTTP-adres van uw aangepaste thema's CSS-bestanden via de `css_url` variabele. Als u dit variabele leeg laat, phpMussel zal de sjabloonbestand voor de standaardthema te gebruiken.

#### "PHPMailer" (Categorie)
PHPMailer-configuratie.

Op dit moment gebruikt phpMussel alleen PHPMailer voor front-end two-factor authenticatie. Als u de front-end niet gebruikt, of als u geen twee-factorenauthenticatie gebruikt voor de front-end, kunt u deze richtlijnen negeren.

##### "event_log"
- *v1: "EventLog"*
- Een bestand voor het loggen van alle evenementen met betrekking tot PHPMailer. Geef een bestandsnaam, of laat leeg om uit te schakelen.

##### "skip_auth_process"
- *v1: "SkipAuthProcess"*
- Wanneer `true`, geeft PHPMailer opdracht om het verificatieproces over te slaan dat normaal optreedt bij het verzenden van e-mail via SMTP. Dit moet worden vermeden, omdat bij het overslaan van dit verificatieproces uitgaande e-mail aan MITM-aanvallen kan worden blootgesteld, maar kan nodig zijn in gevallen waarin dit verificatieproces verhindert dat PHPMailer verbinding maakt met een SMTP-server.

##### "enable_two_factor"
- *v1: "Enable2FA"*
- Deze richtlijn bepaalt of 2FA wordt gebruikt voor frontend-accounts.

##### "host"
- *v1: "Host"*
- De SMTP-host dat moet worden gebruikt voor uitgaande e-mail.

##### "port"
- *v1: "Port"*
- Het poortnummer dat moet worden gebruikt voor uitgaande e-mail. Standaard = 587.

##### "smtp_secure"
- *v1: "SMTPSecure"*
- Het protocol voor het verzenden van e-mail via SMTP (TLS of SSL).

##### "smtp_auth"
- *v1: "SMTPAuth"*
- Deze richtlijn bepaalt of SMTP-sessies moeten worden geverifieerd (moet meestal alleen worden gelaten).

##### "username"
- *v1: "Username"*
- De gebruikersnaam voor het verzenden van e-mail via SMTP.

##### "password"
- *v1: "Password"*
- Het wachtwoord voor het verzenden van e-mail via SMTP.

##### "set_from_address"
- *v1: "setFromAddress"*
- Het afzenderadres voor het verzenden van e-mail via SMTP.

##### "set_from_name"
- *v1: "setFromName"*
- De naam van de afzender voor het verzenden van e-mail via SMTP.

##### "add_reply_to_address"
- *v1: "addReplyToAddress"*
- Het antwoordadres voor het verzenden van e-mail via SMTP.

##### "add_reply_to_name"
- *v1: "addReplyToName"*
- De antwoordnaam voor het verzenden van e-mail via SMTP.

#### "supplementary_cache_options" (Categorie)
Aanvullende cache-opties.

*Momenteel is dit extreem experimenteel, en werkt het misschien niet zoals verwacht! Voorlopig raad ik aan het te negeren.*

##### "enable_apcu"
- Dit geeft aan of APCu moet worden gebruikt voor caching. Standaard = False.

##### "enable_memcached"
- Dit geeft aan of Memcached moet worden gebruikt voor caching. Standaard = False.

##### "enable_redis"
- Dit geeft aan of Redis moet worden gebruikt voor caching. Standaard = False.

##### "enable_pdo"
- Dit geeft aan of PDO moet worden gebruikt voor caching. Standaard = False.

##### "memcached_host"
- Memcached hostwaarde. Standaard = "localhost".

##### "memcached_port"
- Memcached poortwaarde. Standaard = "11211".

##### "redis_host"
- Redis hostwaarde. Standaard = "localhost".

##### "redis_port"
- Redis poortwaarde. Standaard = "6379".

##### "redis_timeout"
- Redis timeoutwaarde. Standaard = "2.5".

##### "pdo_dsn"
- PDO DSN-waarde. Standaard = "`mysql:dbname=phpmussel;host=localhost;port=3306`".

##### "pdo_username"
- PDO gebruikersnaam.

##### "pdo_password"
- PDO wachtwoord.

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

#### PHP en PCRE
- PHP en PCRE is vereist voor phpMussel te kunnen functioneren juist. Zonder PHP, of zonder de PCRE extensie van PHP, phpMussel zullen niet worden uitgevoerd of functioneren juist. U moet er zeker van uw systeem heeft zowel PHP en PCRE geïnstalleerd en beschikbaar voordat downloaden en installeren phpMussel.

#### ANTI-VIRUS SOFTWARECOMPATIBILITEIT

Voor het grootste deel, phpMussel is algemeen compatibel met de meeste andere anti-virus software. Echter, conflictions geweest beschreven door een aantal gebruikers in het verleden. Deze informatie hieronder is afkomstig van VirusTotal.com, het beschrijven van een aantal fout-positieven gemeld door anti-virus programma's tegen phpMussel. Hoewel deze informatie is geen absolute garantie van wel of niet u zult compatibiliteitsproblemen ondervindt tussen phpMussel en uw anti-virus software, als uw anti-virus software wordt gemarkeerd tegen phpMussel, moet u ofwel overwegen uit te schakelen voorafgaand aan het werken met phpMussel of moeten overwegen alternatieve opties om ofwel uw anti-virus software of phpMussel.

Dit informatie werd laatst bijgewerkt 2018.10.09 en is op de hoogte voor alle phpMussel publicaties van de twee meest recente mineur versies (v1.5.0-v1.6.0) op het moment van schrijven dit.

*Dit informatie is alleen van toepassing op het hoofdpakket. Resultaten kunnen variëren op basis van geïnstalleerde signatuurbestanden, plug-ins, en andere randapparatuur.*

| Scanner | Resultaten |
|---|---|
| Bkav | Berichten "VEX.Webshell" |

---


### 10. <a name="SECTION10"></a>VEELGESTELDE VRAGEN (FAQ)

- [Wat is een "signature"?](#WHAT_IS_A_SIGNATURE)
- [Wat is een "vals positieve"?](#WHAT_IS_A_FALSE_POSITIVE)
- [Hoe vaak worden signatures bijgewerkt?](#SIGNATURE_UPDATE_FREQUENCY)
- [Ik heb een fout tegengekomen tijdens het gebruik van phpMussel en ik weet niet wat te doen! Help alstublieft!](#ENCOUNTERED_PROBLEM_WHAT_TO_DO)
- [Ik wil phpMussel (voorafgaand aan v2) gebruiken met een PHP-versie ouder dan 5.4.0; Kan u helpen?](#MINIMUM_PHP_VERSION)
- [Ik wil phpMussel (v2) gebruiken met een PHP-versie ouder dan 7.2.0; Kan u helpen?](#MINIMUM_PHP_VERSION_V2)
- [Kan ik een enkele phpMussel-installatie gebruiken om meerdere domeinen te beschermen?](#PROTECT_MULTIPLE_DOMAINS)
- [Ik wil niet tijd verspillen met het installeren van dit en om het te laten werken met mijn website; Kan ik u betalen om het te doen?](#PAY_YOU_TO_DO_IT)
- [Kan ik u of een van de ontwikkelaars van dit project voor privéwerk huren?](#HIRE_FOR_PRIVATE_WORK)
- [Ik heb speciale modificaties en aanpassingen nodig; Kan u helpen?](#SPECIALIST_MODIFICATIONS)
- [Ik ben een ontwikkelaar, website ontwerper, of programmeur. Kan ik werken aan dit project accepteren of aanbieden?](#ACCEPT_OR_OFFER_WORK)
- [Ik wil bijdragen aan het project; Kan ik dit doen?](#WANT_TO_CONTRIBUTE)
- [Hoe krijgt u toegang tot specifieke gegevens over bestanden als ze worden gescand?](#SCAN_DEBUGGING)
- [Kan ik cron gebruiken om automatisch bij te werken?](#CRON_TO_UPDATE_AUTOMATICALLY)
- [Kan phpMussel bestanden met niet-ANSI-namen scannen?](#SCAN_NON_ANSI)
- [Blacklists (zwarte lijsten) – Whitelists (witte lijsten) – Greylists (grijze lijst) – Wat zijn ze en hoe gebruik ik ze?](#BLACK_WHITE_GREY)
- [Wanneer ik signatuurbestanden activeer of deactiveer via de updates-pagina, sorteert deze ze alfanumeriek in de configuratie. Kan ik de manier wijzigen waarop ze worden gesorteerd?](#CHANGE_COMPONENT_SORT_ORDER)

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

#### <a name="MINIMUM_PHP_VERSION"></a>Ik wil phpMussel (voorafgaand aan v2) gebruiken met een PHP-versie ouder dan 5.4.0; Kan u helpen?

Nee. PHP >= 5.4.0 is een minimale vereiste voor phpMussel < v2.

#### <a name="MINIMUM_PHP_VERSION_V2"></a>Ik wil phpMussel (v2) gebruiken met een PHP-versie ouder dan 7.2.0; Kan u helpen?

Nee. PHP >= 7.2.0 is een minimale vereiste voor phpMussel v2.

*Zie ook: [Compatibiliteitskaarten](https://maikuolan.github.io/Compatibility-Charts/).*

#### <a name="PROTECT_MULTIPLE_DOMAINS"></a>Kan ik een enkele phpMussel-installatie gebruiken om meerdere domeinen te beschermen?

Ja. phpMussel-installaties zijn niet van nature gebonden naar specifieke domeinen, en kan daarom worden gebruikt om meerdere domeinen te beschermen. Algemeen, wij verwijzen naar phpMussel installaties die slechts één domein beschermen als "single-domain installaties", en wij verwijzen naar phpMussel installaties die meerdere domeinen en/of subdomeinen beschermen als "multi-domain installaties". Als u een multi-domain installaties werken en nodig om verschillende signatuurbestanden voor verschillende domeinen te gebruiken, of nodig om phpMussel anders geconfigureerd voor verschillende domeinen te zijn, het is mogelijk om dit te doen. Nadat het configuratiebestand hebt geladen (`config.ini`), phpMussel controleert het bestaan van een "configuratie overschrijdend bestand" specifiek voor het domein (of sub-domein) dat wordt aangevraagd (`het-domein-dat-wordt-aangevraagd.tld.config.ini`), en als gevonden, elke configuratie waarden gedefinieerd door het configuratie overschrijdend bestand zal worden gebruikt in plaats van de configuratie waarden die zijn gedefinieerd door het configuratiebestand. Het configuratie overschrijdende bestanden zijn identiek aan het configuratiebestand, en naar eigen goeddunken, kan de volledige van alle configuratie richtlijnen beschikbaar voor phpMussel bevatten, of wat dan ook kleine subsectie dat nodig is die afwijkt van de waarden die normaal door het configuratiebestand worden gedefinieerd. Het configuratie overschrijdende bestanden worden genoemd volgens het domein waaraan ze bestemd zijn (dus, bijvoorbeeld, als u een configuratie overschrijdend bestand voor het domein `http://www.some-domain.tld/` nodig hebt, het configuratie overschrijdende bestanden moeten worden genoemd als `some-domain.tld.config.ini`, en moeten naast het configuratiebestand, `config.ini`, in de vault geplaatst worden). De domeinnaam is afgeleid van de koptekst `HTTP_HOST` van het verzoek; "www" wordt genegeerd.

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
require 'phpmussel/loader.php';

$phpMussel['Set-Scan-Debug-Array']($Foo);

$Results = $phpMussel['Scan']('/bestandspad/...');

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
$phpMussel['Destroy-Scan-Debug-Array']($Foo);
```

#### <a name="CRON_TO_UPDATE_AUTOMATICALLY"></a>Kan ik cron gebruiken om automatisch bij te werken?

Ja. Een API is ingebouwd in het frontend voor interactie met de updates pagina via externe scripts. Een apart script, "[Cronable](https://github.com/Maikuolan/Cronable)", is beschikbaar, en kan door uw cron manager of cron scheduler gebruikt worden om deze en andere ondersteunde pakketten automatisch te updaten (dit script biedt zijn eigen documentatie).

#### <a name="SCAN_NON_ANSI"></a>Kan phpMussel bestanden met niet-ANSI-namen scannen?

Laten we zeggen dat er een map is die u wilt scannen. In deze map hebt u enkele bestanden met niet-ANSI-namen.
- `Пример.txt`
- `一个例子.txt`
- `例です.txt`

Laten we aannemen dat je de CLI-modus of de phpMussel API gebruikt om te scannen.

Bij gebruik van PHP < 7.1.0, op sommige systemen, zal phpMussel deze bestanden niet zien wanneer ze proberen de map te scannen, en dus zullen ze deze bestanden niet kunnen scannen. U ziet waarschijnlijk dezelfde resultaten als wanneer u een lege map scant:

```
 Sun, 01 Apr 2018 22:27:41 +0800 Gestart.
 Sun, 01 Apr 2018 22:27:41 +0800 Afgewerkt.
```

Ook, bij het gebruik van PHP < 7.1.0, het afzonderlijk scannen van de bestanden levert de volgende resultaten op:

```
 Sun, 01 Apr 2018 22:27:41 +0800 Gestart.
 > Verifiëren 'X:/directory/Пример.txt' (FN: b831eb8f):
 -> Ongeldige bestand!
 Sun, 01 Apr 2018 22:27:41 +0800 Afgewerkt.
```

Of:

```
 Sun, 01 Apr 2018 22:27:41 +0800 Gestart.
 > X:/directory/??????.txt is geen bestand of map.
 Sun, 01 Apr 2018 22:27:41 +0800 Afgewerkt.
```

Dit komt door de manier waarop PHP niet-ANSI-bestandsnamen heeft afgehandeld voorafgaand aan PHP 7.1.0. Als u dit probleem ondervindt, de oplossing is om uw PHP-installatie bij te werken naar 7.1.0 of nieuwer. In PHP >= 7.1.0 worden niet-ANSI-bestandsnamen beter afgehandeld, en phpMussel zou in staat moeten zijn om de bestanden correct te scannen.

Ter vergelijking, de resultaten bij een poging om de map te scannen met behulp van PHP >= 7.1.0:

```
 Sun, 01 Apr 2018 22:27:41 +0800 Gestart.
 -> Verifiëren '\Пример.txt' (FN: b2ce2d31; FD: 27cbe813):
 --> Geen problemen gevonden.
 -> Verifiëren '\一个例子.txt' (FN: 50debed5; FD: 27cbe813):
 --> Geen problemen gevonden.
 -> Verifiëren '\例です.txt' (FN: ee20a2ae; FD: 27cbe813):
 --> Geen problemen gevonden.
 Sun, 01 Apr 2018 22:27:41 +0800 Afgewerkt.
```

En probeer de bestanden afzonderlijk te scannen:

```
 Sun, 01 Apr 2018 22:27:41 +0800 Gestart.
 > Verifiëren 'X:/directory/Пример.txt' (FN: b831eb8f; FD: 27cbe813):
 -> Geen problemen gevonden.
 Sun, 01 Apr 2018 22:27:41 +0800 Afgewerkt.
```

#### <a name="BLACK_WHITE_GREY"></a>Blacklists (zwarte lijsten) – Whitelists (witte lijsten) – Greylists (grijze lijst) – Wat zijn ze en hoe gebruik ik ze?

De termen brengen verschillende betekenissen over in verschillende contexten. In phpMussel zijn er drie contexten waarin deze termen worden gebruikt: Bestandsgrootte respons, bestandstype respons, en de signature greylist.

Om een gewenst resultaat te bereiken tegen minimale kosten voor verwerking, zijn er enkele eenvoudige dingen die phpMussel kan controleren voordat bestanden daadwerkelijk worden gescand, zoals de grootte, de naam en de extensie van een bestand. Bijvoorbeeld; Als een bestand te groot is, of als de extensie een bestandstype aangeeft dat we sowieso niet willen toestaan op onze websites, we kunnen het bestand onmiddellijk markeren en hoeven het niet te scannen.

Bestandsgrootte respons is de manier waarop phpMussel reageert wanneer een bestand een opgegeven limiet overschrijdt. Hoewel er geen echte lijsten bij betrokken zijn, kan een bestand op basis van zijn grootte als effectief op de zwarte lijst, op de witte lijst of in de grijze lijst worden beschouwd. Er zijn twee afzonderlijke, optionele configuratie richtlijnen om respectievelijk een limiet en een gewenst antwoord op te geven.

Bestandstype respons is de manier waarop phpMussel reageert op de extensie van het bestand. Er zijn drie afzonderlijke, optionele configuratie richtlijnen om expliciet aan te geven welke extensies op de zwarte lijst, op de witte lijst of in de grijze lijst moeten staan. Een bestand kan als effectief worden beschouwd op de zwarte lijst, op de witte lijst of in de grijze lijst als de extensie overeenkomt met een van de opgegeven extensies.

In deze twee contexten, op de witte lijst staan betekent dat deze niet mag worden gescand of gemarkeerd; op de zwarte lijst staan betekent dat deze moet worden gemarkeerd (en daarom hoeft het niet te scannen); en op de grijze lijst staan betekent dat verdere analyse vereist is om te bepalen of we het moeten markeren (d.w.z, het moet worden gescand).

De signature greylist is een lijst met signatures die in essentie moet worden genegeerd (dit wordt eerder in de documentatie kort genoemd). Wanneer een signature op de signature greylist wordt geactiveerd, blijft phpMussel werken door zijn signatures en onderneemt geen specifieke actie met betrekking tot de signature dat op de greylist staat. Er is geen zwarte lijst, omdat het impliciete gedrag is hetzelfde als het normaal gedrag voor getriggerde signatures, en er is geen signature witte lijst, omdat het impliciete gedrag niet echt zinvol is in overweging van hoe phpMussel normaal werkt en de mogelijkheden die het al heeft.

De signature grijze lijst is handig als u problemen wilt oplossen die door een bepaalde signature worden veroorzaakt zonder het volledige signatuurbestand uit te schakelen of te deinstalleren.

#### <a name="CHANGE_COMPONENT_SORT_ORDER"></a>Wanneer ik signatuurbestanden activeer of deactiveer via de updates-pagina, sorteert deze ze alfanumeriek in de configuratie. Kan ik de manier wijzigen waarop ze worden gesorteerd?

Ja. Als u bepaalde bestanden wilt dwingen om in een specifieke volgorde uit te voeren, kunt u enkele willekeurige gegevens vóór hun naam toevoegen in de configuratie richtlijn waar ze worden vermeld, gescheiden door een dubbele punt. Wanneer de updates-pagina vervolgens de bestanden opnieuw sorteert, heeft deze toegevoegde willekeurige gegevens invloed op de sorteervolgorde, waardoor ze vervolgens in de gewenste volgorde worden uitgevoerd, zonder dat ze hoeven te hernoemen.

Stel dat u bijvoorbeeld een configuratie richtlijn aanneemt met de volgende bestanden:

`file1.php,file2.php,file3.php,file4.php,file5.php`

Als u wilt dat `file3.php` het eerst uitvoert, u zou iets als `aaa:` kunnen toevoegen voor de naam van het bestand:

`file1.php,file2.php,aaa:file3.php,file4.php,file5.php`

Als dan een nieuw bestand, `file6.php`, is geactiveerd, als de updates-pagina ze allemaal opnieuw sorteert, het zou zo moeten eindigen:

`aaa:file3.php,file1.php,file2.php,file4.php,file5.php,file6.php`

Dezelfde situatie wanneer een bestand is gedeactiveerd. Omgekeerd, als u wilde dat het bestand als laatste werd uitgevoerd, u zou iets als `zzz:` kunnen toevoegen voor de naam van het bestand. In elk geval hoeft u het betreffende bestand niet te hernoemen.

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

URL's die worden gevonden in bestandsuploads kunnen worden gedeeld met de hpHosts API of de Google Safe Browsing API, afhankelijk van hoe het pakket is geconfigureerd. In het geval van de hpHosts API is dit gedrag standaard ingeschakeld. De Google Safe Browsing API heeft API-sleutels nodig om correct te werken, en is daarom standaard uitgeschakeld.

*Relevante configuratie-opties:*
- `urlscanner` -> `lookup_hphosts`
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
Mon, 21 May 2018 00:47:58 +0800 Gestart.
> Verifiëren 'ascii_standard_testfile.txt' (FN: ce76ae7a; FD: 7b9bfed5):
-> Gedetecteerd phpMussel-Testfile.ASCII.Standard!
Mon, 21 May 2018 00:48:04 +0800 Afgewerkt.
```

Een scan log bevat meestal de volgende informatie:
- De datum en tijd waarop het bestand is gescand.
- De naam van het gescande bestand.
- CRC32b hashes van de naam en inhoud van het bestand.
- Wat werd er in het bestand gedetecteerd (als er iets werd gedetecteerd).

*Relevante configuratie-opties:*
- `general` -> `scan_log`
- `general` -> `scan_log_serialized`

Wanneer deze richtlijnen leeg worden gelaten, blijft dit type logboek uitgeschakeld.

##### 11.3.1 SCAN KILLS

Indien ingeschakeld in de pakketconfiguratie houdt phpMussel logs bij van de uploads die zijn geblokkeerd.

Invoer van een "scan kills" logbestand ziet er ongeveer als volgt uit (bijvoorbeeld):

```
Datum: Mon, 21 May 2018 00:47:56 +0800
IP adres: 127.0.0.1
== Scanresultaten (waarom gemarkeerd) ==
Gedetecteerd phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
== Hash signatures reconstructie ==
3ed8a00c6c498a96a44d56533806153c:666:ascii_standard_testfile.txt
In quarantaine geplaatst als "/vault/quarantine/0000000000-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx.qfu".
```

Een "scan kills" logsinvoer bevat meestal de volgende informatie:
- De datum en tijd waarop de upload is geblokkeerd.
- Het IP-adres waar de upload vandaan komt.
- De reden waarom het bestand werd geblokkeerd (wat werd gedetecteerd).
- De naam van het bestand geblokkeerd.
- Een MD5 en de grootte van het bestand zijn geblokkeerd.
- Of het bestand in quarantaine is geplaatst en onder welke interne naam.

*Relevante configuratie-opties:*
- `general` -> `scan_kills`

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

phpMussel codeert de cache of logboekinformatie niet. [Encryptie](https://nl.wikipedia.org/wiki/Encryptie) voor de cache en logs kunnen in de toekomst worden geïntroduceerd, maar er zijn momenteel geen specifieke plannen voor. Als u zich zorgen maakt over ongeautoriseerde derden die toegang krijgen tot delen van phpMussel die mogelijk PII of gevoelige informatie bevatten, zoals de cache of logbestanden, raad ik phpMussel aan niet te installeren op een openbare locatie (b.v., installeer phpMussel buiten de standaard `public_html` directory of gelijkwaardig daarvan beschikbaar voor de meeste standaard webservers) en dat de juiste beperkende machtigingen worden afgedwongen voor de directory waar deze zich bevindt (in het bijzonder, voor de vault directory). Als dat niet voldoende is om uw zorgen weg te nemen, configureer dan phpMussel als zodanig dat de soorten informatie die uw zorgen veroorzaken, niet zullen worden verzameld of ingelogd (zoals door loggen uit te schakelen).

#### 11.4 COOKIES

Wanneer een gebruiker zich met succes ingelogd bij de frontend, stelt phpMussel een [cookie](https://nl.wikipedia.org/wiki/Cookie_(internet)) in om de gebruiker te kunnen onthouden voor volgende aanvragen (d.w.z., cookies worden gebruikt om de gebruiker te authenticeren voor een login-sessie). Op de inlogpagina wordt een cookiewaarschuwing prominent weergegeven, waardoor de gebruiker wordt gewaarschuwd dat een cookie zal worden ingesteld als deze zich bezighoudt met de relevante actie. Cookies zijn niet ingesteld op andere punten in de codebase.

*Relevante configuratie-opties:*
- `general` -> `disable_frontend`

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


Laatste Bijgewerkt: 23 September 2019 (2019.09.23).
