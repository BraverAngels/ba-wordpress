( function( $ ) {

  var $open_button = $('.ba-mobile-toggle_open');
  var $close_button = $('.ba-mobile-toggle_close');
  var $mobile_menu = $('.ba-mobile-menu_links');
  var window_width = $(window).width();

  $( document ).scroll(function() {
    if(window.scrollY < 56){
      $('.ba-primary-menu--desktop').css("position", "relative");
      $('.ba-secondary-menu').removeClass('toggled');
      $('.ba-scroll-to-top').removeClass('toggled');
    } else {
      $('.ba-primary-menu--desktop').css("position", "fixed");
      $('.ba-primary-menu--desktop').css("top", "0");
      $('.ba-secondary-menu').addClass('toggled');
      $('.ba-scroll-to-top ').addClass('toggled');
    }
  });


  function closeMobileMenu(){
    $open_button.show();
    $close_button.hide();
    $mobile_menu.hide();
    $(document).off("mousedown", closeMobileMenu);
  }

  function handleResize(){
    if ($(window).width() !== window_width) {
      closeMobileMenu()
      $(window).off("resize", handleResize);
    }
    window_width = $(window).width();
  }

  function openMobileMenu(){
    $open_button.hide();
    $close_button.show();
    $mobile_menu.show();
    $(document).on("mousedown", closeMobileMenu);
    $(window).on("resize", handleResize);
  }

  $open_button.on("mouseup", openMobileMenu);

  $mobile_menu.on("mousedown", function(event) {
    event.stopPropagation();
  });

  $close_button.on("mousedown", function(event) {
    event.stopPropagation();
  });

  $close_button.on("mouseup", function(event) {
    closeMobileMenu();
  });

} )( jQuery );
