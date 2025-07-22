<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login | Evolution Auto Repair</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Michroma&display=swap" rel="stylesheet">
  <style>
    body {
        background-color: #000;
        color: #fff;
        font-family: 'Roboto', sans-serif;
        padding: 1rem;
    }

    .login-container {
        background-color: #000;
        border: 1px solid #333;
        border-radius: 1rem;
        padding: 2rem;
        width: 100%;
        max-width: 400px;
        box-shadow: 0 0 20px rgba(212, 175, 55, 0.2);
    }

    .logo {
        text-align: center;
        margin-bottom: 2rem;
    }

    .logo img {
        height: auto;
    }

    .form-label {
        color: #ccc;
        font-family: "Michroma", sans-serif;
    }

    .form-control {
        background-color: #222;
        border: 1px solid #d4af37;
        color: #d4af37;

    }

    .form-control:focus {
        background-color: #222;
        border-color: #d4af37;
        box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25);
        color: #d4af37
    }

    .btn-gold {
        background-color: #d4af37;
        color: #000;
        border: none;
        font-family: "Michroma", sans-serif;
        font-weight: bold;

    }

    .btn-gold:hover {
        color: #bfa233;
        border: solid 1px #bfa233;
        background-color: black;
    }

    #loginMessage {
        color: #ff6b6b;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-12">
      <nav class="navbar navbar-expand-lg navbar-dark border-bottom mb-4">
        <a class="navbar-brand" href="#">
          <img src="assets/images/brand-evolution-auto-repair.png" alt="Logo Evolution Auto Repair" style="height: 100px;" />
        </a>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="clientes.php">Clientes</a></li>
            <li class="nav-item"><a class="nav-link" href="veiculos.php">Veículos</a></li>
            <li class="nav-item"><a class="nav-link" href="os.php">Ordem de Serviços</a></li>
            <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
          </ul>
        </div>
        <div>
          <a class="nav-link" href="logout.php">Sair</a>
        </div>
      </nav>
    </div>
  </div>
</div>

