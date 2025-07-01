<?php
require_once 'conexao.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID do produto não informado.");
}

$resultado = $pdo->prepare("SELECT * FROM produto WHERE id = ?");
$resultado->execute([$id]);
$linha = $resultado->fetch(PDO::FETCH_ASSOC);

if (!$linha) {
    die("Produto não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
</head>
<body>
    <h1>Editar produto</h1>

    <form action="atualizar.php" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($linha['id']) ?>">

        <p>Nome</p>
        <input type="text" name="nome" value="<?= htmlspecialchars($linha['nome']) ?>">

        <p>Preço</p>
        <input type="text" name="preco" value="<?= htmlspecialchars($linha['preco']) ?>">

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
