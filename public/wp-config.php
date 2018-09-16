<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'dr-erico');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', '127.0.0.1');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '6<*RIhd(cJNN,j&rsvQ1z?OBGk]=#X*x50t?eC _AM;6;:]lTq$ZvaS?D)|A1Zsx');
define('SECURE_AUTH_KEY',  '/sCQ1U+/A-!,di269e}v=$aDU0+4IQnm%FknZBVdh>MX(jTktD`^;p@96u<,X3jr');
define('LOGGED_IN_KEY',    'M| ^37?FumqD?x]p%e&j/@gMI7m&S5so&%)/{SKNMRaZ=WX]kz@o3?sp~*8Ij-~:');
define('NONCE_KEY',        'VjDs+.N$y+5K>F=<AK#)&+b;~0]mntzFl>@s*oz7rOdLg@A9XIyP,.id~G<@)x,`');
define('AUTH_SALT',        '4J._qD~rVu#nHK5E-weT%bfwD$iiL9I8Otwi_-@rD2nsvUgY^dhtCFwA}]1?Jpzr');
define('SECURE_AUTH_SALT', 'b/i0v#3BlAo<i9jG(=2kS<zR%$[fMZhr>pG>>wggCyBeI}s75s[A`]GAn 5(^Q?+');
define('LOGGED_IN_SALT',   'i2 s^mCMJ=* A&Yr]5CxL(!OgHmgDlv-p+CsFCX%KP(sZ}Pu7*{8TeN261%03{r4');
define('NONCE_SALT',       'Ii`2yU$`%k(+h#gVL(p>lzs1{yc 8,pXXH~5zOVEX K]qn<4g52/WTL(3|u=bP7g');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'ntx_wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
