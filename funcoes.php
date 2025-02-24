<?php
function converterData($data) {
    // Converte data do formato americano (aaaa-mm-dd) para brasileiro (dd/mm/aaaa)
    return date('d/m/Y', strtotime($data));
}

// Outras funções auxiliares...

function obterIdTime($nome_time, $conn) {
    $sql = "SELECT id_time FROM Times WHERE nome_time = '$nome_time'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['id_time'];
    } else {
        return null; // Ou outro valor que indique que o time não foi encontrado
    }
}
?>