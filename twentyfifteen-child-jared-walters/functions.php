<?php

/**
 * Enqueue styles
 */
function theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/css/main.css', array( $parent_style ) );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


/**
 * Enqueue and register fonts
 */
add_action('wp_enqueue_scripts', 'fonts_init');

function fonts_init() {
  wp_register_style( 'fonts', '//fonts.googleapis.com/css?family=Oswald:400,700', false, null, false );
  wp_enqueue_style( 'fonts' );
}


// [AllPageLinks] - display list of pages and links
add_shortcode( 'AllPageLinks', 'all_page_links' );

function all_page_links() {
  wp_page_menu();
}


// Register Custom Post Types
function custom_post_types() {

  //Artists
  $labels = array(
    'name'                => _x( 'Artists', 'Post Type General Name', 'twentyfifteen-child-jared-walters' ),
    'singular_name'       => _x( 'Artist', 'Post Type Singular Name', 'twentyfifteen-child-jared-walters' ),
    'menu_name'           => __( 'Artists', 'twentyfifteen-child-jared-walters' ),
    'name_admin_bar'      => __( 'Artist', 'twentyfifteen-child-jared-walters' ),
    'parent_item_colon'   => __( 'Parent Artist:', 'twentyfifteen-child-jared-walters' ),
    'all_items'           => __( 'All Artists', 'twentyfifteen-child-jared-walters' ),
    'add_new_item'        => __( 'Add New Artist', 'twentyfifteen-child-jared-walters' ),
    'add_new'             => __( 'Add New', 'twentyfifteen-child-jared-walters' ),
    'new_item'            => __( 'New Artist', 'twentyfifteen-child-jared-walters' ),
    'edit_item'           => __( 'Edit Artist', 'twentyfifteen-child-jared-walters' ),
    'update_item'         => __( 'Update Artist', 'twentyfifteen-child-jared-walters' ),
    'view_item'           => __( 'View Artist', 'twentyfifteen-child-jared-walters' ),
    'search_items'        => __( 'Search Artist', 'twentyfifteen-child-jared-walters' ),
    'not_found'           => __( 'Not found', 'twentyfifteen-child-jared-walters' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'twentyfifteen-child-jared-walters' ),
  );
  $args = array(
    'label'               => __( 'artists', 'twentyfifteen-child-jared-walters' ),
    'description'         => __( 'Artists Show Information ', 'twentyfifteen-child-jared-walters' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes'),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 20,
    'menu_icon'           => 'dashicons-groups',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => false,
    'can_export'          => true,
    'has_archive'         => false,   
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  register_post_type( 'artists', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_types', 0 );
