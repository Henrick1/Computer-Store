<?php
    include "conexao.php";

    $tipo_pagamento = 'Pix';

    $query = "INSERT INTO compra(tipo_pagamento, id_do_usuario, valor_total, cartao_digitos, exp_date, codigo_seguranca, data_compra) VALUES ('$tipo_pagamento',(SELECT id_usuario_login from logon order by id_contador desc limit 1) ,(SELECT sum(valor_produto) FROM carrinho), '0','0','0', (SELECT CURDATE()))";

    mysqli_query($conexao,$query);

    mysqli_close($conexao);

?>