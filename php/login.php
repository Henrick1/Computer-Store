<?php
    include "conexao.php";

    $email = $_POST["email"];
    $senha = $_POST["senha"];
    // Cria as variaveis para conferir se existem no banco de dados.
    
    $query = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";

    // Seleciona tudo da tabela 'usario' onde o email é igual ao email inserido pelo usuario, o mesmo para senha.

    $resultado = mysqli_query($conexao, $query);

    // Faz o query.

    if(mysqli_num_rows($resultado) > 0){
        $retorno["status"] = "s";
        // Se ele existir manda a resposta pra função. Nesse caso ele existe.
    }else{
        $retorno["status"] = "n";
        // E nesse caso ele não existe.
    }

    $objetoJSON = json_encode($retorno);
    echo $objetoJSON;
    
    //Se não der certo deletar a partir daqui pra baixo

    // $query = "SELECT id_usuario FROM usuario WHERE email = '$email' AND senha = '$senha'";

    // $query = "INSERT INTO logins(id_usario_login) VALUES ((SELECT id_usuario FROM usuario WHERE email = '$email' AND senha = '$senha'))";

    // mysqli_query($conexao, $query);
?>