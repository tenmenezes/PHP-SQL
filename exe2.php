<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercícios - Fatudo</title>
</head>
<body>

    <h2>Exercício 2 - Verificação de número primo</h2>

    <form method="get">
        Insira um numero: <input type="number" name="n1" value="">
        <input type="submit" value="Verificar">
    </form>

    <?php
    
        if (isset($_GET['n1']))
        {
            $n = intval($_GET['n1']);

            if ($n <= 1) 
            {
                echo "<br>$n não é primo.";               
            } 
            elseif ($n == 2) 
            {
                echo "<br>$n é primo.";
            }
             else 
            {
                $primo = true;
                // so é preciso verificar até a raiz quadrada de n
                for ($i = 2; $i <= sqrt($n); $i++)
                { 
                    if ($n % $i == 0)
                    {
                        $primo = false;
                        break;
                    }
                }

                if ($primo) {
                    echo "<br>$n é primo";
                } else {
                    echo "<br>$n não é primo";
                }
            }
        }
    
    ?>

    <br>

    <hr>

    <h2>Exercício 3 - Tabuada</h2>

    <form method="get">
        digite um número de 1 a 10: <input type="number" name="n2">
        <input type="submit" value="Verificar">
    </form>

    <?php
    
    if (isset($_GET['n2'])) {
        $n = $_GET['n2'];
        for ($i = 0;$i <= 10;$i++) {

            if ($n >  10) {
                echo "\n<p style='color:red;'> Erro: escolha entre <b>1 e 10.</b></p>";
                break;
            }

            echo "$n x $i = " . $i * $n . "<br>";
        }
    }
        
    ?>

    <br>

    <hr>

    <h2>Exercício 4 - Contagem de vogais</h2>

    <form method="get">
        digite uma palavra: <input type="text" name="txt">
        <input type="submit" value="verificar">
    </form>

    <?php
    
    if (isset($_GET['txt'])) {
        $txt = strtolower($_GET['txt']); // converte todas as letras para minúsculas
        $count = 0;

        for ($i = 0; $i < strlen($txt); $i++) { 
            if ($txt[$i] == 'a' || $txt[$i] == 'e' || $txt[$i] == 'i' || $txt[$i] == 'o' || $txt[$i] == 'u') {
                $count++;
            }
        }
        echo "<br>Essa palavra tem $count vogal(is).";
    }
    
    ?>

    <?php
        $array = [];

        for ($i = count($array);$i < 5; $i++) {
            $array[$i] = readline("Digite o nome " . $i + 1 . ": ");
        }
            echo "\nNomes:\n";
            
        foreach ($array as $nome) {
            echo $nome . "\n";
        }
    ?>

</body>
</html>