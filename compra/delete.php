<?php

    // Abrir a conexão
    require_once('../db/connection.inc.php');
    require_once('compra.dao.php');

    // Insanciar o DAO
    $compraDAO = new compraDAO($pdo);

    $json = file_get_contents('php://input');
    
    $compra = json_decode($json);

    $id = $_REQUEST['id'];

    // Conteúdo de resposta para o cliente
    $responseBody = '';

    if(!$id)
    {
        http_response_code(400);
        $responseBody = '{ "message:" "ID não informado"}';
    } else {
        $qtd = $compraDAO->delete($id, $compra);
        if($qtd == 0){
            $responseBody = '{ "message": "ID não existe"}';
        }
    }

    // Inserir o usuário no banco de dados
    $compra = $compraDAO->delete($id, $compra);
    $responseBody = json_encode($compra); // Transformar em pessoa JSON

    // Gerar a resposta para o cliente
    header("Content-type: application/json");
    print_r($responseBody);

?>