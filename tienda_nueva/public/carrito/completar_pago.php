<?php

require_once("../modelos/Carrito.php");
require_once("../modelos/Usuario.php");
global $carro;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST["nombre"]) && !empty($_POST["email"]) && !empty($_POST["direccion"]) && !empty($_POST["tarjeta"])) {
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["email"];
        $direccion = $_POST["direccion"];
        $tarjeta = hash("sha256", $_POST["tarjeta"]);

        //Fecha
        $dia = date("d", time());
        $mes = date("m", time());
        $anio = date("Y", time());
        $fecha = $dia . "/" . $mes . "/" . $anio;

        $precio = $carro->precioTotal();
        $id = $_SESSION["usuario"]->id;

        $resultado = GestionCarrito::comprasBD($id, $fecha, $precio);

        if($resultado==null){

            $mostrar = "<a href='index.php'>Agregado correctamente</a>";
            echo $mostrar;

            $carro->vaciarCarrito();
        }

    }else{
        echo "<div class='error'>Faltan datos por rellenar</div>";
    }
}
