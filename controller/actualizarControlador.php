<?php
    require_once './models/actualizarModelo.php';

    class actualizar_controlador extends actualizar_modelo{

        public function TraerDatosControlador(){
            $id = $_POST['id'];
            $respuesta = new actualizar_modelo; //creando un objeto de su clase modelo.
            $rs = $respuesta->TraerDatos($id);
            if ($rs->rowCount()==1) {
                return $rs;
            } else {
                return false;
            }
        }
        
        public function ActualizarProductosControlador(){
            $id = $_POST['idpro'];
            $nombre = $_POST['name'];
            $imagen = $_POST['image'];
            $descripcion = $_POST['description'];
            $precio = $_POST['price'];
            $cantidad = $_POST['stock'];

            $datos = [
                'id' => $id,
                'name' => $nombre,
                'image' => $imagen,
                'description' => $descripcion,
                'price' => $precio,
                'stock' => $cantidad
            ];
            $actualizar = new actualizar_modelo();
            $rs = $actualizar->ActualizarProductos($datos);
                
                return $rs;
        }   
    }