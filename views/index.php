<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="/public/style.css">
    <meta charset="UTF-8">
    <title>Minhas Tarefas</title>
</head>
<body>
    <h1>Minhas Tarefas</h1>
    <a href="/views/form.php">Nova Tarefa</a>
    <ul>
        <?php foreach ($tarefas as $t): ?>
            <li>
                <strong><?= htmlspecialchars($t['titulo']) ?></strong>
                (<?= $t['status'] ?>) —
                <a href="/views/form.php?id=<?= $t['id'] ?>">Editar</a> |
                <a href="/controllers/TaskController.php?action=delete&id=<?= $t['id'] ?>">Excluir</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
