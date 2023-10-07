<?php
$id = "";
$nome = "";
$quant = "";
$valor = "";
$soma = 0;
$multiplicacao = "";

$arqCarrin = fopen("carrinho.txt", "r") or die("erro ao criar arquivo");
$x = 0;
$linhas[] = fgets($arqCarrin);

echo "<table>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>NOME</th>";
echo "<th>QUANT</th>";
echo "<th>VALOR-UNID</th>";
echo "</tr>";

while (!feof($arqCarrin)) {
    $linhas[] = fgets($arqCarrin);
    $colunaDados = explode(";", $linhas[$x]);

    $id = $colunaDados[0];
    $nome = $colunaDados[1];
    $quant = $colunaDados[2];
    $valor = $colunaDados[3];

    echo "<tr>";
    echo "<td>" . $id . "</td>";
    echo "<td>" . $nome . "</td>";
    echo "<td>" . $quant ."x". "</td>";
    echo "<td>" . $valor . "</td>";
    echo '<td><form action="remover.php" method="GET">
                <input type="hidden" name="id" value="'.$id.'">
                <button type="submit">Remover produto</button>
                </form></td>';
    echo "</tr>";

    $valorComPonto = str_replace(',', '.', $valor);
    $multiplicacao = $quant * $valorComPonto;
    $soma = $multiplicacao + $soma;

    $x++;
}
echo "</table>";

echo "<h2>Valor total:</h2>";
echo "R$: " . $soma;
fclose($arqCarrin);
?>
