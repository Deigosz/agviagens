<?php
require_once("cabecalho.php");

$conn = conectarBanco();
$clientes = listarClientes($conn);
//echo(var_dump($clientes));
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
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?php echo $cliente['Id_Cliente']; ?></td>
                            <td><?php echo $cliente['Nome']; ?></td>
                            <td><?php echo $cliente['Email']; ?></td>
                            <td>
                                <a href="editar_cliente.php?id=<?php echo $cliente['Id_Cliente']; ?>" class="btn btn-sm btn-primary">Editar</a>
                                <a href="#" class="btn btn-sm btn-danger">Remover</a>
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
