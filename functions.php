<?php
//include bootsrap_nav_walker
require_once get_template_directory() . '/lib/class-wp-bootstrap-navwalker.php';

add_action('after_setup_theme' , 'first_wp');

function first_wp(){
    add_theme_support('post-formats', array( 'aside', 'gallery','audio','video'));
    add_theme_support('post-thumbnails');
    add_theme_support( 'custom-logo',  array(
        'height'      => 50,
        'width'       => 100,
        'flex-width' => false   
        ));
    add_theme_support( 'custom-header',$dlt);
    $dlt = array(
        'header-text'     => true,
	'default-text-color'  => '#fff'
    );   
} 
function first_wp_enqueue(){
    wp_enqueue_style('bootsrap', get_template_directory_uri().'/vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri().'/vendor/fontawesome-free/css/all.min.css');
    wp_enqueue_style('custom', get_template_directory_uri().'/css/clean-blog.min.css');
    wp_enqueue_style('fonts-lora', '//fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic');
    wp_enqueue_style('fonts-open_sans', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800');
    wp_enqueue_style('core', get_stylesheet_uri());
    //js script enqueue
    wp_enqueue_script('bootsrap' , get_template_directory_uri().'/vendor/bootstrap/js/bootstrap.bundle.min.js' , array('jquery') , 2.0,true);
    wp_enqueue_script('customs' , get_template_directory_uri().'/js/clean-blog.min.js' , array('jquery') , 1.0,true);
//No necessary enqueue of jQuery.min.js
}
add_action('wp_enqueue_scripts' , 'first_wp_enqueue');
//Register nav Menu
register_nav_menus( array(
	'primary' => __( 'Header', 'wp_init' ),
));

function first_wp_custom_header(){
    if(current_theme_supports('custom-header')){
?>
<?php if( is_home()){ ?>
<style>
.masthead{ 
  background-image: url('<?php header_image(); ?>')!important; 
}
}
</style> 
<?php } ?>  
<style>
.default-title{
    color: #<?php echo get_header_textcolor();?>;
    <?php 
    if(!display_header_text()){ 
    echo "display:none;";
    }
    ?>
}
</style>
<?php }}
add_action('wp_head' , 'first_wp_custom_header');

//Start settings api....
add_action('admin_init','code4webs_theme_options');
 function code4webs_theme_options(){
//registerd a section under settings gereral 
    add_settings_section( 'theme-option', 'Footer options', 'cb_footer_option_section', 'general' ); 
//registered a filed under footer settins option 
add_settings_field('twitter_social', 'Enter your Twitter URl', 'twitter_option_callBack' , 'general' ,'theme-option');
add_settings_field('facebook_social', 'Enter your facebook URl', 'facebook_option_callBack' , 'general' ,'theme-option');
add_settings_field('github_social', 'Enter your github profile link', 'github_option_callBack' , 'general' ,'theme-option');
add_settings_field('copy_right', 'Enter your Copyright text', 'copyright_option_callBack' , 'general' ,'theme-option');
 register_setting('general','twitter_social');
 register_setting('general','facebook_social');
 register_setting('general','github_social');
 register_setting('general','copy_right');
}
function cb_footer_option_section () {
    echo "Please enter Data for your Footer option";
    }
function twitter_option_callBack(){ ?>
 <input type="text" class="regular-text" name="twitter_social" value="<?php echo get_option('twitter_social');?>" id="tw-url" > 
 <?php }
 function facebook_option_callBack(){ ?>
 <input type="text" class="regular-text" name="facebook_social" value="<?php echo get_option('facebook_social');?>" id="fb-url" > 
 <?php }
 function github_option_callBack(){ ?>
 <input type="text" class="regular-text" name="github_social" value="<?php echo get_option('github_social');?>" id="gb-url" > 
 <?php }
 function copyright_option_callBack(){ ?>
<input type="text" class="regular-text" name="copy_right" value="<?php echo get_option('copy_right');?>" id="cp-url" > 
<?php }?> 
<?php
//custom postype 
add_action('init', 'code4webs_testimonials'); 
function code4webs_testimonials(){
register_post_type('code4webs_postype', array(
'labels'=>array(
'name' => 'Smile',
'add_new' =>'New smile',
'add_new_item'  =>'New smile testimonials',
'singular_name' => 'Testimonial',
'edit_item' =>'Edit smile'   ),
'description' =>'Please add your Testimonials',
'menu_icon' => 'dashicons-admin-settings',
'menu_position'  => 5,
'public'=>true,
'show_in_menu' => true,
'supports' =>array('title','editor','author')
));
}