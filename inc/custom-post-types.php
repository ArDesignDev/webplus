<?php 
// resources
function create_resources_post_type() {
  $labels = array(
      'name' => _x( 'Resources', 'Post Type General Name', 'text_domain' ),
      'singular_name' => _x( 'Resources', 'Post Type Singular Name', 'text_domain' ),
      'menu_name' => __( 'Resources', 'text_domain' ),
      'parent_item_colon' => __( 'Parent Drug:', 'text_domain' ),
      'all_items' => __( 'Resources', 'text_domain' ),
      'view_item' => __( 'View Resources', 'text_domain' ),
      'add_new_item' => __( 'Add New Resources', 'text_domain' ),
      'add_new' => __( 'Add New', 'text_domain' ),
      'edit_item' => __( 'Edit Resources', 'text_domain' ),
      'update_item' => __( 'Update Resources', 'text_domain' ),
      'search_items' => __( 'Search Resources', 'text_domain' ),
      'not_found' => __( 'Not found', 'text_domain' ),
      'not_found_in_trash' => __( 'Not found in Trash', 'text_domain' ),

  );
  
  $args = array(
    'label' => __( 'Resources', 'text_domain' ),
    'description' => __( 'Post type for Resources', 'text_domain' ),
    'labels' => $labels,
    'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', 'tags'),
    'taxonomies' => array( 'content_type', 'topics'),
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-archive',
    'rewrite' => array( 'slug' => 'resources' ),
  );
  register_post_type( 'resources', $args );
}

add_action( 'init', 'create_resources_post_type', 0 );


// custom post type categories
function register_content_types_taxonomy() {
    $labels = array(
        'name'              => _x( 'Content Types', 'taxonomy general name', 'text_domain' ),
        'singular_name'     => _x( 'Content Types', 'taxonomy singular name', 'text_domain' ),
        'search_items'      => __( 'Search Content Types', 'text_domain' ),
        'all_items'         => __( 'All Content Types', 'text_domain' ),
        'parent_item'       => __( 'Parent Content Type', 'text_domain' ),
        'parent_item_colon' => __( 'Parent Content Type:', 'text_domain' ),
        'edit_item'         => __( 'Edit Content Type', 'text_domain' ),
        'update_item'       => __( 'Update Content Type', 'text_domain' ),
        'add_new_item'      => __( 'Add New Content Type', 'text_domain' ),
        'new_item_name'     => __( 'New Content Type Name', 'text_domain' ),
        'menu_name'         => __( 'Content Types', 'text_domain' ),
    );
  
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'rewrite' => array( 'slug' => 'content-type' ),
    );
  
    register_taxonomy( 'content_type', array( 'resources' ), $args );
  }
  add_action( 'init', 'register_content_types_taxonomy', 0 );

  // custom post type categories
function register_topics_taxonomy() {
    $labels = array(
        'name'              => _x( 'Topics', 'taxonomy general name', 'text_domain' ),
        'singular_name'     => _x( 'Topics', 'taxonomy singular name', 'text_domain' ),
        'search_items'      => __( 'Search Topics', 'text_domain' ),
        'all_items'         => __( 'All Topics', 'text_domain' ),
        'parent_item'       => __( 'Parent Topic', 'text_domain' ),
        'parent_item_colon' => __( 'Parent Topic:', 'text_domain' ),
        'edit_item'         => __( 'Edit Topic', 'text_domain' ),
        'update_item'       => __( 'Update Topic', 'text_domain' ),
        'add_new_item'      => __( 'Add New Topic', 'text_domain' ),
        'new_item_name'     => __( 'New Topic Name', 'text_domain' ),
        'menu_name'         => __( 'Topics', 'text_domain' ),
    );
  
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'rewrite' => array( 'slug' => 'topics' ),
    );
  
    register_taxonomy( 'topics', array( 'resources' ), $args );
  }
  add_action( 'init', 'register_topics_taxonomy', 0 );


  // resources
function create_work_post_type() {
  $labels = array(
      'name' => _x( 'Work', 'Post Type General Name', 'text_domain' ),
      'singular_name' => _x( 'Work', 'Post Type Singular Name', 'text_domain' ),
      'menu_name' => __( 'Work', 'text_domain' ),
      'parent_item_colon' => __( 'Parent Drug:', 'text_domain' ),
      'all_items' => __( 'Work', 'text_domain' ),
      'view_item' => __( 'View Work', 'text_domain' ),
      'add_new_item' => __( 'Add New Work', 'text_domain' ),
      'add_new' => __( 'Add New', 'text_domain' ),
      'edit_item' => __( 'Edit Work', 'text_domain' ),
      'update_item' => __( 'Update Work', 'text_domain' ),
      'search_items' => __( 'Search Work', 'text_domain' ),
      'not_found' => __( 'Not found', 'text_domain' ),
      'not_found_in_trash' => __( 'Not found in Trash', 'text_domain' ),

  );
  
  $args = array(
    'label' => __( 'Work', 'text_domain' ),
    'description' => __( 'Post type for Work', 'text_domain' ),
    'labels' => $labels,
    'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', 'tags'),
    'taxonomies' => array( 'content_type', 'topics'),
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-hammer',
    'rewrite' => array( 'slug' => 'work' ),
  );
  register_post_type( 'work', $args );
}

add_action( 'init', 'create_work_post_type', 0 );