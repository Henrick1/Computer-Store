<?php
    include "conexao.php";

    $resultado = mysqli_query($conexao, "SELECT valor_produto FROM carrinho");

    $i = 0;

    $total = 0;
    
    while($registro = mysqli_fetch_assoc($resultado)){
        $total += $dados[$i]["valor_produto"] = $registro["valor_produto"];
        $i++;
    }

    $objetoJSON = json_encode($total);
    echo $objetoJSON;

    // $objetoJSON mostra o valor total

?>