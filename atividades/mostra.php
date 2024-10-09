<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Dados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Meu App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mostra.php">Mostrar Dados</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Mostrando Valores</h2>
        <?php
        // conexão
        $servidor = 'localhost';
        $banco = 'jogos';
        $usuario = 'root';
        $senha = '';

        $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
        $codigoSQL = "SELECT * FROM `jogos`";

        try {
            $comando = $conexao->prepare($codigoSQL);
            $resultado = $comando->execute();

            if ($resultado) {
                echo "<p>Mostrando valores:</p>";
                while ($linha = $comando->fetch()) {
                    echo "<div class='border p-3 mb-3'>";
                    echo "<strong>Nome:</strong> " . htmlspecialchars($linha['nome']) . "<br>";
                    echo "<strong>Pontos:</strong> " . htmlspecialchars($linha['pontos']) . "<br>";
                    $id = $linha['id'];
                    echo "<a href='deleta.php?id=$id' class='btn btn-danger'>Apagar elemento</a><br>";
                    echo "</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Erro ao executar o comando!</div>";
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
        }

        $conexao = null;
        ?>
        <form action="deleta.php" method="GET" class="mt-4">
            <p>Informe o ID do item que deseja apagar:</p>
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="id" class="form-control" id="id" required>
            </div>
            <button type="submit" class="btn btn-primary">Apagar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
