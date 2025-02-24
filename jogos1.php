<?php
session_start();
if (!isset($_SESSION["usuario_logado"])) {
    header("Location: login.html");
    exit();
}

// Verifica se o usuário tem permissão para acessar a página
if ($_SESSION['tipo_usuario'] !== 'admin') {
    echo "<script>
            alert('Acesso negado. Você não tem permissão para acessar esta página.');
            setTimeout(function() {
                window.location.href = 'jogos.php';
            },);
          </script>";
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
                <li><a href="jogos1.php">Jogos</a></li>
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
                echo "<tr><th>Data</th><th>Hora</th><th>Local</th><th>Time 1</th><th>Placar</th><th>Time 2</th></tr>";
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

    <section class="sumulas">
    <h2>Súmulas</h2>
    <p>Inserir súmula do jogo.</p>
    
    <form method="post" action="inserir_jogo1.php">
    <h2>Informações do Jogo</h2>
    Data: <input type="date" name="data" required><br>
    Hora: <input type="time" name="hora" required><br>
    Local: <input type="text" name="local" required><br>

    <label for="time1">Time 1:</label>
    <input type="text" name="time1" id="time1" required><br>

    <label for="time2">Time 2:</label>
    <input type="text" name="time2" id="time2" required><br>

    <h2>Jogadores</h2>
    <table>
        <thead>
            <tr>
                <th>Time A</th>
                <th>Time B</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 1; $i <= 21; $i++) : ?>
                <tr>
                    <td><input type="text" name="jogador_time_a[]"></td>
                    <td><input type="text" name="jogador_time_b[]"></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

    <h2>Segundo Tempo</h2>
    <table>
        <thead>
            <tr>
                <th>Time A</th>
                <th>Time B</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 1; $i <= 15; $i++) : ?>
                <tr>
                    <td><input type="text" name="jogador_segundo_tempo_a[]"></td>
                    <td><input type="text" name="jogador_segundo_tempo_b[]"></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

    <h2>Gols e Cartões</h2>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Gols</th>
                <th>Cartão Amarelo</th>
                <th>Cartão Vermelho</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 1; $i <= 21; $i++) : ?>
                <tr>
                    <td><input type="text" name="jogador_gols_cartoes_a[]"></td>
                    <td><input type="number" name="gols_time_a[]"></td>
                    <td><input type="number" name="cartao_amarelo_a[]"></td>
                    <td><input type="number" name="cartao_vermelho_a[]"></td>
                </tr>
            <?php endfor; ?>
            <?php for ($i = 1; $i <= 21; $i++) : ?>
                <tr>
                    <td><input type="text" name="jogador_gols_cartoes_b[]"></td>
                    <td><input type="number" name="gols_time_b[]"></td>
                    <td><input type="number" name="cartao_amarelo_b[]"></td>
                    <td><input type="number" name="cartao_vermelho_b[]"></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

    <h2>Observações</h2>
    <textarea name="observacoes"></textarea><br>

    <input type="submit" value="Salvar">
</form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Grupo de Amigos Veterano 5 Marias</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>