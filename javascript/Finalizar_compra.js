// Pega todos os produtos no banco de dados e colocar na variavel dados que é passada para a função listarProdutos.
fetch("php/valor_produtos.php",{
    method: "GET"
}).then(async function (resposta){

    var total = await resposta.json();

    console.log(total);
    mostrarValor(total);
});


function mostrarValor(valor_total){

    //document.getElementById("valor_teste").value == valor_total;

    var conteudo = '';
    conteudo += '<div class="cards">';
    conteudo += '<div class="valort"> Seu total é: R$'+ valor_total +'.00</div>';
    conteudo += '</div>';
    // Colocar id="valor_saida" nas variaves de div e ver oq da

    document.getElementById("produtos").innerHTML += conteudo;
    document.getElementById("produtospix").innerHTML += conteudo;

}

function finalizar_compra(){
    if(document.getElementById("nome_compra").value != "" &&
    document.getElementById("cartao_compra").value != "" &&
    document.getElementById("expdate_compra").value != "" &&
    document.getElementById("codigoseg_compra").value != ""){
        if(document.getElementById("cartao_compra").value.length == 16 &&
        document.getElementById("expdate_compra").value.length == 5 &&
        document.getElementById("codigoseg_compra").value.length == 3){
            alert("Agradecemos por comprar em nossa loja!");
            var objetoForm = document.getElementById("compra");
            var dados = new FormData(objetoForm);
            fetch("php/tabela_compra.php",{
                method: "POST",
                body: dados
            });
            fetch("php/carrinho_deletar.php",{
                method: "GET"
            });
            window.location.href = "home.html";
        } else {
            alert("Alguma informação do cartão está errada.");
        }
    } else {
        alert("Algum campo está nulo!");
    }
}

function finalizar_compra_pix(){
        var objetoForm = document.getElementById("compra");
        var dados = new FormData(objetoForm);
        fetch("php/tabela_compra_pix.php",{
            method: "POST",
            body: dados
        });
        fetch("php/carrinho_deletar.php",{
            method: "GET"
        });
        alert("Obrigado por comprar conosco!");
        window.location.href = "home.html";
}

