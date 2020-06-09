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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="<?=serverURL?>js/registro-validacion.js"></script>
</head>
<body>
<?php
        include_once __DIR__.'/../layout/header.php';
    ?>
    <div class="container-register">
        <div class="register">
            <h1>Registrate</h1>
            <form action="" method="POST" onsubmit="return validar();">
                <label for="user">Nombre de usuario:</label><br>
                <input type="text" name="user" id="nombre">
                <br>
                <label for="name">Nombre:</label><br>
                <input type="text" name="name">
                <br>
                <label for="email">Correo electronico:</label><br>
                <input type="text" name="email" id="correo">
                <br>
                <label for="pass">Contraseña:</label><br>
                <input type="password" name="pass" id="contraseña">
                <br>
                <label for="direction">Direccion:</label><br>
                <input type="text" name="direction" id="">
                <br>
                <input type="submit" value="Registrate">
            </form>
            <p>Ya tienes una cuenta? Inicia sesion <a href="<?=serverURL?>views/contenidos/login.php">aqui</a></p>
        </div>
    </div>
    <script>
        function validar() {
            var nombre, correo, contraseña; 
            var expresionNombre = /^[A-Za-z_][A-Za-z\d_]*$/;
            var expresioncorreo = /\w+@\w+\.+[a-z]/;
            var expresioncontraseña = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/ ;

            nombre = document.getElementById("nombre").value;
            correo = document.getElementById('correo').value;
            contraseña = document.getElementById('contraseña').value;

            if (nombre == "" || correo == "" || contraseña == "") {
                alert("Todos los campos son requeridos.");
                return false;
            } 

            if (!expresionNombre.test(nombre)) {
                alert("El nombre que intentas agregar no es valido");
                return false;
            } 

            if (!expresioncorreo.test(correo)) {
                alert("El correo que intentas agregar no es valido");
                return false;
            }
            
            if (!expresioncontraseña.test(contraseña)) {
                alert("La contraseña que intentas agregar no es valido");
                return false;
            } 
    //La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula. NO puede tener otros símbolos.        
}
    </script>
    <?php
        include_once __DIR__.'/../layout/footer.php';
        if (isset($_POST['user']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['direction'])) {
                require_once './controller/registroControlador.php';
                $registro = new registro_controlador();
                $rs = $registro->registrarse();
                if ($rs) {
                    echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Registrado con exito!',
                        footer: '<a href>Inicia sesion para continuar!</a>'
                      })
                        </script>";
                } else {
                    echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'No pudiste registrarte',
                        footer: '<a href>Ocurrio un error inesperado...</a>'
                      })
                        </script>";
                }
        }
    ?>
</body>
</html>