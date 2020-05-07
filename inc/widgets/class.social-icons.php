<?php
 
/**
 * Adds Social Icons widget.
 */
class Social_Icons_Widget extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'social_icons_widget', // Base ID
            'Social Icons', // Name
            array( 'description' => __( 'Adds social menu as icons.', 'text_domain' ), ) // Args
        );
    }
 
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        $has_social_menu = has_nav_menu( 'social' );
 
        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }

       if ( $has_social_menu ) { ?>

            <nav aria-label="<?php esc_attr_e( 'Social links', 'twentytwenty' ); ?>" class="footer-social-wrapper">

                <ul class="social-menu footer-social reset-list-style social-icons fill-children-white">

                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'social',
                            'container'       => '',
                            'container_class' => '',
                            'items_wrap'      => '%3$s',
                            'menu_id'         => '',
                            'menu_class'      => '',
                            'depth'           => 1,
                            'link_before'     => '<span class="screen-reader-text">',
                            'link_after'      => '</span>',
                            'fallback_cb'     => '',
                        )
                    );
                    ?>

                </ul><!-- .footer-social -->

            </nav><!-- .footer-social-wrapper -->

        <?php } 

        echo $after_widget;
    }
 
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'text_domain' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
         </p>
    <?php
    }
 
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
 
        return $instance;
    }
 
} // class Social_Icons_Widget

add_action( 'widgets_init', function() { 
    register_widget( 'Social_Icons_Widget' ); 
});

?>