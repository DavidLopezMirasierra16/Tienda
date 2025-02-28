<?php

    require_once("../modelos/Usuario.php");

    echo "<tr>
        <td>ID</td>
        <td>Nombre</td>
        <td>Email</td>
        <td>Rol_ID</td>
        <td>Fecha de alta</td>
        </tr>";

    foreach (GestionUsuario::getAllUsuarios() as $key => $usuario) {
        echo "<tr>" .
            "<td>" . $usuario->id . "</td>" .
            "<td>" . $usuario->nombre . "</td>" .
            "<td>" . $usuario->email . "</td>" .
            "<td>" . $usuario->rol_id . "</td>" .
            "<td>" . $usuario->fecha_registro . "</td>" .
            "<td><a href='eliminar_usuario.php?id=".$usuario->id."'>Eliminar</a></td>"
            . "</tr>";
    }
?>