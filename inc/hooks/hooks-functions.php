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


// Header menu hook function
if( ! function_exists( 'magazine_header_cb' ) ) {
	function magazine_header_cb() {
		if( ! is_404() ) {
			$header = get_post_meta( absint( get_the_ID() ) ,'_magazine_builderpage_header_show', true );
			get_template_part( 'templates/header', 'nav' );
            
			if( ! is_page_template( 'blog-home.php' ) || $header == 'show'  ) {
				get_template_part( 'templates/header', 'bottom' );

			}

			
		}
		
	}
}
 
// Footer area hook function
if( ! function_exists( 'magazine_footer_area' ) ) {
	function magazine_footer_area() {

		$footerWidget = magazine_opt( 'magazine-widget-toggle-settings', false );

		$noWidgets = ! empty( $footerWidget ) ? '' : ' no-widgets';

		if( ! is_404() ) {
			echo '</div><footer class="footer-area section-gap'.esc_attr( $noWidgets ).'"><div class="container">';

			// Footer widget

			if( $footerWidget ) {
				get_template_part( 'templates/footer', 'widgets' );
			}
			
			// Footer bottom
			get_template_part( 'templates/footer', 'bottom' );	

			echo '</div></footer>';
			
		}
	}
}
 
// Footer back to top hook function
if( ! function_exists( 'magazine_back_to_top' ) ) {
	function magazine_back_to_top() {
		$opt = get_theme_mod( 'magazine-gototop-toggle-settings' );
					
		if( $opt ):
			?>
			<div class="btn-back-to-top bg0-hov" id="myBtn">
				<span class="symbol-btn-back-to-top">
					<i class="fa fa-angle-double-up" aria-hidden="true"></i>
				</span>
			</div>
			<?php
		endif;
	}
}

// Blog, single, page, search, archive pages wrapper start hook function.
if( ! function_exists( 'magazine_wrp_start_cb' ) ) {
	function magazine_wrp_start_cb() {
		echo '<section class="latest-post-area pb-120"><div class="container no-padding"><div class="row">';
	}
}
// Blog, single, page, search, archive pages wrapper end hook function.
if( ! function_exists( 'magazine_wrp_end_cb' ) ) {
	function magazine_wrp_end_cb() {
		echo '</div></div></section>';
	}
}

//page wrapper start hook function.
if( ! function_exists( 'magazine_page_wrp_start_cb' ) ) {
	function magazine_page_wrp_start_cb() {
		echo '<section class="post-content-area"><div class="container"><div class="row">';
	}
}
// Blog, single, page, search, archive pages wrapper end hook function.
if( ! function_exists( 'magazine_page_wrp_end_cb' ) ) {
	function magazine_page_wrp_end_cb() {
		echo '</div></div></section>';
	}
}

// Blog, single, search, archive pages column start hook function.
if( ! function_exists( 'magazine_blog_col_start_cb' ) ) {
	function magazine_blog_col_start_cb() {
		
		$sidebarOpt = magazine_sidebar_opt();

		//
		if( ! is_page() ) {

			$pullRight  = magazine_pull_right( $sidebarOpt , '3' );

			if( $sidebarOpt != '1' ) {
				$col = '8'.$pullRight;
			} else {
				$col = '10 offset-lg-1';
			}

		} else {
			$col = '8';
		}
		
		echo '<div class="col-lg-'.esc_attr( $col ).' posts-list">';
		
	}
}

// Blog Post Wrap
if( ! function_exists( 'magazine_blog_post_wrap_cb' ) ){
	function magazine_blog_post_wrap_cb(){
		echo '<div class="latest-post-wrap">';
	}
}
// Blog Sinlge Post Wrap
if( ! function_exists( 'magazine_blog_single_post_wrap_cb' ) ){
	function magazine_blog_single_post_wrap_cb(){
		echo '<div class="single-post-wrap">';
	}
}


// Blog, single, search, archive pages column end hook function.
if( ! function_exists( 'magazine_blog_col_end_cb' ) ) {
	function magazine_blog_col_end_cb() {
		echo '</div>';
	}
}

// Blog, single, search, archive pages column end hook function.
if( ! function_exists( 'magazine_blog_post_wrap_end_cb' ) ) {
	function magazine_blog_post_wrap_end_cb() {
		echo '</div>';
	}
}

// Page column start hook function.
if( ! function_exists( 'magazine_page_col_start_cb' ) ) {
	function magazine_page_col_start_cb() {

		$pagesidebarOpt = magazine_page_sidebar_opt();

		//
		if( is_page() || ! is_home() ) {

			$pullRight  = magazine_pull_right( $pagesidebarOpt , '3' );

			if( $pagesidebarOpt != '1' ) {
				$col = '8'.$pullRight;
			} else {
				$col = '10 offset-lg-1';
			}

		} else {
			$col = '8';
		}

		echo '<div class="col-lg-'.esc_attr( $col ).' ">';
	}
}
// Page column End hook function.
if( ! function_exists( 'magazine_page_col_end_cb' ) ) {
	function magazine_page_col_end_cb() {
		echo '</div>';
	}
}
 
// Blog post thumbnail hook function.
if( ! function_exists( 'magazine_blog_posts_thumb_cb' ) ) {
	function magazine_blog_posts_thumb_cb() {

		// Thumbnail Show
		if( has_post_thumbnail() ) {
					
			if( !is_single() ) {
			
				$html = '';
				$img  = get_the_post_thumbnail_url( get_the_ID(), 'magazine_blog_300x200' );
				$html .= magazine_img_tag(
					array(
						'url' => esc_url( $img )
					)
				);
			
			}
			echo wp_kses_post( $html );
			
		}

	}
}

// Blog post content hook function.
if( ! function_exists( 'magazine_blog_content_cb' ) ) {
	function magazine_blog_content_cb() { ?>
        <div class="col-lg-12">
            <div class="without_image_post">
                <?php
                magazine_blog_posts_title_cb();

                magazine_blog_posts_bottom_meta_cb();
                magazine_blog_posts_excerpt_cb();
                ?>
            </div>
        </div>
    <?php
	}
}


// Blog Single thumbnail hook function.
if( ! function_exists( 'magazine_blog_single_posts_thumb_cb' ) ) {
	function magazine_blog_single_posts_thumb_cb() {


	    if( has_post_format( 'video' ) ){

            $video_url = get_post_meta( get_the_ID(), 'magazine_video_format', true);
            $img  = get_the_post_thumbnail_url( get_the_ID(), 'magazine_blog_710x310' );
            ?>

            <div class="video-box">
                <div id="player"></div>
                <div id="thumbnail_container" class="thumbnail_container">
                    <img class="img-fluid" id="thumbnail" alt="" src="<?php echo esc_url($img) ?>"/>
                    <div class="overlay overlay-bg"></div>
                </div>
              <a href="<?php echo esc_url( $video_url ) ?>" class="start-video"><img src="<?php echo get_template_directory_uri() ?>/assets/images/play-icon.png" alt=""></a>
            </div>
            <?php

        }
        elseif( has_post_format( 'audio' ) ){
	        $audio_url = get_post_meta( get_the_ID(), 'magazine_audio_format', true );
	        ?>
            <div class="feature-audio-player relative">
                <audio controls class="audio-player">
                    <source src="<?php echo esc_url( $audio_url ) ?>" type="audio/ogg">
                    <source src="<?php echo esc_url( $audio_url ) ?>" type="audio/mpeg">
                </audio>
            </div>
            <?php
        }
        elseif( has_post_format( 'gallery' ) ){
	        $images = get_post_meta( get_the_ID(), 'magazine_gallery_format', 1 );
	        if( !empty( $images ) ) {
                ?>
                <div class="feature-img-thumb relative">
                    <div class="active-gallery-carusel">
                        <?php
                        foreach ($images as $image ) {
                            ?>
                            <div class="single-img relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid item" src="<?php echo esc_url($image) ?>" alt="<?php echo esc_html__('Gallery image', 'magazine') ?>">
                            </div>
                            <?php
                        } ?>
                    </div>
                </div>
                <?php
            }
        }
	    else{
            if( has_post_thumbnail() ){ ?>
                <div class="feature-img-thumb relative">
                    <div class="overlay overlay-bg"></div>
                    <?php the_post_thumbnail( 'magazine_blog_710x310', array( 'class' => 'img-fluid' ) ); ?>
                </div>
                <?php
            }
        }


	}
}








// Blog post title hook function.
if( ! function_exists( 'magazine_blog_posts_title_cb' ) ) {
	function magazine_blog_posts_title_cb() {
		if( get_the_title() ) {
			
			if( ! is_single() ) {
				echo '<a href="'.esc_url( get_the_permalink() ).'" class="posts-title"><h4>'.esc_html( get_the_title() ).'</h4></a>';
			} else {
				echo '<span class="posts-title"><h3>'.esc_html( get_the_title() ).'</h3></span>';
			}

		}
	}
}

// Blog posts meta hook function.
if( ! function_exists( 'magazine_blog_posts_meta_cb' ) ) {
	function magazine_blog_posts_meta_cb() {
		$tags = magazine_post_tags();
		if( $tags ):
			?>
            <ul class="tags">
				<?php
				echo wp_kses_post( $tags );
				?>
            </ul>
		<?php
		endif;
	}
}

// Blog posts meta hook function.
if( ! function_exists( 'magazine_blog_posts_bottom_meta_cb' ) ) {
	function magazine_blog_posts_bottom_meta_cb() {

		$date_format = get_option( 'date_format' );

		?>
		<ul class="meta">
			<li><a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><span class="lnr lnr-user"></span><?php echo esc_html( get_the_author() ) ?></a></li>
			<li><a href="<?php echo esc_url( magazine_blog_date_permalink() ); ?>"><span class="lnr lnr-calendar-full"></span><?php echo esc_html( get_the_date( $date_format ) ); ?></a></li>
			<li><?php echo magazine_posted_comments(); ?></li>
		</ul>

		<?php


        $allcat = get_the_category();
        if( is_single() && count( $allcat ) > 1 ){
            echo '<div class="blog-cat-list"><span>'.esc_html__('Categories:', 'magazine').'</span>';
            foreach ( $allcat as $cat ){
                echo '<a href="'.get_category_link( $cat->term_id ).'">'. $cat->name .',</a>';

            }
            echo '</div>';
        }


	}
}

// Blog posts excerpt hook function.
if( ! function_exists( 'magazine_blog_posts_excerpt_cb' ) ) {
	function magazine_blog_posts_excerpt_cb() {
		?>
		<div class="p-b-12">
			<?php 
			// Post excerpt
			echo magazine_excerpt_length( absint( magazine_opt('magazine_post_excerpt', '15') ) );

			// Link Pages
			magazine_link_pages();
			?>
		</div>			
		<?php

	}
}

// Blog posts content hook function.
if( ! function_exists( 'magazine_blog_posts_content_cb' ) ) {
	function magazine_blog_posts_content_cb() {
		the_content();
		// Link Pages

        $alltags = get_tags();
        if( has_tag() ){
            echo '<div class="all-tags">';
            echo '<span>'.esc_html__('Tags: ', 'magazine') .'</span>';
            foreach ( $alltags as $tag ){
                echo '<a href="'. get_tag_link( $tag->term_id ) .'">'.$tag->name.',</a>';
            }
            echo '</div>';
        }

		magazine_link_pages();
	}
}

// Page content hook function.
if( ! function_exists( 'magazine_page_content_cb' ) ) {
	function magazine_page_content_cb() {
		?>
		<div class="page--content">
			<?php 
			the_content();

			// Link Pages
			magazine_link_pages();
			?>

		</div>
		<?php
		// comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}
}

// Blog page sidebar hook function.
if( ! function_exists( 'magazine_blog_sidebar_cb' ) ) {
	function magazine_blog_sidebar_cb() {
		
		$sidebarOpt = magazine_sidebar_opt();
		
		if( $sidebarOpt != '1' ) {
			get_sidebar();
		}
	
			
	}
}

// Page sidebar hook function.
if( ! function_exists( 'magazine_page_sidebar_cb' ) ) {
	function magazine_page_sidebar_cb() {

		$sidebarOpt = magazine_page_sidebar_opt();

		if( $sidebarOpt != '1'  ) {
			get_sidebar();
		}


	}
}


// Blog single post  social share hook function.
if( ! function_exists( 'magazine_blog_posts_share_cb' ) ) {
	function magazine_blog_posts_share_cb() {
					
		if( function_exists( 'magazine_social_sharing_buttons' ) ) {
			magazine_social_sharing_buttons();
		}			
	}
}

/**
 * Blog single post meta category, tag, next-previous link, comments form and biography hook function.
 */
if( ! function_exists('magazine_blog_single_meta_cb') ) {
	function magazine_blog_single_meta_cb() {

		$date_format = get_option( 'date_format' );
		?>

            <p class="user-name col-lg-12 col-md-12 col-6"><a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><?php echo esc_html( get_the_author() ) ?></a> <span class="lnr lnr-user"></span></p>
            <p class="date col-lg-12 col-md-12 col-6"><a href="<?php echo esc_url( magazine_blog_date_permalink() ); ?>"><?php echo esc_html( get_the_date( $date_format ) ) ?></a> <span class="lnr lnr-calendar-full"></span></p>
            <?php
            if( magazine_opt('magazine-blog-like-toggle') && function_exists('get_simple_likes_button') ) {
                echo '<p class="view col-lg-12 col-md-12 col-6">'.get_simple_likes_button( absint( get_the_ID() ) ).'</p>';
            }
            ?>
            <p class="comments col-lg-12 col-md-12 col-6"><?php echo magazine_posted_comments(); ?></p>
			<?php
            
            // Social Share Icons
			if( magazine_opt( 'magazine-blog-social-share-toggle' ) && function_exists( 'magazine_social_sharing_buttons' ) ) {
				echo '<div class="social-links col-lg-12 col-md-12 col-6">'.magazine_social_sharing_buttons().'</div>';
			}


	}
}

// First category name
if( ! function_exists( 'magazine_first_cat_name_cb' ) ){
	function magazine_first_cat_name_cb(){
		// Category
		$cats = get_the_category();
		if( has_category() ) {
			echo '<ul class="tags"><li><a href="' . esc_url( get_category_link( absint( $cats[0]->term_id ) ) ) . '">'.$cats[0]->name.'</a></li></ul>';
		}
		
	}
}


/** 
 * Blog single footer nav
 */
if( ! function_exists('magazine_blog_single_footer_nav_cb') ) {
	function magazine_blog_single_footer_nav_cb() {

		// Start nav Area
		if( get_next_post_link() || get_previous_post_link()   ):
			$nextPost = get_next_post();
			$prevPost = get_previous_post();
			?>
			<div class="navigation-wrap justify-content-between d-flex">
				<?php
				if( $prevPost ){ ?>
					<a class="prev" href="<?php the_permalink( absint( $prevPost->ID ) ) ?>"><span class="lnr lnr-arrow-left"></span><?php echo esc_html__('Prev Post', 'magazine') ?></a>
					<?php
				}
				
				if( $nextPost ){ ?>
					<a class="next" href="<?php the_permalink( absint( $nextPost->ID ) ) ?>"><?php echo esc_html__('Next Post', 'magazine') ?><span class="lnr lnr-arrow-right"></span></a>
					<?php
				}
				?>
			</div>
			<?php
		endif;

		// Author biography
		if( '' !== get_the_author_meta( 'description' ) ) {
			get_template_part( 'templates/biography' );
		}
	}
}

// Blog 404 page hook function.
if( ! function_exists( 'magazine_fof_cb' ) ) {
	function magazine_fof_cb() {
		get_template_part( 'templates/404' );			
	}
}

