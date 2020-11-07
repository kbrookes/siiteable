<?php 
	
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 1,
		'post_status' => 'publish',
		'order' => 'DSC',
		'meta_query' => array(
			'relation' => 'OR',
			array(
				'key'     => 'featured_post',
				'value'   => '0',
				'compare' => '=',
			),
			array(
				'key'     => 'exclude_post',
				'compare' => 'NOT EXISTS',
			)
		)
	);
	
	$the_query = new WP_Query( $args );
	
	if( $the_query->have_posts() ): while( $the_query->have_posts() ): $the_query->the_post();
	
	$bg_colour = get_sub_field('box_background_colour');
	
	
	/// SET BUTTON COLOUR
	$btnColour = 'primary';
	switch ($bg_colour) {
		case "Default":
	        $btnColour = "primary";
	        break;
	    case "Primary":
	        $btnColour = "alternate";
	        break;
	    case "Secondary":
	        $btnColour = "alternate";
	        break;
	    case "Dark":
	        $btnColour = "primary";
	        break;
		case "Light":
	        $btnColour = "primary";
	        break;
		case "White":
	        $btnColour = "primary";
	        break;
		case "Alternate":
	        $btnColour = "primary";
	        break;
	}
	
	?>
	<section id="latestPost" class="blog-post blog-post__latest">
		<div class="blog-post__wrap">
			<div class="container">
				<h2>Latest from the blog</h2>
				<div class="row">
					<div class="col-12 col-md-3 col-lg-4">
						<a href="<?php the_permalink(); ?>">
							<div class="blog-post__image">
								<?php echo wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'latest-blog'); ?>
								<div class="blog-post__image-inner">
									<span class="btn-custom <?php echo $btnColour; ?>">READ NOW</span>
								</div>
							</div>
						</a>
					</div>
					<div class="col-12 col-md-9 col-lg-8">
						<div class="blog-post__content">
							<article>
								<header>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<div class="post-details">
										<?php the_excerpt(); ?>
									</div>
									<div class="post-link">
										<a class="btn-custom <?php echo $btnColour; ?>" href="<?php the_permalink(); ?>">READ NOW</a>
									</div>
								</header>
							</article>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endwhile; endif; 
	wp_reset_postdata(); 
?>
