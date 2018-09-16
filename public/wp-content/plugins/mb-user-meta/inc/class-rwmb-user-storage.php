<?php
/**
 * User storage
 *
 * @package    Meta Box
 * @subpackage MB Term Meta
 */

if ( class_exists( 'RWMB_Base_Storage' ) ) {
	/**
	 * Class RWMB_User_Storage
	 */
	class RWMB_User_Storage extends RWMB_Base_Storage {
		/**
		 * Object type.
		 *
		 * @var string
		 */
		protected $object_type = 'user';
	}
}
