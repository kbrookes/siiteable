<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

// GET FONTAWESOME LIBRARY
$faType = get_theme_mod( 'fa_styles');

$full_img = get_the_post_thumbnail_url();

$clientName = get_field('cs_client');
$clientIntro = get_field('cs_intro_text');
$clientLogo = get_field('cs_client_logo');
$clientIndustry = get_field('cs_client_industry');
$clientLocation = get_field('cs_client_location');
$clientChallenge = get_field('cs_challenge');
$clientApproach = get_field('cs_approach');
$clientSolution = get_field('cs_solution');
$clientExperience = get_field('cs_result');
$clientTestimonial = get_field('cs_testimonial'); 

$testimonialDevice = '<svg height="100px" width="100px" class="fill-body" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 80 80" style="enable-background:new 0 0 80 80;" xml:space="preserve"><g><path d="M64,14H16c-2.2061,0-4,1.7944-4,4v30c0,2.2056,1.7939,4,4,4h25.5859l13.707,13.707C55.4844,65.8984,55.7402,66,56,66   c0.1289,0,0.2588-0.0249,0.3828-0.0762C56.7568,65.769,57,65.4043,57,65V52h7c2.2061,0,4-1.7944,4-4V18   C68,15.7944,66.2061,14,64,14z M66,48c0,1.103-0.8975,2-2,2h-8c-0.5527,0-1,0.4478-1,1v11.5859L42.707,50.293   C42.5195,50.1055,42.2656,50,42,50H16c-1.1025,0-2-0.897-2-2V18c0-1.103,0.8975-2,2-2h48c1.1025,0,2,0.897,2,2V48z"></path><path d="M37,22H25c-0.5527,0-1,0.4478-1,1v12c0,0.5522,0.4473,1,1,1h5.6455c-1.0488,4.2007-4.0254,6.0605-4.1592,6.1421   c-0.3857,0.231-0.5703,0.6909-0.4502,1.1245C26.1563,43.6997,26.5508,44,27,44c8.1104,0,10.2129-6.1572,10.7393-8.8003   C37.9971,33.9351,38,33.0376,38,33V23C38,22.4478,37.5527,22,37,22z M36,32.9976c0,0.0078-0.0059,0.75-0.2207,1.8071   c-0.5332,2.6719-1.9932,5.7612-5.791,6.8184c1.1816-1.4175,2.4297-3.5439,2.8613-6.4775c0.042-0.2876-0.043-0.5791-0.2324-0.7993   C32.4268,34.1265,32.1514,34,31.8604,34H26V24h10V32.9976z"></path><path d="M55,22H43c-0.5527,0-1,0.4478-1,1v12c0,0.5522,0.4473,1,1,1h5.6455c-1.0488,4.2007-4.0254,6.0605-4.1592,6.1421   c-0.3857,0.231-0.5703,0.6909-0.4502,1.1245C44.1563,43.6997,44.5508,44,45,44c8.1104,0,10.2129-6.1572,10.7393-8.8003   C55.9971,33.9351,56,33.0376,56,33V23C56,22.4478,55.5527,22,55,22z M54,32.9976c0,0.0078-0.0059,0.75-0.2207,1.8071   c-0.5332,2.6719-1.9932,5.7612-5.791,6.8184c1.1816-1.4175,2.4297-3.5439,2.8613-6.4775c0.042-0.2876-0.043-0.5791-0.2324-0.7993   C50.4268,34.1265,50.1514,34,49.8604,34H44V24h10V32.9976z"></path></g></svg>';
$testimonialDeviceURL = get_sub_field('testimonial_device');
if(!empty($testimonialDeviceURL)):
	echo '<img src="' . $testimonialDeviceURL . '" class="style-svg img-fluid" />';
else:
	$testimonialDeviceURL = $testimonialDevice;
endif;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(is_single()):?>
	<div class="container">
		<div class="case-study__client mb-5">
			<h3 class="text-center">The Client</h3>
			<div class="row align-items-center case-study__client-info">
				<div class="col-12 col-md-5 col-lg-4 client-logo">
					<img src="<?= $clientLogo; ?>" class="img-fluid mb-3" alt="<?= $clientName; ?> Logo" />
				</div>
				<div class="col-12 col-md-3 col-lg-4 client-industry text-center">
					<h4 class="font-weight-bold text-primary mb-1">INDUSTRY</h4>
					<p class="mb-2 text-uppercase text-gray-300"><?= $clientIndustry; ?></p>
				</div>
				<div class="col-12 col-md-3 col-lg-4 client-location text-center">
					<h4 class="font-weight-bold text-primary mb-1">LOCATION</h4>
					<p class=" text-uppercase  text-gray-300"><?= $clientLocation; ?></p>
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-12 col-md-6">
				<div class="case-study__challenge">
					<h3>The Challenge</h3>
					<?= $clientChallenge; ?>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="case-study__approach">
					<h3>The Approach</h3>
					<?= $clientApproach; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-6">
				<div class="case-study__result">
					<h3>The Solution</h3>
					<?= $clientSolution; ?>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="case-study__experience">
					<h3>The Experience</h3>
					<p><?= $clientExperience; ?></p>
				</div>
			</div>
		</div>
		
		<div class="case-study__testimonial mt-5">
			<h3>What <?= $clientName; ?> Had To Say:</h3>
			<div id="testimonialLoader" class="testimonial">
				<div class="testimonials-list">
					<section id="testimonialLoader-<?php echo $clientTestimonial->ID;?>" class="testimonial-row testimonials-list__item flexi-inner">
						<div class="container-sm">
						<?php
						$testimonial  = $clientTestimonial;
						if(!empty($testimonial)):
							$featured_image = get_the_post_thumbnail_url($testimonial->ID, 'full');
							$testimonial_content = apply_filters('the_content', get_post_field('post_content', $testimonial));
							$testimonial_attribute = apply_filters('the_title', get_post_field('post_title', $testimonial), $testimonial->ID);
							$testimonial_role = apply_filters('post_meta', get_post_field('title_or_role', $testimonial));
							//get_post_meta( get_the_ID($testimonial_id), '_cmb_role_organisation', true);
						?>
							<div class="post-item">
								<div class="testimonial-row__item">
									<div class="testimonial-row__quote <?php if(!empty($featured_image)){?>hasImage<?php } ?>">
										<?php if(!empty($featured_image)){?>
										<div class="testimonial-row__headshot">
											<img src="<?php echo $featured_image; ?>" class="rounded-circle" />
										</div>
										<?php }?>
										<?= $testimonialDevice; ?>
									</div>
									<div class="testimonial-row__content">
										<blockquote class="text-md text-dark">
											<?php echo $testimonial_content; ?>
											<footer class="text-sm text-primary">
												<cite><?php echo $testimonial_attribute; ?> </cite><?php if(!empty($testimonial_role)): echo $testimonial_role; endif; ?>
											</footer>
										</blockquote>
									</div>
								</div>
							</div>
							<? endif; ?>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
	<? else: 
		$faType = get_theme_mod( 'fa_styles');
		$excerpt = get_the_excerpt();
		if(empty($excerpt)) {
			$excerpt = wpautop($clientChallenge);
		}
	?>
	<div class="container post-list">
		<div class="row justify-content-center">
			<?php if(has_post_thumbnail()):?>
			<div class="col-12 col-md-2 col-lg-4">
				<div class="client-images position-relative">
					<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); ?>
					</a>
					<div class="client-logo">
						<div class="client-logo__container rounded-circle p-4">
							<img src="<?= $clientLogo; ?>" class="img-fluid" alt="<?= $clientName; ?> Logo" />
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="col-12 col-md-10 col-lg-8">
				<div class="post-content">
					<header class="entry-header">
						<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
						<p class="text-uppercase text-primary"><?= $clientIndustry . ' | ' . $clientLocation;; ?></p>
					</header>
					
					<div class="entry-content">
					
					<?= $excerpt; ?>
					
					</div>
					<?php if(get_field('file_upload')){?>
					<div class="mt-3 mb-3">
						<a class="btn-custom secondary" href="<?php echo get_field('file_upload'); ?>"><i class="<?= $faType; ?> fa-chevron-down"></i> Download Now</a>
					</div>
					<?php } ?>
					<?php if(get_field('hide_readmore') != true){?>
					<footer class="entry-footer">
						<?php if ( ! is_single() ) : ?>
						<a href="<?php the_permalink(); ?>" class="btn-custom primary ">READ MORE <i class="<?= $faType; ?> fa-chevron-right"></i></a>
						<?php endif; ?>
						<?php strappress_entry_footer(); ?>
					</footer><!-- .entry-footer -->
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</article><!-- #post-## -->
