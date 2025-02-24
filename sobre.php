<?php
session_start();
if (!isset($_SESSION["usuario_logado"])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre o Grupo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/logo.jpg" alt="Logo do Grupo">
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="sobre.php">Sobre</a></li>
                <li><a href="jogos.php">Jogos</a></li>
                <?php
                if (isset($_SESSION["usuario_logado"])) {
                    echo '<li><span>' . $_SESSION["usuario_logado"] . '</span></li>';
                    echo '<li><a href="logout.php">Logout</a></li>';
                } else {
                    echo '<li><a href="login.html">Login</a></li>';
                    echo '<li><a href="cadastro.html">Cadastro</a></li>';
                }
                ?>
            </ul>
        </nav>
        </header>
    <main>
        <section class="historia">
            <h2>História do Grupo</h2>
            <p>Aqui vai a história do grupo.</p>
        </section>
        <section class="jogadores">
            <h2>Jogadores</h2>
            <p>Aqui vai a lista de jogadores.</p>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Grupo de Amigos Veterano 5 Marias</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>