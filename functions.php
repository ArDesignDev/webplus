<?php
/**
 * aquaAr functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aquaAr
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'aquaAr_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function aquaAr_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on aquaAr, use a find and replace
		 * to change 'aquaAr' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'aquaAr', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'aquaAr' ),
				'cta' => esc_html__( 'CTA', 'aquaAr' ),
				'footer-blog' => esc_html__( 'Footer Blog', 'aquaAr' ),
				'footer-resources' => esc_html__( 'Footer Resources', 'aquaAr' ),
				'footer-approach' => esc_html__( 'Footer Approach', 'aquaAr' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'aquaAr_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// svg suppor
		function cc_mime_types($mimes) {
			$mimes['svg'] = 'image/svg+xml';
			return $mimes;
		}

		add_filter('upload_mimes', 'cc_mime_types');

		
	}
endif;
add_action( 'after_setup_theme', 'aquaAr_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aquaAr_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aquaAr_content_width', 640 );
}
add_action( 'after_setup_theme', 'aquaAr_content_width', 0 );

/**
 * Register widget area.
 *
 */
require get_template_directory() . '/inc/widget-area.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Custom post type
 */
//require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Pagination
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Toaster
 */
require get_template_directory() . '/inc/acf.php';


function custom_excerpt_length($length) {
		return 30;
}
add_filter('excerpt_length', 'custom_excerpt_length');

function new_excerpt_more( $more ) {
		return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


////////////////////////
// order by
///////////////////////

  function custom_pre_get_posts($query) {
    // Ensure this is not the admin area and it is the main query
    if (!is_admin() && $query->is_main_query()) {
        // Check if the orderby parameter is set
        if (isset($_GET['orderby']) && !empty($_GET['orderby'])) {
            // Handle each sorting option
            switch ($_GET['orderby']) {
                case 'name-asc':
                    $query->set('orderby', 'title');
                    $query->set('order', 'ASC');
                    break;
                case 'name-desc':
                    $query->set('orderby', 'title');
                    $query->set('order', 'DESC');
                    break;
                case 'date-asc':
                    $query->set('orderby', 'date');
                    $query->set('order', 'ASC');
                    break;
                case 'date-desc':
                    $query->set('orderby', 'date');
                    $query->set('order', 'DESC');
                    break;
            }
        } else {
            // Reset to default sorting
            // Default sorting is usually by date in descending order
            // If you want a different default, adjust the parameters here
            $query->set('orderby', 'date');
            $query->set('order', 'DESC');
        }
    }
}
add_action('pre_get_posts', 'custom_pre_get_posts');


////////////////////////
// remove active class from blog
///////////////////////

function adjust_menu_classes_for_custom_post_types($classes, $item, $args) {
    $current_post_type = get_post_type();

    if (($current_post_type == 'work' || $current_post_type == 'resources') && $item->title == 'Blog') {
        // Remove 'current_page_parent' from blog menu item
        $classes = array_diff($classes, ['current_page_parent']);
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'adjust_menu_classes_for_custom_post_types', 10, 3);



////////////////////////
// custom menu for custom paterns
///////////////////////


function add_custom_submenu_page() {
    add_submenu_page(
        'theme-settings',              // Parent slug (your main ACF options page slug)
        'Block patterns',                      // Page title
        'Block patterns',                      // Menu title
        'manage_options',                      // Capability (ensure the user role has this capability)
        'edit.php?post_type=wp_block'          // Menu slug (the link you provided)
    );
}
add_action('admin_menu', 'add_custom_submenu_page', 100);


add_action('init', function() {
    // Check if the function exists
    if (!function_exists('unregister_block_pattern_category')) {
        return;
    }

    // List of pattern categories to unregister
    $categories_to_unregister = array(
        'buttons',
        'text',
        'posts',
        'gallery',
        'featured',
        'call-to-action',
        'header',
        'banner',
        'footer',
    );

    foreach ($categories_to_unregister as $category) {
        unregister_block_pattern_category($category);
    }

    // If you haven't registered your "My patterns" category yet, you can do so with:
    // register_block_pattern_category('my-patterns', array('label' => __('My patterns', 'text-domain')));
});



function custom_search_filter( $query ) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ( $query->is_search ) {
            $search_type = isset( $_GET['search_type'] ) ? $_GET['search_type'] : '';

            if ( 'blog_posts' === $search_type ) {
                $query->set( 'post_type', 'post' );
            } elseif ( 'resources' === $search_type ) {
                $query->set( 'post_type', 'resources' ); // Replace 'resources' with your actual custom post type slug
            }
        }
    }
    return $query;
}
add_action( 'pre_get_posts', 'custom_search_filter' );

// AJAX POST FILTER
function filter_posts_by_category() {
    $category_id = isset($_POST['cat']) ? intval($_POST['cat']) : '';

    // Determine the number of posts per page based on category selection
    $posts_per_page = $category_id ? -1 : 6;  // If a category is selected, show all posts by setting -1, otherwise show 4 posts per page.

    $page = isset($_POST['page']) ? intval($_POST['page']) : 1; // Default to the first page

    $args = array(
        'post_type' => 'post',
        'cat' => $category_id,
        'posts_per_page' => $posts_per_page,
        'paged' => $page
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/projects'); // This loads the template part for displaying posts.
        }
    } else {
        echo '<p>No posts found.</p>';
    }
    wp_die(); // Proper way to terminate immediately and return a proper response
}

add_action('wp_ajax_filter_posts_by_category', 'filter_posts_by_category');
add_action('wp_ajax_nopriv_filter_posts_by_category', 'filter_posts_by_category');

// POPUP FILTER
function fetch_post_content() {
    check_ajax_referer('popup_nonce', 'nonce');

    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
    $post = get_post($post_id);
    if ($post) {
        echo apply_filters('the_content', $post->post_content);
    } else {
        echo 'Post not found.';
    }
    wp_die();
}
add_action('wp_ajax_fetch_post', 'fetch_post_content');
add_action('wp_ajax_nopriv_fetch_post', 'fetch_post_content');
