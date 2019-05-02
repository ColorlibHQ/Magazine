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

// Image Crop Size
	add_image_size( 'magazine_550x280', 550, 220, true );
	add_image_size( 'magazine_blog_300x200', 300, 200, true );
	add_image_size( 'magazine_blog_710x310', 710, 310, true );




 // theme option callback
function magazine_opt( $id = null, $default = '' ) {
	
	$opt = get_theme_mod( $id, $default );
	
	$data = '';
	
	if( $opt ) {
		$data = $opt;
	}
	
	return $data;
}

// Blog Date Permalink
function magazine_blog_date_permalink() {
	
	$year       = get_the_time( 'Y' ); 
    $month_link = get_the_time( 'm' );
    $day        = get_the_time( 'd' );

    $link = get_day_link( $year, $month_link, $day );
    
    return $link; 
}
// Blog Excerpt Length
if ( ! function_exists( 'magazine_excerpt_length' ) ) {
	function magazine_excerpt_length( $limit = 30 ) {

		$excerpt = explode( ' ', get_the_excerpt() );
		
		// $limit null check
		if( !null == $limit ) {
			$limit = $limit;
		} else {
			$limit = 30;
		}
		
		
		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice ).' ...';
		} else {
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice );
		}
		
		$excerpt = '<p>'.preg_replace('`\[[^\]]*\]`','',$excerpt).'</p>';
		return $excerpt;

	}
}
// Comment number and Link
if ( ! function_exists( 'magazine_posted_comments' ) ) :
    function magazine_posted_comments() {
        
        $comments_num = get_comments_number();
        if( comments_open() ) {
            if( $comments_num == 0 ) {
                $comments = esc_html__('0','magazine');
            } elseif ( $comments_num > 1 ) {
                $comments= $comments_num;
            } else {
                $comments = esc_html__( '01','magazine' );
            }
            $comments = '<span class="lnr lnr-bubble"></span><a href="' . esc_url( get_comments_link() ) . '">'. $comments .'</a>';
        } else {
            $comments = esc_html__( 'Comments are closed', 'magazine' );
        }
        
        return $comments;
    }
endif;

//audio format iframe match 
function magazine_iframe_match() {
    $audio_content = magazine_embedded_media( array('audio', 'iframe') );
    $iframe_match = preg_match("/\iframe\b/i",$audio_content, $match);
    return $iframe_match;
}

//Post embedded media
function magazine_embedded_media( $type = array() ) {
    
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );
        
    if( in_array( 'audio' , $type) ) {
    
        if( count( $embed ) > 0 ) {
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else {
           $output = '';
        }
        
    } else {
        
        if( count( $embed ) > 0 ) {

            $output = $embed[0];
        } else {
           $output = ''; 
        }
        
    }
    
    return $output;
   
}
// WP post link pages
function magazine_link_pages() {
    
    wp_link_pages( array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'magazine' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>',
    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'magazine' ) . ' </span>%',
    'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}

// theme logo
function magazine_theme_logo( $class = '' ) {

    $siteUrl = home_url('/');
    // site logo
		
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$imageUrl = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	
	if( ! empty( $imageUrl[0] ) ) {
		$siteLogo = '<a class="' . esc_attr( $class ) . '" href="' . esc_url( $siteUrl ) . '"><img src="' . esc_url( $imageUrl[0] ) . '" alt="' . esc_attr( magazine_image_alt( $imageUrl[0] ) ) . '"></a>';
	}else {
		$siteLogo = '<h2><a class="' . esc_attr( $class ) . '" href="' . esc_url( $siteUrl ) . '">' . esc_html( get_bloginfo('name') ) . '</a></h2>';
	}
	
	return '<div id="logo">' . $siteLogo . '</div>';
	
}

// Blog pull right class callback
function magazine_pull_right( $id = '', $condation ) {
    
    if( $id == $condation ) {
        return ' order-1';
    } else {
        return;
    }
    
}

// image alt tag
function magazine_image_alt( $url = '' ) {

    if( $url != '' ) {
        // attachment id by url 
        $attachmentid = attachment_url_to_postid( esc_url( $url ) );
       // attachment alt tag 
        $image_alt = get_post_meta( absint( $attachmentid ) , '_wp_attachment_image_alt', true );
        
        if( $image_alt ) {
            return $image_alt ;
        } else {
            $filename = pathinfo( esc_url( $url ) );
            $alt = str_replace( '-', ' ', $filename['filename'] );

            return $alt;
        }
   
    } else {
       return; 
    }

}

//  wysiwyg content output use in magazine companion
function magazine_get_textareahtml_output( $content ) {
    
	global $wp_embed;

	$content = $wp_embed->autoembed( $content );
	$content = $wp_embed->run_shortcode( $content );
	$content = wpautop( $content );
	$content = do_shortcode( $content );

	return $content;
}

// Slider list ( Shortcode ) select Options
function magazine_get_slider_shortcode_options( $field ) {

    $args = $field->args( 'get_post_type' );
		
    $args = is_array( $args ) ? $args : array();

    $args = wp_parse_args( $args, array( 'post_type' => 'post' ) );

    $postType = $args['post_type'];

	$args = array(
		'post_type'        => $postType,
		'post_status'      => 'publish',
	);

	$posts_array = get_posts( $args );	

	// Initate an empty array
	$term_options = array();
		
	foreach( $posts_array as $post ) {
		
		$term_options[ $post->post_name ] = $post->post_title;
		
	}
	
    return $term_options;

}

// html Style tag for background image use in magazine companion plugin
function magazine_inline_bg_img( $bgUrl ) {
    $bg = '';

    if( $bgUrl ) {
        $bg = 'style="background-image:url(' . esc_url( $bgUrl ) . ')"'; 
    }

    return $bg;
}

//  customize blog sidebar option value return
function magazine_sidebar_opt() {

    $sidebarOpt = magazine_opt( 'magazine-blog-sidebar-settings' );
    $sidebar = '1';
    // Blog Sidebar layout  opt
    if( is_array( $sidebarOpt ) ) {
        $sidebarOpt =  $sidebarOpt;
    } else {
        $sidebarOpt =  json_decode( $sidebarOpt, true );
    }
    
    
    if( !empty( $sidebarOpt['columnsCount'] ) ) {
        $sidebar = $sidebarOpt['columnsCount'];
    }


    return $sidebar;
}

//  customize page sidebar option value return
function magazine_page_sidebar_opt() {

    $pagesidebarOpt = magazine_opt( 'magazine-page-sidebar-settings' );
	$pagesidebar = '1';
    // Blog Sidebar layout  opt
    if( is_array( $pagesidebarOpt ) ) {
	    $pagesidebarOpt =  $pagesidebarOpt;
    } else {
	    $pagesidebarOpt =  json_decode( $pagesidebarOpt, true );
    }


    if( !empty( $pagesidebarOpt['columnsCount'] ) ) {
        $pagesidebar = $pagesidebarOpt['columnsCount'];
    }


    return $pagesidebar;
}

// Post View set
function magazine_set_post_views($postID) {
	$count_key = 'magazine_post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

// Body classes =====================
add_filter( 'body_class', function($classes) {
	if(is_home()) {
		$classes[] = 'blog-class';
	}
	elseif(is_front_page()) {
		$classes[] = 'front-page';
	}
	else{
		$classes[] = 'not-front-page';
	}
	return $classes;
});



