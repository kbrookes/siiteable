<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */
 
 	/// BUTTON SELECTOR
 	$addButton = false;
	if(get_field('button_add_download_button') == true):
		$addButton = true;
	endif;
	
	$btnColour = 'btn-primary';
	$linkContent = '';
	$linkType = '';
	$externalLink = false;
	$mailto = false;
	$setLink = 'internal';
	$linkClass = '';
	if(get_field('speaker_pdf_download')):
		$buttonData = get_field('speaker_pdf_download');
		$linkType = $buttonData['button_link_type'];
		$linkText = $buttonData['button_text_copy'];
		$btnColour = $buttonData['button_colour'];
		//$linkType = $linkType['cta_button_link'];
		switch ($linkType) {
			case "link":
				$setLink = 'link';
				$linkContent = $buttonData['button_external_link'];
				$externalLink = true;
				break;
			case "file":
				$setLink = 'file';
				$linkContent = $buttonData['button_file'];
				$linkClass = 'file-download';
				break;
		}
		
	endif;

 	/// SEPARATORS INIT	

	$sepPrefix = 'header';
	$templatePath = get_template_directory();
	//$separatorLayout = $templatePath . "/template-parts/kiss/static-partials/separators.php";
	
	/// GENERAL
	$sepOptions = get_field($sepPrefix . '_sep_options');
	$svgPath = $templatePath . "/template-parts/kiss/flexi-partials/separators/separator-";
	$pathLower = $templatePath . "/template-parts/kiss/flexi-partials/separator-lower.php";


	/// SET LOWER SEPARATORS
	$lowerSeparatorType = '';
	$lowerSeparatorDirection = '';
	$lowerSeparatorForeground = '';
	$lowerSeparatorShadow = '';
	$boxBackground = '';
	$hasSeparatorLower = '';
	$lowerClassVertical = '';
	$lowerClassHorizontal = '';
	$separatorClasses = '';
	
	$addSeparatorLower = false;
	if((get_field($sepPrefix . '_separators') != '') && ($sepOptions[$sepPrefix . '_lower_separator_separator_type'] != '')):
		$addSeparatorLower = true;
		$separatorClasses .= ' hasSeparatorLower hasLower';
		//$hasSeparatorLower = 'hasSeparatorLower';
		$lowerSeparatorType = $sepOptions[$sepPrefix . '_lower_separator_separator_type'];
		$lowerSeparatorDirection = $sepOptions[$sepPrefix . '_lower_separator_separator_direction'];
		$lowerSeparatorForeground = $sepOptions[$sepPrefix . '_lower_separator_separator_foreground'];
		$lowerSeparatorShadow = $sepOptions[$sepPrefix . '_lower_separator_separator_shadow'];
		$lowerContainerColor = $sepOptions[$sepPrefix . '_lower_separator_container_background'];
		$lowerClassVertical = $sepOptions[$sepPrefix . '_lower_separator_direction_vertical'];
		$lowerClassHorizontal = $sepOptions[$sepPrefix . '_lower_separator_direction_horizontal'];
	endif;
	
	if(!empty($lowerClassVertical)):
		if($lowerClassVertical == 'up'):
			$separatorClasses .= ' lowerUp';
		endif; 
		$lowerClassVertical = 'directionX' . $lowerClassVertical;
	endif; 
	
	if(!empty($lowerClassHorizontal)):
		$lowerClassHorizontal = 'directionY' . $lowerClassHorizontal;
	endif;
	
	$lowerSeparatorFile = $svgPath;
	$lowerSeparatorFile .= $lowerSeparatorType;
	$lowerSeparatorFile .= $lowerSeparatorDirection;
	$lowerSeparatorFile .= ".svg";
	
	if(!empty($lowerContainerColor)):
		$lowerBoxBackground = 'bg-' . $lowerContainerColor;
	endif;	

	$postID = get_the_id();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if(is_single()):?>
		<?php if (has_post_thumbnail( $post->$postID ) ): ?>
		<div class="post-thumbnail hero-header <?php echo $separatorClasses; ?>">
			<div class="hero-header__wrap hasOverlay overlay-dark overlay-50" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
				<div class="container">
				<?php if(get_field('hide_title') == false): ?>
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<?php if(get_field('topic_subtitle')):?>
						<h2><?php the_field('topic_subtitle'); ?></h2>
						<?php endif; ?>
					</header>
				<?php endif; ?>
				</div>
				<?php if($addSeparatorLower == true):
					include $pathLower;
				endif; ?>
			</div>
			<script>
		    /// ADD HERO CLASS TO BODY TO DYNAMICALLY CHANGE PADDING
		    (function($) {
			    $('body').addClass('hasHero')
			    $('body').removeClass('noHero');
			})(jQuery);
			</script>
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
			
		<div class="container">
			<div class="entry-content topic-single">
				<div class="row">
					<div class="col-12 col-md-6">
						<div class="topic-single__content">
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
					</div>
					<?php if(get_field('topic_key_takeaways')):?>
					<div class="col-12 col-md-6">
						<div class="topic-single__takeaways">
							<?php if(get_field('topic_key_takeaway_title')):?>
							<h3><?php the_field('topic_key_takeaway_title');?></h3>
							<?php endif; ?>
							<?php the_field('topic_key_takeaways'); ?>
						</div>
						<?php if($addButton == true): ?>
						<div class="topic-single__download">
							<a class="btn-custom <?php echo $btnColour; ?> <?php if($setLink=='form'): echo $linkClass; endif; ?>" href="<?php echo $linkContent; ?>" <?php if($setLink=='link'):?>target="_blank"<?php endif; ?>><?php if($linkText){ echo $linkText; } else { ?>LEARN HOW<?php } ?></a>
						</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div><!-- .entry-content -->
	
		<footer class="entry-footer">
			<?php if ( ! is_single() ) : ?>
			<a href="<?php the_permalink(); ?>" class="btn-custom primary ">READ MORE <i class="fas fa-chevron-right"></i></a>
			<?php endif; ?>
			<?php strappress_entry_footer(); ?>
		</footer><!-- .entry-footer -->
		
	<?php else: ?>
		<div class="container">
		<div class="row topic-row">
			<?php if ( has_post_thumbnail()) : ?>
			<div class="col-12 col-md-3 col-lg-4 topic-thumbnail">
				<div class="post-thumbnail">
					<a href="<?php the_permalink(); ?>" class="post-thumbnail__link">
						<?php the_post_thumbnail('full'); ?>
					</a>
				</div>
			</div>
			<?php endif; ?>	
			<div class="col-12 <?php if ( has_post_thumbnail()) : ?>col-md-9 col-lg-8<?php endif; ?> topic-content">
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
						<a href="<?php the_permalink(); ?>" class="btn-custom primary ">READ MORE <i class="fas fa-chevron-right"></i></a>
						<?php endif; ?>
						<?php strappress_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</article><!-- #post-## -->
