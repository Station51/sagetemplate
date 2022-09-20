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
   *  Get Block Gallery Tabs content.
   */

    public static function getGalleryTabs() {
      return $images = get_sub_field('the_gallery');
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

  /**
   *
   * Block Banner Slider.
   *
   * Fetches the slides and returns them in an array.
   *
   * @return array An array with the slide data.
   */
  public static function getBannerSlider() {
    return array_map(function ($slides) {          
        return [
           'content' => $slides['slide_content'] ?? null,
           'image' => $slides['slide_image'] ?? null,
           'background_colour' => $slides['slide_background_colour'] ?? null,
           'popup_button' => $slides['popup_button'] ?? null,
           'popup_button_text' => $slides['popup_button_text'] ?? null,
           'popup_class' => $slides['popup_class'] ?? null,
           'button_text_1' => $slides['button_text_1'] ?? null,
           'button_url_1' => $slides['button_url_1'] ?? null,
           'button_text_2' => $slides['button_text_2'] ?? null,
           'button_url_2' => $slides['button_url_2'] ?? null,
        ];
    }, get_field('slides') ?? []);
  }

  /**
   *
   * Block Slider half page.
   *
   * Fetches the slides and returns them in an array.
   *
   * @return array An array with the slide data.
   */
  public static function getSliderTestimonials() {
    return array_map(function ($slides) {          
        return [
           'content' => $slides['slide_content'] ?? null,
        ];
    }, get_field('slides') ?? []);
  }

  /**
   *
   * Block Our Services CPT
   *
   * Fetches the slides and returns them in an array.
   *
   * @return array An array with the slide data.
   */
  public static function getOurServicesCPT() {
    return array_map(function ($services) {          
        return [
           'icon' => $services['icon'] ?? null,
           'title' => $services['title'] ?? null,
           'content' => $services['content'] ?? null,
           'button_text' => $services['button_text'] ?? null,
           'button_url' => $services['button_url'] ?? null,
        ];
    }, get_field('services', 'option') ?? []);
  }

  /**
   *
   * Block Our Services Single.
   *
   * Fetches the slides and returns them in an array.
   *
   * @return array An array with the slide data.
   */
  public static function getOurServicesSingle() {
    return array_map(function ($services) {          
        return [
           'icon' => $services['icon'] ?? null,
           'title' => $services['title'] ?? null,
           'content' => $services['content'] ?? null,
           'button_text' => $services['button_text'] ?? null,
           'button_url' => $services['button_url'] ?? null,
        ];
    }, get_field('services') ?? []);
  }

  /**
   *
   * Block Slider Filter Items
   *
   * Fetches the slides and returns them in an array.
   *
   * @return array An array with the slide data.
   */
  public static function getSliderFilterItems() {
    return array_map(function ($ouritem) {          
        return [
           'item_image' => $ouritem['item_image'] ?? null,
           'title' => $ouritem['title'] ?? null,
           'brand' => $ouritem['brand'] ?? null,
           'item_type' => $ouritem['item_type'] ?? null,
           'content' => $ouritem['content'] ?? null,
           'the_button' => $ouritem['the_button'] ?? null,
        ];
    }, get_field('item', 'option') ?? []);
  }

  /**
   *  Get Slider Filter Type
   */
  public static function getSliderFilterType() {
  
    $section_id = get_field('section_id');
    $brand = get_field('brand');

    return([
      'section_id' => $section_id,
      'brand' => $brand,
    ]);
  }
}

