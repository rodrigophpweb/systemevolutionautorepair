<?php
session_start();
require_once __DIR__ . '/config/db.php';

header('Content-Type: application/json');

$email = $_POST['usuario'] ?? null; // continua chamando de "usuario" no front
$senha = $_POST['senha'] ?? null;

if (!$email || !$senha) {
    echo json_encode([
        'success' => false,
        'message' => 'Preencha todos os campos.'
    ]);
    exit;
}

$stmt = $pdo->prepare("SELECT id, nome, email, senha FROM usuarios WHERE email = :email LIMIT 1");
$stmt->bindParam(':email', $email);
$stmt->execute();

if ($stmt->rowCount() === 1) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (password_verify($senha, $user['senha'])) {
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['usuario_nome'] = $user['nome'];

        echo json_encode(['success' => true]);
        exit;
    }
}

echo json_encode([
    'success' => false,
    'message' => 'Usuário ou senha inválidos.'
]);
exit;
