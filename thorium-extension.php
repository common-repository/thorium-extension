<?php
/*
Plugin Name: Thorium Extension
Description: Adds front page sections and other extensions to Thorium WordPress theme.
Version:     1.0.0
Author:      Marvinkome
Author URI:  http://marvinkome.tk/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: thorium-ext
*/

if ( ! function_exists( 'add_action' ) ) {
	die( 'Nothing to do...' );
}

/* Some constants */
if( ! defined( 'THORIUM_EXTS_VERSION' ) ) {
	define( 'THORIUM_EXTS_VERSION', '1.0.0' ); }
	
if( ! defined( 'THORIUM_EXTS_THEME_NAME' ) ) {
	define( 'THORIUM_EXTS_THEME_NAME', 'Thorium' ); }
	
if( ! defined( 'THORIUM_EXTS_URL' ) ) {
	define( 'THORIUM_EXTS_URL', plugin_dir_url( __FILE__ ) ); }
	
if( ! defined( 'THORIUM_EXTS_PATH' ) ) {
	define( 'THORIUM_EXTS_PATH', plugin_dir_path( __FILE__ ) ); }
	

/**
 * Needed files
 * ------------
 */
require_once ( dirname( __FILE__ ) . '/inc/general-widget.php' );
require_once ( dirname( __FILE__ ) . '/inc/functions.php' );
require_once ( dirname( __FILE__ ) . '/inc/customize/customizer.php' );
require_once ( dirname( __FILE__ ) . '/front-sections/general-template.php' );

