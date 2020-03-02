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
  <p class="library-sidebar-contact-info">
    The Better Angels Library is curated and maintained by members <strong>Bridget Kraft</strong>, <strong>Jennifer Livingston</strong>, and <strong>Bill Roos</strong>.
    <br/>
    Questions, concerns and book recommendations for the Better Angels Library can be submitted to <a href="mailto:mailto:library@better-angels.org">library@better-angels.org</a>.
  </p>
  <p class="library-sidebar-contact-info">
    You can support Better Angels when you purchase books on <a href="<?php echo home_url('support-better-angels-with-amazon-smile'); ?>">Amazon Smile</a>.
  </p>
</div>
