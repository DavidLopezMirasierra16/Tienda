<?php
    require_once("../modelos/Roles.php");
    
    foreach (GestionRoles::getAllRoles() as $key => $value) {
        echo "<option value='".$value["id"]."'>".$value["nombre"]."</option>";
    }
    
?>