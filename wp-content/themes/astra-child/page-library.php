<?php
/**
 * The template for displaying the main BA library index/categories.
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
    <p>Member-recommended books and resources</p>
  </div>
</section>

<div id="primary" <?php astra_primary_class(); ?>>
  

  <?php astra_primary_content_top(); ?>

  <?php astra_entry_before(); ?>

  <div class="library-content-wrap">


    <aside class="library-sidebar_wrapper ast-col-md-3">
      <?php get_template_part('template-parts/content-library-sidebar'); ?>
    </aside>

    <main class="library-index-content ast-col-md-9">
      <div class="library-home-content_wrapper ast-col-md-12">
        <div class="library-home-content_inner">
          <?php the_content(); ?>
        </div>
      </div>

      <?php $ba_docs_query = new WP_Query( array(
          'post_type' => 'library',
          'max_num_pages' => '1',
          'posts_per_page' => '3',
          'tax_query' => array(
              array(
                  'taxonomy' => 'library_category',
                  'field' => 'slug',
                  'terms' => 'better-angels-readings',
              ),
          ),
      ) ); ?>

      <?php $ba_recommended_readings = new WP_Query( array(
          'post_type' => 'library',
          'max_num_pages' => '1',
          'posts_per_page' => '3',
          'tax_query' => array(
              array(
                  'taxonomy' => 'library_category',
                  'field' => 'slug',
                  'terms' => 'better-angels-readings',
                  'operator'  => 'NOT IN'
              ),
          ),
      ) ); ?>

      <?php $ba_external_sources = new WP_Query( array(
          'post_type' => 'library',
          'max_num_pages' => '1',
          'posts_per_page' => '3',
          'tax_query' => array(
              array(
                  'taxonomy' => 'library_category',
                  'field' => 'slug',
                  'terms' => 'external-sources',
              ),
          ),
      ) ); ?>

      <?php if ($ba_recommended_readings->have_posts() ) : $i = 1;
        echo "<div class='ast-col-sm-12 library-category_header'><h3>Member-Recommended Readings</h3><a class='library-view-all-link' href='" . home_url('/library/categories/member-recommended-readings#primary') . "'>[View All]</a></div>";
        while ( $ba_recommended_readings->have_posts() ) : $ba_recommended_readings->the_post(); ?>
          <?php get_template_part('template-parts/content-library-index-item'); ?>
          <?php if ($i % 3 == 0) : ?>
            <div class="ba-clearfix ba-clearfix-lg"></div>
          <?php endif; ?>
          <?php if ($i % 2 == 0) : ?>
            <div class="ba-clearfix ba-clearfix-md"></div>
          <?php endif; ?>
        <?php $i++;
        endwhile; wp_reset_postdata(); ?>
      <?php endif; ?>

      <?php if ($ba_docs_query->have_posts() ) : $i = 1;
        echo "<div class='ast-col-sm-12 library-category_header'><h3>Braver Angels Readings</h3><a class='library-view-all-link' href='" . home_url('/library/categories/better-angels-readings#primary') . "'>[View All]</a></div>";
        while ( $ba_docs_query->have_posts() ) : $ba_docs_query->the_post(); ?>
          <?php get_template_part('template-parts/content-library-index-item'); ?>
          <?php if ($i % 3 == 0) : ?>
            <div class="ba-clearfix ba-clearfix-lg"></div>
          <?php endif; ?>
          <?php if ($i % 2 == 0) : ?>
            <div class="ba-clearfix ba-clearfix-md"></div>
          <?php endif; ?>
        <?php $i++;
        endwhile; wp_reset_postdata(); ?>
      <?php endif; ?>

      <?php if ($ba_external_sources->have_posts() ) : $i = 1;
        echo "<div class='ast-col-sm-12 library-category_header'><h3>Recommended Online Resources</h3><a class='library-view-all-link' href='" . home_url('/library/categories/external-sources#primary') . "'>[View All]</a></div>";
        while ( $ba_external_sources->have_posts() ) : $ba_external_sources->the_post(); ?>
          <?php get_template_part('template-parts/content-library-index-item'); ?>
          <?php if ($i % 3 == 0) : ?>
            <div class="ba-clearfix ba-clearfix-lg"></div>
          <?php endif; ?>
          <?php if ($i % 2 == 0) : ?>
            <div class="ba-clearfix ba-clearfix-md"></div>
          <?php endif; ?>
        <?php $i++;
        endwhile; wp_reset_postdata(); ?>
      <?php endif; ?>

    </main>

  </div>

  <?php astra_entry_after(); ?>

  <?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

  <?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
