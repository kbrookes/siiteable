<?php $args = array(
	'posts_per_page' => 1,
	'meta_key' => 'featured_post',
	'meta_value' => true
);

$featuredPost = new WP_Query($args);

if($featuredPost->have_posts()): ?>
<div class="header-featured">
	<div class="header-featured__inner">
	<?php while($featuredPost->have_posts()): $featuredPost->the_post();

	$bg_colour = get_sub_field('box_background_colour');
	
	
	/// SET BUTTON COLOUR
	$btnColour = 'secondary';
	switch ($bg_colour) {
		case "Default":
	        $btnColour = "secondary";
	        break;
	    case "Primary":
	        $btnColour = "alternate";
	        break;
	    case "Secondary":
	        $btnColour = "alternate";
	        break;
	    case "Dark":
	        $btnColour = "secondary";
	        break;
		case "Light":
	        $btnColour = "secondary";
	        break;
		case "White":
	        $btnColour = "secondary";
	        break;
		case "Alternate":
	        $btnColour = "secondary";
	        break;
	}
	
	
 ?>


		<section id="featuredPost" class="blog-post blog-post__featured">
			<div class="blog-post__wrap">
				<div class="container">
					<h2>FEATURED ARTICLE</h2>
					<div class="row">
						<div class="col-12 col-md-3 col-lg-4">
							<a href="<?php the_permalink(); ?>">
								<div class="blog-post__image">
									<?php echo wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'featured-blog'); ?>
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
	<?php endwhile;?>
	</div>
</div>
	<?php else: endif; ?>
<?php wp_reset_query(); ?>
