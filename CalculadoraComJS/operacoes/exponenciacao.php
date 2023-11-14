<?php
function exponenciacao($v1, $v2) {
    return pow($v1, $v2);
}

$v1 = $_GET["v1"];
$v2 = $_GET["v2"];

$result = $v1."^".$v2."=".exponenciacao($v1, $v2);

echo json_encode($result);
?>
