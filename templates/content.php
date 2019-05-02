<?php
/**
 * @Packge     : Politis
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Post Item Start
    if( ! has_post_thumbnail() ){
        $post_class = 'no-post-thum single-latest-post row align-items-center';
    }
    else{
        $post_class = 'single-latest-post row align-items-center';
    }

?>

<div id="<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>
    <?php
    if( has_post_thumbnail() ) { ?>
        <div class="col-lg-5 post-left">
            <div class="feature-img relative">
                <div class="overlay overlay-bg"></div>
                <?php

                    /**
                     * Blog Post thumbnail
                     * @Hook  magazine_blog_posts_thumb
                     *
                     * @Hooked magazine_blog_posts_thumb_cb
                     */
                    do_action('magazine_blog_posts_thumb');

                ?>
            </div>
            <?php


            /*
            *	Magazine First Category Name
            *
            * @Hook magazine_first_cat_name
            *
            *	@Hooked magazine_first_cat_name_cb
            */
            do_action( 'magazine_first_cat_name' );

            ?>
        </div>

        <div class="col-lg-7 post-right">

            <?php
            /**
             * Blog Post title
             * @Hook  magazine_blog_posts_title
             *
             * @Hooked magazine_blog_posts_title_cb
             *
             *
             */
            do_action( 'magazine_blog_posts_title' );

            /**
             * Blog Excerpt With read more button
             * @Hook  magazine_blog_posts_bottom_meta
             *
             * @Hooked magazine_blog_posts_bottom_meta_cb
             *
             *
             */
            do_action( 'magazine_blog_posts_bottom_meta' );


            /**
             * Blog Excerpt With read more button
             * @Hook  magazine_blog_posts_excerpt
             *
             * @Hooked magazine_blog_posts_excerpt_cb
             *
             *
             */
            do_action( 'magazine_blog_posts_excerpt' );
            ?>
        </div>
        <?php
    }
    else{
        /**
         * Blog Post content
         * @Hook  magazine_blog_posts_content
         *
         * @Hooked magazine_blog_posts_content_cb
         */
        do_action('magazine_blog_content');
    }

?>
</div>