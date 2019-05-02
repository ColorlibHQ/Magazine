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

// Post view count
if( function_exists( 'magazine_set_post_views' ) ){
    magazine_set_post_views( get_the_ID() );
}

?> 
<!-- Post Item Start -->
<div id="<?php the_ID(); ?>" <?php post_class( esc_attr( 'single-post-wrap' ) ); ?>>
    <div class="feature-img-thumb relative">
        <div class="overlay overlay-bg"></div>

        <?php

        if( has_post_thumbnail() ){
            /**
             * Blog Post thumbnail
             * @Hook  magazine_blog_posts_thumb
             *
             * @Hooked magazine_blog_single_posts_thumb_cb
             *
             *
             */
            do_action( 'magazine_blog_single_posts_thumb' );

        } ?>
    </div>



    <div class="content-wrap blog-detail-txt">
        <?php
        		/*
		*	Magazine First Category Name
		*
		* @Hook magazine_first_cat_name
		*
		*	@Hooked magazine_first_cat_name_cb
		*/
        do_action( 'magazine_first_cat_name' );

        /**
         * Blog post title
         * @Hook  magazine_blog_posts_content
         *
         * @Hooked magazine_blog_posts_title_cb
         *
         *
         */
        do_action( 'magazine_blog_posts_title' );

        /**
         * Blog Post Meta
         * @Hook  magazine_blog_posts_meta
         *
         * @Hooked magazine_blog_posts_meta_cb
         *
         *
         */
        do_action( 'magazine_blog_posts_bottom_meta' );



	/**
	 * Blog single page content
	 * Post social share
	 * @Hook  magazine_blog_posts_content
	 *
	 * @Hooked magazine_blog_posts_content_cb
	 *
	 *
	 */
	do_action( 'magazine_blog_posts_content' );

    /**
     * Blog single page content
     * @Hook  magazine_blog_single_footer_nav
     *
     * @Hooked magazine_blog_single_footer_nav_cb
     *
     *
     */
    do_action( 'magazine_blog_single_footer_nav' );

	echo '</div>';



    // comment template.
    if ( comments_open() || get_comments_number() ) {
        comments_template();
    }


	?>
</div>
       