<?php
// Conecta ao banco de dados
$servidor = "localhost";
$username = "root";
$senha = "";
$database = "3daw_teste";
$conexao = new mysqli($servidor, $username, $senha, $database);

// Verifica a conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Executa a consulta SQL para obter os dados do carrinho
$sql = "SELECT id, nome, quantidade, valor FROM carrinho";
$resultado = $conexao->query($sql);

// Cria um array para armazenar os itens do carrinho
$carrinho = array();
$soma = 0;

// Percorre os resultados da consulta e adiciona os itens ao carrinho
while ($linha = $resultado->fetch_assoc()) {
    $id = $linha["id"];
    $nome = $linha["nome"];
    $quantidade = $linha["quantidade"];
    $valor = $linha["valor"];
    $subtotal = $quantidade * $valor;

    $carrinho[] = array("id" => $id, "nome" => $nome, "quantidade" => $quantidade, "valor" => $valor, "subtotal" => $subtotal);

    $soma += $subtotal;
}

// Fecha a conexão
$conexao->close();

// Retorna os dados do carrinho e o valor total como uma string JSON
$retorno = array("carrinho" => $carrinho, "total" => $soma);
echo json_encode($retorno);
?>
