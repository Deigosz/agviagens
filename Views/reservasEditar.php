<?php
require_once("cabecalho.php");

if (!isset($_GET['id'])) {
    echo '<div class="alert alert-danger" role="alert">Reserva não encontrada.</div>';
    exit;
}

$conn = conectarBanco();
$id_reserva = $_GET['id'];
$reserva = buscarReservaPorId($conn, $id_reserva);
$clientes = listarClientes($conn);
$pacotes = listarViagens($conn);

if (!$reserva) {
    echo '<div class="alert alert-danger" role="alert">Reserva não encontrada.</div>';
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['atualizar'])) {
    $id_cliente = $_POST['id_cliente'];
    $id_pacote = $_POST['id_pacote'];
    $data_reserva = $_POST['data_reserva'];

    if (atualizarReserva($conn, $id_reserva, $id_cliente, $id_pacote, $data_reserva)) {
        echo '<div class="alert alert-success" role="alert">Reserva atualizada com sucesso.</div>';
        header("Location: reservas.php");
        exit;
    } else {
        echo '<div class="alert alert-danger" role="alert">Erro ao atualizar reserva.</div>';
    }
}
?>

<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header fw-bold bg-primary text-white">
                        Editar Reserva
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id_reserva; ?>" method="POST">
                            <div class="form-group">
                                <label for="id_cliente">Cliente:</label>
                                <select class="form-control" id="id_cliente" name="id_cliente" required>
                                    <option value="">Selecione o Cliente</option>
                                    <?php foreach ($clientes as $cliente): ?>
                                    <option value="<?php echo $cliente['Id_Cliente']; ?>" <?php echo ($cliente['Id_Cliente'] == $reserva['Id_Cliente']) ? 'selected' : ''; ?>>
                                        <?php echo $cliente['Nome']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_pacote">Pacote de Viagem:</label>
                                <select class="form-control" id="id_pacote" name="id_pacote" required>
                                    <option value="">Selecione o Pacote de Viagem</option>
                                    <?php foreach ($pacotes as $pacote): ?>
                                        <option value="<?php echo $pacote['Id_Pacote']; ?>" <?php echo ($pacote['Id_Pacote'] == $reserva['Id_Pacote']) ? 'selected' : ''; ?>>
                                            <?php echo $pacote['Destino']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="data_reserva">Data da Reserva:</label>
                                <input type="date" class="form-control" id="data_reserva" name="data_reserva" value="<?php echo $reserva['Data_Reserva']; ?>" required>
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
