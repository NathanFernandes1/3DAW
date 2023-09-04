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

       
    </style>
</head>

<body>
    
        
        <?php
        $v1 = $_GET["op1"];
        $v2 = $_GET["op2"];
        $operador = $_GET["operador"];

        switch ($operador) {
            case "adicao":
                header('Location: operacoes/soma.php?v1=' . $v1 . '&v2=' . $v2);
                break;

            case "subtracao":
                header('Location: operacoes/subtracao.php?v1=' . $v1 . '&v2=' . $v2);
                break;

            case "divisao":
                header('Location: operacoes/divisao.php?v1=' . $v1 . '&v2=' . $v2);
                break;

            case "multiplicacao":
                header('Location: operacoes/multiplicacao.php?v1=' . $v1 . '&v2=' . $v2);
                break;

            case "seno":
                header('Location: operacoes/seno.php?v1=' . $v1);
                break;

            case "cosseno":
                header('Location: operacoes/cosseno.php?v1=' . $v1);
                break;

            case "tangente":
                header('Location: operacoes/tangente.php?v1=' . $v1);
                break;

            case "raiz":
                header('Location: operacoes/raiz.php?v1=' . $v1);
                break;

            case "exponenciacao":
                header('Location: operacoes/exponenciacao.php?v1=' . $v1 . '&v2=' . $v2);
                break;
        }
        ?>
   
</body>

</html>
