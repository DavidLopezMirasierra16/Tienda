<?php
    //Siempre que vayamos a trabajar con sesiones tenemos que ponerlo
    session_start();
    
    require_once("../modelos/Usuario.php");

    //Si existe la sesion (ya esta la sesion inciada), llevame a index
    if(isset($_SESSION["usuario"])){
        header("Location: index.php");
    }

    //Para que no nos muestre nada mas abrirlo el mensaje de "faltan datos por rellenar"
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        
        //Comprobamos que los campos no esten vacíos
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            //Guardamos lo que escribimos en el formulario
            $email = $_POST["email"];
            //Utilizamos el hash para que en la base de datos en la que vamos a guardar no se pueda leer
            $pass = hash("sha256",$_POST["password"]);

            $usuario = GestionUsuario::comprobarUsuario($email, $pass);

            //Si me devuelves un usuario, de los datos almacenados en la variable resultado_select de la select de consulta
            if($usuario){
                //Nos está guardando en la sesion que vamos a poder utilizar en todo el proyecto el resultado del objeto que nos devuelve el fetch_object
                $_SESSION["usuario"] = $usuario;
                //Una vez tenga el usuario guardado en la sesion (piensa como está youtube, google, drive etc) que me vaya al index.php
                header("Location: index.php");
                exit;
            }else{
                echo "<div class='alert alert-danger'>Usuario o contraseña incorrectos</div>";
            }

        }else{
            echo "<div class='alert alert-danger'>Faltan datos por rellenar</div>";
        }
    }

?>