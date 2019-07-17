<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

 /* Add a link  to the end of our excerpt contained in a div for styling purposes and to break to a new line on the page.*/

 // function ba_library_excerpt_more($more) {
 //     global $post;
 //     return '';
 // }
 // add_filter('excerpt_more', 'ba_library_excerpt_more');

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

  <?php get_sidebar(); ?>

<?php endif ?>

  <div id="primary" <?php astra_primary_class(); ?>>

    <?php astra_primary_content_top(); ?>

    <section class="ast-archive-description">
      <h1 class="page-title ast-archive-title">Library</h1>
      <p>A cool headline describing the purpose if the Better Angels library</p>
    </section>

    <?php astra_entry_before(); ?>
    <div class="library-content-wrap" style="margin: 0 -20px;">
      <div class="library-sidebar ast-col-md-3">
        <h4>Reading Rooms</h4>
        <?php
        $terms = get_terms( array(
            'taxonomy' => 'library_reading_room',
            'hide_empty' => true,
        ) ); ?>
        <ul class="library-labels-list">
          <?php foreach($terms as $term) : ?>
            <li>
              <a href="<?php echo get_term_link( $term, 'library_label'); ?>">
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
              <a href="<?php echo get_term_link( $term, 'library_label'); ?>">
                <?php echo $term->name; ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="library-index-content ast-col-md-9">
        <?php if ( have_posts() ) :
          while ( have_posts() ) : the_post(); ?>
          <?php //astra_entry_top(); ?>
          <?php //the_post_thubnail(); ?>
          <?php //astra_entry_bottom(); ?>
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
        <?php endwhile; ?>
      <?php endif; ?>
    </div >
  </div >

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
  .library-labels-list {
    margin: 0;
    list-style: none;
  }
  .library-sidebar {
    border-right: 1px solid lightgray;
    min-height: 200px;
  }
</style>
<?php get_footer(); ?>
