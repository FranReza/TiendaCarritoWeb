<?php
    require_once './config/database.php'; //importar

    class actualizar_modelo extends connect{ //herencia

        protected function ActualizarProductos($datos){ //protected public private
            $sql = connect::conexion()->prepare("UPDATE productos SET name = :name, image = :image, description = :description, price = :price, stock = :stock WHERE id = :id"); 

            $sql->bindParam(":name", $datos['name']); //funcion 
            $sql->bindParam(":image", $datos['image']);
            $sql->bindParam(":description", $datos['description']);
            $sql->bindParam(":price", $datos['price']);
            $sql->bindParam(":stock", $datos['stock']);
            $sql->bindParam(":id", $datos['id']);
            $sql->execute(); //ejecutas
            return $sql; //retornar sql
        }

        protected function TraerDatos($id){
            $sql = connect::conexion()->prepare("SELECT * FROM productos WHERE id = :id");
            $sql->bindParam(":id", $id);
            $sql->execute();
            return $sql;
        }
    }