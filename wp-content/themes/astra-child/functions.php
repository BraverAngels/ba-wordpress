<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.1' );

add_action('init', 'use_jquery_from_google');

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

  wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

/**
 * Redirect single Organizer pages to main events list
 */
add_action( 'template_redirect', 'redirect_organizer_and_venue_type_single' );
  function redirect_organizer_and_venue_type_single() {
      if ( ! is_singular( 'tribe_organizer' ) && ! is_singular( 'tribe_venue' ) )
          return;
      if ( tribe_get_events_link() ) {
        wp_redirect( tribe_get_events_link(), 301 );
        exit;
      } else {
        wp_redirect( home_url(), 301 );
        exit;
      }

  }

  function ba_login_page_styles() {
  ?>
    <style type="text/css">
      body.login div#login h1 a {
        background-image: url(https://43n9a3188zqw4cdz825bl1q4-wpengine.netdna-ssl.com/wp-content/uploads/2018/11/Better-Angels-clear-logo.png);
        padding-bottom: 0;
        width: 100%;
        background-size: 250px;
        background-position: bottom;
      }
      body.login #login_error, .login .message, .login .success {
        border-left: 4px solid #c80000 !important;
      }
      body.login input#wp-submit {
        background: #2850a0;
        border-color: #2850a0;
        box-shadow: 0 1px 0 #2850a0;
        color: #fff;
        text-decoration: none;
        text-shadow: none;
      }
      body.login input#wp-submit:focus, body.login input#wp-submit:hover {
        background: #2b4997;
        border-color: #2b4997;
      }
    </style>
 <?php
} add_action( 'login_enqueue_scripts', 'ba_login_page_styles' );
