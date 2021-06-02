<? 

// SET THE IMAGE SOURCE
$imageSource = get_sub_field($sepPrefix . '_post_image');

$imageType = get_sub_field($sepPrefix . '_image_type');
$imageShadow = get_sub_field('image_shadow_shadow_select');
$imageClass = 'w-full ' . $imageShadow;
$iconClass = '';

$faType = get_theme_mod( 'fa_styles');

if(($cardType == "multi-post") || (($cardType == "get-post") && ($imageSource == "post_image"))) {
    $image = $cardImage;
    $imageType = "bg-image";
} elseif(($cardType == "manual") || (($cardType == "get-post") && ($imageSource == "select_image")) ){
    switch($imageType){
        case 'image':
            $cardImage = get_sub_field($sepPrefix . '_image');
            $imageEl = '<img src="' . esc_url($cardImage['url']) .'" alt="' . esc_attr($cardImage['alt']) . '" class="' . $imageClass . '" />';
            break;
        case 'svg':
            $cardImage = get_sub_field($sepPrefix . '_svg');
            $imageClass = $imageClass . ' style-svg';
            $imageEl = '<img src="' . esc_url($cardImage) .'" class="' . $imageClass . '" />';
            break;
        case 'icon':
            $cardImage = get_sub_field($sepPrefix . '_icon');
            $imageEl = '<i class="' . $faType . ' ' . $cardImage . '"></i>';
            $iconClass = $iconSize . ' ' . $iconColor;
            break;
        case 'bg-image':
            $cardImage = get_sub_field($sepPrefix . '_image');
            $image = $cardImage['url'];
            break;
    }
} else {
    // NO image
}

if($imageType == 'bg-image'):?>
<div class="<?= $imageCol; ?>">
    <? include $templatePartials . "image-ratio-box.php"; ?>
</div>
<? elseif(!empty($cardImage)):?>
<div class="cards-card__header <?= $cardCssImage . ' ' . $iconClass; ?>">
    <?
    echo $btnLinkOpen;
    echo $imageEl; 
    echo $btnLinkClose;?>
</div>
<? 
endif;
?>