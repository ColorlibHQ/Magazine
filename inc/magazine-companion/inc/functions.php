<?php 
/**
 * @Packge     : Magazine Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( ! defined( 'WPINC' ) ) {
    die;
}

// Add Image Size
add_image_size( 'magazine_50x50', 50, 50, true );
add_image_size( 'magazine_260x180', 260, 180, true );
add_image_size( 'magazine_widget_post_thumb', 100, 80, true );
add_image_size( 'magazine_320x195', 320, 195, true );
add_image_size( 'magazine_350x190', 350, 190, true );
add_image_size( 'magazine_380x220', 380, 220, true );
add_image_size( 'magazine_710x310', 710, 310, true );
add_image_size( 'magazine_760x445', 760, 445, true );



// Instagram object Instance
function magazine_instagram_instance() {
    
    $api = Wpzoom_Instagram_Widget_API::getInstance();

    return $api;
}


// Section Heading
function magazine_section_heading( $title = '', $subtitle = '' ) {
    if( $title || $subtitle ):
        ?>
        <div class="row section-title">
            <?php 
            // Title
            if( $title ){
                echo magazine_heading_tag(
                    array(
                        'tag'   => 'h1',
                        'text'  => esc_html( $title ),
                    )
                );
            }
            // Sub Title
            if( $subtitle ){
                echo magazine_paragraph_tag(
                    array(
                        'text'  => esc_html( $subtitle ),
                    )
                );
            }
            ?>
        </div>
        <?php
    endif;
}

// Set contact form 7 default form template
function magazine_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {
        $template =
            '<div class="row"><div class="col-lg-6 form-group">[text* text-650 class:common-input class:mb-20 class:form-control placeholder "Enter your name"][email* email-694 class:common-input class:mb-20 class:form-control placeholder "Enter email address"][text* subject class:common-input class:mb-20 class:form-control placeholder "Enter subject"]</div><div class="col-lg-6 form-group">[textarea* message class:common-textarea class:form-control placeholder "Enter message"]</div><div class="col-lg-12"><div class="alert-msg" style="text-align: left;"></div>[submit class:primary-btn class:primary "Send message"]</div></div>';
        return $template;
    } 
    else {
        return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'magazine_contact7_form_content', 10, 2 );



// LinearIcon class Name list
function magazine_linearicon_list(){
	return [
		'lnr lnr-alarm' => 'alarm',
		'lnr lnr-apartment' => 'apartment',
		'lnr lnr-arrow-down' => 'arrow-down',
		'lnr lnr-arrow-down-circle' => 'arrow-down-circle',
		'lnr lnr-arrow-left' => 'arrow-left',
		'lnr lnr-arrow-left-circle' => 'arrow-left-circle',
		'lnr lnr-arrow-right' => 'arrow-right',
		'lnr lnr-arrow-right-circle' => 'arrow-right-circle',
		'lnr lnr-arrow-up' => 'arrow-up',
		'lnr lnr-arrow-up-circle' => 'arrow-up-circle',
		'lnr lnr-bicycle' => 'bicycle',
		'lnr lnr-bold' => 'bold',
		'lnr lnr-book' => 'book',
		'lnr lnr-bookmark' => 'bookmark',
		'lnr lnr-briefcase' => 'briefcase',
		'lnr lnr-bubble' => 'bubble',
		'lnr lnr-bug' => 'bug',
		'lnr lnr-bullhorn' => 'bullhorn',
		'lnr lnr-bus' => 'bus',
		'lnr lnr-calendar-full' => 'calendar-full',
		'lnr lnr-camera' => 'camera',
		'lnr lnr-camera-video' => 'camera-video',
		'lnr lnr-car' => 'car',
		'lnr lnr-cart' => 'cart',
		'lnr lnr-chart-bars' => 'chart-bars',
		'lnr lnr-checkmark-circle' => 'checkmark-circle',
		'lnr lnr-chevron-down' => 'chevron-down',
		'lnr lnr-chevron-down-circle' => 'chevron-down-circle',
		'lnr lnr-chevron-left' => 'chevron-left',
		'lnr lnr-chevron-left-circle' => 'chevron-left-circle',
		'lnr lnr-chevron-right' => 'chevron-right',
		'lnr lnr-chevron-right-circle' => 'chevron-right-circle',
		'lnr lnr-chevron-up' => 'chevron-up',
		'lnr lnr-chevron-up-circle' => 'chevron-up-circle',
		'lnr lnr-circle-minus' => 'circle-minus',
		'lnr lnr-clock' => 'clock',
		'lnr lnr-cloud' => 'cloud',
		'lnr lnr-cloud-check' => 'cloud-check',
		'lnr lnr-cloud-download' => 'cloud-download',
		'lnr lnr-cloud-sync' => 'cloud-sync',
		'lnr lnr-cloud-upload' => 'cloud-upload',
		'lnr lnr-code' => 'code',
		'lnr lnr-coffee-cup' => 'coffee-cup',
		'lnr lnr-cog' => 'cog',
		'lnr lnr-construction' => 'construction',
		'lnr lnr-crop' => 'crop',
		'lnr lnr-cross' => 'cross',
		'lnr lnr-cross-circle' => 'cross-circle',
		'lnr lnr-database' => 'database',
		'lnr lnr-diamond' => 'diamond',
		'lnr lnr-dice' => 'dice',
		'lnr lnr-dinner' => 'dinner',
		'lnr lnr-direction-ltr' => 'direction-ltr',
		'lnr lnr-direction-rtl' => 'direction-rtl',
		'lnr lnr-download' => 'download',
		'lnr lnr-drop' => 'drop',
		'lnr lnr-earth' => 'earth',
		'lnr lnr-enter' => 'enter',
		'lnr lnr-enter-down' => 'enter-down',
		'lnr lnr-envelope' => 'envelope',
		'lnr lnr-exit' => 'exit',
		'lnr lnr-exit-up' => 'exit-up',
		'lnr lnr-eye' => 'eye',
		'lnr lnr-file-add' => 'file-add',
		'lnr lnr-file-empty' => 'file-empty',
		'lnr lnr-film-play' => 'film-play',
		'lnr lnr-flag' => 'flag',
		'lnr lnr-frame-contract' => 'frame-contract',
		'lnr lnr-frame-expand' => 'frame-expand',
		'lnr lnr-funnel' => 'funnel',
		'lnr lnr-gift' => 'gift',
		'lnr lnr-graduation-hat' => 'graduation-hat',
		'lnr lnr-hand' => 'hand',
		'lnr lnr-heart' => 'heart',
		'lnr lnr-heart-pulse' => 'heart-pulse',
		'lnr lnr-highlight' => 'highlight',
		'lnr lnr-history' => 'history',
		'lnr lnr-home' => 'home',
		'lnr lnr-hourglass' => 'hourglass',
		'lnr lnr-inbox' => 'inbox',
		'lnr lnr-indent-decrease' => 'indent-decrease',
		'lnr lnr-indent-increase' => 'indent-increase',
		'lnr lnr-italic' => 'italic',
		'lnr lnr-keyboard' => 'keyboard',
		'lnr lnr-laptop' => 'laptop',
		'lnr lnr-laptop-phone' => 'laptop-phone',
		'lnr lnr-layers' => 'layers',
		'lnr lnr-leaf' => 'leaf',
		'lnr lnr-license' => 'license',
		'lnr lnr-lighter' => 'lighter',
		'lnr lnr-line-spacing' => 'line-spacing',
		'lnr lnr-linearicons' => 'linearicons',
		'lnr lnr-link' => 'link',
		'lnr lnr-list' => 'list',
		'lnr lnr-location' => 'location',
		'lnr lnr-lock' => 'lock',
		'lnr lnr-magic-wand' => 'magic-wand',
		'lnr lnr-magnifier' => 'magnifier',
		'lnr lnr-map' => 'map',
		'lnr lnr-map-marker' => 'map-marker',
		'lnr lnr-menu' => 'menu',
		'lnr lnr-menu-circle' => 'menu-circle',
		'lnr lnr-mic' => 'mic',
		'lnr lnr-moon' => 'moon',
		'lnr lnr-move' => 'move',
		'lnr lnr-music-note' => 'music-note',
		'lnr lnr-mustache' => 'mustache',
		'lnr lnr-neutral' => 'neutral',
		'lnr lnr-page-break' => 'page-break',
		'lnr lnr-paperclip' => 'paperclip',
		'lnr lnr-paw' => 'paw',
		'lnr lnr-pencil' => 'pencil',
		'lnr lnr-phone' => 'phone',
		'lnr lnr-phone-handset' => 'phone-handset',
		'lnr lnr-picture' => 'picture',
		'lnr lnr-pie-chart' => 'pie-chart',
		'lnr lnr-pilcrow' => 'pilcrow',
		'lnr lnr-plus-circle' => 'plus-circle',
		'lnr lnr-pointer-down' => 'pointer-down',
		'lnr lnr-pointer-left' => 'pointer-left',
		'lnr lnr-pointer-right' => 'pointer-right',
		'lnr lnr-pointer-up' => 'pointer-up',
		'lnr lnr-poop' => 'poop',
		'lnr lnr-power-switch' => 'power-switch',
		'lnr lnr-printer' => 'printer',
		'lnr lnr-pushpin' => 'pushpin',
		'lnr lnr-question-circle' => 'question-circle',
		'lnr lnr-redo' => 'redo',
		'lnr lnr-rocket' => 'rocket',
		'lnr lnr-sad' => 'sad',
		'lnr lnr-screen' => 'screen',
		'lnr lnr-select' => 'select',
		'lnr lnr-shirt' => 'shirt',
		'lnr lnr-smartphone' => 'smartphone',
		'lnr lnr-smile' => 'smile',
		'lnr lnr-sort-alpha-asc' => 'sort-alpha-asc',
		'lnr lnr-sort-amount-asc' => 'sort-amount-asc',
		'lnr lnr-spell-check' => 'spell-check',
		'lnr lnr-star' => 'star',
		'lnr lnr-star-empty' => 'star-empty',
		'lnr lnr-star-half' => 'star-half',
		'lnr lnr-store' => 'store',
		'lnr lnr-strikethrough' => 'strikethrough',
		'lnr lnr-sun' => 'sun',
		'lnr lnr-sync' => 'sync',
		'lnr lnr-tablet' => 'tablet',
		'lnr lnr-tag' => 'tag',
		'lnr lnr-text-align-center' => 'text-align-center',
		'lnr lnr-text-align-justify' => 'text-align-justify',
		'lnr lnr-text-align-left' => 'text-align-left',
		'lnr lnr-text-align-right' => 'text-align-right',
		'lnr lnr-text-format' => 'text-format',
		'lnr lnr-text-format-remove' => 'text-format-remove',
		'lnr lnr-text-size' => 'text-size',
		'lnr lnr-thumbs-down' => 'thumbs-down',
		'lnr lnr-thumbs-up' => 'thumbs-up',
		'lnr lnr-train' => 'train',
		'lnr lnr-trash' => 'trash',
		'lnr lnr-underline' => 'underline',
		'lnr lnr-undo' => 'undo',
		'lnr lnr-unlink' => 'unlink',
		'lnr lnr-upload' => 'upload',
		'lnr lnr-user' => 'user',
		'lnr lnr-users' => 'users',
		'lnr lnr-volume' => 'volume',
		'lnr lnr-volume-high' => 'volume-high',
		'lnr lnr-volume-low' => 'volume-low',
		'lnr lnr-volume-medium' => 'volume-medium',
		'lnr lnr-warning' => 'warning',
		'lnr lnr-wheelchair' => 'wheelchair'
	];
}
