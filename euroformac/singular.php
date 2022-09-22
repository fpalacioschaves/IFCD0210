
   <?php get_header();?>

<!-- Inicio Parte central -->
<div class="container">

    <!-- Inicio Parte izquierda -->
    <div class="izquierda">

    
    <!-- Inicio del Loop -->
    <section>
    <?php

        if ( have_posts() ) :
                while ( have_posts() ) : the_post();   
                ?>


            <h1><?php the_title();?></h1>

            <p class="contenido_single"><?php the_content();?></p>


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