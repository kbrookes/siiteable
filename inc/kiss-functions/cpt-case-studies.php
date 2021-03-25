<?
// Register Custom Post Type Case Study
function create_casestudy_cpt() {

    $labels = array(
        'name' => _x( 'Case Studies', 'Post Type General Name', 'textdomain' ),
        'singular_name' => _x( 'Case Study', 'Post Type Singular Name', 'textdomain' ),
        'menu_name' => _x( 'Case Studies', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar' => _x( 'Case Study', 'Add New on Toolbar', 'textdomain' ),
        'archives' => __( 'Case Study Archives', 'textdomain' ),
        'attributes' => __( 'Case Study Attributes', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Case Study:', 'textdomain' ),
        'all_items' => __( 'All Case Studies', 'textdomain' ),
        'add_new_item' => __( 'Add New Case Study', 'textdomain' ),
        'add_new' => __( 'Add New', 'textdomain' ),
        'new_item' => __( 'New Case Study', 'textdomain' ),
        'edit_item' => __( 'Edit Case Study', 'textdomain' ),
        'update_item' => __( 'Update Case Study', 'textdomain' ),
        'view_item' => __( 'View Case Study', 'textdomain' ),
        'view_items' => __( 'View Case Studies', 'textdomain' ),
        'search_items' => __( 'Search Case Study', 'textdomain' ),
        'not_found' => __( 'Not found', 'textdomain' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
        'featured_image' => __( 'Featured Image', 'textdomain' ),
        'set_featured_image' => __( 'Set featured image', 'textdomain' ),
        'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
        'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
        'insert_into_item' => __( 'Insert into Case Study', 'textdomain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Case Study', 'textdomain' ),
        'items_list' => __( 'Case Studies list', 'textdomain' ),
        'items_list_navigation' => __( 'Case Studies list navigation', 'textdomain' ),
        'filter_items_list' => __( 'Filter Case Studies list', 'textdomain' ),
    );
    $rewrite = array(
        'slug' => 'case-studies',
        'with_front' => true,
        'pages' => true,
        'feeds' => true,
    );
    $args = array(
        'label' => __( 'Case Study', 'textdomain' ),
        'description' => __( '', 'textdomain' ),
        'labels' => $labels,
        'menu_icon' => 'dashicons-awards',
        'supports' => array('title', 'thumbnail', 'revisions', 'page-attributes', 'post-formats', 'custom-fields', 'excerpt'),
        'taxonomies' => array("product_category", "category"),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => $rewrite,
    );
    register_post_type( 'case-studies', $args );

}
add_action( 'init', 'create_casestudy_cpt', 0 );