<?php
include 'db.php';

$nome = $_POST['nome'];
$email = $_POST['email'];

$sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";
if ($conn->query($sql)) {
    header("Location: index.php");
} else {
    echo "Erro: " . $conn->error;
}
