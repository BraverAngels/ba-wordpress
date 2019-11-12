<?php
// Settings to modify comment functionality specifically for "Library" post type.

// Make sure the right email gets notified when a review (comment) is made on a library item.
function ba_library_comment_moderation_recipients( $emails, $comment_id ) {
  $comment = get_comment( $comment_id );

  $comment_post_type = get_post_type($comment->comment_post_ID);

  if ($comment_post_type == 'library') {
    $emails = array('library@better-angels.org');
  }

  return $emails;
}

add_filter( 'comment_moderation_recipients', 'ba_library_comment_moderation_recipients', 11, 2 );
add_filter( 'comment_notification_recipients', 'ba_library_comment_moderation_recipients', 11, 2 );


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
