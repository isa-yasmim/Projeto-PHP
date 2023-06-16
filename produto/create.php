<?php
    
    require_once('../db/connection.inc.php');
    require_once('produto.dao.php');

    $produtoDAO = new produtoDAO($pdo);

    $json = file_get_contents('php://input');

    $produto = json_decode($json);

    $responseBody = "";

    $produto = $produtoDAO->insert($produto);
    $responseBody = json_encode($produto);

    header("Content-type: application/json");
    print_r($responseBody);

?>