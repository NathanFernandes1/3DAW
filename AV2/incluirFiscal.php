<?php
    $sala = $_GET["sala"];
    $nome = $_GET["nome"];
    $cpf = $_GET["cpf"];


    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "3daw_teste";
    $conn = new mysqli($servidor,$username,$senha,$database);
    if ($conn->connect_error) {
       die("Conexao falhou, avise o administrador do sistema");
    }
    $comandoSQL = "INSERT INTO `fiscais` (nome,sala,cpf,) values ('$nome','$sala','$cpf')";
    $resultado = $conn->query($comandoSQL);

    $retorno=json_encode($resultado);
    echo $retorno;
?>