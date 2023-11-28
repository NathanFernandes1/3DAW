document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formFiscal").addEventListener("submit", function (event) {
        event.preventDefault();

        incluirFiscal();
    });
});

    function incluirFiscal(){
    
        let nome= document.getElementById("nome").value;
        let sala= document.getElementById("sala").value;
        let cpf = document.getElementById("cpf").value;



        let xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
            if(this.readyState==4 && this.status==200){
                console.log(this.responseText);

                let resposta =JSON.parse(this.responseText);

                document.getElementById("msg").innerHTML = "Resposta:" + resposta;
            }
        }


        xmlhttp.open("GET","incluirFiscalJs.php?sala="+sala+"&nome="+nome+"&cpf="+cpf);
        xmlhttp.send();
}