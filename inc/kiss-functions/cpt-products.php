<?php 
// Register Custom Post Type Product
function create_product_cpt() {

    $labels = array(
        'name' => _x( 'Products', 'Post Type General Name', 'textdomain' ),
        'singular_name' => _x( 'Product', 'Post Type Singular Name', 'textdomain' ),
        'menu_name' => _x( 'Products', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar' => _x( 'Product', 'Add New on Toolbar', 'textdomain' ),
        'archives' => __( 'Product Archives', 'textdomain' ),
        'attributes' => __( 'Product Attributes', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Product:', 'textdomain' ),
        'all_items' => __( 'All Products', 'textdomain' ),
        'add_new_item' => __( 'Add New Product', 'textdomain' ),
        'add_new' => __( 'Add New', 'textdomain' ),
        'new_item' => __( 'New Product', 'textdomain' ),
        'edit_item' => __( 'Edit Product', 'textdomain' ),
        'update_item' => __( 'Update Product', 'textdomain' ),
        'view_item' => __( 'View Product', 'textdomain' ),
        'view_items' => __( 'View Products', 'textdomain' ),
        'search_items' => __( 'Search Product', 'textdomain' ),
        'not_found' => __( 'Not found', 'textdomain' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
        'featured_image' => __( 'Featured Image', 'textdomain' ),
        'set_featured_image' => __( 'Set featured image', 'textdomain' ),
        'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
        'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
        'insert_into_item' => __( 'Insert into Product', 'textdomain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Product', 'textdomain' ),
        'items_list' => __( 'Products list', 'textdomain' ),
        'items_list_navigation' => __( 'Products list navigation', 'textdomain' ),
        'filter_items_list' => __( 'Filter Products list', 'textdomain' ),
    );
    $args = array(
        'label' => __( 'Product', 'textdomain' ),
        'description' => __( '', 'textdomain' ),
        'labels' => $labels,
        'menu_icon' => 'dashicons-archive',
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'page-attributes', 'post-formats', 'custom-fields'),
        'taxonomies' => array('type', 'use', 'brand'),
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
        'rest_base' => 'siiteable_cpt_products',
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type( 'product', $args );

}
add_action( 'init', 'create_product_cpt', 0 );

// Register Taxonomy Type
function create_type_tax() {

    $labels = array(
        'name'              => _x( 'Types', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Type', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Types', 'textdomain' ),
        'all_items'         => __( 'All Types', 'textdomain' ),
        'parent_item'       => __( 'Parent Type', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Type:', 'textdomain' ),
        'edit_item'         => __( 'Edit Type', 'textdomain' ),
        'update_item'       => __( 'Update Type', 'textdomain' ),
        'add_new_item'      => __( 'Add New Type', 'textdomain' ),
        'new_item_name'     => __( 'New Type Name', 'textdomain' ),
        'menu_name'         => __( 'Type', 'textdomain' ),
    );
    $args = array(
        'labels' => $labels,
        'description' => __( '', 'textdomain' ),
        'hierarchical' => false,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_in_quick_edit' => true,
        'show_admin_column' => false,
        'show_in_rest' => true,
        'rest_base' => 'siiteable_tax_type',
    );
    register_taxonomy( 'type', array('product'), $args );

}
add_action( 'init', 'create_type_tax' );

// Register Taxonomy Use
function create_use_tax() {

    $labels = array(
        'name'              => _x( 'Uses', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Use', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Uses', 'textdomain' ),
        'all_items'         => __( 'All Uses', 'textdomain' ),
        'parent_item'       => __( 'Parent Use', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Use:', 'textdomain' ),
        'edit_item'         => __( 'Edit Use', 'textdomain' ),
        'update_item'       => __( 'Update Use', 'textdomain' ),
        'add_new_item'      => __( 'Add New Use', 'textdomain' ),
        'new_item_name'     => __( 'New Use Name', 'textdomain' ),
        'menu_name'         => __( 'Use', 'textdomain' ),
    );
    $args = array(
        'labels' => $labels,
        'description' => __( '', 'textdomain' ),
        'hierarchical' => false,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_in_quick_edit' => true,
        'show_admin_column' => false,
        'show_in_rest' => true,
        'rest_base' => 'siiteable_tax_use',
    );
    register_taxonomy( 'use', array('product'), $args );

}
add_action( 'init', 'create_use_tax' );

// Register Taxonomy Brand
function create_brand_tax() {

    $labels = array(
        'name'              => _x( 'Brands', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Brand', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Brands', 'textdomain' ),
        'all_items'         => __( 'All Brands', 'textdomain' ),
        'parent_item'       => __( 'Parent Brand', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Brand:', 'textdomain' ),
        'edit_item'         => __( 'Edit Brand', 'textdomain' ),
        'update_item'       => __( 'Update Brand', 'textdomain' ),
        'add_new_item'      => __( 'Add New Brand', 'textdomain' ),
        'new_item_name'     => __( 'New Brand Name', 'textdomain' ),
        'menu_name'         => __( 'Brand', 'textdomain' ),
    );
    $args = array(
        'labels' => $labels,
        'description' => __( '', 'textdomain' ),
        'hierarchical' => false,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_in_quick_edit' => true,
        'show_admin_column' => false,
        'show_in_rest' => true,
        'rest_base' => 'siiteable_tax_brand',
    );
    register_taxonomy( 'brand', array('product'), $args );

}
add_action( 'init', 'create_brand_tax' );