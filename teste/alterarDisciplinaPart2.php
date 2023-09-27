<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $arqDisc = fopen("disciplinas.txt", "r") or die("erro ao criar arquivo");
        $arqDiscAux = fopen("disciplinas2.txt", "w") or die("erro ao criar arquivo");
        $x = 0;
       
        $nume=0;
		$linhas[] = fgets($arqDisc);

        $siglabusca= $_GET['sigla'];

    $tipoDado= $_POST['TipoDado'];
    $novoDado= $_POST['novoDado'];

while (!feof($arqDisc)) {
			$linhas[] = fgets($arqDisc);
			$colunaDados = explode(";", $linhas[$x]);
			if (count($colunaDados) >= 3) {
                $nome = $colunaDados[0];
                $sigla = $colunaDados[1];
                $carga = $colunaDados[2];


            if($sigla==$siglabusca){

                if($tipoDado=='nome'){
                    $linha = $novoDado . ';' . $sigla . ';' . $carga . ';' . "\n";
                    fwrite($arqDiscAux, $linha);
                }
                else{
                    $linha = $nome . ';' . $sigla . ';' . $novoDado . ';' . "\n";
                    fwrite($arqDiscAux, $linha);
                }
                echo "Alteração concluida!";
            }
            else{
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
        <h1>Alterar dados da disciplina</h1>
        <form method="POST">
        <select name="TipoDado" >
            <option value="nome">nome</option>
            <option value="carga">carga Horaria</option>
        </select>
        <input type="text" name="novoDado" required>
        <br><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>

