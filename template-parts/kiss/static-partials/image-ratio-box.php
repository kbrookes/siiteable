<?
 $boxAR = get_sub_field($sepPrefix . '_image_ar');
?>
<div class="image-box <?= $boxAR; ?>" style="background-image: url(<?= $image; ?>);">
    <div class="image-box__inner">
        <div class="image-box__content <?= $boxAlign . ' ' . $boxFonts; ?>">
            <? if($titlePos == true):
            echo $title;
            echo $subTitle;
            endif; ?>
        </div>
    </div>
</div>