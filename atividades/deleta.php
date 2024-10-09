<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleta dados</title>
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
        <?php
        // Conexão
        $servidor = 'localhost';
        $banco = 'jogos';
        $usuario = 'root';
        $senha = '';

        try {
            $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
            $id = $_GET['id'];

            echo "<h2>Deletar Dados</h2>";
            echo "<p>ID recebido: <strong>" . htmlspecialchars($id) . "</strong></p>";

            $codigoSQL = "DELETE FROM jogos WHERE `jogos`.`id` = :id";
            $comando = $conexao->prepare($codigoSQL);
            $comando->bindParam(':id', $id, PDO::PARAM_INT);
            $comando->execute();
            
            if ($comando->rowCount() > 0) {
                echo "<div class='alert alert-success'>Comando executado com sucesso!</div>";
            } else {
                echo "<div class='alert alert-warning'>Nenhum registro encontrado ou erro ao executar o comando!</div>";
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
        }

        $conexao = null;
        ?>
        <a href="mostra.php" class="btn btn-primary mt-3">Voltar para Mostrar Dados</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
