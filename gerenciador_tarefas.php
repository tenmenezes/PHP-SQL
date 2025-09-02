<?php
session_start();

// Inicializa lista de tarefas na sessão
if (!isset($_SESSION['tarefas'])) {
    $_SESSION['tarefas'] = [
        ["nome" => "Estudar PHP", "concluida" => false],
        ["nome" => "Fazer exercícios de lógica", "concluida" => false],
        ["nome" => "Revisar anotações", "concluida" => false]
    ];
}

// Processa ações
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['acao'])) {
        $acao = $_POST['acao'];
        $id = isset($_POST['id']) ? intval($_POST['id']) : null;

        if ($acao === "adicionar") {
            $nova = trim($_POST['nova_tarefa']);

            if ($nova === "") {
                $erro = "⚠️ Não é permitido adicionar tarefa vazia.";
            } else {
                // Verifica duplicata (case-insensitive)
                $duplicada = false;
                foreach ($_SESSION['tarefas'] as $tarefa) {
                    if (strcasecmp($tarefa["nome"], $nova) === 0) {
                        $duplicada = true;
                        break;
                    }
                }

                if ($duplicada) {
                    $erro = "⚠️ Já existe uma tarefa com esse nome.";
                } else {
                    $_SESSION['tarefas'][] = ["nome" => $nova, "concluida" => false];
                }
            }

        } elseif ($acao === "concluir" && $id !== null) {
            if (isset($_SESSION['tarefas'][$id])) {
                $_SESSION['tarefas'][$id]["concluida"] = true;
            }

        } elseif ($acao === "desfazer" && $id !== null) {
            if (isset($_SESSION['tarefas'][$id])) {
                $_SESSION['tarefas'][$id]["concluida"] = false;
            }

        } elseif ($acao === "remover" && $id !== null) {
            if (isset($_SESSION['tarefas'][$id])) {
                unset($_SESSION['tarefas'][$id]);
                $_SESSION['tarefas'] = array_values($_SESSION['tarefas']); // reindexa
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Tarefas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f4f7fb;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        .erro {
            color: red;
            text-align: center;
            margin-bottom: 15px;
            font-weight: bold;
        }
        ul {
            list-style: none;
            padding: 0;
            max-width: 600px;
            margin: 20px auto;
        }
        li {
            background: #fff;
            margin: 8px 0;
            padding: 12px 15px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .concluida {
            text-decoration: line-through;
            color: gray;
        }
        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            margin-left: 5px;
        }
        .btn-concluir { background: #27ae60; color: #fff; }
        .btn-desfazer { background: #f39c12; color: #fff; }
        .btn-remover { background: #e74c3c; color: #fff; }
        .btn:hover { opacity: 0.85; }
        form.inline { display: inline; }
        form.add-form { text-align: center; margin-top: 20px; }
        input[type="text"] {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-right: 10px;
        }
        button[type="submit"] {
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            background: #2980b9;
            color: #fff;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background: #1f6391;
        }
    </style>
</head>
<body>
    <h1>📌 Gerenciador de Tarefas</h1>

    <?php if (isset($erro)) echo "<p class='erro'>$erro</p>"; ?>

    <ul>
        <?php foreach ($_SESSION['tarefas'] as $index => $tarefa): ?>
            <li>
                <span class="<?= $tarefa['concluida'] ? 'concluida' : '' ?>">
                    <?= htmlspecialchars($tarefa['nome']) ?>
                </span>
                <div>
                    <?php if (!$tarefa['concluida']): ?>
                        <form method="post" class="inline">
                            <input type="hidden" name="acao" value="concluir">
                            <input type="hidden" name="id" value="<?= $index ?>">
                            <button class="btn btn-concluir">Concluir</button>
                        </form>
                    <?php else: ?>
                        <form method="post" class="inline">
                            <input type="hidden" name="acao" value="desfazer">
                            <input type="hidden" name="id" value="<?= $index ?>">
                            <button class="btn btn-desfazer">Desfazer</button>
                        </form>
                    <?php endif; ?>

                    <form method="post" class="inline" onsubmit="return confirm('Tem certeza que deseja remover esta tarefa?');">
                        <input type="hidden" name="acao" value="remover">
                        <input type="hidden" name="id" value="<?= $index ?>">
                        <button class="btn btn-remover">Remover</button>
                    </form>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>

    <form method="post" class="add-form">
        <input type="hidden" name="acao" value="adicionar">
        <input type="text" name="nova_tarefa" placeholder="Digite uma nova tarefa">
        <button type="submit">Adicionar</button>
    </form>
</body>
</html>
