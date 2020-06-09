<?php

    require_once './models/registroModelo.php';

    class registro_controlador extends registro_modelo{

        public function registrarse(){

                $usuario = $_POST['user'];
                $nombre = $_POST['name'];
                $correo = $_POST['email'];
                $contraseña = connect::encryption($_POST['pass']);
                $direccion = $_POST['direction'];
                
            $datosregistro = [
                'user' => $usuario,
                'name' => $nombre,
                'email' => $correo,
                'password' => $contraseña,
                'direction' => $direccion,
                'rol' => 'user'
            ];
            $registro = registro_modelo::registrar($datosregistro);
            return $registro;
            
        }
    }