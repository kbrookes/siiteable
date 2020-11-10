<?php
	
	$bg_image = get_sub_field('background_image');
	
	$bg_colour = get_sub_field('box_background_colour');
	
	/// SET BG COLOUR
	$bgcolour = '';
	$btnColour = 'primary';
	switch ($bg_colour) {
		case "Default":
	        $bgcolour = "bg-default";
	        $btnColour = "primary";
	        break;
	    case "Primary":
	        $bgcolour = "bg-primary";
	        $btnColour = "alternate";
	        break;
	    case "Secondary":
	        $bgcolour = "bg-secondary";
	        $btnColour = "alternate";
	        break;
	    case "Dark":
	        $bgcolour = "bg-dark";
	        $btnColour = "primary";
	        break;
		case "Light":
	        $bgcolour = "bg-light";
	        $btnColour = "primary";
	        break;
		case "White":
	        $bgcolour = "bg-white";
	        $btnColour = "primary";
	        break;
		case "Alternate":
	        $bgcolour = "bg-alternate";
	        $btnColour = "primary";
	        break;
	}
	
	/// SEPARATORS INIT
	
	$sepPrefix = 'content';
	$templatePath = get_template_directory();
	$separatorLayout = $templatePath . "/template-parts/kiss/static-partials/separators.php";
	
	include $separatorLayout;
	
	/// DIRECTION
	$containerDirection = 'text-' . get_sub_field($sepPrefix . '_container_direction');
	
	?>
<section class="contenttype-content <?php echo $bgcolour . ' ' . $separatorClasses .' ' . $containerDirection; ?> <?php if(get_sub_field('background_image')):?> hasBg<?php endif; ?>" <?php if($bg_image): ?>style="background-image: url(<?php echo $bg_image; ?>);"<?php endif; ?>>
	<?php if($addSeparatorUpper == true):
		include $pathUpper;
	endif; ?>
	<div class="contenttype-content__inner flexi-inner">
		<div class="container">
		<?php 
			if(get_sub_field('type_of_content_to_add') == 'Featured blog'):
				get_template_part('template-parts/kiss/static-partials/featured-blog', 'Featured blog');
			elseif(get_sub_field('type_of_content_to_add') == 'Latest posts'):
				get_template_part('template-parts/kiss/static-partials/latest-blog', 'Latest blog');
			endif;
			?>
		</div>
	</div>
	<?php if($addSeparatorLower == true):
		include $pathLower;
	endif; ?>
</section>