<?php
/**
 * Template Name: Home Page
 * @package StrapPress
 */

get_header(); ?>

	<?php
 // check if the flexible content field has rows of data
 if (get_field("hide_content_area") == false): ?>
				
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while (have_posts()):
	 the_post();

	 get_template_part("template-parts/content", "page");

	 // If comments are open or we have at least one comment, load up the comment template.
	 if (comments_open() || get_comments_number()):
	   comments_template();
	 endif;
   endwhile;
   // End of the loop.
   ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
	<?php endif;

 get_template_part("template-parts/kiss/flexible-content"); 
 
 echo exec( 'groups' );
 
 $showNews = get_field('home_news_show', 'options');
 $showPromo = get_field('home_promo', 'options');
 
 if($showNews || $showPromo):

 ?>
	<section class="news-promo">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-8 col-md-6">
					<? get_template_part( 'template-parts/latest-posts' ); ?>
				</div>
				<div class="col-12 col-sm-8 col-md-6">
					<? get_template_part( 'template-parts/promo-repeater' ); ?>  
				</div>
			</div>
		</div>
	</section>
 <? endif;
 	get_footer();
