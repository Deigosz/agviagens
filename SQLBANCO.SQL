CREATE DATABASE AgenciaDeViagens;
USE AgenciaDeViagens;


-- Criação da tabela de Clientes
CREATE TABLE Tbl_Clientes (
    Id_Cliente INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100) NOT NULL,
    Telefone VARCHAR(20) NOT NULL,
    Email VARCHAR(100) NOT NULL
);

-- Criação da tabela de Pacotes de Viagem
CREATE TABLE Tbl_PacotesViagens(
	Id_Pacote INT AUTO_INCREMENT PRIMARY KEY,
    Destino VARCHAR(100) NOT NULL,
    Preco DECIMAL(10, 2) NOT NULL,
    Duracao INT NOT NULL
);

-- Criar a tabela de Reservas
CREATE TABLE Tbl_Reservas (
    Id_Reserva INT AUTO_INCREMENT PRIMARY KEY,
    Id_Cliente INT NOT NULL,
    Id_Pacote INT NOT NULL,
    Data_Reserva DATE NOT NULL,
    FOREIGN KEY (Id_Cliente) REFERENCES Tbl_Clientes(Id_Cliente),
    FOREIGN KEY (Id_Pacote) REFERENCES Tbl_PacotesViagens(Id_Pacote)
);

-- Criar a tabela de Pagamentos
CREATE TABLE Tbl_Pagamentos (
    Id_Pagamento INT AUTO_INCREMENT PRIMARY KEY,
    Id_Reserva INT NOT NULL,
    Valor_Pago DECIMAL(10, 2) NOT NULL,
    Data_Pagamento DATE NOT NULL,
    FOREIGN KEY (Id_Reserva) REFERENCES Tbl_Reservas(Id_Reserva)
);

