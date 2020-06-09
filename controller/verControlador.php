<?php

    include_once './models/verModelo.php';

    class ver_controlador extends ver_modelo{

        public function verProductos(){
            $productos = new ver_modelo();
            $rs = $productos->verProductosModelo();
            return $rs;
        }

    }