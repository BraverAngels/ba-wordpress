<div class="library-sidebar-inner">
  <h4>Reading Rooms</h4>
  <?php
  $terms = get_terms( array(
      'taxonomy' => 'library_reading_room',
      'hide_empty' => true,
  ) ); ?>
  <ul class="library-reading-rooms-list">
    <?php foreach($terms as $term) : ?>
      <li>
        <a
          <?php if (is_tax('library_reading_room', $term->name) ): ?>
            class="currently-selected"
          <?php endif; ?>
          href="<?php echo get_term_link( $term, 'library_label'); ?>">
          <?php echo $term->name; ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
  <h4>Labels</h4>
  <?php
  $terms = get_terms( array(
      'taxonomy' => 'library_label',
      'hide_empty' => true,
  ) ); ?>
  <ul class="library-labels-list">
    <?php foreach($terms as $term) : ?>
      <li>
        <a
          <?php if (is_tax('library_label', $term->name) ): ?>
            class="currently-selected"
          <?php endif; ?>
          href="<?php echo get_term_link( $term, 'library_label'); ?>">
          <?php echo $term->name; ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
