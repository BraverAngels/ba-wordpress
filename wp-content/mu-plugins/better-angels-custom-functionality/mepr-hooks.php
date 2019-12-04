<?php
// Memberpress specific action hooks can be found in the following Gist
// https://gist.github.com/cartpauj/256e893ed3de276f8604aba01ef71bb8

/*
  Add actions for sending user data to Action Network
*/
add_action( 'wp_head', 'ba_process_membership_data' );

function ba_process_membership_data() {

     if( isset( $_POST['mepr-account-form']) && $_POST['mepr-account-form'] == 'Save Profile' ) {
        // Profile updated
        send_updated_user_data_to_action_network($_POST);

     }
     elseif (isset($_GET['membership_id']) && isset($_GET['membership'])) {
        // Membership saved
        send_new_user_data_to_action_network(get_current_user_id());
     }
}



/*
  Fires after a user registers for a subscription and completes payment
*/

function send_new_user_data_to_action_network($user_id){

  // Bail if the API key is not set
  if (!AN_KEY) {
    return;
  }

  // The url we will eventually query
  $actionnetwork_url = AN_BASE . '/people/';

  // Query the user data and meta info
  $user_data = get_userdata($user_id);
  $user_meta = get_user_meta($user_id);

  // Add the default Member tag
  $tags = ['Member'];

  // Get array of user interests selected in profile and add to tags
  $interests = array_keys(get_user_meta($user_id, 'mepr_interests', true));

  foreach($interests as $interest) {
    $tags[] = 'Interest - ' . ucfirst(str_replace('-', ' ', $interest));
  }

  // add an empty array for "Custom Fields"
  $custom_fields = array();

  // Set tags
  if (isset($user_meta['mepr_lean_red_or_blue']) && $user_meta['mepr_lean_red_or_blue'][0]) {

    $lean = $user_meta['mepr_lean_red_or_blue'][0];
    if ($lean == 'red' || $lean == 'lean-red') {
      $tags[] = 'Red';
      $custom_fields['Master Partisanship'] = 'Red';
    } elseif ($lean == 'blue' || $lean == 'lean-blue') {
      $tags[] = 'Blue';
      $custom_fields['Master Partisanship'] = 'Blue';
    } else {
      $tags[] = 'Declined to say political affiliation';
      $custom_fields['Master Partisanship'] = 'Declined to say political affiliation';
    }

  }
  if (isset($user_meta['mepr_birthday']) && $user_meta['mepr_birthday']) {
    $custom_fields['Birthday'] = $user_meta['mepr_birthday'][0];
  }
  if (isset($user_meta['mepr_why_i_joined']) && $user_meta['mepr_why_i_joined']) {
    $custom_fields['Why I Joined'] = $user_meta['mepr_why_i_joined'][0];
  }
  if (isset($user_meta['mepr_phone']) && $user_meta['mepr_phone']) {
    $custom_fields['Telephone'] = $user_meta['mepr_phone'][0];
  }
  if (isset($user_meta['mepr_profession']) && $user_meta['mepr_profession']) {
    $custom_fields['Profession'] = $user_meta['mepr_profession'][0];
  }



  // Get the "registration date" from user data and convert to proper format
  $custom_fields['Membership Start Date'] = date("Y-m-d", strtotime($user_data->user_registered));

  // Set default donation frequency
  $recurrence = array(
    'recurring' => false,
    'period' => null
  );

  // Add the membership period and amount based on params in the "Welcome page url"
  // This runs on the "Welcome" page after signup or updating subscription
  if (isset($_GET['membership'])) {

    $custom_fields['Membership Cancelled Date'] = 'NA';

    // if the member is updating their membership ???
    if ($custom_fields['Membership Start Date'] != date("Y-m-d")) {
      $custom_fields['Membership Updated Date'] = date("Y-m-d");
    }

    $membership_code = explode ('-', $_GET['membership']);

    if ($membership_code[0] == 'monthly' || $membership_code[0] == 'yearly' ) {
      $custom_fields['Recurring'] = ucfirst($membership_code[0]);
      $contribution_amount = $membership_code[1];
      if ($membership_code[2]) {
        $contribution_amount .= '.' . $membership_code[2];
      }
      if (isset($membership_code[1])) {
        $custom_fields['Contribution'] = $contribution_amount;
      }
    } elseif ($membership_code[0] = 'one') {
      $custom_fields['Contribution'] = $membership_code[3];
    } else {
      $custom_fields['Contribution'] = 0;
    }

  }

  // Set the user info
  $person = array(
    "family_name" => $user_meta['last_name'][0],
    "given_name" => $user_meta['first_name'][0],
    "email_addresses" => [
      array(
        'address' => $user_data->user_email,
        'status' => 'subscribed'
      )
    ],
    "postal_addresses" => [
      array(
        'postal_code' => $user_meta['mepr_zipcode'][0]
      )
    ],
    "country" => "US",
    "language" => "en",
    "custom_fields" => $custom_fields,
  );

  // Final fields we will submit to Action Network
  $fields = array(
    'person' => $person,
    'add_tags' => $tags,
    'action_network:recurrence' => $recurrence
  );

  $actionnetwork_response = ba_curl_post($actionnetwork_url, $fields);

}


/*
  Fires after a user registers for a subscription and completes payment
*/

function send_updated_user_data_to_action_network($data){

  // Bail if the API key is not set
  if (!AN_KEY) {
    return;
  }

  // The url we will eventually query
  $actionnetwork_url = AN_BASE . '/people/';

  // Add the default Member tag
  $tags = ['Member'];

  // Get array of user interests selected in profile and add to tags
  if (isset($data['mepr_interests'])) {

    $interests = array_keys($data['mepr_interests']);

    foreach($interests as $interest) {
      $tags[] = 'Interest - ' . ucfirst(str_replace('-', ' ', $interest));
    }
  }

  // add an empty array for "Custom Fields"
  $custom_fields = array();

  // Set tags
  if (isset($data['mepr_lean_red_or_blue']) && $data['mepr_lean_red_or_blue']) {

    $lean = $data['mepr_lean_red_or_blue'];
    if ($lean == 'red' || $lean == 'lean-red') {
      $tags[] = 'Red';
      $custom_fields['Master Partisanship'] = 'Red';
    } elseif ($lean == 'blue' || $lean == 'lean-blue') {
      $tags[] = 'Blue';
      $custom_fields['Master Partisanship'] = 'Blue';
    } else {
      $tags[] = 'Declined to say political affiliation';
      $custom_fields['Master Partisanship'] = 'Declined to say political affiliation';
    }

  }
  if (isset($data['mepr_birthday']) && $data['mepr_birthday']) {
    $custom_fields['Birthday'] = $data['mepr_birthday'];
  }
  if (isset($data['mepr_why_i_joined']) && $data['mepr_why_i_joined']) {
    $custom_fields['Why I Joined'] = $data['mepr_why_i_joined'];
  }
  if (isset($data['mepr_phone']) && $data['mepr_phone']) {
    $custom_fields['Telephone'] = $data['mepr_phone'];
  }
  if (isset($data['mepr_profession']) && $data['mepr_profession']) {
    $custom_fields['Profession'] = $data['mepr_profession'];
  }

  // Set the user info
  $person = array(
    "family_name" => $data['user_last_name'],
    "given_name" => $data['user_first_name'],
    "email_addresses" => [
      array(
        'address' => $data['user_email'],
        'status' => 'subscribed'
      )
    ],
    "postal_addresses" => [
      array(
        'postal_code' => $data['mepr_zipcode']
      )
    ],
    "country" => "US",
    "language" => "en",
    "custom_fields" => $custom_fields,
  );

  // Final fields we will submit to Action Network
  $fields = array(
    'person' => $person,
    'add_tags' => $tags,
  );

  $actionnetwork_response = ba_curl_post($actionnetwork_url, $fields);

}





// Transaction has expired (user cancelled, lapsed etc)
function ba_catch_txn_expired($event) {
  $txn = new MeprTransaction($event->evt_id); //evt_id should be the id of a transaction
  $user = new MeprUser($txn->user_id);
  $users_memberships = $user->active_product_subscriptions();
  //Make sure they're not still subscribed to this membership somehow
  if(!empty($users_memberships)) {
    if(!in_array($txn->product_id, $users_memberships, false)) {

        // Bail if the API key is not set
        if (!AN_KEY) {
          return;
        }

        // The url we will eventually query
        $actionnetwork_url = AN_BASE . '/people/';

        $user_data = get_userdata($txn->user_id);

        $person = array(
          "email_addresses" => [
            array(
              'address' => $user_data->user_email,
            )
          ],
          "custom_fields" => array(
            'Membership Cancelled Date' => date("Y-m-d")
          ),
        );

        $fields = array(
          'person' => $person,
        );

        $actionnetwork_response = ba_curl_post($actionnetwork_url, $fields);
    }
    //else the user is still subscribed to this membership, so do nothing
  }
}

add_action('mepr-event-transaction-expired', 'ba_catch_txn_expired');


/*
  Functions for analyzing the current user's subscription
*/

// Returns an array of ALL membership post type ids
function get_membership_ids() {
  $args = array(
    'numberposts' => -1,
    'post_type'   => 'memberpressproduct',
    'fields'      => 'ids'
  );

  $membership_ids = get_posts( $args );

  return $membership_ids;
}


function get_user_subscription_id(){

    if( class_exists('MeprUser') && is_user_logged_in() ){
        $user_id = get_current_user_id();

        $user = new MeprUser( $user_id );
        $get_memberships = $user->active_product_subscriptions();

        if( !empty( $get_memberships ) ){
            $user_memberships = array_values( array_unique( $get_memberships ) );
            return $user_memberships[0];
        }

        return false;

    } else {

        return false;
    }
}


function get_higher_membership_options() {

  // IDs of monthly memberships
  $monthly_memberships = [3612, 3613, 3614, 3616, 4278, 3618, 3620];

  // IDs of yearly memberships
  $yearly_memberships = [3621, 4279, 3622, 3623, 3624, 3625, 3626];

  if (in_array(get_user_subscription_id(), $monthly_memberships)) {

    $index = array_search(get_user_subscription_id(), $monthly_memberships);
    $higher_memberships = array_slice($monthly_memberships, $index + 1);

  } elseif (in_array(get_user_subscription_id(), $yearly_memberships)) {

    $index = array_search(get_user_subscription_id(), $yearly_memberships);
    $higher_memberships = array_slice($yearly_memberships, $index + 1);

    // Add the $50 per month option
    $higher_memberships[] = 3620;

  } else {

    $higher_memberships = array_merge($yearly_memberships, $monthly_memberships);

  }

  // remove the memberships we don't want people to sign up for anymore
  foreach([3612, 3613, 3618, 3622] as $membership) {
    if (in_array($membership, $higher_memberships)) {
      $index = array_search($membership, $higher_memberships);
      unset($higher_memberships[$index]);
    }
  }

  return $higher_memberships;
}


// Function to add subscribe text to posts and pages
function ba_mepr_join_or_upgrade_text() {


  if (!is_user_logged_in()) {
    return
    '<h2>Welcome to Better Angels</h2>
    <p>
      Please use the form below to tell us about yourself:<br/>
      <strong>Already have an account? <a href="' . home_url() . '/login?redirect_to=' . home_url() . $_SERVER['REQUEST_URI'] . '">Login</a> before completing your purchase.</strong>
      <br/><a href="' . home_url('login/?action=forgot_password') . '">Recover lost password</a>
    </p>
    <p>
      <em>Your membership will renew automatically. Cancel any time.</em>
    </p>';

  } elseif (is_user_logged_in() && get_user_subscription_id()) {

    return '<h2>Upgrade account</h2>
    <p>Complete the form below to upgrade your membership.
      <br/>
      <strong>Current subscription: ' . get_the_title(get_user_subscription_id()) . '</strong><br/><a href="'. home_url("account/?action=subscriptions").'">View account settings</a>
    </p>
    <p>
      <em>Your membership will renew automatically. Cancel any time.</em>
    </p>';
  }

  return;
}
add_shortcode('join_or_upgrade_text', 'ba_mepr_join_or_upgrade_text');

// conditional text for use in shortcode on checkout page
function ba_mepr_login_before_checkout_reminder() {
  if (!is_user_logged_in()) {
    return '<p><strong>Already have an account? <a href="' . home_url() . '/login?redirect_to=' . home_url() . $_SERVER['REQUEST_URI'] . '">Login</a> before completing your purchase.</strong></p>';
  }
  return;
}
add_shortcode('login_before_checkout_reminder', 'ba_mepr_login_before_checkout_reminder');
