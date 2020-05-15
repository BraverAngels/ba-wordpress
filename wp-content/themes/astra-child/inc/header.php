<?php
namespace BraverAngels\Header;

// Get the url of the Custom Logo set in the theme customizer
function logo_url() {
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
  return $image[0];
}

// Get the url of the alternate mobile logo set in the theme customizer
// If no alternate logo is set return the normal custom logo
function mobile_logo_url() {
  if (astra_get_option( 'different-mobile-logo' ) && astra_get_option( 'mobile-header-logo' )) {
    return astra_get_option( 'mobile-header-logo' );
  } else {
    return ba_logo_url();
  }
}

// Get and transform main menu data
// return menu data array
function get_menu_array($menu_name) {
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
function get_menu_html($menu_array) {
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

// Print out main menu html
function the_primary_menu() {
  echo get_menu_html(get_menu_array('Primary'));
}
