<?php
    require_once './config/database.php';
    
    class sesion_modelo extends connect{
        
        protected function iniciarSesionModelo($datos){
            $sql = connect::conexion()->prepare("SELECT * FROM usuarios WHERE email=:email AND password=:pass");
            $sql->bindParam(":email", $datos['email']);
            $sql->bindParam(":pass", $datos['password']);
            $sql->execute();
            return $sql;
        }
    }