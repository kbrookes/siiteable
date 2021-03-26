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
	$wp_customize->add_panel('footer_panel',array(
		'title'=>'Footer Settings',
		'description'=> 'Modify footer behaviour',
		'priority'=> 25,
	));
	
	
	$wp_customize->add_section('footer_col_section',array(
		'title'=>'Column Layouts',
		'priority'=>10,
		'panel'=>'footer_panel',
	));
	
	
	$wp_customize->add_setting('footer_col_num',array(
		'default'=>'4',
	));
	
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
	
	$wp_customize->add_setting('footer_col_layout',array(
		'default'=>'equal',
	));
	
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
	
	$wp_customize->add_setting('footer_header_normal',array(
		'default'=>'fs-3',
	));
	
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
	'type'        => 'textarea',
	'settings'    => 'analytics_standard',
	'label'       => esc_html__( 'Standard analytics code', 'kirki' ),
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

add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'logos-sm' => __( 'Small Logos' ),
	) );
}
