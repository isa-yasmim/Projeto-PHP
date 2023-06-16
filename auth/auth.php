<?php

    require_once('../lib/jwtutil.inc.php');
    require_once('config.php');
    //receber JSON do cliente
    $json = file_get_contents('php://input');

    //transformar JSON em objeto php
    $credentials = json_decode($json);

    $responseBody = '';

    if($credentials->username == 'admin' && 
    $credentials->password == 'admin'){
        print_r('credenciais válidas');

        $payload = [
            "id" => 1,
            "username" => $credentials->username,
            "role" => "admin"
        ];

        $token = jwtutil::encode($payload, JWT_SECRET_KEY);
        
        $responseBody = '{"token": "'.$token.'"}';
    }
    else{
        http_response_code(401);
        $responseBody = '{"error": "invalid credentials"}';
    }

    print_r($responseBody); 

?>