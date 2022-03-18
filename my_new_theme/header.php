<!DOCTYPE html>
<!-- IDIOMA DEL SITE -->
<html <?php language_attributes(); ?>>

<head>
    <!-- CHARSET-->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <!-- NOMBRE DEL SITIO -->
    <title><?php bloginfo( 'name' ); ?></title>
    <?php wp_head(); ?>
</head>
<!-- Añade clases al body -->
<body <?php body_class(); ?>>
<div class="container">
<header class="site-header">
    <div class="titulo" style="width: 50%; float: left;">
        <h1><a href="<?php echo home_url();?>"><?php bloginfo( 'name' ); ?></a></h1>
        <h4><?php bloginfo( 'description' ); ?></h4>
    </div>

    <div class="menu_header" style="width: 50%; float: left;">
    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </div>
    
</header>
