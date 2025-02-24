<?php
// Conexão com o banco de dados
$conn = mysqli_connect("localhost", "root", "bd142536SQL$", "veteranofc");

// função filter_input para obter uma variável externa pelo formulário ou url
$parametro = filter_input(INPUT_GET, "parametro");

// Verifica a conexão se houve erro
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
    $sql = "SELECT * FROM usuarios WHERE login = '$login'";
    $result = mysqli_query($conn, $sql);

    // Verifica se o usuário foi encontrado
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifica se a senha está correta
        if (password_verify($senha, $row["senha"])) {
            // Inicia a sessão
            session_start();

            // Armazena o nome do usuário na sessão
            $_SESSION["usuario_logado"] = $row["nome"];

            // Redireciona para a página inicial
            header("Location: index.php");
        } else {
            // Exibe mensagem de erro
            echo "Senha incorreta.";
        }
    } else {
        // Exibe mensagem de erro
        //echo "Usuário não encontrado.";

        header("Location: errologin.html");
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>