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
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.0' );

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
      if ( ! is_singular( 'tribe_organizer' ) )
          return;
      if ( tribe_get_events_link() ) {
        wp_redirect( tribe_get_events_link(), 301 );
        exit;
      } else {
        wp_redirect( home_url(), 301 );
        exit;
      }

  }
