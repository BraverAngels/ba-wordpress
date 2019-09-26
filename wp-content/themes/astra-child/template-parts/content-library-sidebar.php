<div class="library-sidebar-inner">
  <?php
  $ba_readings = get_terms( array(
      'taxonomy' => 'library_category',
      'hide_empty' => true,
      'include' => 3082
  ) );

  $terms = get_terms( array(
      'taxonomy' => 'library_category',
      'hide_empty' => true,
      'exclude' => 3082
  ) ); ?>
  <ul class="library-labels-list">

    <?php foreach($ba_readings as $term) : ?>
      <li class="library-labels-ba-readings">
        <a
          <?php if (is_tax('library_category', $term->name) ): ?>
            class="currently-selected"
          <?php endif; ?>
          href="<?php echo get_term_link( $term, 'library_category'); ?>">
          <?php echo $term->name; ?>
        </a>
      </li>
    <?php endforeach; ?>

    <li class="library-recommended-readings">
      <span class="library-recommended-readings-header">Member-Recommended Readings<i class="fa fa-chevron-down ba-dropdown-icon" aria-hidden="true"></i></span>
      <ul>
        <?php foreach($terms as $term) : ?>
          <li>
            <a
              <?php if (is_tax('library_category', $term->name) ): ?>
                class="currently-selected"
              <?php endif; ?>
              href="<?php echo get_term_link( $term, 'library_category'); ?>">
              <?php echo $term->name; ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </li>
  </ul>
  <a href="<?php echo home_url('members-portal/online-book-discussions'); ?>" class="ba-cta-button ba-cta-button-red" style="font-weight: 400; text-align: center; display: block; margin: 0; margin-top: 1rem;font-size: 80%;padding-left:.25rem!important; padding-right: .25rem !important;">
    Online Book Discussions
  </a>
  <span class="library-sidebar-contact-info">
    Questions, concerns and book recommendations for the Better Angels Library can be submitted to <a href="mailto:mailto:library@better-angels.org">library@better-angels.org</a>
  </span>
</div>
