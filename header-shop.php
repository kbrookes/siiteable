<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StrapPress
 */

$headerPosition = '';
if( get_theme_mod( 'lll_header_fixed', 'true' ) == 'true' ):
    $headerPosition = 'fixed-top';
endif;

$page_id = get_queried_object_id();

$headerBg = 'bg-dark';
if( get_theme_mod( 'lll_header_bg', '' ) != '' ):
    $headerBg = get_theme_mod( 'lll_header_bg', 0 );
endif;

$headerColor = 'navbar-dark';
if( get_theme_mod( 'lll_header_color', '' ) != '' ):
    $headerColor = get_theme_mod( 'lll_header_color', 0 );
endif;

/// Set whether the header will be transparent when loaded over a hero
// Also triggers scroll animations
$transparentForHero = 'headerOpaque';
if( get_theme_mod( 'lll_header_opacity', 'false' ) == 'true' ):
    $transparentForHero = 'headerTransparent';
endif;

/// ADD TO THE BODY CLASS
// BUTTON SETTINGS
$buttonType = get_theme_mod( 'button_styles');
$buttonStyle = get_theme_mod( 'border_radius', 0 );
$buttonClass = 'btnRounded-' . $buttonStyle . ' btnType-' . $buttonType;

$extraBodyClasses = 'noHero ' . $buttonClass;

$templatePath = get_template_directory();


?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class($extraBodyClasses); ?>>
<div id="page" class="site site-store">

	<header id="masthead" class="site-header" role="banner">
	    <? include $templatePath . "/template-parts/header/nav.php"; ?>
	</header><!-- #masthead -->
	

	<div id="content" class="site-content">
