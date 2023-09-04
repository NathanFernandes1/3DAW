<?php
function adicao($v1, $v2) {
    return $v1 + $v2;
}

$v1 = $_GET["v1"];
$v2 = $_GET["v2"];

$result = adicao($v1, $v2);
$operacao = "+";

echo "<h2>$v1 $operacao $v2 = $result</h2>";
?>
