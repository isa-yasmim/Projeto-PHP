<?php

    require_once('../db/connection.inc.php');
    require_once('produto.dao.php');

    $produtoDAO = new produtoDAO($pdo);

    //Buscar as pessoas no banco de dados
    $produto = $produtoDAO->getAll();

    $responseBody = json_encode($produto);

    header('Content-type: application/json');
    print_r($responseBody);

?>