import $ from 'jquery';
import Filterizr from 'filterizr';
import 'bootstrap/js/src/carousel';

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

    // Passive listeners to improve scrolling performance (Lighthouse Report)
    jQuery.event.special.touchstart = {
      setup: function( _, ns, handle ) {
        this.addEventListener('touchstart', handle, { passive: !ns.includes('noPreventDefault') });
      },
    };
    jQuery.event.special.touchmove = {
      setup: function( _, ns, handle ) {
        this.addEventListener('touchmove', handle, { passive: !ns.includes('noPreventDefault') });
      },
    };
    jQuery.event.special.wheel = {
      setup: function( _, ns, handle ){
        this.addEventListener('wheel', handle, { passive: true });
      },
    };
    jQuery.event.special.mousewheel = {
      setup: function( _, ns, handle ){
        this.addEventListener('mousewheel', handle, { passive: true });
      },
    };

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

    //---------------------- Slider Testimonials Block 1 -------------------------------//
    let block_slider_testimonials1 = $('.slider-testimonials1');

    if(block_slider_testimonials1.length) {
      let block_slider_testimonials1_settings = {
        'dots': true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        cssEase: 'linear',
        autoplay: true,
        // prevArrow: false,
        // nextArrow: false,
      }

      block_slider_testimonials1.slick(block_slider_testimonials1_settings);

      $(window).on('resize', function() {
        if ($(window).width() >= 769 && !block_slider_testimonials1.hasClass('slick-initialized')) {
          return block_slider_testimonials1.slick(block_slider_testimonials1_settings);
        }
      })
    }

     //---------------------- Slider Testimonials Block 1 CPT -------------------------------//
     let block_slider_testimonials1cpt = $('.slider-testimonialscpt');

     if(block_slider_testimonials1cpt.length) {
       let block_slider_testimonials1cpt_settings = {
         'dots': true,
         infinite: true,
         slidesToShow: 1,
         slidesToScroll: 1,
         speed: 500,
         cssEase: 'linear',
         autoplay: true,
         // prevArrow: false,
         // nextArrow: false,
       }
 
       block_slider_testimonials1cpt.slick(block_slider_testimonials1cpt_settings);
 
       $(window).on('resize', function() {
         if ($(window).width() >= 769 && !block_slider_testimonials1cpt.hasClass('slick-initialized')) {
           return block_slider_testimonials1cpt.slick(block_slider_testimonials1cpt_settings);
         }
       })
     }

    //---------------------- Slider Testimonials Block 3 -------------------------------//
    let block_slider_testimonials3 = $('.slider-testimonials3');

    if(block_slider_testimonials3.length) {
      let block_slider_testimonials3_settings = {
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

      block_slider_testimonials3.slick(block_slider_testimonials3_settings);

      $(window).on('resize', function() {
        if ($(window).width() >= 769 && !block_slider_testimonials3.hasClass('slick-initialized')) {
          return block_slider_testimonials3.slick(block_slider_testimonials3_settings);
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

    //---------------------- Items Slider Block -------------------------------//
    let items_slider = $('.items-slider');

    if(items_slider.length) {
      let items_slider_settings = {
        'dots': false,
        infinite: true,
        speed: 500,
        // fade: true,
        cssEase: 'linear',
        // autoplay: true,
        slidesToShow: 3,
        slidesToScroll: 1,
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

      items_slider.slick(items_slider_settings);

      $(window).on('resize', function() {
        if ($(window).width() >= 769 && !items_slider.hasClass('slick-initialized')) {
          return items_slider.slick(items_slider_settings);
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
        $('.header').addClass('addbg');
      } else {
        $('.header').removeClass('addbg');
      }
    });

    /*** Slick Slider filter item read more */
    let ourItemArticle = document.querySelectorAll('.ouritem');
    let readMoreButtons = document.querySelectorAll('.read-more-btn');
    let readMoreBlock = document.querySelectorAll('.read-more-block');

    if(ourItemArticle) {
      for (let i = 0; i < readMoreButtons.length; i++) {            
        readMoreButtons[i].addEventListener('click', () => tabClick(i));
      }
    }
    function tabClick(currentTab) {

      ourItemArticle[currentTab].classList.toggle('active');
      readMoreBlock[currentTab].classList.toggle('active');

        if (readMoreBlock[currentTab].classList.contains('active')) {
          readMoreButtons[currentTab].innerHTML = 'Read Less';
        } else {
          readMoreButtons[currentTab].innerHTML = 'Read More';
        }
    }

    /*** Slick Slider filter item */
    $('.block-slider-filter-items-wrap .menu-cont button').on('click', function(){
      let filter = $(this).data('filter');
      $('.coffee-slider').slick('slickUnfilter');
      
      if(filter == 'light'){
        $('.coffee-slider').slick('slickFilter','.light');
      }
      else if(filter == 'moderate'){
        $('.coffee-slider').slick('slickFilter','.moderate');
      }
      else if(filter == 'heavy'){
        $('.coffee-slider').slick('slickFilter','.heavy');
      }
      else if(filter == 'decaf'){
        $('.coffee-slider').slick('slickFilter','.decaf');
      }
      else if(filter == 'all'){
        $('.coffee-slider').slick('slickUnfilter');
      }
    })

  /*********
   ********* Open WordPress post in Modal 
   ********* https://allurewebsolutions.com/open-wordpress-post-modal-without-plugin
   *********
   *********/

  // Close modal 
  $('.close-modal').click(function() {
    $('.modal-wrapper').toggleClass('show');
    // $('.modal').toggleClass('show');
    $('body').toggleClass('fix');
  });
  
  // // Detect windows width function
  var $window = $(window);
  
  function checkWidth() {
      var windowsize = $window.width();
      if (windowsize > 767) {
          // if the window is greater than 767px wide then do below. we don't want the modal to show on mobile devices and instead the link will be followed.
      
          $('.modal-link').click(function(e) {
              var modalContent = $('#modal-content');
              //var post_link = $('.show-in-modal').html(); // get content to show in modal
              var post_link = $(this).attr('href'); // this can be used in WordPress and it will pull the content of the page in the href
              
              e.preventDefault(); // prevent link from being followed
              
              $('.modal-wrapper').addClass('show', 1000); // show class to display the previously hidden modal
              $('body').addClass('fix');
              
              // $('.modal').addClass('show', 1000, 'easeOutSine'); // show class to display the previously hidden modal
              modalContent.html('loading...'); // display loading animation or in this case static content
              // modalContent.html(post_link); // for dynamic content, change this to use the load() function instead of html() -- like this: modalContent.load(post_link + ' #modal-ready')

              modalContent.load(post_link + ' #modal-ready');

              // $('html, body').animate({ // if you're below the fold this will animate and scroll to the modal
              //     scrollTop: 0
              // }, 'slow');
              return false;
          });
      }
  }
  
  checkWidth(); // excute function to check width on load
  $(window).resize(checkWidth); // execute function to check width on resize

  /**********
   ********** end Open WordPress post in Modal 
   **********/
  
  },
};
