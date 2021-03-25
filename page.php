<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
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

 if (is_active_sidebar("below_content")):
   dynamic_sidebar("below_content");
 endif;

 if (is_active_sidebar("about_footer")):
   dynamic_sidebar("about_footer");
 endif;

 get_footer();

