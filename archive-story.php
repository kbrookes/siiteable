<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

get_header(); ?>


	<div id="primary" class="content-area success-story success-story__archive">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
			<div class="text-center">
				<h1>SUCCESS STORIES</h1>
			</div>
			<?php
			/* Start the Loop */
			$featureCount = 0;
			while ( have_posts() ) : the_post(); 
				$featured = get_post_meta( get_the_ID(), 'featured_post', true ); 	
				if($featured == true):
					$featureCount++;
					if($featureCount == 1):
					// DO NOTHING
					else:
						get_template_part( 'template-parts/content', get_post_format() ); 
					endif;
				else: ?>
				<div class="success-story__item">
					<div class="container-sm">
						<div class="row no-gutters">
						<?php if( get_field('story_book_cover') ): ?>
							<div class="col-12 col-sm-4 col-md-3 col-lg-2 item-image">
								<div class="success-story__image">
									<a href="<? the_permalink(); ?>">
									    <img src="<?php the_field('story_book_cover'); ?>" />
									</a>
								</div>
							</div>
						<?php endif; ?>
							<div class="col-12 <?php if( get_field('story_book_cover') ): ?>col-sm-8 col-md-9 col-lg-10<? endif; ?> d-flex align-items-center item-copy">
								<div class="success-story__item-wrap">
									<h2><a href="<? the_permalink(); ?>"><? the_title(); ?>'s Challenge:</a></h2>
									<? the_field('story_challenge'); ?>
									<p><a class="btn btn-primary" href="<? the_permalink(); ?>">READ MORE</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<? endif;
					?>	
				
				
			<?php endwhile;

			the_posts_pagination( array(
				'prev_text' => '<i class="fa fa-arrow-left" aria-hidden="true"></i><span class="screen-reader-text">' . __( 'Previous Page', 'pool' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next Page', 'pool' ) . '</span><i class="fa fa-arrow-right" aria-hidden="true"></i>',
			) ); 

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
