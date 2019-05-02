<?php 
/**
 * @Packge     : magazine
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

class magazine_theme_customizer {


    function __construct() {
        add_action( 'customize_register', array( $this, 'magazine_theme_customizer_options' ) );
        add_action( 'customize_controls_enqueue_scripts', array( $this, 'magazine_customizer_js' ) );
    }

    // Customize register hook

    public function magazine_theme_customizer_options( $wp_customize ) {

        // Include files
        get_template_part( '/inc/customizer/fields/sections' );
        get_template_part( '/inc/customizer/fields/fields' );


        // Change title tagline panel to theme option
        $wp_customize->get_section( 'title_tagline' )->panel = 'magazine_options_panel';
        // Change colors panel to theme option
        $wp_customize->get_section( 'colors' )->panel = 'magazine_options_panel';
        // change priorities
        $wp_customize->get_section( 'title_tagline' )->priority = 0;
        // change priorities
        $wp_customize->get_section( 'colors' )->priority = 3;

		// Change background control section
        $wp_customize->get_control( 'background_color' )->section = 'background_image';
        // Change header image control section
        $wp_customize->get_control( 'header_image' )->section = 'colors';
        // Rename customizer color section
		$wp_customize->get_section('colors')->title = esc_html__( 'Page Header', 'magazine' );
		// Rename customizer background image section
        $wp_customize->get_section('background_image')->title = esc_html__( 'Background', 'magazine' );
        
        // Copyright text selective refresh
        $wp_customize->selective_refresh->add_partial( 'magazine-copyright-text-settings',
        array( 'selector' => '.copyright-text' ) );
        // Post Like button selective refresh
        $wp_customize->selective_refresh->add_partial( 'magazine-blog-like-toggle',
        array( 'selector' => '.sl-wrapper' ) );
        // Post Share button selective refresh
        $wp_customize->selective_refresh->add_partial( 'magazine-blog-social-share-toggle',
        array( 'selector' => '.social-wrap ul li:first-child' ) );

    }


    // Customizer js enqueue

    public function magazine_customizer_js() {

        wp_enqueue_script( 'magazine-customizer', MAGAZINE_DIR_URI.'inc/customizer/js/customizer.js', array('customize-controls'), '1.0', true );

        wp_localize_script( 'magazine-customizer', 'bakeryCustomizerdata', array(
            'site_url'      => site_url('/'),
            'blog_page'     => get_post_type_archive_link( 'post' ),

        ) );

    }

    // Image sanitization callback.

    public static function magazine_sanitize_image( $image, $setting ) {

        /*
         * Array of valid image file types.
         *
         * The array includes image mime types that are included in wp_get_mime_types()
         */
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon'
        );

        // Return an array with file extension and mime_type.
        $file = wp_check_filetype( $image, $mimes );

        // If $image has a valid mime_type, return it; otherwise, return the default.
        return ( $file['ext'] ? $image : $setting->default );
    }

}
