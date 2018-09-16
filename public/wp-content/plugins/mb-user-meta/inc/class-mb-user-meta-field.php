<?php
/**
 * Handle field actions for users
 *
 * @package    Meta Box
 * @subpackage MB User Meta
 */

/**
 * Field class.
 */
class MB_User_Meta_Field {
	/**
	 * Add hooks for fields in user edit screen.
	 */
	public function init() {
		add_action( 'load-profile.php', array( $this, 'hook' ) );
		add_action( 'load-user-edit.php', array( $this, 'hook' ) );
	}

	/**
	 * Hooks run in the edit profile/user page.
	 */
	public function hook() {
		add_filter( 'rwmb_field_meta', array( $this, 'meta' ), 10, 3 );
	}

	/**
	 * Get field meta value
	 *
	 * @param mixed $meta  Meta value.
	 * @param array $field Field parameters.
	 * @param bool  $saved Is meta box saved.
	 *
	 * @return mixed
	 */
	public function meta( $meta, $field, $saved ) {
		$user_id = MB_User_Meta_Box::get_current_user_id();

		$single = $field['clone'] || ! $field['multiple'];
		$meta   = get_user_meta( $user_id, $field['id'], $single );

		// Use $field['std'] only when the meta box hasn't been saved (i.e. the first time we run).
		$meta = ( ! $saved && '' === $meta || array() === $meta ) ? $field['std'] : $meta;

		// Escape attributes.
		$meta = RWMB_Field::call( $field, 'esc_meta', $meta );

		// Make sure meta value is an array for clonable and multiple fields.
		if ( $field['clone'] || $field['multiple'] ) {
			if ( empty( $meta ) || ! is_array( $meta ) ) {
				/**
				 * Note: if field is clonable, $meta must be an array with values,
				 * so that the foreach loop in self::show() runs properly.
				 *
				 * @see self::show()
				 */
				$meta = $field['clone'] ? array( '' ) : array();
			}
		}

		if ( $meta && is_array( $meta ) && 'taxonomy_advanced' === $field['type'] ) {
			$meta = explode( ',', $meta[0] );
		}

		return $meta;
	}
}
