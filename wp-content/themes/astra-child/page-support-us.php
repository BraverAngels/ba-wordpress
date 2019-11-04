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
      <h2>Support Us</h2>
      <h3>
        <?php if (!is_user_logged_in()): ?>
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

  <?php if (!is_user_logged_in()): ?>
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

        <div class="join-selection-column">
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
                <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-2020/">$20.20</a></li>
                <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-50/">$50</a></li>
                <li><a data-autoselect class="join-selection-amount selected" href="<?php echo home_url(); ?>/join/yearly-100/">$100</a></li>
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
                <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/monthly-10/">$10</a></li>
                <li><a data-autoselect class="join-selection-amount selected" href="<?php echo home_url(); ?>/join/monthly-2020/">$20.20</a></li>
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

          <?php if (!is_user_logged_in()): ?>
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

            <?php if (get_user_subscription_id()) : ?>
              <p>Current subscription: <strong><?php echo get_the_title(get_user_subscription_id()); ?></strong><br/><a href="<?php echo home_url('account/?action=subscriptions') ?>">View Account Settings</a></p>
            <?php else :
              //the user has an account but does not have an active subscription
            ?>
              <p>
                <strong>You do not have an active membership.
                You must be a current dues-paying member to access the Members Portal. <a href="<?php echo home_url('account/?action=subscriptions') ?>">View Account Settings</a></strong><br/>
                Please choose from the renewal options below.
              </p>
            <?php endif; ?>

            <?php $options = get_higher_membership_options();
            if (sizeof($options) > 0) {
              echo '<span style="color:#6c6c6c;">Select amount</span>';
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
