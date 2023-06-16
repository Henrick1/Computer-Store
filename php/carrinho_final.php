<?php
    include "conexao.php";

    $resultado = mysqli_query($conexao, "SELECT * FROM carrinho");
    // Seleciona tudo da tabela produtos.

    $i = 0;
    
    while($registro = mysqli_fetch_assoc($resultado)){
        $dados[$i]["id_carrinho"] = $registro["id_carrinho"];
        $dados[$i]["id_produto"] = $registro["id_produto"];
        $dados[$i]["valor_produto"] = $registro["valor_produto"];
        $dados[$i]["nome_produto"] = $registro["nome_produto"];
        $i++;
    }

    // Enquanto a variavel $registro conseguir pegar colunas ela passa o id, nome, preco e descricao para a variavel $dados que então e condificada pra json.

    $objetoJSON = json_encode($dados);
    echo $objetoJSON;

?>