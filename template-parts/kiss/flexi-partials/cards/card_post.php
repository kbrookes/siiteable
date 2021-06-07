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
    $cardCssRow = 'row cards-card__horizontal';
    $cardCssImage = 'd-flex align-items-center ';
    $cardCssContent = $contentCol;
elseif($cardDesign == 'card'):
    $cardCssRow = 'cards-card__vertical';
    $imageCol = '';
endif;


/// PADDING TARGET
if($paddingTarget == 'card'){
    $cardPadding = $boxPaddingCss;
    $contentPadding = '';
} elseif($paddingTarget == 'content'){
    $contentPadding = $boxPaddingCss;
    $cardPadding = '';
}

/// COLUMN CONTROLS
///include $templatePartials . "column-selector.php";


if($cardType == 'momentum'):
    $cardCssRow = $cardCssRow . ' cards-card__momentum ';
    $cardCssContent = 'col-12';
endif;

?>
<div class="<?= $colCount; ?>">
    <div class="cards-card <?= $cardBackgroundColor . ' ' . $shadow . ' ' . $cardCssRow . ' '. $gutters . ' ' . $cardPadding; ?>">
        <? if($cardType != 'momentum'): 
            include $cardPartials . "card_image_custom.php"; 
        endif;
        ?>
        <div class="cards-card__content <?= $cardCssContent . ' ' . $cardOrder . ' ' . $contentPadding; ?>">
            <? if($cardType != 'momentum'): ?>
            <div class="cards-card__copy">
                <? include $cardPartials . "card_content.php"; ?>
            </div>
            <? endif; ?>
            <? include $templatePartials . "add-button.php"; ?>
        </div>
    </div>
</div>