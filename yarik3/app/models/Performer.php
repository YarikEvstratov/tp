<?php
class Performer
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllPerformers()
    {
        $stmt = $this->pdo->query('SELECT * FROM performers');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPerformerById($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM performers WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function addPerformer($user_id, $description, $skills)
    {
        $stmt = $this->pdo->prepare('INSERT INTO performers (user_id, description, skills) VALUES (:user_id, :description, :skills)');
        $stmt->execute(['user_id' => $user_id, 'description' => $description, 'skills' => $skills]);
    }
}
?>