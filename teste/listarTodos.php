<?php
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$sigla = "";
$carga = "";
$nome = "";
$msg = "";

$arqDisc = fopen("disciplinas.txt", "r+") or die("erro ao criar arquivo");
$x = 0;
       
        $nume=0;
		$linhas[] = fgets($arqDisc);

        while (!feof($arqDisc)) {
            $linhas[] = fgets($arqDisc);
            $colunaDados = explode(";", $linhas[$x]);
        
            // Verifica se o array tem pelo menos 3 elementos antes de acessar seus índices
            if (count($colunaDados) >= 3) {
                $nome = $colunaDados[0];
                $sigla = $colunaDados[1];
                $carga = $colunaDados[2];
        
                echo "<tr>";
                echo "<td>" . $nome . "&nbsp;","</td>";
                echo "<td>" . $sigla . "&nbsp;","</td>";
                echo "<td>" . $carga . "&nbsp;","</td>";
                
                echo '<form action="alterarDisciplinaPart2.php" method="get">
                <input type="hidden" name="sigla" value="'.$sigla.'">
                <button type="submit">Alterar Dados</button>
                </form>';

                
                echo '<form action="removerDisciplina.php" method="get">
                <input type="hidden" name="sigla" value="'.$sigla.'">
                <button type="submit">Remover Disciplina</button>
                </form><br><br>';
            }
        
            $x++;
        }

        
fclose($arqDisc);
    //}
?>