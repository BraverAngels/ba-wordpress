<?php
/*
 * Modifications to comment functionality
*/

// Make sure that all library reviews made by non-admins must be manually approved
function ba_unapprove_library_review( $approved , $commentdata ) {

  $comment_post_type = get_post_type( $commentdata['comment_post_ID'] );
  $comment_user_roles = get_user_by('ID', $commentdata['user_id'])->roles;

  if (
    $comment_post_type == 'library'
    && !in_array( 'editor', $comment_user_roles )
    && !in_array( 'administrator', $comment_user_roles )
  ) {
    $approved = 0;
  }

  return $approved;

}

add_filter( 'pre_comment_approved' , 'ba_unapprove_library_review' , '99', 2 );

// Remove comments support for memberpress
function ba_remove_membership_comments() {
  remove_post_type_support( 'memberpressproduct', 'comments' );
}

add_action( 'init', 'ba_remove_membership_comments' );

// set comments to "Closed" for any post type except "post" and "library"
function ba_comments_open( $open, $post_id ) {
    $post_type = get_post_type( $post_id );
    // allow comments for built-in "post" post type
    if ( $post_type == 'post' || $post_type == 'library') {
        return true;
    }
    // disable comments for any other post types
    return false;
}

add_filter( 'comments_open', 'ba_comments_open', 10 , 2 );
