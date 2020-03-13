
  <?php
  /**
   * List View Template
   * The wrapper template for a list of events. This includes the Past Events and Upcoming Events views
   * as well as those same views filtered to a specific category.
   *
   * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list.php
   *
   * @package TribeEventsCalendar
   * @version 4.6.19
   *
   */

  if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
  }

  do_action( 'tribe_events_before_template' );
  ?>

  <!-- Title Bar -->
  <?php tribe_get_template_part( 'list/title-bar' ); ?>
  <p style="margin-top: 1rem;"><em><strong>Note:</strong> Due to the public health threat from the Coronavirus, we’re strongly recommending that in-person events we’re strongly recommending that in-person events be cancelled or postponed until at least April 13. More information is available <a href="<?php home_url(); ?>/coronavirus"><u>here</u></a>. If you have not heard from event organizers about this, we recommend reaching out to them for information about your specific event.</em></p>
  <p>
    <em style="font-size: 80%;">Note: Better Angels is <u>not</u> affiliated with The BETTER ANGELS Society®, the non-profit organization that supports the production, promotion and educational outreach associated with historically significant documentary films made by Ken Burns and other associated filmmakers.</em>
  </p>
    <!-- Tribe Bar -->
  <?php tribe_get_template_part( 'modules/bar' ); ?>

    <!-- Main Events Content -->
  <?php tribe_get_template_part( 'list/content' ); ?>

    <div class="tribe-clear"></div>

  <?php
  do_action( 'tribe_events_after_template' );
