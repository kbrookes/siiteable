<?php 

/// ADD MENUS

// Register custom navigation menus
function lll_nav_menus() {

	$locations = array(
		'footer-menu' => __( 'Menu in the footer', 'textdomain' ),
		'footer-flat' => __( 'Small flat footer menu', 'textdomain' ),
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'lll_nav_menus' );

/// GET RID OF 'CATEGORY' in blog list

function prefix_category_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'prefix_category_title' );


/// ADD LOGO SUPPORT TO CUSTOMIZER
function theme_prefix_the_custom_logo() {
	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

}


/// ADD HEADER SECTION TO CUSTOMIZER
add_action( 'customize_register', 'lll_customizer_settings' );
function lll_customizer_settings( $wp_customize ) {
	
	/// ADD DEVICE OPTIONS TO SITE IDENTITY
	$wp_customize->add_setting( 'siiteable_device_hero', array(
		//'default' => get_theme_file_uri('assets/image/logo.jpg'), // Add Default Image URL 
		'sanitize_callback' => 'esc_url_raw'
	));
 
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'siiteable_device_hero_control', array(
		'label' => 'Upload Hero Device',
		'priority' => 20,
		'section' => 'title_tagline',
		'settings' => 'siiteable_device_hero',
		'button_labels' => array(
			// All These labels are optional
			'select' => 'Select Device',
			'remove' => 'Remove Device',
			'change' => 'Change Device',
			)
	)));	
	
	/// ADD DEVICE OPTIONS TO SITE IDENTITY
	$wp_customize->add_setting( 'siiteable_device_small', array(
		//'default' => get_theme_file_uri('assets/image/logo.jpg'), // Add Default Image URL 
		'sanitize_callback' => 'esc_url_raw'
	));
 
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'siiteable_device_small_control', array(
		'label' => 'Upload Small Device',
		'priority' => 20,
		'section' => 'title_tagline',
		'settings' => 'siiteable_device_small',
		'button_labels' => array(
			// All These labels are optional
			'select' => 'Select Device',
			'remove' => 'Remove Device',
			'change' => 'Change Device',
			)
	)));	
		
	$wp_customize->add_section( 'lll_header_settings' , array(
	  'title'      => 'Header settings',
	  'priority'   => 20,
	) );
	
	$wp_customize->add_setting( 'lll_header_fixed' , array(
	  'default'     => false,
	  'transport'   => 'refresh',
	) );
	
	$wp_customize->add_control( 'lll_header_fixed', array(
		'label' => 'Fix header?',
		'section' => 'lll_header_settings',
		'settings' => 'lll_header_fixed',
		'type' => 'radio',
		'choices' => array(
			'true' => 'Fix header to top',
			'false' => 'Don\'t fix',
		),
	));
	
	$wp_customize->add_setting( 'lll_header_bg' , array(
	  'default'     => 'bg-dark',
	  'transport'   => 'refresh',
	) );
	
	$wp_customize->add_control( 'lll_header_bg', array(
		'label' => 'Header background colour',
		'section' => 'lll_header_settings',
		'settings' => 'lll_header_bg',
		'type' => 'select',
		'choices' => array(
			'bg-primary' => 'Primary',
			'bg-secondary' => 'Secondary',
			'bg-dark' => 'Dark',
			'bg-light' => 'Light',
			'bg-white' => 'White',
			'bg-alternate' => 'Alternate',
		),
	));
	
	$wp_customize->add_setting( 'lll_header_bg_scroll' , array(
		  'default'     => 'bg-dark',
		  'transport'   => 'refresh',
		) );
		
		$wp_customize->add_control( 'lll_header_bg_scroll', array(
			'label' => 'Header background colour (scrolled)',
			'section' => 'lll_header_settings',
			'settings' => 'lll_header_bg_scroll',
			'type' => 'select',
			'choices' => array(
				'bg-primary' => 'Primary',
				'bg-secondary' => 'Secondary',
				'bg-dark' => 'Dark',
				'bg-light' => 'Light',
				'bg-white' => 'White',
				'bg-alternate' => 'Alternate',
			),
		));
	
	$wp_customize->add_setting( 'lll_header_color' , array(
	  'default'     => 'navbar-dark',
	  'transport'   => 'refresh',
	) );
	
	$wp_customize->add_control( 'lll_header_color', array(
		'label' => 'Header links colour',
		'section' => 'lll_header_settings',
		'settings' => 'lll_header_color',
		'type' => 'select',
		'choices' => array(
			'navbar-light' => 'Dark',
			'navbar-dark' => 'Light',
			'text-white' => 'White',
			'text-primary' => 'Primary',
		),
	));
	
	$wp_customize->add_setting( 'lll_header_color_scroll' , array(
	  'default'     => 'navbar-dark',
	  'transport'   => 'refresh',
	) );
	
	$wp_customize->add_control( 'lll_header_color_scroll', array(
		'label' => 'Header links colour (scrolled)',
		'section' => 'lll_header_settings',
		'settings' => 'lll_header_color_scroll',
		'type' => 'select',
		'choices' => array(
			'navbar-light' => 'Dark',
			'navbar-dark' => 'Light',
			'text-white' => 'White',
			'text-primary' => 'Primary',
		),
	));
	
	$wp_customize->add_setting( 'lll_header_opacity' , array(
	  'default'     => false,
	  'transport'   => 'refresh',
	) );
	
	$wp_customize->add_control( 'lll_header_opacity', array(
		'label' => 'Make header transparent over heros?',
		'section' => 'lll_header_settings',
		'settings' => 'lll_header_opacity',
		'type' => 'checkbox',
		'choices' => array(
			'true' => 'Yes, make transparent',
		),
	));
	
	$wp_customize->add_setting( 'lll_hero_header_navtype' , array(
		'default'       => 'nav_standard',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'lll_hero_header_navtype', array(
		'label'      => 'Navigation Type',
		'section'    => 'lll_header_settings',
		'settings'   => 'lll_hero_header_navtype',
		'type'       => 'select',
			'choices'    => array( 
			  'nav_standard' => 'Standard',
			  'nav_burger' => 'Hamburger',
			),
	) );
	
	//// HERO SETTINGS
	// Create our sections
	
	$wp_customize->add_section( 'hero_header_settings' , array(
		'title'             => 'Hero Header Settings',
		'priority'          => 21,
	) );
			
	// Create our settings
	
	$wp_customize->add_setting( 'hero_header_height' , array(
		'default'       => 'header_md',
		'type'          => 'theme_mod',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'hero_header_height_control', array(
		'label'      => 'Hero Height',
		'section'    => 'hero_header_settings',
		'settings'   => 'hero_header_height',
		'type'       => 'select',
			'choices'    => array( 
			  'header_xs' => 'XS',
			  'header_sm' => 'SM',
			  'header_md' => 'MD',
			  'header_lg' => 'LG',
			  'header_xl' => 'XL',
			  'full_height' => 'Full Height',
			),
	) );
	
	$wp_customize->add_setting( 'hero_vertical_alignment' , array(
		'default'       => 'align-items-center',
		'type'          => 'theme_mod',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'hero_vertical_alignment_control', array(
		'label'      => 'Vertical Alignement',
		'section'    => 'hero_header_settings',
		'settings'   => 'hero_vertical_alignment',
		'type'       => 'select',
			'choices'    => array( 
			  'align-items-start' => 'Align Top',
			  'align-items-center' => 'Align Center',
			  'align-items-end' => 'Align Bottom',
			),
	) );
	
	
	$wp_customize->add_setting( 'hero_text_color' , array(
		'type'          => 'theme_mod',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'hero_text_color_control', array(
		'label'      => 'Hero Text Color',
		'section'    => 'hero_header_settings',
		'settings'   => 'hero_text_color',
		'type'       => 'select',
			'choices'    => array( 
			  'text-white' => 'White',
			  'text-dark' => 'Dark',
			  'text-light' => 'Light',
			  'text-primary' => 'Primary',
			  'text-secondary' => 'Secondary',
			  'text-alternate' => 'Alternate',
			),
	) );
	
	$wp_customize->add_setting( 'hero_text_size' , array(
		'default'		=> 'font-md',
		'type'          => 'theme_mod',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'hero_text_size_control', array(
		'label'      => 'Heading 1 Font Size',
		'section'    => 'hero_header_settings',
		'settings'   => 'hero_text_size',
		'type'       => 'select',
			'choices'    => array( 
			  'font-xs' => 'XS',
			  'font-sm' => 'SM',
			  'font-md' => 'MD',
			  'font-lg' => 'LG',
			  'font-xl' => 'XL',
			),
	) );
	
	$wp_customize->add_setting( 'hero_header_content_size' , array(
		'default'       => 'text-md',
		'type'          => 'theme_mod',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'hero_header_content_size_control', array(
		'label'      => 'Content Font Size',
		'section'    => 'hero_header_settings',
		'settings'   => 'hero_header_content_size',
		'type'       => 'select',
			'choices'    => array( 
			  'text-xs' => 'XS',
			  'text-sm' => 'SM',
			  'text-md' => 'MD',
			  'text-lg' => 'LG',
			  'text-xl' => 'XL',
			),
	) );
	
	$wp_customize->add_setting( 'header_content_width' , array(
		'default'		=> '75%',
		'type'          => 'theme_mod',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'header_content_width_control', array(
		'label'      => 'Single Column Max Width',
		'description'=> 'When using single-column settings in hero headers this controls the width of the header at sizes LG and above At MD and below the column size will be 100',
		'section'    => 'hero_header_settings',
		'settings'   => 'header_content_width',
		'type'       => 'radio',
			'choices'    => array( 
			  'w-lg-50' => '50%',
			  'w-lg-75' => '75%',
			  'w-lg-100' => '100%',
			),
	) );
	
	$wp_customize->add_setting( 'hero_padding' , array(
		'default'		=> 'None',
		'type'          => 'theme_mod',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'hero_padding_control', array(
		'label'      => 'Hero Padding',
		'description'=> 'Adjust the top  bottom padding of the hero content section',
		'section'    => 'hero_header_settings',
		'settings'   => 'hero_padding',
		'type'       => 'select',
			'choices'    => array( 
			  'py-0' => 'None',
			  'py-1' => 'XS',
			  'py-2' => 'SM',
			  'py-3' => 'MD',
			  'py-4' => 'LG',
			  'py-5' => 'XL',
			),
	) );
	
	//// FOOTER SETTINGS
	/// PANEL - FOOTER
	$wp_customize->add_panel('footer_panel',array(
		'title'=>'Footer Settings',
		'description'=> 'Modify footer behaviour',
		'priority'=> 25,
	));
	/// SECTION - FOOTER
	$wp_customize->add_section('footer_col_section',array(
		'title'=>'Column Layouts',
		'priority'=>10,
		'panel'=>'footer_panel',
	));
	/// SECTION - FOOTER
	$wp_customize->add_setting('footer_col_num',array(
		'default'=>'4',
	));
	/// SECTION - FOOTER
	$wp_customize->add_control('footer_col_ctrl',array(
		'label'=>'Columns in lower footer',
		'type'=>'select',
		'section'=>'footer_col_section',
		'settings'=>'footer_col_num',
		'choices' => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
		),
	));
	/// SECTION - FOOTER
	$wp_customize->add_setting('footer_col_layout',array(
		'default'=>'equal',
	));
	/// SECTION - FOOTER
	$wp_customize->add_control('footer_logo_ctrl',array(
		'label'=>'Column options',
		'type'=>'select',
		'section'=>'footer_col_section',
		'settings'=>'footer_col_layout',
		'choices' => array(
			'equal' => 'Columns are equal',
			'wide-first' => 'First column is wider',
			'wide-last' => 'Last column is wider',
		),
	));
	/// SECTION - FOOTER
	$wp_customize->add_setting('footer_header_normal',array(
		'default'=>'fs-3',
	));
	/// SECTION - FOOTER
	$wp_customize->add_control('footer_header_fs',array(
		'label'=>'Menu Header Font Size',
		'type'=>'select',
		'section'=>'footer_col_section',
		'settings'=>'footer_header_normal',
		'choices' => array(
			'fs-1' => 'XS',
			'fs-2' => 'SM',
			'fs-3' => 'MD',
			'fs-4' => 'LG',
			'fs-5' => 'XL',
		),
	));
	
	// FOOTER INFO SECTION
	$wp_customize->add_section('footer_info',array(
		'title'=>'Privacy, Terms & Copyright',
		'priority'=>11,
		'panel'=>'footer_panel',
	));
	
	/// COPYRIGHT TEXT
	$wp_customize->add_setting( 'siiteable_sitename_setting_id', array(
	  'capability' => 'edit_theme_options',
	  'default' => 'Lorem Ipsum',
	  'sanitize_callback' => 'sanitize_text_field',
	) );
	
	$wp_customize->add_control( 'siiteable_sitename_setting_id', array(
	  'type' => 'text',
	  'section' => 'footer_info', // Add a default or your own section
	  'label' => __( 'Site or business name' ),
	  'description' => __( 'Add your site or business name to the copyright section.' ),
	) );
	
	
	$wp_customize->add_setting( 'siiteable_textarea_setting_id', array(
	  'capability' => 'edit_theme_options',
	  //'default' => 'Lorem Ipsum Dolor Sit amet',
	  'sanitize_callback' => 'sanitize_textarea_field',
	) );
	
	$wp_customize->add_control( 'siiteable_textarea_setting_id', array(
	  'type' => 'textarea',
	  'section' => 'footer_info', // // Add a default or your own section
	  'label' => __( 'Long statement' ),
	  'description' => __( 'Use this to place a longer statement below the copyright/privacy/terms section' ),
	) );
	
}

///// SETUP THE KIRKI FRAMEWORK
Kirki::add_config( 'kiss_theme', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

//// Create General Settings Panel
Kirki::add_panel( 'general_settings', array(
	'priority'    => 10,
	'title'       => esc_html__( 'General Settings', 'kirki' ),
	'description' => esc_html__( 'Sitewide modifications', 'kirki' ),
) );

/// Create Fontawesome Options Section
Kirki::add_section( 'fa_options', array(
	'title'          => esc_html__( 'Fontawesome Options', 'kirki' ),
	'description'    => esc_html__( 'Setup which library to use for Fontawesome.', 'kirki' ),
	'panel'          => 'general_settings',
	'priority'       => 150,
) );

// Create Button Styles Dropdown
Kirki::add_field( 'kiss_theme', [
	'type'        => 'select',
	'settings'    => 'fa_styles',
	'label'       => esc_html__( 'Select a FontAwesome style', 'kirki' ),
	'section'     => 'fa_options',
	'default'     => 'option-1',
	'placeholder' => esc_html__( 'Select an icon style', 'kirki' ),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'far' => esc_html__( 'Regular', 'kirki' ),
		'fas' => esc_html__( 'Solid', 'kirki' ),
		'fal' => esc_html__( 'Light', 'kirki' ),
		'fad' => esc_html__( 'Duotone', 'kirki' ),
	],
] );

/// Create Button Options Section
Kirki::add_section( 'button_options', array(
	'title'          => esc_html__( 'Button Options', 'kirki' ),
	'description'    => esc_html__( 'Setup how buttons will appear.', 'kirki' ),
	'panel'          => 'general_settings',
	'priority'       => 160,
) );

// Create Button Styles Dropdown
Kirki::add_field( 'kiss_theme', [
	'type'        => 'select',
	'settings'    => 'button_styles',
	'label'       => esc_html__( 'Select a button style', 'kirki' ),
	'section'     => 'button_options',
	'default'     => 'option-1',
	'placeholder' => esc_html__( 'Select an option...', 'kirki' ),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'angled' => esc_html__( 'Angled', 'kirki' ),
		'solid' => esc_html__( 'Solid', 'kirki' ),
		'outlined' => esc_html__( 'Outlined', 'kirki' ),
		'custom' => esc_html__( 'Custom', 'kirki' ),
	],
] );

// Create Border Radius Options
Kirki::add_field( 'kiss_theme', [
	'type'        => 'number',
	'settings'    => 'border_radius',
	'label'       => esc_html__( 'Border radius options', 'kirki' ),
	'section'     => 'button_options',
	'default'     => 0,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
] );

// Select Play Button Icon
Kirki::add_field( 'kiss_theme', [
	'type'        => 'text',
	'settings'    => 'play_button',
	'label'       => esc_html__( 'Fontawesome class (not including "fa*") for play button', 'kirki' ),
	'section'     => 'button_options',
	'default'     => 'fa-play',
] );

/// Create Analytics Options Section
Kirki::add_section( 'analytics_options', array(
	'title'          => esc_html__( 'Analytics Options', 'kirki' ),
	'description'    => esc_html__( 'Setup Google Analytics.', 'kirki' ),
	'panel'          => 'general_settings',
	'priority'       => 160,
) );

Kirki::add_field( 'kiss_theme', [
	'type'        => 'select',
	'settings'    => 'select_tag_type',
	'label'       => esc_html__( 'Select analytics type', 'kirki' ),
	'section'     => 'analytics_options',
	'default'     => 'option-1',
	'placeholder' => esc_html__( 'Select an option...', 'kirki' ),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'standard' => esc_html__( 'Standard analytics', 'kirki' ),
		'tagmanager' => esc_html__( 'Google Tag Manager', 'kirki' ),
	],
] );

// Standard Analytics
Kirki::add_field( 'kiss_theme', [
	'type'        => 'text',
	'settings'    => 'analytics_standard',
	'label'       => esc_html__( 'Standard analytics ID', 'kirki' ),
	'section'     => 'analytics_options',
] );

// Tag Manager Analytics
Kirki::add_field( 'kiss_theme', [
	'type'        => 'textarea',
	'settings'    => 'tagman_top',
	'label'       => esc_html__( 'Tagmanager code in HEAD', 'kirki' ),
	'section'     => 'analytics_options',
] );

// Tag Manager Analytics
Kirki::add_field( 'kiss_theme', [
	'type'        => 'textarea',
	'settings'    => 'tagman_bottom',
	'label'       => esc_html__( 'Tagmanager code in BODY', 'kirki' ),
	'section'     => 'analytics_options',
] );

Kirki::add_field( 'kiss_theme', [
	'type'        => 'text',
	'settings'    => 'analytics_luckyorange',
	'label'       => esc_html__( 'Lucky Orange ID', 'kirki' ),
	'section'     => 'analytics_options',
] );


/// ANALYTICS CONDITIONALS




/// FILTER YOUTUBE URLS TO ADD BOOTSTRAP RESPONSIVE PARAMETERS
add_filter('the_content', function($content) {
	return str_replace(array("<iframe", "</iframe>"), array('<div class="iframe-container"><iframe', "</iframe></div>"), $content);
});

add_filter('embed_oembed_html', function ($html, $url, $attr, $post_id) {
	if(strpos($html, 'youtube.com') !== false || strpos($html, 'youtu.be') !== false){
		  return '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
	} else {
	 return $html;
	}
}, 10, 4);


add_filter('embed_oembed_html', function($code) {
  return str_replace('<iframe', '<iframe class="embed-responsive-item" ', $code);
});


//// FILTER CHECKBOXES & RADIOS FOR CONTACT FORM 7
add_filter('wpcf7_form_elements', function ($content) {
	$content = preg_replace('/<label><input type="(checkbox|radio)" name="(.*?)" value="(.*?)" \/><span class="wpcf7-list-item-label">/i', '<label class="custom-control custom-\1"><input type="\1" name="\2" value="\3" class="custom-control-input"><span class="wpcf7-list-item-label custom-control-label">', $content);

	return $content;
});

// Register new image sizes
add_image_size( 'logos-sm', 120, 9999999, false );
add_image_size( 'square-medium', 640, 640, false );

add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'logos-sm' => __( 'Small Logos' ),
		'square-medium' => __( 'Medium Square' ),
	) );
}


//. Google Maps API key
function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyAWL3Zw816wZNsiutVTazUqNr7gt0NOheU');
}
add_action('acf/init', 'my_acf_init');

/**
 * Responsive Image Helper Function
 *
 * @param string $image_id the id of the image (from ACF or similar)
 * @param string $image_size the size of the thumbnail image or custom image size
 * @param string $max_width the max width this image will be shown to build the sizes attribute 
 */

function siiteable_responsive_image($image_id,$image_size,$max_width){

	// check the image ID is not blank
	if($image_id != '') {

		// set the default src image size
		$image_src = wp_get_attachment_image_url( $image_id, $image_size );

		// set the srcset with various image sizes
		$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

		// generate the markup for the responsive image
		echo 'src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';

	}
}

/// HERO SETTINGS
function getHeroHeightElvis($prefix, $isBlogPage)
{
	$page = get_field($prefix . '_override_height');
	$blog = get_field($prefix . '_override_height', 'options');
	$theme = get_theme_mod('hero_header_height', 0); 
	$default = 'header_md';

	if($isBlogPage) {
		return $page ?: $blog ?: $theme ?: $default;
	}   
	return $page ?: $theme ?: $default;
}

function getHeroAlignment($prefix, $isBlogPage){
	$page = get_field($prefix . '_override_vertical');
	$blog = get_field($prefix . '_override_vertical', 'options');
	$theme = get_theme_mod( 'hero_vertical_alignment', 0 );
	$default = 'align-items-center';
	
	if($isBlogPage){
		return $page ?: $blog ?: $theme ?: $default;
	}
	return $page ?: $theme ?: $default;
}

/// TEXT CONTROLS
function textTitle($prefix, $type){
	$title = get_sub_field($prefix . '_title_font_' . $type);
	$titles = get_sub_field($prefix . '_titles_font_' . $type);
	$titleNG = get_field($prefix . '_title_font_' . $type);
	$titleOption = get_field($prefix . '_title_font_' . $type, 'options');
	$titleTheme = get_theme_mod( 'hero_text_' . $type, 0 );
	
	return $title ?: $titles ?: $titleNG ?: $titleOption ?: $titleTheme;
}

/// TITLES
function heroTitle($id, $isBlogPage){
	$archiveTitle = get_the_archive_title();
	$postTitle = get_field('hero_block_title', $id);
	$blogArchiveTitle = get_field('news_block_title', 'options');
	$pageTitle = single_post_title('', FALSE);
	
	if($isBlogPage){
		return $pageTitle ?: $blogArchiveTitle ?: $archiveTitle ?: $postTitle;
	}
	return $pageTitle ?: $archiveTitle ?: $postTitle;
	
}

// EXTRACT YOUTUBE ID AND CREATE PLAYER
function videoPlayer($url){
	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
	$youtube_id = $match[1];
	echo '
	<div class="embed-responsive embed-responsive-16by9">
	  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' . $youtube_id . '?modestbranding=1&origin=themoneysandwich.com.au"></iframe>
	</div>
	';
}

// EXTRACT YOUTUBE ID AND CREATE PLAYER
function videoPlayerLite($url){
	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
	$youtube_id = $match[1];
	echo '
	<lite-youtube videoid="' . $youtube_id . '"></lite-youtube>
	';
}


/**
 * Edit checkout form inputs
 * source: https://gist.github.com/nickkuijpers/5d07ecf9b0a0678b4f4c
 */
add_filter('woocommerce_checkout_fields', 'addBootstrapToCheckoutFields' );
/**
 * @param $fields
 * @return mixed
 */
function addBootstrapToCheckoutFields($fields) {
	foreach ($fields as &$fieldset) {
		foreach ($fieldset as &$field) {
			// if you want to add the form-group class around the label and the input
			$field['class'][] = 'form-group';

			// add form-control to the actual input
			$field['input_class'][] = 'form-control';
		}
	}
	return $fields;
}

add_filter('woocommerce_form_field_country', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_state', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_checkbox', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_password', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_text', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_email', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_tel', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_number', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_select', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_radio', 'clean_checkout_fields_class_attribute_values', 20, 4);
function clean_checkout_fields_class_attribute_values( $field, $key, $args, $value ){
	if( is_checkout() ){
		// remove "form-row"
		$field = str_replace( array('<p class="form-row ', '<p class="form-row'), array('<p class="checkout-col ', '<p class="checkout-col '), $field);
	}

	return $field;
}

add_filter('woocommerce_form_field_textarea', 'clean_checkout_fields_class_attribute_values_textarea', 20, 4);
function clean_checkout_fields_class_attribute_values_textarea( $field, $key, $args, $value ){
	if( is_checkout() ){
		// remove "form-row"
		$field = str_replace( array('<p class="form-row ', '<p class="form-row'), array('<p class="col-12 ', '<p class="col-12 '), $field);
	}

	return $field;
}

add_filter('woocommerce_checkout_fields', 'custom_checkout_fields_class_attribute_value', 20, 1);
function custom_checkout_fields_class_attribute_value( $fields ){
	foreach( $fields as $fields_group_key => $group_fields_values ){
		foreach( $group_fields_values as $field_key => $field ){
			// Remove other classes (or set yours)
			$fields[$fields_group_key][$field_key]['class'] = array(); 
		}
	}

	return $fields;
}


/// MOVE RANKMATH DOWN
function rankmathtobottom() {
	return 'low';
}
add_filter( 'rank_math_metabox', 'rankmathtobottom');

