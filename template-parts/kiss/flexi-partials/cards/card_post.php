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

$hasOverlay = false;
if(get_sub_field($sepPrefix . '_overlay_add_overlay') == true):
    include $templatePartials . "overlay-partial.php";
endif;

$cardCssRow = 'flex-column ';
$cardCssImage = '';
$cardCssContent = '';

if($cardDesign == 'row'):
    $cardCssRow = 'row';
    $cardCssImage = 'd-flex align-items-center col-12 col-sm-3 col-lg-4';
    $cardCssContent = 'col-12 col-sm-9 col-lg-8';
endif;

if($cardType == 'momentum'):
    $cardCssRow = $cardCssRow . 'cards-card__momentum ';
endif;

?>
<div class="<?= $colCount; ?>">
<div class="cards-card <?= $cardBackgroundColor . ' ' . $shadow . ' ' . $cardCssRow . ' ' . $boxPaddingCss; ?>">
    <? include $cardPartials . "card_image_custom.php"; ?>
    <div class="cards-card__content <?= $cardCssContent . ' ' . $cardDirection; ?>">
        <div class="cards-card__copy">
            <? include $cardPartials . "card_content.php"; ?>
            <? var_dump($postType); ?>
        </div>
        <? include $templatePartials . "add-button.php"; ?>
    </div>
</div>
</div>

<?
// Custom WP query query
$args_query = array(
    'post_type' => array('post'),
    'post_status' => array('publish'),
    'posts_per_page' => 1,
    'nopaging' => true,
    'order' => 'DESC',
    'category_name' => 'uncategorized',
);

$query = new WP_Query( $args_query );

if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
    }
} else {

}

wp_reset_postdata();