<?php

function ba_venue_states_select_field() {

  $args = array(
   'post_type' => 'tribe_venue',
   'posts_per_page' => -1
  );

  $posts = query_posts($args);
  $states = array(
  "AK" => '', "AL" => '', "AR" => '', "AZ" => '', "CA" => '', "CO" => '', "CT" => '',
  "DC" => '', "DE" => '', "FL" => '', "GA" => '', "HI" => '', "IA" => '', "ID" => '',
  "IL" => '', "IN" => '', "KS" => '', "KY" => '', "LA" => '',
  "MA" => '', "MD" => '', "ME" => '', "MI" => '', "MN" => '', "MO" => '',
  "MS" => '', "MT" => '', "NC" => '', "ND" => '', "NE" => '', "NH" => '',
  "NJ" => '', "NM" => '', "NV" => '', "NY" => '', "OH" => '', "OK" => '',
  "OR" => '', "PA" => '', "RI" => '', "SC" => '', "SD" => '', "TN" => '',
  "TX" => '', "UT" => '', "VA" => '', "VT" => '', "WA" => '', "WI" => '',
  "WV" => '', "WY" => '');

  // The Loop
  if ( !$posts ) {
   return null;
  } else {
   foreach ( $posts as $post) {

    if (get_post_meta($post->ID, '_VenueStateProvince')) {
     $state_code = get_post_meta($post->ID, '_VenueStateProvince', true);
     if (array_key_exists ( $state_code , $states ) && $states[$state_code] ) {
      $states[$state_code] .= '-' . strval($post->ID);
     } else {
      $states[$state_code] = strval($post->ID);
     }

    }

   }

   ksort($states);
   $html = '<select name="tribe_state">';
   foreach($states as $name => $value) {
     if ($value) {
         $html.= '<option value="' . $value . '">' . $name . '</option>';
     } else {
         $html.= '<option value="' . $name . '">' . $name . '</option>';
     }
   }
   $html.= '</select>';
   return $html;
  }
}

add_shortcode( 'ba_venue_states_select_field', 'ba_venue_states_select_field' );
