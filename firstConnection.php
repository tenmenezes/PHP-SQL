<?php 
    // Conexão com MySQL
    $servername = "127.0.0.1";
    $username = "yago";
    $password = "senha123";
    $database = "mysql";

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $database);

    // Checar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
    echo "Conexão bem-sucedida!";

    // Fechar conexão
    $conn->close();
?>