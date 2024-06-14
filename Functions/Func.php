<?php
require_once("../Utils/connection.php");




function cadastrarUsuario($conn, $nome, $email, $telefone) {
    try {
        $sql = "INSERT INTO Tbl_Clientes (Nome, Telefone, Email) VALUES (:nome, :telefone, :email)";
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        return "Erro ao cadastrar usuário: " . $e->getMessage();
    }
}
