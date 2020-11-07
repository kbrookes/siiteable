<?php
	
	// GENERAL INIT
	$templatePath = get_template_directory();
	$sepPrefix = 'editable';
	
	// GET THE BOX BACKGROUND COLOUR
	include $templatePath . "/template-parts/kiss/static-partials/box-background-color.php";
	
	// GET BACKGROUND IMAGE
	$bg_image = get_sub_field('background_image');
	
	// GET BUTTONS
	$addButton = false;
	if(get_sub_field($sepPrefix . '_button_add_button') == true):
		$addButton = true;
		include $templatePath . "/template-parts/kiss/static-partials/buttons.php";
	endif;
	
	/// CUSTOM CLASS
	$customClass = get_sub_field($sepPrefix.'_class');
	
		
	/// SEPARATORS INIT
	$separatorLayout = $templatePath . "/template-parts/kiss/static-partials/separators.php";
	
	include $separatorLayout;
	
	
	?>
<section class="editable-content <?php echo $bgcolour . ' ' . $separatorClasses . ' ' . $customClass; ?> <?php if(get_sub_field('background_image')):?> hasBg<?php endif; ?>" <?php if($bg_image): ?>style="background-image: url(<?php echo $bg_image; ?>);"<?php endif; ?>>
	<?php if($addSeparatorUpper == true):
		include $pathUpper;
	endif; ?>
	<div class="editable-content__inner flexi-inner">
		<div class="container">
			<?php if(get_sub_field('editable_title')):?>
			<h3><?php the_sub_field('editable_title'); ?></h3>
			<?php endif; ?>
			<div class="content-wrap">
				<?php if(the_sub_field('content_editor')) { ?>
		    			<?php the_sub_field('content_editor'); ?>
				<?php } ?>
			</div>
		<?php if($addButton){ ?>
			<div class="list-icons__actions">
				<a class="btn-custom <?php echo $btnColour; ?> <?php if($setLink=='form'): echo $linkClass; endif; ?>" href="<?php if($setLink=='email'):?>mailto:<?php endif; ?><?php echo $linkContent; ?>" <?php if($setLink=='link'):?>target="_blank"<?php endif; ?>><?php if($linkText){ echo $linkText; } else { ?>LEARN HOW<?php } ?></a>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php if($addSeparatorLower == true):
		include $pathLower;
	endif; ?>
</section>