<?php
$sala=$_GET["sala"];

$cont=0;
$servidor = "localhost";
$username = "root";
$senha = "";
$database = "candidatos";
$conexao =new mysqli($servidor, $username, $senha, $database);

if($conexao->connect_error){
    die("Conexão falhou: ".$conexao->connect_error);
}

$comandoSQL = "SELECT sala, nome, email, cpf, identidade, cargo FROM candidatos  WHERE sala=$sala";

$resultado = $conexao->query($comandoSQL);
$candidatos = array();

while ($linha = $resultado->fetch_assoc()) {
    $cont++;
    $candidatos[] = array("sala" => $linha["sala"], "nome" => $linha["nome"], "email" => $linha["email"], "cpf" => $linha["cpf"], "identidade" => $linha["identidade"], "cargo" => $linha["cargo"]);
}

$conexao->close();

echo json_encode($candidatos);
?>