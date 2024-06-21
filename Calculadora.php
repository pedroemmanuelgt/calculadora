<!-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operaciones con Números</title>
    <script>
        function calcular() {
            var numero1 = parseFloat(document.getElementById('numero1').value);
            var numero2 = parseFloat(document.getElementById('numero2').value);

            if (!isNaN(numero1) && !isNaN(numero2)) {
                var suma = numero1 + numero2;
                var resta = numero1 - numero2;

                document.getElementById('resultado').innerHTML =
                    `<h2>Resultado de las Operaciones</h2>
                    <p>Suma: ${numero1} + ${numero2} = ${suma}</p>
                    <p>Resta: ${numero1} - ${numero2} = ${resta}</p>`;
            } else {
                document.getElementById('resultado').innerHTML = "<p>Por favor ingrese valores numéricos válidos.</p>";
            }
        }
    </script>
</head>
<body>
    <h1>Calculadora de Suma y Resta</h1>
    <form onsubmit="event.preventDefault(); calcular();">
        <label for="numero1">Número 1:</label>
        <input type="number" id="numero1" name="numero1" required>
        <br><br>
        <label for="numero2">Número 2:</label>
        <input type="number" id="numero2" name="numero2" required>
        <br><br>
        <input type="submit" value="Calcular">
    </form>
    <div id="resultado"></div>
</body>
</html> -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Básica</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label, input, button {
            margin-bottom: 15px;
        }
        button {
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result, .error {
            text-align: center;
            margin-top: 20px;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculadora Básica</h1>
        <form method="post">
            <label for="numero1">Número 1:</label>
            <input type="number" id="numero1" name="numero1" required value="<?php echo isset($_POST['numero1']) ? htmlspecialchars($_POST['numero1']) : ''; ?>">

            <label for="numero2">Número 2:</label>
            <input type="number" id="numero2" name="numero2" required value="<?php echo isset($_POST['numero2']) ? htmlspecialchars($_POST['numero2']) : ''; ?>">

            <button type="submit" name="operacion" value="suma">Sumar</button>
            <button type="submit" name="operacion" value="resta">Restar</button>
            <button type="submit" name="operacion" value="multiplicacion">Multiplicar</button>
            <button type="submit" name="operacion" value="division">Dividir</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero1 = $_POST['numero1'];
            $numero2 = $_POST['numero2'];
            $operacion = $_POST['operacion'];
            $resultado = 0;
            $error = '';

            switch ($operacion) {
                case "suma":
                    $resultado = $numero1 + $numero2;
                    break;
                case "resta":
                    $resultado = $numero1 - $numero2;
                    break;
                case "multiplicacion":
                    $resultado = $numero1 * $numero2;
                    break;
                case "division":
                    if ($numero2 != 0) {
                        $resultado = $numero1 / $numero2;
                    } else {
                        $error = "Error: División por cero no permitida.";
                    }
                    break;
                default:
                    $error = "Operación no válida.";
            }

            if ($error) {
                echo "<p class='error'>$error</p>";
            } else {
                echo "<p class='result'>El resultado de la operación es: $resultado</p>";
            }
        }
        ?>
    </div>
</body>
</html>
