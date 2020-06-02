<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage ASP
 * @since 1.0.0
 */

get_header();
?>

<main id="site-content" role="main">

    <?php
    
    //see if custom front page is set
    $pageId = 0;
    if (is_post_type_archive("asp_publications")) {
        $pageId = intval( get_option( 'page_for_publications' ) );
    }
    if($pageId !== 0){
        //set the post
        $wp_query = new WP_Query( array( 'page_id' => $pageId ) );
    } 
    if ( have_posts() ) {

		while ( have_posts() ) {
            the_post();

            get_template_part( 'template-parts/content', get_post_type() );
        }
	}

	?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
