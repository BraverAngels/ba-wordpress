<?php
/**
 * The library index/archive main loop.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */


get_header(); ?>

<section class="ast-archive-description">
  <div class="library-icon_wrapper">
    <img width="100" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/books-graphic.png" />
  </div>
  <div class="library-title_wrapper">
    <h1 class="page-title ast-archive-title">Braver Angels Library</h1>
    <p>Now viewing: <?php echo single_cat_title( '', false ); ?> <a class="library-clear-filters-link" href="<?php echo home_url('/library'); ?>">Back to library home</a></p>
  </div>
</section>

<div id="primary" <?php astra_primary_class(); ?>>

  <?php astra_primary_content_top(); ?>

  <?php astra_entry_before(); ?>

  <div class="library-content-wrap">

    <div class="library-back-link_wrapper ast-col-md-12">
      <a class="library-back-link" href="<?php echo home_url();?>/library">&times; Back to library home</a><br/>
    </div>

    <aside class="library-sidebar_wrapper ast-col-md-3">
      <?php get_template_part('template-parts/content-library-sidebar'); ?>
    </aside>

    <main class="library-index-content ast-col-md-9">
      <?php if (have_posts() ) : $i = 1;
        while ( have_posts() ) : the_post(); ?>
          <?php get_template_part('template-parts/content-library-index-item'); ?>
          <?php if ($i % 3 == 0) : ?>
            <div class="ba-clearfix ba-clearfix-lg"></div>
          <?php endif; ?>
          <?php if ($i % 2 == 0) : ?>
            <div class="ba-clearfix ba-clearfix-md"></div>
          <?php endif; ?>
        <?php $i++; endwhile; wp_reset_postdata(); ?>
      <?php endif; ?>
    </main>

  </div>

<?php astra_entry_after(); ?>

<?php astra_pagination(); ?>

<?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

  <?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
