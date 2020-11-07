<?php /// SET BG COLOUR

$bgcolour = get_sub_field('box_background_colour');	

$btnColour = 'primary';
switch ($bgcolour) {
	case "":
        $btnColour = "primary";
        break;
    case "bg-primary":
        $btnColour = "secondary";
        break;
    case "bg-secondary":
        $btnColour = "alternate";
        break;
    case "bg-dark":
        $btnColour = "primary";
        break;
	case "bg-light":
        $btnColour = "primary";
        break;
	case "bg-white":
        $btnColour = "primary";
        break;
	case "bg-alternate":
        $btnColour = "primary";
        break;
}