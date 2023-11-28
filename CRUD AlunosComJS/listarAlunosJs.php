<?php
$servidor = "localhost";
$username = "root";
$senha = "";
$database = "3daw_teste";
$conexao =new mysqli($servidor, $username, $senha, $database);

if($conexao->connect_error){
    die("Conexão falhou: ".$conexao->connect_error);
}

$comandoSQL = "SELECT matricula, nome, email FROM alunos";

$resultado = $conexao->query($comandoSQL);
$alunos = array();

while($linha=$resultado->fetch_assoc()){
    $alunos[]=array("matricula"=>$linha["matricula"],"nome"=>$linha["nome"],"email"=>$linha["email"]);
}

$conexao->close();

echo json_encode($alunos);
?>