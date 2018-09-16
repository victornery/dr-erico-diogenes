<?php
/**
 * Plugin Name: Meta Box Updater
 * Plugin URI: https://metabox.io/plugins/meta-box-updater/
 * Description: Updater for Meta Box extensions
 * Version: 1.2.0
 * Author: MetaBox.io
 * Author URI: https://metabox.io
 * License: GPL2+
 *
 * @package Meta Box
 * @subpackage Meta Box Updater
 */

defined( 'ABSPATH' ) || die;

if ( ! class_exists( 'MB_Updater' ) ) {
	require plugin_dir_path( __FILE__ ) . 'class-mb-updater.php';
	$updater = new MB_Updater();
	$updater->init();
}

if ( ! class_exists( 'MB_Updater_Settings' ) ) {
	require plugin_dir_path( __FILE__ ) . 'class-mb-updater-settings.php';
	$settings = new MB_Updater_Settings();
	$settings->init();
}
