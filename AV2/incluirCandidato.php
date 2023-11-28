<?php
    $sala = $_GET["sala"];
    $nome = $_GET["nome"];
    $email = $_GET["email"];
    $cpf = $_GET["cpf"];
    $identidade = $_GET["identidade"];
    $cargo = $_GET["cargo"];

    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "3daw_teste";
    $conn = new mysqli($servidor,$username,$senha,$database);
    if ($conn->connect_error) {
       die("Conexao falhou, avise o administrador do sistema");
    }
    $comandoSQL = "INSERT INTO `candidatos` (nome,sala,email,cpf,identidade,cargo) values ('$nome','$sala','$email','$cpf','$identidade','$cargo')";
    $resultado = $conn->query($comandoSQL);

    $retorno=json_encode($resultado);
    echo $retorno;
?>