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
?>
<div class="col-sm-12 text-center">
	<h1 class="blog-item-title m-b-10"><?php esc_html_e( 'Nothing Found', 'magazine' ); ?></h1>

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	    <p><?php echo sprintf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'magazine' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>
			
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'magazine' ); ?></p>
				<div class="row content-none-search">
					<div class="col-sm-4 offset-sm-4 p-t-30">
						<?php 
						$anchor = magazine_anchor_tag(
							array(
								'url' 	 => esc_url( site_url( '/' ) ),
								'text' 	 => esc_html__( 'Back to home page', 'magazine' ),
								'class'  => 'genric-btn primary'
							)
						);
						echo wp_kses_post( $anchor );
						?>
					</div>
				</div>

		<?php else : ?>

	    <p><?php esc_html_e( 'It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'magazine' ); ?></p>
	    <?php get_search_form(); ?>

	<?php endif; ?>
</div>
