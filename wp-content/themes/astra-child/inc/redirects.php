<?php
namespace BraverAngels\Redirects;

/**
 * Redirect non-logged in users away from the "Members Portal"
 * Page and its subpages
 */
add_action( 'template_redirect', 'BraverAngels\Redirects\redirect_to_login_page' );

function redirect_to_login_page() {
  global $post;

  $is_member_portal = is_page('members-portal');
  $is_member_portal_child_page = is_page() && $post->post_parent == 1303 && !is_page('welcome');

  if ($is_member_portal || $is_member_portal_child_page) {
    if (!is_user_logged_in()) {
      wp_redirect( home_url() . '/login?redirect_to=' . home_url() . $_SERVER['REQUEST_URI'], 301 );
      exit;
    } elseif (!get_user_subscription_id() && !current_user_can('edit_others_pages')) {
      wp_redirect( home_url() . '/support-us#upgrade');
      exit;
    }
  }
}


/**
 * Redirect single Event Organizer pages to main events list
 * Event organizer pages are not useful for us
 */
add_action( 'template_redirect', 'BraverAngels\Redirects\redirect_organizer_and_venue_type_single' );

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
