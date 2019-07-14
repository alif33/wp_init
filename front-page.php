<?php get_header();?>
<div class="card col-md-6 mt-5 mb-5">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <?php
    $testimonial = new WP_Query(
        array(
            'post_type' => 'code4webs_testimonials'
        )
    );
    ?>
    <?php if($testi->have_posts()):

    while($testi->have_posts()){
        $testi->the_post();
        ?>
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php the_post_thumbnail();?>" alt="Third slide">
      <h2><?php the_titile();?> </h2>
      <p><?php the_content();?> </p>
    </div>
  </div>
  <?php } ?>
<?php  endif ;?>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>


<?php get_footer();?>