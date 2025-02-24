<?php
include 'conexao.php';
include 'funcoes.php';

// ... (receber dados do formulário)

$sql = "SELECT * FROM Jogos WHERE 1=1"; // Consulta base

if (!empty($data)) {
    $sql .= " AND data = '$data'";
}

if (!empty($time)) {
    $sql .= " AND (time1 = '$time' OR time2 = '$time')";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    // ... (cabeçalho da tabela)
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        // ... (linhas da tabela com dados do jogo)
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum jogo encontrado.";
}

$conn->close();
?>