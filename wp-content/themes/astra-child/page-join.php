<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

get_header(); ?>

<div class="entry-content clear" itemprop="text">
  <div class="join-content-column for-small">
    <h2 style="font-family: 'Nunito Sans', 'Karla'; margin-bottom: .5rem;"><?php the_title(); ?></h2>
    <h3 style="color: gray; font-weight: 400; font-family: 'Nunito Sans', 'Karla';"><em>Become a Member Today!</em></h3>
  </div>
  <div class="join-content-column for-large">
    <h2 style="font-family: 'Nunito Sans', 'Karla'; margin-bottom: .5rem;"><?php the_title(); ?></h2>
    <h3 style="color: gray; font-weight: 400; font-family: 'Nunito Sans', 'Karla'; "><em>Become a Member Today!</em></h3>
    <?php the_content(); ?>
  </div>
  <div class="join-selection-column">
    <h3>Select contribution type</h3>
    <div class="join-selection-type">

      <button class="join-selection-type-item selected" data-toggle="monthly-options">Monthly</button>
      <button class="join-selection-type-item" data-toggle="yearly-options">Yearly</button>
      <button class="join-selection-type-item" data-toggle="one-time-gift-options">One Time Gift</button>
    </div>
      <div class="join-selection-options-wrap">
        <div id="one-time-gift-options" class="join-selection-options">
          <span class="join-description">Select contribution amount</span>
          <ul>
            <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/one-time-12/">$12</a></li>
            <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/one-time-25/">$25</a></li>
            <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/one-time-50/">$50</a></li>
            <li><a data-autoselect class="join-selection-amount" href="<?php echo home_url(); ?>/join/one-time-100/">$100</a></li>
            <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/one-time-250/">$250</a></li>
            <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/one-time-500/">$500</a></li>
          </ul>
        </div>

        <div id="yearly-options" class="join-selection-options">
          <span class="join-description">Select yearly contribution amount</span>
          <ul>
            <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-12/">$12</a></li>
            <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-25/">$25</a></li>
            <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-50/">$50</a></li>
            <li><a data-autoselect class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-100/">$100</a></li>
            <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-250/">$250</a></li>
            <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-500/">$500</a></li>
          </ul>
        </div>

        <div id="monthly-options" class="join-selection-options active">
          <span class="join-description">Select monthly contribution amount</span>
          <ul>
            <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/monthly-1/">$1</a></li>
            <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/monthly-2/">$2</a></li>
            <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/monthly-5/">$5</a></li>
            <li><a data-autoselect class="join-selection-amount selected" href="<?php echo home_url(); ?>/join/monthly-10/">$10</a></li>
            <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/monthly-25/">$25</a></li>
            <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/monthly-50/">$50</a></li>
          </ul>
        </div>
      </div>

    <form id="join-submit-form" action="<?php echo home_url(); ?>/join/monthly-10/">
      <input id="join-submit-button" type="submit" value="Join" />
    </form>
    <span class="join-selection-subscribe-text">Not ready to become a member?<br><a href="<?php echo home_url(); ?>/subscribe">Subscribe to our newsletter</a></span>
  </div>
  <div class="join-content-column for-small">
    <br/>
    <?php the_content(); ?>
  </div>
</div>


<noscript>
  <style>
    .screen-reader-label {
      visibility: visible;
      height: auto;
      position: static;
    }
    .join-selection-options ul {
      display: block;
    }
  </style>
</noscript>

<?php get_footer(); ?>
