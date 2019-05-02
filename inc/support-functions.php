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

// Post Category
function magazine_post_cats() {
	
	$cats = get_the_category();
	$categories = '';
    if( $cats ) {

        $categories .= '<ul class="tags">';
        
        foreach( $cats as $cat ) {
           $categories .= '<li><a href="' . esc_url( get_category_link( absint( $cat->term_id ) ) ) . '">' .esc_html( $cat->name ) . '</a></li>';
        }
        
        $categories .= '</ul>';
    }
	
	return $categories;
	
}

// Post Tags
function magazine_post_tags() {
	
	$tags = get_the_tags();
	
	$getTags = '';
	
	if( $tags ) {
		foreach( $tags as $tag ){
			$getTags .= '<li><a href="' . esc_url( get_tag_link( absint( $tag->term_id ) ) ) . '">' . esc_html( $tag->name ) . '</a></li>';
		}
	
	}
	
	return $getTags;
	
}

// magazine comment template callback
function magazine_comment_callback( $comment, $args, $depth ) {
    
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo esc_attr( $tag ); ?> <?php comment_class( ( empty( $args['has_children'] ) ? '' : 'parent').' comment-list' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment--item">
    <?php endif; ?>
        <div class="single-comment blog-detail-txt justify-content-between">
            <div class="user justify-content-between">
                <div class="author-info justify-content-between">
                    <div class="thumb justify-content-between d-flex">
                        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                        <div class="author">
                            <div class="justify-content-between d-flex">
                            <div class="">
                                <h5><?php printf( __( '<span class="comment-author-name">%s</span> ', 'magazine' ), get_comment_author_link() ); ?></h5>
                                <p class="date"><?php printf( __('%1$s at %2$s', 'magazine'), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( esc_html__( '(Edit)', 'magazine' ), '  ', '' ); ?> </p>
                                 <?php if ( $comment->comment_approved == '0' ) : ?>
                                 <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'magazine' ); ?></em>
                                  <br>
                                <?php endif; ?>
                            </div>
                            <div class="reply-btn">
                                <?php comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 1, 'max_depth' => 5, 'reply_text' => 'Reply' ) ) ); ?>
                            </div>
                            </div>

                            <div class="desc">
                                <div class="comment">
                                    <?php comment_text(); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
		</div>


    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php  
}
// add class comment reply link
add_filter('comment_reply_link', 'magazine_replace_reply_link_class');
function magazine_replace_reply_link_class( $class ) {
    $class = str_replace("class='comment-reply-link", "class='btn-reply text-uppercase", $class);
    return $class;
}

// Move comment field to bottom
function magazine_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
 
add_filter( 'comment_form_fields', 'magazine_move_comment_field_to_bottom' );
