<?php

// Función que añade style.css del raiz
function custom_theme_assets() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}

// add_action(que quiero hacer, quien va a hacerlo)
add_action( 'wp_enqueue_scripts', 'custom_theme_assets' );


/* Añadir un nuevo archivo css */
add_action( 'wp_enqueue_scripts', 'carga_css_externo' );

function carga_css_externo() {
    wp_register_style( 'mi-estilo-css',get_stylesheet_directory_uri().'/assets/css/estilos.css' );
    wp_enqueue_style( 'mi-estilo-css' );

}

/* Añadir css de Bootstrap al proyecto */
add_action("wp_enqueue_scripts", "carga_css_bootstrap");

function carga_css_bootstrap(){
    wp_register_style( 'bootstrap-css',get_stylesheet_directory_uri().'/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap-css' );
}

/* Añadir bootstrap js al proyecto */
add_action( 'wp_enqueue_scripts', 'carga_bootstrap_js');

function carga_bootstrap_js(){
    wp_enqueue_script( 'bootstrap_js', 
    get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', 
    array('jquery'), 
    '4.1.3', 
    true); 
}

/* Registro de Menú */
function register_my_menu() {
    register_nav_menu('header-menu', 'Header Menu' );
}
    
add_action( 'init', 'register_my_menu' );

function registrar_sidebar(){
    register_sidebar(array(
     'name' => 'Sidebar de ejemplo',
     'id' => 'sidebar-ejemplo',
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