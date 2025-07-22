<?php
require_once __DIR__ . '/config/db.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$fabricante_id = isset($_GET['fabricante_id']) ? intval($_GET['fabricante_id']) : 0;
$termo = isset($_GET['termo']) ? trim($_GET['termo']) : '';

if ($fabricante_id <= 0 || strlen($termo) < 2) {
  http_response_code(400);
  echo json_encode(['erro' => 'Parâmetros inválidos']);
  exit;
}

try {
  // ✅ Coluna correta é "nome"
  //$stmt = $pdo->prepare("SELECT DISTINCT nome FROM modelos WHERE fabricante_id = :fabricante_id AND nome LIKE :termo ORDER BY nome ASC LIMIT 10");
  $stmt = $pdo->prepare("SELECT id, nome FROM modelos WHERE fabricante_id = :fabricante_id AND nome LIKE :termo ORDER BY nome ASC LIMIT 10");
  $stmt->execute([
    ':fabricante_id' => $fabricante_id,
    ':termo' => "%$termo%"
  ]);

  //$modelos = $stmt->fetchAll(PDO::FETCH_COLUMN);
  $modelos = $stmt->fetchAll(PDO::FETCH_ASSOC);

  header('Content-Type: application/json');
  echo json_encode($modelos);

} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode([
    'erro' => 'Erro ao buscar modelos',
    'detalhe' => $e->getMessage()
  ]);
}
