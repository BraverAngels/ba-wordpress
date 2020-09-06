<?php
namespace BraverAngels\Shortcodes;

/**
 * Displays a list of important author archive links
 */
function author_shortcode() {
  echo '<ul class="author-list" style="list-style:none;margin:0 0.5rem;">';
    wp_list_authors('include=24,2832,6638,2001,7054,7302,8439,1303,21,7261');
  echo '</ul>';
}

add_shortcode('authors_list', 'BraverAngels\Shortcodes\author_shortcode');



/**
 * Displays a list of events by state
 */
function events_shortcode() {
  // Retrieve the next 5 upcoming events
  	//Retrieve venues that match query criteria
	$args = array(
		'nopaging' => true,
		'post_type'=>'tribe_venue',
		//Only query venues in specific locations
		'meta_query' => array(
			'relation' => 'AND',
			//Specific City
			array(
        'key' => '_VenueStateProvince',
        'value' => array('CA'), 
        'compare' => 'IN',
     )
		)
	);

	$state_venues = get_posts( $args );
	
	$venue_ids = array();

	//Loops through venues and add ID to array
	foreach( $state_venues as $post ) {
		setup_postdata($post);

		//Get ID of matching Venue
		$venue_ids[] = get_the_id();
	}

  wp_reset_postdata();

	
	if( empty( $venue_ids ) ) {
    echo "<p>No upcoming events found.</p>";
    //If Venue IDs were found, then query events
  } else {
		//Retrieve Events with matching Venue IDs
		$event_args = array(
      'start_date'    => 'now',
			'posts_per_page'=>	10,
			//Only query venues in specific countries
			'meta_query' => array(
				array(
				   'key' => '_EventVenueID',
				   'value' => $venue_ids,
				   'compare' => 'IN',
				)
			)
		);

		$state_events = tribe_get_events( $event_args );
    echo print_r($state_events);
		//Loops through events and display
		foreach( $state_events as $post ) {
			setup_postdata($post);

			echo '<h2>' . get_the_title() . '</h2>';
		}

		wp_reset_postdata();
	}
}

add_shortcode('events_list', 'BraverAngels\Shortcodes\events_shortcode');


/**
 * Displays the subscribe Gravity Form
 */
function subscribe_form_shortcode($atts = '') {

  $value = shortcode_atts( array(
    'title' => '',
    'description' => '',
  ), $atts );

  $html = '<div class="subscribeForm-wrapper">';

    if ($value['title']) {
      $html .= '<h3 class="subscribeForm-title">' . $value['title'] . '</h3>';
    }

    if ($value['description']) {
      $html .= '<p class="subscribeForm-description">' . $value['description'] . '</p>';
    }

    $html .= do_shortcode( '[gravityform id="33" title="false" description="false" ajax="true" tabindex="49"]' );

  $html .= '</div>';

  return $html;
}

add_shortcode('subscribe', 'BraverAngels\Shortcodes\subscribe_form_shortcode');



/**
 * Text to be displayed above the Memberpress join/upgrade form
 */
function mepr_join_or_upgrade_text() {


  if (!is_user_logged_in()) {
    return
    '<h2>Welcome to Braver Angels</h2>
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

  } else {

    return '<h2>Welcome to Braver Angels</h2>
    <p>Please complete the form below.
      <br/>
      <em>Your membership will renew automatically. Cancel any time.</em>
    </p>';

  }

}
add_shortcode('join_or_upgrade_text', 'BraverAngels\Shortcodes\mepr_join_or_upgrade_text');

/**
 * Conditional text for use in shortcode on checkout page
 */
function mepr_login_before_checkout_reminder() {
  if (!is_user_logged_in()) {
    return '<p><strong>Already have an account? <a href="' . home_url() . '/login?redirect_to=' . home_url() . $_SERVER['REQUEST_URI'] . '">Login</a> before completing your purchase.</strong></p>';
  }
  return;
}
add_shortcode('login_before_checkout_reminder', 'BraverAngels\Shortcodes\mepr_login_before_checkout_reminder');
