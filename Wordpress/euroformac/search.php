
   <?php get_header();?>

<!-- Inicio Parte central -->
<div class="container">

    <!-- Inicio Parte izquierda -->
    <div class="izquierda">

    <h1>Resultados de la búsqueda: <?php echo get_search_query(); ?></h1>
    <!-- Inicio del Loop -->
    <?php
        global $wp_query; // objeto que guarda los resultados de cualquier consulta de Wp
        $encontrados = $wp_query->found_posts; // atributo que almacena el número de resultados
        ?>
        <p>Hemos encontrado <?php echo $encontrados;?> resultados de su búsqueda:</p>
    <section class="contenido">
    <?php
        if ( have_posts() ) :
           ?>
             <?php   while ( have_posts() ) : the_post();
                $contenido = get_the_content();
                $extracto = substr($contenido, 0, 100);
                ?>

            <article>
                <div class="imagen" style="background-image: url('<?php echo get_stylesheet_directory_uri();?>/img/card_image.jpg');"></div>

                <div class="titulo"><?php the_title() ?></div>

                <div class="contenido_article">
                <?php echo $extracto; ?>...
                </div>

                <div class="leer_mas">
                    <a href="<?php the_permalink();?>">Leer más</a>
                </div>
            </article>

                    <h2><?php //the_title() ?></h2>
                    <?php //the_content() ?>

                <?php endwhile;

        else :
                echo '<p>There are no posts!</p>';

        endif;

    ?>
    </section>
    <!-- Fin del Loop -->

    </div>
    <!-- Fin Parte izquierda -->

    <!-- Inicio Aside -->
    <aside>
        <div class="aside_block">
        <h2>Buscar:</h2>
        <?php get_search_form();?>
    </div>

    
        <div class="aside_block">
            
            <h2>Los más visitados</h2>
            <ul class="aside_list">
                <li>
                    Item 1
                </li>

                <li>
                    Item 2
                </li>

                <li>
                    Item 3
                </li>

                <li>
                    Item 4
                </li>

                <li>
                    Item 5
                </li>
            </ul>
        </div>
    </aside>
    <!-- Fin Aside -->

</div>
 <!-- Fin Parte central -->

 <?php get_footer();?>

