<?php 

/**
 * Block Editor Settings.
 * Add custom colors and font sizes to the block editor.
 */
function asp_block_editor_settings() {

	// Block Editor Palette.
	$editor_color_palette = array(
        array(
            'name' => __( 'Purple', 'asp' ),
            'slug' => 'uw-purple',
            'color' => '#4b2e83',
        ),
        array(
            'name' => __( 'White', 'asp' ),
            'slug' => 'uw-white',
            'color' => '#fff',
        ),
        array(
            'name' => __( 'Gray', 'asp' ),
            'slug' => 'uw-gray',
            'color' => '#c9c9c9',
        ),
        array(
            'name' => __( 'Dark Gray', 'asp' ),
            'slug' => 'uw-gray-dark',
            'color' => '#5A5A5A',
        ),
        array(
            'name' => __( 'Menu Gray', 'asp' ),
            'slug' => 'uw-gray-menu',
            'color' => '#707070',
        ),
        array(
            'name' => __( 'Link Blue', 'asp' ),
            'slug' => 'uw-link',
            'color' => '#0074bb',
        ),
        array(
            'name' => __( 'Gold', 'asp' ),
            'slug' => 'uw-gold',
            'color' => '#b7a57a',
        ),
        array(
            'name' => __( 'Light Gold', 'asp' ),
            'slug' => 'uw-gold-light',
            'color' => '#e8e3d3',
        ),
        array(
            'name' => __( 'Dark Gold', 'asp' ),
            'slug' => 'uw-gold-dark',
            'color' => '#85754d',
        ),
        array(
            'name' => __( 'Bright Gold', 'asp' ),
            'slug' => 'uw-gold-bright',
            'color' => '#ffd800',
        ),
    );

	add_theme_support( 'editor-color-palette', $editor_color_palette );

}

add_action( 'after_setup_theme', 'asp_block_editor_settings', 11 );

?>