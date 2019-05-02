(function ($) {
    'use strict';

    // page template change option

    var $template           = $( '#page_template' ),
        $pagesettingsmeta   = $('#pageheader-meta-box'),
        $pageheader         = $('#page_header_selectbox'),
        $headerbg           = $( '.header-img' );

    // Page Template Event

    $template.on( 'change', function(){
        var $this = $(this);
        if( $this.val() === 'template-builder.php' ){
            $pagesettingsmeta.show();
        }else{
            $pagesettingsmeta.hide();
        }

    });


    // Page header Event
    $pageheader.on( 'change', function(){
        var $this = $(this);
        if( $this.val() === 'show' ){
            $headerbg.show();
        }else{
            $headerbg.hide();
        }

    });

    // if page header show selected
    if( $pageheader.val() !== 'show' ){
        $headerbg.hide();
    }



    // Post Format metabox show and hide
    jQuery(window).on('load', function() {

        var audioField = $('.cmb2-id-magazine-audio-format'),
            videoField = $('.cmb2-id-magazine-video-format'),
            galleryField = $('.cmb2-id-magazine-gallery-format'),
            editPostMeta = $('.edit-post-layout__metaboxes');

        var saveFormat = $('select[class="components-select-control__input"] option:selected').attr('value');
        if( saveFormat === 'audio' ){
            audioField.show();
            videoField.hide();
            galleryField.hide();
        }
        else if( saveFormat === 'video' ){
            videoField.show();
            audioField.hide();
            galleryField.hide();
        }
        else if( saveFormat === 'gallery' ){
            galleryField.show();
            audioField.hide();
            videoField.hide();
        }
        else{
            galleryField.hide();
            audioField.hide();
            videoField.hide();
            editPostMeta.addClass('magazine_postformat_wrap');
        }


        jQuery(document).on('change', 'select[id*="post-format"]',function(){
            if( this.value === 'video' ){
                videoField.show();
                audioField.hide();
                galleryField.hide();
                editPostMeta.removeClass('magazine_postformat_wrap');
            }
            else if( this.value === 'audio' ){
                audioField.show();
                videoField.hide();
                galleryField.hide();
                editPostMeta.removeClass('magazine_postformat_wrap');
            }
            else if( this.value === 'gallery' ){
                galleryField.show();
                audioField.hide();
                videoField.hide();
                editPostMeta.removeClass('magazine_postformat_wrap');
            }
            else{
                galleryField.hide();
                audioField.hide();
                videoField.hide();
                editPostMeta.addClass('magazine_postformat_wrap');
            }


        });


    });


})(jQuery);