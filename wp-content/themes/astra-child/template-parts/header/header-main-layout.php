<?php
/**
 * Braver Angels Primary Header
 */

use BraverAngels\Header;
?>


<!-- Top "Secondary" navigation bar -->
<nav role="navigation" class="ba-secondary-menu">
  <div class="ba-secondary-menu_links">
    <?php if( is_user_logged_in() ): ?>
      <a href="<?php echo esc_url(home_url('/members-portal')) ?>">Members Portal</a>
      <a href="<?php echo esc_url(home_url('/account?action=subscriptions')) ?>">My Account</a>
      <a href="<?php echo wp_logout_url(); ?>">Logout</a>
      <span style="color:white">&nbsp;|&nbsp;</span>
    <?php else: ?>
      <a href="<?php echo esc_url(home_url('/login')) ?>">Member Login</a>
    <?php endif; ?>
    <!-- <a href="https://teespring.com/stores/better-angels-merchandise">
      Shop
    </a> -->
    <a href="<?php echo esc_url(home_url('/events')) ?>">
      Find an Event
    </a>
  </div>
  <div class="ba-secondary-menu_social-buttons">
    <a class="ba-social-icon" href="https://facebook.com/braverangels" target="_blank">
      <span class="ba-screen-reader-only">Facebook</span>
      <i class="ba-icon ba-icon-facebook"></i>
    </a>
    <a class="ba-social-icon" href="https://twitter.com/braverangels" target="_blank">
      <span class="ba-screen-reader-only">Twitter</span>
      <i class="ba-icon ba-icon-twitter"></i>
    </a>
    <a class="ba-social-icon" href="https://instagram.com/braverangels"  target="_blank">
    <span class="ba-screen-reader-only">Instagram</span>
      <i class="ba-icon ba-icon-instagram"></i>
    </a>
    <a class="ba-social-icon" href="https://www.youtube.com/channel/UCtlZ4t6aS4rAJoPyYD9DGLA" target="_blank">
      <span class="ba-screen-reader-only">Youtube</span>
      <i class="ba-icon ba-icon-youtube"></i>
    </a>
  </div>
</nav>

<!-- Desktop main nav menu -->
<nav role="navigation" class="ba-primary-menu ba-primary-menu--desktop">
  <a class="ba-menu_item ba-menu-logo" href="<?php echo esc_url(home_url('/')) ?>">
    <img src="<?php echo Header\logo_url(); ?>" alt="Braver Angels Logo"/>
  </a>

  <?php Header\the_primary_menu(); ?>

  <div class="ba-cta-button_wrap">
    <a class="ba-cta-button ba-cta-button--warning" href="<?php echo home_url("/support-us?utm_source=website&utm_medium=join&utm_campaign=upper_right"); ?>">
      Support Us
    </a>
  </div>
</nav>

<!-- Mobile main nav menu -->
<nav role="navigation" class="ba-primary-menu ba-primary-menu--mobile">
  <div class="ba-mobile-logo_container">
    <a class="ba-menu_item ba-menu-logo" href="<?php echo esc_url(home_url('/')) ?>">
      <img src="<?php echo Header\mobile_logo_url(); ?>" alt="Braver Angels Logo"/>
    </a>
  </div>
  <div class="ba-cta-button_wrap">
    <a class="ba-cta-button ba-cta-button--warning" href="<?php echo home_url("/support-us?utm_source=website&utm_medium=join&utm_campaign=upper_right"); ?>">
      Support Us
    </a>
  </div>
  <div class="ba-mobile-toggle_wrap">
    <div class="ba-mobile-toggle ba-mobile-toggle_open"></div>
    <div class="ba-mobile-toggle ba-mobile-toggle_close">&times;</div>
  </div>
</nav>
<div class="ba-mobile-menu_links">
  <ul class="ba-mobile-menu_links--static">
    <?php if( is_user_logged_in() ): ?>
      <li>
        <a href="<?php echo esc_url(home_url('/members-portal')) ?>">Members Portal</a>
      </li>
      <li>
        <a href="<?php echo esc_url(home_url('/account?action=subscriptions')) ?>">My Account</a>
      </li>
      <li>
        <a href="<?php echo wp_logout_url(); ?>">Logout</a>
      </li>
    <?php else: ?>
      <li>
        <a href="<?php echo esc_url(home_url('/login')) ?>">Member Login</a>
      </li>
    <?php endif; ?>

    <!-- <li>
      <a href="https://teespring.com/stores/better-angels-merchandise">
        Shop
      </a>
    </li> -->
    <li>
      <a href="<?php echo esc_url(home_url('/events')) ?>">
        Find an Event
      </a>
    </li>
  </ul>

  <?php Header\the_primary_menu(); ?>
  
</div>

<div class="ba-scroll-to-top">
  <a href="#">&#8593;</a>
</div>
