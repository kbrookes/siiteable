<?php
	$separatorType = '';
	$separatorDirection = '';
	$separatorForeground = '';
	$separatorShadow = '';
	$boxBackground = '';
	$templatePath = get_template_directory();
	
	$addSeparator = false;
	if(get_sub_field('add_separator_separator_type') != ''):
		$addSeparator = true;
		$separatorType = get_sub_field('add_separator_separator_type');
		$separatorDirection = get_sub_field('add_separator_separator_direction');
		$separatorForeground = get_sub_field('add_separator_separator_foreground');
		$separatorShadow = get_sub_field('add_separator_separator_shadow');
		$containerColor = get_sub_field('add_separator_container_background');
	endif;
	
	if($separatorDirection == 1):
		$separatorDirection = "-up";
	elseif($separatorDirection == 0):
		$separatorDirection = "-down";
	endif;
	
	$separatorFile = $templatePath . "/template-parts/kiss/flexi-partials/separators/separator-";
	$separatorFile .= $separatorType;
	$separatorFile .= $separatorDirection;
	$separatorFile .= ".svg";
	
	$boxBackground = 'bg-' . $containerColor;
	

	?>
<section class="section-separator <?php echo $boxBackground; ?> fg-<?php echo $separatorForeground; ?> shadow-<?php echo $separatorShadow; ?>">
	<div class="section-separator__inner"><?php echo file_get_contents($separatorFile); ?>
	</div>
</section>