<?php get_header(); ?>

    <div class="container">

        <div class="izquierda">

            <h1>Blog</h1>

            <section class="contenido">

                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); ?>
                
                <article>
                    <!--<div class="imagen" style="background-image: url('./img/card_image.jpg');"></div>-->
                    <div class="imagen">
                        <?php the_post_thumbnail();?>
                    </div>

                    <div class="titulo"><?php the_title();?></div>

                    <div class="contenido_article">
                        <?php the_excerpt();?>
                    </div>

                    <div class="leer_mas">
                        <a href="<?php the_permalink();?>">Leer más</a>
                    </div>
                </article>
                    
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