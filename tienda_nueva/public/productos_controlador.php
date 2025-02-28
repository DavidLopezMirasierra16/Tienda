<?php
    require_once("../modelos/Productos.php");

    $productos = [];
    if(isset($_GET["categoria_id"])){
        $productos=GestionProductos::getElementNombreByCategoria($_GET["categoria_id"]);
    }else if(isset($_GET["nombre"])){
        $productos=GestionProductos::getElementByNombre($_GET["nombre"]);
    }else{
        $productos=GestionProductos::getAllProductos();
    }

    foreach ($productos as $key => $producto) {
        GestionProductos::pintarProducto($producto);
    }

?>