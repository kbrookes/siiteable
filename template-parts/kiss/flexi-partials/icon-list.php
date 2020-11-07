<?php
	/// GENERAL INIT
	$sepPrefix = 'licons';
	$templatePath = get_template_directory();
	
	
	// GET THE BOX BACKGROUND COLOUR
	include $templatePath . "/template-parts/kiss/static-partials/box-background-color.php";
	
	
	// GET BUTTONS
	$addButton = false;
	if(get_sub_field($sepPrefix . '_button_add_button') == true):
		$addButton = true;
		include $templatePath . "/template-parts/kiss/static-partials/buttons.php";
	endif;	
	
	/// SEPARATORS INIT
	$separatorLayout = $templatePath . "/template-parts/kiss/static-partials/separators.php";
	
	include $separatorLayout;
	
	
	/// SEPARATORS INIT
	$separatorLayout = $templatePath . "/template-parts/kiss/static-partials/separators.php";
	include $separatorLayout;
	
	/// CUSTOM CLASS
	$customClass = get_sub_field($sepPrefix.'_class');
	
	
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
	

	?>
<section class="list-icons <?php echo $bgcolour . ' ' . $separatorClasses . ' ' . $customClass . ' style-' . $blockAR . ' icon-' . $iconSize; ?>">
	<?php if($addSeparatorUpper == true):
		include $pathUpper;
	endif; ?>
	<div class="list-icons__inner flexi-inner">
		<div class="<?php echo $blockContainer; ?>">
			<?php if(get_sub_field('list_title')) { ?>
			<header class="list-icons__header section-title">
				<h2><?php the_sub_field('list_title'); ?></h2>
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
								<div class="multi-block__simple-inner  image-box__inner">
									<div class="multi-block__simple-content  image-box__content text-center">
										<h3><?php the_sub_field('list_item_title'); ?></h3>
										<?php if(get_sub_field('list_item_subtitle')):?>
										<h4><?php strip_tags( the_sub_field('list_item_subtitle') ); ?></h4>
										<?php endif; ?>
										<?php if(!empty($blockLink)): ?>
										<p class="<?php echo $blockLinkClass; ?>"><?php echo $blockLinkText; ?> <?php if(!empty($blockLinkIcon)):?><i class="<?php echo $blockLinkIcon; ?>"></i><?php endif; ?></p>
										<?php endif; ?>
									</div>
								</div>
							</a>
						</div>
						<?php } else { ?>
						<div class="list-icons__row <?php if($blockDirection == "column"):?>d-flex<?php else:?>list-icons__horizontal<?php endif; ?> <?php echo $blockBackgroundColour; ?> <?php echo $blockAlignment; ?>">
							<?php if(!empty($imageType)): ?>
							<div class="list-icons__row-image">
								<?php echo $image; ?>
							</div>
							<?php endif; ?>
							<div class="list-icons__row-content">
								<h4><?php if($blockLink){?><a href="<?php echo $blockLink; ?>"><?php } ?><?php the_sub_field('list_item_title'); ?><?php if($blockLink){?></a><?php } ?></h4>
								<?php if(get_sub_field('list_item_subtitle')):?>
								<p><?php strip_tags( the_sub_field('list_item_subtitle') ); ?></p>
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
			<?php if($addButton){ ?>
			<div class="list-icons__actions">
				<a class="btn-custom <?php echo $btnColour; ?>" <?php if($setLink=='form'):?>data-target="#<?php echo $dataTarget; ?>" data-toggle="modal"<? endif; ?> <?php if($setLink != 'form'): ?>href="<?php if($setLink=='email'):?>mailto:<?php endif; ?><?php echo $linkContent; ?>"<?php endif; ?> <?php if($setLink=='link'):?>target="_blank"<?php endif; ?>><?php if($linkText){ echo $linkText; } else { ?>LEARN HOW<?php } ?></a>
			</div>
			<?php } ?>	
		</div>			
	</div>
	<?php if($addSeparatorLower == true):
		include $pathLower;
	endif; ?>
</section>