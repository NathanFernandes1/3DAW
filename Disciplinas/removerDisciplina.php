<?php
        
        $arqDisc = fopen("disciplinas.txt", "r") or die("erro ao criar arquivo");
        $arqDiscAux = fopen("disciplinas2.txt", "w") or die("erro ao criar arquivo");
        $x = 0;
       
        $nume=0;
		$linhas[] = fgets($arqDisc);

        $siglabusca= $_GET['sigla'];
//		echo $linhas[0];
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
while (!feof($arqDisc)) {
			$linhas[] = fgets($arqDisc);
			$colunaDados = explode(";", $linhas[$x]);
			if (count($colunaDados) >= 3) {
                $nome = $colunaDados[0];
                $sigla = $colunaDados[1];
                $carga = $colunaDados[2];

                if($sigla!=$siglabusca){
                    
                        $linha = $nome . ';' . $sigla . ';' . $carga . ';' . "\n";
                                fwrite($arqDiscAux, $linha);
                    
                }
              
    $x++;
        }
}

fclose($arqDisc);
fclose($arqDiscAux);

rename("disciplinas2.txt", "disciplinas.txt");

}
?>

<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <form method="POST">
        <br><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>

