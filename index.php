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


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<? /// GET FEATURED POST
			$addFeatured = get_field('add_featured', 'options');
			if($addFeatured == true){
				get_template_part( 'template-parts/kiss/static-partials/featured-blog', get_post_format() ); 
			}
		?>
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
	get_template_part( 'template-parts/kiss/flexible-content' );
get_footer();
