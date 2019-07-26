<article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class('ast-col-md-6 ast-col-lg-4'); ?>>

  <?php if (has_post_thumbnail()) : ?>
    <a href="<?php the_permalink(); ?>" rel="bookmark">
      <?php the_post_thumbnail(); ?>
    </a>
  <?php endif; ?>


  <div class="ast-post-format- blog-layout-1">
    <div class="post-content ast-col-md-12">
      <header class="entry-header">
        <h4 class="entry-title library-entry-title" itemprop="headline">
        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
        <?php if (has_ba_library_author(get_the_ID())) : ?>
          <span><?php the_ba_library_author(get_the_ID()); ?></span>
          <br/>
        <?php endif; ?>
        <?php if (has_ba_library_year_published(get_the_ID())) : ?>
          <span><em><?php the_ba_library_year_published(get_the_ID()); ?></em></span>
          <br/>
        <?php endif; ?>
        <a href="<?php the_permalink(); ?>" rel="bookmark">View →</a>
      </header><!-- .entry-header -->

    </div><!-- .post-content -->
  </div>
</article><!-- #post-## -->