<header class="row">
        <div class="col-2">
            <img class="logo" src="./img/logo.png" alt="logo" title="logo">
        </div>
        <div class="col-8">
           <ul class="menu_superior">
               <li class="menu_sup_item">
                   <a href="index.php">Inicio</a>
                </li>
               <li class="menu_sup_item">
                    <a href="">Tienda</a>
               </li>
               <li class="menu_sup_item">
                    <a href="">Nosotros</a>
               </li>
               <li class="menu_sup_item">
                    <a href="">Contacto</a>
               </li>
               <li class="menu_sup_item">
                    <a href="login.php">Login</a>
               </li>
            </ul>
        </div>
        <div class="col-2 login">
            <i class="bi bi-person-workspace"></i>
            <p>Hola, <?php echo $_SESSION["usuario"];?></p>
        </div>
    </header>