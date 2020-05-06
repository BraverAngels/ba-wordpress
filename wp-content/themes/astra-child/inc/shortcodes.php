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
