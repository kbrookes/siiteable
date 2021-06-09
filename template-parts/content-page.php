<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */
$contentCols = "col-12";
if ( is_active_sidebar( 'sidebar-1' ) ) :
	$contentCols = "col-12 order-1 col-sm-8 order-sm-12 col-lg-8";
endif;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="row">
			<div class="<?= $contentCols; ?>">
				<?php if(get_field('hide_title') == false): ?>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
				<?php endif; ?>
				<div class="entry-content">
					<?php
						the_content();
						
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'strappress' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->
		
				<?php if ( get_edit_post_link() ) : ?>
					<footer class="entry-footer">
						<?php
							edit_post_link(
								sprintf(
									/* translators: %s: Name of current post */
									esc_html__( 'Edit %s', 'strappress' ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								),
								'<span class="edit-link">',
								'</span>'
							);
						?>
					</footer><!-- .entry-footer -->
				<?php endif; ?>
			</div>
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div class="col-12 order-12 col-sm-4 order-sm-1 col-lg-3">
				<div class="content-sidebar">
				<?php dynamic_sidebar('sidebar-1');?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</article><!-- #post-## -->
