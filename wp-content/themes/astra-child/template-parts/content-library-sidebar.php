<div class="library-sidebar-inner">
  <?php
  $terms = get_terms( array(
      'taxonomy' => 'library_category',
      'hide_empty' => true,
  ) ); ?>
  <ul class="library-labels-list">
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
</div>
