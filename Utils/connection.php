<?php

function connectarbanco()
{
    $db_host = 'localhost';
    $db = 'AgenciaDeViagens';
    $usuario = 'root';
    $senha = '';
    $dsn = "mysql:host=$db_host;dbname=$db;charset=utf8mb4";


    try {
        $pdo = new PDO($dsn, $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conexão bem-sucedida!";
    } catch (PDOException $e) {
        //echo "Erro na conexão: " . $e->getMessage();
        exit;
    }

    return $pdo;
}




?>