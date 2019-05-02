<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'education_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category Education
 * @package  magazine
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */



add_action( 'cmb2_admin_init', 'magazine_post_format_meta' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function magazine_post_format_meta() {
	$prefix = 'magazine_';

	$cmb_meta = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Post Format Metabox', 'magazine' ),
		'object_types'  => array( 'post' ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		'context'    => 'normal',
		'priority'   => 'high',
		
	) );

	//Audio
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Upload Audio File', 'magazine' ),
		'id'   => 'magazine_audio_format',
		'type' => 'file',
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
	) );

	// Video URL
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Upload Video File or URL', 'magazine' ),
		'description' => esc_html__( 'Upload Video or Paste Video URL', 'magazine' ),
		'id'   => 'magazine_video_format',
		'type' => 'file',
        'options' => array(
            'url' => true, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add Video' // Change upload button text. Default: "Add or Upload File"
        ),
	) );

	// Gallery Post
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Upload Images', 'magazine' ),
		'id'   => 'magazine_gallery_format',
        'type' => 'file_list',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
        // 'query_args' => array( 'type' => 'image' ), // Only images attachment
        // Optional, override default text strings
        'text' => array(
            'add_upload_files_text' => 'Add Images', // default: "Add or Upload Files"
            'remove_image_text' => 'Remove Image', // default: "Remove Image"
            'file_text' => 'Images', // default: "File:"
            'file_download_text' => 'Download', // default: "Download"
            'remove_text' => 'Remove', // default: "Remove"
        ),
	) );



}
