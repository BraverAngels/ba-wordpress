<?php
/**
 * The library index/archive single post content.
 */
?>

<article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class('ast-col-md-6 ast-col-lg-4'); ?>>

  <?php if (has_post_thumbnail()) : ?>
    <a href="<?php the_permalink(); ?>" rel="bookmark">
      <?php the_post_thumbnail(); ?>
    </a>
  <?php endif; ?>

  <div class="library-item_info-wrapper">

    <h5 class="library-item_title" itemprop="headline">
      <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
    </h5>

    <div class="library-item_meta">

      <?php if (has_ba_library_author(get_the_ID())) : ?>
        <span><?php the_ba_library_author(get_the_ID()); ?></span>
      <?php endif; ?>

      <?php if (has_ba_library_author(get_the_ID()) && has_ba_library_year_published(get_the_ID())) : ?>
        <span>| </span>
      <?php endif; ?>

      <?php if (has_ba_library_year_published(get_the_ID())) : ?>
        <span><?php the_ba_library_year_published(get_the_ID()); ?></span>
      <?php endif; ?>

      <?php if (has_ba_library_author(get_the_ID()) || has_ba_library_year_published(get_the_ID())) : ?>
        <br/>
      <?php endif; ?>

    </div>

    <a href="<?php the_permalink(); ?>" rel="bookmark">View →</a>

  </div><!-- .library-item_info-wrapper -->

</article><!-- #post-## -->
