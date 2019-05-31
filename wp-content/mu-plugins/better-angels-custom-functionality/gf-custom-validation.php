<?php
add_filter( 'gform_validation', 'custom_validation' );

function custom_validation( $validation_result ) {

  $form = $validation_result['form'];

  if ( $form['id'] != 8 ) {
    return $validation_result;
  }

    if ( rgpost( 'input_15' ) == 'Yearly Contribution' ) {

      $donation_value = intval (str_replace('$', '', rgpost( 'input_14' )));
      //If selected, yearly amount (field 14) must be 12 or greater
      if ( $donation_value < 12 ) {

          // set the form validation to false
          $validation_result['is_valid'] = false;

          //finding Field with ID of 14 (yearly contribution) and marking it as failed validation
          foreach( $form['fields'] as $field ) {

              //NOTE: replace 1 with the field you would like to validate, 14 in this case
              if ( $field->id == '14' ) {
                  $field->failed_validation = true;
                  $field->validation_message = 'Yearly contribution must be $12 or more';
                  break;
              }
          }

      }
  }

  elseif ( rgpost( 'input_15' ) == 'Monthly Contribution' && rgpost( 'input_5' ) == "Other|0") {

      $donation_value = intval (str_replace('$', '', rgpost( 'input_11' )));

      //If selected, "other" monthly amount (field 11) must be 1 or greater
      if ( $donation_value < 1 ) {

        // set the form validation to false
        $validation_result['is_valid'] = false;

        //finding Field with ID of 11 (monthly) and marking it as failed validation
        foreach( $form['fields'] as $field ) {

          //NOTE: replace 1 with the field you would like to validate, 14 in this case
          if ( $field->id == '11' ) {
            $field->failed_validation = true;
            $field->validation_message = 'Monthly contribution must be $1 or more';
            break;
          }
        }

      }
  }

    //Assign modified $form object back to the validation result
    $validation_result['form'] = $form;
    return $validation_result;

};
