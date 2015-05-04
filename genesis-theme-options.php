<?php
/**
 * Genesis Archive Options
 *
 * @package           Genesis_Theme_Options
 * @author            Brad Potter
 * @license           GPL-2.0+
 * @link              http://www.bradpotter.com/plugins/genesis-theme-options
 * @copyright         Copyright (c) 2015, Brad Potter
 *
 * @wordpress-plugin
 * Plugin Name:       Genesis Theme Options
 * Plugin URI:        https://github.com/bradpotter/genesis-theme-options
 * Description:       Adds additional theme options to the Genesis Framework.
 * Version:           0.9.0
 * Author:            Brad Potter
 * Author URI:        http://www.bradpotter.com
 * Text Domain:       genesis-theme-options
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/bradpotter/genesis-theme-options
 * GitHub Branch:     master
 */

/**
 * If this file is called directly, abort.
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Set constants
 */
define( 'GTO_PLUGIN_DIR', dirname( __FILE__ ) );
define( 'GTO_URL' , WP_PLUGIN_URL . '/' . str_replace( basename( __FILE__ ), "" , plugin_basename( __FILE__ ) ) );

/**
 * Required files
 */
add_action( 'genesis_init', 'gto_init', 99 );
function gto_init() {
	
	if ( is_admin() ) {
		require_once plugin_dir_path( __FILE__ ) . 'genesis-theme-options-admin.php';
	}

	require_once plugin_dir_path( __FILE__ ) . 'genesis-theme-options-customizer.php';
}

/**
 * Required files
 */
require_once plugin_dir_path( __FILE__ ) . 'genesis-theme-options-functions.php';

