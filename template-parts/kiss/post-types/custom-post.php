<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

?>

<?php
	$postID = get_the_id();
	
	/// GLOBAL VARIABLES NEEDED
	$the_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
	$slug = $the_page->post_name; 
	
	$expertiseTerms = get_the_terms( get_the_ID() , 'expertise');
	$industryTerms = get_the_terms( get_the_ID() , 'industry');
	$keywordTerms = get_the_terms( get_the_ID() , 'keyword');
	$regionTerms = get_the_terms( get_the_ID() , 'region');
	
	$theLink = get_permalink();
	$linkTarget = '';
	$linkSettings = get_field('post_link_settings');
	$showButton = $linkSettings['post_link_button'];
	if(($linkSettings['post_link_type'] == 'external') || ($linkSettings['post_link_type'] == 'audio') || ($linkSettings['post_link_type'] == 'video-link') || ($linkSettings['post_link_type'] == 'video-modal') ) {
		if($showButton == false){
			$theLink = get_field('post_external_link');
			$linkTarget = 'target="_blank"';
		} else {
			$theLink = get_permalink();
		}
	} 
	
	$mediaType = '';
	$mediaType = $linkSettings['post_link_type'];
	$mediaIcon = '';
	$mediaText = 'Read more';
	if($mediaType=='external'){
		$mediaIcon = '<i class="fad fa-external-link-alt"></i>';
	} elseif($mediaType=='audio') {
		$mediaIcon = '<i class="fad fa-podcast"></i>';
		$mediaText = 'Listen now';
	} elseif($mediaType=='video-link') {
		$mediaIcon = '<i class="fad fa-video"></i>';
		$mediaText = 'Watch now';
	} elseif($mediaType=='video-modal') {
		$mediaIcon = '<i class="fad fa-play-circle"></i>';
		$mediaText = 'Watch now';
	}

	
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(is_single()):?>
		<?php if ( has_post_thumbnail()) : ?>
		<div class="post-thumbnail hero-header ">
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
			<?php
			if ( is_single() && get_field('hide_title') == false):
				if(has_post_thumbnail()):
				else:
				the_title( '<h1 class="entry-title">', '</h1>' );
				endif;
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>
		</header><!-- .entry-header -->
		<?php
			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<div class="container text-center">
				<?php strappress_posted_on(); ?>
				<span class="authors">
					<i class="far fa-user"></i>
					<?php if( have_rows('authors') ): ?>	
					<?php while ( have_rows('authors') ) : the_row(); 
				        $authorID = get_sub_field('author_selected'); 
				        $authorType = get_sub_field('author_type');
				        if($authorType == 'auto'){
					        $authorName = get_the_title($authorID);
					        $authorLink = get_permalink($authorID);
						} elseif($authorType == 'manual'){
							$authorGroup = get_sub_field('edit_author');
							$authorName = $authorGroup['full_name'];
					        $authorLink = '';
						}
						if(!empty($authorLink)){
							$authorName = '<a href="' . $authorLink . '">' . $authorName . '</a>';
						}
							?>
					        <span class="author"><?php echo $authorName; ?></span>
				    <?php endwhile;
					
					else : ?>
				<?php endif; ?>
				<?php //Returns All Term Items for "my_taxonomy".
					//$people_list = wp_get_post_terms( $post->ID, 'person', array( 'field' => 'name' ) );
					
					//$people = array_column($people_list, 'name', 'slug');
				
					//foreach($people as $key => $value){?>
					<!--<span class="author"><a href="/people/<?php echo $key; ?>"><?php echo $value; ?></a></span> -->
					<?php //} ?>
				</div>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		
		<div class="container">
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
					<a class="btn btn-outline-primary" href="<?php get_field('post_external_link'); ?>" target="_blank"><?php echo $mediaIcon;?> <?php echo $mediaText; ?></a>
				<?php } ?>
				</div>
			</div><!-- .entry-content -->
			
			<?php if( have_rows('authors') ): ?><!-- .START AUTHORS -->
				<div class="post-authors">
					<h3>Authors</h3>
					<div class="row">
						
					<?php while ( have_rows('authors') ) : the_row(); 
				        $authorID = get_sub_field('author_selected'); 
				        $authorType = get_sub_field('author_type');
				        if($authorType == 'auto'){
					        $authorName = get_the_title($authorID);
					        $authorLink = get_permalink($authorID);
					        $authorPhone = get_field('team_contact_details_team_phone_number', $authorID);
					        $authorEmail = get_field('team_contact_details_team_email_address', $authorID);
					        $term_obj_list = get_the_terms( $authorID, 'position' );
							$authorPosition = join('', wp_list_pluck($term_obj_list, 'name')); 
						} elseif($authorType == 'manual'){
							$authorGroup = get_sub_field('edit_author');
							$authorName = $authorGroup['full_name'];
					        $authorLink = '';
					        $authorPosition = $authorGroup['position'];
					        $authorPhone = $authorGroup['phone_number'];
					        $authorEmail = $authorGroup['email_address'];
						}
						if(!empty($authorLink)){
							$authorName = '<a href="' . $authorLink . '">' . $authorName . '</a>';
						}
							?>
				        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
					        <h4><?php echo $authorName; ?></h4>
					        <p><?php echo $authorPosition; ?><br>
					        +61 2 <?php echo $authorPhone; ?><br>
					        <a class="post-authors__email" href="mailto:<?php echo $authorEmail; ?>"><?php echo $authorEmail; ?></a>
					        </p>
				        </div>
				    <?php endwhile; ?>
					
					</div>

				</div>
				<?php endif; ?>
			
			<?php /// GET POSTS THAT MATCH THIS TAXONOMY
		
			if( $expertiseTerms || $industryTerms || $keywordTerms || $regionTerms ) {
			    $expertiseTermsNames[] = 0;
			    foreach( $expertiseTerms as $expertiseTerm ) {  
			        $expertiseTermsNames[] = $expertiseTerm->name;
				}
				$industryTermsNames[] = 0;
			    foreach( $industryTerms as $industryTerm ) {  
			        $industryTermsNames[] = $industryTerm->name;
				}
				$keywordTermsNames[] = 0;
			    foreach( $keywordTerms as $keywordTerm ) {  
			        $keywordTermsNames[] = $keywordTerm->name;
				}
				$regionTermsNames[] = 0;
			    foreach( $regionTerms as $regionTerm ) {  
			        $regionTermsNames[] = $regionTerm->name;
				}
				$args = array (
				    'post_type' => 'post',
				    'posts_per_page' => 3,
				    'tax_query' => array(
					    'relation' => 'OR',
				        array(
				            'taxonomy' => 'expertise',
				            'field'    => 'slug',
				            'terms'    => $expertiseTermsNames,
				        ),
				        array(
				            'taxonomy' => 'industry',
				            'field'    => 'slug',
				            'terms'    => $industryTermsNames,
				        ),
				        array(
				            'taxonomy' => 'keyword',
				            'field'    => 'slug',
				            'terms'    => $keywordTermsNames,
				        ),
				        array(
				            'taxonomy' => 'region',
				            'field'    => 'slug',
				            'terms'    => $regionTermsNames,
				        ),
				    ),
				);
							
				$query = new WP_Query( $args ); 
				if( $query->have_posts() ) { ?>
			<div class="team-single__posts posts-sections p-b__lg">
				<div class="container">
					<h2 class="text-center m-b__md">News and new thinking</h2>
					<div class="row">
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<div class="col-12 col-sm-6 col-md-4">
							<?php get_template_part( 'template-parts/kiss/static-partials/news-item', get_post_format() ); ?>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
			<?php } 
			}
		
			?>
			
		</div>
		
	<?php else: ?>
		
		<?php get_template_part( 'template-parts/kiss/static-partials/news-item', get_post_format() ); ?>
	
	<?php endif; ?>
</article><!-- #post-## -->