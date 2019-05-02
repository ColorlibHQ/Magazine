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
} ?>
	<div class="blog-pagination justify-content-center d-flex">
		<?php
		//Pagination
	    the_posts_pagination(
	        array(
	            'mid_size'  => 2,
	            'prev_text' => __( '<span class="lnr lnr-chevron-left"></span>', 'magazine' ),
	            'next_text' => __( '<span class="lnr lnr-chevron-right"></span>', 'magazine' ),
	            'screen_reader_text' => ' '
	        )
	    ); ?>
	</div>