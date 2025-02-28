<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
    <style>
        a{
            text-decoration: none;
            border-radius: 2px;
        }

        a:hover{
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <table>
        <?php
            require_once("tabla_controlador.php");
        ?>
    </table>
</body>
</html>