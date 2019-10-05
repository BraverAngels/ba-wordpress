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
  <section class="header" style="overflow: auto; background-size: cover; background-image: url(https://www.better-angels.org/wp-content/uploads/2019/09/2019-BA-Convention-631.jpg);">
    <div class="header-inner">
      <h2 style="font-family: 'Nunito Sans', 'Karla'; margin-bottom: .5rem;">Support Us<?php //the_title(); ?></h2>
      <h3 style="color: dark-gray; font-weight: 400; font-family: 'Nunito Sans', 'Karla'; "><em>Join 8,000+ Americans in supporting the nation’s largest political depolarization group as a <a href="#join"><strong>dues-paying member</strong></a>, or with a <a href="#donate"><strong>one-time donation!</strong></a></em></h3>
      <?php //the_content(); ?>
      <br/>
      <p>
        <a href="#">Learn more about how your contribution supports our mission</a>
      </p>
    </div>
  </section>
  <div class="entry-content clear" itemprop="text">
    <section class="donate" id="join" style="overflow:auto;padding-top: 75px;">
      <div style="width: 100%; display: block;">
        <div style="color: white; width: 50%; padding-right: 16px; display: inline-block;float: left;">
          <h2 style="color: white; ">Become a Member</h2>
          <p><em>Better Angels members can:</em></p>
          <ul>
            <li>Organize meaningful workshops and debates in their communities to bridge political differences at home (we’ve had over 230 in 2019 to date!)</li>
            <li>Build community alliances that bring their neighbors together</li>
            <li>Receive valuable training as a moderator and/or debate chair</li>
            <li>Take the online, interactive Skills Workshop</li>
            <li>Contribute to “The Conversation,” the Better Angels blog</li>
            <li>Get access to member-only meetings, calls, and materials with “red” and “blue” activists from across the country</li>
            <li><em>Feel great about helping remedy one of our nation’s greatest challenges: increasing partisanship and polarization!</em></li>
          </ul>
          <br/>
        </div>

          <div class="join-selection-column" style="background: white;">
            <h3>Choose your level of support</h3>
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
            <span class="join-selection-subscribe-text"><a href="#donate">I just want to donate</a></span>
          </div>
        </div>

      <br/>

    </section>


    <section class="donate" id="donate" style="overflow:auto;padding-top: 75px;">
      <div style="width: 100%; display: block;">
        <div style="width: 50%; color: white; padding-right: 16px; display: inline-block;float: left;">
          <h2 style="color: white;">Donate</h2>
          <p>
            Your contribution will be used to fund programming in all fifty states, innovative online workshops, and outreach online and on social media -- where our discourse is often at its most dehumanizing and upsetting! All of this matters for our organization and for the health of our country.
            <br/>
            Better Angels is a 501(c)3 non-profit, and all donations are tax deductible. Thank you for your support!
          </p>
        </div>
        <div style="width: 40%;margin-bottom: 1rem; display: inline-block;float: left;padding: 1rem; border: 1px solid lightgray; background: white;">
          <?php echo do_shortcode('[gravityform id=29 title=false description=false ajax=true tabindex=49]'); ?>
        </div>
      </div>
      <br/>      
    </section>
  </div>

  <style>
    .ba-button-list input {
      display: none !important;
    }
    .ba-button-list li {
      display: inline-block !important;
      width: auto !important;
      min-width: 150px !important;
    }
    .ba-button-list li label {
      color: white !important;
      background: #23356c !important;
      border-radius: 0 !important;
      border: none !important;
      width: 100% !important;
      padding: 10px 40px !important;
      font-weight: normal !important;
    }
    .ba-button-list input[type="radio"]:checked + label{
      color: white !important;
      background: #ab2634 !important;
    }
    .ast-container {
      margin: 0;
      padding: 0;
      width: 100%;
      max-width: 100%;
    }
    .header {
      width: 100%;
      max-width: 100%;
    }
    .header-inner {
      overflow: auto;
      padding: 2rem;
      background-color: rgba(255,255,255, .7);
    }
    #donate {
      background: #23356C;
      padding-left: 2rem;
    }
    #join {
      background: #bc2f2c;
      padding-left: 2rem;
    }

  </style>


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
