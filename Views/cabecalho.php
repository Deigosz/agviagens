<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agência de Viagens</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../Utils/Styles/StyleCabecalho.css">
</head>

<body>
  <div class="teste">
    <nav class="navbar navbar-expand-lg .bg-secondary.bg-gradient p-2">
      <div class="container">
        <div class="d-flex align-items-center">
          <i class="bi bi-globe-americas"></i>
          <a class="navbar-brand ms-2" href="index.php">Destinator</a>
          <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

            <li class="nav-item mx-5">
              <a class="nav-link" href="contaspagar.php">
                <i class="bi bi-cash-stack"></i>
                Pagamentos
              </a>
            </li>

            <li class="nav-item mx-5">
              <a class="nav-link" href="reservas.php">
                <i class="bi bi-airplane-fill"></i>
                Reservas
              </a>
            </li>

            <li class="nav-item mx-5">
              <a class="nav-link" href="viagens.php">
                <i class="bi bi-person-check-fill"></i>
                Pacotes Passagens
              </a>
            </li>

            <li class="nav-item mx-5">
              <a class="nav-link" href="clientes.php">
                <i class="bi bi-suitcase-lg-fill mt-1"></i>
                Clientes
              </a>
            </li>

          </ul>

          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link-login" href="login.php">
              <i class="bi bi-box-arrow-in-right"></i>
                Cadastro
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <main class="container">
    <?php
    require_once("../Utils/connection.php");
    require_once("../Functions/Func.php")
    ?>
  </main>
</body>
</html>