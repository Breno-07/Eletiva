<?php

function conectarBanco()
{
    $conexao = new PDO("mysql:host=localhost:3306; dbname=AcademiaArtesMarciais", "root", "");
    return $conexao;
}

function adicionarMembro($nome, $idade, $tipoPlano)
{
    try {
        $conexao = conectarBanco();
        $sql = "INSERT INTO Membros (Nome, Idade, TipoPlano) VALUES (:nome, :idade, :tipoPlano)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':idade', $idade);
        $stmt->bindValue(':tipoPlano', $tipoPlano);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function adicionarInstrutor($nome, $especialidade)
{
    try {
        $conexao = conectarBanco();
        $sql = "INSERT INTO Instrutores (Nome, Especialidade) VALUES (:nome, :especialidade)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':especialidade', $especialidade);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function adicionarAula($nome, $horario, $instrutorID)
{
    try {
        $conexao = conectarBanco();
        $sql = "INSERT INTO Aulas (Nome, Horario, InstrutorID) VALUES (:nome, :horario, :instrutorID)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':horario', $horario);
        $stmt->bindValue(':instrutorID', $instrutorID);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function adicionarParticipacao($membroID, $aulaID)
{
    try {
        $conexao = conectarBanco();
        $sql = "INSERT INTO Participacoes (MembroID, AulaID) VALUES (:membroID, :aulaID)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':membroID', $membroID);
        $stmt->bindValue(':aulaID', $aulaID);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function listarMembros()
{
    try {
        $conexao = conectarBanco();
        $sql = "SELECT * FROM Membros";
        return $conexao->query($sql);
    } catch (Exception $e) {
        return 0;
    }
}

function listarInstrutores()
{
    try {
        $conexao = conectarBanco();
        $sql = "SELECT * FROM Instrutores";
        return $conexao->query($sql);
    } catch (Exception $e) {
        return 0;
    }
}

function listarAulas()
{
    try {
        $conexao = conectarBanco();
        $sql = "SELECT * FROM Aulas";
        return $conexao->query($sql);
    } catch (Exception $e) {
        return 0;
    }
}

function listarParticipacoes()
{
    try {
        $conexao = conectarBanco();
        $sql = "SELECT * FROM Participacoes";
        return $conexao->query($sql);
    } catch (Exception $e) {
        return 0;
    }
}

function buscarMembroPorId($id)
{
    try {
        $conexao = conectarBanco();
        $sql = "SELECT * FROM Membros WHERE ID = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        return 0;
    }
}

function buscarInstrutorPorId($id)
{
    try {
        $conexao = conectarBanco();
        $sql = "SELECT * FROM Instrutores WHERE ID = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        return 0;
    }
}

function buscarAulaPorId($id)
{
    try {
        $conexao = conectarBanco();
        $sql = "SELECT * FROM Aulas WHERE ID = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        return 0;
    }
}

function atualizarMembro($id, $nome, $idade, $tipoPlano)
{
    try {
        $conexao = conectarBanco();
        $sql = "UPDATE Membros SET Nome = :nome, Idade = :idade, TipoPlano = :tipoPlano WHERE ID = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':idade', $idade);
        $stmt->bindValue(':tipoPlano', $tipoPlano);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function atualizarInstrutor($id, $nome, $especialidade)
{
    try {
        $conexao = conectarBanco();
        $sql = "UPDATE Instrutores SET Nome = :nome, Especialidade = :especialidade WHERE ID = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':especialidade', $especialidade);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function atualizarAula($id, $nome, $horario, $instrutorID)
{
    try {
        $conexao = conectarBanco();
        $sql = "UPDATE Aulas SET Nome = :nome, Horario = :horario, InstrutorID = :instrutorID WHERE ID = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':horario', $horario);
        $stmt->bindValue(':instrutorID', $instrutorID);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function deletarMembro($id)
{
    try {
        $conexao = conectarBanco();
        $sql = "DELETE FROM Membros WHERE ID = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function deletarInstrutor($id)
{
    try {
        $conexao = conectarBanco();
        $sql = "DELETE FROM Instrutores WHERE ID = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function deletarAula($id)
{
    try {
        $conexao = conectarBanco();
        $sql = "DELETE FROM Aulas WHERE ID = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}

function deletarParticipacao($membroID, $aulaID)
{
    try {
        $conexao = conectarBanco();
        $sql = "DELETE FROM Participacoes WHERE MembroID = :membroID AND AulaID = :aulaID";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':membroID', $membroID);
        $stmt->bindValue(':aulaID', $aulaID);
        return $stmt->execute();
    } catch (Exception $e) {
        return 0;
    }
}
