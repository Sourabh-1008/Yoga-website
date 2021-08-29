<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_yoga_fitness_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_yoga_fitness_slider_hide_show', false) != '' || get_theme_mod( 'vw_yoga_fitness_resp_slider_hide_show', false) != '') { ?>
  <section id="slider">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'vw_yoga_fitness_slider_speed',4000)) ?>">  
      <?php $vw_yoga_fitness_sliders_page = array();
        for ( $count = 1; $count <= 4; $count++ ) {
          $mod = intval( get_theme_mod( 'vw_yoga_fitness_slider_page' . $count ));
          if ( 'page-none-selected' != $mod ) {
            $vw_yoga_fitness_sliders_page[] = $mod;
          }
        }
        if( !empty($vw_yoga_fitness_sliders_page) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $vw_yoga_fitness_sliders_page,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
      ?>     
      <div class="carousel-inner" role="listbox">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <?php the_post_thumbnail(); ?>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_yoga_fitness_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_yoga_fitness_slider_excerpt_number','30')))); ?></p>
                <?php if( get_theme_mod('vw_yoga_fitness_slider_button_text','READ MORE') != ''){ ?>
                  <div class="more-btn">
                    <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_yoga_fitness_slider_button_text',__('READ MORE','vw-yoga-fitness')));?><i class="<?php echo esc_attr(get_theme_mod('vw_yoga_fitness_slider_btn_icon','fa fa-angle-right')); ?>"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_yoga_fitness_slider_button_text',__('READ MORE','vw-yoga-fitness')));?></span></a>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php $i++; endwhile; 
        wp_reset_postdata();?>
      </div>
      <?php else : ?>
          <div class="no-postfound"></div>
      <?php endif;
      endif;?>
      <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
        <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
        <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-yoga-fitness' );?></span>
      </a>
      <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
        <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
        <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-yoga-fitness' );?></span>
      </a>
    </div>
    <div class="clearfix"></div>
  </section>
  <?php } ?>

  <?php do_action( 'vw_yoga_fitness_after_slider' ); ?>

  <?php if( get_theme_mod( 'vw_yoga_fitness_section_title') != '' || get_theme_mod( 'vw_yoga_fitness_section_text') != '' || get_theme_mod( 'vw_yoga_fitness_services') != '') { ?>
    <section id="serv-section">
      <div class="container">
        <?php if( get_theme_mod( 'vw_yoga_fitness_section_title') != '' ) { ?>
          <h2><?php echo esc_html(get_theme_mod('vw_yoga_fitness_section_title',''));?></h2>
          <hr class="section-hr">
          <h3><?php echo esc_html(get_theme_mod('vw_yoga_fitness_section_text',''));?></h3>
        <?php }?>
        <div class="row m-0">
          <?php
            $vw_yoga_fitness_catData =  get_theme_mod('vw_yoga_fitness_services','');
            if($vw_yoga_fitness_catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html($vw_yoga_fitness_catData,'vw-yoga-fitness'))); ?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-lg-4 col-md-6">
              <div class="box">
                <?php the_post_thumbnail(); ?>
                <div class="box-content">
                  <div class="content-inner">
                    <h4 class="title"><?php the_title(); ?></h4>
                    <hr>
                    <span class="post"><p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_yoga_fitness_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_yoga_fitness_classes_excerpt_number','30')))); ?></p></span>
                    <?php if( get_theme_mod('vw_yoga_fitness_classes_button_text','READ MORE') != ''){ ?>
                      <ul class="icon">
                        <li><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_theme_mod('vw_yoga_fitness_classes_button_text',__('READ MORE','vw-yoga-fitness')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_yoga_fitness_classes_button_text',__('READ MORE','vw-yoga-fitness')));?></span></a></li>
                      </ul>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endwhile;
            wp_reset_postdata();
          } ?>
        </div>
      </div>
    </section>
  <?php } ?>

  <?php do_action( 'vw_yoga_fitness_after_services' ); ?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>