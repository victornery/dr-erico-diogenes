<?php
/**
 * Meta Box Updater Settings
 *
 * This class handles plugin settings, including adding settings page, show fields, save settings
 *
 * @package    Meta Box
 * @subpackage Meta Box Updater
 *
 * @since      0.1.0
 * @author     Tran Ngoc Tuan Anh <rilwis@gmail.com>
 */

/**
 * Meta Box Updater Settings class
 *
 * @package    Meta Box
 * @subpackage Meta Box Updater
 *
 * @author     Tran Ngoc Tuan Anh <rilwis@gmail.com>
 */
class MB_Updater_Settings {
	private $option = 'meta_box_updater';
	private $page_id = 'meta-box-updater';
	private $page_hook;

	public function init() {
		$admin_menu_hook = is_multisite() ? 'network_admin_menu' : 'admin_menu';
		add_action( $admin_menu_hook, array( $this, 'add_settings_page' ) );

		$admin_notices_hook = is_multisite() ? 'network_admin_notices' : 'admin_notices';
		add_action( $admin_notices_hook, array( $this, 'notify' ) );
	}

	public function add_settings_page() {
		$parent          = is_multisite() ? 'settings.php' : 'options-general.php';
		$capability      = is_multisite() ? 'manage_network_options' : 'manage_options';
		$this->page_hook = add_submenu_page(
			$parent,
			esc_html__( 'Meta Box Updater', 'meta-box-updater' ),
			esc_html__( 'Meta Box Updater', 'meta-box-updater' ),
			$capability,
			$this->page_id,
			array( $this, 'render' )
		);
		add_action( "load-{$this->page_hook}", array( $this, 'save' ) );
	}

	public function render() {
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Meta Box Updater' ); ?></h1>
			<p><?php esc_html_e( 'Please enter your license key to receive automatic updates for Meta Box extensions.', 'meta-box-updater' ); ?></p>
			<p>
				<?php
				printf(
					// Translators: %s - URL to MetaBox.io website.
					wp_kses_post( __( 'To get the license key, please visit your profile page at <a href="%s" target="_blank">metabox.io website</a>.', 'meta-box-updater' ) ),
					'https://metabox.io/my-account/'
				);
				?>
			</p>

			<form action="" method="post">
				<?php wp_nonce_field( 'meta-box-updater' ); ?>

				<?php
				$option = is_multisite() ? get_site_option( $this->option ) : get_option( $this->option );
				$key    = isset( $option[ 'api_key' ] ) ? $option[ 'api_key' ] : '';
				?>

				<table class="form-table">
					<tr>
						<th scope="row"><?php esc_html_e( 'License Key', 'meta-box-updater' ); ?></th>
						<td><input required class="regular-text" name="<?php echo esc_attr( $this->option ); ?>[api_key]" value="<?php echo esc_attr( $key ); ?>" type="password"></td>
					</tr>
				</table>

				<?php submit_button( __( 'Save Changes', 'meta-box-updater' ) ); ?>
			</form>
		</div>
		<?php
	}

	public function save() {
		static $message_shown = false;

		if ( empty( $_POST['submit'] ) ) {
			return;
		}
		check_admin_referer( 'meta-box-updater' );

		$option           = isset( $_POST[$this->option] ) ? $_POST[$this->option] : array();
		$option           = (array) $option;
		$option['status'] = 'success';

		$args             = $option;
		$args['action']   = 'check_license';
		$message          = MB_Updater::request( $args );

		if ( $message ) {
			add_settings_error( '', 'invalid', $message );
			$option['status'] = 'error';
		} else {
			add_settings_error( '', 'success', __( 'Settings saved.', 'meta-box-updater' ), 'updated' );
		}

		// Non-multisite auto shows update message. See wp-admin/options-head.php.
		if ( is_multisite() ) {
			add_action( 'network_admin_notices', array( $this, 'show_update_message' ) );
		}

		if ( is_multisite() ) {
			update_site_option( $this->option, $option );
		} else {
			update_option( $this->option, $option );
		}
	}

	public function show_update_message() {
		settings_errors();
	}

	/**
	 * Notify users to enter license key.
	 */
	public function notify() {
		$messages  = array(
			// Translators: %1$s - URL to Meta Box Updater settings page, %2$s - URL to MetaBox.io website.
			'no_key'  => __( '<b>Warning!</b> You have not set your Meta Box license key yet, which means you are missing out on automatic updates and support! <a href="%1$s">Enter your license key</a> or <a href="%2$s" target="_blank">get one here</a>.', 'meta-box-updater' ),
			// Translators: %1$s - URL to Meta Box Updater settings page, %2$s - URL to MetaBox.io website.
			'invalid' => __( '<b>Warning!</b> Your license key for Meta Box is invalid or expired. Please <a href="%1$s">fix it</a> or <a href="%2$s" target="_blank">renew</a> to receive automatic updates and premium support.', 'meta-box-updater' ),
		);
		$status    = $this->get_license_status();
		$admin_url = is_multisite() ? network_admin_url( "settings.php?page={$this->page_id}" ) : admin_url( "options-general.php?page={$this->page_id}" );
		if ( isset( $messages[ $status ] ) ) {
			echo '<div class="notice notice-warning"><p>', wp_kses_post( sprintf( $messages[ $status ], $admin_url, 'https://metabox.io/pricing/' ) ), '</p></div>';
		}
	}

	public function get_license_status() {
		$option = is_multisite() ? get_site_option( $this->option ) : get_option( $this->option );
		if ( empty( $option['api_key'] ) ) {
			return 'no_key';
		}
		if ( isset( $option['status'] ) && 'success' !== $option['status'] ) {
			return 'invalid';
		}
		return 'valid';
	}
}
