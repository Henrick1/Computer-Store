<?php
    include "conexao.php";

    $email = $_POST["email"];
    $senha = $_POST["senha"];
    // Cria as variaveis para conferir se existem no banco de dados.
    
    $query = "INSERT INTO logon(id_usuario_login) VALUES ((SELECT id_usuario  FROM usuario WHERE email = '$email' AND senha = '$senha'))";

    // Seleciona tudo da tabela 'usario' onde o email é igual ao email inserido pelo usuario, o mesmo para senha.

    mysqli_query($conexao, $query);

    // Faz o query.
    
    //Se não der certo deletar a partir daqui pra baixo

    // $query = "SELECT id_usuario FROM usuario WHERE email = '$email' AND senha = '$senha'";

    // $query = "INSERT INTO logins(id_usario_login) VALUES ((SELECT id_usuario FROM usuario WHERE email = '$email' AND senha = '$senha'))";

    // mysqli_query($conexao, $query);
?>