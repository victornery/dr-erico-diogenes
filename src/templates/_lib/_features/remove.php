<?php
/*
* Clean functions
*/

//=========================================================================================
// REMOVER BARRA ADMIN
//=========================================================================================
add_filter('show_admin_bar', '__return_false');

//=========================================================================================
// REMOVER LOGIN ERROR
//=========================================================================================
add_filter('login_errors',create_function('$a', "return null;"));

//=========================================================================================
// REMOVER LIXO DO HEAD
//=========================================================================================

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

//=========================================================================================
// REMOVER CSS BASE GALERIA
//=========================================================================================
add_filter('use_default_gallery_style', '__return_false');

//=========================================================================================
// REMOVER EMOTICONS SUPORTE
//=========================================================================================
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

//=========================================================================================
// DELETAR REVISÕES
//=========================================================================================
$wpdb->query("DELETE FROM $wpdb->posts WHERE post_type = 'revision'");

//=========================================================================================
// REMOVER CATEGORY BASE
//=========================================================================================

define('NOCAT_URL', trailingslashit( get_stylesheet_directory_uri() . '/_lib/_features'));
define('NOCAT_DIR', trailingslashit( STYLESHEETPATH . '/_lib/_features'));
require_once NOCAT_DIR . "nocategory.php";

//=========================================================================================
// REMOVER ACENTOS DOS ARQUVIOS NO UPLOAD
//=========================================================================================

add_filter('sanitize_file_name', 'sa_sanitize_spanish_chars', 10);
function sa_sanitize_spanish_chars ($filename) {
return remove_accents( $filename );
}

function sanitize_filename_on_upload($filename) {
$ext = end(explode('.',$filename));

// Replace all weird characters
$sanitized = preg_replace('/[^a-zA-Z0-9-_.]/','', substr($filename, 0, -(strlen($ext)+1)));
// Replace dots inside filename
$sanitized = str_replace('.','-', $sanitized);
return strtolower($sanitized.'.'.$ext);
}

add_filter('sanitize_file_name', 'sanitize_filename_on_upload', 10);

//=========================================================================================
// FIX ACENTOS DOS ARQUVIOS - SAFARI
//=========================================================================================

function ck_image_attrs($attrs){
  foreach ($attrs as $name => $value){
    if ('src' != $name){
      break;
    }
    $attrs[$name] = ck_fix_image_url($value);
  }
  return $attrs;
}

function ck_fix_image_url($url){
  $parts = parse_url($url);
  $path = explode('/', $parts['path']);
  $path = array_map('rawurlencode', $path);
  $path = implode('/', $path);
  return str_replace($parts['path'], $path, $url);
}
add_filter('wp_get_attachment_image_attributes', 'ck_image_attrs');