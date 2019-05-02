<?php 
/**
 * @Packge 	   : magazine
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


/**
 *
 * Define constant
 *
 */
 
// Base URI
if( ! defined( 'MAGAZINE_DIR_URI' ) ) {
	define( 'MAGAZINE_DIR_URI', get_template_directory_uri().'/' );
}

// assets URI
if( ! defined( 'MAGAZINE_DIR_ASSETS_URI' ) ) {
	define( 'MAGAZINE_DIR_ASSETS_URI', MAGAZINE_DIR_URI.'assets/' );
}

// Css File URI
if( ! defined( 'MAGAZINE_DIR_CSS_URI' ) ) {
	define( 'MAGAZINE_DIR_CSS_URI', MAGAZINE_DIR_ASSETS_URI .'css/' );
}

// Js File URI
if( ! defined( 'MAGAZINE_DIR_JS_URI' ) ) {
	define( 'MAGAZINE_DIR_JS_URI', MAGAZINE_DIR_ASSETS_URI .'js/' );
}

// Base Directory
if( ! defined( 'MAGAZINE_DIR_PATH' ) ) {
	define( 'MAGAZINE_DIR_PATH', get_parent_theme_file_path().'/' );
}

//Inc Folder Directory
if( ! defined( 'MAGAZINE_DIR_PATH_INC' ) ) {
	define( 'MAGAZINE_DIR_PATH_INC', MAGAZINE_DIR_PATH.'inc/' );
}

//magazine libraries Folder Directory
if( ! defined( 'MAGAZINE_DIR_PATH_LIBS' ) ) {
	define( 'MAGAZINE_DIR_PATH_LIBS', MAGAZINE_DIR_PATH_INC.'libraries/' );
}

//Classes Folder Directory
if( ! defined( 'MAGAZINE_DIR_PATH_CLASSES' ) ) {
	define( 'MAGAZINE_DIR_PATH_CLASSES', MAGAZINE_DIR_PATH_INC.'classes/' );
}

//Hooks Folder Directory
if( ! defined( 'MAGAZINE_DIR_PATH_HOOKS' ) ) {
	define( 'MAGAZINE_DIR_PATH_HOOKS', MAGAZINE_DIR_PATH_INC.'hooks/' );
}

//Widgets Folder Directory
if( ! defined( 'MAGAZINE_DIR_PATH_WIDGET' ) ) {
	define( 'MAGAZINE_DIR_PATH_WIDGET', MAGAZINE_DIR_PATH_INC.'widgets/' );
}




/**
 * Include File
 *
 */

require_once( MAGAZINE_DIR_PATH_INC . 'magazine-companion/magazine-companion.php' );
require_once( MAGAZINE_DIR_PATH_INC . 'breadcrumbs.php' );
require_once( MAGAZINE_DIR_PATH_INC . 'category-meta.php' );
require_once( MAGAZINE_DIR_PATH_INC . 'widgets-reg.php' );
require_once( MAGAZINE_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
require_once( MAGAZINE_DIR_PATH_INC . 'magazine-functions.php' );
require_once( MAGAZINE_DIR_PATH_INC . 'commoncss.php' );
require_once( MAGAZINE_DIR_PATH_INC . 'support-functions.php' );
require_once( MAGAZINE_DIR_PATH_INC . 'wp-html-helper.php' );
require_once( MAGAZINE_DIR_PATH_INC . 'customizer/customizer.php' );
require_once( MAGAZINE_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
require_once( MAGAZINE_DIR_PATH_CLASSES . 'Class-Config.php' );
require_once( MAGAZINE_DIR_PATH_HOOKS . 'hooks.php' );
require_once( MAGAZINE_DIR_PATH_HOOKS . 'hooks-functions.php' );
require_once( MAGAZINE_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
require_once( MAGAZINE_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );


/**
 * Instantiate magazine object
 *
 * Inside this object:
 * Enqueue scripts, Google font, Theme support features, Epsilon Dashboard .
 *
 */

$obj = new magazine();

function wpdocs_enqueue_custom_admin_style() {
	wp_enqueue_script( 'my_custom_script', get_template_directory_uri() . '/assets/js/myscript.js' );
}
add_action( 'admin_enqueue_scripts', 'wpdocs_enqueue_custom_admin_style' );
