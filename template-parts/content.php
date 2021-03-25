<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

	$full_img = get_the_post_thumbnail_url();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(is_single()):
	// GET FONTAWESOME LIBRARY
	$faType = get_theme_mod( 'fa_styles');
	?>
		
		<div class="container">
			<header class="entry-header text-center">
				<?php
				if ( is_single() && get_field('hide_title') == false && !(has_post_thumbnail())) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				elseif ( is_single() && get_field('hide_title') == false && (has_post_thumbnail())) :
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</header><!-- .entry-header -->
			
				<div class="entry-content">
					<div class="entry-content__date">
						<h6>Published on <?php echo get_the_date(); ?></h6>
					</div>
					<?php
					if ( function_exists('yoast_breadcrumb') ) {
					  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
					}
					?>
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'strappress' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );
					
		
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'strappress' ),
						'after'  => '</div>',
					) );
				?>
				<?php if(get_field('file_upload')){?>
				<div class="mt-3 mb-3">
					<a class="btn-custom primary" href="<?php echo get_field('file_upload'); ?>"><i class="<?= $faType; ?> fa-chevron-down"></i> Download Now</a>
				</div>
				<?php } ?>
				</div><!-- .entry-content -->
		
			<footer class="entry-footer">
				<?php if ( ! is_single() ) : ?>
				<a href="<?php the_permalink(); ?>" class="btn-custom secondary ">READ MORE <i class="<?= $faType; ?> fa-chevron-right"></i></a>
				<?php endif; ?>
				<?php strappress_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>
		
	<?php else: 
		// GET FONTAWESOME LIBRARY
		$faType = get_theme_mod( 'fa_styles');
	?>
	<div class="container post-list">
		<div class="row justify-content-center">
			<?php if(has_post_thumbnail()):?>
			<div class="col-12 col-md-2 col-lg-4">
				<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
				</a>
			</div>
			<?php endif; ?>
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
						<a class="btn-custom secondary" href="<?php echo get_field('file_upload'); ?>"><i class="<?= $faType; ?> fa-chevron-down"></i> Download Now</a>
					</div>
					<?php } ?>
					<?php if(get_field('hide_readmore') != true){?>
					<footer class="entry-footer">
						<?php if ( ! is_single() ) : ?>
						<a href="<?php the_permalink(); ?>" class="btn-custom light btn-sm ">READ MORE <i class="<?= $faType; ?> fa-chevron-right"></i></a>
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
