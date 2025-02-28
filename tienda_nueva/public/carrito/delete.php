<?php
    session_start();
    require_once("../../modelos/Carrito.php");

    $producto = $_GET["id"];

    if(isset($producto)){
        $carro->eliminarProducto($producto);
        header("Location: ../index.php");
    }

?>