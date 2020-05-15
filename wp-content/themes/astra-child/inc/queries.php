<?php
namespace BraverAngels\Queries;

/**
 * Custom/modified queries to be used in this theme
 */


/**
 * Modifies the main search query to include an array of
 * post types instead of the default 'post' post type.
 *
 * @param object $query  The original query.
 * @return object $query The amended query.
 */

function search_set_post_types( $query ) {
  if ( $query->is_search ) {
    $query->set( 'post_type', array( 'post', 'page', 'library', 'tribe_events') );
  }

  return $query;
}

add_filter( 'pre_get_posts', 'BraverAngels\Queries\search_set_post_types' );


/**
 * This function modifies the main WordPress query to
 * display items in menu order
 */
function modify_library_loop_order( $query ) {
  if ( is_admin() || !$query->is_main_query() ) return;

  if ( is_tax('library_category') ) {
    $query->query_vars['orderby'] = 'menu_order';
    $query->query_vars['order'] = 'ASC';
    return;
  }
}

add_action( 'pre_get_posts', 'BraverAngels\Queries\modify_library_loop_order' );
