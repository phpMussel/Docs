## Documentação para phpMussel v3 (Português).

### Conteúdo
- 1. [PREÂMBULO](#SECTION1)
- 2. [COMO INSTALAR](#SECTION2)
- 3. [COMO USAR](#SECTION3)
- 4. [ESTENDENDO O PHPMUSSEL](#SECTION4)
- 5. [OPÇÕES DE CONFIGURAÇÃO](#SECTION5)
- 6. [FORMATOS DE ASSINATURAS](#SECTION6)
- 7. [PROBLEMAS DE COMPATIBILIDADE CONHECIDOS](#SECTION7)
- 8. [PERGUNTAS MAIS FREQUENTES (FAQ)](#SECTION8)
- 9. [INFORMAÇÃO LEGAL](#SECTION9)

*Regarding translations: My native language is English. Because this is a free and open-source hobby project which generates zero income, and translatable content is likely to change as the features and functionality supported by the project changes, it doesn't make sense for me to spend money for translations. Because I'm the sole author/developer/maintainer for the project and I'm not a ployglot, any translations I produce are very likely to contain errors. Sorry, but realistically, that won't ever change. If you find any such errors/typos/mistakes/etc, your assistance to correct them would be very much appreciated. Pull requests are invited and encouraged. Otherwise, if you find these errors too much to handle, just stick with the original English source. If a translation is irredeemably incomprehensible, let me know which, and I can delete it. If you're not sure how to perform pull requests, ask. I can help.*

---


### 1. <a name="SECTION1"></a>PREÂMBULO

Obrigado por usar phpMussel, um PHP script projetado para detectar trojans, vírus, malware e outras ameaças dentro dos arquivos enviados para o seu sistema onde quer que o script é enganchado, baseado nas assinaturas do ClamAV e outros.

[PHPMUSSEL](https://phpmussel.github.io/) COPYRIGHT 2013 e além GNU/GPLv2 através do [Caleb M (Maikuolan)](https://github.com/Maikuolan).

Este script é um software livre; você pode redistribuí-lo e/ou modificá-lo de acordo com os termos da GNU General Public License como publicada pela Free Software Foundation; tanto a versão 2 da Licença, ou (a sua escolha) qualquer versão posterior. Este script é distribuído na esperança que possa ser útil, mas SEM QUALQUER GARANTIA; sem mesmo a implícita garantia de COMERCIALIZAÇÃO ou ADEQUAÇÃO A UM DETERMINADO FIM. Consulte a GNU General Public License para obter mais detalhes, localizado no arquivo `LICENSE.txt` e disponível também em:
- <https://www.gnu.org/licenses/>.
- <https://opensource.org/licenses/>.

Um especial obrigado para [ClamAV](https://www.clamav.net/) por o projeto inspiração e para as assinaturas que este script utiliza, sem o qual, o script provavelmente não existiria, ou no melhor, seria de utilidade muito limitada.

Um especial obrigado para GitHub e Bitbucket por hospedar os arquivos do projeto, e para os recursos adicionais de um número de assinaturas utilizados através do phpMussel: [PhishTank](https://www.phishtank.com/), [NLNetLabs](https://nlnetlabs.nl/), [Malware.Expert](https://malware.expert/) e outros, e um especial obrigado a todos aqueles que apoiam o projeto, a qualquer outra pessoa que eu possa ter esquecido de mencionar, e para você, por usar o script.

---


### 2. <a name="SECTION2"></a>COMO INSTALAR

#### 2.0 INSTALANDO COM COMPOSER

A maneira recomendada de instalar o phpMussel v3 é através do Composer.

Por conveniência, você pode instalar as dependências mais comuns do phpMussel por meio do repositório principal antigo do phpMussel:

`composer require phpmussel/phpmussel`

Como alternativa, você pode escolher individualmente quais dependências serão necessárias na sua implementação. É bem possível que você queira apenas dependências específicas e não precise de tudo.

Para fazer qualquer coisa com o phpMussel, você precisará da base de código principal do phpMussel:

`composer require phpmussel/core`

Fornece um recurso administrativo de front-end para o phpMussel:

`composer require phpmussel/frontend`

Fornece análise automática de upload de arquivos para o seu site:

`composer require phpmussel/web`

Fornece a capacidade de utilizar o phpMussel como um aplicativo interativo no modo CLI:

`composer require phpmussel/cli`

Fornece uma ponte entre o phpMussel e o PHPMailer, permitindo que o phpMussel utilize o PHPMailer para autenticação de dois fatores, notificação por email sobre uploads de arquivos bloqueados, etc:

`composer require phpmussel/phpmailer`

Para que o phpMussel seja capaz de detectar qualquer coisa, você precisará instalar assinaturas. Não existe um pacote específico para isso. Para instalar assinaturas, consulte a próxima seção deste documento.

Como alternativa, se você não quiser usar o Composer, faça o download dos ZIPs pré-empacotados aqui:

https://github.com/phpMussel/Examples

Os ZIPs pré-empacotados incluem todas as dependências mencionadas acima, bem como todos os arquivos de assinatura padrão do phpMussel, além de alguns exemplos fornecidos sobre como usar o phpMussel em sua implementação.

#### <a name="INSTALLING_SIGNATURES"></a>2.1 INSTALANDO ASSINATURAS

As assinaturas são requeridas pela phpMussel para detectar ameaças específicas. Existem 2 métodos principais para instalar assinaturas:

1. Gerar assinaturas usando "SigTool" e instale-se manualmente.
2. Baixe as assinaturas de "phpMussel/Signatures" ou "phpMussel/Examples" e instale-se manualmente.

##### 2.1.0 Gerar assinaturas usando "SigTool" e instale-se manualmente.

*Vejo: [Documentação SigTool](https://github.com/phpMussel/SigTool#documentation).*

*Observe também: O SigTool processa apenas as assinaturas do ClamAV. Para obter assinaturas de outras fontes, como as escritas especificamente para o phpMussel, que incluem as assinaturas necessárias para detectar as amostras de teste do phpMussel, esse método precisará ser complementado por um dos outros métodos mencionados aqui.*

##### 2.1.1 Baixe as assinaturas de "phpMussel/Signatures" ou "phpMussel/Examples" e instale-se manualmente.

Primeiramente, vá para [phpMussel/Signatures](https://github.com/phpMussel/Signatures). O repositório contém vários arquivos de assinatura compactados em GZ. Baixe os arquivos que você precisa, descomprime-os, e copie-os para o diretório de assinaturas da sua instalação.

Alternativamente, faça o download do ZIP mais recente de [phpMussel/Examples](https://github.com/phpMussel/Examples). Você pode copiar/colar as assinaturas desse arquivo na sua instalação.

---


### 3. <a name="SECTION3"></a>COMO USAR

#### 3.0 CONFIGURANDO O PHPMUSSEL

Após instalar o phpMussel, você precisará de um arquivo de configuração para poder configurá-lo. Os arquivos de configuração do phpMussel podem ser formatados como arquivos INI ou YML. Se você estiver trabalhando em um dos ZIPs de exemplo, já terá dois arquivos de configuração exemplo disponíveis, `phpmussel.ini` e `phpmussel.yml`; você pode escolher um deles para trabalhar, se desejar. Se você não estiver trabalhando em um dos ZIPs de exemplo, precisará criar um novo arquivo.

Se você está satisfeito com a configuração padrão do phpMussel e não deseja alterar nada, pode usar um arquivo vazio como seu arquivo de configuração. Qualquer coisa que não seja configurada pelo seu arquivo de configuração utilizará seu padrão, portanto, você só precisará configurar algo explicitamente se desejar que ele seja diferente do seu padrão (ou seja, um arquivo de configuração vazio fará com que o phpMussel utilize toda a sua configuração padrão).

Se você quiser usar o front-end do phpMussel, poderá configurar tudo na página de configuração do front-end. Mas, desde a v3 em diante, as informações de login do front-end são armazenadas no seu arquivo de configuração, portanto, para fazer login no front-end, você precisará pelo menos configurar uma conta para fazer login e, a partir daí, você poderá fazer login e usar a página de configuração do front-end para configurar todo o resto.

Os trechos abaixo adicionarão uma nova conta ao front-end com o nome de usuário "admin" e a senha "password".

Para arquivos INI:

```INI
[user.admin]
password='$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK'
permissions='1'
```

Para arquivos YML:

```YAML
user.admin:
 password: "$2y$10$FPF5Im9MELEvF5AYuuRMSO.QKoYVpsiu1YU9aDClgrU57XtLof/dK"
 permissions: 1
```

Você pode nomear sua configuração como quiser (contanto que você mantenha sua extensão, para que o phpMussel saiba qual formato ele usa), e você pode armazená-lo onde quiser. Você pode dizer ao phpMussel onde encontrar seu arquivo de configuração, fornecendo seu caminho ao instanciar o carregador. Se nenhum caminho for fornecido, o phpMussel tentará localizá-lo no pai do diretório do vendor.

Em alguns ambientes, como o Apache, é possível colocar um ponto na frente da sua configuração para ocultá-lo e impedir o acesso do público.

Consulte a seção de configuração deste documento para obter mais informações sobre as várias diretivas de configuração disponíveis para o phpMussel.

#### 3.1 PHPMUSSEL CORE

Independentemente de como você deseja usar o phpMussel, quase todas as implementações conterão algo assim, no mínimo:

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
```

Como os nomes dessas classes implicam, o carregador (loader) é responsável pela preparação das necessidades básicas do uso do phpMussel, e o scanner é responsável por toda a funcionalidade principal da análise.

O construtor para o carregador aceita cinco parâmetros, todos opcionais.

```PHP
public function __construct(
    string $ConfigurationPath = '',
    string $CachePath = '',
    string $QuarantinePath = '',
    string $SignaturesPath = '',
    string $VendorPath = ''
)
```

O primeiro parâmetro é o caminho completo para o seu arquivo de configuração. Quando omitido, o phpMussel procurará um arquivo de configuração chamado `phpmussel.ini` ou `phpmussel.yml`, no pai do diretório vendor.

O segundo parâmetro é o caminho para um diretório que você permite que o phpMussel use para cache e armazenamento temporário de arquivos. Quando omitido, o phpMussel tentará criar um novo diretório para usar, nomeado como `phpmussel-cache`, no pai do diretório vendor. Se você desejar especificar esse caminho, seria melhor escolher um diretório vazio, para evitar a perda indesejada de outros dados no diretório especificado.

O terceiro parâmetro é o caminho para um diretório que você permite que o phpMussel use para sua quarentena. Quando omitido, o phpMussel tentará criar um novo diretório para usar, nomeado como `phpmussel-quarentine`, no pai do diretório vendor. Se você desejar especificar esse caminho, seria melhor escolher um diretório vazio, para evitar a perda indesejada de outros dados no diretório especificado. É altamente recomendável que você impeça o acesso público ao diretório usado para quarentena.

O quarto parâmetro é o caminho para o diretório que contém os arquivos de assinatura do phpMussel. Quando omitido, o phpMussel tentará procurar os arquivos de assinatura em um diretório nomeado como `phpmussel-signatures`, no pai do diretório vendor.

O quinto parâmetro é o caminho para o diretório vendor. Nunca deve apontar para mais nada. Quando omitido, o phpMussel tentará localizar esse diretório por si mesmo. Este parâmetro é fornecido para facilitar a integração mais fácil com implementações que podem não necessariamente ter a mesma estrutura de um projeto típico do Composer.

O construtor do scanner aceita apenas um parâmetro e é obrigatório: O objeto do carregador instanciado. Como é passado por referência, o carregador deve ser instanciado para uma variável (instanciar o carregador diretamente no scanner para passar por valor não é a maneira correta de usar o phpMussel).

```PHP
public function __construct(\phpMussel\Core\Loader &$Loader)
```

#### 3.2 ANÁLISE AUTOMÁTICA DE CARREGAMENTOS DE ARQUIVOS

Para instanciar o manipulador de carregamentos:

```PHP
$Web = new \phpMussel\Web\Web($Loader, $Scanner);
```

Para analisar os carregamentos de arquivos:

```PHP
$Web->scan();
```

Opcionalmente, o phpMussel pode tentar reparar os nomes dos envios caso haja algo errado, se você quiser:

```PHP
$Web->demojibakefier();
```

Como um exemplo completo:

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

*Tentar de carregar o arquivo `ascii_standard_testfile.txt`, uma amostra benigna fornecida com o único objetivo de testar o phpMussel:*

![Screenshot](https://raw.githubusercontent.com/phpMussel/extras/master/screenshots/web-v3.0.0-alpha2.png)

#### 3.3 MODO CLI

Para instanciar o manipulador da CLI:

```PHP
$CLI = new \phpMussel\CLI\CLI($Loader, $Scanner);
```

Como um exemplo completo:

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

Para instanciar o front-end:

```PHP
$FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
```

Como um exemplo completo:

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

#### 3.5 API DO SCANNER

Você também pode implementar a API do scanner phpMussel em outros programas e scripts, se desejar.

Como um exemplo completo:

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

A parte importante a ser observada nesse exemplo é o método `scan()`. O método `scan()` aceita dois parâmetros:

```PHP
public function scan(mixed $Files, int $Format = 0): mixed
```

O primeiro parâmetro pode ser uma string ou uma matriz e informa ao scanner o que deve ser verificado. Pode ser uma string indicando um arquivo ou diretório específico, ou uma matriz de tais strings para especificar vários arquivos/diretórios.

Quando como uma string, deve apontar para onde os dados podem ser encontrados. Quando como uma matriz, as chaves da matriz devem indicar os nomes originais dos itens a serem verificados, e os valores devem apontar para onde os dados podem ser encontrados.

O segundo parâmetro é um número inteiro e informa ao scanner como ele deve retornar os resultados da verificação.

Especifique 1 para retornar os resultados da verificação como uma matriz para cada item verificado como números inteiros.

Esses números inteiros têm os seguintes significados:

Resultados | Descrição
--:|:--
-5 | Indica que a análise falhou ao concluir por outros motivos.
-4 | Indica que os dados não puderam ser analisados devido a encriptação.
-3 | Indica que problemas foram encontrados com os arquivos de assinatura do phpMussel.
-2 | Indica que dados corrompidos foram detectados durante a análise, e portanto, a análise não foi concluída.
-1 | Indica que extensões ou complementos necessários pelo PHP para executar a análise estavam faltando, e portanto, a análise não foi concluída.
0 | Indica que o alvo de análise não existe, e portanto, havia nada para verificar.
1 | Indica que o alvo foi analisado e não foram detectados problemas.
2 | Indica que o alvo foi analisado e problemas foram detectados.

Especifique 2 para retornar os resultados da análise como um booleano.

Resultados | Descrição
:-:|:--
`true` | Problemas foram detectados (o alvo da análise é ruim/perigoso).
`false` | Problemas não foram detectados (o alvo da análise provavelmente está bom).

Especifique 3 para retornar os resultados da verificação como uma matriz para cada item analisado como texto legível por humanos.

*Exemplo de saída:*

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

Especifique 4 para retornar os resultados da verificação como uma sequência de texto legível por humanos (como 3, mas implodiu).

*Exemplo de saída:*

```
Detected phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)! Detected phpMussel-Testfile.CoEx (coex_testfile.rtf)! Detected encrypted archive; Encrypted archives not permitted (encrypted.zip)!
```

Especifique *qualquer outro valor* para retornar o texto formatado (como os resultados da verificação vistos ao usar a CLI).

*Exemplo de saída:*

*Veja também: [Como acessar detalhes específicos sobre os arquivos quando eles são analisados?](#SCAN_DEBUGGING)*

#### 3.6 AUTENTICAÇÃO DE DOIS FATORES

É possível tornar o front-end mais seguro ativando a autenticação de dois fatores ("2FA"). Ao fazer login numa conta ativada para 2FA, um e-mail é enviado para o endereço de e-mail associado a essa conta. Este e-mail contém um "código 2FA", que o usuário deve inserir, além do nome de usuário e da senha, para poder fazer login usando essa conta. Isso significa que a obtenção de uma senha de conta não seria suficiente para que qualquer hacker ou atacante em potencial pudesse fazer login nessa conta, já que eles também precisam ter acesso ao endereço de e-mail associado a essa conta para poder receber e utilizar o código 2FA associado à sessão, assim tornando assim o front-end mais seguro.

Depois de instalar o PHPMailer, você precisará preencher as diretivas de configuração do PHPMailer por meio da página de configuração para phpMussel ou do arquivo de configuração. Mais informações sobre essas diretivas de configuração estão incluídas na seção de configuração deste documento. Depois de preencher as diretivas de configuração do PHPMailer, defina `enable_two_factor` para `true`. A autenticação de dois fatores agora deve estar ativada.

Em seguida, você precisará associar um endereço de e-mail a uma conta para que o phpMussel saiba para onde enviar códigos 2FA ao fazer login com essa conta. Para fazer isso, use o endereço de e-mail como o nome de usuário da conta (como `foo@bar.tld`), ou incluir o endereço de e-mail como parte do nome de usuário da mesma forma que você faria ao enviar um e-mail normalmente (como `Foo Bar <foo@bar.tld>`).

---


### 4. <a name="SECTION4"></a>ESTENDENDO O PHPMUSSEL

O phpMussel é projetado com extensibilidade em mente. Solicitações pull a qualquer um dos repositórios da organização phpMussel e [contribuições](https://github.com/phpMussel/.github/blob/master/CONTRIBUTING.md) em geral são sempre bem-vindas. Além disso, se você precisar modificar ou estender o phpMussel de maneiras que não sejam adequadas para contribuir com esses repositórios específicos, isso é definitivamente possível (por exemplo, para modificações ou extensões específicas para sua implementação específica, que não podem ser publicados devido a necessidades de confidencialidade ou privacidade em sua organização, ou que podem ser publicados preferencialmente em seu próprio repositório, como plugins e novos pacotes Composer que requerem phpMussel).

Desde a v3, todas as funcionalidades do phpMussel existem como classes, o que significa que em alguns casos, os mecanismos de [herança de objetos](https://www.php.net/manual/pt_BR/language.oop5.inheritance.php) fornecidos pelo PHP podem ser uma maneira fácil e apropriada de estender o phpMussel.

phpMussel também fornece seus próprios mecanismos de extensibilidade. Antes da v3, o mecanismo preferido era o sistema de plugins integrado para phpMussel. Desde a v3, o mecanismo preferido é o orquestrador de eventos.

O código padrão para estender o phpMussel e escrever novos plug-ins está publicamente disponível no [repositório de código padrão](https://github.com/phpMussel/plugin-boilerplates). Também está incluída uma lista de [todos os eventos atualmente suportados](https://github.com/phpMussel/plugin-boilerplates/tree/master/boilerplate-v3#currently-supported-events) e instruções mais detalhadas sobre como usar o código padrão.

Você notará que a estrutura do código padrão da v3 é idêntica à estrutura dos vários repositórios do phpMussel v3 na organização phpMussel. Aquilo não é uma coincidência. Sempre que possível, eu recomendaria utilizar o código padrão da v3 para fins de extensibilidade e princípios de design semelhantes aos do phpMussel v3. Se você optar por publicar sua nova extensão ou plugin, você pode integrar o suporte do Composer para ele, e então deve ser teoricamente possível que outros utilizem sua extensão ou plugin exatamente da mesma maneira que o phpMussel v3, simplesmente exigindo-o junto com suas outras dependências do Composer e aplicando quaisquer manipuladores de eventos necessários em sua implementação. (Claro, não se esqueça de incluir instruções com suas publicações, para que outros saibam sobre quaisquer manipuladores de eventos necessários que possam existir, e qualquer outra informação que possa ser necessária para a instalação correta e utilização de sua publicação).

---


### 5. <a name="SECTION5"></a>OPÇÕES DE CONFIGURAÇÃO

O seguinte é uma lista das diretivas de configuração aceitas pelo phpMussel, juntamente com uma descrição de sua propósito e função.

```
Configuração (v3)
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

#### "core" (Categoria)
Configuração geral (qualquer configuração principal que não pertença a outras categorias).

##### "scan_log" `[string]`
- Nome do arquivo para registrar todos os resultados do análises. Especifique um arquivo nome, ou deixe branco para desativar.

##### "scan_log_serialized" `[string]`
- Nome do arquivo para registrar todos os resultados do análises (formato é serializado). Especifique um arquivo nome, ou deixe branco para desativar.

##### "error_log" `[string]`
- Um arquivo para registrar erros detectados que não são fatais. Especifique o nome de um arquivo, ou deixe em branco para desabilitar.

##### "truncate" `[string]`
- Truncar arquivos de log quando atingem um determinado tamanho? Valor é o tamanho máximo em B/KB/MB/GB/TB que um arquivo de log pode crescer antes de ser truncado. O valor padrão de 0KB desativa o truncamento (arquivos de log podem crescer indefinidamente). Nota: Aplica-se a arquivos de log individuais! O tamanho dos arquivos de log não é considerado coletivamente.

##### "log_rotation_limit" `[int]`
- A rotação de log limita o número de arquivos de log que devem existir a qualquer momento. Quando novos arquivos de log são criados, se o número total de arquivos de log exceder o limite especificado, a ação especificada será executada. Você pode especificar o limite desejado aqui. Um valor de 0 desativará a rotação de log.

##### "log_rotation_action" `[string]`
- A rotação de log limita o número de arquivos de log que devem existir a qualquer momento. Quando novos arquivos de log são criados, se o número total de arquivos de log exceder o limite especificado, a ação especificada será executada. Você pode especificar a ação desejada aqui.

```
log_rotation_action
├─Delete ("Deletar os arquivos de log mais antigos, até o limite não seja mais excedido.")
└─Archive ("Primeiramente arquivar, e então deletar os arquivos de log mais antigos, até o limite não seja mais excedido.")
```

##### "timezone" `[string]`
- Isso é usado para especificar o fuso horário a ser usado (por exemplo, Africa/Cairo, America/New_York, Asia/Tokyo, Australia/Perth, Europe/Berlin, Pacific/Guam, etc). Especifique "SYSTEM" para permitir que o PHP lide com isso automaticamente.

```
timezone
├─SYSTEM ("Usar o fuso horário padrão do sistema.")
├─UTC ("UTC")
└─…Outros
```

##### "time_offset" `[int]`
- Deslocamento do fuso horário em minutos.

##### "time_format" `[string]`
- O formato de notação de data/tempo utilizado pelo phpMussel. Opções adicionais podem ser adicionadas mediante solicitação.

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
└─…Outros
```

##### "ipaddr" `[string]`
- Onde encontrar o IP endereço das solicitações? (Útil por serviços como o Cloudflare e tal). Padrão = REMOTE_ADDR. ATENÇÃO: Não mude isso a menos que você saiba o que está fazendo!

```
ipaddr
├─HTTP_INCAP_CLIENT_IP ("HTTP_INCAP_CLIENT_IP (Incapsula)")
├─HTTP_CF_CONNECTING_IP ("HTTP_CF_CONNECTING_IP (Cloudflare)")
├─CF-Connecting-IP ("CF-Connecting-IP (Cloudflare)")
├─HTTP_X_FORWARDED_FOR ("HTTP_X_FORWARDED_FOR (Cloudbric)")
├─X-Forwarded-For ("X-Forwarded-For (Squid)")
├─Forwarded ("Forwarded")
├─REMOTE_ADDR ("REMOTE_ADDR (Padrão)")
└─…Outros
```

Veja também:
- [NGINX Reverse Proxy](https://docs.nginx.com/nginx/admin-guide/web-server/reverse-proxy/)
- [Squid configuration directive forwarded_for](http://www.squid-cache.org/Doc/config/forwarded_for/)
- [Forwarded - HTTP \| MDN](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Forwarded)

##### "delete_on_sight" `[bool]`
- Ativando esta opção irá instruir o script para tentar imediatamente deletando qualquer arquivo que ele encontra durante a análise que corresponde a qualquer critério de detecção, quer seja através de assinaturas ou de outra forma. Arquivos determinados para ser "limpo" não serão tocados. Em caso de compactados arquivos, o inteiro arquivo será deletado (independentemente de se o problemático arquivo é apenas um dos vários arquivos contidos dentro do compactado arquivo). Para o caso de arquivo carregamento análise, em geral, não é necessário ativar essa opção, porque normalmente, PHP irá automaticamente expurgar os conteúdos de o seu cache quando a execução foi concluída, significando que ele vai normalmente deletar todos os arquivos enviados através dele para o servidor a menos que tenha movido, copiado ou deletado já. A opção é adicionado aqui como uma medida de segurança para aqueles cujas cópias de PHP nem sempre se comportam da forma esperada. False = Após a análise, deixe o arquivo sozinho [Padrão]; True = Após a análise, se não limpo, deletar imediatamente.

##### "lang" `[string]`
- Especificar o padrão da linguagem por phpMussel.

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
├─ms ("Bahasa Melayu")
├─nl ("Nederlandse")
├─no ("Norsk")
├─pl ("Polski")
├─pt ("Português")
├─ru ("Русский")
├─sv ("Svenska")
├─ta ("தமிழ்")
├─th ("ภาษาไทย")
├─tr ("Türkçe")
├─uk ("Українська")
├─ur ("اردو")
├─vi ("Tiếng Việt")
├─zh ("中文（简体）")
└─zh-TW ("中文（傳統）")
```

##### "lang_override" `[bool]`
- Localizar de acordo com HTTP_ACCEPT_LANGUAGE sempre que possível? True = Sim [Padrão]; False = Não.

##### "scan_cache_expiry" `[int]`
- Por quanto tempo deve phpMussel cache os resultados da verificação? O valor é o número de segundos para armazenar em cache os resultados da verificação para. O padrão é 21600 segundo (6 horas); Um valor de 0 irá desativar o cache os resultados da verificação.

##### "maintenance_mode" `[bool]`
- Ativar o modo de manutenção? True = Sim; False = Não [Padrão]. Desativa tudo além do front-end. Às vezes útil para quando atualiza seu CMS, frameworks, etc.

##### "statistics" `[bool]`
- Monitorar as estatísticas de uso do phpMussel? True = Sim; False = Não [Padrão].

##### "hide_version" `[bool]`
- Ocultar informações da versão dos logs e da saída da página? True = Sim; False = Não [Padrão].

##### "disabled_channels" `[string]`
- Isso pode ser usado para impedir que o phpMussel use canais específicos ao enviar solicitações.

```
disabled_channels
├─GitHub ("GitHub")
├─BitBucket ("BitBucket")
├─VirusTotal_HTTPS ("VirusTotal (HTTPS)")
└─VirusTotal_HTTP ("VirusTotal (HTTP)")
```

##### "default_timeout" `[int]`
- Tempo limite padrão a ser usado para solicitações externas? Padrão = 12 segundos.

#### "signatures" (Categoria)
Configuração para assinaturas, arquivos de assinatura, etc.

##### "active" `[string]`
- Uma lista dos arquivos de assinaturas ativos, delimitados por vírgulas. Nota: Arquivos de assinatura devem ser instalados primeiro, antes de você poder ativá-los. Para que os arquivos de teste funcionem corretamente, os arquivos de assinatura devem ser instalados e ativados.

##### "fail_silently" `[bool]`
- Deve phpMussel reportar quando os assinaturas arquivos estão perdido ou corrompido? Se `fail_silently` está desativado, perdidos e corrompidos arquivos serão reportado durante análise, e se `fail_silently` está ativado, perdidos e corrompidos arquivos serão ignoradas, com a análise reportando por estes arquivos em que não há problemas. Isso geralmente deve ser deixado sozinho a menos que você está experimentando PHP falhas ou semelhantes problemas. False = Desativado; True = Ativado [Padrão].

##### "fail_extensions_silently" `[bool]`
- Deve phpMussel reportar quando extensões não estão disponíveis? Se `fail_extensions_silently` está desativado, extensões indisponíveis serão reportado durante análise, e se `fail_extensions_silently` está ativado, extensões indisponíveis serão ignoradas, com a análise reportando por estes arquivos em que não há problemas. Desativando dessa directiva pode potencialmente aumentar a sua segurança, mas também pode levar a um aumento de falsos positivos. False = Desativado; True = Ativado [Padrão].

##### "detect_adware" `[bool]`
- Deve phpMussel usam assinaturas para detectar adware? False = Não; True = Sim [Padrão].

##### "detect_joke_hoax" `[bool]`
- Deve phpMussel usam assinaturas para detectar piada/engano malwares/vírus? False = Não; True = Sim [Padrão].

##### "detect_pua_pup" `[bool]`
- Deve phpMussel usam assinaturas para detectar PUAs/PUPs? False = Não; True = Sim [Padrão].

##### "detect_packer_packed" `[bool]`
- Deve phpMussel usam assinaturas para detectar embaladores e dados embaladas? False = Não; True = Sim [Padrão].

##### "detect_shell" `[bool]`
- Deve phpMussel usam assinaturas para detectar shell scripts? False = Não; True = Sim [Padrão].

##### "detect_deface" `[bool]`
- Deve phpMussel usam assinaturas para detectar vandalismo e vândalos? False = Não; True = Sim [Padrão].

##### "detect_encryption" `[bool]`
- Deve phpMussel detectar e bloquear arquivos criptografados? False = Não; True = Sim [Padrão].

##### "heuristic_threshold" `[int]`
- Existem assinaturas específicas de phpMussel para identificando suspeitas e qualidades potencialmente maliciosos dos arquivos que estão sendo carregados sem por si só identificando aqueles arquivos que estão sendo carregados especificamente como sendo maliciosos. Este "threshold" (limiar) valor instrui phpMussel o que o total máximo peso de suspeitas e qualidades potencialmente maliciosos dos arquivos que estão sendo carregados que é permitida é antes que esses arquivos devem ser sinalizada como maliciosos. A definição de peso neste contexto é o número total de suspeitas e qualidades potencialmente maliciosos identificado. Por padrão, este valor será definido como 3. Um menor valor geralmente resultará numa maior ocorrência de falsos positivos mas um maior número de arquivos maliciosos sendo sinalizado, enquanto um maior valor geralmente resultará numa menor ocorrência de falsos positivos mas um menor número de arquivos maliciosos sendo sinalizado. É geralmente melhor a deixar esse valor em seu padrão a menos que você está enfrentando problemas relacionados a ela.

#### "files" (Categoria)
Os detalhes de como lidar com arquivos durante a análise.

##### "filesize_limit" `[string]`
- Arquivo tamanho limit. Em KB. 65536 = 64MB [Padrão] 0 = Não limite (sempre greylisted), qualquer (positivo) numérico valor aceite. Isso pode ser útil quando sua PHP configuração limita a quantidade de memória que um processo pode ocupar ou se sua PHP configuração limita o arquivo tamanho de carregamentos.

##### "filesize_response" `[bool]`
- Que fazer com arquivos que excedam o limite de arquivo tamanho (se existir). False = Whitelist; True = Blacklist [Padrão].

##### "filetype_whitelist" `[string]`
- Whitelist:

__Como isso funciona.__ Se o seu sistema só permite certos tipos de arquivos sejam carregado, ou se o seu sistema explicitamente nega certos tipos de arquivos, especificando esses tipos de arquivos no whitelists, blacklists, e greylists pode aumentar a velocidado em que a análise é realizada através de permitindo o script para ignorar certos tipos de arquivos. O formato é CSV. (Valores Separados Por Virgula).

__Ordem lógica de processamento.__ Se o tipo de arquivo está na whitelist, não verificar e não bloqueia o arquivo, e não verificar o arquivo contra o blacklist ou greylist. Se o tipo de arquivo está na blacklist, não verificar o arquivo, mas bloqueá-lo de qualquer maneira, e não verificar o arquivo contra o greylist. Se o greylist está vazia ou se o greylist não está vazia e o tipo de arquivo é no greylist, verificar o arquivo como por normal e determinar se a bloqueá-lo com base nos resultados do verificando, mas se o greylist não está vazia e o tipo de arquivo não é no greylist, tratar o arquivo da mesma maneira como está na blacklist, portanto não verificá-lo, mas bloqueá-lo de qualquer maneira.

##### "filetype_blacklist" `[string]`
- Blacklist:

__Como isso funciona.__ Se o seu sistema só permite certos tipos de arquivos sejam carregado, ou se o seu sistema explicitamente nega certos tipos de arquivos, especificando esses tipos de arquivos no whitelists, blacklists, e greylists pode aumentar a velocidado em que a análise é realizada através de permitindo o script para ignorar certos tipos de arquivos. O formato é CSV. (Valores Separados Por Virgula).

__Ordem lógica de processamento.__ Se o tipo de arquivo está na whitelist, não verificar e não bloqueia o arquivo, e não verificar o arquivo contra o blacklist ou greylist. Se o tipo de arquivo está na blacklist, não verificar o arquivo, mas bloqueá-lo de qualquer maneira, e não verificar o arquivo contra o greylist. Se o greylist está vazia ou se o greylist não está vazia e o tipo de arquivo é no greylist, verificar o arquivo como por normal e determinar se a bloqueá-lo com base nos resultados do verificando, mas se o greylist não está vazia e o tipo de arquivo não é no greylist, tratar o arquivo da mesma maneira como está na blacklist, portanto não verificá-lo, mas bloqueá-lo de qualquer maneira.

##### "filetype_greylist" `[string]`
- Greylist:

__Como isso funciona.__ Se o seu sistema só permite certos tipos de arquivos sejam carregado, ou se o seu sistema explicitamente nega certos tipos de arquivos, especificando esses tipos de arquivos no whitelists, blacklists, e greylists pode aumentar a velocidado em que a análise é realizada através de permitindo o script para ignorar certos tipos de arquivos. O formato é CSV. (Valores Separados Por Virgula).

__Ordem lógica de processamento.__ Se o tipo de arquivo está na whitelist, não verificar e não bloqueia o arquivo, e não verificar o arquivo contra o blacklist ou greylist. Se o tipo de arquivo está na blacklist, não verificar o arquivo, mas bloqueá-lo de qualquer maneira, e não verificar o arquivo contra o greylist. Se o greylist está vazia ou se o greylist não está vazia e o tipo de arquivo é no greylist, verificar o arquivo como por normal e determinar se a bloqueá-lo com base nos resultados do verificando, mas se o greylist não está vazia e o tipo de arquivo não é no greylist, tratar o arquivo da mesma maneira como está na blacklist, portanto não verificá-lo, mas bloqueá-lo de qualquer maneira.

##### "check_archives" `[bool]`
- Tentativa de verificar os conteúdos dos compactados arquivos? False = Não (Não verificar); True = Sim (Verificar) [Padrão]. Suportados: Zip (requer libzip), Tar, Rar (requer a extensão rar).

##### "filesize_archives" `[bool]`
- Herdar o arquivo tamanho blacklist/whitelist para o conteúdo de compactados arquivos? False = Não (greylist tudo); True = Sim [Padrão].

##### "filetype_archives" `[bool]`
- Herdar o arquivo tipo blacklist/whitelist para o conteúdo de compactados arquivos? False = Não (greylist tudo) [Padrão]; True = Sim.

##### "max_recursion" `[int]`
- Máxima recursão profundidade limite por compactados arquivos. Padrão = 3.

##### "block_encrypted_archives" `[bool]`
- Detectar e bloquear compactados arquivos criptografados? Porque phpMussel não é capaz de analisar o conteúdo de arquivos criptografados, é possível que a criptografia de arquivo pode ser empregado por um atacante como meio de tentar contornar phpMussel, analisadores antivírus e outras dessas protecções. Instruindo phpMussel para bloquear quaisquer arquivos que ele descobrir a ser criptografada poderia ajudar a reduzir o risco associado a essas tais possibilidades. False = Não; True = Sim [Padrão].

##### "max_files_in_archives" `[int]`
- Número máximo de arquivos a serem analisados dentro dos arquivos antes de abortar a análise. Padrão = 0 (nenhum máximo).

##### "chameleon_from_php" `[bool]`
- Olha por PHP header em arquivos que são não PHP arquivos nem reconhecidos compactados arquivos. False = Inativo; True = Ativo.

##### "can_contain_php_file_extensions" `[string]`
- Uma lista de extensões de arquivos com permissão para conter código PHP, separadas por vírgulas. Se a detecção de ataques de camaleão PHP estiver ativada, os arquivos que contêm código PHP, que possuem extensões que não estão nesta lista, serão detectados como ataques de camaleão PHP.

##### "chameleon_from_exe" `[bool]`
- Olha por executável headers em arquivos que são não executáveis nem reconhecidos compactados arquivos e por executáveis cujos headers estão incorretas. False = Inativo; True = Ativo.

##### "chameleon_to_archive" `[bool]`
- Detectar headers incorretas em arquivos compactados. Suportados: BZ/BZIP2, GZ/GZIP, LZF, RAR, ZIP. False = Inativo; True = Ativo.

##### "chameleon_to_doc" `[bool]`
- Olha por office documentos cujos headers estão incorretas (Suportados: DOC, DOT, PPS, PPT, XLA, XLS, WIZ). False = Inativo; True = Ativo.

##### "chameleon_to_img" `[bool]`
- Olha por imagens cujos headers estão incorretas (Suportados: BMP, DIB, PNG, GIF, JPEG, JPG, XCF, PSD, PDD, WEBP). False = Inativo; True = Ativo.

##### "chameleon_to_pdf" `[bool]`
- Olha por PDF arquivos cujos headers estão incorretas. False = Inativo; True = Ativo.

##### "archive_file_extensions" `[string]`
- Reconhecidos arquivos extensões (formato é CSV; só deve adicionar ou remover quando problemas ocorrem; desnecessariamente removendo pode causar falso-positivos para aparecer por compactados arquivos, enquanto desnecessariamente adicionando será essencialmente whitelist o que você está adicionando contra ataque específica detecção; modificar com cautela; Também notar que este não tem efeito em qual compactados arquivos podem e não podem ser analisados no escopo de conteúdo). A lista, como é padrão, é do formatos utilizados mais comumente através da maioria dos sistemas e CMS, mas intencionalmente não é necessariamente abrangente.

##### "block_control_characters" `[bool]`
- Bloquear todos os arquivos que contenham quaisquer caracteres de controle, exceto linha quebras? Se você está *__APENAS__* carregando simple texto, então você pode ativar essa opção para fornecer alguma adicional proteção para o seu sistema. Mas, se você carregar qualquer coisa que não seja de texto simples, ativando isso pode resultas em falso positivos. False = Não bloquear [Padrão]; True = Bloquear.

##### "corrupted_exe" `[bool]`
- Corrompidos arquivos e erros de análise. False = Ignorar; True = Bloquear [Padrão]. Detectar e bloquear potencialmente corrompidos PE (Portátil Executável) arquivos? Frequentemente (mas não sempre), quando certos aspectos de um PE arquivo é corrompido ou não pode ser analisado corretamente, essa pode ser indicativo de uma viral infecção. Os processos utilizados pela maioria dos antivírus programas para detectar vírus em PE arquivos requerem analisando os arquivos de certas maneiras, que, se o programador de um vírus é consciente de, especificamente irá tentar impedir, a fim de permitir seu vírus para permanecer não detectado.

##### "decode_threshold" `[string]`
- Opcional limitação para o comprimento dos dados para que dentro de decodificar comandos devem ser detectados (em caso de existirem quaisquer notável problemas de desempenho enquanto analisando). Padrão = 512KB. Zero ou nulo valor desativa o limitação (removendo qualquer limitação baseado em tamanho do arquivo).

##### "scannable_threshold" `[string]`
- Opcional limitação para o comprimento dos dados brutos para que phpMussel é permitido a ler e analisar (em caso de existirem quaisquer notável problemas de desempenho enquanto analisando). Padrão = 32MB. Zero ou nulo valor desativa o limitação. Em geral, esse valor não deve ser menor que o médio arquivo tamanho de carregamentos que você quer e espera para receber no seu servidor ou website, não deve ser mais que o filesize_limit directivo, e não deve ser menor que aproximadamente um quinto do total permissível memória alocação concedido para PHP através do "php.ini" configuração arquivo. Esta directiva existe para tentar impedir phpMussel de usando demais memória (que seria impedir-lo de ser capaz de analisando arquivos acima de um certo tamanho com sucesso).

##### "allow_leading_trailing_dots" `[bool]`
- Permitir pontos iniciais e finais em nomes de arquivos? Às vezes, isso pode ser usado para ocultar arquivos, ou enganar alguns sistemas para permitir a passagem de diretórios. False = Não permitir [Padrão]. True = Permitir.

##### "block_macros" `[bool]`
- Tente bloquear todos os arquivos que contenham macros? Alguns tipos de documentos e planilhas podem conter macros executáveis, fornecendo assim um perigoso vetor potencial de malware. False = Não bloquear [Padrão]; True = Bloquear.

##### "only_allow_images" `[bool]`
- Quando definido como true, todos os arquivos encontrados pelo scanner que não são imagens serão sinalizados imediatamente, sem serem analisados. Isso pode ajudar a reduzir o tempo necessário para concluir uma análise em alguns casos. Defina como false por padrão.

#### "quarantine" (Categoria)
Configuração para a quarentena.

##### "quarantine_key" `[string]`
- O phpMussel pode colocar em quarentena os carregamentos de arquivos bloqueados, se isso é algo que você quer que ele faça. Casuais usuários de phpMussel de que simplesmente desejam proteger seus sites ou hospedagem sem ter qualquer interesse em profundamente analisando qualquer marcados tentados arquivos carregamentos deve deixar esta funcionalidade desativada, mas qualquer usuário interessado em mais profundamente analisando marcados tentados arquivos carregamentos para pesquisa de malware ou de similares tais coisas deve ativada essa funcionalidade. Quarentena de marcados tentados arquivos carregamentos às vezes pode também ajudar em depuração de falso-positivos, se isso é algo que ocorre com frequência para você. Por desativar a funcionalidade de quarentena, simplesmente deixar a directiva `quarantine_key` vazio, ou apagar o conteúdo do directivo, se ele não está já vazio. Por ativar a funcionalidade de quarentena, introduzir algum valor no directiva. O `quarantine_key` é um importante segurança característica do quarentena funcionalidade necessária como um meio de prevenir a funcionalidade de quarentena de ser explorada por potenciais atacantes e como meio de evitar qualquer potencial execução de dados armazenados dentro da quarentena. O `quarantine_key` devem ser tratados da mesma maneira como suas senhas: O mais longo o mais melhor, e guardá-lo com força. Por melhor efeito, usar em conjunto com `delete_on_sight`.

##### "quarantine_max_filesize" `[string]`
- O máximo permitido tamanho do arquivos serem colocados em quarentena. Arquivos maiores que este valor NÃO serão colocados em quarentena. Esta directiva é importante como um meio de torná-lo mais difícil por qualquer potenciais atacante para inundar sua quarentena com indesejados dados potencialmente causando excesso uso de dados no seu hospedagem serviço. Padrão = 2MB.

##### "quarantine_max_usage" `[string]`
- O uso máximo de memória permitido através do quarentena. Se o total de memória utilizada pelo quarentena atingir este valor, os mais antigos arquivos em quarentena serão apagados até que a total memória utilizada já não atinge este valor. Esta directiva é importante como um meio de torná-lo mais difícil por qualquer potenciais atacante para inundar sua quarentena com indesejados dados potencialmente causando excesso uso de dados no seu hospedagem serviço. Padrão = 64MB.

##### "quarantine_max_files" `[int]`
- O número máximo de arquivos que podem existir na quarentena. Quando novos arquivos são adicionados à quarentena, se esse número for excedido, os arquivos antigos serão excluídos até que o restante não exceda mais esse número. Padrão = 100.

#### "virustotal" (Categoria)
Configuração para integração do Virus Total.

##### "vt_public_api_key" `[string]`
- Opcionalmente, phpMussel é capaz de verificar os arquivos usando o Virus Total API como uma maneira de fornecer um nível de proteção muito maior contra vírus, trojans, malware e outras ameaças. Por padrão, verificação de arquivos usando o Virus Total API está desativado. Para ativá-lo, um Virus Total API chave é necessária. Devido ao benefício significativo que isso poderia fornecer a você, é algo que eu recomendo ativar. Esteja ciente, porém, que para usar o Virus Total API, você *__DEVE__* concordar com seus Termos de Uso e você *__DEVE__* aderir a todas as orientações conforme descrito pelo da Virus Total documentação! Você NÃO tem permissão para usar este recurso de integração EXCETO SE: Você leu e concorda com os Termos de Uso da Virus Total e sua API. Você leu e você compreender, no mínimo, o preâmbulo da Virus Total Pública API documentação (tudo depois "VirusTotal Public API v2.0" mas antes "Contents").

Veja também:
- [Terms of Service](https://www.virustotal.com/en/about/terms-of-service/)
- [Getting started](https://developers.virustotal.com/reference)

##### "vt_suspicion_level" `[int]`
- Por padrão, phpMussel restringirá os arquivos que são verificado usando o Virus Total API a esses arquivos que considera "suspeito". Opcionalmente, você pode ajustar essa restrição via alterando o valor ao `vt_suspicion_level` directiva.

##### "vt_weighting" `[int]`
- Deve phpMussel aplicar os resultados de analisando usando o Virus Total API como detecções ou como detecção ponderação? Esta directiva existe, porque, embora verificando um arquivo usando múltiplos mecanismos (como Virus Total faz) deve resultar em um aumento da taxa de detecção (e por conseguinte em um maior número de arquivos maliciosos detectados), isto também pode resultar em um aumento número de falsos positivos, e por conseguinte, em algumas circunstâncias, os resultados de análise pode ser melhor utilizado como uma pontuação de confiança e não como uma conclusão definitiva. Se um valor de 0 é usado, os resultados de análise usando o Virus Total API será aplicado como detecções, e por conseguinte, Se qualquer mecanismo usado pelo Virus Total marca o arquivo que está sendo analisado como sendo malicioso, phpMussel considerará o arquivo a ser malicioso. Se qualquer outro valor é usado, os resultados de análise usando o Virus Total API será aplicado como detecção ponderação, e por conseguinte, o número de mecanismos utilizados pela Virus Total que marcar o arquivo que está sendo analisado como sendo malicioso servirá como uma pontuação de confiança (ou ponderação de detecção) para se ou não o arquivo que está sendo analisado deve ser considerado malicioso por phpMussel (o valor utilizado representará o mínima pontuação de confiança ou peso requerido a fim de ser considerado malicioso). Um valor de 0 é usado por padrão.

##### "vt_quota_rate" `[int]`
- De acordo com o Virus Total API documentação, é limitada a, no máximo, 4 solicitações de qualquer natureza dentro qualquer 1 minuto período de tempo. Se você executar um honeyclient, honeypot ou qualquer outro automação que vai fornecer recursos para Virus Total e não só recuperar relatórios você tem direito a uma melhor solicitações cota. Por padrão, phpMussel vai aderir estritamente a estas limitações, mas, devido à possibilidade de essas cotas a ser aumentada, estas duas directivas são fornecidos como um meio para que você possa instruir phpMussel sobre o limite que deve aderir para. Excepto se tenha sido instruído a fazê-lo, não é recomendado para você aumentar esses valores, mas, se você encontrou problemas relacionados com a atingir sua cota, diminuir esses valores podem *__POR VEZES__* ajudá-lo em lidar com estes problemas. Seu taxa limite é determinada como `vt_quota_rate` solicitações de qualquer natureza dentro qualquer `vt_quota_time` minuto período de tempo.

##### "vt_quota_time" `[int]`
- (Ver descrição acima).

#### "urlscanner" (Categoria)
Configuração para o analisador de URL.

##### "google_api_key" `[string]`
- Permite o uso do Google Safe Browsing API quando a API chave necessária está definida.

Veja também:
- [Google API Console](https://console.developers.google.com/)

##### "maximum_api_lookups" `[int]`
- Número máximo admissível de API solicitações para executar por cada iteração de análise. Porque cada API solicitação adicional irá acrescentar ao tempo total necessário para completar cada iteração de análise, você pode querer estipular uma limitação a fim de acelerar o processo de análise. Quando definido para 0, nenhuma número máximo admissível será aplicada. Definido para 10 por padrão.

##### "maximum_api_lookups_response" `[bool]`
- Que fazer se o número máximo admissível de API solicitações está ultrapassado? False = Fazer nada (continuar o processamento) [Padrão]; True = Marcar/bloquear o arquivo.

##### "cache_time" `[int]`
- Quanto tempo (em segundos) devem os resultados da API ser armazenados em cache? Padrão é 3600 segundos (1 hora).

#### "legal" (Categoria)
Configuração para requisitos legais.

##### "pseudonymise_ip_addresses" `[bool]`
- Pseudonimiza endereços IP ao escrever os arquivos de log? True = Sim [Padrão]; False = Não.

##### "privacy_policy" `[string]`
- O endereço de uma política de privacidade relevante a ser exibida no rodapé de qualquer página gerada. Especifique um URL, ou deixe em branco para desabilitar.

#### "supplementary_cache_options" (Categoria)
Opções de cache suplementares. Nota: Alterar estes valores podem potencialmente fazer você ser estar desconectado.

##### "prefix" `[string]`
- O valor especificado aqui será adicionado ao começo das chaves para todas as entradas de cache. Padrão = "phpMussel_". Quando existem várias instalações no mesmo servidor, isso pode ser útil para manter seus caches separados uns dos outros.

##### "enable_apcu" `[bool]`
- Especifica se deve tentar usar o APCu para armazenamento em cache. Padrão = True.

##### "enable_memcached" `[bool]`
- Especifica se deve tentar usar o Memcached para armazenamento em cache. Padrão = False.

##### "enable_redis" `[bool]`
- Especifica se deve tentar usar o Redis para armazenamento em cache. Padrão = False.

##### "enable_pdo" `[bool]`
- Especifica se deve tentar usar o PDO para armazenamento em cache. Padrão = False.

##### "memcached_host" `[string]`
- Valor da host do Memcached. Padrão = "localhost".

##### "memcached_port" `[int]`
- Valor da porta do Memcached. Padrão = "11211".

##### "redis_host" `[string]`
- Valor da host do Redis. Padrão = "localhost".

##### "redis_port" `[int]`
- Valor da porta do Redis. Padrão = "6379".

##### "redis_timeout" `[float]`
- Valor de tempo limite do Redis. Padrão = "2.5".

##### "pdo_dsn" `[string]`
- Valor DSN do PDO. Padrão = "mysql:dbname=phpmussel;host=localhost;port=3306".

__FAQ.__ <em><a href="https://github.com/phpMussel/Docs/blob/master/readme.pt.md#HOW_TO_USE_PDO" hreflang="pt">O que é um "PDO DSN"? Como posso usar o PDO com o phpMussel?</a></em>

##### "pdo_username" `[string]`
- O nome de usuário do PDO.

##### "pdo_password" `[string]`
- A senha do PDO.

#### "frontend" (Categoria)
Configuração para o front-end.

##### "frontend_log" `[string]`
- Arquivo para registrar tentativas de login ao front-end. Especifique o nome de um arquivo, ou deixe em branco para desabilitar.

##### "max_login_attempts" `[int]`
- Número máximo de tentativas de login ao front-end. Padrão = 5.

##### "numbers" `[string]`
- Como você prefere que os números sejam exibidos? Selecione o exemplo que parece mais correto para você.

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

##### "default_algo" `[string]`
- Define qual algoritmo usar para todas as futuras senhas e sessões.

```
default_algo
├─PASSWORD_DEFAULT ("PASSWORD_DEFAULT")
├─PASSWORD_BCRYPT ("PASSWORD_BCRYPT")
├─PASSWORD_ARGON2I ("PASSWORD_ARGON2I")
└─PASSWORD_ARGON2ID ("PASSWORD_ARGON2ID (PHP >= 7.3.0)")
```

##### "theme" `[string]`
- A estética a ser usada no front-end do phpMussel.

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
└─…Outros
```

##### "magnification" `[float]`
- Ampliação de fonte. Padrão = 1.

##### "custom_header" `[string]`
- Inserido como HTML no início de todas as páginas do front-end. Isso pode ser útil caso você queira incluir um logotipo de site, cabeçalho personalizado, scripts, ou similares em todas essas páginas.

##### "custom_footer" `[string]`
- Inserido como HTML no final de todas as páginas do front-end. Isso pode ser útil caso você queira incluir um aviso legal, link de contato, informações comerciais, ou similares em todas essas páginas.

#### "web" (Categoria)
Configuração para o manipulador de carregamentos.

##### "uploads_log" `[string]`
- Onde todos os carregamentos bloqueados devem ser registrados. Especifique um arquivo nome, ou deixe branco para desativar.

##### "forbid_on_block" `[bool]`
- Deve phpMussel enviar 403 cabeçalho com a bloqueado arquivo carregamento mensagem, ou ficar com os habituais 200 OK? False = Não (200); True = Sim (403) [Padrão].

##### "unsupported_media_type_header" `[bool]`
- Deve phpMussel enviar 415 cabeçalhos quando os uploads são bloqueados devido a tipos de arquivos na lista negra? Quando true, esta configuração substitui `forbid_on_block`. False = Não [Padrão]; True = Sim.

##### "max_uploads" `[int]`
- O máximo permitido número de arquivos para analisar durante os arquivos carregamentos análise antes de abortar a análise e informando ao usuário eles estão carregando demais muito de uma vez! Oferece proteção contra um teórico ataque pelo qual um atacante tenta DDoS o seu sistema ou CMS por meio de sobrecarregando phpMussel a fim de retardar o PHP processo para uma parada. Recomendado: 10. Você pode querer aumentar ou diminuir esse número, dependendo das atributos do seu hardware. Note-se que este número não lev. Em conta ou incluir o conteúdos dos compactados arquivos.

##### "ignore_upload_errors" `[bool]`
- Essa directiva deve ser geralmente desativada a menos que seja necessário por correta funcionalidade de phpMussel no seu específico sistema. Normalmente, quando desativado, quando phpMussel detecta a presença de elementos dentro a `$_FILES` array(), ele tentará iniciar uma análise dos arquivos que esses elementos representam, e, se esses elementos estão branco ou vazia, phpMussel irá retornar uma erro mensagem. Esse é um apropriado comportamento por phpMussel. Mas, por alguns CMS, vazios elementos podem ocorrer como resultado do natural comportamento dessas CMS, ou erros podem ser reportado quando não houver alguma, nesse caso, o normal comportamento por phpMussel será interferindo com o normal comportamento dessas CMS. Se tal situação ocorre por você, ativando esta opção irá instruir phpMussel para não tentar iniciar um análise por tais vazios elementos, ignorá-los quando encontrado e para não retornar qualquer relacionado erro mensagens, assim, permitindo a continuação da página carga. False = DESATIVADO; True = ATIVADO.

##### "theme" `[string]`
- A estética a ser usada na página "Carregar Negado".

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
└─…Outros
```

##### "magnification" `[float]`
- Ampliação de fonte. Padrão = 1.

##### "custom_header" `[string]`
- Inserido como HTML no início de todas as páginas "carregar negado". Isso pode ser útil caso você queira incluir um logotipo de site, cabeçalho personalizado, scripts, ou similares em todas essas páginas.

##### "custom_footer" `[string]`
- Inserido como HTML no final de todas as páginas "carregar negado". Isso pode ser útil caso você queira incluir um aviso legal, link de contato, informações comerciais, ou similares em todas essas páginas.

#### "phpmailer" (Categoria)
Configuração para PHPMailer (usado para autenticação de dois fatores).

##### "event_log" `[string]`
- Um arquivo para registrar todos os eventos em relação ao PHPMailer. Especifique o nome de um arquivo, ou deixe em branco para desabilitar.

##### "enable_two_factor" `[bool]`
- Esta diretiva determina se deve usar 2FA para contas front-end.

##### "enable_notifications" `[string]`
- Se você deseja ser notificado por email quando um carregamento estiver bloqueado, especifique o endereço de email do destinatário aqui.

##### "skip_auth_process" `[bool]`
- Definir essa diretiva como `true` instrui o PHPMailer a ignorar o processo de autenticação que normalmente ocorre ao enviar e-mail via SMTP. Isso deve ser evitado, porque ignorar esse processo pode expor o e-mail de saída a ataques MITM, mas pode ser necessário nos casos em que esse processo impedir que o PHPMailer se conecte a um servidor SMTP.

##### "host" `[string]`
- O host SMTP a ser usado para e-mail de saída.

##### "port" `[int]`
- O número da porta a ser usado para o e-mail de saída. Padrão = 587.

##### "smtp_secure" `[string]`
- O protocolo a ser usado ao enviar e-mail via SMTP (TLS ou SSL).

```
smtp_secure
├─default ("-")
├─tls ("TLS")
└─ssl ("SSL")
```

##### "smtp_auth" `[bool]`
- Esta diretiva determina se autenticar sessões SMTP (geralmente deve ser deixado em paz).

##### "username" `[string]`
- O nome de usuário a ser usada ao enviar e-mail via SMTP.

##### "password" `[string]`
- A senha a ser usada ao enviar e-mail via SMTP.

##### "set_from_address" `[string]`
- O endereço do remetente a ser citado ao enviar e-mail via SMTP.

##### "set_from_name" `[string]`
- O nome do remetente a ser citado ao enviar e-mail via SMTP.

##### "add_reply_to_address" `[string]`
- O endereço de resposta a ser citado ao enviar e-mail via SMTP.

##### "add_reply_to_name" `[string]`
- O nome da resposta a ser citado ao enviar e-mail via SMTP.

---


### 6. <a name="SECTION6"></a>FORMATOS DE ASSINATURAS

*Veja também:*
- *[O que é uma "assinatura"?](#WHAT_IS_A_SIGNATURE)*

Os primeiros 9 bytes `[x0-x8]` de um arquivo de assinaturas para phpMussel são `phpMussel`, e atua como um "número mágico" (magic number), para identificá-los como arquivos de assinaturas (isso ajuda a evitar que o phpMussel tente acidentalmente usar arquivos que não sejam arquivos de assinaturas). O próximo byte `[x9]` identifica o tipo de arquivo de assinaturas, que phpMussel deve saber para poder interpretar corretamente o arquivo de assinaturas. Os seguintes tipos de arquivos de assinaturas são reconhecidos:

Tipo | Byte | Descrição
---|---|---
`General_Command_Detections` | `0?` | Para arquivos de assinaturas usando CSV (valores separados por vírgula). Valores (assinaturas) são cadeias codificadas em hexadecimal para procurar dentro de arquivos. As assinaturas aqui não têm nenhum nome ou outros detalhes (apenas a cadeia a ser detectada).
`Filename` | `1?` | Para assinaturas do nomes de arquivos.
`Hash` | `2?` | Para assinaturas de hash.
`Standard` | `3?` | Para arquivos de assinaturas que funcionam diretamente com o conteúdos de arquivos.
`Standard_RegEx` | `4?` | Para arquivos de assinaturas que funcionam diretamente com o conteúdos de arquivos. As assinaturas podem conter expressões regulares.
`Normalised` | `5?` | Para arquivos de assinatura que funcionam com o conteúdos de arquivos normalizado para ANSI.
`Normalised_RegEx` | `6?` | Para arquivos de assinatura que funcionam com o conteúdos de arquivos normalizado para ANSI. As assinaturas podem conter expressões regulares.
`HTML` | `7?` | Para arquivos de assinatura que funcionam com o conteúdos de arquivos normalizado para HTML.
`HTML_RegEx` | `8?` | Para arquivos de assinatura que funcionam com o conteúdos de arquivos normalizado para HTML. As assinaturas podem conter expressões regulares.
`PE_Extended` | `9?` | Para arquivos de assinaturas que funcionam com os metadados de archivos PE (mas não com metadados seccionais PE).
`PE_Sectional` | `A?` | Para arquivos de assinaturas que funcionam com metadados seccionais PE.
`Complex_Extended` | `B?` | Para arquivos de assinaturas que funcionam com várias regras com base em metadados expandidos gerados pelo phpMussel.
`URL_Scanner` | `C?` | Para arquivos de assinaturas que funcionam com URLs.

O próximo byte `[x10]` é uma nova linha `[0A]`, e conclui o cabeçalho do arquivo de assinaturas para phpMussel.

Cada linha não vazia depois disso é uma assinatura ou regra. Cada assinatura ou regra ocupa uma linha. Os formatos de assinatura suportados são descritos abaixo.

#### *ASSINATURAS DE ARQUIVO NOME*
Todas as assinaturas de arquivo nome seguir o formato:

`NOME:FNRX`

Onde NOME é o nome para citar por essa assinatura e FNRX é o regex para verificar arquivos nomes (não codificados) contra.

#### *ASSINATURAS HASH*
Todas as assinaturas hash seguir o formato:

`HASH:TAMANHO:NOME`

Onde HASH é o hash (geralmente MD5) de um inteiro arquivo, TAMANHO é o total tamanho do arquivo e NOME é o nome para citar por essa assinatura.

#### *ASSINATURAS PE SECCIONAL*
Todas as assinaturas PE Seccional seguir o formato:

`TAMANHO:HASH:NOME`

Onde HASH é o hash MD5 de uma seção do PE arquivo, TAMANHO é o total tamanho da seção e NOME é o nome para citar por essa assinatura.

#### *ASSINATURAS PE ESTENDIDAS*
Todas as assinaturas PE estendidas seguir o formato:

`$VAR:HASH:TAMANHO:NOME`

Onde $VAR é o nome da PE variável para verificar contra, HASH é o MD5 dessa variável, TAMANHO é o tamanho total dessa variável e NOME é o nome para citar por essa assinatura.

#### *COMPLEXOS ESTENDIDAS ASSINATURAS*
Complexos estendidas assinaturas são bastante diferente para os outros tipos de assinaturas possíveis com phpMussel em que o que eles estão verificando contra é especificado pelas assinaturas e eles podem verificar contra vários critérios. Os critérios de verificação são delimitados por ";" e o verificação tipo e os verificação dados de cada verificação critérios é delimitados por ":" como assim que o formato por estas assinaturas tende a olhar um pouco assim:

`$variável1:ALGUNSDADOS;$variável2:ALGUNSDADOS;AssinaturaNome`

#### *TODAS OUTRAS*
Todas as outras assinaturas seguir o formato:

`NOME:HEX:FROM:TO`

Onde NOME é o nome para citar por essa assinatura e HEX é um hexadecimal codificado segmento do arquivo intentado a ser correspondido pela dado assinatura. TO e FROM são opcionais parâmetros, indicando de onde e para quais posições nos origem dados para verificar contra.

#### *REGEX (REGULAR EXPRESSIONS)*
Qualquer forma de regex compreendido e processado corretamente pelo PHP também deve ser correctamente compreendido e processado por phpMussel e suas assinaturas. Mas, eu sugiro tomar extremo cuidado quando escrevendo novas assinaturas baseadas regex, porque, se você não está inteiramente certo do que está fazendo, isto pode tem altamente irregulares e inesperadas resultados. Olha para o código-fonte de phpMussel Se você não está totalmente certo sobre o contexto em que as regex declarações são processada. Além, lembre-se que todos isso (com exceção para arquivo nome, compactado arquivo metadados, MD5 a sintaxe) deve ser codificado hexadecimalmente!

---


### 7. <a name="SECTION7"></a>CONHECIDOS COMPATIBILIDADE PROBLEMAS

#### ANTIVÍRUS SOFTWARE COMPATIBILIDADE

Problemas de compatibilidade entre o phpMussel e alguns fornecedores de antivírus às vezes ocorreram no passado, então, a cada poucos meses ou por aí, eu verifico as últimas versões disponíveis da base de código phpMussel contra o Virus Total, para ver se há algum problema reportado lá. Quando os problemas são reportados lá, eu lista as problemas reportados aqui, na documentação.

Quando verifiquei mais recentemente (2022.05.12), nenhum problema foi reportado.

Não verifico os arquivos de assinatura, a documentação ou outro conteúdo periférico. Os arquivos de assinatura sempre causam alguns falsos positivos quando detectados por outras soluções antivírus. Portanto, recomendo vivamente que, se você planeja instalar o phpMussel em uma máquina em que já exista outra solução antivírus, para adicionar os arquivos de assinatura do phpMussel na sua lista branca.

*Veja também: [Gráficos de Compatibilidade](https://maikuolan.github.io/Compatibility-Charts/).*

---


### 8. <a name="SECTION8"></a>PERGUNTAS MAIS FREQUENTES (FAQ)

- [O que é uma "assinatura"?](#WHAT_IS_A_SIGNATURE)
- [O que é um "falso positivo"?](#WHAT_IS_A_FALSE_POSITIVE)
- [Com que frequência as assinaturas são atualizadas?](#SIGNATURE_UPDATE_FREQUENCY)
- [Eu encontrei um problema ao usar phpMussel e eu não sei o que fazer sobre isso! Ajude-me!](#ENCOUNTERED_PROBLEM_WHAT_TO_DO)
- [Eu quero usar phpMussel v3 com uma versão PHP mais velha do que 7.2.0; Você pode ajudar?](#MINIMUM_PHP_VERSION_V3)
- [Posso usar uma única instalação do phpMussel para proteger vários domínios?](#PROTECT_MULTIPLE_DOMAINS)
- [Eu não quero mexer com a instalação deste e fazê-lo funcionar com o meu site; Posso pagar-te para fazer tudo por mim?](#PAY_YOU_TO_DO_IT)
- [Posso contratar você ou qualquer um dos desenvolvedores deste projeto para o trabalho privado?](#HIRE_FOR_PRIVATE_WORK)
- [Preciso de modificações especializadas, customizações, etc; Você pode ajudar?](#SPECIALIST_MODIFICATIONS)
- [Eu sou um desenvolvedor, designer de site, ou programador. Posso aceitar ou oferecer trabalho relacionado a este projeto?](#ACCEPT_OR_OFFER_WORK)
- [Quero contribuir para o projeto; Posso fazer isso?](#WANT_TO_CONTRIBUTE)
- [Como acessar detalhes específicos sobre os arquivos quando eles são analisados?](#SCAN_DEBUGGING)
- [Blacklists (listas negras) – Whitelists (listas brancas) – Greylists (listas cinzentas) – Quais são eles e como eu os uso?](#BLACK_WHITE_GREY)
- [O que é um "PDO DSN"? Como posso usar o PDO com o phpMussel?](#HOW_TO_USE_PDO)
- [Meu recurso de upload é assíncrono (p.e., usa ajax, ajaj, json, etc). Não vejo nenhuma mensagem ou aviso especial quando um upload é bloqueado. O que está acontecendo?](#AJAX_AJAJ_JSON)
- [O phpMussel pode detectar o EICAR?](#DETECT_EICAR)

#### <a name="WHAT_IS_A_SIGNATURE"></a>O que é uma "assinatura"?

No contexto do phpMussel, uma "assinatura" refere-se a dados que actuam como um indicador/identificador para algo específico que estamos procurando, geralmente sob a forma de um segmento muito pequeno, distinto e inócuo de algo maior e em caso contrário prejudiciais, como um vírus ou um trojan, ou na forma de um checksum de arquivo, hash, ou outro indicador de identificação semelhante, e geralmente inclui uma etiqueta, e alguns outros dados para ajudar a fornecer contexto adicional que pode ser usado por phpMussel para determinar a melhor maneira de proceder quando ele encontra o que estamos procurando.

#### <a name="WHAT_IS_A_FALSE_POSITIVE"></a>O que é um "falso positivo"?

O termo "falso positivo" (*alternativamente: "erro de falso positivo"; "alarme falso"*; Inglês: *false positive*; *false positive error*; *false alarm*), descrita de maneira muito simples, e num contexto generalizado, são usadas quando testando para uma condição, para se referir aos resultados desse teste, quando os resultados são positivos (isto é, a condição é determinada para ser "positivo", ou "verdadeiro"), mas espera-se que seja (ou deveria ter sido) negativo (isto é, a condição, na realidade, é "negativo", ou "falso"). Um "falso positivo" pode ser considerado análogo ao "chorando lobo" (em que a condição que está sendo testada é se existe um lobo perto do rebanho, a condição é "falso" em que não há nenhum lobo perto do rebanho, ea condição é relatada como "positivo" pelo pastor por meio de gritando "lobo, lobo"), ou análoga a situações em exames médicos em que um paciente é diagnosticado como tendo alguma doença quando, na realidade, eles não têm essa doença.

Os resultados relacionados a quando testando para uma condição pode ser descrito usando os termos "verdadeiro positivo", "verdadeiro negativo" e "falso negativo". Um "verdadeiro positivo" refere-se a quando os resultados do teste ea real situação da condição são ambos verdadeiros (ou "positivos"), e um "verdadeiro negativo" refere-se a quando os resultados do teste ea real situação da condição são ambos falsos (ou "negativos"); Um "verdadeiro positivo" ou um "verdadeiro negativo" é considerado como sendo uma "inferência correcta". A antítese de um "falso positivo" é um "falso negativo"; Um "falso negativo" refere-se a quando os resultados do teste are negativo (isto é, a condição é determinada para ser "negativo", ou "falso"), mas espera-se que seja (ou deveria ter sido) positivo (isto é, a condição, na realidade, é "positivo", ou "verdadeiro").

No contexto da phpMussel, estes termos referem-se as assinaturas de phpMussel e os arquivos que eles bloqueiam. Quando phpMussel bloquear um arquivo devido ao mau, desatualizados ou incorretos assinatura, mas não deveria ter feito isso, ou quando ele faz isso pelas razões erradas, nos referimos a este evento como um "falso positivo". Quando phpMussel não consegue bloquear um arquivo que deveria ter sido bloqueado, devido a ameaças imprevistas, assinaturas em falta ou déficits em suas assinaturas, nos referimos a este evento como um "detecção em falta" ou "missing detection" (que é análogo a um "falso negativo").

Isto pode ser resumido pela seguinte tabela:

&nbsp; | phpMussel *NÃO* deve bloquear um arquivo | phpMussel *DEVE* bloquear um arquivo
---|---|---
phpMussel *NÃO* bloquear um arquivo | Verdadeiro negativo (inferência correcta) | Detecção em falta (análogo a um falso negativo)
phpMussel *FAZ* bloquear um arquivo | __Falso positivo__ | Verdadeiro positivo (inferência correcta)

#### <a name="SIGNATURE_UPDATE_FREQUENCY"></a>Com que frequência as assinaturas são atualizadas?

A frequência das atualizações varia de acordo com os arquivos de assinatura em questão. Todos os mantenedores dos arquivos de assinatura de phpMussel geralmente tentam manter suas assinaturas atualizadas como é possível, mas devido a que todos nós temos vários outros compromissos, nossas vidas fora do projeto, e devido a que nenhum de nós é financeiramente compensado (ou pago) para nossos esforços no projeto, um cronograma de atualização preciso não pode ser garantido. Geralmente, as assinaturas são atualizadas sempre que há tempo suficiente para atualizá-las. Assistência é sempre apreciada se você estiver disposto a oferecer qualquer.

#### <a name="ENCOUNTERED_PROBLEM_WHAT_TO_DO"></a>Eu encontrei um problema ao usar phpMussel e eu não sei o que fazer sobre isso! Ajude-me!

- Você está usando a versão mais recente do software? Você está usando as versões mais recentes de seus arquivos de assinatura? Se a resposta a qualquer destas duas perguntas é não, tente atualizar tudo primeiro, e verifique se o problema persiste. Se persistir, continue lendo.
- Você já examinou toda a documentação? Se não, por favor, faça isso. Se o problema não puder ser resolvido usando a documentação, continue lendo.
- Você já examinou a **[página de issues](https://github.com/phpMussel/phpMussel/issues)**, para ver se o problema foi mencionado antes? Se já foi mencionado antes, verificar se foram fornecidas sugestões, ideias e/ou soluções, e siga conforme necessário para tentar resolver o problema.
- Se o problema ainda persistir, por favor procure ajuda sobre isso através de criando um novo issue na página de issues.

#### <a name="MINIMUM_PHP_VERSION_V3"></a>Eu quero usar phpMussel v3 com uma versão PHP mais velha do que 7.2.0; Você pode ajudar?

Não. PHP >= 7.2.0 é um requisito mínimo para phpMussel v3.

*Veja também: [Gráficos de Compatibilidade](https://maikuolan.github.io/Compatibility-Charts/).*

#### <a name="PROTECT_MULTIPLE_DOMAINS"></a>Posso usar uma única instalação do phpMussel para proteger vários domínios?

Sim.

#### <a name="PAY_YOU_TO_DO_IT"></a>Eu não quero mexer com a instalação deste e fazê-lo funcionar com o meu site; Posso pagar-te para fazer tudo por mim?

Talvez. Isso é considerado caso a caso. Deixe-nos saber do que você precisa, o que você está oferecendo, e nós vamos deixar você saber se podemos ajudar.

#### <a name="HIRE_FOR_PRIVATE_WORK"></a>Posso contratar você ou qualquer um dos desenvolvedores deste projeto para o trabalho privado?

*Veja acima.*

#### <a name="SPECIALIST_MODIFICATIONS"></a>Preciso de modificações especializadas, customizações, etc; Você pode ajudar?

*Veja acima.*

#### <a name="ACCEPT_OR_OFFER_WORK"></a>Eu sou um desenvolvedor, designer de site, ou programador. Posso aceitar ou oferecer trabalho relacionado a este projeto?

Sim. Nossa licença não proíbe isso.

#### <a name="WANT_TO_CONTRIBUTE"></a>Quero contribuir para o projeto; Posso fazer isso?

Sim. As contribuições para o projeto são muito bem-vindas. Consulte "CONTRIBUTING.md" para obter mais informações.

#### <a name="SCAN_DEBUGGING"></a>Como acessar detalhes específicos sobre os arquivos quando eles são analisados?

Você pode acessar detalhes específicos sobre arquivos quando eles são analisados, atribuindo uma matriz para usar para esse propósito antes de instruir o phpMussel para analisá-los.

No exemplo abaixo, `$Foo` é atribuído para este propósito. Depois de analisar `/caminho/de/arquivo/...`, informações detalhadas sobre os arquivos contidos em `/caminho/de/arquivo/...` serão contidas por `$Foo`.

```PHP
<?php
$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);

$Scanner->setScanDebugArray($Foo);

$Results = $Scanner->scan('/caminho/de/arquivo/...');

var_dump($Foo);
```

A matriz é uma matriz multidimensional consistindo em elementos que representam cada arquivo sendo analisado e subelementos que representam os detalhes sobre esses arquivos. Esses subelementos são os seguintes:

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

*† - Não fornecido com os resultados em cache (fornecido para novos resultados de análise apenas).*

*‡ - Fornecido ao analisar arquivos PE apenas.*

Opcionalmente, esta matriz pode ser destruída usando o seguinte:

```PHP
$Scanner->destroyScanDebugArray($Foo);
```

#### <a name="BLACK_WHITE_GREY"></a>Blacklists (listas negras) – Whitelists (listas brancas) – Greylists (listas cinzentas) – Quais são eles e como eu os uso?

Os termos têm diferentes significados em diferentes contextos. No phpMussel, existem três contextos em que esses termos são usados: Resposta do tamanho do arquivo, resposta do tipo de arquivo, e a lista cinza das assinaturas.

A fim de alcançar um resultado desejado a um custo mínimo para o processamento, existem algumas coisas simples que o phpMussel pode verificar antes de realmente verificar os arquivos, como tamanho, nome e extensão de um arquivo. Por exemplo; Se um arquivo é muito grande, ou se sua extensão indicar um tipo de arquivo que não queremos permitir em nossos sites de qualquer maneira, podemos marcar o arquivo imediatamente e não há necessidade de analisá-lo.

A resposta do tamanho do arquivo é a maneira como o phpMussel responde quando um arquivo excede um limite especificado. Embora nenhuma lista real esteja envolvida, um arquivo pode ser considerado na lista negra, na lista branca, ou na lista cinza, com base em seu tamanho. Existem duas diretivas de configuração opcionais separadas para especificar um limite e uma resposta desejada, respectivamente.

A resposta do tipo de arquivo é a maneira como o phpMussel responde à extensão do arquivo. Existem três diretivas de configuração opcionais separadas para especificar explicitamente quais extensões devem ser colocadas na lista negra, na lista de branca, ou na lista cinza. Um arquivo pode ser considerado na lista negra, na lista de branca, ou na lista cinza, se sua extensão corresponder a qualquer uma das extensões especificadas, respectivamente.

Nestes dois contextos, a lista branca significa que não deve ser analisada ou marcada; estar na lista negra significa que deve ser marcada (e que, portanto, não precisamos analisá-lo); e estar na lista cinza significa uma análise mais aprofundada é necessária para determinar se devemos marcá-lo (isto é, deve ser analisado).

A lista cinza da assinaturas é uma lista de assinaturas que devem ser essencialmente ignoradas (isso é brevemente mencionado anteriormente na documentação). Quando uma assinatura na lista cinza é desencadeadas, o phpMussel continua a trabalhar através de suas assinaturas e não toma nenhuma ação específica em relação à assinatura na lista cinza. Não há lista negra da assinaturas, porque o comportamento implícito é o comportamento normal para assinaturas desencadeadas de qualquer maneira, e não há lista branca da assinaturas, porque o comportamento implícito não faria realmente sentido em relação ao funcionamento normal do phpMussel e aos recursos que ele já possui.

A lista de cinza da assinaturas é útil se você precisar resolver problemas causados por uma assinatura específica sem desabilitar ou desinstalar todo os arquivo do assinaturas.

#### <a name="HOW_TO_USE_PDO"></a>O que é um "PDO DSN"? Como posso usar o PDO com o phpMussel?

"PDO" é um acrônimo para "[PHP data objects](https://www.php.net/manual/pt_BR/intro.pdo.php)" (objetos de dados PHP). Ele fornece uma interface para o PHP poder se conectar a alguns sistemas de banco de dados comumente utilizados por vários aplicativos PHP.

"DSN" é um acrônimo para "[data source name](https://pt.wikipedia.org/wiki/Data_source_name)" (nome da fonte de dados). O "PDO DSN" descreve ao PDO como ele deve se conectar a um banco de dados.

O phpMussel oferece a opção de utilizar o PDO para fins de armazenamento em cache. Para que isso funcione corretamente, você precisará configurar o phpMussel adequadamente, habilitando a PDO, criar um novo banco de dados para o phpMussel usar (se você ainda não tem em mente um banco de dados para o phpMussel usar), e criar um novo tabela em seu banco de dados de acordo com a estrutura descrita abaixo.

Quando uma conexão com o banco de dados for bem-sucedida, mas a tabela necessária não existir, ela tentará criá-la automaticamente. Mas, esse comportamento não foi extensivamente testado e o sucesso não pode ser garantido.

Obviamente, isso só se aplica se você realmente quiser que o phpMussel use o PDO. Se você estiver suficientemente satisfeito pelo phpMussel de usar o cache de arquivos simples (por sua configuração padrão) ou qualquer uma das várias outras opções de cache fornecidas, não será necessário se preocupar em configurar bancos de dados, tabelas e assim por diante.

A estrutura descrita abaixo usa "phpmussel" como o nome do banco de dados, mas você pode usar o nome que desejar para o banco de dados, contanto que o mesmo nome seja replicado na configuração do DSN.

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

A diretiva de configuração `pdo_dsn` do phpMussel deve ser configurada conforme descrito abaixo.

```
Dependendo do driver de banco de dados usado...
├─4d (Aviso: Experimental, não testado, não recomendado!)
│ │
│ │         ╔═══════╗
│ └─4D:host=localhost;charset=UTF-8
│           ╚╤══════╝
│            └O host para conectar-se para encontrar o banco de dados.
├─cubrid
│ │
│ │             ╔═══════╗      ╔═══╗        ╔═════╗
│ └─cubrid:host=localhost;port=33000;dbname=example
│               ╚╤══════╝      ╚╤══╝        ╚╤════╝
│                │              │            └O nome do banco de dados a ser
│                │              │             usado.
│                │              │
│                │              └O número da porta com a qual se conectar ao
│                │               host.
│                │
│                └O host para conectar-se para encontrar o banco de dados.
├─dblib
│ │
│ │ ╔═══╗      ╔═══════╗        ╔═════╗
│ └─dblib:host=localhost;dbname=example
│   ╚╤══╝      ╚╤══════╝        ╚╤════╝
│    │          │                └O nome do banco de dados a ser usado.
│    │          │
│    │          └O host para conectar-se para encontrar o banco de dados.
│    │
│    └Valores possíveis: "mssql", "sybase", "dblib".
├─firebird
│ │
│ │                 ╔═══════════════════╗
│ └─firebird:dbname=/path/to/database.fdb
│                   ╚╤══════════════════╝
│                    ├Pode ser um caminho para um arquivo de banco de dados
│                    │local.
│                    │
│                    ├Pode se conectar com um host e um número de porta.
│                    │
│                    └Você deve consultar a documentação do Firebird se quiser
│                     usá-lo.
├─ibm
│ │
│ │         ╔═════╗
│ └─ibm:DSN=example
│           ╚╤════╝
│            └O banco de dados catalogado para se conectar.
├─informix
│ │
│ │              ╔═════╗
│ └─informix:DSN=example
│                ╚╤════╝
│                 └O banco de dados catalogado para se conectar.
├─mysql (Mais recomendado!)
│ │
│ │              ╔═════╗      ╔═══════╗      ╔══╗
│ └─mysql:dbname=example;host=localhost;port=3306
│                ╚╤════╝      ╚╤══════╝      ╚╤═╝
│                 │            │              └O número da porta com a qual se
│                 │            │               conectar ao host.
│                 │            │
│                 │            └O host para conectar-se para encontrar o banco
│                 │             de dados.
│                 │
│                 └O nome do banco de dados a ser usado.
├─oci
│ │
│ │            ╔═════╗
│ └─oci:dbname=example
│              ╚╤════╝
│               ├Pode se referir ao banco de dados catalogado específico.
│               │
│               ├Pode se conectar com um host e um número de porta.
│               │
│               └Você deve consultar a documentação do Oracle se quiser usá-lo.
├─odbc
│ │
│ │      ╔═════╗
│ └─odbc:example
│        ╚╤════╝
│         ├Pode se referir ao banco de dados catalogado específico.
│         │
│         ├Pode se conectar com um host e um número de porta.
│         │
│         └Você deve consultar a documentação do ODBC/DB2 se quiser usá-lo.
├─pgsql
│ │
│ │            ╔═══════╗      ╔══╗        ╔═════╗
│ └─pgsql:host=localhost;port=5432;dbname=example
│              ╚╤══════╝      ╚╤═╝        ╚╤════╝
│               │              │           └O nome do banco de dados a ser
│               │              │            usado.
│               │              │
│               │              └O número da porta com a qual se conectar ao
│               │               host.
│               │
│               └O host para conectar-se para encontrar o banco de dados.
├─sqlite
│ │
│ │        ╔════════╗
│ └─sqlite:example.db
│          ╚╤═══════╝
│           └O caminho para o arquivo de banco de dados local a ser usado.
└─sqlsrv
  │
  │               ╔═══════╗ ╔══╗          ╔═════╗
  └─sqlsrv:Server=localhost,1521;Database=example
                  ╚╤══════╝ ╚╤═╝          ╚╤════╝
                   │         │             └O nome do banco de dados a ser usado.
                   │         │
                   │         └O número da porta com a qual se conectar ao host.
                   │
                   └O host para conectar-se para encontrar o banco de dados.
```

Se você não tiver certeza sobre o que usar para uma parte específica do seu DSN, tente primeiro verificar se funciona como está, sem alterar nada.

Note que `pdo_username` e `pdo_password` devem ser iguais ao nome de usuário e senha que você escolheu para o seu banco de dados.

#### <a name="AJAX_AJAJ_JSON"></a>Meu recurso de upload é assíncrono (p.e., usa ajax, ajaj, json, etc). Não vejo nenhuma mensagem ou aviso especial quando um upload é bloqueado. O que está acontecendo?

Isto é normal. A página "Carregar Negado" padrão do phpMussel é servida como HTML, o que deve ser suficiente para solicitações síncronas típicas, mas isso provavelmente não será suficiente se o seu recurso de upload estiver esperando outra coisa. Se o seu recurso de upload for assíncrono ou esperar que um status de upload seja exibido de forma assíncrona, existem algumas coisas que você pode tentar fazer para que o phpMussel atenda às necessidades do seu recurso de upload.

1. Criando um modelo de saída personalizado para servir algo diferente de HTML.
2. Criando um plug-in personalizado para ignorar completamente a página "Carregar Negado" padrão e faça com que o manipulador de upload faça outra coisa quando um upload estiver bloqueado (existem alguns ganchos de plug-in fornecidos pelo manipulador do upload que podem ser úteis para isso).
3. Desabilitando completamente o manipulador de uploads e apenas chamando a API phpMussel de dentro do seu recurso de upload.

#### <a name="DETECT_EICAR"></a>O phpMussel pode detectar o EICAR?

Sim. Uma assinatura para detectar EICAR está incluída no "arquivo de assinaturas de expressões regulares padrão do phpMussel" (`phpmussel_regex.db`). Enquanto esse arquivo de assinaturas estiver instalado e ativado, o phpMussel deve ser capaz de detectar o EICAR. Visto que o banco de dados do ClamAV também inclui várias assinaturas especificamente para detectar EICAR, o ClamAV pode detectar facilmente EICAR, mas como o phpMussel utiliza apenas um subconjunto reduzido das assinaturas totais fornecidas pelo ClamAV, elas podem não ser suficientes para o phpMussel detectar o EICAR. A capacidade de detectá-lo também pode depender de sua configuração exata.

---


### 9. <a name="SECTION9"></a>INFORMAÇÃO LEGAL

#### 9.0 PREÂMBULO DE SEÇÃO

Esta seção da documentação destina-se a descrever possíveis considerações legais em relação ao uso e implementação do pacote, e fornecer algumas informações básicas relacionadas. Isso pode ser importante para alguns usuários como um meio de garantir a conformidade com quaisquer requisitos legais que possam existir nos países nos quais eles operam, e alguns usuários podem precisar ajustar as políticas do site de acordo com essas informações.

Em primeiro lugar por favor, perceba que eu (o autor do pacote) não sou advogado, nem profissional legal qualificado de qualquer tipo. Portanto, não estou legalmente qualificado para fornecer aconselhamento jurídico. Além disso, em alguns casos, exigências legais exatas podem variar entre diferentes países e jurisdições, e estes requisitos legais variados podem, às vezes, conflitar (como, por exemplo, no caso de países que defendem os [direitos de privacidade](https://pt.wikipedia.org/wiki/Direito_%C3%A0_privacidade) e o [direito de ser esquecido](https://pt.wikipedia.org/wiki/Direito_ao_esquecimento), versus países que favorecem a retenção prolongada de dados). Considere também que o acesso ao pacote não está restrito a países ou jurisdições específicos e, portanto, o pacote userbase é provável que seja geograficamente diverso. Estes pontos considerados, eu não estou em posição de afirmar o que significa ser "legalmente compatível" para todos os usuários, em todos os aspectos. No entanto, espero que as informações aqui contidas o ajudem a chegar a uma decisão sobre o que você deve fazer para permanecer legalmente conforme no contexto do pacote. Se tiver alguma dúvida ou preocupação em relação às informações aqui contidas, ou se você precisar de ajuda e conselhos adicionais de uma perspectiva legal, eu recomendaria consultar um profissional legal qualificado.

#### 9.1 RESPONSABILIDADE

Conforme já declarado pela licença do pacote, o pacote é fornecido sem qualquer garantia. Isso inclui (mas não está limitado a) todo o escopo de responsabilidade. O pacote é fornecido a você para sua conveniência, na esperança de que seja útil e que traga algum benefício para você. Entretanto, se você usa ou implementa o pacote, é sua própria escolha. Você não é forçado a usar ou implementar o pacote, mas, quando o faz, você é responsável por essa decisão. Nem eu, nem qualquer outro colaborador do pacote, somos legalmente responsáveis pelas consequências das decisões que você toma, independentemente de ser direto, indireto, implícito, ou de outra forma.

#### 9.2 TERCEIROS

Dependendo de sua configuração e implementação exatas, o pacote pode se comunicar e compartilhar informações com terceiros em alguns casos. Essas informações podem ser definidas como "[informação pessoalmente identificável](https://pt.wikipedia.org/wiki/Informa%C3%A7%C3%A3o_pessoalmente_identific%C3%A1vel)" (PII) em alguns contextos, por algumas jurisdições.

Como esta informação pode ser usada por estes terceiros, está sujeita às várias políticas estabelecidas por esses terceiros, e está fora do escopo desta documentação. Contudo, em todos esses casos, o compartilhamento de informações com esses terceiros pode ser desativado. Em todos esses casos, se você optar por ativá-lo, é sua responsabilidade pesquisar quaisquer preocupações que você possa ter com relação à privacidade, segurança, e uso de PII por esses terceiros. Se houver alguma dúvida, ou se você estiver insatisfeito com a conduta desses terceiros em relação a PII, talvez seja melhor desativar todo o compartilhamento de informações com esses terceiros.

Para fins de transparência, o tipo de informação compartilhada e com quem está descrito abaixo.

##### 9.2.1 URL ANALISADOR

Os URLs encontrados nos uploads de arquivos podem ser compartilhados com a API de navegação segura do Google, dependendo de como o pacote está configurado. A API de navegação segura do Google requer as chaves de API para funcionar corretamente e, portanto, é desativada por padrão.

*Diretivas de configuração relevantes:*
- `urlscanner` -> `google_api_key`

##### 9.2.2 VIRUS TOTAL

Quando o phpMussel analisa um upload de arquivo, os hashes desses arquivos podem ser compartilhados com a API do Virus Total, dependendo de como o pacote está configurado. Há planos para compartilhar arquivos inteiros em algum momento no futuro, mas essa funcionalidade não é suportada pelo pacote no momento. A API do Virus Total requer uma chave de API para funcionar corretamente e, portanto, está desativada por padrão.

As informações (incluindo arquivos e metadados de arquivos relacionados) compartilhadas com o Virus Total também podem ser compartilhadas com seus parceiros, afiliados, e vários outros para fins de pesquisa. Isso é descrito em mais detalhes por sua política de privacidade.

*Vejo: [Privacy Policy &ndash; VirusTotal](https://support.virustotal.com/hc/en-us/articles/115002168385-Privacy-Policy).*

*Diretivas de configuração relevantes:*
- `virustotal` -> `vt_public_api_key`

#### 9.3 REGISTRO

O registro é uma parte importante do phpMussel por vários motivos. Sem o registro, pode ser difícil diagnosticar falsos positivos, determinar exatamente o quão bem o phpMussel funciona em qualquer contexto específico, e determinar onde suas deficiências podem ser, e quais mudanças podem ser necessárias para sua configuração ou assinaturas de acordo, para que ele continue funcionando como pretendido. Não obstante, o registro pode não ser desejável para todos os usuários e permanece totalmente opcional. No phpMussel, o registro está desabilitado por padrão. Para ativá-lo, o phpMussel deve ser configurado de acordo.

Adicionalmente, se o registro é legalmente permissível, e na medida em que é legalmente permissível (por exemplo, os tipos de informações que podem ser registradas, por quanto tempo, e sob quais circunstâncias), pode variar, dependendo da jurisdição e do contexto onde a phpMussel é implementada (por exemplo, se você está operando como indivíduo, como entidade corporativa, e se está numa base comercial ou não comercial). Portanto, pode ser útil que você leia atentamente essa seção.

Existem vários tipos de registro que o phpMussel pode executar. Diferentes tipos de registro envolvem diferentes tipos de informações, por diferentes razões.

##### 9.3.0 LOGS DE ANÁLISE

Quando habilitado na configuração do pacote, o phpMussel mantém logs dos arquivos que analisa. Este tipo do registro está disponível em dois formatos diferentes:
- Arquivos de log legíveis para humanos.
- Arquivos de log serializados.

As entradas para um arquivo de log legível para humanos geralmente se parece com isso (como um exemplo):

```
Sun, 19 Jul 2020 13:33:31 +0800 Começado.
→ Verificando "ascii_standard_testfile.txt".
─→ Detectado phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
Sun, 19 Jul 2020 13:33:31 +0800 Terminado.
```

Uma entrada do log de análise geralmente inclui as seguintes informações:
- A data e hora em que o arquivo foi analisado.
- O nome do arquivo analisado.
- O que foi detectado no arquivo (se algo foi detectado).

*Diretivas de configuração relevantes:*
- `general` -> `scan_log`
- `general` -> `scan_log_serialized`

Quando essas diretivas são deixadas vazias, esse tipo de log permanecerá desabilitado.

##### 9.3.1 LOG DO CARREGAMENTOS

Quando habilitado na configuração do pacote, o phpMussel mantém logs dos uploads que foram bloqueados.

*Como um exemplo:*

```
Data: Sun, 19 Jul 2020 13:33:31 +0800
Endereço IP: 127.0.0.x
== Resultados da verificação (por que indicado) ==
Detectado phpMussel-Testfile.ASCII.Standard (ascii_standard_testfile.txt)!
== Reconstrução de assinaturas hash ==
dcacac499064454218823fbabff7e09b5b011c0c877ee6f215f35bffb195b6e9:654:ascii_standard_testfile.txt
Em quarentena como "1595142388-2e017ea9ac1478e45dc15794a1fc18c0.qfu".
```

Essas entradas de log geralmente incluem as seguintes informações:
- A data e a hora em que o upload foi bloqueado.
- O endereço IP de onde o upload foi originado.
- A razão pela qual o arquivo foi bloqueado (o que foi detectado).
- O nome do arquivo bloqueado.
- A soma de verificação e o tamanho do arquivo estão bloqueados.
- Se o arquivo foi colocado em quarentena, e sob qual nome interno.

*Diretivas de configuração relevantes:*
- `web` -> `uploads_log`

##### 9.3.2 REGISTRO DO FRONT-END

Esse tipo de registro está associado a tentativas de login no front-end, e ocorre apenas quando um usuário tenta efetuar login no front-end (supondo que o acesso ao front-end esteja ativado).

Uma entrada de registro do front-end contém o endereço IP do usuário que está tentando efetuar login, a data e a hora em que a tentativa ocorreu, e os resultados da tentativa (se teve sucesso ou não). Uma entrada de registro do front-end geralmente se parece com isso (como um exemplo):

```
x.x.x.x - Day, dd Mon 20xx hh:ii:ss +0000 - "admin" - Conectado.
```

*Diretivas de configuração relevantes:*
- `general` -> `frontend_log`

##### 9.3.3 ROTAÇÃO DE REGISTRO

Você pode querer purgar os registros após um período de tempo, ou pode ser obrigado a fazê-lo por lei (ou seja, a quantidade de tempo permitida legalmente para você manter registros pode ser limitada por lei). Você pode conseguir isso incluindo marcadores de data/hora nos nomes de seus arquivos de log conforme especificado pela sua configuração de pacote (por exemplo, `{yyyy}-{mm}-{dd}.log`) e, em seguida, ativando a rotação de registro (a rotação de registro permite que você execute alguma ação nos arquivos de log quando os limites especificados são excedidos).

Por exemplo: Se eu fosse legalmente obrigado a deletar registros após 30 dias, eu poderia especificar `{dd}.log` nos nomes dos meus arquivos de log (`{dd}` representa dias), definir o valor de `log_rotation_limit` para 30 e, em seguida, definir o valor de `log_rotation_action` para `Delete`.

Por outro lado, se você precisar reter o registros por um longo período de tempo, você poderia optar por não usar a rotação de registro em tudo, ou você pode definir o valor de `log_rotation_action` para `Archive`, para compactar arquivos de log, reduzindo assim a quantidade total de espaço em disco que eles ocupam.

*Diretivas de configuração relevantes:*
- `general` -> `log_rotation_limit`
- `general` -> `log_rotation_action`

##### 9.3.4 TRUNCAMENTO DE REGISTRO

Também é possível truncar arquivos de log individuais quando eles excedem um certo tamanho, se isso for algo que você possa precisar ou desejar fazer.

*Diretivas de configuração relevantes:*
- `general` -> `truncate`

##### 9.3.5 PSEUDONIMIZAÇÃO DE ENDEREÇOS IP

Em primeiro lugar, se você não estiver familiarizado com o termo, "pseudonimização" refere-se ao processamento de dados pessoais como tal que não pode ser identificado a nenhuma pessoa específica sem informações suplementares, e desde que tais informações suplementares sejam mantidas separadamente e sujeitas a medidas técnicas e organizacionais para assegurar que os dados pessoais não possam ser identificados a nenhuma pessoa natural.

Em algumas circunstâncias, você pode ser legalmente obrigado a anonimizar ou pseudonimizar qualquer PII coletada, processada ou armazenada. Embora este conceito já existe há algum tempo, o GDPR/DSGVO menciona notavelmente, e especificamente incentiva a "pseudonimização".

O phpMussel é capaz de pseudonimizar endereços IP ao registrá-los, se isso for algo que você possa precisar ou desejar fazer. Quando o phpMussel pseudonimiza os endereços IP, quando registrado, o octeto final dos endereços IPv4, e tudo após a segunda parte dos endereços IPv6 é representado por um "x" (efetivamente arredondando endereços IPv4 para o endereço inicial da 24ª sub-rede em que eles são fatorados em, e endereços IPv6 para o endereço inicial da 32ª sub-rede em que eles são fatorados em).

*Diretivas de configuração relevantes:*
- `legal` -> `pseudonymise_ip_addresses`

##### 9.3.6 ESTATISTICAS

O phpMussel é opcionalmente capaz de rastrear estatísticas como o número total de arquivos analisados e bloqueados desde algum ponto específico no tempo. Esta funcionalidade está desativada por padrão, mas pode ser ativada através da configuração do pacote. O tipo de informação rastreada não deve ser considerado como PII.

*Diretivas de configuração relevantes:*
- `general` -> `statistics`

##### 9.3.7 ENCRIPTAÇÃO

phpMussel não criptografa seu cache ou qualquer informação de registro. A [encriptação](https://pt.wikipedia.org/wiki/Encripta%C3%A7%C3%A3o) de cache e registro pode ser introduzida no futuro, mas não há planos específicos para ela atualmente. Se você estiver preocupado com o acesso de terceiros não autorizados a partes do phpMussel que possam conter PII ou informações confidenciais, como cache ou logs, recomendo que o phpMussel não seja instalado em um local de acesso público (por exemplo, instale o phpMussel fora do diretório `public_html` padrão ou seu equivalente disponível para a maioria dos servidores web padrão) e que as permissões apropriadamente restritivas sejam impostas para o diretório em que ele reside. Se isso não for suficiente para resolver suas preocupações, configure o phpMussel para que os tipos de informações que causam suas preocupações não sejam coletados ou registrados em primeiro lugar (tal como desabilitar o registro em log).

#### 9.4 COOKIES

Quando um usuário efetua login com êxito no front-end, o phpMussel define um [cookie](https://pt.wikipedia.org/wiki/Cookie_(inform%C3%A1tica)) para poder lembrar o usuário das solicitações subsequentes (isto é, os cookies são usados para autenticar o usuário numa sessão de login). Na página de login, um aviso de cookie é exibido de forma proeminente, avisando o usuário que um cookie será definido se ele se envolver na ação relevante. Os cookies não são definidos em nenhum outro ponto da base de código.

#### 9.5 MARKETING E PUBLICIDADE

A phpMussel não coleta ou processa qualquer informação para fins de marketing ou publicidade, e nem vende nem lucra com qualquer informação coletada ou registrada. A phpMussel não é uma empresa comercial, nem está relacionada a nenhum interesse comercial, portanto, fazer essas coisas não faria sentido. Este tem sido o caso desde o início do projeto, e continua sendo o caso hoje. Além disso, fazer essas coisas seria contraproducente para o espírito e propósito do projeto como um todo, e enquanto eu continuar a manter o projeto, nunca acontecerá.

#### 9.6 POLÍTICA DE PRIVACIDADE

Em algumas circunstâncias, você pode ser legalmente obrigado a exibir claramente um link para sua política de privacidade em todas as páginas e seções do seu site. Isso pode ser importante como um meio de garantir que os usuários estejam bem informados sobre suas práticas de privacidade exatas, os tipos de PII que você coletar, e como você pretende usá-lo. Para poder incluir esse link na página "Carregar Negado" do phpMussel, é fornecida uma diretiva de configuração para especificar o URL da sua política de privacidade.

*Diretivas de configuração relevantes:*
- `legal` -> `privacy_policy`

#### 9.7 GDPR/DSGVO

O Regulamento Geral sobre a Proteção de Dados (GDPR) é um regulamento da União Europeia, que entra em vigor em 25 de Maio, 2018. O principal objectivo do regulamento é dar controlo aos cidadãos e residentes da UE relativamente aos seus próprios dados pessoais, e unificar a regulação na UE em matéria de privacidade e dados pessoais.

O regulamento contém disposições específicas relativas ao tratamento de "[informações pessoalmente identificáveis](https://pt.wikipedia.org/wiki/Informa%C3%A7%C3%A3o_pessoalmente_identific%C3%A1vel)" (PII) de quaisquer "titulares de dados" (qualquer identificada ou identificável pessoa natural) da UE ou dentro da mesma. Para estar em conformidade com o regulamento, "empresas" (conforme definido pelo regulamento), e quaisquer sistemas e processos relevantes devem implementar "[privacidade desde a concepção](https://pt.wikipedia.org/wiki/Privacidade_desde_a_concep%C3%A7%C3%A3o)" por padrão, devem usar as configurações de privacidade mais altas possíveis, devem implementar as proteções necessárias para qualquer informação armazenada ou processada (incluindo, mas não limitado a, a implementação de pseudonimização ou anonimização completa de dados), devem declarar clara e inequivocamente os tipos de dados que coletam, como os processam, por quais motivos, por quanto tempo eles o retêm, e se compartilham esses dados com terceiros, os tipos de dados compartilhados com terceiros, como, porque, e assim por diante.

Os dados não podem ser processados a menos que haja uma base legal para isso, conforme definido pelo regulamento. Geralmente, isso significa que, para processar os dados de um titular de dados de forma legal, ele deve ser feito em conformidade com obrigações legais, ou feito somente após o consentimento explícito, bem informado, e inequívoco ter sido obtido do titular dos dados.

Como os aspectos da regulamentação podem evoluir no tempo, a fim de evitar a propagação de informações desatualizadas, pode ser melhor aprender sobre a regulamentação a partir de uma fonte oficial, em vez de simplesmente incluir as informações relevantes aqui na documentação do pacote (o que pode eventualmente desatualizado à medida que a regulamentação evolui).

[EUR-Lex](https://eur-lex.europa.eu/) (uma parte do site oficial da União Europeia que fornece informações sobre a legislação da UE) fornece informações abrangentes sobre o GDPR/DSGVO, disponível em 24 idiomas diferentes (no momento da escrita deste), e disponível para download em formato PDF. Eu recomendaria definitivamente ler as informações que eles fornecem, a fim de aprender mais sobre GDPR/DSGVO:
- [REGULAMENTO (UE) 2016/679 DO PARLAMENTO EUROPEU E DO CONSELHO](https://eur-lex.europa.eu/legal-content/PT/TXT/?uri=celex:32016R0679)

Alternativamente, há uma breve visão geral (não autoritativa) do GDPR/DSGVO disponível na Wikipedia:
- [Regulamento Geral sobre a Proteção de Dados](https://pt.wikipedia.org/wiki/Regulamento_Geral_sobre_a_Prote%C3%A7%C3%A3o_de_Dados)

---


Última Atualização: 26 de Setembro de 2022 (2022.09.26).
