<?
/// GET CUSTOM CLASS
$customClass = '';
if(get_sub_field($sepPrefix . '_class')){
    $customClass = (get_sub_field($sepPrefix . '_class'));
}

/// CONTAINER DIRECTION
$containerDirection = 'text-' . get_sub_field($sepPrefix . '_container_direction');

/// CONTAINER SIZE
$containerSize = get_sub_field($sepPrefix . '_container_size');
if(!empty($containerSize)){
    $containerSize = get_sub_field($sepPrefix . '_container_size');
} else {
    $containerSize = 'container';
}

/// CONTAINER TITLE & INTRO
$blockTitle = get_sub_field($sepPrefix . '_block_title');
$blockIntro = get_sub_field($sepPrefix . '_block_intro');

/// CONTAINER BACKGROUND COLOUR
$bgcolour = get_sub_field('box_background_colour');
$bg_colour = get_sub_field($sepPrefix . '_box_background_colour');

/// SHADOWS
$shadow = get_sub_field($sepPrefix . '_shadow');

/// PADDING
$boxPadding = get_sub_field($sepPrefix . "_box_padding");

$boxPaddingInit = $sepPrefix . '_box_padding';

$paddingType = get_sub_field($boxPaddingInit . '_type');
$cssPaddingSm = '';
$cssPaddingMd = '';
$cssPaddingLg = '';
$boxPaddingCss = '';
$paddingDim = '';
switch($paddingType){
    case "All Sides":
        $paddingDim = 'all';
        break;
    case "Y-Axis":
        $paddingDim = 'y';
        break;
    case "X-Axis":
        $paddingDim = 'x';
        break;
    case "Individual Sides":
        $paddingDim = 'i';
        break;
}

$cssPaddingSm = get_sub_field($boxPaddingInit . '_' . $paddingDim . '_xs');
$cssPaddingMd = get_sub_field($boxPaddingInit . '_' . $paddingDim . '_md');
$cssPaddingLg = get_sub_field($boxPaddingInit . '_' . $paddingDim . '_lg');
$boxPaddingCss = $cssPaddingSm . ' ' . $cssPaddingMd . ' ' . $cssPaddingLg;

$paddingTarget = get_sub_field($boxPaddingInit . '_target');



/// OPTIONS
$optionsContainer = get_field($sepPrefix . '_container_size', 'option');

/// COLUMNS
$colXS = get_field($sepPrefix . '_column_xs', 'option');
$colSM = get_field($sepPrefix . '_column_sm', 'option');
$colMD = get_field($sepPrefix . '_column_md', 'option');
$colLG = get_field($sepPrefix . '_column_lg', 'option');
$colXL = get_field($sepPrefix . '_column_xl', 'option');

$columnsClass = $colXS . ' ' . $colSM . ' ' . $colMD . ' ' . $colLG . ' ' . $colXL;
