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

/// ADD TO THE BODY CLASS
// BUTTON SETTINGS
$buttonType = get_theme_mod( 'button_styles');
$buttonStyle = get_theme_mod( 'border_radius', 0 );
$buttonClass = 'btnRounded-' . $buttonStyle . ' btnType-' . $buttonType;

$extraBodyClasses = 'noHero ' . $buttonClass;

$headerType = get_field('header_colour', $post->ID);

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class($extraBodyClasses); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">
	    <nav id="main-nav" class="navbar navbar-expand-lg <?php echo $headerColor . ' ' . $headerBg . ' ' . $headerPosition . ' ' . $transparentForHero . ' ' . $headerType; ?> notScrolled">
	    	<div class="container">
				<div class="navbar-brand mb-0">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="wpsvg-inline">
						<svg height='100px' width='100px'  fill="#445c6d" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" version="1.1" style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;" viewBox="0 0 333 333" x="0px" y="0px" fill-rule="evenodd" clip-rule="evenodd">
						  <g>
							<g>
							  <path class="logo-fill" d="M196 105l-17 30 34 0 19 32 0 0 15 26 -92 -1 -34 -59 46 -79 29 51zm-13 0l-16 -28 -33 56 28 48 65 1 -20 -36 -48 0 24 -41z"></path>
							  <path class="logo-fill" d="M232 279l14 -24 -56 -1 -33 -58 92 1 48 82 -65 0zm20 -11l25 0 -13 -22 -12 22zm11 -25l-21 -35 -66 0 21 35 66 0z"></path>
							  <polygon class="logo-fill" points="118,138 200,279 167,279 134,279 114,245 94,279 37,279 102,167 102,167 "></polygon>
							</g>
						  </g>
						</svg>
					</a>
				</div>
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
		   		<div class="collapse navbar-collapse" id="navbarNav">
	            <?php
	            $args = array(
	              'theme_location' => 'primary',
	              'depth'      => 2,
	              'container'  => false,
	              'menu_class'     => 'navbar-nav ml-auto',
	              'walker'     => new Bootstrap_Walker_Nav_Menu()
	              );
	            if (has_nav_menu('primary')) {
	              wp_nav_menu($args);
	            }
	            ?>
	          </div>

	        </div>
		</nav>
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

	<?php if(get_field('hero_title') || get_field('hero_image') || get_the_post_thumbnail_url($page_id) || get_field('hero_content') || get_field('hero-button')):
		get_template_part( 'template-parts/kiss/static-partials/hero-header' );
	endif; ?>

	<div id="content" class="site-content">
