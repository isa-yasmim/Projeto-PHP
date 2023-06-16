<?php

    //Abrir
    require_once('../db/connection.inc.php');
    require_once('categoria.dao.php');

    //Instanciar
    $categoriaDAO = new categoriaDAO($pdo);

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
        $categoria = json_decode($json);

        //Update categoria bd
        $categoria = $categoriaDAO->update($id, $categoria);
        $respondeBody = json_encode($categoria);
    }

    header("Content-type: application/json");
    print_r($respondeBody);

?>