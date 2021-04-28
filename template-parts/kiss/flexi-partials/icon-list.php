<?php
	/// GENERAL INIT
	$sepPrefix = 'licons';
	$templatePath = get_template_directory();
	$templatePartials = $templatePath . '/template-parts/kiss/static-partials/';
	
	// GET THE BOX BACKGROUND COLOUR
	include $templatePartials . "box-background-color.php";
	
	// GET BUTTONS
	$addButton = false;
	if(get_sub_field($sepPrefix . '_button_add_button') == true):
		include $templatePartials . "buttons.php";
	endif;	
	
	/// SEPARATORS
	$separatorLayout = $templatePartials . "separators.php";
	include $separatorLayout;
	
	/// TEXT CONTROLS
	include $templatePartials . 'text-controls.php';
	
	/// BLOCK SPECIFIC 
	$blockLayout = get_sub_field('list_icon_layout');	
	$blockDirection = $blockLayout['direction'];
	$blockLayoutRow = 'row-vertical';
	$blockLayoutCols = 'col-12';
	$blockContainer = $blockLayout['container_size'];
	$blockAlignment = $blockLayout['box_alignment'];
	$blockBG = $blockLayout['bg_Image_boxes'];
	$blockIconSize = $blockLayout['icon_size'];
	
	if($blockDirection == 'column'):
		$blockLayoutRow = 'row-vertical';
	elseif($blockDirection == 'row'):
		$blockLayoutRow = $blockDirection;
		$blockColumns = $blockLayout['columns'];
		$blockLayoutCols = $blockColumns;
	endif;
	
	/// GET BLOCK ASPECT RATIO
	$blockAR = 'square';
	if($blockLayout['block_aspect_ratio']){
		$blockAR = $blockLayout['block_aspect_ratio'];
	}
	
	/// GET ICON SIZE
	$iconSize = 'medium';
	if(!empty($blockIconSize)) {
		$iconSize = $blockIconSize;
	}
	
	/// STYLES
	// Overlays
	$hasOverlay = $blockLayout['icon_box_overlay'];
	if($hasOverlay){
		$overlayColour = $blockLayout['icon_box_overlay_colour'];
	} else {
		$overlayColour = null;
	}
	
	$overlayOpacity = null;
	$overlayOpacity = $blockLayout['icon_box_overlay_opacity'];
	
	// Backgrounds
	$hasBackground = $blockLayout['icon_box_background'];
	if($hasBackground) {
		$backgroundColour = $blockLayout['icon_box_background_colour'];
	} else {
		$backgroundColour = null;
	}
	
	$deviceSmall = '';
	if( get_theme_mod( 'siiteable_device_small', '' ) != '' ):
		$deviceSmall = get_theme_mod( 'siiteable_device_small', 0 );
	endif;
	
	
	// Padding
	$boxPadding = "p-0";
	$boxPadding = $blockLayout['icon_box_padding'];
	
	// Font Weight
	$fontWeight = 'font-weight-normal';
	$fontWeight = $blockLayout['icon_box_font_weight'];
	
	?>
<section class="list-icons <?php echo $bgcolour . ' ' . $separatorClasses . ' ' . $containerDirection . ' ' . $customClass . ' style-' . $blockAR . ' icon-' . $iconSize; ?>">
	<?php if($addSeparatorUpper == true):
		include $pathUpper;
	endif; ?>
	<div class="list-icons__inner flexi-inner">
		<div class="<?php echo $blockContainer; ?>">
			<?php if(get_sub_field('list_title')) { ?>
			<header class="list-icons__header section-title <?= $titleTextAlignment; ?>">
				<h2 class="<?= $titleTextClass; ?>"><?php the_sub_field('list_title'); ?></h2>
			</header>
			<?php } ?>
			<?php if( have_rows('list_icons') ): ?>
				<div class="list-icons__main <?php echo $blockDirection; ?>">
					
				<?php  while ( have_rows('list_icons') ) : the_row(); 
					$imageType = get_sub_field('image_or_fonticon');
					$imageURL ='';
					$iconClass = '';
					$image = '';
					$blockLink = get_sub_field('link');
					$blockLinkText = 'Read more';
					$blockLinkClass = '';
					$blockLinkIcon = '';
					
					if(!empty($imageType)) {
						if($imageType == 'Image') {
							$imageURL = get_sub_field('list_image');
							if($blockBG){
							} else {
								$image = '<img src="' . $imageURL . '" class="img-fluid" />';
							}
						}
						if($imageType == 'FontIcon') {
							$iconClass = get_sub_field('list_fonticon');
							$image = '<i class="' . $iconClass . '"></i>';
						}
						
					}
					if(!empty($blockLink)){
						$blockLinkText = get_sub_field('link_text');
						$blockLinkClass = get_sub_field('link_class');
						$blockLinkIcon = get_sub_field('link_icon');
					}
					
					$blockBackgroundColour = get_sub_field('block_background_colour');
					if(!empty($blockBackgroundColour)) {
						$blockBackgroundColour = get_sub_field('block_background_colour');	
					} else {
						$blockBackgroundColour = 'no-bg';
					}

				?>
					<div class="<?php echo $blockLayoutCols; ?>">
						<?php if($blockBG){ ?>
						<div class="multi-block__simple image-box" style="background-image: url(<?php echo $imageURL; ?>);">
							<a href="<?php echo $blockLink; ?>">
								<div class="multi-block__simple-inner  image-box__inner <? echo $boxPadding; ?> <? if($hasOverlay):?>hasOverlay<? endif; ?>">
									<? if($hasOverlay):?>
									<div class="image-box__inner-overlay position-absolute w-100 h-100 <? echo $overlayColour . ' opacity-' . $overlayOpacity; ?>"></div>
									<? if(!empty($deviceSmall)){?>
									<div class="image-box__inner-icon position-absolute w-50 h-auto">
										<img src="<?= $deviceSmall; ?>" class="style-svg img-fluid" alt="small brand device" />
									</div>
									<? } ?>
									<? endif; ?>
									<div class="multi-block__simple-content  image-box__content text-center">
										<h3 class="<?= $fontWeight; ?>"><?php the_sub_field('list_item_title'); ?></h3>
										<?php if(get_sub_field('list_item_subtitle')):?>
										<h4><?php strip_tags( the_sub_field('list_item_subtitle') ); ?></h4>
										<?php endif; ?>
										<?php if(!empty($blockLink)): ?>
										<p class="<?php echo $blockLinkClass; ?>"><?php echo $blockLinkText; ?> <?php if(!empty($blockLinkIcon)):?><i class="<?php echo $blockLinkIcon; ?>"></i><?php endif; ?></p>
										<?php endif; ?>
									</div>
								</div>
							</a>
						</div>
						<?php } else { ?>
						<div class="list-icons__row <?php if($blockDirection == "column"):?>d-flex<?php else:?>list-icons__horizontal<?php endif; ?> <?php echo $blockBackgroundColour . ' ' . $blockAlignment . ' ' . $backgroundColour . ' ' . $boxPadding; ?>">
							<?php if(!empty($imageType)): ?>
							<div class="list-icons__row-image">
								<?php echo $image; ?>
							</div>
							<?php endif; ?>
							<div class="list-icons__row-content">
								<h4><?php if($blockLink){?><a href="<?php echo $blockLink; ?>"><?php } ?><?php the_sub_field('list_item_title'); ?><?php if($blockLink){?></a><?php } ?></h4>
								<?php if(get_sub_field('list_item_subtitle')):?>
								<p><?php strip_tags( the_sub_field('list_item_subtitle') ); ?></p>
								<?php endif; ?>
								<?php if(!empty($blockLink)): ?>
								<a href="<?php echo $blockLink; ?>" class="<?php echo $blockLinkClass; ?>"><?php echo $blockLinkText; ?> <?php if(!empty($blockLinkIcon)):?><i class="<?php echo $blockLinkIcon; ?>"></i><?php endif; ?></a>
								<?php endif; ?>
							</div>
						</div>
						<?php } ?>
					</div>
				<?php endwhile ?>
				</div>
			<?php endif ?>
			<? include $templatePartials . "add-button.php"; ?>
		</div>			
	</div>
	<?php if($addSeparatorLower == true):
		include $pathLower;
	endif; ?>
</section>