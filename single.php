<?php get_header(); ?>
    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <?php
        if(have_posts()){
         while(have_posts()){
          the_post();?>
          <div class="post-preview">
            <?php the_post_thumbnail('medium');?>
              <h2 class="post-title">
              <?php the_title();?>
              </h2>
              <?php the_content();?>
        
            <p class="post-meta">Posted by
              <a href="#"><?php the_author();?></a>
              on <?php the_date();?></p>
          </div>
          <hr>
          <?php }}else{?>
            <h2 style="text-align:center;">Have no post here !!! </h2>
          <?php } ?>
          <!-- Pager -->          
        </div>
      </div>
    </div>
    <hr>   
<?php get_footer(); ?>
 