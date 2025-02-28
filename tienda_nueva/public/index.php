<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!--Header-->
    <header>
        <?php
        require_once("../vistas/componentes_html/header.php");
        ?>
    </header>
    <div id="texto"></div>
    <!--Aqui mostramos los productos-->
    <div id="mostrar">
        <?php
            require_once("productos_controlador.php");
        ?>
    </div>
    <!--Footer-->
    <footer>
        <?php
        require_once("../vistas/componentes_html/footer.php");
        ?>
    </footer>
</body>
<script>
    const mostrar = document.getElementById("mostrar");
    const numero = document.getElementById("numero");
    const mostrar_texto = document.getElementById("mostrarTexto");
    const bnt_enviar = document.getElementById("enviar");
    const categorias = document.getElementById("categorias");
    const btn_agregar = document.getElementById("carro");

    let token_user = localStorage.getItem("Token");

    document.getElementById("categoria_id").addEventListener("change", (event)=>{
        window.location = "index.php?categoria_id="+event.target.value;
    });

    

</script>

</html>