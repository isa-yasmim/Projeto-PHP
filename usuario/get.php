<?php

    require_once('../db/connection.inc.php');
    require_once('usuario.dao.php');

    $usuarioDAO = new usuarioDAO($pdo);

    //Buscar as pessoas no banco de dados
    $usuario = $usuarioDAO->getAll();

    $responseBody = json_encode($usuario);

    header('Content-type: application/json');
    print_r($responseBody);

?>