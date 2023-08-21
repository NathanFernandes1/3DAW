<!DOCTYPE html>
<html>

<head>
    <title>Calculadora - Resultado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
        }

        #result {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
        }
    </style>
</head>

<body>
    <div id="result">
        <h1>Resultado:</h1>
        <?php
        $v1 = $_GET["op1"];
        $v2 = $_GET["op2"];
        $operador = $_GET["operador"];

        switch ($operador) {
            case "adicao":
                $result = $v1 + $v2;
                $operacao = "+";
                break;

            case "subtracao":
                $result = $v1 - $v2;
                $operacao = "-";
                break;

            case "divisao":
                $result = $v1 / $v2;
                $operacao = "/";
                break;

            case "multiplicacao":
                $result = $v1 * $v2;
                $operacao = "x";
                break;
        }
        echo "<h2>$v1 $operacao $v2 = $result</h2>";
        ?>
    </div>
</body>

</html>
