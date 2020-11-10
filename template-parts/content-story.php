<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

// GET FONTAWESOME LIBRARY
$faType = get_theme_mod( 'fa_styles');

$full_img = get_the_post_thumbnail_url();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(is_single()):?>
	<?php else: ?>
	<div class="container post-list">
		<h1>SUCCESS STORIES</h1>
		<div class="row justify-content-center">
			
			<div class="col-12 col-md-10 col-lg-8">
				<div class="post-content">
					<header class="entry-header">
						<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
					</header>
					
					<div class="entry-content">
					
					<?php
						the_excerpt();
					?>
					</div>
					<?php if(get_field('file_upload')){?>
					<div class="mt-3 mb-3">
						<a class="btn-custom primary" href="<?php echo get_field('file_upload'); ?>"><i class="<?= $faType; ?> fa-chevron-down"></i> Download Now</a>
					</div>
					<?php } ?>
					<?php if(get_field('hide_readmore') != true){?>
					<footer class="entry-footer">
						<?php if ( ! is_single() ) : ?>
						<a href="<?php the_permalink(); ?>" class="btn-custom primary ">READ MORE <i class="<?= $faType; ?> fa-chevron-right"></i></a>
						<?php endif; ?>
						<?php strappress_entry_footer(); ?>
					</footer><!-- .entry-footer -->
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</article><!-- #post-## -->
