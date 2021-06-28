<?

$cpts = get_field('custom_post_types', 'options');


//// EVENTS
if( $cpts && in_array('cpt-events', $cpts) ) {
    /// EVENTS CPT
    require get_template_directory() . '/inc/kiss-functions/cpt-events.php';
    /// EVents Widget
    require get_template_directory() . '/inc/kiss-functions/events-widget.php'; 
} else {
    if( !function_exists( 'siiteable_unregister_post_type' ) ) {
        function siiteable_unregister_post_type(){
            unregister_post_type( 'events' );
        }
    }
    add_action('init','siiteable_unregister_post_type');
}

//// CASE STUDIES
if( $cpts && in_array('cpt-case-studies', $cpts) ) {
    require get_template_directory() . '/inc/kiss-functions/cpt-case-studies.php';
} else {
    if( !function_exists( 'siiteable_unregister_post_type' ) ) {
        function siiteable_unregister_post_type(){
            unregister_post_type( 'case-studies' );
        }
    }
    add_action('init','siiteable_unregister_post_type');
}



//// TESTIMONIALS
require get_template_directory() . '/inc/kiss-functions/cpt-testimonials.php';