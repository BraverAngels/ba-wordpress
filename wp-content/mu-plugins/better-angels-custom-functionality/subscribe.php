<?php

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

add_shortcode('subscribe', 'subscribe_form_shortcode');


?>
