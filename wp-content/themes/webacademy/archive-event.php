<?php 

get_header();
pageBanner(array(
  'title' => 'All Events',
  'subtitle' => 'Upcoming events for webacademy'
));
 ?>

<div class="container container--narrow page-section">
    <?php
        while(have_posts()){
            the_post();
          get_template_part('template-parts/content-event');
          }
    echo paginate_links();
  ?>

  <hr class="section-break">
<p>Want to have a recap of our events??<a href="<?php echo site_url('/past-events')?>">Check out our past events archive.</a></p>

</div>
<?php get_footer();

?>