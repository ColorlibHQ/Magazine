<?php
/**
 * @Packge     : Magazine Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

// share button code
function magazine_social_sharing_buttons( $ulClass = '' ,$tagLine = '' ) {
    
    // Get page URL 
    $URL = get_permalink();

    $Sitetitle = get_bloginfo('name');

    // Get page title
    $Title = str_replace( ' ', '%20', get_the_title());
    
    // Construct sharing URL without using any script
    $twitterURL = 'https://twitter.com/intent/tweet?text='.esc_html( $Title ).'&amp;url='.esc_url( $URL ).'&amp;via='.esc_html( $Sitetitle );
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );
    $googleURL = 'https://plus.google.com/share?url='.esc_url( $URL );
    $linkedin = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );
     
    // Add sharing button at the end of page/page content
	$content = '';
    $content  .= '<ul class="'.esc_attr( $ulClass ).'">';
    $content .= $tagLine;
    $content .= '<li><a href="' . esc_url( $twitterURL ) . '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
    $content .= '<li><a href="' . esc_url( $facebookURL ) . '" target="_blank"><i class="fa fa-facebook"></i></a></li>';
    $content .= '<li><a href="' . esc_url( $googleURL ) . '" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
    $content .= '<li><a href="' . esc_url( $linkedin ) . '" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
    $content .= '</ul>';
    
    return $content;

}
