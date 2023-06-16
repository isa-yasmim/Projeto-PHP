<?php

    //Abrir
    require_once('../db/connection.inc.php');
    require_once('usuario.dao.php');

    //Instanciar
    $usuarioDAO = new usuarioDAO($pdo);

    //Resposta
    $respondeBody = "";

    //Obter parametro (id) vindo pela URL da requisicao
    $id = $_REQUEST['id'];

    if (!$id) {
        http_response_code(400);
        $responseBody = '{"message": "ID não informado"}';
    } 
    else {
        //Receber dados
        $json = file_get_contents('php://input');

        //Criar objeto JSON
        $usuario = json_decode($json);

        //Update usuario bd
        $usuario = $usuarioDAO->update($id, $usuario);
        $respondeBody = json_encode($usuario);
    }

    header("Content-type: application/json");
    print_r($respondeBody);

?>