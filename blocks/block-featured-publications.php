<?php
 $showAll = block_field( 'show-all' , false ) === "true" ? true : false;
 $search =  block_field( 'search' , false ) === "true" ? true : false;
 $showSearch = $showAll && $search;
 $addClass = $showAll ? "show-all-publication-data" : "publication-title-only";
 $header = block_field( 'header' , false );
 $tagLabel = block_field( 'tag-label' , false );
 $args = array( 
     'post_type' => array( 'asp_publications' ), 
     'posts_per_page' => block_field( 'number-of-posts' , false ), 
     'category_name' => $tagLabel
    );
$ID = "";
if ($showSearch) {
    $args = array(
        'post_type' => array( 'asp_publications' ), 
        'posts_per_page' => -1
    );
    $ID = "aspSearchItemContainer";
}
if ( !empty($tagLabel) ) {
 $query = new WP_Query( $args );
     if ( $query->have_posts() ) { ?>
        <div class="wp-block-group alignwide featured-publications <?php echo $addClass; ?>" id="<?php echo $ID; ?>"><?php
        if(!empty( $header )) { ?>
            <div class="asp-header-container asp-color-purple asp-align-left">
                <h3 class="asp-header"><?php echo $header; ?></h3>
            </div>
        <?php }
         while ( $query->have_posts() ) {
             $query->the_post();
             $nonSearchClass = $showSearch ? "" : "show";
             $dataSearch = $showSearch ? get_post_meta($post->ID, "Search Text", true) : "";
             $dataCategories = $showSearch ? get_the_category() : "";
             $dataCategories = array_map(
                function($cat) {
                    return $cat->cat_name;
                }, $dataCategories);
             $dataCategories = implode(" ", $dataCategories);
             ?><div class="asp-publication-container <?php echo $nonSearchClass ?>" data-categories="<?php echo $dataCategories; ?>"><?php
             if ($showAll) {
                if ( has_post_thumbnail() ) : // Check if thumbnail exists
                    the_post_thumbnail( 'thumbnail' );
                endif;
                ?>
                <div class="asp-publication-content" data-search="<?php echo $dataSearch; ?>" data-categories="<?php echo $dataCategories; ?>">
                    <div class="asp-header-container asp-color-purple asp-align-left">
                        <h3 class="asp-header"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    </div>
                    
                    <?php the_excerpt(); ?>
                </div>
            <?php
            } else {
                ?> <a class="asp-publication-list-item" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php
            }
            ?>
            </div> <!-- close .asp-publication-container -->
         <?php
         }
         ?> </div> <?php /* Close .wp-block-group */
     }
     if ($showSearch) {
     ?>
     <div class="asp-search-container hide" id="aspSearchContainer">
        <span class="ic-search"><input id="aspSearchInput" type="text" placeholder="Search publications"></span>
    </div>
     <?php
     }
wp_reset_postdata();
}

?>