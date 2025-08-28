<?php 

    $nome = readline("Digite seu nome completo: ");
    $anoNascimento = readline("Digite seu ano de nascimento: ");

    $anoAtual = date("Y"); // Pega o ano atual
    $idade = $anoAtual - $anoNascimento;

    echo "Seu nome: $nome\n";
    echo "Ano em que nasceu: $anoNascimento\n";
    echo "Você tem $idade anos.\n";

    if ($idade >= 18) {
        echo "Você é maior de idade.\n";
    } else {
        echo "Você é menor de idade.\n";
    }


?>