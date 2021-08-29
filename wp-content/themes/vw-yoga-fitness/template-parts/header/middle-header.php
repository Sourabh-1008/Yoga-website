<?php
/**
 * The template part for header
 *
 * @package VW Yoga Fitness 
 * @subpackage vw_yoga_fitness
 * @since VW Yoga Fitness 1.0
 */
?>

<?php
  $vw_yoga_fitness_search_hide_show = get_theme_mod( 'vw_yoga_fitness_search_hide_show' );
  if ( 'Disable' == $vw_yoga_fitness_search_hide_show ) {
   $colmd = 'col-lg-12 col-md-12';
  } else { 
   $colmd = 'col-lg-10 col-md-10 col-6';
  } 
?>

<div class="main-header">
    <div class="header-menu <?php if( get_theme_mod( 'vw_yoga_fitness_sticky_header', false) != '' || get_theme_mod( 'vw_yoga_fitness_stickyheader_hide_show', false) != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
    <div class="container">
      <div class="row m-0">      
        <div class="col-lg-3 col-md-3">
          <div class="logo">
            <div class="logo-inner">
              <?php if ( has_custom_logo() ) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
              <?php endif; ?>
              <?php $blog_info = get_bloginfo( 'name' ); ?>
                <?php if ( ! empty( $blog_info ) ) : ?>
                  <?php if ( is_front_page() && is_home() ) : ?>
                    <?php if( get_theme_mod('vw_yoga_fitness_logo_title_hide_show',true) != ''){ ?>
                      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php } ?>
                  <?php else : ?>
                    <?php if( get_theme_mod('vw_yoga_fitness_logo_title_hide_show',true) != ''){ ?>
                      <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php } ?>
                  <?php endif; ?>
                <?php endif; ?>
                <?php
                  $description = get_bloginfo( 'description', 'display' );
                  if ( $description || is_customize_preview() ) :
                ?>
                <?php if( get_theme_mod('vw_yoga_fitness_tagline_hide_show',true) != ''){ ?>
                  <p class="site-description">
                    <?php echo esc_html($description); ?>
                  </p>
                <?php } ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-9 align-self-lg-center align-self-md-center">
          <div class="row header-upper-bg">
            <div class="col-lg-9 col-md-8">
              <div class="row header-nav-bg">
                <div class="<?php echo esc_html( $colmd ); ?>">
                  <?php get_template_part( 'template-parts/header/navigation' ); ?>
                </div>
                <?php if ( 'Disable' != $vw_yoga_fitness_search_hide_show ) {?>
                  <div class="col-lg-2 col-md-2 col-6">
                    <div class="search-box">
                      <span><a href="#"><i class="<?php echo esc_attr(get_theme_mod('vw_yoga_fitness_search_icon','fas fa-search')); ?>"></i></a></span>
                    </div>
                  </div>
                <?php } ?>
                <div class="serach_outer">
                  <div class="closepop"><a href="#maincontent"><i class="<?php echo esc_attr(get_theme_mod('vw_yoga_fitness_search_close_icon','fa fa-window-close')); ?>"></i></a></div>
                  <div class="serach_inner">
                    <?php get_search_form(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 p-0">
              <?php if( get_theme_mod( 'vw_yoga_fitness_button_text') != '' || get_theme_mod( 'vw_yoga_fitness_button_url' )!= '' ) { ?>
                <div class="top-btn">
                  <a href="<?php echo esc_url(get_theme_mod('vw_yoga_fitness_button_url',''));?>"><i class="<?php echo esc_attr(get_theme_mod('vw_yoga_fitness_appointment_button_icon','far fa-calendar-alt')); ?>"></i><?php echo esc_html(get_theme_mod('vw_yoga_fitness_button_text',''));?><span class="screen-reader-text"><?php esc_html_e( 'BOOK NOW','vw-yoga-fitness' );?></span></a>
                </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>