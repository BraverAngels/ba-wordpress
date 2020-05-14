<?php
/**
 * The template for displaying all single library items.
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

    <div class="library-back-link_wrapper ast-col-md-12">
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

                <?php
                //display the custom fields for this item
                ?>

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

              <?php if (has_ba_library_recommended_by(get_the_ID())) : ?>
                <div class="library-recommended-by">
                  <span>Recommended by: <?php ba_library_recommended_by(get_the_ID()); ?></span>
                </div>
              <?php endif; ?>


              <div class="library-entry-categories">
                <?php
                $item_labels = get_the_terms( $post, 'library_category' );
                if ($item_labels) : ?>
                  <span>Posted in:
                  <?php foreach ($item_labels as $term) : ?>
                    <a href="<?php echo get_term_link( $term, 'library_category'); ?>">
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

  <div class="library-back-link_wrapper">
    <a class="library-back-link" href="<?php echo home_url();?>/library">&larr; Back to Library</a><br/>
  </div>

</div><!-- #primary -->

<?php get_footer(); ?>
