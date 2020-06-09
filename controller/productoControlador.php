
<?php

require_once './models/productoModelo.php';

class producto_controlador extends producto_modelo{
    
    public function MostrarProductosTienda(){
        $productos = new producto_modelo();
        
        $rs = $productos->MostrarProductos();
        return $rs; 

    }
    //ESTE ES MI CONTROLADOR
}
