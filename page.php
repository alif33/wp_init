<?php get_header();?>
<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <?php while(have_posts()){
         the_post()    ?>
        <?php the_content();?>
        <?php } ?>
        </div>
      </div>
    </div>
    <hr>
<?php get_footer();?>