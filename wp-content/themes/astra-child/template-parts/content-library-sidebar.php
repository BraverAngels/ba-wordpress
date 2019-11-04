<?php
/**
 * The library index/archive sidebar navigation.
 *
 */
?>

<div class="library-sidebar-inner">
  <ul class="library-labels-list">
    <?php
    wp_list_categories(array(
        'taxonomy' => 'library_category',
        'hide_empty' => true,
        'echo' => true,
        'title_li' => ''
    ) ); ?>
  </ul>
  <a href="<?php echo home_url('how-to-review/'); ?>" class="ba-cta-button ba-cta-button-white" style="font-weight: 400; text-align: center; display: block; margin: 0; margin-top: 1rem;font-size: 80%;padding-left:.25rem!important; padding-right: .25rem !important;">
    Submit a Book or Review
  </a>
  <a href="<?php echo home_url('members-portal/online-book-discussions'); ?>" class="ba-cta-button ba-cta-button-red" style="font-weight: 400; text-align: center; display: block; margin: 0; margin-top: 1rem;font-size: 80%;padding-left:.25rem!important; padding-right: .25rem !important;">
    Online Book Discussions
  </a>
  <span class="library-sidebar-contact-info">
    Questions, concerns and book recommendations for the Better Angels Library can be submitted to <a href="mailto:mailto:library@better-angels.org">library@better-angels.org</a>
  </span>
</div>
