<?php 
    $container_classes = 'asp-header-container';
    $container_classes .= ' asp-color-' . block_field( 'color' , false );
    $container_classes .= ' asp-align-' . block_field( 'alignment' , false );
    $container_classes .= (block_field( 'alignment' , false ) === 'center') ? ' alignwide' : '';

?>
<div class="<?php echo $container_classes ?>"><h2 class="asp-header"><?php block_field( 'text' ); ?></h2></div>