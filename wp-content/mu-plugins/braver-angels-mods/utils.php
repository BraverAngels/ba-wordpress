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
