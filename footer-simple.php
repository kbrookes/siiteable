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

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<?php if ( function_exists('footer_sidebar')) : ?>
			<div class="footer-nav">
				<div class="row">
					<?php if ( is_active_sidebar( 'footer_logo' ) ) : ?>
					<div class="col-12 col-sm-6 offset-sm-3 col-md-4 offset-md-4">
						<div class="footer-nav__inner">
						<?php dynamic_sidebar('footer_logo');?>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
			<div class="site-info">
				&copy; <?php bloginfo( 'name' );
						echo ' - ';
						echo date("Y"); ?>
			</div><!-- .site-info -->
		</div><!--  .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
