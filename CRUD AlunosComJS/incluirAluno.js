document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formAluno").addEventListener("submit", function (event) {
        event.preventDefault();

        incluirAluno();
    });
});

    function incluirAluno(){
    
        let nome= document.getElementById("nome").value;
        let matricula= document.getElementById("matricula").value;
        let email = document.getElementById("email").value;

        console.log("NOME"+nome);
        console.log("MATRICULA"+matricula);
        console.log("EMAIL"+email);


        let xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
            if(this.readyState==4 && this.status==200){
                console.log(this.responseText);

                let resposta =JSON.parse(this.responseText);

                document.getElementById("msg").innerHTML = "Resposta:" + resposta;
            }
        }


        xmlhttp.open("GET","incluirAlunoJs.php?matricula="+matricula+"&nome="+nome+"&email="+email);
        xmlhttp.send();
}
