<?php
    $matricula = $_GET["matricula"];
    $nome = $_GET["nome"];
    $email = $_GET["email"];

    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "3daw_teste";
    $conn = new mysqli($servidor,$username,$senha,$database);
    if ($conn->connect_error) {
       die("Conexao falhou, avise o administrador do sistema");
    }
    $comandoSQL = "INSERT INTO `alunos` (nome,matricula,email) values ('$nome','$matricula','$email')";
    $resultado = $conn->query($comandoSQL);

    $retorno=json_encode($resultado);
    echo $retorno;
?>