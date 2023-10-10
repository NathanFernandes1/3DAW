<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET["id"];
    $nome = $_GET["nome"];
    $preco = $_GET["valor"];
    echo '<h1>Incluir Produto</h1>
    <form action="alterarProduto.php" method="POST">
        Nome do produto:<input type="text" name="Nome" value="'.$nome.'">
        <br><br>
        <input type="hidden" name="id" value="'.$id.'">
        Preço do produto:<input type="text" name="preco" value="'.$preco.'">
        <br><br>
        <input type="submit" value="Salvar Alteracoes">';
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idbusca = $_POST["id"];
    $novoNome = $_POST["Nome"];
    $novoPreco = $_POST["preco"];

    $arqProdut = fopen("produtos.txt", "r") or die("erro ao criar arquivo");
        $arqAux = fopen("auxiliar.txt", "w") or die("erro ao criar arquivo");
        $x = 0;
       
		$linhas[] = fgets($arqProdut);


    while (!feof($arqProdut)) {
			$linhas[] = fgets($arqProdut);
			$colunaDados = explode(";", $linhas[$x]);
			
            if (count($colunaDados) == 3) {
                $id = $colunaDados[0];
                $nome = $colunaDados[1];
                $preco = $colunaDados[2];


            if($id!=$idbusca){
                $linha = $id.";".$nome.";".$preco;
                fwrite($arqAux,$linha);
        }
        else{
            $linha = $id.";".$novoNome.";".$novoPreco."\n";
            fwrite($arqAux,$linha);
        }
    $x++;
    
    }
    }
    fclose($arqAux);
    fclose($arqProdut);
    rename("auxiliar.txt", "produtos.txt");

    header('Location: listarProdutos.php?');

}
?>