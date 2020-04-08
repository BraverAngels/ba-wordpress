<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.24' );

add_action('wp_enqueue_scripts', 'use_jquery_from_google');

function use_jquery_from_google () {
  if (is_admin() || is_user_logged_in()) {
    return;
  }

  global $wp_scripts;
  if (isset($wp_scripts->registered['jquery']->ver)) {
    $ver = $wp_scripts->registered['jquery']->ver;
                $ver = str_replace("-wp", "", $ver);
  } else {
    $ver = '1.12.4';
  }

  wp_deregister_script('jquery');
  wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/$ver/jquery.min.js", false, $ver);
}

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

  //Disable the gutenburg styles since we aren't using it
  if (!is_admin()) {
    wp_deregister_style('wp-block-library');
  }

  wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );
  wp_enqueue_script( 'mobile-header-js', get_stylesheet_directory_uri() . '/scripts/header.js', ['jquery'], '1.0.2', true );

  if (is_page('join') || is_page('support-us')) {
    wp_enqueue_script( 'join-js', get_stylesheet_directory_uri() . '/scripts/join.js', [], '1.0.0', true );
  }

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

/**
 * Redirect single Organizer pages to main events list
 */
add_action( 'template_redirect', 'redirect_organizer_and_venue_type_single' );
  function redirect_organizer_and_venue_type_single() {
      if ( ! is_singular( 'tribe_organizer' ) && ! is_singular( 'tribe_venue' ) )
          return;
      if ( tribe_get_events_link() ) {
        wp_redirect( tribe_get_events_link(), 301 );
        exit;
      } else {
        wp_redirect( home_url(), 301 );
        exit;
      }

  }

  function ba_login_page_styles() {
  ?>
    <style type="text/css">
      body.login div#login h1 a {
        background-image: url(https://43n9a3188zqw4cdz825bl1q4-wpengine.netdna-ssl.com/wp-content/uploads/2020/04/Braver-Angels-Logo.png);
        padding-bottom: 0;
        width: 100%;
        background-size: 250px;
        background-position: bottom;
      }
      body.login #login_error, .login .message, .login .success {
        border-left: 4px solid #c80000 !important;
      }
      body.login input#wp-submit {
        background: #2850a0;
        border-color: #2850a0;
        box-shadow: 0 1px 0 #2850a0;
        color: #fff;
        text-decoration: none;
        text-shadow: none;
      }
      body.login input#wp-submit:focus, body.login input#wp-submit:hover {
        background: #2b4997;
        border-color: #2b4997;
      }
    </style>
 <?php
} add_action( 'login_enqueue_scripts', 'ba_login_page_styles' );


function inline_scripts() {
  if( !current_user_can('editor') && !current_user_can('administrator') ) { ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-93943838-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-93943838-2');
    </script>

    <?php
  }
}
add_action( 'wp_enqueue_scripts', 'inline_scripts', 1, 1 );


//Set Default Gravatar

add_filter( 'avatar_defaults', 'ba_new_gravatar' );

function ba_new_gravatar ($avatar_defaults) {
  $myavatar = 'https://www.better-angels.org/wp-content/uploads/2018/08/BA_Logo-1-150x150.png';
  $avatar_defaults[$myavatar] = "Default Gravatar";
  return $avatar_defaults;
}


add_action( 'template_redirect', 'redirect_to_login_page' );

function redirect_to_login_page() {
  global $post;

  $is_member_portal = is_page('members-portal');
  $is_member_portal_child_page = is_page() && $post->post_parent == 1303 && !is_page('welcome');

  // make sure that user has an actual membership here!!!

  if ($is_member_portal || $is_member_portal_child_page) {
    if (!is_user_logged_in()) {
      wp_redirect( home_url() . '/login?redirect_to=' . home_url() . $_SERVER['REQUEST_URI'], 301 );
      exit;
    } elseif (!get_user_subscription_id() && !current_user_can('edit_others_pages')) {
      wp_redirect( home_url() . '/support-us#upgrade');
      exit;
    }
  }
}



/**
 * This function modifies the main WordPress query to include an array of
 * post types instead of the default 'post' post type.
 *
 * @param object $query  The original query.
 * @return object $query The amended query.
 */

function ba_search_set_post_types( $query ) {
  if ( $query->is_search ) {
    $query->set( 'post_type', array( 'post', 'page', 'library', 'tribe_events') );
  }

  return $query;
}

add_filter( 'pre_get_posts', 'ba_search_set_post_types' );




/**
 * This function modifies the main WordPress query to
 * display items in menu order
 */

function ba_change_library_loop_order( $query ) {
  if ( is_admin() || !$query->is_main_query() ) return;

  if ( is_tax('library_category') ) {
    $query->query_vars['orderby'] = 'menu_order';
    $query->query_vars['order'] = 'ASC';
    return;
  }
}

add_action( 'pre_get_posts', 'ba_change_library_loop_order' );


function author_shortcode() {
  echo '<ul class="author-list" style="list-style:none;margin:0 0.5rem;">';
  wp_list_authors('include=24,2832,6638,2001,7054,7302,8439,1303,21,7261');
  echo '</ul>';
}

add_shortcode('authors_list', 'author_shortcode');
