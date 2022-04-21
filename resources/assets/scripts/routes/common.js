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

  // Add opacity to a banner when scrolling

    // $(window).scroll(function() {
    //   var scrollTop = $(this).scrollTop();
    
    //   $('.header-overlay').css({
    //     opacity: function() {
    //       var elementHeight = $(this).height(),
    //         opacity = ((1  - (elementHeight - scrollTop) / elementHeight) * 0.8);
    //       return opacity;
    //     },
    //     backgroundColor: 'white',
    //   });
    // });

    
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

    //---------------------- section slider -------------------------------//
    let section_slider = $('.section-slider');

    if(section_slider.length) {
      let section_slider_settings = {
        'dots': true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        prevArrow: false,
        nextArrow: false,
      }

      section_slider.slick(section_slider_settings);

      // $(window).on('resize', function() {
      //   if ($(window).width() >= 769 && !section_slider.hasClass('slick-initialized')) {
      //     return section_slider.slick(section_slider_settings);
      //   }
      // })
    }

    //---------------------- Slider Testimonials Block -------------------------------//
    let block_slider_testimonials = $('.block-slider-testimonials-1');

    if(block_slider_testimonials.length) {
      let block_slider_settings = {
        'dots': true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        speed: 500,
        cssEase: 'linear',
        autoplay: true,
        prevArrow: false,
        nextArrow: false,
        responsive: [
          {
            breakpoint: 820,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
            },
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ],
      }

      block_slider_testimonials.slick(block_slider_settings);
    }

    // hamburger button
    $('.hamburger').click(function() {
      // alert(event.target.id+' and '+$(event.target).attr('class'));
      jQuery('.nav').toggleClass('isOpen');
      jQuery('.menu-btn').toggleClass('is-active');
      jQuery('body').toggleClass('noscroll');
    });

    // Check submenu is open before allow default
    $('#side-slide ul#menu-primary-navigation li.menu-item-has-children').click(function (e) {
      $(this).siblings().removeClass('open');
      if ($('.menu-item-has-children').hasClass('open')) {
        // do nothing
      } else {
        e.preventDefault();
      }
      $(this).toggleClass('open');
    });
    
    // scroll ad nav bg color
    $(window).scroll(function () {
      if ($(this).scrollTop() > 50) {
        $('header').addClass('addbg');
      } else {
        $('header').removeClass('addbg');
      }
    });

  },
};
