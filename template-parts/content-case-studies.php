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
$clientResult = get_field('cs_result');
$clientTestimonial = get_field('cs_testimonial'); 
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
					<?= $clientResult; ?>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="case-study__result">
					<h3>The Experience</h3>
					<p>"<?= esc_html($clientTestimonial->post_content);?>"</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">
				<h3>What <?= $clientName; ?> Had To Say:</h3>
				<p>"<?= esc_html($clientTestimonial->post_content);?>"</p>
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
				<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
				</a>
				<div class="client-logo">
					<img src="<?= $clientLogo; ?>" class="img-fluid" alt="<?= $clientName; ?> Logo" />
				</div>
			</div>
			<?php endif; ?>
			<div class="col-12 col-md-10 col-lg-8">
				<div class="post-content">
					<header class="entry-header d-flex justify-content-between align-items-center">
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
