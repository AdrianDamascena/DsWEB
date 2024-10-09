<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recebe dados</title>
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
        <h2 class="mb-4">Inserir Dados</h2>
        <form action="salva.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Pontos:</label>
                <input type="number" class="form-control" name="quantidade" id="quantidade" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <form action="mostra.php" method="GET" class="mt-4">
            <p>Ver dados já inseridos</p>
            <button type="submit" class="btn btn-secondary">Ver Dados</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
