<?php 
/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function asp_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Donate Left.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Donate Left', 'asp' ),
				'id'          => 'sidebar-donate-1',
				'description' => __( 'Widgets in this area will be displayed in the first column in the donate section.', 'asp' ),
			)
		)
	);

	// Donate Right.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Donate Right', 'asp' ),
				'id'          => 'sidebar-donate-2',
				'description' => __( 'Widgets in this area will be displayed in the second column in the donate section.', 'asp' ),
			)
		)
	);

} ?>