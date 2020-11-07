<?php
/**
* Template part for displaying posts
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package StrapPress
*/

$introText = get_field('expertise_intro_text'); 

$postID = get_the_id();
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('team-page expertise-single'); ?>>
	
	<?php if(is_single()):
		/// GLOBAL VARIABLES NEEDED
		$the_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
		$slug = $the_page->post_name; 
		
		$expertiseTerms = get_the_terms( get_the_ID() , 'expertise');
		$industryTerms = get_the_terms( get_the_ID() , 'industry');
		$keywordTerms = get_the_terms( get_the_ID() , 'keyword');
		$regionTerms = get_the_terms( get_the_ID() , 'region');
	?>
	<div class="expertise-single">
		<?php if (has_post_thumbnail( $post->$postID ) ): ?>
		<div class="post-thumbnail hero-header <?php echo $separatorClasses; ?>">
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
				<?php if($addSeparatorLower == true):
					include $pathLower;
				endif; ?>
			</div>
		</div><!--  .post-thumbnail -->
		<?php endif; ?>
		<?php if(!empty($introText)):?>
		<div class="expertise-single__intro intro-section bg-primary text-white p-b__lg">
			<div class="container">
				<p><?php echo esc_html($introText); ?></p>
			</div>
		</div>
		<?php endif; ?>
		
		
		<div class="expertise-single__info p-b__md">
			<div class="container">
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
		<?php 
			/// GET SERVICES
			if(!empty(get_field('expertise_services'))):?>
		<div class="expertise-single__services bg-secondary text-white p-b__md hasDevice hasDevice-light">
			<div class="container">
				<h2 class="section-header">Services</h2>
				<?php the_field('expertise_services'); ?>
			</div>
		</div>
		<?php endif; ?>
		
		<?php /// GET TESTIMONIALS FOR THIS PRACTICE AREA
		
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
			    'post_type' => array('testimonials'),
				'nopaging' => true,
				'order' => 'DESC',
			    'tax_query' => array(
				    'relation' => 'OR',
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
		<div class="expertise-single__featured-testimonial testimonial-section bg-light p-b__md">
			<div class="container">
				<?php while ( $query->have_posts() ) : $query->the_post(); 
					$testRole = get_field('title_or_role'); ?>
					
				<div class="expertise-single__testimonial-quote">
					<div class="expertise-single__testimonial-quotation testimonial-section__quotation">
						<?php the_content(); ?>
					</div>
					<div class="expertise-single__testimonial-attribution testimonial-section__attribution">
						<span><?php the_title(); if(!empty($testRole)): ?>, <?php echo $testRole; endif; ?></span>
					</div>
				</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
		<?php }
			} ?>
		

		<div class="expertise-single__people people-section p-b__md">
			<div class="container">
				<h2 class="section-header">People</h2>
				
					<?php 
						//$the_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
						//$slug = $the_page->post_name;
						
						$terms = get_terms( 'position', array(
					    'orderby'    => 'count',
					    'hide_empty' => 1
					) );
					// Run a query for each position type
					foreach( $terms as $term ) { ?>
					<div class="row">

					    <?php 
						// Define the query
					    $args = array(
					        'post_type' => 'people',
					        'position' 	=> $term->slug,
					        'meta_key' 	=> 'team_contact_details_team_surname',
							'orderby'	=> 'meta_value',
							'order' => 'ASC',
							'tax_query' => array(
								array(
									'taxonomy' => 'expertise',
									'terms' => array($slug),
									'field' => 'slug',
									'include_children' => false,
								),
							),
					    );
					    $query = new WP_Query( $args ); 
					    while ( $query->have_posts() ) : $query->the_post();
					    $positions = get_the_terms( get_the_ID(), 'position' );
					   
					     ?>
						<div class="col-6 col-md-4 col-lg-2 expertise-single__people-col people-section__col">
							<div class="expertise-single__people-col_inner people-section__col-inner">
							<?php 
								$postThumbnail = get_the_post_thumbnail_url();	
								if(!empty($postThumbnail)):?>
								<div class="expertise-single__people-thumbnail people-section__image image-box style-square" style="background-image: url(<?php echo $postThumbnail; ?>);"></div>	
								<?php endif; ?>
								<div class="expertise-single__people-content people-section__content">
									<h3><?php the_title(); ?></h3>
										<?php if ( $positions && ! is_wp_error( $positions ) ) :  
										$position_name = array(); 
									    foreach ( $positions as $term ) {
									        $position_name[] = $term->name;
									    }
										$position_title = join( ", ", $position_name );?>
									    <p><strong><?php printf( esc_html( $position_title ) ); ?></strong></p>
										<?php endif; ?>
	
									<div class="expertise-single__people-action people-section__actions">
										<p><a href="<?php the_permalink();?>">View profile <i class="far fa-long-arrow-alt-right"></i></a></p>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
					</div>
					<?php } ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</div>

		<?php $clientList = get_field('expertise_client_list');
			if(!empty($clientList)){ ?>
		<div class="expertise-single__clients clients-section p-b__lg bg-alternate text-white text-center">
			<div class="container">
				<h2 class="section-header">Clients</h2>
				<?php the_field('expertise_client_list'); ?>
			</div>
		</div>
		<?php } ?>
		
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
						<?php get_template_part( 'template-parts/kiss/static-partials/expertise-item', get_post_format() ); ?>
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
	<?php get_template_part( 'template-parts/kiss/static-partials/expertise-item', get_post_format() ); ?>
	<?php endif; ?>
</article><!-- #post-## -->


<script type="text/javascript">
jQuery(document).ready(function(){
	
	
    var divHeight = jQuery(".hasDevice").outerHeight();
    var divPadding = divHeight * .97;
    
	jQuery.fn.updateDevice = function(){ 
    	jQuery('head').append('<style type="text/css">.hasDevice:before{padding-left: ' + divPadding + 'px}</style>');
    }
    
    jQuery.fn.updateDevice();
    
    var resizeTimer;

	jQuery(window).on('resize', function(e) {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function() {
			jQuery.fn.updateDevice();
		}, 250);
	});
    
}).resize();
</script>
