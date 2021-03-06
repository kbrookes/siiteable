<?
	
	// GENERAL INIT
	$sepPrefix = 'cta';
	$templatePath = get_template_directory();
	$templatePartials = $templatePath . '/template-parts/kiss/static-partials/';
	
	// GET THE BOX BACKGROUND COLOUR
	include $templatePartials . "box-background-color.php";
		
	// GET BUTTONS
	$addButton = false;
	if(get_sub_field($sepPrefix . '_button_add_button') == true):
		include $templatePartials . "buttons.php";
	endif;	
	
	/// SEPARATORS
	$separatorLayout = $templatePartials . "separators.php";
	include $separatorLayout;
	
	/// OVERLAY SETUP
	$hasOverlay = false;
	if(get_sub_field($sepPrefix . '_add_image_overlay') == true):
		include $templatePartials . "overlay-partial.php";
	endif;
	
	// Custom classes, container direction & size, title, text
	include $templatePartials . 'general-partials.php';
	
	/// TEXT CONTROLS
	include $templatePartials . 'text-controls.php';
	
?>
<section id="ctaHome" class="cta <?= $bgcolour . ' ' . $separatorClasses . ' ' . $overlayClass . ' ' . $containerDirection . ' ' . $boxPaddingCss . ' ' . $customClass; ?> <? if(get_sub_field('cta_background_image')):?>hasBgImg<? endif; ?>" <? if(get_sub_field('cta_background_image')):?>style="background-image:url(<?  the_sub_field('cta_background_image'); ?>)"<? endif; ?>>
	<? if($addSeparatorUpper == true):
		include $pathUpper;
	endif; ?>
	<div class="cta-wrap flexi-inner">
		<div class="container">
			<div class="cta-wrap__inner">
				<? if(get_sub_field('cta_block_title')):?>
					<h2 class="<?= $titleTextClass; ?>"><? the_sub_field('cta_block_title'); ?></h2>
				<? endif; ?>
				<? if(get_sub_field('cta_content')):?>
				<div class="cta-wrap__content m-t__sm <?= $introTextClass; ?>">
					<? the_sub_field('cta_content'); ?>
				</div>
				<? endif; ?>
				<? include $templatePartials . "add-button.php"; ?>
			</div>
		</div>
	</div>
	<? if($addSeparatorLower == true):
		include $pathLower;
	endif; ?>
</section>