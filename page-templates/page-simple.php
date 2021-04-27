<?
/**
 * Template Name: Simple Page
 */

get_header(); ?>

	<?
 // check if the flexible content field has rows of data
 if (get_field("hide_content_area") == false): ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<? while (have_posts()):
         the_post();
         get_template_part("template-parts/content", "page");
      endwhile;?>
		</main><!-- #main -->
	</div><!-- #primary -->
	
	<? endif;

   $rows = get_post_meta( get_the_ID(), 'simple_flexi', true );
   foreach( $rows as $count => $row ) {
      switch ( $row ) {
         case 'simple_content':
            $contentTitle = get_post_meta( get_the_ID(), 'simple_flexi_' . $count . '_content_title', true );
            $contentCopy = get_post_meta( get_the_ID(), 'simple_flexi_' . $count . '_content_copy', true );
            echo '<h1 class="type-one">' . wpautop( $contentTitle ) . '</div>';
            echo '<div class="content-copy">' . wpautop( $contentCopy ) . '</div>';
            break;
         
         case 'simple_image':
            $content = get_post_meta( get_the_ID(), 'simple_flexi_' . $count . '_add_image', true );
            echo '<div class="type-two">' . wpautop( $content ) . '</div>';
            break;
         
         case 'simple_repeater':
            $repeater_output = array();
            $repeater = get_post_meta( get_the_ID(), 'simple_flexi_' . $count . '_simple_repeater_repeat', true );
            var_dump(get_field_objects());
            break;
         
      }
   }
 get_footer();

