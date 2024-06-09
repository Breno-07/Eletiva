<?php
require_once("../header.php");
?>

<h3 class="text-center mb-4">Alterar Aula</h3>

<form action="" method="POST">
    <section class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </section>
    <section class="form-group">
        <label for="horario">Horário</label>
        <input type="datetime-local" class="form-control" id="horario" name="horario" required>
    </section>
    <section class="form-group">
        <label for="instrutor">Instrutor</label>
        <select class="form-control" id="instrutor" name="instrutor" required>
            <option value="">Selecione um instrutor</option>
            <?php
            $linhas = listarInstrutores();
            while ($l = $linhas->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <option value="<?= $l['ID'] ?>"><?= $l['Nome'] ?></option>
            <?php
            }
            ?>
        </select>
    </section>

    <button type="submit" class="btn btn-primary">Alterar</button>
</form>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once '../funcao.php';
    $aula = buscarAulaPorId($id);

    if (is_array($aula)) {
        echo "<script>document.getElementById('nome').value = '$aula[Nome]';</script>";
        echo "<script>document.getElementById('horario').value = '$aula[Horario]';</script>";
        echo "<script>document.getElementById('instrutor').value = '$aula[InstrutorID]';</script>";
    } else {
        echo "Aula não encontrada.";
    }
} else {
    echo "ID da aula não fornecida.";
}

if ($_POST) {
    $nome = $_POST['nome'];
    $horario = $_POST['horario'];
    $instrutor = $_POST['instrutor'];

    if (empty($nome) || empty($horario) || empty($instrutor)) {
        echo "<section class='alert alert-danger mt-3'>Preencha todos os campos!</section>";
    } else {
        if (atualizarAula($id, $nome, $horario, $instrutor)) {
            echo "<section class='alert alert-success mt-3'>Aula alterada com sucesso!</section>";
            echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 1000);</script>";
        } else {
            echo "<section class='alert alert-danger mt-3'>Erro ao alterar aula!</section>";
        }
    }
}

require_once("../footer.php");
?>