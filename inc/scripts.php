<?php
/**
 * Enqueue scripts and styles.
 */
function strappress_scripts()
{
  wp_enqueue_style(
    "strappress-style",
    get_stylesheet_directory_uri() . "/style.css",
    [],
    "4.4.70"
  );

  wp_enqueue_style(
    "strappress-font-regular",
    get_stylesheet_directory_uri() . "/fonts/open-sans-v18-latin-regular.woff2",
    array(), null);
  wp_enqueue_style(
    "strappress-font-light",
    get_stylesheet_directory_uri() . "/fonts/open-sans-v18-latin-300.woff2",
    array(), null);
  wp_enqueue_style(
    "strappress-font-bold",
    get_stylesheet_directory_uri() . "/fonts/open-sans-v18-latin-700.woff2",
    array(), null);
  wp_enqueue_style(
    "strappress-font-fontawesome",
    get_stylesheet_directory_uri() . "/fonts/fa-regular-400.woff2",
    array(), null);

  wp_enqueue_script(
    "strappress-js",
    get_template_directory_uri() . "/js/dist/scripts.min.js",
    ["jquery"],
    " ",
    true
  );

  wp_enqueue_script(
    "site-js",
    get_template_directory_uri() . "/js/dist/site-min.js",
    ["jquery"],
    " ",
    true
  );
  
  


  if (is_singular() && comments_open() && get_option("thread_comments")) {
    wp_enqueue_script("comment-reply");
  }
}
add_action("wp_enqueue_scripts", "strappress_scripts");

add_filter( 'style_loader_tag','wpse366869_preload_styles', 10, 4 );
function wpse366869_preload_styles( $html, $handle, $href, $media ) {

    // do this only when 'fontawesome-webfont' is mentioned in the html
    if( 0 != strpos( $html, 'strappress-font-regular' ) ) {
        $html = str_replace( '<', '<rel="preload "', $html );
    }
    
    return $html;
}

/**
 * Filter the HTML script tag of `leadgenwp-fa` script to add `defer` attribute.
 *
 */
function strappress_defer_scripts($tag, $handle, $src)
{
  // The handles of the enqueued scripts we want to defer
  $defer_scripts = ["site-js"];
  if (in_array($handle, $defer_scripts)) {
    return '<script src="' . $src . '" defer></script>';
  }
  return $tag;
}
add_filter("script_loader_tag", "strappress_defer_scripts", 10, 3);
