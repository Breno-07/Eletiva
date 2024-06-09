CREATE DATABASE AcademiaArtesMarciais;
use AcademiaArtesMarciais;

-- Tabela de Membros
CREATE TABLE Membros (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100),
    Idade INT,
    TipoPlano VARCHAR(50)
);

-- Tabela de Instrutores
CREATE TABLE Instrutores (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100),
    Especialidade VARCHAR(100)
);

-- Tabela de Aulas
CREATE TABLE Aulas (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100),
    Horario DATETIME,
    InstrutorID INT,
    FOREIGN KEY (InstrutorID) REFERENCES Instrutores(ID)
);

-- Tabela de Participações
CREATE TABLE Participacoes (
    MembroID INT,
    AulaID INT,
    PRIMARY KEY (MembroID, AulaID),
    FOREIGN KEY (MembroID) REFERENCES Membros(ID),
    FOREIGN KEY (AulaID) REFERENCES Aulas(ID)
);
