<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/carrito.css">
</head>
<body>
    <header>
        <?php require_once("../vistas/componentes_html/header_pagos.php") ?>
    </header>
    <div>
        <?php require_once("carrito_principal.php") ?>
    </div>
    <footer>
        <?php require_once("../vistas/componentes_html/footer.php") ?>
    </footer>
</body>
</html>