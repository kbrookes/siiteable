<?php 
	
	
	$bg_colour = get_sub_field('box_background_colour');
	
	/// SET BG COLOUR
	$bgcolour = $bg_colour;
	
	
	/// SEPARATORS INIT
	
	$sepPrefix = 'card';
	$templatePath = get_template_directory();
	$separatorLayout = $templatePath . "/template-parts/kiss/static-partials/separators.php";
	
	/// GET GENERAL
	$blockTitle = get_sub_field($sepPrefix . '_block_title');
	$colCount = get_sub_field($sepPrefix . '_columns');
	$containerSize = get_sub_field($sepPrefix . '_container_size');
	if(!empty($containerSize)){
		
	} else {
		$containerSize = 'container';
	}
	
	include $separatorLayout;
	
	/// GET CUSTOM CLASS
	$customClass = '';
	if(get_sub_field($sepPrefix . '_class')){
		$customClass = (get_sub_field($sepPrefix . '_class'));
	}
	
	// GET BUTTONS
	$addButton = false;
	if(get_sub_field($sepPrefix . '_button_add_button') == true):
		$addButton = true;
		include $templatePath . "/template-parts/kiss/static-partials/buttons.php";
	endif;
	
	$btnColour = 'light';
	
	/// DIRECTION
	$containerDirection = 'text-' . get_sub_field($sepPrefix . '_container_direction');
	
	
	?>

<section class="cards-layout <?php echo $bgcolour . ' ' . $separatorClasses . ' ' . $containerDirection . ' ' . $customClass; ?>">
	<div class="cards-layout__inner">
		<div class="<?php echo $containerSize; ?>">
			<?php if(!empty($blockTitle)){
				echo '<h2>' . $blockTitle . '</h2>';
			} ?>
			<?php if(have_rows($sepPrefix . '_add_cards'))	{?>
			<div class="row">
				<?php while (have_rows($sepPrefix . '_add_cards')) : the_row(); 
					
					$cardImage = get_sub_field($sepPrefix . '_image');
					$cardTitle = get_sub_field($sepPrefix . '_title');
					$cardContent = get_sub_field($sepPrefix . '_content');
					
					// GET BUTTONS
					$addButton = false;
					if(get_sub_field($sepPrefix . '_button_add_button') == true):
					$addButton = true;
					include $templatePath . "/template-parts/kiss/static-partials/buttons.php";
					$btnColour = 'light';
					endif;	
				?>
				<div class="<?php echo $colCount; ?>">
					<div class="cards-card">
						<?php if(!empty($cardImage)): ?>
						<?php if($addButton){ ?><a class="<?php if($setLink=='form'): echo $linkClass; endif; ?>" href="<?php if($setLink=='email'):?>mailto:<?php endif; ?><?php echo $linkContent; ?>" <?php if($setLink=='link'):?>target="_blank"<?php endif; ?>><?php } ?>
							<div class="cards-card__header">
								<img src="<?php echo esc_url($cardImage['url']); ?>" alt="<?php echo esc_attr($cardImage['alt']); ?>" />
							</div>
							<?php if($addButton){ ?></a><?php } ?>
						<?php endif; ?>
						<div class="cards-card__content">
							<div class="cards-card__copy">
								<?php if(!empty($cardTitle)){ echo '<h3>' . $cardTitle . '</h3>';} ?>
								<?php if(!empty($cardContent)){
									echo '<p>' . $cardContent . '</p>'; 
								} ?>
								<?php if($addButton){ ?>
							</div>
							<div class="cards-card__actions">
								<a class="btn-custom btn-sm <?php echo $btnColour; ?> <?php if($setLink=='form'): echo $linkClass; endif; ?>" href="<?php if($setLink=='email'):?>mailto:<?php endif; ?><?php echo $linkContent; ?>" <?php if($setLink=='link'):?>target="_blank"<?php endif; ?>><?php if($linkText){ echo $linkText; } else { ?>LEARN HOW<?php } ?></a>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
			<?php } ?>
		</div>
	</div>
</section>