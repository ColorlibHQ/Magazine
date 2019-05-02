<header id="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <?php
                if( has_nav_menu( 'social-menu' ) ) {
                    echo '<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-left no-padding">';
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
                <div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-right no-padding">
                    <ul>
                        <?php 
                        if( ! empty( magazine_opt( 'magazine-header-top-phone' ) ) ){ 
                            echo '<li><a href="tel:'. magazine_opt( 'magazine-header-top-phone' ) .'"><span class="lnr lnr-phone-handset"></span><span>'. magazine_opt( 'magazine-header-top-phone' ) .'</span></a></li>';
                        } 
                        if( ! empty( magazine_opt( 'magazine-header-top-email' ) ) ) { 
                            echo '<li><a href="'. magazine_opt( 'magazine-header-top-email' ) .'"><span class="lnr lnr-envelope"></span><span>'. magazine_opt( 'magazine-header-top-email' ) .'</span></a></li>';
                        } 
                         ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="logo-wrap">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-4 col-md-4 col-sm-12 logo-left no-padding">
                    <?php
                        // Header Logo
                        echo magazine_theme_logo();
                    ?>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding ads-banner">
                    <?php // Header Ad Content
                    $adContent = magazine_opt( 'magazine_header_ad' );
                    if( !empty( $adContent ) ){
                        echo wp_kses_post( $adContent );
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container main-menu" id="main-menu">
        <div class="row align-items-center justify-content-between">
            <nav id="nav-menu-container">
            <?php
                // Header Menu
                if( has_nav_menu( 'primary-menu' ) ) {
                    $args = array(
                        'theme_location' => 'primary-menu',
                        'container'      => '',
                        'depth'          => 2,
                        'menu_class'     => 'nav-menu',
                        'fallback_cb'    => 'magazine_bootstrap_navwalker::fallback',
                        'walker'         => new magazine_bootstrap_navwalker(),
                    );  
                    wp_nav_menu( $args );
                }
                ?>
            </nav><!-- #nav-menu-container -->	
            <div class="navbar-right">
                <form class="Search" action="<?php echo esc_url( site_url( '/' ) ); ?>">
                    <input type="text" class="form-control Search-box" name="s" id="Search-box" placeholder="<?php echo esc_attr__('Search', 'magazine') ?>">
                    <label for="Search-box" class="Search-box-label">
                        <span class="lnr lnr-magnifier"></span>
                    </label>
                    <span class="Search-close">
                        <span class="lnr lnr-cross"></span>
                    </span>
                </form>
            </div>	
        </div>
    </div>
</header>
