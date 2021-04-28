<?
/// TITLE CONTROLS - For primary titles inside containers
$titleTextSize = get_sub_field($sepPrefix . '_title_font_size');
$titleTextColor = get_sub_field($sepPrefix . '_title_font_color');
$titleTextWeight = get_sub_field($sepPrefix . '_title_font_weight');
$titleTextAlignment = get_sub_field($sepPrefix . '_title_text_alignment');
$titleTextClass = $titleTextSize . ' ' . $titleTextColor . ' ' . $titleTextWeight . ' ' . $titleTextAlignment;

/// TITLES CONTROLS - For multiple titles inside blocks/repeaters/groups
$titlesTextSize = get_sub_field($sepPrefix . '_titles_font_size');
$titlesTextColor = get_sub_field($sepPrefix . '_titles_font_color');
$titlesTextWeight = get_sub_field($sepPrefix . '_titles_font_weight');
$titlesTextAlignment = get_sub_field($sepPrefix . '_titles_text_alignment');
$titlesTextClass = $titlesTextSize . ' ' . $titlesTextColor . ' ' . $titlesTextWeight . ' ' . $titlesTextAlignment;

/// CONTENT CONTROLS - For content inside blocks/repeaters/groups
$contentTextSize = get_sub_field($sepPrefix . '_contents_font_size');
$contentTextColor = get_sub_field($sepPrefix . '_contents_font_color');
$contentTextWeight = get_sub_field($sepPrefix . '_contents_font_weight');
$contentTextAlignment = get_sub_field($sepPrefix . '_contents_text_alignment');
$contentTextClass = $contentTextSize . ' ' . $contentTextColor . ' ' . $contentTextWeight . ' ' . $contentTextAlignment;

/// TEXT CONTROL FOR SINGLE CONTROLLER ELEMENTS - CTA
$textSize = get_sub_field('font_size');
$textColor = get_sub_field('font_color');
$textWeight = get_sub_field('font_weight');
$textAlignment = get_sub_field('text_alignment');
$textClass = $textSize . ' ' . $textColor . ' ' . $textWeight . ' ' . $textAlignment;