<?php

    require_once './config/database.php';

    if (isset($_POST['nombrepost']) && isset($_POST['iduserpost']) && isset($_POST['costopost']) && isset($_POST['cantidadpost'])) {
    
    var_dump($_POST['nombrepost']);
    var_dump($_POST['iduserpost']);
    var_dump($_POST['costopost']);
    var_dump($_POST['cantidadpost']);
    echo '</br>';  
    echo $_SESSION['nombre'] = $_POST['nombrepost'];
    echo $_SESSION['id'] =  $_POST['iduserpost'];
    echo $_SESSION['costo'] = $_POST['costopost'];
    echo $_SESSION['cantidad'] = $_POST['cantidadpost'];
    echo '</br>';
    var_dump($_SESSION['nombre']);
    var_dump($_SESSION['id']);
    var_dump($_SESSION['costo']);
    var_dump($_SESSION['cantidad']);
    echo '</br>';
    var_dump($name = $_SESSION['nombre']); 
    var_dump($id = $_SESSION['id']);
    var_dump($cost = $_SESSION['costo']);
    var_dump($cant = $_SESSION['cantidad']);
    echo '</br>';
    $con = new PDO("mysql:host=localhost".";dbname=db_electronic", "root", "");
    var_dump($sql = $con->prepare("INSERT INTO pedidos(usuario_id, nombre, costo, cantidad) VALUES(:usuario_id, :nombre, :costo, :cantidad)"));

    $sql->bindParam(':usuario_id', $id);
    $sql->bindParam(':nombre', $name);
    $sql->bindParam(':costo',$cost);
    $sql->bindParam(':cantidad',$cant);

    var_dump($sql->execute());
    if ($sql) {
        echo '</br>debio ingresarse';
    }

    } else {
        echo 'no se envia nada';
    }