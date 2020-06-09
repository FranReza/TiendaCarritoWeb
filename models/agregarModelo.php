<?php
    include_once './config/database.php';

    class agregar_modelo extends connect{

        protected function agregarProductos($datos){
            $sql = connect::conexion()->prepare("INSERT INTO productos(name, image, description, price, stock) VALUES(:name, :image, :description, :price, :stock)");

            $sql->bindParam(':name', $datos['name']);
            $sql->bindParam(':image', $datos['image']);
            $sql->bindParam(':description', $datos['description']);
            $sql->bindParam(':price', $datos['price']);
            $sql->bindParam(':stock', $datos['stock']);
            
            $sql->execute();
            return $sql;
        }
    }