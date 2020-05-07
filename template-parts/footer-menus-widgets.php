<?php
/**
 * Displays the menus and widgets at the end of the main element.
 * Visually, this output is presented as part of the footer element.
 */

$has_sidebar_1 = is_active_sidebar( 'sidebar-1' );
$has_sidebar_2 = is_active_sidebar( 'sidebar-2' );

// Only output the container if there are elements to display.
if ( $has_sidebar_1 || $has_sidebar_2 ) {
	?>

	<div class="footer-nav-widgets-wrapper header-footer-group">
        <div class="asp-footer-wrapper">    
            <div class="asp-footer-inner section-inner">
                <div class="footer-widgets-wrapper">
                    <div class="footer-widgets column-one grid-item">
                        <?php dynamic_sidebar( 'sidebar-donate-1' ); ?>
                    </div>
                    <div class="footer-widgets column-two grid-item">
                        <?php dynamic_sidebar( 'sidebar-donate-2' ); ?>
                    </div>
                </div> 
            </div>
        </div>

		<div class="footer-inner section-inner">

			<?php if ( $has_sidebar_1 || $has_sidebar_2 ) { ?>

				<aside class="footer-widgets-outer-wrapper" role="complementary">

					<div class="footer-widgets-wrapper">

						<?php if ( $has_sidebar_1 ) { ?>

							<div class="footer-widgets column-one grid-item">
								<?php dynamic_sidebar( 'sidebar-1' ); ?>
							</div>

						<?php } ?>

						<?php if ( $has_sidebar_2 ) { ?>

							<div class="footer-widgets column-two grid-item">
								<?php dynamic_sidebar( 'sidebar-2' ); ?>
							</div>

						<?php } ?>

					</div><!-- .footer-widgets-wrapper -->

				</aside><!-- .footer-widgets-outer-wrapper -->

			<?php } ?>

		</div><!-- .footer-inner -->

	</div><!-- .footer-nav-widgets-wrapper -->

<?php } ?>
