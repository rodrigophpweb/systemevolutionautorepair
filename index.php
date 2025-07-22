<?php
// src/index.php
?>

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
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
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
  <div class="login-container">
    <div class="logo">
      <img src="assets/images/brand-evolution-auto-repair.png" alt="Logo Evolution Auto Repair" />
    </div>
    <form id="loginForm">
      <div class="mb-3">
        <label for="email" class="form-label">Usuário ou E-mail</label>
        <input type="text" class="form-control" id="email" name="usuario" required autocomplete="username" />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" class="form-control" id="password" name="senha" required autocomplete="current-password" />
      </div>
      <div id="loginMessage" class="mb-2"></div>
      <button type="submit" class="btn btn-gold w-100">Entrar</button>
    </form>
  </div>

<script>
document.querySelector("form").addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    const response = await fetch('auth.php', {
        method: 'POST',
        body: formData
    });

    const result = await response.json();

    if (result.success) {
        window.location.href = "dashboard.php";
    } else {
        alert(result.message || "Falha no login.");
    }
});
</script>


</body>
</html>
