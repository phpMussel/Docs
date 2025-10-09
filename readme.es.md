## Documentación para phpMussel v3 (Español).

### Contenidos
- 1. [PREÁMBULO](#user-content-SECTION1)
- 2. [CÓMO INSTALAR](#user-content-SECTION2)
- 3. [CÓMO USAR](#user-content-SECTION3)
- 4. [EXTENDIENDO PHPMUSSEL](#user-content-SECTION4)
- 5. [OPCIONES DE CONFIGURACIÓN](#user-content-SECTION5)
- 6. [FORMATOS DE FIRMAS](#user-content-SECTION6)
- 7. [CONOCIDOS PROBLEMAS DE COMPATIBILIDAD](#user-content-SECTION7)
- 8. [PREGUNTAS MÁS FRECUENTES (FAQ)](#user-content-SECTION8)
- 9. [INFORMACIÓN LEGAL](#user-content-SECTION9)

*Regarding translations: My native language is English. Because this is a free and open-source hobby project which generates zero income, and translatable content is likely to change as the features and functionality supported by the project changes, it doesn't make sense for me to spend money for translations. Because I'm the sole author/developer/maintainer for the project and I'm not a ployglot, any translations I produce are very likely to contain errors. Sorry, but realistically, that won't ever change. If you find any such errors/typos/mistakes/etc, your assistance to correct them would be very much appreciated. Pull requests are invited and encouraged. Otherwise, if you find these errors too much to handle, just stick with the original English source. If a translation is irredeemably incomprehensible, let me know which, and I can delete it. If you're not sure how to perform pull requests, ask. I can help.*

---


### 1. <a name="SECTION1"></a>PREÁMBULO

Gracias por usar phpMussel, un PHP script diseñado para detectar troyanos, virus, malware y otras amenazas en los archivos subidos en el sistema donde la script está adjunto, basado en las firmas de ClamAV y otros.

[PHPMUSSEL](https://phpmussel.github.io/) COPYRIGHT 2013 y más allá GNU/GPLv2 por [Caleb M (Maikuolan)](https://github.com/Maikuolan).

Este script es un software gratuito; puede redistribuirlo y/o modificarlo según los términos de la GNU General Public License, publicada por la Free Software Foundation; tanto la versión 2 de la licencia como cualquier versión posterior. Este script es distribuido con la esperanza de que será útil, pero SIN NINGUNA GARANTÍA; también, sin ninguna garantía implícita de COMERCIALIZACIÓN o IDONEIDAD PARA UN PARTICULAR PROPÓSITO. Vea la GNU General Public License para más detalles, ubicada en el `LICENSE.txt` archivo también disponible en:
- <https://www.gnu.org/licenses/>.
- <https://opensource.org/licenses/>.

Un especial agradecimiento a [ClamAV](https://www.clamav.net/) para la inspiración del proyecto y para las firmas que este script utiliza, sin la cual, la script probablemente no existiría, o en el mejor de, tendría un muy limitado valor.

Un especial agradecimiento a Bitbucket y GitHub para alojar los archivos de proyecto, y a las adicionales fuentes de un número de las firmas utilizadas por phpMussel: [PhishTank](https://www.phishtank.com/), [NLNetLabs](https://nlnetlabs.nl/), [Malware.Expert](https://malware.expert/) y otros, y agradecimiento especial a todos aquellos que apoyan el proyecto, a cualquier otra persona que yo haya olvidado de lo contrario mencionar, y a usted, por el uso de la script.

---


### 2. <a name="SECTION2"></a>CÓMO INSTALAR

#### 2.0 INSTALACIÓN CON COMPOSER

La forma recomendada de instalar phpMussel v3 es a través de Composer.

Por conveniencia, puede instalar las dependencias phpMussel más comúnmente necesarias a través del antiguo repositorio phpMussel principal:

`composer require phpmussel/phpmussel`

Alternativamente, puede elegir individualmente qué dependencias necesitará en su implementación. Es muy posible que solo desee dependencias específicas y no lo necesite todo.

Para hacer algo con phpMussel, necesitará la base de código central de phpMussel:

`composer require phpmussel/core`

Proporciona una instalación administrativa front-end para phpMussel:

`composer require phpmussel/frontend`

Proporciona escaneo automático de cargas de archivos para su sitio web:

`composer require phpmussel/web`

Proporciona la capacidad de utilizar phpMussel como una aplicación interactiva en modo CLI:

`composer require phpmussel/cli`

Proporciona un puente entre phpMussel y PHPMailer, permitiendo que phpMussel utilice PHPMailer para la autenticación de dos factores, notificación por correo electrónico sobre cargas de archivos bloqueados, etc.

`composer require phpmussel/phpmailer`

Para que phpMussel pueda detectar cualquier cosa, necesitará instalar firmas. No hay un paquete específico para eso. Para instalar firmas, consulte la siguiente sección de este documento.

Alternativamente, si no desea utilizar Composer, puede descargar ZIP preempaquetados desde aquí:

https://github.com/phpMussel/Examples

Los archivos ZIP preempaquetados incluyen todas las dependencias mencionadas anteriormente, así como todos los archivos de firma phpMussel estándar, junto con algunos ejemplos proporcionados sobre cómo usar phpMussel en su implementación.

#### <a name="INSTALLING_SIGNATURES"></a>2.1 INSTALACIÓN DE FIRMAS

Las firmas son requeridas por phpMussel para detectar amenazas específicas. Existen 2 métodos principales para instalar firmas:

1. Genere firmas usando "SigTool" e instale manualmente.
2. Descargue las firmas de "phpMussel/Signatures" o "phpMussel/Examples" e instálelas manualmente.

##### 2.1.0 Genere firmas usando "SigTool" e instale manualmente.

*Ver: [SigTool documentación](https://github.com/phpMussel/SigTool#documentation).*

*También tenga en cuenta que SigTool solo procesa las firmas de ClamAV. Para obtener firmas de otras fuentes, como las escritas específicamente para phpMussel, que incluye las firmas necesarias para detectar las muestras de prueba de phpMussel, este método deberá complementarse con uno de los otros métodos mencionados aquí.*

##### 2.1.1 Descargue las firmas de "phpMussel/Signatures" o "phpMussel/Examples" e instálelas manualmente.

Primeramente, ve a [phpMussel/Signatures](https://github.com/phpMussel/Signatures). El repositorio contiene varios archivos de firma que son comprimidos GZ. Descargue los archivos que necesita, descomprímalos, y cópielos en el directorio de firmas de su instalación.

Alternativamente, descargue el ZIP más reciente de [phpMussel/Examples](https://github.com/phpMussel/Examples). Luego puede copiar/pegar las firmas de ese archivo en su instalación.

---


### 3. <a name="SECTION3"></a>CÓMO USAR

#### 3.0 CONFIGURANDO PHPMUSSEL

Después de instalar phpMussel, necesitará un archivo de configuración para poder configurarlo. Los archivos de configuración de phpMussel pueden formatearse como archivos INI o YML. Si está trabajando desde uno de los ZIP de ejemplo, ya tendrá dos archivos de configuración de ejemplo disponibles, `phpmussel.ini` y `phpmussel.yml`; puede elegir uno de esos para trabajar, si lo desea. Si no está trabajando desde uno de los ZIP de ejemplo, deberá crear un nuevo archivo.

Si está satisfecho con la configuración predeterminada de phpMussel y no desea cambiar nada, puede usar un archivo vacío como archivo de configuración. Todo lo que no esté configurado por su archivo de configuración utilizará su valor predeterminado, por lo que solo necesita configurar algo explícitamente si desea que sea diferente de su valor predeterminado (lo que significa que un archivo de configuración vacío hará que phpMussel utilice toda su configuración predeterminada).

Si desea utilizar el front-end phpMussel, puede configurar todo desde la página de configuración del front-end. Pero, desde la v3 en adelante, la información de inicio de sesión front-end se almacena en su archivo de configuración, por lo que para iniciar sesión en el front-end, deberá configurar al menos una cuenta para iniciar sesión, y luego, a partir de ahí, podrá iniciar sesión y usar la página de configuración front-end para configurar todo lo demás.

Los siguientes extractos agregarán una nueva cuenta al front-end con el nombre de usuario "admin" y la contraseña "password".

Para archivos INI:

```INI
[user.admin]
password='$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK'
permissions='1'
```

Para archivos YML:

```YAML
user.admin:
 password: "$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK"
 permissions: 1
```

Puedes nombrar tu configuración como quieras (siempre y cuando conserve su extensión, para que phpMussel sepa qué formato usa), y puedes guardarlo donde quieras. Puede decirle a phpMussel dónde encontrar su archivo de configuración al proporcionar su ruta al crear instancias del cargador. Si no se proporciona ninguna ruta, phpMussel intentará ubicarla dentro del directorio principal del vendor.

En algunos entornos, como Apache, incluso es posible colocar un punto en la parte delantera de su configuración para ocultarlo y evitar el acceso público.

Consulte la sección de configuración de este documento para obtener más información sobre las diversas directivas de configuración disponibles para phpMussel.

#### 3.1 PHPMUSSEL CORE

Independientemente de cómo desee utilizar phpMussel, casi todas las implementaciones contendrán algo como esto, como mínimo:

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
```

Como los nombres de estas clases implican, el cargador ("Loader") es responsable de la preparación de las necesidades básicas del uso de phpMussel, y el escáner ("Scanner") es responsable de toda la funcionalidad de escaneo.

El constructor del cargador acepta cinco parámetros, todos opcionales.

```PHP
public function __construct(
    string $ConfigurationPath = '',
    string $CachePath = '',
    string $QuarantinePath = '',
    string $SignaturesPath = '',
    string $VendorPath = ''
)
```

El primer parámetro es la ruta completa a su archivo de configuración. Cuando se omite, phpMussel buscará un archivo de configuración llamado `phpmussel.ini` o `phpmussel.yml`, en el padre del directorio vendor.

El segundo parámetro es la ruta a un directorio que permite que phpMussel use para el almacenamiento en caché y el almacenamiento temporal de archivos. Cuando se omite, phpMussel intentará crear un nuevo directorio para usar, denominado como `phpmussel-cache`, en el padre del directorio vendor. Si desea especificar esta ruta usted mismo, sería mejor elegir un directorio vacío, para evitar la pérdida no deseada de otros datos en el directorio especificado.

El tercer parámetro es la ruta a un directorio que permite que phpMussel use para su cuarentena. Cuando se omite, phpMussel intentará crear un nuevo directorio para usar, denominado como `phpmussel-quarantine`, en el padre del directorio vendor. Si desea especificar esta ruta usted mismo, sería mejor elegir un directorio vacío, para evitar la pérdida no deseada de otros datos en el directorio especificado. Se recomienda encarecidamente que evite el acceso público al directorio utilizado para la cuarentena.

El cuarto parámetro es la ruta al directorio que contiene los archivos de firma para phpMussel. Cuando se omite, phpMussel intentará buscar los archivos de firma en un directorio llamado `phpmussel-signatures`, en el padre del directorio vendor.

El quinto parámetro es la ruta a su directorio vendor. Nunca debe apuntar a otra cosa. Cuando se omite, phpMussel intentará localizar este directorio por sí mismo. Este parámetro se proporciona para facilitar una integración más fácil con implementaciones que no necesariamente tienen la misma estructura que un proyecto típico de Composer.

El constructor para el escáner acepta solo un parámetro, y es obligatorio: el objeto cargador instanciado. Como se pasa por referencia, el cargador debe ser instanciado a una variable (instanciar el cargador directamente en el escáner para pasar por valor no es la forma correcta de usar phpMussel).

```PHP
public function __construct(\phpMussel\Core\Loader &$Loader)
```

#### 3.2 ESCANEO AUTOMÁTICO DE SUBIDA DE ARCHIVOS

Para instanciar el controlador de subidas:

```PHP
$Web = new \phpMussel\Web\Web($Loader, $Scanner);
```

Para escanear subidas de archivos:

```PHP
$Web->scan();
```

Opcionalmente, phpMussel puede intentar reparar los nombres de las subidas en caso de que haya algún problema, si desea:

```PHP
$Web->demojibakefier();
```

Como un ejemplo completo:

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

*Intentando subir el archivo `ascii_standard_testfile.txt`, que es una muestra benigna provista con el único propósito de probar phpMussel:*

![Screenshot](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/web-v3.0.0-alpha2.png)

#### 3.3 MODO CLI

Para instanciar el controlador CLI:

```PHP
$CLI = new \phpMussel\CLI\CLI($Loader, $Scanner);
```

Como un ejemplo completo:

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

Para instanciar el front-end:

```PHP
$FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
```

Como un ejemplo completo:

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

#### 3.5 API DE ESCÁNER

También puede implementar la API del escáner phpMussel en otros programas y scripts, si lo desea.

Como un ejemplo completo:

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

La parte importante a tener en cuenta de ese ejemplo es el método `scan()`. El método `scan()` acepta dos parámetros:

```PHP
public function scan(mixed $Files, int $Format = 0): mixed
```

El primer parámetro puede ser una cadena o una matriz, y le dice al escáner qué debe escanear. Puede ser una cadena que indique un archivo o directorio específico, o una matriz de tales cadenas para especificar múltiples archivos/directorios.

Cuando como una cadena, debe apuntar a donde se pueden encontrar los datos. Cuando como una matriz, las teclas de la matriz deben indicar los nombres originales de los elementos a escanear, y los valores deben apuntar a dónde se pueden encontrar los datos.

El segundo parámetro es un número entero y le dice al escáner cómo debe devolver sus resultados de escaneo.

Especifique 1 para devolver los resultados del escaneo como una matriz para cada elemento escaneado como números enteros.

Estos números enteros tienen los siguientes significados:

Resultados | Descripción
--:|:--
-5 | Indica que el escanear no se pudo completar por otros motivos.
-4 | Indica que los datos no se pudieron escanear debido al cifrado.
-3 | Indica que se encontraron problemas con los archivos de firmas phpMussel.
-2 | Indica que se ha corruptos datos detectados durante el escanear y por lo tanto el escanear no pudo completar.
-1 | Indica que las extensiones o complementos requeridos por PHP para ejecutar el escaneo faltaban y por lo tanto el escanear no pudo completar, 0 indica que la escanear objetivo no existe y por lo tanto no había nada para escanear.
0 | Indica que la escanear objetivo no existe y por lo tanto no había nada para escanear.
1 | Indica que el objetivo fue escaneado con éxito y no se detectaron problemas.
2 | Indica que el objetivo fue escaneado con éxito y se detectaron problemas.

Especifique 2 para devolver los resultados del análisis como un valor booleano.

Resultados | Descripción
:-:|:--
`true` | Se detectaron problemas (el objetivo del escaneo es malo/peligroso).
`false` | No se detectaron problemas (el objetivo del escaneo probablemente esté bien).

Especifique 3 para devolver los resultados del escaneo como una matriz para cada elemento escaneado como texto legible por humanos.

*Ejemplo de salida:*

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

Especifique 4 para devolver los resultados del escaneo como una cadena de texto legible por humanos (like 3, pero implotó).

*Ejemplo de salida:*

```
Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)! Detected phpMussel-Testfile.CoEx (coex_testfile.rtf)! Detected encrypted archive; Encrypted archives not permitted (encrypted.zip)!
```

Especifique *cualquier otro valor* para devolver texto formateado (es decir, los resultados del escaneo vistos cuando se usa CLI).

*Ejemplo de salida:*

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

*Ver también: [¿Cómo acceder a detalles específicos sobre los archivos cuando se escanean?](#user-content-SCAN_DEBUGGING)*

#### 3.6 AUTENTICACIÓN DE DOS FACTORES

Es posible hacer que el front-end sea más seguro habilitando la autenticación de dos factores ("2FA"). Cuando se inicia una sesión usando una cuenta habilitada para 2FA, se envía un correo electrónico a la dirección de correo electrónico asociada con esa cuenta. Este correo electrónico contiene un "código 2FA", que el usuario debe ingresar, además del nombre de usuario y la contraseña, para poder iniciar sesión con esa cuenta. Esto significa que la obtención de una contraseña de cuenta no sería suficiente para que cualquier hacker o posible atacante pueda iniciar sesión en esa cuenta, ya que también necesitarían tener acceso a la dirección de correo electrónico asociada con esa cuenta para poder recibir y utilizar el código 2FA asociado a la sesión, por lo tanto haciendo el front-end más seguro.

Después de instalar PHPMailer, deberá llenar las directivas de configuración de PHPMailer a través de la página de configuración de phpMussel o el archivo de configuración. Se incluye más información sobre estas directivas de configuración en la sección de configuración de este documento. Después de haber llenado las directivas de configuración de PHPMailer, configure `enable_two_factor` a `true`. La autenticación de dos factores ahora debería estar habilitada.

A continuación, deberá asociar una dirección de correo electrónico con una cuenta, para que phpMussel sepa a dónde enviar códigos 2FA cuando inicie sesión con esa cuenta. Para hacer esto, use la dirección de correo electrónico como el nombre de usuario de la cuenta (como `foo@bar.tld`), o incluya la dirección de correo electrónico como parte del nombre de usuario de la misma manera que lo haría al enviar un correo electrónico normalmente (como `Foo Bar <foo@bar.tld>`).

---


### 4. <a name="SECTION4"></a>EXTENDIENDO PHPMUSSEL

phpMussel está diseñado con la extensibilidad en mente. Las solicitudes de extracción a cualquiera de los repositorios de la organización phpMussel, y las [contribuciones](https://github.com/phpMussel/.github/blob/master/CONTRIBUTING.md) en general, siempre son bienvenidas. Además, si necesita modificar o extender phpMussel de manera que no sea adecuada para contribuir con esos repositorios particulares, definitivamente es posible hacerlo (por ejemplo, para modificaciones o extensiones que son específicas de su implementación particular, que no pueden publicarse debido a las necesidades de confidencialidad o privacidad en su organización, o que podrían publicarse preferiblemente en su propio repositorio, como por ejemplo para complementos y nuevos paquetes de Composer que requieren phpMussel).

Desde v3, toda la funcionalidad de phpMussel existe como clases, lo que significa que en algunos casos, los mecanismos de [herencia de objetos](https://www.php.net/manual/es/language.oop5.inheritance.php) proporcionados por PHP podrían ser una forma fácil y apropiada de extender phpMussel.

phpMussel también proporciona sus propios mecanismos de extensibilidad. Antes de v3, el mecanismo preferido era el sistema de complementos integrado para phpMussel. Desde v3, el mecanismo preferido es el orquestador de eventos.

El código repetitivo para extender phpMussel y para escribir nuevos complementos está disponible públicamente en el [repositorio repetitivo](https://github.com/phpMussel/plugin-boilerplates). También se incluye una lista de todos los [eventos admitidos actualmente](https://github.com/phpMussel/plugin-boilerplates/tree/master/boilerplate-v3#currently-supported-events) e instrucciones más detalladas sobre cómo utilizar el código repetitivo.

Notarás que la estructura del código repetitivo v3 es idéntica a la estructura de los distintos repositorios de phpMussel v3 en la organización phpMussel. Eso no es una coincidencia. Siempre que sea posible, recomendaría utilizar el código repetitivo v3 con fines de extensibilidad y utilizar principios de diseño similares a los de phpMussel v3. Si elige publicar su nueva extensión o complemento, puede integrar el soporte de Composer para él, y entonces debería ser teóricamente posible que otros utilicen su extensión o complemento exactamente de la misma manera que phpMussel v3, simplemente requiriéndolo junto con sus otras dependencias de Composer y aplicando cualquier controlador de eventos necesario en su implementación. (Por supuesto, no olvide incluir instrucciones con sus publicaciones, para que otros sepan sobre cualquier controlador de eventos necesario que pueda existir y cualquier otra información que pueda ser necesaria para la correcta instalación y utilización de su publicación).

---


### 5. <a name="SECTION5"></a>OPCIONES DE CONFIGURACIÓN

La siguiente es una lista de las directivas de configuración aceptadas por phpMussel, junto con una descripción de sus propósito y función.

```
Configuración (v3)
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
│       theme_mode [string]
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
│       theme_mode [string]
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

#### "core" (Categoría)
Configuración general (cualquier configuración que no pertenezca a otras categorías).

##### "scan_log" `[string]`
- Nombre del archivo para registrar todos los resultados de las escaneos. Especifique un archivo nombre, o dejar en blanco para desactivar.

Consejo útil: Puede adjuntar información de fecha/hora a los nombres de los archivos de registro utilizando marcadores de posición de formato de hora. Los marcadores de posición de formato de hora disponibles se muestran en <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "scan_log_serialized" `[string]`
- Nombre del archivo para registrar todos los resultados de las escaneos (utilizando un formato serializado). Especifique un archivo nombre, o dejar en blanco para desactivar.

Consejo útil: Puede adjuntar información de fecha/hora a los nombres de los archivos de registro utilizando marcadores de posición de formato de hora. Los marcadores de posición de formato de hora disponibles se muestran en <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "error_log" `[string]`
- Un archivo para registrar cualquier error detectado que no sea fatal. Especificar el nombre del archivo, o dejar en blanco para desactivar.

Consejo útil: Puede adjuntar información de fecha/hora a los nombres de los archivos de registro utilizando marcadores de posición de formato de hora. Los marcadores de posición de formato de hora disponibles se muestran en <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "outbound_request_log" `[string]`
- Un archivo para registrar los resultados de cualquier solicitud saliente. Especificar el nombre del archivo, o dejar en blanco para desactivar.

Consejo útil: Puede adjuntar información de fecha/hora a los nombres de los archivos de registro utilizando marcadores de posición de formato de hora. Los marcadores de posición de formato de hora disponibles se muestran en <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "truncate" `[string]`
- ¿Truncar archivos de registro cuando alcanzan cierto tamaño? Valor es el tamaño máximo en B/KB/MB/GB/TB que un archivo de registro puede crecer antes de ser truncado. El valor predeterminado de 0KB deshabilita el truncamiento (archivos de registro pueden crecer indefinidamente). Nota: ¡Se aplica a archivos de registro individuales! El tamaño de los archivos de registro no se considera colectivamente.

##### "log_rotation_limit" `[int]`
- La rotación de registros limita la cantidad de archivos de registro que deberían existir al mismo tiempo. Cuando se crean nuevos archivos de registro, si la cantidad total de archivos de registro excede el límite especificado, se realizará la acción especificada. Puede especificar el límite deseado aquí. Un valor de 0 deshabilitará la rotación de registros.

##### "log_rotation_action" `[string]`
- La rotación de registros limita la cantidad de archivos de registro que deberían existir al mismo tiempo. Cuando se crean nuevos archivos de registro, si la cantidad total de archivos de registro excede el límite especificado, se realizará la acción especificada. Puede especificar la acción deseada aquí.

```
log_rotation_action
├─Delete ("Eliminar los archivos de registro más antiguos, hasta que el límite ya no se exceda.")
└─Archive ("Primero archiva, y luego eliminar los archivos de registro más antiguos, hasta que el límite ya no se exceda.")
```

##### "timezone" `[string]`
- Esto se usa para especificar la zona horaria a usar (por ejemplo, Africa/Cairo, America/New_York, Asia/Tokyo, Australia/Perth, Europe/Berlin, Pacific/Guam, etc). Especifique "SYSTEM" para permitir que PHP maneje esto automáticamente.

```
timezone
├─SYSTEM ("Usar la zona horaria predeterminada del sistema.")
├─UTC ("UTC")
└─…Otro
```

##### "time_offset" `[int]`
- Desplazamiento del huso horario en minutos.

##### "time_format" `[string]`
- El formato de notación de fecha/hora usado por phpMussel. Se pueden añadir opciones adicionales bajo petición.

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
└─…Otro
```

__*Marcador de posición – Explicación – Ejemplo basado en 2024-04-30T18:27:49+08:00.*__<br />
`{yyyy}` – El año – P.ej. 2024.<br />
`{yy}` – El año abreviado – P.ej. 24.<br />
`{Mon}` – El nombre abreviado del mes (en inglés) – P.ej. Apr.<br />
`{mm}` – El mes con ceros a la izquierda – P.ej. 04.<br />
`{m}` – El mes – P.ej. 4.<br />
`{Day}` – El nombre abreviado del día (en inglés) – P.ej. Tue.<br />
`{dd}` – El día con ceros a la izquierda – P.ej. 30.<br />
`{d}` – El día – P.ej. 30.<br />
`{hh}` – La hora con ceros a la izquierda (utiliza el formato de 24 horas) – P.ej. 18.<br />
`{h}` – La hora (utiliza el formato de 24 horas) – P.ej. 18.<br />
`{ii}` – El minuto con ceros a la izquierda – P.ej. 27.<br />
`{i}` – El minuto – P.ej. 27.<br />
`{ss}` – El segundo con ceros a la izquierda – P.ej. 49.<br />
`{s}` – El segundo – P.ej. 49.<br />
`{tz}` – La zona horaria (sin dos puntos) – P.ej. +0800.<br />
`{t:z}` – La zona horaria (con dos puntos) – P.ej. +08:00.

##### "ipaddr" `[string]`
- ¿Dónde puedo encontrar el IP dirección de las solicitudes entrantes? (Útil para servicios como Cloudflare). Predefinido = REMOTE_ADDR. ¡AVISO: No cambie esto a menos que sepas lo que estás haciendo!

```
ipaddr
├─HTTP_INCAP_CLIENT_IP ("HTTP_INCAP_CLIENT_IP (Incapsula)")
├─HTTP_CF_CONNECTING_IP ("HTTP_CF_CONNECTING_IP (Cloudflare)")
├─CF-Connecting-IP ("CF-Connecting-IP (Cloudflare)")
├─HTTP_X_FORWARDED_FOR ("HTTP_X_FORWARDED_FOR (Cloudbric)")
├─X-Forwarded-For ("X-Forwarded-For (Squid)")
├─Forwarded ("Forwarded")
├─REMOTE_ADDR ("REMOTE_ADDR (Predefinido)")
└─…Otro
```

Ver también:
- [NGINX Reverse Proxy](https://docs.nginx.com/nginx/admin-guide/web-server/reverse-proxy/)
- [Squid configuration directive forwarded_for](http://www.squid-cache.org/Doc/config/forwarded_for/)
- [Forwarded - HTTP \| MDN](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Forwarded)

##### "delete_on_sight" `[bool]`
- Activando esta directiva instruirá la script para intentar para eliminar inmediatamente cualquier escaneados intentados archivos subidos emparejando a los criterios de detección, si través de firmas o de otras maneras. Archivos determinados como limpia no serán tocados. En el caso de los compactados archivos, la totalidad del compactado archivo será eliminado (independientemente de si el emparejando archivo es sólo uno de muchos varios archivos contenida dentro del compactado archivo). Para el caso de archivo subir escaneo, en general, no es necesario activar esta directiva, porque en general, PHP purgará automáticamente el contenido de su caché cuando la ejecución ha terminado, significando que lo en general eliminará cualquier archivos subidos a través de él con el servidor a no ser que se han movido, copiado o eliminado ya. La directiva se añade aquí como una medida adicional de seguridad para aquellos cuyas copias de PHP no siempre se comportan de la manera esperada. False = Después escaneando, dejar el archivo solo [Predefinido]; True = Después escaneando, si no se limpia, eliminar inmediatamente.

##### "lang" `[string]`
- Especifique la predefinido del lenguaje para phpMussel.

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
- ¿Localizar según HTTP_ACCEPT_LANGUAGE siempre que sea posible? True = Sí [Predefinido]; False = No.

##### "scan_cache_expiry" `[int]`
- Por cuánto tiempo debe phpMussel caché de los resultados del escaneo? El valor es el número de segundos para almacenar en caché los resultados del escaneo. La predeterminado valor es 21600 segundos (6 horas); Un valor de 0 desactiva el almacenamiento en caché de los resultados del escaneo.

##### "maintenance_mode" `[bool]`
- ¿Activar modo de mantenimiento? True = Sí; False = No [Predefinido]. Desactiva todo lo que no sea el front-end. A veces útil para la actualización de su CMS, frameworks, etc.

##### "statistics" `[bool]`
- ¿Seguir las estadísticas de uso de phpMussel? True = Sí; False = No [Predefinido].

##### "hide_version" `[bool]`
- ¿Ocultar información de la versión de los archivos de registro y la salida de la página? True = Sí; False = No [Predefinido].

##### "disabled_channels" `[string]`
- Esto se puede usar para evitar que phpMussel use canales particulares al enviar solicitudes.

```
disabled_channels
├─GitHub ("GitHub")
├─BitBucket ("BitBucket")
├─VirusTotal_HTTPS ("VirusTotal (HTTPS)")
└─VirusTotal_HTTP ("VirusTotal (HTTP)")
```

##### "request_proxy" `[string]`
- Si desea que las solicitudes salientes se envíen a través de un proxy, especifique ese proxy aquí. En caso contrario, deje esto en blanco.

##### "request_proxyauth" `[string]`
- Si envía solicitudes salientes a través de un proxy y ese proxy requiere un nombre de usuario y una contraseña, especifique ese nombre de usuario y contraseña aquí (p.ej., `user:pass`). En caso contrario, deje esto en blanco.

##### "default_timeout" `[int]`
- ¿Tiempo de espera predeterminado para usar en solicitudes externas? Predeterminado = 12 segundos.

#### "signatures" (Categoría)
Configuración para firmas, archivos de firma, etc.

##### "active" `[string]`
- Una lista de los archivos de firmas activa, delimitados por comas. Nota: Los archivos de firma deben estar primero instalados, antes de poder activarlos. Para que los archivos de prueba funcionen correctamente, los archivos de firma deben estar instalados y activados.

##### "fail_silently" `[bool]`
- ¿Debe phpMussel informan cuando los firmas archivos están desaparecidos o dañados? Si `fail_silently` está desactivado, desaparecidos y dañados archivos será reportado cuando escaneando, y si `fail_silently` está activado, desaparecidos y dañados archivos será ignorado, con escaneando reportando para aquellos archivos que no hay cualquier problemas. Esto generalmente debe ser dejar sola a menos que usted está experimentando estrellarse o problemas similares. False = Desactivado; True = Activado [Predefinido].

##### "fail_extensions_silently" `[bool]`
- ¿Debe phpMussel informan cuando extensiones están desaparecidos? Si `fail_extensions_silently` está desactivado, desaparecidos extensiones será reportado cuando escaneando, y si `fail_extensions_silently` está activado, desaparecidos extensiones será ignorado, with scanning reportando para aquellos archivos que no hay cualquier problemas. Desactivando esta directiva puede potencialmente aumentar su seguridad, pero también puede conducir a un aumento de falsos positivos. False = Desactivado; True = Activado [Predefinido].

##### "detect_adware" `[bool]`
- ¿Debe phpMussel utilizar firmas para detectar adware? False = No; True = Sí [Predefinido].

##### "detect_joke_hoax" `[bool]`
- ¿Debe phpMussel utilizar firmas para detectar broma/engaño malware/virus? False = No; True = Sí [Predefinido].

##### "detect_pua_pup" `[bool]`
- ¿Debe phpMussel utilizar firmas para detectar PUAs/PUPs? False = No; True = Sí [Predefinido].

##### "detect_packer_packed" `[bool]`
- ¿Debe phpMussel utilizar firmas para detectar empacadores y datos empaquetados? False = No; True = Sí [Predefinido].

##### "detect_shell" `[bool]`
- ¿Debe phpMussel utilizar firmas para detectar shell scripts? False = No; True = Sí [Predefinido].

##### "detect_deface" `[bool]`
- ¿Debe phpMussel utilizar firmas para detectar defacements y defacers? False = No; True = Sí [Predefinido].

##### "detect_encryption" `[bool]`
- ¿Debe phpMussel detectar y bloquear archivos cifrados? False = No; True = Sí [Predefinido].

##### "heuristic_threshold" `[int]`
- Hay ciertas firmas de phpMussel eso tienen la intención de identificar sospechosas y potencialmente maliciosos cualidades de los archivos que se subido sin que en ellos la identificación de los archivos que se subido específicamente como malicioso. Este "threshold" (umbral) valor dice phpMussel qué lo máximo total peso de sospechosas y potencialmente maliciosos cualidades de los archivos que se subido eso es permisible es antes de que esos archivos han de ser señalado como malicioso. La definición de peso en este contexto es el número total de sospechosas y potencialmente maliciosos cualidades identificados. Por predefinido, este valor es 3. Un valor inferior generalmente resultará en una mayor incidencia de falsos positivos pero un mayor número de archivos maliciosos siendo identificado, mientras un valor mayor generalmente resultará en una inferior incidencia de falsos positivos pero un inferior número de archivos maliciosos siendo identificado. Generalmente es mejor dejar este valor en su predefinido a menos que usted está experimentando problemas relacionados con ella.

#### "files" (Categoría)
Los detalles de cómo manejar archivos al escanear.

##### "filesize_limit" `[string]`
- Límite del tamaño de archivos en KB. 65536 = 64MB [Predefinido]; 0 = Sin límite (siempre en la greylist), cualquier (positivo) numérico valor aceptado. Esto puede ser útil cuando su PHP configuración limita la cantidad de memoria un proceso puede contener o si su PHP configuración limita el tamaño de archivo subidos.

##### "filesize_response" `[bool]`
- Qué hacer con los archivos que superen el límite del tamaño de archivos (si existe). False = Whitelist; True = Blacklist [Predefinido].

##### "filetype_whitelist" `[string]`
- Whitelist:

__Cómo funciona esto.__ Si su sistema sólo permite ciertos tipos de archivos para ser subido, o si su sistema niega explícitamente ciertos tipos de archivos, especificando los tipos de archivos en la whitelist, blacklist y/o greylist puede aumentar la velocidad a que escaneando se realizado por permitiendo la script para saltar sobre ciertos tipos de archivos. Formato es CSV (comas separados valores).

__Orden lógico de procesamiento.__ Si el tipo de archivo está en la whitelist, no escanear y no bloquear el archivo, y no cotejar el archivo con la blacklist o la greylist. Si el tipo de archivo está en la blacklist, no escanear el archivo, pero bloquearlo en todo caso, y no cotejar el archivo con la greylist. Si la greylist está vacía o si la greylist está no vacía y el tipo de archivo está en la greylist, escanearlo como normal y determinar si para bloquearlo basado en los resultados de la escaneo, pero si la greylist está no vacía y el tipo de archivo está no en la greylist, tratar el archivo como si está en la blacklist, por lo tanto no escanearlo pero bloquearlo en todo caso.

##### "filetype_blacklist" `[string]`
- Blacklist:

__Cómo funciona esto.__ Si su sistema sólo permite ciertos tipos de archivos para ser subido, o si su sistema niega explícitamente ciertos tipos de archivos, especificando los tipos de archivos en la whitelist, blacklist y/o greylist puede aumentar la velocidad a que escaneando se realizado por permitiendo la script para saltar sobre ciertos tipos de archivos. Formato es CSV (comas separados valores).

__Orden lógico de procesamiento.__ Si el tipo de archivo está en la whitelist, no escanear y no bloquear el archivo, y no cotejar el archivo con la blacklist o la greylist. Si el tipo de archivo está en la blacklist, no escanear el archivo, pero bloquearlo en todo caso, y no cotejar el archivo con la greylist. Si la greylist está vacía o si la greylist está no vacía y el tipo de archivo está en la greylist, escanearlo como normal y determinar si para bloquearlo basado en los resultados de la escaneo, pero si la greylist está no vacía y el tipo de archivo está no en la greylist, tratar el archivo como si está en la blacklist, por lo tanto no escanearlo pero bloquearlo en todo caso.

##### "filetype_greylist" `[string]`
- Greylist:

__Cómo funciona esto.__ Si su sistema sólo permite ciertos tipos de archivos para ser subido, o si su sistema niega explícitamente ciertos tipos de archivos, especificando los tipos de archivos en la whitelist, blacklist y/o greylist puede aumentar la velocidad a que escaneando se realizado por permitiendo la script para saltar sobre ciertos tipos de archivos. Formato es CSV (comas separados valores).

__Orden lógico de procesamiento.__ Si el tipo de archivo está en la whitelist, no escanear y no bloquear el archivo, y no cotejar el archivo con la blacklist o la greylist. Si el tipo de archivo está en la blacklist, no escanear el archivo, pero bloquearlo en todo caso, y no cotejar el archivo con la greylist. Si la greylist está vacía o si la greylist está no vacía y el tipo de archivo está en la greylist, escanearlo como normal y determinar si para bloquearlo basado en los resultados de la escaneo, pero si la greylist está no vacía y el tipo de archivo está no en la greylist, tratar el archivo como si está en la blacklist, por lo tanto no escanearlo pero bloquearlo en todo caso.

##### "check_archives" `[bool]`
- Intente comprobar el contenido de los compactados archivos? False = No (no comprobar); True = Sí (comprobar) [Predefinido]. Soportado: Zip (requiere libzip), Tar, Rar (requiere la extensión rar).

##### "filesize_archives" `[bool]`
- Heredar tamaño de archivos blacklist/whitelist para los contenidos de compactados archivos? False = No (todo en la greylist); True = Sí [Predefinido].

##### "filetype_archives" `[bool]`
- Heredar la blacklist/whitelist para los tipos de archivos para los contenidos de compactados archivos? False = No (todo en la greylist) [Predefinido]; True = Sí.

##### "max_recursion" `[int]`
- Máximo recursividad nivel límite para compactados archivos. Predefinido = 3.

##### "block_encrypted_archives" `[bool]`
- Detectar y bloquear compactados archivos encriptados? Debido phpMussel no es capaz de escanear el contenido de los compactados archivos encriptados, es posible que este puede ser empleado por un atacante como un medio de evitando phpMussel, antivirus escáneres y otras protecciones. Instruir phpMussel para bloquear cualquier compactado archivo que se descubre es encriptado potencialmente podría ayudar a reducir el riesgo asociado a estos tales posibilidades. False = No; True = Sí [Predefinido].

##### "max_files_in_archives" `[int]`
- Número máximo de archivos para analizar desde archivos comprimidos antes de abortar el análisis. Predefinido = 0 (sin máximo).

##### "chameleon_from_php" `[bool]`
- Buscar para PHP código en archivos que no están PHP archivos ni reconocidos compactados archivos. False = Desactivado; True = Activado.

##### "can_contain_php_file_extensions" `[string]`
- Una lista de extensiones de archivos permitidos para contener código PHP, separados por comas. Si la detección de ataques de camaleón PHP está habilitada, los archivos que contienen código PHP, que tienen extensiones que no están en esta lista, se detectarán como ataques de camaleón de PHP.

##### "chameleon_from_exe" `[bool]`
- Buscar para PE mágico número en archivos que no están ejecutables ni reconocidos compactados archivos y para ejecutables cuyo mágicos números son incorrectas. False = Desactivado; True = Activado.

##### "chameleon_to_archive" `[bool]`
- Detectar mágicos números incorrectos en archivos y archivos comprimidos. Soportado: BZ/BZIP2, GZ/GZIP, LZF, RAR, ZIP. False = Desactivado; True = Activado.

##### "chameleon_to_doc" `[bool]`
- Buscar para office documentos cuyo mágicos números son incorrectas (Soportado: DOC, DOT, PPS, PPT, XLA, XLS, WIZ). False = Desactivado; True = Activado.

##### "chameleon_to_img" `[bool]`
- Buscar para imágenes cuyo mágicos números son incorrectas (Soportado: BMP, DIB, PNG, GIF, JPEG, JPG, XCF, PSD, PDD, WEBP). False = Desactivado; True = Activado.

##### "chameleon_to_pdf" `[bool]`
- Buscar para PDF archivos cuyo mágicos números son incorrectas. False = Desactivado; True = Activado.

##### "archive_file_extensions" `[string]`
- Reconocido compactado archivo extensiones (formato es CSV; sólo debe agregar o eliminar cuando problemas ocurrir; eliminando innecesariamente puede causar falsos positivos a aparecer para compactados archivos, mientras añadiendo innecesariamente hará esencialmente whitelist que cuales eres añadiendo desde ataque específica detección; modificar con precaución; También notar que esto no tiene efecto en aquellos compactados archivos que pueden y no pueden ser analizado a contenido nivel). La lista, como es a predefinición, describe los formatos más comúnmente utilizados a través de la mayoría de sistemas y CMS, pero intencionalmente no es necesariamente exhaustiva.

##### "block_control_characters" `[bool]`
- Bloquear cualquier archivos que contenga cualquier caracteres de control (aparte de saltos de línea)? Si usted sólo subir texto sin cualquier formato, usted puede activar esta opción para proporcionar alguna adicional protección para su sistema. Pero, si usted subir cualquier cosa otro de texto sin cualquier formato, activando esto puede dar lugar a falsos positivos. False = No bloquear [Predefinido]; True = Bloquear.

##### "corrupted_exe" `[bool]`
- Corrompido archivos y procesamiento errores. False = Ignorar; True = Bloquear [Predefinido]. Detectar y bloquear potencialmente corrompido PE (Portátil Ejecutable) archivos? Frecuentemente (pero no siempre), cuando ciertos aspectos de un PE archivo están corrompido, dañados o no podrá ser analizado correctamente, lo puede ser indicativo de una infección viral. Los procesos utilizados por la mayoría de los antivirus programas para detectar un virus en PE archivos requerir analizando esos archivos en ciertas maneras, que, si el programador de un virus es consciente de, intentará específicamente para prevenir, con el fin de permitir su virus permanezca sin ser detectado.

##### "decode_threshold" `[string]`
- Opcional limitación a la longitud de datos a que dentro de decodificación comandos deben ser detectados (en caso de que los hay notable rendimiento problemas mientras que escaneando). Predefinido = 512KB. Cero o nulo valor desactiva la limitación (eliminando cualquier tal limitación basado sobre la tamaño de archivos).

##### "scannable_threshold" `[string]`
- Opcional limitación a la longitud de datos puros para que phpMussel se permitido leer y escanear (en caso de que los hay notable rendimiento problemas mientras que escaneando). Predefinido = 32MB. Cero o nulo valor desactiva la limitación. En general, Este valor no debe ser inferior a la media tamaño de archivos subidos que desea y espera recibir a su servidor o website, no debe ser mayor que el filesize_limit directiva, y no debe ser más de aproximadamente una quinta parte de la total permisible memoria asignación concedida a PHP a través de la "php.ini" configuración archivo. Esta directiva existe para intratar prevenir phpMussel del uso de demasiada memoria (eso sería prevenir que sea capaz para escanear archivos con éxito encima de un cierto tamaño de archivos).

##### "allow_leading_trailing_dots" `[bool]`
- ¿Permitir puntos iniciales y finales en los nombres de archivo? A veces, esto se puede utilizar para ocultar archivos, o para engañar a algunos sistemas para que permitan el atravesar del directorio. False = No permitir [Predefinido]. True = Permitir.

##### "block_macros" `[bool]`
- ¿Intenta bloquear cualquier archivo que contenga macros? Algunos tipos de documentos y hojas de cálculo pueden contener macros ejecutables, proporcionando así un peligroso vector de malware potencial. False = No bloquear [Predefinido]; True = Bloquear.

##### "only_allow_images" `[bool]`
- Cuando es true, cualquier archivo encontrado por el escáner que no sean imágenes se marcará de inmediato, sin ser escaneado. Esto puede ayudar a reducir el tiempo necesario para completar una escaneo en algunos casos. Establecido en falso por predeterminado.

##### "entropy_limit" `[float]`
- El límite de entropía para firmas que utilizan datos normalizados (el valor predeterminado es 7.7). En este contexto, la entropía se define como la entropía de Shannon del contenido del archivo que se está escaneando. Cuando se excede tanto el límite de entropía como el límite de tamaño del archivo de entropía, para reducir el riesgo de falsos positivos, se ignorarán algunas firmas que utilizan datos normalizados.

##### "entropy_filesize_limit" `[string]`
- El límite de tamaño del archivo de entropía para firmas que utilizan datos normalizados (el valor predeterminado es 256KB). Cuando se excede tanto el límite de entropía como el límite de tamaño del archivo de entropía, para reducir el riesgo de falsos positivos, se ignorarán algunas firmas que utilizan datos normalizados.

#### "quarantine" (Categoría)
Configuración para la cuarentena.

##### "quarantine_key" `[string]`
- phpMussel puede poner en cuarentena las subidas de archivos bloqueados, si esto es algo que usted quiere que haga. Usuarios casual de phpMussel de los cuales simplemente desean proteger sus website o hosting ambiente sin tener ningún interés con analizando profundamente cualquier marcados intentados archivos subidos debería dejar esta funcionalidad desactivado, pero cualquier usuarios interesados en más análisis de marcados intentados archivos subidos para la investigación de malware o para cosas similares debe activar esta funcionalidad. Cuarentenando de marcados intentados archivos subidos a veces puede también ayudar en la depuración de falsos positivos, si esto es algo que ocurre con frecuencia para usted. Para desactivar la cuarentena funcionalidad, simplemente dejar la directiva `quarantine_key` vacío, o borrar el contenidos de que directiva si no está ya vacío. Para activar la cuarentena funcionalidad, entrar algún valor en la directiva. La `quarantine_key` es un importante característica de seguridad de la cuarentena funcionalidad requiere como un medio para la prevención de la explotación de la cuarentena funcionalidad por potenciales atacantes y como un medio de evitar cualquier potencial ejecución de los datos almacenados dentro la cuarentena. La `quarantine_key` debería ser tratado de la misma manera que sus contraseñas: El más grande es el mejor, y guárdela bien. Para un mejor efecto, utilice conjuntamente con `delete_on_sight`.

##### "quarantine_max_filesize" `[string]`
- El archivo tamaño máximo permitido para archivos para ser cuarentenada. Archivos que superen el valor especificado aquí NO serán cuarentenada. Esta directiva es importante como un medio de hacer que sea más difícil para cualquier potenciales atacantes a inundar su cuarentena con datos no deseados que puede causar el excesivo uso de datos en su servicio de hosting. Predefinido = 2MB.

##### "quarantine_max_usage" `[string]`
- El uso máximo de memoria permitida para la cuarentena. Si la total memoria utilizada por la cuarentena alcanza este valor, los más antiguos cuarentenado archivos serán eliminado hasta que la total memoria utilizada ya no alcanza este valor. Esta directiva es importante como un medio de hacer que sea más difícil para cualquier potenciales atacantes a inundar su cuarentena con datos no deseados que puede causar el excesivo uso de datos en su servicio de hosting. Predefinido = 64M.

##### "quarantine_max_files" `[int]`
- La cantidad máxima de archivos que pueden existir en la cuarentena. Cuando se agregan nuevos archivos a la cuarentena, si se excede este número, los archivos antiguos se eliminarán hasta que el resto ya no exceda este número. Predefinido = 100.

#### "virustotal" (Categoría)
Configuración para la integración de Virus Total.

##### "vt_public_api_key" `[string]`
- Opcionalmente, phpMussel es capaz de escanear archivos utilizando el Virus API total como una manera de proporcionar un mucho mayor nivel de protección contra virus, troyanos, malware y otras amenazas. Por predefinido, escanear archivos utilizando el Virus Total API está desactivado. Para activarlo, una API clave desde Virus Total se requiere. Debido a la significativo beneficio que esto podría proporcionar a usted, está algo que recomiendo. Tenga en cuenta, aunque, que para utilizar el Virus API total, es absolutamente necesario usted estar de acuerdo con sus Términos de Servicio y cumplan todas las directrices según descrito por el Virus Total documentación! Usted NO se permitido utilizar esta integración función A MENOS QUE: Ha leído y está de acuerdo con los Términos de Servicio de Virus Total y sus API. Ha leído y entender, en un mínimo, el preámbulo de la Virus Total Pública API Documentación (todo después "VirusTotal Public API v2.0" pero antes "Contents").

Ver también:
- [Terms of Service](https://www.virustotal.com/en/about/terms-of-service/)
- [Getting started](https://developers.virustotal.com/reference)

##### "vt_suspicion_level" `[int]`
- Por predefinido, phpMussel restringirá qué archivos se escaneado usando el Virus Total API a esos archivos que se considera "sospechosa". Opcionalmente, usted puede ajustar esta restricción por manera de cambiando el valor de la `vt_suspicion_level` directiva.

```
vt_suspicion_level
├─0 (Escanear solo archivos con peso heurísticos.): Los archivos se escanearán solo si tienen algún peso heurístico. Se puede
│ incurrir peso heurístico a través de firmas destinadas a capturar huellas
│ digitales comunes asociadas con una infección potencial que no
│ necesariamente garantiza una infección. La búsqueda, en tales casos, puede
│ servir para proporcionar una segunda opinión para los resultados que
│ justifican la sospecha pero que de otro modo no brindan ninguna certeza.
├─1 (Escanear los archivos con peso heurísticos, archivos ejecutables, y archivos que potencialmente contengan datos ejecutables.): Ejemplos de archivos ejecutables, y archivos que potencialmente contienen
│ datos ejecutables, incluyen archivos Windows PE, archivos ELF Linux,
│ archivos Mach-O, archivos DOCX, archivos ZIP, etc.
└─2 (Escanear todos los archivos.)
```

##### "vt_weighting" `[int]`
- ¿Debería phpMussel aplicar los resultados del escaneo utilizando el Virus Total API como detecciones o como detección peso? Esta directiva existe, por razón de que, aunque escanear un archivo usando múltiples motores (como Virus Total hacer) debería resultar en un aumento detección cuenta (y por lo tanto en un mayor número de maliciosos archivos ser atrapado), esta también puede resultar en un mayor número de falsos positivos, y por lo tanto, en algunas circunstancias, los resultados del escanear pueden ser mejor utilizados como una puntuación de confianza y no como una definitiva conclusión. Si un valor de 0 es utiliza, los resultados del escaneo utilizando el Virus Total API se aplicará como detecciones, y por lo tanto, si cualquier motor utilizado por Virus Total marca el archivo está escaneando como malicioso, phpMussel considerará el archivo a ser malicioso. Si cualquier otro valor es utiliza, los resultados del escaneo utilizando el Virus Total API se aplicará como detección peso, y por lo tanto, el número de motores utilizados por Virus Total que marca el archivo está escaneando como malicioso servirá como una puntuación de confianza (o detección peso) para si el archivo que ser escanear debe ser considerado malicioso por phpMussel (el valor utilizado representará el mínima puntuación de confianza o peso requerido con el fin de ser considerado malicioso). Un valor de 0 es utilizado por predefinido.

##### "vt_quota_rate" `[int]`
- En acuerdo con la documentación de la Virus Total API, está limitado para un máximo de 4 solicitudes de cualquier naturaleza en cualquier 1 minuto período de tiempo. Si usted ejecuta un honeyclient, honeypot o cualquier otra automatización que va proporcionar recursos para Virus Total y no sólo recuperar los reportes usted tiene derecho a un más alta cuota. Por predefinido, phpMussel va adhiere estrictamente a estas limitaciones, pero debido a la posibilidad de estos limitaciones siendo aumentado, estas dos directivas son proporcionan como un manera para usted para indique para phpMussel en cuanto a qué limitaciones está debe adherirse a. A menos que usted ha estado indique que lo haga, está no es recomendable para usted para aumentar estos valores, pero, si ha tenido problemas relacionados con alcanzar su cuota, la disminución de estos valores __*PUEDE*__ a veces ayudarle para hacer frente a estos problemas. Su cuota es determinado como `vt_quota_rate` solicitudes de cualquier naturaleza en cualquier `vt_quota_time` minuto período de tiempo.

##### "vt_quota_time" `[int]`
- (Ver descripción arriba).

#### "urlscanner" (Categoría)
Configuración para el escáner de URL.

##### "google_api_key" `[string]`
- Permite API búsquedas al Google Safe Browsing API cuando la necesario API clave es define.

Ver también:
- [Google API Console](https://console.developers.google.com/)

##### "maximum_api_lookups" `[int]`
- Máximo número permitido de API búsquedas para llevar a cabo por individuo escaneando iteración. Debido a que cada adicional API búsqueda se sumará al total tiempo requerido para completar cada escaneando iteración, es posible que usted desee estipular una limitación a fin de acelerar el proceso de escaneando. Cuando se define en 0, no tal máximo número permitido se aplicará. Se define como 10 por predefinido.

##### "maximum_api_lookups_response" `[bool]`
- Qué hacer si el máximo número de API búsquedas permitido es superadas? False = Hacer nada (continuar procesando) [Predefinido]; True = Marcar/bloquear el archivo.

##### "cache_time" `[int]`
- Por cuánto tiempo (en segundos) debe los resultados de las API búsquedas ser almacenan en caché? Predefinido es 3600 segundos (1 horas).

#### "legal" (Categoría)
Configuración para requisitos legales.

##### "pseudonymise_ip_addresses" `[bool]`
- ¿Seudonimizar las direcciones IP cuando al escribir archivos de registro? True = Sí [Predefinido]; False = No.

##### "privacy_policy" `[string]`
- La dirección de una política de privacidad relevante que se mostrará en el pie de página de cualquier página generada. Especificar una URL, o dejar en blanco para desactivar.

#### "supplementary_cache_options" (Categoría)
Opciones de caché suplementarias. Nota: Cambiar estos valores puede potencialmente cerrar la sesión.

##### "prefix" `[string]`
- El valor especificado aquí se antepondrá a las claves de todas las entradas de la caché. Predefinido = "phpMussel_". Cuando existen varias instalaciones en el mismo servidor, esto puede ser útil para mantener sus cachés separados entre sí.

##### "enable_apcu" `[bool]`
- Especifica si se intenta utilizar APCu para el almacenamiento en caché. Predefinido = True.

##### "enable_memcached" `[bool]`
- Especifica si se intenta utilizar Memcached para el almacenamiento en caché. Predefinido = False.

##### "enable_redis" `[bool]`
- Especifica si se intenta utilizar Redis para el almacenamiento en caché. Predefinido = False.

##### "enable_pdo" `[bool]`
- Especifica si se intenta utilizar PDO para el almacenamiento en caché. Predefinido = False.

##### "memcached_host" `[string]`
- Valor del host de Memcached. Predefinido = localhost.

##### "memcached_port" `[int]`
- Valor del puerto de Memcached. Predefinido = "11211".

##### "redis_host" `[string]`
- Valor del host de Redis. Predefinido = localhost.

##### "redis_port" `[int]`
- Valor del puerto de Redis. Predefinido = "6379".

##### "redis_timeout" `[float]`
- Valor del tiempo de espera de Redis. Predefinido = "2.5".

##### "redis_database_number" `[int]`
- Número de base de datos de Redis. Predefinido = 0. Nota: No se pueden utilizar valores distintos de 0 con Redis Cluster.

##### "pdo_dsn" `[string]`
- Valor del DSN de PDO. Predefinido = "mysql:dbname=phpmussel;host=localhost;port=3306".

__FAQ.__ *<a href="https://github.com/phpMussel/Docs/blob/master/readme.es.md#user-content-HOW_TO_USE_PDO" hreflang="es-ES">¿Qué es un "PDO DSN"? Cómo puedo usar PDO con phpMussel?</a>*

##### "pdo_username" `[string]`
- Nombre del usuario de PDO.

##### "pdo_password" `[string]`
- Contraseña de PDO.

#### "frontend" (Categoría)
Configuración para el front-end.

##### "frontend_log" `[string]`
- Archivo para registrar intentos de login al front-end. Especificar el nombre del archivo, o dejar en blanco para desactivar.

Consejo útil: Puede adjuntar información de fecha/hora a los nombres de los archivos de registro utilizando marcadores de posición de formato de hora. Los marcadores de posición de formato de hora disponibles se muestran en <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "max_login_attempts" `[int]`
- Número máximo de intentos de login al front-end. Predefinido = 5.

##### "numbers" `[string]`
- ¿Cómo prefieres los números que se muestran? Seleccione el ejemplo que le parezca más correcto.

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
- Define qué algoritmo utilizar para todas las contraseñas y sesiones en el futuro.

```
default_algo
├─PASSWORD_DEFAULT ("PASSWORD_DEFAULT")
├─PASSWORD_BCRYPT ("PASSWORD_BCRYPT")
├─PASSWORD_ARGON2I ("PASSWORD_ARGON2I")
└─PASSWORD_ARGON2ID ("PASSWORD_ARGON2ID (PHP >= 7.3.0)")
```

##### "theme" `[string]`
- El tema a utilizar para el front-end.

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
└─…Otro
```

##### "theme_mode" `[string]`
- El modo para el tema a utilizar para el front-end.

```
theme_mode
├─normal ("Normal")
└─inverted ("Invertido")
```

##### "magnification" `[float]`
- Ampliación de fuente. Predefinido = 1.

##### "custom_header" `[string]`
- Insertado como HTML al principio de todas las páginas del front-end. Esto podría ser útil en caso de que desee incluir un logotipo de sitio web, un encabezado personalizado, scripts, o similar en todas dichas páginas.

##### "custom_footer" `[string]`
- Insertado como HTML al final de todas las páginas del front-end. Esto podría ser útil en caso de que desee incluir un aviso legal, enlace de contacto, información comercial, o similar en todas dichas páginas.

#### "web" (Categoría)
Configuración para el controlador de subidas.

##### "uploads_log" `[string]`
- Donde se deben registrar todas las subidas bloqueadas. Especifique un archivo nombre, o dejar en blanco para desactivar.

Consejo útil: Puede adjuntar información de fecha/hora a los nombres de los archivos de registro utilizando marcadores de posición de formato de hora. Los marcadores de posición de formato de hora disponibles se muestran en <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "forbid_on_block" `[bool]`
- ¿Debería phpMussel enviar 403 header con la bloqueados archivos subidos mensaje, o quedarse con los usual 200 OK? False = No (200); True = Sí (403) [Predefinido].

##### "unsupported_media_type_header" `[bool]`
- ¿Debería phpMussel enviar 415 header cuando las cargas están bloqueadas debido a tipos de archivos en la lista negra? Cuando es true, esta configuración reemplaza a `forbid_on_block`. False = No [Predefinido]; True = Sí.

##### "max_uploads" `[int]`
- Máximo permitido número de archivos para escanear durante archivo subido escaneo antes de abortando la escaneo e informando al usuario están subir demasiado simultáneamente! Proporciona protección contra un teórico ataque por lo cual un atacante intenta DDoS su sistema o CMS por sobrecargando phpMussel para ralentizar el proceso de PHP a niveles inoperables. Recomendado: 10. Es posible que desee aumentar o reducir este número dependiendo de la velocidad de su hardware. Notar que este número no tiene en cuenta o incluir el contenidos de compactados archivos.

##### "ignore_upload_errors" `[bool]`
- Esta directiva, en general, debe ser desactivado, a menos que se requiere para la correcta funcionalidad de phpMussel en su específico sistema. Normalmente, cuando está desactivado, cuando phpMussel detecta la presencia de elementos en la `$_FILES` array(), intentará iniciar un escaneo de los archivos que esos elementos representan, y, si esos elementos están blanco o vacío, phpMussel devolverá un mensaje de error. Este es el comportamiento natural para phpMussel. Pero, para algunos CMS, vacíos elementos en `$_FILES` puede ocurrir como resultado del comportamiento natural de los CMS, o errores pueden ser reportados cuando no existe ninguna, en cuyo caso, el comportamiento natural para phpMussel será interfiriendo con el comportamiento natural de los CMS. Si tal situación ocurre para usted, activando esta opción instruirá phpMussel no intentar iniciar un escaneo para tales vacíos elementos, ignorarlos cuando encontrado y no devuelva cualquier relacionado mensaje de error, así permitiendo la continuación de la página cargando. False = DESACTIVADO; True = ACTIVADO.

##### "theme" `[string]`
- El tema a utilizar para los eventos de bloque.

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
└─…Otro
```

##### "theme_mode" `[string]`
- El modo para el tema a utilizar para los eventos de bloque.

```
theme_mode
├─normal ("Normal")
└─inverted ("Invertido")
```

##### "magnification" `[float]`
- Ampliación de fuente. Predefinido = 1.

##### "custom_header" `[string]`
- Insertado como HTML al principio de todas las páginas "subida denegada". Esto podría ser útil en caso de que desee incluir un logotipo de sitio web, un encabezado personalizado, scripts, o similar en todas dichas páginas.

##### "custom_footer" `[string]`
- Insertado como HTML al final de todas las páginas "subida denegada". Esto podría ser útil en caso de que desee incluir un aviso legal, enlace de contacto, información comercial, o similar en todas dichas páginas.

#### "phpmailer" (Categoría)
Configuración para PHPMailer (se utiliza para la autenticación de dos factores y para notificaciones por correo electrónico).

##### "event_log" `[string]`
- Un archivo para registrar todos los eventos en relación con PHPMailer. Especificar el nombre del archivo, o dejar en blanco para desactivar.

Consejo útil: Puede adjuntar información de fecha/hora a los nombres de los archivos de registro utilizando marcadores de posición de formato de hora. Los marcadores de posición de formato de hora disponibles se muestran en <a onclick="javascript:toggleconfigNav('coreRow','coreShowLink')" href="#config_core_time_format">`core➡time_format`</a>.

##### "enable_two_factor" `[bool]`
- Esta directiva determina si se debe usar 2FA para las cuentas del front-end.

##### "enable_notifications" `[string]`
- Si desea recibir una notificación por correo electrónico cuando se bloquea una subida, especifique la dirección de correo electrónico del destinatario aquí.

##### "skip_auth_process" `[bool]`
- Establecer esta directiva en `true` indica a PHPMailer que omita el proceso de autenticación normal que normalmente se produce cuando se envía un correo electrónico a través de SMTP. Esto debe evitarse, ya que omitir este proceso puede exponer el correo electrónico saliente a ataques MITM, pero puede ser necesario en los casos en que este proceso impida que PHPMailer se conecte a un servidor SMTP.

##### "host" `[string]`
- El host SMTP para usar para el correo electrónico saliente.

##### "port" `[int]`
- El número de puerto a usar para el correo electrónico saliente. Predefinido = 587.

##### "smtp_secure" `[string]`
- El protocolo a usar cuando se envía un correo electrónico a través de SMTP (TLS o SSL).

```
smtp_secure
├─default ("-")
├─tls ("TLS")
└─ssl ("SSL")
```

##### "smtp_auth" `[bool]`
- Esta directiva determina si autenticar sesiones SMTP (generalmente debería dejarse solo).

##### "username" `[string]`
- El nombre de usuario a usar cuando se envía un correo electrónico a través de SMTP.

##### "password" `[string]`
- La contraseña a usar cuando se envía un correo electrónico a través de SMTP.

##### "set_from_address" `[string]`
- La dirección del remitente para citar cuando se envía un correo electrónico a través de SMTP.

##### "set_from_name" `[string]`
- El nombre del remitente para citar cuando se envía un correo electrónico a través de SMTP.

##### "add_reply_to_address" `[string]`
- La dirección de la respuesta para citar cuando se envía un correo electrónico a través de SMTP.

##### "add_reply_to_name" `[string]`
- El nombre de la respuesta para citar cuando se envía un correo electrónico a través de SMTP.

---


### 6. <a name="SECTION6"></a>FORMATOS DE FIRMAS

*Ver también:*
- *[¿Qué es una "firma"?](#user-content-WHAT_IS_A_SIGNATURE)*

Los primeros 9 bytes `[x0-x8]` de un archivo de firmas para phpMussel son `phpMussel`, y actuar como un "número mágico" (magic number), para identificarlos como archivos de firmas (esto ayuda a evitar que phpMussel accidentalmente intente utilizar archivos que no son archivos de firmas). El siguiente byte `[x9]` identifica el tipo de archivo de firma, que phpMussel debe conocer para poder interpretar correctamente el archivo de firmas. Se reconocen los siguientes tipos de archivos de firmas:

Tipo | Byte | Descripción
---|---|---
`General_Command_Detections` | `0?` | Para archivos de firmas que usan CSV (valores separados por coma). Los valores (firmas) son cadenas codificadas hexadecimal para buscar dentro de los archivos. Las firmas aquí no tienen nombres ni otros detalles (sólo la cadena que se va a detectar).
`Filename` | `1?` | Para firmas de nombre de archivo.
`Hash` | `2?` | Para firmas hash.
`Standard` | `3?` | Para archivos de firmas que trabajan directamente con el contenido del archivos.
`Standard_RegEx` | `4?` | Para archivos de firmas que trabajan directamente con el contenido del archivos. Las firmas pueden contener expresiones regulares.
`Normalised` | `5?` | Para archivos de firmas que funcionan con el contenido de archivos normalizados ANSI.
`Normalised_RegEx` | `6?` | Para archivos de firmas que funcionan con el contenido de archivos normalizados ANSI. Las firmas pueden contener expresiones regulares.
`HTML` | `7?` | Para archivos de firmas que funcionan con el contenido de archivos normalizados HTML.
`HTML_RegEx` | `8?` | Para archivos de firmas que funcionan con el contenido de archivos normalizados HTML. Las firmas pueden contener expresiones regulares.
`PE_Extended` | `9?` | Para archivos de firmas que trabajan con metadatos PE (distintos de los metadatos PE seccionales).
`PE_Sectional` | `A?` | Para archivos de firmas que trabajan con metadatos PE seccionales.
`Complex_Extended` | `B?` | Para archivos de firmas que trabajan con varias reglas basadas en metadatos extendidos generados por phpMussel.
`URL_Scanner` | `C?` | Para archivos de firmas que trabajan con URLs.

El siguiente byte `[x10]` es una nueva línea `[0A]`, y concluye el encabezado del archivo de firmas de phpMussel.

Cada línea después de que no está vacía es una firma o regla. Cada firma o regla ocupa una línea. Los formatos de firmas soportados se describen a continuación.

#### *FIRMAS BASADAS EN LAS NOMBRES DEL ARCHIVOS*
Todas firmas basadas en las nombres del archivos seguir el formato:

`NOMBRE:FNRX`

Donde NOMBRE es el nombre a citar para esa firma y FNRX es la regular expresión para cotejar nombres de archivos (sin codificar) con.

#### *HASH FIRMAS*
Todos HASH firmas seguir el formato:

`HASH:TAMAÑO:NOMBRE`

Donde HASH es el hash (usualmente MD5) de un entero archivo, TAMAÑO es el total tamaño de eso archivo y NOMBRE es el nombre a citar para esa firma.

#### *PE SECCIÓNAL FIRMAS*
Todos PE Secciónal firmas seguir el formato:

`TAMAÑO:HASH:NOMBRE`

Donde HASH es el hash MD5 de una sección del PE archivo, TAMAÑO es el total tamaño de esa sección y NOMBRE es el nombre a citar para esa firma.

#### *PE EXTENDIDAS FIRMAS*
Todos PE extendidas firmas seguir el formato:

`$VAR:HASH:TAMAÑO:NOMBRE`

Donde $VAR es el nombre de la PE variable para comprobar contra, HASH es el hash MD5 de esa variable, TAMAÑO es el total tamaño de esa variable y NOMBRE es el nombre de citar para esa firma.

#### *COMPLEJOS EXTENDIDAS FIRMAS*
Complejos extendidas firmas son bastante diferentes a los otros tipos de firmas posibles con phpMussel, en que qué ellos son cotejando contra se especificado por las firmas ellos mismos y que ellos pueden cotejar contra múltiples criterios. La cotejar criterios están delimitados por ";" y la cotejar tipo y cotejar datos de cada cotejar criterio es delimitado por ":" como tal que formato para estas firmas tiene tendencia a aparecer como:

`$variable1:SOMEDATA;$variable2:SOMEDATA;FirmaNombre`

#### *TODO LO DEMÁS*
Todas las demás firmas seguir el formato:

`NOMBRE:HEX:DESDE:PARA`

Donde NOMBRE es el nombre a citar para esa firma y HEX es un hexadecimal codificado segmento del archivo propuesto para ser comprobado por la firma dado. DESDE y PARA son opcionales parámetros, indicando desde cual y para cual posiciones en los datos de origen a cotejar contra.

#### *REGEX (REGULAR EXPRESSIONS)*
Cualquier forma de regex entendido y correctamente procesado por PHP también debe entenderse y procesado correctamente por phpMussel y sus firmas. Pero, yo sugeriría tomar mucho cuidado cuando escribiendo nuevas firmas basado en regex, porque, si no estás del todo seguro de lo que estás haciendo, puede haber altamente irregulares e/o inesperados resultados. Mirar el código fuente para phpMussel si no estás del todo seguro sobre el contexto de que las regex declaraciones son procesado. También, recordar que todos los patrones (con excepción para nombre de archivo, compactado archivo metadato y MD5 patrones) debe ser hexadecimal codificado (con excepción de la patrón sintaxis)!

---


### 7. <a name="SECTION7"></a>CONOCIDOS PROBLEMAS DE COMPATIBILIDAD

#### ANTI-VIRUS SOFTWARE COMPATIBILIDAD

Se sabe que los problemas de compatibilidad entre phpMussel y algunos proveedores de antivirus ocurren a veces en el pasado, así que cada pocos meses (más o menos), verifico las últimas versiones disponibles de la base de código phpMussel contra Virus Total, para ver si hay algún problema allí. Cuando se informan problemas allí, enumero los problemas informados aquí, en la documentación.

Cuando verifiqué más recientemente (2022.05.12), no se informaron problemas.

No verifico los archivos de firma, la documentación u otro contenido periférico. Los archivos de firma siempre causan falsos positivos cuando otras soluciones antivirus los detectan. Por lo tanto, recomendaría encarecidamente que, si planea instalar phpMussel en una máquina donde ya existe otra solución antivirus, incluya en la lista blanca los archivos de firma de phpMussel.

*Ver también: [Gráficos de Compatibilidad](https://maikuolan.github.io/Compatibility-Charts/).*

---


### 8. <a name="SECTION8"></a>PREGUNTAS MÁS FRECUENTES (FAQ)

- [¿Qué es una "firma"?](#user-content-WHAT_IS_A_SIGNATURE)
- [¿Qué es un "falso positivo"?](#user-content-WHAT_IS_A_FALSE_POSITIVE)
- [¿Con qué frecuencia se actualizan las firmas?](#user-content-SIGNATURE_UPDATE_FREQUENCY)
- [¡He encontrado un problema mientras uso phpMussel y no sé qué hacer al respecto! ¡Por favor ayuda!](#user-content-ENCOUNTERED_PROBLEM_WHAT_TO_DO)
- [Quiero usar phpMussel v3 con una versión de PHP más vieja que 7.2.0; ¿Puede usted ayudar?](#user-content-MINIMUM_PHP_VERSION_V3)
- [¿Puedo usar una sola instalación de phpMussel para proteger múltiples dominios?](#user-content-PROTECT_MULTIPLE_DOMAINS)
- [No quiero molestarme con la instalación de este y conseguir que funcione con mi sitio web; ¿Puedo pagarte por hacer todo por mí?](#user-content-PAY_YOU_TO_DO_IT)
- [¿Puedo contratar a usted oa cualquiera de los desarrolladores de este proyecto para el trabajo privado?](#user-content-HIRE_FOR_PRIVATE_WORK)
- [Necesito modificaciones especiales, personalizaciones, etc; ¿Puede usted ayudar?](#user-content-SPECIALIST_MODIFICATIONS)
- [Soy desarrollador, diseñador de sitios web o programador. ¿Puedo aceptar u ofrecer trabajos relacionados con este proyecto?](#user-content-ACCEPT_OR_OFFER_WORK)
- [Quiero contribuir al proyecto; ¿Puedo hacer esto?](#user-content-WANT_TO_CONTRIBUTE)
- [¿Cómo acceder a detalles específicos sobre los archivos cuando se escanean?](#user-content-SCAN_DEBUGGING)
- [Listas negras – Listas blancas – Listas grises – ¿Qué son y cómo los uso?](#user-content-BLACK_WHITE_GREY)
- [¿Qué es un "PDO DSN"? Cómo puedo usar PDO con phpMussel?](#user-content-HOW_TO_USE_PDO)
- [Mi recurso de subido es asíncrono (por ejemplo, usa ajax, ajaj, json, etc). No veo ningún mensaje especial o advertencia cuando se bloquea una subida. ¿Que esta pasando?](#user-content-AJAX_AJAJ_JSON)
- [¿Puede phpMussel detectar EICAR?](#user-content-DETECT_EICAR)

#### <a name="WHAT_IS_A_SIGNATURE"></a>¿Qué es una "firma"?

En el contexto de phpMussel, una "firma" se refiere a datos que actúan como un indicador/identificador para algo específico que estamos buscando, generalmente en la forma de algún segmento muy pequeño, distinto e inocuo de algo más grande y de otra manera nocivo, como un virus o un troyano, o en la forma de una suma de comprobación de archivo, hash u otro indicador de identificación similar, and usually includes a label, y generalmente incluye una etiqueta, y algunos otros datos para ayudar a proporcionar algún contexto adicional que puede ser utilizado por phpMussel para determinar la mejor manera de proceder cuando se encuentra con lo que estamos buscando.

#### <a name="WHAT_IS_A_FALSE_POSITIVE"></a>¿Qué es un "falso positivo"?

El término "falso positivo" (*alternativamente: "error falso positivo"; "falsa alarma"*; Inglés: *false positive*; *false positive error*; *false alarm*), descrito muy simplemente, y en un contexto generalizado, se utiliza cuando se prueba para una condición, para referirse a los resultados de esa prueba, cuando los resultados son positivos (es decir, la condición se determina como "positivo", o "verdadero"), pero se espera que sean (o debería haber sido) negativo (es decir, la condición, en realidad, es "negativo", o "falso"). Un "falso positivo" podría considerarse análoga a "llorando lobo" (donde la condición que se está probando es si hay un lobo cerca de la manada, la condición es "falso" en el que no hay lobo cerca de la manada, y la condición se reporta como "positiva" por el pastor a modo de llamando "lobo, lobo"), o análogos a situaciones en las pruebas médicas donde un paciente es diagnosticado con alguna enfermedad o dolencia, cuando en realidad, no tienen tal enfermedad o dolencia.

Algunos términos relacionados para cuando se prueba para un condición son "verdadero positivo", "verdadero negativo" y "falso negativo". Un "verdadero positivo" se refiere a cuando los resultados de la prueba y el estado real de la condición son ambas verdaderas (o "positivas"), y un "verdadero negativo" se refiere a cuando los resultados de la prueba y el estado real de la condición son ambas falsas (o "negativas"); Un "verdadero positivo" o "negativo verdadero" se considera que es una "inferencia correcta". La antítesis de un "falso positivo" es un "falso negativo"; Un "falso negativo" se refiere a cuando los resultados de la prueba son negativos (es decir, la condición se determina como "negativo", o "falso"), pero se espera que sean (o debería haber sido) positivo (es decir, la condición, en realidad, es "positivo", o "verdadero").

En el contexto de phpMussel, estos términos se refieren a las firmas de phpMussel y los archivos que se bloquean. Cuando phpMussel se bloquean un archivo debido al mal, obsoleta o firmas incorrectas, pero no debería haber hecho, o cuando lo hace por las razones equivocadas, nos referimos a este evento como un "falso positivo". Cuando phpMussel no puede bloquear un archivo que debería haber sido bloqueado, debido a las amenazas imprevistas, firmas perdidas o déficit en sus firmas, nos referimos a este evento como una "detección perdida" o "missed detection" (que es análogo a un "falso negativo").

Esto se puede resumir en la siguiente tabla:

&nbsp; | phpMussel *NO* debe bloquear un archivo | phpMussel *DEBE* bloquear un archivo
---|---|---
phpMussel *NO* hace bloquear un archivo | Verdadero negativo (inferencia correcta) | Detección perdida (análogo a un falso negativo)
phpMussel *HACE* bloquear un archivo | __Falso positivo__ | Verdadero positivo (inferencia correcta)

#### <a name="SIGNATURE_UPDATE_FREQUENCY"></a>¿Con qué frecuencia se actualizan las firmas?

La frecuencia de actualización varía dependiendo de los archivos de firma en cuestión. Todos los mantenedores de los archivos de firma para phpMussel generalmente tratan de mantener sus firmas tan actualizadas como sea posible, pero como todos nosotros tenemos varios otros compromisos, nuestras vidas fuera del proyecto, y como ninguno de nosotros es financieramente compensado (o pagado) por nuestros esfuerzos en el proyecto, no se puede garantizar un calendario de actualización preciso. Generalmente, las firmas se actualizan siempre que haya suficiente tiempo para actualizarlas. La ayuda siempre es apreciada si usted está dispuesto a ofrecer cualquiera.

#### <a name="ENCOUNTERED_PROBLEM_WHAT_TO_DO"></a>¡He encontrado un problema mientras uso phpMussel y no sé qué hacer al respecto! ¡Por favor ayuda!

- ¿Está utilizando la última versión del software? ¿Está utilizando las últimas versiones de sus archivos de firma? Si la respuesta a cualquiera de estas dos preguntas es no, intente actualizar todo primero, y compruebe si el problema persiste. Si persiste, continúe leyendo.
- ¿Ha revisado toda la documentación? Si no, por favor, hágalo. Si el problema no puede resolverse utilizando la documentación, continúe leyendo.
- ¿Ha revisado la **[página de issues](https://github.com/phpMussel/phpMussel/issues)**, para ver si el problema ha sido mencionado antes? Si se ha mencionado antes, compruebe si se han proporcionado sugerencias, ideas y/o soluciones, y siga según sea necesario para tratar de resolver el problema.
- Si el problema persiste, solicite ayuda al crear un nuevo issue en la página de issues.

#### <a name="MINIMUM_PHP_VERSION_V3"></a>Quiero usar phpMussel v3 con una versión de PHP más vieja que 7.2.0; ¿Puede usted ayudar?

No. PHP≥7.2 es un requisito mínimo para phpMussel v3.

*Ver también: [Gráficos de Compatibilidad](https://maikuolan.github.io/Compatibility-Charts/).*

#### <a name="PROTECT_MULTIPLE_DOMAINS"></a>¿Puedo usar una sola instalación de phpMussel para proteger múltiples dominios?

Sí.

#### <a name="PAY_YOU_TO_DO_IT"></a>No quiero molestarme con la instalación de este y conseguir que funcione con mi sitio web; ¿Puedo pagarte por hacer todo por mí?

Quizás. Esto se considera caso por caso. Háganos saber lo que necesita, lo que está ofreciendo y le diremos si podemos ayudar.

#### <a name="HIRE_FOR_PRIVATE_WORK"></a>¿Puedo contratar a usted oa cualquiera de los desarrolladores de este proyecto para el trabajo privado?

*Ver la respuesta anterior.*

#### <a name="SPECIALIST_MODIFICATIONS"></a>Necesito modificaciones especiales, personalizaciones, etc; ¿Puede usted ayudar?

*Ver la respuesta anterior.*

#### <a name="ACCEPT_OR_OFFER_WORK"></a>Soy desarrollador, diseñador de sitios web o programador. ¿Puedo aceptar u ofrecer trabajos relacionados con este proyecto?

Sí. Nuestra licencia no lo prohíbe.

#### <a name="WANT_TO_CONTRIBUTE"></a>Quiero contribuir al proyecto; ¿Puedo hacer esto?

Sí. Las contribuciones al proyecto son muy bienvenidas. Consulte "CONTRIBUTING.md" para obtener más información.

#### <a name="SCAN_DEBUGGING"></a>¿Cómo acceder a detalles específicos sobre los archivos cuando se escanean?

Puede acceder a detalles específicos sobre los archivos cuando se analizan por medio de asignando una matriz para utilizarla con este fin antes de instruir a phpMussel para que los escanee.

En el ejemplo siguiente, `$Foo` está asignado para este propósito. Después de escanear `/ruta/de/archivo/...`, `$Foo` contendrá información detallada sobre los archivos contenidos en `/ruta/de/archivo/...`.

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);

$Scanner->setScanDebugArray($Foo);

$Results = $Scanner->scan('/ruta/de/archivo/...');

var_dump($Foo);
```

La matriz es una matriz multidimensional que consta de elementos que representan cada archivo que se está escaneando y subelementos que representan los detalles sobre estos archivos. Estos subelementos son los siguientes:

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

*† - No se proporciona con resultados almacenados en caché (sólo se proporcionan para los nuevos resultados de escaneo).*

*‡ - Sólo se proporciona al escanear archivos PE.*

Opcionalmente, esta matriz se puede destruir utilizando lo siguiente:

```PHP
$Scanner->destroyScanDebugArray($Foo);
```

#### <a name="BLACK_WHITE_GREY"></a>Listas negras – Listas blancas – Listas grises – ¿Qué son y cómo los uso?

Los términos transmiten diferentes significados en diferentes contextos. En phpMussel, hay tres contextos en los que se usan estos términos: Respuesta del tamaño de archivo, respuesta del tipo de archivo, y la lista gris de firmas.

Para lograr un resultado deseado con un costo mínimo de procesamiento, hay algunas cosas simples que phpMussel puede verificar antes de escanear archivos, como el tamaño, el nombre y la extensión de un archivo. Por ejemplo; Si un archivo es demasiado grande o si su extensión indica un tipo de archivo que de todos modos no queremos permitir en nuestros sitios web, podemos marcar el archivo inmediatamente y no es necesario que lo analice.

La respuesta del tamaño de archivo es la forma en que phpMussel responde cuando un archivo excede un límite especificado. Aunque no hay listas reales, un archivo se puede considerar efectivamente incluido en la lista negra, en la lista blanca o en la lista gris, según su tamaño. Existen dos directivas de configuración opcionales independientes para especificar un límite y la respuesta deseada, respectivamente.

La respuesta del tipo de archivo es la forma en que phpMussel responde a la extensión del archivo. Existen tres directivas de configuración opcionales independientes para especificar explícitamente qué extensiones deben incluirse en la lista negra, en la lista blanca, o en la lista gris. Un archivo puede considerarse efectivamente incluido en la lista negra, en la lista blanca, o en la lista gris si su extensión coincide con cualquiera de las extensiones especificadas, respectivamente.

En estos dos contextos, al ser incluido en la lista blanca significa que no debe escanearse ni marcarse; estar en la lista negra significa que debe estar marcado (y por lo tanto no es necesario escanearlo); y estar en la lista gris significa que se requiere un análisis adicional para determinar si debemos marcarlo (es decir, debe escanearse).

La lista gris de firmas es una lista de firmas que esencialmente deben ignorarse (esto se menciona brevemente anteriormente en la documentación). Cuando se desencadena una firma en la lista gris de la firma, phpMussel continúa trabajando a través de sus firmas y no toma ninguna medida particular con respecto a la firma desencadenada. No hay una lista negra de firmas, porque el comportamiento implícito es un comportamiento normal para las firmas desencadenadas de todos modos, y no hay una lista blanca de firmas, porque el comportamiento implícito no tendría sentido considerando el funcionamiento normal de phpMussel y las capacidades que ya posee.

La lista gris de firmas es útil si necesita resolver problemas causados por una firma particular sin deshabilitar o desinstalar todo el archivo de firmas.

#### <a name="HOW_TO_USE_PDO"></a>¿Qué es un "PDO DSN"? Cómo puedo usar PDO con phpMussel?

"PDO" es un acrónimo de "[PHP Data Objects](https://www.php.net/manual/es/intro.pdo.php)" (objetos de datos PHP). Proporciona una interfaz para PHP para poder conectarse a algunos sistemas de bases de datos comúnmente utilizados por varias aplicaciones PHP.

"DSN" es un acrónimo de "[data source name](https://es.wikipedia.org/wiki/Data_Source_Name)" (nombre de fuente de datos). El "PDO DSN" describe a PDO cómo debe conectarse a una base de datos.

phpMussel ofrece la opción de utilizar PDO para fines de almacenamiento en caché. Para que esto funcione correctamente, deberá configurar phpMussel en consecuencia, habilitando PDO, crear una nueva base de datos para que phpMussel la use (si aún no tiene en mente una base de datos para que phpMussel la use) y crear una nueva tabla en su base de datos de acuerdo con la estructura que se describe a continuación.

Cuando una conexión de base de datos se realiza correctamente, pero la tabla necesaria no existe, intentará crearla automáticamente. Pero, este comportamiento no se ha probado exhaustivamente y no se puede garantizar el éxito.

Esto, por supuesto, solo se aplica si realmente desea que phpMussel use PDO. Si está lo suficientemente contento de que phpMussel use el almacenamiento en caché de archivos planos (según su configuración predeterminada), o cualquiera de las otras opciones de almacenamiento en caché proporcionadas, no tendrá que preocuparse de configurar bases de datos, tablas, etc.

La estructura que se describe a continuación usa "phpmussel" como nombre de la base de datos, pero puede usar el nombre que desee para su base de datos, siempre que ese mismo nombre se replique en su configuración DSN.

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

La directiva de configuración `pdo_dsn` de phpMussel debe configurarse como se describe a continuación.

```
Dependiendo de qué controlador de base de datos se use...
├─4d (¡Advertencia: Experimental, no probado, no recomendado!)
│ │
│ │         ╔═══════╗
│ └─4D:host=localhost;charset=UTF-8
│           ╚╤══════╝
│            └El host con el que conectarse para encontrar la base de datos.
├─cubrid
│ │
│ │             ╔═══════╗      ╔═══╗        ╔═════╗
│ └─cubrid:host=localhost;port=33000;dbname=example
│               ╚╤══════╝      ╚╤══╝        ╚╤════╝
│                │              │            └El nombre de la base de datos a
│                │              │             usar.
│                │              │
│                │              └El número de puerto para conectarse al host.
│                │
│                └El host con el que conectarse para encontrar la base de
│                 datos.
├─dblib
│ │
│ │ ╔═══╗      ╔═══════╗        ╔═════╗
│ └─dblib:host=localhost;dbname=example
│   ╚╤══╝      ╚╤══════╝        ╚╤════╝
│    │          │                └El nombre de la base de datos a usar.
│    │          │
│    │          └El host con el que conectarse para encontrar la base de datos.
│    │
│    └Valores posibles: "mssql", "sybase", "dblib".
├─firebird
│ │
│ │                 ╔═══════════════════╗
│ └─firebird:dbname=/path/to/database.fdb
│                   ╚╤══════════════════╝
│                    ├Puede ser una ruta a un archivo de base de datos local.
│                    │
│                    ├Se puede conectar con un host y número de puerto.
│                    │
│                    └Debe consultar la documentación de Firebird si desea usar
│                     esto.
├─ibm
│ │
│ │         ╔═════╗
│ └─ibm:DSN=example
│           ╚╤════╝
│            └Con qué base de datos catalogada para conectarse.
├─informix
│ │
│ │              ╔═════╗
│ └─informix:DSN=example
│                ╚╤════╝
│                 └Con qué base de datos catalogada para conectarse.
├─mysql (¡Lo más recomendado!)
│ │
│ │              ╔═════╗      ╔═══════╗      ╔══╗
│ └─mysql:dbname=example;host=localhost;port=3306
│                ╚╤════╝      ╚╤══════╝      ╚╤═╝
│                 │            │              └El número de puerto para
│                 │            │               conectarse al host.
│                 │            │
│                 │            └El host con el que conectarse para encontrar la
│                 │             base de datos.
│                 │
│                 └El nombre de la base de datos a usar.
├─oci
│ │
│ │            ╔═════╗
│ └─oci:dbname=example
│              ╚╤════╝
│               ├Puede hacer referencia a la base de datos catalogada
│               │específica.
│               │
│               ├Se puede conectar con un host y número de puerto.
│               │
│               └Debe consultar la documentación de Oracle si desea usar esto.
├─odbc
│ │
│ │      ╔═════╗
│ └─odbc:example
│        ╚╤════╝
│         ├Puede hacer referencia a la base de datos catalogada específica.
│         │
│         ├Se puede conectar con un host y número de puerto.
│         │
│         └Debe consultar la documentación de ODBC/DB2 si desea usar esto.
├─pgsql
│ │
│ │            ╔═══════╗      ╔══╗        ╔═════╗
│ └─pgsql:host=localhost;port=5432;dbname=example
│              ╚╤══════╝      ╚╤═╝        ╚╤════╝
│               │              │           └El nombre de la base de datos a
│               │              │            usar.
│               │              │
│               │              └El número de puerto para conectarse al host.
│               │
│               └El host con el que conectarse para encontrar la base de datos.
├─sqlite
│ │
│ │        ╔════════╗
│ └─sqlite:example.db
│          ╚╤═══════╝
│           └La ruta al archivo de base de datos local a utilizar.
└─sqlsrv
  │
  │               ╔═══════╗ ╔══╗          ╔═════╗
  └─sqlsrv:Server=localhost,1521;Database=example
                  ╚╤══════╝ ╚╤═╝          ╚╤════╝
                   │         │             └El nombre de la base de datos a usar.
                   │         │
                   │         └El número de puerto para conectarse al host.
                   │
                   └El host con el que conectarse para encontrar la base de datos.
```

Si no está seguro de qué usar para una parte particular de su DSN, intenta ver primero si funciona como está, sin cambiar nada.

Tenga en cuenta que `pdo_username` y` pdo_password` deben coincidir con el nombre de usuario y la contraseña que eligió para su base de datos.

#### <a name="AJAX_AJAJ_JSON"></a>Mi recurso de subido es asíncrono (por ejemplo, usa ajax, ajaj, json, etc). No veo ningún mensaje especial o advertencia cuando se bloquea una subida. ¿Que esta pasando?

Esto es normal. La página estándar "Subida Denegada" de phpMussel se sirve como HTML, que debería ser suficiente para las solicitudes síncronas típicas, pero que probablemente no será suficiente si su instalación de subida espera algo más. Si su recurso de subido es asíncrono, o espera que un estado de subida se sirva asincrónicamente, hay algunas cosas que podría intentar hacer para que phpMussel satisfaga las necesidades de su recurso de subido.

1. Crear una plantilla de salida personalizada para servir algo que no sea HTML.
2. Crear un complemento personalizado para omitir por completo la página estándar "Subida Denegada" y para que el controlador de subida haga algo más cuando se bloquea una subida (hay algunos puntos en el código proporcionado por el controlador de subida que podrían ser útiles para esto).
3. Deshabilita el controlador de subida por completo y en su lugar solo llama a la API phpMussel desde tu recurso de subido.

#### <a name="DETECT_EICAR"></a>¿Puede phpMussel detectar EICAR?

Sí. Se incluye una firma para detectar EICAR en el "archivo de firma de expresiones regulares estándar de phpMussel" (`phpmussel_regex.db`). Siempre que ese archivo de firma esté instalado y activado, phpMussel debería poder detectar EICAR. Dado que la base de datos de ClamAV también incluye numerosas firmas específicamente para detectar EICAR, ClamAV puede detectar fácilmente EICAR, pero dado que phpMussel utiliza solo un subconjunto reducido de las firmas totales proporcionadas por ClamAV, es posible que por sí mismas no sean suficientes para que phpMussel detecte EICAR. La capacidad de detectarlo también puede depender de su configuración exacta.

---


### 9. <a name="SECTION9"></a>INFORMACIÓN LEGAL

#### 9.0 PREÁMBULO DE SECCIÓN

La intención de esta sección de la documentación es para describir posibles consideraciones legales con respecto al uso y la implementación del paquete, y para proporcionar cierta información básica relacionada. Esto puede ser importante para algunos usuarios como un medio para garantizar el cumplimiento de los requisitos legales que puedan existir en los países en los que operan, y algunos usuarios pueden necesitar ajustar las políticas de su sitio web de acuerdo con esta información.

Primero y ante todo, tenga en cuenta que yo (el autor del paquete) no soy un abogado, ni un profesional legal calificado de ningún tipo. Por lo tanto, no estoy legalmente calificado para brindar asesoramiento legal. Además, en algunos casos, los requisitos legales exactos pueden variar entre diferentes países y jurisdicciones, y estos diferentes requisitos legales pueden a veces entrar en conflicto (como, por ejemplo, en el caso de países que favorecen los [derechos de privacidad](https://es.wikipedia.org/wiki/Derecho_a_la_intimidad) y el [derecho a ser olvidado](https://es.wikipedia.org/wiki/Derecho_al_olvido), frente a los países que favorecen la [retención de datos extendida](https://es.wikipedia.org/wiki/Retenci%C3%B3n_de_datos_de_telecomunicaci%C3%B3n)). Considere también que el acceso al paquete no está restringido a países o jurisdicciones específicos, y por lo tanto, es probable que la base de usuarios del paquete sea geográficamente diversa. Considerados estos puntos, no estoy en condiciones de decir lo que significa ser "legalmente compatible" para todos los usuarios, en todos los aspectos. Sin embargo, espero que la información en este documento lo ayude a tomar una decisión sobre lo que debe hacer para cumplir con la ley en el contexto del paquete. Si tiene alguna duda o inquietud con respecto a la información aquí incluida, o si necesita ayuda y asesoramiento adicional desde una perspectiva legal, le recomiendo consultar a un profesional legal calificado.

#### 9.1 RESPONSABILIDAD

Según lo establecido por la licencia del paquete, el paquete se proporciona sin ninguna garantía. Esto incluye (pero no se limita a) todo el alcance de la responsabilidad. El paquete se le proporciona para su conveniencia, con la esperanza de que sea útil y le proporcionará algún beneficio. Pero, si usa o implementa el paquete, es su propia decisión. No está obligado a usar o implementar el paquete, pero cuando lo hace, usted es responsable de esa decisión. Ni yo ni ningún otro contribuyente del paquete somos legalmente responsables de las consecuencias de las decisiones que usted tome, independientemente de si son directas, indirectas, implícitas o de otro tipo.

#### 9.2 TERCEROS

Dependiendo de su configuración e implementación exactas, el paquete puede comunicarse y compartir información con terceros en algunos casos. Esta información puede definirse como "[información personal](https://es.wikipedia.org/wiki/Informaci%C3%B3n_personal)" (PII) en algunos contextos, en algunas jurisdicciones.

La forma en que esta información puede ser utilizada por estos terceros está sujeta a las diversas políticas establecidas por estos terceros y está fuera del alcance de esta documentación. Pero, en todos estos casos, se puede deshabilitar el intercambio de información con estos terceros. En todos estos casos, si elige habilitarlo, es su responsabilidad investigar cualquier inquietud que pueda tener con respecto a la privacidad, seguridad y uso de PII por parte de estos terceros. Si tiene alguna duda, o si no está satisfecho con la conducta de estos terceros en lo que respecta a PII, puede ser mejor desactivar el intercambio de información con estos terceros.

A los efectos de la transparencia, el tipo de información compartida, y con quién, se describe a continuación.

##### 9.2.1 ESCÁNER URL

Las URL que se encuentran dentro de las subidas de archivos se pueden compartir con la API de Google Safe Browsing, según cómo esté configurado el paquete. La API de Google Safe Browsing requiere claves API para funcionar correctamente y, por lo tanto, está desactivada de manera predeterminada.

*Directivas de configuración relevantes:*
- `urlscanner` -> `google_api_key`

##### 9.2.2 VIRUS TOTAL

Cuando phpMussel escanea una subida de archivo, los valores hash de esos archivos se pueden compartir con la API de Virus Total, según cómo esté configurado el paquete. Hay planes para poder compartir archivos completos en algún momento en el futuro también, pero esta función no es soportado por el paquete en este momento. La API de Virus Total requiere una clave API para funcionar correctamente y, por lo tanto, está desactivada de forma predeterminada.

La información (incluidos los archivos y los metadatos de archivos relacionados) compartida con Virus Total, también se puede compartir con sus socios, afiliados, y varios otros con fines de investigación. Esto se describe con más detalle en su política de privacidad.

*Ver: [Privacy Policy &ndash; VirusTotal](https://support.virustotal.com/hc/en-us/articles/115002168385-Privacy-Policy).*

*Directivas de configuración relevantes:*
- `virustotal` -> `vt_public_api_key`

#### 9.3 REGISTRO DE DATOS

El registro de datos es una parte importante de phpMussel por varias razones. Sin registro, puede ser difícil diagnosticar falsos positivos, determinar exactamente qué tan eficiente es el phpMussel en un contexto particular, y determinar dónde pueden encontrarse sus deficiencias, y qué cambios pueden requerirse en su configuración o firmas en consecuencia, para que continúe funcionando según lo previsto. En todo caso, el registro de datos puede no ser deseable para todos los usuarios, y sigue siendo totalmente opcional. En phpMussel, el registro de datos está deshabilitado de forma predeterminada. Para habilitarlo, phpMussel debe configurarse en consecuencia.

Además, si el registro de datos es legalmente permisible, y en la medida en que sea legalmente permisible (por ejemplo, los tipos de información que pueden registrarse, por cuánto tiempo, y en qué circunstancias), puede variar, dependiendo de la jurisdicción y del contexto donde se implemente el phpMussel (por ejemplo, ya sea que esté operando como individuo, como una entidad corporativa, y sea comercial o no comercial). Por lo tanto, puede serle útil leer atentamente esta sección.

Existen varios tipos de registro que phpMussel puede realizar. Los diferentes tipos de registro implican diferentes tipos de información, por diferentes razones.

##### 9.3.0 REGISTROS DEL ESCÁNER

Cuando está habilitado en la configuración del paquete, phpMussel guarda los registros de los archivos que escanea. Este tipo de registro está disponible en dos formatos diferentes:
- Archivos de registro legibles por humanos.
- Archivos de registro serializados.

Las entradas a un archivo de registro legible por humanos, normalmente se ve así (como un ejemplo):

```
Sun, 19 Jul 2020 13:33:31 +0800 Iniciado.
→ Comprobando "ascii_standard_testfile.txt".
─→ ¡Detectado phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
Sun, 19 Jul 2020 13:33:31 +0800 Terminado.
```

Una entrada del registros de escanea normalmente incluye la siguiente información:
- La fecha y hora en que se escaneó el archivo.
- El nombre del archivo escaneado.
- Qué se detectó en el archivo (si se detectó algo).

*Directivas de configuración relevantes:*
- `general` -> `scan_log`
- `general` -> `scan_log_serialized`

Cuando estas directivas se dejan vacías, este tipo de registro permanecerá desactivado.

##### 9.3.1 REGISTROS DE LAS SUBIDAS

Cuando está habilitado en la configuración del paquete, phpMussel guarda los registros de las subidas que se han bloqueado.

*Como ejemplo:*

```
Fecha: Sun, 19 Jul 2020 13:33:31 +0800
Dirección IP: 127.0.0.x
== Resultados de escaneo (por qué marcado) ==
¡Detectado phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
== Reconstrucción de firmas hash ==
dcacac499064454218823fbabff7e09b5b011c0c877ee6f215f35bffb195b6e9:654:ascii_standard_testfile.txt
En cuarentena como "1595142388-2e017ea9ac1478e45dc15794a1fc18c0.qfu".
```

Estas entradas de registro generalmente incluyen la siguiente información:
- La fecha y hora en que se bloqueó la subida.
- La dirección IP desde donde se originó la subida.
- La razón por la cual el archivo fue bloqueado (lo que se detectó).
- El nombre del archivo bloqueado.
- La suma de comprobación y el tamaño del archivo bloqueado.
- Si el archivo fue puesto en cuarentena y bajo qué nombre interno.

*Directivas de configuración relevantes:*
- `web` -> `uploads_log`

##### 9.3.2 REGISTROS DEL FRONT-END

Este tipo de registro relaciona los intentos de inicio de sesión del front-end, y ocurre solo cuando un usuario intenta iniciar sesión en el front-end (suponiendo que el acceso al front-end esté habilitado).

Una entrada de registro en el front-end contiene la dirección IP del usuario que intenta iniciar sesión, la fecha y la hora en que se produjo el intento, y los resultados del intento (inicio de sesión exitoso o fallido). Una entrada de registro del front-end generalmente se ve así (como un ejemplo):

```
x.x.x.x - Day, dd Mon 20xx hh:ii:ss +0000 - "admin" - Conectado.
```

*La directiva de configuración responsable del inicio de sesión es:*
- `general` -> `frontend_log`

##### 9.3.3 ROTACIÓN DE REGISTROS

Es posible que desee purgar los registros después de un período de tiempo, o posible la ley lo requiera (es decir, la cantidad de tiempo que está legalmente permitido para conservar los registros puede estar limitada por la ley). Puede lograr esto incluyendo marcadores de fecha/hora en los nombres de sus archivos de registro según lo especificado por la configuración de su paquete (por ejemplo, `{yyyy}-{mm}-{dd}.log`), y luego habilitar la rotación de registros (la rotación de registros le permite realizar alguna acción en los archivos de registro cuando se exceden los límites especificados).

Por ejemplo: Si se me exigiera legalmente que borrara los registros después de 30 días, podría especificar `{dd}.log` en los nombres de mis archivos de registro (`{dd}` representa días), establecer el valor de `log_rotation_limit` en 30, y establecer el valor de `log_rotation_action` en `Delete`.

Por el contrario, si está obligado a conservar registros por un período prolongado de tiempo, puede no utilizar la rotación de registros, o puede establecer el valor de `log_rotation_action` en `Archive`, para comprimir archivos de registro, lo que reduce la cantidad total de espacio en disco que ocupan.

*Directivas de configuración relevantes:*
- `general` -> `log_rotation_limit`
- `general` -> `log_rotation_action`

##### 9.3.4 TRUNCAMIENTO DE REGISTROS

También es posible truncar archivos de registro individuales cuando exceden un cierto tamaño, si esto es algo que podría necesitar o querer hacer.

*Directivas de configuración relevantes:*
- `general` -> `truncate`

##### 9.3.5 SEUDONIMIZACIÓN DE DIRECCIONES IP

Primeramente, si no está familiarizado con el término, "seudonimización" se refiere al procesamiento de datos personales como tal que ya no se puede identificar a ningún sujeto de datos específico sin información adicional, y siempre que dicha información adicional se mantenga por separado y esté sujeta a medidas técnicas y organizativas para garantizar que los datos personales no puedan identificarse a ninguna persona física.

Los siguientes recursos pueden ayudar a explicarlo con más detalle:
- [[confilegal.com] La importancia del seudonimización en el nuevo Reglamento de Protección de Datos](https://confilegal.com/20170129-la-importancia-del-seudonimizacion-en-el-nuevo-reglamento-de-proteccion-de-datos/)
- [[forlopd.es] ¿Cómo me protege la seudonimización?](https://www.forlopd.es/web/blog/index.php/seudonimizacion-y-proteccion-de-datos/)
- [[Wikipedia] Seudonimización](https://es.wikipedia.org/wiki/Seudonimizaci%C3%B3n)

En algunas circunstancias, se le puede ser legalmente requerido anonimizar o seudonimizar cualquier PII recopilada, procesada, o almacenada. Aunque este concepto ha existe desde hace bastante tiempo, GDPR/DSGVO menciona especialmente, y específicamente alienta "seudonimización".

phpMussel es capaz de seudonimizar las direcciones IP cuando las registra, si es algo que podría necesitar o querer hacer. Cuando phpMussel seudonimizar de direcciones IP, cuando se registra, el octeto final de las direcciones IPv4, y todo lo que ocurre después de la segunda parte de las direcciones IPv6 está representado por una "x" (redondeando efectivamente las direcciones IPv4 a la dirección inicial de la 24 subred en la que tienen en cuenta, y las direcciones IPv6 a la dirección inicial de la 32 subred en la que tienen en cuenta).

*Directivas de configuración relevantes:*
- `legal` -> `pseudonymise_ip_addresses`

##### 9.3.6 ESTADÍSTICA

phpMussel es opcionalmente capaz de rastrear estadísticas como el número total de archivos escaneados y bloqueados desde algún momento en particular. Esta característica está deshabilitada de manera predeterminada, pero se puede habilitar a través de la configuración del paquete. El tipo de información rastreada no debe considerarse como PII.

*Directivas de configuración relevantes:*
- `general` -> `statistics`

##### 9.3.7 ENCRIPTACIÓN

phpMussel no encripta su caché ni ninguna información de registro. [Encriptación](https://es.wikipedia.org/wiki/Cifrado_(criptograf%C3%ADa)) del caché y del registro se puede introducir en el futuro, pero no hay planes actuales para esto. Si le preocupa que terceros no autorizados accedan a partes de phpMussel que puedan contener PII o información confidencial, como su caché o registros, recomendaría que phpMussel no se instale en una ubicación de acceso público (por ejemplo, instale phpMussel fuera del directorio `public_html` o equivalente disponible para la mayoría de los servidores web estándar) y que los permisos apropiadamente restrictivos se apliquen para el directorio donde reside. Si eso no es suficiente para abordar sus inquietudes, configure phpMussel de forma que los tipos de información que causen sus inquietudes no se recopilen o registrado en primer lugar (por ejemplo, a modo de deshabilitar el registro).

#### 9.4 COOKIES

Cuando un usuario ha iniciado una sesión en el front-end, phpMussel establece una [cookie](https://es.wikipedia.org/wiki/Cookie_(inform%C3%A1tica)) para poder recordar al usuario para solicitudes posteriores (es decir, las cookies se usan para autenticar al usuario en una sesión). En la página de inicio de sesión, una advertencia de cookie se muestra prominentemente, advirtiendo al usuario que una cookie se establecerán si participan en la acción relevante. Las cookies no se establecen en ningún otro punto en la base de código.

#### 9.5 MARKETING Y PUBLICIDAD

phpMussel no recopila ni procesa ninguna información con fines comerciales o publicitarios, y tampoco vende ni obtiene ganancias de ninguna información recopilada o registrada. phpMussel no es una empresa comercial, ni está relacionada con ningún interés comercial, por lo que hacer estas cosas no tendría ningún sentido. Este ha sido el caso desde el comienzo del proyecto, y sigue siendo el caso hoy en día. Además, hacer estas cosas sería contraproducente para el espíritu y el propósito del proyecto como un todo, y mientras continúe manteniendo el proyecto, nunca sucederá.

#### 9.6 POLÍTICA DE PRIVACIDAD

En algunas circunstancias, se le puede exigir legalmente que muestre claramente un enlace a su política de privacidad en todas las páginas y secciones de su sitio web. Esto puede ser importante como un medio para garantizar que los usuarios estén bien informados sobre sus prácticas de privacidad exactas, los tipos de información personal que recopila y cómo piensa utilizarla. Para poder incluir un enlace en la página "Subida Denegada" de phpMussel, se proporciona una directiva de configuración para especificar la URL de su política de privacidad.

*Directivas de configuración relevantes:*
- `legal` -> `privacy_policy`

#### 9.7 GDPR/DSGVO

El Reglamento General de Protección de Datos (GDPR) es un reglamento de la Unión Europea, que entra en vigor el 25 Mayo de 2018. El objetivo principal de la regulación es dar control a los ciudadanos y residentes de la UE con respecto a sus propios datos personales, y unificar la regulación dentro de la UE con respecto a la privacidad y los datos personales.

El reglamento contiene disposiciones específicas relativas al procesamiento de [información de identificación personal](https://es.wikipedia.org/wiki/Informaci%C3%B3n_personal) de cualquier "sujeto de datos" (cualquier persona física identificada o identificable) de la UE o dentro de ella. Para cumplir con la regulación, las "empresas" (según lo definido por la regulación) y cualquier sistema y proceso relevante deben implementar "privacidad por diseño" como estándar, debe usar la configuración de privacidad más alta posible, debe implementar las salvaguardas necesarias para cualquier información almacenada o procesada (incluyendo, pero no limitado a, la implementación de seudonimización o anonimización completa de datos), debe declarar clara e inequívocamente los tipos de datos que recopilan, cómo lo procesan, por qué motivos, por cuánto tiempo lo retienen, y si comparten estos datos con terceros, los tipos de datos compartidos con terceros, cómo, por qué, y así sucesivamente.

Los datos no pueden procesarse a menos que haya una base legal para hacerlo, según lo definido por la regulación. Generalmente, esto significa que para procesar los datos de un sujeto de datos de manera legal, debe hacerse de conformidad con las obligaciones legales, o solo después de que se haya obtenido el consentimiento explícito, bien informado e inequívoco del sujeto de los datos.

Debido a que algunos aspectos de la regulación pueden evolucionar en el tiempo, para evitar la propagación de información desactualizada, puede ser mejor aprender sobre la regulación desde una fuente autorizada, en lugar de simplemente incluir la información relevante aquí en la documentación del paquete (que puede con el tiempo se volverá obsoleto a medida que la regulación evolucione).

[EUR-Lex](https://eur-lex.europa.eu/) (una parte del sitio web oficial de la Unión Europea que proporciona información sobre la legislación de la UE) proporciona amplia información sobre GDPR/DSGVO, disponible en 24 idiomas diferentes (al momento de escribir esto), y disponible para su descarga en formato PDF. Definitivamente recomendaría leer la información que proporcionan, para aprender más sobre GDPR/DSGVO:
- [REGLAMENTO (UE) 2016/679 DEL PARLAMENTO EUROPEO Y DEL CONSEJO](https://eur-lex.europa.eu/legal-content/ES/TXT/?uri=celex:32016R0679)

Alternativamente, hay una breve descripción (no autoritativa) de GDPR/DSGVO disponible en Wikipedia:
- [Reglamento General de Protección de Datos](https://es.wikipedia.org/wiki/Reglamento_General_de_Protecci%C3%B3n_de_Datos)

---


Última Actualización: 9 de Octubre de 2025 (2025.10.09).
