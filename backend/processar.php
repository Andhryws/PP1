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
    $titulo = $_POST['titulo'];

    try {
        $stmt = $pdo->prepare("INSERT INTO campanhas (criador, contato, descricao, pix, crowdfunding, localizacao, meta, titulo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$criador, $contato, $descricao, $pix, $crowdfunding, $localizacao, $meta, $titulo]);

        // Definindo o cabeçalho da resposta como JSON
        header('Content-Type: application/json');
        // Retornando resposta JSON de sucesso
        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        // Definindo o cabeçalho da resposta como JSON
        header('Content-Type: application/json');
        // Retornando resposta JSON de erro
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
    exit();
}
?>