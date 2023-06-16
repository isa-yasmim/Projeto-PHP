<?php

    $servername = 'localhost';
    $port = 3306;
    $username = 'root';
    $password = '';
    $dbname = 'db_projeto_api';

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);

?>