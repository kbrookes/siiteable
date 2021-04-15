<?php 
	
	
	$bg_colour = get_sub_field('box_background_colour');
	
	/// SET BG COLOUR
	$bgcolour = $bg_colour;
	
	
	/// SEPARATORS INIT
	
	$sepPrefix = 'card';
	$templatePath = get_template_directory();
	$separatorLayout = $templatePath . "/template-parts/kiss/static-partials/separators.php";
	
	/// TITLE CONTROLS
	$titleTextSize = get_sub_field('card_title_font_size');
	$titleTextColor = get_sub_field('card_title_font_color');
	$titleTextWeight = get_sub_field('card_title_font_weight');
	$titleTextAlignment = get_sub_field('card_title_text_alignment');
	$titleTextClass = $titleTextSize . ' ' . $titleTextColor . ' ' . $titleTextWeight . ' ' . $titleTextAlignment;
	
	/// TITLEs CONTROLS
	$titlesTextSize = get_sub_field('card_titles_font_size');
	$titlesTextColor = get_sub_field('card_titles_font_color');
	$titlesTextWeight = get_sub_field('card_titles_font_weight');
	$titlesTextAlignment = get_sub_field('card_titles_text_alignment');
	$titlesTextClass = $titlesTextSize . ' ' . $titlesTextColor . ' ' . $titlesTextWeight . ' ' . $titlesTextAlignment;
	
	/// CONTENT CONTROLS
	$contentTextSize = get_sub_field('card_contents_font_size');
	$contentTextColor = get_sub_field('card_contents_font_color');
	$contentTextWeight = get_sub_field('card_contents_font_weight');
	$contentTextAlignment = get_sub_field('card_contents_text_alignment');
	$contentTextClass = $contentTextSize . ' ' . $contentTextColor . ' ' . $contentTextWeight . ' ' . $contentTextAlignment;
	
	$cardBackgroundColor = get_sub_field('card_background_colour');
	$cardShadow = get_sub_field('card_background_shadow');
	
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
				echo '<h2 class="' . $titleTextClass . '">' . $blockTitle . '</h2>';
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
					<div class="cards-card <?= $cardBackgroundColor . ' ' . $cardShadow; ?>">
						<?php if(!empty($cardImage)): ?>
						<?php if($addButton){ ?><a class="<?php if($setLink=='form'): echo $linkClass; endif; ?>" href="<?php if($setLink=='email'):?>mailto:<?php endif; ?><?php echo $linkContent; ?>" <?php if($setLink=='link'):?>target="_blank"<?php endif; ?>><?php } ?>
							<div class="cards-card__header">
								<img src="<?php echo esc_url($cardImage['url']); ?>" alt="<?php echo esc_attr($cardImage['alt']); ?>" />
							</div>
							<?php if($addButton){ ?></a><?php } ?>
						<?php endif; ?>
						<div class="cards-card__content">
							<div class="cards-card__copy">
								<?php if(!empty($cardTitle)){ echo '<h3 class="' . $titlesTextClass . '">' . $cardTitle . '</h3>';} ?>
								<?php if(!empty($cardContent)){?>
								<div class="<?= $contentTextClass; ?>">
									<p> <?= $cardContent; ?></p>
								</div>
								<? } ?> 
							</div>
							<?php if($addButton){ ?>
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