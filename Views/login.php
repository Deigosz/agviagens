<?php
require_once("cabecalho.php");
?>
<section class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="login-form p-4 rounded shadow" style="background-color: #f8f9fa; max-width: 400px; width: 100%;">
                    <h2 class="text-center mb-4">Login</h2>
                    <form action="processa_login.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Usuário</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="cadastro-form p-4 rounded shadow" style="background-color: #f8f9fa; max-width: 400px; width: 100%;">
                    <h2 class="text-center mb-4">Cadastro</h2>
                    <form action="processa_cadastro.php" method="POST">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr class="my-5">
    </div>
</section>

<?php
require_once("rodape.html");
?>
