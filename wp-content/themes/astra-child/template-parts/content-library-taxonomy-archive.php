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

  <section class="ast-archive-description" style="text-align:center;border-radius: 3px;padding: 3rem 1.25rem;color: white;background:#23356c;background-image: url(https://www.better-angels.org/wp-content/uploads/2019/09/lincolnbooks1.jpg); background-size:cover;background-position:center center">
    <h1 class="page-title ast-archive-title" style="color:white;">Braver Angels Library</h1>
    <p>Now viewing: <?php echo single_cat_title( '', false ); ?> <a class="library-clear-filters-link" href="<?php echo home_url('/library'); ?>">Back to library home</a></p>
  </section>

  <div id="primary" <?php astra_primary_class(); ?>>

    <?php astra_primary_content_top(); ?>

    <?php astra_entry_before(); ?>
    <div class="library-content-wrap" style="margin: 0 -20px;">
      <div class="library-back-link-wrapper ast-col-md-12">
        <a class="library-back-link" href="<?php echo home_url();?>/library">&times; Back to library home</a><br/>
      </div>
      <div class="library-sidebar ast-col-md-3">
        <?php get_template_part('template-parts/content-library-sidebar'); ?>
      </div>
      <div class="library-index-content ast-col-md-9">
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
    </div>
  </div>

<?php astra_entry_after(); ?>

<?php astra_pagination(); ?>

    <?php astra_primary_content_bottom(); ?>

  </div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

  <?php get_sidebar(); ?>

<?php endif ?>
<style>
  .library-entry-title {
    font-size: 22px;
    margin-top: 1rem;
  }
  .post-type-archive-library .attachment-post-thumbnail {
    max-height: 275px;
    width: auto;
  }
  .post-type-archive-library .blog-layout-1 {
    padding-bottom: 1em;
    border-bottom: none;
  }
  .library-labels-list, .library-reading-rooms-list  {
    margin: 0;
    list-style: none;
  }
  .library-reading-rooms-list {
    margin-bottom: .5rem;
  }
  .library-labels-list li{
    font-size: 16px;
  }
  .library-reading-rooms-list a.currently-selected, .library-labels-list a.currently-selected{
    color: #23356c;
    font-weight: bold;
    text-decoration: underline;
  }
  .library-sidebar {
    padding-bottom: 1.5rem;
  }
  .library-sidebar-inner {
    background: #e8e8e8;
    padding: 1rem 1.25rem;
    border-radius: 3px;
  }
  .library-section-header {
    margin-bottom: 1rem;

  }
  .library-section-header h3 {
    display: inline-block;
    margin-right: .5rem;
  }
  .library-item-meta {
    color: #838383;
  }
  .library-clear-filters-link {
    color: white;
    text-decoration: underline;
    font-size: 16px;
    margin-left: .5rem;
  }
  .library-clear-filters-link:hover,
  .library-clear-filters-link:active,
  .library-clear-filters-link:focus {
    color: lightgray;
    text-decoration: underline;
  }
  .library-index-content .blog-layout-1 {
    padding-bottom: 1em;
    border-bottom: none
  }
</style>
<?php get_footer(); ?>
