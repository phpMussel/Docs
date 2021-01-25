## Documentation pour phpMussel v3 (Français).

### Contenu
- 1. [PRÉAMBULE](#SECTION1)
- 2. [COMMENT INSTALLER](#SECTION2)
- 3. [COMMENT UTILISER](#SECTION3)
- 4. [EXTENSION DE PHPMUSSEL](#SECTION4)
- 7. [OPTIONS DE CONFIGURATION](#SECTION7)
- 8. [FORMATS DE SIGNATURES](#SECTION8)
- 9. [PROBLÈMES DE COMPATIBILITÉ CONNUS](#SECTION9)
- 10. [QUESTIONS FRÉQUEMMENT POSÉES (FAQ)](#SECTION10)
- 11. [INFORMATION LÉGALE](#SECTION11)

*Note concernant les traductions : En cas d'erreurs (par exemple, différences entre les traductions, fautes de frappe, etc), la version Anglaise du README est considérée comme la version originale et faisant autorité. Si vous trouvez des erreurs, votre aide pour les corriger serait bienvenue.*

---


### 1. <a name="SECTION1"></a>PRÉAMBULE

Merci d'utiliser phpMussel, un script PHP pour la détection de virus, logiciels malveillants et autres menaces dans les fichiers téléchargés sur votre système partout où le script est accroché, basé sur les signatures de ClamAV et autres.

[PHPMUSSEL](https://phpmussel.github.io/) COPYRIGHT 2013 et au-delà GNU/GPLv2 par [Caleb M (Maikuolan)](https://github.com/Maikuolan).

Ce script est un logiciel libre ; vous pouvez redistribuer et/ou le modifier selon les termes de la GNU General Public License telle que publiée par la Free Software Foundation ; soit la version 2 de la Licence, ou (à votre choix) toute version ultérieure. Ce script est distribué dans l'espoir qu'il sera utile, mais SANS AUCUNE GARANTIE, sans même l'implicite garantie de COMMERCIALISATION ou D'ADAPTATION À UN PARTICULIER USAGE. Voir la GNU General Public License pour plus de détails, situé dans le `LICENSE.txt` fichier et disponible également à partir de :
- <https://www.gnu.org/licenses/>.
- <https://opensource.org/licenses/>.

Un spécial merci à ClamAV pour l'inspiration du le projet et pour les signatures que ce script utilise, sans qui, le script ne seraient probablement pas exister, ou, au mieux, auraient avoir un très limité valeur.

Un spécial merci à SourceForge, Bitbucket et GitHub pour l'hébergement du projet fichiers, et à les sources supplémentaires d'un certain nombre de signatures utilisés par phpMussel : [PhishTank](https://www.phishtank.com/), [NLNetLabs](https://nlnetlabs.nl/), [Malware.Expert](https://malware.expert/) et autres, et merci à tous ceux qui soutiennent le projet, à quelqu'un d'autre que j'ai peut-être oublié de mentionner autrement, et à vous, pour l'utiliser du script.

---


### 2. <a name="SECTION2"></a>COMMENT INSTALLER

#### 2.0 INSTALLATION AVEC COMPOSER

La façon recommandée d'installer phpMussel v3 est via Composer.

Pour plus de commodité, vous pouvez installer les dépendances phpMussel les plus courantes via l'ancien référentiel phpMussel principal :

`composer require phpmussel/phpmussel`

Alternativement, vous pouvez choisir individuellement les dépendances dont vous aurez besoin lors de votre implémentation. Il est fort possible que vous ne souhaitiez que des dépendances spécifiques et que vous n'ayez pas besoin de tout.

Pour faire quoi que ce soit avec phpMussel, vous aurez besoin de la base de code de base de phpMussel :

`composer require phpmussel/core`

Fournit une fonction administrative pour phpMussel :

`composer require phpmussel/frontend`

Fournit une analyse automatique de téléchargements de fichiers pour votre site Web :

`composer require phpmussel/web`

Fournit la possibilité d'utiliser phpMussel comme une application interactive en mode CLI :

`composer require phpmussel/cli`

Fournit un pont entre phpMussel et PHPMailer, permettant à phpMussel d'utiliser PHPMailer pour l'authentification à deux facteurs, la notification par e-mail des téléchargements de fichiers bloqués, etc :

`composer require phpmussel/phpmailer`

Pour que phpMussel puisse détecter quoi que ce soit, vous devrez installer des signatures. Il n'y a pas de package spécifique pour cela. Pour installer les signatures, reportez-vous à la section suivante de ce document.

Alternativement, si vous ne souhaitez pas utiliser Composer, vous pouvez télécharger des ZIP préemballés à partir d'ici :

https://github.com/phpMussel/Examples

Les ZIP préemballés incluent toutes les dépendances susmentionnées, ainsi que tous les fichiers de signature phpMussel standard, ainsi que quelques exemples fournis pour savoir comment utiliser phpMussel lors de votre implémentation.

#### <a name="INSTALLING_SIGNATURES"></a>2.1 INSTALLATION DES SIGNATURES

Les signatures sont requises par phpMussel pour détecter des menaces spécifiques. Il existe 2 méthodes principales pour installer des signatures :

1. Générer des signatures à l'aide de « SigTool » et installez-les manuellement.
2. Téléchargez les signatures de « phpMussel/Signatures » ou « phpMussel/Examples » et installez-les manuellement.

##### 2.1.0 Générer des signatures à l'aide de « SigTool » et installez-les manuellement.

*Voir : [Documentation SigTool](https://github.com/phpMussel/SigTool#documentation).*

*Notez également : SigTool traite uniquement les signatures de ClamAV. Afin d'obtenir des signatures d'autres sources, telles que celles écrites spécifiquement pour phpMussel, qui incluent les signatures nécessaires pour détecter les échantillons de test de phpMussel, cette méthode devra être complétée par l'une des autres méthodes mentionnées ici.*

##### 2.1.1 Téléchargez les signatures de « phpMussel/Signatures » ou « phpMussel/Examples » et installez-les manuellement.

Premièrement, va à [phpMussel/Signatures](https://github.com/phpMussel/Signatures). Le référentiel contient différents fichiers de signature compressés GZ. Téléchargez les fichiers dont vous avez besoin, décompressez-les, et copiez-les dans le répertoire des signatures de votre installation.

Alternativement, télécharger le ZIP le plus récent de [phpMussel/Examples](https://github.com/phpMussel/Examples). Vous pouvez ensuite copier/coller les signatures de cette archive vers votre installation.

---


### 3. <a name="SECTION3"></a>COMMENT UTILISER

#### 3.0 CONFIGURER PHPMUSSEL

Après avoir installé phpMussel, vous aurez besoin d'un fichier de configuration pour pouvoir le configurer. Les fichiers de configuration phpMussel peuvent être formatés sous forme de fichiers INI ou YML. Si vous travaillez à partir de l'un des exemples de ZIP, vous aurez déjà deux exemples de fichiers de configuration disponibles, `phpmussel.ini` et `phpmussel.yml`. Vous pouvez en choisir un, si vous le souhaitez. Si vous ne travaillez pas à partir de l'un des exemples de ZIP, vous devrez créer un nouveau fichier.

Si vous êtes satisfait de la configuration par défaut de phpMussel et que vous ne voulez rien changer, vous pouvez utiliser un fichier vide comme fichier de configuration. Tout ce qui n'est pas configuré par votre fichier de configuration utilisera sa valeur par défaut. Vous n'avez donc besoin de configurer explicitement quelque chose que si vous voulez qu'il soit différent de sa valeur par défaut (ce qui signifie qu'un fichier de configuration vide amènera phpMussel à utiliser toute sa configuration défaut).

Si vous souhaitez utiliser le front-end de phpMussel, vous pouvez tout configurer depuis la page de configuration du front-end. Mais, depuis la v3, les informations de connexion à l'accès frontal sont stockées dans votre fichier de configuration, donc pour l'accès frontal, vous devrez au moins configurer un compte pour la connexion, et puis, à partir de là, vous pourrez vous connecter et utiliser la page de configuration pour configurer tout le reste.

Les extraits ci-dessous ajouteront un nouveau compte d'accès frontal avec le nom d'utilisateur « admin » et le mot de passe « password ».

Pour les fichiers INI :

```INI
[user.admin]
password='$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK'
permissions='1'
```

Pour les fichiers YML :

```YAML
user.admin:
 password: "$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK"
 permissions: 1
```

Vous pouvez nommer votre configuration comme vous le souhaitez (tant que vous conservez son extension, afin que phpMussel sache quel format il utilise), et vous pouvez le stocker où vous le souhaitez. Vous pouvez indiquer à phpMussel où trouver votre fichier de configuration en fournissant son chemin lors de l'instanciation du loader. Si aucun chemin n'est fourni, phpMussel essaiera de le localiser dans le parent du répertoire vendor.

Dans certains environnements, comme Apache, il est même possible de placer un point à l'avant de votre configuration pour la masquer et empêcher l'accès public.

Reportez-vous à la section configuration de ce document pour plus d'informations sur les différentes directives de configuration disponibles pour phpMussel.

#### 3.1 PHPMUSSEL CORE

Quelle que soit la façon dont vous souhaitez utiliser phpMussel, presque toutes les implémentations contiendront quelque chose comme ceci, au minimum :

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
```

Comme les noms de ces classes l'impliquent, le loader est responsable de la préparation des nécessités de base de l'utilisation de phpMussel, et le scanner est responsable de toutes les fonctionnalités d'analyse de base.

Le constructeur du loader accepte cinq paramètres, tous facultatifs.

```PHP
public function __construct(
    string $ConfigurationPath = '',
    string $CachePath = '',
    string $QuarantinePath = '',
    string $SignaturesPath = '',
    string $VendorPath = ''
)
```

Le premier paramètre est le chemin complet de votre fichier de configuration. Lorsqu'il est omis, phpMussel recherchera un fichier de configuration nommé `phpmussel.ini` ou `phpmussel.yml`, dans le répertoire parent du répertoire vendor.

Le deuxième paramètre est le chemin vers un répertoire que vous autorisez phpMussel à utiliser pour la mise en cache et le stockage de fichiers temporaires. Lorsqu'il est omis, phpMussel essaiera de créer un nouveau répertoire à utiliser, nommé `phpmussel-cache`, dans le parent du répertoire vendor. Si vous souhaitez spécifier ce chemin vous-même, il serait préférable de choisir un répertoire vide, afin d'éviter la perte indésirable d'autres données dans le répertoire spécifié.

Le troisième paramètre est le chemin vers un répertoire que vous autorisez phpMussel à utiliser pour sa quarantaine. Lorsqu'il est omis, phpMussel essaiera de créer un nouveau répertoire à utiliser, nommé `phpmussel-quarantine`, dans le parent du répertoire vendor. Si vous souhaitez spécifier ce chemin vous-même, il serait préférable de choisir un répertoire vide, afin d'éviter la perte indésirable d'autres données dans le répertoire spécifié. Il est fortement recommandé d'empêcher l'accès public au répertoire utilisé pour la quarantaine.

Le quatrième paramètre est le chemin vers le répertoire contenant les fichiers de signature pour phpMussel. Lorsqu'il est omis, phpMussel essaiera de rechercher les fichiers de signature dans un répertoire nommé `phpmussel-signatures`, dans le répertoire parent du répertoire vendor.

Le cinquième paramètre est le chemin d'accès à votre répertoire vendor. Cela ne devrait jamais pointer vers autre chose. Lorsqu'il est omis, phpMussel essaiera de localiser ce répertoire pour lui-même. Ce paramètre est fourni afin de faciliter l'intégration avec des implémentations qui pourraient ne pas nécessairement avoir la même structure qu'un projet Composer typique.

Le constructeur du scanner n'accepte qu'un seul paramètre, et il est obligatoire : l'objet loader instancié. Comme il est passé par référence, le loader doit être instancié sur une variable (instancier le loader directement dans le scanner afin de passer par valeur n'est pas la correcte façon d'utiliser phpMussel).

```PHP
public function __construct(\phpMussel\Core\Loader &$Loader)
```

#### 3.2 ANALYSE AUTOMATIQUE DU TÉLÉCHARGEMENT DE FICHIERS

Pour instancier le gestionnaire de téléchargements :

```PHP
$Web = new \phpMussel\Web\Web($Loader, $Scanner);
```

Pour analyser les téléchargements de fichiers :

```PHP
$Web->scan();
```

En option, phpMussel peut tenter de réparer les noms des téléchargements en cas de problème, si vous le souhaitez :

```PHP
$Web->demojibakefier();
```

Un exemple plus complet :

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

*Tentative de téléchargement du fichier `ascii_standard_testfile.txt`, un échantillon bénin fourni dans le seul but de tester phpMussel :*

![Capture d'écran](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/web-v3.0.0-alpha2.png)

#### 3.3 MODE CLI

Pour instancier le gestionnaire CLI :

```PHP
$CLI = new \phpMussel\CLI\CLI($Loader, $Scanner);
```

Un exemple plus complet :

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

*Capture d'écran :*

![Capture d'écran](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/cli-v3.0.0-alpha2.png)

#### 3.4 L'ACCÈS FRONTAL

Pour instancier l'accès frontal :

```PHP
$FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
```

Un exemple plus complet :

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

*Capture d'écran :*

![Capture d'écran](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/frontend-v3.0.0-alpha2.png)

#### 3.5 API DU SCANNER

Vous pouvez également implémenter l'API du scanner phpMussel dans d'autres programmes et scripts, si vous le souhaitez.

Un exemple plus complet :

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

La partie importante à noter dans cet exemple est la méthode `scan()`. La méthode `scan()` accepte deux paramètres :

```PHP
public function scan(mixed $Files, int $Format = 0): mixed
```

Le premier paramètre peut être une chaîne ou un tableau et indique au scanner ce qu'il doit analyser. Il peut s'agir d'une chaîne indiquant un fichier ou un répertoire spécifique, ou d'un tableau de telles chaînes pour spécifier plusieurs fichiers/répertoires.

Quand c'est une chaîne, il doit pointer vers l'emplacement des données. Quand c'est un tableau, les clés du tableau doivent indiquer les noms d'origine des éléments à analyser et les valeurs doivent indiquer où les données peuvent être trouvées.

Le deuxième paramètre est un entier et indique au scanner comment il doit renvoyer ses résultats d'analyse.

Spécifiez 1 pour renvoyer les résultats de l'analyse sous forme de tableau pour chaque élément analysé sous forme d'entiers.

Ces entiers ont les significations suivantes :

Résultats | Description
--:|:--
-5 | Indique que l'analyse n'a pas pu se compléter pour d'autres raisons.
-4 | Indique que les données n'ont pas pu être analysées à cause du cryptage.
-3 | Indique que des problèmes ont été rencontrés avec les fichiers de signature phpMussel.
-2 | Indique que données corrompues était détecté lors de l'analyse et donc l'analyse n'ont pas réussi à compléter.
-1 | Indique que les extensions ou addons requis par PHP pour exécuter l'analyse sont manquaient et donc l'analyse n'ont pas réussi à compléter.
0 | Indique qu'il n'existe pas cible à analyser et donc il n'y avait rien à analyser.
1 | Indique que la cible était analysé avec succès et aucun problème n'été détectée.
2 | Indique que la cible était analysé avec succès et problèmes ont été détectés.

Spécifiez 2 pour renvoyer les résultats de l'analyse sous forme de valeur booléenne.

Résultats | Description
:-:|:--
`true` | Problèmes ont été détectés (la cible de l'analyse est mauvaise/dangereuse).
`false` | Problèmes n'ont pas été détectés (la cible de l'analyse est probablement bénigne).

Spécifiez 3 pour renvoyer les résultats de l'analyse sous forme de tableau pour chaque élément analysé sous forme de texte lisible par l'homme.

*Exemple de sortie :*

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

Spécifiez 4 pour renvoyer les résultats de l'analyse sous forme de chaîne de texte lisible par l'homme (comme 3, mais implosé).

*Exemple de sortie :*

```
Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)! Detected phpMussel-Testfile.CoEx (coex_testfile.rtf)! Detected encrypted archive; Encrypted archives not permitted (encrypted.zip)!
```

Spécifiez *toute autre valeur* pour renvoyer le texte formaté (comme celui des résultats d'analyse vus lors de l'utilisation de la CLI).

*Exemple de sortie :*

*Voir également : [Comment accéder à des détails spécifiques sur les fichiers lorsqu'ils sont analysés ?](#SCAN_DEBUGGING)*

#### 3.6 AUTHENTIFICATION À DEUX FACTEURS

Il est possible de sécuriser l'accès frontal en activant l'authentification à deux facteurs (« 2FA »). Lors de la connexion à l'aide d'un compte sur lequel 2FA est activé, un e-mail est envoyé à l'adresse électronique associée à ce compte. Cet e-mail contient un « code 2FA », que l'utilisateur doit alors entrer, en plus du nom d'utilisateur et du mot de passe, afin de pouvoir authentifier ce compte. Cela signifie que l'obtention d'un mot de passe d'un compte ne serait pas suffisant pour qu'un attaquant potentiel puisse authentifier ce compte, comme ils auraient également besoin d'avoir déjà accès à l'adresse électronique associée à ce compte afin de pouvoir recevoir et utiliser le code 2FA associé à la session, rendant ainsi l'accès frontal plus sécurisé.

Après avoir installé PHPMailer, vous devez renseigner les directives de configuration de PHPMailer via la page de configuration ou le fichier de configuration de phpMussel. Plus d'informations sur ces directives de configuration sont incluses dans la section de configuration de ce document. Après avoir rempli les directives de configuration de PHPMailer, mettre `enable_two_factor` à `true`. L'authentification à deux facteurs devrait maintenant être activée.

Ensuite, vous devrez associer une adresse e-mail à un compte afin que phpMussel sache où envoyer les codes 2FA lors de la connexion via ce compte. Pour ce faire, utilisez l'adresse e-mail comme nom d'utilisateur pour le compte (comme `foo@bar.tld`), ou inclure l'adresse e-mail dans le nom d'utilisateur de la même manière que lorsqu'un e-mail est envoyé normalement (comme `Foo Bar <foo@bar.tld>`).

---


### 4. <a name="SECTION4"></a>EXTENSION DE PHPMUSSEL

phpMussel est conçu avec l'extensibilité à l'esprit. Les demandes d'extraction vers l'un des référentiels de l'organisation phpMussel, et les [contributions](https://github.com/phpMussel/.github/blob/master/CONTRIBUTING.md) en général, sont toujours les bienvenues. Aussi, si vous avez besoin de modifier ou d'étendre phpMussel d'une manière qui ne convient pas pour contribuer à ces référentiels particuliers, c'est certainement possible de le faire (par exemple, pour les modifications ou extensions spécifiques à votre implémentation particulière, qui ne peuvent pas être publiées en raison de besoins de confidentialité au sein de votre organisation, ou qui pourraient de préférence être publiés dans leur propre référentiel, comme pour les plugins et les nouveaux packages Composer qui nécessitent phpMussel).

Depuis la v3, toutes les fonctionnalités de phpMussel existent sous forme de classes, ce qui signifie que dans certains cas, les mécanismes [d'héritage d'objets](https://www.php.net/manual/fr/language.oop5.inheritance.php) fournis par PHP pourraient être un moyen simple et approprié d'étendre phpMussel.

phpMussel fournit également ses propres mécanismes d'extensibilité. Avant la v3, le mécanisme préféré était le système de plugin intégré pour phpMussel. Depuis la v3, le mécanisme préféré est l'orchestrateur d'événements.

Le code standard pour l'extension de phpMussel et pour l'écriture de nouveaux plugins est disponible publiquement dans le [référentiel standard](https://github.com/phpMussel/plugin-boilerplates). Une liste de tous les [événements actuellement pris en charge](https://github.com/phpMussel/plugin-boilerplates/tree/master/boilerplate-v3#currently-supported-events) et des instructions plus détaillées sur la façon d'utiliser le code standard sont également incluses.

Vous remarquerez que la structure du code standard v3 est identique à la structure des différents référentiels phpMussel v3 de l'organisation phpMussel. Ce n'est pas une coincidence. Dans la mesure du possible, je recommanderais d'utiliser le code standard v3 à des fins d'extensibilité, et d'utiliser des principes de conception similaires à ceux de phpMussel v3 lui-même. Si vous choisissez de publier votre nouvelle extension ou plugin, vous pouvez intégrer la prise en charge de Composer pour cela, et il devrait alors être théoriquement possible pour d'autres d'utiliser votre extension ou plugin exactement de la même manière que phpMussel v3 lui-même, en l'exigeant simplement avec leurs autres dépendances Composer, et en appliquant tous les gestionnaires d'événements nécessaires à leur implémentation. (Bien sûr, n'oubliez pas d'inclure des instructions avec votre publication, afin que les autres connaissent les gestionnaires d'événements nécessaires qui peuvent exister, et toute autre information qui peut être nécessaire pour une installation et une utilisation correctes de votre publication).

---


### 7. <a name="SECTION7"></a>OPTIONS DE CONFIGURATION

Voici une liste des directives de configuration acceptées par phpMussel, avec une description de leur objectif et leur fonction.

```
Configuration (v3)
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

#### « core » (Catégorie)
Configuration générale (toute configuration de base n'appartenant pas à d'autres catégories).

##### « scan_log » `[string]`
- Nom du fichier à enregistrer tous les résultats de l'analyse. Spécifiez un nom de fichier, ou laisser vide à désactiver.

##### « scan_log_serialized » `[string]`
- Nom du fichier à enregistrer tous les résultats de l'analyse (le format est sérialisé). Spécifiez un nom de fichier, ou laisser vide à désactiver.

##### « error_log » `[string]`
- Un fichier pour l'enregistrement des erreurs non fatales détectées. Spécifier un fichier, ou laisser vide à désactiver.

##### « truncate » `[string]`
- Tronquer les fichiers journaux lorsqu'ils atteignent une certaine taille ? La valeur est la taille maximale en o/Ko/Mo/Go/To qu'un fichier journal peut croître avant d'être tronqué. La valeur par défaut de 0Ko désactive la troncature (les fichiers journaux peuvent croître indéfiniment). Remarque : S'applique aux fichiers journaux individuels ! La taille des fichiers journaux n'est pas considérée collectivement.

##### « log_rotation_limit » `[int]`
- La rotation du journal limite le nombre de fichiers journaux qui doivent exister à un moment donné. Lorsque de nouveaux fichiers journaux sont créés, si le nombre total de fichiers journaux dépasse la limite spécifiée, l'action spécifiée sera effectuée. Vous pouvez spécifier la limite souhaitée ici. Une valeur de 0 désactivera la rotation du journal.

##### « log_rotation_action » `[string]`
- La rotation du journal limite le nombre de fichiers journaux qui doivent exister à un moment donné. Lorsque de nouveaux fichiers journaux sont créés, si le nombre total de fichiers journaux dépasse la limite spécifiée, l'action spécifiée sera effectuée. Vous pouvez spécifier l'action souhaitée ici. Delete = Supprimez les fichiers journaux les plus anciens, jusqu'à ce que la limite ne soit plus dépassée. Archive = Tout d'abord archiver, puis supprimez les fichiers journaux les plus anciens, jusqu'à ce que la limite ne soit plus dépassée.

```
log_rotation_action
├─Delete ("Delete")
└─Archive ("Archive")
```

##### « timezone » `[string]`
- Ceci est utilisé pour spécifier le fuseau horaire à utiliser (par exemple, Africa/Cairo, America/New_York, Asia/Tokyo, Australia/Perth, Europe/Berlin, Pacific/Guam, etc). Spécifiez « SYSTEM » pour laisser PHP gérer cela automatiquement pour vous.

```
timezone
├─SYSTEM ("Utilisez le fuseau horaire par défaut du système.")
├─UTC ("UTC")
└─…Autres
```

##### « time_offset » `[int]`
- Décalage horaire en minutes.

##### « time_format » `[string]`
- Le format de notation de la date/heure utilisé par phpMussel. Des options supplémentaires peuvent être ajoutées sur requête.

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
└─…Autres
```

##### « ipaddr » `[string]`
- Où trouver l'adresse IP de requêtes ? (Utile pour services tels que Cloudflare et similaires) Par Défaut = REMOTE_ADDR. AVERTISSEMENT : Ne pas changer si vous ne sais pas ce que vous faites !

```
ipaddr
├─HTTP_INCAP_CLIENT_IP ("HTTP_INCAP_CLIENT_IP (Incapsula)")
├─HTTP_CF_CONNECTING_IP ("HTTP_CF_CONNECTING_IP (Cloudflare)")
├─CF-Connecting-IP ("CF-Connecting-IP (Cloudflare)")
├─HTTP_X_FORWARDED_FOR ("HTTP_X_FORWARDED_FOR (Cloudbric)")
├─X-Forwarded-For ("X-Forwarded-For (Squid)")
├─REMOTE_ADDR ("REMOTE_ADDR (Default)")
└─…Autres
```

Voir également :
- [NGINX Reverse Proxy](https://docs.nginx.com/nginx/admin-guide/web-server/reverse-proxy/)
- [Squid configuration directive forwarded_for](http://www.squid-cache.org/Doc/config/forwarded_for/)

##### « delete_on_sight » `[bool]`
- Mise en cette option sera instruire le script à tenter immédiatement supprimer tout fichiers elle constate au cours de son analyse correspondant à des critères de détection, que ce soit via des signatures ou autrement. Fichiers jugées propre ne seront pas touchés. Dans le cas des archives, l'ensemble d'archive sera supprimé (indépendamment de si le incriminé fichier est que l'un de plusieurs fichiers contenus dans l'archive). Pour le cas d'analyse de fichiers téléchargement, généralement, il n'est pas nécessaire d'activer cette option sur, parce généralement, PHP faire purger automatiquement les contenus de son cache lorsque l'exécution est terminée, ce qui signifie que il va généralement supprimer tous les fichiers téléchargés à travers elle au serveur sauf qu'ils ont déménagé, copié ou supprimé déjà. L'option est ajoutée ici comme une supplémentaire mesure de sécurité pour ceux dont copies de PHP peut pas toujours se comporter de la manière attendu. False = Après l'analyse, laissez le fichier tel quel [Défaut] ; True = Après l'analyse, si pas propre, supprimer immédiatement.

##### « lang » `[string]`
- Spécifiez la langue défaut pour phpMussel.

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

##### « lang_override » `[bool]`
- Localiser selon HTTP_ACCEPT_LANGUAGE autant que possible ? True = Oui [Défaut] ; False = Non.

##### « scan_cache_expiry » `[int]`
- Pour combien de temps devrait phpMussel cache les résultats de l'analyse ? La valeur est le nombre de secondes pour mettre en cache les résultats de l'analyse pour. Par défaut est 21600 secondes (6 heures) ; Une valeur de 0 désactive mettre en cache les résultats de l'analyse.

##### « maintenance_mode » `[bool]`
- Activer le mode de maintenance ? True = Oui ; False = Non [Défaut]. Désactive tout autre que l'accès frontal. Parfois utile pour la mise à jour de votre CMS, des frameworks, etc.

##### « statistics » `[bool]`
- Suivre les statistiques d'utilisation pour phpMussel ? True = Oui ; False = Non [Défaut].

##### « disabled_channels » `[string]`
- Ceci peut être utilisé pour empêcher phpMussel d'utiliser des canaux particuliers lors de l'envoi de requêtes (par exemple, lors de la mise à jour, lors de l'extraction de métadonnées de composant, etc).

```
disabled_channels
├─GitHub ("GitHub")
├─BitBucket ("BitBucket")
├─VirusTotal_HTTPS ("VirusTotal (HTTPS)")
└─VirusTotal_HTTP ("VirusTotal (HTTP)")
```

#### « signatures » (Catégorie)
Configuration pour les signatures, fichiers de signatures, etc.

##### « active » `[string]`
- Une liste des fichiers de signatures active, délimitée par des virgules. Remarque : Les fichiers de signatures doivent d'abord être installés, avant de pouvoir les activer. Pour que les fichiers de test fonctionnent correctement, les fichiers de signature doivent être installés et activés.

##### « fail_silently » `[bool]`
- Devrait phpMussel signaler quand les extensions sont manquantes ? Si `fail_extensions_silently` est désactivé, extensions manquantes seront signalé sur analyse, et si `fail_extensions_silently` est activé, extensions manquantes seront ignorés, avec l'analyse signalés pour ceux fichiers qu'il n'y a pas de problèmes. La désactivation de cette directive peut potentiellement augmenter votre sécurité, mais peut aussi conduire à une augmentation de faux positifs. False = Désactivé ; True = Activé [Défaut].

##### « fail_extensions_silently » `[bool]`
- Devrait phpMussel signaler quand les extensions sont manquantes ? Si `fail_extensions_silently` est désactivé, extensions manquantes seront signalé sur analyse, et si `fail_extensions_silently` est activé, extensions manquantes seront ignorés, avec l'analyse signalés pour ceux fichiers qu'il n'y a pas de problèmes. La désactivation de cette directive peut potentiellement augmenter votre sécurité, mais peut aussi conduire à une augmentation de faux positifs. False = Désactivé ; True = Activé [Défaut].

##### « detect_adware » `[bool]`
- Devrait phpMussel utiliser signatures pour détecter les adwares ? False = Non ; True = Oui [Défaut].

##### « detect_joke_hoax » `[bool]`
- Devrait phpMussel utiliser signatures pour détecter les blagues/canulars malware/virus ? False = Non ; True = Oui [Défaut].

##### « detect_pua_pup » `[bool]`
- Devrait phpMussel utiliser signatures pour détecter les PUAs/PUPs ? False = Non ; True = Oui [Défaut].

##### « detect_packer_packed » `[bool]`
- Devrait phpMussel utiliser signatures pour détecter les emballeurs et des données emballés ? False = Non ; True = Oui [Défaut].

##### « detect_shell » `[bool]`
- Devrait phpMussel utiliser signatures pour détecter les scripts shell ? False = Non ; True = Oui [Défaut].

##### « detect_deface » `[bool]`
- Devrait phpMussel utiliser signatures pour détecter les defacements and defacers ? False = Non ; True = Oui [Défaut].

##### « detect_encryption » `[bool]`
- Devrait phpMussel détecter et bloquer les fichiers cryptés ? False = Non ; True = Oui [Défaut].

##### « heuristic_threshold » `[int]`
- Il ya certaines signatures des phpMussel qui sont destinés à identifier des suspectes et potentiellement malveillants qualités des fichiers en cours de téléchargement sans en eux-mêmes identifier les fichiers en cours de téléchargement spécifiquement comme étant malveillants. Cette « threshold » (seuil) valeur raconte à phpMussel ce que le total maximum poids des suspectes et potentiellement malveillants qualités des fichiers en cours de téléchargement pour ce qui est admissible avant que ces fichiers doivent être signalées comme malveillant. La définition du poids dans ce contexte est le nombre total de suspectes et potentiellement malveillants qualités identifié. Par défaut, cette valeur sera fixée à 3. Une valeur inférieur va résulter généralement avec une fréquence supérieur de faux positifs mais une nombre supérieur de fichiers signalé comme malveillant, tandis que une valeur inférieur va résulter généralement avec une fréquence inférieur de faux positifs mais un nombre inférieur de fichiers signalé comme malveillant. Il est généralement préférable de laisser cette valeur à sa valeur défaut, sauf si vous rencontrez des problèmes qui sont liés à elle.

#### « files » (Catégorie)
Les spécificités de la gestion des fichiers lors de l'analyse.

##### « filesize_limit » `[string]`
- Limite de taille des fichiers en Ko. 65536 = 64Mo [Défaut] ; 0 = Pas limite (toujours en liste grise), tout (positif) valeur numérique acceptée. Cela peut être utile lorsque votre configuration de PHP limite la quantité de mémoire qu'un processus peut contenir ou si votre configuration de PHP limite la taille du fichier téléchargements.

##### « filesize_response » `[bool]`
- Que faire avec des fichiers qui dépassent la limite de taille des fichiers (si existant). False = Énumérer Blanche ; True = Énumérer Noire [Défaut].

##### « filetype_whitelist » `[string]`
- Si votre système permettre seulement particuliers types des fichiers à être téléchargé, ou si votre système nie explicitement particuliers types des fichiers, spécifiant les types des fichiers dans listes blanches, listes noires et listes grises peut augmenter la vitesse à laquelle l'analyse est effectuée en permettant le script à sauter particuliers types des fichiers. Format est CSV (virgule séparées valeurs). Si vous souhaitez analyse tout, plutôt que de liste blanche, liste noire ou liste gris, laisser les variable(/s) blanc ; Il va désactiver liste blanche/noire/gris. L'ordre logique de l'application est : Si le type de fichier est listé blanche, n'analyser pas ni bloquer pas le fichier, et ne vérifie pas le fichier contre la liste noire ou la liste grise. Si le type de fichier est listé noire, n'analyser pas le fichier mais bloquer de toute façon, et ne vérifie pas le fichier contre la liste grise. Si la liste grise est vide ou si la liste grise n'est vide pas et le type de fichier est listé grise, analyser le fichier comme d'habitude et déterminer si de bloquer basés des résultats de l'analyse, mais si la liste grise n'est vide pas et le type de fichier n'est listé grise pas, traiter le fichier comme listé noire, donc n'analyse pas mais bloque de toute façon. Liste Blanche :

##### « filetype_blacklist » `[string]`
- Liste Noire :

##### « filetype_greylist » `[string]`
- Liste Gris :

##### « check_archives » `[bool]`
- Essayer vérifier les contenus des archives ? False = Non (ne pas vérifier) ; True = Oui (vérifier) [Défaut]. Supporté : Zip (nécessite libzip), Tar, Rar (nécessite l'extension rar).

##### « filesize_archives » `[bool]`
- Étendre taille du fichier liste noire/blanche paramètres à le contenu des archives ? False = Non (énumérer grise tout) ; True = Oui [Défaut].

##### « filetype_archives » `[bool]`
- Étendre type de fichier liste noire/blanche paramètres à le contenu des archives ? False = Non (énumérer grise tout) [Défaut] ; True = Oui.

##### « max_recursion » `[int]`
- Maximum récursivité profondeur limite pour archives. Défaut = 3.

##### « block_encrypted_archives » `[bool]`
- Détecter et bloquer les archives cryptées ? Parce phpMussel est pas capable d'analyse du contenu des archives cryptées, il est possible que le cryptage des archives peut être utilisé par un attaquant un moyen a tenter de contourner phpMussel, analyseurs anti-virus et d'autres protections. Instruire phpMussel pour bloquer toutes les archives cryptées qu'il découvre pourrait aider à réduire les risques associés à ces possibilités. False = Non ; True = Oui [Défaut].

##### « max_files_in_archives » `[int]`
- Nombre maximal de fichiers à analyser à partir d'archives avant l'abandon de l'analyse. Défaut = 0 (n'est pas un maximum).

##### « chameleon_from_php » `[bool]`
- Vérifier pour les en-têtes PHP dans les fichiers qui ne sont pas de PHP ni reconnue comme archives. False = Désactivé ; True = Activé.

##### « can_contain_php_file_extensions » `[string]`
- Une liste d'extensions de fichiers autorisés à contenir du code PHP, séparés par des virgules. Si la détection des attaques de caméléon PHP est activée, les fichiers qui contiennent du code PHP, qui ont des extensions qui ne sont pas sur cette liste, seront détectés comme des attaques de caméléon PHP.

##### « chameleon_from_exe » `[bool]`
- Vérifier pour les en-têtes d'exécutables dans les fichiers qui ne sont pas fichiers exécutable ni reconnue comme archives et pour exécutables dont les en-têtes sont incorrects. False = Désactivé ; True = Activé.

##### « chameleon_to_archive » `[bool]`
- Détecter les en-têtes incorrects dans les archives et les fichiers compressés. Supporté : BZ/BZIP2, GZ/GZIP, LZF, RAR, ZIP. False = Désactivé ; True = Activé.

##### « chameleon_to_doc » `[bool]`
- Vérifier pour les documents office dont les en-têtes sont incorrects (Supporté : DOC, DOT, PPS, PPT, XLA, XLS, WIZ). False = Désactivé ; True = Activé.

##### « chameleon_to_img » `[bool]`
- Vérifier pour les images dont les en-têtes sont incorrects (Supporté : BMP, DIB, PNG, GIF, JPEG, JPG, XCF, PSD, PDD, WEBP). False = Désactivé ; True = Activé.

##### « chameleon_to_pdf » `[bool]`
- Vérifier pour les fichiers PDF dont les en-têtes sont incorrects. False = Désactivé ; True = Activé.

##### « archive_file_extensions » `[string]`
- Les extensions de fichiers d'archives reconnus (format est CSV ; devraient ajouter ou supprimer seulement quand problèmes surviennent ; supprimer inutilement peut entraîner des faux positifs à paraître pour archive fichiers, tandis que ajoutant inutilement sera essentiellement liste blanche ce que vous ajoutez à partir de l'attaque spécifique détection ; modifier avec prudence ; aussi noter que cela n'a aucun effet sur ce archives peut et ne peut pas être analysé au niveau du contenu). La liste, comme en cas de défaut, énumère les formats plus couramment utilisé dans la majorité des systèmes et CMS, mais volontairement pas nécessairement complète.

##### « block_control_characters » `[bool]`
- Bloquer tous les fichiers contenant les caractères de contrôle (autre que les sauts de ligne) ? (`[\x00-\x08\x0b\x0c\x0e\x1f\x7f]`) Si vous êtes *__SEULEMENT__* télécharger de brut texte fichiers, puis vous pouvez activer cette option à fournir une supplémentaire protection à votre système. Mais, si vous télécharger quelque chose plus que brut texte, l'activation de cette peut créer faux positifs. False = Ne pas bloquer [Défaut] ; True = Bloquer.

##### « corrupted_exe » `[bool]`
- Fichiers corrompus et erreurs d'analyse. False = Ignorer ; True = Bloquer [Défaut]. Détecter et bloquer les fichiers PE (Portable Executable) potentiellement corrompus ? Souvent (mais pas toujours), lorsque certains aspects d'un fichier PE sont corrompus ou ne peut pas être analysée correctement, il peut être le signe d'une infection virale. Les processus utilisés par la plupart des programmes anti-virus pour détecter les virus dans fichiers PE requérir l'analyse de ces fichiers par méthodes certaines, de ce que, si le programmeur d'un virus est conscient de, seront spécifiquement tenter d'empêcher, en vue de permettre leur virus n'être pas détectée.

##### « decode_threshold » `[string]`
- Seuil à la longueur de brutes données dans laquelle commandes des décodages doivent être détectés (dans le cas où il ya remarquable performance problèmes au cours de l'analyse). Défaut = 512Ko. Zéro ou nulle valeur désactive le seuil (supprimant toute restriction basé sur la taille du fichier).

##### « scannable_threshold » `[string]`
- Seuil à la longueur de données brutes dans laquelle phpMussel est autorisé à lire et à analyser (dans le cas où il ya remarquable performance problèmes au cours de l'analyse). Défaut = 32Mo. Zéro ou nulle valeur désactive le seuil. En général, cette valeur ne doit pas être moins que la moyenne tailles des fichiers des téléchargements que vous voulez et s'attendent à recevoir de votre serveur ou site web, ne devrait pas être plus que la filesize_limit directive, et ne devrait pas être plus que d'un cinquième de l'allocation de totale mémoire autorisée à PHP via le "php.ini" fichier de configuration. Cette directive existe pour tenter d'empêcher phpMussel d'utiliser trop de mémoire (ce qui l'empêcherait d'être capable d'analyse fichiers dessus d'une certaine taille avec succès).

##### « allow_leading_trailing_dots » `[bool]`
- Autoriser les points de début et de fin dans les noms de fichiers ? Cela peut parfois être utilisé pour cacher des fichiers, ou pour tromper certains systèmes en permettant la traversée de répertoires. False = Ne pas autoriser [Défaut]. True = Autoriser.

##### « block_macros » `[bool]`
- Essayez de bloquer tous les fichiers contenant des macros ? Certains types de documents et feuilles de calcul peuvent contenir des macros exécutables, fournissant ainsi un dangereux vecteur potentiel pour logiciels malveillants. False = Ne pas bloquer [Défaut] ; True = Bloquer.

##### « only_allow_images » `[bool]`
- Lorsqu'il est défini sur true, tous les fichiers rencontrés par le scanner qui ne sont pas des images seront immédiatement marqués, sans être analysés. Cela peut aider à réduire le temps nécessaire pour terminer une analyse dans certains cas. Défini sur false par défaut.

#### « quarantine » (Catégorie)
Configuration pour la quarantaine.

##### « quarantine_key » `[string]`
- phpMussel est capable de mettre en quarantaine les téléchargements de fichiers bloqués, si cela est quelque chose que vous voulez qu'il fasse. L'utilisateurs de phpMussel qui souhaitent simplement de protéger leurs sites ou environnement d'hébergement sans avoir un profondément intérêt dans d'analyse de quelconque marqué fichier téléchargement tentatives devrait laisser cette fonctionnalité désactivée, mais tous les utilisateurs intéressés dans d'analyse plus approfondie de tenté fichier téléchargements pour la recherche des logiciels malveillants ou pour des choses semblables devraient permettre cette fonctionnalité. La quarantaine de marqué fichier téléchargement tentatives peut parfois aider également dans le débogage des faux positifs, si cela est quelque chose qui se produit fréquemment pour vous. Pour désactiver la fonctionnalité de quarantaine, il suffit de laisser la directive `quarantine_key` vide, ou effacer le contenu de cette directive si elle est pas déjà vide. Pour activer la fonctionnalité de quarantaine, entrer une valeur dans la directive. Le `quarantine_key` est une élément important de la sécurité de la fonctionnalité de quarantaine requis en tant que moyen de prévention de la fonctionnalité de quarantaine d'être exploités par des attaquants potentiels en tant que moyen de prévention toute potentielle exécution de données stockées dans la quarantaine. Le `quarantine_key` devrait être traité de la même manière que vos mots de passe : Le plus sera le mieux, et conservez-le bien. Pour un meilleur effet, utiliser en conjonction avec `delete_on_sight`.

##### « quarantine_max_filesize » `[string]`
- La maximum taille autorisée de fichiers mis en quarantaine. Fichiers au-dessus de cette valeur ne sera pas placé en quarantaine. Cette directive est un important moyen de rendre plus difficile pour des agresseurs potentiels d'inonder votre quarantaine avec des données non désirées ce qui pourrait causer l'emballement d'utilisation des données sur votre service d'hébergement. Défaut = 2Mo.

##### « quarantine_max_usage » `[string]`
- La maximale utilisation autorisée de la mémoire pour la quarantaine. Si la totale d'utilisée mémoire par la quarantaine atteint cette valeur, les anciens fichiers en quarantaine seront supprimés jusqu'à ce que la totale mémoire utilisée n'atteint pas cette valeur. Cette directive est un important moyen de rendre plus difficile pour des agresseurs potentiels d'inonder votre quarantaine avec des données non désirées ce qui pourrait causer l'emballement d'utilisation des données sur votre service d'hébergement. Défaut = 64Mo.

##### « quarantine_max_files » `[int]`
- Le nombre maximal de fichiers pouvant exister dans la quarantaine. Lorsque de nouveaux fichiers sont ajoutés à la quarantaine, si ce nombre est dépassé, les anciens fichiers seront supprimés jusqu'à ce que le reste ne dépasse plus ce nombre. Défaut = 100.

#### « virustotal » (Catégorie)
Configuration pour l'intégration de Virus Total.

##### « vt_public_api_key » `[string]`
- Facultativement, phpMussel est capable d'analyser les fichiers en utilisant le Virus Total API comme un moyen de fournir un renforcée niveau de protection contre les virus, trojans, logiciels malveillants et autres menaces. Par défaut, l'analyse des fichiers en utilisant le Virus Total API est désactivé. Pour activer, une Total Virus API clé est nécessaire. En raison de le significative avantage que cela pourrait fournir pour vous, il est quelque chose que je recommande fortement pour l'activer. S'il vous plaît être conscient, cependant, que pour utiliser le Virus Total API, vous *__DEVEZ__* accepter leurs conditions d'utilisation (Terms of Service) et vous *__DEVEZ__* respecter toutes les directives selon décrit par la documentation Virus Total ! Vous N'ÊTES PAS autorisé à utiliser cette fonctionnalité SAUF SI : Vous avez lu et accepté les Conditions d'Utilisation (Terms of Service) de Total Virus et son API. Vous avez lu et vous comprendre, au minimum, le préambule du Virus Total Publique API documentation (tout ce qui suit « VirusTotal Public API v2.0 » mais avant « Contents »).

Voir également :
- [Terms of Service](https://www.virustotal.com/en/about/terms-of-service/)
- [Getting started](https://developers.virustotal.com/reference)

##### « vt_suspicion_level » `[int]`
- Par défaut, phpMussel va restreindre les fichiers de l'analyse utilisant le Virus Total API à ces fichiers qu'il juges comme soupçonneux. Facultativement, vous pouvez régler cette restriction par changeant la valeur de la `vt_suspicion_level` directive.

##### « vt_weighting » `[int]`
- Devrais phpMussel appliquer les résultats de l'analyse en utilisant le Virus Total API comme détections ou comme pondération de détection ? Cette directive existe, parce que, quoique analyse d'un fichier à l'aide de plusieurs moteurs (comme Virus Total fait) devrait résulter en un augmenté taux de détection (et donc en un plus grand nombre de fichiers malveillants être détectés), il peut également résulter en un plus grand nombre de faux positifs, et donc, dans certaines circonstances, les résultats de l'analyse peuvent être mieux utilisées comme un score de confiance plutôt que comme une conclusion définitive. Si la valeur 0 est utilisée, les résultats de l'analyse en utilisant le Virus Total API seront être appliquées comme détections, et donc, si quelconque moteur utilisé par Virus Total marques le fichier analysé comme étant malveillants, phpMussel va considérer le fichier comme malveillant. Si quelconque autre valeur est utilisée, les résultats de l'analyse en utilisant le Virus Total API sera appliquée comme pondération de détection, et donc, le nombre de moteurs utilisés par Total Virus que marque le fichier analysé comme étant malveillant sera servir un score de confiance (ou une pondération de détection) pour savoir si ou non le fichier êtant analysé devrait être considéré comme malveillant par phpMussel (la valeur utilisée représentera le minimum score de confiance ou le poids requis pour être considéré comme malveillant). Une valeur de 0 est utilisée par défaut.

##### « vt_quota_rate » `[int]`
- Selon le Virus Total API documentation, elle est limitée à au plus 4 demandes de toute nature dans un laps de 1 minute de temps. Si vous exécutez un honeyclient, honeypot ou autre automatisation qui va fournir les ressources pour Virus Total et pas seulement récupérer des rapports vous avez droit à un plus élevée demande quota. Par défaut, phpMussel va adhérer strictement à ces limitations, mais en raison de la possibilité de ces quotas étant augmenté, ces deux directives sont fournies comme un moyen pour vous d'instruire phpMussel à quelle limite il faut adhérer. Sauf si vous avez été invité à le faire, on ne recommande pas pour vous d'augmenter ces valeurs, mais, si vous avez rencontré des problèmes relatifs à atteindre votre quota, diminuant ces valeurs *__PEUT__* parfois vous aider dans le traitement de ces problèmes. Votre quota est déterminée comme `vt_quota_rate` demandes de toute nature dans un laps de `vt_quota_time` minute de temps.

##### « vt_quota_time » `[int]`
- (Voir description ci-dessus).

#### « urlscanner » (Catégorie)
Configuration pour le scanner d'URL.

##### « google_api_key » `[string]`
- Permet cherches de l'API Google Safe Browsing quand l'API clé nécessaire est définie.

Voir également :
- [Google API Console](https://console.developers.google.com/)

##### « maximum_api_lookups » `[int]`
- Nombre de cherches maximal de l'API pour effectuer par itération d'analyse individuelle. Parce que chaque API cherche supplémentaire va ajouter à la durée totale requise pour compléter chaque itération d'analyse, vous pouvez prévoir une limitation afin d'accélérer le processus d'analyse. Quand défini comme 0, pas de telles nombre maximum admissible sera appliquée. Défini comme 10 par défaut.

##### « maximum_api_lookups_response » `[bool]`
- Que faire si le nombre de cherches de l'API maximal est dépassée ? False = Ne fais rien (poursuivre le traitement) [Défaut] ; True = Marque/bloquer le fichier.

##### « cache_time » `[int]`
- Combien de temps (en secondes) devrait les résultats du cherches de l'API être conservé dans le cache ? Défaut est 3600 secondes (1 heure).

#### « legal » (Catégorie)
Configuration pour les exigences légales.

##### « pseudonymise_ip_addresses » `[bool]`
- Pseudonymiser les adresses IP lors de la journalisation ? True = Oui [Défaut] ; False = Non.

##### « privacy_policy » `[string]`
- L'adresse d'une politique de confidentialité pertinente à afficher dans le pied de page des pages générées. Spécifier une URL, ou laisser vide à désactiver.

#### « supplementary_cache_options » (Catégorie)
Options de cache supplémentaires.

##### « enable_apcu » `[bool]`
- Spécifie s'il faut essayer d'utiliser APCu pour la mise en cache. Défaut = False.

##### « enable_memcached » `[bool]`
- Spécifie s'il faut essayer d'utiliser Memcached pour la mise en cache. Défaut = False.

##### « enable_redis » `[bool]`
- Spécifie s'il faut essayer d'utiliser Redis pour la mise en cache. Défaut = False.

##### « enable_pdo » `[bool]`
- Spécifie s'il faut essayer d'utiliser PDO pour la mise en cache. Défaut = False.

##### « memcached_host » `[string]`
- Valeur de l'hôte Memcached. Défaut = « localhost ».

##### « memcached_port » `[int]`
- Valeur du port Memcached. Défaut = « 11211 ».

##### « redis_host » `[string]`
- Valeur de l'hôte Redis. Défaut = « localhost ».

##### « redis_port » `[int]`
- Valeur du port Redis. Défaut = « 6379 ».

##### « redis_timeout » `[float]`
- Valeur du délai d'attente Redis. Défaut = « 2.5 ».

##### « pdo_dsn » `[string]`
- Valeur de DSN de PDO. Défaut = « mysql:dbname=phpmussel;host=localhost;port=3306 ».

##### « pdo_username » `[string]`
- Nom d'utilisateur PDO.

##### « pdo_password » `[string]`
- Mot de passe PDO.

#### « frontend » (Catégorie)
Configuration pour l'accès frontal.

##### « frontend_log » `[string]`
- Fichier pour l'enregistrement des tentatives de connexion à l'accès frontal. Spécifier un fichier, ou laisser vide à désactiver.

##### « max_login_attempts » `[int]`
- Nombre maximal de tentatives de connexion (l'accès frontal). Défaut = 5.

##### « numbers » `[string]`
- Comment préférez-vous que les nombres soient affichés ? Sélectionnez l'exemple qui vous paraît le plus approprié.

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

##### « default_algo » `[string]`
- Définit quel algorithme utiliser pour tous les mots de passe et les sessions à l'avenir. Options : PASSWORD_DEFAULT (défaut), PASSWORD_BCRYPT, PASSWORD_ARGON2I (nécessite PHP >= 7.2.0), PASSWORD_ARGON2ID (nécessite PHP >= 7.3.0).

```
default_algo
├─PASSWORD_DEFAULT ("PASSWORD_DEFAULT")
├─PASSWORD_BCRYPT ("PASSWORD_BCRYPT")
├─PASSWORD_ARGON2I ("PASSWORD_ARGON2I (PHP >= 7.2.0)")
└─PASSWORD_ARGON2ID ("PASSWORD_ARGON2ID (PHP >= 7.3.0)")
```

##### « theme » `[string]`
- L'esthétique à utiliser pour l'accès frontal de phpMussel.

```
theme
├─default ("Default")
├─rbi ("Red-Blue Inverted")
├─slate ("Slate")
├─bluemetal ("Blue Metal")
├─moss ("Moss")
├─fullmoon ("Full Moon")
└─…Autres
```

##### « magnification » `[float]`
- Grossissement des fontes. Défaut = 1.

#### « web » (Catégorie)
Configuration du gestionnaire de téléchargements.

##### « uploads_log » `[string]`
- Où tous les téléchargements bloqués doivent être enregistrés. Spécifiez un nom de fichier, ou laisser vide à désactiver.

##### « forbid_on_block » `[bool]`
- Devrait phpMussel envoyer les en-têtes 403 avec le fichier téléchargement bloqué message, ou rester avec l'habitude 200 bien (200 OK) ? False = Non (200) ; True = Oui (403) [Défaut].

##### « max_uploads » `[int]`
- Maximum admissible nombre de fichiers pour analyse lorsque l'analyse de fichier téléchargements avant d'abandonner l'analyse et informer l'utilisateur qu'ils sont téléchargement trop à la fois ! Fournit protection contre une théorique attaque par lequel un attaquant tente à DDoS votre système ou CMS par surchargeant phpMussel à ralentir le processus de PHP à une halte. Recommandé : 10. Vous pouvez désirer d'augmenter ou diminuer ce nombre dépendamment de la vitesse de votre hardware. Notez que ce nombre ne tient pas compte pour ou inclure le contenus des archives.

##### « ignore_upload_errors » `[bool]`
- Cette directive doit généralement être DÉSACTIVÉ sauf si cela est nécessaire pour la correcte fonctionnalité de phpMussel sur votre spécifique système. Normalement, lorsque DÉSACTIVÉ, lorsque phpMussel détecte la présence d'éléments dans le `$_FILES`() tableau, il va tenter de lancer une analyse du fichiers que ces éléments représentent, et, si ces éléments sont vide, phpMussel retourne un message d'erreur. Ce comportement est normal pour phpMussel. Mais, pour certains CMS, vides éléments dans `$_FILES` peuvent survenir à la suite du naturel comportement de ces CMS, ou erreurs peuvent être signalés quand il ne sont pas tout, dans ce cas, le normal comportement pour phpMussel seront interférer avec le normal comportement de ces CMS. Si telle une situation se produit pour vous, ACTIVATION de cette option sera instruire phpMussel ne pas à tenter de lancer d'analyses pour ces vides éléments, ignorer quand il est reconnu et ne pas à retourner tout de connexes messages d'erreur, permettant ainsi la continuation de la requête de page. False = Désactivé ; True = Activé.

##### « theme » `[string]`
- L'esthétique à utiliser pour la page « Téléchargement Refusé ».

```
theme
├─default ("Default")
├─rbi ("Red-Blue Inverted")
├─slate ("Slate")
├─bluemetal ("Blue Metal")
├─moss ("Moss")
├─fullmoon ("Full Moon")
└─…Autres
```

##### « magnification » `[float]`
- Grossissement des fontes. Défaut = 1.

#### « phpmailer » (Catégorie)
Configuration pour PHPMailer (utilisé pour l'authentification à deux facteurs).

##### « event_log » `[string]`
- Fichier pour l'enregistrement de tous les événements relatifs à PHPMailer. Spécifier un fichier, ou laisser vide à désactiver.

##### « enable_two_factor » `[bool]`
- Cette directive détermine s'il faut utiliser 2FA pour les comptes frontaux.

##### « enable_notifications » `[string]`
- Si vous souhaitez être averti par e-mail lorsqu'un téléchargement est bloqué, indiquez ici l'adresse e-mail du destinataire.

##### « skip_auth_process » `[bool]`
- Définir cette directive sur `true` instruit à PHPMailer de sauter le processus d'authentification qui se produit normalement lors de l'envoi d'e-mail via SMTP. Cela doit être évité, car sauter du processus peut exposer l'e-mail sortant aux attaques MITM, mais peut être nécessaire dans les cas où ce processus empêche PHPMailer de se connecter à un serveur SMTP.

##### « host » `[string]`
- Hôte SMTP à utiliser pour les e-mails sortants.

##### « port » `[int]`
- Le numéro de port à utiliser pour l'e-mail sortant. Défaut = 587.

##### « smtp_secure » `[string]`
- Le protocole à utiliser lors de l'envoi d'e-mail via SMTP (TLS ou SSL).

```
smtp_secure
├─default ("-")
├─tls ("TLS")
└─ssl ("SSL")
```

##### « smtp_auth » `[bool]`
- Cette directive détermine si les sessions SMTP doivent être authentifiées (elles doivent généralement être laissées seules).

##### « username » `[string]`
- Le nom d'utilisateur à utiliser lors de l'envoi d'e-mail via SMTP.

##### « password » `[string]`
- Le mot de passe à utiliser lors de l'envoi d'e-mail via SMTP.

##### « set_from_address » `[string]`
- L'adresse de l'expéditeur à citer lors de l'envoi d'e-mail via SMTP.

##### « set_from_name » `[string]`
- Le nom de l'expéditeur à citer lors de l'envoi d'e-mail via SMTP.

##### « add_reply_to_address » `[string]`
- L'adresse de réponse à citer lors de l'envoi d'e-mail via SMTP.

##### « add_reply_to_name » `[string]`
- Le nom pour répondre à citer lors de l'envoi d'e-mail via SMTP.

---


### 8. <a name="SECTION8"></a>FORMATS DE SIGNATURES

*Voir également :*
- *[Qu'est-ce qu'une « signature » ?](#WHAT_IS_A_SIGNATURE)*

Les 9 premiers octets `[x0-x8]` d'un fichier des signatures de phpMussel sont `phpMussel`, et agir comme un « numéro magique » (magic number), afin de les identifier en tant que fichiers de signature (cela aide à empêcher phpMussel de tenter accidentellement d'utiliser des fichiers qui ne sont pas des fichiers de signature). L'octet suivant `[x9]` identifie le type de fichier des signatures, que phpMussel doit savoir pour pouvoir interpréter correctement le fichier de signatures. Les types de fichiers de signatures suivants sont reconnus :

Type | Octet | Description
---|---|---
`General_Command_Detections` | `0?` | Pour les fichiers de signatures utilisant CSV (valeurs séparées par des virgules). Les valeurs (signatures) sont des chaînes codées en hexadécimal pour rechercher dans les fichiers. Les signatures ici n'ont aucun nom ou d'autres détails (seulement la chaîne à détecter).
`Filename` | `1?` | Pour les signatures des noms de fichiers.
`Hash` | `2?` | Pour les signatures de hachage.
`Standard` | `3?` | Pour les fichiers de signatures qui fonctionnent directement avec le contenu du fichiers.
`Standard_RegEx` | `4?` | Pour les fichiers de signatures qui fonctionnent directement avec le contenu du fichiers. Les signatures peuvent contenir des expressions régulières.
`Normalised` | `5?` | Pour les fichiers de signatures qui fonctionnent avec le contenu de fichiers normalisés par ANSI.
`Normalised_RegEx` | `6?` | Pour les fichiers de signatures qui fonctionnent avec le contenu de fichiers normalisés par ANSI. Les signatures peuvent contenir des expressions régulières.
`HTML` | `7?` | Pour les fichiers de signatures qui fonctionnent avec le contenu de fichiers normalisés par HTML.
`HTML_RegEx` | `8?` | Pour les fichiers de signatures qui fonctionnent avec le contenu de fichiers normalisés par HTML. Les signatures peuvent contenir des expressions régulières.
`PE_Extended` | `9?` | Pour les fichiers de signatures qui fonctionnent avec des métadonnées PE (autres que les métadonnées PE sectionnelle).
`PE_Sectional` | `A?` | Pour les fichiers de signatures qui fonctionnent avec des métadonnées PE sectionnelle.
`Complex_Extended` | `B?` | Pour les fichiers de signatures qui fonctionnent avec diverses règles basées sur les métadonnées étendues générées par phpMussel.
`URL_Scanner` | `C?` | Pour les fichiers de signatures qui fonctionnent avec les URLs.

L'octet suivant `[x10]` est une nouvelle ligne `[0A]`, et conclut l'en-tête du fichier des signatures de phpMussel.

Chaque ligne non vide par la suite est une signature ou une règle. Chaque signature ou règle occupe une seule ligne. Les formats de signatures supportées sont décrits ci-dessous.

#### *SIGNATURES POUR LES NOMS DE FICHIERS*
Toutes les signatures pour les noms de fichiers suivez le format :

`NOM:FNRX`

Où NOM est le nom à citer pour la signature et FNRX est l'expression régulière pour faire correspondre les (non codé) noms de fichiers.

#### *SIGNATURES HASH*
Toutes les signatures HASH suivez le format :

`HASH:TAILLE:NOM`

Où HASH est le hachage (généralement MD5) d'un ensemble du fichier, TAILLE est la totale taille du fichier et NOM est le nom à citer pour la signature.

#### *SIGNATURES PE SECTIONNELLE*
Toutes les signatures PE sectionnelle suivez le format :

`TAILLE:HASH:NOM`

Où HASH est le hachage MD5 d'un section du PE fichier, TAILLE est la totale taille de cet section et NOM est le nom à citer pour la signature.

#### *SIGNATURES PE ÉTENDUES*
Toutes les signatures PE étendues suivez le format :

`$VAR:HASH:TAILLE:NOM`

Où $VAR est le nom de la PE variable à comparer contre, HASH est le MD5 hachage de cette variable, TAILLE est la taille totale de cette variable et NOM est le nom de à pour cette signature.

#### *SIGNATURES COMPLEXES ÉTENDUES*
Signatures complexes étendues sont assez différentes pour les autres types de signatures possible avec phpMussel, dans que ce qu'ils vérifient contre est spécifié par les signatures elles-mêmes et ils peuvent vérifier contre plusieurs critères. Les critères sont délimitées par « ; » et le type et les données de chacun critères est délimitée par « : » comme ainsi le format de ces signatures tendances à semble un peu comme :

`$variable1:CERTAINSDONNÉES;$variable2:CERTAINSDONNÉES;SignatureNom`

#### *TOUT LE RESTE*
Toutes les autres signatures suivez le format :

`NOM:HEX:FROM:TO`

Où NOM est le nom à citer pour la signature et HEX est un hexadécimal codé segment du fichier destiné à être identifié par la signature donnée. FROM et TO sont optionnel paramètres, indication de laquelle et à laquelle les positions dans les source données pour vérifier contre.

#### *REGEX (REGULAR EXPRESSIONS)*
Toute forme de regex comprise et préparé correctement par PHP devrait aussi être correctement compris et préparé par phpMussel et ses signatures. Mais, je vous suggère de prendre une extrême prudence lors de l'écriture de nouvelles regex basé signatures, parce, si vous n'êtes pas entièrement sûr de ce que vous faites, il peut y avoir très irréguliers et/ou inattendus résultats. Jetez un oeil à la phpMussel source code si vous n'êtes pas entièrement sûr sur le contexte dans lequel regex déclarations sont analysés. Aussi, rappeler toutes les déclarations (à l'exception de nom de fichier, métadonnées d'archives et MD5 déclarations) doit être de codé de hexadécimale (à l'exception de déclaration syntaxe, bien sûr) !

---


### 9. <a name="SECTION9"></a>PROBLÈMES DE COMPATIBILITÉ CONNUS

#### LOGICIELS ANTI-VIRUS COMPATIBILITÉ

Des problèmes de compatibilité entre phpMussel et certains fournisseurs d'antivirus se sont parfois produits dans le passé, ainsi, tous les quelques mois ou à peu près, je vérifie si des problèmes ont été signalés sur Virus Total par rapport aux dernières versions disponibles de la base de code phpMussel. Lorsque des problèmes sont signalés, j'énumère les problèmes signalés ici, dans la documentation.

La dernière fois que j'ai vérifié (2019.10.10), aucun problème n'a été signalé.

Je ne vérifie pas les fichiers de signature, la documentation ou tout autre contenu périphérique. Les fichiers de signature provoquent toujours des faux positifs lorsque d'autres solutions antivirus les détectent. Je recommanderais donc fortement, si vous envisagez d'installer phpMussel sur une machine sur laquelle une autre solution antivirus existe déjà, de créer une liste blanche des fichiers de signature phpMussel.

*Voir également : [Tableaux de Compatibilité](https://maikuolan.github.io/Compatibility-Charts/).*

---


### 10. <a name="SECTION10"></a>QUESTIONS FRÉQUEMMENT POSÉES (FAQ)

- [Qu'est-ce qu'une « signature » ?](#WHAT_IS_A_SIGNATURE)
- [Qu'est-ce qu'un « faux positif » ?](#WHAT_IS_A_FALSE_POSITIVE)
- [À quelle fréquence les signatures sont-elles mises à jour ?](#SIGNATURE_UPDATE_FREQUENCY)
- [J'ai rencontré un problème lors de l'utilisation de phpMussel et je ne sais pas quoi faire à ce sujet ! Aidez-moi !](#ENCOUNTERED_PROBLEM_WHAT_TO_DO)
- [Je veux utiliser phpMussel v3 avec une version PHP plus ancienne que 7.2.0 ; Pouvez-vous m'aider ?](#MINIMUM_PHP_VERSION_V3)
- [Puis-je utiliser une seule installation de phpMussel pour protéger plusieurs domaines ?](#PROTECT_MULTIPLE_DOMAINS)
- [Je ne veux pas déranger avec l'installation de cela et le faire fonctionner avec mon site ; Puis-je vous payer pour tout faire pour moi ?](#PAY_YOU_TO_DO_IT)
- [Puis-je vous embaucher ou à l'un des développeurs de ce projet pour un travail privé ?](#HIRE_FOR_PRIVATE_WORK)
- [J'ai besoin de modifications spécialisées, de personnalisations, etc ; Êtes-vous en mesure d'aider ?](#SPECIALIST_MODIFICATIONS)
- [Je suis un développeur, un concepteur de site Web ou un programmeur. Puis-je accepter ou offrir des travaux relatifs à ce projet ?](#ACCEPT_OR_OFFER_WORK)
- [Je veux contribuer au projet ; Puis-je faire cela ?](#WANT_TO_CONTRIBUTE)
- [Comment accéder à des détails spécifiques sur les fichiers lorsqu'ils sont analysés ?](#SCAN_DEBUGGING)
- [Listes noires – Listes blanches – Listes grises – Quels sont-ils, et comment puis-je les utiliser ?](#BLACK_WHITE_GREY)
- [Qu'est-ce qu'un « PDO DSN » ? Comment utiliser PDO avec phpMussel ?](#HOW_TO_USE_PDO)
- [Ma fonctionnalité de téléchargement est asynchrone (par exemple, utilise ajax, ajaj, json, etc). Je ne vois aucun message ni avertissement spécial lorsqu'un téléchargement est bloqué. Que se passe-t-il ?](#AJAX_AJAJ_JSON)
- [phpMussel peut-il détecter EICAR ?](#DETECT_EICAR)

#### <a name="WHAT_IS_A_SIGNATURE"></a>Qu'est-ce qu'une « signature » ?

Dans le contexte de phpMussel, une « signature » réfère à les données qui servent comme d'indicateur ou d'identifiant pour quelque chose spécifique que nous recherchons, généralement sous la forme d'un segment très petit, distinct et inoffensif de quelque chose plus grand et autrement nuisible, comme un virus ou un trojan, ou sous la forme d'une somme de contrôle, d'un hash ou d'un autre indicateur d'identification similaire, et généralement comprend une étiquette, et d'autres données pour aider à fournir certains contexte supplémentaire qui peut être utilisé par phpMussel pour déterminer la meilleure façon de procéder quand il rencontre ce que nous recherchons.

#### <a name="WHAT_IS_A_FALSE_POSITIVE"></a>Qu'est-ce qu'un « faux positif » ?

Le terme « faux positif » (*alternativement : « erreur faux positif » ; « fausse alarme »* ; Anglais : *false positive* ; *false positive error* ; *false alarm*), décrit très simplement, et dans un contexte généralisé, est utilisé lors de tester pour une condition, de se référer aux résultats de ce test, lorsque les résultats sont positifs (c'est à dire, lorsque la condition est déterminée comme étant « positif », ou « vrai »), mais ils devraient être (ou aurait dû être) négatif (c'est à dire, lorsque la condition, en réalité, est « négatif », ou « faux »). Un « faux positif » pourrait être considérée comme analogue à « crier au loup » (où la condition testée est de savoir s'il y a un loup près du troupeau, la condition est « faux » en ce que il n'y a pas de loup près du troupeau, et la condition est signalé comme « positif » par le berger par voie de crier « loup ! loup ! »), ou analogues à des situations dans des tests médicaux dans lequel un patient est diagnostiqué comme ayant une maladie, alors qu'en réalité, ils ont pas une telle maladie.

Résultats connexes lors de tester pour une condition peut être décrit en utilisant les termes « vrai positif », « vrai négatif » et « faux négatif ». Un « vrai positif » se réfère à quand les résultats du test et l'état actuel de la condition sont tous deux vrai (ou « positif »), and a « vrai négatif » se réfère à quand les résultats du test et l'état actuel de la condition sont tous deux faux (ou « négatif ») ; Un « vrai positif » ou « vrai négatif » est considéré comme une « inférence correcte ». L'antithèse d'un « faux positif » est un « faux négatif » ; Un « faux négatif » se réfère à quand les résultats du test are négatif (c'est à dire, la condition est déterminée comme étant « négatif », ou « faux »), mais ils devraient être (ou aurait dû être) positif (c'est à dire, la condition, en réalité, est « positif », ou « vrai »).

Dans le contexte de phpMussel, ces termes réfèrent à les signatures de phpMussel et les fichiers qu'ils bloquent. Quand phpMussel bloque un fichier en raison du mauvais, obsolète ou signatures incorrectes, mais ne devrait pas l'avoir fait, ou quand il le fait pour les mauvaises raisons, nous référons à cet événement comme un « faux positif ». Quand phpMussel ne parvient pas à bloquer un fichier qui aurait dû être bloqué, en raison de menaces imprévues, signatures manquantes ou déficits dans ses signatures, nous référons à cet événement comme un « détection manquée » ou « missed detection » (qui est analogue à un « faux négatif »).

Ceci peut être résumé par le tableau ci-dessous :

&nbsp; | phpMussel ne devrait *PAS* bloquer un fichier | phpMussel *DEVRAIT* bloquer un fichier
---|---|---
phpMussel ne bloque *PAS* un fichier | Vrai négatif (inférence correcte) | Détection manquée (analogue à faux négatif)
phpMussel bloque un fichier | __Faux positif__ | Vrai positif (inférence correcte)

#### <a name="SIGNATURE_UPDATE_FREQUENCY"></a>À quelle fréquence les signatures sont-elles mises à jour ?

La fréquence de mise à jour varie selon les fichiers de signature en question. Tous les mainteneurs des fichiers de signature pour phpMussel tentent généralement de conserver leurs signatures aussi à jour que possible, mais comme nous avons tous divers autres engagements, nos vies en dehors du projet, et comme aucun de nous n'est rémunéré financièrement (ou payé) pour nos efforts sur le projet, un planning de mise à jour précis ne peut être garanti. Généralement, les signatures sont mises à jour chaque fois qu'il y a suffisamment de temps pour les mettre à jour. L'assistance est toujours appréciée si vous êtes prêt à en offrir.

#### <a name="ENCOUNTERED_PROBLEM_WHAT_TO_DO"></a>J'ai rencontré un problème lors de l'utilisation de phpMussel et je ne sais pas quoi faire à ce sujet ! Aidez-moi !

- Utilisez-vous la dernière version du logiciel ? Utilisez-vous les dernières versions de vos fichiers de signature ? Si la réponse à l'une ou l'autre de ces deux est non, essayez de tout mettre à jour tout d'abord, et vérifier si le problème persiste. Si elle persiste, continuez à lire.
- Avez-vous vérifié toute la documentation ? Si non, veuillez le faire. Si le problème ne peut être résolu en utilisant la documentation, continuez à lire.
- Avez-vous vérifié la **[page des issues](https://github.com/phpMussel/phpMussel/issues)**, pour voir si le problème a été mentionné avant ? Si on l'a mentionné avant, vérifier si des suggestions, des idées et/ou des solutions ont été fournies, et suivez comme nécessaire pour essayer de résoudre le problème.
- Si le problème persiste, s'il vous plaît demander de l'aide à ce sujet en créant un nouveau issue sur la page des issues.

#### <a name="MINIMUM_PHP_VERSION_V3"></a>Je veux utiliser phpMussel v3 avec une version PHP plus ancienne que 7.2.0 ; Pouvez-vous m'aider ?

Non. PHP >= 7.2.0 est une exigence minimale pour phpMussel v3.

*Voir également : [Tableaux de Compatibilité](https://maikuolan.github.io/Compatibility-Charts/).*

#### <a name="PROTECT_MULTIPLE_DOMAINS"></a>Puis-je utiliser une seule installation de phpMussel pour protéger plusieurs domaines ?

Oui.

#### <a name="PAY_YOU_TO_DO_IT"></a>Je ne veux pas déranger avec l'installation de cela et le faire fonctionner avec mon site ; Puis-je vous payer pour tout faire pour moi ?

Peut-être. Ceci est considéré au cas par cas. Faites-nous savoir ce dont vous avez besoin, ce que vous offrez, et nous vous informerons si nous pouvons vous aider.

#### <a name="HIRE_FOR_PRIVATE_WORK"></a>Puis-je vous embaucher ou à l'un des développeurs de ce projet pour un travail privé ?

*Voir au-dessus.*

#### <a name="SPECIALIST_MODIFICATIONS"></a>J'ai besoin de modifications spécialisées, de personnalisations, etc ; Êtes-vous en mesure d'aider ?

*Voir au-dessus.*

#### <a name="ACCEPT_OR_OFFER_WORK"></a>Je suis un développeur, un concepteur de site Web ou un programmeur. Puis-je accepter ou offrir des travaux relatifs à ce projet ?

Oui. Notre licence ne l'interdit pas.

#### <a name="WANT_TO_CONTRIBUTE"></a>Je veux contribuer au projet ; Puis-je faire cela ?

Oui. Les contributions au projet sont les bienvenues. Voir « CONTRIBUTING.md » pour plus d'informations.

#### <a name="SCAN_DEBUGGING"></a>Comment accéder à des détails spécifiques sur les fichiers lorsqu'ils sont analysés ?

Vous pouvez accéder à des détails spécifiques sur les fichiers lorsqu'ils sont analysés en attribuant un tableau à utiliser à cet effet avant de demander à phpMussel de les analyser.

Dans l'exemple ci-dessous, `$Foo` est utilisé à cette fin. Après avoir analysé `/chemin/du/fichier/...`, des informations détaillées sur les fichiers contenus dans `/chemin/du/fichier/...` seront contenues par `$Foo`.

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);

$Scanner->setScanDebugArray($Foo);

$Results = $Scanner->scan('/chemin/du/fichier/...');

var_dump($Foo);
```

Le tableau est un tableau multidimensionnel composé d'éléments représentant chaque fichier analysé et des sous-éléments représentant les détails de ces fichiers. Ces sous-éléments sont les suivants :

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

*† - Non fourni avec les résultats mis en cache (fourni pour les résultats d'analyse nouveaux seulement).*

*‡ - Fourni lors de l'analyse des fichiers PE seulement.*

En option, ce tableau peut être détruit en utilisant ce qui suit :

```PHP
$Scanner->destroyScanDebugArray($Foo);
```

#### <a name="BLACK_WHITE_GREY"></a>Listes noires – Listes blanches – Listes grises – Quels sont-ils, et comment puis-je les utiliser ?

Les termes véhiculent des significations différentes dans différents contextes. Dans phpMussel, il existe trois contextes où ces termes sont utilisés : La réponse à la taille du fichier, la réponse au type du fichier, et la liste grise des signatures.

Afin d'obtenir un résultat souhaité à un coût minimal pour le traitement, il existe des choses simples que phpMussel peut vérifier avant de scanner les fichiers, tels que la taille, le nom et l'extension d'un fichier. Par exemple ; Si un fichier est trop volumineux, ou si son extension indique un type de fichier que nous ne voulons pas autoriser sur nos sites web, nous pouvons signaler le fichier immédiatement et ne pas avoir besoin de le scanner.

La réponse à la taille du fichier correspond à la réponse de phpMussel lorsqu'un fichier dépasse une limite spécifiée. Bien qu'aucune liste ne soit en cause, un fichier peut être considéré comme effectivement mis sur liste noire, sur liste blanche, ou sur liste grise, en fonction de sa taille. Deux directives de configuration facultatives distinctes existent pour spécifier respectivement une limite et la réponse souhaitée.

La réponse au type du fichier est la façon dont phpMussel répond à l'extension du fichier. Trois directives de configuration facultatives distinctes existent pour spécifier explicitement quelles extensions doivent être mises en liste noire, en liste blanche, ou en liste grise. Un fichier peut être considéré comme effectivement mis sur liste noire, sur liste blanche, ou sur liste grise si son extension correspond respectivement à l'une des extensions spécifiées.

Dans ces deux contextes, être sur liste blanche signifie qu'il ne doit pas être scanné ou marqué ; être sur la liste noire signifie qu'il devrait être marqué (et n'a donc pas besoin de le scanner) ; et être sur la liste grise signifie une analyse plus approfondie est nécessaire pour déterminer si nous devrions le marquer (c'est-à-dire, qu'il devrait être scanné).

La liste grise des signatures est une liste de signatures qui devraient être ignorées (ceci est brièvement mentionné plus haut dans la documentation). Quand une signature sur le liste grise des signatures est déclenchée, phpMussel continue à travailler à travers ses signatures et ne prend aucune action particulière en ce qui concerne la signature sur le liste grise. Il n'y a pas de liste noire des signatures, car le comportement implicite est un comportement normal pour les signatures déclenchées en tous cas, et il n'y a pas de liste blanche des signatures, parce que le comportement implicite n'aurait pas vraiment de sens compte tenu du fonctionnement normal de phpMussel et des capacités qu'il possède déjà.

Le liste grise des signatures est utile si vous avez besoin de résoudre des problèmes causés par une signature particulière sans désactiver ou désinstaller le fichier de signatures entier.

#### <a name="HOW_TO_USE_PDO"></a>Qu'est-ce qu'un « PDO DSN » ? Comment utiliser PDO avec phpMussel ?

« PDO » est un acronyme pour « [PHP Data Objects](https://www.php.net/manual/fr/intro.pdo.php) » (objets de données PHP). Il fournit une interface permettant à PHP de se connecter à certains systèmes de base de données communément utilisés par diverses applications PHP.

« DSN » est un acronyme pour « [data source name](https://fr.wikipedia.org/wiki/Data_Source_Name) » (nom de la source de données). Le « PDO DSN » explique à PDO comment il doit se connecter à une base de données.

phpMussel offre la possibilité d'utiliser PDO à des fins de mise en cache. Pour que cela fonctionne correctement, vous devez configurer phpMussel en conséquence, activant PDO, créer une nouvelle base de données à utiliser par phpMussel (si vous n'avez pas déjà à l'esprit une base de données que phpMussel peut utiliser), puis créer un nouvelle table dans votre base de données conformément à la structure décrite ci-dessous.

Quand une connexion à la base de données est réussie, mais la table nécessaire n'existe pas, il tentera de le créer automatiquement. Cependant, ce comportement n'a pas été testé de manière approfondie et le succès ne peut pas être garanti.

Ceci, bien sûr, ne s'applique que si vous voulez réellement que phpMussel utilise PDO. Si vous êtes assez content que phpMussel utilise la mise en cache de fichiers à plat (selon sa configuration par défaut), ou l'une des autres options de mise en cache fournies, vous n'aurez pas à vous soucier de la configuration de bases de données, de tables, etc.

La structure décrite ci-dessous utilise « phpmussel » comme nom de base de données, mais vous pouvez utiliser le nom de votre choix pour votre base de données, à condition que ce même nom soit répliqué dans votre configuration DSN.

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

La directive de configuration `pdo_dsn` de phpMussel doit être configurée comme décrit ci-dessous.

```
En fonction du pilote de base de données utilisé ...
│
├─4d (Avertissement : Expérimental, non testé, non recommandé !)
│ │
│ │         ╔═══════╗
│ └─4D:host=localhost;charset=UTF-8
│           ╚╤══════╝
│            └L'hôte avec lequel se connecter pour trouver la base de données.
│
├─cubrid
│ │
│ │             ╔═══════╗      ╔═══╗        ╔═════╗
│ └─cubrid:host=localhost;port=33000;dbname=example
│               ╚╤══════╝      ╚╤══╝        ╚╤════╝
│                │              │            └Le nom de la base de données à
│                │              │             utiliser.
│                │              │
│                │              └Le numéro de port auquel se connecter.
│                │
│                └L'hôte avec lequel se connecter pour trouver la base de
│                 données.
│
├─dblib
│ │
│ │ ╔═══╗      ╔═══════╗        ╔═════╗
│ └─dblib:host=localhost;dbname=example
│   ╚╤══╝      ╚╤══════╝        ╚╤════╝
│    │          │                └Le nom de la base de données à utiliser.
│    │          │
│    │          └L'hôte avec lequel se connecter pour trouver la base de
│    │           données.
│    │
│    └Valeurs possibles : « mssql », « sybase », « dblib ».
│
├─firebird
│ │
│ │                 ╔═══════════════════╗
│ └─firebird:dbname=/path/to/database.fdb
│                   ╚╤══════════════════╝
│                    ├Peut être un chemin d'accès à un fichier de base de
│                    │données local.
│                    │
│                    ├Peut se connecter avec un hôte et un numéro de port.
│                    │
│                    └Vous devriez vous référer à la documentation Firebird si
│                     vous voulez l'utiliser.
│
├─ibm
│ │
│ │         ╔═════╗
│ └─ibm:DSN=example
│           ╚╤════╝
│            └Avec quelle base de données cataloguée vous connecter.
│
├─informix
│ │
│ │              ╔═════╗
│ └─informix:DSN=example
│                ╚╤════╝
│                 └Avec quelle base de données cataloguée vous connecter.
│
├─mysql (Le plus recommandé !)
│ │
│ │              ╔═════╗      ╔═══════╗      ╔══╗
│ └─mysql:dbname=example;host=localhost;port=3306
│                ╚╤════╝      ╚╤══════╝      ╚╤═╝
│                 │            │              └Le numéro de port auquel se
│                 │            │               connecter.
│                 │            │
│                 │            └L'hôte avec lequel se connecter pour trouver la
│                 │             base de données.
│                 │
│                 └Le nom de la base de données à utiliser.
│
├─oci
│ │
│ │            ╔═════╗
│ └─oci:dbname=example
│              ╚╤════╝
│               ├Peut faire référence à la base de données cataloguée
│               │spécifique.
│               │
│               ├Peut se connecter avec un hôte et un numéro de port.
│               │
│               └Vous devriez vous référer à la documentation Oracle si vous
│                voulez l'utiliser.
│
├─odbc
│ │
│ │      ╔═════╗
│ └─odbc:example
│        ╚╤════╝
│         ├Peut faire référence à la base de données cataloguée spécifique.
│         │
│         ├Peut se connecter avec un hôte et un numéro de port.
│         │
│         └Vous devriez vous référer à la documentation ODBC/DB2 si vous voulez
│          l'utiliser.
│
├─pgsql
│ │
│ │            ╔═══════╗      ╔══╗        ╔═════╗
│ └─pgsql:host=localhost;port=5432;dbname=example
│              ╚╤══════╝      ╚╤═╝        ╚╤════╝
│               │              │           └Le nom de la base de données à
│               │              │            utiliser.
│               │              │
│               │              └Le numéro de port auquel se connecter.
│               │
│               └L'hôte avec lequel se connecter pour trouver la base de
│                données.
│
├─sqlite
│ │
│ │        ╔════════╗
│ └─sqlite:example.db
│          ╚╤═══════╝
│           └Le chemin d'accès au fichier de base de données local à utiliser.
│
└─sqlsrv
  │
  │               ╔═══════╗ ╔══╗          ╔═════╗
  └─sqlsrv:Server=localhost,1521;Database=example
                  ╚╤══════╝ ╚╤═╝          ╚╤════╝
                   │         │             └Le nom de la base de données à
                   │         │              utiliser.
                   │         │
                   │         └Le numéro de port auquel se connecter.
                   │
                   └L'hôte avec lequel se connecter pour trouver la base de
                    données.
```

Si vous ne savez pas quoi utiliser pour une partie particulière de votre DSN, essayez tout d'abord de voir si cela fonctionne tel quel, sans rien changer.

Notez que `pdo_username` et` pdo_password` devraient être identiques au nom d'utilisateur et au mot de passe que vous avez choisis pour votre base de données.

#### <a name="AJAX_AJAJ_JSON"></a>Ma fonctionnalité de téléchargement est asynchrone (par exemple, utilise ajax, ajaj, json, etc). Je ne vois aucun message ni avertissement spécial lorsqu'un téléchargement est bloqué. Que se passe-t-il ?

C'est normal. La page « Téléchargement Refusé » standard de phpMussel est servie au format HTML, ce qui devrait être suffisant pour les requêtes synchrones typiques, mais ce qui ne sera probablement pas suffisant si votre fonctionnalité de téléchargement s'attend à autre chose. Si votre fonctionnalité de téléchargement est asynchrone ou s'attend à ce qu'un statut de téléchargement soit traité de manière asynchrone, vous pouvez essayer de faire certaines choses pour que phpMussel réponde aux besoins de votre fonctionnalité de téléchargement.

1. Création d'un modèle de sortie personnalisé pour servir autre chose que HTML.
2. Création d'un plugin personnalisé pour contourner entièrement la page standard « Téléchargement Refusé » et demander au gestionnaire de téléchargement de faire autre chose lorsqu'un téléchargement est bloqué (il y a des points de code fournis par le gestionnaire de téléchargement qui pourraient être utiles pour cela).
3. Désactiver entièrement le gestionnaire de téléchargement et simplement appeler l'API phpMussel de votre fonctionnalité de téléchargement.

#### <a name="DETECT_EICAR"></a>phpMussel peut-il détecter EICAR ?

Oui. Une signature pour détecter EICAR est incluse dans le « fichier de signature d'expressions régulières standard de phpMussel » (`phpmussel_regex.db`). Tant que ce fichier de signature est installé et activé, phpMussel devrait être capable de détecter EICAR. Étant donné que la base de données ClamAV comprend également de nombreuses signatures spécifiquement pour la détection d'EICAR, ClamAV peut facilement détecter EICAR, mais puisque phpMussel n'utilise qu'un sous-ensemble réduit du total des signatures fournies par ClamAV, elles pourraient ne pas être suffisantes à elles seules pour que phpMussel détecte EICAR. La capacité de le détecter peut également dépendre de votre configuration exacte.

---


### 11. <a name="SECTION11"></a>INFORMATION LÉGALE

#### 11.0 PRÉAMBULE DE LA SECTION

Cette section de la documentation est destinée à décrire les considérations juridiques possibles concernant l'utilisation et la mise en œuvre du paquet, et de fournir quelques informations de base connexes. Cela peut être important pour certains utilisateurs afin de garantir le respect des exigences légales qui peuvent exister dans les pays où ils opèrent, et certains utilisateurs peuvent avoir besoin d'ajuster leurs politiques de site Web conformément à cette information.

Tout d'abord, s'il vous plaît se rendre compte que je (l'auteur du paquet) ne suis pas un avocat, ni un professionnel juridique qualifié de toute nature. Par conséquent, je ne suis pas légalement qualifié pour fournir des conseils juridiques. Aussi, dans certains cas, les exigences légales peuvent varier selon les pays et les juridictions, et ces différentes exigences juridiques peuvent parfois entrer en conflit (comme, par exemple, dans le cas des pays qui favorisent le droit à la [vie privée](https://fr.wikipedia.org/wiki/Vie_priv%C3%A9e) et le [droit à l'oubli](https://fr.wikipedia.org/wiki/Droit_%C3%A0_l%27oubli), par rapport aux pays qui favorisent la [conversation des données](https://fr.wikipedia.org/wiki/Conservation_des_donn%C3%A9es) étendue). Considérons également que l'accès au paquet n'est pas limité à des pays ou des juridictions spécifiques, et par conséquent, la base d'utilisateurs du paquet est susceptible de la diversité géographique. Ces points pris en compte, je ne suis pas en mesure de dire ce que cela signifie d'être « conforme à la loi » pour tous les utilisateurs, à tous égards. Cependant, j'espère que les informations contenues dans le présent document vous aideront à prendre vous-même une décision concernant ce que vous devez faire pour rester juridiquement conforme dans le cadre du paquet. Si vous avez des doutes ou des préoccupations concernant les informations contenues dans le présent document, ou si vous avez besoin d'aide supplémentaire et de conseils d'un point de vue juridique, je recommande de consulter un professionnel du droit qualifié.

#### 11.1 RESPONSABILITÉ

Comme déjà indiqué par la licence de paquet, le paquet est fourni sans aucune garantie. Cela inclut (mais n'est pas limité à) toute la portée de la responsabilité. Le paquet est fourni pour votre commodité, dans l'espoir qu'il vous sera utile, et qu'il vous apportera un certain avantage. Cependant, que vous utilisiez ou implémentiez le package, vous avez le choix. Vous n'êtes pas obligé d'utiliser ou de mettre en œuvre le package, mais lorsque vous le faites, vous êtes responsable de cette décision. Ni moi, ni aucun autre contributeur au paquet, ne sommes légalement responsables des conséquences des décisions que vous prenez, qu'elles soient directes, indirectes, implicites ou autres.

#### 11.2 TIERS

En fonction de sa configuration et de son implémentation exactes, le paquet peut communiquer et partager des informations avec des tiers dans certains cas. Ces informations peuvent être définies comme des « [données personnelles](https://fr.wikipedia.org/wiki/Donn%C3%A9es_personnelles) » (PII) dans certains contextes, par certaines juridictions.

La manière dont ces informations peuvent être utilisées par ces tiers est soumise aux différentes politiques énoncées par ces tiers et ne relève pas de cette documentation. Cependant, dans tous ces cas, le partage d'informations avec ces tiers peut être désactivé. Dans tous ces cas, si vous choisissez de l'activer, vous êtes responsable de rechercher toute préoccupation que vous pourriez avoir concernant la confidentialité, la sécurité, et l'utilisation des informations personnelles par ces tiers. Si des doutes existent, ou si vous n'êtes pas satisfait de la conduite de ces tiers en ce qui concerne les PII, il peut être préférable de désactiver tout partage d'informations avec ces tiers.

Dans un souci de transparence, le type d'informations partagées, et avec qui, est décrit ci-dessous.

##### 11.2.1 SCANNER D'URL

Les URL trouvées dans les téléchargements de fichiers peuvent être partagées avec l'API Google Safe Browsing, en fonction de la configuration du package. L'API Google Safe Browsing requiert des clés API pour fonctionner correctement, et est donc désactivée par défaut.

*Directives de configuration pertinentes :*
- `urlscanner` -> `google_api_key`

##### 11.2.2 VIRUS TOTAL

Lorsque phpMussel analyse un téléchargement de fichier, les hachages de ces fichiers peuvent être partagés avec l'API Virus Total, en fonction de la configuration du package. Il est prévu de pouvoir partager des fichiers entiers à un moment donné dans le futur, mais cette fonctionnalité n'est pas supportée par le paquet pour le moment. L'API Virus Total requiert une clé API pour fonctionner correctement, et est donc désactivée par défaut.

Les informations (y compris les fichiers et métadonnées de fichiers associés) partagées avec Virus Total peuvent également être partagées avec leurs partenaires, affiliés, et divers autres à des fins de recherche. Ceci est décrit plus en détail par leur politique de confidentialité.

*Voir : [Privacy Policy &ndash; VirusTotal](https://support.virustotal.com/hc/en-us/articles/115002168385-Privacy-Policy).*

*Directives de configuration pertinentes :*
- `virustotal` -> `vt_public_api_key`

#### 11.3 JOURNALISATION

La journalisation est une partie importante de phpMussel pour un certain nombre de raisons. Sans la journalisation, il peut être difficile de diagnostiquer des faux positifs, de déterminer exactement comment phpMussel est performant dans un contexte particulier, et de déterminer où ses lacunes peuvent être, et quels changements peuvent être nécessaires à sa configuration ou à ses signatures en conséquence, afin de continuer à fonctionner comme prévu. Quoi qu'il en soit, la journalisation peut ne pas être souhaitable pour tous les utilisateurs, et reste entièrement facultative. Dans phpMussel, la journalisation est désactivée par défaut. Pour l'activer, phpMussel doit être configuré en accord.

Aditionellement, si la journalisation est légalement autorisée, et dans la mesure où elle est légalement permise (par exemple, les types d'informations pouvant être journalisées, pendant combien de temps, et dans quelles circonstances), peut varier, selon la juridiction et le contexte dans lequel phpMussel est mis en œuvre (par exemple, si vous opérez en tant qu'individu, en tant qu'entreprise, et si sur une base commerciale ou non-commerciale). Il peut donc être utile pour que vous lisiez attentivement cette section.

Il existe plusieurs types de journalisation que phpMussel peut effectuer. Différents types de journalisation impliquent différents types d'informations, pour différentes raisons.

##### 11.3.0 JOURNAUX D'ANALYSE

Lorsqu'il est activé dans la configuration du paquet, phpMussel conserve les journaux des fichiers qu'il analyse. Ce type de journalisation est disponible en deux formats différents :
- Fichiers journaux lisibles par l'homme.
- Fichiers journaux sérialisés.

Les entrées d'un fichier journal lisible par un humain, ressemblent généralement à ceci (à titre d'exemple) :

```
Sun, 19 Jul 2020 13:33:31 +0800 Commencé.
→ Vérifie « ascii_standard_testfile.txt ».
─→ Détecté phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt) !
Sun, 19 Jul 2020 13:33:31 +0800 Terminé.
```

Une entrée de journal d'analyse inclut généralement les informations suivantes :
- La date et l'heure auxquelles le fichier a été analysé.
- Le nom du fichier analysé.
- Ce qui a été détecté dans le fichier (si quelque chose a été détecté).

*Directives de configuration pertinentes :*
- `general` -> `scan_log`
- `general` -> `scan_log_serialized`

Lorsque ces directives sont laissées vides, ce type de journalisation reste désactivé.

##### 11.3.1 JOURNAUX DES TÉLÉCHARGEMENTS

Lorsqu'il est activé dans la configuration du paquet, phpMussel conserve les journaux des téléchargements qui ont été bloqués.

*Par exemple :*

```
Date : Sun, 19 Jul 2020 13:33:31 +0800
Adresse IP : 127.0.0.x
== Résultats d'analyse (pourquoi marqué) ==
Détecté phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt) !
== Reconstruction de signatures hachage ==
dcacac499064454218823fbabff7e09b5b011c0c877ee6f215f35bffb195b6e9:654:ascii_standard_testfile.txt
Mis en quarantaine comme « 1595142388-2e017ea9ac1478e45dc15794a1fc18c0.qfu ».
```

Ces entrées de journal incluent généralement les informations suivantes :
- La date et l'heure auxquelles le téléchargement a été bloqué.
- L'adresse IP d'origine du téléchargement.
- La raison pour laquelle le fichier a été bloqué (ce qui a été détecté).
- Le nom du fichier bloqué.
- La somme de contrôle et la taille du fichier sont bloquées.
- Si le fichier a été mis en quarantaine, et sous quel nom interne.

*Directives de configuration pertinentes :*
- `web` -> `uploads_log`

##### 11.3.2 JOURNALISATION FRONTALE

Ce type de journalisation concerne les tentatives de connexion frontale, et se produit uniquement lorsqu'un utilisateur tente de se connecter à l'accès frontal (en supposant que l'accès frontal est activé).

Une entrée de journal frontal contient l'adresse IP de l'utilisateur qui tente de se connecter, la date et l'heure de la tentative, et les résultats de la tentative (connecté avec succès ou sans succès). Une entrée de journal frontal ressemble généralement à ceci (à titre d'exemple) :

```
x.x.x.x - Day, dd Mon 20xx hh:ii:ss +0000 - "admin" - Connecté.
```

*Directives de configuration pertinentes :*
- `general` -> `frontend_log`

##### 11.3.3 ROTATION DES JOURNAUX

Vous voudrez peut-être purger les journaux après un certain temps, ou peut être requis de le faire par la loi (c'est à dire, la durée légale de la conservation des journaux peut être limitée par la loi). Vous pouvez y parvenir en incluant des marqueurs de date/heure dans les noms de vos fichiers journaux (par exemple, `{yyyy}-{mm}-{dd}.log`), conformément à la configuration de votre package, puis en activant la rotation des journaux (la rotation des journaux vous permet d'effectuer des actions sur les fichiers journaux lorsque les limites spécifiées sont dépassées).

Par exemple : Si j'étais légalement tenu de supprimer les journaux après 30 jours, je pourrais spécifier `{dd}.log` dans les noms de mes fichiers journaux (`{dd}` représente les jours), définir la valeur de `log_rotation_limit` à 30, et définir la valeur de `log_rotation_action` à `Delete`.

À l'inverse, si vous devez conserver les journaux pendant une période prolongée, vous ne pouvez pas utiliser la rotation des journaux, ou vous pouvez définir la valeur de `log_rotation_action` à `Archive`, pour compresser les fichiers journaux, réduisant ainsi la quantité totale d'espace disque qu'ils occupent.

*Directives de configuration pertinentes :*
- `general` -> `log_rotation_limit`
- `general` -> `log_rotation_action`

##### 11.3.4 TRONCATION DES JOURNAUX

Il est également possible de tronquer des fichiers journaux individuels lorsqu'ils dépassent une certaine taille, si c'est quelque chose que vous pourriez avoir besoin ou que vous voulez faire.

*Directives de configuration pertinentes :*
- `general` -> `truncate`

##### 11.3.5 PSEUDONYMISATION D'ADRESSE IP

Premièrement, si vous n'êtes pas familier avec le terme, « pseudonymisation » se réfère au traitement des données personnelles en tant que tel, il ne peut plus être identifié à une personne concernée sans information supplémentaire, et à condition que ces informations supplémentaires soient conservées séparément, et soumis à des mesures techniques et organisationnelles pour s'assurer que les données personnelles ne peuvent être identifiées à aucune personnes naturelles.

Les ressources suivantes peuvent aider à l'expliquer plus en détail :
- [[les-infostrateges.com] RGPD : entre anonymisation et pseudonymisation](https://www.les-infostrateges.com/actu/18012505/rgpd-entre-anonymisation-et-pseudonymisation)
- [[Wikipedia] Pseudonymisation](https://fr.wikipedia.org/wiki/Pseudonymisation)

Dans certaines circonstances, vous pouvez être légalement requis d'anonymiser ou de pseudonymiser toute PII collectée, traitée, ou stockée. Bien que ce concept existe depuis longtemps, le GDPR/DSGVO mentionne notamment, et encourage spécifiquement la « pseudonymisation ».

phpMussel est capable de pseudonymiser les adresses IP lors de la connexion, si c'est quelque chose que vous pourriez avoir besoin ou que vous voulez faire. Lorsque phpMussel pseudonymise les adresses IP, lorsqu'il est connecté, l'octet final des adresses IPv4, et tout ce qui suit la deuxième partie des adresses IPv6 est représenté par un « x » (arrondir efficacement les adresses IPv4 à l'adresse initiale du 24ème sous-réseau dans lequel elles sont factorisées, et les adresses IPv6 à l'adresse initiale du 32ème sous-réseau dans lequel elles sont factorisées).

*Directives de configuration pertinentes :*
- `legal` -> `pseudonymise_ip_addresses`

##### 11.3.6 STATISTIQUES

phpMussel est facultativement capable de suivre des statistiques telles que le nombre total de fichiers analysés et bloqués depuis un certain moment. Cette fonctionnalité est désactivée par défaut, mais peut être activée via la configuration du package. Le type d'informations suivies ne doit pas être considéré comme les PII.

*Directives de configuration pertinentes :*
- `general` -> `statistics`

##### 11.3.7 CRYPTAGE

phpMussel ne crypte pas son cache ou aucune information de journal. Le [cryptage](https://fr.wikipedia.org/wiki/Chiffrement) des cache et des journaux peuvent être introduits à l'avenir, mais il n'existe actuellement aucun plan spécifique. Si vous craignez que des tiers non autorisés puissent accéder à des parties de phpMussel pouvant contenir des informations personnelles/sensibles telles que son cache ou ses journaux, je recommanderais que phpMussel ne soit pas installé dans un endroit accessible au public (par exemple, installer phpMussel en dehors du répertoire `public_html` standard ou équivalent disponible pour la plupart des serveurs web standard) et et que des autorisations appropriées restrictives soient appliquées pour le répertoire où il réside. Si ce n'est pas suffisant pour répondre à vos préoccupations, configurez phpMussel de telle sorte que les types d'informations à l'origine de vos préoccupations ne soient pas collectées ou journalisées en premier lieu (tel que en désactivant la journalisation).

#### 11.4 COOKIES

Lorsqu'un utilisateur se connecte avec succès à l'accès frontal, phpMussel définit un cookie afin de pouvoir se souvenir de l'utilisateur pour les demandes suivantes (c'est à dire, les cookies sont utilisés pour authentifier l'utilisateur à une session de connexion). Sur la page de connexion, un avertissement de cookie est affiché en évidence, avertissant l'utilisateur qu'un cookie sera défini s'il s'engage dans l'action correspondante. Les cookies ne sont définis à aucun autre endroit du code.

#### 11.5 COMMERCIALISATION ET PUBLICITÉ

phpMussel ni collecte ni traite aucune information à des fins de commercialisation ou de publicité, et ni vend ni profite d'aucune information collectée ou journalisée. phpMussel n'est pas une entreprise commerciale, et n'est pas lié à des intérêts commerciaux, donc faire ces choses n'aurait aucun sens. Cela a été le cas depuis le début du projet, et continue d'être le cas aujourd'hui. Aditionellement, faire ces choses serait contre-productif à l'esprit et à l'objectif du projet dans son ensemble, et aussi longtemps que je continuerai à maintenir le projet, cela n'arrivera jamais.

#### 11.6 POLITIQUE DE CONFIDENTIALITÉ

Dans certaines circonstances, vous pouvez être légalement tenu d'afficher clairement un lien vers votre politique de confidentialité sur toutes les pages et sections de votre site Web. Cela peut être important pour s'assurer que les utilisateurs sont bien informés de vos pratiques exactes de confidentialité, les types de PII que vous collectez, et comment vous avez l'intention de l'utiliser. Afin de pouvoir inclure un lien sur la page « Téléchargement Refusé » de phpMussel, une directive de configuration est fournie pour spécifier l'URL de votre politique de confidentialité.

*Directives de configuration pertinentes :*
- `legal` -> `privacy_policy`

#### 11.7 GDPR/DSGVO

Le règlement général sur la protection des données (GDPR) est un règlement de l'Union européenne qui entrera en vigueur le 25 Mai 2018. L'objectif principal de la réglementation est de permettre aux citoyens et aux résidents de l'UE de contrôler leurs propres données personnelles et d'unifier la réglementation au sein de l'UE en matière de vie privée et de données personnelles.

Le règlement contient des dispositions spécifiques relatives au traitement [des informations personnelles identifiables](https://fr.wikipedia.org/wiki/Donn%C3%A9es_personnelles) de toute « personne concernée » (toute personne physique identifiée ou identifiable) provenant ou provenant de l'UE. Pour être conforme à la réglementation, les « entreprises » (telles que définies par la réglementation) et tous les systèmes et processus pertinents doivent implémenter « [protection de la vie privée dès la conception](https://fr.wikipedia.org/wiki/Protection_de_la_vie_priv%C3%A9e_d%C3%A8s_la_conception) » par défaut, doivent utiliser les paramètres de confidentialité les plus élevés possibles, doivent mettre en œuvre les garanties nécessaires pour toute information stockée ou traitée (y compris, mais sans s'y limiter, la mise en œuvre de la pseudonymisation ou l'anonymisation complète des données), doivent déclarer clairement et sans ambiguïté les types de données qu'ils collectent, comment ils les traitent, pour quelles raisons, pour combien de temps ils les conservent, et s'ils partagent ces données avec des tiers, les types de données partagées avec des tiers, comment, pourquoi, et ainsi de suite.

Les données ne peuvent pas être traitées à moins qu'il y ait une base légale pour le faire, tel que défini par le règlement. En général, cela signifie que pour traiter les données d'une personne concernée sur une base légale, cela doit être fait conformément aux obligations légales, ou seulement après qu'un consentement explicite, bien informé et sans ambiguïté a été obtenu de la personne concernée.

Étant donné que certains aspects de la réglementation peuvent évoluer dans le temps, afin d'éviter la propagation d'informations périmées, il peut être préférable de connaître la réglementation auprès d'une source autorisée, par opposition à simplement inclure les informations pertinentes ici dans la documentation du paquet (dont peut éventuellement devenir obsolète à mesure que la réglementation évolue).

[EUR-Lex](https://eur-lex.europa.eu/) (une partie du site officiel de l'Union européenne qui fournit des informations sur le droit de l'UE) fournit des informations détaillées sur GDPR/DSGVO, disponible en 24 langues différentes (au moment de la rédaction de ce document), et disponible en téléchargement au format PDF. Je recommande vivement de lire les informations qu'ils fournissent, afin d'en savoir plus sur GDPR/DSGVO :
- [RÈGLEMENT (UE) 2016/679 DU PARLEMENT EUROPÉEN ET DU CONSEIL](https://eur-lex.europa.eu/legal-content/FR/TXT/?uri=celex:32016R0679)

Alternativement, il y a un bref aperçu (non autorisé) de GDPR/DSGVO disponible sur Wikipedia :
- [Règlement général sur la protection des données](https://fr.wikipedia.org/wiki/R%C3%A8glement_g%C3%A9n%C3%A9ral_sur_la_protection_des_donn%C3%A9es)

---


Dernière mise à jour : 25 Janvier 2021 (2021.01.25).
