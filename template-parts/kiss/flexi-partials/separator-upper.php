<?php ?>
<div class="section-separator section-separator__upper direction<?php echo $upperSeparatorDirection; ?> <?php echo $upperBoxBackground; ?> fg-<?php echo $upperSeparatorForeground; ?> shadow-<?php echo $upperSeparatorShadow; ?> <?php echo $upperClassVertical . ' '; echo $upperClassHorizontal; ?>">
	<div class="section-separator__inner">
		<?php echo file_get_contents($upperSeparatorFile); ?>
	</div>
</div>