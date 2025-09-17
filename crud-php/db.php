<?php
/*
Não coloquei localhost,
pois no linux,
localhost não funciona por ele tentar pegar
via socket (arquivo local) e não via TCP/IP.
*/
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db   = "crud_teste";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
