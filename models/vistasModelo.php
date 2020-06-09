<?php
    class vistas_Modelo{
        protected function obtener_vistas_modelo($vistas){
            $listaBlanca = ['actualizar', 'agregar', 'eliminar', 'estadisticas', 
                            'home', 'login', 'register', 'tickets', 'ver', 'acercade','articulos', 'comprar', 'prueba'];
                            
            if (in_array($vistas, $listaBlanca)) {
                if (is_file("./views/contenidos/".$vistas.".php")) {
                    $contenido = "./views/contenidos/".$vistas.".php";  
                } else {
                    $contenido = "login";
                }
            } else if($vistas == "login"){
                $contenido = "contenido";
            } else if($vistas == "index"){
                $contenido = "login";
            } else {
                $contenido = "login";
            }
            return $contenido;
        }    
  }
    