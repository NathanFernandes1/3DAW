<?php
function tangente($v1) {
    return tan(deg2rad($v1));
}

$v1 = $_GET["v1"];

$result = tangente($v1);
$operacao = "tan";

echo "<h2>$operacao($v1) = $result</h2>";
?>
