<footer>
        
        <!--<div class="footer1">
            <nav>
                <ul class="menu_secundario">
                    <li><a href="#">Política de Privacidad</a></li>
                    <li><a href="#">Aviso Legal</a></li>
                    <li><a href="#">Política de Cookies</a></li>
                </ul>
            </nav>

        </div>

        <div class="footer2">
            <p>Avenida De Mi Casa, 34 - 29013 - Málaga</p>
            <p>666-66-66-66</p>
            <p>micorreo@miempresa.com</p>

        </div>

        <div class="footer3">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
        </div>
        -->

        <?php if ( is_active_sidebar( 'footer-izquierda' ) ) : ?>
         <div id="widget-area" class="widget-area">
            <?php dynamic_sidebar( 'footer-izquierda' ); ?>
         </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'footer-centro' ) ) : ?>
         <div id="widget-area" class="widget-area">
            <?php dynamic_sidebar( 'footer-centro' ); ?>
         </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'footer-derecha' ) ) : ?>
         <div id="widget-area" class="widget-area">
            <?php dynamic_sidebar( 'footer-derecha' ); ?>
         </div>
        <?php endif; ?>

    </footer>

    <?php wp_footer() ?>
    
</body>
</html>