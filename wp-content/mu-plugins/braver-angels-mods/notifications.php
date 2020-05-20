<?php
/*
 * Modifications to email notification functionality
*/

//disable Gravity Forms User Registration Add-on new user notification emails
if ( ! function_exists( 'gf_new_user_notification' ) ) {
  function gf_new_user_notification( $user_id, $plaintext_pass = '', $notify = '' ) {
    return;
  }
}

//disable default WordPress new user notification emails
if (!function_exists('wp_new_user_notification')) {
  function wp_new_user_notification( $user_id, $deprecated = null, $notify = '' ) {
    return;
  }
}

//disable default WordPress change password notifications
if ( !function_exists( 'wp_password_change_notification' ) ) {
    function wp_password_change_notification() {}
}

add_filter( 'send_email_change_email', '__return_false' );



// Make sure the right email gets notified when a review (comment) is made on a library item.
function ba_library_comment_moderation_recipients( $emails, $comment_id ) {
  $comment = get_comment( $comment_id );

  $comment_post_type = get_post_type($comment->comment_post_ID);

  if ($comment_post_type == 'library') {
    $emails = array('library@better-angels.org');
  }

  return $emails;
}

add_filter( 'comment_moderation_recipients', 'ba_library_comment_moderation_recipients', 11, 2 );
add_filter( 'comment_notification_recipients', 'ba_library_comment_moderation_recipients', 11, 2 );
