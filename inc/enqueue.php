<?php

/*
@package aquaAr

	========================
		ENQUEUE FUNCTIONS
	========================
*/

function unija_script_enqueue() {

	// style
    wp_enqueue_style( 'unija-style', get_stylesheet_uri(), array(), _S_VERSION );
	//wp_style_add_data( 'unija-style', 'rtl', 'replace' );

    wp_enqueue_style('Ralaway', 'https://fonts.googleapis.com/css?family=Raleway:400,700&display=swap'); // Font Family
    //wp_enqueue_style('Slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), '1.0.0.', 'all');
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/style.css', array(), '1.8.0.', 'all');

    // script
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js', false, '3.6.0', true);
    wp_enqueue_script('jquery');

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    //wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), '1.0.0', true);
    wp_enqueue_script('particles', 'https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js', array(), '1.0.0', true);


	wp_enqueue_script('customjs', get_template_directory_uri() . '/js/script.js', array(), '1.2.6', true);

}

add_action( 'wp_enqueue_scripts', 'unija_script_enqueue' );


function enqueue_popup_script() {
    wp_enqueue_script('popup-ajax', get_template_directory_uri() . '/js/popup-ajax.js', array('jquery'), null, true);
    wp_localize_script('popup-ajax', 'ajax_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('popup_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_popup_script');

// REMOVE UNUSED CODE
// emojis
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
