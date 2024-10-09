<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salva Dados</title>
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
        // Configurações de conexão
        $servidor = 'localhost';
        $banco = 'jogos';
        $usuario = 'root';
        $senha = '';

        try {
            // Conexão com o banco de dados
            $conexao = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8", $usuario, $senha);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Verifica se os dados foram recebidos
            if (isset($_POST['nome']) && isset($_POST['quantidade'])) {
                $nome = $_POST['nome'];
                $quantidade = $_POST['quantidade'];

                // Consulta SQL
                $codigoSQL = "INSERT INTO `jogos` (`id`, `nome`, `pontos`) VALUES (NULL, :nm, :qtd)";
                $comando = $conexao->prepare($codigoSQL);
                $comando->execute(['nm' => $nome, 'qtd' => $quantidade]);

                // Mensagem de sucesso
                echo "<div class='alert alert-success'>Dados salvos com sucesso!</div>";
            } else {
                // Mensagem de erro
                echo "<div class='alert alert-danger'>Dados não recebidos!</div>";
            }
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>Erro de conexão: " . $e->getMessage() . "</div>";
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
        }

        // Fecha a conexão
        $conexao = null;
        ?>
        <a href="index.php" class="btn btn-primary mt-3">Voltar para a Home</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
