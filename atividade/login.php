<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Conectar ao banco de dados
    $pdo = new PDO('mysql:host=localhost; dbname=test', 'root', '');

    // Verificar se o usuário existe
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->execute([$usuario]);
    $usuarioBanco = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar a senha
    if ($usuarioBanco && password_verify($senha, $usuarioBanco['senha'])) {
        $_SESSION['logado'] = true;
        header('Location: index.php');
        exit;
    } else {
        $erro = "Usuário ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post">
        <input type="text" name="usuario" placeholder="Usuário" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
    <?php if (isset($erro)) echo "<p>$erro</p>"; ?>
    <a href="cadastro_usuario.php">Não tem uma conta? Cadastre-se</a>
</body>
</html>