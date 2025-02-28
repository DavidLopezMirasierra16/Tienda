<?php

    require_once("../../modelos/Productos.php");
    require_once("secure.php");

    $productos = [];

    if(isset($_GET["categoria_id"]) && isset($_GET["nombre"])){
        $productos = GestionProductos::getElementNombreByCategoria($_GET["categoria_id"]);
    }else{
        $productos = GestionProductos::getAllProductos();
    }

    echo json_encode($productos);
    BaseDatos::closeConection();

?>