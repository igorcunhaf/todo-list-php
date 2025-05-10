<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/Task.php';

$taskModel = new Task($pdo);
$action = $_GET['action'] ?? 'list';

switch ($action) {
    case 'create':
        $taskModel->create($_POST['titulo'], $_POST['descricao']);
        header('Location: /');
        break;
    case 'update':
        $taskModel->update($_POST['id'], $_POST['titulo'], $_POST['descricao'], $_POST['status']);
        header('Location: /');
        break;
    case 'delete':
        $taskModel->delete($_GET['id']);
        header('Location: /');
        break;
    default:
        $tarefas = $taskModel->getAll();
        include __DIR__ . '/../views/index.php';
}
