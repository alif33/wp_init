<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">   
    <title><?php bloginfo('name');?></title>

<?php wp_head();?>
</head>

  <body <?php body_class();?>>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="<?php /*bloginfo('url')*/echo site_url('/');?>"><?php bloginfo('name');?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
      <!--  Compare nav_nav_menu to (html forms Nav menu) -->
  <?php    wp_nav_menu( array(
	'theme_location'  => 'primary',
	'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
	'container'       => 'div',
	'container_class' => 'collapse navbar-collapse',
	'container_id'    => 'navbarResponsive',
	'menu_class'      => 'navbar-nav ml-auto',
	'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
	'walker'          => new WP_Bootstrap_Navwalker(),
) ); ?>
    </nav>
    <!-- Page Header -->
    <?php if(is_single()){ ?>
    <?php 
     $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID) ,'large');?>
    <header class="masthead"
     style="background-image: url('<?php echo $thumb['0'];?>')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1><?php the_title(); ?></h1>
              <span class="meta">Posted by
              <?php the_author(); ?>
                on <?php the_date(); ?></span>
            </div>
          </div>
        </div>
      </div>
    </header>
    <?php }else{?>  
    <header class="masthead" style="background-image: url('<?php echo get_template_directory_uri();?>/img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1><?php bloginfo('email');?></h1>
              <span class="subheading"><?php bloginfo('description');?></span>
            </div>
          </div>
        </div>
      </div>
    </header>
<?php } ?>