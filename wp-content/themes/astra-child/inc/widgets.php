<?php
/**
 * Add a sidebar.
 */
function ba_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Pre-Footer Widget Area', 'ba' ),
        'id'            => 'pre-footer',
        'description'   => __( 'Widgets above the footer on all posts and pages.', 'ba' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'ba_widgets_init' );
