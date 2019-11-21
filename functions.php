<?php
add_action( 'wp_enqueue_scripts', 'asp_enqueue_parent_styles' );
add_action( 'wp_enqueue_scripts', 'asp_enqueue_scripts' );
add_action( 'init', 'register_donate_menu' );
add_action( 'init', 'register_donate_button' );

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
   
?>