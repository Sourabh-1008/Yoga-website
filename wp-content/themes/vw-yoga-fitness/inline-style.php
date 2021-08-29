<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_yoga_fitness_first_color = get_theme_mod('vw_yoga_fitness_first_color');

	$vw_yoga_fitness_custom_css = '';

	if($vw_yoga_fitness_first_color != false){
		$vw_yoga_fitness_custom_css .='.logo-inner, .top-btn:hover, .view-more, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .box:hover .box-content, input[type="submit"], .footer .tagcloud a:hover, .sidebar .custom-social-icons i, .footer .custom-social-icons i, .footer-2, .pagination span, .pagination a, .sidebar .tagcloud a:hover, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, .sidebar .widget_price_filter .ui-slider .ui-slider-range, .sidebar .widget_price_filter .ui-slider .ui-slider-handle, .sidebar .woocommerce-product-search button, .footer .widget_price_filter .ui-slider .ui-slider-range, .footer .widget_price_filter .ui-slider .ui-slider-handle, .footer .woocommerce-product-search button, .footer a.custom_read_more, .sidebar a.custom_read_more, .woocommerce nav.woocommerce-pagination ul li a, .nav-previous a, .nav-next a, .wp-block-button__link, #preloader{';
			$vw_yoga_fitness_custom_css .='background-color: '.esc_attr($vw_yoga_fitness_first_color).';';
		$vw_yoga_fitness_custom_css .='}';
	}
	if($vw_yoga_fitness_first_color != false){
		$vw_yoga_fitness_custom_css .='#comments input[type="submit"].submit{';
			$vw_yoga_fitness_custom_css .='background-color: '.esc_attr($vw_yoga_fitness_first_color).'!important;';
		$vw_yoga_fitness_custom_css .='}';
	}
	if($vw_yoga_fitness_first_color != false){
		$vw_yoga_fitness_custom_css .='.footer li a:hover, .sidebar ul li a:hover, .post-main-box:hover h2, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .search-box i, .post-main-box:hover h2 a, .post-main-box:hover .post-info a, .single-post .post-info:hover a, #slider .inner_carousel h1 a:hover{';
			$vw_yoga_fitness_custom_css .='color: '.esc_attr($vw_yoga_fitness_first_color).';';
		$vw_yoga_fitness_custom_css .='}';
	}
	if($vw_yoga_fitness_first_color != false){
		$vw_yoga_fitness_custom_css .='#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover{';
			$vw_yoga_fitness_custom_css .='border-color: '.esc_attr($vw_yoga_fitness_first_color).'!important;';
		$vw_yoga_fitness_custom_css .='}';
	}
	if($vw_yoga_fitness_first_color != false){
		$vw_yoga_fitness_custom_css .='.main-navigation a:hover, hr.section-hr, .post-info hr{';
			$vw_yoga_fitness_custom_css .='border-top-color: '.esc_attr($vw_yoga_fitness_first_color).';';
		$vw_yoga_fitness_custom_css .='}';
	}
	if($vw_yoga_fitness_first_color != false){
		$vw_yoga_fitness_custom_css .='.logo-inner, .main-navigation a:hover{';
			$vw_yoga_fitness_custom_css .='border-bottom-color: '.esc_attr($vw_yoga_fitness_first_color).';';
		$vw_yoga_fitness_custom_css .='}';
	}

	/*---------------------------Second highlight color-------------------*/

	$vw_yoga_fitness_second_color = get_theme_mod('vw_yoga_fitness_second_color');

	if($vw_yoga_fitness_second_color != false){
		$vw_yoga_fitness_custom_css .='.top-btn, .view-more:hover, .scrollup i, .box .icon li a:hover, .sidebar .custom-social-icons i:hover, .footer .custom-social-icons i:hover, .pagination .current, .pagination a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #comments a.comment-reply-link, .toggle-nav i, .footer .more-button a:hover, .sidebar .more-button a:hover, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .nav-previous a:hover, .nav-next a:hover, .wp-block-button .wp-block-button__link:hover{';
			$vw_yoga_fitness_custom_css .='background-color: '.esc_attr($vw_yoga_fitness_second_color).';';
		$vw_yoga_fitness_custom_css .='}';
	}
	if($vw_yoga_fitness_second_color != false){
		$vw_yoga_fitness_custom_css .='a, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a{';
			$vw_yoga_fitness_custom_css .='color: '.esc_attr($vw_yoga_fitness_second_color).';';
		$vw_yoga_fitness_custom_css .='}';
	}
	if($vw_yoga_fitness_second_color != false){
		$vw_yoga_fitness_custom_css .='.main-navigation ul ul{';
			$vw_yoga_fitness_custom_css .='border-top-color: '.esc_attr($vw_yoga_fitness_second_color).';';
		$vw_yoga_fitness_custom_css .='}';
	}
	if($vw_yoga_fitness_second_color != false){
		$vw_yoga_fitness_custom_css .='.main-navigation ul ul{';
			$vw_yoga_fitness_custom_css .='border-bottom-color: '.esc_attr($vw_yoga_fitness_second_color).';';
		$vw_yoga_fitness_custom_css .='}';
	}

	$vw_yoga_fitness_custom_css .='@media screen and (max-width:1000px) {';
		if($vw_yoga_fitness_second_color != false){
			$vw_yoga_fitness_custom_css .='.search-box i{
			background-color:'.esc_attr($vw_yoga_fitness_second_color).';
			}';
		}
	$vw_yoga_fitness_custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$vw_yoga_fitness_theme_lay = get_theme_mod( 'vw_yoga_fitness_width_option','Full Width');
    if($vw_yoga_fitness_theme_lay == 'Boxed'){
		$vw_yoga_fitness_custom_css .='body{';
			$vw_yoga_fitness_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_yoga_fitness_custom_css .='}';
		$vw_yoga_fitness_custom_css .='.scrollup i{';
			$vw_yoga_fitness_custom_css .='right: 100px;';
		$vw_yoga_fitness_custom_css .='}';
		$vw_yoga_fitness_custom_css .='.scrollup.left i{';
			$vw_yoga_fitness_custom_css .='left: 100px;';
		$vw_yoga_fitness_custom_css .='}';
	}else if($vw_yoga_fitness_theme_lay == 'Wide Width'){
		$vw_yoga_fitness_custom_css .='body{';
			$vw_yoga_fitness_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_yoga_fitness_custom_css .='}';
		$vw_yoga_fitness_custom_css .='.scrollup i{';
			$vw_yoga_fitness_custom_css .='right: 30px;';
		$vw_yoga_fitness_custom_css .='}';
		$vw_yoga_fitness_custom_css .='.scrollup.left i{';
			$vw_yoga_fitness_custom_css .='left: 30px;';
		$vw_yoga_fitness_custom_css .='}';
	}else if($vw_yoga_fitness_theme_lay == 'Full Width'){
		$vw_yoga_fitness_custom_css .='body{';
			$vw_yoga_fitness_custom_css .='max-width: 100%;';
		$vw_yoga_fitness_custom_css .='}';
	}

	/*------------------ Slider Opacity -------------------*/

	$vw_yoga_fitness_theme_lay = get_theme_mod( 'vw_yoga_fitness_slider_opacity_color','0.5');
	if($vw_yoga_fitness_theme_lay == '0'){
		$vw_yoga_fitness_custom_css .='#slider img{';
			$vw_yoga_fitness_custom_css .='opacity:0';
		$vw_yoga_fitness_custom_css .='}';
		}else if($vw_yoga_fitness_theme_lay == '0.1'){
		$vw_yoga_fitness_custom_css .='#slider img{';
			$vw_yoga_fitness_custom_css .='opacity:0.1';
		$vw_yoga_fitness_custom_css .='}';
		}else if($vw_yoga_fitness_theme_lay == '0.2'){
		$vw_yoga_fitness_custom_css .='#slider img{';
			$vw_yoga_fitness_custom_css .='opacity:0.2';
		$vw_yoga_fitness_custom_css .='}';
		}else if($vw_yoga_fitness_theme_lay == '0.3'){
		$vw_yoga_fitness_custom_css .='#slider img{';
			$vw_yoga_fitness_custom_css .='opacity:0.3';
		$vw_yoga_fitness_custom_css .='}';
		}else if($vw_yoga_fitness_theme_lay == '0.4'){
		$vw_yoga_fitness_custom_css .='#slider img{';
			$vw_yoga_fitness_custom_css .='opacity:0.4';
		$vw_yoga_fitness_custom_css .='}';
		}else if($vw_yoga_fitness_theme_lay == '0.5'){
		$vw_yoga_fitness_custom_css .='#slider img{';
			$vw_yoga_fitness_custom_css .='opacity:0.5';
		$vw_yoga_fitness_custom_css .='}';
		}else if($vw_yoga_fitness_theme_lay == '0.6'){
		$vw_yoga_fitness_custom_css .='#slider img{';
			$vw_yoga_fitness_custom_css .='opacity:0.6';
		$vw_yoga_fitness_custom_css .='}';
		}else if($vw_yoga_fitness_theme_lay == '0.7'){
		$vw_yoga_fitness_custom_css .='#slider img{';
			$vw_yoga_fitness_custom_css .='opacity:0.7';
		$vw_yoga_fitness_custom_css .='}';
		}else if($vw_yoga_fitness_theme_lay == '0.8'){
		$vw_yoga_fitness_custom_css .='#slider img{';
			$vw_yoga_fitness_custom_css .='opacity:0.8';
		$vw_yoga_fitness_custom_css .='}';
		}else if($vw_yoga_fitness_theme_lay == '0.9'){
		$vw_yoga_fitness_custom_css .='#slider img{';
			$vw_yoga_fitness_custom_css .='opacity:0.9';
		$vw_yoga_fitness_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$vw_yoga_fitness_theme_lay = get_theme_mod( 'vw_yoga_fitness_slider_content_option','Left');
    if($vw_yoga_fitness_theme_lay == 'Left'){
		$vw_yoga_fitness_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_yoga_fitness_custom_css .='text-align:left; left:10%; right:40%;';
		$vw_yoga_fitness_custom_css .='}';
	}else if($vw_yoga_fitness_theme_lay == 'Center'){
		$vw_yoga_fitness_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_yoga_fitness_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_yoga_fitness_custom_css .='}';
	}else if($vw_yoga_fitness_theme_lay == 'Right'){
		$vw_yoga_fitness_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_yoga_fitness_custom_css .='text-align:right; left:40%; right:10%;';
		$vw_yoga_fitness_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_yoga_fitness_slider_height = get_theme_mod('vw_yoga_fitness_slider_height');
	if($vw_yoga_fitness_slider_height != false){
		$vw_yoga_fitness_custom_css .='#slider img{';
			$vw_yoga_fitness_custom_css .='height: '.esc_attr($vw_yoga_fitness_slider_height).';';
		$vw_yoga_fitness_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_yoga_fitness_slider = get_theme_mod('vw_yoga_fitness_slider_hide_show');
	if($vw_yoga_fitness_slider == false){
		$vw_yoga_fitness_custom_css .='.page-template-custom-home-page .main-header{';
			$vw_yoga_fitness_custom_css .='position: static;';
		$vw_yoga_fitness_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_yoga_fitness_theme_lay = get_theme_mod( 'vw_yoga_fitness_blog_layout_option','Default');
    if($vw_yoga_fitness_theme_lay == 'Default'){
		$vw_yoga_fitness_custom_css .='.post-main-box{';
			$vw_yoga_fitness_custom_css .='';
		$vw_yoga_fitness_custom_css .='}';
	}else if($vw_yoga_fitness_theme_lay == 'Center'){
		$vw_yoga_fitness_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$vw_yoga_fitness_custom_css .='text-align:center;';
		$vw_yoga_fitness_custom_css .='}';
		$vw_yoga_fitness_custom_css .='.post-info{';
			$vw_yoga_fitness_custom_css .='margin-top:10px;';
		$vw_yoga_fitness_custom_css .='}';
		$vw_yoga_fitness_custom_css .='.post-info hr{';
			$vw_yoga_fitness_custom_css .='margin:15px auto;';
		$vw_yoga_fitness_custom_css .='}';
	}else if($vw_yoga_fitness_theme_lay == 'Left'){
		$vw_yoga_fitness_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_yoga_fitness_custom_css .='text-align:Left;';
		$vw_yoga_fitness_custom_css .='}';
		$vw_yoga_fitness_custom_css .='.post-info hr{';
			$vw_yoga_fitness_custom_css .='margin-bottom:10px;';
		$vw_yoga_fitness_custom_css .='}';
		$vw_yoga_fitness_custom_css .='.post-main-box h2{';
			$vw_yoga_fitness_custom_css .='margin-top:10px;';
		$vw_yoga_fitness_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$vw_yoga_fitness_resp_stickyheader = get_theme_mod( 'vw_yoga_fitness_stickyheader_hide_show',false);
	if($vw_yoga_fitness_resp_stickyheader == true && get_theme_mod( 'vw_yoga_fitness_sticky_header',false) != true){
    	$vw_yoga_fitness_custom_css .='.header-fixed{';
			$vw_yoga_fitness_custom_css .='position:static;';
		$vw_yoga_fitness_custom_css .='} ';
	}
    if($vw_yoga_fitness_resp_stickyheader == true){
    	$vw_yoga_fitness_custom_css .='@media screen and (max-width:575px) {';
		$vw_yoga_fitness_custom_css .='.header-fixed{';
			$vw_yoga_fitness_custom_css .='position:fixed;';
		$vw_yoga_fitness_custom_css .='} }';
	}else if($vw_yoga_fitness_resp_stickyheader == false){
		$vw_yoga_fitness_custom_css .='@media screen and (max-width:575px){';
		$vw_yoga_fitness_custom_css .='.header-fixed{';
			$vw_yoga_fitness_custom_css .='position:static;';
		$vw_yoga_fitness_custom_css .='} }';
	}

	$vw_yoga_fitness_resp_slider = get_theme_mod( 'vw_yoga_fitness_resp_slider_hide_show',false);
	if($vw_yoga_fitness_resp_slider == true && get_theme_mod( 'vw_yoga_fitness_slider_hide_show', false) == false){
    	$vw_yoga_fitness_custom_css .='#slider{';
			$vw_yoga_fitness_custom_css .='display:none;';
		$vw_yoga_fitness_custom_css .='} ';
	}
    if($vw_yoga_fitness_resp_slider == true){
    	$vw_yoga_fitness_custom_css .='@media screen and (max-width:575px) {';
		$vw_yoga_fitness_custom_css .='#slider{';
			$vw_yoga_fitness_custom_css .='display:block;';
		$vw_yoga_fitness_custom_css .='} }';
	}else if($vw_yoga_fitness_resp_slider == false){
		$vw_yoga_fitness_custom_css .='@media screen and (max-width:575px) {';
		$vw_yoga_fitness_custom_css .='#slider{';
			$vw_yoga_fitness_custom_css .='display:none;';
		$vw_yoga_fitness_custom_css .='} }';
	}

	$vw_yoga_fitness_sidebar = get_theme_mod( 'vw_yoga_fitness_sidebar_hide_show',true);
    if($vw_yoga_fitness_sidebar == true){
    	$vw_yoga_fitness_custom_css .='@media screen and (max-width:575px) {';
		$vw_yoga_fitness_custom_css .='.sidebar{';
			$vw_yoga_fitness_custom_css .='display:block;';
		$vw_yoga_fitness_custom_css .='} }';
	}else if($vw_yoga_fitness_sidebar == false){
		$vw_yoga_fitness_custom_css .='@media screen and (max-width:575px) {';
		$vw_yoga_fitness_custom_css .='.sidebar{';
			$vw_yoga_fitness_custom_css .='display:none;';
		$vw_yoga_fitness_custom_css .='} }';
	}

	$vw_yoga_fitness_resp_scroll_top = get_theme_mod( 'vw_yoga_fitness_resp_scroll_top_hide_show',true);
	if($vw_yoga_fitness_resp_scroll_top == true && get_theme_mod( 'vw_yoga_fitness_hide_show_scroll',true) != true){
    	$vw_yoga_fitness_custom_css .='.scrollup i{';
			$vw_yoga_fitness_custom_css .='visibility:hidden !important;';
		$vw_yoga_fitness_custom_css .='} ';
	}
    if($vw_yoga_fitness_resp_scroll_top == true){
    	$vw_yoga_fitness_custom_css .='@media screen and (max-width:575px) {';
		$vw_yoga_fitness_custom_css .='.scrollup i{';
			$vw_yoga_fitness_custom_css .='visibility:visible !important;';
		$vw_yoga_fitness_custom_css .='} }';
	}else if($vw_yoga_fitness_resp_scroll_top == false){
		$vw_yoga_fitness_custom_css .='@media screen and (max-width:575px){';
		$vw_yoga_fitness_custom_css .='.scrollup i{';
			$vw_yoga_fitness_custom_css .='visibility:hidden !important;';
		$vw_yoga_fitness_custom_css .='} }';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_yoga_fitness_sticky_header_padding = get_theme_mod('vw_yoga_fitness_sticky_header_padding');
	if($vw_yoga_fitness_sticky_header_padding != false){
		$vw_yoga_fitness_custom_css .='.header-fixed{';
			$vw_yoga_fitness_custom_css .='padding: '.esc_attr($vw_yoga_fitness_sticky_header_padding).';';
		$vw_yoga_fitness_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_yoga_fitness_search_font_size = get_theme_mod('vw_yoga_fitness_search_font_size');
	if($vw_yoga_fitness_search_font_size != false){
		$vw_yoga_fitness_custom_css .='.search-box i{';
			$vw_yoga_fitness_custom_css .='font-size: '.esc_attr($vw_yoga_fitness_search_font_size).';';
		$vw_yoga_fitness_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_yoga_fitness_button_padding_top_bottom = get_theme_mod('vw_yoga_fitness_button_padding_top_bottom');
	$vw_yoga_fitness_button_padding_left_right = get_theme_mod('vw_yoga_fitness_button_padding_left_right');
	if($vw_yoga_fitness_button_padding_top_bottom != false || $vw_yoga_fitness_button_padding_left_right != false){
		$vw_yoga_fitness_custom_css .='.content-bttn .view-more{';
			$vw_yoga_fitness_custom_css .='padding-top: '.esc_attr($vw_yoga_fitness_button_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_yoga_fitness_button_padding_top_bottom).';padding-left: '.esc_attr($vw_yoga_fitness_button_padding_left_right).';padding-right: '.esc_attr($vw_yoga_fitness_button_padding_left_right).';';
		$vw_yoga_fitness_custom_css .='}';
	}

	$vw_yoga_fitness_button_border_radius = get_theme_mod('vw_yoga_fitness_button_border_radius');
	if($vw_yoga_fitness_button_border_radius != false){
		$vw_yoga_fitness_custom_css .='.content-bttn .view-more{';
			$vw_yoga_fitness_custom_css .='border-radius: '.esc_attr($vw_yoga_fitness_button_border_radius).'px;';
		$vw_yoga_fitness_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$vw_yoga_fitness_single_blog_post_navigation_show_hide = get_theme_mod('vw_yoga_fitness_single_blog_post_navigation_show_hide',true);
	if($vw_yoga_fitness_single_blog_post_navigation_show_hide != true){
		$vw_yoga_fitness_custom_css .='.post-navigation{';
			$vw_yoga_fitness_custom_css .='display: none;';
		$vw_yoga_fitness_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_yoga_fitness_copyright_alingment = get_theme_mod('vw_yoga_fitness_copyright_alingment');
	if($vw_yoga_fitness_copyright_alingment != false){
		$vw_yoga_fitness_custom_css .='.copyright p{';
			$vw_yoga_fitness_custom_css .='text-align: '.esc_attr($vw_yoga_fitness_copyright_alingment).';';
		$vw_yoga_fitness_custom_css .='}';
	}

	$vw_yoga_fitness_copyright_padding_top_bottom = get_theme_mod('vw_yoga_fitness_copyright_padding_top_bottom');
	if($vw_yoga_fitness_copyright_padding_top_bottom != false){
		$vw_yoga_fitness_custom_css .='.footer-2{';
			$vw_yoga_fitness_custom_css .='padding-top: '.esc_attr($vw_yoga_fitness_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_yoga_fitness_copyright_padding_top_bottom).';';
		$vw_yoga_fitness_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_yoga_fitness_scroll_to_top_font_size = get_theme_mod('vw_yoga_fitness_scroll_to_top_font_size');
	if($vw_yoga_fitness_scroll_to_top_font_size != false){
		$vw_yoga_fitness_custom_css .='.scrollup i{';
			$vw_yoga_fitness_custom_css .='font-size: '.esc_attr($vw_yoga_fitness_scroll_to_top_font_size).';';
		$vw_yoga_fitness_custom_css .='}';
	}

	$vw_yoga_fitness_scroll_to_top_padding = get_theme_mod('vw_yoga_fitness_scroll_to_top_padding');
	$vw_yoga_fitness_scroll_to_top_padding = get_theme_mod('vw_yoga_fitness_scroll_to_top_padding');
	if($vw_yoga_fitness_scroll_to_top_padding != false){
		$vw_yoga_fitness_custom_css .='.scrollup i{';
			$vw_yoga_fitness_custom_css .='padding-top: '.esc_attr($vw_yoga_fitness_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_yoga_fitness_scroll_to_top_padding).';';
		$vw_yoga_fitness_custom_css .='}';
	}

	$vw_yoga_fitness_scroll_to_top_width = get_theme_mod('vw_yoga_fitness_scroll_to_top_width');
	if($vw_yoga_fitness_scroll_to_top_width != false){
		$vw_yoga_fitness_custom_css .='.scrollup i{';
			$vw_yoga_fitness_custom_css .='width: '.esc_attr($vw_yoga_fitness_scroll_to_top_width).';';
		$vw_yoga_fitness_custom_css .='}';
	}

	$vw_yoga_fitness_scroll_to_top_height = get_theme_mod('vw_yoga_fitness_scroll_to_top_height');
	if($vw_yoga_fitness_scroll_to_top_height != false){
		$vw_yoga_fitness_custom_css .='.scrollup i{';
			$vw_yoga_fitness_custom_css .='height: '.esc_attr($vw_yoga_fitness_scroll_to_top_height).';';
		$vw_yoga_fitness_custom_css .='}';
	}

	$vw_yoga_fitness_scroll_to_top_border_radius = get_theme_mod('vw_yoga_fitness_scroll_to_top_border_radius');
	if($vw_yoga_fitness_scroll_to_top_border_radius != false){
		$vw_yoga_fitness_custom_css .='.scrollup i{';
			$vw_yoga_fitness_custom_css .='border-radius: '.esc_attr($vw_yoga_fitness_scroll_to_top_border_radius).'px;';
		$vw_yoga_fitness_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_yoga_fitness_social_icon_font_size = get_theme_mod('vw_yoga_fitness_social_icon_font_size');
	if($vw_yoga_fitness_social_icon_font_size != false){
		$vw_yoga_fitness_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_yoga_fitness_custom_css .='font-size: '.esc_attr($vw_yoga_fitness_social_icon_font_size).';';
		$vw_yoga_fitness_custom_css .='}';
	}

	$vw_yoga_fitness_social_icon_padding = get_theme_mod('vw_yoga_fitness_social_icon_padding');
	if($vw_yoga_fitness_social_icon_padding != false){
		$vw_yoga_fitness_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_yoga_fitness_custom_css .='padding: '.esc_attr($vw_yoga_fitness_social_icon_padding).';';
		$vw_yoga_fitness_custom_css .='}';
	}

	$vw_yoga_fitness_social_icon_width = get_theme_mod('vw_yoga_fitness_social_icon_width');
	if($vw_yoga_fitness_social_icon_width != false){
		$vw_yoga_fitness_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_yoga_fitness_custom_css .='width: '.esc_attr($vw_yoga_fitness_social_icon_width).';';
		$vw_yoga_fitness_custom_css .='}';
	}

	$vw_yoga_fitness_social_icon_height = get_theme_mod('vw_yoga_fitness_social_icon_height');
	if($vw_yoga_fitness_social_icon_height != false){
		$vw_yoga_fitness_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_yoga_fitness_custom_css .='height: '.esc_attr($vw_yoga_fitness_social_icon_height).';';
		$vw_yoga_fitness_custom_css .='}';
	}

	$vw_yoga_fitness_social_icon_border_radius = get_theme_mod('vw_yoga_fitness_social_icon_border_radius');
	if($vw_yoga_fitness_social_icon_border_radius != false){
		$vw_yoga_fitness_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_yoga_fitness_custom_css .='border-radius: '.esc_attr($vw_yoga_fitness_social_icon_border_radius).'px;';
		$vw_yoga_fitness_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_yoga_fitness_related_product_show_hide = get_theme_mod('vw_yoga_fitness_related_product_show_hide',true);
	if($vw_yoga_fitness_related_product_show_hide != true){
		$vw_yoga_fitness_custom_css .='.related.products{';
			$vw_yoga_fitness_custom_css .='display: none;';
		$vw_yoga_fitness_custom_css .='}';
	}

	$vw_yoga_fitness_products_padding_top_bottom = get_theme_mod('vw_yoga_fitness_products_padding_top_bottom');
	if($vw_yoga_fitness_products_padding_top_bottom != false){
		$vw_yoga_fitness_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_yoga_fitness_custom_css .='padding-top: '.esc_attr($vw_yoga_fitness_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_yoga_fitness_products_padding_top_bottom).'!important;';
		$vw_yoga_fitness_custom_css .='}';
	}

	$vw_yoga_fitness_products_padding_left_right = get_theme_mod('vw_yoga_fitness_products_padding_left_right');
	if($vw_yoga_fitness_products_padding_left_right != false){
		$vw_yoga_fitness_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_yoga_fitness_custom_css .='padding-left: '.esc_attr($vw_yoga_fitness_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_yoga_fitness_products_padding_left_right).'!important;';
		$vw_yoga_fitness_custom_css .='}';
	}

	$vw_yoga_fitness_products_box_shadow = get_theme_mod('vw_yoga_fitness_products_box_shadow');
	if($vw_yoga_fitness_products_box_shadow != false){
		$vw_yoga_fitness_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_yoga_fitness_custom_css .='box-shadow: '.esc_attr($vw_yoga_fitness_products_box_shadow).'px '.esc_attr($vw_yoga_fitness_products_box_shadow).'px '.esc_attr($vw_yoga_fitness_products_box_shadow).'px #ddd;';
		$vw_yoga_fitness_custom_css .='}';
	}

	$vw_yoga_fitness_products_border_radius = get_theme_mod('vw_yoga_fitness_products_border_radius');
	if($vw_yoga_fitness_products_border_radius != false){
		$vw_yoga_fitness_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_yoga_fitness_custom_css .='border-radius: '.esc_attr($vw_yoga_fitness_products_border_radius).'px;';
		$vw_yoga_fitness_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$vw_yoga_fitness_preloader_bg_color = get_theme_mod('vw_yoga_fitness_preloader_bg_color');
	if($vw_yoga_fitness_preloader_bg_color != false){
		$vw_yoga_fitness_custom_css .='#preloader{';
			$vw_yoga_fitness_custom_css .='background-color: '.esc_attr($vw_yoga_fitness_preloader_bg_color).';';
		$vw_yoga_fitness_custom_css .='}';
	}

	$vw_yoga_fitness_preloader_border_color = get_theme_mod('vw_yoga_fitness_preloader_border_color');
	if($vw_yoga_fitness_preloader_border_color != false){
		$vw_yoga_fitness_custom_css .='.loader-line{';
			$vw_yoga_fitness_custom_css .='border-color: '.esc_attr($vw_yoga_fitness_preloader_border_color).'!important;';
		$vw_yoga_fitness_custom_css .='}';
	}