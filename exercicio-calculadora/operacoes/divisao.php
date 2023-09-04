<?php
function divisao($v1, $v2) {
    if ($v2 == 0) {
        return "Erro: Divisão por zero!";
    }
    return $v1 / $v2;
}

$v1 = $_GET["v1"];
$v2 = $_GET["v2"];

$result = divisao($v1, $v2);
$operacao = "/";

if (is_numeric($result)) {
    echo "<h2>$v1 $operacao $v2 = $result</h2>";
} else {
    echo "<h2>$result</h2>";
}
?>
