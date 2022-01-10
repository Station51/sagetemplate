import $ from 'jquery';
import Filterizr from 'filterizr';

export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired

    // This will extend the $.fn prototype with Filterizr
    Filterizr.installAsJQueryPlugin($);

    window.onload = function() {
      var filterContainer = document.getElementsByClassName('filter-container');
      if (filterContainer.length > 0) {
        var options = {
          layout: 'sameWidth',
          gutterPixels: 10,
        }
        // eslint-disable-next-line no-undef
        filterizr = new Filterizr('.filter-container', options);
      }
    }

    $(window).scroll(function() {
      var scrollTop = $(this).scrollTop();
    
      $('.header-overlay').css({
        opacity: function() {
          var elementHeight = $(this).height(),
              opacity = ((1  - (elementHeight - scrollTop) / elementHeight) * 0.8);
              console.log(scrollTop)
              console.log(opacity)
          return opacity;
        },
      });
    });

    
    //---------------------- Slider Block -------------------------------//
    let block_slider = $('.block-slider');

    if(block_slider.length) {
      let block_slider_settings = {
        'dots': true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        prevArrow: false,
        nextArrow: false,
      }

      block_slider.slick(block_slider_settings);

      $(window).on('resize', function() {
        if ($(window).width() >= 769 && !block_slider.hasClass('slick-initialized')) {
          return block_slider.slick(block_slider_settings);
        }
      })
    }
  },
};
