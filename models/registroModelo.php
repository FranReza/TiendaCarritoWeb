<?php
    require_once './config/database.php';

    class registro_modelo extends connect{
        
        protected function registrar($datos)
        {
        $sql = connect::conexion()->prepare("INSERT INTO usuarios(user, name, email, password, direction, rol) VALUES(:user, :name, :email, :password, :direction, :rol)");
            
        $sql->bindParam(':user', $datos['user']); //remplaza
        $sql->bindParam(':name', $datos['name']);
        $sql->bindParam(':email', $datos['email']);
        $sql->bindParam(':password', $datos['password']);
        $sql->bindParam(':direction', $datos['direction']);
        $sql->bindParam(':rol', $datos['rol']);
        $sql->execute();
        return $sql;
    }
}
?>