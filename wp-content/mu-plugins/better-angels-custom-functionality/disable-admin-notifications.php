<?php

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
if (!function_exists('wp_password_change_notification')) {
  function wp_password_change_notification($user) {
    return;
  }
}
