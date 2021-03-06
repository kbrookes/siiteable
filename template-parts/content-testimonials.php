<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

?>

<div class="testimonial-row testimonials-list__item">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-item">
			<?php if(is_single()): 
				get_template_part('template-parts/content-single', 'Single Post');
			else: 
				$featured_image = get_the_post_thumbnail_url();
				$video = get_field('testimonial_video');
			?>
			<div class="container">
				
				<div class="testimonial-row__item">
					<div class="testimonial-row__quote">
						<svg height='100px' width='100px'  class="fill-body" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 80 80" style="enable-background:new 0 0 80 80;" xml:space="preserve"><g><path d="M64,14H16c-2.2061,0-4,1.7944-4,4v30c0,2.2056,1.7939,4,4,4h25.5859l13.707,13.707C55.4844,65.8984,55.7402,66,56,66   c0.1289,0,0.2588-0.0249,0.3828-0.0762C56.7568,65.769,57,65.4043,57,65V52h7c2.2061,0,4-1.7944,4-4V18   C68,15.7944,66.2061,14,64,14z M66,48c0,1.103-0.8975,2-2,2h-8c-0.5527,0-1,0.4478-1,1v11.5859L42.707,50.293   C42.5195,50.1055,42.2656,50,42,50H16c-1.1025,0-2-0.897-2-2V18c0-1.103,0.8975-2,2-2h48c1.1025,0,2,0.897,2,2V48z"></path><path d="M37,22H25c-0.5527,0-1,0.4478-1,1v12c0,0.5522,0.4473,1,1,1h5.6455c-1.0488,4.2007-4.0254,6.0605-4.1592,6.1421   c-0.3857,0.231-0.5703,0.6909-0.4502,1.1245C26.1563,43.6997,26.5508,44,27,44c8.1104,0,10.2129-6.1572,10.7393-8.8003   C37.9971,33.9351,38,33.0376,38,33V23C38,22.4478,37.5527,22,37,22z M36,32.9976c0,0.0078-0.0059,0.75-0.2207,1.8071   c-0.5332,2.6719-1.9932,5.7612-5.791,6.8184c1.1816-1.4175,2.4297-3.5439,2.8613-6.4775c0.042-0.2876-0.043-0.5791-0.2324-0.7993   C32.4268,34.1265,32.1514,34,31.8604,34H26V24h10V32.9976z"></path><path d="M55,22H43c-0.5527,0-1,0.4478-1,1v12c0,0.5522,0.4473,1,1,1h5.6455c-1.0488,4.2007-4.0254,6.0605-4.1592,6.1421   c-0.3857,0.231-0.5703,0.6909-0.4502,1.1245C44.1563,43.6997,44.5508,44,45,44c8.1104,0,10.2129-6.1572,10.7393-8.8003   C55.9971,33.9351,56,33.0376,56,33V23C56,22.4478,55.5527,22,55,22z M54,32.9976c0,0.0078-0.0059,0.75-0.2207,1.8071   c-0.5332,2.6719-1.9932,5.7612-5.791,6.8184c1.1816-1.4175,2.4297-3.5439,2.8613-6.4775c0.042-0.2876-0.043-0.5791-0.2324-0.7993   C50.4268,34.1265,50.1514,34,49.8604,34H44V24h10V32.9976z"></path></g></svg>
					</div>
					<div class="testimonial-row__content">
					<? if(empty($video)):?>
						<blockquote>
							<?php
								$testimonial_content = apply_filters('the_content', get_post_field('post_content'));
								echo $testimonial_content;
							?>
							<footer class="align-items-center d-flex">
								<?php if(!empty($featured_image)){?>
								<div class="testimonial-row__headshot mr-5">
									<img src="<?php echo $featured_image; ?>" class="rounded-circle" />
								</div>
								<?php }?>
								<div class="citation">
									<cite><?php the_title(); ?></cite> <?php if(get_field('title_or_role')): the_field('title_or_role'); endif; ?>
								</div>
							</footer>
						</blockquote>
					<? elseif(empty($testimonial_content)): ?>
						<div class="testimonial-video">
							<? videoPlayerLite($video); ?>
							<div class="testimonial-video__label">
								<h4><?php the_title(); ?><?php if(get_field('title_or_role')): echo ' - ' . get_field('title_or_role'); endif; ?></h4>
							</div>
						</div>
					<? endif; ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</article><!-- #post-## -->
</div>