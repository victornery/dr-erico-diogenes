<?php
/*
 * Configurações do Tema
 *
 * @author Nicholas Lima
 */

//=========================================================================================
// Importando partials
//=========================================================================================

require_once locate_template('/_lib/dashboard.php');
require_once locate_template('/_lib/admin.php');//..................STYLE LOGIN/ADMIN
require_once locate_template('/_lib/_features/blog.php');//.........BLOG FUNCTIONS
require_once locate_template('/_lib/_features/remove.php');//.......CLEAN FUNCTIONS
require_once locate_template('/_lib/_features/bem.php');//..........MENU BEM CSS
require_once locate_template('/_lib/_features/breadcrumbs.php');//..BREADCRUMBS
require_once locate_template('/_lib/posts.php');//..................POST TYPE FUNCTIONS
require_once locate_template('/_lib/scripts.php');//................SCRIPTS E CSS
require_once locate_template('/_lib/ajax.php');//...................FUNÇÕES AJAX

//=========================================================================================
// ADICIONANDO FAVICON
//=========================================================================================

function blog_favicon() {
  echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_template_directory_uri().'/_lib/_admin/favicon2.png" />';
}
add_action('wp_head', 'blog_favicon');

//=========================================================================================
// CONFIGURAÇÕES DO TEMA
//=========================================================================================

function setting_theme() {

 register_nav_menu('main_menu', 'Menu do Header! ;-)');

  add_editor_style('/assets/css/editor-style.css');//..Tell the TinyMCE editor to use a custom stylesheet

}

add_action('after_setup_theme', 'setting_theme');

add_theme_support( 'post-thumbnails' );

//=========================================================================================
// METABOX CLASS (Fields + Taxonomies Fields)
//=========================================================================================

if (is_admin()) {
  define('RWMBC_URL', trailingslashit( get_stylesheet_directory_uri() . '/_lib/_metabox'));
  define('RWMBC_DIR', trailingslashit( STYLESHEETPATH . '/_lib/_metabox'));
  require_once RWMBC_DIR . 'fields.php';
  require_once RWMBC_DIR . 'fields-pages.php';
  require_once RWMBC_DIR . 'fields-tax.php';
  require_once RWMBC_DIR . 'settings.php';
}

/* DANDO SUPORTE A TITLE-TAG */

add_theme_support( 'title-tag' );;

/*
 * Alterando o Excerpt padrão
 */

 function custom_excerpt($length) {
   return 55;
 }

 add_filter('excerpt_length', 'custom_excerpt', 999);
