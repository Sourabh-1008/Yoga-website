<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package VW Yoga Fitness
 */

get_header(); ?>

<main id="maincontent" role="main" class="content-vw">
	<div class="container">
		<div class="page-content">
	    	<h1><?php echo esc_html(get_theme_mod('vw_yoga_fitness_404_page_title',__('404 Not Found','vw-yoga-fitness')));?></h1>	
			<p class="text-404"><?php echo esc_html(get_theme_mod('vw_yoga_fitness_404_page_content',__('Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.','vw-yoga-fitness')));?></p>
			<?php if( get_theme_mod('vw_yoga_fitness_404_page_button_text','Return to the home page') != ''){ ?>
				<div class="error-btn">
		    		<a class="view-more" href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html(get_theme_mod('vw_yoga_fitness_404_page_button_text',__('Return to the home page','vw-yoga-fitness')));?><i class="<?php echo esc_attr(get_theme_mod('vw_yoga_fitness_404_page_btn_icon','fa fa-angle-right')); ?>"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_yoga_fitness_404_page_button_text',__('Return to the home page','vw-yoga-fitness')));?></span></a>
				</div>
			<?php } ?>
		</div>
		<div class="clearfix"></div>
	</div>
</main>

<?php get_footer(); ?>