<?php
class Chat
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserChats($user_id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM chats WHERE user_id = :user_id');
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addMessage($user_id, $performer_id, $message)
    {
        $stmt = $this->pdo->prepare('INSERT INTO chats (user_id, performer_id, message) VALUES (:user_id, :performer_id, :message)');
        $stmt->execute(['user_id' => $user_id, 'performer_id' => $performer_id, 'message' => $message]);
    }
}
?>
