<?php

    // Abrir a conexão
    require_once('../db/connection.inc.php');
    require_once('usuario.dao.php');

    // Insanciar o DAO
    $usuarioDAO = new usuarioDAO($pdo);

    $json = file_get_contents('php://input');
    
    $usuario = json_decode($json);

    $id = $_REQUEST['id'];

    // Conteúdo de resposta para o cliente
    $responseBody = '';

    if(!$id)
    {
        http_response_code(400);
        $responseBody = '{ "message:" "ID não informado"}';
    } else {
        $qtd = $usuarioDAO->delete($id, $usuario);
        if($qtd == 0){
            $responseBody = '{ "message": "ID não existe"}';
        }
    }

    // Inserir o usuário no banco de dados
    $usuario = $usuarioDAO->delete($id, $usuario);
    $responseBody = json_encode($usuario); // Transformar em pessoa JSON

    // Gerar a resposta para o cliente
    header("Content-type: application/json");
    print_r($responseBody);

?>