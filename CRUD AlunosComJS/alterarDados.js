document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formAluno").addEventListener("submit", function (event) {
        event.preventDefault();

        enviarMatricula();
    });

    document.getElementById("formAltera").addEventListener("submit", function (event) {
        event.preventDefault();

        alteraDados();
    });
});

function  enviarMatricula(){
    let matricula = document.getElementById("pedeMatricula").value;
    console.log("Matricula: " + matricula );

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            console.log(this.responseText)
            let dadosAluno=JSON.parse(this.responseText);

           // console.log("MATRICULAAS"+dadosAluno[0].matricula);
            document.getElementById("matricula").value= dadosAluno[0].matricula;
            document.getElementById("nome").value= dadosAluno[0].nome;
            document.getElementById("email").value= dadosAluno[0].email;

            document.getElementById("pedir").style.display="none";
            document.getElementById("alterar").style.display="block";
        }
    }

    xmlhttp.open("POST", "encontrarAlunoJs.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    xmlhttp.send("matricula=" + matricula);
}

function alteraDados(){
    let matricula = document.getElementById("pedeMatricula").value;

    let nome= document.getElementById("nome").value;
    let novaMatricula= document.getElementById("matricula").value;
    let email = document.getElementById("email").value;

    console.log("NOME"+nome);
    console.log("MATRICULA"+novaMatricula);
    console.log("EMAIL"+email);


    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            console.log("RESOI"+this.responseText);

            let resposta =JSON.parse(this.responseText);

            document.getElementById("msg").innerHTML = "Resposta:" + resposta;
        }
    }


    xmlhttp.open("POST", "alterarDadosJs.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    xmlhttp.send("novaMatricula=" + novaMatricula+"&nome="+nome+"&email="+email+"&matricula="+matricula);

}