<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
sleep(1);
    require_once("../../modelos/Estados.php");

    $data = [];

    if(isset($_GET["country_id"])){
        $data = GestionEstados::buscarCountryId($_GET["country_id"]);
    }else if(isset($_GET["name"])){
        $data = GestionEstados::buscarCountryPorName($_GET["name"]);
    }else if(isset($_GET["country_code"])){
        $data = GestionEstados::buscarPorCountryCode($_GET["country_code"]);
    }else if(isset($_GET["id"])){
        $data = GestionEstados::buscarPorId($_GET["id"]);
    }else if(isset($_GET["page"]) || isset($_GET["limit"])){
        $data = GestionEstados::getAllEstados($_GET["page"], $_GET["limit"]);
    }else{
        $data = GestionEstados::getAllEstadosNoLimit();
    }

    if(!$data){
        echo json_encode([
            "success" => false,
            "data" => null,
            "message" => "Error en el envio"
        ]);
    }else{
        echo json_encode([
            "success" => true,
            "data" => $data,
            "message" => "Datos obtenidos exitosamente"
        ]);
    }

?>