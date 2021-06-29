<?php 
$sepOptions = '';
$addSeparators = false;
$upperSeparatorType = '';
$upperClassPadding = '';
$addSeparatorUpper = false;
$lowerSeparatorType = '';
$lowerClassPadding = '';
$addSeparatorLower = false;

if(get_field($sepPrefix . '_separators') != ''):
	$addSeparators = true;
	$sepOptions = get_field($sepPrefix . '_sep_options');
elseif(get_sub_field($sepPrefix . '_separators') != ''):
	$addSeparators = true;
	$sepOptions = get_sub_field($sepPrefix . '_sep_options');
elseif(get_field($sepPrefix . '_separators', 'options') != ''):
	$addSeparators = true;
	$sepOptions = get_field($sepPrefix . '_sep_options', 'options');
endif;

if($sepOptions){
	$upperSeparatorType = $sepOptions[$sepPrefix . '_upper_separator_separator_type'];
	$lowerSeparatorType = $sepOptions[$sepPrefix . '_lower_separator_separator_type'];
}
/// GENERAL

$svgPath = $templatePath . "/template-parts/kiss/flexi-partials/separators/separator-";
$pathUpper = $templatePath . "/template-parts/kiss/flexi-partials/separator-upper.php";
$pathLower = $templatePath . "/template-parts/kiss/flexi-partials/separator-lower.php";

$paddingUpper = 'paddingUpper-sm';
$paddingLower = 'paddingLower-sm';
	
/// SET UPPER SEPARATORS
	
//$upperSeparatorType = '';
$upperSeparatorDirection = '';
$upperSeparatorForeground = '';
$upperSeparatorShadow = '';
$boxBackground = '';
$hasSeparatorUpper = '';
$upperClassVertical = '';
$upperClassHorizontal = '';
$separatorClasses = '';
$doublePadding = '';


//$addSeparatorUpper = false;
if(($addSeparators == true) && ($upperSeparatorType != '')):
	$addSeparatorUpper = true;
//	$hasSeparatorUpper = 'hasSeparatorUpper';
	//$upperSeparatorType = $sepOptions[$sepPrefix . '_upper_separator_separator_type'];
	$upperSeparatorDirection = $sepOptions[$sepPrefix . '_upper_separator_separator_direction'];
	$upperSeparatorForeground = $sepOptions[$sepPrefix . '_upper_separator_separator_foreground'];
	$upperSeparatorShadow = $sepOptions[$sepPrefix . '_upper_separator_separator_shadow'];
	$upperContainerColor = $sepOptions[$sepPrefix . '_upper_separator_container_background'];
	$upperClassVertical = $sepOptions[$sepPrefix . '_upper_separator_direction_vertical'];
	$upperClassHorizontal = $sepOptions[$sepPrefix . '_upper_separator_direction_horizontal'];
	$upperClassPadding = $sepOptions[$sepPrefix . '_upper_separator_separator_padding'];
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

if($upperClassPadding != "false"){
	$paddingUpper = 'pt-pc_' . $upperClassPadding;
}
	
	
	//&& $upperSeparatorType == 'fan-center' || $upperSeparatorType == 'fan-side')):
	//	$paddingUpper = 'paddingUpper-xl';
	//elseif($upperClassVertical == 'up' && ($upperSeparatorType != 'fan-center' || $upperSeparatorType != 'fan-side')):
	//	$paddingUpper = 'paddingUpper-lg';
	//endif; 

/// SET LOWER SEPARATORS

//$lowerSeparatorType = '';
$lowerSeparatorDirection = '';
$lowerSeparatorForeground = '';
$lowerSeparatorShadow = '';
$boxBackground = '';
$hasSeparatorLower = '';
$lowerClassVertical = '';
$lowerClassHorizontal = '';

//$addSeparatorLower = false;
if(($addSeparators == true) && ($lowerSeparatorType != '')):
	$addSeparatorLower = true;
	//$separatorClasses .= ' hasSeparatorLower hasLower';
	//$hasSeparatorLower = 'hasSeparatorLower';
	//$lowerSeparatorType = $sepOptions[$sepPrefix . '_lower_separator_separator_type'];
	$lowerSeparatorDirection = $sepOptions[$sepPrefix . '_lower_separator_separator_direction'];
	$lowerSeparatorForeground = $sepOptions[$sepPrefix . '_lower_separator_separator_foreground'];
	$lowerSeparatorShadow = $sepOptions[$sepPrefix . '_lower_separator_separator_shadow'];
	$lowerContainerColor = $sepOptions[$sepPrefix . '_lower_separator_container_background'];
	$lowerClassVertical = $sepOptions[$sepPrefix . '_lower_separator_direction_vertical'];
	$lowerClassHorizontal = $sepOptions[$sepPrefix . '_lower_separator_direction_horizontal'];
	$lowerClassPadding = $sepOptions[$sepPrefix . '_lower_separator_separator_padding'];
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

if($lowerClassPadding != "false"){
	$paddingLower = 'pb-pc_' . $lowerClassPadding;
}

$separatorClassesHero = $separatorClasses;

$separatorClasses .= ' ' . $paddingUpper . ' ' . $paddingLower;

