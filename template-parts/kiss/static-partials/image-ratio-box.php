<?
    
    $boxAR = get_sub_field($sepPrefix . '_image_ar');
    
    if($cardType == 'get-post'){
        /// LINK OPTIONS
        $btnAddLinks = true;
        $linkContent = get_permalink($pageID);
        include $templatePartials . 'button_links.php';
    }


?>
<div class="image-box <?= $boxAR . ' ' . $hasOverlayClass . ' ' . $cardCssImage . ' ' . $imageClass; ?>" style="background-image: url(<?= $image; ?>);">
    <?= $btnLinkOpen; ?>
    <div class="image-box__inner">
        <? if($hasOverlay):?>
        <div class="image-box__inner-overlay position-absolute w-100 h-100 <? echo $colorClass . ' opacity-' . $overlayOpacity; ?>"></div>
        <? endif; ?>
        <div class="image-box__content <?= $boxAlign . ' ' . $boxFonts; ?>">
            <? if($titlePos == true):
            echo $title;
            echo $subTitle;
            endif; 
            ?>
        </div>
    </div>
    <?= $btnLinkClose; ?>
</div>