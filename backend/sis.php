<?php
session_start();
include_once('../backend/config.php');

if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    echo json_encode(['redirect' => '../frontend/index.html']);
    exit;
}

$logado = $_SESSION['email'];
header('Content-Type: application/json');
echo json_encode(['logado' => $logado]);
?>