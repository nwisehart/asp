<?php
/**
 * Starter Content
 *
 * @link https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/
 */

/**
 * Function to return the array of starter content for the theme.
 *
 * Passes it through the `twentytwenty_starter_content` filter before returning.
 * @return array a filtered array of args for the starter_content.
 */
function asp_get_starter_content() {

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'     => array(
			// Place one core-defined widgets in the first footer widget area.
			'sidebar-1' => array(
                'text_about' => array(
                    'text', array(
                        'title' => 'School of Aquatic and Fishery Sciences',
                        'text' => '<p>1122 NE Boat St, Box 355020 Seattle, WA 98195-5020</p>
                        <p>safsdesk@u.washington.edu | (206) 543-4270</p>'
                    )
                ),
                'search',
                'social_icons'
			),
			// Place one core-defined widgets in the second footer widget area.
			'sidebar-2' => array(
				'logo_media_image' => array(
                    'media_image' => array(
                        'url' => '../assets/sprites/environment.svg'
                    )
                ),
                'link_farm' => array(
                    'text', array(
                        'title' => '', // Blank title
                        'text' => '<ul class="asp-two-column">
                        <li><a target="_blank" rel="noopener noreferrer nofollow" href="https://fish.uw.edu/" class="external">Aquatic and Fishery Sciences</a></li>
                        <li><a target="_blank" rel="noopener noreferrer nofollow" href="https://atmos.washington.edu/" class="external">Atmospheric Sciences</a></li>
                        <li><a href="https://quantitative.uw.edu/" class="external" rel="nofollow" target="_blank">Center for Quantitative Science</a></li>
                        <li><a target="_blank" rel="noopener noreferrer nofollow" href="https://cig.uw.edu/" class="external">Climate Impacts Group</a></li>
                        <li><a href="https://earthlab.uw.edu/" class="external" rel="nofollow" target="_blank">EarthLab</a></li>
                        <li><a target="_blank" rel="noopener noreferrer nofollow" href="http://www.ess.washington.edu/" class="external">Earth and Space Sciences</a></li>
                        <li><a target="_blank" rel="noopener noreferrer nofollow" href="http://sefs.uw.edu/" class="external">Environmental and Forest Sciences</a></li>
                        <li><a target="_blank" rel="noopener noreferrer nofollow" href="https://fhl.uw.edu/" class="external">Friday Harbor Laboratories</a></li>
                        <li><a target="_blank" rel="noopener noreferrer nofollow" href="https://jisao.uw.edu/" class="external">Joint Institute for the Study of the Atmosphere and Ocean</a></li>
                        <li><a target="_blank" rel="noopener noreferrer nofollow" href="https://smea.uw.edu" class="external">Marine and Environmental Affairs</a></li>
                        <li><a href="https://marinebiology.uw.edu/" class="external" rel="nofollow" target="_blank">Marine Biology</a></li>
                        <li><a target="_blank" rel="noopener noreferrer nofollow" href="http://www.ocean.washington.edu/" class="external">Oceanography</a></li>
                        <li><a target="_blank" rel="noopener noreferrer nofollow" href="https://pcc.uw.edu/" class="external">Program on Climate Change</a></li>
                        <li><a target="_blank" rel="noopener noreferrer nofollow" href="https://envstudies.uw.edu/" class="external">Program on the Environment</a></li>
                        <li><a target="_blank" rel="noopener noreferrer nofollow" href="https://qrc.uw.edu/" class="external">Quaternary Research Center</a></li>
                        <li><a target="_blank" rel="noopener noreferrer nofollow" href="https://botanicgardens.uw.edu/" class="external">UW Botanic Gardens</a></li>
                        <li><a target="_blank" rel="noopener noreferrer nofollow" href="http://www.waspacegrant.org/" class="external">Washington NASA Space Grant</a></li>
                        <li><a target="_blank" rel="noopener noreferrer nofollow" href="http://wsg.washington.edu/" class="external">Washington Sea Grant</a></li>
                        </ul>'
                    )
                ),
			),
		),

		// Set up nav menus for each of the two areas registered in the theme.
		// 'nav_menus'   => array(
		// 	// Assign a menu to the "primary" location.
		// 	'primary'  => array(
		// 		'name'  => __( 'Primary', 'twentytwenty' ),
		// 		'items' => array(
		// 			'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
		// 			'page_about',
		// 			'page_blog',
		// 			'page_contact',
		// 		),
		// 	),
		// 	// This replicates primary just to demonstrate the expanded menu.
		// 	// 'expanded' => array(
		// 	// 	'name'  => __( 'Primary', 'twentytwenty' ),
		// 	// 	'items' => array(
		// 	// 		'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
		// 	// 		'page_about',
		// 	// 		'page_blog',
		// 	// 		'page_contact',
		// 	// 	),
		// 	// ),
		// 	// Assign a menu to the "social" location.
		// 	'social'   => array(
		// 		'name'  => __( 'Social Links Menu', 'twentytwenty' ),
		// 		'items' => array(
		// 			'link_yelp',
		// 			'link_facebook',
		// 			'link_twitter',
		// 			'link_instagram',
		// 			'link_email',
		// 		),
		// 	),
		// ),
	);

	/**
	 * Filters array of starter content.
	 *
	 * @param array $starter_content Array of starter content.
	 */
	return apply_filters( 'twentytwenty_starter_content', $starter_content );

}
