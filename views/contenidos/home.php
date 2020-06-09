<?php
    include_once __DIR__.'/../../config/general.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic Laguna</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a84a2e4e6a.js" crossorigin="anonymous"></script>  
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="<?=serverURL?>css/styles.css">
</head>
<body>
    <!--Inicio del header-->
    <?php include_once __DIR__.'/../layout/header.php';?>
    <!--fin del header-->
    <!--slider inicio-->
    <div class="slideshow" id="slider-scroll">
        <ul class="slider">
            <li>
                <img style="height: 625px;" src="<?=serverURL?>img/slider-imagen-1.jpg" alt="imagen 1">
                    <section class="caption">
                        <h1>Las mejores computadoras al mejor precio</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, aspernatur! Facere officia recusandae omnis magnam?</p>
                    </section>
            </li>
            <li>
                <img style="height: 625px;" src="<?=serverURL?>img/slider-imagen-2.jpg" alt="imagen 1">
                <section class="caption">
                    <h1>Telefonos de alta calidad y mejor precio</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, aspernatur! Facere officia recusandae omnis magnam?</p>
                </section>
            </li>
            <li>
                <img style="height: 625px;" src="<?=serverURL?>img/slider-imagen-3.jpg" alt="imagen 1">
                <section class="caption">
                    <h1>Alta tecnologia y a mensualidades</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, aspernatur! Facere officia recusandae omnis magnam?</p>
                </section>
            </li>
            <li>
                <img style="height: 625px;" src="<?=serverURL?>img/slider-imagen-4.jpg" alt="imagen 1">
                <section class="caption">
                    <h1>Todo tipo de tecnologia para tu hogar</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, aspernatur! Facere officia recusandae omnis magnam?</p>
                </section>
            </li>
        </ul>
            <ol class="pagination">
            </ol>
            <div class="left">
                <span class="fa fa-chevron-left"></span>
            </div>
            <div class="right">
                <span class="fa fa-chevron-right"></span>
            </div>
    </div>
    <!--slider fin-->
    <!-- #articulo--> 
   
    <article class="articulo" id="article-scroll">
        <img src="<?=serverURL?>img/flayer.JPG" alt="" id="flyer">
        <blockquote>
            <h1>
                El mejor lugar para poder comprar articulos de primera calidad,
                volveria cuantas veces sea para poder estar comprando aqui!
            </h1>
            <br>
            <p>- Andres Manuel Lopez Obrador</p>
            cliente distinguido desde 2010
        </blockquote>
    </article>
    <!-- #articulo -->
    <section class="section-1">
        <h1>Algunos de nuestros productos</h1>
        
    </section>
    <main class="main" id="main-scroll">
        
        <?php
            require_once './controller/productoControlador.php';
            $productos = new producto_controlador();
            $rs_producto = $productos->MostrarProductosTienda();
            foreach ($rs_producto as $fila){?>          
                <div class="card" id="card-scroll">
                    <h4 id="NombreProducto-<?=$fila['id']?>"><?=$fila['name']?></h4>
                        <img src="<?=$fila['image']?>" alt="imagen de producto">
                            <h3>Descripcion</h3>
                            <p><?=$fila['description']?></p>
                        <h4 id="costo-<?=$fila['id']?>"><?=$fila['price']?></h4>
                        <div class="btn">
                    <input type="submit" value="comprar" onclick="obtener(nom = <?=$fila['id']?>, cost = <?=$fila['id']?>);">
                    </div>
                </div>
            <?php }?> 
            
            <script>
                function obtener(nom, cost){
                   var nombre = document.getElementById("NombreProducto-"+nom).innerHTML;
                   var iduser = <?=$_SESSION['usuario_id']?>;
                   var costpro = document.getElementById('costo-'+cost).innerHTML;
                   var cantidad = 1;
                   console.log(nombre);
                   console.log(iduser);
                   console.log(costpro);
                   
                    localStorage.setItem("Nombre", nombre);
                    localStorage.setItem("iduser", iduser);
                    localStorage.setItem("costpro", costpro);
                   
                   $.ajax({
                       url:  '<?=serverURL?>prueba',
                       type: "POST",
                       data: {nombrepost: nombre,
                              iduserpost:iduser,
                              costopost:costpro,
                              cantidadpost:cantidad
                            },
                       success: function (response) {
                           console.log('responde: '+response);
                       }
                    })
                    swal("Listo!", "Se agrego a tu carrito!", "success");
                  }
            </script> 
    </main>
    <section class="banner" id="banner-scroll">
        <img src="<?=serverURL?>img/banner.jpg" alt="imagen promocional" id="banner">
    </section>
    <?php include_once __DIR__.'/../layout/footer.php';?>
    <script src="<?=serverURL?>js/jquery-3.5.1.min.js"></script>
    <script src="<?=serverURL?>js/slider.js"></script>
    <script>
        window.sr = ScrollReveal();
        sr.reveal('#slider-scroll');
        sr.reveal('#article-scroll');
        sr.reveal('#main-scroll');
        sr.reveal('#card-scroll');
        sr.reveal('#banner-scroll');
        sr.reveal('#footer-scroll');

        $(document).ready(function(){
            $("#flyer").mouseover(function(){
                $(this).animate({height:'50px'});
                });
                $("#flyer").mouseout(function(){
                $(this).animate({height:'700px'});
            }); 
        });
        $(document).ready(function(){
            $("#banner").mouseover(function(){
                $(this).animate({height:'150px'});
                });
                $("#banner").mouseout(function(){
                $(this).animate({height:'20em'});
            }); 
        });
    </script>
</body>
</html>   