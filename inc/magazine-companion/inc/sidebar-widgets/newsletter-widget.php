<?php
/**
 * @version  1.0
 * @package  Magazine
 *
 */
 
 
/**************************************
*Creating Newsletter Widget
***************************************/
 
class magazine_newsletter_widget extends WP_Widget {

    function __construct() {

        parent::__construct(
        // Base ID of your widget
        'magazine_newsletter_widget',


        // Widget name will appear in UI
        esc_html__( '[ Magazine ] Newsletter Form', 'magazine' ),

        // Widget description
        array( 'description' => esc_html__( 'Add footer newsletter signup form.', 'magazine' ), )
        );

    }

    // This is where the action happens
    public function widget( $args, $instance ) {
        
    $title 		= apply_filters( 'widget_title', $instance['title'] );
    $actionurl 	= apply_filters( 'widget_actionurl', $instance['actionurl'] );
    $desc 		= apply_filters( 'widget_desc', $instance['desc'] );

    // mc validation
    wp_enqueue_script( 'mc-validate');

    // before and after widget arguments are defined by themes
    echo wp_kses_post( $args['before_widget'] );
    if ( ! empty( $title ) )
    echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );

    ?>

    <div id="mc_embed_signup" class="newsletter-widget newsletter">

        <?php 
        if( $desc ){
            echo '<p>'.esc_html( $desc ).'</p>';
        }
        ?>

        <form novalidate action="<?php echo esc_url( $actionurl ); ?>" id="mc-embedded-subscribe-form" method="post" class="form-group d-flex flex-row">
            
            <div class="col-autos">
                <div class="input-group">
                <input type="email" name="EMAIL" class="form-control" placeholder="<?php esc_html_e( 'Email Address', 'magazine' ); ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" required>
                </div>
            </div>
            <button type="submit" class="bbtns"><?php echo esc_html__('Subcribe', 'magazine') ?></button>

            <div class="info"></div>

        </form>

    </div>

    <?php
    echo wp_kses_post( $args['after_widget'] );
    }
		
    // Widget Backend 
    public function form( $instance ) {
            
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }else {
            $title = esc_html__( 'Newsletter', 'magazine' );
        }


        //	Action Url
        if ( isset( $instance[ 'actionurl' ] ) ) {
            $actionurl = $instance[ 'actionurl' ];
        }else {
            $actionurl = '';
        }

        //	Text Area
        if ( isset( $instance[ 'desc' ] ) ) {
            $desc = $instance[ 'desc' ];
        }else {
            $desc = '';
        }


        // Widget admin form
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ,'magazine'); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'actionurl' ) ); ?>"><?php esc_html_e( 'Action URL:' ,'magazine'); ?></label>
        <p class="description"><?php esc_html_e( 'Enter here your MailChimp action URL.' ,'magazine'); ?> </p>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'actionurl' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'actionurl' ) ); ?>" type="text" value="<?php echo esc_attr( $actionurl ); ?>" />

        </p>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_html_e( 'Short Description:' ,'magazine'); ?></label> 
        <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>"><?php echo esc_textarea( $desc ); ?></textarea>
        </p>

    <?php 
    }

	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {

	
$instance = array();
$instance['title'] 	  = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['actionurl'] = ( ! empty( $new_instance['actionurl'] ) ) ? strip_tags( $new_instance['actionurl'] ) : '';
$instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';

return $instance;

}

} // Class magazine_newsletter_widget ends here


// Register and load the widget
function magazine_newsletter_load_widget() {
	register_widget( 'magazine_newsletter_widget' );
}
add_action( 'widgets_init', 'magazine_newsletter_load_widget' );