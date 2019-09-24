## Documentazione per phpMussel (Italiano).

### Contenuti
- 1. [PREAMBOLO](#SECTION1)
- 2. [COME INSTALLARE](#SECTION2)
- 3. [COME USARE](#SECTION3)
- 4. [GESTIONE FRONT-END](#SECTION4)
- 5. [CLI (INTERFACCIA A RIGA DI COMANDO)](#SECTION5)
- 6. [FILE INCLUSI IN QUESTO PACCHETTO](#SECTION6)
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

Questo documento ed il pacchetto associato ad esso possono essere scaricati liberamente da:
- [GitHub](https://github.com/phpMussel/phpMussel).
- [Bitbucket](https://bitbucket.org/Maikuolan/phpmussel).
- [SourceForge](https://sourceforge.net/projects/phpmussel/).

---


### 2. <a name="SECTION2"></a>COME INSTALLARE

#### 2.0 INSTALLAZIONE MANUALMENTE (PER WEB SERVER)

1) Continuando la lettura, si suppone che hai già scaricato una copia dello script, decompresso il contenuto e lo hai collocato da qualche parte sul tuo terminale. Da qui, ti consigliamo di determinare dove sulla macchina o CMS si desidera inserire quei contenuti. Una cartella come `/public_html/phpmussel/` o simile (sebbene, non è importante quale si sceglie, purché sia qualcosa di sicuro e che ti soddisfi) sarà sufficiente. *Prima di iniziare il caricamento, continua a leggere..*

2) Rinomina `config.ini.RenameMe` a `config.ini` (situato della `vault`), e facoltativamente (fortemente consigliata per gli avanzati utenti, ma non è consigliata per i principianti o per gli inesperti), aprirlo (questo file contiene tutte le direttive disponibili per phpMussel; sopra ogni opzione dovrebbe essere un breve commento che descrive ciò che fa e ciò che è per). Regolare queste opzioni come meglio credi, come per ciò che è appropriato per la vostre particolare configurazione. Salvare il file, chiudere.

3) Carica i contenuti (phpMussel e le sue file) nella cartella che ci deciso in precedenza (non è necessario includere i `*.txt`/`*.md` file, ma altrimenti, si dovrebbe caricare tutto).

4) CHMOD la cartella `vault` a "755" (se ci sono problemi, si può provare "777", ma questo è meno sicura). La principale cartella che memorizzare il contenuti (quello scelto in precedenza), solitamente, può essere lasciato solo, ma lo CHMOD stato dovrebbe essere controllato se hai avuto problemi di autorizzazioni in passato sul vostro sistema (per predefinita, dovrebbe essere qualcosa simile a "755"). In breve: Perché il pacchetto funzioni correttamente, PHP deve essere in grado di leggere e scrivere file all'interno della cartella `vault`. Molte cose (aggiornamento, registrazione, ecc) non saranno possibili, se PHP non può scrivere nella cartella `vault`, e il pacchetto non funzionerà affatto se PHP non può leggere dalla cartella `vault`. Tuttavia, per una sicurezza ottimale, la cartella `vault` NON deve essere accessibile al pubblico (informazioni sensibili, come le informazioni contenute da `config.ini` o `frontend.dat`, potrebbero essere esposte a potenziali aggressori se la cartella `vault` è pubblicamente accessibile).

5) Installare tutte le firme necessarie. *Vedere: [INSTALLAZIONE DI FIRME](#INSTALLING_SIGNATURES).*

6) Successivamente, sarà necessario collegare phpMussel al vostro sistema o CMS. Ci sono diversi modi in cui è possibile collegare script come phpMussel al vostre sistema o CMS, ma il più semplice è di inserire lo script all'inizio di un file del vostre sistema o CMS (quello che sarà generalmente sempre essere caricato quando qualcuno accede a una pagina attraverso il vostro sito) utilizzando un `require` o `include` comando. Solitamente, questo sarà qualcosa memorizzate in una cartella, ad esempio `/includes`, `/assets` o `/functions`, e spesso essere chiamato qualcosa come `init.php`, `common_functions.php`, `functions.php` o simili. Avrete bisogno determinare quale file è per la vostra situazione; In caso di difficoltà nel determinare questo per te, per assistenza, visitare la pagina di problemi/issues per phpMussel a GitHub o il forum di supporto per phpMussel; È possibile che io o un altro utente possono avere esperienza con il CMS che si sta utilizzando (avrete bisogno di fateci sapere quale CMS si sta utilizzando), e quindi, può essere in grado di fornire assistenza in questo settore. Per fare questo [utilizzare `require` o `include`], inserire la seguente linea di codice all'inizio di quel core file, sostituendo la stringa contenuta all'interno delle virgolette con l'indirizzo esatto del file `loader.php` (l'indirizzo locale, non l'indirizzo HTTP; sarà simile all'indirizzo citato in precedenza).

`<?php require '/user_name/public_html/phpmussel/loader.php'; ?>`

Salvare il file, chiudere, caricare di nuovo.

-- IN ALTERNATIVA --

Se stai usando un Apache web server e se si ha accesso a `php.ini`, è possibile utilizzare il `auto_prepend_file` direttiva per precarico phpMussel ogni volta che qualsiasi richiesta di PHP è fatto. Qualcosa come:

`auto_prepend_file = "/user_name/public_html/phpmussel/loader.php"`

O questo nel `.htaccess` file:

`php_value auto_prepend_file "/user_name/public_html/phpmussel/loader.php"`

7) A questo punto, il gioco è fatto! Ma, si dovrebbe probabilmente verificare il lavoro svolto per assicurarsi che funzioni correttamente. Per testare le protezioni di file caricamente, tentare di caricare i test file inclusi nella pacchetto all'interno `_testfiles` al vostro web sito via i vostri soliti metodi di browser basato file caricamento. (Assicurati di aver incluso i file di firma `phpmussel*.*db` nella direttiva di configurazione `active` per i file di test da attivare). Se tutto funziona, un messaggio dovrebbe apparire da phpMussel conferma che il caricamento è stato bloccato con successo. Se nulla appare, qualcosa non funziona correttamente. Se si sta utilizzando qualsiasi l'avanzate funzioni o se si sta utilizzando qualsiasi altri tipi di scansione possibili con lo strumento, mi piacerebbe suggerisco di provarlo quelli per assicurarsi che funzioni come previsto, anche.

#### 2.1 INSTALLAZIONE MANUALMENTE (PER CLI)

1) Con la vostra lettura di questo, sto supponendo che hai già scaricato una archiviata copia dello script, decompresso il contenuto e lo hanno seduto da qualche parte sul tuo locale macchina. Quando hai stabilito che sei felice con il luogo scelto per phpMussel, continuare.

2) phpMussel richiede PHP essere installato sulla macchina per eseguire. Se non lo avete PHP installato sul vostra macchina, prego installare PHP sul vostra macchina seguendo le istruzioni fornite dal PHP installazione programma.

3) Facoltativamente (fortemente consigliata per gli avanzati utenti, ma non è consigliata per i principianti o per gli inesperti), apri `config.ini` (situato della `vault`) – Questo file contiene tutte le direttive disponibili per phpMussel. Sopra ogni opzione dovrebbe essere un breve commento che descrive ciò che fa e ciò che è per. Regolare queste opzioni come meglio credi, come per ciò che è appropriato per la vostre particolare configurazione. Salvare il file, chiudere.

4) Facoltativamente, si può rendere utilizzando di phpMussel in modalità CLI facile per voi stessi per creando un batch file ai fini della automaticamente caricare PHP e phpMussel. Per fare questo, aprire un testo editor come Notepad o Notepad++, digitare il completo percorso della `php.exe` file nella cartella della vostra installazione di PHP, seguito da uno spazio, seguito dal completo percorso della `loader.php` file nella cartella della vostra installazione di phpMussel, salvare il file con un `.bat` estensione qualche parte che lo troverete facilmente, e fare doppio clic su tale file per eseguire phpMussel in futuro.

5) Installare tutte le firme necessarie. *Vedere: [INSTALLAZIONE DI FIRME](#INSTALLING_SIGNATURES).*

6) A questo punto, il gioco è fatto! Ma, si dovrebbe probabilmente verificare il lavoro svolto per assicurarsi che funzioni correttamente. Per testare phpMussel, eseguire phpMussel e prova scansionare la `_testfiles` cartella fornito con il pacchetto.

#### 2.2 INSTALLARE CON IL COMPOSER

[phpMussel è quotata a Packagist](https://packagist.org/packages/phpmussel/phpmussel), e così, se si ha familiarità con Composer, è possibile utilizzare Composer per l'installazione di phpMussel (è comunque necessario per preparare la configurazione, impostare i permessi, preparare le firme e includere `loader.php` però; vedere "installazione manualmente (per web server)" passi 2, 4, 5, e 6).

`composer require phpmussel/phpmussel`

#### <a name="INSTALLING_SIGNATURES"></a>2.3 INSTALLAZIONE DI FIRME

Dal v1.0.0, le firme non sono incluse nel pacchetto phpMussel. Le firme sono richieste da phpMussel per rilevare minacce specifiche. Esistono 3 metodi principali per installare le firme:

1. Installare automaticamente utilizzando il front-end pagina degli aggiornamenti.
2. Genera firme usando "SigTool" e installa manualmente.
3. Scaricare le firme da "phpMussel/Signatures" e installare manualmente.

##### 2.3.1 Installare automaticamente utilizzando il front-end pagina degli aggiornamenti.

In primo luogo, è necessario assicurarsi che il front-end sia abilitato. *Vedere: [GESTIONE FRONT-END](#SECTION4).*

Allora, tutto quello che dovrai fare è andare a il front-end pagina degli aggiornamenti, trovare i file di firma necessari, e utilizzare le opzioni fornite nella pagina, installarle, e attivarle.

##### 2.3.2 Genera firme usando "SigTool" e installa manualmente.

*Vedere: [Documentazione SigTool](https://github.com/phpMussel/SigTool#documentation).*

##### 2.3.3 Scaricare le firme da "phpMussel/Signatures" e installare manualmente.

In primo luogo, vai a [phpMussel/Signatures](https://github.com/phpMussel/Signatures). Il repository contiene vari file di firma compressi GZ. Scarica i file necessari, decomprimere e copiare i file decompressi nella cartella `/vault/signatures` per installarli. Elencare i nomi dei file copiati nella direttiva `active` nella configurazione di phpMussel per attivarli.

---


### 3. <a name="SECTION3"></a>COME USARE

#### 3.0 COME USARE (PER WEB SERVER)

phpMussel dovrebbe essere in grado di funzionare correttamente con requisiti minimi da parte vostra: Dopo l'installazione, dovrebbe funzionare immediatamente ed essere immediatamente utilizzabile.

Scansionare di file caricamenti è automatizzato e abilitato per predefinita, perciò nulla è richiesto a vostro nome per questa particolare funzione.

Ma, si è anche in grado di istruire phpMussel per la scansione per i specifici file, cartelle o archivi. Per fare questo, in primo luogo, è necessario assicurarsi che l'appropriata configurazione è impostato nella `config.ini` file (`cleanup` deve essere disattivato), e quando fatto, in un PHP file che è collegato allo phpMussel, utilizzare la seguente funzione nelle codice:

`$phpMussel['Scan']($cosa_a_scansione, $tipi_di_output, $output_pianura);`

- `$cosa_a_scansione` può essere una stringa, un array o un array di array multipli, e indica quale d'il file, cartella e/o cartelle a scansiona.
- `$tipi_di_output` è un valore booleano, indicanti il formato per i risultati della scansione a essere restituire come. `false` istruisce la funzione a restituire i risultati come un intero. `true` istruisce la funzione a restituire i risultati come testo leggibile. In aggiunta, in ogni caso, i risultati sono accessibili tramite variabili globali dopo la scansione è stata completata. Questa variabile è facoltativa, inadempiente su `false`. Di seguito vengono descritti i risultati interi:

| Risultati | Descrizioni |
|---|---|
| -4 | Indica che i dati non possono essere scansionati a causa della crittografia. |
| -3 | Indica che sono stati incontrati problemi con i file di firme phpMussel. |
| -2 | Indica che i corrotto dato è stato rilevato durante la scansione e quindi la scansione non abbia completato. |
| -1 | Indica che estensioni o addon richiesti per PHP a eseguire la scansione erano assente e quindi la scansione non abbia completato. |
| 0 | Indica che l'obiettivo di scansione non esiste e quindi non c'era nulla a scansione. |
| 1 | Indica che l'obiettivo è stato scansionata correttamente e non problemi stati rilevati. |
| 2 | Indica che l'obiettivo è stato scansionata correttamente e problemi stati rilevati. |

- `$output_pianura` è un valore booleano, indicanti alla funzione se restituire i risultati della scansione (quando ci sono multipli obiettivi di scansione) come un array o una stringa. `false` restituirà i risultati come un array. `true` restituirà i risultati come una stringa. Questa variabile è facoltativa, inadempiente su `false`.

Esempi:

```PHP
 $results = $phpMussel['Scan']('/user_name/public_html/my_file.html', true, true);
 echo $results;
```

Restituisce qualcosa come (in forma di una stringa):

```
 Wed, 16 Sep 2013 02:49:46 +0000 Iniziato.
 > Verifica '/user_name/public_html/my_file.html':
 -> Nessun problema rilevato.
 Wed, 16 Sep 2013 02:49:47 +0000 Finito.
```

Per una dettagliata spiegazione del tipo di firme di cui phpMussel usa durante le sue scansioni e come le sue gestisce queste firme, fare riferimento alla [FIRMA FORMATO](#SECTION8) sezione di questo file README.

Se si incontrano qualsiasi falsi positivi, se si incontrano qualcosa nuova che si pensa dovrebbe essere bloccato, o per qualsiasi altri scopi o materia a riguardo delle firme, si prega di contattare me a riguardo esso così che io possa apportare le necessarie modifiche, di cui, se si non contatto me, io non necessariamente essere consapevole ne. *(Vedere: [Che cosa è un "falso positivo"?](#WHAT_IS_A_FALSE_POSITIVE)).*

Per disabilita firme incluso con phpMussel (come se stai sperimentando falsi positivi specifico alle vostri scopi di cui non dovrebbero normalmente essere rimosso dalla mainline), aggiungere i nomi delle firme specifiche da disabilitare al file greylist (`/vault/greylist.csv`), separati da virgole.

*Guarda anche: [Come accedere a dettagli specifici sui file quando vengono scansionati?](#SCAN_DEBUGGING)*

#### 3.1 COME USARE (PER CLI)

Si prega di fare riferimento alla "INSTALLAZIONE MANUALMENTE (PER CLI)" sezione di questo file README.

Anche essere consapevoli che phpMussel è uno scanner *on-demand* (cioè, su richiesta); *NON* è uno scanner *on-access* (cioè, in accesso; ad eccezione di caricamenti di file, al momento del caricamento), e diverso dai convenzionali anti-virus suite, non protegge la memoria attiva! Essa solo rileva virus contenuti dai caricamenti di file, e contenuti da quei file specifici che si esplicitamente dica per scansione.

---


### 4. <a name="SECTION4"></a>GESTIONE FRONT-END

#### 4.0 QUAL È IL FRONT-END.

Il front-end fornisce un modo conveniente e facile da mantenere, gestire e aggiornare l'installazione phpMussel. È possibile visualizzare, condividere e scaricare file di log attraverso la pagina di log, è possibile modificare la configurazione attraverso la pagina di configurazione, è possibile installare e disinstallare i componenti attraverso la pagina degli aggiornamenti, e si può caricare, scaricare e modificare i file nel vault tramite il file manager.

Il front-end è disabilitato per impostazione predefinita al fine di prevenire l'accesso non autorizzato (l'accesso non autorizzato potrebbe avere conseguenze significative per il vostro sito e la sua sicurezza). Istruzioni per l'abilitazione si sono compresi sotto di questo paragrafo.

#### 4.1 COME ATTIVARE IL FRONT-END.

1) Trova la direttiva `disable_frontend` dentro `config.ini`, e impostarlo su `false` (sarà `true` per impostazione predefinita).

2) Accedi `loader.php` dal browser (per esempio, `http://localhost/phpmussel/loader.php`).

3) Accedi con il nome utente e la password predefinita (admin/password).

Nota: Dopo aver effettuato l'accesso per la prima volta, al fine di impedire l'accesso non autorizzato al front-end, si dovrebbe cambiare immediatamente il nome utente e la password! Questo è molto importante, perché è possibile caricare codice PHP arbitrario al suo sito web attraverso il front-end.

Inoltre, per una sicurezza ottimale, si consiglia vivamente di abilitare "l'autenticazione a due fattori" per tutti i conti front-end (istruzioni fornite di seguito).

#### 4.2 COME UTILIZZARE IL FRONT-END.

Le istruzioni sono fornite su ciascuna pagina del front-end, per spiegare il modo corretto di usarlo e la sua destinazione. Se avete bisogno di ulteriori spiegazioni o qualsiasi assistenza speciale, si prega di contattare il supporto. In alternativa, ci sono alcuni video disponibili su YouTube, che potrebbero aiutare per mezzo di dimostrazione.

#### 4.3 AUTENTICAZIONE A DUE FATTORI

È possibile rendere il front-end più sicuro attivando l'autenticazione a due fattori ("2FA"). Quando si accede a un account attivato per 2FA, viene inviata una posta elettronica all'indirizzo di posta elettronica associato a tale account. Questo indirizzo di posta elettronica contiene un "codice 2FA", che l'utente deve quindi inserire, inoltre al nome utente e alla password, per poter accedere utilizzando tale account. Ciò significa che l'ottenimento di una password dell'account non sarebbe sufficiente per consentire a qualsiasi hacker o potenziale utente malintenzionato di accedere a tale account, in quanto avrebbe anche bisogno di avere accesso all'indirizzo di posta elettronica associato a tale account per poter ricevere e utilizzare il codice 2FA associato alla sessione, rendendo così il front-end più sicuro.

Innanzitutto, per attivare l'autenticazione a due fattori, utilizzando la pagina degli aggiornamenti front-end, installare il componente PHPMailer. phpMussel utilizza PHPMailer per l'invio di posta elettronica. Va notato che sebbene phpMussel, di per sé, sia compatibile con PHP >= 5.4.0, PHPMailer richiede PHP >= 5.5.0, e pertanto, l'attivazione dell'autenticazione a due fattori per il front-end phpMussel non sarà possibile per gli utenti di PHP 5.4.

Dopo aver installato PHPMailer, dovrai compilare le direttive di configurazione per PHPMailer tramite la pagina di configurazione phpMussel o il file di configurazione. Ulteriori informazioni su queste direttive di configurazione sono incluse nella sezione di configurazione di questo documento. Dopo aver compilato le direttive di configurazione di PHPMailer, imposta da `enable_two_factor` x `true`. L'autenticazione a due fattori dovrebbe ora essere attivata.

Successivamente, dovrai associare un indirizzo di posta elettronica a un account, in modo che phpMussel sappia dove inviare i codici 2FA quando accede con quell'account. Per fare ciò, usa l'indirizzo di posta elettronica come nome utente per l'account (come `foo@bar.tld`), o includere l'indirizzo di posta elettronica come parte del nome utente nello stesso modo in cui si farebbe quando si invia una posta elettronica normalmente (come `Foo Bar <foo@bar.tld>`).

Nota: Proteggere il tuo vault dall'accesso non autorizzato (per esempio, per mezzo di rafforzando le autorizzazioni di sicurezza e di accesso pubblico del tuo server), è particolarmente importante qui, a causa di tale accesso non autorizzato al file di configurazione (che è memorizzato nel vault), potrebbe rischiare di esporre le impostazioni SMTP in uscita (incluso il nome utente e la password per il tuo SMTP). È meglio assicurarsi che il vault sia correttamente protetto prima di attivare l'autenticazione a due fattori. Se non sei in grado di farlo, almeno, dovresti creare un nuovo account di posta elettronica, dedicato a questo scopo, in quanto tale per ridurre i rischi associati alle impostazioni SMTP esposte.

---


### 5. <a name="SECTION5"></a>CLI (INTERFACCIA A RIGA DI COMANDO)

phpMussel può essere eseguito come uno interattivo file scanner in modalità CLI da Windows. Fare riferimento alla "COME INSTALLARE (PER CLI)" sezione di questo file README per maggiori dettagli.

Per un elenco di comandi disponibili all'interno CLI, al CLI prompt, tipo 'c', e premere Enter.

Inoltre, per chi fosse interessato, un video tutorial su come utilizzare phpMussel in modalità CLI è disponibile qui:
- <https://youtu.be/H-Pa740-utc>

---


### 6. <a name="SECTION6"></a>FILE INCLUSI IN QUESTO PACCHETTO

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


### 7. <a name="SECTION7"></a>OPZIONI DI CONFIGURAZIONE

Il seguente è un elenco di variabili trovate nelle `config.ini` file di configurazione di phpMussel, insieme con una descrizione del loro scopo e funzione.

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

#### "general" (Categoria)
Generale configurazione per phpMussel.

##### "cleanup"
- Disimpostare le script variabili e la cache dopo l'esecuzione? False = No; True = Sì [Predefinito]. Se non stai usando lo script per qualcosa di diverso dalla scansione dei caricamenti, dovresti impostarlo su `true`, per ridurre al minimo l'utilizzo della memoria. Altrimenti, dovresti impostarlo su `false`, al fine di conservare in memoria i dati necessari per eseguire phpMussel senza ricaricarlo inutilmente.
- Non ha alcuna influenza in modalità CLI.

##### "scan_log"
- Il nome del file per registrare tutti i risultati di la scansione. Specificare un nome del file, o lasciare vuoto per disattivarlo.

##### "scan_log_serialized"
- Il nome del file per registrare tutti i risultati di la scansione (utilizzando un formato serializzato). Specificare un nome del file, o lasciare vuoto per disattivarlo.

##### "scan_kills"
- Il nome del file per registrare tutti i record di bloccato o ucciso caricamenti. Specificare un nome del file, o lasciare vuoto per disattivarlo.

*Consiglio utile: Se vuoi, è possibile aggiungere data/ora informazioni per i nomi dei file per la registrazione par includendo queste nel nome: `{yyyy}` per l'anno completo, `{yy}` per l'anno abbreviato, `{mm}` per mese, `{dd}` per giorno, `{hh}` per ora.*

*Esempi:*
- *`scan_log='scan_log.{yyyy}-{mm}-{dd}-{hh}.txt'`*
- *`scan_log_serialized='scan_log_serialized.{yyyy}-{mm}-{dd}-{hh}.txt'`*
- *`scan_kills='scan_kills.{yyyy}-{mm}-{dd}-{hh}.txt'`*

##### "error_log"
- Un file per la registrazione di eventuali errori non fatali rilevati. Specificare un nome di file, o lasciare vuoto per disabilitare.

##### "truncate"
- Troncare i file di log quando raggiungono una determinata dimensione? Il valore è la dimensione massima in B/KB/MB/GB/TB che un file di log può crescere prima di essere troncato. Il valore predefinito di 0KB disattiva il troncamento (i file di log possono crescere indefinitamente). Nota: Si applica ai singoli file di log! La dimensione dei file di log non viene considerata collettivamente.

##### "log_rotation_limit"
- La rotazione dei log limita il numero di file di log che dovrebbero esistere in qualsiasi momento. Quando vengono creati nuovi file di log, se il numero totale di file di log supera il limite specificato, verrà eseguita l'azione specificata. Qui puoi specificare il limite desiderato. Un valore di 0 disabiliterà la rotazione dei log.

##### "log_rotation_action"
- La rotazione dei log limita il numero di file di log che dovrebbero esistere in qualsiasi momento. Quando vengono creati nuovi file di log, se il numero totale di file di log supera il limite specificato, verrà eseguita l'azione specificata. Qui puoi specificare l'azione desiderato. Delete = Elimina i file di log più vecchi, finché il limite non viene più superato. Archive = In primo luogo archiviare e quindi, eliminare i file di log più vecchi, finché il limite non viene più superato.

*Chiarimento tecnico: In questo contesto, "più vecchi" significa modificato meno di recente.*

##### "timezone"
- Questo è usato per specificare quale fuso orario phpMussel dovrebbe usare per le operazioni di data/ora. Se non ne hai bisogno, ignoralo. I valori possibili sono determinati da PHP. È generalmente raccomandato invece, regolare à la direttiva fuso orario nel file `php.ini`, ma a volte (come ad esempio quando si lavora con i fornitori di hosting condiviso limitati) questo non è sempre possibile fare, e così, questa opzione è fornito qui.

##### "time_offset"
- *v1: "timeOffset"*
- Se il tempo del server non corrisponde l'ora locale, è possibile specificare un offset qui per regolare le informazioni di data/tempo generato da phpMussel in base alle proprie esigenze. È generalmente raccomandato invece, regolare à la direttiva fuso orario nel file `php.ini`, ma a volte (come ad esempio quando si lavora con i fornitori di hosting condiviso limitati) questo non è sempre possibile fare, e così, questa opzione è fornito qui. Offset è in minuti.
- Esempio (per aggiungere un'ora): `time_offset=60`

##### "time_format"
- *v1: "timeFormat"*
- Il formato della data/ora di notazione usata da phpMussel. Predefinito = `{Day}, {dd} {Mon} {yyyy} {hh}:{ii}:{ss} {tz}`.

##### "ipaddr"
- Dove trovare l'indirizzo IP di collegamento richiesta? (Utile per servizi come Cloudflare e simili) Predefinito = REMOTE_ADDR. AVVISO: Non modificare questa se non sai quello che stai facendo!

Valori consigliati per "ipaddr":

Valore | Utilizzando
---|---
`HTTP_INCAP_CLIENT_IP` | Proxy inverso Incapsula.
`HTTP_CF_CONNECTING_IP` | Proxy inverso Cloudflare.
`CF-Connecting-IP` | Proxy inverso Cloudflare (alternativa; se il precedente non funziona).
`HTTP_X_FORWARDED_FOR` | Proxy inverso Cloudbric.
`X-Forwarded-For` | [Proxy inverso Squid](http://www.squid-cache.org/Doc/config/forwarded_for/).
*Definito dalla configurazione del server.* | [Proxy inverso Nginx](https://www.nginx.com/resources/admin-guide/reverse-proxy/).
`REMOTE_ADDR` | Nessun proxy inverso (valore predefinito).

##### "enable_plugins"
- Attiva il supporto per i plugin di phpMussel? False = No; True = Sì [Predefinito].

##### "forbid_on_block"
- phpMussel dovrebbe rispondere con 403 header con il file caricamente bloccato messaggio, o rimanere con il solito 200 OK? False = No (200); True = Sì (403) [Predefinito].

##### "delete_on_sight"
- Abilitando questa opzione sarà istruirà lo script per tentare immediatamente eliminare qualsiasi file trovato durante scansioni che corrisponde a qualsiasi i criteri di rilevazione, attraverso le firme o altrimenti. I file determinati ad essere "pulito" non verranno toccati. Nel caso degli archivi, l'intero archivio verrà eliminato (indipendentemente se il file all'origine è soltanto uno dei vari file contenuti all'interno dell'archivio o non). Nel caso di file caricamente scansione, solitamente, non è necessario attivare questa opzione, perché solitamente, PHP sarà automaticamente eliminerà il contenuto della cache quando l'esecuzione è terminata, il che significa che lo farà solitamente eliminare tutti i file caricati tramite al server tranne ciò che già è spostato, copiato o cancellato. L'opzione viene aggiunto qui come ulteriore misura di sicurezza per coloro le cui copie di PHP non sempre comportarsi nel previsto modo. False = Dopo la scansione, lasciare il file solo [Predefinito]; True = Dopo la scansione, se non pulite, immediatamente eliminarlo.

##### "lang"
- Specifica la lingua predefinita per phpMussel.

##### "lang_override"
- Localizzare secondo HTTP_ACCEPT_LANGUAGE quando possibile? True = Sì [Predefinito]; False = No.

##### "numbers"
- Specifica come visualizzare i numeri.

Valori attualmente supportati:

Valore | Produce | Descrizione
---|---|---
`NoSep-1` | `1234567.89`
`NoSep-2` | `1234567,89`
`Latin-1` | `1,234,567.89` | Il valore predefinito.
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

*Nota: Questi valori non sono standardizzati dovunque, e probabilmente non saranno rilevanti oltre il pacchetto. Inoltre, i valori supportati potrebbero cambiare in futuro.*

##### "quarantine_key"
- phpMussel è capace di mettere in quarantena contrassegnati tentati file caricamenti in isolamento all'interno della phpMussel vault, se questo è qualcosa che si vuole fare. L'ordinario utenti di phpMussel che semplicemente desiderano proteggere i loro website o hosting environment senza avendo profondo interesse ad analizzare qualsiasi contrassegnati tentati file caricamenti dovrebbe lasciare questa funzionalità disattivata, ma tutti gli utenti interessati ad ulteriori analisi di contrassegnati tentati file caricamenti per la ricerca di malware o per simili cose dovrebbe attivare questa funzionalità. Quarantena di contrassegnati tentati file caricamenti a volte può aiutare anche in debug falsi positivi, se questo è qualcosa che si accade di frequente per voi. Per disattivare la funzionalità di quarantena, lasciare vuota la direttiva `quarantine_key`, o cancellare i contenuti di tale direttiva, se non già è vuoto. Per abilita la funzionalità di quarantena, immettere alcun valore nella direttiva. Il `quarantine_key` è un importante aspetto di sicurezza della funzionalità di quarantena richiesto come un mezzo per prevenire la funzionalità di quarantena di essere sfruttati da potenziali aggressori e come mezzo per prevenire potenziale esecuzione di dati memorizzati all'interno della quarantena. Il `quarantine_key` dovrebbe essere trattato nello stesso modo come le password: Più lunga è la migliore, e proteggila ermeticamente. Per la migliore effetto, utilizzare in combinazione con `delete_on_sight`.

##### "quarantine_max_filesize"
- La massima permesso dimensione del file dei file essere quarantena. File di dimensioni superiori a questo valore NON verranno quarantena. Questa direttiva è importante per rendere più difficile per qualsiasi potenziali aggressori di inondare la vostra quarantena con indesiderati dati potenzialmente causare un eccessivo utilizzo dei dati sul vostro servizio di hosting. Predefinito = 2MB.

##### "quarantine_max_usage"
- La massima permesso utilizzo della memoria per la quarantena. Se la totale memoria utilizzata dalla quarantena raggiunge questo valore, i più vecchi file in quarantena vengono eliminati fino a quando la totale memoria utilizzata non raggiunge questo valore. Questa direttiva è importante per rendere più difficile per qualsiasi potenziali aggressori di inondare la tua quarantena con indesiderati dati potenzialmente causare un eccessivo utilizzo dei dati sul vostro servizio di hosting. Predefinito = 64MB.

##### "quarantine_max_files"
- Il numero massimo di file che possono esistere nella quarantena. Quando vengono aggiunti nuovi file alla quarantena, se questo numero viene superato, i file precedenti verranno eliminati fino a quando il resto non supererà più questo numero. Predefinito = 100.

##### "honeypot_mode"
- Quando la honeypot modalità è abilitata, phpMussel tenterà di mettere in quarantena ogni file caricamenti che esso incontra, indipendentemente di se il file che essere caricato corrisponde d'alcuna incluso firma, e zero reale scansionare o analisi di quei tentati file caricati sarà avvenire. Questa funzionalità dovrebbe essere utile per coloro che desiderano utilizzare phpMussel a fini di virus/malware ricerca, ma non si raccomandato di abilitare questa funzionalità se l'uso previsto de phpMussel da parte dell'utente è per l'effettivo scansione dei file caricamenti né raccomandato di utilizzare la funzionalità di honeypot per fini diversi da l'uso de honeypot. Da predefinita, questo opzione è disattivato. False = Disattivato [Predefinito]; True = Attivato.

##### "scan_cache_expiry"
- Per quanto tempo deve phpMussel cache i risultati della scansione? Il valore è il numero di secondi per memorizzare nella cache i risultati della scansione per. Predefinito valore è 21600 secondi (6 ore); Un valore pari a 0 disabilita il caching dei risultati di scansione.

##### "disable_cli"
- Disabilita CLI? Modalità CLI è abilitato per predefinito, ma a volte può interferire con alcuni strumenti di test (come PHPUnit, per esempio) e altre applicazioni basate su CLI. Se non è necessario disattivare la modalità CLI, si dovrebbe ignorare questa direttiva. False = Abilita CLI [Predefinito]; True = Disabilita CLI.

##### "disable_frontend"
- Disabilita l'accesso front-end? L'accesso front-end può rendere phpMussel più gestibile, ma può anche essere un potenziale rischio per la sicurezza. Si consiglia di gestire phpMussel attraverso il back-end, quando possibile, ma l'accesso front-end è previsto per quando non è possibile. Mantenerlo disabilitato tranne se hai bisogno. False = Abilita l'accesso front-end; True = Disabilita l'accesso front-end [Predefinito].

##### "max_login_attempts"
- Numero massimo di tentativi di accesso al front-end. Predefinito = 5.

##### "frontend_log"
- *v1: "FrontEndLog"*
- File per la registrazione di l'accesso front-end tentativi di accesso. Specificare un nome di file, o lasciare vuoto per disabilitare.

##### "disable_webfonts"
- Disabilita webfonts? True = Sì [Predefinito]; False = No.

##### "maintenance_mode"
- Abilita la modalità di manutenzione? True = Sì; False = No [Predefinito]. Disattiva tutto tranne il front-end. A volte utile per l'aggiornamento del CMS, dei framework, ecc.

##### "default_algo"
- Definisce quale algoritmo da utilizzare per tutte le password e le sessioni in futuro. Opzioni: PASSWORD_DEFAULT (predefinito), PASSWORD_BCRYPT, PASSWORD_ARGON2I (richiede PHP >= 7.2.0).

##### "statistics"
- Monitorare le statistiche di utilizzo di phpMussel? True = Sì; False = No [Predefinito].

##### "disabled_channels"
- Questo può essere usato per impedire a phpMussel di usare canali particolari quando si inviano richieste (ad esempio, quando si aggiorna, quando si recuperano i metadati del componente, ecc).

#### "signatures" (Categoria)
Configurazione per firme.

##### "active"
- *v1: "Active"*
- Un elenco dei file di firme attivi, delimitati da virgole.

*Nota:*
- *Prima di poter essere attivati, è necessario installare i file delle firme.*
- *Affinché i file di test funzionino correttamente, i file delle firme devono essere installati e attivati.*
- *Il valore di questa direttiva è memorizzato nella cache. Dopo averlo modificato, affinché le modifiche abbiano effetto, potrebbe essere necessario eliminare la cache.*

##### "fail_silently"
- Dovrebbe phpMussel rapporto quando le file di firme sono mancanti o danneggiati? Se `fail_silently` è disattivato, mancanti e danneggiati file saranno riportato sulla scansione, e se `fail_silently` è abilitato, mancanti e danneggiati file saranno ignorato, con scansione riportando per quei file che non ha sono problemi. Questo dovrebbe essere generalmente lasciata sola a meno che sperimentando inaspettate terminazioni o simili problemi. False = Disattivato; True = Attivato [Predefinito].

##### "fail_extensions_silently"
- Dovrebbe phpMussel rapporto quando le estensioni sono mancanti? Se `fail_extensions_silently` è disattivato, mancanti estensioni saranno riportato sulla scansione, e se `fail_extensions_silently` è abilitato, mancanti estensioni saranno ignorato, con scansione riportando per quei file che non ha sono problemi. La disattivazione di questa direttiva potrebbe potenzialmente aumentare la sicurezza, ma può anche portare ad un aumento di falsi positivi. False = Disattivato; True = Attivato [Predefinito].

##### "detect_adware"
- Dovrebbe phpMussel utilizzare le firme per il rilevamento di adware? False = No; True = Sì [Predefinito].

##### "detect_joke_hoax"
- Dovrebbe phpMussel utilizzare le firme per il rilevamento di scherzo/inganno malware/virus? False = No; True = Sì [Predefinito].

##### "detect_pua_pup"
- Dovrebbe phpMussel utilizzare le firme per il rilevamento di PUAs/PUPs? False = No; True = Sì [Predefinito].

##### "detect_packer_packed"
- Dovrebbe phpMussel utilizzare le firme per il rilevamento di confezionatori e dati confezionati? False = No; True = Sì [Predefinito].

##### "detect_shell"
- Dovrebbe phpMussel utilizzare le firme per il rilevamento di shell script? False = No; True = Sì [Predefinito].

##### "detect_deface"
- Dovrebbe phpMussel utilizzare le firme per il rilevamento di sfiguramenti e sfiguratori? False = No; True = Sì [Predefinito].

##### "detect_encryption"
- Dovrebbe phpMussel rilevare e bloccare i file crittografati? False = No; True = Sì [Predefinito].

#### "files" (Categoria)
Generale configurazione per la gestione dei file.

##### "max_uploads"
- Massimo numero di file per analizzare durante il file caricamenti scansione prima le terminazione del scansione e d'informare dell'utente che essi stai caricando troppo in una volta! Fornisce protezione contro un teorico attacco per cui un malintenzionato utente tenta per DDoS vostra sistema o CMS da sovraccaricamento phpMussel rallentare il PHP processo ad un brusco stop. Raccomandato: 10. Si potrebbe desiderare di aumentare o diminuire che numero basato sulla velocità del vostra sistema e hardware. Si noti che questo numero non tiene conto o includere il contenuti degli archivi.

##### "filesize_limit"
- File dimensione limite in KB. 65536 = 64MB [Predefinito]; 0 = Nessun limite (sempre sul greylist), qualsiasi (positivo) numerico valore accettato. Questo può essere utile quando la configurazione di PHP limita la quantità di memoria che un processo può contenere o se i configurazione ha limitato la dimensione dei file caricamenti.

##### "filesize_response"
- Cosa fare con i file che superano il file dimensione limite (se esistente). False = Whitelist; True = Blacklist [Predefinito].

##### "filetype_whitelist", "filetype_blacklist", "filetype_greylist"
- Se il vostro sistema permette solo determinati tipi di file per caricamenti, o se il vostra sistema esplicitamente negare determinati tipi di file, specificando i tipi di file nel whitelist, blacklist e/o greylist può aumentare la velocità a cui la scansione viene eseguita da permettendo lo script da ignora alcuni tipi di file. Il formato è CSV (valori separati da virgola). Se si desidera eseguire la scansione tutti, invece del whitelist, el blacklist o el greylist, lasciare le variabili vuoti; Fare questo sarà disabilitali.
- Logico ordine del trattamento è:
  - Se il tipo di file è nel whitelist, non scansiona e non blocca il file, e non verificare il file contra la blacklist o la greylist.
  - Se il tipo di file è nel blacklist, non scansiona il file ma bloccarlo comunque, e non verificar il file contra la greylist.
  - Se il greylist è vuoto o se il greylist non è vuota e il tipo di file è nel greylist, scansiona il file come per normale e determinare se bloccarlo sulla base dei risultati della scansione, ma se il greylist non è vuoto e il tipo di file non è nel greylist, trattare il file come se è nel blacklist, quindi non scansionarlo ma bloccarlo comunque.

##### "check_archives"
- Tenta per verifica il contenuti degli archivi? False = No (no verifica); True = Sì (fare verifica) [Predefinito].

Formato | Può leggere | Può leggere in modo ricorsivo | Può rilevare la crittografia | Note
---|---|---|---|---
Zip | ✔️ | ✔️ | ✔️ | Richiede [libzip](https://secure.php.net/manual/en/zip.requirements.php) (normalmente in bundle con PHP comunque). Supporta anche (usa il formato zip): ✔️ Rilevazione oggetti OLE. ✔️ Rilevamento di macro di Office.
Tar | ✔️ | ✔️ | ➖ | Nessun requisito speciale. Il formato non supporta la crittografia.
Rar | ✔️ | ✔️ | ✔️ | Richiede l'estensione [rar](https://pecl.php.net/package/rar) (quando questa estensione non è installata, phpMussel non può leggere i file rar).
Phar | ❌ | ❌ | ❌ | Il supporto per la lettura dei file phar è stato rimosso nella v1.6.0, e non verrà aggiunto di nuovo, a causa di problemi di sicurezza.

*Se qualcuno è in grado e disposto ad aiutare a implementare il supporto per la lettura di altri formati di archivio, tale aiuto sarebbe gradito.*

##### "filesize_archives"
- Eredita file dimensione limite blacklist/whitelist al contenuti degli archivi? False = No (appena greylist tutto); True = Sì [Predefinito].

##### "filetype_archives"
- Eredita file tipi blacklist/whitelist al contenuti degli archivi? False = No (appena greylist tutto) [Predefinito]; True = Sì.

##### "max_recursion"
- Massimo ricorsione profondità limite per gli archivi. Predefinito = 3.

##### "block_encrypted_archives"
- Rilevi e blocchi archivi criptati? Perché phpMussel non è in grado di verifica del contenuto degli archivi criptati, è possibile che la archivi criptati può essere usato da un attaccante verifieracome mezzo di tenta di bypassare phpMussel, verificatore anti-virus e altri tali protezioni. Istruire phpMussel di bloccare qualsiasi archivi criptati che si trovato potrebbe potenzialmente contribuire a ridurre il rischio associato a questi tali possibilità. False = No; True = Sì [Predefinito].

##### "max_files_in_archives"
- Numero massimo di file da scansionare dagli archivi prima di interrompere la scansione. Predefinito = 0 (nessun massimo).

#### "attack_specific" (Categoria)
Configurazione per specifiche attacco rilevazioni.

Chameleon attacco rilevamento: False = Disattivato; True = Attivato.

##### "chameleon_from_php"
- Cercare per PHP magici numeri che non sono riconosciuti PHP file né archivi.

##### "can_contain_php_file_extensions"
- Un elenco di estensioni di file consentito contenere codice PHP, separato da virgole. Se PHP chameleon attacco rilevamento è abilitato, i file che contengono codice PHP, che hanno estensioni non presenti in questo elenco, saranno rilevati come attacchi chameleon di PHP.

##### "chameleon_from_exe"
- Cercare per eseguibili magici numeri che non sono riconosciuti eseguibili né archivi e per eseguibili cui non sono corrette.

##### "chameleon_to_archive"
- Rileva le header errate negli archivi e nei file compressi. Supportato: BZ/BZIP2, GZ/GZIP, LZF, RAR, ZIP.

##### "chameleon_to_doc"
- Cercare per office documenti di cui non sono corrette (Supportato: DOC, DOT, PPS, PPT, XLA, XLS, WIZ).

##### "chameleon_to_img"
- Cercare per immagini file di cui non sono corrette (Supportato: BMP, DIB, PNG, GIF, JPEG, JPG, XCF, PSD, PDD, WEBP).

##### "chameleon_to_pdf"
- Cercare per PDF file di cui non sono corrette.

##### "archive_file_extensions"
- Riconosciute archivio file estensioni (formato è CSV; deve solo aggiungere o rimuovere quando problemi apparire; rimozione inutilmente può causare falsi positivi per archivio file, mentre aggiungendo inutilmente saranno essenzialmente whitelist quello che si sta aggiungendo dall'attacco specifico rilevamento; modificare con cautela; anche notare che questo non ha qualsiasi effetto su cui gli archivi possono e non possono essere analizzati dal contenuti livello). La lista, come da predefinito, è i formati utilizzati più comunemente attraverso la maggior parte dei sistemi e CMS, ma apposta non è necessariamente completo.

##### "block_control_characters"
- Bloccare tutti i file contenenti i controlli caratteri (eccetto per nuove linee)? (`[\x00-\x08\x0b\x0c\x0e\x1f\x7f]`) Se si sta caricando solo normale testo, quindi si puó attivare questa opzione a fornire additionale protezione al vostro sistema. Ma, se si carica qualcosa di diverso da normale testo, abilitando questo opzione può causare falsi positivi. False = Non bloccare [Predefinito]; True = Bloccare.

##### "corrupted_exe"
- Corrotto file e parsare errori. False = Ignorarli; True = Bloccarli [Predefinito]. Rilevare e bloccare i potenzialmente corrotti PE (portatile eseguibili) file? Spesso (ma non sempre), quando alcuni aspetti di un PE file sono corrotto o non può essere parsato correttamente, tale può essere indicativo di una virale infezione. I processi utilizzati dalla maggior parte dei antivirus programmi per rilevare i virus all'intero PE file richiedono parsare quei file in certi modi, di cui, se il programmatore di un virus è consapevole di, sarà specificamente provare di prevenire, al fine di abilita loro virus di rimanere inosservato.

##### "decode_threshold"
- Soglia per la lunghezza dei grezzi dati dove decodificare comandi dovrebbe essere rilevati (nel caso in cui vi siano notevoli problemi di prestazioni durante la scansione). Predefinito = 512KB. Un zero o un nullo valore disabilita la soglia (rimuovere tale limitazione basata sulla dimensione dei file).

##### "scannable_threshold"
- Soglia per la lunghezza dei dati grezzi dove phpMussel è permesso di leggere e scansione (nel caso in cui vi siano notevoli problemi di prestazioni durante la scansione). Predefinito = 32MB. Un zero o un nullo valore disabilita la soglia. In generale, questo valore non dovrebbe essere meno quella media dimensione dei file che si desidera e si aspettano di ricevere al vostro server o al vostro web sito, non dovrebbe essere più di la filesize_limit direttiva, e non dovrebbe essere più di circa un quinto del totale ammissibile allocazione della memoria concesso al PHP tramite il file di configurazione `php.ini`. Questa direttiva esiste per tenta di evitare avendo phpMussel utilizzare troppa memoria (di cui sarebbe impedirebbe di essere capace di completare la file scansione correttamente per i file piú d'una certa dimensione).

##### "allow_leading_trailing_dots"
- Consenti punti iniziali e finali nei nomi dei file? Questo a volte può essere usato per nascondere file, o per ingannare alcuni sistemi per consentire l'attraversamento di directory. False = Non permettere [Predefinito]. True = Permettere.

##### "block_macros"
- Prova a bloccare qualsiasi file contenente macro? Alcuni tipi di documenti e fogli di calcolo possono contenere macro eseguibili, fornendo così un pericoloso vettore potenziale di malware. False = Ignorarli; True = Bloccarli [Predefinito].

#### "compatibility" (Categoria)
Compatibilità direttive per phpMussel.

##### "ignore_upload_errors"
- Questa direttiva dovrebbe generalmente essere SPENTO meno se necessario per la corretta funzionalità del phpMussel sul vostra sistema. Normalmente, quando spento, quando phpMussel rileva la presenza di elementi nella `$_FILES` array(), è tenterà di avviare una scansione dei file che tali elementi rappresentano, e, se tali elementi sono vuoti, phpMussel restituirà un errore messaggio. Questo è un comportamento adeguato per phpMussel. Tuttavia, per alcuni CMS, vuoti elementi nel `$_FILES` può avvenire come conseguenza del naturale comportamento di questi CMS, o errori possono essere segnalati quando non ce ne sono, nel qual caso, il normale comportamento per phpMussel sarà interferire con il normale comportamento di questi CMS. Se una tale situazione avvenire per voi, attivazione di questa opzione SU sarà istruirà phpMussel a non tenta avviare scansioni per tali vuoti elementi, ignorarli quando si trova ea non ritorno qualsiasi errore correlato messaggi, così permettendo proseguimento della pagina richiesta. False = SPENTO/OFF; True = SU/ON.

##### "only_allow_images"
- Se vi aspettare o intendere solo di permettere le immagini da caricare al vostro sistema o CMS, e se assolutamente non richiedono qualsiasi file diversi da immagini essere caricare per il vostro sistema o CMS, questa direttiva dovrebbe essere SU, ma dovrebbe altrimenti essere SPENTO. Se questa direttiva è SU, che istruirà phpMussel di indiscriminatamente bloccare tutti i caricati file identificati come file non-immagine, senza scansionali. Questo può ridurre il tempo di processo e l'utilizzo della memoria per tentati caricamenti di non-immagine file. False = SPENTO/OFF; True = SU/ON.

#### "heuristic" (Categoria)
Euristici direttive per phpMussel.

##### "threshold"
- Ci sono particolare firme di phpMussel che sono destinato a identificare sospetti e potenzialmente maligno qualità dei file che vengono essere caricati senza in sé identificando i file che vengono essere caricati in particolare ad essere maligno. Questo "threshold" (soglia) valore dice phpMussel cosa che il totale massimo peso di sospetti e potenzialmente maligno qualità dei file che vengono essere caricati che è ammissibile è prima che quei file devono essere contrassegnati come maligno. La definizione di peso in questo contesto è il totale numero di sospetti e potenzialmente maligno qualità identificato. Per predefinito, questo valore viene impostato su 3. Un inferiore valore generalmente sarà risultare di una maggiore presenza di falsi positivi ma una maggior numero di file essere contrassegnato come maligno, mentre una maggiore valore generalmente sarà risultare di un inferiore presenza di falsi positivi ma un inferiore numero di file essere contrassegnato come maligno. È generalmente meglio di lasciare questo valore a suo predefinito a meno che si incontrare problemi ad esso correlati.

#### "virustotal" (Categoria)
Configurazione per Virus Total integrazione.

##### "vt_public_api_key"
- Facoltativamente, phpMussel è in grado di scansionare dei file utilizzando il Virus Total API come un modo per fornire un notevolmente migliorato livello di protezione contro virus, trojan, malware e altre minacce. Per predefinita, la scansionare dei file utilizzando il Virus Total API è disattivato. Per abilitarlo, una API chiave da Virus Total è richiesta. A causa del significativo vantaggio che questo potrebbe fornire a voi, è qualcosa che consiglio vivamente di attivare. Tuttavia, si prega di notare che per utilizzare il Virus Total API, è necessario d'accettare i Termini di Servizio (Terms of Service) e rispettare tutte le orientamenti descritto nella documentazione di Virus Total! Tu NON sei autorizzato a utilizzare questa funzionalità TRANNE SE:
  - Hai letto e accettato i Termini di Servizio (Terms of Service) di Virus Total e le sue API. I Termini di Servizio di Virus Total e le sue API può essere trovato [Qui](https://www.virustotal.com/en/about/terms-of-service/).
  - Hai letto e si capisce, come minimo, il preambolo del Virus Total Pubblica API documentazione (tutto dopo "VirusTotal Public API v2.0" ma prima "Contents"). La Virus Total Pubblica API documentazione può essere trovato [Qui](https://www.virustotal.com/en/documentation/public-api/).

Notare: Se scansionare dei file utilizzando il Virus Total API è disattivato, non avrete bisogno di rivedere qualsiasi delle direttive in questa categoria (`virustotal`), perché nessuno di loro farà una cosa se questo è disattivato. Per acquisire un Virus Total API chiave, dal ovunque sul loro website, clicca il "Join our Community" link situato in alto destra della pagina, immettere le informazioni richieste, e clicca "Sign up" quando hai finito. Seguite tutte le istruzioni fornite, e quando hai la tua pubblica API chiave, copia/incolla la pubblica API chiave per la `vt_public_api_key` direttiva del file di configurazione `config.ini`.

##### "vt_suspicion_level"
- Per predefinita, phpMussel limiterà quali file ciò scansiona utilizzando il Virus Total API ai quei file che considera "sospettose". Facoltativamente, è possibile modificare questa restrizione per mezzo di modificando il valore del `vt_suspicion_level` direttiva.
- `0`: File vengono solo considerati sospetti se, dopo essere sottoposto a scansione da phpMussel utilizzando i propri firme, essi sono considerati avere un peso euristica. Questo potrebbe effettivamente indicare che l'uso del Virus Total API sarebbe per un secondo parere per quando phpMussel sospetta che un file può essere potenzialmente maligno, ma non può escludere del possibilità che essa può essere benigno (non maligno) e quindi sarebbe altrimenti non normalmente bloccarlo o segnalarlo come maligno.
- `1`: File vengono considerati sospetti se, dopo essere sottoposto a scansione da phpMussel utilizzando i propri firme, essi sono considerati avere un peso euristica, se sono noti per essere eseguibile (PE file, Mach-O file, ELF/Linux file, ecc), o se sono noti per essere di un formato che potrebbe contenere dati eseguibile (come le macro eseguibili, DOC/DOCX file, archivio file come RAR, ZIP ed ecc). Questa è l'impostazione predefinita e il livello di sospetto consigliato di applicare, indicando effettivamente che l'uso del Virus Total API sarebbe per un secondo parere per quando phpMussel inizialmente non trova nulla maligno o sbagliato in un file che ritiene di essere sospettosi e quindi sarebbe altrimenti non normalmente bloccarlo o segnalarlo come maligno.
- `2`: Tutti i file vengono considerati sospetti e devono essere sottoposti a scansione utilizzando il Virus Total API. Generalmente, io non raccomando di applicarla questo livello di sospetti, a causa del rischio di raggiungere il vostro API quota molto più rapidamente di quanto sarebbe altrimenti essere il caso, ma ci sono certe circostanze (ad esempio quando il webmaster o hostmaster ha molto poca fede o fiducia in qualsiasi contenuto caricato dei loro utenti) per cui questo livello di sospetto potrebbe essere appropriato. Con questo livello di sospetto, tutti i file normalmente non bloccato o contrassegnato come maligno sarebbero sottoposti a scansione utilizzando il Virus Total API. Notare, tuttavia, che phpMussel cesserà utilizzando la Virus Total API quando il vostro API quota è raggiunto (indipendentemente dal livello di sospetto), e che la quota sarà probabilmente essere raggiunto molto più velocemente quando utilizzando questo livello di sospetto.

Notare: Indipendentemente dal livello di sospetto, qualsiasi file che sono nella blacklist o nella whitelist per mezzo di phpMussel non verrà soggetta di scansione utilizzando il Virus Total API, perché quelle tali file sarebbero hai già stati dichiarati come maligno o benigno per phpMussel per il momento in cui avrebbero altrimenti hai stati scansionati dal Virus Total API, e quindi, scansionare supplementare non sarebbe necessaria. La capacità di phpMussel a scansioni file utilizzando il Virus Total API è destinato a sviluppare fiducia ulteriormente per se un file è maligno o benigno in quelle circostanze in cui phpMussel sé non è interamente certo se un file è maligno o benigno.

##### "vt_weighting"
- Dovrebbe phpMussel applica i risultati della scansione utilizzando il Virus Total API come rilevamenti o il ponderazione rilevamenti? Questa direttiva esiste, perché, sebbene scansione di un file utilizzando più motori (come Virus Total fa) dovrebbe risulta in un maggiore tasso di rilevamenti (e quindi in un maggiore numero di maligni file essere catturati), può anche risulta in un maggiore numero di falsi positivi, e quindi, in certe circostanze, i risultati della scansione possono essere meglio utilizzato come un punteggio di confidenza anziché come una conclusione definitiva. Se viene utilizzato un valore di 0, i risultati della scansione utilizzando il Virus Total API saranno applicati come rilevamenti, e quindi, se qualsiasi motori utilizzati da Virus Total che marca il file sottoposto a scansione come maligno, phpMussel considererà il file come maligno. Se qualsiasi altro valore è utilizzato, i risultati della scansione utilizzando il Virus Total API saranno applicati come ponderazione rilevamenti, e quindi, il numero di motori utilizzati da Virus Total marcando il file sottoposto a scansione come maligno servirà come un punteggio di confidenza (o ponderazione rilevamenti) per se il file sottoposto a scansione deve essere considerato maligno per phpMussel (il valore utilizzato rappresenterà il minimo punteggio di confidenza o ponderazione richiesto per essere considerato maligno). Un valore di 0 è utilizzato per predefinita.

##### "vt_quota_rate" e "vt_quota_time"
- Secondo a la Virus Total API documentazione, è limitato a un massimo di 4 richieste di qualsiasi natura in un dato 1 minuto tempo periodo. Se tu esegue una honeyclient, honeypot o qualsiasi altro automazione che sta fornire risorse a VirusTotal e non solo recuperare rapporti si ha diritto a un più alto tasso di richiesta quota. Per predefinita, phpMussel rigorosamente rispetti questi limiti, ma a causa della possibilità di tali tassi quote essere aumentati, questi due direttivi sono forniti come un mezzo per voi per istruire phpMussel da quale limite si deve rispettare. A meno che sei stato richiesto di farlo, non è raccomandato per voi per aumentare questi valori, ma, se hai incontrati problemi relativi a raggiungere il vostro tasso quota, diminuendo questi valori _**POTREBBE**_ a volte aiutare nel lavoro attraverso questi problemi. Il vostro tasso limite è determinato come `vt_quota_rate` richieste di qualsiasi natura in un dato `vt_quota_time` minuto tempo periodo.

#### "urlscanner" (Categoria)
Uno scanner URL è incluso in phpMussel, in grado di rilevare URL malevoli all'interno di dati ei file scansionati.

Notare: Se l'URL scanner è disabilitato, non sarà necessario rivedere nessuna delle direttive in questa categoria (`urlscanner`), perché nessuno di loro farà nulla se questo è disabilitato.

API configurazione per l'URL scanner.

##### "lookup_hphosts"
- Abilita API richieste per l'API di [hpHosts](https://hosts-file.net/) quando impostato su true. hpHosts non richiede un API chiave per l'esecuzione di API richieste.

##### "google_api_key"
- Abilita API richieste per l'API di Google Safe Browsing quando le API chiave necessarie è definito. L'API di Google Safe Browsing richiede un API chiave, che può essere ottenuto da [Qui](https://console.developers.google.com/).
- Notare: L'estensione cURL è necessaria al fine di utilizzare questa funzione.

##### "maximum_api_lookups"
- Numero massimo di richieste per l'API di eseguire per iterazione di scansione individuo. Perché ogni richiesta supplementare per l'API farà aggiungere al tempo totale necessario per completare ogni iterazione di scansione, si potrebbe desiderare di stipulare una limitazione al fine di accelerare il processo di scansione. Quando è impostato su 0, no tale ammissibile numero massimo sarà applicata. Impostato su 10 per impostazione predefinite.

##### "maximum_api_lookups_response"
- Cosa fare se il ammissibile numero massimo di richieste per l'API è superato? False = Fare nulla (continuare il processo) [Predefinito]; True = Segnare/bloccare il file.

##### "cache_time"
- Per quanto tempo (in secondi) dovrebbe i risultati delle API richieste essere memorizzati nella cache per? Predefinito è 3600 secondi (1 ora).

#### "legal" (Categoria)
Configurazione relativa ai requisiti legali.

*Per ulteriori informazioni sui requisiti legali e su come ciò potrebbe influire sui requisiti di configurazione, si prega di fare riferimento alla sezione "[INFORMAZIONE LEGALE](#SECTION11)" della documentazione.*

##### "pseudonymise_ip_addresses"
- Pseudonimizzare gli indirizzi IP durante la scrivono i file di registro? True = Sì [Predefinito]; False = No.

##### "privacy_policy"
- L'indirizzo di una politica sulla privacy pertinente da visualizzare nel piè di pagina delle pagine generate. Specificare un URL, o lasciare vuoto per disabilitare.

#### "template_data" (Categoria)
Direttive/Variabili per modelli e temi.

Modelli dati riferisce alla prodotti HTML utilizzato per generare il "Caricamento Negato" messaggio visualizzati agli utenti quando file caricamenti sono bloccati. Se stai usando temi personalizzati per phpMussel, prodotti HTML è provenienti da file `template_custom.html`, e altrimenti, prodotti HTML è provenienti da file `template.html`. Variabili scritte a questa sezione del file di configurazione sono parsato per il prodotti HTML per mezzo di sostituendo tutti i nomi di variabili circondati da parentesi graffe trovato all'interno il prodotti HTML con la corrispondente dati di quelli variabili. Per esempio, dove `foo="bar"`, qualsiasi istanza di `<p>{foo}</p>` trovato all'interno il prodotti HTML diventerà `<p>bar</p>`.

##### "theme"
- Tema predefinito da utilizzare per phpMussel.

##### "magnification"
- *v1: "Magnification"*
- Ingrandimento del carattere. Predefinito = 1.

##### "css_url"
- Il modello file per i temi personalizzati utilizzi esterni CSS proprietà, mentre il modello file per i temi personalizzati utilizzi interni CSS proprietà. Per istruire phpMussel di utilizzare il modello file per i temi personalizzati, specificare l'indirizzo pubblico HTTP dei CSS file dei suoi tema personalizzato utilizzando la variabile `css_url`. Se si lascia questo variabile come vuoto, phpMussel utilizzerà il modello file per il predefinito tema.

#### "PHPMailer" (Categoria)
Configurazione PHPMailer.

Attualmente, phpMussel utilizza PHPMailer solo per l'autenticazione a due fattori del front-end. Se non si utilizza il front-end, o se non si utilizza l'autenticazione a due fattori per il front-end, è possibile ignorare queste direttive.

##### "event_log"
- *v1: "EventLog"*
- Un file per registrare tutti gli eventi in relazione a PHPMailer. Specificare un nome di file, o lasciare vuoto per disabilitare.

##### "skip_auth_process"
- *v1: "SkipAuthProcess"*
- Impostando questa direttiva su `true`, PHPMailer salta il normale processo di autenticazione che normalmente si verifica quando si invia una posta elettronica via SMTP. Questo dovrebbe essere evitato, perché saltare questo processo potrebbe esporre la posta elettronica in uscita agli attacchi MITM, ma potrebbe essere necessario nei casi in cui questo processo impedisce a PHPMailer di connettersi a un server SMTP.

##### "enable_two_factor"
- *v1: "Enable2FA"*
- Questa direttiva determina se utilizzare 2FA per gli account front-end.

##### "host"
- *v1: "Host"*
- L'host SMTP per utilizzare per la posta elettronica in uscita.

##### "port"
- *v1: "Port"*
- Il numero di porta per utilizzare per la posta elettronica in uscita. Predefinito = 587.

##### "smtp_secure"
- *v1: "SMTPSecure"*
- Il protocollo per utilizzare per l'invio di posta elettronica tramite SMTP (TLS o SSL).

##### "smtp_auth"
- *v1: "SMTPAuth"*
- Questa direttiva determina se autenticare le sessioni SMTP (di solito dovrebbe essere lasciato solo).

##### "username"
- *v1: "Username"*
- Il nome utente per utilizzare per l'invio di posta elettronica tramite SMTP.

##### "password"
- *v1: "Password"*
- La password per utilizzare per l'invio di posta elettronica tramite SMTP.

##### "set_from_address"
- *v1: "setFromAddress"*
- L'indirizzo del mittente per citare quando si invia una posta elettronica tramite SMTP.

##### "set_from_name"
- *v1: "setFromName"*
- Il nome del mittente per citare quando si invia una posta elettronica tramite SMTP.

##### "add_reply_to_address"
- *v1: "addReplyToAddress"*
- L'indirizzo di risposta per citare quando si invia una posta elettronica tramite SMTP.

##### "add_reply_to_name"
- *v1: "addReplyToName"*
- Il nome per la risposta per citare quando si invia una posta elettronica tramite SMTP.

#### "supplementary_cache_options" (Categoria)
Opzioni di cache supplementari.

*Attualmente, questo è estremamente sperimentale e, potrebbe non comportarsi come previsto! Per il momento, consiglio di ignorarlo.*

##### "enable_apcu"
- Specifica se provare a utilizzare APCu per la memorizzazione nella cache. Predefinito = False.

##### "enable_memcached"
- Specifica se provare a utilizzare Memcached per la memorizzazione nella cache. Predefinito = False.

##### "enable_redis"
- Specifica se provare a utilizzare Redis per la memorizzazione nella cache. Predefinito = False.

##### "enable_pdo"
- Specifica se provare a utilizzare PDO per la memorizzazione nella cache. Predefinito = False.

##### "memcached_host"
- Il valore dell'host Memcached. Predefinito = "localhost".

##### "memcached_port"
- Il valore della porta Memcached. Predefinito = "11211".

##### "redis_host"
- Il valore dell'host Redis. Predefinito = "localhost".

##### "redis_port"
- Il valore della porta Redis. Predefinito = "6379".

##### "redis_timeout"
- Il valore del tempo scaduto per Redis. Predefinito = "2.5".

##### "pdo_dsn"
- Il valore della DSN per PDO. Predefinito = "`mysql:dbname=phpmussel;host=localhost;port=3306`".

##### "pdo_username"
- Il nome utente per PDO.

##### "pdo_password"
- La password per PDO.

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

#### PHP e PCRE
- phpMussel richiede PHP e PCRE a eseguire ea funzionare correttamente. Senza PHP, o senza il PCRE estensione di PHP, phpMussel non sarà eseguirà o funzionare correttamente. Dovrebbe assicurarsi che il vostra sistema ha sia PHP e PCRE installati e disponibili prima di scaricare e installare phpMussel.

#### ANTI-VIRUS SOFTWARE COMPATIBILITÀ

Per la maggior parte, phpMussel dovrebbe essere compatibile abbastanza con la maggior parte dei antivirus software. Ma, conflitti sono stati riportati da un numero di utenti in passato. Queste informazioni qui di seguito è da VirusTotal.com, e descrive un certo numero di falsi positivi riportato dai vari anti-virus programmi contro phpMussel. Sebbene questa informazione non è un'assoluta garanzia di se o non si sarà verificheranno problemi di compatibilità tra phpMussel e il vostro anti-virus software, se il vostro software anti-virus è stati ha notato o ha bandierato contro phpMussel, si dovrebbe considerare sia disattivarlo prima di lavorare con phpMussel o dovrebbe considerare l'alternative opzioni per sia il vostro anti-virus software o phpMussel.

Questa informazione è stato lo scorso aggiornato 2018.10.09 ed è in corso per tutte le phpMussel rilasci delle due più recenti minori versioni (v1.5.0-v1.6.0) al momento di scrivere questo.

*Questa informazione si applica solo al pacchetto principale. I risultati possono variare in base a file di firma installati, plug-in, e altri componenti periferici.*

| Scanner | Risultati |
|---|---|
| Bkav | Riferisce "VEX.Webshell" |

---


### 10. <a name="SECTION10"></a>DOMANDE FREQUENTI (FAQ)

- [Che cosa è una "firma"?](#WHAT_IS_A_SIGNATURE)
- [Che cosa è un "falso positivo"?](#WHAT_IS_A_FALSE_POSITIVE)
- [Con quale frequenza vengono aggiornate le firme?](#SIGNATURE_UPDATE_FREQUENCY)
- [Ho incontrato un problema durante l'utilizzo phpMussel e non so che cosa fare al riguardo! Aiutami!](#ENCOUNTERED_PROBLEM_WHAT_TO_DO)
- [Voglio usare phpMussel (prima della v2) con una versione di PHP più vecchio di 5.4.0; Puoi aiutami?](#MINIMUM_PHP_VERSION)
- [Voglio usare phpMussel (v2) con una versione di PHP più vecchio di 7.2.0; Puoi aiutami?](#MINIMUM_PHP_VERSION_V2)
- [Posso utilizzare un'installazione singola di phpMussel per proteggere più domini?](#PROTECT_MULTIPLE_DOMAINS)
- [Non voglio perdere tempo con l'installazione di questo e farlo funzionare con il mio sito web; Posso pagarti per farlo per me?](#PAY_YOU_TO_DO_IT)
- [Posso assumere voi o uno degli sviluppatori di questo progetto per lavori privati?](#HIRE_FOR_PRIVATE_WORK)
- [Ho bisogno di modifiche specialistiche, personalizzazioni, ecc; Puoi aiutare?](#SPECIALIST_MODIFICATIONS)
- [Sono uno sviluppatore, un designer di siti web o un programmatore. Posso accettare o offrire lavori relativi a questo progetto?](#ACCEPT_OR_OFFER_WORK)
- [Voglio contribuire al progetto; Posso farlo?](#WANT_TO_CONTRIBUTE)
- [Come accedere a dettagli specifici sui file quando vengono scansionati?](#SCAN_DEBUGGING)
- [Posso utilizzare il cron per aggiornare automaticamente?](#CRON_TO_UPDATE_AUTOMATICALLY)
- [phpMussel può eseguire la scansione di file con nomi non ANSI?](#SCAN_NON_ANSI)
- [Blacklists (liste nere) – Whitelists (liste bianche) – Greylists (liste grigie) – Cosa sono e come li uso?](#BLACK_WHITE_GREY)
- [Quando si attivano o disattivano file di firma tramite la pagina degli aggiornamenti, li ordina in ordine alfanumerico nella configurazione. Posso cambiare il modo in cui vengono ordinati?](#CHANGE_COMPONENT_SORT_ORDER)

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

#### <a name="MINIMUM_PHP_VERSION"></a>Voglio usare phpMussel (prima della v2) con una versione di PHP più vecchio di 5.4.0; Puoi aiutami?

No. PHP >= 5.4.0 è un requisito minimo per phpMussel < v2.

#### <a name="MINIMUM_PHP_VERSION_V2"></a>Voglio usare phpMussel (v2) con una versione di PHP più vecchio di 7.2.0; Puoi aiutami?

No. PHP >= 7.2.0 è un requisito minimo per phpMussel v2.

*Guarda anche: [Grafici di Compatibilità](https://maikuolan.github.io/Compatibility-Charts/).*

#### <a name="PROTECT_MULTIPLE_DOMAINS"></a>Posso utilizzare un'installazione singola di phpMussel per proteggere più domini?

Sì. Le installazioni di phpMussel non sono naturalmente legato a domini specifici, e quindi possono essere utilizzati per proteggere più domini. Generalmente, ci riferiamo alle installazioni di phpMussel che proteggono un solo dominio come "installazioni per singolo dominio", e ci riferiamo a installazioni di phpMussel che proteggono più domini e/o sottodomini come "installazioni per più domini". Se si esegue un'installazione per più domini e bisogno utilizzare diversi set di file di firma per diversi domini, o bisogno che phpMussel essere configurato in modo diverso per diversi domini, è possibile farlo. Dopo aver caricato il file di configurazione (`config.ini`), phpMussel verifica l'esistenza di un "file di sovrascrittura per la configurazione" specifico del dominio (o sottodominio) che viene richiesto (`il-dominio-che-viene-richiesto.tld.config.ini`), e se trovati, tutti i valori di configurazione definiti dal file di sovrascrittura per la configurazione verranno utilizzati per l'istanza di esecuzione invece dei valori di configurazione definiti dal file di configurazione. I file di sovrascrittura per la configurazione sono identiche al file di configurazione, e a vostra discrezione, può contenere l'insieme di tutte le direttive di configurazione disponibili a phpMussel, o qualsiasi piccola sottosezione richiesta che differisca dai valori normalmente definiti dal file di configurazione. I file di sovrascrittura per la configurazione sono chiamati in base al dominio a cui sono destinati (così, per esempio, se hai bisogno di un file di sovrascrittura per la configurazione per il dominio, `http://www.some-domain.tld/`, la sua file di sovrascrittura per la configurazione deve essere denominato come `some-domain.tld.config.ini`, e deve essere collocato all'interno della vault insieme al file di configurazione, `config.ini`). Il nome di dominio per l'istanza di esecuzione è derivato dall'intestazione `HTTP_HOST` della richiesta; "www" viene ignorato.

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

#### <a name="CRON_TO_UPDATE_AUTOMATICALLY"></a>Posso utilizzare il cron per aggiornare automaticamente?

Sì. Una API è incorporata nel front-end per interagire con la pagina degli aggiornamenti tramite script esterni. È disponibile uno script separato, "[Cronable](https://github.com/Maikuolan/Cronable)", e può essere utilizzato dal tuo cron manager o cron scheduler per aggiornare automaticamente questo e altri pacchetti supportati (questo script fornisce la propria documentazione).

#### <a name="SCAN_NON_ANSI"></a>phpMussel può eseguire la scansione di file con nomi non ANSI?

Diciamo che c'è una cartella che vuoi scansionare. In questa cartella, hai alcuni file con nomi non ANSI.
- `Пример.txt`
- `一个例子.txt`
- `例です.txt`

Supponiamo che tu stia utilizzando la modalità CLI o l'API phpMussel per la scansione.

Quando si utilizza PHP < 7.1.0, su alcuni sistemi, phpMussel non vedrà questi file quando si tenta di eseguire la scansione della cartella e, quindi, non sarà in grado di eseguire la scansione di questi file. Probabilmente vedrai gli stessi risultati come se dovessi eseguire la scansione di una directory vuota:

```
 Sun, 01 Apr 2018 22:27:41 +0800 Iniziato.
 Sun, 01 Apr 2018 22:27:41 +0800 Finito.
```

Inoltre, quando si utilizza PHP < 7.1.0, la scansione dei file individualmente produce risultati come questi:

```
 Sun, 01 Apr 2018 22:27:41 +0800 Iniziato.
 > Verifica 'X:/directory/Пример.txt' (FN: b831eb8f):
 -> File non valido!
 Sun, 01 Apr 2018 22:27:41 +0800 Finito.
```

O questi:

```
 Sun, 01 Apr 2018 22:27:41 +0800 Iniziato.
 > X:/directory/??????.txt non è né un file né una cartella.
 Sun, 01 Apr 2018 22:27:41 +0800 Finito.
```

Questo è dovuto al modo in cui PHP gestiva i nomi di file non ANSI prima di PHP 7.1.0. Se riscontri questo problema, la soluzione è aggiornare la tua installazione PHP a 7.1.0 o più recente. In PHP >= 7.1.0, i nomi dei file non ANSI vengono gestiti meglio e phpMussel dovrebbe essere in grado di eseguire correttamente la scansione dei file.

Per confronto, i risultati quando si tenta di eseguire la scansione della cartella utilizzando PHP >= 7.1.0:

```
 Sun, 01 Apr 2018 22:27:41 +0800 Iniziato.
 -> Verifica '\Пример.txt' (FN: b2ce2d31; FD: 27cbe813):
 --> Nessun problema rilevato.
 -> Verifica '\一个例子.txt' (FN: 50debed5; FD: 27cbe813):
 --> Nessun problema rilevato.
 -> Verifica '\例です.txt' (FN: ee20a2ae; FD: 27cbe813):
 --> Nessun problema rilevato.
 Sun, 01 Apr 2018 22:27:41 +0800 Finito.
```

E tentando di scansionare i file individualmente:

```
 Sun, 01 Apr 2018 22:27:41 +0800 Iniziato.
 > Verifica 'X:/directory/Пример.txt' (FN: b831eb8f; FD: 27cbe813):
 -> Nessun problema rilevato.
 Sun, 01 Apr 2018 22:27:41 +0800 Finito.
```

#### <a name="BLACK_WHITE_GREY"></a>Blacklists (liste nere) – Whitelists (liste bianche) – Greylists (liste grigie) – Cosa sono e come li uso?

I termini hanno significati diversi in diversi contesti. In phpMussel, ci sono tre contesti in cui vengono utilizzati questi termini: Risposta alla dimensione del file, risposta al tipo di file e, greylist delle firme.

Al fine di ottenere un risultato desiderato con un costo minimo per l'elaborazione, ci sono alcune cose semplici che phpMussel può controllare prima di eseguire effettivamente la scansione dei file, come la dimensione, il nome e l'estensione di un file. Per esempio; Se un file è troppo grande, o se la sua estensione indica un tipo di file che non vogliamo autorizzare sui nostri siti web, possiamo immediatamente contrassegnare il file e non è necessario eseguirne la scansione.

La risposta alle dimensioni del file è il modo in cui phpMussel risponde quando un file supera un limite specificato. Sebbene non siano presenti elenchi effettivi, un file può essere considerato efficacemente nella blacklist, nella whitelist, o nella greylist, in base alle sue dimensioni. Esistono due direttive di configurazione opzionali per specificare rispettivamente un limite e una risposta desiderata.

La risposta del tipo di file è il modo in cui phpMussel risponde all'estensione del file. Esistono tre direttive di configurazione opzionali per specificare esplicitamente quali estensioni dovrebbero essere inserite nella blacklist, nella whitelist, o nella greylist. Un file può essere considerato effettivamente nella blacklist, nella whitelist, o nella greylist se la sua estensione corrisponde rispettivamente a una delle estensioni specificate.

In questi due contesti, essere nella whitelist significa che non dovrebbe essere scansionato o contrassegnato; essere nella blacklist significa che dovrebbe essere contrassegnato (e quindi non è necessario scansionarlo); ed essere nella greylist significa che è necessaria un'ulteriore analisi per determinare se dovremmo contrassegnarlo (cioè, dovrebbe essere scansionato).

La greylist delle firme è una lista di firme che dovrebbe essere essenzialmente ignorata (questo è brevemente menzionato prima nella documentazione). Quando viene innescata una firma nella greylist delle firme, phpMussel continua a lavorare attraverso le sue firme e non intraprende alcuna azione particolare riguardo alla firma nella greylist. Non esiste una blacklist delle firme, perché il comportamento implicito è comunque un comportamento normale per le firme innescate, e non esiste una whitelist delle firme, perché il comportamento implicito non avrebbe davvero senso in considerazione di come funziona phpMussel normal e delle funzionalità che già possiede.

La greylist delle firme è utile se è necessario risolvere i problemi causati da una particolare firma senza disabilitare o disinstallare l'intero file di firme.

#### <a name="CHANGE_COMPONENT_SORT_ORDER"></a>Quando si attivano o disattivano file di firma tramite la pagina degli aggiornamenti, li ordina in ordine alfanumerico nella configurazione. Posso cambiare il modo in cui vengono ordinati?

Sì. Se è necessario forzare alcuni file per l'esecuzione in un ordinamento specifico, è possibile aggiungere alcuni dati arbitrari prima dei loro nomi nella direttiva di configurazione in cui sono elencati, separati da due punti. Quando la pagina degli aggiornamenti ordina di nuovo i file, questi dati arbitrari aggiunti influenzeranno l'ordinamento, causandoli di conseguenza nell'ordinamento che si desidera, senza dover rinominare nessuno di essi.

Ad esempio, assumendo una direttiva di configurazione con file elencati come segue:

`file1.php,file2.php,file3.php,file4.php,file5.php`

Se si desidera che `file3.php` esegua prima, potresti aggiungere qualcosa come `aaa:` prima del nome del file:

`file1.php,file2.php,aaa:file3.php,file4.php,file5.php`

Quindi, se un nuovo file, `file6.php`, viene attivato, quando la pagina degli aggiornamenti li ordina di nuovo tutti, dovrebbe finire in questo modo:

`aaa:file3.php,file1.php,file2.php,file4.php,file5.php,file6.php`

Stessa situazione quando un file è disattivato. Al contrario, se si desidera che il file venga eseguito per ultimo, è possibile aggiungere qualcosa come `zzz:` prima del nome del file. In ogni caso, non sarà necessario rinominare il file in questione.

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

##### 11.2.0 WEBFONTS

Alcuni temi personalizzati, nonché l'interfaccia utente standard ("UI") per il front-end phpMussel, e la pagina "Caricamento Negato", possono utilizzare i webfonts per motivi estetici. I webfonts sono disabilitati per impostazione predefinita, ma quando abilitati, avviene una comunicazione diretta tra il browser dell'utente e il servizio che ospita i webfonts. Ciò potrebbe implicare la comunicazione di informazioni quali l'indirizzo IP dell'utente, l'agente utente, il sistema operativo, e altri dettagli disponibili per la richiesta. La maggior parte di questi webfonts è ospitata dal servizio [Google Fonts](https://fonts.google.com/).

*Direttive di configurazione rilevanti:*
- `general` -> `disable_webfonts`

##### 11.2.1 URL SCANNER

Gli URL trovati nei caricamenti dei file possono essere condivisi con l'API hpHosts o l'API Navigazione sicura di Google, a seconda di come è configurato il pacchetto. Nel caso dell'API hpHosts, questo comportamento è abilitato per impostazione predefinita. L'API Navigazione sicura di Google richiede le chiavi API per funzionare correttamente, ed è quindi disabilitata per impostazione predefinita.

*Direttive di configurazione rilevanti:*
- `urlscanner` -> `lookup_hphosts`
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
Mon, 21 May 2018 00:47:58 +0800 Iniziato.
> Verifica 'ascii_standard_testfile.txt' (FN: ce76ae7a; FD: 7b9bfed5):
-> Rilevato phpMussel-Testfile.ASCII.Standard!
Mon, 21 May 2018 00:48:04 +0800 Finito.
```

Una voce del registro di scansione include in genere le seguenti informazioni:
- La data e l'ora in cui il file è stato scansionato.
- Il nome del file scansionato.
- Hash CRC32b del nome e del contenuto del file.
- Cosa è stato rilevato nel file (se è stato rilevato qualcosa).

*Direttive di configurazione rilevanti:*
- `general` -> `scan_log`
- `general` -> `scan_log_serialized`

Quando queste direttive vengono lasciate vuote, questo tipo di registrazione rimarrà disabilitato.

##### 11.3.1 SCAN UCCISIONI

Quando abilitato nella configurazione del pacchetto, phpMussel mantiene i registri dei caricamenti che sono stati bloccati.

Le voci di un file di registro di "scan uccisioni" in genere assomiglia a qualcosa come questo (ad esempio):

```
Data: Mon, 21 May 2018 00:47:56 +0800
Indirizzo IP: 127.0.0.1
== Risultati della scansione (perché contrassegnati) ==
Rilevato phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
== Ricostruzione delle firme hash ==
3ed8a00c6c498a96a44d56533806153c:666:ascii_standard_testfile.txt
In quarantena come "/vault/quarantine/0000000000-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx.qfu".
```

Una voce di "scan uccisioni" include in genere le seguenti informazioni:
- La data e l'ora in cui il caricamento è stato bloccato.
- L'indirizzo IP da cui ha avuto origine il caricamento.
- Il motivo per cui il file è stato bloccato (ciò che è stato rilevato).
- Il nome del file bloccato.
- Un MD5 e la dimensione del file bloccato.
- Se il file è stato messo in quarantena, e con quale nome interno.

*Direttive di configurazione rilevanti:*
- `general` -> `scan_kills`

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

Le seguenti risorse possono aiutare a spiegarlo in modo più dettagliato:
- [[ipsoa.it] Crittografia e pseudonimizzazione nel GDPR](http://www.ipsoa.it/documents/lavoro-e-previdenza/rapporto-di-lavoro/quotidiano/2018/03/17/crittografia-pseudonimizzazione-gdpr)

In alcune circostanze, potrebbe essere richiesto per legge di anonimizzare o pseudonimizzare qualsiasi informazione personale raccolta, elaborata, o memorizzata. Sebbene questo concetto sia esistito già da un po' di tempo, GDPR/DSGVO menziona in particolare, e in particolare incoraggia la "pseudonimizzazione".

phpMussel è in grado di pseudonimizzare gli indirizzi IP durante la registrazione, se questo è qualcosa che potresti aver bisogno o vuoi fare. Quando gli indirizzi IP sono pseudonimizzati da phpMussel, quando registrati, l'ottetto finale degli indirizzi IPv4 e tutto ciò che segue la seconda parte degli indirizzi IPv6 è rappresentato da una "x" (arrotondare efficacemente gli indirizzi IPv4 all'indirizzo iniziale della 24a sottorete in cui fanno fattore e gli indirizzi IPv6 all'indirizzo iniziale della 32a sottorete a cui fanno fattore).

*Direttive di configurazione rilevanti:*
- `legal` -> `pseudonymise_ip_addresses`

##### 11.3.6 STATISTICA

phpMussel è facoltativamente in grado di tracciare statistiche come il numero totale di file scansionati e bloccati da un certo punto nel tempo. Questa funzione è disabilitata per impostazione predefinita, ma può essere abilitata tramite la configurazione del pacchetto. Il tipo di informazioni rintracciate non deve essere considerato come PII.

*Direttive di configurazione rilevanti:*
- `general` -> `statistics`

##### 11.3.7 CRITTOGRAFIA

phpMussel non crittografa la sua cache o alcuna informazione di registro. La [crittografia](https://it.wikipedia.org/wiki/Crittografia) della cache e del registro potrebbe essere introdotta in futuro, ma al momento non sono previsti piani specifici. Se sei preoccupato per le terze parti non autorizzate che accedono a parti di phpMussel che potrebbero contenere informazioni personali o riservate quali la cache o i registri, ti consiglio di non installare phpMussel in una posizione accessibile al pubblico (per esempio, installare phpMussel al di fuori della cartella `public_html` standard o equivalente di quella disponibile per la maggior parte dei server Web standard) e che le autorizzazioni appropriatamente restrittive siano applicate per la cartella in cui risiede (in particolare, per la cartella del vault). Se ciò non è sufficiente per risolvere i tuoi dubbi, allora configura phpMussel in modo tale che i tipi di informazioni che causano i tuoi dubbi non saranno raccolti o registrati in primo luogo (ad esempio, di disabilitando la registrazione).

#### 11.4 COOKIE

Quando un utente accede con successo al front-end, phpMussel imposta un [cookie](https://it.wikipedia.org/wiki/Cookie) per poter ricordare all'utente le richieste successive (cioè, i cookie vengono utilizzati per autenticare l'utente in una sessione di accesso). Nella pagina di accesso, un avviso sui cookie viene visualizzato in modo prominente, avvisando l'utente che verrà impostato un cookie se si impegnano nell'azione in questione. I cookie non sono impostati in altri punti della base di codice.

*Direttive di configurazione rilevanti:*
- `general` -> `disable_frontend`

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


Ultimo Aggiornamento: 23 Settembre 2019 (2019.09.23).
