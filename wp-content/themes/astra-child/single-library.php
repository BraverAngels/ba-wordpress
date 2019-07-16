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

    <?php astra_primary_content_top(); ?>

    <article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
      <div class="library-back-link-wrapper">
        <a class="library-back-link" href="<?php echo home_url();?>/library">&larr; Back to Library</a><br/>
      </div>
      <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail(); ?>
      <?php endif; ?>


      <div class="ast-post-format- blog-layout-1" style="margin-top: 1rem;">
        <div class="post-content ast-col-md-12">
          <header class="entry-header">
            <h4 class="entry-title library-entry-title" itemprop="headline">
            <?php the_title(); ?></h4>
            <?php if (has_ba_library_author(get_the_ID())) : ?>
              <span><?php the_ba_library_author(get_the_ID()); ?></span>
              <br/>
            <?php endif; ?>
            <?php if (has_ba_library_year_published(get_the_ID())) : ?>
              <span><em><?php the_ba_library_year_published(get_the_ID()); ?></em></span>
              <br/>
            <?php endif; ?>

            <?php the_ba_library_purchase_link(get_the_ID()); ?>
          </header><!-- .entry-header -->
          <?php the_content(); ?>
          <div class="library-back-link-wrapper">
            <a class="library-back-link" href="<?php echo home_url();?>/library">&larr; Back to Library</a><br/>
          </div>

        </div><!-- .post-content -->
      </div>
    </article><!-- #post-## -->
    <?php
    if ( comments_open() || get_comments_number() ) :
      comments_template('/reviews.php');
    endif;
    ?>
    <?php astra_primary_content_bottom(); ?>

  </div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

  <?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
