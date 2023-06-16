// Pega todos os produtos no banco de dados e colocar na variavel dados que é passada para a função listarProdutos.
fetch("php/listar_produtos.php",{
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
    conteudo += '<div class="cardimg' + lista[i].id + '"></div>'
    conteudo += '<div class="nome">'+  lista[i].nome  +'</div>';
    conteudo += '<div class="proddesc">'+  lista[i].descricao  +'</div>';
    conteudo += '<div class="preco"> R$'+  lista[i].preco  +'.00</div>';
    conteudo += '<button class="botao_comprar" onclick="comprar(' + lista[i].id + ')"> COMPRA </button>';
    conteudo += '</div>';

    document.getElementById("produtos").innerHTML += conteudo;
   }
}

// Lista todos os produtos dentro de uma div com a classe"cards" que então é colocada na div produtos. 

function comprar(id){
    
    document.getElementById("idproduto").value = id;
    var form = document.getElementById("formCarrinho");
    var dados = new FormData(form);

    fetch("php/carrinho.php", { 
        method: "POST",
        body: dados
    }).then(function(resposta){
        console.log(resposta);
        alert("Produto adicionado ao carrinho");
    });    
    
}

// Função que pega o id do produto e manda para a tabela carrinho (FAZER ISSO!)
