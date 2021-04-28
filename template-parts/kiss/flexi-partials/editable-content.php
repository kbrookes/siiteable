<?php
	
	// GENERAL INIT
	$sepPrefix = 'editable';
	$templatePath = get_template_directory();
	$templatePartials = $templatePath . '/template-parts/kiss/static-partials/';
	
	// GET THE BOX BACKGROUND COLOUR
	include $templatePartials . "box-background-color.php";
	
	/// TEXT CONTROLS
	include $templatePartials . 'text-controls.php';
	
	// GET BACKGROUND IMAGE
	$bg_image = get_sub_field('background_image');
	
	// GET BUTTONS
	$addButton = false;
	if(get_sub_field($sepPrefix . '_button_add_button') == true):
		include $templatePartials . "buttons.php";
	endif;
		
	/// SEPARATORS
	$separatorLayout = $templatePartials . "separators.php";
	include $separatorLayout;
	
	?>
<section class="editable-content <?php echo $bgcolour . ' ' . $separatorClasses . ' ' . $containerDirection . ' ' . $customClass; ?> <?php if(get_sub_field('background_image')):?> hasBg<?php endif; ?>" <?php if($bg_image): ?>style="background-image: url(<?php echo $bg_image; ?>);"<?php endif; ?>>
	<?php if($addSeparatorUpper == true):
		include $pathUpper;
	endif; ?>
	<div class="editable-content__inner flexi-inner">
		<div class="container">
			<?php if(get_sub_field('editable_title')):?>
			<h2 class="<?= $titleTextClass; ?>" ><?php the_sub_field('editable_title'); ?></h2>
			<?php endif; ?>
			<div class="content-wrap <?= $contentTextClass; ?>">
				<?php if(the_sub_field('content_editor')) { ?>
		    			<?php wpautop(the_sub_field('content_editor')); ?>
				<?php } ?>
			</div>
			<? if($addButton){ ?>
			<div class="cards-card__actions <?= $buttonAlign; ?>">
				<a class="btn-custom <?= $btnClass; ?>" 
				href="<? if($setLink=='email'):?>mailto:<? endif; ?><?= $linkContent; ?>" 
				<? if($setLink=='link'):?>target="_blank"<? endif; ?>>
					<?= $linkText; ?>
				</a>
			</div>
			<? } ?>
		</div>
	</div>
	<?php if($addSeparatorLower == true):
		include $pathLower;
	endif; ?>
</section>