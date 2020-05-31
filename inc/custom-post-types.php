<?php 
add_action( 'init', 'asp_custom_post_type');
add_action( 'admin_init', 'asp_add_static_post_pages' );

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
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'query_var' => true,
            'taxonomies' => array( 'category'),
            'supports' => array(
                'thumbnail',
                'excerpt',
                'title',
                'editor',
                'custom-fields'
            )
        )
    );
}

 /**
 * Adds a custom field: "post page"; on the "Settings > Reading" page.
 */
function asp_add_static_post_pages() {
    $idpublications = 'page_for_publications';
    // add_settings_field( $id, $title, $callback, $page, $section = 'default', $args = array() )
    add_settings_field( $idpublications, 'Publications page:', 'settings_field_page_for_publications', 'reading', 'default', array(
        'label_for' => 'field-' . $idpublications, // A unique ID for the field. Optional.
        'class'     => 'row-' . $idpublications,   // A unique class for the TR. Optional.
    ) );
}

/**
 * Renders the custom "Publications page" field.
 *
 * @param array $args
 */
function settings_field_page_for_publications( $args ) {
    $id = 'page_for_publications';
    wp_dropdown_pages( array(
        'name'              => $id,
        'show_option_none'  => '&mdash; Select &mdash;',
        'option_none_value' => '0',
        'selected'          => get_option( $id ),
    ) );
}

/**
 * Adds pages to the white-listed options, which are automatically
 * updated by WordPress.
 *
 * @param array $options
 */
add_filter( 'whitelist_options', function ( $options ) {
    $options['reading'][] = 'page_for_publications';
    return $options;
} );

/**
 * Filters the post states on the "Pages" edit page. Displays "Faculty Page"
 * after the post/page title, if the current page is the Faculty static page.
 *
 * @param array $states
 * @param WP_Post $post
 */
add_filter( 'display_post_states', function ( $states, $post ) {
    if ( intval( get_option( 'page_for_publications' ) ) === $post->ID ) {
        $states['page_for_publications'] = __( 'Publications Page' );
    }
    return $states;
}, 10, 2 );
 
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