<?
/// TITLE CONTROLS - For primary titles inside containers
$titleTextSize = get_sub_field($sepPrefix . '_title_font_size');
$titleTextColor = get_sub_field($sepPrefix . '_title_font_color');
$titleTextWeight = get_sub_field($sepPrefix . '_title_font_weight');
$titleTextAlignment = get_sub_field($sepPrefix . '_title_text_alignment');
$titleTextClass = $titleTextSize . ' ' . $titleTextColor . ' ' . $titleTextWeight . ' ' . $titleTextAlignment;

/// INTRO CONTROLS - for single-content blocks that have seprate title & content controls
$introTextSize = get_sub_field($sepPrefix . '_intro_font_size');
$introTextColor = get_sub_field($sepPrefix . '_intro_font_color');
$introTextWeight = get_sub_field($sepPrefix . '_intro_font_weight');
$introTextAlignment = get_sub_field($sepPrefix . '_intro_text_alignment');
$introTextClass = $introTextSize . ' ' . $introTextColor . ' ' . $introTextWeight . ' ' . $introTextAlignment;

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

/// NON-GROUPED text-base (e.g. Hero Headers)
/// TITLE CONTROLS - For primary titles inside containers
$titleTextSizeG = get_field($sepPrefix . '_title_font_size');
$titleTextColorG = get_field($sepPrefix . '_title_font_color');
$titleTextWeightG = get_field($sepPrefix . '_title_font_weight');
$titleTextAlignmentG = get_field($sepPrefix . '_title_text_alignment');
$titleTextClassG = $titleTextSizeG . ' ' . $titleTextColorG . ' ' . $titleTextWeightG . ' ' . $titleTextAlignmentG;

/// INTRO CONTROLS - for single-content blocks that have seprate title & content controls
$introTextSizeG = get_field($sepPrefix . '_intro_font_size');
$introTextColorG = get_field($sepPrefix . '_intro_font_color');
$introTextWeightG = get_field($sepPrefix . '_intro_font_weight');
$introTextAlignmentG = get_field($sepPrefix . '_intro_text_alignment');
$introTextClassG = $introTextSizeG . ' ' . $introTextColorG . ' ' . $introTextWeightG . ' ' . $introTextAlignmentG;

/// OPTIONS PAGES
/// TITLE CONTROLS - For primary titles on options pages
$optionsTitleTextSize = get_field($sepPrefix . '_title_font_size', 'options');
$optionsTitleTextColor = get_field($sepPrefix . '_title_font_color', 'options');
$optionsTitleTextWeight = get_field($sepPrefix . '_title_font_weight', 'options');
$optionsTitleTextAlignment = get_field($sepPrefix . '_title_text_alignment', 'options');
$optionsTitleTextClass = $optionsTitleTextSize . ' ' . $optionsTitleTextColor . ' ' . $optionsTitleTextWeight . ' ' . $optionsTitleTextAlignment;

/// CONTENT CONTROLS - For content on options pages
$optionsContentTextSize = get_field($sepPrefix . '_contents_font_size', 'options');
$optionsContentTextColor = get_field($sepPrefix . '_contents_font_color', 'options');
$optionsContentTextWeight = get_field($sepPrefix . '_contents_font_weight', 'options');
$optionsContentTextAlignment = get_field($sepPrefix . '_contents_text_alignment', 'options');
$optionsContentJustify = '';
$optionsContentTextClass = $optionsContentTextSize . ' ' . $optionsContentTextColor . ' ' . $optionsContentTextWeight . ' ' . $optionsContentTextAlignment;

// Convert text alignment to justify 
switch($optionsContentTextAlignment){
    case 'text-left':
        $optionsContentJustify = 'justify-content-start';
        break;
    case 'text-center':
        $optionsContentJustify = 'justify-content-center';
        break;
    case 'text-right':
        $optionsContentJustify = 'justify-content-end';
        break;
}

/// THEME MODS
$themeHeroTextColor = 'text-white';
$themeHeroTextColor = get_theme_mod( 'hero_text_color', 0 );

$themeHeroTitleSize  = 'font-md';
$themeHeroTitleSize = get_theme_mod( 'hero_h1_size', 0 );

$themeHeroContentSize = 'text-md';
$themeHeroContentSize = get_theme_mod('hero_header_content_size', 0);

$titleSize = textTitle($sepPrefix, size);
$titleColor = textTitle($sepPrefix, color);
$titleWeight = textTitle($sepPrefix, weight);
$titleAlign = textTitle($sepPrefix, alignment);

$titleClass = $titleSize . ' ' . $titleColor . ' ' . $titleWeight . ' ' . $titleAlign;


 