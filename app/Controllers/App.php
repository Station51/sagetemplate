<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    /**
    * Blog banner featured image
    * @return string
    */

    public function blog_featured_image() {

        $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full');
        
        return $img[0];
     }

     /**
     *
     * Block Slider.
     *
     * Fetches the slides and returns them in an array.
     *
     * @return array An array with the slide data.
     */
    public static function getSocial() {
        return array_map(function ($social) {          
            return [
               'content' => $social['facebook_url'] ?? null,
            ];
        }, get_field('social','option') ?? []);
    }
}
