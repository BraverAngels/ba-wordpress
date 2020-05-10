<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

?>
      <?php astra_content_bottom(); ?>

      </div> <!-- ast-container -->

    </div><!-- #content -->

    <?php astra_content_after(); ?>

    <?php astra_footer_before(); ?>

    <?php if ( is_active_sidebar( 'pre-footer' ) && !is_page('subscribe') $$ !is_page('online-skills-training')) { ?>
      <section id="pre-footer" class="pre-footer">
        <ul class="pre-footer-widgets">
          <?php dynamic_sidebar('pre-footer'); ?>
        </ul>
      </section>
    <?php } ?>

    <?php astra_footer(); ?>

    <?php astra_footer_after(); ?>

  </div><!-- #page -->

  <?php astra_body_bottom(); ?>

  <?php wp_footer(); ?>

  </body>
</html>
