<div id="sidebar">
    <div class="inner">

        <!-- Search -->
        <section id="search" class="alt">
            <form  
            id="search" 
            method="get" 
            action="<?php echo esc_url( home_url( '/' ) ); ?>"
            >
                <input 
                type="text" 
                name="s" 
                id="query" 
                placeholder="Buscar" 
                value="<?php echo get_search_query(); ?>"
                />
            </form>




        </section>

        <!-- Menu -->
        <nav id="menu">
            <header class="major">
                <h2>Menu</h2>
            </header>
            <ul>
                <li><a href="<?php echo home_url(); ?>">Inicio</a></li>
                <li><a href="contacto">Contacto</a></li>


            </ul>
        </nav>

        <!-- Section -->
        <section>
            <header class="major">
                <h2>Ante interdum</h2>
            </header>
            <div class="mini-posts">
                <article>
                    <a href="#" class="image"><img src="<?php echo get_template_directory_uri(); ?>/images/pic02.jpg" alt="" /></a>
                    <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
                </article>
                <article>
                    <a href="#" class="image"><img src="<?php echo get_template_directory_uri(); ?>/images/pic03.jpg" alt="" /></a>
                    <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
                </article>
                <article>
                    <a href="#" class="image"><img src="<?php echo get_template_directory_uri(); ?>/images/pic04.jpg" alt="" /></a>
                    <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
                </article>
            </div>
            <ul class="actions">
                <li><a href="#" class="button">More</a></li>
            </ul>
        </section>

        <?php get_footer(); ?>

    </div>
</div>