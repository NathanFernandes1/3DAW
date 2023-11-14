<?php
function seno($v1) {
    return sin(deg2rad($v1));
}

$v1 = $_GET["v1"];

$result = "Seno de ".$v1." = ".seno($v1);

echo json_encode($result);
?>
