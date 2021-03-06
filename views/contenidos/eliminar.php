<?php
    include_once __DIR__.'/../../config/general.php';
    include_once './controller/eliminarControlador.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin - Electronic</title>
  <!-- Bootstrap core CSS -->
  <link href="<?=serverURL?>css/css-admin/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="<?=serverURL?>css/css-admin/sidebar.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Sistema Administrador </div>
      <div class="list-group list-group-flush">
        <a href="<?=serverURL?>agregar/" class="list-group-item list-group-item-action bg-light">Agregar nuevo equipo</a>
        <a href="<?=serverURL?>actualizar/" class="list-group-item list-group-item-action bg-light">Actualizar nuevo equipo</a>
        <a href="<?=serverURL?>eliminar/" class="list-group-item list-group-item-action bg-light">Eliminar equipo</a>
        <a href="<?=serverURL?>ver/" class="list-group-item list-group-item-action bg-light">Ver equipos</a>
        <a href="<?=serverURL?>estadisticas/" class="list-group-item list-group-item-action bg-light">Estadisticas</a>
        <a href="<?=serverURL?>tickets/" class="list-group-item list-group-item-action bg-light">Tickets</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Menu</button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#"><?php if (isset($_SESSION['usuario_el'])) { echo $_SESSION['usuario_el'];} else {echo 'Nombre!';}?><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Cerrar sesion</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container-fluid">
            <h1>Eliminar equipo</h1>
            <form action="" method="POST">
                <label for="id">ID del equipo</label><br>
                <input type="text" name="id">
                <input type="submit" value="eliminar">                
            </form>
            <?php
              if (isset($_POST['id'])) {
                $Id = $_POST['id'];
                $eliminar = new eliminar_controlador();
                $respuesta = $eliminar->eliminarEquipoID($Id);
                if ($respuesta) {
                  echo "<script>
                    Swal.fire({
                    icon: 'success',
                    title: 'Borrado con exito',
                    text: 'Revise en el apartado de ver equipos',
                    footer: '<a href>si tiene problemas contacte con el administrador</a>'
                    })
                      </script>";
                } else {
                  echo "<script>
                    Swal.fire({
                    icon: 'error',
                    title: 'No se pudo borrar',
                    text: 'Revise en el apartado de ver equipos',
                    footer: '<a href>si tiene problemas contacte con el administrador</a>'
                  })
                    </script>";
                }
              }
            ?>
      </div>
    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->
  <!-- Bootstrap core JavaScript -->
  <script src="<?=serverURL?>js/jquery.min.js"></script>
  <script src="<?=serverURL?>js/bootstrap.bundle.min.js"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</body>
</html>
