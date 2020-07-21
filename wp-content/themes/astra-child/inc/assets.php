<?php
namespace BraverAngels\Assets;

/**
 * Define Constants
 */
define( 'THEME_VERSION', '0.9.4' );

/**
 * Enqueue styles
 */
function enqueue_styles() {

  wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/dist/css/index.min.css', array('astra-theme-css'), THEME_VERSION, 'all' );
  wp_enqueue_script( 'mobile-header-js', get_stylesheet_directory_uri() . '/dist/js/header.min.js', ['jquery'], THEME_VERSION, true );

  if (is_page('support-us')) {
    wp_enqueue_script( 'join-js', get_stylesheet_directory_uri() . '/dist/js/join.min.js', [], THEME_VERSION, true );
  }

}

add_action( 'wp_enqueue_scripts', 'BraverAngels\Assets\enqueue_styles', 15 );



function inline_scripts() {
  if( !current_user_can('editor') && !current_user_can('administrator') ) { ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-93943838-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-93943838-2');
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <?php
  }
}
add_action( 'wp_enqueue_scripts', 'BraverAngels\Assets\inline_scripts', 1, 1 );
