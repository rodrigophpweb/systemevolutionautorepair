<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/config/db.php';

try {
  $stmt = $pdo->query("SELECT id, nome FROM fabricantes ORDER BY nome ASC");
  $fabricantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

  header('Content-Type: application/json');
  echo json_encode($fabricantes);

} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['erro' => 'Erro ao buscar fabricantes']);
}
