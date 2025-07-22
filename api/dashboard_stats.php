<?php
session_start();
header('Content-Type: application/json');

include('../config/db.php'); // conexão com PDO

function contar($conexao, $tabela) {
    $stmt = $conexao->prepare("SELECT COUNT(*) AS total FROM $tabela");
    $stmt->execute();
    return (int) $stmt->fetchColumn();
}

echo json_encode([
    'veiculos' => contar($pdo, 'veiculos'),
    'clientes' => contar($pdo, 'clientes'),
    'servicos' => contar($pdo, 'servicos')
]);
