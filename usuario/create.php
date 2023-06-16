<?php
    
    require_once('../db/connection.inc.php');
    require_once('usuario.dao.php');

    $usuarioDAO = new usuarioDAO($pdo);

    $json = file_get_contents('php://input');

    $usuario = json_decode($json);

    $responseBody = "";

    $usuario = $usuarioDAO->insert($usuario);
    $responseBody = json_encode($usuario);

    header("Content-type: application/json");
    print_r($responseBody);

?>