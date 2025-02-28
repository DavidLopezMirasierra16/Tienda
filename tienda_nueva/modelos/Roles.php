<?php

    require_once 'env.php';
    require_once("BaseDatos.php");

    class GestionRoles{

        /**
         * Funcion que te devuele todos los roles de la BD
         */
        public static function getAllRoles($type_fetch = PDO::FETCH_ASSOC){
            $stmt = BaseDatos::getConection()->prepare("SELECT id, nombre, descripcion FROM roles");
            $stmt->execute();
            return $stmt->fetchAll($type_fetch);
        }

    }

?>