<?php
// Conecta ao banco de dados
$servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "3daw_teste";
    $conexao = new mysqli($servidor,$username,$senha,$database);
// Verifica a conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Executa a consulta SQL para obter os produtos
$sql = "SELECT id, nome, valor FROM produtos";
$resultado = $conexao->query($sql);

// Cria um array para armazenar os produtos
$produtos = array();

// Percorre os resultados da consulta e adiciona os produtos ao array
while ($linha = $resultado->fetch_assoc()) {
    $produtos[] = array("id" => $linha["id"], "nome" => $linha["nome"], "valor" => $linha["valor"]);
}

// Fecha a conexão
$conexao->close();

// Retorna os produtos como uma string JSON
echo json_encode($produtos);
?>
