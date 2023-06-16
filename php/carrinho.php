<?php
    include "conexao.php";

    $idproduto = $_POST["idproduto"];
    
    $query = "INSERT INTO carrinho(id_produto, valor_produto, nome_produto) VALUES ('$idproduto', (SELECT preco FROM produtos WHERE id = $idproduto), (SELECT nome FROM produtos WHERE id = $idproduto))";

    mysqli_query($conexao, $query);
    
    mysqli_close($conexao);

    $resposta["status"] = "s";
    $resposta["mensagem"] = "Adicionado com sucesso!";

    $objetoJson = json_encode($resposta);
    echo $objetoJson;
?>