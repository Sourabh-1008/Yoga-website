<?php
/**
 * VW Yoga Fitness Theme Customizer
 *
 * @package VW Yoga Fitness
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_yoga_fitness_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_yoga_fitness_custom_controls' );

function vw_yoga_fitness_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_yoga_fitness_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_yoga_fitness_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$VWYogaFitnessParentPanel = new VW_Yoga_Fitness_WP_Customize_Panel( $wp_customize, 'vw_yoga_fitness_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-yoga-fitness' ),
		'priority' => 10,
	));

	$wp_customize->add_section( 'vw_yoga_fitness_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'vw-yoga-fitness' ),
		'priority'   => 30,
		'panel' => 'vw_yoga_fitness_panel_id'
	));

	$wp_customize->add_setting('vw_yoga_fitness_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_yoga_fitness_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Yoga_Fitness_Image_Radio_Control($wp_customize, 'vw_yoga_fitness_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-yoga-fitness'),
        'description' => __('Here you can change the width layout of Website.','vw-yoga-fitness'),
        'section' => 'vw_yoga_fitness_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_yoga_fitness_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_yoga_fitness_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_yoga_fitness_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-yoga-fitness'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-yoga-fitness'),
        'section' => 'vw_yoga_fitness_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-yoga-fitness'),
            'Right Sidebar' => __('Right Sidebar','vw-yoga-fitness'),
            'One Column' => __('One Column','vw-yoga-fitness'),
            'Three Columns' => __('Three Columns','vw-yoga-fitness'),
            'Four Columns' => __('Four Columns','vw-yoga-fitness'),
            'Grid Layout' => __('Grid Layout','vw-yoga-fitness')
        ),
	));

	$wp_customize->add_setting('vw_yoga_fitness_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_yoga_fitness_sanitize_choices'
	));
	$wp_customize->add_control('vw_yoga_fitness_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-yoga-fitness'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-yoga-fitness'),
        'section' => 'vw_yoga_fitness_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-yoga-fitness'),
            'Right Sidebar' => __('Right Sidebar','vw-yoga-fitness'),
            'One Column' => __('One Column','vw-yoga-fitness')
        ),
	));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_yoga_fitness_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-yoga-fitness' ),
        'section' => 'vw_yoga_fitness_left_right'
    )));

	$wp_customize->add_setting('vw_yoga_fitness_preloader_bg_color', array(
		'default'           => '#a887c9',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_yoga_fitness_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-yoga-fitness'),
		'section'  => 'vw_yoga_fitness_left_right',
	)));

	$wp_customize->add_setting('vw_yoga_fitness_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_yoga_fitness_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-yoga-fitness'),
		'section'  => 'vw_yoga_fitness_left_right',
	)));

	//Topbar
	$wp_customize->add_section( 'vw_yoga_fitness_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-yoga-fitness' ),
		'priority'   => 30,
		'panel' => 'vw_yoga_fitness_panel_id'
	));

	//Sticky Header
	$wp_customize->add_setting( 'vw_yoga_fitness_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-yoga-fitness' ),
        'section' => 'vw_yoga_fitness_topbar'
    )));

    $wp_customize->add_setting('vw_yoga_fitness_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-yoga-fitness'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_yoga_fitness_search_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_search_hide_show',array(
		'label' => esc_html__( 'Show / Hide Search','vw-yoga-fitness' ),
		'section' => 'vw_yoga_fitness_topbar'
    )));

    $wp_customize->add_setting('vw_yoga_fitness_search_icon',array(
		'default'	=> 'fas fa-search',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Yoga_Fitness_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_yoga_fitness_search_icon',array(
		'label'	=> __('Add Search Icon','vw-yoga-fitness'),
		'transport' => 'refresh',
		'section'	=> 'vw_yoga_fitness_topbar',
		'setting'	=> 'vw_yoga_fitness_search_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_yoga_fitness_search_close_icon',array(
		'default'	=> 'fa fa-window-close',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Yoga_Fitness_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_yoga_fitness_search_close_icon',array(
		'label'	=> __('Add Search Close Icon','vw-yoga-fitness'),
		'transport' => 'refresh',
		'section'	=> 'vw_yoga_fitness_topbar',
		'setting'	=> 'vw_yoga_fitness_search_close_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('vw_yoga_fitness_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_search_font_size',array(
		'label'	=> __('Search Font Size','vw-yoga-fitness'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_topbar',
		'type'=> 'text'
	));

    $wp_customize->add_setting('vw_yoga_fitness_appointment_button_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Yoga_Fitness_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_yoga_fitness_appointment_button_icon',array(
		'label'	=> __('Add Button Icon','vw-yoga-fitness'),
		'transport' => 'refresh',
		'section'	=> 'vw_yoga_fitness_topbar',
		'setting'	=> 'vw_yoga_fitness_appointment_button_icon',
		'type'		=> 'icon'
	)));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_yoga_fitness_button_text', array( 
		'selector' => '.top-btn a', 
		'render_callback' => 'vw_yoga_fitness_customize_partial_vw_yoga_fitness_button_text', 
	));

	$wp_customize->add_setting('vw_yoga_fitness_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_yoga_fitness_button_text',array(
		'label'	=> __('Add Button Text','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( 'Book Now', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_topbar',
		'type'=> 'text'
	));		

	$wp_customize->add_setting('vw_yoga_fitness_button_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('vw_yoga_fitness_button_url',array(
		'label'	=> __('Add Button URL','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( 'www.example.com', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_topbar',
		'type'=> 'url'
	));	
    
	//Slider
	$wp_customize->add_section( 'vw_yoga_fitness_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-yoga-fitness' ),
		'priority'   => null,
		'panel' => 'vw_yoga_fitness_panel_id'
	));

	$wp_customize->add_setting( 'vw_yoga_fitness_slider_hide_show',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_slider_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider','vw-yoga-fitness' ),
		'section' => 'vw_yoga_fitness_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_yoga_fitness_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_yoga_fitness_customize_partial_vw_yoga_fitness_slider_hide_show',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'vw_yoga_fitness_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_yoga_fitness_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'vw_yoga_fitness_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-yoga-fitness' ),
			'description' => __('Slider image size (1500 x 590)','vw-yoga-fitness'),
			'section'  => 'vw_yoga_fitness_slidersettings',
			'type'     => 'dropdown-pages'
		));
	}

	$wp_customize->add_setting('vw_yoga_fitness_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_yoga_fitness_slider_btn_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Yoga_Fitness_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_yoga_fitness_slider_btn_icon',array(
		'label'	=> __('Add Slider Button Icon','vw-yoga-fitness'),
		'transport' => 'refresh',
		'section'	=> 'vw_yoga_fitness_slidersettings',
		'setting'	=> 'vw_yoga_fitness_slider_btn_icon',
		'type'		=> 'icon'
	)));

	//content layout
	$wp_customize->add_setting('vw_yoga_fitness_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_yoga_fitness_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Yoga_Fitness_Image_Radio_Control($wp_customize, 'vw_yoga_fitness_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-yoga-fitness'),
        'section' => 'vw_yoga_fitness_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_yoga_fitness_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_yoga_fitness_sanitize_number_range'
	));
	$wp_customize->add_control( 'vw_yoga_fitness_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-yoga-fitness' ),
		'section'     => 'vw_yoga_fitness_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_yoga_fitness_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	));

	//Opacity
	$wp_customize->add_setting('vw_yoga_fitness_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_yoga_fitness_sanitize_choices'
	));
	$wp_customize->add_control( 'vw_yoga_fitness_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-yoga-fitness' ),
	'section'     => 'vw_yoga_fitness_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_yoga_fitness_slider_opacity_color',
	'choices' => array(
		'0' =>  esc_attr('0','vw-yoga-fitness'),
		'0.1' =>  esc_attr('0.1','vw-yoga-fitness'),
		'0.2' =>  esc_attr('0.2','vw-yoga-fitness'),
		'0.3' =>  esc_attr('0.3','vw-yoga-fitness'),
		'0.4' =>  esc_attr('0.4','vw-yoga-fitness'),
		'0.5' =>  esc_attr('0.5','vw-yoga-fitness'),
		'0.6' =>  esc_attr('0.6','vw-yoga-fitness'),
		'0.7' =>  esc_attr('0.7','vw-yoga-fitness'),
		'0.8' =>  esc_attr('0.8','vw-yoga-fitness'),
		'0.9' =>  esc_attr('0.9','vw-yoga-fitness')
	),
	));

	//Slider height
	$wp_customize->add_setting('vw_yoga_fitness_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_slider_height',array(
		'label'	=> __('Slider Height','vw-yoga-fitness'),
		'description'	=> __('Specify the slider height (px).','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_yoga_fitness_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'vw_yoga_fitness_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_yoga_fitness_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-yoga-fitness'),
		'section' => 'vw_yoga_fitness_slidersettings',
		'type'  => 'number',
	) );

	//Services
	$wp_customize->add_section( 'vw_yoga_fitness_service_section' , array(
    	'title'      => __( 'Our Classes Section', 'vw-yoga-fitness' ),
		'priority'   => null,
		'panel' => 'vw_yoga_fitness_panel_id'
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_yoga_fitness_section_title', array( 
		'selector' => '#serv-section h2', 
		'render_callback' => 'vw_yoga_fitness_customize_partial_vw_yoga_fitness_section_title',
	));

	$wp_customize->add_setting('vw_yoga_fitness_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_section_title',array(
		'label'	=> __('Section Title','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( 'Our Classes', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_service_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_yoga_fitness_section_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_section_text',array(
		'label'	=> __('Section Text','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( 'Lorem ipsum is a dummy text.', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_service_section',
		'type'=> 'text'
	));	

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_yoga_fitness_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_yoga_fitness_sanitize_choices',
	));
	$wp_customize->add_control('vw_yoga_fitness_services',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display services','vw-yoga-fitness'),
		'description' => __('Image Size (340 x 255)','vw-yoga-fitness'),
		'section' => 'vw_yoga_fitness_service_section',
	));

	//Classes excerpt
	$wp_customize->add_setting( 'vw_yoga_fitness_classes_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_yoga_fitness_sanitize_number_range'
	));
	$wp_customize->add_control( 'vw_yoga_fitness_classes_excerpt_number', array(
		'label'       => esc_html__( 'Classes Excerpt length','vw-yoga-fitness' ),
		'section'     => 'vw_yoga_fitness_service_section',
		'type'        => 'range',
		'settings'    => 'vw_yoga_fitness_classes_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting('vw_yoga_fitness_classes_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_classes_button_text',array(
		'label'	=> __('Add Classes Button Text','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_service_section',
		'type'=> 'text'
	));

	//Blog Post
	$wp_customize->add_panel( $VWYogaFitnessParentPanel );

	$BlogPostParentPanel = new VW_Yoga_Fitness_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-yoga-fitness' ),
		'panel' => 'vw_yoga_fitness_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_yoga_fitness_post_settings', array(
		'title' => __( 'Post Settings', 'vw-yoga-fitness' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_yoga_fitness_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_yoga_fitness_customize_partial_vw_yoga_fitness_toggle_postdate', 
	));

	$wp_customize->add_setting('vw_yoga_fitness_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Yoga_Fitness_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_yoga_fitness_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-yoga-fitness'),
		'transport' => 'refresh',
		'section'	=> 'vw_yoga_fitness_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_yoga_fitness_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-yoga-fitness' ),
        'section' => 'vw_yoga_fitness_post_settings'
    )));

    $wp_customize->add_setting('vw_yoga_fitness_toggle_author_icon',array(
		'default'	=> 'far fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Yoga_Fitness_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_yoga_fitness_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','vw-yoga-fitness'),
		'transport' => 'refresh',
		'section'	=> 'vw_yoga_fitness_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_yoga_fitness_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_toggle_author',array(
		'label' => esc_html__( 'Author','vw-yoga-fitness' ),
		'section' => 'vw_yoga_fitness_post_settings'
    )));

    $wp_customize->add_setting('vw_yoga_fitness_toggle_comments_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Yoga_Fitness_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_yoga_fitness_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-yoga-fitness'),
		'transport' => 'refresh',
		'section'	=> 'vw_yoga_fitness_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_yoga_fitness_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-yoga-fitness' ),
		'section' => 'vw_yoga_fitness_post_settings'
    )));

    $wp_customize->add_setting('vw_yoga_fitness_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Yoga_Fitness_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_yoga_fitness_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','vw-yoga-fitness'),
		'transport' => 'refresh',
		'section'	=> 'vw_yoga_fitness_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_yoga_fitness_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_toggle_time',array(
		'label' => esc_html__( 'Time','vw-yoga-fitness' ),
		'section' => 'vw_yoga_fitness_post_settings'
    )));

    $wp_customize->add_setting( 'vw_yoga_fitness_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_yoga_fitness_sanitize_number_range'
	));
	$wp_customize->add_control( 'vw_yoga_fitness_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-yoga-fitness' ),
		'section'     => 'vw_yoga_fitness_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_yoga_fitness_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	));

	//Blog layout
    $wp_customize->add_setting('vw_yoga_fitness_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_yoga_fitness_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Yoga_Fitness_Image_Radio_Control($wp_customize, 'vw_yoga_fitness_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-yoga-fitness'),
        'section' => 'vw_yoga_fitness_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_yoga_fitness_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_yoga_fitness_sanitize_choices'
	));
	$wp_customize->add_control('vw_yoga_fitness_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-yoga-fitness'),
        'section' => 'vw_yoga_fitness_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-yoga-fitness'),
            'Excerpt' => __('Excerpt','vw-yoga-fitness'),
            'No Content' => __('No Content','vw-yoga-fitness')
        ),
	));

	$wp_customize->add_setting('vw_yoga_fitness_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_yoga_fitness_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-yoga-fitness' ),
      'section' => 'vw_yoga_fitness_post_settings'
    )));

	$wp_customize->add_setting( 'vw_yoga_fitness_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_yoga_fitness_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_yoga_fitness_blog_pagination_type', array(
        'section' => 'vw_yoga_fitness_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-yoga-fitness' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-yoga-fitness' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-yoga-fitness' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_yoga_fitness_button_settings', array(
		'title' => __( 'Button Settings', 'vw-yoga-fitness' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_yoga_fitness_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-yoga-fitness'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_yoga_fitness_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-yoga-fitness'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_yoga_fitness_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_yoga_fitness_sanitize_number_range'
	));
	$wp_customize->add_control( 'vw_yoga_fitness_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-yoga-fitness' ),
		'section'     => 'vw_yoga_fitness_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_yoga_fitness_blog_button_text', array( 
		'selector' => '.post-main-box .content-bttn a', 
		'render_callback' => 'vw_yoga_fitness_customize_partial_vw_yoga_fitness_blog_button_text', 
	));

	$wp_customize->add_setting('vw_yoga_fitness_blog_button_text',array(
		'default'=> esc_html__('READ MORE','vw-yoga-fitness'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_blog_button_text',array(
		'label'	=> __('Add Button Text','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_yoga_fitness_blog_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Yoga_Fitness_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_yoga_fitness_blog_button_icon',array(
		'label'	=> __('Add Button Icon','vw-yoga-fitness'),
		'transport' => 'refresh',
		'section'	=> 'vw_yoga_fitness_button_settings',
		'setting'	=> 'vw_yoga_fitness_blog_button_icon',
		'type'		=> 'icon'
	)));

	// Related Post Settings
	$wp_customize->add_section( 'vw_yoga_fitness_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-yoga-fitness' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_yoga_fitness_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_yoga_fitness_customize_partial_vw_yoga_fitness_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_yoga_fitness_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_related_post',array(
		'label' => esc_html__( 'Related Post','vw-yoga-fitness' ),
		'section' => 'vw_yoga_fitness_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_yoga_fitness_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_yoga_fitness_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_yoga_fitness_sanitize_float'
	));
	$wp_customize->add_control('vw_yoga_fitness_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_yoga_fitness_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-yoga-fitness' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_yoga_fitness_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-yoga-fitness' ),
		'section' => 'vw_yoga_fitness_single_blog_settings'
    )));

	$wp_customize->add_setting( 'vw_yoga_fitness_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','vw-yoga-fitness' ),
		'section' => 'vw_yoga_fitness_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_yoga_fitness_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_yoga_fitness_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_single_blog_settings',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_yoga_fitness_404_page',array(
		'title'	=> __('404 Page Settings','vw-yoga-fitness'),
		'panel' => 'vw_yoga_fitness_panel_id',
	));	

	$wp_customize->add_setting('vw_yoga_fitness_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_404_page_title',array(
		'label'	=> __('Add Title','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_yoga_fitness_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_404_page_content',array(
		'label'	=> __('Add Text','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_yoga_fitness_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_yoga_fitness_404_page_btn_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Yoga_Fitness_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_yoga_fitness_404_page_btn_icon',array(
		'label'	=> __('Add Button Icon','vw-yoga-fitness'),
		'transport' => 'refresh',
		'section'	=> 'vw_yoga_fitness_404_page',
		'setting'	=> 'vw_yoga_fitness_404_page_btn_icon',
		'type'		=> 'icon'
	)));

	//Social Icon Setting
	$wp_customize->add_section('vw_yoga_fitness_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-yoga-fitness'),
		'panel' => 'vw_yoga_fitness_panel_id',
	));	

	$wp_customize->add_setting('vw_yoga_fitness_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-yoga-fitness'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_yoga_fitness_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-yoga-fitness'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_yoga_fitness_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_social_icon_width',array(
		'label'	=> __('Icon Width','vw-yoga-fitness'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_yoga_fitness_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_social_icon_height',array(
		'label'	=> __('Icon Height','vw-yoga-fitness'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_yoga_fitness_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_yoga_fitness_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_yoga_fitness_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-yoga-fitness' ),
		'section'     => 'vw_yoga_fitness_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_yoga_fitness_responsive_media',array(
		'title'	=> __('Responsive Media','vw-yoga-fitness'),
		'panel' => 'vw_yoga_fitness_panel_id',
	));

    $wp_customize->add_setting( 'vw_yoga_fitness_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-yoga-fitness' ),
      'section' => 'vw_yoga_fitness_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_yoga_fitness_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-yoga-fitness' ),
      'section' => 'vw_yoga_fitness_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_yoga_fitness_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-yoga-fitness' ),
      'section' => 'vw_yoga_fitness_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_yoga_fitness_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-yoga-fitness' ),
      'section' => 'vw_yoga_fitness_responsive_media'
    )));

    $wp_customize->add_setting('vw_yoga_fitness_res_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Yoga_Fitness_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_yoga_fitness_res_menu_open_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-yoga-fitness'),
		'transport' => 'refresh',
		'section'	=> 'vw_yoga_fitness_responsive_media',
		'setting'	=> 'vw_yoga_fitness_res_menu_open_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_yoga_fitness_res_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Yoga_Fitness_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_yoga_fitness_res_menu_close_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-yoga-fitness'),
		'transport' => 'refresh',
		'section'	=> 'vw_yoga_fitness_responsive_media',
		'setting'	=> 'vw_yoga_fitness_res_menu_close_icon',
		'type'		=> 'icon'
	)));

	//Footer Text
	$wp_customize->add_section('vw_yoga_fitness_footer',array(
		'title'	=> __('Footer','vw-yoga-fitness'),
		'panel' => 'vw_yoga_fitness_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_yoga_fitness_footer_text', array( 
		'selector' => '.footer-2 .copyright p', 
		'render_callback' => 'vw_yoga_fitness_customize_partial_vw_yoga_fitness_footer_text', 
	));
	
	$wp_customize->add_setting('vw_yoga_fitness_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_yoga_fitness_footer_text',array(
		'label'	=> __('Copyright Text','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2018, .....', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_footer',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_yoga_fitness_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_yoga_fitness_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Yoga_Fitness_Image_Radio_Control($wp_customize, 'vw_yoga_fitness_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-yoga-fitness'),
        'section' => 'vw_yoga_fitness_footer',
        'settings' => 'vw_yoga_fitness_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_yoga_fitness_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-yoga-fitness'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_yoga_fitness_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-yoga-fitness' ),
      	'section' => 'vw_yoga_fitness_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_yoga_fitness_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_yoga_fitness_customize_partial_vw_yoga_fitness_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vw_yoga_fitness_scroll_to_top_icon',array(
		'default'	=> 'fas fa-angle-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Yoga_Fitness_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_yoga_fitness_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-yoga-fitness'),
		'transport' => 'refresh',
		'section'	=> 'vw_yoga_fitness_footer',
		'setting'	=> 'vw_yoga_fitness_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_yoga_fitness_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-yoga-fitness'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_yoga_fitness_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-yoga-fitness'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_yoga_fitness_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-yoga-fitness'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_yoga_fitness_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-yoga-fitness'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_yoga_fitness_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_yoga_fitness_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_yoga_fitness_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-yoga-fitness' ),
		'section'     => 'vw_yoga_fitness_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_yoga_fitness_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_yoga_fitness_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Yoga_Fitness_Image_Radio_Control($wp_customize, 'vw_yoga_fitness_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-yoga-fitness'),
        'section' => 'vw_yoga_fitness_footer',
        'settings' => 'vw_yoga_fitness_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('vw_yoga_fitness_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-yoga-fitness'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_yoga_fitness_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product .sidebar', 
		'render_callback' => 'vw_yoga_fitness_customize_partial_vw_yoga_fitness_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_yoga_fitness_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-yoga-fitness' ),
		'section' => 'vw_yoga_fitness_woocommerce_section'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_yoga_fitness_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product .sidebar', 
		'render_callback' => 'vw_yoga_fitness_customize_partial_vw_yoga_fitness_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_yoga_fitness_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-yoga-fitness' ),
		'section' => 'vw_yoga_fitness_woocommerce_section'
    )));

    //Related Products
	$wp_customize->add_setting( 'vw_yoga_fitness_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_yoga_fitness_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Yoga_Fitness_Toggle_Switch_Custom_Control( $wp_customize, 'vw_yoga_fitness_related_product_show_hide',array(
        'label' => esc_html__( 'Related product','vw-yoga-fitness' ),
        'section' => 'vw_yoga_fitness_woocommerce_section'
    )));

    //Products per page
    $wp_customize->add_setting('vw_yoga_fitness_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_yoga_fitness_sanitize_float'
	));
	$wp_customize->add_control('vw_yoga_fitness_products_per_page',array(
		'label'	=> __('Products Per Page','vw-yoga-fitness'),
		'description' => __('Display on shop page','vw-yoga-fitness'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_yoga_fitness_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_yoga_fitness_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_yoga_fitness_sanitize_choices'
	));
	$wp_customize->add_control('vw_yoga_fitness_products_per_row',array(
		'label'	=> __('Products Per Row','vw-yoga-fitness'),
		'description' => __('Display on shop page','vw-yoga-fitness'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_yoga_fitness_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_yoga_fitness_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-yoga-fitness'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_yoga_fitness_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_yoga_fitness_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-yoga-fitness'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-yoga-fitness'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-yoga-fitness' ),
        ),
		'section'=> 'vw_yoga_fitness_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_yoga_fitness_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_yoga_fitness_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_yoga_fitness_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-yoga-fitness' ),
		'section'     => 'vw_yoga_fitness_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_yoga_fitness_products_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_yoga_fitness_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_yoga_fitness_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-yoga-fitness' ),
		'section'     => 'vw_yoga_fitness_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Yoga_Fitness_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Yoga_Fitness_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_yoga_fitness_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Yoga_Fitness_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_yoga_fitness_panel';
	    public function json() {

			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;
			return $array;
	    }
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Yoga_Fitness_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_yoga_fitness_section';
	    public function json() {

			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;

			if ( $this->panel ) {
			$array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
			} else {
			$array['customizeAction'] = 'Customizing';
			}
			return $array;
		}
  	}
}

// Enqueue our scripts and styles
function vw_yoga_fitness_customize_controls_scripts() {
	wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_yoga_fitness_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Yoga_Fitness_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Yoga_Fitness_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Yoga_Fitness_Customize_Section_Pro($manager,'vw_yoga_fitness_upgrade_pro_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW Yoga Fitness', 'vw-yoga-fitness' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-yoga-fitness' ),
				'pro_url'  => esc_url('https://www.vwthemes.com/themes/yoga-wordpress-theme/'),
		)));

		// Register sections.
		$manager->add_section(new VW_Yoga_Fitness_Customize_Section_Pro($manager,'vw_yoga_fitness_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-yoga-fitness' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-yoga-fitness' ),
			'pro_url'  => admin_url('themes.php?page=vw_yoga_fitness_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-yoga-fitness-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-yoga-fitness-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Yoga_Fitness_Customize::get_instance();