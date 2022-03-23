<?php
/* Cargar mi hoja de estilos estilos.css de la carpeta css */
add_action( 'wp_enqueue_scripts', 'carga_css' );

function carga_css() {
    wp_register_style( 'mi-css', 	get_stylesheet_directory_uri().'/css/estilos.css' );
    	wp_enqueue_style( 'mi-css' );

}

add_action( 'wp_enqueue_scripts', 'carga_iconos_bootstrap' );
function carga_iconos_bootstrap() {
    wp_register_style( 'iconos-css', "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" );
    	wp_enqueue_style( 'iconos-css' );

}

function custom_excerpt_length( $length ) {
    return 12;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_theme_support( 'post-thumbnails' );

/* Registro de Menú */
function register_my_menu() {
    register_nav_menu('header-menu', 'Header Menu' );
}
    
add_action( 'init', 'register_my_menu' );

function registrar_sidebar(){
    register_sidebar(array(
     'name' => 'Footer izquierda',
     'id' => 'footer-izquierda',
     'description' => 'Descripción de ejemplo',
     'class' => 'sidebar',
     'before_widget' => '<aside id="%1$s" class="widget %2$s">',
     'after_widget' => '</aside>',
     'before_title' => '<h2 class="widget-title">',
     'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => 'Footer centro',
        'id' => 'footer-centro',
        'description' => 'Descripción de ejemplo',
        'class' => 'sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
       ));

       register_sidebar(array(
        'name' => 'Footer derecha',
        'id' => 'footer-derecha',
        'description' => 'Descripción de ejemplo',
        'class' => 'sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
       ));

       register_sidebar(array(
        'name' => 'Aside',
        'id' => 'aside',
        'description' => 'Descripción de ejemplo',
        'class' => 'sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
       ));
  }
  add_action( 'widgets_init', 'registrar_sidebar');
?>