<?php 
	$pageBlock  = get_sub_field('block_page_select');
	
	if(!empty($pageBlock)):
		$page_id = $pageBlock->ID;
	else:
		$page_id = get_the_ID();
	endif;		
			
	$simpleImage = get_the_post_thumbnail_url($pageBlock->ID, 'full');
	if(empty($simpleImage)):
		$simpleImage = get_field('hero_image', $pageBlock->ID);
	endif;
	$simpleContent = apply_filters('the_content', get_post_field('post_content', $pageBlock));
	$simpleTitle = apply_filters('the_title', get_post_field('post_title', $pageBlock));
	$simpleSubTitle = get_field('topic_subtitle', $pageBlock->ID);

?>
<div class="multi-block__simple image-box" style="background-image: url(<?php echo $simpleImage; ?>);">
	<a href="<?php the_permalink($pageBlock->ID); ?>">
		<div class="multi-block__simple-inner  image-box__inner">
			<div class="multi-block__simple-content  image-box__content text-center">
				<h3><?php echo $simpleTitle; ?></h3>
				<?php if(!empty($simpleSubTitle)):?>
				<h4><?php echo $simpleSubTitle; ?></h4>
				<?php endif; ?>
			</div>
		</div>
	</a>
</div>
