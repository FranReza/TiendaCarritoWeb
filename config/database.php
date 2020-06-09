<?php

include_once './config/general.php';

class connect{ //clase connect
    
    protected function conexion(){ //metodo llamado conexion
        $server = "localhost"; //servidor que nuestro local host
        $user = "root"; //usuario root
        $pass = ""; // contraseña 
        $db = "db_electronic"; //la base de datos a la que vamos a acceder
        
        try { //existen 2 objetos, Mysqli y PDO 
            $conn = new PDO("mysql:host=".$server.";dbname=".$db, $user, $pass);  

            if ($conn) {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        } catch (PDOException $ex) {
            echo 'MENSAJE DE QUE ESTA MAL'. $ex->getMessage();
        }
    }

    public function agregar_cuenta($datos){
        $sql = self::conexion()->prepare("INSERT INTO usuarios(user, name, email, password, direction, rol) VALUES (:user, :name, :email, :pass, :direction, :rol)");
        $sql->bindParam(":user", $datos['user']);
        $sql->bindParam(":name", $datos['name']);
        $sql->bindParam(":email", $datos['email']);
        $sql->bindParam(":pass", $datos['pass']);
        $sql->bindParam(":direction", $datos['direction']);
        $sql->bindParam(":rol", $datos['rol']);
        $sql->execute();
        return  $sql;
    }

    public function encryption($string){ //encriptar contraseña
        $output = false;
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV),0,16);
        $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }

    protected function decryption($string){ //desencryptar
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }
}