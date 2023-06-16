<?php

    //Abrir
    require_once('../db/connection.inc.php');
    require_once('produto.dao.php');

    //Instanciar
    $produtoDAO = new produtoDAO($pdo);

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
        $produto = json_decode($json);

        //Update produto bd
        $produto = $produtoDAO->update($id, $produto);
        $respondeBody = json_encode($produto);
    }

    header("Content-type: application/json");
    print_r($respondeBody);

?>