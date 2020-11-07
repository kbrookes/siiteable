<?php

// check if the flexible content field has rows of data
if( have_rows('available_boxes') ):

     // loop through the rows of data
    while ( have_rows('available_boxes') ) : the_row();

        if( get_row_layout() == 'list_icons_flexi' )
        get_template_part('template-parts/kiss/flexi-partials/icon-list', 'Icon list');
        
        if( get_row_layout() == 'editable_content' ) 
        get_template_part('template-parts/kiss/flexi-partials/editable-content', 'Editable content');
        
        if( get_row_layout() == 'call_to_action')
        get_template_part('template-parts/kiss/flexi-partials/call-to-action', 'Call to action');
        
        if( get_row_layout() == 'tabbed_content')
        get_template_part('template-parts/kiss/flexi-partials/tabbed-content', 'Tabbed content');
        
        if( get_row_layout() == 'content_image_columns')
        get_template_part('template-parts/kiss/flexi-partials/image-content-cols', 'Image Content cols');
        
        if( get_row_layout() == 'testimonial_selector')
        get_template_part('template-parts/kiss/flexi-partials/testimonial', 'Testimonial');
        
        if( get_row_layout() == 'section_separator')
        get_template_part('template-parts/kiss/flexi-partials/separators', 'Separators');
        
        if( get_row_layout() == 'get_specific_posts')
        get_template_part('template-parts/kiss/flexi-partials/get-dynamic-content', 'Get dynamic content');
        
        if( get_row_layout() == 'video_block')
        get_template_part('template-parts/kiss/flexi-partials/video-block', 'Video block');
        
        if( get_row_layout() == 'multi_block_layout')
        get_template_part('template-parts/kiss/flexi-partials/multi-block-layout', 'Multi block');
        
        if( get_row_layout() == 'client_logos')
        get_template_part('template-parts/kiss/flexi-partials/client-logos', 'Client logos');
        
        if( get_row_layout() == 'multi_cards')
        get_template_part('template-parts/kiss/flexi-partials/cards', 'Cards');
        
        if( get_row_layout() == 'pricing_tables')
        get_template_part('template-parts/kiss/flexi-partials/pricing-cards', 'Pricing Tables');
        
        if( get_row_layout() == 'google_maps')
        get_template_part('template-parts/kiss/flexi-partials/google-map', 'Google map');
  
    endwhile;

endif;
?>