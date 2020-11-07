<?php ?>
<div class="knowledge-post style-widescreen">
<?php 
	$theLink = get_permalink();
	$linkTarget = '';
	$linkSettings = get_field('post_link_settings');
	$showButton = $linkSettings['post_link_button'];
	if(($linkSettings['post_link_type'] == 'external') || ($linkSettings['post_link_type'] == 'audio') || ($linkSettings['post_link_type'] == 'video-link') || ($linkSettings['post_link_type'] == 'video-modal') ) {
		if($showButton == false){
			$theLink = get_field('post_external_link');
			$linkTarget = 'target="_blank"';
		} else {
			$theLink = get_permalink();
		}
	} 
	
	$mediaType = '';
	$mediaType = $linkSettings['post_link_type'];
	$mediaIcon = '';
	$mediaText = 'Read more';
	if($mediaType=='external'){
		$mediaIcon = '<i class="fad fa-external-link-alt"></i>';
	} elseif($mediaType=='audio') {
		$mediaIcon = '<i class="fad fa-podcast"></i>';
		$mediaText = 'Listen now';
	} elseif($mediaType=='video-link') {
		$mediaIcon = '<i class="fad fa-video"></i>';
		$mediaText = 'Watch now';
	} elseif($mediaType=='video-modal') {
		$mediaIcon = '<i class="fad fa-play-circle"></i>';
		$mediaText = 'Watch now';
	}
	
	
	?>
<?php if ( has_post_thumbnail()) : ?>
	<a <?php if($mediaType != 'video-modal') {?> href="<?php echo $theLink; ?>" <?php echo $linkTarget; ?> <?php } else { ?> class="video-btn" href="#postModal" class="nav-link" data-src="<?php echo $theLink; ?>" data-toggle="modal" data-target="#postModal" <?php } ?>>
	<div class=" image-box style-widescreen image-box__hover " style="background-image: url(<?php the_post_thumbnail_url('medium'); ?>);">
		<div class="post-thumbnail__inner image-box__inner">
			<span class="btn btn-outline-primary"><?php echo($mediaText); ?> <i class="far fa-long-arrow-alt-right"></i></span>
		</div>
		<span class="knowledge-post__indicator">
			<?php echo $mediaIcon; ?>
		</span>
	</div>
	</a>
<?php endif; ?>	
	<div class="post-content">
		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		</header>
		<?php
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta text-center">
			<?php $category_detail=get_the_category($post->ID);
			foreach($category_detail as $cd){
			echo $cd->cat_name;
			} ?>: <?php echo get_post_time( $d = 'd F Y'); ?>
		</div><!-- .entry-meta -->
	<?php endif; ?>
		<footer class="entry-footer text-center">
			<a href="<?php echo $theLink; ?>" class="btn btn-link" <?php echo $linkTarget; ?>>Read more <i class="far fa-long-arrow-alt-right"></i></a>
		</footer><!-- .entry-footer -->
	</div>
</div>