<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

/// GLOBAL VARIABLES NEEDED
$the_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
$slug = $the_page->post_name; 
$postID = get_the_id();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(is_single()):?>
		<?php if (has_post_thumbnail( $post->$postID ) ): ?>
		<div class="post-thumbnail hero-headerbg-primary ">
			<div class="hero-header__wrap hasOverlay overlay-dark overlay-50" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
				<div class="container">
					<div class="hero-header__wrap-inner">
						<?php if(get_field('hide_title') == false): ?>
						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div><!--  .post-thumbnail -->
		<?php endif; ?>
		
		<header class="entry-header mt-5 text-center">
			<div class="container">
			<?php
			if ( is_single() && get_field('hide_title') == false):
				if(has_post_thumbnail()):
				else:
				the_title( '<h1 class="entry-title">', '</h1>' );
				endif;
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>
			</div>
		</header><!-- .entry-header -->
		
		<div class="career-info">
			<div class="container">
				<div class="career-info__inner">
					<?php if(!empty(get_field('work_type'))){?>
					<div class="career-info__type">
						<span><strong>Work Type:</strong> <?php the_field('work_type'); ?></span>
					</div>
					<?php } ?>
					<?php if(!empty(get_field('work_reference'))){?>
					<div class="career-info__ref">
						<span><strong>Ref#:</strong> <?php the_field('work_reference'); ?></span>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<?php
			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<div class="container text-center">
				<?php strappress_posted_on(); ?>
				<span class="authors">
					<i class="far fa-user"></i>
				<?php //Returns All Term Items for "my_taxonomy".
					$people_list = wp_get_post_terms( $post->ID, 'person', array( 'field' => 'name' ) );
					
					$people = array_column($people_list, 'name', 'slug');
				
					foreach($people as $key => $value){?>
					<span class="author"><a href="/people/<?php echo $key; ?>"><?php echo $value; ?></a></span>
					<?php }
				?>
				</div>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		
		<div class="container">
			
			<div class="row">
				<div class="vacancies-main col-12 <?php if ( is_active_sidebar( 'careers_form' ) ) : ?>col-md-6 col-lg-8<?php endif; ?>">
		
					<div class="entry-content">
		
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
			<div class="knowledge-post__actions">
			<?php if(get_field('add_download') == true && !empty(get_field('upload_file'))){?>
					<a class="btn btn-outline-primary mr-4" href="<?php the_field('upload_file'); ?>"><i class="fad fa-arrow-alt-to-bottom"></i> Download now</a>
			<?php } ?>
			<?php if($showButton == true) { ?>
				<a class="btn btn-outline-primary" href="<?php get_field('post_external_link'); ?>"><?php echo $mediaIcon;?> <?php echo $mediaText; ?></a>
			<?php } ?>
			</div>
			
			<div class="career-footer mt-5 mb-5">
				<p><a href="/careers"><i class="far fa-long-arrow-alt-left"></i> BACK TO CAREERS</a></p>
			</div>
		
		</div><!-- .entry-content -->
					
				</div>
				
				<?php if ( is_active_sidebar( 'careers_form' ) ) : ?>
				<div class="careers-form__widget col-12 col-md-6 col-lg-4 mb-5">
					<div class="careers-form__inner bg-light p-3">
					<?php dynamic_sidebar('careers_form');?>
					</div>
				</div>
				<?php endif; ?>
			</div>

		</div>
		
	<?php else: ?>
		
		<?php get_template_part( 'template-parts/kiss/static-partials/news-item', get_post_format() ); ?>
	
	<?php endif; ?>
</article><!-- #post-## -->