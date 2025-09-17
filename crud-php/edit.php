<?php
include 'db.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $conn->query("UPDATE usuarios SET nome='$nome', email='$email' WHERE id=$id");
    header("Location: index.php");
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM usuarios WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
</head>

<body>
    <h2>Editar Usuário</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
        Nome: <input type="text" name="nome" value="<?= $row['nome']; ?>" required><br>
        Email: <input type="email" name="email" value="<?= $row['email']; ?>" required><br>
        <button type="submit">Salvar</button>
    </form>
</body>

</html>