<?php
//about theme info
add_action( 'admin_menu', 'vw_yoga_fitness_gettingstarted' );
function vw_yoga_fitness_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Yoga Fitness', 'vw-yoga-fitness'), esc_html__('About VW Yoga Fitness', 'vw-yoga-fitness'), 'edit_theme_options', 'vw_yoga_fitness_guide', 'vw_yoga_fitness_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_yoga_fitness_admin_theme_style() {
   wp_enqueue_style('vw-yoga-fitness-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-yoga-fitness-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
   wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri()).'/assets/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'vw_yoga_fitness_admin_theme_style');

//guidline for about theme
function vw_yoga_fitness_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-yoga-fitness' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Yoga Fitness Theme', 'vw-yoga-fitness' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-yoga-fitness'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Yoga Fitness at 20% Discount','vw-yoga-fitness'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-yoga-fitness'); ?> ( <span><?php esc_html_e('vwpro20','vw-yoga-fitness'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VW_YOGA_FITNESS_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-yoga-fitness' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="vw_yoga_fitness_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-yoga-fitness' ); ?></button>
			<button class="tablinks" onclick="vw_yoga_fitness_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-yoga-fitness' ); ?></button>
			<button class="tablinks" onclick="vw_yoga_fitness_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-yoga-fitness' ); ?></button>
			<button class="tablinks" onclick="vw_yoga_fitness_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'vw-yoga-fitness' ); ?></button>
		  	<button class="tablinks" onclick="vw_yoga_fitness_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vw-yoga-fitness' ); ?></button>
		  	<button class="tablinks" onclick="vw_yoga_fitness_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-yoga-fitness' ); ?></button>
		</div>

		<!-- Tab content -->
		<?php
			$vw_yoga_fitness_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_yoga_fitness_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Yoga_Fitness_Plugin_Activation_Settings::get_instance();
				$vw_yoga_fitness_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-yoga-fitness-recommended-plugins">
				    <div class="vw-yoga-fitness-action-list">
				        <?php if ($vw_yoga_fitness_actions): foreach ($vw_yoga_fitness_actions as $key => $vw_yoga_fitness_actionValue): ?>
				                <div class="vw-yoga-fitness-action" id="<?php echo esc_attr($vw_yoga_fitness_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_yoga_fitness_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_yoga_fitness_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_yoga_fitness_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-yoga-fitness'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_yoga_fitness_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-yoga-fitness' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('VW Yoga Fitness is a well-polished, visually stunning, elegant, versatile and clean fitness and yoga WordPress theme for yoga classes, fitness centres, gyms, health clubs, aerobics classes, gymnastic coaching, spa and massage centre, yoga and exercise trainers, physiotherapy, weight loss centres, personal trainers, lifestyle coach, workout studios, sports centres and other such relevant websites. It has endless options for customization as you can change its logo, colour scheme, fonts, menu style, slider settings, background and many other elements. This yoga and fitness WordPress theme is readily responsive, cross-browser compatible, translation ready, RTL writing style supportive, social media integrated and retina ready. It is so flexible that a little change here and there can enable you to use it for other businesses and websites. It is coded with latest WordPress standards and compatible with the newly launched version to keep your website upbeat and ahead of time. It is well versed in improving SEO of website. VW Yoga Fitness supports video section, image, gallery and text format posts and numerous slides in the slider. Its layout can be changed according to the feel you wish to give to your website.','vw-yoga-fitness'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-yoga-fitness' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-yoga-fitness' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_YOGA_FITNESS_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-yoga-fitness' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-yoga-fitness'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-yoga-fitness'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-yoga-fitness'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-yoga-fitness'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-yoga-fitness'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_YOGA_FITNESS_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-yoga-fitness'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-yoga-fitness'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-yoga-fitness'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_YOGA_FITNESS_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-yoga-fitness'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-yoga-fitness' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-yoga-fitness'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-admin-customizer"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=vw_yoga_fitness_typography') ); ?>" target="_blank"><?php esc_html_e('Typography','vw-yoga-fitness'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_yoga_fitness_topbar') ); ?>" target="_blank"><?php esc_html_e('Topbar Settings','vw-yoga-fitness'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_yoga_fitness_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Section','vw-yoga-fitness'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_yoga_fitness_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-yoga-fitness'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_yoga_fitness_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-yoga-fitness'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_yoga_fitness_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-yoga-fitness'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_yoga_fitness_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-yoga-fitness'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-editor-aligncenter"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-yoga-fitness'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-yoga-fitness'); ?></a>
								</div> 
							</div>

						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-yoga-fitness'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-yoga-fitness'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-yoga-fitness'); ?></span><?php esc_html_e(' Go to ','vw-yoga-fitness'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-yoga-fitness'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-yoga-fitness'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-yoga-fitness'); ?></span><?php esc_html_e(' Go to ','vw-yoga-fitness'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-yoga-fitness'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-yoga-fitness'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-yoga-fitness'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-yoga-fitness/" target="_blank"><?php esc_html_e('Documentation','vw-yoga-fitness'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Yoga_Fitness_Plugin_Activation_Settings::get_instance();
				$vw_yoga_fitness_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-yoga-fitness-recommended-plugins">
				    <div class="vw-yoga-fitness-action-list">
				        <?php if ($vw_yoga_fitness_actions): foreach ($vw_yoga_fitness_actions as $key => $vw_yoga_fitness_actionValue): ?>
				                <div class="vw-yoga-fitness-action" id="<?php echo esc_attr($vw_yoga_fitness_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_yoga_fitness_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_yoga_fitness_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_yoga_fitness_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-yoga-fitness'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_yoga_fitness_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-yoga-fitness' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-yoga-fitness'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','vw-yoga-fitness'); ?></span></b></p>
	              	<div class="vw-yoga-fitness-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-yoga-fitness'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />	
	            </div>

	            <div class="block-pattern-link-customizer">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-yoga-fitness' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-yoga-fitness'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_yoga_fitness_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-yoga-fitness'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-yoga-fitness'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_yoga_fitness_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-yoga-fitness'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_yoga_fitness_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-yoga-fitness'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_yoga_fitness_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-yoga-fitness'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_yoga_fitness_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-yoga-fitness'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-yoga-fitness'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
	        </div>
		</div>	

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Yoga_Fitness_Plugin_Activation_Settings::get_instance();
			$vw_yoga_fitness_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-yoga-fitness-recommended-plugins">
				    <div class="vw-yoga-fitness-action-list">
				        <?php if ($vw_yoga_fitness_actions): foreach ($vw_yoga_fitness_actions as $key => $vw_yoga_fitness_actionValue): ?>
				                <div class="vw-yoga-fitness-action" id="<?php echo esc_attr($vw_yoga_fitness_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_yoga_fitness_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_yoga_fitness_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_yoga_fitness_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-yoga-fitness' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-yoga-fitness-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-yoga-fitness'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
					<h3><?php esc_html_e( 'Link to customizer', 'vw-yoga-fitness' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-yoga-fitness'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_yoga_fitness_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-yoga-fitness'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-yoga-fitness'); ?></a>
							</div>
							
							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_yoga_fitness_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-yoga-fitness'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_yoga_fitness_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-yoga-fitness'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_yoga_fitness_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-yoga-fitness'); ?></a>
							</div> 
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_yoga_fitness_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-yoga-fitness'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-yoga-fitness'); ?></a>
							</div> 
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent product_woo_tab">
			<?php if(!is_plugin_active('ibtana-ecommerce-product-addons/plugin.php')){ 
				$plugin_ins = VW_Yoga_Fitness_Plugin_Activation_Woo_Products::get_instance();
				$vw_yoga_fitness_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-yoga-fitness-recommended-plugins">
			    	<div class="vw-yoga-fitness-action-list">
                	<div class="vw-yoga-fitness-action" id="<?php echo esc_attr($vw_yoga_fitness_actions['id']);?>">
                     <div class="action-inner plugin-activation-redirect">
                        <h3 class="action-title"><?php echo esc_html($vw_yoga_fitness_actions['title']); ?></h3>
                        <div class="action-desc"><?php echo esc_html($vw_yoga_fitness_actions['desc']); ?>
                        </div>
                        <?php echo wp_kses_post($vw_yoga_fitness_actions['link']); ?>
                     </div>
                	</div>
			    	</div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'vw-yoga-fitness' ); ?></h3>
				<hr class="h3hr">
           	<div class="vw-yoga-fitness-pattern-page">
	    			<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates&woo=true' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','vw-yoga-fitness'); ?></a>
	    		</div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-yoga-fitness' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Hit the ground with this fully competent yoga WordPress theme to give tough competition to your rivals and stand out among them. It is a perfect fit for yoga classes, fitness studios, gyms, aerobics and gymnastic classes, spa and massage centres, health consultant and everything related to health and fitness. This yoga theme has clean and clutter-free design to create a smart website that will sort all your website building problems without taking much effort from you. You get to choose the look of your website by changing its layout from boxed to full-width to full screen. With the absolute flexible layout of this yoga WordPress theme, it lends itself to serve a wide spectrum of websites from personal to corporate and business ones. Each functionality is so vividly explained in its documentation that you will never need a professional coder to set up your website whether you are skilled in programming languages or not.','vw-yoga-fitness'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_YOGA_FITNESS_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-yoga-fitness'); ?></a>
					<a href="<?php echo esc_url( VW_YOGA_FITNESS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-yoga-fitness'); ?></a>
					<a href="<?php echo esc_url( VW_YOGA_FITNESS_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-yoga-fitness'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-yoga-fitness' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-yoga-fitness'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-yoga-fitness'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-yoga-fitness'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-yoga-fitness'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-yoga-fitness'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><?php esc_html_e('14', 'vw-yoga-fitness'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-yoga-fitness'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-yoga-fitness'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-yoga-fitness'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-yoga-fitness'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-yoga-fitness'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-yoga-fitness'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-yoga-fitness'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_YOGA_FITNESS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-yoga-fitness'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-yoga-fitness'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-yoga-fitness'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_YOGA_FITNESS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-yoga-fitness'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-yoga-fitness'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-yoga-fitness'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_YOGA_FITNESS_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-yoga-fitness'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-yoga-fitness'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-yoga-fitness'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_YOGA_FITNESS_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-yoga-fitness'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-yoga-fitness'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-yoga-fitness'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_YOGA_FITNESS_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-yoga-fitness'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-yoga-fitness'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-yoga-fitness'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_YOGA_FITNESS_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-yoga-fitness'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>