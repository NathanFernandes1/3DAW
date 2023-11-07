document.addEventListener("DOMContentLoaded", function() {
    carregarCarrinho();
});

function carregarCarrinho() {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let resposta = JSON.parse(this.responseText);
            let carrinho = resposta.carrinho;
            let total = resposta.total;
            let tabela = document.getElementById("tabelaCarrinho");

            for (let i = 0; i < carrinho.length; i++) {
                let linha = tabela.insertRow(-1);
                let id = linha.insertCell(0);
                let nome = linha.insertCell(1);
                let quant = linha.insertCell(2);
                let valor = linha.insertCell(3);
                let subtotal = linha.insertCell(4);
                let acao = linha.insertCell(5);

                id.innerHTML = carrinho[i].id;
                nome.innerHTML = carrinho[i].nome;
                quant.innerHTML = carrinho[i].quantidade + "x";
                valor.innerHTML = "R$ " + carrinho[i].valor;
                subtotal.innerHTML = "R$ " + carrinho[i].subtotal.toFixed(2);
                acao.innerHTML = '<form action="remover.php" method="GET">' +
                    '<input type="hidden" name="id" value="' + carrinho[i].id + '">' +
                    '<button type="submit">Remover produto</button>' +
                    '</form>';
            }

            document.getElementById("valorTotal").innerHTML = "Valor total: R$ " + total.toFixed(2);
        }
    };

    xmlhttp.open("GET", "listarCarrinho.php", true);
    xmlhttp.send();
}
