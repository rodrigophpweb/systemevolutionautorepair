<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php"); // ou 'login.php', se for o nome da tela de login
    exit();
}
