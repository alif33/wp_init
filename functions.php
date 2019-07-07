<?php
add_action('after_setup_theme' , 'first_wp');

function first_wp(){
    add_theme_support('post-formats', array( 'aside', 'gallery','audio','video'));
    add_theme_support('post-thumbnails');
} 
add_action('wp_enqueue_scripts' , 'first_wp_enqueue');
function first_wp_enqueue(){
    wp_enqueue_style('bootsrap', get_template_directory_uri().'/vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('custom', get_template_directory_uri().'/css/clean-blog.min.css');
}
?>