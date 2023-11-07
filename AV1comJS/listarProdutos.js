document.addEventListener("DOMContentLoaded", function() {
    carregarProdutos();
});

function carregarProdutos() {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let produtos = JSON.parse(this.responseText);
            let tabela = document.getElementById("tabelaProdutos");

            for (let i = 0; i < produtos.length; i++) {
                let linha = tabela.insertRow(-1);
                let id = linha.insertCell(0);
                let nome = linha.insertCell(1);
                let valor = linha.insertCell(2);
                let acao = linha.insertCell(3);

                id.innerHTML = produtos[i].id;
                nome.innerHTML = produtos[i].nome;
                valor.innerHTML = "R$ " + produtos[i].valor;
                acao.innerHTML = '<form action="adicionarCarrinho.php" method="GET">' +
                    '<input type="hidden" name="id" value="' + produtos[i].id + '">' +
                    '<select name="quantidade">' +
                    '<option value="1">0</option>' +
                    '<option value="1">1</option>' +
                    '<option value="2">2</option>' +
                    '<option value="3">3</option>' +
                    '<option value="4">4</option>' +
                    '<option value="5">5</option>' +
                    '<option value="6">6</option>' +
                    '<option value="7">7</option>' +
                    '<option value="8">8</option>' +
                    '<option value="9">9</option>' +
                    '<option value="10">10</option>' +
                    '</select>' +
                    '<button type="submit">Adicionar produto</button>' +
                    '</form>';
            }
        }
    };

    xmlhttp.open("GET", "produtos.php", true);
    xmlhttp.send();
}
