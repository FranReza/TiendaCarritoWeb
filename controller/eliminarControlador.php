<?php

    include_once './models/eliminarModelo.php';

    class eliminar_controlador extends eliminar_modelo{

        public function eliminarEquipoID($id){
            $respuesta = new eliminar_modelo();
            $resultado = $respuesta->eliminarEquipo($id);
            return $resultado;          
        }
    }