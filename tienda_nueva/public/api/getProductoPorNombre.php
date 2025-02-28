<?php

    require_once("../../modelos/Productos.php");
    //require_once("secure.php");

    $productos = [];

    if(isset($_GET["nombre"])){
        $productos = GestionProductos::getElementByNombre($_GET["nombre"]);
    }else{
        $productos = GestionProductos::getAllProductos();
    }

    echo json_encode($productos);
    BaseDatos::closeConection();

?>