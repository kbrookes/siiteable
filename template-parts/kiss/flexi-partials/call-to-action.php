<?php
	//$bg_colour = get_sub_field('cta_background_colour');
	
	// GENERAL INIT
	$sepPrefix = 'cta';
	$templatePath = get_template_directory();
	
	// GET THE BOX BACKGROUND COLOUR
	include $templatePath . "/template-parts/kiss/static-partials/box-background-color.php";
	
	
		
	// GET BUTTONS
	$addButton = false;
	if(get_sub_field($sepPrefix . '_button_add_button') == true):
		$addButton = true;
		include $templatePath . "/template-parts/kiss/static-partials/buttons.php";
		$btnColour = 'dark';
	endif;	
	
	/// SEPARATORS INIT
	$separatorLayout = $templatePath . "/template-parts/kiss/static-partials/separators.php";
	
	include $separatorLayout;
	
	/// OVERLAY SETUP
	$hasOverlay = false;
	$overlayColor = null;
	$overlayOpacity = null;
	$colorClass = '';
	$opacityClass = '';
	$overlayClass = '';
	
	if(get_sub_field($sepPrefix . '_add_image_overlay') == true):
	$hasOverlay = true;
	$overlayColor = get_sub_field($sepPrefix . '_overlay_colour');
	switch ($overlayColor) {
		case "None":
		$colorClass = 'overlay-dark';
		$btnColour = 'light';
		break;
		case "primary":
		$colorClass = 'overlay-primary';
		$btnColour = 'dark';
		break;
		case "secondary":
		$colorClass = 'overlay-secondary';
		$btnColour = 'dark';
		break;
		case "dark":
		$colorClass = 'overlay-dark';
		$btnColour = 'light';
		break;
		case "light":
		$colorClass = 'overlay-light';
		$btnColour = 'dark';
		break;
		case "white":
		$colorClass = 'overlay-white';
		$btnColour = 'light';
		break;
		case "alternate":
		$colorClass = 'overlay-alternate';
		$btnColour = 'dark';
		break;
	}
	$overlayOpacity = get_sub_field($sepPrefix . '_overlay_opacity');
	switch ($overlayOpacity) {
		case "None":
		$opacityClass = 'overlay-90';
		break;
		case "05":
		$opacityClass = 'overlay-05';
		break;
		case "15":
		$opacityClass = 'overlay-15';
		break;
		case "25":
		$opacityClass = 'overlay-25';
		break;
		case "35":
		$opacityClass = 'overlay-35';
		break;
		case "50":
		$opacityClass = 'overlay-50';
		break;
		case "65":
		$opacityClass = 'overlay-65';
		break;
		case "75":
		$opacityClass = 'overlay-75';
		break;
		case "85":
		$opacityClass = 'overlay-85';
		break;
		case "95":
		$opacityClass = 'overlay-95';
		break;
	}
	$overlayClass = 'hasOverlay ' . $colorClass . ' ' . $opacityClass;
	endif;
	
	$bgcolour = get_sub_field('box_background_colour');
	
	$ctaClass = get_sub_field('cta_class');
	
?>
<section id="ctaHome" class="cta <?php echo $bgcolour . ' ' . $separatorClasses . ' ' . $overlayClass . ' ' . $ctaClass; ?> <?php if(get_sub_field('cta_background_image')):?>hasBgImg<?php endif; ?>" <?php if(get_sub_field('cta_background_image')):?>style="background-image:url(<?php  the_sub_field('cta_background_image'); ?>)"<?php endif; ?>>
	<?php if($addSeparatorUpper == true):
		include $pathUpper;
	endif; ?>
	<div class="cta-wrap flexi-inner">
		<div class="container">
			<div class="cta-wrap__inner text-center">
				<?php if(get_sub_field('cta_title')):?>
					<h2><?php the_sub_field('cta_title'); ?></h2>
				<?php endif; ?>
				<?php if(get_sub_field('cta_content')):?>
				<div class="cta-wrap__content m-t__sm">
					<?php the_sub_field('cta_content'); ?>
				</div>
				<?php endif; ?>
				<?php if($addButton){ ?>
			<div class="list-icons__actions">
				<a class="btn-custom <?php echo $btnColour; ?>" <?php if($setLink=='form'):?>data-target="#<?php echo $dataTarget; ?>" data-toggle="modal"<? endif; ?> <?php if($setLink != 'form'): ?>href="<?php if($setLink=='email'):?>mailto:<?php endif; ?><?php echo $linkContent; ?>"<?php endif; ?> <?php if($setLink=='link'):?>target="_blank"<?php endif; ?>><?php if($linkText){ echo $linkText; } else { ?>LEARN HOW<?php } ?></a>
			</div>
			<?php } ?>	
			</div>
		</div>
	</div>
	<?php if($addSeparatorLower == true):
		include $pathLower;
	endif; ?>
</section>