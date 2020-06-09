<?php
    include_once __DIR__.'/../../config/general.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic Laguna - Inicia sesion</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=serverURL?>css/styles.css" type="text/css">
</head>
<body>
    <?php
        include_once __DIR__.'/../layout/header.php';
    ?>
    <div class="container-login">
        <div class="login">
            <h1>Inicia sesion!</h1>
            <form action="" method="POST">
                <label for="email">Correo electronico:</label><br>
                <input type="text" name="email">
                <br>
                <label for="pass">Contraseña:</label><br>
                <input type="password" name="pass">
                <br>
                <input type="submit" value="Iniciar sesion">
            </form>
            <p>No tienes una cuenta? registrate <a href="<?=serverURL?>register/">aqui</a></p>
        </div>
    </div>
    <?php
        include_once __DIR__.'/../layout/footer.php';
        if (isset($_POST['email']) && isset($_POST['pass'])) {
            $correo = $_POST['email'];
            $contraseña = $_POST['pass'];
            require_once './controller/sesionControlador.php';
            $sesion = new sesion_controlador();
            echo $sesion->IniciarSesion();
        }
    ?>
</body>
</html>