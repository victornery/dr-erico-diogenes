<?php
/**
 * Loader for user meta
 *
 * @package    Meta Box
 * @subpackage MB User Meta
 * @author     Tran Ngoc Tuan Anh <rilwis@gmail.com>
 */

/**
 * Loader class
 */
class MB_User_Meta_Loader {

	/**
	 * Array of meta boxes.
	 *
	 * @var array
	 */
	public static $meta_boxes = array();

	/**
	 * Run hooks to get meta boxes for users and initialize them.
	 */
	public function init() {
		add_filter( 'rwmb_meta_box_class_name', array( $this, 'meta_box_class_name' ), 10, 2 );

		add_filter( 'rwmb_meta_type', array( $this, 'filter_meta_type' ), 10, 2 );

		add_filter( 'rwmb_meta_boxes', array( $this, 'load_meta_boxes_legacy' ), 9999 );
	}

	/**
	 * Store meta boxes to static variable to make compatible with Admin Columns.
	 *
	 * @param  array $meta_boxes Array of meta boxes.
	 * @return array
	 */
	public function load_meta_boxes_legacy( $meta_boxes ) {
		foreach ( $meta_boxes as $meta_box ) {
			if ( empty( $meta_box['type'] ) || 'user' !== $meta_box['type'] ) {
				continue;
			}

			self::$meta_boxes[] = $meta_box;
		}

		return $meta_boxes;
	}

	/**
	 * Filter meta box class name.
	 *
	 * @param  string $class_name Meta box class name.
	 * @param  array  $meta_box   Meta box data.
	 * @return string
	 */
	public function meta_box_class_name( $class_name, $meta_box ) {
		if ( isset( $meta_box['type'] ) && 'user' === $meta_box['type'] ) {
			$class_name = 'MB_User_Meta_Box';
		}

		return $class_name;
	}

	/**
	 * Filter meta type from object type and object id.
	 *
	 * @param string $type        Meta type get from object type and object id.
	 * @param string $object_type Object type.
	 *
	 * @return string
	 */
	public function filter_meta_type( $type, $object_type ) {
		return 'user' === $object_type ? 'user' : $type;
	}
}
