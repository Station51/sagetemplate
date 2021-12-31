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
}
