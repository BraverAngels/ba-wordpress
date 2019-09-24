<article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class('ast-col-md-6 ast-col-lg-4'); ?>>

  <?php if (has_post_thumbnail()) : ?>
    <a href="<?php the_permalink(); ?>" rel="bookmark">
      <?php the_post_thumbnail(); ?>
    </a>
  <?php else; ?>
    <a href="<?php the_permalink(); ?>" rel="bookmark">
      <img src="https://www.better-angels.org/wp-content/uploads/2018/08/BA_Logo-1.png" />    
    </a>
  <?php endif; ?>


  <div class="ast-post-format- blog-layout-1">
    <div class="post-content ast-col-md-12">
      <header class="entry-header">
        <h4 class="entry-title library-entry-title" itemprop="headline">
        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
        <div class="library-item-meta">
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
      </header><!-- .entry-header -->

    </div><!-- .post-content -->
  </div>
</article><!-- #post-## -->
