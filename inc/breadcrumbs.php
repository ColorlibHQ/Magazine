<?php 
/**
 *
 * @Packge      magazine
 * @Author      Colorlib
 * @Author URL  https//www.Colorlib.com
 * @version     1.0
 *
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

if ( ! function_exists( 'magazine_breadcrumbs' ) ) {
    function magazine_breadcrumbs( $args = array() ) {
        if ( is_front_page() ) {
            return;
        }
        if ( get_theme_mod( 'ct_ignite_show_breadcrumbs_setting' ) == 'no' ) {
            return;
        }
        global $post;
        $defaults  = array(
            'breadcrumbs_id'      => '',
            'breadcrumbs_classes' => esc_html( 'breadcrumb' ),
            'home_title'          => esc_html__( 'Home', 'magazine' )
        );
        $args      = apply_filters( 'magazine_breadcrumbs_args', wp_parse_args( $args, $defaults ) );
                
        $args_el = array();
        
        if( $args['breadcrumbs_id'] ) {
            
            $args_el[] =  'id="'.esc_attr( $args['breadcrumbs_id'] ).'"';
        }
        
        if( $args['breadcrumbs_classes'] ) {
            
            $args_el[] =  'class="'.esc_attr( $args['breadcrumbs_classes'] ).'"';
            
        }
        
        /*
        * Begin Markup 
        */
        
        // Open the breadcrumbs
        $html  = '<div class="bread-crumb link-nav">';
        // Add Homepage link (always present)
        $html .= '<a class="bread-link s-text16 bread-home" href="' . esc_url( get_home_url('/') ) . '" title="' . esc_attr( $args['home_title'] ) . '">'.esc_html__( 'Home', 'magazine' ).' <span class="lnr lnr-arrow-right"></span></a>';
        // Post
        if ( is_singular( 'post' ) ) {
            $category = get_the_category();
            $category_values = array_values( $category );
            $last_category = end( $category_values );
            $cat_parents = rtrim( get_category_parents( absint( $last_category->term_id ), true, '<span class="lnr lnr-arrow-right"></span>' ), ',' );
            $cat_parents = explode( ',', $cat_parents );
            foreach ( $cat_parents as $parent ) {
                $html .= wp_kses_post( $parent );         
            }
            $html .= '<span class="s-text17 bread-' . esc_attr( $post->ID ) . '" title="' . esc_attr( get_the_title() ) . '">' . esc_html( get_the_title() ) . '</span>';
        } elseif ( is_singular( 'page' ) ) {
            if ( $post->post_parent ) {
                $parents = get_post_ancestors( $post->ID );
                $parents = array_reverse( $parents );
                foreach ( $parents as $parent ) {
                    $html .= '<a class="bread-parent s-text16 bread-parent-' . esc_attr( $parent ) . '" href="' . esc_url( get_permalink( $parent ) ) . '" title="' . esc_attr( get_the_title( $parent ) ) . '">' . esc_html( get_the_title( $parent ) ) . ' <span class="lnr lnr-arrow-right"></span></a>';
                }
            }
            $html .= '<span class="s-text17" title="' . esc_attr( get_the_title() ) . '"> ' . esc_html( get_the_title() ) . '</span>';
        } elseif ( is_singular( 'attachment' ) ) {
            $parent_id        = $post->post_parent;
            $parent_title     = get_the_title( $parent_id );
            $parent_permalink = esc_url( get_permalink( $parent_id ) );
            $html .= '<a class="bread-parent s-text16" href="' . esc_url( $parent_permalink ) . '" title="' . esc_attr( $parent_title ) . '">' . esc_attr( $parent_title ) . ' <span class="lnr lnr-arrow-right"></span></a>';
            $html .= '<span class="s-text17" title="' . esc_attr( get_the_title() ) . '"> ' . esc_html( get_the_title() ) . '</span>';
        } elseif ( is_singular() ) {
            $post_type         = get_post_type();
            $post_type_object  = get_post_type_object( $post_type );
            $post_type_archive = get_post_type_archive_link( $post_type );
            $html .= '<a class="bread-cat s-text16 bread-custom-post-type-' . esc_attr( $post_type ) . '" href="' . esc_url( $post_type_archive ) . '" title="' . esc_attr( $post_type_object->labels->name ) . '">' . esc_attr( $post_type_object->labels->name ) . ' <span class="lnr lnr-arrow-right"></span></a>';
            $html .= '<span class="s-text17 bread-' . $post->ID . '" title="' . $post->post_title . '">' . $post->post_title . '</span>';
			
        } elseif ( is_category() ) {
            $parent = get_queried_object()->category_parent;
            if ( $parent !== 0 ) {
                $parent_category = get_category( $parent );
                $category_link   = get_category_link( $parent );
                $html .= '<a class="bread-parent s-text16 bread-parent-' . esc_attr( $parent_category->slug ) . '" href="' . esc_url( $category_spannk ) . '" title="' . esc_attr( $parent_category->name ) . '">' . esc_attr( $parent_category->name ) . ' <span class="lnr lnr-arrow-right"></span></a>';
            }
            $html .= '<span class="s-text17 bread-cat" title="' . $post->ID . '">' . single_cat_title( '', false ) . '</span>';
        } elseif ( is_tag() ) {
            $html .= '<span class="s-text17 bread-tag">' . single_tag_title( '', false ) . '</span>';
        } elseif ( is_author() ) {
            $html .= '<span class="s-text17 bread-author">' . get_queried_object()->display_name . '</span>';
        } elseif ( is_day() ) {
            $html .= '<span class="s-text17 bread-day">' . get_the_date() . '</span>';
        } elseif ( is_month() ) {
            $html .= '<span class="s-text17 bread-month">' . get_the_date( 'F Y' ) . '</span>';
        } elseif ( is_year() ) {
            $html .= '<span class="s-text17 bread-year">' . get_the_date( 'Y' ) . '</span>';
        } elseif ( is_archive() ) {			
            $custom_tax_name = get_queried_object()->name;
            $html .= '<span class="s-text17 bread-archive">' . esc_attr( $custom_tax_name ) . '</span>';
        } elseif ( is_search() ) {
            $html .= '<span class="s-text17 bread-search">'.esc_html__('Search results for:','magazine') . get_search_query() . '</span>';
        } elseif ( is_404() ) {
            $html .= '<span>' . esc_html__( 'Error 404', 'magazine' ) . '</span>';
        } elseif ( is_home() ) {
            $html .= '<span class="s-text17">' . get_the_title( get_option( 'page_for_posts' ) ) . '</span>';
        }
        $html .= '</div>';
        $html = apply_filters( 'magazine_breadcrumbs_filter', $html );

		echo wp_kses_post( $html );
		
        
    }
}
