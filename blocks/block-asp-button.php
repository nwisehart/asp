<?php 
    $shortcode = block_field( 'shortcode' , false );
    $hasShortcode = !empty( $shortcode );
    $addId = $hasShortcode ? "aspTriggerLightbox" : "";
    $center = block_field( 'align-center' , false ) === "true" ? "has-text-align-center" : "";
?>
<p class="<?php echo $center; ?>"><a id="<?php echo $addId; ?>" class="uw-btn btn-none <?php block_field('className'); ?>" href="<?php block_field( 'link' ); ?>"><?php block_field( 'link-text' ); ?></a></p>
<?php
    if ($hasShortcode) {
        ?>
        <div id="aspLightboxContainer" class="hide">
            <div class="aspLightbox">
                <button id="aspLightboxClose" class="ic-close">Close</button>
        <?php
            echo do_shortcode($shortcode);
        ?>
            </div>
        </div>
        <?php
    }
?>