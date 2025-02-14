<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $criador = $_POST['criador'];
    $contato = $_POST['contato'];
    $descricao = $_POST['descricao'];
    $pix = $_POST['pix'];
    $crowdfunding = $_POST['crowdfunding'];
    $localizacao = $_POST['localizacao'];
    $meta = $_POST['meta'];

    // Lendo a imagem
    $imagem = file_get_contents($_FILES["imagem"]["tmp_name"]);

    try {
        $stmt = $pdo->prepare("INSERT INTO campanhas (criador, contato, descricao, imagem, pix, crowdfunding, localizacao, meta) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$criador, $contato, $descricao, $imagem, $pix, $crowdfunding, $localizacao, $meta]);

        // Retornando resposta JSON de sucesso
        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        // Retornando resposta JSON de erro
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
    exit();
}
?>