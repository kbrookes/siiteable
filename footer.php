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

?>

	</div><!-- #content -->
	<?
	$showLogos = get_field('logos_show', 'options');
	$showIcons = get_field('icons_show', 'options');
	
	$logosTitle = get_field('logos_section_title', 'option'); 
	$iconsTitle = get_field('icons_section_title', 'option'); 
	
	if($showLogos || $showIcons):
	?>
	<section class="container">
		<div class="row">
			<? if($showLogos):?>
			<div class="col-12 col-md-6 col-lg-8 col-xl-9 client-logos">
				<h3><?= $logosTitle; ?></h3>
				<?php if( have_rows('logos_repeater', 'option') ): ?>
				<div class="d-flex align-items-center">
					<?php while( have_rows('logos_repeater', 'option') ): the_row(); ?>
					<div class="<?= get_field('logos_padding', 'option'); ?>">
						<img src="<?php the_sub_field('logo_image'); ?>" class="img-fluid" alt="" />
					</div>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
			<? endif; ?>
			<? if($showIcons): ?>
			<div class="col-12 col-md-6 col-lg-4 col-xl-3 social-icons d-flex flex-column">
				<h3><?= $iconsTitle; ?></h3>
				<?php if( have_rows('icons_list', 'option') ): ?>
				<div class="d-flex align-items-center flex-grow-1">
					<?php while( have_rows('icons_list', 'option') ): the_row(); 
						$iconLink = get_sub_field('icon_link');
					?>
					<div class="<?= get_field('icons_padding', 'option'); ?>">
						<? if(!empty($iconLink)):?>
						<a href="<?= $iconLink; ?>" target="_blank">
						<? endif; ?>
						<img src="<?php the_sub_field('icon_add'); ?>" class="img-fluid" alt="" />
						<? if(!empty($iconLink)):?>
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
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">			
			<?php if ( function_exists('footer_sidebar')) : ?>
			<div class="footer-nav">
				<div class="row justify-content-center mb-3">
					<?php if ( is_active_sidebar( 'footer_logo' ) ) : ?>
					<div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
						<div class="footer-nav__inner">
						<?php dynamic_sidebar('footer_logo');?>
						</div>
					</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer_nav' ) ) : ?>
					<div class="col-12 col-sm-6 col-md-6 col-lg-2 offset-lg-1 col-xl-2">
						<div class="footer-nav__inner">
						<?php dynamic_sidebar('footer_nav');?>
						</div>
					</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer_disclaimer' ) ) : ?>
					<div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
						<div class="footer-nav__inner">
						<?php dynamic_sidebar('footer_disclaimer');?>
						</div>
					</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer_form' ) ) : ?>
					<div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
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
			<div class="site-info">
				<div class="site-info__copyright text-center">
					&copy; <?php bloginfo( 'name' );
							echo ' - ';
							echo date("Y"); ?>
				</div>
				<?php if ( is_active_sidebar( 'footer_flat' ) ) : ?>
				<div class="site-info__flatmenu">
					<?php dynamic_sidebar('footer_flat');?>
				</div>
				<?php endif; ?>
			</div><!-- .site-info -->
		</div><!--  .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
