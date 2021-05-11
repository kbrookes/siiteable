<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StrapPress
 */

$templatePath = get_template_directory();
$templatePartials = $templatePath . '/template-parts/kiss/static-partials/';

?>

	</div><!-- #content -->
	<?
	$showLogos = get_field('logos_show', 'options');
	$showIcons = get_field('icons_show', 'options');
	
	$logosTitle = get_field('logos_section_title', 'option'); 
	$iconsTitle = get_field('icons_section_title', 'option'); 
	
	if($showLogos || $showIcons):
	$iconType = get_field('icons-type', 'options');
	$imageEl = '';
	
	
	?>
	<section class="container logos-icons">
		<div class="row">
			<? if($showLogos):?>
			<div class="col-12 col-md-6 col-lg-8 col-xl-9 client-logos">
				<h3><?= $logosTitle; ?></h3>
				<?php if( have_rows('logos_repeater', 'option') ): ?>
				<div class="d-flex align-items-center">
					<?php while( have_rows('logos_repeater', 'option') ): the_row(); ?>
					<div class="<?= get_field('logos_padding_XS', 'option'); ?> <?= get_field('logos_padding_MD', 'option'); ?> <?= get_field('logos_padding_LG', 'option'); ?> client-logos__icon">
						<img src="<?php the_sub_field('logo_image'); ?>" class="img-fluid" alt="" />
					</div>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
			<? endif; ?>
			<? if($showIcons): 
			/// TEXT CONTROLS
			$sepPrefix = 'icons';
			include $templatePartials . 'text-controls.php';
			?>
			<div class="col-12 social-icons">
				<h3 class="<?= $optionsTitleTextClass; ?>"><?= $iconsTitle; ?></h3>
				<?php if( have_rows('icons_list', 'option') ): ?>
				<div class="d-flex align-items-center flex-grow-1 <?= $optionsContentTextClass; ?>">
					<?php while( have_rows('icons_list', 'option') ): the_row(); 
						$iconLink = get_sub_field('icon_link');
						if($iconType == 0):
							$imageEl = '<i class="' . get_sub_field('icon_fa', 'option') . '"></i>';
						else:
							$imageEl = '<img src="'. the_sub_field('logo_image') .'" class="img-fluid" alt="" />';
						endif;
					?>
					<div class="<?= get_field('icons_padding', 'option'); ?>">
						<? if(!empty($iconLink)):?>
						<a href="<?= $iconLink; ?>" target="_blank">
						<? endif;
							echo $imageEl;
						if(!empty($iconLink)):?>
						</a>
						<? endif; ?>
					</div>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
			<? endif; ?>
		</div>
	</section>
	<? endif; ?>
	<? 
	$footerCols = 4;
	$footerCols = "col-12 col-sm-6 col-md-3";
	$footerColSm = "col-12 col-sm-6 col-md-2";
	$footerColLg = "col-12 col-sm-6 col-md-5";
	if( get_theme_mod( 'footer_col_num', '' ) != '' ):
		$footerCols = get_theme_mod( 'footer_col_num', 0 );
		switch($footerCols){
			case 4:
				$footerCols = "col-12 col-sm-6 col-md-3";
				break;
			case 3:
				$footerCols = "col-12 col-sm-6 col-md-4";
				break;
			case 2:
				$footerCols = "col-12 col-sm-6";
				break;
			case 1:
				$footerCols = "col-12";
				break;
		}
	endif;
	$footerColFirst = $footerCols;
	$footerColLast = $footerCols;
	if( get_theme_mod( 'footer_col_layout', '' ) != '' ):
		$colLayout = get_theme_mod( 'footer_col_layout', '' );
		switch($colLayout){
			case "equal":
				break;
			case "wide-first":
				$footerColFirst = $footerColLg;
				$footerCols = $footerColSm;
				break;
			case "wide-last":
				$footerColLast = $footerColLg;
				$footerCols = $footerColSm;
				break;
		}
	endif;
	
	$headerSize = "fs-1";
	if( get_theme_mod( 'footer_header_normal', '' ) != '' ):
		$headerSize = get_theme_mod( 'footer_header_normal', '' );
	endif;
	?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">			
			<?php if ( function_exists('footer_sidebar')) : ?>
			<div class="footer-nav">
				<div class="row justify-content-center mb-3 header-<?= $headerSize; ?>">
					<?php if ( is_active_sidebar( 'footer_logo' ) ) : ?>
					<div class="<?= $footerColFirst; ?>">
						<div class="footer-nav__inner">
						<?php dynamic_sidebar('footer_logo');?>
						</div>
					</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer_nav' ) ) : ?>
					<div class="<?= $footerCols; ?>">
						<div class="footer-nav__inner">
						<?php dynamic_sidebar('footer_nav');?>
						</div>
					</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer_disclaimer' ) ) : ?>
					<div class="<?= $footerCols; ?>">
						<div class="footer-nav__inner">
						<?php dynamic_sidebar('footer_disclaimer');?>
						</div>
					</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer_form' ) ) : ?>
					<div class="<?= $footerColLast; ?>">
						<div class="footer-nav__inner">
						<?php dynamic_sidebar('footer_form');?>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
			<?php 
			$footerCorpText = get_theme_mod( 'text_long_corporate');
			if(!empty($footerCorpText)) { ?>
			<div class="footer-info small">
				<?php echo $footerCorpText; ?>
			</div>
			<?php } ?>
			<div class="site-info d-flex justify-content-between">
				<?php if ( is_active_sidebar( 'footer_flat' ) ) : ?>
				<div class="site-info__flatmenu">
					<?php dynamic_sidebar('footer_flat');?>
				</div>
				<?php endif; ?>
				<div class="site-info__copyright text-center">
					<? 
					$siteName = get_bloginfo( 'name' );
					if( get_theme_mod( 'siiteable_sitename_setting_id', '' ) != '' ):
						$siteName = get_theme_mod( 'siiteable_sitename_setting_id', '' );
					endif; ?>
					&copy; <?= $siteName;
							echo ' ';
							echo date("Y"); ?>
				</div>
			</div><!-- .site-info -->
		</div><!--  .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
