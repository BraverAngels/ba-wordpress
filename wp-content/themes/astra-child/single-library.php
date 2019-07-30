<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astra
 * @since 1.0.0
 */

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

  <?php get_sidebar(); ?>

<?php endif ?>

<div id="primary" <?php astra_primary_class(); ?>>


  <div class="library-content-wrap" style="margin: 0 -20px; display: block;">

    <div class="library-back-link-wrapper ast-col-md-12">
      <a class="library-back-link" href="<?php echo home_url();?>/library">&larr; Back to Library</a><br/>
    </div>

    <div class="library-sidebar ast-col-md-3">
      <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail(); ?>
      <?php endif; ?>
    </div>

    <div class="ast-col-md-9">
      <?php astra_primary_content_top(); ?>
      <article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
        <div class="ast-post-format- blog-layout-1" style="margin-top: 1rem; border-bottom: none;">
          <div class="post-content ast-col-md-12">
            <header class="entry-header">
              <h4 class="entry-title library-entry-title" itemprop="headline">
              <?php the_title(); ?></h4>

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
              <?php $item_reading_rooms = get_the_terms( $post, 'library_reading_room' ); ?>
              <?php $item_labels = get_the_terms( $post, 'library_label' ); ?>
              <div class="library-entry-categories">
                <?php
                if ($item_reading_rooms) : ?>
                  <span>Reading Room:
                  <?php foreach ($item_reading_rooms as $term) : ?>
                    <a href="<?php echo get_term_link( $term, 'library_label'); ?>">
                      <?php echo $term->name; ?>
                    </a>
                  <?php endforeach; ?>
                  </span>
                <?php endif; ?>
                <?php
                if ($item_labels) : ?>
                  <span>Labels:
                  <?php foreach ($item_labels as $term) : ?>
                    <a href="<?php echo get_term_link( $term, 'library_label'); ?>">
                      <?php echo $term->name; ?>
                    </a>
                  <?php endforeach; ?>
                  </span>
                <?php endif; ?>
              </div>
              <?php the_ba_library_purchase_link(get_the_ID()); ?>
            </header><!-- .entry-header -->

            <?php the_content(); ?>

          </div><!-- .post-content -->
        </div>
      </article><!-- #post-## -->
      <?php astra_primary_content_bottom(); ?>
    </div><!-- .ast-col-md-9 -->
    <?php
    if ( comments_open() || get_comments_number() ) :
      comments_template('/reviews.php');
    endif;
    ?>

  </div><!-- .library-content-wrap -->
  <div class="library-back-link-wrapper">
    <a class="library-back-link" href="<?php echo home_url();?>/library">&larr; Back to Library</a><br/>
  </div>
</div><!-- #primary -->

<?php get_footer(); ?>
