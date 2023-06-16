<?php
    
    require_once('../db/connection.inc.php');
    require_once('categoria.dao.php');

    $categoriaDAO = new categoriaDAO($pdo);

    $json = file_get_contents('php://input');

    $categoria = json_decode($json);

    $responseBody = "";

    $categoria = $categoriaDAO->insert($categoria);
    $responseBody = json_encode($categoria);

    header("Content-type: application/json");
    print_r($responseBody);

?>