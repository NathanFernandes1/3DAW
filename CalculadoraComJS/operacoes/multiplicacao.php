<?php
function multiplicacao($v1, $v2) {
    return $v1 * $v2;
}

$v1 = $_GET["v1"];
$v2 = $_GET["v2"];

$result = $v1."x".$v2."=".multiplicacao($v1, $v2);

echo json_encode($result);
?>
