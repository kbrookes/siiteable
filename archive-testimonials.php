<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

get_header(); ?>


<?php //get_template_part( 'template-parts/featured-case-study' ); ?>

	<div id="primary" class="content-area bg-white testimonials-page">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) : ?>
			<? if(empty(get_archive_thumbnail_src())){?>
			<header class="page-header container">
				<h1 class="page-title">Testimonials</h1>
			</header><!-- .page-header -->
				<? } ?>
			<div class="testimonials-list">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>
				
				<?php /*
					* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
				get_template_part( 'template-parts/content-testimonials', get_post_format() ); ?>
				
			<?php endwhile;

			the_posts_pagination( array(
				'prev_text' => '<i class="fa fa-arrow-left" aria-hidden="true"></i><span class="screen-reader-text">' . __( 'Previous Page', 'pool' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next Page', 'pool' ) . '</span><i class="fa fa-arrow-right" aria-hidden="true"></i>',
			) ); 

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
