<?php
 /*
 Plugin Name: Better Angels Custom Post Types
 description: Custom Post Types for the Better Angels website
 Version: 1.0.0
 Author: Blake Lundquist
 Author URI: https://blakelundquist.dev
 License: GPL2
 */

 /** ////////////////////////////////////////////////////////
 **   CUSTOM POST TYPES AND TAXONOMIES
 ** ///////////////////////////////////////////////////////*/

function ba_custom_post_types() {

  // Book Reviews
  $labels = array(
    'name'               => _x( 'Library', 'post type general name', 'better-angels' ),
    'singular_name'      => _x( 'Library Item', 'post type singular name', 'better-angels' ),
    'menu_name'          => _x( 'Library', 'admin menu', 'better-angels' ),
    'name_admin_bar'     => _x( 'Book Review', 'add new on admin bar', 'better-angels' ),
    'add_new'            => _x( 'Add New', 'Item', 'better-angels' ),
    'add_new_item'       => __( 'Add New Item', 'better-angels' ),
    'new_item'           => __( 'New Item', 'better-angels' ),
    'edit_item'          => __( 'Edit Item', 'better-angels' ),
    'view_item'          => __( 'View Item', 'better-angels' ),
    'all_items'          => __( 'All Library Items', 'better-angels' ),
    'search_items'       => __( 'Search Library Items', 'better-angels' ),
    'parent_item_colon'  => __( 'Parent Library Items:', 'better-angels' ),
    'not_found'          => __( 'No Items found.', 'better-angels' ),
    'not_found_in_trash' => __( 'No Items found in Trash.', 'better-angels' )
  );

  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Library', 'better-angels' ),
    'public'             => true,
    'exclude_from_search'=> false,
    'show_in_admin_bar'  => true,
    'show_in_nav_menus'  => true,
    'publicly_queryable' => true,
    'query_var'          => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_icon'          => 'dashicons-book-alt',
    'menu_position'      => 4,
    'supports'           => array( 'title', 'editor', 'thumbnail', 'comments' ),
    'rewrite'            => array(
      'slug' => 'library',
      'with_front' => false,
    )
  );

  register_post_type( 'library', $args );

}

add_action( 'init', 'ba_custom_post_types' );


function ba_custom_taxonomies() {

 $labels = array(
   'name'              => _x( 'Item Labels', 'taxonomy general name', 'better-angels' ),
   'singular_name'     => _x( 'Item Label', 'taxonomy singular name', 'better-angels' ),
   'search_items'      => __( 'Search Labels', 'better-angels' ),
   'all_items'         => __( 'All Labels', 'better-angels' ),
   'parent_item'       => __( 'Parent Labels', 'better-angels' ),
   'parent_item_colon' => __( 'Parent labels:', 'better-angels' ),
   'edit_item'         => __( 'Edit Label', 'better-angels' ),
   'update_item'       => __( 'Update Label', 'better-angels' ),
   'add_new_item'      => __( 'Add New Label', 'better-angels' ),
   'new_item_name'     => __( 'New Label', 'better-angels' ),
   'menu_name'         => __( 'Labels', 'better-angels' ),
 );

 $args = array(
   'hierarchical'      => false,
   'labels'            => $labels,
   'show_ui'           => true,
   'show_admin_column' => true,
   'query_var'         => true,
   'rewrite'           => array(
     'slug' => 'library/labels',
     'with_front' => false,
   ),
 );

 register_taxonomy( 'library_label', array( 'library' ), $args );
 // Should rename to "Reading Rooms?"

 $labels = array(
   'name'              => _x( 'Reading Room', 'taxonomy general name', 'better-angels' ),
   'singular_name'     => _x( 'Item Reading Room', 'taxonomy singular name', 'better-angels' ),
   'search_items'      => __( 'Search Reading Rooms', 'better-angels' ),
   'all_items'         => __( 'All Reading Rooms', 'better-angels' ),
   'parent_item'       => __( 'Parent Reading Rooms', 'better-angels' ),
   'parent_item_colon' => __( 'Parent Reading Rooms:', 'better-angels' ),
   'edit_item'         => __( 'Edit Reading Room', 'better-angels' ),
   'update_item'       => __( 'Update Reading Room', 'better-angels' ),
   'add_new_item'      => __( 'Add New Reading Room', 'better-angels' ),
   'new_item_name'     => __( 'New Reading Room', 'better-angels' ),
   'menu_name'         => __( 'Reading Rooms', 'better-angels' ),
 );

 $args = array(
   'hierarchical'      => true,
   'labels'            => $labels,
   'show_ui'           => true,
   'show_admin_column' => true,
   'query_var'         => true,
   'rewrite'           => array(
     'slug' => 'library/reading-rooms',
     'with_front' => false, 
   ),
 );

 register_taxonomy( 'library_reading_room', array( 'library' ), $args );
}

add_action( 'init', 'ba_custom_taxonomies', 0 );


// Meta boxes for the Book Reviews post type
// Contains the minimum fields for geocoding
function ba_add_library_data_custom_box()
{
    // Build Array of supported CPTs for this box set
    $screens = ['library'];
    foreach ($screens as $screen) {
        add_meta_box(
          'library_data_meta_box_id', 				      // Unique ID
          'Additional Information',  	                // Box title
          'ba_add_library_data_custom_box_html',  	// Content callback, must be of type callable
          $screen,                   				        // Post type
          'side' 									                  // Location on the page
        );
    }
}
add_action('add_meta_boxes', 'ba_add_library_data_custom_box');
// Create the HTML that is displayed on the edit screen
function ba_add_library_data_custom_box_html($post)
{
    // Keys
    $keys = array(
      array('label' => 'Year Published', 'key' => 'ba_year_published', 'value' => get_post_meta($post->ID, '_ba_year_published', true)),
      array('label' => 'Author', 'key' => 'ba_author', 'value' => get_post_meta($post->ID, '_ba_author', true)),
      array('label' => 'Purchase URL', 'key' => 'ba_purchase_link', 'value' => get_post_meta($post->ID, '_ba_purchase_link', true)),
    );
    // Display code below
    foreach ($keys as $item) { ?>
      <div class="field-wrap">
        <label for="<?php echo $item['key']; ?>"><?php echo $item['label']; ?></label>
        <input style="width:100%;" type="text" name="<?php echo $item['key']; ?>" id="<?php echo $item['key']; ?>" value="<?php echo $item['value']; ?>" />
      </div>
    <?php }
}
/* Save post meta on the 'save_post' hook. */
add_action( 'save_post', 'ba_save_library_data_custom_box', 10, 2 );

/* Save the meta box post metadata. */
function ba_save_library_data_custom_box( $post_id, $post ) {
  // Keys
  $keys = ["ba_year_published", "ba_author", "ba_purchase_link",];
  // Loop through keys and update their meta
  foreach($keys as $key){
    if (array_key_exists($key, $_POST)) {
        update_post_meta(
            $post_id,
            '_'.$key,
            $_POST[$key]
        );
    }
  }
  // if (!empty($_POST['review_content'])) {
  //     $data=htmlspecialchars($_POST['review_content']); //make sanitization more strict !!
  //     update_post_meta($post_id, '_ba_review_content', $data );
  // }
}

// // Render the content editor
// function ba_render_review_editor( $post ) {
//     $text=get_post_meta($post->ID, '_ba_review_content' , true );
//     wp_editor( htmlspecialchars_decode($text), 'review_content', $settings = array('textarea_name'=>'review_content') );
// }
//
//
// // template tags
// function the_ba_library_review_content($id) {
//   if (get_post_meta($id, '_ba_review_content')) {
//     echo get_post_meta($id, '_ba_review_content', true);
//   }
// }

function the_ba_library_purchase_link($id) {
  if (get_post_meta($id, '_ba_purchase_link', true)) {
    echo "<a target='blank' rel='nofollow' href=" . get_post_meta($id, '_ba_purchase_link' , true ) . ">Purchase →</a>";
  }
}

function has_ba_library_author($id) {
  if (get_post_meta($id, '_ba_author', true)) {
    return true;
  }
  return false;
}

function the_ba_library_author($id) {
  if (get_post_meta($id, '_ba_author', true)) {
    echo get_post_meta($id, '_ba_author' , true );
  }
}

function has_ba_library_review_author($id) {
  if (get_post_meta($id, '_ba_review_author', true)) {
    return true;
  }
  return false;
}

function the_ba_library_review_author($id) {
  if (get_post_meta($id, '_ba_review_author', true)) {
    echo get_post_meta($id, '_ba_review_author' , true );
  }
}

function has_ba_library_year_published($id) {
  if (get_post_meta($id, '_ba_year_published', true)) {
    return true;
  }
  return false;
}

function the_ba_library_year_published($id) {
  if (get_post_meta($id, '_ba_year_published', true)) {
    echo get_post_meta($id, '_ba_year_published' , true );
  }
}


add_action( 'init', 'ba_remove_membership_comments' );
function ba_remove_membership_comments() {
  remove_post_type_support( 'memberpressproduct', 'comments' );
}

function ba_comments_open( $open, $post_id ) {
    $post_type = get_post_type( $post_id );
    // allow comments for built-in "post" post type
    if ( $post_type == 'post' || $post_type == 'library') {
        return true;
    }
    // disable comments for any other post types
    return false;
}
add_filter( 'comments_open', 'ba_comments_open', 10 , 2 );

function ba_next_prev_links( $status ) {
  if ( 'memberpressproduct' == get_post_type() ) {
    $status = false;
  }
  return $status;
}
add_filter( 'astra_single_post_navigation_enabled', 'ba_next_prev_links' );
