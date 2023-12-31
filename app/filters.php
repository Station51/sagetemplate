<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment', 'embed'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    collect(['get_header', 'wp_head'])->each(function ($tag) {
        ob_start();
        do_action($tag);
        $output = ob_get_clean();
        remove_all_actions($tag);
        add_action($tag, function () use ($output) {
            echo $output;
        });
    });
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Render comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );

    $data = collect(get_body_class())->reduce(function ($data, $class) use ($comments_template) {
        return apply_filters("sage/template/{$class}/data", $data, $comments_template);
    }, []);

    $theme_template = locate_template(["views/{$comments_template}", $comments_template]);

    if ($theme_template) {
        echo template($theme_template, $data);
        return get_stylesheet_directory().'/index.php';
    }

    return $comments_template;
}, 100);

/**
 * Disable the emoji's
 */
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

/**
* Filter function used to remove the tinymce emoji plugin.
*
* @param array $plugins
* @return array Difference betwen the two arrays
*/
add_filter('tiny_mce_plugins', function ($plugins) {
    if (is_array($plugins)) {
        return array_diff($plugins, array( 'wpemoji' ));
    } else {
        return array();
    }
});

// Change excerpt length

add_filter('excerpt_length', function ($length) {
    return 35;
});

/**
 * Change the excerpt more string
 */
add_filter('excerpt_more', function ($more) {
    return '&hellip;';
});


/**
* Remove emoji CDN hostname from DNS prefetching hints.
*
* @param array $urls URLs to print for resource hints.
* @param string $relation_type The relation type the URLs are printed for.
* @return array Difference betwen the two arrays.
*/
add_filter('wp_resource_hints', function ($urls, $relation_type) {
    if ('dns-prefetch' == $relation_type) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
   
        $urls = array_diff($urls, array( $emoji_svg_url ));
    }
   
    return $urls;
}, 10, 2);

/**
 * Removing Default Gutenberg Blocks
 */
add_filter( 'allowed_block_types', function ( $allowed_blocks ) {
    return array(
        'acf/block-menu-filter',
        'acf/block-cta-banner-2',
        'acf/block-image-split-repeater',
        'acf/block-4-column-image-text',
        'acf/block-image-icons-split',
        'acf/block-banner-video-1',
        'acf/block-gallery-1',
        'acf/block-banner-image',
        'acf/block-banner-slider-bg-image',
        'core/image',
        'core/heading',
        'core/list',
        'core/shortcode',
        'acf/block-banner-slider-1',
        'acf/block-contact-details-1',
        'acf/block-cta-1',
        'acf/block-gallery-tabs-1',
        'acf/block-image-wysiwyg',
        'acf/block-map-split-1',
        'acf/block-map-split-2',
        'acf/block-offers-1',
        'acf/block-rooms-1',
        'acf/block-slider-split-1',
        'acf/block-slider-testimonials-1',
        'acf/block-slider-testimonials-cpt',
        'acf/block-slider-testimonials-3',
        'acf/block-wysiwyg',
        'acf/block-single-testimonial-parallax',
        'acf/block-image-3x-split',
        'acf/block-slider-tabs',
        'acf/block-gallery-things-to-do',
        'acf/block-contact-details-with-forms',
        'acf/block-our-services-options',
        'acf/block-cpt-rooms-slider',
        'acf/block-our-services-single',
        'acf/block-slider-filter-items',
        'acf/block-image-grid-split',
        'acf/block-offers-gallery',
    );
});