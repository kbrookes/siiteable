<?
 $boxAR = get_sub_field($sepPrefix . '_image_ar');
?>
<div class="image-box <?= $boxAR . ' ' . $hasOverlayClass . '' . $cardCssImage; ?>" style="background-image: url(<?= $image; ?>);">
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
</div>