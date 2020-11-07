<?php
	
	// GENERAL INIT
	$templatePath = get_template_directory();
	$sepPrefix = 'logos';
	
	// GET THE BOX BACKGROUND COLOUR
	include $templatePath . "/template-parts/kiss/static-partials/box-background-color.php";
	
		
	/// SEPARATORS INIT
	$separatorLayout = $templatePath . "/template-parts/kiss/static-partials/separators.php";
	
	include $separatorLayout;
	
	/// LOGO PADDING VARIABLE
	$logoPadding = 'p-' . get_sub_field('logos_padding');
	
	?>
<section class="client-logos <?php echo $bgcolour . ' ' . $separatorClasses; ?> <?php if(get_sub_field('background_image')):?> hasBg<?php endif; ?>">
	<?php if($addSeparatorUpper == true):
		include $pathUpper;
	endif; ?>
	<div class="client-logos__inner flexi-inner">
		<div class="container">
		<?php if(!empty(get_sub_field('logos_title'))){
			echo '<h2>' . get_sub_field('logos_title') . '</h2>';
		} ?>
		<div class="row">
		<?php 
		/// GET LOGOS
		if(have_rows('logos_repeater'))	{
			while (have_rows('logos_repeater')) : the_row(); ?>
			<div class="col">
				<div class="client-logos__logo <?php echo $logoPadding; ?>">
					<img class="img-fluid" src="<?php echo the_sub_field('logo_add'); ?>" />
				</div>
			</div>
		<?php endwhile; } ?>
		</div>
		<?php if($addButton){ ?>
			<div class="client-logos__actions">
				<a class="btn-custom <?php echo $btnColour; ?> <?php if($setLink=='form'): echo $linkClass; endif; ?>" href="<?php if($setLink=='email'):?>mailto:<?php endif; ?><?php echo $linkContent; ?>" <?php if($setLink=='link'):?>target="_blank"<?php endif; ?>><?php if($linkText){ echo $linkText; } else { ?>LEARN HOW<?php } ?></a>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php if($addSeparatorLower == true):
		include $pathLower;
	endif; ?>
</section>