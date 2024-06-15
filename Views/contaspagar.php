<?php
require_once("cabecalho.php");
$conn = conectarBanco();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_reserva = $_POST['id_reserva'];
    $valor_pago = $_POST['valor_pago'];
    $data_pagamento = $_POST['data_pagamento'];

    $resultado = cadastrarPagamento($conn, $id_reserva, $valor_pago, $data_pagamento);
    if ($resultado === true) {
        $mensagem = '<div class="alert alert-success" role="alert">Pagamento cadastrado com sucesso!</div>';
    } else {
        $mensagem = '<div class="alert alert-danger" role="alert">' . $resultado . '</div>';
    }
}

if (isset($_GET['remover_id'])) {
    $id_pagamento = $_GET['remover_id'];
    $removido = removerPagamento($conn, $id_pagamento);

    if ($removido) {
        header("Location: contaspagar.php");
    } else {
        echo "<div class='alert alert-danger'>Erro ao remover pagamento.</div>";
    }
}

$reservas = listarReservas($conn);
$pagamentos = listarPagamentos($conn);

?>

<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header fw-bold bg-primary text-white">
                        Cadastro de Pagamento
                    </div>
                    <div class="card-body">
                        <?php echo isset($mensagem) ? $mensagem : ''; ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="form-group">
                                <label for="id_reserva">Reserva:</label>
                                <select class="form-control" id="id_reserva" name="id_reserva" required>
                                    <option value="">Selecione a Reserva</option>
                                    <?php foreach ($reservas as $reserva): ?>
                                        <option value="<?php echo $reserva['ID']; ?>"><?php echo $reserva['Nome'] . " - " . $reserva['Destino']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="valor_pago">Valor Pago:</label>
                                <input type="number" class="form-control" id="valor_pago" name="valor_pago" required>
                            </div>
                            <div class="form-group">
                                <label for="data_pagamento">Data do Pagamento:</label>
                                <input type="date" class="form-control" id="data_pagamento" name="data_pagamento" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Cadastrar Pagamento</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h2 class="mb-3">Lista de Pagamentos</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Reserva</th>
                            <th>Nome Cliente</th>
                            <th>Destino</th>
                            <th>Valor Pago</th>
                            <th>Data Pagamento</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pagamentos as $pagamento): ?>
                        <tr>
                            <td><?php echo $pagamento['ID']; ?></td>
                            <td><?php echo $pagamento['ReservaID']; ?></td>
                            <td><?php echo $pagamento['NomeCliente']; ?></td>
                            <td><?php echo $pagamento['Destino']; ?></td>
                            <td><?php echo $pagamento['Valor Pago']; ?></td>
                            <td><?php echo $pagamento['Data Pagamento']; ?></td>
                            <td>
                                <a href="?remover_id=<?php echo $pagamento['ID']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja remover este pagamento?');">Remover</a>
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
