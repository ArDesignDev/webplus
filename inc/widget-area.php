<?php

/*
@package aquaAr

	========================
		wWIDGET AREA
	========================
*/

 function ourWidgetsInit() {

    // Footer blocks
    register_sidebar( array(
        'name' => 'Footer Block 1',
        'id' => 'footer-block-1',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar( array(
        'name' => 'Footer Block 2',
        'id' => 'footer-block-2',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar( array(
        'name' => 'Footer Block 3',
        'id' => 'footer-block-3',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar( array(
        'name' => 'Footer Block 4',
        'id' => 'footer-block-4',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar( array(
        'name' => 'Footer Block 5',
        'id' => 'footer-block-5',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar( array(
        'name' => 'Footer Block 6',
        'id' => 'footer-block-6',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar( array(
        'name' => 'Contact Block',
        'id' => 'contact-block',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    // Header Blocks
    register_sidebar( array(
        'name' => 'Header Info',
        'id' => 'header-info',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar( array(
        'name' => 'Header Social',
        'id' => 'header-social',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
    ));

    // Sidebar
    register_sidebar( array(
        'name' => 'Blog Sidebar',
        'id' => 'sidebar-1',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
    ));

}

add_action('widgets_init', 'ourWidgetsInit');

?>