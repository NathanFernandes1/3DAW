<?php
    $matricula = $_POST["matricula"];
    $email = $_POST["email"];
    $nome = $_POST["nome"];
    $novaMatricula = $_POST["novaMatricula"];

    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "3daw_teste";
    $conexao =new mysqli($servidor, $username, $senha, $database);

    if ($conexao->connect_error) {
       die("Conexao falhou, avise o administrador do sistema");
    }
    $comandoSQL = "UPDATE alunos SET nome='$nome', email='$email',matricula=$novaMatricula WHERE matricula=$matricula";
    $resultado = $conexao->query($comandoSQL);


    $retorno=json_encode($resultado);
    echo $retorno;
?>