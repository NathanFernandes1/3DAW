document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formCandidato").addEventListener("submit", function (event) {
        event.preventDefault();

        enviarCpf();
    });

    document.getElementById("formAltera").addEventListener("submit", function (event) {
        event.preventDefault();

        alteraDados();
    });
});

function  enviarCpf(){
    let Cpf = document.getElementById("pedeCpf").value;
    console.log("Cpf: " + Cpf );

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            console.log(this.responseText)
            let dadosCandidato=JSON.parse(this.responseText);

           // console.log("CpfAS"+dadosCandidato[0].Cpf);
            document.getElementById("sala").value= dadosCandidato[0].sala;
            
        }
    }

    xmlhttp.open("POST", "encontrarCandidatoJs.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    xmlhttp.send("Cpf=" + Cpf);
}

function alteraDados(){
    let Cpf = document.getElementById("pedeCpf").value;

    let novaSala= document.getElementById("sala").value;
    
    


    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            
            let resposta =JSON.parse(this.responseText);

            document.getElementById("msg").innerHTML = "Resposta:" + resposta;
        }
    }


    xmlhttp.open("POST", "alterarDadosJs.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    xmlhttp.send("novaSala=" + novaSala);

}