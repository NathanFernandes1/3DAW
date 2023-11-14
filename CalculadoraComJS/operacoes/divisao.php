<?php
function divisao($v1, $v2) {
    if ($v2 == 0) {
        return "Erro: Divisão por zero!";
    }
    return $v1 / $v2;
}

$v1 = $_GET["v1"];
$v2 = $_GET["v2"];

$result = $v1."/".$v2."=".divisao($v1, $v2);

echo json_encode($result);
?>
