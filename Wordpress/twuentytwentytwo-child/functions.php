<?php

function my_theme_enqueue_styles() {

    wp_enqueue_style( 
        'parent-style', 
        get_template_directory_uri() . '/style.css' 
    );
    //(get_template_directory_uri() siempre se refiere al padre)

   wp_enqueue_style( 
        'child-style', 
        get_stylesheet_directory_uri() . '/style.css', 
        array('parent-style' ), 
        wp_get_theme()->get('Version')
    );
//	/(get_stylesheet_directory_uri() se refiere siempre al tema hijo)

}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
/**
 * Load translations for wpdocs_theme
 */
$domain = 'twuentytwentytwo-child';
load_theme_textdomain( $domain, get_stylesheet_directory() . '/languages' );

}
?>