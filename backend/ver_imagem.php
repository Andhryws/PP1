<?php
include '../backend/conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT imagem FROM campanhas WHERE id = ?");
    $stmt->execute([$id]);
    $campanha = $stmt->fetch();

    if ($campanha) {
        header("Content-Type: image/jpeg");
        echo $campanha['imagem'];
    } else {
        http_response_code(404);
        echo "Imagem não encontrada.";
    }
} else {
    http_response_code(400);
    echo "ID não fornecido.";
}
?>