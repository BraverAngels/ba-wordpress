<?php

define('AN_BASE', "https://actionnetwork.org/api/v2");
define('AN_FUNDRAISING_ID', "4b5466f8-885f-432c-8b18-b491aa3ec4ab");

add_action( 'gform_after_submission_16', 'record_action_network_donation', 10, 2 );

add_action( 'gform_after_submission_15', 'record_action_network_member_info', 10, 2 );

add_action( 'gform_after_submission_13', 'record_action_network_member_payment', 10, 2 );

add_action( 'gform_after_submission_22', 'record_action_network_member_payment_b', 10, 2 );


/*
The JOIN form
*/
function record_action_network_member_payment_b($entry) {

  if (!AN_KEY) {
    return;
  }
  $actionnetwork_url = AN_BASE . '/fundraising_pages/' . AN_FUNDRAISING_ID . '/donations';

  $transaction_id = $entry['transaction_id'];

  if (!$transaction_id) {
    return;
  }

  switch ($entry['15']) {
      case 'Yearly':
        $occurence = "Yearly";
        $is_recurring = true;
        break;
      case 'Monthly':
        $occurence = "Monthly";
        $is_recurring = true;
        break;
      case 'One Time Gift':
        $occurence = null;
        $is_recurring = false;
        break;
  }

  $donation_value = $entry['payment_amount'];

  if ($entry['40'] == 'Credit Card') {
    $identifier_prefix = 'stripe:';
  } else {
    $identifier_prefix = 'paypal:';
  }

    $person = array(
    "family_name" =>  $entry['41.6'],
    "given_name" =>  $entry['41.3'],
      "email_addresses" => [
        array(
          'address' => $entry['8']
        )
      ],
    "postal_addresses" => [
        array(
          'postal_code' => $entry['3.5']
        )
      ],
    "country" => "US",
      "language" => "en",
    "custom_fields" => create_custom_fields($entry, $donation_value, $is_recurring, true)
    );

    $fields = array(
    'identifiers' => [$identifier_prefix . $transaction_id], // $transaction_id
    'recipients' => [array(
      'display_name' => 'Better Angels',
      'amount' => $donation_value,
    )],
    'person' => $person,
    'add_tags' => array('Member'),
    'action_network:recurrence' => array(
        'recurring' => $is_recurring,
      'period' => $occurence
    )
  );

  $actionnetwork_response = ba_curl_post($actionnetwork_url, $fields);

  return $actionnetwork_response;
}




/*
The Survey form
*/

function record_action_network_member_info($entry) {


  if (!AN_KEY) {
    return;
  }

  if (!isset($_GET['email']) && !$_GET['email']) {
      return;
  }
  $actionnetwork_url = AN_BASE . '/people/';


  $reason = $entry[1];
  $profession = $entry[2];
  $lean = $entry[4];

  $tags = [];

  foreach(['3.1', '3.2', '3.3', '3.4', '3.5'] as $option) {
    if ( isset($entry[$option]) && $entry[$option] != '' ) {
      $tags[] = $entry[$option];
    }
  }

  $custom_fields = array(
    "Why I joined" => $reason,
    "Profession" => $profession,
    "Lean Red or Blue" => $lean,
  );


  $person = array(
    "email_addresses" => [
      array(
        'address' => $_GET['email']
      )
    ],
    "country" => "US",
    "language" => "en",
    "custom_fields" => $custom_fields
  );

  $fields = array(
      'person' => $person,
    'add_tags' => $tags,
  );

  $actionnetwork_response = ba_curl_post($actionnetwork_url, $fields);

  return $actionnetwork_response;

}


/*
The JOIN form
*/
function record_action_network_member_payment($entry) {

  if (!AN_KEY) {
    return;
  }
  $actionnetwork_url = AN_BASE . '/fundraising_pages/' . AN_FUNDRAISING_ID . '/donations';

  $transaction_id = $entry['transaction_id'];

  if (!$transaction_id) {
    return;
  }

  switch ($entry['15']) {
      case 'Yearly':
        $occurence = "Yearly";
        $is_recurring = true;
    if ($entry['38'] == 'other|0') {
      $amount = $entry['39'];
    } else {
          $amount = $entry['38'];
    }
        break;
      case 'Monthly':
        $occurence = "Monthly";
        $is_recurring = true;
    if ($entry['5'] == 'Other|0') {
      $amount = $entry['11'];
    } else {
          $amount = $entry['5'];
    }
        break;
      case 'One Time Gift':
        $occurence = "Single";
        $is_recurring = false;
        $amount = $entry['24'];
        break;
  }

  $donation_value = convert_value_to_float($amount);

  if ($entry['40'] == 'Credit Card') {
    $identifier_prefix = 'stripe:';
  } else {
    $identifier_prefix = 'paypal:';
  }

    $person = array(
    "family_name" =>  $entry['41.6'],
    "given_name" =>  $entry['41.3'],
      "email_addresses" => [
        array(
          'address' => $entry['8']
        )
      ],
    "postal_addresses" => [
        array(
          'postal_code' => $entry['3.5']
        )
      ],
    "country" => "US",
      "language" => "en",
    "custom_fields" => create_custom_fields($entry, $donation_value, $is_recurring, true)
    );

    $fields = array(
    'identifiers' => [$identifier_prefix . $transaction_id], // $transaction_id
    'recipients' => [array(
      'display_name' => 'Better Angels',
      'amount' => $donation_value,
    )],
    'person' => $person,
    'add_tags' => array('Member'),
    'action_network:recurrence' => array(
        'recurring' => $is_recurring,
      'period' => $occurence
    )
  );

  $actionnetwork_response = ba_curl_post($actionnetwork_url, $fields);

  return $actionnetwork_response;
}


/*
The DONATE form
*/
function record_action_network_donation($entry) {

  if (!AN_KEY) {
    return;
  }
  $actionnetwork_url = AN_BASE . '/fundraising_pages/' . AN_FUNDRAISING_ID . '/donations';

  $transaction_id = $entry['transaction_id'];

  if (!$transaction_id) {
    return;
  }

  if ($entry['5'] != 'Other|0') {
    $amount = $entry['5'];
  } else {
    $amount = $entry['11'];
  }

  $donation_value = convert_value_to_float($amount);

  if ($entry['40'] == 'Credit Card') {
    $identifier_prefix = 'stripe:';
  } else {
    $identifier_prefix = 'paypal:';
  }

    $person = array(
    "family_name" =>  $entry['41.6'],
    "given_name" =>  $entry['41.3'],
      "email_addresses" => [
        array(
          'address' => $entry['8']
        )
      ],
    "postal_addresses" => [
        array(
          'postal_code' => $entry['3.5']
        )
      ],
    "country" => "US",
      "language" => "en",
    "custom_fields" => create_custom_fields($entry, $donation_value, $is_recurring)
    );

    $fields = array(
    'identifiers' => [$identifier_prefix . $transaction_id], // $transaction_id
    'recipients' => [array(
      'display_name' => 'Better Angels',
      'amount' => $donation_value,
    )],
    'person' => $person,
    'action_network:recurrence' => array(
        'recurring' => $is_recurring,
      'period' => $occurence
    )
  );

  $actionnetwork_response = ba_curl_post($actionnetwork_url, $fields);

  return $actionnetwork_response;

}


function ba_curl_post($url, $fields = []) {
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

function convert_value_to_float($value) {
  if (!$value) {
    return null;
  }
  $pieces = explode("|", $value);
  $res = preg_replace("/[^0-9.]/", "", $pieces[0]);
  return floatval($res);
}

function create_custom_fields($entry, $amount=0, $is_recurring = false, $include_start_date = false) {
  $utm_source = $entry[31];
  $utm_medium = $entry[32];
  $utm_campaign = $entry[33];

  $custom_fields = array();

  if ($utm_campaign || $utm_medium || $utm_source) {
    $custom_fields = array(
      'utm_source' => $utm_source,
      'utm_medium' => $utm_medium,
      'utm_campaign' => $utm_campaign
    );
  }
  $custom_fields['Contribution'] = $amount;
  $custom_fields['recurring'] = $is_recurring;
  if ($include_start_date) {
    $custom_fields['Membership Start Date'] = date("Y-m-d", strtotime($entry['date_created']));
  }

  return $custom_fields;
}


add_action( 'gform_post_payment_status', 'record_action_network_paypal_donation', 10, 8 );

// After paypal payment is complete, send form data to Action Network
function record_action_network_paypal_donation( $feed, $entry, $status,  $transaction_id, $subscriber_id, $amount, $pending_reason, $reason ) {

    if ( $status == 'Completed' && $entry['form_id'] == 16 ) {
    record_action_network_donation($entry);
    } elseif ( $status == 'Completed' && $entry['form_id'] == 13 ) {
    record_action_network_member_payment($entry);
    }

}
