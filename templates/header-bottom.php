<?php 
$id     = get_the_ID();
$bgopt  = get_post_meta( absint( $id ), '_magazine_builderpage_headerimg', true );

$glob_class = ' global-banner';
$setbgurl   = '';

if ( $bgopt == 'featured' ) {
	$setbgurl  = get_the_post_thumbnail_url( absint( $id ) );
	$glob_class = '';
}
?>
<div class="site-main-container">
	<section class="top-post-area pt-10">
		<div class="container no-padding">
			<div class="row">
				<div class="col-lg-12">
					<div class="hero-nav-area">
						<?php 
						if ( is_archive() ) {
							the_archive_title('<h1>', '</h1>');
						} elseif ( is_home() ) {
							echo '<h1>'.esc_html__( 'Blog', 'magazine' ).'</h1>';
						} elseif ( is_search() ) {
							echo '<h1>'.esc_html__( 'Search Result', 'magazine' ).'</h1>';
						} elseif ( is_single() ){
							if( has_post_format('video') ){
								echo '<h1>'. esc_html__( 'Video Post', 'magazine') .'</h1>';
							} elseif( has_post_format('audio') ){
								echo '<h1>'. esc_html__( 'Audio Post', 'magazine') .'</h1>';
							} elseif ( has_post_format( 'gallery' ) ) {
								echo '<h1>'. esc_html__( 'Gallery Post', 'magazine') .'</h1>';
							} else{
								echo '<h1>'. esc_html__( 'Image Post', 'magazine') .'</h1>';
							}
						} else {
							the_title( '<h1>', '</h1>' );
						}
						// breadcrumbs
						echo magazine_breadcrumbs();
						?>	
					</div>											
				</div>											
			</div>
		</div>
	</section>