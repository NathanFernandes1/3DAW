<?php
function seno($v1) {
    return sin(deg2rad($v1));
}

$v1 = $_GET["v1"];

$result = seno($v1);
$operacao = "sin";

echo "<h2>$operacao($v1) = $result</h2>";
?>
