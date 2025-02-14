<?php
$host = "localhost";          // Servidor do banco (normalmente localhost)
$dbname = "financienciasDB";  // Nome do banco de dados
$usuario = "root";            // Usuário do banco (padrão do XAMPP)
$senha = "";                  // Senha (normalmente vazia no XAMPP)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,   // Exibe erros do banco
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Retorna resultados como arrays associativos
    ]);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage()); // Mensagem de erro se a conexão falhar
}
?>