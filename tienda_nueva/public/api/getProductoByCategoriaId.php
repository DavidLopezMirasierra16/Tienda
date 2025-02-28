<?php

    require_once("../../modelos/Productos.php");
    require_once("secure.php");

    $productos = [];

    if(isset($_GET["categoria_id"])){
        $productos = GestionProductos::getProductosByCategoria($_GET["categoria_id"]);
    }else{
        $productos = GestionProductos::getAllProductos();
    }

    echo json_encode($productos);
    BaseDatos::closeConection();

?>