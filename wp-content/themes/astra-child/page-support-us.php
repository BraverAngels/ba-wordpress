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

$membership_ids = '3706, 3612, 3613, 3614, 3616, 3618, 3620, 3621, 3622, 3623, 3624, 3625, 3626, 3627, 3628, 3629, 3630, 3631, 3632';

get_header(); ?>

  <section class="header" style="overflow: auto; background-size: cover; background-image: url(https://www.better-angels.org/wp-content/uploads/2019/09/2019-BA-Convention-631.jpg);">
    <div class="header-inner">
      <h2 style="font-family: 'Nunito Sans', 'Karla'; margin-bottom: .5rem;font-family: 'Nunito Sans', 'Karla'; margin-bottom: .5rem;font-weight:bold;">Support Us</h2>
      <h3 style="color: #212121; margin-bottom: 2rem; font-weight: 400; font-family: 'Nunito Sans', 'Karla'; ">

        <?php if (!current_user_can('mepr-active','memberships: ' . $membership_ids)): ?>
          <em>
            Help us build a house united by <a href="#join"><strong>joining Better Angels</strong></a>,
            <a href="#upgrade"><strong>upgrading/renewing</strong></a> your membership,
            or <a href="#donate"><strong>donating</strong></a> to <strong>Better Angels 2020</strong>.
          </em>

        <?php else : ?>
          <em>
            Help us build a house united by <a href="#upgrade"><strong>upgrading/renewing</strong></a> your membership
            or <a href="#donate"><strong>donating</strong></a> to <strong>Better Angels 2020</strong>.
          </em>
        <?php endif; ?>

      </h3>
    </div>
  </section>
  <div class="entry-content entry-content-support-us clear" itemprop="text">

  <?php if (!current_user_can('mepr-active','memberships: ' . $membership_ids)): ?>
    <section id="join">
      <div class="join-inner">
        <div class="join-content">
          <h2>Become a Member</h2>
          <p><em>Better Angels membership requires dues of just $12 a year, but many of our members generously choose to give more. Members can:</em></p>
          <ul>
            <li>Join or create a Better Angels Alliance (chapter) in your community.</li>
            <li>Get trained to lead Better Angels workshops and/or debates.</li>
            <li>With other members, organize local events to bridge political differences.</li>
            <li>Take the online, interactive “Skills Workshop.”</li>
            <li>Contribute to “The Conversation,” the Better Angels blog.</li>
            <li>Participate in member-only meetings with “red” and “blue” members from across the U.S.</li>
            <li>Become a local or national Better Angels volunteer leader.</li>
            <li><em>Be a part of America’s largest organization for bridging the divide.</em></li>
          </ul>
        </div>

        <div class="join-selection-column" style="background: white;">
          <h3>Choose your level of support</h3>
          <div class="join-selection-type">
            <button class="join-selection-type-item selected" data-toggle="monthly-options">Monthly</button>
            <button class="join-selection-type-item" data-toggle="yearly-options">Yearly</button>
          </div>
            <div class="join-selection-options-wrap">
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

    </section>
  <?php endif; ?>

    <section class="upgrade" id="upgrade">
      <div class="upgrade-inner">
        <div class="upgrade-content">
          <h2>Upgrade/Renew Your Membership</h2>
          <p>Better Angels is a grassroots movement,
            and we can’t rely on rich donors. We’re counting on our members to upgrade or renew their membership
            so that we can bring our country together in 2020.
            Your dues will help fund workshops, debates, local Alliances, high school & college programs,
            our upcoming 2020 bus tour, and of course, the 2020 National Convention in Charlotte, NC!
          </p>
        </div>
        <div class="upgrade-selection-column">

          <?php if (!current_user_can('mepr-active','memberships: ' . $membership_ids)): ?>
            <h3>Login to upgrade/renew</h3>
            <?php wp_login_form(array(
              'redirect' => home_url('support-us#upgrade')
            )); ?>
            <p>
              <a href="<?php echo home_url('login/?action=forgot_password'); ?>">Recover lost password</a>
            </p>
            <p>
              <a href="#donate">I just want to donate</a>
            </p>

          <?php else : ?>

            <p>Current subscription: <strong><?php echo get_the_title(get_user_subscription_id()); ?></strong></p>

            <?php $options = get_higher_membership_options();
            if (sizeof($options) > 0) {
              echo '<span style="color:#6c6c6c;">Select upgraded amount</span>';
              echo '<ul class="membership-upgrade-options">';
              foreach ($options as $option) {
                echo '<li><a class="membership-upgrade-option-link" href="'. get_the_permalink($option) .'">'. get_the_title($option) .'</a></li>';
              }
              echo '</ul>';
              echo '<p>';
                echo '<a href="#donate">I just want to donate</a>';
              echo '</p>';
            } else {
              echo "<span><strong>You're maxed out.</strong><br/>You are already subscribed to our highest membership level. Consider <a href='#donate'><strong>making an additional one-time gift.</strong></a></span>";
            }
            ?>

          <?php endif; ?>
        </div>
      </div>
    </section>

    <section class="donate" id="donate">
      <div class="donate-inner">
        <div class="donate-content">
          <h2 style="color: white;">Donate</h2>
          <p>
            2020 is shaping up to be one of the most divisive years in American history.
            Help us build a house united and save our Republic in this time of crisis.
            Better Angels is a 501(c)(3) non-profit, and all donations are tax deductible.
            Your donation will fund:
          </p>
          <ul>
            <li>Our National Bus Tour in 2020 (<a href="<?php home_url('bus'); ?>")>Learn more</a>)</li>
            <li>Red-Blue Workshops</li>
            <li>Skills Workshops</li>
            <li>Better Angels Debates</li>
            <li>Alliances (local chapters)</li>
            <li>The 2020 National Better Angels Convention</li>
            <li>Our 50-State Volunteer Network</li>
            <li>The Better Angels State of the Union</li>
            <li>High School & College Programs</li>
            <li>Online Programs</li>
            <li>Media Outreach</li>
          </ul>
        </div>
        <div class="donate-selection-column">
          <?php echo do_shortcode('[gravityform id=29 title=false description=false ajax=true tabindex=49]'); ?>
        </div>
      </div>
    </section>
  </div>

  <style>
    /* Move this to other css file, yo */
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
      padding: 2rem .5rem 0 .5rem;
      background-color: rgba(255,255,255, .7);
    }

    .header-inner h1,
    .header-inner h2,
    .header-inner h3,
    .header-inner p {
      max-width: 1100px;
      margin-left: auto;
      margin-right: auto;
    }

    /* */
    .entry-content-support-us section {

    }

    /*-------- Donate section --------*/

    #donate {
      background: #bc2f2c;
      overflow: auto;
      width: 100%;
      padding: 1rem .5rem;
    }

    @media screen and (min-width: 961px) {
      #donate {
        padding-top: 112px;
        padding-bottom: 112px;
      }
    }

    #donate, .donate-inner {
      overflow: auto;
      display: block;
    }

    #donate .donate-inner {
      max-width: 1100px;
      margin-left: auto;
      margin-right: auto;
    }

    #donate .donate-selection-column {
      padding: 1rem;
      border: 1px solid lightgray;
      background: white;
      display: block;
      width: 100%;
      max-width: 700px;
      margin-top: 1rem;
    }

    #donate #gform_submit_button_29 {
      background: #23356c;
    }
    #donate #gform_submit_button_29:hover,
    #donate #gform_submit_button_29:focus {
      background: #ab2634;
    }

    #donate .donate-content,
    #donate .donate-content h2 {
      overflow: auto;
      color: white;
      display: block;
    }
    #donate .donate-content a {
      color: white;
      text-decoration: underline;
    }
    #donate .donate-content a:hover,
    #donate .donate-content a:focus {
      color: lightgray;
      text-decoration: underline;
    }

    @media screen and (min-width: 1000px) {
      #donate .donate-content,
      #donate .donate-selection-column {
        display: inline-block;
        width: 50%;
        float: left;
      }
      #donate .donate-content {
        padding-right: 1rem;
      }
    }

    /*-------- Join column ----------*/

    #join {
      background: #bc2f2c;
      padding: 1rem .5rem;
    }

    @media screen and (min-width: 961px) {
      #join {
        padding-top: 112px;
        padding-bottom: 112px;
      }
    }

    #join .join-inner {
      overflow: auto;
      display: block;
      max-width: 1100px;
      margin-left: auto;
      margin-right: auto;
    }

    #join .join-content,
    #join .join-content h2 {
      overflow: auto;
      color: white;
      display: block;
    }

    #join .join-selection-column {
      display: block;
      width: 100%;
      max-width: 700px;
    }

    @media screen and (min-width: 1000px) {
      #join .join-content,
      #join .join-selection-column {
        display: inline-block;
        width: 50%;
        float: left;
      }
      #join .join-content {
        padding-right: 1rem;
      }
    }

    /*-------- Upgrade column ----------*/

    #upgrade {
      background: #23356C;
      padding: 1rem .5rem;
    }

    @media screen and (min-width: 961px) {
      #upgrade {
        padding-top: 112px;
        padding-bottom: 112px;
      }
    }

    #upgrade .upgrade-inner {
      overflow: auto;
      display: block;
      max-width: 1100px;
      margin-left: auto;
      margin-right: auto;
    }

    #upgrade .upgrade-content,
    #upgrade .upgrade-content h2 {
      overflow: auto;
      color: white;
      display: block;
    }

    #upgrade .upgrade-selection-column {
      display: block;
      width: 100%;
      max-width: 700px;
      background: white;
      padding: 2rem 1rem;
      margin-top: 1rem;
    }

    #upgrade .upgrade-selection-column label {
      display: block;
    }
    #upgrade .upgrade-selection-column p {
      margin-bottom: .5rem;
    }
    #upgrade .upgrade-selection-column input[type="text"],
    #upgrade .upgrade-selection-column input[type="password"] {
      padding: 5px 10px;
    }
    #upgrade .upgrade-selection-column input[type="text"],
    #upgrade .upgrade-selection-column input[type="password"],
    #upgrade .upgrade-selection-column input[type="submit"] {
      display: block;
      width: 100%;
    }

    #upgrade .upgrade-selection-column .membership-upgrade-options {
    list-style: none;
    margin-left: 0;
    }

    #upgrade .upgrade-selection-column .membership-upgrade-options li {
      display: inline-block;
      width: 50%;
      padding: .125rem;
    }

    #upgrade .upgrade-selection-column .membership-upgrade-options li a {
      display: block;
      width: 100%;
      text-align: center;
      background: #23356c;
      color: white;
      padding: .5rem;
    }

    #upgrade .upgrade-selection-column .membership-upgrade-options li a:hover,
    #upgrade .upgrade-selection-column .membership-upgrade-options li a:focus {
      background: #ab2634 !important;
      color: white;
    }

    @media screen and (min-width: 1000px) {
      #upgrade .upgrade-selection-column .membership-upgrade-options li {
        width: 33.333%;
      }
    }

    @media screen and (min-width: 1000px) {
      #upgrade .upgrade-content,
      #upgrade .upgrade-selection-column {
        display: inline-block;
        width: 50%;
        float: left;
      }
      #upgrade .upgrade-content {
        padding-right: 1rem;
      }
    }

    /* ------------------ */



    #donate input[type="text"], #donate select{
      padding: 5px 10px;
      width: 100%;
      outline-style: none;
      font-size: inherit;
      font-family: inherit;
      letter-spacing: normal;
      border: 1px solid rgba(0,0,0,.2);
      display: inline;
      box-sizing: border-box;
      box-shadow: none;
      border-radius: 2px;
    }


    #donate select{
        padding: 5px 4px;
        height: 41px;
    }

    @media screen and (min-width: 769px) {
        #donate select{
            height: 44px;
        }
    }

    #donate .gfield {
      padding: 0;
    }

    #donate input:focus,
    #donate input[type="text"]:focus,
    #donate input[type="email"]:focus,
    #donate textarea:focus,
    #donate select:focus {
      border-color: #0044cc;
    }

    #donate .ba-button-list li label {
        font-size: 1rem;
        margin: 0;
    }

    #donate input[type="submit"] {
        border-radius: 5px;
        background: #27b758;
        -webkit-transition: all 0.2s ease;
        -o-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }

    #donate #gform_submit_button_29 {
      width: 100%;
      border-radius: 2px;
    }

    #donate input[type="submit"]:hover, #donate input[type="submit"]:focus  {
        background: #23356c;
    }

    #donate .ba-button-list {
      width: 102.5%;
    }

    #donate .ba-button-list li {
        display: inline-block;
        min-width: 50% !important;
        width: auto;
        margin: 0;
        padding-right: 5px !important;
    }


    @media screen and (min-width: 500px) {
        #donate .ba-button-list {
          width: 100%;
        }
        #donate .ba-button-list li {
            min-width: 33% !important;
            width: auto;
            padding-right: 0 !important;
        }
    }



     /*Hide the checkbox */
    #donate .ba-button-list li input {
        display: none;
    }


     /*the unselected button*/
    #donate .ba-button-list li label {
        background: white;
        color: white;
        font-weight: bold;
        padding: .5rem 1.5rem;
        border: 2px solid lightgray;
        color: #23356c;
        text-align: center;
        -webkit-transition: all 0.2s ease;
        -o-transition: all 0.2s ease;
        transition: all 0.2s ease;
        border-radius: 5px;
        max-width: 100%;
        width: 100%;
        margin-left: 0;
    }

    @media screen and (min-width: 500px) {
     #donate .ba-button-list li label {
         max-width: 95%;
     }
    }

     /*the selected button*/
    #donate .ba-button-list li input:checked + label {
        background: #23356c;
        color: white;
        border: 2px solid #23356c;
        -webkit-transition: all 0.2s ease;
        -o-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }


    #donate select{
        -moz-appearance:none; /* Firefox */
        -webkit-appearance:none;  /* Safari and Chrome */
        appearance:none;
        position: relative;
         background: url(https://www.better-angels.org/wp-content/uploads/2019/06/icon-chevron-down.png) no-repeat;
         background-size: 14px;
         background-position: right 8px center;
    }

    #donate .gfield_description {
        padding: 0;
        margin-top: 0;
    }

    @media screen and (max-width: 344px) {
        #input_29_50 .clear-multi, #input_29_50 ginput_container, #input_29_50 select{
            display: block !important;
            width: 100%;
        }
    }

    @media screen and (min-width: 345px) {
        #input_29_50 select {
            min-width: 90px
        }
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
