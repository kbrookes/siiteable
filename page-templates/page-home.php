<?php
/**
 * Template Name: Home Page
 * @package StrapPress
 */

get_header(); ?>

	
	<div id="content" class="site-content container">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'home' );


			endwhile; // End of the loop.
			?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->
	<?php get_template_part( 'template-parts/featured-blog' ); ?>
	
	<?php get_template_part( 'template-parts/call-to-action-acf' ); ?>
	
	<?php get_template_part( 'template-parts/latest-blog' ); ?>

	<?php get_template_part( 'template-parts/testimonial-acf' ); ?>
	
	<?php get_template_part( 'template-parts/featured-case-study' ); ?>
	
	<?php get_template_part( 'template-parts/client-logos-acf' ); ?>
<?php
get_footer();
