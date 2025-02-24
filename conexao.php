<?php
$servidor = "localhost"; // Seu servidor
$usuario = "root"; // Seu usuário do banco de dados
$senha = "bd142536SQL$"; // Sua senha do banco de dados
$banco = "veteranofc"; // Nome do banco de dados

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
