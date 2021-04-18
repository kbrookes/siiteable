<?php 
	
	
	if($blockType == "manual"){
		$selectedItem  = get_sub_field('block_page_select');
	} elseif($blockType == "category" || $blockType == "featured") {
		$selectedItem = get_post($postID);
	}
	
	$blockPadding = 'p-0';
	if($colOrder == 'orderColNormal'):
		if(!empty($blockBGColor)):
			$blockPadding = 'p-4 p-md-0 pr-md-4';
		endif;
	elseif($colOrder == 'orderColAlternating'):
		if(!empty($blockBGColor)):
			$blockPadding = 'p-4 p-md-0 pl-md-4';
		endif;
	endif;
	
	if(!empty($selectedItem)):
		$page_id = $selectedItem->ID;
		$horizontalImage = get_the_post_thumbnail_url($page_id, 'full');
		if(empty($horizontalImage)):
			$horizontalImage = get_field('hero_image', $page_id);
		endif;
		$horizontalContent = apply_filters('the_content', get_post_field('post_content', $selectedItem));
		$horizontalTitle = apply_filters('the_title', get_post_field('post_title', $selectedItem), $selectedItem->ID);
		$horizontalSubTitle = get_field('topic_subtitle', $selectedItem->ID);
		
	    $page_data = get_post( $page_id );
	    $the_excerpt = $page_data->post_excerpt;
		
			

?>
<div class="row">
	<div class="col-12 col-md-4 col-lg-5 horizontal-image">
		<div class="multi-block__horizontal image-box" style="background-image: url(<?php echo $horizontalImage; ?>);">
			<a href="<?php the_permalink($selectedItem->ID); ?>">
				<div class="multi-block__horizontal-inner image-box__inner text-center">
					<span class="btn-custom  <?php echo $blockButtonSize . ' ' . $blockButtonColor; ?>">READ MORE</span>
				</div>
			</a>
		</div>
	</div>
	<div class="col-12 col-md-8 col-lg-7 horizontal-content">
		<div class="multi-block__horizontal-content text-white <?= $blockPadding; ?>">
			<h3 class="<?= $titlesTextClass; ?>"><a href="<?php the_permalink($selectedItem->ID); ?>"><?php echo $horizontalTitle; ?></a></h3>
			<?php if(!empty($horizontalSubTitle)):?>
			<h4><?php echo $horizontalSubTitle; ?></h4>
			<?php endif; ?>
			<div class="multi-block__horizontal-excerpt text-white <?= $contentTextClass; ?>">
				<p><?php echo $the_excerpt; ?></p>
			</div>
			<div class="multi-block__horizontal__actions">
				<a class="btn-custom <?php echo $blockButtonSize . ' ' . $blockButtonColor; ?>" href="<?php the_permalink($selectedItem->ID); ?>">READ MORE</a>
			</div>
		</div>
	</div>
</div>
<?php 	endif; ?>