<?php
//Set Default Gravatar

add_filter( 'avatar_defaults', 'ba_new_gravatar' );

function ba_new_gravatar ($avatar_defaults) {
  $myavatar = 'https://www.better-angels.org/wp-content/uploads/2018/08/BA_Logo-1-150x150.png';
  $avatar_defaults[$myavatar] = "Default Gravatar";
  return $avatar_defaults;
}
