<?php 
	
	/// SEPARATORS INIT
	
	$sepPrefix = 'tab';
	$templatePath = get_template_directory();
	$separatorLayout = $templatePath . "/template-parts/kiss/static-partials/separators.php";
	
	include $separatorLayout; 
	
	/// TAB TITLE & INTRO
	$tabTitle = get_sub_field($sepPrefix . '_title');
	$tabIntro = get_sub_field($sepPrefix . '_intro');
	
	/// TAB LAYOUT
	$tabLayout = get_sub_field($sepPrefix . '_layout');
	$colCount = '1';
	$colSize = '';
	if(!empty($tabLayout)){
		$colCount = 'colCount-' . $tabLayout['tab_text_columns'];
		if(!empty($tabLayout['tab_max_col_w']) && $colCount > 1){
			$colSize = 'style="-webkit-column-width: ' . $tabLayout['tab_max_col_w'] . 'px; -moz-column-width: ' . $tabLayout['tab_max_col_w'] . 'px;  column-width: ' . $tabLayout['tab_max_col_w'] . 'px;"';
		}
	}
	
	/// TAB COLOURS
	$tabColours = get_sub_field($sepPrefix . '_colours');
	$tabActiveBG = '';
	$tabInactiveBG = '';
	$tabFontActiveColour = '';
	$tabFontInactiveColour = '';
	$tabIconColour = '';
	$tabColourSetup = '';
	if(!empty($tabColours)){
		$tabActiveBG = 'activeBG-' . $tabColours['tab_main_bg'];
		$tabInactiveBG = 'inActiveBG-' . $tabColours['tab_inactive_bg'];
		$tabFontActiveColour = 'fontActive-' . $tabColours['tab_active_colour'];
		$tabFontInactiveColour = 'fontInactive-' . $tabColours['tab_inactive_colour'];
		$tabIconColour = 'iconColor-' . $tabColours['tab_icon_colour'];
		$tabColourSetup = $tabActiveBG . ' ' . $tabInactiveBG . ' ' . $tabFontActiveColour . ' ' . $tabFontInactiveColour . ' ' . $tabIconColour;
	}
	
	/// TAB FONTS
	$tabFonts = get_sub_field($sepPrefix . '_fonts');
	$tabFontSize = '1rem';
	$tabFontWeight = 'normal';
	$cardFontSize = '1rem';
	$iconSize = '4rem';
	$iconColClass = 'col-12 col-md-2';
	$contentColClass = 'col-12 col-md-10';
	if(!empty($tabFonts)){
		$tabFontSize = 'tabFontS-' . $tabFonts['tab_font_size'];
		$tabFontWeight = 'tabFontW-' . $tabFonts['tab_font_weight'];
		$cardFontSize = 'cardFontS-' . $tabFonts['content_font_size'];
		$iconSize = 'iconS-' . $tabFonts['tab_icon_size'];
		$tabFontSetup = $tabFontSize . ' ' . $tabFontWeight . ' ' . $cardFontSize . ' ' . $iconSize;
		switch($iconSize){
			case "iconS-xs":
				$iconColClass = 'col-12 col-md-1';
				$contentColClass = 'col-12 col-md-11';
				break;
			case "iconS-sm":
			   $iconColClass = 'col-12 col-md-2';
			   $contentColClass = 'col-12 col-md-10';
			   break;
			case "iconS-md":
			   $iconColClass = 'col-12 col-md-3';
			   $contentColClass = 'col-12 col-md-9';
			   break;
			case "iconS-lg":
			   $iconColClass = 'col-12 col-md-3';
			   $contentColClass = 'col-12 col-md-9';
			   break;
			case "iconS-xl":
			   $iconColClass = 'col-12 col-md-4';
			   $contentColClass = 'col-12 col-md-8';
			   break;
		}
	}
	
	// GET FONTAWESOME LIBRARY
	$faType = get_theme_mod( 'fa_styles');
	
	?>

<section class="tabbed-content  <?php echo $separatorClasses; ?>">
	<?php if($addSeparatorUpper == true):
		include $pathUpper;
	endif; ?>
	<div class="tabbed-content__inner flexi-inner <?php echo $tabColourSetup . ' ' . $tabFontSetup . ' ' . $colCount; ?>">
		<div class="container">
			<?php if(!empty($tabTitle)) {
				echo '<h2 class="tabbed-content__title">' . $tabTitle . '</h2>';
			}
			if(!empty($tabIntro)) {
				echo '<div class="tabbed-content__intro">' . $tabIntro . '</div>';
			} ?>
			<?php if( have_rows('tab_repeater') ): ?>
			<ul class="nav nav-tabs" id="tabRepeater">
				<?php
					$i = 0;
					$linkClass = '';
					while ( have_rows('tab_repeater') ) : the_row(); 
					$tabTitle = get_sub_field('tab_title');
				?>
				<li class="nav-item"><a class="nav-link <?php if($i == '0'): echo 'active'; endif; ?>" href="#tabID-<?php echo $i; ?>"  data-toggle="tab" role="tab" aria-controls="tabID-<?php echo $i; ?>" aria-selected="<?php if($i == '0'): echo 'true'; else: echo 'false'; endif; ?>"><?php echo $tabTitle; ?></a></li>
				<?php 
					$i = $i + 1;
					endwhile ?>
			</ul>
			<div class="tab-content" id="tabRepeaterContent">
				<?php 
					$tabCount = 0;
					while ( have_rows('tab_repeater') ) : the_row(); 
					$tabContent = get_sub_field('tab_content');
					$tabTitle = get_sub_field('tab_title');
				?>
				<div class="card tab-pane fade <?php if($tabCount == '0'): echo 'show active'; endif; ?>" id="tabID-<?php echo $tabCount; ?>" role="tabpanel" aria-labelledby="<?php the_sub_field('tab_title'); ?>">
					<div class="card-header" role="tab" id="heading-<?php echo $tabCount; ?>">
						<h4><a data-toggle="collapse" href="#collapse-<?php echo $tabCount; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $tabCount; ?>" ><i class="<?= $faType; ?> fa-chevron-right"></i> <?php echo $tabTitle; ?></a></h4>
					</div>
					<div id="collapse-<?php echo $tabCount; ?>" class="collapse <?php if($tabCount == '0'): ?>show<?php endif; ?>" data-parent="#content" role="tabpanel" aria-labelledby="heading-<?php echo $tabCount; ?>">
						<div class="card-body">
							<div class="row">
								<?php if(get_sub_field('tab_content_icon')): ?>
								<div class="<?php echo $iconColClass; ?>">
									<div class="tabbed-content__icon">
										<?php the_sub_field('tab_content_icon'); ?>
									</div>
								</div>
								<?php endif; ?>
								<div class="<?php echo $contentColClass; ?>">
									<div class="tabbed-content__copy" <?php echo $colSize; ?>>
										<?php the_sub_field('tab_content'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php 
				$tabCount = $tabCount + 1;
				endwhile ?>
			</div>
			<?php endif; ?>
		</div>			
	</div>
	<?php if($addSeparatorLower == true):
		include $pathLower;
	endif; ?>
</section>