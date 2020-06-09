<?php
    require_once './controller/vistaControlador.php';

    $vt = new vistas_Controlador();
    $vistasR = $vt->obtener_vistas_controlador();
    if ($vistasR == "login"):
        require_once "./views/contenidos/login.php";
    else:
        session_start(['name'=>'el']);
        require_once './controller/sesionControlador.php';
        $lc = new sesion_controlador();
        if (!isset($_SESSION['usuario_el'])) {
            $lc->cerrarSesion();
        }
        
?>
    <?php
        require_once $vistasR;
    ?>
<?php endif;?>
