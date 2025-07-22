<?php
include('auth_check.php');
include('header.php');
?>

<div class="container">
  <h1 class="mb-4">Bem-vindo, <?= $_SESSION['usuario_nome']; ?>!</h1>

  <div class="row">
    <div class="col-md-4">
      <div class="card text-white bg-primary mb-3">
        <div class="card-body">
          <h5 class="card-title">Veículos</h5>
          <p class="card-text">Total cadastrados: <strong id="totalVeiculos">...</strong></p>
          <a href="veiculos.php" class="btn btn-light btn-sm">Ver todos</a>
        </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card text-white bg-success mb-3">
        <div class="card-body">
          <h5 class="card-title">Clientes</h5>
          <p class="card-text">Total cadastrados: <strong id="totalClientes">...</strong></p>
          <a href="clientes.php" class="btn btn-light btn-sm">Ver todos</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-white bg-warning mb-3">
        <div class="card-body">
          <h5 class="card-title">Serviços</h5>
          <p class="card-text">Total realizados: <strong id="totalServicos">...</strong></p>
          <a href="servicos.php" class="btn btn-light btn-sm">Ver todos</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>

<script>
  // Busca via Fetch API
  fetch('api/dashboard_stats.php')
    .then(response => response.json())
    .then(data => {
      document.getElementById('totalVeiculos').textContent = data.veiculos;
      document.getElementById('totalClientes').textContent = data.clientes;
      document.getElementById('totalServicos').textContent = data.servicos;
    })
    .catch(error => console.error('Erro ao carregar estatísticas:', error));
</script>
