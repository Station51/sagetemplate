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

    $('.filtr').on('click', function() {
      $(this).addClass('active');
      $(this).siblings('.active').removeClass('active');
    });
    var filterContainer = document.getElementsByClassName('filter-container');
    if (filterContainer.length > 0) {
      var options = {
        layout: 'sameSize',
        gutterPixels: 10,
      }

      $(document).ready(function() {
        // eslint-disable-next-line no-unused-vars
        const filterizr = new Filterizr('.filter-container', options);
      });
    }

    // AOS init
    // $(function() {
    //   AOS.init();
    // });
    // window.addEventListener('load', AOS.refresh);

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

      $(window).on('resize', function() {
        if ($(window).width() >= 769 && !section_slider.hasClass('slick-initialized')) {
          return section_slider.slick(section_slider_settings);
        }
      })
    }

    //---------------------- Slider Testimonials Block -------------------------------//
    let block_slider_testimonials = $('.block-slider-testimonials');

    if(block_slider_testimonials.length) {
      let block_slider_testimonials_settings = {
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

      block_slider_testimonials.slick(block_slider_testimonials_settings);

      $(window).on('resize', function() {
        if ($(window).width() >= 769 && !block_slider_testimonials.hasClass('slick-initialized')) {
          return block_slider_testimonials.slick(block_slider_testimonials_settings);
        }
      })
    }

    //---------------------- CPT Rooms Slider Block -------------------------------//
    let room_block_slider = $('.room-block-slider');

    if(room_block_slider.length) {
      let room_block_slider_settings = {
        'dots': true,
        infinite: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 1,
        cssEase: 'linear',
        autoplay: false,
        pauseOnHover: false,
        responsive: [
          {
            breakpoint: 1500,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
            },
          },
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

      room_block_slider.slick(room_block_slider_settings);

      $(window).on('resize', function() {
        if ($(window).width() >= 769 && !room_block_slider.hasClass('slick-initialized')) {
          return room_block_slider.slick(room_block_slider_settings);
        }
      })
    }

    /--- Slider Tab Rooms Slider ----------------------/

    $('.slider-single').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      fade: false,
      adaptiveHeight: true,
      infinite: true,
      useTransform: true,
      speed: 400,
      cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
    });
    
    $('.slider-nav')
      .slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        focusOnSelect: true,
        infinite: false,
      });
    
    $('.slider-single').on('afterChange', function(event, slick, currentSlide) {
      $('.slider-nav').slick('slickGoTo', currentSlide);
      var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
      $('.slider-nav .slick-slide.is-active').removeClass('is-active');
      $(currrentNavSlideElem).addClass('is-active');
    });
    
    $('.slider-nav').on('click', '.slick-slide', function(event) {
      event.preventDefault();
      var goToSingleSlide = $(this).data('slick-index');
    
      $('.slider-single').slick('slickGoTo', goToSingleSlide);
    });

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
