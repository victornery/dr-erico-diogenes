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
define('AUTH_KEY',         'cE(=H=R>JheI~&yZ:LbSCQHV`6Ax].;_>g9l{vs+:}xXwq6-L,Td>00 QFT9Pxkh');
define('SECURE_AUTH_KEY',  'RXfi][cU`Kt.}@j0<4RX}Yl_Pw%/+8Pnfctn_umv-jQ5[ O[Xw9=}Hb:^4~AT=}$');
define('LOGGED_IN_KEY',    'ir0ZJo@S})0kQmd~$_wj:2+UzT~~o49xUHM&qa=C4]W%M8UBNN0|j Im_`?_,Hu?');
define('NONCE_KEY',        '*I{Sg[{w|iZ@&{Tv!{(}o<9|uPbaOL,_~hxpfJfV(1 Z=Y1S_$fEfVX6hf=&K@X*');
define('AUTH_SALT',        'kONvJ3X@[YH@KS(ne8FAiI(0_0hOTU-O^lIkLl[kwHU-gC3U48r=mV&MB{`&MtNo');
define('SECURE_AUTH_SALT', 'lCkLpQVd;{wVJZ3h]#+(uar d%Q=]}Ye279s.{o_(k69r()H|_Ut}m[RZWejLwF/');
define('LOGGED_IN_SALT',   '?Vu%_>))uSNHc^;$lCwFpU7sy G}tA#lvo>J+vlti4b`Yj*uAOg)ja YKqnsUA15');
define('NONCE_SALT',       '=3C2`#7OI6v2)Ogcj$D06wT=0Q7n@/Mi%Ylp/p8rf;@pC>b-GVabyV]VmY[Bg WZ');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'global_wp_';

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
define('WPCF7_AUTOP', false);
/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
