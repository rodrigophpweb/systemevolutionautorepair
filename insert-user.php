<?php
$pdo = new PDO('mysql:host=db;dbname=oficina;charset=utf8', 'user', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// DADOS DO NOVO USUÁRIO
$email = 'rodrigo.mct@gmail.com';
$senha = password_hash('ro20dri02go1983!@#', PASSWORD_DEFAULT); // <<< senha criptografada
$nome = 'Rogerio Eufrasio';

$sql = "INSERT INTO usuarios (email, senha, nome) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email, $senha, $nome]);

echo "Usuário criado com sucesso!";
