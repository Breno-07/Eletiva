<?php
require_once('../header.php');
?>

<section class="container mt-5">
    <section class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Lista de Membros</h2>
        <a href="adicionar_membro.php" class="btn btn-success">Adicionar Membro</a>
    </section>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Tipo de Plano</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $linhas = listarMembros();
            while ($l = $linhas->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td><?= $l['ID'] ?></td>
                    <td><?= $l['Nome'] ?></td>
                    <td><?= $l['Idade'] ?></td>
                    <td><?= $l['TipoPlano'] ?></td>
                    <td>
                        <a href="alterar_membro.php?id=<?= $l['ID'] ?>" class="btn btn-warning">
                            Alterar
                        </a>
                        <button class="btn btn-danger" onclick="if(confirm('Deseja realmente excluir este membro?')) window.location.href = 'index.php?id=<?= $l['ID'] ?>'">
                            Excluir
                        </button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</section>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (deletarMembro($id)) {
        echo "<section class='alert alert-success mt-3'>Membro excluído com sucesso!</section>";
        echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 1000);</script>";
    } else {
        echo "<section class='alert alert-danger mt-3'>Erro ao excluir membro!</section>";
    }
}

require_once '../footer.php';
?>