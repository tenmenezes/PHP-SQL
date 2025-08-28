<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Tabuada em PHP</title>
</head>
<body>
    <form method="get" name="form">
        Informe um número de 1 a 10: 
        <input type="number" name="numero" min="1" max="10" required> 
        <input type="submit" value="Calcular"> 
    </form>

    <?php
        if (isset($_GET['numero'])) {
            $numero = (int)$_GET['numero'];

            echo "<h3>Tabuada do $numero</h3>";

            for ($i = 0; $i <= 10; $i++) { 
                echo "$i x $numero = " . ($i * $numero) . "<br>";
            }
        }
    ?>
</body>
</html>
