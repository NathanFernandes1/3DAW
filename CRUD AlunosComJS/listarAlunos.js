document.addEventListener("DOMContentLoaded",function(){
    listarAlunos();
});

function listarAlunos(){
    let xmlhttp= new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status== 200){
            console.log(this.responseText);
            console.log("RESPOSTA"+this.responseText);
            let alunos= JSON.parse(this.responseText);
            let tabela= document.getElementById("tabelaAlunos");

            for(let i=0; i<alunos.length;i++){
                let linha= tabela.insertRow(-1);
                let matricula= linha.insertCell(0);
                let nome= linha.insertCell(1);
                let email= linha.insertCell(2);

                matricula.innerHTML = alunos[i].matricula;
                nome.innerHTML = alunos[i].nome;
                email.innerHTML = alunos[i].email;
            }
        }

       
    }
    xmlhttp.open("GET","listarAlunosJs.php");
        xmlhttp.send();
}