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
 * Before Wrapper
 *
 * @Preloader
 *
 */
add_action( 'magazine_preloader', 'magazine_site_preloader', 10 );

/**
 * Header
 *
 * @Header Menu
 * @Header Bottom
 * 
 */

add_action( 'magazine_header', 'magazine_header_cb', 10 );

/**
 * Hook for footer
 *
 */
add_action( 'magazine_footer', 'magazine_footer_area', 10 );
add_action( 'magazine_footer', 'magazine_back_to_top', 20 );

/**
 * Hook for Blog, single, page, search, archive pages wrapper.
 */
add_action( 'magazine_wrp_start', 'magazine_wrp_start_cb', 10 );
add_action( 'magazine_wrp_end', 'magazine_wrp_end_cb', 10 );

/**
 * Hook for Page wrapper.
 */
add_action( 'magazine_page_wrp_start', 'magazine_page_wrp_start_cb', 10 );
add_action( 'magazine_page_wrp_end', 'magazine_page_wrp_end_cb', 10 );

/**
 * Hook for Blog, single, search, archive pages column.
 */
add_action( 'magazine_blog_col_start', 'magazine_blog_col_start_cb', 10 );
add_action( 'magazine_blog_col_end', 'magazine_blog_col_end_cb', 10 );

/**
 * Hook for Page column.
 */
add_action( 'magazine_page_col_start', 'magazine_page_col_start_cb', 10 );
add_action( 'magazine_page_col_end', 'magazine_page_col_end_cb', 10 );

/**
 * Hook for blog posts thumbnail.
 */
add_action( 'magazine_blog_posts_thumb', 'magazine_blog_posts_thumb_cb', 10 );

/**
 * Hook for blog posts Content.
 */
add_action( 'magazine_blog_posts_content', 'magazine_blog_posts_content_cb', 10 );

/**
 * Hook for blog single posts thumbnail.
 */
add_action( 'magazine_blog_single_posts_thumb', 'magazine_blog_single_posts_thumb_cb', 10 );

/**
 * Hook for blog posts title.
 */
add_action( 'magazine_blog_posts_title', 'magazine_blog_posts_title_cb', 10 );

/**
 * Hook for blog posts meta.
 */
add_action( 'magazine_blog_posts_meta', 'magazine_blog_posts_meta_cb', 10 );

/*
*  Hook for Blog post First Category
*/
add_action( 'magazine_first_cat_name', 'magazine_first_cat_name_cb', 10 );

/*
*  Hook for Blog post wrap 
*/
add_action( 'magazine_blog_post_wrap', 'magazine_blog_post_wrap_cb', 10 );

/*
*  Hook for Blog Single post wrap 
*/
add_action( 'magazine_blog_single_post_wrap', 'magazine_blog_single_post_wrap_cb', 10 );

/*
*  Hook for Blog and Single post wrap end
*/
add_action( 'magazine_blog_post_wrap_end', 'magazine_blog_post_wrap_end_cb', 10 );


/**
 * Hook for blog posts bottom meta.
 */
add_action( 'magazine_blog_posts_bottom_meta', 'magazine_blog_posts_bottom_meta_cb', 10 );

/**
 * Hook for blog posts excerpt.
 */
add_action( 'magazine_blog_posts_excerpt', 'magazine_blog_posts_excerpt_cb', 10 );

/**
 * Hook for blog posts content.
 */
add_action( 'magazine_blog_content', 'magazine_blog_content_cb', 10 );

/**
 * Hook for blog sidebar.
 */
add_action( 'magazine_blog_sidebar', 'magazine_blog_sidebar_cb', 10 );

/**
 * Hook for page sidebar.
 */
add_action( 'magazine_page_sidebar', 'magazine_page_sidebar_cb', 10 );

/**
 * Hook for blog single post social share option.
 */
add_action( 'magazine_blog_posts_share', 'magazine_blog_posts_share_cb', 10 );

/**
 * Hook for blog single post meta category, tag, next - previous link and comments form.
 */
add_action( 'magazine_blog_single_meta', 'magazine_blog_single_meta_cb', 10 );

/**
 * Hook for blog single footer nav next - previous link and comments form.
 */
add_action( 'magazine_blog_single_footer_nav', 'magazine_blog_single_footer_nav_cb', 10 );

/**
 * Hook for page content.
 */
add_action( 'magazine_page_content', 'magazine_page_content_cb', 10 );


/**
 * Hook for 404 page.
 */
add_action( 'magazine_fof', 'magazine_fof_cb', 10 );
