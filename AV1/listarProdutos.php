<?php
$arqProdut = fopen("produtos.txt", "r") or die("erro ao criar arquivo");
$x = 0;
$linhas[] = fgets($arqProdut);

echo "<table>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>NOME</th>";
echo "<th>VALOR</th>";
echo "</tr>";

while (!feof($arqProdut)) {
    $linhas[] = fgets($arqProdut);
    $colunaDados = explode(";", $linhas[$x]);

    $id = $colunaDados[0];
    $nome = $colunaDados[1];
    $valor = $colunaDados[2];

    echo "<tr>";
    echo "<td>" . $id . "</td>";
    echo "<td>" . $nome . "</td>";
    echo "<td>" ."R$". $valor . "</td>";
    echo '<td><form action="adicionarCarrinho.php" method="GET">
            <input type="hidden" name="id" value="' . $id . '">
            <select name="quantidade">
                <option value="1">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <button type="submit">Adicionar produto</button>
        </form></td>';
    echo "</tr>";

    $x++;
}
echo "</table>";
fclose($arqProdut);
echo '<form action="listarCarrinho.php">
        <input type="hidden">
        <button type="submit">Ver Carrinho</button>
                </form>'
?>
