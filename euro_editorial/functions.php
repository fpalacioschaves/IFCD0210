<?php
// Soporte del tema
add_theme_support("post-thumbnails");

add_theme_support("menus");





// Carga de css
function carga_estilo() {
    wp_register_style( 'mi-css', get_template_directory_uri().'/assets/css/main.css' );
    wp_enqueue_style( 'mi-css' );

}

add_action( 'wp_enqueue_scripts', 'carga_estilo' );

?>