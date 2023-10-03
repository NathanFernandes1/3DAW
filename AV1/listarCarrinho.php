<?php
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$id = "";
$nome = "";
$quant = "";
$valor = "";
$multiplicacao= "";
$soma= "0";

$arqCarrin = fopen("carrinho.txt", "r") or die("erro ao criar arquivo");
$x = 0;
       
		$linhas[] = fgets($arqCarrin);
        
        echo "<h2>ID NOME QUANT VALOR</h2>";
        while (!feof($arqCarrin)) {
            $linhas[] = fgets($arqCarrin);
            $colunaDados = explode(";", $linhas[$x]);
        
            
                $id = $colunaDados[0];
                $nome = $colunaDados[1];
                $quant = $colunaDados[2];
                $valor = $colunaDados[3];
        
                echo "<tr>";
                echo "<td>" . $id . "&nbsp;","</td>";
                echo "<td>" . $nome . "&nbsp;","</td>";
                echo "<td>" . $quant . "&nbsp;","</td>";
                echo "<td>" . $valor . "&nbsp;","</td>";
                
               $multiplicacao= $quant*$valor;
                $soma= $multiplicacao+$soma;

            
        
            $x++;
        }
        
        echo "<h2>Valor total:</h2>";
        echo "R$:".$soma;
fclose($arqCarrin);
    //}
?>
