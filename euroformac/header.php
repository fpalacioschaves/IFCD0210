<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <title><?php bloginfo( 'name' ); ?></title>

    <?php wp_head() ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/estilos.css">
    

</head>
<body <?php body_class(); ?>>
    <!-- Comienzo del Header -->
    <header>
        
        <div class="logo">

            <a href="<?php echo home_url(); ?>">

                <img src="<?php echo get_stylesheet_directory_uri();?>/img/logo.jpg">

            </a>
            
        </div>

        <nav class="menu_header_container">
            
            <ul class="menu_header">
                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                <li><a href="#">Quienes Somos</a></li>
                <li><a href="servicios">Servicios</a></li>
                <li><a href="contacto">Contacto</a></li>
                

            </ul>
        </nav>

       

    </header>
    <!--  Fin del Header -->