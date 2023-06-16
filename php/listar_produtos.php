<?php
    include "conexao.php";

    $resultado = mysqli_query($conexao, "SELECT * FROM produtos");
    // Seleciona tudo da tabela produtos.

    $i = 0;
    
    while($registro = mysqli_fetch_assoc($resultado)){
        $dados[$i]["id"] = $registro["id"];
        $dados[$i]["nome"] = $registro["nome"];
        $dados[$i]["preco"] = $registro["preco"];
        $dados[$i]["descricao"] = $registro["descricao"];
        $i++;

    }

    // Enquanto a variavel $registro conseguir pegar colunas ela passa o id, nome, preco e descricao para a variavel $dados que então e condificada pra json.

    $objetoJSON = json_encode($dados);
    echo $objetoJSON;

?>