<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $arqCarrin = fopen("carrinho.txt", "r") or die("erro ao criar arquivo");
        $arqAux = fopen("auxiliar.txt", "w") or die("erro ao criar arquivo");
        $x = 0;
       
		$linhas[] = fgets($arqCarrin);

        $idbusca= $_GET['id'];


    while (!feof($arqCarrin)) {
			$linhas[] = fgets($arqCarrin);
			$colunaDados = explode(";", $linhas[$x]);
			if (count($colunaDados) >= 3) {
                $id = $colunaDados[0];
                $nome = $colunaDados[1];
                $quant = $colunaDados[2];
                $valor = $colunaDados[3];


            if($id==$idbusca){
                $quant= $quant-1;
                if($quant!=0){
                    $linha = $id . ";" . $nome . ";" . $quant . ";".$valor;
                    fwrite($arqAux,$linha);
                }
			
        }
        else{
            $linha = $id . ";" . $nome . ";" . $quant . ";".$valor;
            fwrite($arqAux,$linha);
        }
    $x++;
    }

    }
    fclose($arqAux);
    fclose($arqCarrin);
    rename("auxiliar.txt", "carrinho.txt");

    header('Location: listarCarrinho.php?');
}
?>