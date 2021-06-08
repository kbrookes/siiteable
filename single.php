<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package StrapPress
 */

get_header(); 

$sepPrefix = 'blognav';
$templatePath = get_template_directory();
$templatePartials = $templatePath . '/template-parts/kiss/static-partials/';


$showButton == true;
include $templatePartials . "/buttons-simple.php";
$addButton = array(
	'button_alignment'    => $simpleButtonAlignOptions,
	'add_button'          => true,
	'button_options'      => array(
		'button_link_type'    => 'page',
		'button_page_link'    => get_permalink($pageID),
		'button_text_copy'    => $simpleButtonTextOptions,
		'btn_color'           => $simpleButtonColorOptions,
		'button_size'         => $simpleButtonSizeOptions,
		'button_padding'      => $simpleButtonPaddingOptions
	)
);
include $templatePartials . "/buttons-array.php";
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();
			
		get_template_part( 'template-parts/content', get_post_format() );
		?>
			
			<div class="container-sm pt-5">
			<?php the_post_navigation( array(
		            'prev_text'                  => __( '< PREVIOUS: %title' ),
		            'next_text'                  => __( '%title: NEXT >' ),
		            'in_same_term'               => true,
		            'taxonomy'                   => __( 'post_tag' ),
		            'screen_reader_text' => __( 'Continue Reading' ),
		        ) ); ?>
			</div>

			

		<?php endwhile; // End of the loop.
		// GET FONTAWESOME LIBRARY
		$faType = get_theme_mod( 'fa_styles');
		$next_post = get_next_post();
		$previous_post = get_previous_post();
		
		?>
		<div class="post-nav">
			<div class="container-sm">
				<div class="d-flex justify-content-between align-items-center my-4">
					<?php if ( is_a( $previous_post , 'WP_Post' ) ) : ?>
					<a class="btn-custom <?= $btnClass; ?>" href="<?php echo get_permalink( $previous_post->ID ); ?>"><i class="<?= $faType; ?> fa-chevron-left"></i> PREVIOUS POST</a>
					<?php endif; ?>
					<?php if ( is_a( $next_post , 'WP_Post' ) ) : ?>
					<a class="btn-custom <?= $btnClass; ?>" href="<?php echo get_permalink( $next_post->ID ); ?>">NEXT POST <i class="<?= $faType; ?> fa-chevron-right"></i></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
	
	get_template_part( 'template-parts/kiss/flexible-content' );
	
get_footer();
