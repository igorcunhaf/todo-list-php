<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/Task.php';

$tarefa = null;
if (isset($_GET['id'])) {
    $tarefa = (new Task($pdo))->getById($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $tarefa ? 'Editar Tarefa' : 'Nova Tarefa' ?></title>
    <link rel="stylesheet" href="/public/style.css">
</head>
<body>
    <h1><?= $tarefa ? 'Editar Tarefa' : 'Nova Tarefa' ?></h1>

    <form method="post" action="/controllers/TaskController.php?action=<?= $tarefa ? 'update' : 'create' ?>">
        <input type="hidden" name="id" value="<?= $tarefa['id'] ?? '' ?>">
        
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?= $tarefa['titulo'] ?? '' ?>" required>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" rows="4"><?= $tarefa['descricao'] ?? '' ?></textarea>

        <?php if ($tarefa): ?>
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="pendente" <?= $tarefa['status'] == 'pendente' ? 'selected' : '' ?>>Pendente</option>
                <option value="concluida" <?= $tarefa['status'] == 'concluida' ? 'selected' : '' ?>>Concluída</option>
            </select>
        <?php endif; ?>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
