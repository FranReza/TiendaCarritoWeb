<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=serverURL?>css/styles.css">
    <script src="<?=serverURL?>js/jsPDF-1.3.2/dist/jspdf.min.js"></script> <!--enlazamos la libreria JSPDF-->
    <script src="<?=serverURL?>js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <title>Comprando</title>
  </head>
  <body>
    <?php include_once __DIR__.'/../layout/header.php';
    include_once './controller/articulosControlador.php'; 
    ?>
    <h1>Pedido Realizado!</h1><br>
    <div id="ticket">          
              <h1>Ticket</h1>
              <h3>Datos del cliente</h3><br>
              <p>ID ursuario: <?=$_SESSION['usuario_id']?></p><br>
              <p>Nombre de usuario: <?=$_SESSION['usuario_el']?></p><br>
              <p>Nombre completo: <?=$_SESSION['usuario_name']?></p><br>
              <p>Correo: <?=$_SESSION['usuario_email']?></p><br>
              <p>Direccion: <?=$_SESSION['usuario_direction']?></p>

              <h3>Articulos comprados:</h3>
              <table style="width: 700px;" class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nompre producto</th>
            <th scope="col">costo</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $cantidad = 0;
          $articulos = new articulos_controlador();
          $rsArticulo = $articulos->verProductosUsuarioPorID();
          foreach ($rsArticulo as $row) {?>
          <tr>
            <th scope="row"><?=$row['id']?></th>
            <td><?=$row['nombre']?></td>
            <td><?=$row['costo']?></td>
          </tr>
          <?php 
          $cantidad = $cantidad + $row['costo'];
          }?>
        </tbody>
      </table>
      <h4>Total: $<?=$cantidad?></h4>
    </div>
    <button type="button" class="btn btn-primary" onclick="generarPDF()">Imprimir Ticket</button>
    <?php include_once __DIR__.'/../layout/footer.php';?>
    <script>
      function generarPDF() {
        var doc = new jsPDF()
          doc.text('Electronic Laguna Todos los derechos reservados 2020', 10, 10)
          doc.fromHTML($('#ticket').get(0),15,15)
          doc.save('Ticket.pdf')

          Swal.fire({
          icon: 'success',
          title: 'Impreso con exito!',
          footer: '<a href>Revisa tus descargas para ver tu ticket</a>'
    })
      }
    </script>
  </body>
</html>