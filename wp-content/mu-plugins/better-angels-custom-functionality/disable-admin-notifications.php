<?php

//disable Gravity Forms User Registration Add-on new user notification emails
if ( ! function_exists( 'gf_new_user_notification' ) ) {
  function gf_new_user_notification( $user_id, $plaintext_pass = '', $notify = '' ) {
    return;
  }
}
