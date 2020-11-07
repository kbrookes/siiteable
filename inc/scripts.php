<?php
/**
 * Enqueue scripts and styles.
 */
function strappress_scripts() {
	wp_enqueue_style( 'strappress-style', get_stylesheet_directory_uri() . '/style.css', array(), '4.2.3' );
	
	//wp_enqueue_style( 'strappress-fonts', '//fonts.googleapis.com/css?family=Arvo:400,700|Roboto:300,400,700&display=swap', array());
	
	wp_enqueue_style('strappress-fonts', '//fonts.googleapis.com/css?family=Lato:wght@300;400;700;900&display=swap', array());

	wp_enqueue_script( 'strappress-js', get_template_directory_uri() . '/js/dist/scripts.min.js', array('jquery'), ' ', true );
	
	wp_enqueue_script( 'site-js', get_template_directory_uri() . '/js/src/site.js', array('jquery'), ' ', true );

	wp_enqueue_script( 'strappress-fa', 'https://kit.fontawesome.com/bf9e7e2c24.js', array(), '5.6.3' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'strappress_scripts' );


/**
 * Filter the HTML script tag of `leadgenwp-fa` script to add `defer` attribute.
 *
*/
function strappress_defer_scripts( $tag, $handle, $src ) {
	// The handles of the enqueued scripts we want to defer
	$defer_scripts = array( 
		'strappress-fa'
	);
    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . $src . '" defer></script>';
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'strappress_defer_scripts', 10, 3 );