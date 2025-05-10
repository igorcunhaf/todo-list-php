<?php
class Task {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM tarefas ORDER BY data_criacao DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($titulo, $descricao) {
        $sql = "INSERT INTO tarefas (titulo, descricao) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$titulo, $descricao]);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM tarefas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $titulo, $descricao, $status) {
        $sql = "UPDATE tarefas SET titulo = ?, descricao = ?, status = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$titulo, $descricao, $status, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tarefas WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
