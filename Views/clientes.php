<?php
require_once("cabecalho.php");

$conn = conectarBanco();
$clientes = listarClientes($conn);
//echo(var_dump($clientes));

if (isset($_GET['remover_id'])) {
    $id_cliente = $_GET['remover_id'];
    $removido = removerCliente($conn, $id_cliente);

    if ($removido) {
        header("Location: clientes.php");
    } else {
        echo "<div class='alert alert-danger'>Erro ao remover cliente.</div>";
    }
}
?>

<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h2 class="mb-3">Lista de Clientes</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?php echo $cliente['Id_Cliente']; ?></td>
                            <td><?php echo $cliente['Nome']; ?></td>
                            <td><?php echo $cliente['Email']; ?></td>
                            <td><?php echo $cliente['Telefone']; ?></td>
                            <td>
                                <a href="clientesEditar.php?id=<?php echo $cliente['Id_Cliente']; ?>" class="btn btn-sm btn-primary">Editar</a>
                                <a href="?remover_id=<?php echo $cliente['Id_Cliente']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja remover este cliente?');">Remover</a>
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
