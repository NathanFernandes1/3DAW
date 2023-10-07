<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $arqProdut = fopen("produtos.txt", "r") or die("erro ao criar arquivo");
        $arqCarrin = fopen("carrinho.txt", "a") or die("erro ao criar arquivo");
        $x = 0;
       
		$linhas[] = fgets($arqProdut);

        $idbusca= $_GET['id'];
        $quant= $_GET['quantidade'];


    while (!feof($arqProdut)) {
			$linhas[] = fgets($arqProdut);
			$colunaDados = explode(";", $linhas[$x]);
			if (count($colunaDados) == 3) {
                $id = $colunaDados[0];
                $nome = $colunaDados[1];
                $valor = $colunaDados[2];


            if(($id==$idbusca)&&($quant>0)){

               $linha = $id . ";" . $nome . ";" . $quant . ";".$valor;
                fwrite($arqCarrin,$linha);
    fclose($arqProdut);


                fclose($arqCarrin);
            header('Location: listarProdutos.php?');
			
        }
    $x++;
    }

    }
}
?>
