<?php
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$sigla = "";
$carga = "";
$nome = "";

$arqProdut = fopen("produtos.txt", "r+") or die("erro ao criar arquivo");
$x = 0;
       
        $nume=0;
		$linhas[] = fgets($arqProdut);
        
        echo "<h2>ID NOME VALOR</h2>";
        while (!feof($arqProdut)) {
            $linhas[] = fgets($arqProdut);
            $colunaDados = explode(";", $linhas[$x]);
        
                $id = $colunaDados[0];
                $nome = $colunaDados[1];
                $valor = $colunaDados[2];
        
                echo "<tr>";
                echo "<td>" . $id . "&nbsp;","</td>";
                echo "<td>" . $nome . "&nbsp;","</td>";
                echo "<td>" . $valor . "&nbsp;","</td>";
                
                echo '<select name="quantidade">
                <option value="1">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>';

                
                echo '<form action="adicionarCarrinho.php" method="GET">
                <input type="hidden" name="id" value="'.$id.'">
                <button type="submit">Adicionar produto</button>
                </form><br><br>';
            
        
            $x++;
        
            

            
fclose($arqProdut);
    //}
?>
