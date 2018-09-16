<?php
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
define('DB_NAME', 'dr-erico-diogenes');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'hXTwyjNL|*H/{DN.J>Q^vjgB;sNnO|:^?D`Kvj2O%Cq/7:K)/T*f_ML^0X-u@6!D');
define('SECURE_AUTH_KEY',  'y?r6?b[vV[V_Fw?~q1[abbzpAp*+d*1,4Xur<Tqnj[Ka-ZM1#5`j*TV/W1JgMoo}');
define('LOGGED_IN_KEY',    'Z9a&zoC)XrK;N#fpI,e[;7#h-d?psPFrR2nL+slG kCwUElJ}o_YcS2QOyw K[Y%');
define('NONCE_KEY',        'mj(>D4B#f?;z9OYAIp]{:h2wk,u Kabi>4=];{1-ZMR` u#up. hYmr<+E?D&1Zm');
define('AUTH_SALT',        'RWK;!$v6H$Q?J<XQ%DMG@$0T-.(&fR5e/Z=k,|Age >;we$&?N8u](:_HS/c)bDo');
define('SECURE_AUTH_SALT', '6*Kmp=OeiNIWYb^H]*ydfJI@/-)Hv>WT(PpId=T*]ov;Dydtv&*h>es@P>O2TJCJ');
define('LOGGED_IN_SALT',   '%LS7ETA,R{GoMiG33S|Tn>B>3PrxzFYTGRC@z:BiNfE(X^vXIR7A8zdS7/amdQ#F');
define('NONCE_SALT',       '>%:kfu^$_bsMRFM4#+;*Ty@t*4z>W>r[?i2MKRS xl+.|znCj<{!P-.xG.|d|.!C');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'create_wp_';

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
