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
   <h1>Produtos Cadastrados!!!</h1> 

   <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preco</th>
            <th>Tipo</th>
            <th>Data Lançamento</th>
        </tr>
        <?php carregaProdutos($conexao); ?>
    </table>

    <form action="novoProduto.php" method="POST">
        <button class="btn btn-primary" name="btnNovoProduto"> Novo Produto </button>
    </form>

    <form action="relEstoque.php" method="POST">
        <button class="btn btn-primary" name="btnEstoque"> Relatório de Estoque </button>
    </form>

</body>
</html>