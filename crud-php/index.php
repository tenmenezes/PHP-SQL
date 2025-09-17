<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CRUD Simples</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h2>Cadastro de Usuário</h2>
        <form action="create.php" method="POST">
            Nome: <input type="text" name="nome" required>
            Email: <input type="email" name="email" required>
            <button type="submit">Salvar</button>
        </form>

        <h2>Lista de Usuários</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM usuarios"); // guarda a consulta na variavel result
            while ($row = $result->fetch_assoc()): 
                /* enquanto tiver linhas no banco a serem exibidas
                 no id, nome e email, ele continua pegando
                 e exibindo */
            ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['nome']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>">Editar</a> <!-- referencia o arquivo edit.php para edição pela variavel row pegando pelo id dentro do index --->
                        <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Excluir este usuário?')">Excluir</a> <!-- referencia o arquivo delete.php para exclusão row pegando pelo id dentro do index --->
                    </td>
                </tr>
            <?php endwhile; ?> <!-- fecha o while depois de atualizar todas as linhas --->
        </table>
    </div>
</body>

</html>