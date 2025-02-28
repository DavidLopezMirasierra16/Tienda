<?php

require_once 'BaseDatos.php';

class GestionPais {

    /**
     * Funcion que nos devuelve todos los paises
     */
    public static function getAllPaisesNoLimit($type_fetch = PDO::FETCH_OBJ){
        $stmt = BaseDatos::getConection()->prepare("SELECT * FROM countries;");
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

    /**
     * Funcion que nos busca el pais en funcion del nombre que nosotros le pasamos
     */
    public static function buscarPorName($name, $type_fetch=PDO::FETCH_OBJ){
        $stmt = BaseDatos::getConection()->prepare("SELECT * FROM countries WHERE name LIKE :name;");

        $name = "%".$name."%";

        $stmt->bindParam(':name', $name);
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

    /**
     * Funcion que nos busca por la Iso2 que nosotros le pasamos
     */
    public static function buscarPorIso2($iso2, $type_fetch=PDO::FETCH_OBJ){
        $stmt = BaseDatos::getConection()->prepare("SELECT * FROM countries WHERE iso2 = :iso2;");
        $stmt->bindParam(':iso2', $iso2);
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

    /**
     * Funcion que nos busca por la Iso3 que nosotros le pasamos
     */
    public static function buscarPorIso3($iso3, $type_fetch=PDO::FETCH_OBJ){
        $stmt = BaseDatos::getConection()->prepare("SELECT * FROM countries WHERE iso3 = :iso3;");
        $stmt->bindParam(':iso3', $iso3);
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

    /**
     * Funcion que nos busca por el id que tenga asignado un pais en la BD
     */
    public static function buscarPorId($id, $type_fetch=PDO::FETCH_OBJ){
        $stmt = BaseDatos::getConection()->prepare("SELECT * FROM countries WHERE id = :id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

    //------------------------------------------------------------------------------------------------

    /**
     * Funcion que nos muestra todos los productos pero con paginacion
     */
    public static function getAllPaises($page, $limit, $type_fetch = PDO::FETCH_OBJ){
        $offset = $page  * $limit; //Cuantos mostrar por pantalla

        $stmt = BaseDatos::getConection()->prepare("SELECT * FROM countries LIMIT :offset ,:limit");
        $stmt->bindParam(":limit", $limit,  PDO::PARAM_INT);
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll($type_fetch);
    }

}

?>