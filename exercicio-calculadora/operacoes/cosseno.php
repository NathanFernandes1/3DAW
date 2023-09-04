<?php
function cosseno($v1) {
    return cos(deg2rad($v1));
}

$v1 = $_GET["v1"];

$result = cosseno($v1);
$operacao = "cos";

echo "<h2>$operacao($v1) = $result</h2>";
?>
