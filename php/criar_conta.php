<?php
    include "conexao.php";

    $nome = $_POST["nome_cadastro"];
    $cpf = $_POST["CPF_cadastro"];
    $email = $_POST["email_cadastro"];
    $senha = $_POST["senha_cadastro"];
    $confirmar_senha = $_POST["confirmar_senha_cadastro"];

    //Cria as variaveis que serão inseridas no banco de dados.

    $query = "INSERT INTO usuario(nome, cpf, email, senha, confirmar_senha) VALUES ('$nome','$cpf','$email','$senha','$confirmar_senha')";

    // Insere na tabela 'usuario' todas essas informações necessárias.

    mysqli_query($conexao,$query);

    // Faz o query.

    mysqli_close($conexao);

    // Fecha a conexão

    $resposta["status"] = "s";
    $resposta["mensagem"] = "Gravado com sucesso!";

    // Manda o status do processo.

?>