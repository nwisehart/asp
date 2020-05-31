<?php
 $args = array( 
     'post_type' => array( 'asp_publications' ), 
     'posts_per_page' => block_field( 'number-of-posts' , false ), 
     'category_name' => block_field( 'tag-label' , false )
    );
    echo block_field( 'tag-field' , false );
 $query = new WP_Query( $args );
     if ( $query->have_posts() ) { 
        ?><div class="wp-block-group alignwide featured-publications"><?php
         while ( $query->have_posts() ) {
             $query->the_post();
             ?><div class="asp-publication-container"><?php
             if ( has_post_thumbnail()) : // Check if thumbnail exists
                 the_post_thumbnail( 'thumbnail' );
             endif;
             ?>
             <div class="asp-publication-content">
                <div class="asp-header-container asp-color-purple asp-align-left">
                    <h3 class="asp-header"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </div>
                <?php the_excerpt(); ?>
            </div>
            </div> <!-- close .asp-cublication-container -->
         <?php
         }
         ?> </div> <?php /* Close .wp-block-group */
     }
 wp_reset_postdata();




?>