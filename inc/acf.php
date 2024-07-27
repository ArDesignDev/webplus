<?php
/**
 * ACF CUSTOM BLOCKS
 *
 */


function my_acf_init() {
    
    // check function exists
    if( function_exists('acf_register_block') ) {
        
        // register a testimonial block
        acf_register_block(array(
            'name'              => 'testimonial',
            'title'             => __('Testimonial'),
            'description'       => __('A custom testimonial block.'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'testimonial', 'quote' ),
        ));

		// register acordian block
		acf_register_block(array(
			'name'              => 'acordian',
			'title'             => __('Acordian'),
			'description'       => __('A custom acordian block.'),
			'render_callback'   => 'my_acf_block_render_callback',
			'category'          => 'formatting',
			'icon'              => 'feedback',
			'keywords'          => array( 'acordian', 'quote' ),
		));

		// register acordian block
		acf_register_block(array(
			'name'              => 'slick',
			'title'             => __('Slick'),
			'description'       => __('A custom slick block.'),
			'render_callback'   => 'my_acf_block_render_callback',
			'category'          => 'formatting',
			'icon'              => 'feedback',
			'keywords'          => array( 'slick', 'quote' ),
		));

		// register blog block
		acf_register_block(array(
			'name'              => 'blogposts',
			'title'             => __('Blog posts'),
			'description'       => __('A custom blog posts widget.'),
			'render_callback'   => 'my_acf_block_render_callback',
			'category'          => 'theme_blocks',
			'icon'              => 'products',
			'keywords'          => array( 'blogposts', 'quote' ),
			'mode'	            => 'edit',
			'supports' 			=> array('mode' => false),
		));

		// register subscribe block
		acf_register_block(array(
			'name'              => 'subscribe',
			'title'             => __('Subscribe widget'),
			'description'       => __('A custom subscribe widget.'),
			'render_callback'   => 'my_acf_block_render_callback',
			'category'          => 'theme_blocks',
			'icon'              => 'admin-post',
			'keywords'          => array( 'subscribe', 'quote' ),
		));

    }
}


add_action('acf/init', 'my_acf_init');


function my_acf_block_render_callback( $block ) {
    
    // convert name ("acf/acordian") into path friendly slug ("acordian")
    $slug = str_replace('acf/', '', $block['name']);
    
    // include a template part from within the "template-parts/block" folder
    if( file_exists( get_theme_file_path("/template-parts/blocks/content-{$slug}.php") ) ) {
        include( get_theme_file_path("/template-parts/blocks/content-{$slug}.php") );
    }
}