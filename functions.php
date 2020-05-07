<?php
add_action( 'wp_enqueue_scripts', 'asp_enqueue_parent_styles' );
add_action( 'wp_enqueue_scripts', 'asp_enqueue_scripts' );
add_action( 'init', 'register_donate_menu' );
add_action( 'init', 'register_donate_button' );
add_action( 'init', 'asp_theme_support', 11 );
add_action( 'init', 'asp_custom_post_type');
add_action( 'wp_print_styles', 'asp_remove_inline_styles' );

function asp_enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

function asp_enqueue_scripts() {
   wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/header.js', array('jquery'), 1.1, true );
}

function register_donate_menu() {
   register_nav_menu('donate-menu',__( 'Donate Menu' ));
}

function register_donate_button() {
   register_nav_menu('donate-button',__( 'Donate Button' ));
}

function asp_theme_support() {
   unregister_nav_menu( 'expanded' );
   unregister_nav_menu( 'footer' );
}

function asp_remove_inline_styles() {
    // Remove previous inline style output of TwentyTwenty Customizer settings
    wp_style_is( 'twentytwenty-style', 'enqueued' ) 
    && wp_style_add_data( 'twentytwenty-style', 'after', '' );
}


/**
 * Add all required files
 */

define('ASP_FOLDER_PATH', trailingslashit(get_stylesheet_directory(__FILE__)));

require_once (ASP_FOLDER_PATH . 'inc/widgets/class.social-icons.php');
require (ASP_FOLDER_PATH . '/inc/template-tags.php');


/**
 * Add custom post types 
 */

function asp_custom_post_type() {
   register_post_type('asp_publications',
                      array(
                          'labels'      => array(
                              'name'          => __('Publications', 'textdomain'),
                              'singular_name' => __('Publication', 'textdomain'),
                          ),
                          'public'      => true,
                          'has_archive' => true,
                          'rewrite'     => array( 'slug' => 'publications' ),
                      )
   );
   register_post_type('asp_facilities',
      array(
         'labels'      => array(
            'name'          => __('Facilities', 'textdomain'),
            'singular_name' => __('Facility', 'textdomain'),
         ),
         'public'      => true,
         'has_archive' => true,
         'rewrite'     => array( 'slug' => 'facilities' ),
      )
   );
   register_post_type('asp_faculty',
      array(
         'labels'      => array(
            'name'          => __('Faculty', 'textdomain'),
            'singular_name' => __('Faculty', 'textdomain'),
         ),
         'public'      => true,
         'has_archive' => true,
         'rewrite'     => array( 'slug' => 'faculty' ),
      )
   );
   register_post_type('asp_students',
      array(
         'labels'      => array(
            'name'          => __('Students and Alumni', 'textdomain'),
            'singular_name' => __('Student', 'textdomain'),
         ),
         'public'      => true,
         'has_archive' => true,
         'rewrite'     => array( 'slug' => 'students' ),
      )
   );

   
}

// register_post_type( 'shows',
//     array(
//       'labels' => array(
//          'name' => __( 'Shows' ),
//          'singular_name' => __( 'Show' ),
//          'add_new' => __( 'Add New Show' ),
//          'add_new_item' => __( 'Add New Show' ),
//          'edit' => __( 'Edit' ),
//          'edit_item' => __( 'Edit Show' ),
//          'new_item' => __( 'New Show' ),
//          'view' => __( 'View Show' ),
//          'view_item' => __( 'View Show' ),
//          'search_items' => __( 'Search Shows' ),
//          'not_found' => __( 'No shows found' ),
//          'not_found_in_trash' => __( 'No shows found in Trash' ),
//          'parent' => __( 'Parent Show' ),
//       ),
//       'public' => true,
//       'show_ui' => true,
//       'publicly_queryable' => true,
//       'exclude_from_search' => false,
//       'menu_position' => 10,
//       'menu_icon' => get_stylesheet_directory_uri() . '/img/nrt-shows.png',
//       'hierarchical' => true,
//       'query_var' => true,
//       'rewrite' => array( 'slug' => 'shows', 'with_front' => false ),
//       'taxonomies' => array( 'post_tag', 'category'),
//       'can_export' => true,
//       'supports' => array(
//          'post-thumbnails',
//          'excerpts',
//          'comments',
//          'revisions',
//          'title',
//          'editor',
//          'page-attributes',
//          'custom-fields'
//       )
//     )
// );

   
?>
