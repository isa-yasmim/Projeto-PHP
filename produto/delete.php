<?php

    // Abrir a conexão
    require_once('../db/connection.inc.php');
    require_once('produto.dao.php');

    // Insanciar o DAO
    $produtoDAO = new produtoDAO($pdo);

    $json = file_get_contents('php://input');
    
    $produto = json_decode($json);

    $id = $_REQUEST['id'];

    // Conteúdo de resposta para o cliente
    $responseBody = '';

    if(!$id)
    {
        http_response_code(400);
        $responseBody = '{ "message:" "ID não informado"}';
    } else {
        $qtd = $produtoDAO->delete($id, $produto);
        if($qtd == 0){
            $responseBody = '{ "message": "ID não existe"}';
        }
    }

    // Inserir o usuário no banco de dados
    $produto = $produtoDAO->delete($id, $produto);
    $responseBody = json_encode($produto); // Transformar em pessoa JSON

    // Gerar a resposta para o cliente
    header("Content-type: application/json");
    print_r($responseBody);

?>