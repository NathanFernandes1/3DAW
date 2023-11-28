document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formCandidato").addEventListener("submit", function (event) {
        event.preventDefault();

        incluirCandidato();
    });
});

    function incluirCandidato(){
    
        let nome= document.getElementById("nome").value;
        let sala= document.getElementById("sala").value;
        let email = document.getElementById("email").value;
        let cpf = document.getElementById("cpf").value;
        let identidade = document.getElementById("identidade").value;
        let cargo = document.getElementById("cargo").value;




        console.log("NOME"+nome);
        console.log("sala"+sala);
        console.log("EMAIL"+email);


        let xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
            if(this.readyState==4 && this.status==200){
                console.log(this.responseText);

                let resposta =JSON.parse(this.responseText);

                document.getElementById("msg").innerHTML = "Resposta:" + resposta;
            }
        }


        xmlhttp.open("GET","incluirCandidatoJs.php?sala="+sala+"&nome="+nome+"&email="+email+"&cpf="+cpf+"&identidade="+identidade+"&cargo="+cargo);
        xmlhttp.send();
}