<?

$postType = get_sub_field($sepPrefix . '_post_type');
$catSelect = '';
$catSlug = '';
switch($postType) {
    case "single":
        $selectedPost = get_sub_field($sepPrefix . '_post_select');
        $pageID = $selectedPost->ID;
        break;
    case "featured":
        $catSelect = get_sub_field($sepPrefix . '_post_category');
        break;
    case "latest":
        $catSelect = get_sub_field($sepPrefix . '_post_category');
        break;
}

if(empty($catSelect)){
    $catSlug = 'uncategorized';
} else {
    $catSlug = $catSelect->name;
}

if($postType == 'featured'):
    // GET FEATURED POSTS
    $args_query = array(
        'post_type' => array('post'),
        'post_status' => array('publish'),
        'posts_per_page' => 1,
        'nopaging' => true,
        'order' => 'DESC',
        'category_name' => $catSlug,
        'meta_key'         => 'featured_post',
        'meta_value'       => '1',
    );
    
    $query = new WP_Query( $args_query );
    
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $pageID = get_the_ID();
            $selectedPost = get_post();
        }
    }
    wp_reset_postdata();
elseif($postType == 'latest'):
    // GET LATEST POSTS
    $args_query = array(
        'post_type' => array('post'),
        'post_status' => array('publish'),
        'posts_per_page' => 1,
        'nopaging' => true,
        'order' => 'DESC',
        'category_name' => $catSlug,
        'meta_key'         => 'featured_post',
        'meta_value'       => '0',
    );
    
    $query = new WP_Query( $args_query );
    
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $pageID = get_the_ID();
            $selectedPost = get_post();
        }
    }
    wp_reset_postdata();
endif;




$postTitle = apply_filters('the_title', get_post_field('post_title', $selectedPost), $pageID);
$postContent = apply_filters('the_content', get_post_field('post_content', $pageID));
$postSubTitle = get_field('post_subtitle', $pageID);

$pageData = get_post( $pageID );
$the_excerpt = $pageData->post_excerpt;
if(empty($the_excerpt)){
   $the_excerpt = wp_trim_words($postContent, 60, '...');
}

$fieldTitle = '';
$fieldSubTitle = '';

if(!empty(get_sub_field($sepPrefix . '_title'))):
    $fieldTitle = get_sub_field($sepPrefix . '_title');
endif;
if(!empty(get_sub_field($sepPrefix . '_sub_title'))):
    $fieldSubTitle = get_sub_field($sepPrefix . '_sub_title');
endif;
$fieldContent = get_sub_field($sepPrefix . '_content');
$titlePos = get_sub_field($sepPrefix . '_title_position');



if($cardType == 'get-post' && get_sub_field($sepPrefix . '_post_content') == true){
    // If pulling from a post, and not customising the content
    $title = $postTitle;
    $subTitle = null;
    $cardContent = $the_excerpt;
} else {
    $title = $fieldTitle;
    $subTitle = $fieldSubTitle;
    $cardContent = wpautop($fieldContent);
}

$titleLink = '';
if($cardType == 'get-post' && $cardDesign != 'simple'):
    $titleLink = get_permalink($pageID);
    $title = '<a class="' . $titlesTextColor . '" href="' . $titleLink . '">' . $title . '</a>';
endif;

if(!empty($title)):
    $title = '<h3 class="' . $titlesTextClass . '">' . $title . '</h3>';
endif;
if(!empty($subTitle)):
    $subTitle = '<h4 class="' . $titlesTextClass . '">' . $subTitle . '</h4>';
endif;