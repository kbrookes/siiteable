<? 
	/// PATHS & INCLUDES INIT
	
	$sepPrefix = 'card';
	$templatePath = get_template_directory();
	$templatePartials = $templatePath . '/template-parts/kiss/static-partials/';
	$faType = get_theme_mod( 'fa_styles');
	
	/// SEPARATORS
	$separatorLayout = $templatePartials . 'separators.php';
	include $separatorLayout;
	
	/// TEXT CONTROLS
	include $templatePartials . 'text-controls.php';
	
	$cardBackgroundColor = get_sub_field($sepPrefix . '_background_colour');
	
	/// GET GENERAL
	$colCount = get_sub_field($sepPrefix . '_columns');
	// Custom classes, container direction & size, title, text
	include $templatePartials . 'general-partials.php';
	
	// GET BUTTONS
	$addButton = false;
	if(get_sub_field($sepPrefix . '_button_add_button') == true):
		include $templatePartials . "buttons.php";
	endif;
	
	?>

<section class="cards-layout <?= $bgcolour . ' ' . $separatorClasses . ' ' . $containerDirection . ' ' . $customClass; ?>">
	<? if($addSeparatorUpper == true):
		include $pathUpper;
	endif; ?>
	<div class="cards-layout__inner">
		<div class="<?= $containerSize; ?>">
			<? if(!empty($blockTitle)){
				echo '<h2 class="' . $titleTextClass . '">' . $blockTitle . '</h2>';
			} ?>
			<? if(have_rows($sepPrefix . '_add_cards'))	{?>
			<div class="row">
				<? while (have_rows($sepPrefix . '_add_cards')) : the_row(); 
					
					$imageType = get_sub_field($sepPrefix . '_image_type');
					$imageClass = 'w-full';
					switch($imageType){
						case 'image':
							$cardImage = get_sub_field($sepPrefix . '_image');
							$imageEl = '<img src="' . esc_url($cardImage['url']) .'" alt="' . esc_attr($cardImage['alt']) . '" class="' . $imageClass . '" />';
							break;
						case 'svg':
							$cardImage = get_sub_field($sepPrefix . '_image_svg');
							$imageClass = $imageClass . ' style-svg';
							$imageEl = '<img src="' . esc_url($cardImage['url']) .'" class="' . $imageClass . '" />';
							break;
						case 'icon':
							$cardImage = get_sub_field($sepPrefix . '_image_icon');
							$imageEl = '<i class="' . $faType . ' ' . $cardImage . '"></i>';
							break;
						case 'bg-image':
							$cardImage = get_sub_field($sepPrefix . '_image');
							$image = $cardImage['url'];
					}
					if(!empty(get_sub_field($sepPrefix . '_title'))):
						$title = '<h3 class="' . $titlesTextClass . '">' . get_sub_field($sepPrefix . '_title') . '</h3>';
					endif;
					if(!empty(get_sub_field($sepPrefix . '_sub_title'))):
						$subTitle = '<h4 class="' . $titlesTextClass . '">' . get_sub_field($sepPrefix . '_sub_title') . '</h4>';
					endif;
					$titlePos = get_sub_field($sepPrefix . '_title_position');
					$cardContent = get_sub_field($sepPrefix . '_content');
					
					// GET BUTTONS
					$addButton = get_sub_field($sepPrefix . '_button');
					$showButton = $addButton['add_button'];
					if($showButton != false):
						include $templatePartials . "/buttons-array.php";
					endif;	
					
					//$field = get_field_object('field_5f2cc020856fd');
					
					$hasOverlay = false;
					if(get_sub_field($sepPrefix . '_overlay_add_overlay') == true):
						include $templatePartials . "overlay-partial.php";
					endif;
					
				?>
				<div class="<?= $colCount; ?>">
					<div class="cards-card <?= $cardBackgroundColor . ' ' . $shadow; ?>">
						<? if($imageType == 'bg-image'):
							include $templatePartials . "image-ratio-box.php";
						elseif(!empty($cardImage)): ?>
						<?= $btnLinkOpen; ?>
							<div class="cards-card__header">
								<?= $imageEl; ?>
							</div>
						<?= $btnLinkClose; ?>
						<? endif; ?>
						<div class="cards-card__content">
							<div class="cards-card__copy">
								<? if($titlePos == false):
									echo $title;
									echo $subTitle;
								endif; ?>
								<? if(!empty($cardContent)){?>
								<div class="<?= $contentTextClass; ?>">
									<?= wpautop($cardContent); ?>
								</div>
								<? } ?> 
							</div>
							<? include $templatePartials . "add-button.php"; ?>
						</div>
					</div>
				</div>
				<? endwhile; ?>
			</div>
			<? } ?>
		</div>
	</div>
	<? if($addSeparatorLower == true):
		include $pathLower;
	endif; ?>
</section>