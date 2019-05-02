<?php 
/**
 * @Packge 	   : magazine
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 *
 * Template Name: Blog Home Page
 */
 
get_header();
?>
	<?php
	$cat_post_toggle = magazine_opt( 'magazine-category-post-toggle', false );
	if( $cat_post_toggle ){ ?>
		<section class="top-post-area pt-10">
			<div class="container no-padding">
				<div class="row small-gutters">
				<?php 
					$cat_slug = ! empty( magazine_opt( 'magazine_category_slug' ) ) ? magazine_opt( 'magazine_category_slug' ) : '';

    				$cat_slugs  = explode(', ', $cat_slug);

					$category = new WP_Query(array(
						'post_type'     => 'post',
						'posts_per_page'=> 3,
						'tax_query'         => array(
							array(
								'taxonomy' => 'category',
								'field' => 'slug',
								'terms' => $cat_slugs
							)
						),
					) );
					if( $category->have_posts() ){
						$i = 0;
						while( $category->have_posts() ){
							$category->the_post();
							if($i==0) { ?>
								<div class="col-lg-8 top-post-left">
									<div class="feature-image-thumb relative">
										<div class="overlay overlay-bg"></div>
										<?php the_post_thumbnail( 'magazine_760x445', array('class'=>'img-fluid') )?>
									</div>
									<div class="top-post-details">
										<?php magazine_first_cat_name_cb() ?>
										<a href="<?php the_permalink(); ?>">
											<h3><?php the_title() ?></h3>
										</a>
										<?php magazine_blog_posts_bottom_meta_cb(); ?>
									</div>
								</div>
								<?php 
							} 
							$i++;
						} 
						wp_reset_postdata(); ?>
						
						<div class="col-lg-4 top-post-right">
						<?php					
						$i = 0;
						while( $category->have_posts() ) : $category->the_post();
							if( $i==0 ){
								$i++;
								continue;
							} 
							if( has_post_thumbnail() ) {
								?>
								<div class="single-top-post mt-10">
									<div class="feature-image-thumb relative">
										<div class="overlay overlay-bg"></div>
										<?php the_post_thumbnail( 'magazine_380x220', array('class'=>'img-fluid') )?>
									</div>
									<div class="top-post-details">
										<?php magazine_first_cat_name_cb() ?>
										<a href="<?php the_permalink(); ?>">
											<h4><?php the_title() ?></h4>
										</a>
										<?php magazine_blog_posts_bottom_meta_cb(); ?>
									</div>
								</div>
								<?php 
							}
							$i++;
						endwhile;
						wp_reset_postdata();
					}
					?>
						
					</div>
					<?php
					$brackingNews = magazine_opt( 'magazine-bracking-news-toggle', false );
					if( $brackingNews ){ ?>
						<div class="col-lg-12">
							<div class="news-tracker-wrap">
								<h6><span><?php echo esc_html__( 'Breaking News:', 'magazine' ); ?></span> <?php echo magazine_opt('magazine_bracking_news') ?></h6>
							</div>
						</div>
						<?php
					}
					?>
					
				</div>
			</div>
		</section>
		<?php 
	} ?>

	<section class="latest-post-area pb-120">
		<div class="container no-padding">
			<div class="row">
				<div class="col-lg-8 post-list">
					<!-- Start latest-post Area -->
					<?php
					$latestPostBlock = magazine_opt( 'magazine-latest-news-toggle', false );
					if( $latestPostBlock ){ ?>
						<div class="latest-post-wrap">
							<?php
								$latestNewsTitle = magazine_opt( 'magazine_latest_news_section_title' );
								if( ! empty( $latestNewsTitle ) ){
									echo '<h4 class="cat-title"> '.esc_html( $latestNewsTitle ).' </h4>';
								}
							?>
							<?php   
							$date_format = get_option( 'date_format' );
							$postNumber = ! empty( magazine_opt( 'magazine_latest_news_post_number' ) ) ? magazine_opt( 'magazine_latest_news_post_number' ) : '4';
							$args = array(
								'post_type'      => 'post',
								'posts_per_page' => absint( $postNumber )
							);
							
							$latestPost = new WP_Query( $args );
							
							if( $latestPost->have_posts() ):
								while( $latestPost->have_posts() ):
									$latestPost->the_post();
									?>
									<div class="single-latest-post row align-items-center">
										<div class="col-lg-5 post-left">
											<?php if( has_post_thumbnail() ){ ?>
												<div class="feature-img relative">
													<div class="overlay overlay-bg"></div>
													<?php the_post_thumbnail( 'magazine_blog_300x200', array( 'class' => 'img-fluid' ) )?>
												</div>
												<?php
											} ?>
											<?php magazine_first_cat_name_cb() ?>
										</div>
										<div class="col-lg-7 post-right">
											<a href="<?php the_permalink(); ?>">
												<h4><?php the_title(); ?></h4>
											</a>
											<?php magazine_blog_posts_bottom_meta_cb(); ?>
											<p class="excert">
												<?php echo wp_trim_words( get_the_content(), 13, '') ?>
											</p>
										</div>
									</div>
									<?php
								endwhile;
								wp_reset_postdata();
							endif;
							?>
						</div>
						<?php
					} ?>

					
					<?php 
					$magazineAd = magazine_opt( 'magazine_ad_section' );
					if( ! empty( $magazineAd ) ){ ?>
						<div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
							<?php echo $magazineAd; ?>
						</div>
						<?php
					}

					$popularPostSection = magazine_opt( 'magazine-popularpost-toggle', false );
					if( $popularPostSection ) {
						$ppSectionTitle = magazine_opt( 'magazine_popularpost_section_title' );
						$pPostNumber = ! empty( magazine_opt( 'magazine_popular_post_number' ) ) ? magazine_opt( 'magazine_popular_post_number' ) : '3';
					?>
						<div class="popular-post-wrap">
							<?php if( ! empty( $ppSectionTitle ) ) {
								echo '<h4 class="title">'. esc_html( $ppSectionTitle ) .'</h4>';
							} 

							// Popular Post Query
							$args = array(
								'post_type' 	=> 'post',
								'posts_per_page'=> absint( $pPostNumber ),
								'meta_key'      => 'magazine_post_views_count',
								'orderby'       => 'meta_value_num',
								'order'         => 'DESC'
							);
							$popularPost = new WP_Query( $args );
							
							if( $popularPost->have_posts() ){
								
								$i = 0;
								while( $popularPost->have_posts() ){
									$popularPost->the_post();
									if($i==0) { ?>
										<div class="feature-post relative">
											<div class="feature-img relative">
												<div class="overlay overlay-bg"></div>
												<?php the_post_thumbnail( 'magazine_710x310', array('class'=>'img-fluid') )?>
											</div>
											<div class="details">
												<?php magazine_first_cat_name_cb() ?>
												<a href="<?php the_permalink(); ?>">
													<h3><?php the_title(); ?></h3>
												</a>
												<?php magazine_blog_posts_bottom_meta_cb(); ?>
											</div>
										</div>
										<?php 
									}
									$i++;
								} 
								wp_reset_postdata(); ?>
								
								<div class="row mt-20 medium-gutters">
									<?php 
									$i = 0;
									while( $popularPost->have_posts() ) : $popularPost->the_post();
										if( $i==0 ){
											$i++;
											continue;
										} ?>
										<div class="col-lg-6 single-popular-post">
											<div class="feature-img-wrap relative">
												<div class="feature-img relative">
													<div class="overlay overlay-bg"></div>
													<?php the_post_thumbnail( 'magazine_350x190', array('class'=>'img-fluid') )?>
												</div>
												<?php magazine_first_cat_name_cb() ?>
											</div>
											<div class="details">
												<a href="<?php the_permalink(); ?>">
													<h4><?php the_title(); ?></h4>
												</a>
												<?php magazine_blog_posts_bottom_meta_cb(); ?>
												<p class="excert">
													<?php echo wp_trim_words( get_the_content(), 16, '' ) ?>
												</p>
											</div>
										</div>

										<?php
										$i++;
									endwhile;
									wp_reset_postdata(); ?>

								</div>
								<?php								
							} ?>
						</div>
						<?php 
					} 
					
					$relaventToggle = magazine_opt( 'magazine-relavent-post-toggle', false );
					if( $relaventToggle ){
						$relaventSectionT = magazine_opt( 'magazine_relavent_section_title' );
						$revalentCatSlug  = magazine_opt( 'magazine_relavent_cat_slug' );
						$revalentPostNumber = magazine_opt( 'magazine_relavent_post_number' );

						$relavent = new WP_Query(array(
							'post_type'     => 'post',
							'posts_per_page'=> absint( $revalentPostNumber ),
							'tax_query'         => array(
								array(
									'taxonomy' => 'category',
									'field' => 'slug',
									'terms' => $revalentCatSlug
								)
							),
						) );

						if( $relavent->have_posts() ){
						?>
							<div class="relavent-story-post-wrap mt-30">
								<h4 class="title">Relavent Stories</h4>
								<div class="relavent-story-list-wrap">
									<?php
									while( $relavent->have_posts() ){
										$relavent->the_post();
										?>

										<div class="single-relavent-post row align-items-center">
											<div class="col-lg-5 post-left">
												<?php
												if( has_post_thumbnail() ){ ?>
													<div class="feature-img relative">
														<div class="overlay overlay-bg"></div>
														<?php the_post_thumbnail( 'magazine_blog_300x200', array( 'class' => 'img-fluid' ) ) ?>
													</div>
													<?php
												} ?>
												<?php magazine_first_cat_name_cb() ?>
											</div>
											<div class="col-lg-7 post-right">
												<a href="<?php the_permalink(); ?>">
													<h4><?php the_title(); ?></h4>
												</a>
												<?php magazine_blog_posts_bottom_meta_cb(); ?>
												<p class="excert">
													<?php echo wp_trim_words( get_the_content(), 13, '') ?>
												</p>
											</div>
										</div>
										<?php
									}	?>

								</div>
							</div>
							<?php
						}
					} ?>
						


				</div>
				<?php get_sidebar()?>


			</div>
		</div>
	</section>
























	<?php
get_footer();
