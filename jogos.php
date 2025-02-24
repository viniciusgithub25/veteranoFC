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
    <title>Jogos</title>
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
                <li><a href="inserir_sumula1.php">Inserir súmula</a></li>
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
        <section class="resultados">
            <h2>Resultados dos Jogos</h2>

            <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="data">Data:</label>
                <input type="date" name="data" id="data">

                <label for="time">Time:</label>
                <select name="time" id="time">
                    <option value="">Todos</option>
                    <?php
                    // Conectar ao banco de dados e obter lista de times
                    include 'conexao.php';
                    $sql = "SELECT id_time, nome_time FROM Times";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["id_time"] . "'>" . $row["nome_time"] . "</option>";
                        }
                    }
                    $conn->close();
                    ?>
                </select>

                <button type="submit">Filtrar</button>
            </form>

            <?php
            // Exibir resultados dos jogos
            include 'conexao.php';
            include 'funcoes.php';

            $sql = "SELECT * FROM Jogos WHERE 1=1"; // Consulta base

            if (isset($_GET['data']) && !empty($_GET['data'])) {
                $data = $_GET['data'];
                $sql .= " AND data = '$data'";
            }

            if (isset($_GET['time']) && !empty($_GET['time'])) {
                $time = $_GET['time'];
                $sql .= " AND (time1 = '$time' OR time2 = '$time')";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table border='1'>";
                echo "<tr><th>Data</th><th>Hora</th><th>Local</th><th>IDTime 1</th><th>Placar</th><th>IDTime 2</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . converterData($row["data"]) . "</td>";
                    echo "<td>" . $row["hora"] . "</td>";
                    echo "<td>" . $row["local"] . "</td>";
                    echo "<td>" . $row["time1"] . "</td>";
                    echo "<td>" . $row["placar_time1"] . " x " . $row["placar_time2"] . "</td>";
                    echo "<td>" . $row["time2"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Nenhum jogo encontrado.";
            }

            $conn->close();
            ?>

        </section>
    </main>

    <footer>
        <p>&copy; 2024 Grupo de Amigos Veterano 5 Marias</p>
    </footer>

    <script src="script.js"></script>
    
</body>

</html>