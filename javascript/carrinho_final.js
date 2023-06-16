fetch("php/carrinho_final.php",{
    method: "GET"
}).then(async function (resposta){

    var dados = await resposta.json();

    console.log(dados);
    listarProdutos(dados);
});

function listarProdutos(lista){
    for(var i = 0; i < lista.length; i++)
    {
     var conteudo = '';
     conteudo += '<div class="cards">';
     conteudo += '<div class="cardimg' + lista[i].id_produto + '"></div>'
     conteudo += '<div class="nome">'+  lista[i].nome_produto  +'</div>';
     conteudo += '<div class="preco"> R$'+  lista[i].valor_produto  +'.00</div>';
     conteudo += '</div>';
 
     document.getElementById("produtos").innerHTML += conteudo;
    }
 }

