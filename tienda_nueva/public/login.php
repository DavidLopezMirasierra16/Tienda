<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            div{
                width: 300px;
                margin: auto;
                text-align: center;
                padding: 1%;
                border: 2px solid black;
                border-radius: 5px;
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
    <h5 class="text-center mb-4">Accede a nuestra <a href="index.php">Tienda</a></h5>
    <div>
        <?php require_once("../controladores/login_usuario.php")?>
        <h4>INICIO DE SESION</h4>
        <form method="post">

            <label for="email">Email</label>
            <input type="text" name="email" id="email">

            <label for="password">Contraseña</label>
            <input type="text" name="password" id="password"> 

            <input type="submit" value="Enviar" id="enviar">

            <br>
            <p>¿No tienes cuenta? Háztela!!!</p>
            <a href="registro_usuarios.php">Registro</a>
        </form>
    </div> 
</body>
<script>
    const email_input = document.getElementById("email");
    const contraseña_input = document.getElementById("password");
    const btn_enviar = document.getElementById("enviar");

    /*btn_enviar.addEventListener("click", ()=>{
        //Hacemos el preventDefault para que se genere el token
        event.preventDefault();
        let usuario = {
            email: email_input.value,
            password: contraseña_input.value
        }

        fetch("http://localhost/Servidor/tienda_nueva/public/api/login_token.php", {
            method: "POST",
            body: JSON.stringify(usuario),
        }).then(response=>{
            return response.json();
        }).then(objeto_json=>{
            localStorage.setItem("Token", objeto_json.token);
            //Cuando genere el token nos manda a la index.php
            if (objeto_json.user){
                window.location="index.php";
            }
        }).catch((error)=>{
            console.log("Error"+error);
        })

    })*/

</script>
</html>