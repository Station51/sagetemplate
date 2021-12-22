<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

/**
 * Extend Gutenberg Blocks
 * @link https://developer.wordpress.org/reference/hooks/enqueue_block_editor_assets/
 */
add_action('enqueue_block_editor_assets', function() {
    wp_enqueue_script('sage/gutenberg.js', asset_path('scripts/gutenberg.js'), ['wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'], null, true);
} );
