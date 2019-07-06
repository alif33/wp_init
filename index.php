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
              <a href="<?php the_permalink();?>"> <?php the_title();?> </a>
              </h2>
              <h3 class="post-subtitle">
              <?php the_excerpt();?>
              </h3>          
            <p class="post-meta">Posted by
              <a href="#"><?php the_author();?></a>
              on <?php the_date();?></p>
          </div>
          <hr>
          <?php }}else{?>
            <h2 style="text-align:center;">Have no post here !!! </h2>
          <?php } ?>
          <!-- Pager -->
          <div class="clearfix">
          <!-- <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a> -->
          <?php// previous_posts_link('&larr; Previous posts');?>
          <?php //next_posts_link('Older posts &rarr;', 0) ;?>
          <?php the_posts_pagination(array('screen_reader_text' =>' '));?>
          </div>
        </div>
      </div>
    </div>
    <hr>   
<?php get_footer(); ?>
 