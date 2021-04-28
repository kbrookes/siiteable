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
    
} else {
    $containerSize = 'container';
}

/// CONTAINER TITLE
$blockTitle = get_sub_field($sepPrefix . '_block_title');

/// CONTAINER BACKGROUND COLOUR
$bgcolour = get_sub_field('box_background_colour');