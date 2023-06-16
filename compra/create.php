<?php
    
    require_once('../db/connection.inc.php');
    require_once('compra.dao.php');

    $compraDAO = new compraDAO($pdo);

    $json = file_get_contents('php://input');

    $compra = json_decode($json);
    $compra->data = date("Y-m-d");

    $responseBody = "";


    $compra = $compraDAO->insert($compra);
    $responseBody = json_encode($compra);

    header("Content-type: application/json");
    print_r($responseBody);

?>