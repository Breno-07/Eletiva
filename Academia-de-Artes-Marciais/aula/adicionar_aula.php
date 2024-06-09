<?php
require_once ("../header.php");
?>

<h3 class="text-center mb-4">Adicionar Aula</h3>

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
    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>
    
<?php
/*Esta linha verifica se há dados enviados via método POST. 
    Se houver, o código dentro deste bloco será executado. */
if ($_POST) {
    $nome = $_POST['nome'];
    $horario = $_POST['horario'];
    $instrutor = $_POST['instrutor'];

    /*Aqui, os dados enviados através do formulário HTML são recuperados e atribuídos a variáveis locais.
     Esses dados são esperados para serem o nome da aula, o horário e o instrutor.*/
    if ($nome == "" || $horario == "" || $instrutor == "") {
        echo "<section class='alert alert-danger mt-3'>Preencha todos os campos!</section>";
        return;
    }

    if (adicionarAula($nome, $horario, $instrutor)) {
        echo "<section class='alert alert-success mt-3'>Aula adicionada com sucesso!</section>";

        echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 1000);</script>";
    } else {
        echo "<section class='alert alert-danger mt-3'>Erro ao adicionar aula!</section>";
    }
}

require_once ("../footer.php");
?>