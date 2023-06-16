<?php

    require_once('../db/connection.inc.php');
    require_once('compra.dao.php');

    $compraDAO = new compraDAO($pdo);

    //Buscar as pessoas no banco de dados
    $compra = $compraDAO->getAll();

    $responseBody = json_encode($compra);

    header('Content-type: application/json');
    print_r($responseBody);

?>