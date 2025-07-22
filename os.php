<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ordem de Serviço</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Michroma&display=swap" rel="stylesheet">
  <style>
    .bodyDark {
      background-color: #000 !important;
      color: #e0e0e0;
    }

    .bg-gold {
      background-color: #d4af37;
    }

    .card {
      background-color: #1e1e1e;
      border-color: #333;
    }

    .form-control {
      background-color: #2a2a2a;
      color: #d4af37 !important;
      border: 1px solid #444;
    }

    .form-control:disabled,
    .form-select {
      background-color: #2a2a2a;
      color: #d4af37 !important;
      border: 1px solid #444;
    }

    .form-control:focus,
    .form-select:focus {
      background-color: #2a2a2a;
      color: #fff;
      border-color: #d4af37;
      box-shadow: 0 0 0 0.2rem rgba(102, 175, 233, 0.25);
    }

    .txtPlaca {
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .card-header {
      border-bottom: 1px solid #444;
      font-family: "Michroma", sans-serif;
      text-transform: uppercase;
      font-weight: bold;
    }

    .btn-primary {
      background-color: #0066cc;
      border-color: #005bb5;
    }

    .btn-primary:hover {
      background-color: #005bb5;
      border-color: #004999;
    }

    .btn-outline-primary {
      color: #66afe9;
      border-color: #66afe9;
    }

    .btn-outline-primary:hover {
      background-color: #66afe9;
      color: #000;
    }

    .btn-danger {
      background-color: #cc0000;
      border-color: #b30000;
    }

    .btn-danger:hover {
      background-color: #b30000;
    }

    label {
      color: #cccccc;
      font-family: "Michroma", sans-serif;
    }

    h1 {
      font-family: "Michroma", sans-serif;
      color: #d4af37;
      text-align: center;
      margin-bottom: 20px;
    }

    .btn-primary {
      font-family: "Michroma", sans-serif;
      background-color: #d4af37;
      border-color: #d4af37;
      color: #000;
      font-size: 1rem;
    }

    .btn-primary:hover {
      background-color: #000;
      border-color: #b38f2c;
    }

    .btn-add {
      font-family: "Michroma", sans-serif;
    }
  </style>
</head>


<body class="bodyDark">

<header>
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
</header>

<div class="container py-4">
  <h1 class="mb-4 text-center">Nova Ordem de Serviço</h1>
  <form id="form-os" method="POST" action="salvar_os.php">

    <!-- CLIENTE -->
    <div class="card mb-3">
      <div class="card-header bg-gold text-dark px-4"><i class="bi bi-person-fill-add"></i> Dados do Cliente</div>
      <div class="card-body row g-3">

          <div class="col-md-6">
              <label for="cliente_nome" class="form-label">Nome</label>
              <input type="text" class="form-control" id="cliente_nome" name="cliente_nome" required>
          </div>

          <div class="col-md-6">
              <label for="cliente_cpf" class="form-label">CPF/CNPJ</label>
              <input type="text" class="form-control" id="cliente_cpf" name="cliente_cpf" required>
          </div>

          <div class="col-md-4">
              <label for="cliente_cep" class="form-label">CEP</label>
              <input type="text" class="form-control" id="cliente_cep" name="cliente_cep" required>
          </div>

          <div class="col-md-8">
              <label for="cliente_endereco" class="form-label">Endereço</label>
              <input type="text" class="form-control" id="cliente_endereco" name="cliente_endereco" required disabled>
          </div>

          <div class="col-md-2">
            <label for="cliente_numero" class="form-label">Número</label>
            <input type="text" class="form-control" id="cliente_numero" name="cliente_numero" required>
          </div>

          <div class="col-md-4">
            <label for="cliente_complemento" class="form-label">Complemento</label>
            <input type="text" class="form-control" id="cliente_complemento" name="cliente_complemento">
          </div>

          <div class="col-md-6">
            <label for="cliente_bairro" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="cliente_bairro" name="cliente_bairro" required disabled>
          </div>

          <div class="col-md-5">
              <label for="cliente_telefone" class="form-label">Telefone</label>
              <input type="tel" class="form-control" id="cliente_telefone" name="cliente_telefone" required>
          </div>

          <div class="col-md-5">
              <label for="cliente_cidade" class="form-label">Cidade</label>
              <input type="text" class="form-control" id="cliente_cidade" name="cliente_cidade" required disabled>
          </div>

          <div class="col-md-2">
            <label for="cliente_estado" class="form-label">Estado</label>
            <input type="text" class="form-control" id="cliente_estado" name="cliente_estado" required disabled>
          </div>
      </div>
    </div>

    <!-- VEÍCULO -->
    <div class="card mb-3">
      <div class="card-header bg-gold text-dark px-4"><i class="bi bi-car-front"></i> Dados do Veículo</div>
      <div class="card-body row g-3">
        <div class="col-md-6">
          <label for="fabricante_id" class="form-label">Fabricante</label>
          <select class="form-select" id="fabricante_id" name="fabricante_id" required>
            <option value="">Carregando fabricantes...</option>
          </select>
        </div>

        <div class="col-md-6 position-relative">
          <label for="modelo_busca" class="form-label">Modelo</label>
          <input type="search" class="form-control" id="modelo_busca" placeholder="Digite para buscar o modelo..." autocomplete="off" required>
          <input type="hidden" name="modelo_id" id="modelo_id"> <!-- Para enviar o ID -->
          <div id="sugestoes-modelo" class="list-group position-absolute w-100 mt-1" style="z-index: 1000;"></div>
        </div>


        <div class="col-md-4">
          <label for="ano" class="form-label">Ano</label>
          <input type="text" class="form-control" id="veiculo_ano" name="veiculo_ano" required>
        </div>

        <div class="col-md-4">
          <label for="placa" class="form-label">Placa</label>
          <input type="text" class="form-control" id="placa" name="veiculo_placa" class="txtPlaca" required>
        </div>

        <div class="col-md-4">
          <label for="cor" class="form-label">Cor</label>
          <input type="text" class="form-control" id="cor" name="veiculo_cor">
        </div>

        <div class="col-md-6">
          <label for="chassi" class="form-label">VIN</label>
          <input type="text" class="form-control" id="chassi" name="veiculo_chassi">
        </div>

        <div class="col-md-6">
          <label for="combustivel" class="form-label">Tipo de Combustível</label>
          <select class="form-select" id="combustivel" name="veiculo_combustivel" required>
            <option value="">Selecione...</option>
            <option value="Gasolina">Gasolina</option>
            <option value="Álcool">Álcool</option>
            <option value="Flex">Flex</option>
            <option value="Diesel">Diesel</option>
            <option value="GNV">GNV</option>
            <option value="Elétrico">Elétrico</option>
            <option value="Híbrido">Híbrido</option>
          </select>
        </div>

        <div class="col-md-4">
          <label for="km" class="form-label">Quilometragem (KM)</label>
          <input type="number" class="form-control" id="km" name="veiculo_km">
        </div>
      </div>
    </div>

    <!-- ORDEM -->
    <div class="card mb-3">
      <div class="card-header bg-gold text-dark px-4"><i class="bi bi-pencil"></i> Dados da Ordem</div>
      <div class="card-body row g-3">

        <div class="col-md-4">
          <label for="numero_os" class="form-label">Nº da Ordem de Serviço</label>
          <input type="text" class="form-control" id="numero_os" name="numero_os" readonly placeholder="Será gerado automaticamente">
        </div>

        <div class="col-md-4">
          <label for="data_os" class="form-label">Data</label>
          <input type="date" class="form-control" id="data_os" name="data_os" required>
        </div>

        <div class="col-12">
          <label for="danos_os" class="form-label">Danos ou Avarias</label>
          <textarea class="form-control" id="danos_os" name="danos_os" rows="2"></textarea>
        </div>

        <div class="col-12">
          <label for="observacoes_os" class="form-label">Observações</label>
          <textarea class="form-control" id="observacoes_os" name="observacoes_os" rows="2"></textarea>
        </div>

      </div>
    </div>

    <!-- ITENS --
    <div class="card mb-3">
      <div class="card-header bg-gold text-dark  px-4">Itens da Ordem</div>
      <div class="card-body">
        <div id="itens-container"></div>
        <button type="button" class="btn btn-outline-primary mt-3" onclick="addItem()">+ Adicionar Item</button>
      </div>
    </div>-->

    <div class="card mb-3">
      <div class="card-header bg-gold text-dark  px-4"><i class="bi bi-list-task"></i> Adicionar Serviços / Produtos</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-5">
            <input type="text" id="itemDescricao" class="form-control" placeholder="Descrição">
          </div>
          <div class="col-md-2">
            <input type="number" id="itemQtd" class="form-control" min="1" value="1" placeholder="Qtd">
          </div>
          <div class="col-md-2">
            <input type="number" id="itemValor" class="form-control" step="0.01" placeholder="Valor (R$)">
          </div>
          <div class="col-md-3">
            <button type="button" class="btn btn-success w-100 btn-add" onclick="adicionarItemTabela()"> <i class="bi bi-database-fill-add"></i> Adicionar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-header bg-gold text-dark px-4"><i class="bi bi-wrench"></i> Itens da ordem de serviço</div>
      <div class="card-body">
        <table class="table table-bordered" id="tabelaItens">
          <thead class="table-dark">
            <tr>
              <th>Descrição</th>
              <th>Qtd</th>
              <th>Valor (R$)</th>
              <th>Total</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody id="lista-itens">
          </tbody>
          <tfoot>
            <tr>
              <td></td>
              <td colspan="3" class="text-end fw-bold">Total Geral:</td>
              <td id="totalGeral" class="fw-bold">R$ 0,00</td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>


    <!-- BOTÃO FINAL -->
    <div class="text-end">
      <button type="submit" class="btn btn-lg btn-primary bg-gold"><i class="bi bi-floppy-fill"></i> Salvar</button>
    </div>
  </form>
  <div id="alert-msg" class="alert d-none mt-3" role="alert"></div>
</div>

<script src="assets/js/app.js"></script>

</body>
</html>
