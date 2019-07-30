<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
  return;
}
?>

<div id="comments" class="comments-area library-reviews-area">

  <?php
  // You can start editing here -- including this comment!
  if ( have_comments() ) :
    ?>
    <h3 class="comments-title" style="font-size: 24px;">
      <?php
      $_s_comment_count = get_comments_number();
      if ( '1' === $_s_comment_count ) {
        printf(
          /* translators: 1: title. */
          esc_html__( 'One Review for &ldquo;%1$s&rdquo;', '_s' ),
          '<span>' . get_the_title() . '</span>'
        );
      } else {
        printf( // WPCS: XSS OK.
          /* translators: 1: comment count number, 2: title. */
          esc_html( _nx( '%1$s review for &ldquo;%2$s&rdquo;', '%1$s reviews for &ldquo;%2$s&rdquo;', $_s_comment_count, 'comments title', '_s' ) ),
          number_format_i18n( $_s_comment_count ),
          '<span>' . get_the_title() . '</span>'
        );
      }
      ?>
    </h3><!-- .comments-title -->

    <?php the_comments_navigation(); ?>

    <ol class="comment-list">
      <?php
      wp_list_comments( array(
        'style'      => 'ol',
        'short_ping' => true,
      ) );
      ?>
    </ol><!-- .comment-list -->

    <?php
    the_comments_navigation();
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() ) :
      ?>
      <p class="no-comments"><?php esc_html_e( 'Comments are closed.', '_s' ); ?></p>
      <?php
    endif;
  endif; // Check for have_comments().
  comment_form(array('comment_field'=> '<p class="comment-form-comment"><label for="comment">' . _x( 'Review', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>', 'title_reply' => __( 'Leave a Review' ), 'label_submit' => __( 'Post Review' )));
  ?>

</div><!-- #comments -->
