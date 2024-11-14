<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header('Location: login.php');
    exit;
}

$pdo = new PDO('mysql:host=localhost; dbname=test', 'root', '');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $formacao = $_POST['formacao'];
    $celular = $_POST['celular'];

    $stmt = $pdo->prepare("INSERT INTO professores (nome, formacao, celular) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $formacao, $celular]);
}

$professores = $pdo->query("SELECT * FROM professores ORDER BY nome")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Professores</title>
</head>
<body>
    <h2>Cadastro de Professores</h2>
    <form method="post">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="formacao" placeholder="Formação" required>
        <input type="text" name="celular" placeholder="Celular" required>
        <button type="submit">Cadastrar</button>
    </form>

    <h3>Lista de Professores</h3>
    <ul>
        <?php foreach ($professores as $professor): ?>
            <li><?php echo htmlspecialchars($professor['nome']); ?> - <?php echo htmlspecialchars($professor['formacao']); ?> - <?php echo htmlspecialchars($professor['celular']); ?></li>
        <?php endforeach; ?>
    </ul>

    <a href="logout.php">Sair</a>
</body>
</html>