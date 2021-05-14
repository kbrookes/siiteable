<?

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_sub_page') ) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Theme General Settings'),
            'menu_title'  => __('Theme Settings'),
            'redirect'    => false,
            'menu_slug' => 'theme-options',
        ));
        
        // Add sub page.
        $child = acf_add_options_sub_page(array(
            'page_title'  => __('Connect Section Settings'),
            'menu_title'  => __('Connect Section'),
            'parent_slug' => $parent['menu_slug'],
        ));
        
        // Add sub page.
        $child = acf_add_options_sub_page(array(
            'page_title'  => __('Archive Page Settings'),
            'menu_title'  => __('Archive Pages'),
            'parent_slug' => $parent['menu_slug'],
        ));
    }
}