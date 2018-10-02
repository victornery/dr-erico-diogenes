<?php

add_filter( 'rwmb_meta_boxes', 'wpcf_meta_boxes' );
function wpcf_meta_boxes($meta_boxes) {

$meta_boxes[] = array(
  'id' => 'about-box',
  'title' => 'Sobre Nós',
  'pages' => array( 'page'),
  'context' => 'normal',
  'priority' => 'high',
  'post_types' => array('page'),
  'clone'      => true,

  'include' => array(
    'relation' => 'OR',
    'slug'     => array('sobre')
  ),

  'fields' => array(
      array(
        'name' => 'Imagem',
        'id'   => 'about-img',
        'type' => 'single_image'
      ),
      array(
        'name' => 'Conteúdo',
        'id'   => 'about-content',
        'type' => 'wysiwyg'
      ),
  ),
);

//=========================================================================================
// END DEFINITION OF META BOXES
//=========================================================================================
	return $meta_boxes;
}

