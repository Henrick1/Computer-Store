<?php
    include "conexao.php";

    $resultado = mysqli_query($conexao, "SELECT id_produto FROM carrinho");
    // Seleciona tudo da tabela produtos.

    $i = 1;

    while($registro <= mysqli_fetch_assoc($resultado)){
        $query = "DELETE FROM carrinho where id_produto = $i";
        mysqli_query($conexao, $query);
        $i++;
    }
    
    mysqli_close($conexao);

?>