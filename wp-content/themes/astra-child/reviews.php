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
$membership_ids = '3612, 3613, 3614, 3616, 3618, 3620, 3621, 3622, 3623, 3624, 3625, 3626, 3627, 3628, 3629, 3630, 3631, 3632, 3706';

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
      <p class="no-comments"><?php esc_html_e( 'Reviews are closed.', '_s' ); ?></p>
      <?php
    endif;
  endif; // Check for have_comments().

  if (current_user_can('mepr-active','memberships: ' . $membership_ids) || current_user_can('edit_others_pages')) :
    comment_form(array('comment_field'=> '<p class="comment-form-comment"><em class="library-review-guide-link">Be sure to view our <strong><a target="_blank" href="' . home_url('/tips-for-reviewers/') . '">tips for reviewers</a></strong> before posting a review!</em><label for="comment">' . _x( 'Review', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>', 'title_reply' => __( 'Leave a Review' ), 'label_submit' => __( 'Post Review' )));
  else : ?>
    <h3>Leave a Review</h3>
    <div class="library-review-section-join-message">
      <h4>You must be a dues-paying member of Better Angels to post a review.</h4>
      <p>
        <em>Already a member?</em> <a href="<?php echo home_url('login?redirect_to=' . get_the_permalink() ); ?>"><strong>Login</strong></a>
      </p>
      <p>
        Membership dues as low as <strong>$12 per year</strong>. <a href="<?php echo home_url('join?utm_source=website&utm_medium=join&utm_campaign=library_review'); ?>"><strong>Join now</strong></a> and also get access to:
        <ul>
          <li>Online book discussions</li>
          <li>Free training to become a Better Angels organizer, citizen moderator, or debate chair</li>
          <li>Invites to monthly members-only calls</li>
          <li>Attend local Better Angels Alliance meetings or form your own</li>
        </ul>
      </p>
      <p><a style="margin: 0;" class="ba-cta-button ba-cta-button-red" href="<?php echo home_url('join?utm_source=website&utm_medium=join&utm_campaign=library_review'); ?>">Become a member</a></p>
    </div>
  <?php
  endif; ?>

</div><!-- #comments -->
