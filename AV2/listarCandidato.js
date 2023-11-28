document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formCandidato").addEventListener("submit", function (event) {
        event.preventDefault();

        listarCandidatos();
    });
});

function listarCandidatos(){
    let sala = document.getElementById("sala").value;

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            console.log("RESPOSTA:"+this.responseText)
            
            let dadosCandidato=JSON.parse(this.responseText);
            if(dadosCandidato==""){
                document.getElementById("msg").innerHTML = "Sala não encontrada!";
                document.getElementById("pedirSala").style.display="none";

            }
            else{

            


            document.getElementById("listar").style.display="block";
            document.getElementById("pedirSala").style.display="none";

            let tabela= document.getElementById("listarCandidatos");

            for(let i=0; i<dadosCandidato.length;i++){
                let linha= tabela.insertRow(-1);
                let sala= linha.insertCell(0);
                let nome= linha.insertCell(1);
                let cpf= linha.insertCell(2);
                let email= linha.insertCell(3);
                let identidade= linha.insertCell(4);
                let cargo= linha.insertCell(5);
                


                sala.innerHTML = dadosCandidato[i].sala;
                nome.innerHTML = dadosCandidato[i].nome;
                cpf.innerHTML = dadosCandidato[i].cpf;
                email.innerHTML = dadosCandidato[i].email
                identidade.innerHTML = dadosCandidato[i].identidade
                cargo.innerHTML = dadosCandidato[i].identidade
            }
        }
    }
    }
    xmlhttp.open("GET","listarCandidato.php?sala="+sala);
    xmlhttp.send();
}