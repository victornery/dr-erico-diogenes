<?php
/**
* Registering meta sections for taxonomies
* All the definitions of meta sections are listed below with comments, please read them carefully.
* Note that each validation method of the Validation Class MUST return value.
* You also should read the changelog to know what has been changed
*/

// Hook to 'admin_init' to make sure the class is loaded before
// (in case using the class in another plugin)

add_action( 'rwmb_meta_boxes', 'wpcf_register_taxonomy_meta_boxes' );
function wpcf_register_taxonomy_meta_boxes( $meta_boxes ) {

  return $meta_boxes;
}