<?php

require_once 'BaseDatos.php';

class GestionEstados {

    /**
     * Funcion que nos devuelve todos los estados
     */
    public static function getAllEstadosNoLimit($type_fetch = PDO::FETCH_OBJ)
    {
        $stmt = BaseDatos::getConection()->prepare("SELECT * FROM states;");
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

    /**
     * Funcion que nos devuelve un estado en funcion de su country_id
     */
    public static function buscarCountryId($country_id, $type_fetch = PDO::FETCH_OBJ)
    {
        $stmt = BaseDatos::getConection()->prepare("SELECT * FROM states WHERE country_id = :country_id;");
        $stmt->bindParam(':country_id', $country_id);
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

    /**
     * Funcion que nos devuelve un estado en funcion de su nombre
     */
    public static function buscarCountryPorName($name, $type_fetch = PDO::FETCH_OBJ)
    {
        $stmt = BaseDatos::getConection()->prepare("SELECT * FROM states WHERE name = :name;");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

    /**
     * Funcion que nos devuelve un estado en funcion de su country_code
     */
    public static function buscarPorCountryCode($country_code, $type_fetch = PDO::FETCH_OBJ)
    {
        $stmt = BaseDatos::getConection()->prepare("SELECT * FROM states WHERE country_code = :country_code;");
        $stmt->bindParam(':country_code', $country_code);
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

    /**
     * Funcion que nos busca por el id que tenga asignado un pais en la BD
     */
    public static function buscarPorId($id, $type_fetch = PDO::FETCH_OBJ)
    {
        $stmt = BaseDatos::getConection()->prepare("SELECT * FROM states WHERE id = :id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

    /**
     * Funcion que nos muestra todos los productos pero con paginacion
     */
    public static function getAllEstados($page, $limit, $type_fetch = PDO::FETCH_OBJ){
        $offset = $page  * $limit; //Cuantos mostrar por pantalla

        $stmt = BaseDatos::getConection()->prepare("SELECT * FROM states LIMIT :offset ,:limit");
        $stmt->bindParam(":limit", $limit,  PDO::PARAM_INT);
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

}
