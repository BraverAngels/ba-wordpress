console.log("script working");

( function( $ ) {


  $( document ).scroll(function() {
    if(window.scrollY < 56){
      $('.ba-primary-menu').css("position", "relative");
      $('.ba-secondary-menu').css("height", "56px");
    } else {
      $('.ba-primary-menu').css("position", "fixed");
      $('.ba-primary-menu').css("top", "0");
      $('.ba-secondary-menu').css("height", "144px");
    }
  });



  var $open_button = $('.ba-hamburger-open');
  var $close_button = $('.ba-hamburger-close');
  var $mobile_menu = $('.ba-mobile-menu-links');
  var window_width = $(window).width();

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
