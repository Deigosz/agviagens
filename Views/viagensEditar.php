<?php
require_once("cabecalho.php");

if (!isset($_GET['id'])) {
    echo '<div class="alert alert-danger" role="alert">Cliente não encontrado.</div>';
    exit;
}

$conn = conectarBanco();
$id_viagem = $_GET['id'];
$viagem = buscarViagemPorId($conn, $id_viagem);

if (!$viagem) {
    echo '<div class="alert alert-danger" role="alert">Cliente não encontrado.</div>';
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['atualizar'])) {
    $destino = $_POST['destino'];
    $preco = $_POST['preco'];
    $duracao = $_POST['duracao'];

    if (atualizarViagem($conn, $id_viagem, $destino, $preco, $duracao)) {
        echo '<div class="alert alert-success" role="alert">Cliente atualizado com sucesso.</div>';
        header("Location: viagens.php");
        exit;
    } else {
        echo '<div class="alert alert-danger" role="alert">Erro ao atualizar cliente.</div>';
    }
}
?>

<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header fw-bold bg-primary text-white">
                        Editar Viagem
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id_viagem; ?>" method="POST">
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control" id="destino" name="destino" value="<?php echo $viagem['Destino']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="number" class="form-control" id="preco" name="preco" value="<?php echo $viagem['Preco']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="telefone">Telefone:</label>
                                <input type="text" class="form-control" id="duracao" name="duracao" value="<?php echo $viagem['Duracao']; ?>">
                            </div>
                            <br>
                            <button type="submit" name="atualizar" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once("rodape.html");
?>
