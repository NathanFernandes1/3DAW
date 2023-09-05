<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $matricula = $_POST["matricula"];
    $email = $_POST["email"];
    
    // Verifica se todos os campos foram preenchidos
    if (empty($nome) || empty($matricula) || empty($email)) {
        $msg = "Por favor, preencha todos os campos.";
    } else {
        // Abre o arquivo para escrita
        $arqAlunos = fopen("alunos.txt", "a") or die("Erro ao criar arquivo.");
        
        // Formata a linha a ser escrita no arquivo
        $linha = $nome . ";" . $matricula . ";" . $email . "\n";
        
        // Escreve a linha no arquivo
        fwrite($arqAlunos, $linha);
        
        // Fecha o arquivo
        fclose($arqAlunos);
        
        $msg = "Aluno cadastrado com sucesso!";
    }
    echo $msg;
}
?>
