document.addEventListener('DOMContentLoaded', () => {
  const hoje = new Date().toISOString().split('T')[0];
  document.getElementById("data_os").value = hoje;

  // TELEFONE
    document.getElementById("cliente_telefone").addEventListener("input", function () {
    let v = this.value.replace(/\D/g, "");
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2");
    v = v.replace(/(\d{4,5})(\d{4})$/, "$1-$2");
    this.value = v;
    });

    // CPF / CNPJ
    document.getElementById("cliente_cpf").addEventListener("input", function () {
    let v = this.value.replace(/\D/g, "");

    if (v.length <= 11) {
        v = v.replace(/(\d{3})(\d)/, "$1.$2");
        v = v.replace(/(\d{3})(\d)/, "$1.$2");
        v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
    } else {
        v = v.replace(/^(\d{2})(\d)/, "$1.$2");
        v = v.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3");
        v = v.replace(/\.(\d{3})(\d)/, ".$1/$2");
        v = v.replace(/(\d{4})(\d)/, "$1-$2");
    }

    this.value = v;
    });

    // Formatação da 
    
    // Ex: ABC1D23 → ABC-1D23 ou ABC1234
    document.getElementById('placa').addEventListener('input', function(e) {
      let value = e.target.value.toUpperCase().replace(/[^A-Z0-9]/g, '');

      // Limita a 7 caracteres
      if (value.length > 7) value = value.slice(0, 7);

      // Aplica formatação com hífen (opcional)
      // Ex: ABC1D23 → ABC-1D23 ou ABC1234
      // value = value.replace(/^([A-Z]{3})(\d{1})([A-Z]{0,1})(\d{0,2})$/, '$1-$2$3$4');

      e.target.value = value;
    });

    // Selecionar os fabricantes
    fetch('buscar_fabricantes.php')
    .then(res => res.json())
    .then(data => {
      const select = document.getElementById('fabricante_id');
      select.innerHTML = '<option value="">Selecione um fabricante</option>';
      data.forEach(fab => {
        select.innerHTML += `<option value="${fab.id}">${fab.nome}</option>`;
      });
    });

    // Buscar modelos conforme digitação
    document.getElementById("modelo_busca").addEventListener("input", function () {
      const termo = this.value;
      const fabricanteId = document.getElementById("fabricante_id").value;
      const lista = document.getElementById("sugestoes-modelo");

      if (termo.length < 2 || !fabricanteId) {
        lista.innerHTML = "";
        return;
      }

      fetch(`buscar_modelos.php?fabricante_id=${fabricanteId}&termo=${termo}`)
        .then(res => res.json())
        .then(data => {
          if (!Array.isArray(data)) {
            lista.innerHTML = '<div class="list-group-item text-danger">Erro ao buscar modelos</div>';
            return;
          }

          let html = "";
          data.forEach(item => {
            html += `<div class="list-group-item list-group-item-action modelo-opcao" data-id="${item.id}" data-nome="${item.nome}">${item.nome}</div>`;
          });
          lista.innerHTML = html;
        });
    });

    document.getElementById("sugestoes-modelo").addEventListener("click", function (e) {
      if (e.target && e.target.classList.contains("modelo-opcao")) {
        const nome = e.target.getAttribute("data-nome");
        const id = e.target.getAttribute("data-id");
        document.getElementById("modelo_busca").value = nome;
        document.getElementById("modelo_id").value = id;
        this.innerHTML = "";
      }
    });


    function selecionarModelo(id, nome) {
      document.getElementById("modelo_busca").value = nome;
      document.getElementById("modelo_id").value = id;
      document.getElementById("sugestoes-modelo").innerHTML = "";
    }

    // app.js

// app.js ajustado para campos com prefixos reais

  document.getElementById('form-os').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = e.target;

    const cliente = {
      nome: form['cliente_nome'].value,
      email: '', // não existe campo email no formulário atual
      telefone: form['cliente_telefone'].value,
      cep: form['cliente_cep'].value,
      endereco: form['cliente_endereco'].value,
      numero: form['cliente_numero'].value,
      bairro: form['cliente_bairro'].value,
      cidade: form['cliente_cidade'].value,
      estado: form['cliente_estado'].value,
      cpf_cnpj: form['cliente_cpf'].value
    };

    const veiculo = {
      modelo_id: form['modelo_id'] ? form['modelo_id'].value : 0,
      fabricante_id: form['fabricante_id'].value,
      ano: form['veiculo_ano'].value,
      placa: form['veiculo_placa'].value,
      cor: form['veiculo_cor'].value,
      chassi: form['veiculo_chassi'].value,
      combustivel: form['veiculo_combustivel'].value,
      km: form['veiculo_km'].value
    };

    const os = {
      numero_os: form['numero_os'].value,
      data_os: form['data_os'].value,
      danos: form['danos_os'].value,
      observacoes: form['observacoes_os'].value
    };

    const itens = [];
    document.querySelectorAll('#lista-itens tr').forEach(row => {
      const descricao = row.querySelector('.descricao').textContent;
      const quantidade = parseInt(row.querySelector('.quantidade').textContent);
      const valor_unitario = parseFloat(row.querySelector('.valor_unitario').textContent);
      const total = parseFloat(row.querySelector('.total').textContent);

      itens.push({ descricao, quantidade, valor_unitario, total });
    });

    try {
      const response = await fetch('save_os.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ cliente, veiculo, os, itens })
      });

      const result = await response.json();

      const alertDiv = document.getElementById('alert-msg');
      alertDiv.classList.remove('d-none', 'alert-danger', 'alert-success');

      if (result.status === 'success') {
        alertDiv.classList.add('alert-success');
        alertDiv.textContent = result.message;
        form.reset();
        document.querySelector('#lista-itens').innerHTML = '';
      } else {
        alertDiv.classList.add('alert-danger');
        alertDiv.textContent = result.message;
      }
    } catch (err) {
      const alertDiv = document.getElementById('alert-msg');
      alertDiv.classList.remove('d-none');
      alertDiv.classList.add('alert-danger');
      alertDiv.textContent = 'Erro ao enviar dados.';
    }
  });
});

document.getElementById("cliente_cep").addEventListener("blur", function () {
    let cep = this.value.replace(/\D/g, "");

    if (cep.length === 8) {
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(res => res.json())
        .then(data => {
            if (!data.erro) {
            document.getElementById("cliente_endereco").value = data.logradouro || "";
            document.getElementById("cliente_bairro").value = data.bairro || "";
            document.getElementById("cliente_cidade").value = data.localidade || "";
            document.getElementById("cliente_estado").value = data.uf || "";
            } else {
            alert("CEP não encontrado!");
            }
        })
        .catch(() => alert("Erro ao buscar o CEP."));
    }

    // Date OS

});

  let itens = [];

function adicionarItemTabela() {
  const descricao = document.getElementById("itemDescricao").value.trim();
  const qtd = parseInt(document.getElementById("itemQtd").value);
  const valor = parseFloat(document.getElementById("itemValor").value);

  if (!descricao || isNaN(qtd) || isNaN(valor)) {
    alert("Preencha todos os campos corretamente.");
    return;
  }

  const total = qtd * valor;
  itens.push({ descricao, qtd, valor, total });
  atualizarTabelaItens();

  // limpar campos
  document.getElementById("itemDescricao").value = "";
  document.getElementById("itemQtd").value = 1;
  document.getElementById("itemValor").value = "";
}

function removerItem(index) {
  itens.splice(index, 1);
  atualizarTabelaItens();
}

function atualizarTabelaItens() {
  const tbody = document.querySelector("#tabelaItens tbody");
  tbody.innerHTML = "";

  let totalGeral = 0;

  itens.forEach((item, index) => {
    totalGeral += item.total;
    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td><input type="hidden" name="item_descricao[]" value="${item.descricao}">${item.descricao}</td>
      <td><input type="hidden" name="item_qtd[]" value="${item.qtd}">${item.qtd}</td>
      <td><input type="hidden" name="item_valor[]" value="${item.valor.toFixed(2)}">R$ ${item.valor.toFixed(2)}</td>
      <td>R$ ${item.total.toFixed(2)}</td>
      <td><button type="button" class="btn btn-sm btn-danger" onclick="removerItem(${index})"><i class="bi bi-trash3"></i> Remover</button></td>
    `;
    tbody.appendChild(tr);
  });

  document.getElementById("totalGeral").textContent = `R$ ${totalGeral.toFixed(2)}`;
}
