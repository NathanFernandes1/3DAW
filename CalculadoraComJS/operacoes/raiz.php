<?php
function raiz($v1) {
    return sqrt($v1);
}

$v1 = $_GET["v1"];

$result = "Raiz de ".$v1." = ".raiz($v1);

echo json_encode($result);
?>
