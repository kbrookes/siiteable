<?php
$colOrder = "order-first";
if (get_sub_field("image_left_or_right")) {
  if (get_sub_field("image_left_or_right") == "Left") {
    $colOrder = "order-first";
  } elseif (get_sub_field("image_left_or_right") == "Right") {
    $colOrder = "order-last";
  }
}

$bg_colour = get_sub_field("col_box_background_colour");

/// SET BG COLOUR
$bgcolour = $bg_colour;

/// SEPARATORS INIT

$sepPrefix = "col";
$templatePath = get_template_directory();
$separatorLayout =
  $templatePath . "/template-parts/kiss/static-partials/separators.php";

include $separatorLayout;

/// IMAGE OR ICON?
$colImage = "";
$imageType = "image";
$imageType = get_sub_field($sepPrefix . "_image_type");
$imageColClass = "image-file";
if ($imageType == "icon"):
  $imageColClass = "image-icon";
elseif ($imageType == "image"):
  $imageColClass = "image-file";
endif;

$classImageCol = "col-12 col-md-6 col-lg-4";
$classContentCol = "col-12 col-md-6 col-lg-8";

if ($imageType == "icon"):
  $classImageCol = "col-12 col-md-2 col-lg-2 col-xl-2";
  $classContentCol = "col-12 col-md-10 col-lg-10 col-xl-10";
endif;

if ($imageType == "icon"):
  $colImage = get_sub_field($sepPrefix . "_add_icon");
elseif ($imageType == "image"):
  $colImage = get_sub_field("image_column");
endif;

/// GET CUSTOM CLASS
$customClass = "";
if (get_sub_field($sepPrefix . "_class")) {
  $customClass = get_sub_field($sepPrefix . "_class");
}

// GET BUTTONS
$addButton = false;
if (get_sub_field($sepPrefix . "_button_add_button") == true):
  $addButton = true;
  include $templatePath . "/template-parts/kiss/static-partials/buttons.php";
endif;

$btnColour = "light";

// Button Options
$btnAddLinks = false;
$btnAddLinks = get_sub_field($sepPrefix . "_links");

$btnHide = false;
$btnHide = get_sub_field($sepPrefix . "_hide_button");

/// DIRECTION
$containerDirection =
  "text-" . get_sub_field($sepPrefix . "_container_direction");

/// SHADOWS
$imgShadow = get_sub_field($sepPrefix . "_image_shadow");
$boxShadow = get_sub_field($sepPrefix . "_box_shadow");

/// PADDING
$boxPadding = get_sub_field($sepPrefix . "_box_padding");

/// MARGINS
$marginSize = get_sub_field($sepPrefix . "_margin_size");
$marginSides = get_sub_field($sepPrefix . "_margin_sides");

$marginClass = $marginSides . "-" . $marginSize;
?>
<section class="image-content  <?php echo $bgcolour .
  " " .
  $separatorClasses .
  " " .
  $containerDirection .
  " " .
  $customClass .
  " " .
  $boxShadow .
  " " .
  $boxPadding .
  " " .
  $marginClass; ?>">
	<?php if ($addSeparatorUpper == true):
   include $pathUpper;
 endif; ?>
	<div class="image-content__inner">
		<div class="container">
			<div class="row">
				<?php if (!empty($colImage)) { ?>
				<div class="<?php echo $classImageCol . " " . $colOrder; ?>">
					<div class="image-content__inner-image <?php echo $imageColClass; ?>">
						<? if($btnAddLinks = true):?>
						<a href="<?php
      if ($setLink == "email"): ?>mailto:<?php endif;
      echo $linkContent;
      ?>">
						<? endif; ?>
						<?php if ($imageType == "image"): ?>
						<img src="<?php echo $colImage; ?>" class="img-fluid <?= $imgShadow ?>" />
						<?php elseif ($imageType == "icon"): ?>
						<?php echo $colImage; ?>
						<?php endif; ?>
						<? if($btnAddLinks = true):?>
						</a>
						<? endif; ?>
					</div>
				</div>
				<?php } ?>
				<div class="<?php echo $classContentCol; ?>">
					<div class="image-content__inner-content">
						<? if(!empty(get_sub_field("col_title"))):?>
						<? if($btnAddLinks = true):?>
						<a href="<?php
      if ($setLink == "email"): ?>mailto:<?php endif;
      echo $linkContent;
      ?>">
						<? endif; ?>
						<h3><?= get_sub_field("col_title") ?></h3>
						<? if($btnAddLinks = true):?>
						</a>
						<? endif; ?>
						<? endif; ?>
						<?php echo get_sub_field("content_column"); ?>
						<?php if ($addButton == true && $btnHide == false) { ?>
						<div class="image-content__actions">
							<a class="btn-custom btn-sm 
							<?php echo $btnColour; ?> <?php if ($setLink == "form"):
   echo $linkClass;
 endif; ?>" href="<?php
if ($setLink == "email"): ?>mailto:<?php endif;
echo $linkContent;
?>" <?php if ($setLink == "link"): ?>target="_blank"<?php endif; ?>><?php if (
  $linkText
) {
  echo $linkText;
} else {
   ?>LEARN HOW<?php
} ?></a>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php if ($addSeparatorLower == true):
   include $pathLower;
 endif; ?>
</section>