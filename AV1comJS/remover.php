<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
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

    // Obtém o ID do produto a ser removido
    $idbusca = $_GET['id'];


   // Obtém a quantidade do produto no carrinho
$sql = "SELECT quantidade FROM carrinho WHERE id = $idbusca";
$resultado = $conexao->query($sql);
$linha = $resultado->fetch_assoc();
$quantidade = $linha["quantidade"];

// Atualiza a quantidade do produto no carrinho
if ($quantidade > 1) {
    $quantidade--;
    $sql = "UPDATE carrinho SET quantidade = $quantidade WHERE id = $idbusca";
    $conexao->query($sql);
} else {
    $sql = "DELETE FROM carrinho WHERE id = $idbusca";
    $conexao->query($sql);
}

    // Fecha a conexão
    $conexao->close();

    // Redireciona para a página de listar carrinho
    header('Location: listarCarrinho.html');
}
?>
