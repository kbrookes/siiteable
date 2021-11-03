<?
$doi = true;
$simpleButton = get_sub_field($sepPrefix . '_button_controls');
$simpleButtonColor = $simpleButton['button_simple_color'];
$simpleButtonSize = $simpleButton['button_simple_size'];
$simpleButtonAlign = $simpleButton['button_simple_alignment'];
$simpleButtonText = $simpleButton['button_simple_text'];
$simpleButtonPadding = $simpleButton['button_simple_padding'];
 
/// OPTIONS
$simpleButtonOptions = get_field($sepPrefix . '_button_controls', 'options');
$simpleButtonColorOptions = $simpleButtonOptions['button_simple_color'];
$simpleButtonSizeOptions = $simpleButtonOptions['button_simple_size'];
$simpleButtonAlignOptions = $simpleButtonOptions['button_simple_alignment'];
$simpleButtonTextOptions = $simpleButtonOptions['button_simple_text'];
$simpleButtonPaddingOptions = $simpleButtonOptions['button_simple_padding'];