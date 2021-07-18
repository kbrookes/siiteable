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
			<div class="container">
				<?php
				if ( have_posts() ) : 
				$post = $posts[0]; $c=0;
				?>
					<div class="accordion" id="faq-list">
					<? while ( have_posts() ) : the_post(); 
						$c++;?>
						<div class="card">
							<div class="card-header" id="heading-<?php the_ID();  echo ' c-' . $c; ?>">
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-left <? if($c > 1): echo 'collapsed post-' . $c; endif; ?>" type="button" data-toggle="collapse" data-target="#collapse-<?php the_ID(); ?>" aria-expanded="true" aria-controls="collapse-<?php the_ID(); ?>">
										<? the_title(); ?>
									</button>
								</h2>
							</div>
							<div id="collapse-<?php the_ID(); ?>" class="collapse <? if($c == 1): echo ' show'; endif; ?>" aria-labelledby="heading-<?php the_ID(); ?>" data-parent="#faq-list">
								<div class="card-body">
									<? the_content(); ?>
								</div>
							</div>
						</div>
						
					<? endwhile; ?>
					</div>
					<? the_posts_pagination( array(
						'prev_text' => '<i class="' . $faType . ' fa-arrow-left" aria-hidden="true"></i><span class="screen-reader-text">' . __( 'Previous Page', 'pool' ) . '</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Page', 'pool' ) . '</span><i class="' . $faType . ' fa-arrow-right" aria-hidden="true"></i>',
					) ); 
		
				else :
		
					get_template_part( 'template-parts/content', 'none' );
				endif; ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
