<?php
/**
 * Enqueue scripts and styles.
 */
function siiteable_scripts()
{
  /// STYLES FIRST
  wp_enqueue_style(
    "strappress-style",
    get_stylesheet_directory_uri() . "/style.css",
    [],
    "4.4.87"
  );

  wp_enqueue_style("strappress-font-regular", get_stylesheet_directory_uri() . "/fonts/open-sans-v18-latin-regular.woff2", array(), null);
  wp_enqueue_style("strappress-font-light", get_stylesheet_directory_uri() . "/fonts/open-sans-v18-latin-300.woff2", array(), null);
  wp_enqueue_style("strappress-font-bold", get_stylesheet_directory_uri() . "/fonts/open-sans-v18-latin-700.woff2", array(), null);
  wp_enqueue_style("strappress-fontawesome", get_stylesheet_directory_uri() . "/fonts/fa-regular-400.woff2", array(), null);

  /// FILTER FOR PRELOADING FONTS
  add_filter( 'style_loader_tag','siiteable_preload_styles', 10, 4 );
  function siiteable_preload_styles( $html, $handle, $href, $media ) {
  
      // do this only when 'fontawesome-webfont' is mentioned in the html
      if( 0 != strpos( $html, 'strappress-font-' ) ) {
          $html = str_replace( "<link rel='stylesheet'", "<link rel='preload ' as='style'", $html );
      }
      
      return $html;
  }
  
  /// LOAD SCRIPTS
  wp_enqueue_script( 'siiteable_scripts_main', get_template_directory_uri() .'/js/dist/scripts.js', array(), 1.0, false );
  wp_enqueue_script( 'siiteable_scripts_bootstrap', get_template_directory_uri() .'/js/dist/bootstrap.min.js', array(), 1.0, false );
  wp_enqueue_script( 'siiteable_scripts_custom', get_template_directory_uri() .'/js/dist/site-min.js', array(), 1.0, false );

  /// FILTER FOR DEFERING SCRIPTS
  add_filter( 'script_loader_tag','siiteable_preload_scripts', 10, 3 );
  function siiteable_preload_scripts( $html, $handle, $href ) {
  
      // do this only when 'fontawesome-webfont' is mentioned in the html
      if( 0 != strpos( $html, 'siiteable_scripts' ) ) {
          $html = str_replace( "<script type='text/javascript'", "<script defer='defer' type='text/javascript'", $html );
      }
      
      return $html;
  }



  if (is_singular() && comments_open() && get_option("thread_comments")) {
    wp_enqueue_script("comment-reply");
  }
}
add_action("wp_enqueue_scripts", "siiteable_scripts");

