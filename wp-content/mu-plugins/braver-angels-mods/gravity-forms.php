<?php
/*
 * Modifications and Callbacks for the Gravity Forms plugin
*/


// California campaign form
add_action( 'gform_after_submission_25', 'record_user_in_action_network_after_donation', 10, 2 );

// Iowa campaign form
add_action( 'gform_after_submission_28', 'record_user_in_action_network_after_donation', 10, 2 );

// "Support Us" donate form (Donate V2)
add_action( 'gform_after_submission_29', 'record_user_in_action_network_after_donation', 10, 2 );


/*
 * Submit a user's basic information to Action Network after they complete a donation
*/
function record_user_in_action_network_after_donation($entry) {

  if (!AN_KEY) {
    return;
  }

  $actionnetwork_url = AN_BASE . '/people/';

  $transaction_id = $entry['transaction_id'];

  if (!$transaction_id) {
    return;
  }

  $tags = [];

  $person = array(
    "family_name" =>  $entry['41.6'],
    "given_name" =>  $entry['41.3'],
    "email_addresses" => [
      array(
        'address' => $entry['8'],
        'status' => 'subscribed'
      )
    ],
    "postal_addresses" => [
      array(
        'postal_code' => $entry['3.5']
      )
    ],
    "country" => "US",
    "language" => "en",
  );

  $fields = array(
    'person' => $person,
    'add_tags' => $tags,
  );

  $actionnetwork_response = ba_post_to_action_network($actionnetwork_url, $fields);

  return $actionnetwork_response;
}



/*
 * Enable Use of the Total Field with Conditional Logic in Gravity forms
*/

class RW_GF_Total_Field_Logic {

    public function __construct() {
        add_action( 'init', array( $this, 'init' ) );
    }

    function init() {
        if ( ! property_exists( 'GFForms', 'version' ) || ! version_compare( GFForms::$version, '1.9', '>=' ) ) {
            return;
        }

        add_filter( 'gform_admin_pre_render', array( $this, 'enable_total_in_conditional_logic' ) );
    }

    function enable_total_in_conditional_logic( $form ) {
        if ( GFCommon::is_entry_detail() ) {
            return $form;
        }

        echo "<script type='text/javascript'>" .
             " gform.addFilter('gform_is_conditional_logic_field', function (isConditionalLogicField, field) {" .
             "     return field.type == 'total' ? true : isConditionalLogicField;" .
             '  });' .
             "  gform.addFilter('gform_conditional_logic_operators', function (operators, objectType, fieldId) {" .
             '      var targetField = GetFieldById(fieldId);' .
             "      if (targetField && targetField['type'] == 'total') {" .
             "          operators = {'>': 'greaterThan', '<': 'lessThan'};" .
             '      }' .
             '      return operators;' .
             '  });' .
             '</script>';

        return $form;
    }

}
new RW_GF_Total_Field_Logic();
