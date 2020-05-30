<?php 
    $container_classes = 'asp-header-container';
    $container_classes .= ' asp-color-' . block_field( 'color' , false );
    $container_classes .= ' asp-align-' . block_field( 'alignment' , false );
    $container_classes .= (block_field( 'alignment' , false ) === 'center') ? ' alignwide' : '';
    $header_option = block_field( 'header-size' , false );
?>
<div class="<?php echo $container_classes ?>">
<?php 
    if($header_option === 'h3') {
        ?><h3 class="asp-header"><?php block_field( 'text' ); ?></h3><?php
    } else if($header_option === 'h4') {
        ?><h4 class="asp-header"><?php block_field( 'text' ); ?></h4><?php
    } else {
        ?><h2 class="asp-header"><?php block_field( 'text' ); ?></h2><?php
    }
?>
</div>