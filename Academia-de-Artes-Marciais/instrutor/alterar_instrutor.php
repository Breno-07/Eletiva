<?php
require_once("../header.php");
?>

<h3 class="text-center mb-4">Alterar Instrutor</h3>

<form action="" method="POST">
    <section class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </section>
    <section class="form-group">
        <label for="especialidade">Especialidade</label>
        <input type="text" class="form-control" id="especialidade" name="especialidade" required>
    </section>
    <button type="submit" class="btn btn-primary">Alterar</button>
</form>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once '../funcao.php';
    $instrutor = buscarInstrutorPorId($id);

    if (is_array($instrutor)) {
        echo "<script>document.getElementById('nome').value = '$instrutor[Nome]';</script>";
        echo "<script>document.getElementById('especialidade').value = '$instrutor[Especialidade]';</script>";
    } else {
        echo "Instrutor não encontrado.";
    }
} else {
    echo "ID do instrutor não fornecido.";
}

if ($_POST) {
    $nome = $_POST['nome'];
    $especialidade = $_POST['especialidade'];

    if (empty($nome) || empty($especialidade)) {
        echo "<section class='alert alert-danger mt-3'>Preencha todos os campos!</section>";
    } else {
        if (atualizarInstrutor($id, $nome, $especialidade)) {
            echo "<section class='alert alert-success mt-3'>Instrutor alterado com sucesso!</section>";
            echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 1000);</script>";
        } else {
            echo "<section class='alert alert-danger mt-3'>Erro ao alterar instrutor!</section>";
        }
    }
}

require_once("../footer.php");
?>