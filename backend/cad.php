<?php
include_once("../backend/config.php");

$nome = $_POST["nome"];
$senha = $_POST["senha"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$conta = $_POST["tipo_de_conta"];
$data_nasc = $_POST["data_nascimento"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];

$result = mysqli_query($conexao, "INSERT INTO user(nome, senha, email, telefone, conta, data_nasc, cidade, estado) 
VALUES('$nome', '$senha', '$email', '$telefone',  '$conta', '$data_nasc', '$cidade', '$estado')");

header('Content-Type: application/json');
if ($result) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => mysqli_error($conexao)]);
}
?>