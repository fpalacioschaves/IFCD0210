<?php
// La cabecera
get_header();

if ( have_posts() ):
    while ( have_posts() ) : the_post(); ?>

        <article class="post">
            <h2>
                <a href="<?php the_permalink();?>"><?php the_title();?></a>
            </h2>
            <?php the_content(); ?>
        </article>
    <?php endwhile;

else :
    echo '<p>There are no posts!</p>';
endif;

// El footer
get_footer();
?>