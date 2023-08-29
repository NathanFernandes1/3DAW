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
        function adicao($v1, $v2) {
            return $v1 + $v2;
        }

        function subtracao($v1, $v2) {
            return $v1 - $v2;
        }

        function divisao($v1, $v2) {
            return $v1 / $v2;
        }

        function multiplicacao($v1, $v2) {
            return $v1 * $v2;
        }

        function seno($v1) {
            return sin(deg2rad($v1));
        }

        function cosseno($v1) {
            return cos(deg2rad($v1));
        }

        function tangente($v1) {
            return tan(deg2rad($v1));
        }

        function raiz($v1) {
            return sqrt($v1);
        }

        function exponenciacao($v1, $v2) {
            return pow($v1, $v2);
        }

        $v1 = $_GET["op1"];
        $v2 = $_GET["op2"];
        $operador = $_GET["operador"];

        switch ($operador) {
            case "adicao":
                $result = adicao($v1, $v2);
                $operacao = "+";
                break;

            case "subtracao":
                $result = subtracao($v1, $v2);
                $operacao = "-";
                break;

            case "divisao":
                $result = divisao($v1, $v2);
                $operacao = "/";
                break;

            case "multiplicacao":
                $result = multiplicacao($v1, $v2);
                $operacao = "x";
                break;

            case "seno":
                $result = seno($v1);
                $operacao = "sin";
                break;

            case "cosseno":
                $result = cosseno($v1);
                $operacao = "cos";
                break;

            case "tangente":
                $result = tangente($v1);
                $operacao = "tan";
                break;

            case "raiz":
                $result = raiz($v1);
                $operacao = "√";
                break;

            case "exponenciacao":
                $result = exponenciacao($v1, $v2);
                $operacao = "^";
                break;
        }

        if ($operacao == "√" || $operacao == "tan" || $operacao == "cos" || $operacao == "sin") {
            echo "<h2>$operacao($v1) = $result</h2>";
        } else {
            echo "<h2>$v1 $operacao $v2 = $result</h2>";
        }
        ?>
    </div>
</body>

</html>
