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
	
	$cardBackgroundColor = get_sub_field($sepPrefix . '_background_colour');
	
	/// GET GENERAL
	$colCount = get_sub_field($sepPrefix . '_columns');
	$cardDirection = get_sub_field($sepPrefix . '_image_position');
	
	// Custom classes, container directionp & size, title, text
	include $templatePartials . 'general-partials.php';
	
	$cardDesign = get_sub_field($sepPrefix . '_design');
	
	?>

<section class="cards-layout <?= $bgcolour . ' ' . $separatorClasses . ' ' . $containerDirection . ' ' . $customClass; ?>">
	<? if($addSeparatorUpper == true):
		include $pathUpper;
	endif; ?>
	<div class="cards-layout__inner">
		<div class="<?= $containerSize; ?>">
			<?
			if(!empty($blockTitle)){
				echo '<h2 class="' . $titleTextClass . '">' . $blockTitle . '</h2>';
			} 
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
			<div class="row mb-4">
				<? while (have_rows($sepPrefix . '_add_cards')) : the_row(); 
					
					if($cardDirection == 'alternating'):
						if($cardCount % 2 == 0):
							$cardDirection = 'order-last';
						else:
							$cardDirection = 'order-first';
						endif;
					endif;
					
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
					}
					$cardCount++;
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
	endif; ?>
</section>