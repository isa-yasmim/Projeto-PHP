<?php

    //Abrir
    require_once('../db/connection.inc.php');
    require_once('compra.dao.php');

    //Instanciar
    $compraDAO = new compraDAO($pdo);

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
        $compra = json_decode($json);

        //Update compra bd
        $compra = $compraDAO->update($id, $compra);
        $respondeBody = json_encode($compra);
    }

    header("Content-type: application/json");
    print_r($respondeBody);

?>