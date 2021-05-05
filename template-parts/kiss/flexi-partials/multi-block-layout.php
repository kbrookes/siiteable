<?
	// GENERAL INIT
	$templatePath = get_template_directory();
	$sepPrefix = 'block';
	$templatePartials = $templatePath . '/template-parts/kiss/static-partials/';
	// Custom classes, container direction & size, title, text
	include $templatePartials . 'general-partials.php';
	
	// GET THE BOX BACKGROUND COLOUR
	include $templatePartials . "box-background-color.php";
	
	/// TEXT CONTROLS
	include $templatePartials . 'text-controls.php';
	
	
	$blockBGColor = get_sub_field('block_bg_color');
	
	$blockShadow = get_sub_field('block_shadow');
	
	$blockButtonColor = get_sub_field('block_button_color');
	$blockButtonSize = get_sub_field('block_button_size');
	
	
	// GET BUTTONS
	$addButton = false;
	if(get_sub_field($sepPrefix . '_button_add_button') == true):
		include $templatePartials . "buttons.php";
	endif;
	
	/// SEPARATORS INIT
	$separatorLayout = $templatePartials . "separators.php";
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
	
	
?>
<section id="multiBlock" class="multi-block <? echo $bgcolour . ' ' . $separatorClasses . ' style-' . $blockAR . ' ' . $colOrder . ' ' . $containerDirection; ?> <? if(get_sub_field('cta_background_image')):?>hasBgImg<? endif; ?>" style="<? if(get_sub_field('cta_background_image')):?>background-image:url(<?  the_sub_field('cta_background_image'); ?>)<? endif; ?>;">
	<? if($addSeparatorUpper == true):
		include $pathUpper;
	endif; ?>
	<div class="multi-block__wrap flexi-inner">
		<? if($blockContainer):?><div class="container"><? endif; ?>
			<? if(!empty($blockTitle)):?><h2 class="<?= $titleTextClass; ?>"><? echo $blockTitle; ?></h2><? endif; ?>
			<? if(!empty($blockIntro)):?>
				<div class="multi-block__intro <?= $introTextClass; ?>"><? echo $blockIntro; ?></div>
			<? endif; ?>
			
			<? if($blockType == 'manual'){ ?>
			<? if( have_rows('block_post_select_repeater') ): ?>
			<div class="row <? if($blockGutters):?>no-gutters<? endif; ?>">
				<? while( have_rows('block_post_select_repeater') ): the_row(); 
					$selectedItem  = get_sub_field('block_page_select');
				?>
				<div class="col-12 col-md-<? echo $blockColumns; ?> multi-block__column">
					<div class="multi-block__wrap-inner <? echo $blockStyle . ' ' . $blockBGColor; ?>">
						<? include $templatePath . '/template-parts/kiss/flexi-partials/multi-block-layouts/block-' . $blockStyle . '.php'; ?>
					</div>
				</div>
				<? endwhile; ?>
			</div>
			<? endif; ?>
			<? 
				
				} elseif($blockType == 'category'){?>
			
			<? 
				
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
				<div class="row <? if($blockGutters):?>no-gutters<? endif; ?>">
				    <? while ( $arr_posts->have_posts() ) :
				        $arr_posts->the_post();
				        $postID = get_the_ID();
				        $selectedItem = get_post($postID);
				        ?>
				        <div class="col-12 col-md-<? echo $blockColumns; ?> multi-block__column">
							<div class="multi-block__wrap-inner <? echo $blockStyle . ' ' . $blockBGColor; ?>">
								<? include $templatePath . '/template-parts/kiss/flexi-partials/multi-block-layouts/block-' . $blockStyle . '.php'; ?>
							</div>
						</div>
				        <?
				    endwhile; ?>
				</div>
				<? endif;
				wp_reset_query();
			?>
			<? } elseif($blockType == 'featured'){
				$args = array(
				    'posts_per_page' => $blockCount,
					'meta_key' => 'featured_post',
					'meta_value' => true
				);
				$featuredPost = new WP_Query($args); 
				if($featuredPost->have_posts()): ?>
				<div class="row <? if($blockGutters):?>no-gutters<? endif; ?>">
				    <? while($featuredPost->have_posts()): $featuredPost->the_post();
					    $postID = get_the_ID();
					    $selectedItem = get_post($postID);
				        ?>
				        <div class="col-12 col-md-<? echo $blockColumns; ?> multi-block__column">
							<div class="multi-block__wrap-inner <? echo $blockStyle . ' ' . $blockBGColor; ?>">
								<? include $templatePath . '/template-parts/kiss/flexi-partials/multi-block-layouts/block-' . $blockStyle . '.php'; ?>
							</div>
						</div>
				        <?
				    endwhile; ?>
				</div>
				<? endif; ?>
			<? 
				wp_reset_query();
				} ?>
			<? include $templatePartials . "add-button.php"; ?>	
		<? if($blockContainer):?></div><? endif; ?>
	</div>
	<? if($addSeparatorLower == true):
		include $pathLower;
	endif; ?>
</section>