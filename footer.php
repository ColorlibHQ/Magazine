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

/**
 * Footer Area
 *
 * @Footer
 * @Back To Top Button
 *
 * @Hook magazine_footer
 *
 * @Hooked  magazine_footer_area 10
 * @Hooked  magazine_back_to_top 20
 *
 */

do_action( 'magazine_footer' );

wp_footer(); 
?>
</body>
</html>