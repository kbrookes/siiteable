<?php
/**
* Template part for displaying posts
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package StrapPress
*/

$introText = get_field('team_intro_text'); 

$postID = get_the_id();

/// CONTACT DETAILS
$contactDetails = get_field('team_contact_details');
$firstName = $contactDetails['team_first_name'];
$phoneNumber = $contactDetails['team_phone_number'];
$emailAddress = $contactDetails['team_email_address'];
$vCard = $contactDetails['team_upload_vcard']; 

// GET FONTAWESOME LIBRARY
$faType = get_theme_mod( 'fa_styles');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('team-page team-single'); ?>>
	
	<?php if(is_single()):?>
	
	<div class="team-single__member">
		<div class="container">
			<div class="row">
				<?php if (has_post_thumbnail( $post->$postID ) ): ?>
				<div class="col-12 col-md-4 col-lg-5">
					<div class="team-single__member-headshot">
						<img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="<?php the_title(); ?> Headshot" />
					</div>
				</div>
				<?php endif; ?>
				<div class="col-12 <?php if ($full_img == "") : ?>col-md-8 col-lg-7"<?php endif; ?>>
					<div class="team-single__member-info">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<?php 
							$positions = get_the_terms( get_the_ID(), 'position' );
							if ( $positions && ! is_wp_error( $positions ) ) :  
								$position_name = array(); 
							    foreach ( $positions as $term ) {
							        $position_name[] = $term->name;
							    }
								$position_title = join( ", ", $position_name );?>
							    <h2><?php printf( esc_html( $position_title ) ); ?></h2>
							<?php endif; ?>
						<div class="team-single__contact">
							<?php if(!empty($phoneNumber)): ?>
							<div class="team-single__contact-single team-single__contact-phone">
								<i class="<?= $faType; ?> fa-phone"></i> <?php if(!empty($firstName)):?><strong>Call <?php echo $firstName; ?></strong> <?php endif; ?>+61 2 <?php echo $phoneNumber; ?>
							</div>
							<?php endif; ?>
							<?php if(!empty($emailAddress)): ?>
							<div class="team-single__contact-single team-single__contact-email">
								<a href="mailto:<?php echo $emailAddress; ?>"><i class="<?= $faType; ?> fa-envelope"></i> <?php if(!empty($firstName)):?><strong>Email <?php echo $firstName; ?></strong> <?php endif; ?></a>
							</div>
							<?php endif; ?>
							<div class="team-single__contact-single team-single__contact-vcard">
								<?php
								global $post;
								$vcfname = $post->post_name;?>
								<a href="<?php echo get_template_directory_uri(); ?>/vcard/<?php echo $vcfname; ?>.vcf"><i class="<?= $faType; ?> fa-address-card"></i> <strong>Download Vcard</strong></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php if(!empty($introText)):?>
	<div class="team-single__intro intro-section bg-primary text-white p-b__lg">
		<div class="container">
			<p><?php echo esc_html($introText); ?></p>
		</div>
	</div>
	<?php endif; ?>
	<div class="team-single__about">
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
	<div id="teamAccordion" class="team-single__accordion">
		<?php 
		/// GET EXPERIENCE
		if( have_rows('team_experience') ): ?>
		<div class="card team-single__experience bg-light">
			<div class="card-header" id="headerExperience">
				<a class="btn btn-link collapsed" data-toggle="collapse" data-target="#experience" aria-labelledby="headerExperience" data-parent="#teamAccordion">
					<div class="container d-flex justify-content-between align-items-center">
						<h3>Experience</h3>
						<span class="card-closed"><i class="<?= $faType; ?> fa-chevron-up"></i></span>
					</div>
				</a>
			</div>
			<div id="experience" class="collapse" aria-labelledby="headerExperience" data-parent="#accordion">
				<div class="card-body">
					<div class="container">
						<?php while ( have_rows('team_experience') ) : the_row(); ?>
						<div class="team-single__experience-item">
							<p><span class="text-primary"><?php the_sub_field('team_experience_title'); ?> &mdash; </span><?php the_sub_field('team_experience_description'); ?></p>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<div class="card team-single__practice bg-white">
			<div class="card-header" id="headerPractice">
				<a class="btn btn-link collapsed" data-toggle="collapse" data-target="#practice" aria-labelledby="headerPractice" data-parent="#teamAccordion">
					<div class="container d-flex justify-content-between align-items-center">
						<h3>Practice areas and other information</h3>
						<span class="card-closed"><i class="<?= $faType; ?> fa-chevron-up"></i></span>
					</div>
				</a>
			</div>

			<div id="practice" class="collapse" aria-labelledby="headerPractice" data-parent="#accordion">
				<div class="card-body">
					<div class="container">
						<?php if( have_rows('team_recognition') ): ?>
						<div class="team-single__practice-items">
							<h4>Recognition</h4>
							<?php while ( have_rows('team_recognition') ) : the_row(); ?>
							<?php $recognitionState = get_sub_field('team_award_state'); ?>
							<div class="team-single__practice-item">
								<p><?php the_sub_field('team_awarding_body'); ?> &mdash; <?php the_sub_field('team_award_name'); ?><?php if(!empty($recognitionState)):?> &mdash; <?php echo($recognitionState); ?><?php endif;?> &mdash; <?php the_sub_field('team_award_year'); ?></p>
							</div>
							<?php endwhile; ?>
						</div>
						<?php endif; ?>
						<?php if( have_rows('team_committees_and_memberships') ): ?>
						<div class="team-single__practice-items">
							<h4>Committees and memberships</h4>
							<?php while ( have_rows('team_committees_and_memberships') ) : the_row(); ?>
							<?php $membershipState = get_sub_field('team_membership_state'); 
								$startYear = get_sub_field('team_year_started');
								$endYear = get_sub_field('team_year_finished');
								$currentYear = date("Y");
								$showEndYear = true;
								if($startYear == $currentYear):
									$showEndYear = false;
								endif;
								if(!empty($startYear)):
									$startYear = ', ' . $startYear;
								endif;
								if(empty($endYear)):
								else:
									$endYear = ' - ' . $endYear;
								endif;
								$intermittent = get_sub_field('team_membership_intermittent');
								
							?>
							<div class="team-single__practice-item">
								<p><?php the_sub_field('team_membership_title'); ?>, <?php the_sub_field('team_membership_body'); ?><?php if(!empty($membershipState)):?>  (<?php echo($membershipState); ?>)<?php endif;?><?php echo $startYear; ?><?php if($showEndYear):?><?php echo($endYear); ?><?php endif; ?><?php if($intermittent):?> (intermittently)<?php endif; ?></p>
							</div>
							<?php endwhile; ?>
						</div>
						<?php endif; ?>
						
						<?php 
						$practiceAreas = get_the_terms( get_the_ID(), 'expertise' );
						if ( $practiceAreas && ! is_wp_error( $practiceAreas ) ) : ?>
						<div class="team-single__practice-items">
							<h4>Practice Areas</h4>
							<?php $expertise = array(); 
						    foreach ( $practiceAreas as $term ) {?>
						        <p><?php echo esc_html($expertise[] = $term->name);?></p>
						    <?php } ?>
						</div>
						<?php endif; ?>
						
						<?php 
						$industries = get_the_terms( get_the_ID(), 'industry' );
						if ( $industries && ! is_wp_error( $industries ) ) : ?>
						<div class="team-single__practice-items">
							<h4>Industries</h4>
							<?php $industry = array(); 
						    foreach ( $industries as $term ) {?>
						        <p><?php echo esc_html($industry[] = $term->name);?></p>
						    <?php } ?>
						</div>
						<?php endif; ?>
						
						<?php if( have_rows('team_other_expertise') ): ?>
						<div class="team-single__practice-items">
							
							<h4>Other areas of expertise</h4>

							<?php while ( have_rows('team_other_expertise') ) : the_row(); ?>
							<div class="team-single__practice-item">
								<p><?php the_sub_field('team_expertise_info'); ?></p>
							</div>
							<?php endwhile; ?>
						</div>
						<?php endif; ?>
							
						<?php if( have_rows('team_qualifications') ): ?>
						<div class="team-single__practice-items">
							<?php 
							$count = 1;
							while ( have_rows('team_qualifications') ) : the_row(); 
							$count++;
							endwhile;
							
							$quals = "Qualification";
							if($count > 1):
								$quals = "Qualifications";
							endif;
							?>
							<h4><?php echo $quals; ?></h4>

							<?php while ( have_rows('team_qualifications') ) : the_row(); ?>
							<div class="team-single__practice-item">
								<p><?php the_sub_field('team_qualification'); ?></p>
							</div>
							<?php endwhile; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
			
	</div>
		
	<?php // GET TESTIMONIALS
		$the_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
		$slug = $the_page->post_name; 
		$args_query = array(
			'post_type' => array('testimonials'),
			'nopaging' => true,
			'order' => 'DESC',
			'tax_query' => array(
				array(
					'taxonomy' => 'person',
					'field' => 'slug',
					'terms' => array($slug),
					'include_children' => false,
				),
			),
		);
		
		$query = new WP_Query( $args_query ); 
	
	if ( $query->have_posts() ) { ?>
	<div class="team-single__featured-testimonial testimonial-section hasDevice hasDevice-light bg-alternate">
		<div class="container">
			<?php while ( $query->have_posts() ) {
				$query->the_post();
				$testRole = get_field('title_or_role');
				
			} ?>
			<div class="team-single__testimonial-quote">
				<div class="team-single__testimonial-quotation testimonial-section__quotation">
					<?php the_content(); ?>
				</div>
				<div class="team-single__testimonial-attribution testimonial-section__attribution">
					<span><?php the_title(); if(!empty($testRole)): ?>, <?php echo $testRole; endif; ?></span>
				</div>
			</div>
		</div>
	</div>
	<?php } else {
			//var_dump($query);
		} ?>
	<?php wp_reset_postdata(); ?>
	
	<?php /// GET POSTS BY THIS PERSON
	$args_query_posts = array(
		'post_type' => array('post'),
		//'nopaging' => true,
		'order' => 'DESC',
		'posts_per_page' => 3,
		'tax_query' => array(
			array(
				'taxonomy' => 'person',
				'field' => 'slug',
				'terms' => array($slug),
				'include_children' => false,
			),
		),
	);
	
	$query_posts = new WP_Query( $args_query_posts );
	
	if ( $query_posts->have_posts() ) { ?>
	<div class="team-single__posts posts-sections p-b__md">
		<div class="container">
			<h2 class="text-center m-b__md">News and new thinking</h2>
			<div class="row">
			<?php while ( $query_posts->have_posts() ) {
				$query_posts->the_post();?>
				<div class="col-12 col-sm-6 col-md-4">
					<?php get_template_part( 'template-parts/kiss/static-partials/news-item', get_post_format() ); ?>
				</div>
				<?php }?>
			</div>
		</div>
	</div>
			<?php } else {
	
			}
	
	wp_reset_postdata(); ?>
	
	
	<footer class="entry-footer">
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

<div class="modal fade" id="postModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">My <?php the_title(); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" id="video" src=""></iframe>
				</div>
            </div>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
	// Gets the video src from the data-src on each button
	
	var $videoSrc;  
	$('.video-btn').click(function() {
	    $videoSrc = $(this).data( "src" );
	});
	console.log($videoSrc);  
  
	// when the modal is opened autoplay it  
	$('#postModal').on('shown.bs.modal', function (e) {
	    
	// set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
	$("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
	})
  
	// stop playing the youtube video when I close the modal
	$('#postModal').on('hide.bs.modal', function (e) {
	    // a poor man's stop video
	    $("#video").attr('src',$videoSrc); 
	}) 

// document ready  
});
</script>

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
