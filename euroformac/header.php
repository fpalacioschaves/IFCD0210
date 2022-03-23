<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <title><?php bloginfo( 'name' ); ?></title>
    <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>

    <header>
        
        <div class="logo">
            <a href="<?php echo home_url();?>">
                <img src="<?php echo get_stylesheet_directory_uri();?>/img/logo.jpg">
            </a>

        </div>

        <nav class="menu_header_container">

        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
            
            <!--<ul class="menu_header">
                <li><a href="#">Home</a></li>
                <li><a href="#">Quienes Somos</a></li>
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Contacto</a></li>
                

            </ul>-->
        </nav>

    </header>