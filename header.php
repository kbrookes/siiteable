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

$headerBgScrolled = 'bg-dark';
if( get_theme_mod( 'lll_header_bg_scroll', '' ) != '' ):
	$headerBgScrolled = get_theme_mod( 'lll_header_bg_scroll', 0 );
endif;

$headerColor = 'navbar-dark';
if( get_theme_mod( 'lll_header_color', '' ) != '' ):
	$headerColor = get_theme_mod( 'lll_header_color', 0 );
endif;

$headerColorScrolled = 'navbar-dark';
if( get_theme_mod( 'lll_header_color_scroll', '' ) != '' ):
	$headerColorScrolled = get_theme_mod( 'lll_header_color_scroll', 0 );
endif;

/// Set whether the header will be transparent when loaded over a hero
// Also triggers scroll animations
$transparentForHero = 'headerOpaque';
if( get_theme_mod( 'lll_header_opacity', 'false' ) == 'true' ):
	$transparentForHero = 'headerTransparent';
endif;

/// WHICH NAVIGATION
$navType = 'nav_standard';
$navType = (get_theme_mod('lll_hero_header_navtype', 'false'));

/// ADD TO THE BODY CLASS
// BUTTON SETTINGS
$buttonType = get_theme_mod( 'button_styles', 0);
$buttonStyle = get_theme_mod( 'border_radius', 0 );
$buttonClass = 'btnRounded-' . $buttonStyle . ' btnType-' . $buttonType;

$extraBodyClasses = 'noHero ' . $buttonClass;

$headerType = get_field('header_colour', $post->ID);

$analyticsStandardID = get_theme_mod('analytics_standard', 0);
$analyticsLO = get_theme_mod('analytics_luckyorange', 0);

// GET FONTAWESOME LIBRARY
$faType = get_theme_mod( 'fa_styles');

$templatePath = get_template_directory();

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<? if(!empty($analyticsStandardID)): ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= $analyticsStandardID; ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?= $analyticsStandardID; ?>');
</script>
<? endif; ?>
<? if(!empty($analyticsLO)): ?>
<script type='text/javascript'>
	window.__lo_site_id = <?= $analyticsLO; ?>;
	
		(function() {
			var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;
			wa.src = 'https://d10lpsik1i8c69.cloudfront.net/w.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);
		  })();
		</script>
<? endif; ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

<script type="module" src="https://cdn.jsdelivr.net/npm/@justinribeiro/lite-youtube@0.6.2/lite-youtube.js"></script>

</head>

<body <?php body_class($extraBodyClasses); ?> >
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">
		<? include $templatePath . '/template-parts/header/' . $navType . '.php'; ?>
		<script>
			jQuery(document).ready(function($) {
				// ADD SCROLL CLASSES TO NAVBAR
				$(function() {
					$('#main-nav').data('size', 'big');
				});
			
				$(window).scroll(function() {
					if ($(document).scrollTop() > 0) {
						if ($('#main-nav').data('size') == 'big') {
							$('#main-nav').data('size', 'small');
							$('#main-nav').addClass('navScrolled');
							$('#main-nav').removeClass('notScrolled');
							$('#main-nav').removeClass('<?php echo $headerBg; ?>');
							$('#main-nav').addClass('<?php echo $headerBgScrolled; ?>');
							$('#main-nav').removeClass('<?php echo $headerColor; ?>');
							$('#main-nav').addClass('<?php echo $headerColorScrolled; ?>');
						}
					} else {
						if ($('#main-nav').data('size') == 'small') {
							$('#main-nav').data('size', 'big');
							$('#main-nav').removeClass('navScrolled');
							$('#main-nav').addClass('notScrolled');
							$('#main-nav').removeClass('<?php echo $headerBgScrolled; ?>');
							$('#main-nav').addClass('<?php echo $headerBg; ?>');
							$('#main-nav').removeClass('<?php echo $headerColorScrolled; ?>');
							$('#main-nav').addClass('<?php echo $headerColor; ?>');
						}
					}
				});
			});
			
		</script>
	</header><!-- #masthead -->

	<?php 
		if(get_field('hero_title') || get_field('hero_image') || get_the_post_thumbnail_url($page_id) || get_field('hero_content') || get_field('hero-button') || get_archive_thumbnail_src() ):
			get_template_part( 'template-parts/kiss/static-partials/hero-header' );
		endif;
	?>

	<div id="content" class="site-content">
