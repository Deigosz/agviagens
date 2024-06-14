<?php
function conectarBanco()
{
    $db_host = 'localhost';
    $db = 'AgenciaDeViagens';
    $usuario = 'root';
    $senha = '';
    $dsn = "mysql:host=$db_host;dbname=$db;charset=utf8mb4";

    try {
        $pdo = new PDO($dsn, $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo; 
    } catch (PDOException $e) {
        return null; 
    }
}
?>