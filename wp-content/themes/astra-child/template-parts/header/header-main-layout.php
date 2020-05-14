<?php
/**
 * Braver Angels Primary Header
 */
?>


<?php

// Get the url of the Custom Logo set in the theme customizer
function ba_logo_url() {
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
  return $image[0];
}

// Get the url of the alternate mobile logo set in the theme customizer
// If no alternate logo is set return the normal custom logo
function ba_mobile_logo_url() {
  if (astra_get_option( 'different-mobile-logo' ) && astra_get_option( 'mobile-header-logo' )) {
    return astra_get_option( 'mobile-header-logo' );
  } else {
    return ba_logo_url();
  }
}

// Get and transform main menu data
// return menu data array
function ba_get_menu_array($menu_name) {
  $array_menu = wp_get_nav_menu_items($menu_name);
  $menu = array();
  foreach ($array_menu as $m) {
    if (empty($m->menu_item_parent)) {
      $menu[$m->ID] = array();
      $menu[$m->ID]['ID'] = $m->ID;
      $menu[$m->ID]['title'] = $m->title;
      $menu[$m->ID]['url'] = $m->url;
      $menu[$m->ID]['classname'] = 'ba-menu_item';
      $menu[$m->ID]['children'] = array();
    }
  }
  $submenu = array();
  foreach ($array_menu as $m) {
    if ($m->menu_item_parent) {
      $submenu[$m->ID] = array();
      $submenu[$m->ID]['ID'] = $m->ID;
      $submenu[$m->ID]['title'] = $m->title;
      $submenu[$m->ID]['url'] = $m->url;
      $submenu[$m->ID]['classname'] = 'ba-sub-menu_item';
      $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
    }
  }
  return $menu;
}

// Returns the main menu markup
function ba_get_menu_html($menu_array) {
  $html = "<ul class='ba-menu_container'>";

  foreach ($menu_array as $menu_item) {
    $has_children = !empty($menu_item['children']);
    $html .= "<li class='{$menu_item['classname']}' id='{$menu_item['ID']}'>";

    if($has_children) {
      $html .= "<a aria-haspopup='true' href='{$menu_item['url']}'>{$menu_item['title']}<i class='ba-icon ba-icon-chevron-down' aria-hidden='true'></i>
</a>";
      $html .= "<ul class='ba-sub-menu_container' aria-label='submenu'>";
      foreach ($menu_item['children'] as $sub_menu_item) {
        $html .= "<li class='{$sub_menu_item['classname']}' id='{$sub_menu_item['ID']}'>";
        $html .= "<a href='{$sub_menu_item['url']}'>{$sub_menu_item['title']}</a>";
        $html .= "</li>";
      }
      $html .= "</ul>";
    } else {
      $html .= "<a href='{$menu_item['url']}'>{$menu_item['title']}</a>";
    }
    $html .= "</li>";
  }
  $html .= "</ul>";
  return $html;
}
?>

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

<nav role="navigation" class="ba-primary-menu ba-primary-menu--desktop">
  <a class="ba-menu_item ba-menu-logo" href="<?php echo esc_url(home_url('/')) ?>">
    <img src="<?php echo ba_logo_url(); ?>" alt="Braver Angels Logo"/>
  </a>
  <?php echo ba_get_menu_html(ba_get_menu_array('Primary')); ?>
  <div class="ba-cta-button_wrap">
    <a class="ba-cta-button ba-cta-button--warning" href="<?php echo home_url("/support-us?utm_source=website&utm_medium=join&utm_campaign=upper_right"); ?>">
      Support Us
    </a>
  </div>
</nav>

<nav role="navigation" class="ba-primary-menu ba-primary-menu--mobile">
  <div class="ba-mobile-logo_container">
    <a class="ba-menu_item ba-menu-logo" href="<?php echo esc_url(home_url('/')) ?>">
      <img src="<?php echo ba_mobile_logo_url(); ?>" alt="Braver Angels Logo"/>
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

  <?php echo ba_get_menu_html(ba_get_menu_array('Primary')); ?>
</div>

<div class="ba-scroll-to-top">
  <a href="#">&#8593;</a>
</div>
