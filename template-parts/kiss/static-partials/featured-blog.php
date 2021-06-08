<? 
	$sepPrefix = 'featured';
	
	$templatePath = get_template_directory();
	$templatePartials = $templatePath . '/template-parts/kiss/static-partials/';
	$cardPartials = $templatePath . '/template-parts/kiss/flexi-partials/cards/';
	$faType = get_theme_mod( 'fa_styles');
	
	/// SEPARATORS
	$separatorLayout = $templatePartials . 'separators.php';
	include $separatorLayout;
	
	/// TEXT CONTROLS
	include $templatePartials . 'text-controls.php';
	
	$featuredTitle = get_field($sepPrefix . '_block_title', 'options');
	if(empty($featuredTitle)){
		$featuredTitle = 'FEATURED ARTICLE';
	}
	
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
	

$args = array(
	'post_type' => array('post'),
	'post_status' => array('publish'),
	'posts_per_page' => 1,
	'nopaging' => true,
	'order' => 'DESC',
	'meta_key'         => 'featured_post',
	'meta_value'       => '1',
);

$featuredPost = new WP_Query($args);

if($featuredPost->have_posts()): ?>
<div class="header-featured">
	<div class="header-featured__inner">
	<? while($featuredPost->have_posts()): $featuredPost->the_post();

	$bg_colour = get_sub_field('box_background_colour');
	
	
	/// SET BUTTON COLOUR
	$btnColour = 'secondary';
	switch ($bg_colour) {
		case "Default":
	        $btnColour = "secondary";
	        break;
	    case "Primary":
	        $btnColour = "alternate";
	        break;
	    case "Secondary":
	        $btnColour = "alternate";
	        break;
	    case "Dark":
	        $btnColour = "secondary";
	        break;
		case "Light":
	        $btnColour = "secondary";
	        break;
		case "White":
	        $btnColour = "secondary";
	        break;
		case "Alternate":
	        $btnColour = "secondary";
	        break;
	}
	
	
 ?>


		<section id="featuredPost" class="blog-post blog-post__featured <?= $separatorClasses; ?>">
			<div class="blog-post__wrap">
				<div class="container">
					<h2 class="<?= $optionsTitleTextClass; ?>"><?= $featuredTitle; ?></h2>
					<div class="row">
						<div class="col-12 col-md-3 col-lg-4">
							<a href="<? the_permalink(); ?>">
								<div class="blog-post__image">
									<? echo wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'featured-blog'); ?>
									<div class="blog-post__image-inner">
										<span class="btn-custom <? echo $btnColour; ?>"><?= $linkText; ?></span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-md-9 col-lg-8">
							<div class="blog-post__featured-content <?= $optionsContentTextClass; ?>">
								<article>
									<header>
										<h3><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h3>
										<div class="post-details">
											<? the_excerpt(); ?>
										</div>
										<div class="post-link <?= $buttonAlign; ?>">
											<a class="btn-custom <?= $btnClass; ?>" href="<? the_permalink(); ?>"><?= $linkText; ?></a>
										</div>
									</header>
								</article>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if($addSeparatorLower == true):
				include $pathLower;
			endif; ?>
		</section>
	<? endwhile;?>
	</div>
</div>
<script>
	/// ADD HERO CLASS TO BODY TO DYNAMICALLY CHANGE PADDING
	(function($) {
		$('.site-main').addClass('hasFeatured')
	})(jQuery);
</script>
	<? else: endif; ?>
<? wp_reset_query(); ?>
