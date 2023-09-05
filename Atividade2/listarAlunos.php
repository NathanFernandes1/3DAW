<?php
$msg = "";

$arquivoAlunoIn = fopen("alunos.txt", "r") or die("Erro ao abrir o arquivo de alunos.");

$alunos = array();

while (!feof($arquivoAlunoIn)) {
    $linha = fgets($arquivoAlunoIn);
    $dados = explode(";", $linha);
    
    if (count($dados) == 3) { // Verifica se a linha possui 3 campos
        $aluno = array(
            'nome' => $dados[0],
            'matricula' => $dados[1],
            'email' => $dados[2]
        );
        
        $alunos[] = $aluno;
    }
}

fclose($arquivoAlunoIn);
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Lista de Alunos</h1>
<table>
<tr>
    <th>Nome</th>
    <th>Matrícula</th>
    <th>Email</th>
</tr>
<?php
foreach ($alunos as $aluno) {
    echo "<tr>";
    echo "<td>" . $aluno['nome'] . "</td>";
    echo "<td>" . $aluno['matricula'] . "</td>";
    echo "<td>" . $aluno['email'] . "</td>";
    echo "</tr>";
}
?>
</table>
<p><?php echo $msg ?></p>
<br>
</body>
</html>
