<?php
/*
 * Helper functions to be utilized elsewhere in custom functionality
*/


/*
 * Wrapper around POST requests to Action Network
*/
function ba_post_to_action_network($url, $fields = []) {
  $ch = curl_init( $url );
  # Setup request to send json via POST
  $payload = json_encode( $fields );

  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
    "OSDI-API-Token: " . AN_KEY
  ));

  curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
  # Return response instead of printing.
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
  # Send request.
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}


/*
 * Wrapper around POST requests to Action Network
*/
function ba_post_to_hh_ladder_lookup($fields = []) {
  $url = "https://script.google.com/macros/s/AKfycby5t8xCvrqY1f5IgScZco-2u9BK4ETwN9wbard_UX0O5pgRiqk/exec";
  $ch = curl_init( $url );
  # Setup request to send json via POST
  $payload = json_encode( $fields ); #comment

  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json"
  ));

  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    # Follow Apps script redirect to the request location...

  curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
  # Return response instead of printing.
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
  # Send request.
  $result = curl_exec($ch);
  curl_close($ch);
  $json = json_decode($result, true);
  return $json;
}
