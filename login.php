<?php
// Conexão com o banco de dados
$conn = mysqli_connect("localhost", "root", "bd142536SQL$", "veteranofc");

// Verifica se houve erro na conexão
if ($conn->connect_errno) {
    echo "Falha ao conectar ao MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
    die();
}

// Verifica se o usuário enviou o formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    // Busca o usuário no banco de dados
    $sql = "SELECT id_usuario, nome, senha, tipo_usuario FROM usuarios WHERE login = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $login);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Verifica se o usuário foi encontrado
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifica se a senha está correta
        if (password_verify($senha, $row["senha"])) {
            // Inicia a sessão
            session_start();

            // Armazena informações do usuário na sessão
            $_SESSION["usuario_logado"] = $row["nome"];
            $_SESSION["id_usuario"] = $row["id_usuario"];
            $_SESSION["tipo_usuario"] = $row["tipo_usuario"]; // Armazena o tipo de usuário

            // Redireciona para a página inicial
            header("Location: index.php");
            exit();
        } else {
            // Redireciona para página de erro senha incorreta
            header("Location: errosenha.html");
        exit();
        }
    } else {
        // Redireciona para página de erro usuario não encontrado
        header("Location: errologin.html");
        exit();
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
