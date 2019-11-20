<?php
/**
 * Displays header site branding
 */
?>
<div class="site-branding">

	<?php if ( has_custom_logo() ) : ?>
		<div class="site-logo"><?php the_custom_logo(); ?></div>
	<?php endif; ?>
	<?php // $blog_info = get_bloginfo( 'name' ); ?>

    <div class="site-header-nav">
        <?php if ( has_nav_menu( 'donate-menu' ) ) : ?>
            <nav id="donate-navigation" class="main-navigation donate" aria-label="<?php esc_attr_e( 'Global Menu' ); ?>">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'donate-menu',
                        'menu_class'     => 'donate-menu',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    )
                );
                wp_nav_menu(
                    array(
                        'theme_location' => 'donate-button',
                        'menu_class'     => 'donate-button-menu',
                        'depth'          => 1,
                        'link_before'         => '<button class="donate-button" type="button">',
                        'link_after'          => '</button>'
                    )
                );
                ?>
            </nav><!-- #donate-navigation -->
        <?php endif; ?>
        <?php if ( has_nav_menu( 'menu-1' ) ) : ?>
            <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentynineteen' ); ?>">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_class'     => 'main-menu',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    )
                );
                ?>
            </nav><!-- #site-navigation -->
        <?php endif; ?>
    </div><!-- .site-header-nav -->
</div><!-- .site-branding -->
