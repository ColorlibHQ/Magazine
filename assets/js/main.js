( function( $ ){
    'use strict';

    var startVideo = $('.start-video');
    var body = $('body');
    var window_width = $(window).width(),
        window_height = window.innerHeight,
        header_height = $('.default-header').height(),
        header_height_static = $('.site-header.static').outerHeight(),
        fitscreen = window_height - header_height;

    $('.fullscreen').css('height', window_height);
    $('.fitscreen').css('height', fitscreen);

    //------- Niceselect  js --------//  
    var $select = $('select');
    if (document.getElementById('default-select')) {
        $select.niceSelect();
    }
    if (document.getElementById('default-select2')) {
        $select.niceSelect();
    }

    //------- Lightbox  js --------//  

    $('.img-gal').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    $('.play-btn').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });
    
    startVideo.magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    //------- Datepicker  js --------//  

      $( function() {
        $( '#datepicker' ).datepicker();
        $( '#datepicker2' ).datepicker();
      } );


    //------- Superfist nav menu  js --------//  

    $('.nav-menu').superfish({
        animation: {
            opacity: 'show'
        },
        speed: 400
    });


    //------- Accordion  js --------//  

    jQuery(document).ready(function($) {

        if (document.getElementById('accordion')) {

            new Accordion(document.getElementById('accordion'), {
                collapsible: false,
                slideDuration: 500
            });
        }
    });

    //------- Owl Carusel  js --------//  

    $('.active-gallery-carusel').owlCarousel({
        items:1,
        loop:true,
        nav:true,
        navText: ['<span class="lnr lnr-arrow-left"></span>', '<span class="lnr lnr-arrow-right"></span>'],
        smartSpeed:650
    });

    $('.active-testimonial').owlCarousel({
        items: 2,
        loop: true,
        margin: 30,
        autoplayHoverPause: true,
        dots: true,
        autoplay: true,
        nav: true,
        navText: ['<span class="lnr lnr-arrow-up"></span>', '<span class="lnr lnr-arrow-down"></span>'],
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            768: {
                items: 2
            }
        }
    });

    $('.active-brand-carusel').owlCarousel({
        items: 4,
        loop: true,
        margin: 30,
        autoplayHoverPause: true,
        smartSpeed:650,         
        autoplay:true, 
        responsive: {
            0: {
                items: 2
            },
            480: {
                items: 2
            },
            768: {
                items: 4
            }
        }
    });

    //------- Search Form  js --------//  
    var formGroup   = $('.form-group');
    var formControl = $('.form-control');
    $(document).ready(function(){
      $('#search').on('click', function(e){
        formGroup.addClass('sb-search-open');
        e.stopPropagation();
      });
       $(document).on('click', function(e) {
        if ($(e.target).is('#search') === false && formControl.val().length === 0) {
            formGroup.removeClass('sb-search-open');
        }
      });
        $('.form-control-submit').click(function(e){
            formControl.each(function(){
            if( formControl.val().length === 0 ){
              e.preventDefault();
              $(this).css('border', '2px solid red');
            }
        });
      });
    });



    //------- Mobile Nav  js --------//  
    var mainMenu = $('body .main-menu'),
        mNavToggleI = $('#mobile-nav-toggle i'),
        mBodyOverlay = $('#mobile-body-overly'),
        mNavmNavToggle = $('#mobile-nav, #mobile-nav-toggle'),
        navMenuContainer = $('#nav-menu-container');

    if ( navMenuContainer.length) {
        var $mobile_nav = navMenuContainer.clone().prop({
            id: 'mobile-nav'
        });
        $mobile_nav.find('> ul').attr({
            'class': '',
            'id': ''
        });
        mainMenu.append($mobile_nav);
        mainMenu.prepend('<button type="button" id="mobile-nav-toggle"><i class="lnr lnr-menu"></i><span class="menu-title">Menu</span> </button>');
        mainMenu.append('<div id="mobile-body-overly"></div>');
        $('#mobile-nav').find('.menu-has-children').prepend('<i class="lnr lnr-chevron-down"></i>');

        $(document).on('click', '.menu-has-children i', function(e) {
            $(this).next().toggleClass('menu-item-active');
            $(this).nextAll('ul').eq(0).slideToggle();
            $(this).toggleClass('lnr-chevron-up lnr-chevron-down');
        });

        $(document).on('click', '#mobile-nav-toggle', function(e) {
            body.toggleClass('mobile-nav-active');
            mNavToggleI.toggleClass('lnr-cross lnr-menu');
            mBodyOverlay.toggle();
        });

            $(document).on('click', function(e) {
            var container = mNavmNavToggle;
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if (body.hasClass('mobile-nav-active')) {
                    body.removeClass('mobile-nav-active');
                    mNavToggleI.toggleClass('lnr-cross lnr-menu');
                    mBodyOverlay.fadeOut();
                }
            }
        });
    } else if (mNavmNavToggle.length) {
        mNavmNavToggle.hide();
    }


    //------- Sticky Main Menu js --------//  


    window.onscroll = function() {stickFunction();};

    var navbar = document.getElementById('main-menu');
    var sticky = navbar.offsetTop;
    function stickFunction() {
      if (window.pageYOffset >= sticky) {
        navbar.classList.add('header_fixed');
      } else {
        navbar.classList.remove('header_fixed');
      }
    }


    //------- Smooth Scroll  js --------//  
    var header = $('#header');
    $('.nav-menu a, #mobile-nav a, .scrollto').on('click', function() {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            var target = $(this.hash);
            if (target.length) {
                var top_space = 0;

                if (header.length) {
                    top_space = header.outerHeight();

                    if (!header.hasClass('header-fixed')) {
                        top_space = top_space;
                    }
                }

                htmlBody.animate({
                    scrollTop: target.offset().top - top_space
                }, 1500, 'easeInOutExpo');

                if ($(this).parents('.nav-menu').length) {
                    $('.nav-menu .menu-active').removeClass('menu-active');
                    $(this).closest('li').addClass('menu-active');
                }

                if (body.hasClass('mobile-nav-active')) {
                    body.removeClass('mobile-nav-active');
                    mNavToggleI.toggleClass('lnr-times lnr-bars');
                    mBodyOverlay.fadeOut();
                }
                return false;
            }
        }
    });

    var htmlBody = $('html, body');
    $(document).ready(function() {
       
        htmlBody.hide();

        if (window.location.hash) {

            setTimeout(function() {

                htmlBody.scrollTop(0).show();

                htmlBody.animate({

                    scrollTop: $(window.location.hash).offset().top - 108

                }, 1000);

            }, 0);

        } else {

            htmlBody.show();

        }

    });


    
    //------- Mailchimp js --------//  

    $(document).ready(function() {
        $('#mc_embed_signup').find('form').ajaxChimp();
    });




// youtube custom play button and thumbail script


    var tag = document.createElement('script');
    tag.src = '//www.youtube.com/iframe_api';
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    var YT = '';
    var player;

    var onYouTubeIframeAPIReady = function () {
        player = new YT.Player('player', {
            height: '244',
            width: '434',
            videoId: 'VZ9MBYfu_0A',  // youtube video id
            playerVars: {
                'autoplay': 0,
                'rel': 0,
                'showinfo': 0
            },
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
    };

    var p = document.getElementById ('player');
    $(p).hide();

    var t = document.getElementById ('thumbnail');
    //t.src = "img/video/play-btn.png";

    

    var onPlayerStateChange = function (event) {
        if (event.data === YT.PlayerState.ENDED) {
            startVideo.fadeIn('normal');
        }
    };


})(jQuery);