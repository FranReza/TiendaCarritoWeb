<?php
    include_once __DIR__.'/../../config/general.php';
?>
<header class="header">
        <div class="header-logo">
            <a href="<?=serverURL?>home/">
            <img style="width: 200px;" src="<?=serverURL?>/img/logo.png" alt="Logotipo_tienda">
            </a>
        </div>
        <div class="options-header">
            <a href="#"><?php if (isset($_SESSION['usuario_el'])) { echo $_SESSION['usuario_el'];} else {echo 'Nombre!';}?>
            </a>
            <a href="<?=serverURL?>acercade">Acerca de</a>
            <a href="<?=serverURL?>articulos">Tus articulos</a>
            <a href="<?=serverURL?>login">Iniciar sesion</a>
            <a href="<?=serverURL?>register">Registrate</a>
            <div class="options-header-buy">
            <img style="height: 70px; width: 70px;" src="<?=serverURL?>img/carrito.png" alt="imagen_carrito">
            <a href="#"></a>
            </div>
            <a href="<?=serverURL?>comprar">
            <img style="height: 50px;" src="<?=serverURL?>/img/bnt_comprar.png" alt="">
            </a>
        </div>
    </header>