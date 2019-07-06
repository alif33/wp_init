<?php
add_action('after_setup_theme' , 'first_wp');

function first_wp(){
    add_theme_support('post-formats');
} 
?>