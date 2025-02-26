<?php
ob_start(); // Inicia o buffer de saída Isso impede que qualquer saída inesperada interfira nos header().
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conexao.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST); // Teste para verificar os dados recebidos

    $data = $_POST['data'] ?? '';
    $hora = $_POST['hora'] ?? '';
    $local = $_POST['local'] ?? '';
    $observacoes = $_POST['observacoes'] ?? '';
    $time1_nome = trim($_POST['time1'] ?? '');
    $time2_nome = trim($_POST['time2'] ?? '');

    if (empty($data) || empty($hora) || empty($local) || empty($time1_nome) || empty($time2_nome)) {
        $_SESSION['mensagem'] = '<span class="erro">Preencha todos os campos obrigatórios!</span>';
        header("Location: inserir_sumula.php");
        exit();
    }

    function getOrCreateTeam($conn, $nome_time) {
        if (empty($nome_time)) return null;

        $sql = "SELECT id_time FROM times WHERE nome_time = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nome_time);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            return $row['id_time'];
        } else {
            $sql_insert = "INSERT INTO times (nome_time) VALUES (?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("s", $nome_time);
            if ($stmt_insert->execute()) {
                return $stmt_insert->insert_id;
            } else {
                return null;
            }
        }
    }

    $time1_id = getOrCreateTeam($conn, $time1_nome);
    $time2_id = getOrCreateTeam($conn, $time2_nome);

    if ($time1_id && $time2_id) {
        $sql_jogo = "INSERT INTO jogos (data, hora, local, time1, time2, observacoes) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_jogo = $conn->prepare($sql_jogo);
        $stmt_jogo->bind_param("sssiss", $data, $hora, $local, $time1_id, $time2_id, $observacoes);

        if ($stmt_jogo->execute()) {
            $_SESSION['mensagem'] = '<span class="sucesso">Jogo inserido com sucesso!</span>';
        } else {
            $_SESSION['mensagem'] = '<span class="erro">Erro ao inserir jogo: ' . $stmt_jogo->error . '</span>';
        }
    } else {
        $_SESSION['mensagem'] = '<span class="erro">Erro ao obter times</span>';
    }

    $conn->close();
    header("Location: jogos.php");
    exit();
}
ob_end_flush(); // Libera o buffer
?>
