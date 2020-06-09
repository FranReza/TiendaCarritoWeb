<?php

    include_once './config/database.php';

    class eliminar_modelo extends connect{

        protected function eliminarEquipo($id){
            $sql = connect::conexion()->prepare("DELETE FROM productos WHERE id = :id");
            $sql->bindParam(":id", $id);
            $rs = $sql->execute();
            if ($rs) {
                return true;
            } else {
                return false;
            }
        }
    }