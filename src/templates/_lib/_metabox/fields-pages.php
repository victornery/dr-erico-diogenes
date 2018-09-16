<?php

add_filter( 'rwmb_meta_boxes', 'wpcf_meta_boxes_pages' );
function wpcf_meta_boxes_pages($meta_boxes) {

//=========================================================================================
// END DEFINITION OF META BOXES
//=========================================================================================
    return $meta_boxes;
}