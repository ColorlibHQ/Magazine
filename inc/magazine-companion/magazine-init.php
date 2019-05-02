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

// Sidebar widgets include
require_once MAGAZINE_COMPANION_SW_DIR_PATH . 'newsletter-widget.php';
require_once MAGAZINE_COMPANION_SW_DIR_PATH . 'recent-post-thumb.php';
require_once MAGAZINE_COMPANION_SW_DIR_PATH . 'author-widget.php';
require_once MAGAZINE_COMPANION_SW_DIR_PATH . 'instagram-widget.php';
require_once MAGAZINE_COMPANION_SW_DIR_PATH . 'popular-post.php';


// Include Files
require_once MAGAZINE_COMPANION_INC_DIR_PATH . 'functions.php';
require_once MAGAZINE_COMPANION_INC_DIR_PATH . 'social-share.php';
require_once MAGAZINE_COMPANION_INC_DIR_PATH . 'instagram-api.php';
require_once MAGAZINE_COMPANION_INC_DIR_PATH . 'post-like.php';
require_once MAGAZINE_COMPANION_INC_DIR_PATH . 'magazine-meta/magazine-meta-config.php';
require_once MAGAZINE_COMPANION_CMB2_DIR_PATH. 'cmb2-functions.php';
require_once MAGAZINE_COMPANION_EW_DIR_PATH  . 'elementor-widget.php';

// Demo import include
require_once MAGAZINE_COMPANION_DEMO_DIR_PATH . 'demo-import.php';
