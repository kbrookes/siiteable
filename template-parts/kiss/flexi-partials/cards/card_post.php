<?
$cardImage = get_the_post_thumbnail_url($pageID, 'full');
if(empty($cardImage)):
    $cardImage = get_field('hero_image', $pageID);
endif;

// GET BUTTONS
$addButton = get_sub_field($sepPrefix . '_button');
$showButton = $addButton['add_button'];
if($showButton != false){
    include $templatePartials . "/buttons-array.php";
} elseif($showButton == false && $cardType == 'get-post') {
    $showButton == true;
    include $templatePartials . "/buttons-simple.php";
    $addButton = array(
        'button_alignment'    => $simpleButtonAlign,
        'add_button'          => true,
        'button_options'      => array(
            'button_link_type'    => 'page',
            'button_page_link'    => get_permalink($pageID),
            'button_text_copy'    => $simpleButtonText,
            'btn_color'           => $simpleButtonColor,
            'button_size'         => $simpleButtonSize
        )
    );
    include $templatePartials . "/buttons-array.php";
}

$hasOverlay = false;
if(get_sub_field($sepPrefix . '_overlay_add_overlay') == true):
    include $templatePartials . "overlay-partial.php";
endif;

$cardCssRow = 'flex-column ';
$cardCssImage = '';
$cardCssContent = '';
$imageCol = 'col-12 col-sm-3 col-lg-4';
$contentCol = 'col-12 col-sm-9 col-lg-8';


if(!empty($imageColXs || $imageColSm || $imageColMd || $imageColLg || $imageColXl)){
    $imageCol = $imageColXs . ' ' . $imageColSm . ' ' . $imageColMd . ' ' . $imageColLg . ' ' . $imageColXl . ' justify-content-center';
    $contentCol = 'col';
}

if($cardDesign == 'row'):
    $cardCssRow = 'row';
    $cardCssImage = 'd-flex align-items-center ';
    $cardCssContent = $contentCol;
endif;

/// COLUMN CONTROLS
///include $templatePartials . "column-selector.php";


if($cardType == 'momentum'):
    $cardCssRow = $cardCssRow . 'cards-card__momentum ';
endif;

?>
<div class="<?= $colCount; ?>">
    <div class="cards-card <?= $cardBackgroundColor . ' ' . $shadow . ' ' . $cardCssRow . ' ' . $boxPaddingCss; ?>">
        <? include $cardPartials . "card_image_custom.php"; ?>
        <div class="cards-card__content <?= $cardCssContent . ' ' . $cardDirection; ?>">
            <div class="cards-card__copy mb-4">
                <? include $cardPartials . "card_content.php"; ?>
            </div>
            <? include $templatePartials . "add-button.php"; ?>
        </div>
    </div>
</div>