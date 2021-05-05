<? 

// SET THE IMAGE SOURCE
$imageSource = get_sub_field($sepPrefix . '_post_image');

$imageType = get_sub_field($sepPrefix . '_image_type');
$imageClass = 'w-full';

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
            $cardImage = get_sub_field($sepPrefix . '_image_svg');
            $imageClass = $imageClass . ' style-svg';
            $imageEl = '<img src="' . esc_url($cardImage['url']) .'" class="' . $imageClass . '" />';
            break;
        case 'icon':
            $cardImage = get_sub_field($sepPrefix . '_image_icon');
            $imageEl = '<i class="' . $faType . ' ' . $cardImage . '"></i>';
            break;
        case 'bg-image':
            $cardImage = get_sub_field($sepPrefix . '_image');
            $image = $cardImage['url'];
            break;
    }
} else {
    // NO image
}

echo $btnLinkOpen;

if($imageType == 'bg-image'):
    include $templatePartials . "image-ratio-box.php";
elseif(!empty($cardImage)):?>
<div class="cards-card__header">
    <?= $imageEl; ?>
</div>
<? 
endif; 
echo $btnLinkClose;
?>