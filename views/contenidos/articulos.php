<?php
    include_once __DIR__.'/../../config/general.php';
    include_once './controller/articulosControlador.php';     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tus articulos - Electronic Laguna</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">    
    <script src="https://kit.fontawesome.com/a84a2e4e6a.js" crossorigin="anonymous"></script>  
    <link rel="stylesheet" href="<?=serverURL?>css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="<?=serverURL?>js/jquery-3.5.1.min.js"></script>
</head>
<body>
    <?php include_once __DIR__.'/../layout/header.php';?>
    <h1>Tus articulos</h1>
    <table style="width: 700px;" class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">nombre usuario</th>
      <th scope="col">nombre producto</th>
      <th scope="col">costo</th>
      <th scope="col">cantidad</th>
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
      <td><?=$row['usuario_id']?></td>
      <td><?=$row['nombre']?></td>
      <td><?=$row['costo']?></td>
      <td><?=$row['cantidad']?></td>
    </tr>
    <?php 
      $cantidad = $cantidad + $row['costo'];
    }?>
  </tbody>
</table>
<img style="width: 300px; height: 75px; margin-bottom: 20px;" src="https://www.paypalobjects.com/marketing/web/mx/logos-buttons/tarjetas.png" alt="Check out with PayPal"/>
<div id="paymentSection">
    <form method="post" id="paymentForm">
      <h4> Total a pagar: $<?=$cantidad?></h4>
        <ul>
            <input type="hidden" name="card_type" id="card_type" value=""/>
            <li>
                <label for="card_number">Numero de tarjeta (<a href="javascript:void(0);" id="sample-numbers-trigger">Prueba uno de estos</a>)</label>
                <div class="numbers" style="display: none;">
                    <p>Try some of these numbers:</p>
                    <ul class="list">
                        <li><a href="javascript:void(0);">4000 0000 0000 0002</a></li>
                        <li><a href="javascript:void(0);">5018 0000 0009</a></li>
                        <li><a href="javascript:void(0);">5100 0000 0000 0008</a></li>
                        <li><a href="javascript:void(0);">6011 0000 0000 0004</a></li>
                    </ul>
                </div>
                <input type="text" placeholder="1234 5678 9012 3456" id="card_number" name="card_number" class="">
                <small class="help">This demo supports Visa, American Express, Maestro, MasterCard and Discover.</small>
            </li>
            <li class="vertical">
                <ul>
                    <li>
                        <label for="expiry_month">Mes de vencimiento</label>
                        <input type="text" placeholder="MM" maxlength="5" id="expiry_month" name="expiry_month">
                    </li>
                    <li>
                        <label for="expiry_year">Año de vencimiento</label>
                        <input type="text" placeholder="YYYY" maxlength="5" id="expiry_year" name="expiry_year">
                    </li>
                    <li>
                        <label for="cvv">CVV</label>
                        <input type="text" placeholder="123" maxlength="3" id="cvv" name="cvv">
                    </li>
                </ul>
            </li>
            <li>
                <label for="name_on_card">Nombre propietario</label>
                <input type="text" placeholder="Codex World" id="name_on_card" name="name_on_card">
            </li>
            <li><input type="button" name="card_submit" id="cardSubmitBtn" value="Verificar" class="payment-btn"></li>
            <p style="color:#27ae60;">Este es un pago con paypal entra de forma segura.</p>
        </ul>
    </form>
</div>
<div id="orderInfo" style="display: none;"></div>
<a href="<?=serverURL?>comprar">
<button type="button" class="btn btn-primary">Realizar Compra</button>
</a>
    <?php include_once __DIR__.'/../layout/footer.php';?>
</body>
</html>