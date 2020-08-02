## Documentazione per phpMussel v3 (Italiano).

### Contenuti
- 1. [PREAMBOLO](#SECTION1)
- 2. [COME INSTALLARE](#SECTION2)
- 3. [COME USARE](#SECTION3)
- 4. [ESTENDENDO PHPMUSSEL](#SECTION4)
- 7. [OPZIONI DI CONFIGURAZIONE](#SECTION7)
- 8. [FIRMA FORMATO](#SECTION8)
- 9. [CONOSCIUTI COMPATIBILITÀ PROBLEMI](#SECTION9)
- 10. [DOMANDE FREQUENTI (FAQ)](#SECTION10)
- 11. [INFORMAZIONE LEGALE](#SECTION11)

*Nota per quanto riguarda le traduzioni: In caso di errori (per esempio, discrepanze tra le traduzioni, errori di battitura, ecc), la versione Inglese del README è considerata la versione originale e autorevole. Se trovate errori, il vostro aiuto a correggerli sarebbe il benvenuto.*

---


### 1. <a name="SECTION1"></a>PREAMBOLO

Grazie per aver scelto phpMussel, un programma in PHP progettato per rilevare trojan, virus, malware ed altre minacce nei file caricati sul tuo sistema dovunque il programma stesso è collegato, basato sulle firme di ClamAV ed altri.

[PHPMUSSEL](https://phpmussel.github.io/) COPYRIGHT 2013 e oltre GNU/GPLv2 [Caleb M (Maikuolan)](https://github.com/Maikuolan).

Questo script è un software "libero"; è possibile ridistribuirlo e/o modificarlo sotto i termini della GNU General Public License come pubblicato dalla Free Software Foundation; o la versione 2 della licenza, o (a propria scelta) una versione successiva. Questo script è distribuito nella speranza che possa essere utile, ma SENZA ALCUNA GARANZIA; senza neppure la implicita garanzia di COMMERCIABILITÀ o IDONEITÀ PER UN PARTICOLARE SCOPO. Vedere la GNU General Public License per ulteriori dettagli, situato nella `LICENSE.txt` file e disponibili anche da:
- <https://www.gnu.org/licenses/>.
- <https://opensource.org/licenses/>.

Uno speciale grazie a [ClamAV](https://www.clamav.net/) per l'ispirazione del progetto e per le firme che questo script usi, senza la quale, lo script sarebbe probabilmente non esisterebbe, o nel migliore, avrebbe un molto limitato valore.

Uno speciale grazie a SourceForge, Bitbucket e GitHub per ospitare i progetto file, e le risorse di un certo numero di firme utilizzata da phpMussel: [PhishTank](https://www.phishtank.com/), [NLNetLabs](https://nlnetlabs.nl/), [Malware.Expert](https://malware.expert/) e altri, e un grazie a tutti coloro che sostengono il progetto, a chiunque altro che io possa avere altrimenti dimenticato di menzionare, e per voi, per l'utilizzo dello script.

---


### 2. <a name="SECTION2"></a>COME INSTALLARE

#### 2.0 INSTALLARE CON IL COMPOSER

Il modo raccomandato per installare phpMussel v3 è tramite Composer.

Per comodità, è possibile installare le dipendenze di phpMussel più comunemente necessarie tramite il vecchio repository phpMussel principale:

`composer require phpmussel/phpmussel`

In alternativa, puoi scegliere individualmente quali dipendenze ti occorreranno alla tua implementazione. È possibile che tu voglia solo dipendenze specifiche e non avrai bisogno di tutto.

Per fare qualsiasi cosa con phpMussel, avrai bisogno della base di codice core di phpMussel:

`composer require phpmussel/core`

Fornisce una struttura amministrativa front-end per phpMussel:

`composer require phpmussel/frontend`

Fornisce la scansione automatica del caricamenti di file per il tuo sito Web:

`composer require phpmussel/web`

Fornisce la possibilità di utilizzare phpMussel come un'applicazione interattiva in modalità CLI:

`composer require phpmussel/cli`

Fornisce un ponte tra phpMussel e PHPMailer, consentendo a phpMussel di utilizzare PHPMailer per l'autenticazione a due fattori, la notifica via e-mail sui caricamenti di file bloccati, ecc:

`composer require phpmussel/phpmailer`

Affinché phpMussel sia in grado di rilevare qualsiasi cosa, devi installare le firme. Non esiste un pacchetto specifico per questo. Per installare le firme, fare riferimento alla sezione successiva di questo documento.

In alternativa, se non si desidera utilizzare Composer, è possibile scaricare ZIP preconfezionati da qui:

https://github.com/phpMussel/Examples

I ZIP preconfezionati includono tutte le dipendenze di cui sopra, nonché tutti i file di firma phpMussel standard, insieme ad alcuni esempi forniti su come utilizzare phpMussel alla tua implementazione.

#### <a name="INSTALLING_SIGNATURES"></a>2.1 INSTALLAZIONE DI FIRME

Le firme sono richieste da phpMussel per rilevare minacce specifiche. Esistono 2 metodi principali per installare le firme:

1. Genera firme usando "SigTool" e installa manualmente.
2. Scaricare le firme da "phpMussel/Signatures" o "phpMussel/Examples" e installare manualmente.

##### 2.1.0 Genera firme usando "SigTool" e installa manualmente.

*Vedere: [Documentazione SigTool](https://github.com/phpMussel/SigTool#documentation).*

*Nota anche: SigTool elabora le firme da ClamAV solo. Per ottenere firme da altre fonti, come quelle scritte appositamente per phpMussel, che include le firme necessarie per rilevare i campioni di test di phpMussel, questo metodo dovrà essere integrato da uno degli altri metodi qui menzionati.*

##### 2.1.1 Scaricare le firme da "phpMussel/Signatures" o "phpMussel/Examples" e installare manualmente.

In primo luogo, vai a [phpMussel/Signatures](https://github.com/phpMussel/Signatures). Il repository contiene vari file di firma compressi GZ. Scarica i file necessari, decomprimere, e copiarli nella cartella delle firme dell'installazione.

In alternativa, scarica l'ultimo ZIP da [phpMussel/Examples](https://github.com/phpMussel/Examples). È quindi possibile copiare/incollare le firme da quell'archivio alla propria installazione.

---


### 3. <a name="SECTION3"></a>COME USARE

#### 3.0 CONFIGURAZIONE PER PHPMUSSEL

Dopo aver installato phpMussel, avrai bisogno di un file di configurazione per configurarlo. I file di configurazione di phpMussel possono essere formattati come file INI o YML. Se stai lavorando da uno degli esempi ZIP, avrai già disposizione due file di configurazione di esempio, `phpmussel.ini` e `phpmussel.yml`; puoi scegliere uno di quelli su cui lavorare, se lo desideri. Se non stai lavorando da uno degli esempi ZIP, dovrai creare un nuovo file.

Se sei soddisfatto della configurazione predefinita per phpMussel e non vuoi cambiare nulla, puoi usare un file vuoto come file di configurazione. Tutto ciò che non è configurato dal tuo file di configurazione utilizzerà il suo valore predefinito, quindi devi configurare esplicitamente qualcosa solo se vuoi che sia diverso dal suo valore predefinito (il che significa che un file di configurazione vuoto farà sì che phpMussel utilizzi tutta la sua configurazione predefinita).

Se si desidera utilizzare il front-end phpMussel, è possibile configurare tutto dalla pagina di configurazione del front-end. Tuttavia, poiché dalla v3 in poi, le informazioni di accesso del front-end sono memorizzate nel file di configurazione, quindi per accedere al front-end, è necessario almeno configurare un account da utilizzare per accedere, e quindi, da lì, sarai in grado di accedere e utilizzare la pagina di configurazione del front-end per configurare tutto il resto.

Gli estratti seguenti aggiungeranno un nuovo account al front-end con il nome utente "admin" e la password "password".

Per i file INI:

```INI
[user.admin]
password='$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK'
permissions='1'
```

Per i file YML:

```YAML
user.admin:
 password: "$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK"
 permissions: 1
```

Puoi nominare la configurazione come preferisci (purché conservi la sua estensione, in modo che phpMussel sappia quale formato utilizza), e puoi memorizzarlo dove vuoi. Puoi dire a phpMussel dove trovare il tuo file di configurazione fornendo il suo percorso durante l'istanziazione del loader. Se non viene fornito alcun percorso, phpMussel proverà a localizzarlo nella directory principale della cartella vendor.

In alcuni ambienti, come Apache, è persino possibile posizionare un punto nella parte anteriore della configurazione per nasconderlo e impedire l'accesso pubblico.

Fare riferimento alla sezione configurazione di questo documento per ulteriori informazioni sulle varie direttive di configurazione disponibili per phpMussel.

#### 3.1 PHPMUSSEL CORE

Indipendentemente da come si desidera utilizzare phpMussel, quasi tutte le implementazioni conterranno qualcosa del genere, come minimo:

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
```

Come implicano i nomi di queste classi, il loader è responsabile della preparazione delle necessità di utilizzare phpMussel e lo scanner è responsabile di tutte le funzionalità di scansione.

Il costruttore per il loader accetta cinque parametri, tutti facoltativi.

```PHP
public function __construct(
    string $ConfigurationPath = '',
    string $CachePath = '',
    string $QuarantinePath = '',
    string $SignaturesPath = '',
    string $VendorPath = ''
)
```

Il primo parametro è il percorso completo del file di configurazione. Se omesso, phpMussel cercherà un file di configurazione denominato come `phpmussel.ini` o `phpmussel.yml`, nella cartella principale della cartella vendor.

Il secondo parametro è il percorso di una cartella che si consente a phpMussel di utilizzare per la memorizzazione nella cache e la memorizzazione temporanea dei file. Se omesso, phpMussel tenterà di creare una nuova cartella da usare, denominata come `phpmussel-cache`, nella cartella principale della cartella vendor. Se si desidera specificare questo percorso da soli, sarebbe meglio scegliere una cartella vuota, in modo da evitare la perdita indesiderata di altri dati nella cartella specificata.

Il terzo parametro è il percorso di una cartella che si consente a phpMussel di utilizzare per la sua quarantena. Se omesso, phpMussel tenterà di creare una nuova cartella da usare, denominata come `phpmussel-quarantine`, nella cartella principale della cartella vendor. Se si desidera specificare questo percorso da soli, sarebbe meglio scegliere una cartella vuota, in modo da evitare la perdita indesiderata di altri dati nella cartella specificata. Si consiglia vivamente di impedire l'accesso del pubblico alla cartella utilizzata per la quarantena.

Il quarto parametro è il percorso della cartella contenente i file delle firme per phpMussel. Se omesso, phpMussel proverà a cercare i file delle firme in una cartella denominata come `phpmussel-signatures`, nella cartella principale della cartella vendor.

Il quinto parametro è il percorso della cartella vendor. Non dovrebbe mai indicare nient'altro. Se omesso, phpMussel proverà a localizzare questa cartella per se stessa. Questo parametro viene fornito per facilitare una più facile integrazione con implementazioni che potrebbero non avere necessariamente la stessa struttura di un tipico progetto di Composer.

Il costruttore per lo scanner accetta solo un parametro ed è obbligatorio: l'oggetto loader istanziato. Poiché viene passato per riferimento, il loader deve essere istanziato su una variabile (creare un'istanza del loader direttamente nello scanner come valore non è il modo corretto di usare phpMussel).

```PHP
public function __construct(\phpMussel\Core\Loader &$Loader)
```

#### 3.2 SCANSIONE AUTOMATICA DEL CARICAMENTO DEI FILE

Per creare un'istanza del gestore di caricamento:

```PHP
$Web = new \phpMussel\Web\Web($Loader, $Scanner);
```

Per scansionare i caricamenti di file:

```PHP
$Web->scan();
```

Facoltativamente, phpMussel può tentare di riparare i nomi dei caricamenti nel caso in cui ci sia qualcosa di sbagliato, se desideri:

```PHP
$Web->demojibakefier();
```

Come esempio completo:

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

*Tentativo di caricare il file `ascii_standard_testfile.txt`, a benign sample provided for the sole purpose of testing phpMussel:*

![Screenshot](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/web-v3.0.0-alpha2.png)

#### 3.3 MODALITÀ CLI

Per creare un'istanza del gestore CLI:

```PHP
$CLI = new \phpMussel\CLI\CLI($Loader, $Scanner);
```

Come esempio completo:

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

#### 3.4 FRONT-END

Per creare un'istanza del front-end:

```PHP
$FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
```

Come esempio completo:

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

#### 3.5 API SCANNER

Se lo desideri, puoi anche implementare l'API dello scanner phpMussel all'interno di altri programmi e script.

Come esempio completo:

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

La parte importante da notare da quell'esempio è il metodo `scan()`. Il metodo `scan()` accetta due parametri:

```PHP
public function scan(mixed $Files, int $Format = 0): mixed
```

Il primo parametro può essere una stringa o un array e indica allo scanner cosa deve eseguire la scansione. Può essere una stringa che indica un file o una cartella specifici, o una matrice di tali stringhe per specificare più file/cartelle.

Quando come stringa, dovrebbe indicare dove possono essere trovati i dati. Quando come array, le chiavi dell'array dovrebbero indicare i nomi originali degli elementi da sottoporre a scansione e i valori dovrebbero indicare dove si possono trovare i dati.

Il secondo parametro è un numero intero e indica allo scanner come dovrebbe restituire i risultati della scansione.

Specifica 1 per restituire i risultati della scansione come matrice per ciascun elemento scansionato come numeri interi.

Questi numeri interi hanno i seguenti significati:

Risultati | Descrizioni
--:|:--
-5 | Indica che la scansione non è stata completata per altri motivi.
-4 | Indica che i dati non possono essere scansionati a causa della crittografia.
-3 | Indica che sono stati incontrati problemi con i file di firme phpMussel.
-2 | Indica che i corrotto dato è stato rilevato durante la scansione e quindi la scansione non abbia completato.
-1 | Indica che estensioni o addon richiesti per PHP a eseguire la scansione erano assente e quindi la scansione non abbia completato.
0 | Indica che l'obiettivo di scansione non esiste e quindi non c'era nulla a scansione.
1 | Indica che l'obiettivo è stato scansionata correttamente e non problemi stati rilevati.
2 | Indica che l'obiettivo è stato scansionata correttamente e problemi stati rilevati.

Specifica 2 per restituire i risultati della scansione come booleano.

Risultati | Descrizioni
:-:|:--
`true` | Sono stati rilevati problemi (l'obiettivo di scansione è pericoloso).
`false` | Non sono stati rilevati problemi (la destinazione di scansione è probabilmente benigno).

Specifica 3 per restituire i risultati della scansione come matrice per ciascun elemento scansionato come testo leggibile dall'uomo.

*Esempio di output:*

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

Specifica 4 per restituire i risultati della scansione come una stringa di testo leggibile dall'uomo (come 3, ma imploso).

*Esempio di output:*

```
Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)! Detected phpMussel-Testfile.CoEx (coex_testfile.rtf)! Detected encrypted archive; Encrypted archives not permitted (encrypted.zip)!
```

Specifica *qualsiasi altro valore* per restituire testo formattato (cioè, i risultati della scansione visti quando si usa la CLI).

*Esempio di output:*

*Guarda anche: [Come accedere a dettagli specifici sui file quando vengono scansionati?](#SCAN_DEBUGGING)*

#### 3.6 AUTENTICAZIONE A DUE FATTORI

È possibile rendere il front-end più sicuro attivando l'autenticazione a due fattori ("2FA"). Quando si accede a un account attivato per 2FA, viene inviata una posta elettronica all'indirizzo di posta elettronica associato a tale account. Questo indirizzo di posta elettronica contiene un "codice 2FA", che l'utente deve quindi inserire, inoltre al nome utente e alla password, per poter accedere utilizzando tale account. Ciò significa che l'ottenimento di una password dell'account non sarebbe sufficiente per consentire a qualsiasi hacker o potenziale utente malintenzionato di accedere a tale account, in quanto avrebbe anche bisogno di avere accesso all'indirizzo di posta elettronica associato a tale account per poter ricevere e utilizzare il codice 2FA associato alla sessione, rendendo così il front-end più sicuro.

Dopo aver installato PHPMailer, dovrai compilare le direttive di configurazione per PHPMailer tramite la pagina di configurazione phpMussel o il file di configurazione. Ulteriori informazioni su queste direttive di configurazione sono incluse nella sezione di configurazione di questo documento. Dopo aver compilato le direttive di configurazione di PHPMailer, imposta da `enable_two_factor` x `true`. L'autenticazione a due fattori dovrebbe ora essere attivata.

Successivamente, dovrai associare un indirizzo di posta elettronica a un account, in modo che phpMussel sappia dove inviare i codici 2FA quando accede con quell'account. Per fare ciò, usa l'indirizzo di posta elettronica come nome utente per l'account (come `foo@bar.tld`), o includere l'indirizzo di posta elettronica come parte del nome utente nello stesso modo in cui si farebbe quando si invia una posta elettronica normalmente (come `Foo Bar <foo@bar.tld>`).

---


### 4. <a name="SECTION4"></a>ESTENDENDO PHPMUSSEL

phpMussel è progettato pensando all'estensibilità. Le richieste di pull a tutti i repository dell'organizzazione phpMussel e i [contributi](https://github.com/phpMussel/.github/blob/master/CONTRIBUTING.md) in generale sono sempre i benvenuti. Inoltre, se è necessario modificare o estendere phpMussel in modi che non sono idonei a contribuire con quei repository particolari, è sicuramente possibile farlo (ad es., per modifiche o estensioni specifiche della tua specifica implementazione, che non possono essere pubblicizzate a causa della riservatezza o delle esigenze di privacy della tua organizzazione, o che potrebbero essere preferibilmente pubblicizzati nel proprio repository, ad esempio per plugin e nuovi pacchetti Composer che richiedono phpMussel).

Since v3, all phpMussel functionality exists as classes, which means that in some cases, the [object inheritance](https://www.php.net/manual/en/language.oop5.inheritance.php) mechanisms provided by PHP could be an easy and appropriate way to extend phpMussel.

phpMussel also provides its own mechanisms for extensibility. Prior to v3, the preferred mechanism was the integrated plugin system for phpMussel. Since v3, the preferred mechanism is the events orchestrator.

Boilerplate code for extending phpMussel and for writing new plugins is publicly available at the [boilerplates repository](https://github.com/phpMussel/plugin-boilerplates). Included also is a list of all [currently supported events](https://github.com/phpMussel/plugin-boilerplates/tree/master/boilerplate-v3#currently-supported-events) and more detailed instructions regarding how to use the boilerplate code.

You'll notice that the structure of the v3 boilerplate code is identical to the structure of the various phpMussel v3 repositories at the phpMussel organisation. That is not a coincidence. Whenever possible, I would recommend utilising the v3 boilerplate code for extensibility purposes, and utilising similar design principles to that of phpMussel v3 itself. If you choose to publicise your new extension or plugin, you can integrate Composer support for it, and it should then be theoretically possible for others to utilise your extension or plugin in the exact same way as phpMussel v3 itself, simply requiring it in along with their other Composer dependencies, and applying any necessary event handlers at their implementation. (Of course, don't forget to include instructions with your publications, so that others will know about any necessary event handlers that may exist, and any other information which may be necessary for correct installation and utilisation of your publication).

---


### 7. <a name="SECTION7"></a>OPZIONI DI CONFIGURAZIONE

Il seguente è un elenco delle direttive di configurazione accettate da phpMussel, insieme con una descrizione del loro scopo e funzione.

```
Configurazione (v3)
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

#### "core" (Categoria)
Configurazione generale (qualsiasi configurazione di base non appartenente ad altre categorie).

##### "scan_log" `[string]`
- Il nome del file per registrare tutti i risultati di la scansione. Specificare un nome del file, o lasciare vuoto per disattivarlo.

##### "scan_log_serialized" `[string]`
- Il nome del file per registrare tutti i risultati di la scansione (utilizzando un formato serializzato). Specificare un nome del file, o lasciare vuoto per disattivarlo.

##### "error_log" `[string]`
- Un file per la registrazione di eventuali errori non fatali rilevati. Specificare un nome di file, o lasciare vuoto per disabilitare.

##### "truncate" `[string]`
- Troncare i file di log quando raggiungono una determinata dimensione? Il valore è la dimensione massima in B/KB/MB/GB/TB che un file di log può crescere prima di essere troncato. Il valore predefinito di 0KB disattiva il troncamento (i file di log possono crescere indefinitamente). Nota: Si applica ai singoli file di log! La dimensione dei file di log non viene considerata collettivamente.

##### "log_rotation_limit" `[int]`
- La rotazione dei log limita il numero di file di log che dovrebbero esistere in qualsiasi momento. Quando vengono creati nuovi file di log, se il numero totale di file di log supera il limite specificato, verrà eseguita l'azione specificata. Qui puoi specificare il limite desiderato. Un valore di 0 disabiliterà la rotazione dei log.

##### "log_rotation_action" `[string]`
- La rotazione dei log limita il numero di file di log che dovrebbero esistere in qualsiasi momento. Quando vengono creati nuovi file di log, se il numero totale di file di log supera il limite specificato, verrà eseguita l'azione specificata. Qui puoi specificare l'azione desiderato. Delete = Elimina i file di log più vecchi, finché il limite non viene più superato. Archive = In primo luogo archiviare e quindi, eliminare i file di log più vecchi, finché il limite non viene più superato.

```
log_rotation_action
├─Delete ("Delete")
└─Archive ("Archive")
```

##### "timezone" `[string]`
- Questo è usato per specificare il fuso orario da usare (per esempio, Africa/Cairo, America/New_York, Asia/Tokyo, Australia/Perth, Europe/Berlin, Pacific/Guam, ecc). Specifica "SYSTEM" per consentire a PHP di gestirlo automaticamente.

```
timezone
├─SYSTEM ("Utilizza il fuso orario predefinito del sistema.")
├─UTC ("UTC")
└─…Altro
```

##### "time_offset" `[int]`
- Fuso orario offset in minuti.

##### "time_format" `[string]`
- Il formato della data/ora di notazione usata da phpMussel. Ulteriori opzioni possono essere aggiunti su richiesta.

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
└─…Altro
```

##### "ipaddr" `[string]`
- Dove trovare l'indirizzo IP di collegamento richiesta? (Utile per servizi come Cloudflare e simili). Predefinito = REMOTE_ADDR. AVVISO: Non modificare questa se non sai quello che stai facendo!

```
ipaddr
├─HTTP_INCAP_CLIENT_IP ("HTTP_INCAP_CLIENT_IP (Incapsula)")
├─HTTP_CF_CONNECTING_IP ("HTTP_CF_CONNECTING_IP (Cloudflare)")
├─CF-Connecting-IP ("CF-Connecting-IP (Cloudflare)")
├─HTTP_X_FORWARDED_FOR ("HTTP_X_FORWARDED_FOR (Cloudbric)")
├─X-Forwarded-For ("X-Forwarded-For (Squid)")
├─REMOTE_ADDR ("REMOTE_ADDR (Default)")
└─…Altro
```

Guarda anche:
- [NGINX Reverse Proxy](https://docs.nginx.com/nginx/admin-guide/web-server/reverse-proxy/)
- [Squid configuration directive forwarded_for](http://www.squid-cache.org/Doc/config/forwarded_for/)

##### "delete_on_sight" `[bool]`
- Abilitando questa opzione sarà istruirà lo script per tentare immediatamente eliminare qualsiasi file trovato durante scansioni che corrisponde a qualsiasi i criteri di rilevazione, attraverso le firme o altrimenti. I file determinati ad essere "pulito" non verranno toccati. Nel caso degli archivi, l'intero archivio verrà eliminato (indipendentemente se il file all'origine è soltanto uno dei vari file contenuti all'interno dell'archivio o non). Nel caso di file caricamente scansione, solitamente, non è necessario attivare questa opzione, perché solitamente, PHP sarà automaticamente eliminerà il contenuto della cache quando l'esecuzione è terminata, il che significa che lo farà solitamente eliminare tutti i file caricati tramite al server tranne ciò che già è spostato, copiato o cancellato. L'opzione viene aggiunto qui come ulteriore misura di sicurezza per coloro le cui copie di PHP non sempre comportarsi nel previsto modo. False = Dopo la scansione, lasciare il file solo [Predefinito]; True = Dopo la scansione, se non pulite, immediatamente eliminarlo.

##### "lang" `[string]`
- Specifica la lingua predefinita per phpMussel.

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
- Localizzare secondo HTTP_ACCEPT_LANGUAGE quando possibile? True = Sì [Predefinito]; False = No.

##### "scan_cache_expiry" `[int]`
- Per quanto tempo deve phpMussel cache i risultati della scansione? Il valore è il numero di secondi per memorizzare nella cache i risultati della scansione per. Predefinito valore è 21600 secondi (6 ore); Un valore pari a 0 disabilita il caching dei risultati di scansione.

##### "maintenance_mode" `[bool]`
- Abilita la modalità di manutenzione? True = Sì; False = No [Predefinito]. Disattiva tutto tranne il front-end. A volte utile per l'aggiornamento del CMS, dei framework, ecc.

##### "statistics" `[bool]`
- Monitorare le statistiche di utilizzo di phpMussel? True = Sì; False = No [Predefinito].

##### "disabled_channels" `[string]`
- Questo può essere usato per impedire a phpMussel di usare canali particolari quando si inviano richieste (ad esempio, quando si aggiorna, quando si recuperano i metadati del componente, ecc).

```
disabled_channels
├─GitHub ("GitHub")
├─BitBucket ("BitBucket")
├─VirusTotal_HTTPS ("VirusTotal (HTTPS)")
└─VirusTotal_HTTP ("VirusTotal (HTTP)")
```

#### "signatures" (Categoria)
Configurazione per firme, file di firma, ecc.

##### "active" `[string]`
- Un elenco dei file di firme attivi, delimitati da virgole. Nota: Prima di poter essere attivati, è necessario installare i file delle firme. Affinché i file di test funzionino correttamente, i file delle firme devono essere installati e attivati.

##### "fail_silently" `[bool]`
- Dovrebbe phpMussel rapporto quando le file di firme sono mancanti o danneggiati? Se `fail_silently` è disattivato, mancanti e danneggiati file saranno riportato sulla scansione, e se `fail_silently` è abilitato, mancanti e danneggiati file saranno ignorato, con scansione riportando per quei file che non ha sono problemi. Questo dovrebbe essere generalmente lasciata sola a meno che sperimentando inaspettate terminazioni o simili problemi. False = Disattivato; True = Attivato [Predefinito].

##### "fail_extensions_silently" `[bool]`
- Dovrebbe phpMussel rapporto quando le estensioni sono mancanti? Se `fail_extensions_silently` è disattivato, mancanti estensioni saranno riportato sulla scansione, e se `fail_extensions_silently` è abilitato, mancanti estensioni saranno ignorato, con scansione riportando per quei file che non ha sono problemi. La disattivazione di questa direttiva potrebbe potenzialmente aumentare la sicurezza, ma può anche portare ad un aumento di falsi positivi. False = Disattivato; True = Attivato [Predefinito].

##### "detect_adware" `[bool]`
- Dovrebbe phpMussel utilizzare le firme per il rilevamento di adware? False = No; True = Sì [Predefinito].

##### "detect_joke_hoax" `[bool]`
- Dovrebbe phpMussel utilizzare le firme per il rilevamento di scherzo/inganno malware/virus? False = No; True = Sì [Predefinito].

##### "detect_pua_pup" `[bool]`
- Dovrebbe phpMussel utilizzare le firme per il rilevamento di PUAs/PUPs? False = No; True = Sì [Predefinito].

##### "detect_packer_packed" `[bool]`
- Dovrebbe phpMussel utilizzare le firme per il rilevamento di confezionatori e dati confezionati? False = No; True = Sì [Predefinito].

##### "detect_shell" `[bool]`
- Dovrebbe phpMussel utilizzare le firme per il rilevamento di shell script? False = No; True = Sì [Predefinito].

##### "detect_deface" `[bool]`
- Dovrebbe phpMussel utilizzare le firme per il rilevamento di sfiguramenti e sfiguratori? False = No; True = Sì [Predefinito].

##### "detect_encryption" `[bool]`
- Dovrebbe phpMussel rilevare e bloccare i file crittografati? False = No; True = Sì [Predefinito].

##### "heuristic_threshold" `[int]`
- Ci sono particolare firme di phpMussel che sono destinato a identificare sospetti e potenzialmente maligno qualità dei file che vengono essere caricati senza in sé identificando i file che vengono essere caricati in particolare ad essere maligno. Questo "threshold" (soglia) valore dice phpMussel cosa che il totale massimo peso di sospetti e potenzialmente maligno qualità dei file che vengono essere caricati che è ammissibile è prima che quei file devono essere contrassegnati come maligno. La definizione di peso in questo contesto è il totale numero di sospetti e potenzialmente maligno qualità identificato. Per predefinito, questo valore viene impostato su 3. Un inferiore valore generalmente sarà risultare di una maggiore presenza di falsi positivi ma una maggior numero di file essere contrassegnato come maligno, mentre una maggiore valore generalmente sarà risultare di un inferiore presenza di falsi positivi ma un inferiore numero di file essere contrassegnato come maligno. È generalmente meglio di lasciare questo valore a suo predefinito a meno che si incontrare problemi ad esso correlati.

#### "files" (Categoria)
I dettagli su come gestire i file durante la scansione.

##### "filesize_limit" `[string]`
- File dimensione limite in KB. 65536 = 64MB [Predefinito]; 0 = Nessun limite (sempre sul greylist), qualsiasi (positivo) numerico valore accettato. Questo può essere utile quando la configurazione di PHP limita la quantità di memoria che un processo può contenere o se i configurazione ha limitato la dimensione dei file caricamenti.

##### "filesize_response" `[bool]`
- Cosa fare con i file che superano il file dimensione limite (se esistente). False = Whitelist; True = Blacklist [Predefinito].

##### "filetype_whitelist" `[string]`
- Se il vostro sistema permette solo determinati tipi di file per caricamenti, o se il vostra sistema esplicitamente negare determinati tipi di file, specificando i tipi di file nel whitelist, blacklist e/o greylist può aumentare la velocità a cui la scansione viene eseguita da permettendo lo script da ignora alcuni tipi di file. Il formato è CSV (valori separati da virgola). Se si desidera eseguire la scansione tutti, invece del whitelist, la blacklist o la greylist, lasciare le variabili vuoti; Fare questo sarà disabilitali. Logico ordine del trattamento è: Se il tipo di file è nel whitelist, non scansiona e non blocca il file, e non verificare il file contra la blacklist o la greylist. Se il tipo di file è nel blacklist, non scansiona il file ma bloccarlo comunque, e non verificar il file contra la greylist. Se il greylist è vuoto o se il greylist non è vuota e il tipo di file è nel greylist, scansiona il file come per normale e determinare se bloccarlo sulla base dei risultati della scansione, ma se il greylist non è vuoto e il tipo di file non è nel greylist, trattare il file come se è nel blacklist, quindi non scansionarlo ma bloccarlo comunque. Whitelist:

##### "filetype_blacklist" `[string]`
- Blacklist:

##### "filetype_greylist" `[string]`
- Greylist:

##### "check_archives" `[bool]`
- Tenta per verifica il contenuti degli archivi? False = No (no verifica); True = Sì (fare verifica) [Predefinito]. Supportato: Zip (richiede libzip), Tar, Rar (richiede l'estensione rar).

##### "filesize_archives" `[bool]`
- Eredita file dimensione limite blacklist/whitelist al contenuti degli archivi? False = No (appena greylist tutto); True = Sì [Predefinito].

##### "filetype_archives" `[bool]`
- Eredita file tipi blacklist/whitelist al contenuti degli archivi? False = No (appena greylist tutto) [Predefinito]; True = Sì.

##### "max_recursion" `[int]`
- Massimo ricorsione profondità limite per gli archivi. Predefinito = 3.

##### "block_encrypted_archives" `[bool]`
- Rilevi e blocchi archivi criptati? Perché phpMussel non è in grado di verifica del contenuto degli archivi criptati, è possibile che la archivi criptati può essere usato da un attaccante verifieracome mezzo di tenta di bypassare phpMussel, verificatore anti-virus e altri tali protezioni. Istruire phpMussel di bloccare qualsiasi archivi criptati che si trovato potrebbe potenzialmente contribuire a ridurre il rischio associato a questi tali possibilità. False = No; True = Sì [Predefinito].

##### "max_files_in_archives" `[int]`
- Numero massimo di file da scansionare dagli archivi prima di interrompere la scansione. Predefinito = 0 (nessun massimo).

##### "chameleon_from_php" `[bool]`
- Cercare per PHP magici numeri che non sono riconosciuti PHP file né archivi. False = Disattivato; True = Attivato.

##### "can_contain_php_file_extensions" `[string]`
- Un elenco di estensioni di file consentito contenere codice PHP, separato da virgole. Se PHP chameleon attacco rilevamento è abilitato, i file che contengono codice PHP, che hanno estensioni non presenti in questo elenco, saranno rilevati come attacchi chameleon di PHP.

##### "chameleon_from_exe" `[bool]`
- Cercare per eseguibili magici numeri che non sono riconosciuti eseguibili né archivi e per eseguibili cui non sono corrette. False = Disattivato; True = Attivato.

##### "chameleon_to_archive" `[bool]`
- Rileva le header errate negli archivi e nei file compressi. Supportato: BZ/BZIP2, GZ/GZIP, LZF, RAR, ZIP. False = Disattivato; True = Attivato.

##### "chameleon_to_doc" `[bool]`
- Cercare per office documenti di cui non sono corrette (Supportato: DOC, DOT, PPS, PPT, XLA, XLS, WIZ). False = Disattivato; True = Attivato.

##### "chameleon_to_img" `[bool]`
- Cercare per immagini file di cui non sono corrette (Supportato: BMP, DIB, PNG, GIF, JPEG, JPG, XCF, PSD, PDD, WEBP). False = Disattivato; True = Attivato.

##### "chameleon_to_pdf" `[bool]`
- Cercare per PDF file di cui non sono corrette. False = Disattivato; True = Attivato.

##### "archive_file_extensions" `[string]`
- Riconosciute archivio file estensioni (formato è CSV; deve solo aggiungere o rimuovere quando problemi apparire; rimozione inutilmente può causare falsi positivi per archivio file, mentre aggiungendo inutilmente saranno essenzialmente whitelist quello che si sta aggiungendo dall'attacco specifico rilevamento; modificare con cautela; anche notare che questo non ha qualsiasi effetto su cui gli archivi possono e non possono essere analizzati dal contenuti livello). La lista, come da predefinito, è i formati utilizzati più comunemente attraverso la maggior parte dei sistemi e CMS, ma apposta non è necessariamente completo.

##### "block_control_characters" `[bool]`
- Bloccare tutti i file contenenti i controlli caratteri (eccetto per nuove linee)? (`[\x00-\x08\x0b\x0c\x0e\x1f\x7f]`) Se si sta caricando solo normale testo, quindi si puó attivare questa opzione a fornire additionale protezione al vostro sistema. Ma, se si carica qualcosa di diverso da normale testo, abilitando questo opzione può causare falsi positivi. False = Non bloccare [Predefinito]; True = Bloccare.

##### "corrupted_exe" `[bool]`
- Corrotto file e parsare errori. False = Ignorarli; True = Bloccarli [Predefinito]. Rilevare e bloccare i potenzialmente corrotti PE (portatile eseguibili) file? Spesso (ma non sempre), quando alcuni aspetti di un PE file sono corrotto o non può essere parsato correttamente, tale può essere indicativo di una virale infezione. I processi utilizzati dalla maggior parte dei antivirus programmi per rilevare i virus all'intero PE file richiedono parsare quei file in certi modi, di cui, se il programmatore di un virus è consapevole di, sarà specificamente provare di prevenire, al fine di abilita loro virus di rimanere inosservato.

##### "decode_threshold" `[string]`
- Soglia per la lunghezza dei grezzi dati dove decodificare comandi dovrebbe essere rilevati (nel caso in cui vi siano notevoli problemi di prestazioni durante la scansione). Predefinito = 512KB. Un zero o un nullo valore disabilita la soglia (rimuovere tale limitazione basata sulla dimensione dei file).

##### "scannable_threshold" `[string]`
- Soglia per la lunghezza dei dati grezzi dove phpMussel è permesso di leggere e scansione (nel caso in cui vi siano notevoli problemi di prestazioni durante la scansione). Predefinito = 32MB. Un zero o un nullo valore disabilita la soglia. In generale, questo valore non dovrebbe essere meno quella media dimensione dei file che si desidera e si aspettano di ricevere al vostro server o al vostro web sito, non dovrebbe essere più di la filesize_limit direttiva, e non dovrebbe essere più di circa un quinto del totale ammissibile allocazione della memoria concesso al PHP tramite il file di configurazione "php.ini". Questa direttiva esiste per tenta di evitare avendo phpMussel utilizzare troppa memoria (di cui sarebbe impedirebbe di essere capace di completare la file scansione correttamente per i file piú d'una certa dimensione).

##### "allow_leading_trailing_dots" `[bool]`
- Consenti punti iniziali e finali nei nomi dei file? Questo a volte può essere usato per nascondere file, o per ingannare alcuni sistemi per consentire l'attraversamento di directory. False = Non permettere [Predefinito]. True = Permettere.

##### "block_macros" `[bool]`
- Prova a bloccare qualsiasi file contenente macro? Alcuni tipi di documenti e fogli di calcolo possono contenere macro eseguibili, fornendo così un pericoloso vettore potenziale di malware. False = Ignorarli; True = Bloccarli [Predefinito].

##### "only_allow_images" `[bool]`
- Se impostato su true, tutti i file rilevati dallo scanner, che non sono immagini, verranno contrassegnati immediatamente, senza essere scansionati. Ciò può aiutare a ridurre il tempo necessario per completare una scansione in alcuni casi. Impostato su false per predefinita.

#### "quarantine" (Categoria)
Configurazione per la quarantena.

##### "quarantine_key" `[string]`
- phpMussel è capace di mettere in quarantena i caricamenti di file bloccati, se questo è qualcosa che si vuole fare. L'ordinario utenti di phpMussel che semplicemente desiderano proteggere i loro website o hosting environment senza avendo profondo interesse ad analizzare qualsiasi contrassegnati tentati file caricamenti dovrebbe lasciare questa funzionalità disattivata, ma tutti gli utenti interessati ad ulteriori analisi di contrassegnati tentati file caricamenti per la ricerca di malware o per simili cose dovrebbe attivare questa funzionalità. Quarantena di contrassegnati tentati file caricamenti a volte può aiutare anche in debug falsi positivi, se questo è qualcosa che si accade di frequente per voi. Per disattivare la funzionalità di quarantena, lasciare vuota la direttiva `quarantine_key`, o cancellare i contenuti di tale direttiva, se non già è vuoto. Per abilita la funzionalità di quarantena, immettere alcun valore nella direttiva. Il `quarantine_key` è un importante aspetto di sicurezza della funzionalità di quarantena richiesto come un mezzo per prevenire la funzionalità di quarantena di essere sfruttati da potenziali aggressori e come mezzo per prevenire potenziale esecuzione di dati memorizzati all'interno della quarantena. Il `quarantine_key` dovrebbe essere trattato nello stesso modo come le password: Più lunga è la migliore, e proteggila ermeticamente. Per la migliore effetto, utilizzare in combinazione con `delete_on_sight`.

##### "quarantine_max_filesize" `[string]`
- La massima permesso dimensione del file dei file essere quarantena. File di dimensioni superiori a questo valore NON verranno quarantena. Questa direttiva è importante per rendere più difficile per qualsiasi potenziali aggressori di inondare la vostra quarantena con indesiderati dati potenzialmente causare un eccessivo utilizzo dei dati sul vostro servizio di hosting. Predefinito = 2MB.

##### "quarantine_max_usage" `[string]`
- La massima permesso utilizzo della memoria per la quarantena. Se la totale memoria utilizzata dalla quarantena raggiunge questo valore, i più vecchi file in quarantena vengono eliminati fino a quando la totale memoria utilizzata non raggiunge questo valore. Questa direttiva è importante per rendere più difficile per qualsiasi potenziali aggressori di inondare la tua quarantena con indesiderati dati potenzialmente causare un eccessivo utilizzo dei dati sul vostro servizio di hosting. Predefinito = 64MB.

##### "quarantine_max_files" `[int]`
- Il numero massimo di file che possono esistere nella quarantena. Quando vengono aggiunti nuovi file alla quarantena, se questo numero viene superato, i file precedenti verranno eliminati fino a quando il resto non supererà più questo numero. Predefinito = 100.

#### "virustotal" (Categoria)
Configurazione per l'integrazione di Virus Total.

##### "vt_public_api_key" `[string]`
- Facoltativamente, phpMussel è in grado di scansionare dei file utilizzando il Virus Total API come un modo per fornire un notevolmente migliorato livello di protezione contro virus, trojan, malware e altre minacce. Per predefinita, la scansionare dei file utilizzando il Virus Total API è disattivato. Per abilitarlo, una API chiave da Virus Total è richiesta. A causa del significativo vantaggio che questo potrebbe fornire a voi, è qualcosa che consiglio vivamente di attivare. Tuttavia, si prega di notare che per utilizzare il Virus Total API, è necessario d'accettare i Termini di Servizio (Terms of Service) e rispettare tutte le orientamenti descritto nella documentazione di Virus Total! Tu NON sei autorizzato a utilizzare questa funzionalità TRANNE SE: Hai letto e accettato i Termini di Servizio (Terms of Service) di Virus Total e le sue API. Hai letto e si capisce, come minimo, il preambolo del Virus Total Pubblica API documentazione (tutto dopo "VirusTotal Public API v2.0" ma prima "Contents").

Guarda anche:
- [Terms of Service](https://www.virustotal.com/en/about/terms-of-service/)
- [Getting started](https://developers.virustotal.com/reference)

##### "vt_suspicion_level" `[int]`
- Per predefinita, phpMussel limiterà quali file ciò scansiona utilizzando il Virus Total API ai quei file che considera "sospettose". Facoltativamente, è possibile modificare questa restrizione per mezzo di modificando il valore del `vt_suspicion_level` direttiva.

##### "vt_weighting" `[int]`
- Dovrebbe phpMussel applica i risultati della scansione utilizzando il Virus Total API come rilevamenti o il ponderazione rilevamenti? Questa direttiva esiste, perché, sebbene scansione di un file utilizzando più motori (come Virus Total fa) dovrebbe risulta in un maggiore tasso di rilevamenti (e quindi in un maggiore numero di maligni file essere catturati), può anche risulta in un maggiore numero di falsi positivi, e quindi, in certe circostanze, i risultati della scansione possono essere meglio utilizzato come un punteggio di confidenza anziché come una conclusione definitiva. Se viene utilizzato un valore di 0, i risultati della scansione utilizzando il Virus Total API saranno applicati come rilevamenti, e quindi, se qualsiasi motori utilizzati da Virus Total che marca il file sottoposto a scansione come maligno, phpMussel considererà il file come maligno. Se qualsiasi altro valore è utilizzato, i risultati della scansione utilizzando il Virus Total API saranno applicati come ponderazione rilevamenti, e quindi, il numero di motori utilizzati da Virus Total marcando il file sottoposto a scansione come maligno servirà come un punteggio di confidenza (o ponderazione rilevamenti) per se il file sottoposto a scansione deve essere considerato maligno per phpMussel (il valore utilizzato rappresenterà il minimo punteggio di confidenza o ponderazione richiesto per essere considerato maligno). Un valore di 0 è utilizzato per predefinita.

##### "vt_quota_rate" `[int]`
- Secondo a la Virus Total API documentazione, è limitato a un massimo di 4 richieste di qualsiasi natura in un dato 1 minuto tempo periodo. Se tu esegue una honeyclient, honeypot o qualsiasi altro automazione che sta fornire risorse a VirusTotal e non solo recuperare rapporti si ha diritto a un più alto tasso di richiesta quota. Per predefinita, phpMussel rigorosamente rispetti questi limiti, ma a causa della possibilità di tali tassi quote essere aumentati, questi due direttivi sono forniti come un mezzo per voi per istruire phpMussel da quale limite si deve rispettare. A meno che sei stato richiesto di farlo, non è raccomandato per voi per aumentare questi valori, ma, se hai incontrati problemi relativi a raggiungere il vostro tasso quota, diminuendo questi valori *__POTREBBE__* a volte aiutare nel lavoro attraverso questi problemi. Il vostro tasso limite è determinato come `vt_quota_rate` richieste di qualsiasi natura in un dato `vt_quota_time` minuto tempo periodo.

##### "vt_quota_time" `[int]`
- (Vedi descrizione precedente).

#### "urlscanner" (Categoria)
Configurazione per lo scanner URL.

##### "google_api_key" `[string]`
- Abilita API richieste per l'API di Google Safe Browsing quando le API chiave necessarie è definito.

Guarda anche:
- [Google API Console](https://console.developers.google.com/)

##### "maximum_api_lookups" `[int]`
- Numero massimo di richieste per l'API di eseguire per iterazione di scansione individuo. Perché ogni richiesta supplementare per l'API farà aggiungere al tempo totale necessario per completare ogni iterazione di scansione, si potrebbe desiderare di stipulare una limitazione al fine di accelerare il processo di scansione. Quando è impostato su 0, no tale ammissibile numero massimo sarà applicata. Impostato su 10 per impostazione predefinite.

##### "maximum_api_lookups_response" `[bool]`
- Cosa fare se il ammissibile numero massimo di richieste per l'API è superato? False = Fare nulla (continuare il processo) [Predefinito]; True = Segnare/bloccare il file.

##### "cache_time" `[int]`
- Per quanto tempo (in secondi) dovrebbe i risultati delle API richieste essere memorizzati nella cache per? Predefinito è 3600 secondi (1 ora).

#### "legal" (Categoria)
Configurazione per requisiti legali.

##### "pseudonymise_ip_addresses" `[bool]`
- Pseudonimizzare gli indirizzi IP durante la scrivono i file di registro? True = Sì [Predefinito]; False = No.

##### "privacy_policy" `[string]`
- L'indirizzo di una politica sulla privacy pertinente da visualizzare nel piè di pagina delle pagine generate. Specificare un URL, o lasciare vuoto per disabilitare.

#### "supplementary_cache_options" (Categoria)
Opzioni di cache supplementari.

##### "enable_apcu" `[bool]`
- Specifica se provare a utilizzare APCu per la memorizzazione nella cache. Predefinito = False.

##### "enable_memcached" `[bool]`
- Specifica se provare a utilizzare Memcached per la memorizzazione nella cache. Predefinito = False.

##### "enable_redis" `[bool]`
- Specifica se provare a utilizzare Redis per la memorizzazione nella cache. Predefinito = False.

##### "enable_pdo" `[bool]`
- Specifica se provare a utilizzare PDO per la memorizzazione nella cache. Predefinito = False.

##### "memcached_host" `[string]`
- Il valore dell'host Memcached. Predefinito = "localhost".

##### "memcached_port" `[int]`
- Il valore della porta Memcached. Predefinito = "11211".

##### "redis_host" `[string]`
- Il valore dell'host Redis. Predefinito = "localhost".

##### "redis_port" `[int]`
- Il valore della porta Redis. Predefinito = "6379".

##### "redis_timeout" `[float]`
- Il valore del tempo scaduto per Redis. Predefinito = "2.5".

##### "pdo_dsn" `[string]`
- Il valore della DSN per PDO. Predefinito = "mysql:dbname=phpmussel;host=localhost;port=3306".

##### "pdo_username" `[string]`
- Il nome utente per PDO.

##### "pdo_password" `[string]`
- La password per PDO.

#### "frontend" (Categoria)
Configurazione per il front-end.

##### "frontend_log" `[string]`
- File per la registrazione di l'accesso front-end tentativi di accesso. Specificare un nome di file, o lasciare vuoto per disabilitare.

##### "max_login_attempts" `[int]`
- Numero massimo di tentativi di accesso al front-end. Predefinito = 5.

##### "numbers" `[string]`
- Come preferisci che i numeri siano visualizzati? Seleziona l'esempio che ti sembra più corretto.

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
- Definisce quale algoritmo da utilizzare per tutte le password e le sessioni in futuro. Opzioni: PASSWORD_DEFAULT (predefinito), PASSWORD_BCRYPT, PASSWORD_ARGON2I (richiede PHP >= 7.2.0), PASSWORD_ARGON2ID (richiede PHP >= 7.3.0).

```
default_algo
├─PASSWORD_DEFAULT ("PASSWORD_DEFAULT")
├─PASSWORD_BCRYPT ("PASSWORD_BCRYPT")
├─PASSWORD_ARGON2I ("PASSWORD_ARGON2I (PHP >= 7.2.0)")
└─PASSWORD_ARGON2ID ("PASSWORD_ARGON2ID (PHP >= 7.3.0)")
```

##### "theme" `[string]`
- L'estetica da utilizzare per il front-end phpMussel.

```
theme
├─default ("Default")
├─rbi ("Red-Blue Inverted")
├─slate ("Slate")
├─bluemetal ("Blue Metal")
├─moss ("Moss")
├─fullmoon ("Full Moon")
└─…Altro
```

##### "magnification" `[float]`
- Ingrandimento del carattere. Predefinito = 1.

#### "web" (Categoria)
Configurazione per il gestore di caricamenti.

##### "uploads_log" `[string]`
- Dove devono essere registrati tutti i caricamenti bloccati. Specificare un nome del file, o lasciare vuoto per disattivarlo.

##### "forbid_on_block" `[bool]`
- phpMussel dovrebbe rispondere con 403 header con il file caricamente bloccato messaggio, o rimanere con il solito 200 OK? False = No (200); True = Sì (403) [Predefinito].

##### "max_uploads" `[int]`
- Massimo numero di file per analizzare durante il file caricamenti scansione prima le terminazione del scansione e d'informare dell'utente che essi stai caricando troppo in una volta! Fornisce protezione contro un teorico attacco per cui un malintenzionato utente tenta per DDoS vostra sistema o CMS da sovraccaricamento phpMussel rallentare il PHP processo ad un brusco stop. Raccomandato: 10. Si potrebbe desiderare di aumentare o diminuire che numero basato sulla velocità del vostra sistema e hardware. Si noti che questo numero non tiene conto o includere il contenuti degli archivi.

##### "ignore_upload_errors" `[bool]`
- Questa direttiva dovrebbe generalmente essere SPENTO meno se necessario per la corretta funzionalità del phpMussel sul vostra sistema. Normalmente, quando spento, quando phpMussel rileva la presenza di elementi nella `$_FILES` array(), è tenterà di avviare una scansione dei file che tali elementi rappresentano, e, se tali elementi sono vuoti, phpMussel restituirà un errore messaggio. Questo è un comportamento adeguato per phpMussel. Tuttavia, per alcuni CMS, vuoti elementi nel `$_FILES` può avvenire come conseguenza del naturale comportamento di questi CMS, o errori possono essere segnalati quando non ce ne sono, nel qual caso, il normale comportamento per phpMussel sarà interferire con il normale comportamento di questi CMS. Se una tale situazione avvenire per voi, attivazione di questa opzione SU sarà istruirà phpMussel a non tenta avviare scansioni per tali vuoti elementi, ignorarli quando si trova ea non ritorno qualsiasi errore correlato messaggi, così permettendo proseguimento della pagina richiesta. False = SPENTO/OFF; True = SU/ON.

##### "theme" `[string]`
- L'estetica da utilizzare per la pagina "Caricamento Negato".

```
theme
├─default ("Default")
├─rbi ("Red-Blue Inverted")
├─slate ("Slate")
├─bluemetal ("Blue Metal")
├─moss ("Moss")
├─fullmoon ("Full Moon")
└─…Altro
```

##### "magnification" `[float]`
- Ingrandimento del carattere. Predefinito = 1.

#### "phpmailer" (Categoria)
Configurazione per PHPMailer (utilizzato per l'autenticazione a due fattori).

##### "event_log" `[string]`
- Un file per registrare tutti gli eventi in relazione a PHPMailer. Specificare un nome di file, o lasciare vuoto per disabilitare.

##### "enable_two_factor" `[bool]`
- Questa direttiva determina se utilizzare 2FA per gli account front-end.

##### "enable_notifications" `[string]`
- Se desideri ricevere una notifica via e-mail quando un caricamento è bloccato, specifica qui l'indirizzo e-mail del destinatario.

##### "skip_auth_process" `[bool]`
- Impostando questa direttiva su `true`, PHPMailer salta il normale processo di autenticazione che normalmente si verifica quando si invia una posta elettronica via SMTP. Questo dovrebbe essere evitato, perché saltare questo processo potrebbe esporre la posta elettronica in uscita agli attacchi MITM, ma potrebbe essere necessario nei casi in cui questo processo impedisce a PHPMailer di connettersi a un server SMTP.

##### "host" `[string]`
- L'host SMTP per utilizzare per la posta elettronica in uscita.

##### "port" `[int]`
- Il numero di porta per utilizzare per la posta elettronica in uscita. Predefinito = 587.

##### "smtp_secure" `[string]`
- Il protocollo per utilizzare per l'invio di posta elettronica tramite SMTP (TLS o SSL).

```
smtp_secure
├─default ("-")
├─tls ("TLS")
└─ssl ("SSL")
```

##### "smtp_auth" `[bool]`
- Questa direttiva determina se autenticare le sessioni SMTP (di solito dovrebbe essere lasciato solo).

##### "username" `[string]`
- Il nome utente per utilizzare per l'invio di posta elettronica tramite SMTP.

##### "password" `[string]`
- La password per utilizzare per l'invio di posta elettronica tramite SMTP.

##### "set_from_address" `[string]`
- L'indirizzo del mittente per citare quando si invia una posta elettronica tramite SMTP.

##### "set_from_name" `[string]`
- Il nome del mittente per citare quando si invia una posta elettronica tramite SMTP.

##### "add_reply_to_address" `[string]`
- L'indirizzo di risposta per citare quando si invia una posta elettronica tramite SMTP.

##### "add_reply_to_name" `[string]`
- Il nome per la risposta per citare quando si invia una posta elettronica tramite SMTP.

---


### 8. <a name="SECTION8"></a>FIRMA FORMATO

*Guarda anche:*
- *[Che cosa è una "firma"?](#WHAT_IS_A_SIGNATURE)*

I primi 9 byte `[x0-x8]` di un file di firma per phpMussel sono `phpMussel`, e agire come un "numero magico" (magic number), per identificarli come file di firma (questo aiuta a impedire phpMussel di tentare accidentalmente di utilizzare file che non sono file di firma). Il byte successivo `[x9]` identifica il tipo di file di firma, che phpMussel deve conoscere per poter interpretare correttamente il file di firma. Sono riconosciuti i seguenti tipi di file di firma:

Tipo | Byte | Descrizione
---|---|---
`General_Command_Detections` | `0?` | Per i file di firma CSV (valori separati da virgole). I valori (firme) sono stringhe esadecimali codificate per cercare all'interno di file. Le firme qui non hanno nomi o altri dettagli (solo la stringa da rilevare).
`Filename` | `1?` | Per le firme dei nomi di file.
`Hash` | `2?` | Per firme di hash.
`Standard` | `3?` | Per i file di firma che lavorano direttamente con il contenuto del file.
`Standard_RegEx` | `4?` | Per i file di firma che lavorano direttamente con il contenuto del file. Le firme possono contenere espressioni regolari.
`Normalised` | `5?` | Per i file di firma che funzionano con il contenuto di file normalizzato a ANSI.
`Normalised_RegEx` | `6?` | Per i file di firma che funzionano con il contenuto di file normalizzato a ANSI. Le firme possono contenere espressioni regolari.
`HTML` | `7?` | Per i file di firma che funzionano con il contenuto di file normalizzato a HTML.
`HTML_RegEx` | `8?` | Per i file di firma che funzionano con il contenuto di file normalizzato a HTML. Le firme possono contenere espressioni regolari.
`PE_Extended` | `9?` | Per i file di firma che funzionano con metadati PE (tranne i metadati sezione PE).
`PE_Sectional` | `A?` | Per i file di firma che funzionano con i metadati di sezione PE.
`Complex_Extended` | `B?` | Per i file di firma che funzionano con diverse regole basate su metadati estesi generati da phpMussel.
`URL_Scanner` | `C?` | Per i file di firma che funzionano con gli URL.

Il byte successivo `[x10]` è una nuova linea `[0A]`, e conclude l'intestazione del file di firma per phpMussel.

Ogni linea non vuota in seguito è una firma o una regola. Ogni firma o regola occupa una linea. I formati di firma supportati sono descritti di seguito.

#### *FIRME DEI NOMI DI FILE*
Tutte le firme dei nomi di file seguono il formato:

`NOME:FNRX`

Dove NOME è il nome per citare per quella firma e FNRX è la regolare espressione a verifica file nomi firme (non codificata) contra.

#### *FIRME HASH*
Tutte le firme hash seguono il formato:

`HASH:DIMENSIONE:NOME`

Dove HASH è l'hash (di solito MD5) dell'intero file, DIMENSIONE è la totale dimensione del file e NOME è il nome per citare per quella firma.

#### *FIRME PE SEZIONALI*
Tutte le firme PE sezionali seguono il formato:

`DIMENSIONE:HASH:NOME`

Dove HASH è l'MD5 hash di una sezione del PE file, DIMENSIONE è la totale dimensioni della sezione e NOME è il nome per citare per quella firma.

#### *FIRME PE ESTESO*
Tutte le firme PE esteso seguono il formato:

`$VAR:HASH:DIMENSIONE:NOME`

Dove $VAR è il nome della PE variabile per corrispondere contro, HASH è l'MD5 hash di quella variabile, DIMENSIONE è la dimensione totale di quella variabile e NOME è il nome per citare per quella firma.

#### *COMPLESSO ESTESO FIRME*
Complesso esteso firme sono piuttosto diverso da altri tipi di firme possibili con phpMussel, in quanto ciò che essi sono corrispondenti contro è specificato dalle firme stesse e possono corrispondere contro più criteri. Criteri sono delimitati da ";" e il tipo e dati di ogni criterio è delimitato da ":" come tale che il formato per queste firme sembra come:

`$variabile1:DATI;$variabile2:DATI;FirmeNome`

#### *TUTTO IL RESTO*
Tutte le altre firme seguono il formato:

`NOME:HEX:FROM:TO`

Dove NOME è il nome per citare per quella firma e HEX è un esadecimale codificato segmento del file destinato essere verificato dal pertinente firma. FROM e TO sono opzionali parametri, indicando da cui ea cui posizioni nei sorgenti dati per verificare contra.

#### *REGEX (REGULAR EXPRESSIONS)*
Ogni forma di regex correttamente capito da PHP anche dovrebbe essere correttamente capito da phpMussel el sue firme. Ma, io suggerirei di prendere estrema cautela quando scrittura nuove regex basato firme, perché, se non sei certo quello stai facendo, ci possono essere molto irregolari e/o inaspettati risultati. Occhiata al sorgente codice di phpMussel se non sei certo sul contesto in cui le regolari espressioni dichiarazioni vengono parsato. Anche, ricordare che tutti i espressioni (ad eccezione per i file nomi, archivio metadati e l'MD5 espressioni) deve essere esadecimale codificato (tranne sintassi, naturalmente)!

---


### 9. <a name="SECTION9"></a>CONOSCIUTI COMPATIBILITÀ PROBLEMI

#### ANTI-VIRUS SOFTWARE COMPATIBILITÀ

Problemi di compatibilità tra phpMussel e alcuni fornitori di antivirus si sono verificati a volte in passato, così ogni pochi mesi o giù di lì, controllo le ultime versioni disponibili della base di codice phpMussel contro Virus Total, per vedere se vi sono segnalati problemi. Quando vengono segnalati problemi, elencherò qui i problemi riportati, nella documentazione.

Quando ho controllato più di recente (2019.10.10), non sono stati segnalati problemi.

Non controllo i file di firma, la documentazione o altri contenuti periferici. I file di firma causano sempre alcuni falsi positivi quando vengono rilevati da altre soluzioni antivirus. Pertanto, consigliamo vivamente, se si prevede di installare phpMussel su una macchina in cui esiste già un'altra soluzione antivirus, di mettere i file delle firme phpMussel nella tua lista bianca.

*Guarda anche: [Grafici di Compatibilità](https://maikuolan.github.io/Compatibility-Charts/).*

---


### 10. <a name="SECTION10"></a>DOMANDE FREQUENTI (FAQ)

- [Che cosa è una "firma"?](#WHAT_IS_A_SIGNATURE)
- [Che cosa è un "falso positivo"?](#WHAT_IS_A_FALSE_POSITIVE)
- [Con quale frequenza vengono aggiornate le firme?](#SIGNATURE_UPDATE_FREQUENCY)
- [Ho incontrato un problema durante l'utilizzo phpMussel e non so che cosa fare al riguardo! Aiutami!](#ENCOUNTERED_PROBLEM_WHAT_TO_DO)
- [Voglio usare phpMussel v3 con una versione di PHP più vecchio di 7.2.0; Puoi aiutami?](#MINIMUM_PHP_VERSION_V3)
- [Posso utilizzare un'installazione singola di phpMussel per proteggere più domini?](#PROTECT_MULTIPLE_DOMAINS)
- [Non voglio perdere tempo con l'installazione di questo e farlo funzionare con il mio sito web; Posso pagarti per farlo per me?](#PAY_YOU_TO_DO_IT)
- [Posso assumere voi o uno degli sviluppatori di questo progetto per lavori privati?](#HIRE_FOR_PRIVATE_WORK)
- [Ho bisogno di modifiche specialistiche, personalizzazioni, ecc; Puoi aiutare?](#SPECIALIST_MODIFICATIONS)
- [Sono uno sviluppatore, un designer di siti web o un programmatore. Posso accettare o offrire lavori relativi a questo progetto?](#ACCEPT_OR_OFFER_WORK)
- [Voglio contribuire al progetto; Posso farlo?](#WANT_TO_CONTRIBUTE)
- [Come accedere a dettagli specifici sui file quando vengono scansionati?](#SCAN_DEBUGGING)
- [Blacklists (liste nere) – Whitelists (liste bianche) – Greylists (liste grigie) – Cosa sono e come li uso?](#BLACK_WHITE_GREY)
- [Che cos'è un "DSN PDO"? Come posso usare PDO con phpMussel?](#HOW_TO_USE_PDO)
- [Mia funzionalità di caricamento è asincrona (ad esempio, utilizza ajax, ajaj, json, ecc). Non vedo alcun messaggio o avviso speciale quando un caricamento è bloccato. Cosa sta succedendo?](#AJAX_AJAJ_JSON)

#### <a name="WHAT_IS_A_SIGNATURE"></a>Che cosa è una "firma"?

Nel contesto di phpMussel, una "firma" si riferisce a dati che fungono da indicatore/identificatore per qualcosa di specifico che stiamo cercando, di solito sotto forma di un segmento molto piccolo, distinto, e innocuo di qualcosa di più grande e altrimenti dannose, come un virus o un trojan, o sotto forma di un checksum di file, un hash, o altro identificando indicatore, e di solito include un'etichetta, e alcuni altri dati per fornire un contesto aggiuntivo che può essere utilizzato da phpMussel per determinare il modo migliore per procedere quando incontra quello che stiamo cercando.

#### <a name="WHAT_IS_A_FALSE_POSITIVE"></a>Che cosa è un "falso positivo"?

Il termine "falso positivo" (*in alternativa: "errore di falso positivo"; "falso allarme"*; Inglese: *false positive*; *false positive error*; *false alarm*), descritto molto semplicemente, e in un contesto generalizzato, viene utilizzato quando si analizza una condizione, per riferirsi ai risultati di tale analisi, quando i risultati sono positivi (cioè, la condizione è determinata a essere "positivo", o "vero"), ma dovrebbero essere (o avrebbe dovuto essere) negativo (cioè, la condizione, in realtà, è "negativo", o "falso"). Un "falso positivo" potrebbe essere considerato analogo a "piangendo lupo" (dove la condizione di essere analizzato è se c'è un lupo nei pressi della mandria, la condizione è "falso" in che non c'è nessun lupo nei pressi della mandria, e la condizione viene segnalato come "positivo" dal pastore per mezzo di chiamando "lupo, lupo"), o analogo a situazioni di test medici dove un paziente viene diagnosticato una malattia, quando in realtà, non hanno qualsiasi malattia.

Risultati correlati quando si analizza una condizione può essere descritto utilizzando i termini "vero positivo", "vero negativo" e "falso negativo". Un "vero positivo" si riferisce a quando i risultati dell'analisi e lo stato attuale della condizione sono entrambi vero (o "positivo"), e un "vero negativo" si riferisce a quando i risultati dell'analisi e lo stato attuale della condizione sono entrambe falso (o "negativo"); Un "vero positivo" o un "vero negativo" è considerato una "inferenza corretta". L'antitesi di un "falso positivo" è un "falso negativo"; Un "falso negativo" si riferisce a quando i risultati dell'analisi sono negativo (cioè, la condizione è determinata a essere "negativo", o "falso"), ma dovrebbero essere (o avrebbe dovuto essere) positivo (cioè, la condizione, in realtà, è "positivo", o "vero").

Nel contesto di phpMussel, questi termini si riferiscono alle firme di phpMussel e le file che si bloccano. Quando phpMussel si blocca un file a causa di firme male, obsoleti o errati, ma non avrebbe dovuto fare così, o quando lo fa per le ragioni sbagliate, ci riferiamo a questo evento come un "falso positivo". Quando phpMussel non riesce a bloccare un file che avrebbe dovuto essere bloccato, a causa delle minacce impreviste, firme mancante o carenze nelle sue firme, ci riferiamo a questo evento come una "rivelazione mancante" o "missed detection" (che è analoga ad un "falso negativo").

Questo può essere riassunta dalla seguente tabella:

&nbsp; | phpMussel *NON* dovrebbe bloccare un file | phpMussel *DOVREBBE* bloccare un file
---|---|---
phpMussel *NON* bloccare un file | Vero negativo (inferenza corretta) | Rivelazione mancante (analogous to falso negativo)
phpMussel *FA* bloccare un file | __Falso positivo__ | Vero positivo (inferenza corretta)

#### <a name="SIGNATURE_UPDATE_FREQUENCY"></a>Con quale frequenza vengono aggiornate le firme?

Frequenza di aggiornamento varia a seconda delle file di firma in questione. Tutti i manutentori per i file di firma per phpMussel in genere cercano di mantenere i loro firme aggiornato il più possibile, ma a causa di tutti noi abbiamo diversi altri impegni, la nostra vita al di fuori del progetto, e a causa di nessuno di noi sono finanziariamente compensato (o pagato) per i nostri sforzi sul progetto, un calendario di aggiornamento preciso non può essere garantita. In genere, le firme vengono aggiornati ogni volta che c'è abbastanza tempo per aggiornarli. L'assistenza è sempre apprezzato se siete disposti a offrire qualsiasi.

#### <a name="ENCOUNTERED_PROBLEM_WHAT_TO_DO"></a>Ho incontrato un problema durante l'utilizzo phpMussel e non so che cosa fare al riguardo! Aiutami!

- Si sta utilizzando la versione più recente del software? Si sta utilizzando le ultime versioni dei file di firma? Se la risposta a una di queste due domande è no, provare ad aggiornare tutto prima, e verificare se il problema persiste. Se persiste, continuare a leggere.
- Hai controllato attraverso tutta la documentazione? In caso non fatto, si prega di farlo. Se il problema non può essere risolto utilizzando la documentazione, continuare a leggere.
- Hai controllato la **[pagina dei issues](https://github.com/phpMussel/phpMussel/issues)**, per vedere se il problema è stato accennato prima? Se è stato accennato prima, verificare se sono stati forniti qualsiasi suggerimenti, idee, e/o soluzioni, e seguire come necessario per cercare di risolvere il problema.
- Se il problema persiste, si prega di cercare aiuto su di esso per mezzo di creando un nuovo issue nella pagina dei issues.

#### <a name="MINIMUM_PHP_VERSION_V3"></a>Voglio usare phpMussel v3 con una versione di PHP più vecchio di 7.2.0; Puoi aiutami?

No. PHP >= 7.2.0 è un requisito minimo per phpMussel v3.

*Guarda anche: [Grafici di Compatibilità](https://maikuolan.github.io/Compatibility-Charts/).*

#### <a name="PROTECT_MULTIPLE_DOMAINS"></a>Posso utilizzare un'installazione singola di phpMussel per proteggere più domini?

Sì.

#### <a name="PAY_YOU_TO_DO_IT"></a>Non voglio perdere tempo con l'installazione di questo e farlo funzionare con il mio sito web; Posso pagarti per farlo per me?

Forse. Ciò è considerato caso per caso. Dicci cosa hai bisogno, quello che stai offrendo, e ti dirà se possiamo aiutare.

#### <a name="HIRE_FOR_PRIVATE_WORK"></a>Posso assumere voi o uno degli sviluppatori di questo progetto per lavori privati?

*Vedi sopra.*

#### <a name="SPECIALIST_MODIFICATIONS"></a>Ho bisogno di modifiche specialistiche, personalizzazioni, ecc; Puoi aiutare?

*Vedi sopra.*

#### <a name="ACCEPT_OR_OFFER_WORK"></a>Sono uno sviluppatore, un designer di siti web o un programmatore. Posso accettare o offrire lavori relativi a questo progetto?

Sì. La nostra licenza non vieta questo.

#### <a name="WANT_TO_CONTRIBUTE"></a>Voglio contribuire al progetto; Posso farlo?

Sì. I contributi al progetto sono molto graditi. Per ulteriori informazioni, vedere "CONTRIBUTING.md".

#### <a name="SCAN_DEBUGGING"></a>Come accedere a dettagli specifici sui file quando vengono scansionati?

È possibile accedere a dettagli specifici sui file quando vengono scansionati da assegnando un'array da utilizzare a tale scopo prima di istruire phpMussel per eseguire la scansione.

Nell'esempio qui sotto, a questo scopo viene utilizzato `$Foo`. Dopo la scansione di `/percorso/del/file/...`, le informazioni dettagliate sui file contenute da `/percorso/del/file/...` verranno contenute da `$Foo`.

```PHP
<?php
require 'phpmussel/loader.php';

$phpMussel['Set-Scan-Debug-Array']($Foo);

$Results = $phpMussel['Scan']('/percorso/del/file/...');

var_dump($Foo);
```

L'array è una matrice multidimensionale che consiste di elementi che rappresentano ogni file che viene sottoposto a scansione e sottoelementi che rappresentano i dettagli su questi file. Questi sottoelementi sono i seguenti:

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

*† - Non fornito di risultati memorizzati nella cache (fornito di nuovi risultati di scansione solo).*

*‡ - Fornito durante la scansione dei file PE solo.*

Facoltativamente, questa matrice può essere distrutta utilizzando quanto segue:

```PHP
$phpMussel['Destroy-Scan-Debug-Array']($Foo);
```

#### <a name="BLACK_WHITE_GREY"></a>Blacklists (liste nere) – Whitelists (liste bianche) – Greylists (liste grigie) – Cosa sono e come li uso?

I termini hanno significati diversi in diversi contesti. In phpMussel, ci sono tre contesti in cui vengono utilizzati questi termini: Risposta alla dimensione del file, risposta al tipo di file e, greylist delle firme.

Al fine di ottenere un risultato desiderato con un costo minimo per l'elaborazione, ci sono alcune cose semplici che phpMussel può controllare prima di eseguire effettivamente la scansione dei file, come la dimensione, il nome e l'estensione di un file. Per esempio; Se un file è troppo grande, o se la sua estensione indica un tipo di file che non vogliamo autorizzare sui nostri siti web, possiamo immediatamente contrassegnare il file e non è necessario eseguirne la scansione.

La risposta alle dimensioni del file è il modo in cui phpMussel risponde quando un file supera un limite specificato. Sebbene non siano presenti elenchi effettivi, un file può essere considerato efficacemente nella blacklist, nella whitelist, o nella greylist, in base alle sue dimensioni. Esistono due direttive di configurazione opzionali per specificare rispettivamente un limite e una risposta desiderata.

La risposta del tipo di file è il modo in cui phpMussel risponde all'estensione del file. Esistono tre direttive di configurazione opzionali per specificare esplicitamente quali estensioni dovrebbero essere inserite nella blacklist, nella whitelist, o nella greylist. Un file può essere considerato effettivamente nella blacklist, nella whitelist, o nella greylist se la sua estensione corrisponde rispettivamente a una delle estensioni specificate.

In questi due contesti, essere nella whitelist significa che non dovrebbe essere scansionato o contrassegnato; essere nella blacklist significa che dovrebbe essere contrassegnato (e quindi non è necessario scansionarlo); ed essere nella greylist significa che è necessaria un'ulteriore analisi per determinare se dovremmo contrassegnarlo (cioè, dovrebbe essere scansionato).

La greylist delle firme è una lista di firme che dovrebbe essere essenzialmente ignorata (questo è brevemente menzionato prima nella documentazione). Quando viene innescata una firma nella greylist delle firme, phpMussel continua a lavorare attraverso le sue firme e non intraprende alcuna azione particolare riguardo alla firma nella greylist. Non esiste una blacklist delle firme, perché il comportamento implicito è comunque un comportamento normale per le firme innescate, e non esiste una whitelist delle firme, perché il comportamento implicito non avrebbe davvero senso in considerazione di come funziona phpMussel normal e delle funzionalità che già possiede.

La greylist delle firme è utile se è necessario risolvere i problemi causati da una particolare firma senza disabilitare o disinstallare l'intero file di firme.

#### <a name="HOW_TO_USE_PDO"></a>Che cos'è un "DSN PDO"? Come posso usare PDO con phpMussel?

"PDO" è l'acronimo di "[PHP Data Objects](https://www.php.net/manual/en/intro.pdo.php)" (oggetti dati PHP). Fornisce un'interfaccia affinché PHP sia in grado di connettersi ad alcuni sistemi di database comunemente utilizzati da varie applicazioni PHP.

"DSN" è l'acronimo di "[data source name](https://it.wikipedia.org/wiki/Database_Source_Name)" (nome dell'origine dati). Il "PDO DSN" descrive al PDO come dovrebbe connettersi a un database.

phpMussel offre la possibilità di utilizzare PDO per scopi di memorizzazione nella cache. Affinché ciò funzioni correttamente, dovrai configurare phpMussel di conseguenza, abilitando PDO, creare un nuovo database da utilizzare per phpMussel (se non hai già in mente un database da utilizzare per phpMussel) e creare un nuovo tabella nel database in base alla struttura descritta di seguito.

Quando una connessione al database ha esito positivo, ma la tabella necessaria non esiste, tenterà di crearla automaticamente. Tuttavia, questo comportamento non è stato ampiamente testato e il successo non può essere garantito.

Questo, ovviamente, si applica solo se si desidera che phpMussel utilizzi PDO. Se sei abbastanza felice per phpMussel di utilizzare la memorizzazione nella cache dei file flat (in base alla sua configurazione predefinita) o una qualsiasi delle altre opzioni di memorizzazione nella cache fornite, non dovrai preoccuparti di creare database, tabelle e così via.

La struttura descritta di seguito utilizza "phpmussel" come nome del database, ma è possibile utilizzare qualunque nome tu voglia per il database, purché lo stesso nome venga replicato nella configurazione DSN.

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

La direttiva di configurazione `pdo_dsn` di phpMussel dovrebbe essere configurata come descritto di seguito.

```
A seconda del driver del database utilizzato...
│
├─4d (Avvertimento: Sperimentale, non testato, non raccomandato!)
│ │
│ │         ╔═══════╗
│ └─4D:host=localhost;charset=UTF-8
│           ╚╤══════╝
│            └L'host con cui connettersi per trovare il database.
│
├─cubrid
│ │
│ │             ╔═══════╗      ╔═══╗        ╔═════╗
│ └─cubrid:host=localhost;port=33000;dbname=example
│               ╚╤══════╝      ╚╤══╝        ╚╤════╝
│                │              │            └Il nome del database da
│                │              │             utilizzare.
│                │              │
│                │              └Il numero di porta con cui connettersi
│                │               all'host.
│                │
│                └L'host con cui connettersi per trovare il database.
│
├─dblib
│ │
│ │ ╔═══╗      ╔═══════╗        ╔═════╗
│ └─dblib:host=localhost;dbname=example
│   ╚╤══╝      ╚╤══════╝        ╚╤════╝
│    │          │                └Il nome del database da utilizzare.
│    │          │
│    │          └L'host con cui connettersi per trovare il database.
│    │
│    └Valori possibili: "mssql", "sybase", "dblib".
│
├─firebird
│ │
│ │                 ╔═══════════════════╗
│ └─firebird:dbname=/path/to/database.fdb
│                   ╚╤══════════════════╝
│                    ├Può essere un percorso per un file di database locale.
│                    │
│                    ├Può connettersi con un host e un numero di porta.
│                    │
│                    └Dovresti leggi la documentazione di Firebird se si
│                     desidera utilizzare questo.
│
├─ibm
│ │
│ │         ╔═════╗
│ └─ibm:DSN=example
│           ╚╤════╝
│            └Il database catalogato con cui connettersi.
│
├─informix
│ │
│ │              ╔═════╗
│ └─informix:DSN=example
│                ╚╤════╝
│                 └Il database catalogato con cui connettersi.
│
├─mysql (Più raccomandato!)
│ │
│ │              ╔═════╗      ╔═══════╗      ╔══╗
│ └─mysql:dbname=example;host=localhost;port=3306
│                ╚╤════╝      ╚╤══════╝      ╚╤═╝
│                 │            │              └Il numero di porta con cui
│                 │            │               connettersi all'host.
│                 │            │
│                 │            └L'host con cui connettersi per trovare il
│                 │             database.
│                 │
│                 └Il nome del database da utilizzare.
│
├─oci
│ │
│ │            ╔═════╗
│ └─oci:dbname=example
│              ╚╤════╝
│               ├Può fare riferimento al database catalogato specifico.
│               │
│               ├Può connettersi con un host e un numero di porta.
│               │
│               └Dovresti leggi la documentazione di Oracle se si desidera
│                utilizzare questo.
│
├─odbc
│ │
│ │      ╔═════╗
│ └─odbc:example
│        ╚╤════╝
│         ├Può fare riferimento al database catalogato specifico.
│         │
│         ├Può connettersi con un host e un numero di porta.
│         │
│         └Dovresti leggi la documentazione di ODBC/DB2 se si desidera
│          utilizzare questo.
│
├─pgsql
│ │
│ │            ╔═══════╗      ╔══╗        ╔═════╗
│ └─pgsql:host=localhost;port=5432;dbname=example
│              ╚╤══════╝      ╚╤═╝        ╚╤════╝
│               │              │           └Il nome del database da utilizzare.
│               │              │
│               │              └Il numero di porta con cui connettersi
│               │               all'host.
│               │
│               └L'host con cui connettersi per trovare il database.
│
├─sqlite
│ │
│ │        ╔════════╗
│ └─sqlite:example.db
│          ╚╤═══════╝
│           └Il percorso del file di database locale da utilizzare.
│
└─sqlsrv
  │
  │               ╔═══════╗ ╔══╗          ╔═════╗
  └─sqlsrv:Server=localhost,1521;Database=example
                  ╚╤══════╝ ╚╤═╝          ╚╤════╝
                   │         │             └Il nome del database da utilizzare.
                   │         │
                   │         └Il numero di porta con cui connettersi all'host.
                   │
                   └L'host con cui connettersi per trovare il database.
```

Se non sei sicuro di cosa utilizzare per una parte particolare del tuo DSN, prova innanzitutto a vedere se funziona così com'è, senza cambiare nulla.

Nota che `pdo_username` e `pdo_password` dovrebbero essere gli stessi del nome utente e della password che hai scelto per il tuo database.

#### <a name="AJAX_AJAJ_JSON"></a>Mia funzionalità di caricamento è asincrona (ad esempio, utilizza ajax, ajaj, json, ecc). Non vedo alcun messaggio o avviso speciale quando un caricamento è bloccato. Cosa sta succedendo?

Questa è normale. La pagina standard "Caricamento Negato" di phpMussel è servita come HTML, che dovrebbe essere sufficiente per le richieste sincrone tipiche, ma che probabilmente non sarà sufficiente se la tua funzionalità di caricamento si aspetta qualcos'altro. Se la tua funzionalità di caricamento è asincrona o si aspetta che uno stato di caricamento venga offerto in modo asincrono, ci sono alcune cose che potresti provare a fare affinché phpMussel soddisfi le esigenze della tua funzionalità di caricamento.

1. Creazione di un modello di output personalizzato per servire qualcosa di diverso dall'HTML.
2. Creazione di un plug-in personalizzato per ignorare completamente la pagina standard "Caricamento Negato" e chiedi al gestore del caricamento di fare qualcos'altro quando un caricamento è bloccato (ci sono alcuni hook di plugin forniti dal gestore di caricamento che potrebbero essere utili per questo).
3. Disabilitare completamente il gestore di caricamento e invece chiamare semplicemente l'API phpMussel dalla funzionalità di caricamento.

---


### 11. <a name="SECTION11"></a>INFORMAZIONE LEGALE

#### 11.0 SEZIONE PREAMBOLO

Questa sezione della documentazione ha lo scopo di descrivere possibili considerazioni legali riguardanti l'uso e l'implementazione del pacchetto, e fornire alcune informazioni di base relative. Questo può essere importante per alcuni utenti come mezzo per garantire la conformità con eventuali requisiti legali che possono esistere nei paesi in cui operano, e alcuni utenti potrebbero aver bisogno di modificare le loro politiche del sito web in conformità con queste informazioni.

Innanzitutto per favore, renditi conto che io (l'autore del pacchetto) non sono un avvocato, né un professionista legale qualificato di alcun tipo. Pertanto, non sono legalmente qualificato per fornire consulenza legale. Inoltre, in alcuni casi, i requisiti legali esatti possono variare a seconda dei paesi e delle giurisdizioni, e questi varie requisiti legali possono a volte entrare in conflitto (come, per esempio, nel caso di paesi che favoriscono i [diritti alla privacy](https://it.wikipedia.org/wiki/Privacy) e il [diritto all'oblio](https://it.wikipedia.org/wiki/Diritto_all%27oblio), contro paesi che favoriscono la [conservazione estesa dei dati](https://it.wikipedia.org/wiki/Direttiva_sulla_conservazione_dei_dati)). Considera inoltre che l'accesso al pacchetto non è limitato a specifici paesi o giurisdizioni, e quindi, la base utente del pacchetto è probabilmente geograficamente diversa. Considerando questi punti, non sono in grado di affermare cosa significa essere "legalmente conformi" per tutti gli utenti, in ogni aspetto. Tuttavia, spero che le informazioni qui contenute ti aiutino a prendere una decisione autonomamente riguardo a ciò che devi fare per rimanere legalmente conforme nel contesto del pacchetto. In caso di dubbi o preoccupazioni in merito alle informazioni qui contenute, o se hai bisogno di aiuto e consigli aggiuntivi da un punto di vista legale, consiglierei di consultare un professionista legale qualificato.

#### 11.1 RESPONSABILITÀ

Come già indicato dalla licenza del pacchetto, il pacchetto è fornito senza alcuna garanzia. Questo include (ma non è limitato a) tutti gli ambiti di responsabilità. Il pacchetto ti è stato fornito per vostra comodità, nella speranza che sia utile e che ti fornisca alcuni vantaggi. Tuttavia, se si utilizza o si implementa il pacchetto, è una scelta personale. Non sei obbligato a utilizzare o implementare il pacchetto, ma quando lo fai, sei responsabile di tale decisione. Né io né alcun altro contributore al pacchetto siamo legalmente responsabili delle conseguenze delle decisioni che prendete, indipendentemente dal fatto che siano dirette, indirette, implicite, o meno.

#### 11.2 TERZE PARTI

A seconda della sua esatta configurazione e implementazione, in alcuni casi il pacchetto può comunicare e condividere informazioni con terze parti. Questa informazione può essere definita come "[dati personali](https://it.wikipedia.org/wiki/Dati_personali)" (PII) in alcuni contesti, da alcune giurisdizioni.

Il modo in cui queste informazioni possono essere utilizzate da queste terze parti, è soggetto alle varie politiche stabilite da queste terze parti e non rientra nell'ambito di questa documentazione. Tuttavia, in tutti questi casi, la condivisione di informazioni con queste terze parti può essere disabilitata. In tutti questi casi, se si sceglie di abilitarlo, è vostra responsabilità ricercare eventuali eventuali dubbi relativi alla privacy, alla sicurezza e all'utilizzo delle PII da parte di queste terze parti. In caso di dubbi, o se non sei soddisfatto della condotta di queste terze parti in merito alle PII, è meglio disabilitare tutte le informazioni condivise con queste terze parti.

Ai fini della trasparenza, il tipo di informazioni condivise e con chi è descritto di seguito.

##### 11.2.1 URL SCANNER

Gli URL trovati nei caricamenti dei file possono essere condivisi con l'API Navigazione Sicura di Google, a seconda di come è configurato il pacchetto. L'API Navigazione sicura di Google richiede le chiavi API per funzionare correttamente, ed è quindi disabilitata per impostazione predefinita.

*Direttive di configurazione rilevanti:*
- `urlscanner` -> `google_api_key`

##### 11.2.2 VIRUS TOTAL

Quando phpMussel esegue la scansione di un caricamento di file, gli hash di tali file possono essere condivisi con l'API Virus Total, a seconda di come è configurato il pacchetto. Ci sono piani per poter condividere interi file ad un certo punto anche in futuro, ma questa funzionalità non è supportata dal pacchetto in questo momento. L'API Virus Total richiede una chiave API per funzionare correttamente, ed è quindi disabilitata per impostazione predefinita.

Le informazioni (inclusi i file e i relativi metadati di file) condivisi con Virus Total, possono anche essere condivise con i loro partner, affiliati, e vari altri a fini di ricerca. Questo è descritto in modo più dettagliato dalla loro politica sulla privacy.

*Vedere: [Privacy Policy &ndash; VirusTotal](https://support.virustotal.com/hc/en-us/articles/115002168385-Privacy-Policy).*

*Direttive di configurazione rilevanti:*
- `virustotal` -> `vt_public_api_key`

#### 11.3 REGISTRAZIONE

La registrazione è una parte importante di phpMussel per una serie di motivi. Potrebbe essere difficile diagnosticare e risolvere i falsi positivi quando gli eventi di blocco che li causano non vengono registrati. Senza registrare gli eventi di blocco, potrebbe essere difficile accertare esattamente quanto è performante phpMussel in un particolare contesto, e potrebbe essere difficile determinare dove potrebbero essere le sue carenze, e quali modifiche potrebbero essere richieste alla sua configurazione o alle sue firme di conseguenza, affinché possa continuare a funzionare come previsto. Ciò nonostante, la registrazione potrebbe non essere auspicabile per tutti gli utenti, e rimane del tutto facoltativa. In phpMussel, la registrazione è disabilitata per impostazione predefinita. Per abilitarlo, phpMussel deve essere configurato di conseguenza.

Inoltre, se la registrazione è legalmente ammissibile, e nella misura in cui è legalmente ammissibile (ad esempio, i tipi di informazioni che possono essere registrati, per quanto tempo, e in quali circostanze), può variare, a seconda della giurisdizione e del contesto in cui è implementata la phpMussel (ad esempio, se stai operando come individuo, come entità aziendale, e se commerciale o non commerciale). Potrebbe quindi essere utile leggere attentamente questa sezione.

Esistono diversi tipi di registrazione che phpMussel può eseguire. Diversi tipi di registrazione coinvolgono diversi tipi di informazioni, per diversi motivi.

##### 11.3.0 REGISTRI DI SCANSIONE

Quando abilitato nella configurazione del pacchetto, phpMussel conserva i registri dei file che sottopone a scansione. Questi tipi di log sono disponibili in due formati diversi:
- File di log leggibili dall'uomo.
- File di log serializzati.

Le voci di un file di log leggibile in genere assomiglia a qualcosa come questo (ad esempio):

```
Sun, 19 Jul 2020 13:33:31 +0800 Iniziato.
→ Controllando "ascii_standard_testfile.txt".
─→ Rilevato phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
Sun, 19 Jul 2020 13:33:31 +0800 Finito.
```

Una voce del registro di scansione include in genere le seguenti informazioni:
- La data e l'ora in cui il file è stato scansionato.
- Il nome del file scansionato.
- Cosa è stato rilevato nel file (se è stato rilevato qualcosa).

*Direttive di configurazione rilevanti:*
- `general` -> `scan_log`
- `general` -> `scan_log_serialized`

Quando queste direttive vengono lasciate vuote, questo tipo di registrazione rimarrà disabilitato.

##### 11.3.1 REGISTRI DI CARICAMENTI

Quando abilitato nella configurazione del pacchetto, phpMussel mantiene i registri dei caricamenti che sono stati bloccati.

*Come esempio:*

```
Data: Sun, 19 Jul 2020 13:33:31 +0800
Indirizzo IP: 127.0.0.x
== Risultati della scansione (perché contrassegnati) ==
Rilevato phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
== Ricostruzione delle firme hash ==
dcacac499064454218823fbabff7e09b5b011c0c877ee6f215f35bffb195b6e9:654:ascii_standard_testfile.txt
In quarantena come "1595142388-2e017ea9ac1478e45dc15794a1fc18c0.qfu".
```

Queste voci del registro in genere includono le seguenti informazioni:
- La data e l'ora in cui il caricamento è stato bloccato.
- L'indirizzo IP da cui ha avuto origine il caricamento.
- Il motivo per cui il file è stato bloccato (ciò che è stato rilevato).
- Il nome del file bloccato.
- Il checksum e la dimensione del file bloccato.
- Se il file è stato messo in quarantena, e con quale nome interno.

*Direttive di configurazione rilevanti:*
- `web` -> `uploads_log`

##### 11.3.2 REGISTRI DEL FRONT-END

Questo tipo di registrazione si riferisce ai tenta di accedere al front-end, e si verifica solo quando un utente tenta di accedere al front-end (supponendo che l'accesso front-end sia abilitato).

Una voce di registro front-end contiene l'indirizzo IP dell'utente che tenta di accedere, la data e l'ora in cui si è verificato il tentativo, e i risultati del tentativo (se il tentativo è fallito o è riuscito). Una voce di registro front-end in genere assomiglia a qualcosa come questo (ad esempio):

```
x.x.x.x - Day, dd Mon 20xx hh:ii:ss +0000 - "admin" - Connesso.
```

*Direttive di configurazione rilevanti:*
- `general` -> `frontend_log`

##### 11.3.3 ROTAZIONE DEL REGISTRO

Forse vuoi eliminare i log dopo un certo periodo di tempo, o forse sei obbligato a farlo per legge (cioè, la quantità di tempo per cui è legalmente ammissibile per te conservare i log può essere limitata dalla legge). È possibile ottenere ciò includendo indicatori di data/ora nei nomi dei file di log come specificato dalla configurazione del pacchetto (per esempio, `{yyyy}-{mm}-{dd}.log`), e quindi abilitando la rotazione del registro (la rotazione del registro permette di eseguire alcune azioni sui file di log quando vengono superati i limiti specificati).

Per esempio: Se dovessi legalmente richiesto di eliminare i log dopo 30 giorni, potrei specificare `{dd}.log` nei nomi dei miei file di log (`{dd}` rappresenta i giorni), impostare il valore di `log_rotation_limit` su 30, e impostare il valore di `log_rotation_action` su `Delete`.

Al contrario, se è necessario conservare i log per un lungo periodo di tempo, potresti scegliere di non utilizzare la rotazione del registro affatto, oppure puoi impostare il valore di `log_rotation_action` su `Archive`, per comprimere i file di log, riducendo in tal modo la quantità totale di spazio su disco che occupano.

*Direttive di configurazione rilevanti:*
- `general` -> `log_rotation_limit`
- `general` -> `log_rotation_action`

##### 11.3.4 TRONCAMENTO DEL REGISTRO

È anche possibile troncare i singoli file di registro quando superano una dimensione predeterminata, se questo è qualcosa che potrebbe essere necessario o desiderare.

*Direttive di configurazione rilevanti:*
- `general` -> `truncate`

##### 11.3.5 PSEUDONIMIZZAZIONE DELL'INDIRIZZO IP

Innanzitutto, se non hai familiarità con il termine, "pseudonimizzazione" si riferisce al trattamento di dati personali in quanto tali che non può più essere identificato con alcun interessato specifico senza informazioni supplementari, e a condizione che tali informazioni supplementari siano mantenute separatamente e soggette a misure tecniche e organizzative per garantire che i dati personali non possano essere identificati da alcuna persona naturale.

In alcune circostanze, potrebbe essere richiesto per legge di anonimizzare o pseudonimizzare qualsiasi informazione personale raccolta, elaborata, o memorizzata. Sebbene questo concetto sia esistito già da un po' di tempo, GDPR/DSGVO menziona in particolare, e in particolare incoraggia la "pseudonimizzazione".

phpMussel è in grado di pseudonimizzare gli indirizzi IP durante la registrazione, se questo è qualcosa che potresti aver bisogno o vuoi fare. Quando gli indirizzi IP sono pseudonimizzati da phpMussel, quando registrati, l'ottetto finale degli indirizzi IPv4 e tutto ciò che segue la seconda parte degli indirizzi IPv6 è rappresentato da una "x" (arrotondare efficacemente gli indirizzi IPv4 all'indirizzo iniziale della 24a sottorete in cui fanno fattore e gli indirizzi IPv6 all'indirizzo iniziale della 32a sottorete a cui fanno fattore).

*Direttive di configurazione rilevanti:*
- `legal` -> `pseudonymise_ip_addresses`

##### 11.3.6 STATISTICA

phpMussel è facoltativamente in grado di tracciare statistiche come il numero totale di file scansionati e bloccati da un certo punto nel tempo. Questa funzione è disabilitata per impostazione predefinita, ma può essere abilitata tramite la configurazione del pacchetto. Il tipo di informazioni rintracciate non deve essere considerato come PII.

*Direttive di configurazione rilevanti:*
- `general` -> `statistics`

##### 11.3.7 CRITTOGRAFIA

phpMussel non crittografa la sua cache o alcuna informazione di registro. La [crittografia](https://it.wikipedia.org/wiki/Crittografia) della cache e del registro potrebbe essere introdotta in futuro, ma al momento non sono previsti piani specifici. Se sei preoccupato per le terze parti non autorizzate che accedono a parti di phpMussel che potrebbero contenere informazioni personali o riservate quali la cache o i registri, ti consiglio di non installare phpMussel in una posizione accessibile al pubblico (per esempio, installare phpMussel al di fuori della cartella `public_html` standard o equivalente di quella disponibile per la maggior parte dei server Web standard) e che le autorizzazioni appropriatamente restrittive siano applicate per la cartella in cui risiede. Se ciò non è sufficiente per risolvere i tuoi dubbi, allora configura phpMussel in modo tale che i tipi di informazioni che causano i tuoi dubbi non saranno raccolti o registrati in primo luogo (ad esempio, di disabilitando la registrazione).

#### 11.4 COOKIE

Quando un utente accede con successo al front-end, phpMussel imposta un [cookie](https://it.wikipedia.org/wiki/Cookie) per poter ricordare all'utente le richieste successive (cioè, i cookie vengono utilizzati per autenticare l'utente in una sessione di accesso). Nella pagina di accesso, un avviso sui cookie viene visualizzato in modo prominente, avvisando l'utente che verrà impostato un cookie se si impegnano nell'azione in questione. I cookie non sono impostati in altri punti della base di codice.

#### 11.5 MARKETING E PUBBLICITÀ

phpMussel non raccoglie né elabora alcuna informazione per scopi di marketing o pubblicitari, e non vende né guadagna da alcuna informazione raccolta o registrata. phpMussel non è un'impresa commerciale, né è collegata ad alcun interesse commerciale, quindi fare queste cose non avrebbe alcun senso. Questo è stato il caso dall'inizio del progetto e continua ad esserlo oggi. Inoltre, fare queste cose sarebbe controproducente per lo spirito e lo scopo del progetto nel suo insieme e, finché continuerò a mantenere il progetto, non accadrà mai.

#### 11.6 POLITICA SULLA PRIVACY

In alcune circostanze, potresti essere legalmente obbligato a mostrare chiaramente un link alla tua politica sulla privacy su tutte le pagine e sezioni del tuo sito web. Questo può essere importante come mezzo per garantire che gli utenti siano ben informati delle tue esatte pratiche sulla privacy, i tipi di Informazioni personali che raccogli, e come intendi usarli. Per poter includere tale link nella pagina "Caricamento Negato" di phpMussel, viene fornita una direttiva di configurazione per specificare l'URL della tua politica sulla privacy.

*Direttive di configurazione rilevanti:*
- `legal` -> `privacy_policy`

#### 11.7 GDPR/DSGVO

Il regolamento generale sulla protezione dei dati (GDPR) è un regolamento dell'Unione europea, che entrerà in vigore il 25 maggio 2018. L'obiettivo principale del regolamento è di dare il controllo dei cittadini e dei residenti dell'UE sui propri dati personali, e di unificare il regolamento all'interno dell'UE in materia di privacy e dati personali.

Il regolamento contiene disposizioni specifiche relative al trattamento di "[dati personali](https://it.wikipedia.org/wiki/Dati_personali)" (PII) di qualsiasi "interessato" (qualsiasi persona naturale identificata o identificabile) dall'UE o all'interno dell'UE. Per essere conformi al regolamento, le "imprese" (come definite dal regolamento), e tutti i sistemi e processi rilevanti devono implementare "[privacy by design](https://it.wikipedia.org/wiki/Privacy_by_design)" per impostazione predefinita, deve utilizzare le impostazioni di privacy più alte possibili, deve implementare le necessarie salvaguardie per qualsiasi informazione archiviata o elaborata (inclusa, ma non limitata a, l'implementazione della pseudonimizzazione o la completa anonimizzazione dei dati), deve dichiarare in modo chiaro e inequivocabile i tipi di dati che raccolgono, come li elaborano, per quali ragioni, per quanto tempo lo conservano, e se condividono questi dati con terze parti, i tipi di dati condivisi con terze parti, come, perché, e così via.

I dati non possono essere elaborati a meno che non vi sia una base legale per farlo, come definito dal regolamento. In generale, ciò significa che, al fine di elaborare i dati di un interessati su base legale, deve essere fatto in conformità con gli obblighi legali, o fatto solo dopo il consenso esplicito, ben informato, e non ambiguo è stato ottenuto dall'interessato.

Poiché gli aspetti del regolamento possono evolversi nel tempo, al fine di evitare la propagazione di informazioni obsolete, potrebbe essere meglio conoscere il regolamento da una fonte autorevole, al contrario di includere semplicemente le informazioni rilevanti qui nella documentazione del pacchetto (che potrebbe diventare obsoleto con l'evoluzione del regolamento).

[EUR-Lex](https://eur-lex.europa.eu/) (una parte del sito web ufficiale dell'Unione europea che fornisce informazioni sul diritto dell'UE) fornisce ampie informazioni su GDPR/DSGVO, disponibile in 24 lingue diverse (al momento della stesura di questo documento), e disponibile per il download in formato PDF. Consiglio vivamente di leggere le informazioni che forniscono, per saperne di più su GDPR/DSGVO:
- [REGOLAMENTO (UE) 2016/679 DEL PARLAMENTO EUROPEO E DEL CONSIGLIO](https://eur-lex.europa.eu/legal-content/IT/TXT/?uri=celex:32016R0679)

In alternativa, è disponibile una breve panoramica (non autorevole) di GDPR/DSGVO su Wikipedia:
- [Regolamento generale sulla protezione dei dati](https://it.wikipedia.org/wiki/Regolamento_generale_sulla_protezione_dei_dati)

---


Ultimo Aggiornamento: 2 Luglio 2020 (2020.08.02).
