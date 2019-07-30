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
      <p>A cool headline describing the purpose of the Better Angels library</p>
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
        <?php $ba_docs_query = new WP_Query( array(
            'post_type' => 'library',
            'nopaging' => true,
            'posts_per_page' => '3',
            'tax_query' => array(
                array(
                    'taxonomy' => 'library_reading_room',
                    'field' => 'slug',
                    'terms' => 'better-angels-readings',
                ),
            ),
        ) ); ?>
        <?php $ba_other_items = new WP_Query( array(
            'post_type' => 'library',
            'tax_query' => array(
                array(
                    'taxonomy' => 'library_reading_room',
                    'field' => 'slug',
                    'terms' => 'better-angels-readings',
                    'operator'  => 'NOT IN'
                ),
            ),
        ) ); ?>

        <?php if ($ba_docs_query->have_posts() ) :
          echo "<div class='ast-col-sm-12 library-section-header'><h3>Better Angels Readings</h3></div>";
          while ( $ba_docs_query->have_posts() ) : $ba_docs_query->the_post(); ?>
            <?php get_template_part('content-library-index-item'); ?>
          <?php endwhile; wp_reset_postdata(); ?>
        <?php endif; ?>

        <?php if ($ba_other_items->have_posts() ) :
          echo "<div class='ast-col-sm-12 library-section-header'><h3>Selected Books</h3></div>";
          while ( $ba_other_items->have_posts() ) : $ba_other_items->the_post(); ?>
            <?php get_template_part('content-library-index-item'); ?>
          <?php endwhile; wp_reset_postdata(); ?>
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
  .library-labels-list {
    margin: 0;
    list-style: none;
  }
  .library-sidebar {
    border-right: 1px solid lightgray;
    min-height: 200px;
  }
  .library-section-header {
    margin-bottom: 1rem;
  }
</style>
<?php get_footer(); ?>
