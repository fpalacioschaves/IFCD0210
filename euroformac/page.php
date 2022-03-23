<?php get_header(); ?>

    <div class="container">

        <div class="izquierda">

            

            <section class="contenido">

                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); ?>
                
               <!-- <article> -->
                    <!--<div class="imagen" style="background-image: url('./img/card_image.jpg');"></div>-->
                    <h1><?php the_title();?></h1>
                
                    <div class="contenido_single">
                        <?php the_content();?>
                    </div>

               <!-- </article> -->
                    
                    <?php endwhile;
                
                else :
                    echo '<p>There are no posts!</p>';
                
                endif;


                ?>

                

            </section>

        </div>

    
        <aside>
            <div class="aside_block">
            <?php if ( is_active_sidebar( 'aside' ) ) : ?>
         <div id="widget-area" class="widget-area">
            <?php dynamic_sidebar( 'aside' ); ?>
         </div>
        <?php endif; ?>
            </div>
        </aside>

    </div>

 <?php get_footer();?>