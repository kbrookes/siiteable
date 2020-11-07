<?php 
	$pageBlock  = get_sub_field('block_page_select');
			
	if(!empty($pageBlock)):
		$page_id = $pageBlock->ID;
	else:
		$page_id = get_the_ID();
	endif;
	
	$verticalImage = get_the_post_thumbnail_url($page_id, 'full');
	if(empty($verticalImage)):
		$verticalImage = get_field('hero_image', $page_id);
	endif;
	$verticalContent = apply_filters('the_content', get_post_field('post_content', $pageBlock));
	$verticalTitle = apply_filters('the_title', get_post_field('post_title', $pageBlock));
	$verticalSubTitle = get_field('topic_subtitle', $pageBlock->ID);
	
    $page_data = get_post( $page_id );
    $the_excerpt = $page_data->post_excerpt;
    
    $blockSettings = get_sub_field('block_settings');
    
    $showDate = $blockSettings['block_show_date'];
	
	$mediaText = 'Read more';	
?>
<div class="multi-block__vertical style-widescreen">
	<a href="<?php the_permalink($pageBlock->ID); ?>">
		<div class="multi-block__vertical-image image-box style-widescreen image-box__hover " style="background-image: url(<?php echo $verticalImage; ?>);">
			<div class="post-thumbnail__inner image-box__inner">
				<span class="btn btn-outline-white"><?php echo($mediaText); ?> <i class="far fa-long-arrow-alt-right"></i></span>
			</div>
		</div>
	</a>
	<div class="multi-block__vertical-content post-content">
		<header class="entry-header">
			<h3 class="entry-title"><a href="<?php the_permalink($pageBlock->ID); ?>"><?php echo $verticalTitle; ?></a></h3>
		</header>
		<?php if(!empty($verticalSubTitle)):?>
		<h4><?php echo $verticalSubTitle; ?></h4>
		<?php endif; ?>
		<div class="entry-meta">
			<p><?php echo $the_excerpt; ?></p>
		</div>
		<?php if($showDate == true){
			echo get_post_time( $d = 'd F Y'); 
		} else { ?>
			<div class="multi-block__vertical__actions">
				<a class="btn-custom primary ">READ MORE</a>
			</div>
		<?php } ?>
	</div>
</div>

