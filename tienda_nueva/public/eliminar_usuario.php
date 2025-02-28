<?php

    require_once("../modelos/Usuario.php");

    if($_SERVER["REQUEST_METHOD"]== "GET"){

        $id_eliminar = $_GET["id"];

        $eliminar = GestionUsuario::eliminarUsuario($id_eliminar);

        header("Location: tabla_usuarios.php");
    }

?>