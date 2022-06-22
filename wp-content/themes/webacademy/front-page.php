<!----
  Page Description: This is the landing page of the website. when someone logs onto on local version: http://webacademy.local/ or live version: sumitweb.dk, this will be displayed first
-->
<?php get_header(); ?>   <!----- This line is to get the header from the other page called header.php. Removing this line will result in not loading the header area-->

<!---Start landing page banner area-->
  <div class="page-banner">
      <!--below, i am using php function to get required file, alternatively, the whole address can also be given-->
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/building.jpg') ?>);"></div> 
      <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Hello!</h1>
        <h2 class="headline headline--medium">Welcome to Webacademy</h2>
        <h3 class="headline headline--small">Get started by checking out our majors by clicking the button below</h3>
        <a href="<?php echo get_post_type_archive_link('program'); ?>" class="btn btn--large btn--blue">Find Your Major</a> <!--This function retreives the permalink for a post type archive-->
      </div>
    </div>
<!---End landing page banner area-->

    <div class="full-width-split group">
      <div class="full-width-split__one">
        <div class="full-width-split__inner">
          <h2 class="headline headline--small-plus t-center">Our Events</h2>

          <?php 
          $today = date('Ymd');
            $homepageEvents = new WP_Query(array(
                'posts_per_page' => 2,
                'post_type' => 'event',
                'meta_key' => 'event_date',
                'orderby' => 'meta_value_num',
                'order'=> 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'event_date',
                        'compare' => '>=',
                        'value' => $today,
                        'type' => 'numeric'
                    )
                )
            ));

            while($homepageEvents->have_posts()){
                $homepageEvents->the_post();
                get_template_part('template-parts/content','event');
             }

            ?>
          <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn--blue">View All Events</a></p>
        </div>
      </div>
      <div class="full-width-split__two">
        <div class="full-width-split__inner">
          <h2 class="headline headline--small-plus t-center">Our Blogs</h2>
            <?php
                $homepagePosts = new WP_Query(array(
                    'posts_per_page' => 2
                ));

                while($homepagePosts->have_posts()){
                    $homepagePosts->the_post();?>
                    <div class="event-summary">
                        <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink();?>"
                        <span class="event-summary__month"><?php the_time('M') ?></span>
                        <span class="event-summary__day"> <?php the_time('d') ?></span>
                        </a>
                        <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h5>
                        <p><?php if (has_excerpt()){
                            echo get_the_excerpt();
                        }else{
                            echo wp_trim_words(get_the_content(), 18);
                        }?> <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
                        </div>
                    </div>
                    <?php 
                } wp_reset_postdata();
                ?>
        
          

          <p class="t-center no-margin"><a href="<?php echo site_url('/blog'); ?>" class="btn btn--yellow">View All Blog Posts</a></p>
        </div>
      </div>
    </div>

    <div class="hero-slider">
      <div data-glide-el="track" class="glide__track">
        <div class="glide__slides">
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/canteen.jpg') ?>);">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Healthy canteen food</h2>
                <p class="t-center">All students have access to healthy food in our canteen</p>
                <p class="t-center no-margin"><a href="http://webacademy.local/healthy-canteen-food/" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/friday.jpg') ?>);">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Friday bars </h2>
                <p class="t-center">Join our friday bars for games, fun and booze.</p>
                <p class="t-center no-margin"><a href="http://webacademy.local/friday-bars/" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/massage.jpg') ?>);">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Free massage </h2>
                <p class="t-center">Let all that stress off and relax our free massage.</p>
                <p class="t-center no-margin"><a href="http://webacademy.local/free-massage/" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
      </div>
    </div>

  <?php get_footer();

?>