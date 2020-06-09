<?php

    require_once './models/sesionModelo.php';

    class sesion_controlador extends sesion_modelo{

        public function IniciarSesion(){
            $correo = $_POST['email'];
            $contraseña = connect::encryption($_POST['pass']);
            $datos = [
                'email' => $correo,
                'password' => $contraseña
            ];
            $datosCuenta = sesion_modelo::iniciarSesionModelo($datos);
            if ($datosCuenta->rowCount()==1) {
                $row = $datosCuenta->fetch();
                session_start(['name'=>'el']);
                $_SESSION['usuario_id'] = $row['id'];
                $_SESSION['usuario_el'] = $row['user'];
                $_SESSION['usuario_name'] = $row['name'];
                $_SESSION['usuario_email'] = $row['email'];
                $_SESSION['usuario_direction'] = $row['direction'];
                $_SESSION['tipo_el'] = $row['rol'];
                
                if ($row['rol'] == "admin") {
                    $url = serverURL."agregar/";
                } else{
                    $url = serverURL."home/";
                }

                return $urlLocation = '<script>window.location="'.$url.'"</script>';
            }
        }

        public function cerrarSesion(){
            session_destroy();   
            return header("Location: ".serverURL."login/");     
        }
    }