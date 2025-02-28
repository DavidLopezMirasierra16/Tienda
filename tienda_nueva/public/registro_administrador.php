<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        div{
            width: 200px;
            margin: auto;
            text-align: center;
        }
        
        input, label{
            display: inherit;
            margin: auto;
            margin-bottom: 2%;
        }
        select{
            margin-top: 5%;
            margin-bottom: 5%;
        }
    </style>
</head>
<body>
    <div>
        <?php require_once("../controladores/registro_usuario_administrador.php")?>
        <form method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre">

            <label for="email">Email</label>
            <input type="text" name="email">

            <label for="password">Contraseña</label>
            <input type="text" name="password"> 
            
            <select name="id_rol" id="">
                <?php require_once("../controladores/roles_section.php")?>
            </select>

            <input type="submit" value="Enviar">
            <a href="login.php">Inicia sesion</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>