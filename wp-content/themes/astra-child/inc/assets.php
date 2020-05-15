<?php

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '0.9.2' );

add_action('wp_enqueue_scripts', 'use_jquery_from_google');

function use_jquery_from_google () {
  if (is_admin() || is_user_logged_in()) {
    return;
  }

  global $wp_scripts;
  if (isset($wp_scripts->registered['jquery']->ver)) {
    $ver = $wp_scripts->registered['jquery']->ver;
    $ver = str_replace("-wp", "", $ver);
  } else {
    $ver = '1.12.4';
  }

  wp_deregister_script('jquery');
  wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/$ver/jquery.min.js", false, $ver);
}

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

  wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/dist/css/index.min.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );
  wp_enqueue_script( 'mobile-header-js', get_stylesheet_directory_uri() . '/dist/js/header.min.js', ['jquery'], CHILD_THEME_ASTRA_CHILD_VERSION, true );

  if (is_page('support-us')) {
    wp_enqueue_script( 'join-js', get_stylesheet_directory_uri() . '/dist/js/join.min.js', [], CHILD_THEME_ASTRA_CHILD_VERSION, true );
  }

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );



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
add_action( 'wp_enqueue_scripts', 'inline_scripts', 1, 1 );
