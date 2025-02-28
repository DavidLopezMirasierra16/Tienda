<?php

    require_once("../modelos/Usuario.php");

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        if(!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['password'])){
            //Guardamos lo que escribimos en el formulario
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            //Utilizamos el hash para que en la base de datos en la que vamos a guardar no se pueda leer
            $pass = hash("sha256",$_POST["password"]);

            $comprobar = GestionUsuario::comprobarEmail($email);

            if($comprobar==null){

                $resultado = GestionUsuario::insertarUsuario($nombre, $email, $pass);

                echo "<div class='alert alert-success'>Usuario agregado con éxito</div>";    
                /*if($resultado){
                    echo "bien";
                }*/

            }else{
                echo "<div class='alert alert-danger'>El correo ya existe</div>";
            }

        }else{
            echo "<div class='alert alert-danger'>Faltan datos por rellenar</div>";
        }

    }

?>