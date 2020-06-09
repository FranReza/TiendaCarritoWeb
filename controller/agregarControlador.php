<?php
    require_once './models/agregarModelo.php';

    class agregar_controlador extends agregar_modelo{

        public function agregarProducto(){
            $nombre  = $_POST['name']; 
            $imagen = $_POST['img']; 
            $descripcion = $_POST['desc'];
            $precio = $_POST['price'];
            $cantidad = $_POST['stock'];

            $datosAgregar = [
                'name' => $nombre,
                'image' => $imagen,
                'description' => $descripcion,
                'price' => $precio, 
                'stock' => $cantidad
            ];

            $agregar = agregar_modelo::agregarProductos($datosAgregar);
            return $agregar;
        }

        public function agregarCarrito(){
            
        }
    }