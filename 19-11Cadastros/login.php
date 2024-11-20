<?php
session_start();

// Conexão com o banco de dados
$host = 'localhost';
$dbname = 'sch';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Erro de conexão: ' . $e->getMessage()]);
    exit;
}

// Verifica se o formulário de login foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se o e-mail e a senha foram fornecidos
    if (empty($email) || empty($senha)) {
        $erro = "Por favor, informe o e-mail e a senha.";
    } else {
        // Consulta o banco de dados para encontrar o usuário
        $stmt = $pdo->prepare("SELECT id, nome, senha FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Se a senha estiver correta, inicia a sessão
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            header("Location: dashboard.php");  // Redireciona para a área interna
            exit;
        } else {
            $erro = "E-mail ou senha inválidos.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php
    if (isset($erro)) {
        echo "<p style='color: red;'>$erro</p>";
    }
    ?>

    <form method="POST" action="login.php">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <button type="submit">Entrar</button>
    </form>

    <p>Não tem uma conta? <a href="usuario.php">Cadastre-se</a></p>
</body>
</html>
