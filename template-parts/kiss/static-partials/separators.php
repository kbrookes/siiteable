<?php 

/// GENERAL
$sepOptions = get_sub_field($sepPrefix . '_sep_options');
$svgPath = $templatePath . "/template-parts/kiss/flexi-partials/separators/separator-";
$pathUpper = $templatePath . "/template-parts/kiss/flexi-partials/separator-upper.php";
$pathLower = $templatePath . "/template-parts/kiss/flexi-partials/separator-lower.php";

$paddingUpper = 'paddingUpper-sm';
$paddingLower = 'paddingLower-sm';
	
/// SET UPPER SEPARATORS
	
$upperSeparatorType = '';
$upperSeparatorDirection = '';
$upperSeparatorForeground = '';
$upperSeparatorShadow = '';
$boxBackground = '';
$hasSeparatorUpper = '';
$upperClassVertical = '';
$upperClassHorizontal = '';
$separatorClasses = '';
$doublePadding = '';


$addSeparatorUpper = false;
if((get_sub_field($sepPrefix . '_separators') != '') && ($sepOptions[$sepPrefix . '_upper_separator_separator_type'] != '')):
	$addSeparatorUpper = true;
//	$hasSeparatorUpper = 'hasSeparatorUpper';
	$upperSeparatorType = $sepOptions[$sepPrefix . '_upper_separator_separator_type'];
	$upperSeparatorDirection = $sepOptions[$sepPrefix . '_upper_separator_separator_direction'];
	$upperSeparatorForeground = $sepOptions[$sepPrefix . '_upper_separator_separator_foreground'];
	$upperSeparatorShadow = $sepOptions[$sepPrefix . '_upper_separator_separator_shadow'];
	$upperContainerColor = $sepOptions[$sepPrefix . '_upper_separator_container_background'];
	$upperClassVertical = $sepOptions[$sepPrefix . '_upper_separator_direction_vertical'];
	$upperClassHorizontal = $sepOptions[$sepPrefix . '_upper_separator_direction_horizontal'];
	//if($upperSeparatorType == 'fan-center' || $upperSeparatorType == 'fan-side'):
	//	$separatorClasses = 'upperPaddingDouble ';
	//endif;
	$separatorClasses .= 'hasSeparatorUpper hasUpper';
endif;

if(!empty($upperClassVertical)):
	if($upperClassVertical == 'down'):
		$separatorClasses .= ' upperDown';
	endif; 
	$upperClassVertical = 'directionX' . $upperClassVertical;
endif; 

if(!empty($upperClassHorizontal)):
	$upperClassHorizontal = 'directionY' . $upperClassHorizontal;
endif; 

$upperSeparatorFile = $svgPath;
$upperSeparatorFile .= $upperSeparatorType;
$upperSeparatorFile .= $upperSeparatorDirection;
$upperSeparatorFile .= ".svg";

if(!empty($upperContainerColor)):
	$upperBoxBackground = 'bg-' . $upperContainerColor;
endif;

// SET PADDING

if($upperClassVertical == 'directionXup') {
	$paddingUpper = 'paddingUpper-md';
	if($upperSeparatorType == 'fan-center' || $upperSeparatorType == 'fan-side') {
		//$paddingUpper = 'paddingUpper-lg';
	}
} elseif($upperClassVertical == 'directionXdown') {
	$paddingUpper = 'paddingUpper-lg';
	if($upperSeparatorType == 'fan-center' || $upperSeparatorType == 'fan-side') {
		$paddingUpper = 'paddingUpper-xl';
	}
}
	
	
	//&& $upperSeparatorType == 'fan-center' || $upperSeparatorType == 'fan-side')):
	//	$paddingUpper = 'paddingUpper-xl';
	//elseif($upperClassVertical == 'up' && ($upperSeparatorType != 'fan-center' || $upperSeparatorType != 'fan-side')):
	//	$paddingUpper = 'paddingUpper-lg';
	//endif; 

/// SET LOWER SEPARATORS

$lowerSeparatorType = '';
$lowerSeparatorDirection = '';
$lowerSeparatorForeground = '';
$lowerSeparatorShadow = '';
$boxBackground = '';
$hasSeparatorLower = '';
$lowerClassVertical = '';
$lowerClassHorizontal = '';

$addSeparatorLower = false;
if((get_sub_field($sepPrefix . '_separators') != '') && ($sepOptions[$sepPrefix . '_lower_separator_separator_type'] != '')):
	$addSeparatorLower = true;
	//$separatorClasses .= ' hasSeparatorLower hasLower';
	//$hasSeparatorLower = 'hasSeparatorLower';
	$lowerSeparatorType = $sepOptions[$sepPrefix . '_lower_separator_separator_type'];
	$lowerSeparatorDirection = $sepOptions[$sepPrefix . '_lower_separator_separator_direction'];
	$lowerSeparatorForeground = $sepOptions[$sepPrefix . '_lower_separator_separator_foreground'];
	$lowerSeparatorShadow = $sepOptions[$sepPrefix . '_lower_separator_separator_shadow'];
	$lowerContainerColor = $sepOptions[$sepPrefix . '_lower_separator_container_background'];
	$lowerClassVertical = $sepOptions[$sepPrefix . '_lower_separator_direction_vertical'];
	$lowerClassHorizontal = $sepOptions[$sepPrefix . '_lower_separator_direction_horizontal'];
	//if($lowerSeparatorType == 'fan-center' || $lowerSeparatorType == 'fan-side'):
	//	$separatorClasses .= ' lowerPaddingDouble ';
	//endif;
	$separatorClasses .= ' hasSeparatorLower hasLower';
endif;

if(!empty($lowerClassVertical)):
	if($lowerClassVertical == 'up'):
		$separatorClasses .= ' lowerUp';
	endif; 
	$lowerClassVertical = 'directionX' . $lowerClassVertical;
endif; 

if(!empty($lowerClassHorizontal)):
	$lowerClassHorizontal = 'directionY' . $lowerClassHorizontal;
endif;

$lowerSeparatorFile = $svgPath;
$lowerSeparatorFile .= $lowerSeparatorType;
$lowerSeparatorFile .= $lowerSeparatorDirection;
$lowerSeparatorFile .= ".svg";

if(!empty($lowerContainerColor)):
	$lowerBoxBackground = 'bg-' . $lowerContainerColor;
endif;

// SET PADDING
if($lowerClassVertical == 'directionXdown'){
	$paddingLower = 'paddingLower-md';
	if($lowerSeparatorType == 'fan-center' || $lowerSeparatorType == 'fan-side'){
		
	}
} elseif($lowerClassVertical == 'directionXup'){
	$paddingLower = 'paddingLower-lg';
	if($lowerSeparatorType == 'fan-center' || $lowerSeparatorType == 'fan-side'){
		$paddingLower = 'paddingLower-xl';
	}
}

$separatorClasses .= ' ' . $paddingUpper . ' ' . $paddingLower;
