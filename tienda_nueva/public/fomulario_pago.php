<?php
session_start();
require_once("../modelos/Carrito.php");
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
}
//print_r($_SESSION["usuario"]);
//print_r($_SESSION["carrito"]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>
    <link rel="stylesheet" href="../public/assets/css/pago.css">
</head>

<body>
    <?php require_once("../public/carrito/completar_pago.php") ?>
    <form action="" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $_SESSION["usuario"]->nombre ?>">

        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="<?php echo $_SESSION["usuario"]->email ?>">

        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" id="direccion">

        <label for="tarjeta">Tarjeta</label>
        <input type="text" name="tarjeta" id="tarjeta">

        <div>
            <h3>Precio Total: <?php global $carro; echo $carro->precioTotal(); ?></h3>
        </div>

        <input type="submit" value="Confirmar Pedido">
    </form>
</body>

</html>