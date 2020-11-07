<?php /// OVERLAY SETUP
$hasOverlay = false;
$overlayColor = null;
$overlayOpacity = null;
$colorClass = '';
$opacityClass = '';
$overlayClass = '';

if(get_field('add_image_overlay') == true):
	$hasOverlay = true;
	$overlayColor = get_field('overlay_colour');
	switch ($overlayColor) {
		case "None":
		$colorClass = 'overlay-dark';
		break;
	case "primary":
		$colorClass = 'overlay-primary';
		break;
	case "secondary":
		$colorClass = 'overlay-secondary';
		break;
	case "dark":
		$colorClass = 'overlay-dark';
		break;
	case "light":
		$colorClass = 'overlay-light';
		break;
	case "white":
		$colorClass = 'overlay-white';
		break;
	case "alternate":
		$colorClass = 'overlay-alternate';
		break;
	}
	$overlayOpacity = get_field('overlay_opacity');
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
endif;