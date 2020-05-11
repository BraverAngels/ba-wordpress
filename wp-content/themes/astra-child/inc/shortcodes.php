<?php

/**
 * Displays a list of important author archive links
 */
function author_shortcode() {
  echo '<ul class="author-list" style="list-style:none;margin:0 0.5rem;">';
    wp_list_authors('include=24,2832,6638,2001,7054,7302,8439,1303,21,7261');
  echo '</ul>';
}

add_shortcode('authors_list', 'author_shortcode');


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

add_shortcode('subscribe', 'subscribe_form_shortcode');
