<?php
require_once("cabecalho.php");

if (!isset($_GET['id'])) {
    echo '<div class="alert alert-danger" role="alert">Cliente não encontrado.</div>';
    exit;
}

$conn = conectarBanco();
$id_cliente = $_GET['id'];
$cliente = buscarClientePorId($conn, $id_cliente);

if (!$cliente) {
    echo '<div class="alert alert-danger" role="alert">Cliente não encontrado.</div>';
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['atualizar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    if (atualizarCliente($conn, $id_cliente, $nome, $email, $telefone)) {
        echo '<div class="alert alert-success" role="alert">Cliente atualizado com sucesso.</div>';
        header("Location: clientes.php");
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
                        Editar Cliente
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id_cliente; ?>" method="POST">
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $cliente['Nome']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $cliente['Email']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="telefone">Telefone:</label>
                                <input type="tel" class="form-control" id="telefone" name="telefone" value="<?php echo $cliente['Telefone']; ?>">
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
