<?

$selectedPost = get_sub_field($sepPrefix . '_post_select');
$pageID = $selectedPost->ID;

$postTitle = apply_filters('the_title', get_post_field('post_title', $selectedPost), $selectedPost->ID);
$postContent = apply_filters('the_content', get_post_field('post_content', $selectedPost));
$postSubTitle = get_field('post_subtitle', $selectedPost->ID);

$pageData = get_post( $pageID );
$the_excerpt = $pageData->post_excerpt;

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
    $title = $postTitle;
    $subTitle = null;
    $cardContent = $the_excerpt;    
} else {
    $title = $fieldTitle;
    $subTitle = $fieldSubTitle;
    $cardContent = $fieldContent;
}

if(!empty($title)):
    $title = '<h3 class="' . $titlesTextClass . '">' . $title . '</h3>';
endif;
if(!empty($subTitle)):
    $subTitle = '<h4 class="' . $titlesTextClass . '">' . $subTitle . '</h4>';
endif;