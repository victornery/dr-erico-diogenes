<?php

add_filter( 'rwmb_meta_boxes', 'wpcf_meta_boxes' );
function wpcf_meta_boxes($meta_boxes) {

//=========================================================================================
// END DEFINITION OF META BOXES
//=========================================================================================
	return $meta_boxes;
}

