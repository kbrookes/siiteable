<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

get_header(); 

$faType = get_theme_mod( 'fa_styles');

?>



<?php 
	$getArchiveThumbnail = '';
	$getArchiveThumbnail = get_archive_thumbnail_src();
	if(!empty($getArchiveThumbnail)):
		//// CUSTOMIZER OPTIONS
		$heroHeight = get_theme_mod( 'hero_header_height', 0 );
		
		$heroAlignment = 'align-items-center';
		$heroAlignment = get_theme_mod( 'hero_vertical_alignment', 0 );
		
		$themeHeroTextColor = 'text-white';
		$themeHeroTextColor = get_theme_mod( 'hero_text_color', 0 );
		
		$themeHeroTitleSize = 'font-md';
		$themeHeroTitleSize = get_theme_mod( 'hero_h1_size', 0 );
		
		$colWidth = 'w-75';
		$colWidth = get_theme_mod('header_content_width', 0 );
		
		$themeHeroContentSize = 'text-md';
		$themeHeroContentSize = get_theme_mod('hero_header_content_size', 0);
		
		$paddingY = 'py-0';
		$paddingY = get_theme_mod('hero_padding', 0);
		
		$heroDevice = '';
		if( get_theme_mod( 'siiteable_device_hero', '' ) != '' ):
			$heroDevice = get_theme_mod( 'siiteable_device_hero', 0 );
		endif;
		
		/// OVERLAY SETUP
		$hasOverlay = false;
		$overlayColor = null;
		$overlayOpacity = null;
		$colorClass = '';
		$opacityClass = '';
		$overlayClass = '';
		
		if(get_field('clone_add_overlay', 'options') == true):
			$hasOverlay = true;
			$overlayColor = get_field('archive_overlay_color', 'options');
			switch ($overlayColor) {
				case "None":
					$colorClass = 'overlay-dark';
					break;
				case "primary":
					$colorClass = 'overlay-primary';
					break;
				case "secondary":
					$colorClass = 'overlay-secondary';
					break;
				case "dark":
					$colorClass = 'overlay-dark';
					break;
				case "light":
					$colorClass = 'overlay-light';
					break;
				case "white":
					$colorClass = 'overlay-white';
					break;
				case "alternate":
					$colorClass = 'overlay-alternate';
					break;
			}
			$overlayOpacity = get_field('archive_overlay_opacity', 'options');
			switch ($overlayOpacity) {
				case "None":
					$opacityClass = 'overlay-90';
					break;
				case "05":
					$opacityClass = 'overlay-05';
					break;
				case "15":
					$opacityClass = 'overlay-15';
					break;
				case "25":
					$opacityClass = 'overlay-25';
					break;
				case "35":
					$opacityClass = 'overlay-35';
					break;
				case "50":
					$opacityClass = 'overlay-50';
					break;
				case "65":
					$opacityClass = 'overlay-65';
					break;
				case "75":
					$opacityClass = 'overlay-75';
					break;
				case "85":
					$opacityClass = 'overlay-85';
					break;
				case "95":
					$opacityClass = 'overlay-95';
					break;
			}
			$overlayClass = 'hasOverlay ' . $colorClass . ' ' . $opacityClass;
		endif;
	 ?>
<section id="heroHeader" class="hero-header <?= $heroHeight; ?>">
	<div class="hero-header__wrap <?= $overlayClass; ?>" style="background-image:url(<?php echo $getArchiveThumbnail; ?>)">
		<div class="container <?= $heroAlignment . ' ' . $paddingY; ?>">
			<div class="hero-header__wrap-inner">
				<?php the_archive_title( '<h1 class="' . $themeHeroTitleSize . ' ' . $themeHeroTextColor . '">', '</h1>' ); ?>
				<div class="<?= $themeHeroTextColor . ' ' .  $themeHeroContentSize; ?>">
					<? the_archive_top_content(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	/// ADD HERO CLASS TO BODY TO DYNAMICALLY CHANGE PADDING
    (function($) {
	    $('body').addClass('hasHero')
	    $('body').removeClass('noHero');
	})(jQuery);
</script>
<?php endif; ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : 
			$featureCount = 0;
			while ( have_posts() ) : the_post(); 
				$postType = get_post_type( get_the_ID() );
				$featured = get_post_meta( get_the_ID(), 'featured_post', true ); 	
				if($featured == true):
					$featureCount++;
					if($featureCount == 1):
					// DO NOTHING
					else:
						get_template_part( 'template-parts/content', get_post_format() ); 
					endif;
				else:
					if($postType == "case-studies"):
						get_template_part( 'template-parts/content-case-studies', get_post_format() ); 	
					else:
						get_template_part( 'template-parts/content', get_post_format() ); 
					endif;
				endif;
			endwhile;

			the_posts_pagination( array(
				'prev_text' => '<i class="' . $faType . ' fa-arrow-left" aria-hidden="true"></i><span class="screen-reader-text">' . __( 'Previous Page', 'pool' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next Page', 'pool' ) . '</span><i class="' . $faType . ' fa-arrow-right" aria-hidden="true"></i>',
			) ); 

		else :

			get_template_part( 'template-parts/content', 'none' );
		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
