<?php

function subscribe_form_shortcode() {
  return do_shortcode( '[gravityform id="32" title="false" description="false" ajax="true" tabindex="49"]' );
}

add_shortcode('subscribe', 'subscribe_form_shortcode');

?>
