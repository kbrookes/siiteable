<? 
	/// PATHS & INCLUDES INIT
	
	$sepPrefix = 'card';
	$templatePath = get_template_directory();
	$templatePartials = $templatePath . '/template-parts/kiss/static-partials/';
	$cardPartials = $templatePath . '/template-parts/kiss/flexi-partials/cards/';
	$faType = get_theme_mod( 'fa_styles');
	
	/// SEPARATORS
	$separatorLayout = $templatePartials . 'separators.php';
	include $separatorLayout;
	
	/// TEXT CONTROLS
	include $templatePartials . 'text-controls.php';
	
	/// ICON CONTROLS
	include $templatePartials . 'icon-controls.php';
	
	/// CARD BACKGROUND IMAGE
	$cardBackgroundColor = get_sub_field($sepPrefix . '_background_colour');
	$cardBackgroundImage = get_sub_field($sepPrefix . '_bg_image');
	
	if(get_sub_field($sepPrefix . '_overlay_add_overlay', 'options') == true):
		include $templatePartials . "overlay-partial.php";
		$hasOverly = true;
	endif;
	
	/// GET GENERAL
	$colCount = get_sub_field($sepPrefix . '_columns');
	$cardDirection = get_sub_field($sepPrefix . '_image_position');
	
	// Custom classes, container directionp & size, title, text
	include $templatePartials . 'general-partials.php';
	
	$cardDesign = get_sub_field($sepPrefix . '_design');
	
	$imageColXs = get_sub_field($sepPrefix . '_col_xs');
	$imageColSm = get_sub_field($sepPrefix . '_col_sm');
	$imageColMd = get_sub_field($sepPrefix . '_col_md');
	$imageColLg = get_sub_field($sepPrefix . '_col_lg');
	$imageColXl = get_sub_field($sepPrefix . '_col_xl');
	
	/// REMOVE VERTICAL PADDING
	$paddingY = get_sub_field($sepPrefix . '_remove_padding');
	if($paddingY == true){
		$paddingY = 'py-0';
	} else {
		$paddingY = '';
	}
	
	$gutters = get_sub_field($sepPrefix . '_no_gutters');
	if($gutters == true):
		$gutters = ' no-gutters';
	endif;
	
	$cardBottomMargin = get_sub_field($sepPrefix . '_bottom_margin');
	
	?>

<section class="cards-layout <?= $bgcolour . ' ' . $separatorClasses . ' ' . $containerDirection . ' ' . $paddingY . ' ' . $customClass . ' ' . $overlayClass; ?>">
	<? if($addSeparatorUpper == true):
		include $pathUpper;
	endif; ?>
	
	<? if(!empty($cardBackgroundImage)):?>
	<picture class="cards-layout__bgimage">
		<img class="of-cover" <? siiteable_responsive_image($cardBackgroundImage['id'],'full_size','100vw'); ?>" alt="" style="object-fit: cover;" />
	</picture>
		<? if($hasOverlay):?>
	<div class="position-absolute w-100 h-100 top-0 <? echo $colorClass . ' opacity-' . $overlayOpacity; ?>"></div>
		<? endif; ?>
	<? endif; ?>
	<div class="cards-layout__inner">
		<div class="<?= $containerSize; ?>">
			<?
			if(!empty($blockTitle)){
				echo '<h2 class="' . $titleTextClass . '">' . $blockTitle . '</h2>';
			} 
			//var_dump(get_field_objects());
			if(!empty($blockIntro)){?>
			<div class="<?= $introTextClass; ?> mb-4">
				<?= $blockIntro; ?>
			</div>	
			<?
			}
			?>
			
			<? if(have_rows($sepPrefix . '_add_cards'))	{
				$cardCount = 0;
			?>
			<div class="row <?= $gutters . ' ' . $cardBottomMargin; ?>">
				<? while (have_rows($sepPrefix . '_add_cards')) : the_row(); 
					
					if($cardDirection == 'order-last'){
						$cardOrder = $cardDirection;
					} elseif($cardDirection == 'order-first') {
						$cardOrder = 'order-last order-md-first';
					} else {
						$cardCount++;
						$even_odd_class = ( ($cardCount % 2) == 0 ) ? "even" : "odd"; 
						if($even_odd_class == 'even'){
							$cardOrder = 'order-last';
							//$cardDirection = 'order-last';
						} else {
							$cardOrder = 'order-last order-md-first';
							//$cardDirection = 'order-first';
						}
					
					}
					
					$cardType = get_sub_field('card_type');
					include $cardPartials . "card_content_controls.php";
					switch($cardType){
						case "manual":
							include $cardPartials . "card_post.php";
							break;
						case "get-post":
							include $cardPartials . "card_post.php";
							break;
						case "multi-post":
							include $cardPartials . "card_custom.php";
							break;
						case "momentum":
						include $cardPartials . "card_post.php";
						break;
					};
				 endwhile; ?>
			</div>
			<? }
			
			// GET CONTAINER BUTTON
			$addButton = false;
			$sepPrefix = $sepPrefix . '_intro';
			if(get_sub_field($sepPrefix . '_button_add_button') == 1):
				include $templatePartials . "buttons.php";
			endif;
			include $templatePartials . "add-button.php";
			?>
		</div>
	</div>
	<? if($addSeparatorLower == true):
		include $pathLower;
	endif;
	 ?>
</section>