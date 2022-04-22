<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');



    /**
     * Add Gutenberg Styles to editor
     */
    add_action('enqueue_block_editor_assets', function () {
        wp_enqueue_style('sage/gutenberg.css', asset_path('styles/gutenberg.css'), false, null);
    });


      /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'footer_navigation_left' => __('Footer Navigation Left', 'sage'),
        'footer_navigation_right' => __('Footer Navigation Right', 'sage'),
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    add_image_size('hero', 1920, 1080, true);
    add_image_size('icon', 100, 100, false);
    add_image_size('logo', 390, 220, true);

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget footer-info__menu %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
    register_sidebar([
        'name'          => __('Blog', 'sage'),
        'id'            => 'sidebar-blog'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

//Remove JQuery migrate
add_action('wp_default_scripts', function ($scripts) {
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        
        if ($script->deps) { // Check whether the script has any dependencies
            $script->deps = array_diff($script->deps, array(
                'jquery-migrate'
            ));
        }
    }
});

/**
 * Add ACF Options Page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}

/**
 * Disable the emoji's
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

add_action( 'pre_get_posts', function( $query ) {
    if ( !is_admin() && $query->is_feed() || ($query->is_main_query() && (is_home() || is_category())) ) {
        $query->set( 'post_type', array('post', 'story') );
    }
} );

/** Add Custom Post Type - Menu */

add_action('init', function () {
    $labels = array(
        'name' => _x('Menu', 'post type general name', 'your_text_domain'),
        'singular_name' => _x('Menu', 'post type Singular name', 'your_text_domain'),
        'add_new' => _x('Add Menu', '', 'your_text_domain'),
        'add_new_item' => __('Add New Menu', 'your_text_domain'),
        'edit_item' => __('Edit Menu', 'your_text_domain'),
        'new_item' => __('New Menu', 'your_text_domain'),
        'all_items' => __('All Menu', 'your_text_domain'),
        'view_item' => __('View Menu', 'your_text_domain'),
        'search_items' => __('Search Menu', 'your_text_domain'),
        'not_found' => __('No Menu found', 'your_text_domain'),
        'not_found_in_trash' => __('No Menu on trash', 'your_text_domain'),
        'parent_item_colon' => '',
        'menu_name' => __('Menu', 'your_text_domain')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'menu'),
        'capability_type' => 'page',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => null,
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => array('title', 'thumbnail','custom-fields', 'page-attributes')
    );
    $labels = array(
        'name' => __('Category'),
        'singular_name' => __('Category'),
        'search_items' => __('Search'),
        'popular_items' => __('More Used'),
        'all_items' => __('All Categories'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Add new'),
        'update_item' => __('Update'),
        'add_new_item' => __('Add new Category'),
        'new_item_name' => __('New')
    );
    register_taxonomy('porfiolio_category', array('menu'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'singular_label' => 'porfiolio_category',
		'all_items' => 'Category',
		'query_var' => true,
		'rewrite' => array('slug' => 'cat'))
    );
    register_post_type('menu', $args);
    flush_rewrite_rules();
}, 0);

/** Add Custom Post Type - Rooms */
add_action('init', function () {
    $labels = array(
        'name' => _x('Rooms', 'post type general name', 'your_text_domain'),
        'singular_name' => _x('Rooms', 'post type Singular name', 'your_text_domain'),
        'add_new' => _x('Add Room', '', 'your_text_domain'),
        'add_new_item' => __('Add New Room', 'your_text_domain'),
        'edit_item' => __('Edit Room', 'your_text_domain'),
        'new_item' => __('New Room', 'your_text_domain'),
        'all_items' => __('All Rooms', 'your_text_domain'),
        'view_item' => __('View Room', 'your_text_domain'),
        'search_items' => __('Search Room', 'your_text_domain'),
        'not_found' => __('No Room found', 'your_text_domain'),
        'not_found_in_trash' => __('No Room on trash', 'your_text_domain'),
        'parent_item_colon' => '',
        'Room_name' => __('Room', 'your_text_domain')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'rooms'),
        'capability_type' => 'page',
        // 'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => null,
        'menu_icon' => 'dashicons-admin-home',
        'supports' => array('title', 'thumbnail','custom-fields', 'page-attributes')
    );
    $labels = array(
        'name' => __('Category'),
        'singular_name' => __('Category'),
        'search_items' => __('Search'),
        'popular_items' => __('More Used'),
        'all_items' => __('All Categories'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Add new'),
        'update_item' => __('Update'),
        'add_new_item' => __('Add new Category'),
        'new_item_name' => __('New')
    );
    register_taxonomy('porfiolio_category', array('rooms'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'singular_label' => 'porfiolio_category',
		'all_items' => 'Category',
		'query_var' => true,
		'rewrite' => array('slug' => 'cat'))
    );
    register_post_type('rooms', $args);
    flush_rewrite_rules();
}, 0);
