<?php

    require_once 'env.php';
    require_once 'BaseDatos.php';

    class GestionUsuario{

        /**
         * -----------------------------------------------------INSERTAR---------------------------------------------------
         */

        /**
         * Nos inserta un usuario en la base de datos
         */
        public static function insertarUsuarioAministrador($nombre, $email, $pass, $id_rol, $type_fetch = PDO::FETCH_OBJ){
            $stmt = BaseDatos::getConection()->prepare("INSERT INTO usuarios (`nombre`, `email`, `password`, `rol_id`) VALUES (:nombre, :email, :pass, :id_rol)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':pass', $pass);
            $stmt->bindParam(':id_rol', $id_rol);
            $stmt->execute();
            return $stmt->fetchAll($type_fetch);
        }

        /**
         * Funcion que te crea un usuario
         */
        public static function insertarUsuario($nombre, $email, $pass, $type_fetch = PDO::FETCH_OBJ){
            $stmt = BaseDatos::getConection()->prepare("INSERT INTO usuarios (`nombre`, `email`, `password`, `rol_id`) VALUES (:nombre, :email, :pass, 3)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();
            return $stmt->fetchAll($type_fetch);
        }

        /**
         * -----------------------------------------------------ELIMINAR-----------------------------------------------------
         */

        /**
         * Funcion que nos elimina un usuario de la BD con el id que nosotros le pasamos
         */
        public static function eliminarUsuario($id, $type_fetch = PDO::FETCH_OBJ){
            $stmt = BaseDatos::getConection()->prepare("DELETE FROM usuarios WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll($type_fetch);
        }

        /**
         * -----------------------------------------------------CONSULTAS-----------------------------------------------------
         */

        /**
         * Funcion que nos devuelve todos los usuarios
         */
        public static function getAllUsuarios($type_fetch = PDO::FETCH_OBJ){
            $stmt = BaseDatos::getConection()->prepare("SELECT * FROM usuarios");
            $stmt->execute();
            return $stmt->fetchAll($type_fetch);
        }

        /**
         * Funcion que nos devuelve el usuario con un rol_id en concreto
         */
        public static function getUsuariosByRolId($id_rol, $type_fetch = PDO::FETCH_OBJ){
            $stmt = BaseDatos::getConection()->prepare("SELECT * FROM usuarios WHERE rol_id = :id_rol");
            $stmt->bindParam(':rol_id', $id_rol);
            $stmt->execute();
            return $stmt->fetchAll($type_fetch);
        }

        /**
         * -----------------------------------------------------COMPROBACIONES-----------------------------------------------
         */
        
        /**
         * Funcion que nos comprueba si un email ya esta registrado
         */
        public static function comprobarEmail($email, $type_fetch = PDO::FETCH_OBJ){
            $stmt = BaseDatos::getConection()->prepare("SELECT id FROM tienda_php2.usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetchAll($type_fetch);
        }


        /**
         * Funcion que comprueba si un usuario está registrado
         */
        public static function comprobarUsuario($email, $pass, $type_fetch = PDO::FETCH_OBJ){
            $stmt = BaseDatos::getConection()->prepare("SELECT * FROM usuarios WHERE email = :email AND password = :pass");
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();
            return $stmt->fetch($type_fetch);
        }

    }

?>