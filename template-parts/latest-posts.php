<?
    $newsCount = get_field('home_news_num', 'options');
    if(empty($newsCount)) { $newsCount = 1; }
    
    $newsPath = get_field('home_news_path', 'options');
    if(empty($newsPath)) { $newsPath = '/news'; }
  
    $newsCat = get_field('home_news_cat', 'options');
    if(empty($newsCat)) { $newsCat = 0; };
?>
<div id="latest-posts" class="posts-latest">
    <div class="posts-latest d-flex justify-content-between mb-3 pb-3 border-bottom border-light">
        <h3 class="font-weight-light">Latest News</h3>
        <span class="text-uppercase"><a href="<?= $newsPath; ?>"><i class="far fa-plus"></i> Read All News</a></span>
    </div>
<?php
$recent_posts = wp_get_recent_posts(array(
    'numberposts' => $newsCount, // Number of recent posts thumbnails to display
    'post_status' => 'publish', // Show only the published posts
    'category'    => $newsCat,

));
foreach( $recent_posts as $post_item ) : 
    $post_date = get_the_date( 'j M Y', $post_item['ID']);
    $excerpt = get_the_excerpt($post_item['ID']);
     
    $excerpt = substr($excerpt, 0, 260);
    $result = substr($excerpt, 0, strrpos($excerpt, ' '));
    
    $postImage = get_the_post_thumbnail( $post_item['ID'], 'thumbnail', array( 'class' => 'img-fluid' ) );  
    
    $showImages = false;
    $showImages = get_field('home_news_images', 'options');
    
    $postClass = "col-12";
    $hasImage = false;
    
    if(!empty($postImage)) {
        $postClass = "col-12 col-sm-8 col-md-9";
        $hasImage = true;
    }
?>
    <div class="posts-latest__post mb-3">
        <div class="row">
            <? if($hasImage && $showImages):?>
            <div class="col-12 col-sm-4 col-md-3">
                <?= $postImage; ?>
            </div>
            <? endif; ?>
            <div class="<?= $postClass; ?>">
                <p class="posts-latest__post-date"><? echo $post_date; ?></p>
                <a href="<?php echo get_permalink($post_item['ID']) ?>">
                    <h4 class="posts-latest__post-title"><?php echo $post_item['post_title'] ?></h4>
                </a>
                <p class="posts-latest__post-text"><? echo $result; ?></p>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>