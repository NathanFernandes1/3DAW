<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$sigla = "";
$carga = "";
$nome = "";
$msg = "";
$encontrou = 0;

$siglabusca = $_POST['sigla'];

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
        
                if ($sigla == $siglabusca) {
                    echo "<tr>";
                    echo "<td>" . $nome . "&nbsp;","</td>";
                    echo "<td>" . $sigla . "&nbsp;","</td>";
                    echo "<td>" . $carga . "&nbsp;","</td>";
                    echo "</tr>";

                    echo "<br>","<br>";
                    echo '<form action="alterarDisciplinaPart2.php" method="get">
                    <input type="hidden" name="sigla" value="'.$siglabusca.'">
                    <button type="submit">Alterar Dados</button>
                    </form>';

                    
                    echo '<form action="removerDisciplina.php" method="get">
                    <input type="hidden" name="sigla" value="'.$siglabusca.'">
                    <button type="submit">Remover Disciplina</button>
                    </form><br><br>';
                    $encontrou = 1;
                   // fclose($arqDisc);
                }
            }
        
            $x++;
        }

        if($encontrou == 0){
            echo "Disciplina não encontrada";
        }
fclose($arqDisc);
    }
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Buscar Disciplina</h1>
        <form method="POST">
            Sigla da Disciplina:<input type = "text" name="sigla" required>
            <br> <br>
            <input type = "Submit" name="enviar" value="Enviar">
            <br> <br>
        </form>

        <form action="incluirDisciplinas.php">
            <input type = "Submit" name="incluir" value="Incluir nova disciplina">
        </form>
    </body>
</html>
