<?php
require("conexao.php");

// Apagar produto (seguro com prepared statement)
if (isset($_POST['btnApagar'])) {
    $id = $_POST['btnApagar'];
    $sql = "DELETE FROM produto WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Listagem de produtos</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Editar</th>
            <th>Apagar</th>
        </tr>

        <?php 
        $resultado = $pdo->query("SELECT * FROM produto");
        while($linha = $resultado->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $linha['id'] ?></td>
            <td><?= $linha['nome'] ?></td>
            <td>R$ <?= $linha['preco'] ?></td>

            <!-- Botão Editar -->
            <td>
                <a href="editar.php?id=<?= $linha['id'] ?>">Editar</a>
            </td>

            <!-- Botão Apagar -->
            <td>
                <form action="index.php" method="POST">
                    <button type="submit" name="btnApagar" value="<?= $linha['id'] ?>">Apagar</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <form action="cadProduto.php" method="get">
        <button type="submit">Novo Produto</button>
    </form>
</body>
</html>
