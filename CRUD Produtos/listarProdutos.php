<?php
$arqProdut = fopen("produtos.txt", "r") or die("erro ao criar arquivo");
$x = 0;

echo "<table>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>NOME</th>";
echo "<th>VALOR</th>";
echo "</tr>";

while (!feof($arqProdut)) {
    $linhas[] = fgets($arqProdut);
    $colunaDados = explode(";", $linhas[$x]);

        if (count($colunaDados) == 3) {
    $id = $colunaDados[0];
    $nome = $colunaDados[1];
    $valor = $colunaDados[2];

    echo "<tr>";
    echo "<td>" . $id . "</td>";
    echo "<td>" . $nome . "</td>";
    echo "<td>" ."R$". $valor . "</td>";
    echo '<td><form action="removerProduto.php?nome=" method="GET">
            <input type="hidden" name="id" value="' . $id . '">
            <button type="submit">Remover produto</button>
        </form></td>';
        echo '<td><form action="alterarProduto.php" method="GET">
            <input type="hidden" name="id" value="' . $id . '">
            <input type="hidden" name="nome" value="' . $nome . '">
            <input type="hidden" name="valor" value="' . $valor . '">
            <button type="submit">Alterar produto</button>
        </form></td>';
    echo "</tr>";

    $x++;
        }
}
echo "</table>";
fclose($arqProdut);

?>
