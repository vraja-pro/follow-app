<?php
/**
 * Folo Up Plugin
 *
 * @package folo-up
 * @author  Imran Sayed
 *
 * @wordpress-plugin
 * Plugin Name:       Folo Up
 * Plugin URI:        
 * Description:       Adds Gutenberg Blocks.
 * Version:           1.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Imran Sayed
 * Author URI:        
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       folo-up
 * Domain Path:       /languages
 */

/**
 * Bootstrap the plugin.
 */
require_once 'vendor/autoload.php';
require_once untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/inc/custom-functions.php';

use FoloUp\Plugin;

if ( class_exists( 'FoloUp\Plugin' ) ) {
	$the_plugin = new Plugin();
}

register_activation_hook( __FILE__, [ $the_plugin, 'activate' ] );
register_deactivation_hook( __FILE__, [ $the_plugin, 'deactivate' ] );
