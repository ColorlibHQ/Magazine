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
 * General Section Fields
 ***********************************/


// Theme Main Color Picker
Epsilon_Customizer::add_field(
    'magazine_themecolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Main Color.', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_general_options_section',
        'default'     => '#f6214b',
    )
);
// Google map api key field
$url = 'https://developers.google.com/maps/documentation/geocoding/get-api-key';

Epsilon_Customizer::add_field(
    'magazine_map_apikey',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Google map api key', 'magazine' ),
        'description'       => sprintf( __( 'Set google map api key. To get api key %s click here %s', 'magazine' ), '<a target="_blank" href="'.esc_url( $url  ).'">', '</a>' ),
        'section'           => 'magazine_general_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
        
    )
);

// Instagram Access Token Field
Epsilon_Customizer::add_field(
    'magazine_igaccess_token',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Instagram Access Token.', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_general_options_section',
        'default'     => '',
    )
);

/***********************************
 * Header Section Fields
 ***********************************/

// Header top Phone number
Epsilon_Customizer::add_field(
	'magazine-header-top-phone',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Phone Number', 'magazine' ),
		'section'     => 'magazine_headertop_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => '+953 012 3654 896',
	)
);
// Header top email
Epsilon_Customizer::add_field(
	'magazine-header-top-email',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Email Address', 'magazine' ),
		'section'     => 'magazine_headertop_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => 'support@colorlib.com',
	)
);

// Header Ad space
Epsilon_Customizer::add_field(
	'magazine_header_ad',
	array(
		'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Header Ad Content', 'magazine' ),
		'section'     => 'magazine_headertop_options_section',
		'default'     => '',
	)
);

// Header Nav Bar Background Color Picker
Epsilon_Customizer::add_field(
    'magazine_header_navbar_bgColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav-bar Background Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_headertop_options_section',
        'default'     => '#04091e',
    )
);

// Header Sticky  Nav Bar Background Color Picker
Epsilon_Customizer::add_field(
    'magazine_header_navbarsticky_bgColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Sticky Nav Bar Background Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_headertop_options_section',
        'default'     => '',
    )
);
// Header Nav Bar Menu Color Picker
Epsilon_Customizer::add_field(
    'magazine_header_navbar_menuColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Menu Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_headertop_options_section',
        'default'     => '#fff',
    )
);
// Header Nav Bar Menu Hover Color Picker
Epsilon_Customizer::add_field(
    'magazine_header_navbar_menuHovColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Menu Hover Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_headertop_options_section',
        'default'     => '#fff',
    )
);
// Header sticky nav bar menu color picker
Epsilon_Customizer::add_field(
    'magazine_header_sticky_navbar_menuColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header Nav Bar Menu Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_headertop_options_section',
        'default'     => '#fff',
    )
);
// Header sticky nav bar menu hover color picker
Epsilon_Customizer::add_field(
    'magazine_header_sticky_navbar_menuHovColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header Nav Bar Menu Hover Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_headertop_options_section',
        'default'     => '#fff',
    )
);
// Page Header Background Color Picker
Epsilon_Customizer::add_field(
    'magazine_titlebar_bgcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Page Title-bar Background Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#f6214b',
    )
);
// Page Header text Color Picker
Epsilon_Customizer::add_field(
    'magazine_headertextcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Text Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#fff',
    )
);
// Header overlay switch field
Epsilon_Customizer::add_field(
    'magazine-headeroverlay-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Toggle header overlay', 'magazine' ),
        'section'     => 'colors',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
// Header overlay color
Epsilon_Customizer::add_field(
    'magazine_headeroverlaycolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Overlay Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => 'rgba(0,0,0,0.2)',
    )
);


/***********************************
 * Blog Home Template Section Fields
 ***********************************/
// Category Post
Epsilon_Customizer::add_field(
	'magazine-category-post-toggle',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Category post Show/Hide', 'magazine' ),
		'section'     => 'magazine_blog_home_template_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

// Category Slug
Epsilon_Customizer::add_field(
	'magazine_category_slug',
	array(
		'type'        => 'text',
        'label'       => esc_html__( 'Category Slug', 'magazine' ),
        'description' => esc_html__( "Input category slugs and separate slugs by , (comma )", "magazine" ),
		'section'     => 'magazine_blog_home_template_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => '',
	)
);
// Bracking News Toggle
Epsilon_Customizer::add_field(
	'magazine-bracking-news-toggle',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Bracking News Show/Hide', 'magazine' ),
		'section'     => 'magazine_blog_home_template_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
// Bracking News 
Epsilon_Customizer::add_field(
	'magazine_bracking_news',
	array(
		'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Bracking News Content', 'magazine' ),
		'section'     => 'magazine_blog_home_template_section',
		'default'     => '',
	)
);


//Latest news Section
Epsilon_Customizer::add_field(
	'magazine-latest-news-toggle',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Latest News Section Show/Hide', 'magazine' ),
		'section'     => 'magazine_blog_home_template_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

//Latest News Section Title
Epsilon_Customizer::add_field(
	'magazine_latest_news_section_title',
	array(
		'type'        => 'text',
        'label'       => esc_html__( 'latest News Section Title ', 'magazine' ),
		'section'     => 'magazine_blog_home_template_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => esc_html__( 'Latest News', 'magazine' )
	)
);
//Latest News Post number
Epsilon_Customizer::add_field(
	'magazine_latest_news_post_number',
	array(
		'type'        => 'text',
        'label'       => esc_html__( 'latest News Post Number ', 'magazine' ),
		'section'     => 'magazine_blog_home_template_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => absint('4')
	)
);

// Ad here
Epsilon_Customizer::add_field(
	'magazine_ad_section',
	array(
		'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Ad Content', 'magazine' ),
		'section'     => 'magazine_blog_home_template_section',
		'default'     => '',
	)
);

// Popular Post Section 
Epsilon_Customizer::add_field(
	'magazine-popularpost-toggle',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Popular Post Section Show/Hide', 'magazine' ),
		'section'     => 'magazine_blog_home_template_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
); 
// Popular post Section Title
Epsilon_Customizer::add_field(
	'magazine_popularpost_section_title',
	array(
		'type'        => 'text',
        'label'       => esc_html__( 'Popular Post Section Title ', 'magazine' ),
		'section'     => 'magazine_blog_home_template_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => esc_html__( 'Popular Post', 'magazine' )
	)
);
// Popular Post number
Epsilon_Customizer::add_field(
	'magazine_popular_post_number',
	array(
		'type'        => 'text',
        'label'       => esc_html__( 'Popular Post Number ', 'magazine' ),
		'section'     => 'magazine_blog_home_template_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => absint('3')
	)
);
// Relavent Post Section 
Epsilon_Customizer::add_field(
	'magazine-relavent-post-toggle',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Relavent  Post Section Show/Hide', 'magazine' ),
		'section'     => 'magazine_blog_home_template_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
); 
// Relavent post Section Title
Epsilon_Customizer::add_field(
	'magazine_relavent_section_title',
	array(
		'type'        => 'text',
        'label'       => esc_html__( 'Relavent Post Section Title ', 'magazine' ),
		'section'     => 'magazine_blog_home_template_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => esc_html__( 'Relavent  Post', 'magazine' )
	)
);
// Relavent Category Slug
Epsilon_Customizer::add_field(
	'magazine_relavent_cat_slug',
	array(
		'type'        => 'text',
        'label'       => esc_html__( 'Relavent Category Slug ', 'magazine' ),
        'description' => esc_html( 'Input specific category slug' ),
		'section'     => 'magazine_blog_home_template_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => ''
	)
);
// Relavent Post number
Epsilon_Customizer::add_field(
	'magazine_relavent_post_number',
	array(
		'type'        => 'text',
        'label'       => esc_html__( 'Relavent Post Number ', 'magazine' ),
		'section'     => 'magazine_blog_home_template_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => absint('3')
	)
);

/***********************************
 * Blog Section Fields
 ***********************************/

// Post excerpt length field
Epsilon_Customizer::add_field(
    'magazine_post_excerpt',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Post Excerpt', 'magazine' ),
        'description' => esc_html__( 'Set post excerpt length.', 'magazine' ),
        'section'     => 'magazine_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => absint('30'),
    )
);
// Blog sidebar layout field
Epsilon_Customizer::add_field(
    'magazine-blog-sidebar-settings',
    array(
        'type'     => 'epsilon-layouts',
        'label'    => esc_html__( 'Blog Layout', 'magazine' ),
        'section'  => 'magazine_blog_options_section',
        'description' => esc_html__( 'Select the option to set blog page sidebar position.', 'magazine' ),
        'layouts'  => array(
            '1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
            '2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
            '3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
        ),
        'default'  => array(
            'columnsCount' => 2,
            'columns'      => array(
                1 => array(
                    'index' => 1,
                ),
                2 => array(
                    'index' => 2,
                ),
                3 => array(
                    'index' => 3,
                ),
            ),
        ),
        'min_span' => 4,
        'fixed'    => true
    )
);
if( defined( 'MAGAZINE_COMPANION_VERSION' ) ) {
// Header social switch field
Epsilon_Customizer::add_field(
    'magazine-blog-social-share-toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Social Share Show/Hide', 'magazine' ),
        'section'     => 'magazine_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

// Header social switch field
Epsilon_Customizer::add_field(
    'magazine-blog-like-toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Like Button Show/Hide', 'magazine' ),
        'section'     => 'magazine_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
}



/***********************************
 * Page Section Fields
 ***********************************/

// Blog sidebar layout field
Epsilon_Customizer::add_field(
	'magazine-page-sidebar-settings',
	array(
		'type'     => 'epsilon-layouts',
		'label'    => esc_html__( 'page Layout', 'magazine' ),
		'section'  => 'magazine_page_options_section',
		'description' => esc_html__( 'Select the option to set page sidebar position.', 'magazine' ),
		'layouts'  => array(
			'1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
			'2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
			'3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
		),
		'default'  => array(
			'columnsCount' => 1,
			'columns'      => array(
				1 => array(
					'index' => 1,
				),
				2 => array(
					'index' => 2,
				),
				3 => array(
					'index' => 3,
				)
			),
		),
		'min_span' => 4,
		'fixed'    => true
	)
);



/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'magazine_fof_text_one',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'magazine' ),
        'section'           => 'magazine_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Ooops 404 Error !'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'magazine_fof_text_two',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'magazine' ),
        'section'           => 'magazine_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Either something went wrong or the page dosen\'t exist anymore.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'magazine_fof_textonecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_fof_options_section',
        'default'     => '#404551', 
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'magazine_fof_texttwocolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_fof_options_section',
        'default'     => '#abadbe',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'magazine_fof_bgcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_fof_options_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'magazine-widget-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'magazine' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'magazine' ),
        'section'     => 'magazine_footer_options_section',
        'default'     => false,
    )
);

// Footer copy right text add settings

// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'magazine' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );

Epsilon_Customizer::add_field(
    'magazine-copyright-text-settings',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'magazine' ),
        'section'     => 'magazine_footer_options_section',
        'default'     => wp_kses_post( $copyText ),
    )
);
// Footer widget background color field
Epsilon_Customizer::add_field(
    'magazine_footer_bgimg_settings',
    array(
        'type'        => 'epsilon-image',
        'label'       => esc_html__( 'Footer Widget Background Image', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_footer_options_section',
    )
);
// Footer widget background color field
Epsilon_Customizer::add_field(
    'magazine_footer_widget_bgColor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Background Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_footer_options_section',
        'default'     => '#04091e',
    )
);
// Footer widget text color field
Epsilon_Customizer::add_field(
    'magazine_footer_widget_color_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Text Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_footer_options_section',
        'default'     => '#777',
    )
);
// Footer widget title color field
Epsilon_Customizer::add_field(
    'magazine_footer_widgettitlecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widgets Title Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_footer_options_section',
        'default'     => '#222',
    )
);
// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'magazine_footer_widget_anchorcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Anchor Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_footer_options_section',
        'default'     => '#777',
    )
);
// Footer widget anchor hover Color
Epsilon_Customizer::add_field(
    'magazine_footer_widget_anchorhovcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Anchor Hover Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_footer_options_section',
        'default'     => '#fff',
    )
);

// Footer bottom bg Color
Epsilon_Customizer::add_field(
    'magazine_footer_bottom_bgcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Background Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_footer_options_section',
        'default'     => '#fff',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'magazine_footer_bottom_textcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Text Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_footer_options_section',
        'default'     => '#777',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'magazine_footer_bottom_anchorcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Anchor Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_footer_options_section',
        'default'     => '#f6214b',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'magazine_footer_bottom_anchorhovercolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Anchor Hover Color', 'magazine' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'magazine_footer_options_section',
        'default'     => '#f6214b',
    )
);
