<?php

// Conexão com o banco de dados
$conn = mysqli_connect("localhost", "root", "bd142536SQL$", "veteranofc");

if ($conn->connect_errno) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o usuário enviou o formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST["nome"];
    $data_nascimento = $_POST["data_nascimento"];
    $sexo = $_POST["sexo"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $cep = $_POST["cep"];
    $endereco = $_POST["endereco"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $login = $_POST["login"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); // Criptografa a senha
    $tipo_usuario = 'comum';

    // Verifica se os campos obrigatórios foram preenchidos
    if (empty($nome) || empty($data_nascimento) || empty($sexo) || empty($email) || empty($login) || empty($senha)) {
        die("Por favor, preencha todos os campos obrigatórios.");
    }

    // Verifica se o email já está cadastrado
    $sql_email = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado_email = mysqli_query($conn, $sql_email);
    if (mysqli_num_rows($resultado_email) > 0) {
        die("Este email já está cadastrado.");
    }

    // Verifica se o login já está cadastrado
    $sql_login = "SELECT * FROM usuarios WHERE login = '$login'";
    $resultado_login = mysqli_query($conn, $sql_login);
    if (mysqli_num_rows($resultado_login) > 0) {
        die("Este login já está cadastrado.");
    }

    // Insere o usuário no banco de dados
    $sql = "INSERT INTO usuarios (nome, data_nascimento, sexo, email, telefone, cep, endereco, bairro, numero, login, senha, tipo_usuario)
            VALUES ('$nome', '$data_nascimento', '$sexo', '$email', '$telefone', '$cep', '$endereco', '$bairro', '$numero', '$login', '$senha', '$tipo_usuario')";

    if (mysqli_query($conn, $sql)) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . mysqli_error($conn);
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>