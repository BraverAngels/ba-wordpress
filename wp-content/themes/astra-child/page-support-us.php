<?php
/**
 * This is the template that displays the "Support us" page
 * note that all content is hard-coded.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */


get_header(); ?>

  <section class="header support-us_header">
    <div class="header-inner support-us_header_inner">
      <?php if (isset($_GET['referrer']) && $_GET['referrer'] = "subscribe"): ?>
        <h2>Thank you for subscribing!</h2>
      <?php else : ?>
        <h2>Support Us</h2>
      <?php endif; ?>
      <h3>
        <?php if (isset($_GET['referrer']) && $_GET['referrer'] = "subscribe"): ?>
          <strong>Want to take the next step?</strong>
        <?php endif; ?>
        <?php if (!is_user_logged_in()): ?>
          <em>
            Help us build a house united by <a href="#join"><strong>joining Braver Angels</strong></a>, or by
            <a href="#upgrade"><strong>renewing or upgrading</strong></a> your membership,
            or <a href="#donate"><strong>making a one-time donation</strong></a>.  Not ready to join? <a href="#gform_wrapper_33"><strong>Subscribe to our newsletter.</strong></a>
          </em>

        <?php else : ?>
          <em>
            Help us build a house united by <a href="#upgrade"><strong>renewing or upgrading</strong></a> your membership
            or <a href="#donate"><strong>making a one-time donation</strong></a>.
          </em>
        <?php endif; ?>
      </h3>
    </div>
  </section>

  <div class="entry-content entry-content-support-us clear" itemprop="text">

  <?php if (!is_user_logged_in()): ?>
    <section id="join">
      <div class="join-inner">
        <div class="join-content">
          <h2>Become a Member</h2>
          <p><em>Braver Angels membership requires dues of just $12 a year, but many of our members generously choose to give more. Members can:</em></p>
          <ul>
            <li>Join or create a Braver Angels Alliance (chapter) in your community.</li>
            <li>Get trained to lead Braver Angels workshops and/or debates.</li>
            <li>With other members, organize local events to bridge political differences.</li>
            <li>Take the online, interactive “Skills Workshop.”</li>
            <li>Contribute to the Braver Angels blog.</li>
            <li>Participate in member-only meetings with “red” and “blue” members from across the U.S.</li>
            <li>Become a local or national Braver Angels volunteer leader.</li>
            <li><em>Be a part of America’s largest organization for bridging the divide.</em></li>
          </ul>
        </div>

        <div class="join-selection-column">
          <h3>Choose your level of support</h3>
          <div class="join-selection-type">
            <button class="join-selection-type_item selected" data-toggle="monthly-options">Monthly</button>
            <button class="join-selection-type_item" data-toggle="yearly-options">Yearly</button>
          </div>
          <div class="join-selection-options-wrap">
            <div id="yearly-options" class="join-selection-options">
              <span class="join-description">Select yearly contribution amount</span>
              <ul>
                <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-12/">$12</a></li>
                <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-25/">$25</a></li>
                <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-50/">$50</a></li>
                <li><a data-autoselect class="join-selection-amount selected" href="<?php echo home_url(); ?>/join/yearly-100/">$100</a></li>
                <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-500/">$500</a></li>
                <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-1000/">$1000</a></li>
                <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-5000/">$5000</a></li>
                <li><a class="join-selection-amount" href="https://braverangels.org/custom-membership/" target="_blank">Other</a></li>
              </ul>
            </div>

            <div id="monthly-options" class="join-selection-options active">
              <span class="join-description">Select monthly contribution amount</span>
              <ul>
                <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/monthly-5/">$5</a></li>
                <li><a data-autoselect class="join-selection-amount selected" href="<?php echo home_url(); ?>/join/monthly-20/">$20</a></li>
                <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/monthly-50/">$50</a></li>
                <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/monthly-100/">$100</a></li>
                <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/monthly-250/">$250</a></li>
                <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/monthly-500/">$500</a></li>
                <li><a class="join-selection-amount" href="https://braverangels.org/custom-membership/" target="_blank">Other</a></li>
              </ul>
            </div>
          </div>

          <form id="join-submit-form" action="<?php echo home_url(); ?>/join/monthly-25/">
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
          <h2>Renew or Upgrade Your Membership</h2>
          <p>As a member-led organization, Braver Angels counts on membership support to deliver our
          programs and cultivate growth of the movement.</p>
          <p>We invite you to decide which membership level is right for you to help fund workshops,
          debates, local Alliances, and programs in our nation’s colleges and high schools. Some members
          give at the basic $12/year level, some give $500 or more per month -- every membership in every amount counts!</p>
          <p>Thank you for renewing or upgrading your membership today!</p>
          <p>Your membership contribution is fully tax-deductible. Please note all memberships renew
          automatically on the anniversary of the donation using the credit card on file.</p>
        </div>
        <div class="upgrade-selection-column">

          <?php if (!is_user_logged_in()): ?>
            <h3>Login to upgrade/renew</h3>
            <?php wp_login_form(array(
              'redirect' => home_url('support-us#upgrade')
            )); ?>
            <p>
              <a href="<?php echo home_url('login/?action=forgot_password'); ?>">Recover lost password/account</a>
            </p>
            <p>
              <a href="#donate">I just want to donate</a>
            </p>

          <?php else : ?>

            <?php if (get_user_subscription_id()) : ?>
              <p>Current subscription: <strong><?php echo get_the_title(get_user_subscription_id()); ?></strong></p>
            <?php else :
              //the user has an account but does not have an active subscription
            ?>
              <p>
                <strong>You do not have an active membership.
                You must be a current dues-paying member to access the Members Portal.</strong>
                <br/>
              </p>
              <p>
                Please choose from the renewal options below.
              </p>
            <?php endif; ?>

            <?php $options = get_higher_membership_options();
            if (sizeof($options) > 0) {
              echo '<span class="upgrade-selection-column_option">Select amount</span>';
              echo '<ul class="membership-upgrade-options">';
              foreach ($options as $option) {
                echo '<li><a class="membership-upgrade-option-link" href="'. get_the_permalink($option) .'">'. get_the_title($option) .'</a></li>';
              }
              echo '<li><a class="membership-upgrade-option-link" href="'. home_url() .'/account/?action=subscriptions">Other Recurring Amount</a></li>';
              echo '<li><a class="membership-upgrade-option-link" href="#donate">One Time Donation</a></li>';
              echo '</ul>';
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
          <h2>Donate</h2>

          <p>
            <em>* Will not create a membership</em><br/>
            Help us build a house united by making a one-time donation to Braver Angels.
            Your donation will support Braver Angels programming around the country including:
          </p>
          <ul>
            <li>Red-Blue Workshops</li>
            <li>Skills Workshops</li>
            <li>Braver Angels Debates</li>
            <li>Alliances (local chapters)</li>
            <li>Our 50-State Volunteer Network</li>
            <li>The Braver Angels State of the Union</li>
            <li>High School & College Programs</li>
            <li>Online Programs</li>
            <li>Media Outreach</li>
          </ul>
        </div>
        <div class="donate-selection-column">
          <?php echo do_shortcode('[gravityform id=39 title=false description=false ajax=true tabindex=49]'); ?>
          <p><strong><a href="<?php echo home_url('support-us/donate-by-check'); ?>">Donate via check</a></strong></p>
        </div>
      </div>
    </section>
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
