<?php 
    $container_classes = 'asp-widget-container';
?>
<div class="<?php echo $container_classes ?>">
<div>
    <img src="<?php block_field( 'image' ); ?>" alt="<?php block_field( 'image-alt-text' ); ?>" width="750" height="500" class="">
    <h2 class="has-text-color"><?php block_field( 'title' ); ?></h2>
</div>
<p><?php block_field( 'text' ); ?></p>
<p class="asp-btn"><a class="uw-btn btn-none" href="<?php block_field( 'link' ); ?>"><?php block_field( 'link-text' ); ?></a></p>
</div>