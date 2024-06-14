<?php
require_once("cabecalho.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    
    $conn = conectarBanco();
    if ($conn) {
        if (cadastrarUsuario($conn, $nome, $email, $telefone)) {
            $mensagem = '<div class="alert alert-success" role="alert">Usuário cadastrado com sucesso!</div>';
        } else {
            $mensagem = '<div class="alert alert-danger" role="alert">Erro ao cadastrar usuário. Tente novamente.</div>';
        }
    } else {
        $mensagem = '<div class="alert alert-danger" role="alert">Erro na conexão com o banco de dados.</div>';
    }
}
?>
<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Cadastro de Cliente
                    </div>
                    <div class="card-body">
                        <?php if (isset($mensagem)) echo $mensagem; ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="telefone">Telefone:</label>
                                <input type="tel" class="form-control" id="telefone" name="telefone">
                            </div>
                            <!-- <div class="form-group">
                                <label for="endereco">Senha:</label>
                                <input type="password" class="form-control" id="senha" name="senha">
                            </div> -->
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
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