<?php
require_once("cabecalho.php");
$conn = conectarBanco();

// Remover viagem se o parâmetro remover_id estiver presente na URL
if (isset($_GET['remover_id'])) {
    $remover_id = $_GET['remover_id'];
    $removido = removerViagem($conn, $remover_id);
    if ($removido) {
        echo '<div class="alert alert-success" role="alert">Viagem removida com sucesso!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Erro ao remover viagem.</div>';
    }
}

// Lógica para cadastro e edição de viagens
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['editar'])) {
        $id_viagem = $_POST['id_viagem'];
        $destino = $_POST['destino'];
        $preco = $_POST['preco'];
        $duracao = $_POST['duracao'];

        $atualizado = atualizarViagem($conn, $id_viagem, $destino, $preco, $duracao);
        if ($atualizado) {
            $mensagem = '<div class="alert alert-success" role="alert">Viagem atualizada com sucesso!</div>';
        } else {
            $mensagem = '<div class="alert alert-danger" role="alert">Erro ao atualizar viagem.</div>';
        }

    } else {
        $destino = $_POST['destino'];
        $preco = $_POST['preco'];
        $duracao = $_POST['duracao'];

        $resultado = cadastrarViagem($conn, $destino, $preco, $duracao);
        if ($resultado === true) {
            $mensagem = '<div class="alert alert-success" role="alert">Viagem cadastrada com sucesso!</div>';
        } else {
            $mensagem = '<div class="alert alert-danger" role="alert">' . $resultado . '</div>';
        }
    }
}

$viagens = listarViagens($conn);
?>

<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header fw-bold bg-primary text-white">
                        Cadastro de Viagem
                    </div>
                    <div class="card-body">
                        <?php echo isset($mensagem) ? $mensagem : ''; ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <input type="hidden" name="id_viagem" value="<?php echo isset($_POST['id_viagem']) ? $_POST['id_viagem'] : (isset($_GET['editarViagem']) ? $_GET['editarViagem'] : ''); ?>">
                            <div class="form-group">
                                <label for="destino">Destino:</label>
                                <input type="text" class="form-control" id="destino" name="destino" value="<?php echo isset($_POST['destino']) ? $_POST['destino'] : (isset($_GET['editarViagem']) && isset($viagens[$_GET['editarViagem']]) ? $viagens[$_GET['editarViagem']]['Destino'] : ''); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="preco">Preço:</label>
                                <input type="number" class="form-control" id="preco" name="preco" value="<?php echo isset($_POST['preco']) ? $_POST['preco'] : (isset($_GET['editarViagem']) && isset($viagens[$_GET['editarViagem']]) ? $viagens[$_GET['editarViagem']]['Preco'] : ''); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="duracao">Duração:</label>
                                <input type="text" class="form-control" id="duracao" name="duracao" value="<?php echo isset($_POST['duracao']) ? $_POST['duracao'] : (isset($_GET['editarViagem']) && isset($viagens[$_GET['editarViagem']]) ? $viagens[$_GET['editarViagem']]['Duracao'] : ''); ?>" required>
                            </div>
                            <br>
                            <?php if (isset($_GET['editarViagem'])): ?>
                                <button type="submit" name="editar" class="btn btn-primary">Editar</button>
                            <?php else: ?>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <h2 class="mb-3">Lista de Viagens</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Destino</th>
                            <th>Preço</th>
                            <th>Duração</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($viagens as $viagem): ?>
                            <tr>
                                <td><?php echo $viagem['Id_Pacote']; ?></td>
                                <td><?php echo $viagem['Destino']; ?></td>
                                <td><?php echo $viagem['Preco']; ?></td>
                                <td><?php echo $viagem['Duracao']; ?></td>
                                <td>
                                    <a href="viagensEditar.php?id=<?php echo $viagem['Id_Pacote']; ?>" class="btn btn-sm btn-primary">Editar</a>
                                    <a href="?remover_id=<?php echo $viagem['Id_Pacote']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja remover esta viagem?');">Remover</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php
require_once("rodape.html");
?>
