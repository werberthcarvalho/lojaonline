<?php
    $host = "127.0.0.1";
    $usuario = "root";
    $senha = "";
    $banco = "lojaonline";

    $conexao = mysqli_connect($host, $usuario, $senha, $banco);

    if(!$conexao){
        die("Erro de conexão: " . mysqli_connect_error());
    }else{
        echo "Conexão realizada com sucesso <br>";
    }

    //mysqli_close($conexao);
?>