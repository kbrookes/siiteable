<?
	
	// GENERAL INIT
	$sepPrefix = 'cta';
	$templatePath = get_template_directory();
	
	// GET THE BOX BACKGROUND COLOUR
	include $templatePath . "/template-parts/kiss/static-partials/box-background-color.php";
		
	// GET BUTTONS
	$addButton = false;
	$buttonAlign = 'text-left';
	//$repeater_value = get_post_meta( get_the_ID(), 'available_boxes', true);
	
	if(get_sub_field($sepPrefix . '_button_add_button') == true):
		$addButton = true;
		$buttonAlign = 'text-' . get_sub_field($sepPrefix . '_button_alignment');
		include $templatePath . "/template-parts/kiss/static-partials/buttons.php";
	endif;	
	
	/// SEPARATORS INIT
	$separatorLayout = $templatePath . "/template-parts/kiss/static-partials/separators.php";
	
	include $separatorLayout;
	
	/// OVERLAY SETUP
	$hasOverlay = false;
	$overlayColor = null;
	$overlayOpacity = null;
	
	if(get_sub_field($sepPrefix . '_add_image_overlay') == true):
		$hasOverlay = true;
		$overlayColor = get_sub_field($sepPrefix . '_overlay_colour');
		$overlayOpacity = get_sub_field($sepPrefix . '_overlay_opacity');	
		include $templatePath . "/template-parts/kiss/static-partials/overlay-partial.php";
		$overlayClass = 'hasOverlay ' . $colorClass . ' ' . $opacityClass;
	endif;
	
	
	$bgcolour = get_sub_field('box_background_colour');
	
	$ctaClass = get_sub_field('cta_class');
	
	/// DIRECTION
	$containerDirection = 'text-' . get_sub_field($sepPrefix . '_container_direction');
	
	/// TEXT CONTROL
	$textSize = get_sub_field('font_size');
	$textColor = get_sub_field('font_color');
	$textWeight = get_sub_field('font_weight');
	$textAlignment = get_sub_field('text_alignment');
	$textClass = $textSize . ' ' . $textColor . ' ' . $textWeight . ' ' . $textAlignment;
	
?>
<section id="ctaHome" class="cta <?= $bgcolour . ' ' . $separatorClasses . ' ' . $overlayClass . ' ' . $containerDirection . ' ' . $ctaClass; ?> <? if(get_sub_field('cta_background_image')):?>hasBgImg<? endif; ?>" <? if(get_sub_field('cta_background_image')):?>style="background-image:url(<?  the_sub_field('cta_background_image'); ?>)"<? endif; ?>>
	<? if($addSeparatorUpper == true):
		include $pathUpper;
	endif; ?>
	<div class="cta-wrap flexi-inner">
		<div class="container">
			<div class="cta-wrap__inner">
				<? if(get_sub_field('cta_title')):?>
					<h2 class="<?= $textClass; ?>"><? the_sub_field('cta_title'); ?></h2>
				<? endif; ?>
				<? if(get_sub_field('cta_content')):?>
				<div class="cta-wrap__content m-t__sm <?= $textClass; ?>">
					<? the_sub_field('cta_content'); ?>
				</div>
				<? endif; ?>
				<? if($addButton){ ?>
			<div class="list-icons__actions <?= $buttonAlign; ?>">
				<a class="btn-custom <?= $btnColor; ?>" <? if($setLink=='form'):?>data-target="#<?= $dataTarget; ?>" data-toggle="modal"<? endif; ?> <? if($setLink != 'form'): ?>href="<? if($setLink=='email'):?>mailto:<? endif; ?><?= $linkContent; ?>"<? endif; ?> <? if($setLink=='link'):?>target="_blank"<? endif; ?>><? if($linkText){ echo $linkText; } else { ?>LEARN HOW<? } ?></a>
			</div>
			<? } ?>	
			</div>
		</div>
	</div>
	<? if($addSeparatorLower == true):
		include $pathLower;
	endif; ?>
</section>