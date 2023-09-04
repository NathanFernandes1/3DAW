<?php
function raiz($v1) {
    return sqrt($v1);
}

$v1 = $_GET["v1"];

$result = raiz($v1);
$operacao = "√";

echo "<h2>$operacao($v1) = $result</h2>";
?>
