<?php

    require_once('../db/connection.inc.php');
    require_once('categoria.dao.php');

    $categoriaDAO = new categoriaDAO($pdo);

    //Buscar as pessoas no banco de dados
    $categoria = $categoriaDAO->getAll();

    $responseBody = json_encode($categoria);

    header('Content-type: application/json');
    print_r($responseBody);

?>