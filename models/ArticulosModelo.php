<?php

    include_once './config/database.php';

    class articulos_modelo extends connect{

        protected function verProductosUsuarioModelo($datos){ //arreglo de datos
            $sql = connect::conexion()->prepare("SELECT * FROM pedidos WHERE usuario_id = :id");
            
            $sql->bindParam(":id",$datos);
            $sql->execute();
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $resultado; //retorna
        }

    }