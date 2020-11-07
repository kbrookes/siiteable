<?php 
	$speakingTopic  = get_sub_field('block_page_select');
			
	if(!empty($speakingTopic)):
		$page_id = $speakingTopic->ID;
		$textContent = apply_filters('the_content', get_post_field('post_content', $speakingTopic));
		$textTitle = apply_filters('the_title', get_post_field('post_title', $speakingTopic));
		$textSubTitle = get_field('topic_subtitle', $speakingTopic->ID);
		
	    $page_data = get_post( $page_id );
	    $the_excerpt = $page_data->post_excerpt;

?>
<div class="multi-block__text">
	<div class="multi-block__text-content">
		<h3><?php echo $textTitle; ?></h3>
		<?php if(!empty($textSubTitle)):?>
		<h4><?php echo $textSubTitle; ?></h4>
		<?php endif; ?>
		<div class="multi-block__text-excerpt">
			<p><?php echo $the_excerpt; ?></p>
		</div>
		<div class="multi-block__text__actions">
			<a class="btn-custom primary ">READ MORE</a>
		</div>
	</div>
</div>
<?php 	endif; 