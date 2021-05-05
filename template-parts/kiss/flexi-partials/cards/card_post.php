<?


$cardImage = get_the_post_thumbnail_url($pageID, 'full');
if(empty($cardImage)):
    $cardImage = get_field('hero_image', $pageID);
endif;




// GET BUTTONS
$addButton = get_sub_field($sepPrefix . '_button');
$showButton = $addButton['add_button'];
if($showButton != false):
    include $templatePartials . "/buttons-array.php";
endif;	

//$field = get_field_object('field_5f2cc020856fd');

$hasOverlay = false;
if(get_sub_field($sepPrefix . '_overlay_add_overlay') == true):
    include $templatePartials . "overlay-partial.php";
endif;

?>
<div class="<?= $colCount; ?>">
<div class="cards-card <?= $cardBackgroundColor . ' ' . $shadow; ?>">
    <? include $cardPartials . "card_image_custom.php"; ?>
    <div class="cards-card__content">
        <div class="cards-card__copy">
            <? include $cardPartials . "card_content.php"; ?>
        </div>
        <? include $templatePartials . "add-button.php"; ?>
    </div>
</div>
</div>