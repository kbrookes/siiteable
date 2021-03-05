<?php /// REGISTER FOOTER SIDEBARS
	
function footer_sidebar() {

	$args = array(
		'name'          => __( 'Logo & Contact Section', 'textdomain' ),
		'id'			=> 'footer_logo',
		'description'   => __( 'Used to add a logo & contact details to the footer of your site', 'textdomain' ),
		'class'         => 'footer-nav__logo',
		'before_widget' => '<div id="%1$s" class="footer-nav__logo">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	);
	register_sidebar($args);

	$args = array(
		'name'          => __( 'Footer Navigation', 'textdomain' ),
		'id'			=> 'footer_nav',
		'description'   => __( 'Add a menu to the footer', 'textdomain' ),
		'class'         => 'footer-nav__nav',
		'before_widget' => '<div id="%1$s" class="footer-nav__nav">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	);
	register_sidebar($args);

	$args = array(
		'name'          => __( 'Footer Disclaimer', 'textdomain' ),
		'id'			=> 'footer_disclaimer',
		'description'   => __( 'Add a disclaimer to the footer area', 'textdomain' ),
		'class'         => 'footer-nav__disclaimer',
		'before_widget' => '<div id="%1$s" class="footer-nav__disclaimer">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	);
	register_sidebar($args);

	$args = array(
		'name'          => __( 'Footer Form', 'textdomain' ),
		'id'			=> 'footer_form',
		'description'   => __( 'Add a form to the footer area', 'textdomain' ),
		'class'         => 'footer-nav__form',
		'before_widget' => '<div id="%1$s" class="footer-nav__form">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	);
	register_sidebar($args);
	
	$args = array(
		'name'          => __( 'Small footer', 'textdomain' ),
		'id'			=> 'footer_flat',
		'description'   => __( 'Add a small section to the footer area', 'textdomain' ),
		'class'         => 'footer-nav__flat',
		'before_widget' => '<div id="%1$s" class="footer-nav__flat">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	);
	register_sidebar($args);
	
	$args = array(
		'name'          => __( 'CTA on Case Study', 'textdomain' ),
		'id'			=> 'success_cta',
		'description'   => __( 'Adds a common call to action for all case studies', 'textdomain' ),
		'class'         => 'success-story__cta',
		'before_widget' => '<div id="%1$s" class="case-study__cta">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	);
	register_sidebar($args);

}
add_action( 'widgets_init', 'footer_sidebar' );

