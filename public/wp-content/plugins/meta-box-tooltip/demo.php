<?php

add_filter( 'rwmb_meta_boxes', 'meta_box_tooltip_demo_register' );

/**
 * Register meta boxes
 *
 * @param array $meta_boxes
 *
 * @return array
 */
function meta_box_tooltip_demo_register( $meta_boxes )
{
	$meta_boxes[] = array(
		'title'  => __( 'Meta Box Tooltip Demo', 'meta-box' ),

		'fields' => array(
			array(
				'type' => 'custom_html',
				'std'  => '<p>&nbsp;</p>',
			),
			array(
				'name'    => __( 'Default', 'meta-box' ),
				'id'      => 'name',
				'type'    => 'text',

				// Add tooltip to field label, in one of following formats
				// 1) 'tooltip' => 'Tooltip Content'
				// 2) 'tooltip' => array( 'icon' => 'info', 'content' => 'Tooltip Content', 'position' => 'top' )
				// 3) 'tooltip' => array( 'icon' => 'http://url-to-icon-image.png', 'content' => 'Tooltip Content', 'position' => 'top' )
				//
				// In 1st format, icon will be 'info' by default
				// In 2nd format, icon can be 'info' (default), 'help' or any Dashicons (see https://developer.wordpress.org/resource/dashicons/)
				// In 3rd format, icon can be URL to custom icon image
				//
				// 'position' is optional. Value can be 'top' (default), 'bottom', 'left', 'right'
				'tooltip' => __( 'Info icon, top position', 'meta-box' ),
			),
			array(
				'name'    => __( 'Help icon', 'meta-box' ),
				'id'      => 'job',
				'type'    => 'text',

				// Icon help with position 'right'
				'tooltip' => array(
					'icon'     => 'help',
					'content'  => __( 'Right position', 'meta-box' ),
					'position' => 'right',
				),
			),
			array(
				'name'    => __( 'Dashicon', 'meta-box' ),
				'id'      => 'email',
				'type'    => 'text',

				// Using Dashicons (email)
				'tooltip' => array(
					'icon'     => 'dashicons-email',
					'content'  => __( 'Dashicon', 'meta-box' ),
					'position' => 'right',
				),
			),
			array(
				'name'    => __( 'Custom image', 'meta-box' ),
				'id'      => 'email',
				'type'    => 'text',

				// Custom icon using URL
				'tooltip' => array(
					'icon'     => 'http://i.imgur.com/ZQI2DNx.png',
					'content'  => __( 'Custom icon', 'meta-box' ),
					'position' => 'right',
				),
			),
		),
	);

	return $meta_boxes;
}
