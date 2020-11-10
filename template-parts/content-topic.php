<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

$postID = get_the_id();

// GET FONTAWESOME LIBRARY
$faType = get_theme_mod( 'fa_styles');

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if(is_single()):?>
		<?php if (has_post_thumbnail( $post->$postID ) ): ?>
		<div class="post-thumbnail hero-header hasSeparatorLower hasLower lowerDown">
			<div class="hero-header__wrap hasOverlay overlay-dark overlay-50" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
				<div class="container">
				<?php if(get_field('hide_title') == false): ?>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>
				<?php endif; ?>
				</div>
			</div>
			<div class="section-separator  section-separator__lower  direction bg-transparent fg-white shadow-primary directionXup directionYnone">
				<div class="section-separator__inner">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1922 61">
						<g data-name="Layer 2">
						    <g data-name="Layer 1">
								<path class="separator-fill separator-fill__background" d="M1 61h1921L356 0 1 61z"/>
								<path class="separator-fill separator-fill__foreground" d="M0 61h1921L355 11 0 61z"/>
							</g>
						</g>
					</svg>
				</div>
			</div>
		</div><!--  .post-thumbnail -->
		<?php endif; ?>
		<header class="entry-header">
			<?php
			if ( is_single() && get_field('hide_title') == false && !(has_post_thumbnail())) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			elseif ( is_single() && get_field('hide_title') == false && (has_post_thumbnail())) :
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>
		</header><!-- .entry-header -->
	
		<?php
			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<div class="container text-center">
				<?php strappress_posted_on(); ?>
				</div>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		
		<div class="container">
			<div class="entry-content">
			<h1>TOPIC!!!</h1>
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
			</div>
		</div><!-- .entry-content -->
	
		<footer class="entry-footer">
			<?php if ( ! is_single() ) : ?>
			<a href="<?php the_permalink(); ?>" class="btn-custom primary ">READ MORE <i class="<?= $faType; ?> fa-chevron-right"></i></a>
			<?php endif; ?>
			<?php strappress_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php else: ?>
	<div class="container">
		<div class="row archive-row">
			<?php if ( has_post_thumbnail()) : ?>
			<div class="col-12 col-md-3 col-lg-4">
				<div class="post-thumbnail">
					<a href="<?php the_permalink(); ?>" class="post-thumbnail__link">
						<?php the_post_thumbnail('full'); ?>
					</a>
				</div>
			</div>
			<?php endif; ?>	
			<div class="col-12 <?php if ( has_post_thumbnail()) : ?>col-md-9 col-lg-8<?php endif; ?>">
				<div class="post-content">
					<header class="entry-header">
						<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
					</header>
					<?php
					if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php strappress_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
					<div class="entry-content">
					
					<?php
						the_excerpt();
					?>
					</div>
					<footer class="entry-footer">
						<?php if ( ! is_single() ) : ?>
						<a href="<?php the_permalink(); ?>" class="btn-custom primary ">READ MORE <i class="<?= $faType; ?> fa-chevron-right"></i></a>
						<?php endif; ?>
						<?php strappress_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</article><!-- #post-## -->
