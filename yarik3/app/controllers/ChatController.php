<?php
require_once '../config/database.php';
require_once '../app/models/Chat.php';
require_once '../app/models/User.php';

class ChatController
{
    private $chatModel;
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->chatModel = new Chat($pdo);
    }

    public function index()
    {
        $user_id = $_SESSION['user_id'];
        $chats = $this->chatModel->getUserChats($user_id);
        $userModel = new User($this->pdo);
        
        foreach ($chats as $key => $chat) {
            $chats[$key]['user_details'] = $userModel->getUserById($chat['user_id']);
        }
        
        require '../app/views/chat/index.php';
    }

    public function sendMessage()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user_id'];
            $performer_id = $_POST['performer_id'];
            $message = $_POST['message'];
            $this->chatModel->addMessage($user_id, $performer_id, $message);
            header('Location: index.php?action=chat');
        }
    }
}
?>
