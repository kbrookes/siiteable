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


$cardCssRow = 'flex-column ';
$cardCssImage = '';
$cardCssContent = '';
$cardDirection = 'order-last';

if($cardDesign == 'row'):
    $cardCssRow = 'row';
    $cardCssImage = 'd-flex align-items-center col-12 col-sm-3 col-lg-4';
    $cardCssContent = 'col-12 col-sm-9 col-lg-8';
endif;

?>
<div class="<?= $colCount; ?>">
<div class="cards-card <?= $cardBackgroundColor . ' ' . $shadow . ' ' . $cardCssRow; ?>">
    <? include $cardPartials . "card_image_custom.php"; ?>
    <div class="cards-card__content <?= $cardCssContent . ' ' . $cardDirection; ?>">
        <div class="cards-card__copy">
            <? include $cardPartials . "card_content.php"; ?>
        </div>
        <? include $templatePartials . "add-button.php"; ?>
    </div>
</div>
</div>