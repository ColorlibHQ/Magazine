<?php
/**
 * @Packge     : Magazine Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( ! defined( 'MAGAZINE_COMPANION_VERSION' ) ) {
    define( 'MAGAZINE_COMPANION_VERSION', '1.0' );
}

// Define dir path constant
if( ! defined( 'MAGAZINE_COMPANION_DIR_PATH' ) ) {
    define( 'MAGAZINE_COMPANION_DIR_PATH',  get_parent_theme_file_path().'/inc/magazine-companion/' );
}

// Define inc dir path constant
if( ! defined( 'MAGAZINE_COMPANION_INC_DIR_PATH' ) ) {
    define( 'MAGAZINE_COMPANION_INC_DIR_PATH', MAGAZINE_COMPANION_DIR_PATH . 'inc/' );
}

// Define sidebar widgets dir path constant
if( ! defined( 'MAGAZINE_COMPANION_SW_DIR_PATH' ) ) {
    define( 'MAGAZINE_COMPANION_SW_DIR_PATH', MAGAZINE_COMPANION_INC_DIR_PATH . 'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( ! defined( 'MAGAZINE_COMPANION_EW_DIR_PATH' ) ) {
    define( 'MAGAZINE_COMPANION_EW_DIR_PATH', MAGAZINE_COMPANION_INC_DIR_PATH . 'elementor-widgets/' );
}

// Define demo data dir path constant
if( ! defined( 'MAGAZINE_COMPANION_DEMO_DIR_PATH' ) ) {
    define( 'MAGAZINE_COMPANION_DEMO_DIR_PATH', MAGAZINE_COMPANION_INC_DIR_PATH . 'demo-data/' );
}

// Define demo data dir path constant
if( ! defined( 'MAGAZINE_COMPANION_CMB2_DIR_PATH' ) ) {
    define( 'MAGAZINE_COMPANION_CMB2_DIR_PATH', MAGAZINE_COMPANION_INC_DIR_PATH . 'CMB2/' );
}

// Define plugin dir url constant
if( ! defined( 'MAGAZINE_THEME_DIR_URL' ) ) {
    define( 'MAGAZINE_THEME_DIR_URL', get_template_directory_uri() );
}

// Define inc dir url constant
if( ! defined( 'MAGAZINE_COMPANION_DIR_URL' ) ) {
    define( 'MAGAZINE_COMPANION_DIR_URL', MAGAZINE_THEME_DIR_URL . '/inc/magazine-companion/' );
}

// Define inc dir url constant
if( ! defined( 'MAGAZINE_COMPANION_INC_DIR_URL' ) ) {
    define( 'MAGAZINE_COMPANION_INC_DIR_URL', MAGAZINE_COMPANION_DIR_URL . 'inc/' );
}

// Define elementor-widgets dir url constant
if( ! defined( 'MAGAZINE_COMPANION_EW_DIR_URL' ) ) {
    define( 'MAGAZINE_COMPANION_EW_DIR_URL', MAGAZINE_COMPANION_INC_DIR_URL . 'elementor-widgets/' );
}

// Define Demo Data dir url constant
if( ! defined( 'MAGAZINE_COMPANION_DEMO_DIR_URL' ) ) {
    define( 'MAGAZINE_COMPANION_DEMO_DIR_URL', MAGAZINE_COMPANION_INC_DIR_URL . 'demo-data/' );
}

// Define Meta dir url constant
if( ! defined( 'MAGAZINE_COMPANION_META_DIR_URL' ) ) {
    define( 'MAGAZINE_COMPANION_META_DIR_URL', MAGAZINE_COMPANION_INC_DIR_URL . 'magazine-meta/' );
}



$current_theme = wp_get_theme();

$is_parent = $current_theme->parent();

if( ( 'Magazine' ==  $current_theme->get( 'Name' ) ) || ( $is_parent && 'Magazine' == $is_parent->get( 'Name' ) ) ) {
    require_once MAGAZINE_COMPANION_DIR_PATH . 'magazine-init.php';
} else {

    add_action( 'admin_notices', 'magazine_companion_admin_notice', 99 );
    function magazine_companion_admin_notice() {
        $url = 'https://wordpress.org/themes/magazine/';
    ?>
        <div class="notice-warning notice">
            <p><?php printf( __( 'In order to use the <strong>Magazine Companion</strong> plugin you have to also install the %1$sMagazine Theme%2$s', 'magazine' ), '<a href="' . esc_url( $url ) . '" target="_blank">', '</a>' ); ?></p>
        </div>
        <?php
    }
}
