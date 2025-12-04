
<?php

// 1.Crie uma classe em PHP para controlar as propriedades de um computador. Memória
// ram, placa mãe e HD.

// criando classe
// class Computador
// {
//     // variáveis que vão ser usadas  na classe, de forma publica
//     public $ram;
//     public $placa_mae;
//     public $hd;

//     // construct feito pra poder enviar os dados para as variáveis publicas
//     public function __construct($ram, $placa_mae, $hd)
//     {
//         $this->ram = $ram;
//         $this->placa_mae = $placa_mae;
//         $this->hd = $hd;
//     }

//     // função de exibição para colocar os dados nas variáveis da classe
//     public function Exibir()
//     {
//         echo "Tamanho da Memória RAM: " . $this->ram . "\n";
//         echo "Modelo da placa mãe...: " . $this->placa_mae . "\n";
//         echo "Tamanho do HD.........: " . $this->hd . "\n";
//     }
// }

// // Jogando os dados no objeto computador
// $Computador_1 = new Computador("32GB", "AsRock M-2345", "1TB");

// // Chamando a função de exibição dos dados, sem isso não exibe nada
// $Computador_1->Exibir();

// -------------------------------------------------------------------------------

// 2. Uma variável tem o valor 578. Mostre o comando em PHP que exiba o tipo desta
// variável.

// $var = 578;

// echo "A variável " . $var . " é: " . gettype($var) . "\n";

// -------------------------------------------------------------------------------

// 3. Faça um programa em PHP que receba 5 números inteiros e exiba a média aritmética
// desses números. Use laço de repetição.

// // armazenar a soma de cada número digitado pelo usuário
// $soma = 0;

// // armazenar a contagem total de vezes que o índice se repete
// $index = 0;

// for ($i = 1; $i <= 5; $i++) {

//     echo "Digite o número " . $i .": ";
//     $num = fgets(STDIN); // jogando o que o usuário digitar dentro de num


//     // validação de dados por segurança
//     if (intval($num) === false) {
//         echo "Erro: Variável incorreta digitada, por favor, digite apenas números inteiros.\n\n";
//         exit;
//     } else {
//         $soma += $num;

//         $index++;

//         system("clear"); // comando pra limpar a tela a cada número digitado com base no meu SO (Linux)
//     }
// }

// echo "A média aritimética dos seus números é: " . $soma / $index . "\n\n";

// -------------------------------------------------------------------------------

// 4. Faça um programa em PHP que receba nome e salário de 1 pessoa e exiba o nome
// apenas se o salário for maior que 5.000,00.

// class Pessoa
// {
//     public $nome;
//     public $sal;

//     public function __construct($nome, $sal)
//     {
//         $this->nome = $nome;
//         $this->sal = $sal;
//     }

//     public function Exibir($nome, $sal)
//     {

//         if ($sal <= 5000) {
//             echo "\nUsuário sem saldo suficiente.\n\n";
//             exit;
//         } else {
//             echo "\nNome do usuário com saldo acima de R$ 5.000,00: " . $nome . "\n\n";
//         }
//     }
// }

// echo "Digite seu nome.......: ";
// $nome = fgets(STDIN); // função pra ler uma linha inteira do terminal FGETS e não FGETC

// echo "\nAgora digite seu saldo: ";
// $sal = floatval(fgets(STDIN));

// $pessoa_1 = new Pessoa($nome, $sal);

// $pessoa_1->Exibir($nome, $sal);

// -------------------------------------------------------------------------------

// 5. Faça um programa em PHP usando o comando Switch para que seja exibida uma
// informação conforme o teste de verdadeiro ou falso.

// echo "Digite 1 ou 2: ";
// $numero = fgets(STDIN);

// switch ($numero) {
//     case "1":

//         echo "\nO número digitado esta entre 0 e 2.\n\n";
//         break;

//     case "2":

//         echo "\nO número digitado está entre 1 e 3.\n\n";
//         break;

//     default:
//         echo "\nCaracter inválido. Digite apenas 1 ou 2.\n\n";
//         break;
// }

// -------------------------------------------------------------------------------

// 6. Faça um MER contendo uma entidade forte e uma entidade fraca.



// -------------------------------------------------------------------------------

// 7. Represente através de um MER um tipo de relacionamento de 1 para n.



// -------------------------------------------------------------------------------

// 8. Qual o comando para que uma variável receba o conteúdo “Parabéns”?

// $var = "Parabéns";

// -------------------------------------------------------------------------------

// 9. Dê um exemplo de um operador ternário em PHP.

// echo "Digite sua idade: ";
// $idade = fgets(STDIN);

// $resultado = ($idade >= 18) ? "Você é maior de idade." : "Você é menor de idade.";

// echo "\n". $resultado ."\n\n";

// -------------------------------------------------------------------------------

// 10. Faça um programa em PHP que receba o valor do salário de 3 funcionários, calcule
// a média salarial e exiba:

// O maior salário
// O menor salário
// A média salarial.

// OBS: Estas exibições só serão feitas se a média for maior ou igual a 8.000,00.

$funcionario = [];

for ($i = 0; $i < 3; $i++) {

    echo "Digite o salário do funcionário " . $i + 1 . ": ";

    $sal = fgets(STDIN);

    $funcionario[$i] = $sal;

    System("clear");
}

$media = ($funcionario[0] + $funcionario[1]  + $funcionario[2]) / 3;

$max = max(array_map(null, $funcionario)); // pega todos os valores e mapeia, retornando o maior

$min = min(array_map(null, $funcionario)); // pega todos os valores e mapeia, retornando o menor

if ($media >= 8000) {

    echo "O maior salário é: " . $max . "\n";

    echo "O menor salário é: " . $min . "\n";

    echo "A média salarial é: " . $media . "\n\n";
} else {

    echo "Salário inválido ou menor do que R$ 8.000,00\n\n";
}
