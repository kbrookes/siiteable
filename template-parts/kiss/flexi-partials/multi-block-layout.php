<?php
	// GENERAL INIT
	$templatePath = get_template_directory();
	$sepPrefix = 'block';
	
	// GET THE BOX BACKGROUND COLOUR
	include $templatePath . "/template-parts/kiss/static-partials/box-background-color.php";
	
	/// TITLE CONTROLS
	$titleTextSize = get_sub_field('block_title_controls_font_size');
	$titleTextColor = get_sub_field('block_title_controls_font_color');
	$titleTextWeight = get_sub_field('block_title_controls_font_weight');
	$titleTextAlignment = get_sub_field('block_title_controls_text_alignment');
	$titleTextClass = $titleTextSize . ' ' . $titleTextColor . ' ' . $titleTextWeight . ' ' . $titleTextAlignment;
	
	/// INTRO CONTROLS
	$introTextSize = get_sub_field('block_intro_controls_font_size');
	$introTextColor = get_sub_field('block_intro_controls_font_color');
	$introTextWeight = get_sub_field('block_intro_controls_font_weight');
	$introTextAlignment = get_sub_field('block_intro_controls_text_alignment');
	$introTextClass = $introTextSize . ' ' . $introTextColor . ' ' . $introTextWeight . ' ' . $introTextAlignment;
	
	$blockBGColor = get_sub_field('block_bg_color');
	
	$blockShadow = get_sub_field('block_shadow');
	
	$blockButtonColor = get_sub_field('block_button_color');
	$blockButtonSize = get_sub_field('block_button_size');
	
	/// TITLES CONTROLS (Individual Cards)
	$titlesTextSize = get_sub_field('block_titles_controls_font_size');
	$titlesTextColor = get_sub_field('block_titles_controls_font_color');
	$titlesTextWeight = get_sub_field('block_titles_controls_font_weight');
	$titlesTextAlignment = get_sub_field('block_titles_controls_text_alignment');
	$titlesTextClass = $titlesTextSize . ' ' . $titlesTextColor . ' ' . $titlesTextWeight . ' ' . $titlesTextAlignment;
	
	/// CONTENT TEXT CONTROLS (Individual Cards)
	$contentTextSize = get_sub_field('content_text_controls_font_size');
	$contentTextColor = get_sub_field('content_text_controls_font_color');
	$contentTextWeight = get_sub_field('content_text_controls_font_weight');
	$contentTextAlignment = get_sub_field('content_text_controls_text_alignment');
	$contentTextClass = $contentTextSize . ' ' . $contentTextColor . ' ' . $contentTextWeight . ' ' . $contentTextAlignment;
	
	
	
	$addButton = false;
	if(get_sub_field($sepPrefix . '_button_add_button') == true):
		$addButton = true;
	endif;
	
	$linkContent = '';
	$linkType = '';
	$externalLink = false;
	$mailto = false;
	$setLink = 'internal';
	$linkClass = '';
	if(get_sub_field($sepPrefix . '_button_button_options')):
		$buttonData = get_sub_field($sepPrefix . '_button_button_options');
		$linkType = $buttonData['button_link_type'];
		$linkText = $buttonData['button_text_copy'];
		//$linkType = $linkType['cta_button_link'];
		switch ($linkType) {
			case "page":
				$setLink = 'page';
				$linkContent = $buttonData['button_page_link'];
				break;
			case "link":
				$setLink = 'link';
				$linkContent = $buttonData['button_external_link'];
				$externalLink = true;
				break;
			case "email":
				$setLink = 'email';
				$linkContent = $buttonData['button_email_address'];
				$mailto = true;
				break;
			case "form":
				$setLink = 'form';
				$linkContent = '#';
				$linkClass = $buttonData['button_popup'];
				break;
		}
		
	endif;
	
	/// SEPARATORS INIT
	$separatorLayout = $templatePath . "/template-parts/kiss/static-partials/separators.php";
	
	include $separatorLayout;
	
	/// BLOCK LAYOUTS
	
	$blockSettings = get_sub_field('block_settings');
	
	//$blockLayout = $blockSettings['block_layout'];
	$blockContainer = true;
	$blockGutters = true;
	if($blockSettings['block_full_width'] == true):
		$blockContainer = false;
	endif;
	if($blockSettings['block_gutters'] == true):
		$blockGutters = false;
	endif;
	
	/// COLUMNS
	$blockColumns = '';
	$blockColumns = (12 / $blockSettings['block_columns']);
	
	/// TOP CONTENT
	$blockTitle = get_sub_field('block_title');
	$blockIntro = get_sub_field('block_intro');
	
	/// GET BLOCK STYLE
	$blockStyle = 'simple';
	$blockStyle = $blockSettings['block_style'];
	
	/// GET BLOCK ASPECT RATIO
	$blockAR = 'square';
	$blockAR = $blockSettings['block_aspect_ratio'];
	
	/// GET COLUMN ORDER SETTINGS
	$colOrder = "orderColNormal";
	$alternateCols = $blockSettings['block_alternate_sides'];
	if($alternateCols == 'true'):
		$colOrder = "orderColAlternating";
	endif;
	
	/// GET BLOCK TYPE
	$blockType = get_sub_field('block_retrieve_posts');
	
	/// NUMBER OF POSTS
	$blockCount = get_sub_field('block_category_posts_num');
	
	
	/// DIRECTION
	$containerDirection = 'text-' . get_sub_field($sepPrefix . '_container_direction');
	
?>
<section id="multiBlock" class="multi-block <?php echo $bgcolour . ' ' . $separatorClasses . ' style-' . $blockAR . ' ' . $colOrder . ' ' . $containerDirection; ?> <?php if(get_sub_field('cta_background_image')):?>hasBgImg<?php endif; ?>" style="<?php if(get_sub_field('cta_background_image')):?>background-image:url(<?php  the_sub_field('cta_background_image'); ?>)<?php endif; ?>;">
	<?php if($addSeparatorUpper == true):
		include $pathUpper;
	endif; ?>
	<div class="multi-block__wrap flexi-inner">
		<?php if($blockContainer):?><div class="container"><?php endif; ?>
			<?php if(!empty($blockTitle)):?><h2 class="<?= $titleTextClass; ?>"><?php echo $blockTitle; ?></h2><?php endif; ?>
			<?php if(!empty($blockIntro)):?>
				<div class="multi-block__intro <?= $introTextClass; ?>"><?php echo $blockIntro; ?></div>
			<?php endif; ?>
			
			<?php if($blockType == 'manual'){ ?>
			<?php if( have_rows('block_post_select_repeater') ): ?>
			<div class="row <?php if($blockGutters):?>no-gutters<?php endif; ?>">
				<?php while( have_rows('block_post_select_repeater') ): the_row(); 
					$selectedItem  = get_sub_field('block_page_select');
				?>
				<div class="col-12 col-md-<?php echo $blockColumns; ?> multi-block__column">
					<div class="multi-block__wrap-inner <?php echo $blockStyle . ' ' . $blockBGColor; ?>">
						<?php include $templatePath . '/template-parts/kiss/flexi-partials/multi-block-layouts/block-' . $blockStyle . '.php'; ?>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
			<?php endif; ?>
			<?php 
				
				} elseif($blockType == 'category'){?>
			
			<?php 
				
				$latestPostCategories = implode(', ', get_sub_field('block_get_latest_posts'));
				
				//var_dump($latestPostCategories);
				
				$args = array(
				    'post_type' => 'post',
				    'post_status' => 'publish',
				    'cat' => $latestPostCategories,
				    'posts_per_page' => $blockCount,
				);
				$arr_posts = new WP_Query( $args );
				 
				if ( $arr_posts->have_posts() ) : ?>
				<div class="row <?php if($blockGutters):?>no-gutters<?php endif; ?>">
				    <?php while ( $arr_posts->have_posts() ) :
				        $arr_posts->the_post();
				        $postID = get_the_ID();
				        $selectedItem = get_post($postID);
				        ?>
				        <div class="col-12 col-md-<?php echo $blockColumns; ?> multi-block__column">
							<div class="multi-block__wrap-inner <?php echo $blockStyle . ' ' . $blockBGColor; ?>">
								<?php include $templatePath . '/template-parts/kiss/flexi-partials/multi-block-layouts/block-' . $blockStyle . '.php'; ?>
							</div>
						</div>
				        <?php
				    endwhile; ?>
				</div>
				<?php endif;
				wp_reset_query();
			?>
			<?php } elseif($blockType == 'featured'){
				$args = array(
				    'posts_per_page' => $blockCount,
					'meta_key' => 'featured_post',
					'meta_value' => true
				);
				$featuredPost = new WP_Query($args); 
				if($featuredPost->have_posts()): ?>
				<div class="row <?php if($blockGutters):?>no-gutters<?php endif; ?>">
				    <?php while($featuredPost->have_posts()): $featuredPost->the_post();
					    $postID = get_the_ID();
					    $selectedItem = get_post($postID);
				        ?>
				        <div class="col-12 col-md-<?php echo $blockColumns; ?> multi-block__column">
							<div class="multi-block__wrap-inner <?php echo $blockStyle . ' ' . $blockBGColor; ?>">
								<?php include $templatePath . '/template-parts/kiss/flexi-partials/multi-block-layouts/block-' . $blockStyle . '.php'; ?>
							</div>
						</div>
				        <?php
				    endwhile; ?>
				</div>
				<?php endif; ?>
			<?php 
				wp_reset_query();
				} ?>
			<?php if($addButton){ ?>
			<div class="list-icons__actions">
				<a class="btn-custom <?php echo $btnColour; ?> <?php if($setLink=='form'): echo $linkClass; endif; ?>" href="<?php if($setLink=='email'):?>mailto:<?php endif; ?><?php echo $linkContent; ?>" <?php if($setLink=='link'):?>target="_blank"<?php endif; ?>><?php if($linkText){ echo $linkText; } else { ?>LEARN HOW<?php } ?></a>
			</div>
			<?php } ?>	
		<?php if($blockContainer):?></div><?php endif; ?>
	</div>
	<?php if($addSeparatorLower == true):
		include $pathLower;
	endif; ?>
</section>