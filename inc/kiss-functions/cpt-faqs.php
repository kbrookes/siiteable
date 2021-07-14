<? 
// Register Custom Post Type
function cpt_faq() {

    $labels = array(
        'name'                  => 'FAQs',
        'singular_name'         => 'FAQ',
        'menu_name'             => 'FAQs',
        'name_admin_bar'        => 'FAQs',
        'archives'              => 'FAQ Archives',
        'attributes'            => 'FAQ Attributes',
        'parent_item_colon'     => 'Parent Item:',
        'all_items'             => 'All FAQs',
        'add_new_item'          => 'Add New FAQ',
        'add_new'               => 'Add New',
        'new_item'              => 'New FAQ',
        'edit_item'             => 'Edit FAQ',
        'update_item'           => 'Update FAQ',
        'view_item'             => 'View FAQ',
        'view_items'            => 'View FAQs',
        'search_items'          => 'Search FAQ',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into item',
        'uploaded_to_this_item' => 'Uploaded to this item',
        'items_list'            => 'Items list',
        'items_list_navigation' => 'Items list navigation',
        'filter_items_list'     => 'Filter items list',
    );
    $rewrite = array(
        'slug'                  => 'faqs',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => 'FAQ',
        'description'           => 'For adding FAQs. Every post is a new question',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'revisions' ),
        'taxonomies'            => array( 'category' ),
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-format-status',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'post',
    );
    register_post_type( 'post_faq', $args );

}
add_action( 'init', 'cpt_faq', 0 );