<?php
/**
 * The template for displaying reviews in the BA library
 * displays the area of the page that contains both the current reviews (comments)
 * and the reviw (comment) form.
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

<div id="comments" class="comments-area library-reviews_wrapper">

  <?php

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
  endif;

  // make sure only users with active subscriptions or admins can add reviews
  if (get_user_subscription_id() || current_user_can('edit_others_pages')) :
    comment_form(
      array(
        'comment_field'=> '<p class="comment-form-comment"><em class="library-reviews_guide-link">Be sure to view our <strong><a target="_blank" href="' . home_url('/tips-for-reviewers/') . '">tips for reviewers</a></strong> before posting a review!</em><label for="comment">' . _x( 'Review', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
        'title_reply' => __( 'Leave a Review' ),
        'label_submit' => __( 'Post Review' )
      )
    );
  else : ?>
    <h3>Leave a Review</h3>
    <div class="library-reviews_join-message">
      <h4>You must be a dues-paying member of Braver Angels to post a review.</h4>
      <?php if (!is_user_logged_in()) : ?>
        <p>
          <em>Already a member?</em> <a href="<?php echo home_url('login?redirect_to=' . get_the_permalink() ); ?>"><strong>Login</strong></a>
        </p>
      <?php endif; ?>
      <p>
        Membership dues as low as <strong>$12 per year</strong>. <a href="<?php echo home_url('join'); ?>"><strong>Join or Renew now</strong></a> and also get access to:
        <ul>
          <li>Online book discussions</li>
          <li>Free training to become a Braver Angels organizer, citizen moderator, or debate chair</li>
          <li>Invites to monthly members-only calls</li>
          <li>Attend local Braver Angels Alliance meetings or form your own</li>
        </ul>
      </p>
      <p><a class="ba-cta-button ba-cta-button--warning" href="<?php echo home_url('join'); ?>">Become a member</a></p>
    </div>
  <?php
  endif; ?>

</div><!-- #comments -->
