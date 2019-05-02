<?php
/**
 * @version  1.0
 * @package  Magazine
 *
 */
 
 
/********************************************
*Creating recent post widget width thumb
**********************************************/
 
class magazine_recent_widget extends WP_Widget {


function __construct() {

parent::__construct(
// Base ID of your widget
'magazine_recent_widget',


// Widget name will appear in UI
esc_html__( '[ Magazine ] Recent Post', 'magazine' ),

// Widget description
array( 'description' => esc_html__( 'Add recent post with thumbnail', 'magazine' ), )
);

}

// This is where the action happens
public function widget( $args, $instance ) {
$title 	= apply_filters( 'widget_title', $instance['title'] );
$post_number = apply_filters( 'widget_post_number', $instance['post_number'] );

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

	//
	$arrya = array(
		'post_type' 	 => 'post',
		'posts_per_page' => esc_html( $post_number ),
	);
	
	$loop = new WP_Query( $arrya );

		if( $loop->have_posts() ){ ?>
		<div class="editors-pick-post">
		<?php 
			$i = 0;
			while( $loop->have_posts() ){
				$loop->the_post();
				if($i==0) { ?>
					<div class="feature-img-wrap relative">
						<div class="feature-img relative">
							<div class="overlay overlay-bg"></div>
							<?php
								the_post_thumbnail( 'magazine_320x195', array( 'class' => 'img-fluid' ) );
							?>
						</div>
						<?php magazine_first_cat_name_cb() ?>
					</div>
					<div class="details">
						<a href="<?php the_permalink(); ?>">
							<h4 class="mt-20"><?php the_title(); ?></h4>
						</a>
						<ul class="meta">
							<li><a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><span class="lnr lnr-user"></span><?php echo esc_html( get_the_author() ) ?></a></li>
							<li><a href="<?php echo esc_url( magazine_blog_date_permalink() ); ?>"><span class="lnr lnr-calendar-full"></span><?php echo esc_html( get_the_date( 'j F, Y' ) ) ?></a></li>
							<li><?php echo magazine_posted_comments(); ?></li>
						</ul>
						<p class="excert">
							<?php echo wp_trim_words( get_the_content(), 16, '' ); ?>
						</p>
					</div>
					<?php 
				}
				$i++;
			} 
			wp_reset_postdata();
			?>
			<div class="post-lists">
			<?php					
				$i = 0;
				while( $loop->have_posts() ) : $loop->the_post();
					if( $i==0 ){
						$i++;
						continue;
					}
					if( has_post_thumbnail() ):
						?>
						<div class="single-post d-flex flex-row">
							<div class="thumb">
							<?php
								the_post_thumbnail( 'magazine_widget_post_thumb', array( 'class' => 'img-fluid' ) );
							?>
							</div>
							<div class="detail">
								<a href="<?php the_permalink(); ?>">
									<h6><?php the_title(); ?></h6>
								</a>
								<ul class="meta">
									<li><a href="<?php echo esc_url( magazine_blog_date_permalink() ); ?>"><span class="lnr lnr-calendar-full"></span><?php echo esc_html( get_the_date( 'j F, Y' ) ) ?></a></li>
									<li><?php echo magazine_posted_comments(); ?></li>
								</ul>
							</div>
						</div>
						<?php 
					endif;

					$i++;
				endwhile;
				wp_reset_postdata();
				?>

			</div>
		</div>
		<?php
		
	}
	
	echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
	
if ( isset( $instance[ 'title' ] ) ) {
	$title = $instance[ 'title' ];
}else {
	$title = esc_html__( 'Recent Post', 'magazine' );
}
//	
if ( isset( $instance[ 'post_number' ] ) ) {
	$post_number = $instance[ 'post_number' ];
}else {
	$post_number = absint( 3 );
}

// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'magazine'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'post_number' ); ?>"><?php _e( 'Posts Number:' ,'magazine'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'post_number' ); ?>" name="<?php echo $this->get_field_name( 'post_number' ); ?>" type="number" value="<?php echo esc_attr( $post_number ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['post_number'] = ( ! empty( $new_instance['post_number'] ) ) ? strip_tags( $new_instance['post_number'] ) : '';

return $instance;
}
} // Class magazine_recent_widget ends here


// Register and load the widget
function magazine_recent_post_load_widget() {
	register_widget( 'magazine_recent_widget' );
}
add_action( 'widgets_init', 'magazine_recent_post_load_widget' );