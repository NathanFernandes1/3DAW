<?php
function cosseno($v1) {
    return cos(deg2rad($v1));
}

$v1 = $_GET["v1"];

$result = "Cosseno de ".$v1." = ".cosseno($v1);

echo json_encode($result);
?>
