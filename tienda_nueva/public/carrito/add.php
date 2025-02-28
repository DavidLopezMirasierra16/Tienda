<?php
    //Esta trabajando con la sesion dentro de añadirCarrito
    session_start();
    require_once("../../modelos/Carrito.php");

    $producto = $_GET["id"];

    if(isset($producto)){
        $carro->añadirCarrito($producto);
        header("Location: ../index.php");
    }

?>