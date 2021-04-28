<?

/// GENERAL INIT
$sepPrefix = "col";
$templatePath = get_template_directory();
$templatePartials = $templatePath . '/template-parts/kiss/static-partials/';


$separatorLayout = $templatePartials . "separators.php";
include $separatorLayout;

// Custom classes, container direction & size, title, text
include $templatePartials . 'general-partials.php';
$bgcolour = $bg_colour;

$colOrder = "order-first";
if (get_sub_field("image_left_or_right")) {
  if (get_sub_field("image_left_or_right") == "Left") {
    $colOrder = "order-first";
  } elseif (get_sub_field("image_left_or_right") == "Right") {
    $colOrder = "order-last";
  }
}


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


// GET BUTTONS
$addButton = false;
if (get_sub_field($sepPrefix . "_button_add_button") == true):
  include $templatePartials . "buttons.php";
endif;


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
<section class="image-content  <?= $bgcolour .
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
	<? if ($addSeparatorUpper == true):
   include $pathUpper;
 endif; ?>
	<div class="image-content__inner">
		<div class="container">
			<div class="row">
				<? if (!empty($colImage)) { ?>
				<div class="<?= $classImageCol . " " . $colOrder; ?>">
					<div class="image-content__inner-image <?= $imageColClass; ?>">
						<?= $btnLinkOpen; ?>
						<? if ($imageType == "image"): ?>
						<img src="<?= $colImage; ?>" class="img-fluid <?= $imgShadow ?>" />
						<? elseif ($imageType == "icon"): ?>
						<?= $colImage; ?>
						<? endif; ?>
						<?= $btnLinkClose; ?>
					</div>
				</div>
				<? } ?>
				<div class="<?= $classContentCol; ?>">
					<div class="image-content__inner-content">
						<? if(!empty(get_sub_field("col_title"))):?>
						<?= $btnLinkOpen; ?>
						<h3><?= get_sub_field("col_title") ?></h3>
						<?= $btnLinkClose; ?>
						<? endif; ?>
						<?= wpautop(get_sub_field("content_column")); ?>
						<? if ($btnHide == false) { ?>
						<? include $templatePartials . "add-button.php"; ?>
						<? } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<? if ($addSeparatorLower == true):
   include $pathLower;
 endif; ?>
</section>