<?php
require_once '../config/database.php';
require_once '../app/models/Performer.php';
class PerformerController
{
    private $performerModel;


    public function __construct($pdo)
    {
        $this->performerModel = new Performer($pdo);
    }
    public function index()
    {
        $performers = $this->performerModel->getAllPerformers();
        require '../app/views/performers/index.php';
    }
    public function show($id)
    {
        $performer = $this->performerModel->getPerformerById($id);
        require '../app/views/performers/show.php';
    }
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user_id'];
            $description = $_POST['description'];
            $skills = $_POST['skills'];
            $this->performerModel->addPerformer($user_id, $description, $skills);
            header('Location: index.php?action=performers');
        } else {
            require '../app/views/performers/create.php';
        }
    }
}
?>