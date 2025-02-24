<?php
include 'conexao.php';

$sql = "SELECT j.nome, SUM(jj.gols) AS total_gols
FROM Jogadores j
INNER JOIN Jogadores_Jogos jj ON j.id_jogador = jj.id_jogador
GROUP BY j.nome
ORDER BY total_gols DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Ranking de Jogadores</h2>";
    echo "<table border='1'>";
    // ... (cabeçalho da tabela)
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        // ... (linhas da tabela com nome do jogador e total de gols)
        echo "</tr>";
    }
    echo "</table>";
}

$conn->close();
?>