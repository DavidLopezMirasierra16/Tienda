<?php

require_once 'BaseDatos.php';

class GestionCiudades{

    /**
     * Funcion que nos devuelve todas las ciudades
     */
    public static function getAllCiudadesNoLimit($type_fetch = PDO::FETCH_OBJ){
        $stmt = BaseDatos::getConection()->prepare("SELECT * FROM cities;");
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

    /**
     * Funcion que nos busca una ciudad por el ID del estado al que pertenece
     */
    public static function buscarCityPorStateId($state_id, $type_fetch = PDO::FETCH_OBJ){
        $stmt = BaseDatos::getConection()->prepare("SELECT * FROM cities WHERE state_id = :state_id");
        $stmt->bindParam(':state_id', $state_id);
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

    /**
     * Funcion que nos busca una ciudad por su nombre
     */
    public static function buscarCityPorName($name, $type_fetch = PDO::FETCH_OBJ){
        $stmt = BaseDatos::getConection()->prepare("SELECT * FROM cities WHERE name = :name");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

    /**
     * Funcion que nos busca una ciudad por el código ID del pais
     */
    public static function buscarCityPorCountryID($country_id, $type_fetch = PDO::FETCH_OBJ){
        $stmt = BaseDatos::getConection()->prepare("SELECT * FROM cities WHERE country_id = :country_id");
        $stmt->bindParam(':country_id', $country_id);
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

    /**
     * Funcion que nos busca una ciudad en funcion de su ID
     */
    public static function buscarCityPorId($id, $type_fetch = PDO::FETCH_OBJ){
        $stmt = BaseDatos::getConection()->prepare("SELECT * FROM cities WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

    /**
     * Funcion que nos muestra todos los productos pero con paginacion
     */
    public static function getAllCiudades($page, $limit, $type_fetch = PDO::FETCH_OBJ){
        $offset = $page  * $limit; //Cuantos mostrar por pantalla

        $stmt = BaseDatos::getConection()->prepare("SELECT * FROM cities LIMIT :offset ,:limit");
        $stmt->bindParam(":limit", $limit,  PDO::PARAM_INT);
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

}

?>