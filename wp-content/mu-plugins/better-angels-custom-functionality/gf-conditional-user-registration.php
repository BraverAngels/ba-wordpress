<?php

add_action("gform_pre_submission_22", "ba_pre_submission_user_validate");
function ba_pre_submission_user_validate($form){
    // input 8 is the email field
    $email = $_POST['input_8'];

    if (!email_exists($email)) {
      //Change input_52 (hidden "User Registration" field) to "No" if user already exists
      $_POST['input_51'] = "yes";
    }
}
