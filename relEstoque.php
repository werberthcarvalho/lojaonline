<?php
    require("conexao.php");
    require("bdProdutos.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Loja Online</title>
</head>
<body>
   <h1>Estoque de Produtos</h1> 

   <table>
        <tr>
            <th>Loja</th>
            <th>Cidade</th>
            <th>Produto</th>
            <th>Preço</th>
            <th>Tipo</th>
            <th>Categoria</th>
            <th>Desconto</th>
            <th>Quantidade</th>
        </tr>
        <?php carregaEstoque($conexao); ?>
    </table>

    <form action="index.php" method="POST">
        <button class="btn btn-primary" name="btnProdutos"> Voltar </button>
    </form>

</body>
</html>