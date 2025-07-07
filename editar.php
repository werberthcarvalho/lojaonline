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
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    main {
        max-width: 500px;
        margin: 50px auto;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
    }

    form p {
        margin: 10px 0 5px;
        color: #555;
        font-weight: bold;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        margin-bottom: 20px;
    }

    input[type="submit"] {
        width: 100%;
        padding: 12px;
        background-color: #4CAF50;
        border: none;
        color: white;
        font-size: 16px;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

</head>
<body>

<main> 
    <h1>Editar produto</h1>

    <form action="atualizar.php" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($linha['id']) ?>">

        <p>Nome</p>
        <input type="text" name="nome" value="<?= htmlspecialchars($linha['nome']) ?>">

        <p>Preço</p>
        <input type="text" name="preco" value="<?= htmlspecialchars($linha['preco']) ?>">

        <input type="submit" value="Atualizar">
    </form>
</main>

</body>
</html>
