<?php
add_action( 'wp_enqueue_scripts', 'asp_enqueue_parent_styles' );
add_action( 'wp_enqueue_scripts', 'asp_enqueue_scripts' );
add_action( 'init', 'register_callout_menu' );
add_action( 'init', 'asp_theme_support', 11 );
add_action( 'wp_print_styles', 'asp_remove_inline_styles' );
add_action( 'widgets_init', 'asp_sidebar_registration' );

function asp_enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

function asp_enqueue_scripts() {
   wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/header.js', array('jquery'), 1.1, true );
   // wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/lightbox.js', array('jquery'), 1.1, true );
}

function register_callout_menu() {
   register_nav_menu('callout-menu',__( 'Callout Menu' ));
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
require_once (ASP_FOLDER_PATH . 'inc/widgets/class.widget-areas.php');
require_once (ASP_FOLDER_PATH . 'inc/editor-settings.php');
require_once (ASP_FOLDER_PATH . 'inc/template-tags.php');
require_once (ASP_FOLDER_PATH . 'inc/custom-post-types.php');
   
?>
