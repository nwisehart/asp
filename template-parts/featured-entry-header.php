<?php
/**
 * Displays the post header with featured image or video
 */

$entry_header_classes = '';

if ( is_singular() ) {
	$entry_header_classes .= ' header-footer-group';
}

// grabs featured video
$meta_value = ! post_password_required() ? get_post_meta(get_the_ID(), 'featured_video_uploading', true) : '';
$video_url = $meta_value ? wp_get_attachment_url($meta_value) : '';
if ( $video_url ) {
    $entry_header_classes .= ' asp-featured-video';
} 

// grabs featured image
$image_url = ! post_password_required() ? get_the_post_thumbnail_url( get_the_ID(), 'twentytwenty-fullscreen' ) : '';
if ( ! $video_url && $image_url ) {
    $entry_header_classes .= ' asp-featured-image';
} 

$cover_classes = '';
$cover_styles = '';
$cover_inner_classes = '';
$cover_video_html = '';

if ( $video_url || $image_url ) {
	$cover_classes .= "wp-block-cover alignfull";
	$cover_inner_classes .= "wp-block-cover__inner-container";
	$entry_header_classes .= ' asp-cover-hero';
}

if ( $video_url ) {
	$cover_video_html .= '<video id="aspHeroVideo" class="wp-block-cover__video-background" autoplay="" muted="" loop="" src="' . $video_url . '" data-origwidth="0" data-origheight="0" style="width: 1241px;"></video>';
	$cover_video_html .= '<button id="aspPlayPause" aria-hidden="true"><span class="ic-pause sm white"></span>Pause</button>';
}

if ( $image_url ) {
	$cover_styles .= "background-image:url(" . $image_url . ")";
}

?>

<header id="aspMasthead" class="entry-header has-text-align-center<?php echo esc_attr( $entry_header_classes ); ?>">

	<div class="<?php echo $cover_classes; ?>" style="<?php echo $cover_styles; ?>">
		<?php echo $cover_video_html; ?>

		<div class="entry-header-inner section-inner medium <?php echo $cover_inner_classes; ?>">

			<?php
				/**
				 * Allow child themes and plugins to filter the display of the categories in the entry header.
				 *
				 * @since 1.0.0
				 *
				 * @param bool   Whether to show the categories in header, Default true.
				 */
			$show_categories = apply_filters( 'twentytwenty_show_categories_in_entry_header', true );

			if ( true === $show_categories && has_category() ) {
				?>

				<div class="entry-categories">
					<span class="screen-reader-text"><?php _e( 'Categories', 'twentytwenty' ); ?></span>
					<div class="entry-categories-inner">
						<?php the_category( ' ' ); ?>
					</div><!-- .entry-categories-inner -->
				</div><!-- .entry-categories -->

				<?php
			}

			if ( is_singular() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
			}

			$intro_text_width = '';

			if ( is_singular() ) {
				$intro_text_width = ' small';
			} else {
				$intro_text_width = ' thin';
			}
			?>

		</div><!-- .entry-header-inner -->
	</div><!-- cover classes -->
		<?php
		if ( has_excerpt() && is_singular() ) {
			?>
			<div class="asp-excerpt-container">
				<div class="intro-text section-inner max-percentage<?php echo $intro_text_width; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>">
					<?php the_excerpt(); ?>
				</div>
		</div>
			<?php
		}
		?>
</header><!-- .entry-header -->
