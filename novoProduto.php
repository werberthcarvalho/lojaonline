<?php 
    require("conexao.php");
    require("bdProdutos.php");

    if(isset($_POST['btnCadastrar'])){
        $protudo = [];
        $produto['nome'] = $_POST['txtNome'];
        $produto['preco'] = $_POST['txtPreco'];
        $produto['descricao'] = $_POST['txtDescricao'];

        if($_POST['txtTipo'] === "txtUsado"){
            $produto['tipo'] = "Usado";
        }else if($_POST['txtTipo'] === "txtNovo"){
            $produto['tipo'] = "Novo";
        }

        $produto['categoria'] = "";

        if(isset($_POST['cbxInformatica'])){
            $produto['categoria'] .= "Informatica";  
        }

        if(isset($_POST['cbxTelefonia'])){
            $produto['categoria'] .= "Telefonia";  
        }

        $produto['data'] = $_POST['txtData'];
        $produto['desconto'] = $_POST['txtDesconto'];
        insereProduto($conexao, $produto);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Protudo</title>
</head>
<body>
<h1>Cadastro de Produtos</h1>
    <form action="" method="POST">
        <p>Nome do Produto</p>    
        <input type="text" name=txtNome></input>

        <p>Preco</p>    
        <input type="text" name=txtPreco></input>

        <p>Descrição</p>    
        <textarea name=txtDescricao></textarea>

        <p>Tipo</p>    
        <select name=txtTipo>
            <option value="txtNovo">Novo</option>
            <option value="txtUsado">Usado</option>
        </select>

        
        <fieldset>
        <legend>Escolha as categorias</legend>  
            <input type="checkbox" id="cbxInformatica" name="cbxInformatica" />
            <label for="txtInformatica">Informática</label>

            <input type="checkbox" id="cbxTelefonia" name="cbxTelefonia" />
            <label for="txtTelefonia">Telefonia</label>
        </fieldset>


        <p>Data de Lançamento</p>    
        <input type="date" name=txtData></input>
        <br>
        
        <p>Desconto para Usados</p>    
        <input type="text" name=txtDesconto></input>

        <button class="btn btn-primary" name="btnCadastrar"> Cadastrar </button>
    </form>

    <form action="index.php" method="POST">
        <button class="btn btn-primary" name="btnProdutos"> Voltar </button>
    </form>
</body>
</html>