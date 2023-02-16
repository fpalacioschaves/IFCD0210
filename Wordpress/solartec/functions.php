<?php
// Soporte del tema
add_theme_support("post-thumbnails");
add_theme_support("menus");
add_theme_support("widgets");


function registrar_sidebar(){

    register_sidebar(array(
     'name' => 'Sidebar Footer 1',
     'id' => 'sidebar-footer-1',
     'description' => '1ª columna del footer',
     'class' => 'sidebar',
     'before_widget' => '<aside id="%1$s" class="widget %2$s">',
     'after_widget' => '</aside>',
     'before_title' => '<h5 class="text-white mb-4">',
     'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => 'Sidebar Footer 2',
        'id' => 'sidebar-footer-2',
        'description' => '2ª columna del footer',
        'class' => 'sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="text-white mb-4">',
        'after_title' => '</h5>',
       ));

       register_sidebar(array(
        'name' => 'Sidebar Footer 3',
        'id' => 'sidebar-footer-3',
        'description' => '3ª columna del footer',
        'class' => 'sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="text-white mb-4">',
        'after_title' => '</h5>',
       ));

       register_sidebar(array(
        'name' => 'Sidebar Footer 4',
        'id' => 'sidebar-footer-4',
        'description' => '4ª columna del footer',
        'class' => 'sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="text-white mb-4">',
        'after_title' => '</h5>',
       ));
  }
  add_action( 'widgets_init', 'registrar_sidebar');
?>