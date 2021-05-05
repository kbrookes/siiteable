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
					
					$cardType = get_sub_field('card_type');
					include $cardPartials . "card_content_controls.php";
					switch($cardType){
						case "manual":
							include $cardPartials . "card_custom.php";
							break;
						case "get-post":
							include $cardPartials . "card_post.php";
							break;
						case "multi-post":
							include $cardPartials . "card_custom.php";
							break;
					}
					
				 endwhile; ?>
			</div>
			<? } ?>
		</div>
	</div>
	<? if($addSeparatorLower == true):
		include $pathLower;
	endif; ?>
</section>