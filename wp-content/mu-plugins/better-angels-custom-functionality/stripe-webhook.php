<?php


add_action('init','ba_stripe_webhook');


function ba_stripe_webhook() {
  $webhook_url = "/transactions-webhook";
  if( $_SERVER['REQUEST_URI'] == $webhook_url ||
      $_SERVER['REQUEST_URI'] == $webhook_url . '/') {


      if (isset($_POST)) {
        error_log("post request received");
        $payload = json_decode(file_get_contents('php://input'), true);

        if ($payload['data']['object']) {
          $email = $payload['data']['object']['receipt_email'];
          $amount = $payload['data']['object']['amount'] * .01;
          $trans_id = $payload['data']['object']['id'];

          if (!AN_KEY || !$trans_id) {
            $response['status'] = array(
              'type' => 'error',
              'value' => 'invalid data',
            );
          }

          $actionnetwork_url = AN_BASE . '/fundraising_pages/' . AN_FUNDRAISING_ID . '/donations';

          $person = array(
            "email_addresses" => [
              array(
                'address' => $email
              )
            ],
          );

          $fields = array(
            'identifiers' => [$trans_id], // $transaction_id
            'recipients' => [array(
              'display_name' => 'Braver Angels',
              'amount' => $amount,
            )],
            'person' => $person,
          );

          $actionnetwork_response = ba_curl_post($actionnetwork_url, $fields);

          error_log(print_r($fields, 1));
          error_log(print_r($actionnetwork_response, 1));

          $response['status'] = array(
            'type' => 'message',
            'value' => 'donation recorded successfully',
          );
        } else {
          $response['status'] = array(
            'type' => 'error',
            'value' => 'invalid data',
          );
        }
      }
      $encoded = json_encode($response);
      header('Content-type: application/json');
      exit($encoded);
  }
}
