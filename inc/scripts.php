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
    "5.2.8"
  );

  wp_enqueue_style("strappress-fontawesome-base", get_stylesheet_directory_uri() . "/css/fontawesome.min.css", array(), null);
  
  $faType = get_theme_mod( 'fa_styles');
  
  switch($faType){
    case "far":
      //wp_enqueue_style("strappress-fontawesome", get_stylesheet_directory_uri() . "/fonts/fa-regular-400.woff2", array(), null); 
      wp_enqueue_style("strappress-fontawesome-regular", get_stylesheet_directory_uri() . "/css/regular.min.css", array(), null);
      break;
    case "fal":
      //wp_enqueue_style("strappress-fontawesome", get_stylesheet_directory_uri() . "/fonts/fa-light-300.woff2", array(), null);
      wp_enqueue_style("strappress-fontawesome-light", get_stylesheet_directory_uri() . "/css/light.min.css", array(), null);
      break;
    case "fad":
      //wp_enqueue_style("strappress-fontawesome", get_stylesheet_directory_uri() . "/fonts/fa-duotone-900.woff2", array(), null);
      wp_enqueue_style("strappress-fontawesome-duotone", get_stylesheet_directory_uri() . "/css/duotone.min.css", array(), null);
      break;
    case "fas":
      //wp_enqueue_style("strappress-fontawesome", get_stylesheet_directory_uri() . "/fonts/fa-solid-900.woff2", array(), null);
      wp_enqueue_style("strappress-fontawesome-solid", get_stylesheet_directory_uri() . "/css/solid.min.css", array(), null);
      break;
  }
  
  wp_enqueue_style("strappress-fontawesome-brands", get_stylesheet_directory_uri() . "/css/brands.min.css", array(), null);

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
  wp_enqueue_script( 'siiteable_scripts_main', get_template_directory_uri() .'/js/dist/scripts.js', array(), 1.1, false );
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

