document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("calculadoraForm").addEventListener("submit", function (event) {
        event.preventDefault(); 

        let op1 = document.getElementById("op1").value;
        let operador = document.getElementById("operador").value;
        let op2 = document.getElementById("op2").value;
        
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 console.log(this.responseText);

                let resultado = JSON.parse(this.responseText);
                
                document.getElementById("resultado").innerHTML = "Resultado: " + resultado;
            }
        };
        
        

        switch (operador) {
            case "adicao":
                xmlhttp.open("GET", "operacoes/soma.php?v1=" + op1 + "&v2=" + op2, true);
                xmlhttp.send();
                break;

            case "subtracao":
                xmlhttp.open("GET", "operacoes/subtracao.php?v1=" + op1 + "&v2=" + op2, true);
                xmlhttp.send();
                break;

            case "divisao":
                xmlhttp.open("GET", "operacoes/divisao.php?v1=" + op1 + "&v2=" + op2, true);
                xmlhttp.send();
                break;

            case "multiplicacao":
                xmlhttp.open("GET", "operacoes/multiplicacao.php?v1=" + op1 + "&v2=" + op2, true);
                xmlhttp.send();
                break;

            case "seno":
                xmlhttp.open("GET", "operacoes/seno.php?v1=" + op1 + '&v2=' + op2, true);
                xmlhttp.send();
                break;

            case "cosseno":
                xmlhttp.open("GET", "operacoes/cosseno.php?v1=" + op1 + '&v2=' + op2, true);
                xmlhttp.send();
                break;

            case "tangente":
                xmlhttp.open("GET", "operacoes/tangente.php?v1=" + op1 + '&v2=' + op2, true);
                xmlhttp.send();
                break;

            case "raiz":
                xmlhttp.open("GET", "operacoes/raiz.php?v1=" + op1 + '&v2=' + op2, true);
                xmlhttp.send();
                break;

            case "exponenciacao":
                xmlhttp.open("GET", "operacoes/exponenciacao.php?v1=" + op1 + '&v2=' + op2, true);
                xmlhttp.send();
                break;
        }
    });
});
