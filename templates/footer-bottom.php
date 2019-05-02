<?php 


	// Copy right text
	$url = 'https://colorlib.com/';
	$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'magazine' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );

	?>
	<div class="footer-bottom row align-items-center">
		<p class="footer-text m-0 col-lg-6 col-md-12"><?php echo wp_kses_post( magazine_opt( 'magazine-copyright-text-settings', $copyText ) ); ?></p>
		<?php
            if( has_nav_menu( 'social-menu' ) ) {
                echo '<div class="col-lg-6 col-sm-12 footer-social">';
                    $args = array(
                        'theme_location' => 'social-menu',
                        'container'      => '',
                        'depth'          => 1,
                        'menu_class'     => 'footer-social',
                        'fallback_cb'    => 'magazine_social_navwalker::fallback',
                        'walker'         => new magazine_social_navwalker(),
                    );  
                    wp_nav_menu( $args );
                echo '</div>';
            }
            ?>
	</div>
