<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    require_once("../../modelos/Paises.php");

    $data = [];

    if(isset($_GET["name"])){
        $data = GestionPais::buscarPorName($_GET["name"]);
    }else if(isset($_GET["iso2"])){
        $data = GestionPais::buscarPorIso2($_GET["iso2"]);
    }else if(isset($_GET["iso3"])){
        $data = GestionPais::buscarPorIso3($_GET["iso3"]);
    }else if(isset($_GET["id"])){
        $data = GestionPais::buscarPorId($_GET["id"]);
    }else if(isset($_GET["page"]) || isset($_GET["limit"])){
        $data = GestionPais::getAllPaises($_GET["page"], $_GET["limit"]);
    }else{
        $data = GestionPais::getAllPaisesNoLimit();
    }

    if(!$data){
        echo json_encode([
            "success" => false,
            "data" => null,
            "message" => "Descripcion del error"
        ]);
    }else{
        echo json_encode([
            "success" => true,
            "data" => $data,
            "message" => "Datos obtenidos exitosamente"
        ]);
    }

?>