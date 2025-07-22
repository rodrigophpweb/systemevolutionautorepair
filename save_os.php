<?php
// save_os.php
header('Content-Type: application/json');

try {
    // Conexão PDO com o banco de dados
    $pdo = new PDO('mysql:host=localhost;dbname=oficina;charset=utf8mb4', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recebe os dados brutos do corpo da requisição
    $data = json_decode(file_get_contents('php://input'), true);

    // --- 1. INSERIR CLIENTE ---
    $stmt = $pdo->prepare("INSERT INTO clientes (nome, email, telefone, cep, endereco, numero, bairro, cidade, estado, cpf_cnpj, data_cadastro) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURDATE())");
    $stmt->execute([
        $data['cliente']['nome'],
        $data['cliente']['email'],
        $data['cliente']['telefone'],
        $data['cliente']['cep'],
        $data['cliente']['endereco'],
        $data['cliente']['numero'],
        $data['cliente']['bairro'],
        $data['cliente']['cidade'],
        $data['cliente']['estado'],
        $data['cliente']['cpf_cnpj']
    ]);
    $cliente_id = $pdo->lastInsertId();

    // --- 2. INSERIR VEÍCULO ---
    $stmt = $pdo->prepare("INSERT INTO veiculos (modelo_id, fabricante_id, ano, placa, cor, chassi, combustivel, km, cliente_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $data['veiculo']['modelo_id'],
        $data['veiculo']['fabricante_id'],
        $data['veiculo']['ano'],
        $data['veiculo']['placa'],
        $data['veiculo']['cor'],
        $data['veiculo']['chassi'],
        $data['veiculo']['combustivel'],
        $data['veiculo']['km'],
        $cliente_id
    ]);
    $veiculo_id = $pdo->lastInsertId();

    // --- 3. INSERIR OS ---
    $stmt = $pdo->prepare("INSERT INTO os (cliente_id, veiculo_id, numero_os, data_os, danos, observacoes) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $cliente_id,
        $veiculo_id,
        $data['os']['numero_os'],
        $data['os']['data_os'],
        $data['os']['danos'],
        $data['os']['observacoes']
    ]);
    $os_id = $pdo->lastInsertId();

    // --- 4. INSERIR ITENS DA OS ---
    $stmt = $pdo->prepare("INSERT INTO itens_os (os_id, descricao, quantidade, valor_unitario, total) VALUES (?, ?, ?, ?, ?)");
    foreach ($data['itens'] as $item) {
        $stmt->execute([
            $os_id,
            $item['descricao'],
            $item['quantidade'],
            $item['valor_unitario'],
            $item['total']
        ]);
    }

    echo json_encode(['status' => 'success', 'message' => 'Ordem de serviço gerada com sucesso.']);

} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Erro: ' . $e->getMessage()]);
    http_response_code(500);
}
