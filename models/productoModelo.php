
<?php

    require_once './config/database.php';

    class producto_modelo extends connect{
        //esta heredando no creo que sea el protected

        protected function MostrarProductos(){
            $sql = connect::conexion()->query("SELECT * FROM productos");
            $sql->execute();
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC); //me dijeron que hiciera algo asi EL FETCH ASSOC Y TAMBIEN EL OBJ
            //esta algo extraño todo.
            return $resultado;
        }
        //ESTE ES MI MODELO
    }
