<?php
require_once("../Utils/connection.php");

/*Viagens */
function cadastrarUsuario($conn, $nome, $email, $telefone, $senha) {
    try {

        $sql = "SELECT COUNT(*) FROM Tbl_Clientes WHERE Email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            return "Erro: Email já cadastrado.";
        }

        $sql = "INSERT INTO Tbl_Clientes (Nome, Telefone, Email, Senha) VALUES (:nome, :telefone, :email, :senha)";
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':senha', $telefone);
        
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        return "Erro ao cadastrar usuário: " . $e->getMessage();
    }
}

function listarClientes($conn) {
    try {
        $sql = "SELECT Id_Cliente, Nome, Email, Telefone FROM Tbl_Clientes";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clientes;
    } catch (PDOException $e) {
        echo "Erro ao listar clientes: " . $e->getMessage();
        return [];
    }
}

function buscarClientePorId($conn, $id_cliente) {
    try {
        $sql = "SELECT * FROM Tbl_Clientes WHERE Id_Cliente = :id_cliente";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
        return $cliente;
    } catch (PDOException $e) {
        echo "Erro ao buscar cliente: " . $e->getMessage();
        return false;
    }
}


function atualizarCliente($conn, $id_cliente, $nome, $email, $telefone) {
    try {
        $sql = "UPDATE Tbl_Clientes SET Nome = :nome, Email = :email, Telefone = :telefone WHERE Id_Cliente = :id_cliente";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Erro ao atualizar cliente: " . $e->getMessage();
        return false;
    }
}


function removerCliente($conn, $id_cliente) {
    try {
        $sql = "DELETE FROM Tbl_Clientes WHERE Id_Cliente = :id_cliente";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Erro ao remover cliente: " . $e->getMessage();
        return false;
    }
}




/*Viagens */
function cadastrarViagem($conn, $destino, $preco, $duracao) {
    try {
        $sql = "INSERT INTO tbl_pacotesviagens (Destino, Preco, Duracao) VALUES (:destino, :preco, :duracao)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':destino', $destino);
        $stmt->bindParam(':preco', $preco);  
        $stmt->bindParam(':duracao', $duracao);      
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        return "Erro ao cadastrar viagem: " . $e->getMessage();
    }
}

function listarViagens($conn) {
    try {
        $sql = "SELECT * FROM tbl_pacotesviagens";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $viagens = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $viagens;
    } catch (PDOException $e) {
        return "Erro ao listar viagens: " . $e->getMessage();
    }
}

function removerViagem($conn, $id_viagem) {
    try {
        $sql = "DELETE FROM tbl_pacotesviagens WHERE Id_Pacote = :id_viagem";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_viagem', $id_viagem);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return "Erro ao remover viagem: " . $e->getMessage();
    }
}

function atualizarViagem($conn, $id_pacote, $destino, $preco, $duracao) {
    try {
        $sql = "UPDATE tbl_pacotesviagens SET Destino = :destino, Preco = :preco, Duracao = :duracao WHERE Id_Pacote = :id_pacote";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_pacote', $id_pacote);
        $stmt->bindParam(':destino', $destino);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':duracao', $duracao);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return "Erro ao atualizar viagem: " . $e->getMessage();
    }
}

function buscarViagemPorId($conn, $id_pacote) {
    try {
        $sql = "SELECT * FROM tbl_pacotesviagens WHERE Id_Pacote = :id_pacote";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_pacote', $id_pacote);
        $stmt->execute();
        $viagem = $stmt->fetch(PDO::FETCH_ASSOC);
        return $viagem;
    } catch (PDOException $e) {
        return "Erro ao buscar viagem: " . $e->getMessage();
    }
}



