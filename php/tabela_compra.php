<?php
    include "conexao.php";

    $tipo_pagamento = 'Cartão de crédito';
    $cartao_digitos = $_POST["cartao_compra"];
    $exp_date = $_POST["expdate_compra"];
    $codigo_seguranca = $_POST["codigoseg_compra"];

    $query = "INSERT INTO compra(tipo_pagamento, id_do_usuario, valor_total, cartao_digitos, exp_date, codigo_seguranca, data_compra) VALUES ('$tipo_pagamento',(SELECT id_usuario_login from logon order by id_contador desc limit 1) ,(SELECT sum(valor_produto) FROM carrinho), '$cartao_digitos','$exp_date','$codigo_seguranca', (SELECT CURDATE()))";

    mysqli_query($conexao,$query);

    mysqli_close($conexao);

?>