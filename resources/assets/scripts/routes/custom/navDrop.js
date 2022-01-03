export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    (function($) {

    var menuContainer    = $('.menu-container');
    var menuToggle       = menuContainer.find( '.menu-button' );
    var siteHeaderMenu   = menuContainer.find( '#site-header-menu' );
    var siteNavigation   = menuContainer.find( '#site-navigation' );

    // If you are using WordPress, and do not need to localise your script, or if you are not using WordPress, then uncomment the next line
    // var screenReaderText = {"expand":"Expand child menu","collapse":"Collapse child menu"};

    var dropdownToggle   = $('<button />', {'class': 'dropdown-toggle','aria-expanded': false})
    .append($('<span />', {'class': 'screen-readers'}));


    // Toggles the menu button
    (function() {

      if (!menuToggle.length) {
      return;
      }

      menuToggle.add(siteNavigation).attr('aria-expanded', 'false');

      menuToggle.on('click', function() {
        $(this).toggleClass('is-active')
        $('.header').toggleClass('is-active')
      $(this).add(siteHeaderMenu).toggleClass('toggled-on');

      // jscs:disable
      $(this).add( siteNavigation )
      .attr('aria-expanded', $( this )
      .add( siteNavigation ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
      // jscs:enable

      } );
    } )();

      // Colour the nav bar on scroll
      $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if (scroll == 0) {
          $('.banner').addClass('parked');
          $('.main-navigation').addClass('parked');
        }
        else{
          $('.banner').removeClass('parked');
          $('.main-navigation').removeClass('parked');   	
        }
      })

    // Adds the dropdown toggle button
    $('.menu-item-has-children > a').after(dropdownToggle);

    // Adds aria attribute
    siteHeaderMenu.find( '.menu-item-has-children' ).attr( 'aria-haspopup', 'true' );

    // Toggles the sub-menu when dropdown toggle button clicked
    siteHeaderMenu.find( '.dropdown-toggle' ).click( function(e) {

      // screenReaderSpan = $(this).find( '.screen-readers' );

      e.preventDefault();
      $(this).toggleClass( 'toggled-on' );
      $(this).nextAll( '.sub-menu' ).toggleClass( 'toggled-on' );

      // jscs:disable
      $(this).attr( 'aria-expanded', $(this).attr( 'aria-expanded' ) === 'false'
      ? 'true' : 'false' );
      // jscs:enable
      // screenReaderSpan.text( screenReaderSpan.text() ===
      // screenReaderText.expand ? screenReaderText.collapse :
      // screenReaderText.expand );
    });

    // Adds a class to sub-menus for styling
    $('.sub-menu .menu-item-has-children').parent('.sub-menu').addClass('has-sub-menu');


    // Keyboard navigation
    $('.menu-item a, button.dropdown-toggle').on('keydown', function(e) {

      if ([37,38,39,40].indexOf(e.keyCode) == -1) {
          return;
      }

      switch(e.keyCode) {

          case 37: 				// left key
              e.preventDefault();
              e.stopPropagation();

              if ($(this).hasClass('dropdown-toggle')){
              $(this).prev('a').focus();
            }
            else {

              if ($(this).parent().prev().children('button.dropdown-toggle').length) {
                $(this).parent().prev().children('button.dropdown-toggle').focus();
              }
              else {
                $(this).parent().prev().children('a').focus();
              }
            }

            if ($(this).is('ul ul ul.sub-menu.toggled-on li:first-child a')) {
              $(this).parents('ul.sub-menu.toggled-on li').children('button.dropdown-toggle').focus();
            }

              break;

            case 39: 				// right key
              e.preventDefault();
              e.stopPropagation();

            if($(this).next('button.dropdown-toggle').length) {
              $(this).next('button.dropdown-toggle').focus();
            }
            else {
              $(this).parent().next().children('a').focus();
            }

            if ($(this).is('ul.sub-menu .dropdown-toggle.toggled-on')){
              $(this).parent().find('ul.sub-menu li:first-child a').focus();
            }

              break;


        case 40: 				// down key
              e.preventDefault();
              e.stopPropagation();

            if($(this).next().length){
              $(this).next().find('li:first-child a').first().focus();
            }
            else {
              $(this).parent().next().children('a').focus();
            }

            if (($(this).is('ul.sub-menu a')) && ($(this).next('button.dropdown-toggle').length)) {
              $(this).parent().next().children('a').focus();
            }

            if (($(this).is('ul.sub-menu .dropdown-toggle')) && ($(this).parent().next().children('.dropdown-toggle').length)) {
              $(this).parent().next().children('.dropdown-toggle').focus();
            }

              break;


          case 38: 				// up key
              e.preventDefault();
              e.stopPropagation();

            if($(this).parent().prev().length){
              $(this).parent().prev().children('a').focus();
            }
            else {
              $(this).parents('ul').first().prev('.dropdown-toggle.toggled-on').focus();
            }

            if (($(this).is('ul.sub-menu .dropdown-toggle')) && ($(this).parent().prev().children('.dropdown-toggle').length)) {
              $(this).parent().prev().children('.dropdown-toggle').focus();
            }

              break;
      }
    });
    })(jQuery);
  },
};
