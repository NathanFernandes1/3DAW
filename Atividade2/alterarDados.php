<!DOCTYPE html>
<html>
<head>
    <title>Consulta e Edição de Alunos</title>
</head>
<body>
    <h1>Consulta e Edição de Alunos</h1>

    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matriculaEditar = $_POST['matricula'];

    // Função para carregar os dados de alunos a partir do arquivo
    function carregarAlunos()
    {
        $arquivoAlunoIn = fopen("alunos.txt", "r") or die("Erro ao abrir o arquivo de alunos.");
        $alunos = array();

        while (!feof($arquivoAlunoIn)) {
            $linha = fgets($arquivoAlunoIn);
            $dados = explode(";", $linha);

            if (count($dados) == 3) {
                $aluno = array(
                    'nome' => $dados[0],
                    'matricula' => $dados[1],
                    'email' => $dados[2]
                );
                $alunos[] = $aluno;
            }
        }

        fclose($arquivoAlunoIn);
        return $alunos;
    }

    // Função para salvar os dados atualizados no arquivo
    function salvarAlunos($alunos)
    {
        $arquivoAlunoOut = fopen("alunos.txt", "w") or die("Erro ao abrir o arquivo de alunos.");

        foreach ($alunos as $aluno) {
            // Escrever os dados atualizados no arquivo
            $linha = $aluno['nome'] . ';' . $aluno['matricula'] . ';' . $aluno['email'] . "\n";
            fwrite($arquivoAlunoOut, $linha);
        }

        fclose($arquivoAlunoOut);
    }

    $alunos = carregarAlunos();
    $alunoEncontrado = null;

    foreach ($alunos as &$aluno) {
        if ($aluno['matricula'] == $matriculaEditar) {
            $alunoEncontrado = &$aluno; // Usar referência para o aluno encontrado
            break;
        }
    }

    if ($alunoEncontrado) {
        exibirAluno($alunoEncontrado);

        if (isset($_POST['salvar'])) {
            $novoValor = $_POST['novo_valor'];
            $campoEditar = $_POST['campo'];

            // Atualizar os dados do aluno
            $alunoEncontrado[$campoEditar] = $novoValor;

            // Salvar os dados atualizados no arquivo
            salvarAlunos($alunos);

            echo "<p>Dados atualizados com sucesso!</p>";
        }
    } else {
        echo "<p>Aluno não encontrado.</p>";
    }
}

function exibirAluno($aluno)
{
    echo "<h2>Dados do Aluno</h2>";
    echo "<p>Matrícula: " . $aluno['matricula'] . "</p>";
    echo "<p>Nome: " . $aluno['nome'] . "</p>";
    echo "<p>Email: " . $aluno['email'] . "</p>";
    echo "<form method='post'>";
    echo "<input type='hidden' name='matricula' value='" . $aluno['matricula'] . "'>";
    echo "Novo valor: <input type='text' name='novo_valor'>";
    echo "<select name='campo'>";
    echo "<option value='nome'>Nome</option>";
    echo "<option value='email'>Email</option>";
    echo "</select>";
    echo "<input type='submit' name='salvar' value='Salvar'>";
    echo "</form>";
}
?>



    <h2>Consultar Aluno por Matrícula</h2>
    <form method="post">
        <label for="matricula">Matrícula do Aluno:</label>
        <input type="text" name="matricula" required>
        <input type="submit" value="Consultar">
    </form>
</body>
</html>
