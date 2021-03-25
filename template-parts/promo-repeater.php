
<?
    if( have_rows('home_promo_repeater', 'options') ):
    // Loop through rows.
    while( have_rows('home_promo_repeater', 'options') ) : the_row();

        // Load sub field value.
        $postID = get_sub_field('promo_set_id', 'options'); 
        $post = get_post($postID);
        $postImage = get_the_post_thumbnail( $postID, 'medium_large', array( 'class' => 'img-fluid' ) );  
        ?>
        <div class="promo">
            <a href="<?php echo get_permalink($post) ?>">
                <?= $postImage; ?>
            </a>
        </div>
    <?// End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
