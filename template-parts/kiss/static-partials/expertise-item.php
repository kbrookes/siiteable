<?php ?>
<div class="expertise-post style-widescreen">
<?php 
	$theLink = get_permalink();
	$mediaText = 'Read more';
	?>
<?php if ( has_post_thumbnail()) : ?>
	<a href="<?php echo $theLink; ?>" >
	<div class=" image-box style-widescreen image-box__hover " style="background-image: url(<?php the_post_thumbnail_url('medium'); ?>);">
		<div class="post-thumbnail__inner image-box__inner">
			<span class="btn btn-outline-primary"><?php echo($mediaText); ?> <i class="far fa-long-arrow-alt-right"></i></span>
		</div>
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
		
	</div>
</div>