<?php

    require_once("../modelos/Usuario.php");

    //Para que no nos muestre nada mas abrirlo el mensaje de "faltan datos por rellenar"
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        
        //Comprobamos que los campos no esten vacíos
        if(!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['password'])){
            //Guardamos lo que escribimos en el formulario
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            //Utilizamos el hash para que en la base de datos en la que vamos a guardar no se pueda leer
            $pass = hash("sha256",$_POST["password"]);
            $id_rol = $_POST["id_rol"];

            $comprobar = GestionUsuario::comprobarEmail($email);
            
            //Si es null significa que no nos devuelve ningun usuario
            if($comprobar==null){
                //Insertas en la base de datos
                $resultado_insertar = GestionUsuario::insertarUsuarioAministrador($nombre, $email, $pass, $id_rol);
                if($resultado_insertar){
                    echo "<div class='alert alert-success'>Usuario agregado con éxito</div>";    
                }
                
            }else{
                echo "<div class='alert alert-danger'>El correo ya existe</div>";
            }

        }else{
            echo "<div class='alert alert-danger'>Faltan datos por rellenar</div>";
        }
    }

?>