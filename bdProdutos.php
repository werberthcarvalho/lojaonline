<?php 
// MOSTRAR PRODUTOS CADASTRADOS
function carregaProdutos($conexao){
    $comando = "SELECT * FROM produto";
    $resultado = mysqli_query($conexao, $comando);

    if(mysqli_num_rows($resultado) > 0){
        while($linha = mysqli_fetch_assoc($resultado)){
            echo "<td>" . $linha['id'] . "</td>"; 
            echo "<td>" . $linha['nome'] . "</td>";
            echo "<td>" . $linha['preco'] . "</td>";
            echo "<td>" . $linha['tipo'] . "</td>";
            echo "<td>" . $linha['data_lancamento'] . "</td>";
            echo '</tr>';
        }
    }else{
        echo "Nenhum resultado foi encontrado";
    }
}

// MOSTRAR ESTOQUE
function carregaEstoque($conexao){
    $comando = "SELECT l.nome AS lNome, l.cidade, p.nome AS pNome, 
    p.preco, p.tipo, p.categoria, p.desconto_usados, e.quantidade_disponivel   
    FROM loja l INNER JOIN produto p INNER JOIN estoque e
    ON l.id = e.id_loja AND p.id = e.id_produto";

    $resultado = mysqli_query($conexao, $comando);

    if(mysqli_num_rows($resultado) > 0){
        while($linha = mysqli_fetch_assoc($resultado)){
            echo '<tr>';
            echo "<td>" . $linha['lNome'] . "</td>"; 
            echo "<td>" . $linha['cidade'] . "</td>";
            echo "<td>" . $linha['pNome'] . "</td>";
            echo "<td>" . $linha['preco'] . "</td>";
            echo "<td>" . $linha['tipo'] . "</td>";
            echo "<td>" . $linha['categoria'] . "</td>";
            echo "<td>" . $linha['desconto_usados'] . "</td>";
            echo "<td>" . $linha['quantidade_disponivel'] . "</td>";
            echo '</tr>';
        }
    }else{
        echo "Nenhum resultado foi encontrado";
    }
}

function insereProduto($conexao, $produto){
    $pnome = $produto['nome'];
    $pdescricao = $produto['descricao'];
    $ppreco = str_replace(',','.',$produto['preco']);
    $ptipo = $produto['tipo'];
    $pcategoria = $produto['categoria'];
    $pdata = $produto['data'];
    $pdesconto = str_replace(',','.', $produto['desconto']);

    $comando = "INSERT INTO Produto 
            (id, nome, descricao, preco, tipo, categoria, data_lancamento, desconto_usados) VALUES
            (NULL, '$pnome', '$pdescricao', $ppreco, '$ptipo', '$pcategoria', '$pdata', $pdesconto)";

    if(mysqli_query($conexao, $comando) === TRUE){
        echo "Registro inserido com sucesso!";
        header("Location: index.php");
    }else{
        echo "Erro ao inserir registro " . mysqli_connect_error();
    }
}

?>