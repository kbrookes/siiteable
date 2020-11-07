<?php
	/// GENERAL INIT
	$sepPrefix = 'pricing';
	$templatePath = get_template_directory();
	
	/// OVERLAY SETUP
	$hasOverlay = false;
	$overlayColor = null;
	$overlayOpacity = null;
	$colorClass = '';
	$opacityClass = '';
	$overlayClass = '';
	
	if(get_sub_field($sepPrefix . '_add_image_overlay') == true):
	$hasOverlay = true;
	$overlayColor = get_sub_field($sepPrefix . '_overlay_colour');
	switch ($overlayColor) {
		case "None":
		$colorClass = 'overlay-dark';
		$btnColour = 'light';
		break;
		case "primary":
		$colorClass = 'overlay-primary';
		$btnColour = 'dark';
		break;
		case "secondary":
		$colorClass = 'overlay-secondary';
		$btnColour = 'dark';
		break;
		case "dark":
		$colorClass = 'overlay-dark';
		$btnColour = 'light';
		break;
		case "light":
		$colorClass = 'overlay-light';
		$btnColour = 'dark';
		break;
		case "white":
		$colorClass = 'overlay-white';
		$btnColour = 'light';
		break;
		case "alternate":
		$colorClass = 'overlay-alternate';
		$btnColour = 'dark';
		break;
	}
	$overlayOpacity = get_sub_field($sepPrefix . '_overlay_opacity');
	switch ($overlayOpacity) {
		case "None":
		$opacityClass = 'overlay-90';
		break;
		case "05":
		$opacityClass = 'overlay-05';
		break;
		case "15":
		$opacityClass = 'overlay-15';
		break;
		case "25":
		$opacityClass = 'overlay-25';
		break;
		case "35":
		$opacityClass = 'overlay-35';
		break;
		case "50":
		$opacityClass = 'overlay-50';
		break;
		case "65":
		$opacityClass = 'overlay-65';
		break;
		case "75":
		$opacityClass = 'overlay-75';
		break;
		case "85":
		$opacityClass = 'overlay-85';
		break;
		case "95":
		$opacityClass = 'overlay-95';
		break;
	}
	$overlayClass = 'hasOverlay ' . $colorClass . ' ' . $opacityClass;
	endif;
	
	
	// GET THE BOX BACKGROUND COLOUR
	include $templatePath . "/template-parts/kiss/static-partials/box-background-color.php";
	
	// CONTAINER SIZE
	$containerSize = get_sub_field($sepPrefix . '_container_size');
	if(!empty($containerSize)){
		
	} else {
		$containerSize = 'container';
	}
	
	// GET BUTTONS
	$addButton = false;
	if(get_sub_field($sepPrefix . '_button_add_button') == true):
		$addButton = true;
		include $templatePath . "/template-parts/kiss/static-partials/buttons.php";
	endif;	
	
	/// SEPARATORS INIT
	$separatorLayout = $templatePath . "/template-parts/kiss/static-partials/separators.php";
	
	include $separatorLayout;
	

	/// CUSTOM CLASS
	$customClass = get_sub_field($sepPrefix.'_class');
	

	?>
<section class="pricing-cards <?php echo $bgcolour . ' ' . $separatorClasses . ' ' . $customClass . ' style-' . $blockAR . ' ' . $overlayClass; ?>" <?php if(get_sub_field('pricing_background_image')):?>hasBgImg<?php endif; ?>" <?php if(get_sub_field('pricing_background_image')):?>style="background-image:url(<?php  the_sub_field('pricing_background_image'); ?>)"<?php endif; ?>>
	<?php if($addSeparatorUpper == true):
		include $pathUpper;
	endif; ?>
	<div class="pricing-cards__inner flexi-inner">
		<div class="<?php echo $containerSize; ?>">
			<?php if(get_sub_field('pricing_block_title')) { ?>
			<header class="pricing-cards__header section-title">
				<h2><?php the_sub_field('pricing_block_title'); ?></h2>
			</header>
			<?php } ?>
			<?php if(get_sub_field('pricing_intro_text')) { ?>
			<section class="pricing-cards__intro section-intro">
				<?php the_sub_field('pricing_intro_text'); ?>
			</section>
			<?php } ?>
			<?php 
			$colCount = 0;
			if( have_rows('pricing_add') ): 
				while ( have_rows('pricing_add') ) : the_row();
				$colCount++;
				endwhile;
			endif;
			$colCount = 12/$colCount;
			$colClass = $colCount < 6 ? 'col-12 col-md-' . $colCount : 'col-12 col-md-4';
			$cardBG = 'bg-white';
			if(!empty(get_sub_field('pricing_bg_colour'))):
				$cardBG = get_sub_field('pricing_bg_colour');
			endif;
			$cardText = 'text-dark';
			if(!empty(get_sub_field('pricing_text_colour'))):
				$cardText = get_sub_field('pricing_text_colour');
			endif;
			$cardHeading = 'text-primary';
			if(!empty(get_sub_field('pricing_heading_colour'))):
				$cardHeading = get_sub_field('pricing_heading_colour');
			endif;
			$buttonColor = 'primary';
			if(!empty(get_sub_field('pricing_button_colour'))):
				$buttonColor = get_sub_field('pricing_button_colour');
			endif;
			?>
			<?php if( have_rows('pricing_add') ): ?>
				<div class="pricing">
					<div class="row">
					<?php  while ( have_rows('pricing_add') ) : the_row(); 
					$cardTitle = get_sub_field('pricing_title');
					$cardPrice = get_sub_field('pricing_price');
					$cardFrequency = get_sub_field('pricing_frequency');
					$cardAfter = get_sub_field('pricing_explanation');
					// GET BUTTONS
					$addCardButton = false;
					if(get_sub_field($sepPrefix . '_button_add_button') == true):
						$addCardButton = true;
						include $templatePath . "/template-parts/kiss/static-partials/buttons.php";
					endif;	
				?>
						<div class="<?php echo $colClass; ?>">
							<div class="card mb-5 mb-lg-0 <?= $cardBG; ?>">
								<div class="card-body">
									<h5 class="card-title text-uppercase text-center <?= $cardHeading; ?>"><?php echo $cardTitle; ?></h5>
									<h6 class="card-price text-center">$<?php echo $cardPrice; ?><span class="period">/<?php echo $cardFrequency; ?></span></h6>
									<hr>
									<?php if(have_rows('pricing_features')): ?>
									<ul class="fa-ul">
										<?php while( have_rows('pricing_features') ): the_row();
											$feature = get_sub_field('pricing_feature');
											$active = get_sub_field('pricing_feature_availability');
											$featureClass = $active ? $cardText : 'text-muted';
											$checkClass = $active ? 'fas fa-check' : 'fas fa-times';
										?>
										<li class="<?php echo $featureClass; ?>"><span class="fa-li"><i class="<?php echo $checkClass; ?>"></i></span>Single User</li>
										<?php endwhile; ?>
									</ul>
									<?php endif; ?>
									<?php if($addCardButton){ ?>
										<a class="btn-custom <?php echo $buttonColor; ?>" <?php if($setLink=='form'):?>data-target="#<?php echo $dataTarget; ?>" data-toggle="modal"<? endif; ?> <?php if($setLink != 'form'): ?>href="<?php if($setLink=='email'):?>mailto:<?php endif; ?><?php echo $linkContent; ?>"<?php endif; ?> <?php if($setLink=='link'):?>target="_blank"<?php endif; ?>><?php if($linkText){ echo $linkText; } else { ?>LEARN HOW<?php } ?></a>
									<?php } ?>	
								</div>
							</div>
							<? if(!empty($cardAfter)):?>
							<div class="card-after">
								<?= $cardAfter; ?>
							</div>
							<? endif; ?>
						</div>
					<?php endwhile ?>
					</div>
				</div>
			<?php endif ?>
			<?php if($addButton){ ?>
			<div class="pricing-cards__actions">
				<a class="btn-custom <?php echo $btnColour; ?>" <?php if($setLink=='form'):?>data-target="#<?php echo $dataTarget; ?>" data-toggle="modal"<? endif; ?> <?php if($setLink != 'form'): ?>href="<?php if($setLink=='email'):?>mailto:<?php endif; ?><?php echo $linkContent; ?>"<?php endif; ?> <?php if($setLink=='link'):?>target="_blank"<?php endif; ?>><?php if($linkText){ echo $linkText; } else { ?>LEARN HOW<?php } ?></a>
			</div>
			<?php } ?>	
			<?php if(get_sub_field('pricing_after_text')) { ?>
			<section class="pricing-cards__outro section-outro">
				<?php the_sub_field('pricing_after_text'); ?>
			</section>
			<?php } ?>
		</div>			
	</div>
	<?php if($addSeparatorLower == true):
		include $pathLower;
	endif; ?>
</section>