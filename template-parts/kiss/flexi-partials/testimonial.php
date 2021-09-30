<?php
	
	// GENERAL INIT
	$sepPrefix = 'testimonial';
	$templatePath = get_template_directory();
	$templatePartials = $templatePath . '/template-parts/kiss/static-partials/';
	
	/// SEPARATORS
	$separatorLayout = $templatePartials . "separators.php";
	include $separatorLayout;
	
	// GET THE BOX BACKGROUND COLOUR
	//$bgColours = $templatePath . "/template-parts/kiss/static-partials/box-background-color.php";
	include $templatePartials . "box-background-color.php";
	
	$bg_image = get_sub_field('background_image');
	
	/// TEXT CONTROLS
	include $templatePartials . 'text-controls.php';
	
	$titleStyle = $titleClass;
	$introStyle = $introClass;
	
	/// CONTAINER
	$containerClass = 'container';
	$containerClass = get_sub_field('container_size');
	
	$blockquoteClass = 'text-md text-dark';
	$blockquoteClass = textClass($sepPrefix, 'quote', ['size', 'color']);
	
	$citeClass = 'text-sm text-dark';
	$citeClass = textClass($sepPrefix, 'citation', ['size', 'color']);
	
	
	$testimonialDevice = '<svg height="100px" width="100px" class="fill-body" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 80 80" style="enable-background:new 0 0 80 80;" xml:space="preserve"><g><path d="M64,14H16c-2.2061,0-4,1.7944-4,4v30c0,2.2056,1.7939,4,4,4h25.5859l13.707,13.707C55.4844,65.8984,55.7402,66,56,66   c0.1289,0,0.2588-0.0249,0.3828-0.0762C56.7568,65.769,57,65.4043,57,65V52h7c2.2061,0,4-1.7944,4-4V18   C68,15.7944,66.2061,14,64,14z M66,48c0,1.103-0.8975,2-2,2h-8c-0.5527,0-1,0.4478-1,1v11.5859L42.707,50.293   C42.5195,50.1055,42.2656,50,42,50H16c-1.1025,0-2-0.897-2-2V18c0-1.103,0.8975-2,2-2h48c1.1025,0,2,0.897,2,2V48z"></path><path d="M37,22H25c-0.5527,0-1,0.4478-1,1v12c0,0.5522,0.4473,1,1,1h5.6455c-1.0488,4.2007-4.0254,6.0605-4.1592,6.1421   c-0.3857,0.231-0.5703,0.6909-0.4502,1.1245C26.1563,43.6997,26.5508,44,27,44c8.1104,0,10.2129-6.1572,10.7393-8.8003   C37.9971,33.9351,38,33.0376,38,33V23C38,22.4478,37.5527,22,37,22z M36,32.9976c0,0.0078-0.0059,0.75-0.2207,1.8071   c-0.5332,2.6719-1.9932,5.7612-5.791,6.8184c1.1816-1.4175,2.4297-3.5439,2.8613-6.4775c0.042-0.2876-0.043-0.5791-0.2324-0.7993   C32.4268,34.1265,32.1514,34,31.8604,34H26V24h10V32.9976z"></path><path d="M55,22H43c-0.5527,0-1,0.4478-1,1v12c0,0.5522,0.4473,1,1,1h5.6455c-1.0488,4.2007-4.0254,6.0605-4.1592,6.1421   c-0.3857,0.231-0.5703,0.6909-0.4502,1.1245C44.1563,43.6997,44.5508,44,45,44c8.1104,0,10.2129-6.1572,10.7393-8.8003   C55.9971,33.9351,56,33.0376,56,33V23C56,22.4478,55.5527,22,55,22z M54,32.9976c0,0.0078-0.0059,0.75-0.2207,1.8071   c-0.5332,2.6719-1.9932,5.7612-5.791,6.8184c1.1816-1.4175,2.4297-3.5439,2.8613-6.4775c0.042-0.2876-0.043-0.5791-0.2324-0.7993   C50.4268,34.1265,50.1514,34,49.8604,34H44V24h10V32.9976z"></path></g></svg>';
	$testimonialDeviceURL = get_sub_field('testimonial_device');
	if(!empty($testimonialDeviceURL)):
		echo '<img src="' . $testimonialDeviceURL . '" class="style-svg img-fluid" />';
	else:
		$testimonialDeviceURL = $testimonialDevice;
	endif;
		
	/// COLUMNS
	$colCount = 1;
	if(!empty(get_sub_field('testimonial_columns'))):
		$colCount = get_sub_field('testimonial_columns');
	endif;
	
	
	$colClass = 'col-12';
	$colDirection = 'horizontal';
	if($colCount > 1):
		$colDirection = 'vertical';
		if($colCount == 2):
			$colClass = 'col-12 col-md-6';
		elseif($colCount == 3):
			$colClass = 'col-12 col-md-4';
		elseif($colCount == 4):
			$colClass = 'col-12 col-md-6 col-lg-3';
		endif;
	endif;
	
	/// DIRECTION
	$containerDirection = 'text-' . get_sub_field($sepPrefix . '_container_direction');
	
	?>

<div id="testimonialLoader" class="testimonial  <?php echo $bgcolour . ' ' . $separatorClasses . ' ' . $containerDirection; ?> <?php if(get_sub_field('background_image')):?> hasBg<?php endif; ?>" <?php if($bg_image): ?>style="background-image: url(<?php echo $bg_image; ?>);"<?php endif; ?>>
	<?php if($addSeparatorUpper == true):
		include $pathUpper;
	endif; ?>
	<div class="testimonials-list">
		<section id="testimonialLoader-<?php echo $testimonial->ID;?>" class="testimonial-row testimonials-list__item flexi-inner">
			<div class="<?= $containerClass; ?>">
				<? if(!empty(get_sub_field('testimonial_block_title'))):?>
				<h2 class="<?= $titleStyle; ?>"><?= get_sub_field('testimonial_block_title');?></h2>
				<? endif; ?>
				<? if(!empty(get_sub_field('testimonials_intro_text'))):?>
				<div class="<?= $intro; ?> mb-5">
					<?= wpautop(get_sub_field('testimonials_intro_text')); ?>
				</div>
				<? endif; ?>
				<div class="row">
	<?php
		if( have_rows('select_testimonials')):
			while(have_rows('select_testimonials')) : the_row();

			$testimonial  = get_sub_field('select_a_testimonial');
			
			if(!empty($testimonial)):
			$featured_image = get_the_post_thumbnail_url($testimonial->ID, 'full');
			$testimonial_content = apply_filters('the_content', get_post_field('post_content', $testimonial));
			$testimonial_attribute = apply_filters('the_title', get_post_field('post_title', $testimonial), $testimonial->ID);
			$testimonial_role = apply_filters('post_meta', get_post_field('title_or_role', $testimonial));
			//get_post_meta( get_the_ID($testimonial_id), '_cmb_role_organisation', true);
	?>
					<div class="<?= $colClass; ?>">
						<div class="post-item post-item__<?= $colDirection; ?>">
							<div class="testimonial-row__item">
								<div class="testimonial-row__quote <?php if(!empty($featured_image)){?>hasImage<?php } ?>">
									<?php if(!empty($featured_image)){?>
									<div class="testimonial-row__headshot">
										<img src="<?php echo $featured_image; ?>" class="rounded-circle" />
									</div>
									<?php }?>
									<?= $testimonialDevice; ?>
								</div>
								<div class="testimonial-row__content">
									<blockquote class="<?= $blockquoteClass; ?>">
										<?php echo $testimonial_content; ?>
										<footer class="<?= $citeClass; ?>">
											<?php if(!empty($testimonial_attribute)):?><cite><?php echo $testimonial_attribute; ?> </cite><?php endif; ?> <?php if(!empty($testimonial_role)): echo $testimonial_role; endif; ?>
										</footer>
									</blockquote>
								</div>
							</div>
						</div>
					</div>
	<?php endif; 
		endwhile;
	endif; ?>
				</div>
			</div>
		</section>
	</div>
	<?php if($addSeparatorLower == true):
		include $pathLower;
	endif; ?>
</div>