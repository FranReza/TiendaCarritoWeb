<?php

    include_once './models/ArticulosModelo.php';

    class articulos_controlador extends articulos_modelo{

        public function verProductosUsuarioPorID(){
            $id = $_SESSION['usuario_id'];
            $verProductos = new articulos_modelo();
            $rs = $verProductos->verProductosUsuarioModelo($id);
            return $rs;
        }

    }