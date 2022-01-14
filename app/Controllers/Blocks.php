<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Blocks extends Controller
{
  /**
   * Get Block-3 content.
   */

   public static function getBlock3() {
       return array_map(function ($article) {
           return [
              'icon' => $article['icon']['id'] ?? null,
              'title' => $article['title'] ?? null,
              'content' => $article['content'] ?? null,
           ];
       }, get_field('articles') ?? []);
   }

    /**
   *  Get Block Gallery content.
   */

   public static function getGallery() {
    return $images = get_field('gallery');
    }

  /**
   *
   * Block Slider.
   *
   * Fetches the slides and returns them in an array.
   *
   * @return array An array with the slide data.
   */
    public static function getSlider() {
      return array_map(function ($slides) {          
          return [
             'logo' => $slides['slide_logo'] ?? null,
             'title' => $slides['slide_title'] ?? null,
             'content' => $slides['slide_content'] ?? null,
             'image' => $slides['slide_image'] ?? null,
             'background_colour' => $slides['slide_background_colour'] ?? null,
             'button_text_1' => $slides['button_text_1'] ?? null,
             'button_url_1' => $slides['button_url_1'] ?? null,
             'button_text_2' => $slides['button_text_2'] ?? null,
             'button_url_2' => $slides['button_url_2'] ?? null,
          ];
      }, get_field('slides') ?? []);
  }
}

