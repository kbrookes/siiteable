<?
$hasOverlay = true;
$overlayColor = null;
$overlayOpacity = null;

if(!empty(get_sub_field($sepPrefix . '_overlay_colour'))):
    $overlayColor = get_sub_field($sepPrefix . '_overlay_colour');
elseif(!empty(get_field($sepPrefix . '_overlay_colour'))):
    $overlayColor = get_field($sepPrefix . '_overlay_colour');
endif;
if(!empty(get_sub_field($sepPrefix . '_overlay_opacity'))):
    $overlayOpacity = get_sub_field($sepPrefix . '_overlay_opacity');
elseif(!empty(get_field($sepPrefix . '_overlay_opacity'))):
    $overlayOpacity = get_field($sepPrefix . '_overlay_opacity');
endif;
$colorClass = '';
$opacityClass = '';
$overlayClass = '';

/*if($postType == 'post'):
    if(get_field('clone_add_overlay', 'options') == true):
        $hasOverlay = true;
        $overlayColor = get_field('archive_overlay_color', 'options');
        $overlayOpacity = get_field('archive_overlay_opacity', 'options');
    endif;
else:
    if(get_post_meta( get_the_ID(), 'add_image_overlay', true )):
        $hasOverlay = true;
        $overlayColor = get_post_meta( get_the_ID(), 'overlay_colour', true );
        $overlayOpacity = get_post_meta( get_the_ID(), 'overlay_opacity', true );
    endif;
endif;*/


switch ($overlayColor) {
    case "None":
        $colorClass = 'overlay-dark';
        //$btnColor = 'light';
        break;
    case "primary":
        $colorClass = 'overlay-primary';
        //$btnColor = 'dark';
        break;
    case "secondary":
        $colorClass = 'overlay-secondary';
        //$btnColor = 'dark';
        break;
    case "dark":
        $colorClass = 'overlay-dark';
        //$btnColor = 'light';
        break;
    case "light":
        $colorClass = 'overlay-light';
        //$btnColor = 'dark';
        break;
    case "white":
        $colorClass = 'overlay-white';
        //$btnColor = 'light';
        break;
    case "alternate":
        $colorClass = 'overlay-alternate';
        //$btnColor = 'dark';
        break;
}

switch ($overlayOpacity) {
    case "None":
        $opacityClass = 'overlay-90';
        break;
    case "05":
        $opacityClass = 'overlay-05';
        break;
    case "15":
        $opacityClass = 'overlay-15';
        break;
    case "25":
        $opacityClass = 'overlay-25';
        break;
    case "35":
        $opacityClass = 'overlay-35';
        break;
    case "50":
        $opacityClass = 'overlay-50';
        break;
    case "65":
        $opacityClass = 'overlay-65';
        break;
    case "75":
        $opacityClass = 'overlay-75';
        break;
    case "85":
        $opacityClass = 'overlay-85';
        break;
    case "95":
        $opacityClass = 'overlay-95';
        break;
}
$overlayClass = 'hasOverlay ' . $colorClass . ' ' . $opacityClass;
$hasOverlayClass = 'hasOverlay';