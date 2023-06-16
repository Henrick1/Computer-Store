// Função usada no botão "Cadastrar!" para criar a conta e enviar para a tabela 'usuario' no banco de dados. Se nenhum valor estiver nulo a função continua se não ela avisa que tem algum campo em branco.
// Agora se a senha e confirmar senha forem iguas ele diz que a conta foi cadastrada e manda para a página de login, se não ele avisa que a senha ou confirmar senha estão diferendes
function criar_conta(){
    if(document.getElementById("nome_cadastro").value != "" &&
    document.getElementById("CPF_cadastro").value != "" &&
    document.getElementById("email_cadastro").value != "" &&
    document.getElementById("senha_cadastro").value != "" &&
    document.getElementById("confirmar_senha_cadastro").value != ""){
        if(document.getElementById("CPF_cadastro").value.length == 11){
            if(document.getElementById("senha_cadastro").value == document.getElementById("confirmar_senha_cadastro").value){
                var objetoForm = document.getElementById("cadastro");
                var dados = new FormData(objetoForm);
                fetch("php/criar_conta.php",{
                    method: "POST",
                    body: dados
                }).then(function(resposta){
                    console.log(resposta);
                    alert("Usuario cadastrado!");
                    window.location.href = "index.html";
                });
            }else{
                alert("A senha e confirmar senha tem valores diferentes!");
            }
        } else{
            alert("O CPF está errado!");
        }
    } else {
        alert("Algum campo está em branco ou com informação incorreta!");
    }

}

function verificar(){
    var form = document.getElementById("login");
    var dados = new FormData(form);
    fetch("php/login.php",{ 
        method: "POST",
        body: dados
    }).then(async function (retorno) {
        var objeto = await retorno.json();
        console.log(objeto);
        if(objeto.status == 's'){
            fetch("php/login_tabela.php",{ 
                method: "POST",
                body: dados
            });
            window.location.href = "home.html";
        }else{
            alert("E-mail ou senha incorretos!");
        }
    });
}// Função usada na pagina de login para verificar se existe o Usuario na tabela 'usuario' no banco de dados, se no banco de dados estiver o email e senha do usuario ele manda para a pagina home.
//Senão ele avisa que ou o usuario ou a senha está incorreta.













































