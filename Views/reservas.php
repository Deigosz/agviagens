<?php
require_once("cabecalho.php");
$conn = conectarBanco();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = $_POST['id_cliente'];
    $id_pacote = $_POST['id_pacote'];
    $data_reserva = $_POST['data_reserva'];

    $resultado = cadastrarReserva($conn, $id_cliente, $id_pacote, $data_reserva);
    if ($resultado === true) {
        $mensagem = '<div class="alert alert-success" role="alert">Reserva cadastrada com sucesso!</div>';
    } else {
        $mensagem = '<div class="alert alert-danger" role="alert">' . $resultado . '</div>';
    }
}

if (isset($_GET['remover_id'])) {
    $id_cliente = $_GET['remover_id'];
    $removido = removerReserva($conn, $id_cliente);

    if ($removido) {
        header("Location: reservas.php");
    } else {
        echo "<div class='alert alert-danger'>Erro ao remover cliente.</div>";
    }
}

$clientes = listarClientes($conn);
$pacotes = listarViagens($conn);
$reservas = listarReservas($conn);

?>

<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header fw-bold bg-primary text-white">
                        Cadastro de Reserva
                    </div>
                    <div class="card-body">
                        <?php echo isset($mensagem) ? $mensagem : ''; ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="form-group">
                                <label for="id_cliente">Cliente:</label>
                                <select class="form-control" id="id_cliente" name="id_cliente" required>
                                    <option value="">Selecione o Cliente</option>
                                    <?php foreach ($clientes as $cliente): ?>
                                        <option value="<?php echo $cliente['Id_Cliente']; ?>"><?php echo $cliente['Nome']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_pacote">Pacote de Viagem:</label>
                                <select class="form-control" id="id_pacote" name="id_pacote" required>
                                    <option value="">Selecione o Pacote de Viagem</option>
                                    <?php foreach ($pacotes as $pacote): ?>
                                        <option value="<?php echo $pacote['Id_Pacote']; ?>"><?php echo $pacote['Destino']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="data_reserva">Data da Reserva:</label>
                                <input type="date" class="form-control" id="data_reserva" name="data_reserva" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Cadastrar Reserva</button>
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
                <h2 class="mb-3">Lista de Reservas</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Destino</th>
                            <th>Data Viagem</th>
                            <th>Valor Pago</th>
                            <th>Paga?</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservas as $reserva): ?>
                        <tr>
                            <td><?php echo $reserva['ID']; ?></td>
                            <td><?php echo $reserva['Nome']; ?></td>
                            <td><?php echo $reserva['Destino']; ?></td>
                            <td><?php echo $reserva['Data Viagem']; ?></td>
                            <td><?php echo $reserva['Metodo de Pagamento']; ?></td>
                            <td><?php echo $reserva['Paga?']; ?></td>
                            <td>
                                <a href="reservasEditar.php?id=<?php echo $reserva['ID']; ?>" class="btn btn-sm btn-primary">Editar</a>
                                <a href="?remover_id=<?php echo $reserva['ID']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja remover este cliente?');">Remover</a>
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
