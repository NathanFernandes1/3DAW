<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $arqProdut = fopen("produtos.txt", "r") or die("erro ao criar arquivo");
        $arqAux = fopen("auxiliar.txt", "w") or die("erro ao criar arquivo");
        $x = 0;
       
		$linhas[] = fgets($arqProdut);

        $idbusca= $_GET['id'];


    while (!feof($arqProdut)) {
			$linhas[] = fgets($arqProdut);
			$colunaDados = explode(";", $linhas[$x]);
			if (count($colunaDados) >= 3) {
                $id = $colunaDados[0];
                $nome = $colunaDados[1];
                $valor = $colunaDados[2];


            if($id!=$idbusca){
                $linha = $id . ";" . $nome . ";" . $valor;
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