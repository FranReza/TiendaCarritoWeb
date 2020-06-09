<?php

    include_once './config/database.php';

    class ver_modelo extends connect{

        protected function verProductosModelo(){
            $sql = connect::conexion()->query("SELECT * FROM productos");
            $sql->execute();
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC); //
            return $resultado;
        }

    }