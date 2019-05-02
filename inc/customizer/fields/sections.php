<?php 
/**
 * @Packge     : Magazine
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'magazine_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'magazine' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
    /**
     * General Section
     */
    array(
        'id'   => 'magazine_general_options_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'magazine' ),
            'panel'    => 'magazine_options_panel',
            'priority' => 1,
        ),
    ),
    /**
     * Header Section
     */
    array(
        'id'   => 'magazine_headertop_options_section',
        'args' => array(
            'title'    => esc_html__( 'Header Top', 'magazine' ),
            'panel'    => 'magazine_options_panel',
            'priority' => 2,
        ),
    ),
    /**
     * Blog Home Template
     */
    array(
        'id'   => 'magazine_blog_home_template_section',
        'args' => array(
            'title'    => esc_html__( 'Blog Home Template', 'magazine' ),
            'panel'    => 'magazine_options_panel',
            'priority' => 3,
        ),
    ),
    /**
     * Blog Section
     */
    array(
        'id'   => 'magazine_blog_options_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'magazine' ),
            'panel'    => 'magazine_options_panel',
            'priority' => 4,
        ),
    ),

	/**
	 * Page Section
	 */
	array(
		'id'   => 'magazine_page_options_section',
		'args' => array(
			'title'    => esc_html__( 'page', 'magazine' ),
			'panel'    => 'magazine_options_panel',
			'priority' => 5,
		),
	),


	/**
     * 404 Page Section
     */
    array(
        'id'   => 'magazine_fof_options_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'magazine' ),
            'panel'    => 'magazine_options_panel',
            'priority' => 6,
        ),
    ),
    /**
     * Footer Section
     */
    array(
        'id'   => 'magazine_footer_options_section',
        'args' => array(
            'title'    => esc_html__( 'Footer', 'magazine' ),
            'panel'    => 'magazine_options_panel',
            'priority' => 7,
        ),
    ),

);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );
